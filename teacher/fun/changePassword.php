<?php
require_once("../../config/database.php");
session_start();
if(!isset($_SESSION["teacher"])){
    echo "警告！非法访问！<br>Warning! Illegal Operation! ";
    exit();
}
$uid=$_SESSION["teacher"];
$old=md5($_POST["oldpass"]);
$new=md5($_POST["newpass"]);

$com1="select * from teacher where tid='$uid' and pwd='$old'";
$com2="update teacher set pwd='$new' where tid='$uid'";

$result1=mysqli_query($db,$com1);


if($result1->num_rows>0){ //user exists
    $result2=mysqli_query($db,$com2);
    if($result2){
        echo '<h4 style="margin:30px;">提示：密码更改成功。</h4>';
    }
    else{
    echo '<h4 style="margin:30px;">注意：数据未更改！</h4>';
    }
}
else{
    echo '<h4 style="margin:30px;">注意：认证错误，数据未更改。请检查你的输入。</h4>';
}
mysqli_close($db);
?>

