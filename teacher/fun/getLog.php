<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
</head>
<div style="margin:50px">
<table class="layui-table" >
	<thead>
    <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>奖惩</th>
        <th>缘由</th>
        <th>详情</th>
        <th>发生时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php
    require_once("../../config/database.php");

    $com='select * from rewards_punishment natural join stud_re natural join student where 1=1 ' ;
    if($_GET['sid']){
        $com=$com." and sid like '%".$_GET['sid']."%'";
    }
    if($_GET['name']){
        $com=$com." and name like '%".$_GET['name']."%'";
    }
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                
                <td><?php echo $row->SID?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->type ?></td>
                <td><?php echo $row->reason ?></td>
                <td><?php echo $row->detail ?></td>
                <td><?php echo $row->logdate ?></td>
                <td><a href="modiLog.php?rid=<?php echo $row->RID; ?>" target="frame">
                	<button class="layui-btn layui-btn-warm layui-btn-sm">修改</button>
                	</a>  <a href="delLog.php?rid=<?php echo $row->RID; ?>">
                	<button class="layui-btn layui-btn-danger layui-btn-sm">删除</button>
                	</a></td>
            </tr>
            </tbody>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
</body>
</html>