
<?php
    if($_POST){
        session_start(); //开启会话
        //接收form表单数据 $_POST
        echo '<pre>';print_r($_POST);echo '</pre>';   //接收的表单数据
        include "include.php"; //连接数据库
        mysqli_query($link,"set names utf8");   //设置字符集
        $username = trim($_POST['uname']);   //接收的用户名
        $email = trim($_POST['email']);     //接收的邮箱
        $mobile = trim($_POST['tel']);      //接收的电话
        $age = trim($_POST['age']);         //接收的年龄
        $pass = trim($_POST['pass']);      //接收的密码
        $address = trim($_POST['uaddress']);  //接收的地址
        $pass1 = trim($_POST['pass1']);     //接收的重复密码
        $passs = password_hash($pass,PASSWORD_BCRYPT); //加密
        $pass11 = password_hash($pass1,PASSWORD_BCRYPT); //加密
        //sql语句      数据库表里加东西

        $sql = "insert into php4(username,email,mobile,age,password,password2,address)
        values('{$username}','{$email}','{$mobile}','{$age}','{$passs}','{$pass11}','{$address}')";

        $sql1 = "select * from php4 where username=’{$username}‘";
        $query = mysqli_query($link,$sql1);
        $stmt = mysqli_prepare($link,$sql);//准备阶段
        $result = mysqli_stmt_execute($stmt);   //执行准备阶段

        //准备执行
        if($result){   //判断是否执行
            echo 'insert 成功';    //执行成功
//        header('Refresh:1; url=./login.html');
        }else{          //否则执行失败
            echo 'insert 失败';
        }
        die();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
</head>
<body>
<form action="./zhuce.php" method="post">
    <h1>用户注册</h1>
    <input type="text" name="uname" placeholder="用户名"><br>
    <input type="Email" name="email" placeholder="Email"><br>
    <input type="text" name="tel" placeholder="手机号"><br>
    <input type="text" name="age" placeholder="年龄"><br>
    <input type="text" name="uaddress" placeholder="地址"><br>
    <input type="password" name="pass" placeholder="密码"><br>
    <input type="password" name="pass1" placeholder="确认密码"><br>
    <input type="reset" value="重置">
    <input type="submit" value="提交">
</form>
</body>
</html>