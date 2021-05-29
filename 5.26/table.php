<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $list = [
        ["name"=>"zhangsan","age"=>11,"email"=>"zhangsan@qq.com"],
        ["name"=>"lisi","age"=>22,"email"=>"lisi@qq.com"],
        ["name"=>"wangwu","age"=>33,"email"=>"wangwu@qq.com"],
        ["name"=>"zhaoliu","age"=>44,"email"=>"zhaoliu@qq.com"],
    ];
    ?>
  <table border="1">
    <?php
         foreach($list as $k=>$v){
             echo "<tr><td>"."姓名".$v["name"]."</td>"."<td>"."年龄".$v["age"]."</td>"."<td>"."email:".$v["email"]."</td></tr>";
         }
        // $length = count($list);
        // for($i=0;$i<$length;$i++){
        //     echo "<tr><td>"."姓名".$list[$i]["name"]."</td>"."<td>"."年龄".$list[$i]["age"]."</td>"."<td>"."email:".$list[$i]["email"]."</td></tr>";
        // }
     ?>   
    </table>
</body>
</html>