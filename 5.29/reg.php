<?php
    echo '<pre>';print_r($_POST);echo '</pre>';

    //处理变量
    $username = trim($_POST['u_name']);
    $mobile = trim($_POST['u_mobile']);
    $email = trim($_POST['u_email']);
    $pass1 = trim($_POST['u_pass1']);
    $pass2 = trim($_POST['u_pass2']);
    $age = intval($_POST['u_age']);
    $reg_time = time();
    $upass = password_hash($pass1,PASSWORD_BCRYPT);


    //使用mysql连接数据库
    $host = '127.0.0.1';        //mysql的主机地址
    $user = 'root';             //数据库的用户名
    $pass = 'root';             //数据库密码
    $db  = 'php2102';           //使用的数据库

    $link = new mysqli($host,$user,$pass,$db);

    $sql = "insert into php5 (username,mobile,email,pass1,age)values('{$username}','{$mobile}','{$email}','{$upass}','{$age}')";

    $stmt = mysqli_prepare($link,$sql);


    $result = mysqli_stmt_execute($stmt);

    if($result){
        echo 'insert 成功';
    }else{
        echo 'insert  失败';
    }
