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
    <h3 class="title">选课管理</h3>
<div style="margin:0 50px">
<table class="layui-table" >

    <thead>
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>地点</th>
        <th>教师名</th>
        <th>备注</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php

    $com="select * from course natural join teaches natural join (select TID,name from teacher) as t natural join (select cid,SID,status from takes where score is null and sid='$sid') as s " ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->address ?></td>
                <td><?php echo $row->name ?></td>
                <td>
                	<?php if($row->status=='1')echo('重修')?>
                </td>
                <td><a href="delCourse.php?cid=<?php echo $row->CID."&sid=".$row->SID; ?>">
                <button class="layui-btn layui-btn-danger layui-btn-sm">退选</button>
                	</a></td>
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