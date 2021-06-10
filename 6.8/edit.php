<?php
$host = "127.0.0.1";
$db = "goods";
$user = "root";
$pass = "root";
$dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
$userid= intval($_GET['id']);

$sql = "select * from p_goods where goods_id = '$userid'";
$stmt = $dbh->prepare($sql);
$res = $stmt->execute();
$rows =  $stmt->fetchAll(PDO::FETCH_ASSOC); //从$stmt结果集中取得所有行为的关联数组

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
    商品ID： <input type="text" value="<?php echo $rows[0]['goods_id'] ?>" name="id"><br>
    商品名： <input type="text" value="<?php echo $rows[0]['goods_name'] ?>" name="name"><br>
    商品价格： <input type="text" value="<?php echo $rows[0]['shop_price'] ?>" name="num"><br>
    商品库存： <input type="text" value="<?php echo $rows[0]['click_count'] ?>" name="kucun"><br>
    <input type="submit" value="提交">
</form>
</body>
</html>
