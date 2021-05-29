<?php
    $arr = ['zhangsan','lisi','baby','mike','abc','john','jack','zhaoliu'];
    //  var_dump(array_reverse($arr));
    
    // sort($arr);
    // echo '<pre>';
    // print_r($arr);
    // echo '</pre>';

    //  $arr = [
    //      ["name"=>"zhangsan","age"=>"11","email"=>"zhangsan@qq.com"],
    //      ["name"=>"lisi","age"=>"22","email"=>"lisi@qq.com"],
    //      ["name"=>"wangwu","age"=>"33","email"=>"wangwu@qq.com"],
    //      ["name"=>"zhaoliu","age"=>"44","email"=>"zhaoliu@qq.com"],
    //  ];
    //  echo 'pre'; print_r($arr);echo '</pre>';
    //  $arr_age = array_column($arr,"age");
    //  $arr_name = array_column($arr,"name");
    //  echo '<pre>';print_r($arr_age);echo '</pre>';
    //  echo '<pre>';print_r($arr_name);echo '</pre>';

    // $k = array_rand($arr,3);  //取随机的key
    // echo '<pre>';print_r($k);echo '</pre>';
    // var_dump($k);
    //     die;
    // echo "<pre>";
    // print_r(array_rand($arr,'2'));

    // echo "随机的key是：".$k;echo '</br>';
    // echo $arr[$k];

    // var_dump(in_array('lis1i',$arr));  //判断数组里面是否含有值

    // var_dump(shuffle($arr));


    // $arr1 = [1,2,3,4,8,6,5] ;
    // $arr3 = array_merge($arr,$arr1);
    // echo '<pre>';print_r($arr3);echo '</pre>'; //合并数组

    // array_reverse()倒叙数组
    echo '<pre>';
    print_r(array_reverse($arr));
    echo '</pre>';
    
