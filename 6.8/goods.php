<?php
if(isset($_GET["id"]) ==false){
    echo '没有此页面哦 亲';
    header('Refresh:1; url=./goods_list.php');
    die();
}

$userid= intval($_GET['id']);
$host = "127.0.0.1";
$db = "goods";
$user = "root";
$pass = "root";
$dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);

$sql = "select * from p_goods where goods_id = '{$userid}'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($res);
echo '</pre>';
echo "商品id:            ".$res[0]['goods_id'];echo "<br>";
echo "商品名:            ".$res[0]['goods_name'];echo "<br>";
echo "浏览量:             ".$res[0]['click_count'];echo "<br>";
echo "价格:               ".$res[0]['shop_price'];echo "<br>";
$aa = date("Y-m-d H:i:s",$res[0]['add_time']);
echo "时间:  ".$aa;echo "<br>";




