<?php

    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $link = new mysqli($host,$name,$pass,$db);
if($_POST){

    $now = time();
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
       $name =  $_POST['uname'];
       $_admin = $_POST['admin'];
       $sql = "insert into question_bank(`q_name`,`q_man`,`q_time`)values('$name','$_admin','$now')";
 ;
    $stmt = mysqli_prepare($link,$sql);
    $result = mysqli_stmt_execute($stmt);
    if(empty($result)){
        echo "不能添加php验证";
    }else{
        echo "添加成功";
    }
    $sql1 = "select * from question_bank";
    $res = mysqli_query($link,$sql1);
    $arr = mysqli_fetch_all($res);


    $userid= $_GET['id'];
    $add = "delete from question_bank where q_id = '$userid'";
    $acc = mysqli_query($link,$add);
    }

   ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="6-7.php" method="post">
    <table>
        <tr>
            <td>题库名称</td>
            <td>
                <input type="text" name="uname">
            </td>
        </tr>
        <tr>
            <td>题库添加人</td>
            <td><input type="text" name="admin"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="添加">
            </td>
        </tr>
    </table>
</form>
    <table border="1">
        <tr>
            <td>题库id</td>
            <td>题库名称</td>
            <td>题库添加入</td>
            <td>题库添加时间</td>
            <td>操作</td>
        </tr>

    <?php foreach ($arr as $k=>$v){ ?>
        <tr>
        <td><?php echo $v[0] ?></td>
        <td><?php echo $v[1] ?></td>
        <td><?php echo $v[2] ?></td>
        <td><?php echo date("Y-m-d H:i:s",$v[3]+28800) ?></td>
            <td><a href="./del.php?id=<?php echo $v[0] ?>">删除</a></td>
        </tr>
      <?php

    }  ?>
    </table>
</body>
</html>
