<?php
$name = "root";
$pass = "root";
$host = "127.0.0.1";
$db = "goods";
$link = new mysqli($host,$name,$pass,$db);

$userid= $_GET['id'];
$add = "delete from question_bank where q_id = '$userid'";
$acc = mysqli_query($link,$add);
if($acc){
    echo "删除成功";
}else{
    echo "删除失败";
}