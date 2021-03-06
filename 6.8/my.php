<?php
    session_start();
    $host = "127.0.0.1";
    $db = "php2102";
    $user = "root";
    $pass = "root";
    $dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "你好 {$username}[{$_COOKIE['userid']}],欢迎回来";
    }else{
        echo "请先登录";
        header('Refresh:1; url=./login.html');
        die;
    }
    echo '<pre>';
    print_r($_COOKIE);
    echo '</pre>';
    $cid = $_COOKIE['userid'];
    $sql = "select * from login_history where uid = ?";
    $stmt = $dbh->prepare($sql);     //执行预处理
    $stmt->bindParam(1,$cid);
    $res = $stmt->execute();
    $row =  $stmt->fetchAll(PDO::FETCH_ASSOC); //从$stmt结果集中取得所有行为的关联数组
    echo '<pre>';
    print_r($row);
    echo '</pre>';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            padding: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 15px;
        }
        a{
            text-decoration: none;
            color: black;
            font-size: 15px;
        }
    </style>
</head>
<body>
<br>
<a href="cookie.php">退出登录</a><br>
<table border="1px" cellpadding="0" cellspacing="0">
    <tr>
        <td>uid</td>
        <td>上次登录时间</td>
        <td>上次登录你的ip</td>
        <td>你的ua</td>
        <td>操作</td>
    </tr>
    <?php foreach ($row as $k=>$v){?>
        <tr>
            <td><?php echo $v['uid']?></td>
            <td><?php echo date("Y-m-d H:i:s",$v['login_time']+28800)?></td>
            <td><?php echo $v['login_ip']?></td>
            <td><?php echo $v['ua']?></td>
            <td><a href="name.php ?id=<?php echo $v['userid'] ?>">删除</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>