<?php
    $arr = $_POST;
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods"; 
    $link = new mysqli($host,$name,$pass,$db);
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    $uid = $arr['id'];
    $uname = $arr['name'];
    $unum = $arr['num'];
    $kucun = $arr['kucun'];
    $sql = "update p_goods set goods_name ='$uname',shop_price='$unum',goods_number='$kucun' where goods_id = '$uid'";
    $acc =mysqli_prepare($link,$sql);
    $abb = mysqli_stmt_execute($acc);
    if($abb){
        echo "修改成功";
    }else{
        echo "修改失败";
    }