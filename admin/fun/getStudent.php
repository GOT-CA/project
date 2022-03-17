<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../layui/css/layui.css">
</head>

<body style="margin: 0 50px">
    
<table class="layui-table">
<thead>
<tr>
    <th style="min-width: 6%;">学号</th>
    <th style="min-width: 5%;">姓名</th>
    <th style="min-width: 3%;">性别</th>
    <th style="min-width: 8%;">院系</th>
    <th style="min-width: 8%;">证件号码</th>
    <th style="min-width: 3%;">操作</th>
</tr>
</thead>
<?php
require_once("../../config/database.php");

$com='select * from student natural join major natural join (select did,dname from department) as didname where 1=1' ;
if($_POST['sid']){
    $com=$com.' and sid like "%'.$_POST['sid'].'%"';
}
if($_POST['name']){
    $com=$com.' and name like "%'.$_POST['name'].'%"';
}
if($_POST['sex']){
    $com=$com.' and sex="'.$_POST['sex'].'"';
}
if($_POST['dname']){
    $com=$com.' and dname like "%'.$_POST['dname'].'%"';
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
            <td><?php echo $row->SID ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->sex ?></td>
            <td><?php echo $row->dname ?></td>
            <td><?php echo $row->ID_number ?></td>
            <td><a href="modiStudentInfo.php?sid=<?php echo $row->SID; ?>" target="frame">
            	<button class="layui-btn layui-btn-warm layui-btn-sm">修改信息</button>
            	</a>
            <a href="delStudent.php?sid=<?php echo $row->SID; ?>">
            	<button class="layui-btn layui-btn-danger layui-btn-sm">删除学生</button>
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
