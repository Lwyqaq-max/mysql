<?php
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $page_num = 10;
    $page = empty($_GET['page'])?1:$_GET['page'];
    $limit =($page-1)*$page_num;
    $link = new mysqli($host,$name,$pass,$db);
    $sql = "select * from p_goods order by goods_id desc limit $limit,$page_num";
    $result = mysqli_query($link,$sql);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach ($rows as $v=>$k) { ?>
        <li><a href="./goods.php ?id=<?php echo $k['goods_id'] ?>">
                <?php echo $k['goods_name']?>
            </a></li>
    <?php } ?>
    <a href="./goods_list.php?page=<?php echo $page-1 ?>">上一页</a>
    <a href="./goods_list.php?page=<?php echo $page+1 ?>">下一页</a>
</body>
</html>