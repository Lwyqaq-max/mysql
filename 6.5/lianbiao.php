<?php
    $arr = $_POST;
$name = "root";
$pass = "root";
$host = "127.0.0.1";
$db = "goods";
    $link = new mysqli($host,$name,$pass,$db);
//    $sql = "select p_order_info.order_id,p_order_info.goods_amount,p_order_info.add_time,p_order_goods.goods_name,p_order_goods.order_id from
//    p_order_info,p_order_goods where p_order_info.order_id = p_order_goods.order_id and p_order_goods.order_id in(78010,78014)";
//    $sql = "select count(order_status),consignee from p_order_info group by user_id order by count(order_status) desc limit 10"; //1A
//    $sql = "select sum(order_status),consignee,user_id from p_order_info where user_id in (213,385,435) group by user_id "; //2
    $sql = "select sum(goods_number),rec_id from p_order_goods group by rec_id order by goods_number  desc limit 10"; //3
//      $sql = "select sum(money_paid),user_id from p_order_info group by user_id order by money_paid desc limit 10"; //4

//    $sql = "select money_paid,consignee from p_order_info where money_paid > 1000 and money_paid <5000 group by user_id order by money_paid desc  limit 10 "; //5
//    $sql = "select money_paid,consignee from p_order_info where money_paid < 1000 group by user_id limit 10"; //6
    echo '<pre>';
    print_r($sql);
    echo '</pre>';
    $arr = mysqli_query($link,$sql);
    $res = mysqli_fetch_all($arr);
    echo '<pre>';print_r($res);echo '</pre>';





