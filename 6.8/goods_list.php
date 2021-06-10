<?php
    $host = "127.0.0.1";
    $db = "goods";
    $user = "root";
    $pass = "root";
    $dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
    $page_num = 10;
    $page= empty($_GET['page'])?1:$_GET['page'];
    intval($page);
    if($page < 1){
        $page = 1 | "1";
    }
    $limit =($page-1)*$page_num;

    $sql = "select * from p_goods order by goods_id desc limit $limit,$page_num";
    $stmt = $dbh->prepare($sql);     //执行预处理
    $res = $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); //从$stmt结果集中取得所有行为的关联数组
    $sqll = "select * from p_goods";
    $stmtt = $dbh->prepare($sqll);     //执行预处理
    $res = $stmtt->execute();
    $acc = $stmtt->fetchAll(PDO::FETCH_ASSOC);
    $ccc = count($acc);
    $aaa = $ccc / 10 ;
    $bbb = ceil($aaa);
    echo '<pre>';
    print_r($bbb);
    echo '</pre>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .aa{
            margin-left: 15px;
            color: red;
            text-decoration: none;
        }
        .aa:hover{
            border-bottom: 1px solid red;
        }
        .aaa{
            font-weight: bold;
            color: #1cc685;
            text-decoration: none;
        }
        .aaa:hover {
            border-bottom:3px solid #1cc685 ;
        }

    </style>
</head>
<body>
<?php foreach ($rows as $v=>$k) { ?>
    <li><a href="./goods.php ?id=<?php echo $k['goods_id'] ?>" class="aaa">
            <?php echo $k['goods_name']?>
        </a>
        <a href="./edit.php?id=<?php echo $k['goods_id'] ?>" class="aa">可编辑的信息</a>
    </li>
<?php } ?>
<hr>
<a href="./goods_list.php?page=<?php echo $page-1 ?>" class="aaa">上一页 |</a>
<a href="./goods_list.php?page=<?php echo $page+1 ?>" class="aaa">下一页</a><br>
<a href="" class="aaa">总页数</a><?php echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;"; echo $bbb; echo "<br>";?>
<a href="" class="aaa">当前页</a><?php echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;"; echo $page ?>
<br>
<a href="./goods_list.php?page=<?php echo $page=1 ?>" class="aaa">首页 | </a>
<a href="./goods_list.php?page=<?php echo $page=$bbb?>" class="aaa">尾页</a><br>
<?php for($i=1;$i<=$bbb;$i++){ ?>
    <a href="./goods_list.php?page=<?php echo $page=$i ?>" class="aaa"><?php echo $i ."页" ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
</body>
</html>