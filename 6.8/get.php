<?php
    $id = $_GET['id'];
    echo $id;
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $link = new mysqli($host,$name,$pass,$db);
    $sql = "select * from p_users where user_id = {$id}";
    $arr = mysqli_query($link,$sql);
    $res = mysqli_fetch_all($arr,MYSQLI_ASSOC);
    echo '<pre>';
    print_r($res);
    echo '</pre>';