<?php
session_start();
require_once("../../config/database.php");
$com="delete from course where cid='".$_GET["cid"]."' and flag='1'" ;
// $com1="delete from teaches where cid='".$_GET["cid"]."' and tid='".$_GET["tid"]."' flag='1'";

$result=mysqli_query($db,$com);
if($result ){
    echo '<h4 style="margin:30px;">提示：申请已拒绝</h4>';
}
else{
    echo '<h4 style="margin:30px;">注意：拒绝申请失败</h4>';
}
    
    mysqli_close($db);
?>