<?php
    $neirong = $_GET['search'];
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $link = new mysqli($host,$name,$pass,$db);
    $page_num = 5;
    $page= empty($_GET['page'])?1:$_GET['page'];

    intval($page);
    if($page < 1){
        $page = 1 | "1";
    }
    $limit =($page-1)*$page_num;

    $sql = "select * from p_goods where goods_name like '%" .$neirong. "%' limit $limit,$page_num";


    $arr = mysqli_query($link,$sql);
    $res = mysqli_fetch_all($arr,MYSQLI_ASSOC);
    $aaa = count($res);
    if($aaa<1){
        header('Refresh:1; url=./Search.html');
        die("<big>没有其他商品了哦，您再去搜搜？</big>");
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
     <?php foreach ($res as $k=>$v){
        $replave = "<span style='color: red'>{$neirong}</span>";
        $new_name = str_replace($neirong,$replave,$v['goods_name']);
        echo '<li>';
        echo "<a href =../6.3/goods.php?id={$v['goods_id']}>{$new_name}</a>";
        echo '</li>';
  } ?>
     <a href="./Search.php?page=<?php echo $page-1?>&search=<?php echo $neirong ?>">上一页 |</a>
     <a href="./Search.php?page=<?php echo $page+1?>&search=<?php echo $neirong ?>">下一页</a><br>
</body>
</html>