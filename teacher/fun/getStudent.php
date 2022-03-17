<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../layui/css/layui.css">
</head>

<body style="margin:50px">
    
<table class="layui-table">
<thead>
<tr>
    <th style="min-width: 6%;">学号</th>
    <th style="min-width: 5%;">姓名</th>
    <th style="min-width: 3%;">性别</th>
    <th style="min-width: 3%;">年龄</th>
    <th style="min-width: 3%;">班级</th>
    <th style="min-width: 8%;">院系</th>
    <th style="min-width: 8%;">证件号码</th>
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
if($_POST['age']){
    $com=$com.' and age='.$_POST['age'];
}
if($_POST['class']){
    $com=$com.' and class like "%'.$_POST['class'].'%"';
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
            <td><?php echo $row->age ?></td>
            <td><?php echo $row->class ?></td>
            <td><?php echo $row->dname ?></td>
            <td><?php echo $row->ID_number ?></td>
        </tr>
        </tbody>
        <?php
    }
}

mysqli_close($db);
?>
</table>
</body></html>
