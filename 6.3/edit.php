<?php
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $link = new mysqli($host,$name,$pass,$db);
    $userid= intval($_GET['id']);
    $sql = "select * from p_goods where goods_id = '{$userid}'";
    $arr = mysqli_query($link,$sql);
    $res = mysqli_fetch_all($arr);
    echo '<pre>';
    print_r($res);
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
</head>
<body>
<form action="./from.php" method="post">
    商品ID： <input type="text" value="<?php echo $res[0][0] ?>" name="id"><br>
    商品名： <input type="text" value="<?php echo $res[0][3] ?>" name="name"><br>
    商品价格： <input type="text" value="<?php echo $res[0][6] ?>" name="num"><br>
    商品库存： <input type="text" value="<?php echo $res[0][4] ?>" name="kucun"><br>
    <input type="submit" value="提交">
</form>
</body>
</html>
