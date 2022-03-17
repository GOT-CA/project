<?php
session_start();
$sid=$_SESSION["user"];
require_once("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body>
    <h3 class="title">奖惩查询</h3>
<div style="margin:0 50px">
<table class="layui-table">
	<thead>
    <tr>
        <th>奖惩</th>
        <th>缘由</th>
        <th>详情</th>
        <th>时间</th>
    </tr>
    </thead>
    <?php

    $com="select * from rewards_punishment natural join stud_re natural join (select sid from student) as s where sid='$sid'" ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                
                <td><?php echo $row->type ?></td>
                <td><?php echo $row->reason ?></td>
                <td><?php echo $row->detail ?></td>
                <td><?php echo $row->logdate ?></td>
            </tr>
            </tbody>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
</div>
</body>
</html>