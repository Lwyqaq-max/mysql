<?php
    session_start();
    $host = "127.0.0.1";
    $db = "php2102";
    $user = "root";
    $pass = "root";
    $dbh = new PDO("mysql:host={$host}; dbname={$db};charset=utf8",$user,$pass);
    (isset($_GET['id']) ? intval($_GET['id']) : 1);


    $userid= $_GET['id'];
    echo '<pre>';
    print_r($userid);
    echo '</pre>';
    $sql = "delete from login_history where userid = ?";
    $stmt = $dbh->prepare($sql);  //预处理
    $res = $stmt->execute([$userid]); //执行
    if($res){
        echo '成功';
        header("Refresh:0;url=./my.php");
    }else{
        echo '失败';
    }