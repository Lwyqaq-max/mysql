<?php
    #生成随机字符串 
     function str_rand($lenght=10  ){
        $str0 = "ABCDEFGHIGKLMNOPQXYGUVWXYZabcdefghigklmnopqrsguvwxyz0123456789";
        $str1 = "";
        for($i=0;$i<$lenght;$i++){
            $num = mt_rand(0,55);
            echo "随机数" .$num;echo "<br>";
            echo "随机的字母:" .$str1[$num];echo "<br>";
            $c = $str0[$num];
            $str1 .= $c;
        }
        return $str1;
    }
    var_dump(str_rand());