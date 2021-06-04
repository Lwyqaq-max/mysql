<?php
    echo '<pre>';print_r($_POST);echo '</pre>';
    $address = trim($_POST['address']);
    $age = trim($_POST['age']);
    $username = trim($_POST['username']);


    $host = "127.0.0.1"; //mysql的主机地址
    $user = "root" ;  //数据库的用户名
    $pass = "root";     //数据库密码
    $db = "php2102";     //使用的数据库

    $link = new mysqli($host,$user,$pass,$db);   //链接数据库

    $sql = "insert into php7(username,age,address)values ('{$username}','{$age}','{$address}')";
     $stam = mysqli_prepare($link,$sql);

     $resube = mysqli_stmt_execute($stam);

     $saq = "select * from php7";

     $result = mysqli_query($link,$saq) ;

     $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
    <table border="1">
        <thead>
            <tr>
                <th>姓名</th>
                <th>年龄</th>
                <th>住址</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $k=>$v)
                if($v["age"]>18){
                    echo "成年";
                }else{
                    echo "未成年";
                }


                echo "<tr>";
                echo "<td>{$v['username']}";
            echo "<td>{$v['age']}";
            echo "<td>{$v['address']}";
            echo "</tr>";
                ?>
        </tbody>
    </table>
</body>
</html>
