<?php
    $username = trim($_GET['name']);    //接受URL参数

    include "include.php";
    // 获取php表中的数据
    $sql = 'select * from php2 where username=".$uesrname."';
    echo $sql;echo '</br>';
    $result = mysqli_query($link,$sql);
    echo '<pre>';print_r(mysqli_fetch_all($result,MYSQLI_ASSOC));echo '</pre>';