<?php
if($_POST){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $uname = trim($_POST['uname']);
    $price = trim($_POST['jiage']);
    $dan = trim($_POST['dan']);
    $teacher = trim($_POST['teacher']);
    $host = "127.0.0.1";
    $db = "goods";
    $user = "root";
    $pass = "root";
    $dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
    $sql ="insert into linux_goods(`c_name`,`c_price`,`c_serialize`,`c_teacher`)values (?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(1,$uname);
    $stmt->bindParam(2,$price);
    $stmt->bindParam(3,$dan);
    $stmt->bindParam(4,$teacher);
    $cccc = $stmt->execute();
    $sqll = "select * from linux_goods";
    $stmtt = $dbh->prepare($sqll);
    $aaaa = $stmtt->execute();
    $accccc = $stmtt->fetchAll(PDO::FETCH_ASSOC);
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
<form action="./reg.php" method="post">
    <table border="1">
        <tr>
            <td>课程名称</td>
            <td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td>课程价格</td>
            <td><input type="text" name="jiage"></td>
        </tr>
        <tr>
            <td>是否连载</td>
            <td>
                <input type="radio" name="dan" value="是">是
                <input type="radio" name="dan" value="否">否
            </td>
        </tr>
        <tr>
            <td>该课程讲师</td>
            <td>
                <input type="text" name="teacher">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
<table border="1">
    <tr>
        <td>课程名称</td>
        <td>课程价格</td>
        <td>是否连载</td>
        <td>该课程讲师</td>
    </tr>
    <?php foreach ($accccc as $k=>$v){ ?>
        <tr>
            <td><?php echo $v['c_name'] ?></td>
            <td><?php echo $v['c_price']."元" ?></td>
            <td><?php if($v['c_serialize']=="是"){
                    echo "连载中";
                } else{
                    echo "完成";
                }?></td>
            <td><?php echo $v['c_teacher']  ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
