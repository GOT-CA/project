<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="./user.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body>
<div style="margin:0 50px">
<table class="layui-table">
	<thead>
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>上课地址</th>
        <th>开课学院</th>
        <th>教师名</th>
        <th></th>
    </tr>
    </thead>
    <?php
   require_once("../config/database.php");

    $com='select * from course natural join teaches natural join teacher natural join (select did,dname from department) as d where 1=1  ' ;
    if($_GET['cid']){
        $com=$com." and cid like '%".$_GET['cid']."%'";
    }
    if($_GET['cname']){
        $com=$com." and cname like '%".$_GET['cname']."%'";
    }
    if($_GET['credit']){
        $com=$com." and credit = '".$_GET['credit']."'";
    }
    if($_GET['address']){
        $com=$com." and address like '%".$_GET['address']."%'";
    }
    if($_GET['did']){
        $com=$com." and did like '%".$_GET['did']."%'";
    }
    if($_GET['tname']){
        $com=$com." and name like '%".$_GET['tname']."%'";
    }

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
                <td><?php echo $row->dname ?></td>
                <td><?php echo $row->name ?></td>
                <td><a href="./chooseClass.php?cid=<?php echo $row->CID ?>">
                	<button class="layui-btn layui-btn-normal layui-btn-sm">选课</button>
                	
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