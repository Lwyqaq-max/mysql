<?php
        echo '<pre>';print_r($_POST);echo '</pre>';
        $dizhi =$_POST['dizhi'];
        $age = intval($_POST['age']);
        $username = $_POST['username'];

        include "include.php";
        $sql = "insert into php6(username,age,dizhi)values('{$username}','{$age}','{$dizhi}')";
        $stmt = mysqli_query($link,$sql);
        mysqli_stmt_execute($stmt);
        if($stmt){
        echo '添加成功';
        header("refresh:2 url='1.php'");exit;
        }else{
        echo '添加失败';
        header("refresh:2 url='list.php'");die;
        }
        ?>
