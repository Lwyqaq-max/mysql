<?php
    //接受form表单数据
    echo '<pre>';print_r($_POST);echo '</pre>';
    // 使用mysqli连接MySQL
    include "include.php";
    $username = trim($_POST['uname']);      //处理变量
    $mobile = trim($_POST['mobile']);        //处理变量
    $email = trim($_POST['email']);          //处理变量
    $password = $_POST['password'];   //处理变量
    
    //sql语句
    $sql ="insert into php(`username`,`email`,`mobile`,`password`)values('$username','$mobile','$email','$password')";
    $stmt = mysqli_prepare($link,$sql);//准备阶段

    $result = mysqli_stmt_execute($stmt);       //执行阶段
 
    if($result){
        echo 'insert 成功';
    }else{
        echo 'insert 失败';
    }