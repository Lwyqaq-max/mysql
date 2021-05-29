<?php 
    //接受POST传参
    if(empty($_POST)){
        die("没有提交数据");
    }

    $user_info=[];
    //判断字段不能为空
    foreach($_POST as $k=>$v){
        $input = trim($v); //去空格
        if(empty($input)){
            die($k. "字段不能为空");
        }

        //用户信息保存在新数组中
        $user_info[$k] = $input;
    }
    echo "<hr>";
    echo "<pre>";print_r($user_info);echo "</pre>";


    //验证用户名是否符合用户名规则  大小写英文字母不小于    6
    $patten = "/^[a-zA-Z]{6,}$/";
    if(!preg_match($patten,$user_info['u_name'])){
        die('用户名不符合规则');
    }

    // 验证email
    if(!filter_var($user_info["u_email"],FILTER_VALIDATE_EMAIL)){
        die("Email不符合规则");
    }

    //验证手机号
    $patten = "/^1[356789]\d{9}$/";
    if(!preg_match($patten,$user_info["u_tel"])){
        die('手机号不符合规则');
    }


    //验证密码
    if($user_info["u_pass1"]!==$user_info["u_pass2"]){
        die('密码与确认秘密不一致');
    }

    echo "注册成功";



























    // $user_name = $_POST["u_name"];
    // //验证用户名否符合用户名规则   
    // $patten = "/^[a-zA-Z0-9_]{5,10}$/";
    // if(!preg_match($patten,$user_name)){
    //     echo "用户名不符合规则<br>";
    // }
    // $user_email = $_POST["u_email"];
    // $patten1 = "/^[A-Za-z0-9]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/";
    // if(!preg_match($patten1,$user_email)){
    //     echo "email不符合规则<br>";
    // }
    // $user_tel = $_POST["u_tel"];
    // $patten2 = "/^13[0-9]{9}$/";
    // if(!preg_match($patten2,$user_tel)){
    //     echo "tel不符合规则<br>";
    // }
    // $user_pass = $_POST["u_pass1"];
    // $patten3 = "/^\w{6,18}$/";
    // if(!preg_match($patten3,$user_pass)){
    //     echo "pass不符合规则<br>";
    // }
    // $user_pass1 = $_POST["u_pass2"];
    // if($user_pass!=$user_pass1){
    //     echo "重复密码不符合规则<br>";
    // }