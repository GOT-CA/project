<?php
    require_once("../../config/database.php");
    $sid=$_POST["sid"];
    $check="select * from student where sid='$sid'";
    $checkrs=mysqli_query($db,$check);
    if($checkrs->num_rows==0){
        echo '<h4 style="margin:30px;">学号不存在！数据未更改。</h4>';
        exit();
    }
    $findrid="select max(rid)+1 mx from rewards_punishment";
    $trid=mysqli_query($db,$findrid);
    
    $row=mysqli_fetch_object($trid);
    
    $com="insert into rewards_punishment (rid,type,detail,reason) values('$row->mx','".$_POST["type"]."','".$_POST["detail"]."','".$_POST["reason"]."')" ;
    $com1="insert into stud_re (rid,sid,logdate) values('$row->mx','".$_POST["sid"]."','".$_POST["logdate"]."')";

    $result=mysqli_query($db,$com);
    $result1=mysqli_query($db,$com1);
    if($result && $result1){
        echo '<h4 style="margin:30px;">已添加记录！</h4>';
    }
    else{
        echo '<h4 style="margin:30px;">添加失败</h4>';
    }

    mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>