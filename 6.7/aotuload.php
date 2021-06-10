<?php
    function autoload($class_name){
        echo "正在new" . $class_name;die();
    }
    //注册自动加载函数
    spl_autoload_register('autoload');
    $b = new Cat();


//    new abc().ll;