<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../layui/css/layui.css">
</head>

<body style="margin: 0 50px">
    
<table class="layui-table">
<thead>
<tr>
    <th style="min-width: 6%;">专业编号</th>
    <th style="min-width: 5%;">专业名</th>
    <th style="min-width: 3%;">所属学院</th>
    <th style="min-width: 3%;">修读年限</th>
    <th style="min-width: 3%;">操作</th>
</tr>
</thead>
<?php
require_once("../../config/database.php");

$com='select * from major natural join department where 1=1' ;
if($_POST['mid']){
    $com=$com.' and mid like "%'.$_POST['mid'].'%"';
}
if($_POST['mname']){
    $com=$com.' and mname like "%'.$_POST['mname'].'%"';
}
if($_POST['did']){
    $com=$com.' and did="'.$_POST['did'].'"';
}
if($_POST['study_time']){
    $com=$com.' and study_time="'.$_POST['study_time'].'"';
}

$result=mysqli_query($db,$com);
if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $row->MID ?></td>
            <td><?php echo $row->mname ?></td>
            <td><?php echo $row->dname ?></td>
            <td><?php echo $row->study_time ?></td>
            <td><a href="modiMajorInfo.php?mid=<?php echo $row->MID; ?>" target="frame">
            	<button class="layui-btn layui-btn-warm layui-btn-sm">修改信息</button>
            	</a>
            <a href="delMajor.php?mid=<?php echo $row->MID; ?>">
            	<button class="layui-btn layui-btn-danger layui-btn-sm">删除专业</button>
            	</a></td>
        </tr>
        </tbody>
        <?php
    }
}

mysqli_close($db);
?>
</table>
</body></html>
