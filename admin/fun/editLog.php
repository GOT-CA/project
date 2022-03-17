<?php

require_once("../../config/database.php");


$com="update rewards_punishment set type='".$_POST["type"]."',reason='".$_POST["reason"]."',detail='".$_POST["detail"]."' where rid='".$_POST["rid"]."' " ;
$com1="update stud_re set sid='".$_POST["sid"]."',logdate='".$_POST["logdate"]."' where rid='".$_POST["rid"]."' " ;

$result=mysqli_query($db,$com);
$result1=mysqli_query($db,$com1);
if($result && $result1){
    echo '<h4 style="margin:30px;">提示：信息更改成功！</h4>';
}
else{
    echo '<h4 style="margin:30px;">注意：数据未更改！</h4>';
}

mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block"  href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>
