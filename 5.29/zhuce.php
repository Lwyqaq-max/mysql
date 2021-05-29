<?php 

    //接收form表单数据 $_POST
    echo '<pre>';print_r($_POST);echo '</pre>';
    $host = "127.0.0.1";
    $user = "root";    //数据库的用户名
    $pass = "root";
    $db = "php2102";

    $link = new mysqli($host,$user,$pass,$db);

    $username = trim($_POST['uname']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['tel']);
    $age = trim($_POST['age']);
    $pass = trim($_POST['pass']);
 
    $pass1 = trim($_POST['pass1']);
    $passs = password_hash($pass,PASSWORD_BCRYPT);
    $pass11 = password_hash($pass1,PASSWORD_BCRYPT);
    $sql = "insert into php4(username,email,mobile,age,password,password2)values('{$username}','{$email}','{$mobile}','{$age}','{$passs}','{$pass11}')";
    $stmt = mysqli_prepare($link,$sql);//准备阶段
    $result = mysqli_stmt_execute($stmt);    

    if($result){
        echo 'insert 成功';
    }else{
        echo 'insert 失败';
    }