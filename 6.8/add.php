<?php
    $arr = $_POST;
    $host = "127.0.0.1";        //数据库地址
    $db = 'goods';            //数据库名
    $user = 'root';             //数据库用户名
    $pass = 'root';        // 数据库的用户密码
    $dbh = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

    $uname = $arr['name'];
    $unum = $arr['num'];
    $kucun = $arr['kucun'];
    $desc = $arr['desc'];
    $sql = "insert into p_goods(goods_name,goods_number,shop_price,goods_desc)values (?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(1,$uname);
    $stmt->bindParam(2,$unum);
    $stmt->bindParam(3,$kucun);
    $stmt->bindParam(4,$desc);
    $ccc = $stmt->execute(); //执行sql
    if ($ccc) {
        echo '执行成功';
    } else {
        echo '执行失败';
    }
