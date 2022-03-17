<?php
session_start();
require_once("../../config/database.php");
$com="update course set flag='0' where cid='".$_GET["cid"]."'" ;
$com1="update teaches set flag='0' where cid='".$_GET["cid"]."' and tid='".$_GET["tid"]."'";

$result=mysqli_query($db,$com);
$result1=mysqli_query($db,$com1);
if($result && $result1){
    echo '<h4 style="margin:30px;">提示：添加课程成功！</h4>';
}
else{
    echo '<h4 style="margin:30px;">注意：添加课程失败！</h4>';
}
    
    mysqli_close($db);
?>