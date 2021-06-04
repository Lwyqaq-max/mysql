<?php
$host = "127.0.0.1";        // Mysql的主机地址
$user = 'root';             //数据库的用户名
$pass = 'root';        // 数据库密码
$db = "php2102";            //使用的数据库
$link = new mysqli($host, $user, $pass, $db);   //连接数据库