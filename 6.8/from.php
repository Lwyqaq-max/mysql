<?php
$arr = $_POST;
$host = "127.0.0.1";
$db = "goods";
$user = "root";
$pass = "root";
$dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
$uid = $arr['id'];
$uname = $arr['name'];
$unum = $arr['num'];
$kucun = $arr['kucun'];
$sql = "update p_goods set goods_name =?,shop_price=?,goods_number=? where goods_id = ?";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(1,$uname);
$stmt->bindParam(2,$unum);
$stmt->bindParam(3,$kucun);
$stmt->bindParam(4,$uid);
$stmt->execute(); //执行sql
//检查执行结果
$row_count = $stmt->rowCount();
if($row_count==1){
    echo "update 成功";
}else{
    echo "update 失败";
}

