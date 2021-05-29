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
            'AAAAA',
            'BBBBB',
            'CCCCC',
            'DDDDD',
            'EEEEE',
        ];
        ?>
    <ul>
        <?php
        // $lenght = count($List);
        //     for($i=0;$i<$lenght;$i++){
        //         echo "<li>".$list[$i]"</li>";
        //     };
        foreach($list as $k=>$v){
            echo "<li>".$v."</li>";
        }
        ?>
    </ul>
</body>
</html>