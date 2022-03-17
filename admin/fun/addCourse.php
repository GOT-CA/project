<?php

require_once("../../config/database.php");
$cid=$_POST["cid"];
$cname=$_POST["cname"];
$credit=$_POST["credit"];
$address=$_POST["address"];
$did=$_POST["did"];
$tid=$_POST["tid"];


$com="insert into course (cid,cname,address,did,credit,flag) values('$cid','$cname','$address','$did','$credit','0')";
$com1="insert into teaches (cid,tid,flag) values('$cid','$tid','0')";


$result=mysqli_query($db,$com);
$result1=mysqli_query($db,$com1);
if($result && $result1){
    echo '<h4 style="margin:30px;">提示：已添加课程！</h4>';
}
else{
    echo '<h4 style="margin:30px;">注意：数据未更改！</h4>';
}

mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="./myLog.php">返回</a></div> </div>
