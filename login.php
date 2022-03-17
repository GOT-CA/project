<?php
session_start();
$user=$_POST["user"];
$pass=$_POST["pass"];
$pwd=md5($pass);

require_once('./config/database.php');

$com1 = "SELECT sid FROM student WHERE sid='$user' AND pwd='$pwd'";
$com2 = "SELECT tid FROM teacher WHERE tid='$user' AND pwd='$pwd'";
$com3 = "SELECT aid FROM admin WHERE aid='$user' AND pwd='$pwd'";

$result1=mysqli_query($db,$com1);
$result2=mysqli_query($db,$com2);
$result3=mysqli_query($db,$com3);

if($result1->num_rows>0){
    $_SESSION["login"]=true;
    $_SESSION["user"]=$user;
    header ("HTTP/1.1 302 Moved Temporatily"); 
    header ("Location: "."./user/"); 
    exit();
}
else if($result2->num_rows>0){
    $_SESSION["login"]=true;
    $_SESSION["teacher"]=$user;
    header ("HTTP/1.1 302 Moved Temporatily"); 
    header ("Location: "."./teacher/"); 
    exit();
}
else if($result3->num_rows>0){
    $_SESSION["login"]=true;
    $_SESSION["admin"]=$user;
    header ("HTTP/1.1 302 Moved Temporatily");
    header ("Location: "."./admin/");
    exit();
}
else{
    header ("HTTP/1.1 302 Moved Temporatily"); 
    header ("Location: "."./?retry=1"); 
    exit();
}
 
?>