<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../layui/css/layui.css">
</head>

<body style="margin: 0 50px">
    
<table class="layui-table">
<thead>
<tr>
    <th style="min-width: 6%;">教工号</th>
    <th style="min-width: 5%;">姓名</th>
    <th style="min-width: 3%;">性别</th>
    <th style="min-width: 8%;">证件号码</th>
    <th style="min-width: 3%;">操作</th>
</tr>
</thead>
<?php
require_once("../../config/database.php");

$com='select * from teacher where 1=1' ;
if($_POST['tid']){
    $com=$com.' and tid like "%'.$_POST['tid'].'%"';
}
if($_POST['name']){
    $com=$com.' and name like "%'.$_POST['name'].'%"';
}
if($_POST['sex']){
    $com=$com.' and sex="'.$_POST['sex'].'"';
}
if($_POST['idnum']){
    $com=$com.' and ID_number like "%'.$_POST['idnum'].'%"';
}

$result=mysqli_query($db,$com);
if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $row->TID ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->sex ?></td>
            <td><?php echo $row->ID_number ?></td>
            <td><a href="modiTeacherInfo.php?tid=<?php echo $row->TID; ?>" target="frame">
            	<button class="layui-btn layui-btn-warm layui-btn-sm">修改信息</button></a>
            <a href="delTeacher.php?tid=<?php echo $row->TID; ?>">
            <button class="layui-btn layui-btn-danger layui-btn-sm">删除教师</button></a></td>
        </tr>
        </tbody>
        <?php
    }
}

mysqli_close($db);
?>
</table>
</body></html>
