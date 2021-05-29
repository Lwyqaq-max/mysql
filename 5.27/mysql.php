<?php
    $host =  '127.0.0.1';       //Mysql的主机地址
    $user = 'root';            //数据库的用户名
    $pass = 'root';             //数据库密码
    $db = 'php2102';            //使用的数据库
    $mysqli = new mysqli("$host", "$user", "$pass", "$db");
    $sql = "select * from php";    //获取php表中的数据
    $result =  mysqli_query($mysqli,$sql); //执行一个查询
    echo '<pre>';print_r(mysqli_fetch_all($result,MYSQLI_ASSOC));echo '</pre>';