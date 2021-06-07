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

    $uname = $arr['name'];
    $unum = $arr['num'];
    $kucun = $arr['kucun'];
    $desc = $arr['desc'];
    $sql = "insert into p_goods(goods_name,goods_number,shop_price,goods_desc)values ('$uname','$unum','$kucun','$desc')";
    $stmt = mysqli_prepare($link,$sql);//准备阶段
    $result = mysqli_stmt_execute($stmt);   //执行准备阶段
    if($result){
        echo '执行成功';
    }else{
        echo '执行失败';
    }
