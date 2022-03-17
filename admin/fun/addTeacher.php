<?php
    require_once("../../config/database.php");
    $tid=$_POST["tid"];
    $pwd=md5(substr($tid,-4));
    
    if(!is_numeric($_POST["phone_number"])){
        echo "电话号码格式不符合要求";
        exit();
    }
    
    $com="insert into teacher ( tid,name,sex,age,ID_number,phone_number,pwd ) values(".$_POST["tid"].",'".$_POST["name"]."','".$_POST["sex"]."','".$_POST["age"]."','".$_POST["idnum"]."','".$_POST["phone_number"]."','$pwd' )" ;
    $result=mysqli_query($db,$com);
    
    if($result){
        echo "添加教师成功，同时已新建教师账户，密码为教工号后四位";
    }
    else{
        echo "数据未更改。";
    }

    mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>