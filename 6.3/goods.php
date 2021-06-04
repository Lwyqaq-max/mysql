<?php
    if(isset($_GET["id"]) ==false){
        echo '没有此页面哦 亲';
        header('Refresh:1; url=./goods_list.php');
        die();
    }

    $userid= intval($_GET['id']);
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $link = new mysqli($host,$name,$pass,$db);

    $sql = "select * from p_goods where goods_id = '{$userid}'";
    $arr = mysqli_query($link,$sql);
    $res = mysqli_fetch_all($arr);
    echo '<pre>';
    print_r($res);
    echo '</pre>';
    echo "商品id:            ".$res[0][0];echo "<br>";
    echo "商品名:            ".$res[0][3];echo "<br>";
    echo "浏览量:             ".$res[0][5];echo "<br>";
    echo "价格:               ".$res[0][6];echo "<br>";
    $aa = date("Y-m-d H:i:s",$res[0][10]);
    echo "时间:            ".$aa;
    echo "总页数";



