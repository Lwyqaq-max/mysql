<?php
    $username = trim($_GET['name']);    //接受URL参数

    // 使用mysqli连接到mysql
    $host = "127.0.0.1"; //mysql的主机地址
    $user = "root" ;  //数据库的用户名
    $pass = "root";
    $db = "php2102";
    $link = new mysqli($host,$user,$pass,$db);
    // 获取php表中的数据
    $sql = 'select * from php2 where username="'.$uesrname.'"';
    echo $sql;echo '</br>';
    $result = mysqli_query($link,$sql);
    echo '<pre>';print_r(mysqli_fetch_all($result,MYSQLI_ASSOC));echo '</pre>';