<?php
    require_once("../../config/database.php");
    $did=$_POST["did"];
    
    $com="insert into department ( did,dname,address ) values('".$_POST["did"]."','".$_POST["dname"]."','".$_POST["address"]. "')" ;
    $result=mysqli_query($db,$com);
    
    if($result){
        echo "添加学院成功";
    }
    else{
        echo "数据未更改。";
    }

    mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>