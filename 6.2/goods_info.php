<?php
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $pass = 'root';        // 数据库密码
    $db = "goods";            //使用的数据库
    $link = new mysqli($host, $user, $pass, $db);   //连接数据库

//    $sql = " select * from p_order_info where order_sn = 2020042321284 or order_sn = 2020042369891";   //1

    $sql = " select * from p_order_info where user_id = 1116";    //2
    $result = mysqli_query($link,$sql);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<pre>';
print_r($rows);
echo '</pre>';
    $len = count($rows);
    $a = $rows[0]['shipping_time'];
    $b = $rows[1]['shipping_time'];
    $c = $rows[2]['shipping_time'];
    $d = $rows[3]['shipping_time'];
    $e = $rows[4]['shipping_time'];
    $f = $rows[5]['shipping_time'];
    $aa =   explode('-',$a);
    $bb =   explode('-',$b);
    $cc =   explode('-',$c);
    $dd =   explode('-',$d);
    $ee =   explode('-',$e);
    $ff =   explode('-',$f);
    $arr =  array_merge($aa,$bb,$cc,$dd,$ee,$ff);
    $arr = rsort($arr);

//    $sql = "select * from p_goods where goods_sn = 'DT001341'";    //3
//    $result = mysqli_query($link,$sql);
//
//    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//    echo '<pre>';
//    print_r($rows);
//    echo '</pre>';
//
//        $sql = " SELECT COUNT(DISTINCT order_id) FROM p_order_info"; //4
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//        echo '<pre>';print_r($rows);echo '</pre>';

//        $sql = "select sum(goods_amount) from p_order_info where user_id=2035;";   5
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//          var_dump($rows);

//             $sql = "select sum(money_paid) from p_order_info"; //6
//             $result = mysqli_query($link,$sql);
//             $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//                echo '<pre>';
//                print_r($rows);
//                echo '</pre>';


            //7
//        $sql = "select money_paid from p_order_info where money_paid order by goods_amount desc limit 10 ";
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//        echo '<pre>';
//        print_r($rows);
//        echo '</pre>';


//9 查找 order_info 表中 money_paid 大于等于 5000 并且 小于 等于 6000 的记录（两种写法）
// #升序
//        $sql = "select money_paid from p_order_info where goods_amount <= 6000 and goods_amount > 5000 order by goods_amount ";
//        $sql = "select  money_paid from p_order_info where goods_amount BETWEEN 5000 and 6000 order by goods_amount desc ";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';
    //10  使用子查询查找 order_info 表中 money_paid 最大的记录（不一定是一条记录）
//            $sql = "select money_paid from p_order_info order by money_paid desc";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';
//11  使用子查询查找 order_info 表中 money_paid 最小的记录（不一定是一条记录）
        //$sql = "select money_paid from p_order_info order by money_paid ";
//            $result = mysqli_query($link,$sql);
////            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
////            echo '<pre>';
////            print_r($rows);
////          echo '</pre>';


//12     12  查找 order_info 表记录,按 money_paid 降序排序，取20条
//            $sql = "select money_paid from p_order_info order by money_paid desc limit 20 ";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';




//13
//            $sql = " SELECT COUNT(DISTINCT order_id) FROM p_order_info";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';


//14
//            $sql = " select avg(goods_amount) from p_order_info";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';

//15
//            $sql = " select distinct(user_id) from p_order_info	";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';

//16            总额
//            $sql = " select sum(money_paid) from p_order_info";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';


//17           平均值
//            $sql = " select avg(money_paid) from p_order_info";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';
 // 18   检索 order_info 表中 add_time(字段类型为时间戳) 为 2013 年 6 月的记录
//	    使用函数：FROM_UNIXTIME(),YEAR(),MONTH(),DAY()
//		FROM_UNIXTIME(1402848000);		//函数参数为 unix时间戳，运算结果  Y-M-D H:i:S
//		YEAR(),MONTH(),DAY()	// 函数参数格式 “2014-06-15 02:32:39”
//        $sql = " select add_time from p_order_info where = 1402848000";
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//        echo '<pre>';
//        print_r($rows);
//        echo '</pre>';

//19
//         $sql = "select a.order_id,a.add_time,a.money_paid,b.user_id,b.user_name,b.reg_time from p_order_info as a ,p_users as b where a.user_id = b.user_id order by add_time desc limit 10";
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//        $aa = count($rows);
//        for($i=0;$i<$aa;$i++){
//            $cc = date("Y-m-d H:i:s",$rows[$i]['reg_time']);
//            echo $cc;echo '<br>';
//        }
//        echo '<pre>';
//        print_r($rows);
//        echo '</pre>';




//21、根据 订单商品表 （order_goods）统计卖的最多的前10种商品，及商品信息（需联表goods）
//		返回字段需包含：
//			goods_id: 商品ID
//			num:		卖出的数量
//			total:		总共卖了多少钱（order_goods.goods_price
//            $sql = "select goods_number,goods_id,shop_price,sale_num  from p_goods order by goods_number desc limit 10";
//            $result = mysqli_query($link,$sql);
//            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//            echo '<pre>';
//            print_r($rows);
//            echo '</pre>';
         //22统计订单表中所有已支付订单的总金额
//        $sql = "select sum(money_paid) from p_order_info";
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//        echo '<pre>';
//        print_r($rows);
//        echo '</pre>';


//23统计订单表中所有未支付订单的总金额
//        $sql = "select sum(order_amount) from p_order_info";
//        $result = mysqli_query($link,$sql);
//        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//        echo '<pre>';
//        print_r($rows);
//        echo '</pre>';
