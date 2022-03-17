<?php
error_reporting(0); 
session_start();
if(isset($_GET["retry"])){
    $wrong='<div class="inputbox">
                <span style="color:#df3a01;font-size:10px;margin:10px;display:block">用户名或密码错误</span>
            </div>';
}
if (!$_SESSION['login']==true) {
    print <<<END

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, height=device-height, inital-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="static/login.css" type="text/css" media="all" />
        <title>登录到系统 - 学生选课信息管理系统</title>
    </head>
    
    <body>
        <div class="loginbox">
            <div class="title">
            <span>
                学生选课信息管理系统
            </span>
            </div>

            <form action="login.php" method="post">

            <div class="inputborder">
                <span>
                    <img src="images\yonghu.png" width="5%">
                </span>
                <input name="user" required type="text" class="inputbox" >
            </div>
            <div class="inputborder">
                <span>
                    <img src="images\mima.png" width="5%">
                </span>
                <input name="pass" required type="password" class="inputbox" >
            </div>
            <div class="submitbox">
                <input name="submit" type="submit" class="submitbutton" value="用户登录">
            </div>
            $wrong
            </form>
        </div>
        <div class="footer">
        Copyright © 2020 Database Course Design. All rights reserved. 
        </div>
        <!-- Written by mrning -->
        <!-- 2019.12 -->
    </body>
</html>


END;

exit();
}
else{
    if(isset($_SESSION["admin"])){
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."./admin/"); 
        exit();
    }
    else{
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."./user/"); 
        exit();
    }
    
}

?>