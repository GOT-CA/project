<?php

require_once("../../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
    <script type="text/javascript">
    function addScore(sid,cid){
        var score = prompt("请输入成绩","");
        window.location.href="./addScore.php?sid="+sid+"&cid="+cid+"&score="+score;
    }
    </script>
</head>
<body style="margin-right: 50px">
<table class="layui-table">
	<thead>
    <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>课程号</th>
        <th>课程名</th>
        <th>教师</th>
        <th>学分</th>
        
        <th>备注</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php
    $com=$com="select * from student natural join takes as v1 natural join course natural join teaches natural join (select tid,name tname from teacher) as t where score is null" ;

    
    if($_GET['sid']){
        $com=$com." and sid like '%".$_GET['sid']."%'";
    }
    if($_GET['name']){
        $com=$com." and name like '%".$_GET['name']."%'";
    }
    if($_GET['cname']){
        $com=$com." and cname like '%".$_GET['cname']."%'";
    }
    if($_GET['cid']){
        $com=$com." and v1.cid like '%".$_GET['cid']."%'";
    }
    if($_GET['tname']){
        $com=$com." and tname like '%".$_GET['tname']."%'";
    }
    if($_GET['tid']){
        $com=$com." and tid like '%".$_GET['tid']."%'";
    }

    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                <td><?php echo $row->SID ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->tname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php if($row->status==0) echo("无"); else echo("重修")?></td>
                <td><input class="layui-btn layui-btn-normal layui-btn-sm" type="button" onclick="addScore(&quot;<?php echo $row->SID; ?>&quot; , &quot;<?php echo $row->CID; ?>&quot;)" value="登记成绩">
                
                </td>
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