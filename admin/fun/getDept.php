<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../layui/css/layui.css">
</head>

<body style="margin:50px">
<table class="layui-table" >
	<thead>
<tr>
    <th style="min-width: 6%;">学院编号</th>
    <th style="min-width: 5%;">学院名</th>
    <th style="min-width: 3%;">学院位置</th>
    <th style="min-width: 3%;">操作</th>
</tr>
</thead>
<?php
require_once("../../config/database.php");

$com='select * from department where 1=1' ;
if($_POST['did']){
    $com=$com.' and did like "%'.$_POST['did'].'%"';
}
if($_POST['dname']){
    $com=$com.' and dname like "%'.$_POST['dname'].'%"';
}
if($_POST['address']){
    $com=$com.' and address="'.$_POST['address'].'"';
}

$result=mysqli_query($db,$com);
if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $row->DID ?></td>
            <td><?php echo $row->dname ?></td>
            <td><?php echo $row->address ?></td>
            <td><a href="modiDeptInfo.php?did=<?php echo $row->DID; ?>" target="frame">
            	<button class="layui-btn layui-btn-warm layui-btn-sm">修改信息</button>
            	</a>
            <a href="delDept.php?did=<?php echo $row->DID; ?>">
            <button class="layui-btn layui-btn-danger layui-btn-sm">删除院系</button>
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
