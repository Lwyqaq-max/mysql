<?php
    $name = "root";
    $pass = "root";
    $host = "127.0.0.1";
    $db = "goods";
    $page_num = 10;
    $page= empty($_GET['page'])?1:$_GET['page'];
    intval($page);
    if($page < 1){
        $page = 1 | "1";
    }
    $limit =($page-1)*$page_num;
    $link = new mysqli($host,$name,$pass,$db);
    $sql = "select * from p_goods order by goods_id desc limit $limit,$page_num";
    $result = mysqli_query($link,$sql);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $sqll = "select * from p_goods";
    $sear = mysqli_query($link,$sqll);
    $res = mysqli_fetch_all($sear,MYSQLI_ASSOC);
    $ccc = count($res);
    $aaa = $ccc / 10 ;
    $bbb = ceil($aaa);

    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>



    </style>
</head>
<body>
    <?php foreach ($rows as $v=>$k) { ?>
        <li><a href="./goods.php ?id=<?php echo $k['goods_id'] ?>">
                <?php echo $k['goods_name']?>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="./edit.php?id=<?php echo $k['goods_id'] ?>">可编辑的信息</a>
        </li>
    <?php } ?>

    <a href="./goods_list.php?page=<?php echo $page-1 ?>">上一页 |</a>
    <a href="./goods_list.php?page=<?php echo $page+1 ?>">下一页</a><br>
    <a href="">总页数</a><?php echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;"; echo $bbb; echo "<br>";?>
    <a href="">当前页</a><?php echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;"; echo $page ?>
    <br>
    <a href="./goods_list.php?page=<?php echo $page=1 ?>">首页 | </a>
    <a href="./goods_list.php?page=<?php echo $page=$bbb?>">尾页</a><br>
    <?php for($i=1;$i<=$bbb;$i++){ ?>
            <a href="./goods_list.php?page=<?php echo $page=$i ?>"><?php echo $i ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <?php } ?>
</body>
</html>