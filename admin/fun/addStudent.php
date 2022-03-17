<?php
    require_once("../../config/database.php");
    $sid=$_POST["sid"];
    $pwd=md5(substr($sid,-6));
    if(!is_numeric($_POST["phone_number"])){
        echo "电话号码格式不符合要求";
        exit();
    }
    
    $com="insert into student ( sid,name,sex,age,class,did,mid,ID_number,phone_number,pwd ) values(".$_POST["sid"].",'".$_POST["name"]."','".$_POST["sex"]."','".$_POST["age"]."','".$_POST["class"]."','".$_POST["did"]."','".$_POST["mid"]."','".$_POST["idnum"]."','".$_POST["phone_number"]."','$pwd' )" ;
    $result=mysqli_query($db,$com);
    
    if($result){
        echo "添加学生成功，同时已新建学生账户，密码为学号后六位";
    }
    else{
        echo "数据未更改。";
    }

    mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>