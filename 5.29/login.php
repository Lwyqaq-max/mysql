<?php
      $value = trim($_POST['u']);         //可以是 username、email、mobile
      $upass = trim($_POST['pass']);
  
      $host = "127.0.0.1";        // Mysql的主机地址
      $user = 'root';             //数据库的用户名
      $pass = 'root';        // 数据库密码
      $db = "php2102";            //使用的数据库
  

      $link = new mysqli($host, $user, $pass, $db);


      $sql = "select * from users where username='{$value}' or email='{$value}' or mobile='{$value}'";
    //   echo $sql ;echo '<br>';


    $result = mysqli_query($link,$sql);

    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC); 
    
  

    if(empty($rows)){
        die('查无此人');
    }
 
    // 用户信息$rows[0]
 
    // 验证密码 password_verify
    if($upass == $rows[0]['password']){
        echo '登陆成功';
        //更新一下最后一次登录时间
        // $now = time();
        // $sql = "update users set last_login_time={$now} where userid={$rows[0]['userid']}";      
    }else{
        echo '登陆失败';
    }