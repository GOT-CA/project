<?php
session_start();
$sid=$_SESSION["user"];
require_once("../config/database.php");

$com="select * from student natural join major natural join department where sid='$sid' ";

$result=mysqli_query($db,$com);

if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>Result</title>
</head>
<body>
<h3 class="title">我的信息</h3>
<div style="margin-right: 600px">
<table class="layui-table" >
	<tr>
		<td>学号</td>
		<td><?php echo $row->SID ?></td>
	</tr>
	<tr>
		<td>姓名</td>
		<td><?php echo $row->name ?></td>
	</tr>
	<tr>
		<td>性别</td>
		<td><?php echo $row->sex ?></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><?php echo $row->age ?></td>
	</tr>
	<tr>
		<td>班级</td>
		<td><?php echo $row->class ?></td>
	</tr>
	<tr>
		<td>院系</td>
		<td><?php echo $row->dname ?></td>
	</tr>
	<tr>
		<td>专业</td>
		<td><?php echo $row->mname ?></td>
	</tr>
	<tr>
		<td>联系方式</td>
		<td><?php echo $row->phone_number ?></td>
	</tr>
	<tr>
		<td>证件号</td>
		<td><?php echo $row->ID_number ?></td>
	</tr>
</table>
</div>
</body>
        <?php
    }
}
mysqli_close($db);
?>
