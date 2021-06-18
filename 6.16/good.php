<?php
namespace App\Services;

use App\Jobs\CourseGroupByExpire;
use App\Models\Course;
use App\Models\CourseOrder;
use App\Models\GroupBuy;
use App\Models\LogPoint;
use App\Models\UserGroupBuy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseOrderService
{
    public function create($userId, $courseId, $payment, $groupId)
    {
        $action = $payment . 'Create';
        if (method_exists($this, $action)) {
            return $this->{$action}($userId, $courseId, $groupId);
        } else {
            return _error('支付方式错误', 400);
        }
    }

    public function participateCreate($userId, $courseId, $groupId)
    {
        $group = request()->group;
        $orderId = 0;
        DB::transaction(function () use($userId, $courseId, &$group, &$orderId, &$groupId) {
            $time = time();
            $order = CourseOrder::create([
                'user_id'      => $userId,
                'course_id'    => $group->course_id,
                'order_no'     => get_orders(),
                'status'       => CourseOrder::STATUS_IN_A_GROUP,
                'payment'      => CourseOrder::PAYMENT_PARTICIPATE,
                'pay_time'     => 0,
                'success_time' => 0,
                'used_point'   => 0,
            ]);
            $orderId = $order->id;
            // 修改拼团信息
            $group_users = json_decode($group->people_info, true);
            $group_users[] = ['user_id' => $userId];
            $group->people_info = $group_users;
            $group->save();
            // 创建一键拼团信息
            $userGroup = UserGroupBuy::create([
                'user_id' => $userId,
                'course_id' => $group->course_id,
                'course_order_id' => $orderId,
                'group_buy_id' => $group->id,
                'status' => UserGroupBuy::STATUS_CONDUCTING,
                'is_master' => 1
            ]);
            // 判断是否满人
            if ($group->course->group_peoples <= count($group->people_info)) {
                // 获取当前拼团的订单
                $groups = UserGroupBuy::with(['order', 'user'])->where('group_buy_id', $group->id)->get();
                $orderNo = [];
                foreach ($groups as $item) {
                    $orderNo[$item->user->id] = $item->order->order_no;
                    // 修改订单状态
                    $item->order->status = CourseOrder::STATUS_COMPLETED;
                    $item->order->success_time = $time;
                    $item->order->save();
                    // 修改用户拼团状态
                    $item->status = UserGroupBuy::STATUS_COMPLETED;
                    $item->save();
                    $item->user->courses()->attach($group->course_id, ['create_time' => time()]);
                }
                $group->status = GroupBuy::STATUS_COMPLETED;
                $group->save();
                Course::addSale($group->course_id, count($group->people_info));
                // 循环发送订阅消息
                foreach ($groups as $group) {
                    (new MessageSubscribeService($group->user))->successfulCourseCompetition([
                        'course_title' => $order->course->title,
                        'course_id' => $order->course->id,
                        'order_no' => $orderNo[$group->user->id],
                        'order_id' => $group->order->id,
                    ]);
                }
            }
        });
        return _message([
            'payment' => CourseOrder::PAYMENT_PARTICIPATE,
            'group_id' => $groupId,
            'order_id' => $orderId
        ], '参与拼团成功');
    }

    public function inviteCreate($userId, $courseId, $groudId)
    {
        $groupId = $orderId = 0;
        DB::transaction(function () use($userId, $courseId, &$groupId, &$orderId) {
            $time = time();
            // 创建一个订单
            $order = CourseOrder::create([
                'user_id' => $userId,
                'course_id' => $courseId,
                'order_no' => get_orders(),
                'status' => CourseOrder::STATUS_IN_A_GROUP,
                'payment' => CourseOrder::PAYMENT_INVITE,
                'pay_time' => 0,
                'success_time' => 0,
                'used_point'   => 0
            ]);
            $orderId = $order->id;
            // 创建一个拼团
            $groupBuyInfo = GroupBuy::create([
                'course_id' => $courseId,
                'course_order_id' => $orderId,
                'master_id' => $userId,
                'status' => GroupBuy::STATUS_CONDUCTING,
                'peoples' => request()->course->group_peoples,
                'people_info' => json_encode([['user_id' => $userId]]),
                'expire_time' => $time + (request()->course->group_expire_time * 3600),
            ]);
            $groupId = $groupBuyInfo->id;
            // 创建一键拼团信息
            UserGroupBuy::create([
                'user_id' => $userId,
                'course_id' => $courseId,
                'course_order_id' => $orderId,
                'group_buy_id' => $groupBuyInfo->id,
                'status' => UserGroupBuy::STATUS_CONDUCTING,
                'is_master' => 1
            ]);
            if (app()->environment('local')) {
                CourseGroupByExpire::dispatch($groupBuyInfo)->delay(now()->addMinutes(1));
            } else {
                CourseGroupByExpire::dispatch($groupBuyInfo)->delay(now()->addHours(request()->course->group_expire_time));
            }
        });

        return _message([
            'payment' => CourseOrder::PAYMENT_INVITE,
            'group_id' => $groupId,
            'order_id' => $orderId
        ], '拼团信息创建成功');
    }

    public function pointCreate($userId, $courseId, $groudId = 0)
    {
        $orderId = 0;
        $order = null;
        DB::transaction(function () use($userId, $courseId, &$orderId, &$order) {
            // 扣除用户的积分
            request()->user->decrement('points', request()->course->price_points);
            $time = time();
            // 创建一个订单
            $order = CourseOrder::create([
                'user_id'      => $userId,
                'course_id'    => $courseId,
                'order_no'     => get_orders(),
                'status'       => CourseOrder::STATUS_COMPLETED,
                'used_point'   => request()->course->price_points,
                'payment'      => CourseOrder::PAYMENT_POINT,
                'pay_time'     => $time,
                'success_time' => $time
            ]);
            $orderId = $order->id;
            // 添加积分日志
            LogPoint::addLog(
                request()->user->id,
                request()->course->price_points,
                'dec',
                $courseId,
                LogPoint::FROM_TYPE_USER_BUY_COURSE
            );
            // 用户绑定课程
            request()->user->courses()->attach($courseId, ['create_time' => $time]);
            // 销售数量+1
            Course::addSale($courseId);
        });
        // 订阅消息
        (new MessageSubscribeService(request()->user))->coursePurchasedSuccessfully([
            'course_id' => $courseId,
            'course_title' => request()->course->title,
            'order_no' => $order->order_no,
            'class_hour_count' => count(request()->course->contents)
        ]);
        return _message([
            'payment' => CourseOrder::PAYMENT_POINT,
            'order_id' => $orderId
        ], '课程购买成功');
    }
}