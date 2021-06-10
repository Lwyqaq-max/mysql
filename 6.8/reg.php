<?php
if($_POST){
    session_start(); //开启会话
    //接收form表单数据 $_POST
    echo '<pre>';print_r($_POST);echo '</pre>';   //接收的表单数据
    $host = "127.0.0.1";
    $db = "php2102";
    $user = "root";
    $pass = "root";
    $dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
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
        values(?,?,?,?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(1,$username);
    $stmt->bindParam(2,$email);
    $stmt->bindParam(3,$mobile);
    $stmt->bindParam(4,$age);
    $stmt->bindParam(5,$pass1);
    $stmt->bindParam(6,$passs);
    $stmt->bindParam(7,$address);
    $stmt->execute(); //执行sql
    //判断错误
    $err_code = $stmt->errorCode();
    if($err_code!='00000'){
        $err_info = $stmt->errorInfo();
        echo "错误是:".$err_info[2]."<br>";
        die();
}
//    查看sql执行受影响的行数
    $affect_rows = $stmt->rowCount();
    echo "受影响的行数". $affect_rows;echo "<br>";
    if($affect_rows>0){
        echo "注册成功";echo "<br>";
    }else{
        echo "注册失败";echo "<br>";
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
<form action="./reg.php" method="post">
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