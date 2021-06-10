<?php
    session_start();                  //开启会话
    $value = trim($_POST['u']);         //可以是 username、email、mobile
    $upass = trim($_POST['pass']);       //接收密码
    $host = "127.0.0.1";
    $db = "php2102";
    $user = "root";
    $pass = "root";
    $dbh = new PDO("mysql:host={$host}; dbname={$db}",$user,$pass);
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
//sql语句  执行查找php4里面 的username email mobile
    $sql = "select * from php4 where username=? or email= ? or mobile= ?";
    $stmt = $dbh->prepare($sql);     //执行预处理
    $stmt->bindParam(1,$value);
    $stmt->bindParam(2,$value);
    $stmt->bindParam(3,$value);
    $res = $stmt->execute();
    $rows =  $stmt->fetchAll(PDO::FETCH_ASSOC); //从$stmt结果集中取得所有行为的关联数组
    //查询数据库
    //输出方式
//如果$rows为空
    if(empty($rows)){
        header('Refresh:1; url=./login.html');
        die('查无此人');   //停止运行  然后执行查无此人
    }

// 用户信息$rows[0]
// 验证密码 password_verify
//判断密码是否与改密码的哈希值匹配
if(password_verify($upass, $rows[0]['password2'])){   //返回的是 true  或   false
    echo '登陆成功,欢迎来到您的主页';   //如果是true  则 echo 一个 登录成功
    echo "<br>";
    echo "正在跳转至您的个人中心";echo "<br>";
    //更新一下最后一次登录时间
    $now = time();   //时间戳
    //sql语句    更新一下最后一次登录时间是时间戳    是userid
    $sql = "update users set last_login_time= ? where userid= ?"; //{$now}
    $aaa =$rows[0]['userid'];
    $stmt1 = $dbh->prepare($sql);
    $stmt1->bindParam(1,$aaa);
    $stmt1->bindParam(2,$now);
    $res = $stmt1->execute();
    $_SESSION['username']=$rows[0]['username'];   //会话数组 里面 的username  等于
    setcookie('userid',$rows[0]['userid']);  //设置cookie 名字是 userid   value是$row[0]["userid"]
    var_dump(setcookie('userid',$rows[0]['userid']));
    header('Refresh:2;url="./my.php"');  //跳转
    $uid = $rows[0]["userid"];
    $login_time = $now;   //最后一次登陆时间
    $login_ip = $_SERVER['REMOTE_ADDR'];
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $sql = "insert into login_history(uid,login_time,login_ip,ua)
         values(?,?,?,?)";
    $stmt2 = $dbh->prepare($sql);
    $stmt2->bindParam(1,$uid);
    $stmt2->bindParam(2,$login_time);
    $stmt2->bindParam(3,$login_ip);
    $stmt2->bindParam(4,$ua);
    $stmt2->execute();
}else{
    echo '登陆失败';
    header('Refresh:1; url=./login.html');
}
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

?>