<?php
    $host = "127.0.0.1";        //数据库地址
    $db = 'goods';            //数据库名
    $user = 'root';             //数据库用户名
    $pass = 'root';        // 数据库的用户密码
    $dbh = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $sql = "select * from p_users where user_id = ?";
    echo $sql;echo "<br>";
    $stmt = $dbh->prepare($sql);     //执行预处理
    $id = $_GET['id'];
    $res = $stmt->execute([$id]);
    echo "<hr>";
    //获取错误信息
    $err_code = $stmt->errorCode();
    echo '<pre>';
    var_dump($err_code);
    echo '</pre>';
    $err_msg = $stmt->errorInfo();
    echo '<pre>';
    var_dump($err_msg);
    echo '</pre>';
    //获取查询结果
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($rows);
    echo '</pre>';