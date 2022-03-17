
<?php
session_start();
require_once("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>课程管理>>课程申请</title>
</head>
<body>
    <h3 class="title">课程申请</h3>
<div style="margin:0 50px">
<table class="layui-table" >

    <thead>
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>上课地址</th>
        <th>教师名</th>
        <th>教师工号</th>
        <th>开课学院</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php

    $com="select * from course natural join teaches natural join (select name,tid from teacher) as t natural join (select did,dname from department) as d where flag='1'" ;
    
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
                <td><?php echo $row->TID ?></td>
                <td><?php echo $row->dname?></td>
                
                <!-- <td><a href="delCourse.php?cid=<?php echo $row->CID."&sid=".$row->SID; ?>">
                <button class="layui-btn layui-btn-warm layui-btn-sm">退选</button>
                	</a></td> -->
                
                <td><a href="./fun/acceptCourse.php?cid=<?php echo $row->CID."&tid=".$row->TID; ?>">
                		<button class="layui-btn layui-btn-sm">申请通过</button>
                	</a>
                	<a href="./fun/refuseCourse.php?cid=<?php echo $row->CID."&tid=".$row->TID; ?>">
                		<button class="layui-btn layui-btn-danger layui-btn-sm">拒绝申请</button>
                	</a>
                </td>
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