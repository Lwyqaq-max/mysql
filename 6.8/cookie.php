<?php
session_start();
//销毁cookie
echo "已退出登录"."<br>";
echo "两秒后跳转到登陆页面";
echo setcookie('userid','',time()-1,'/');
unset($_SESSION['username']);
header('Refresh:2;url="./login.html"');