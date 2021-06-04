<?php
    include "include.php";
    $userid= $_GET['id'];
    echo $userid;

    $add = "delete from login_history where userid = '$userid'";
    $acc = mysqli_query($link,$add);

    if($acc){
        echo '成功';
        header("Refresh:0;url=./my.php");
    }else{
        echo '失败';
    }


