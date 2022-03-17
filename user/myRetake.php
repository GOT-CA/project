<?php
session_start();
$sid=$_SESSION["user"];
require_once("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body>
    <h3 class="title">重修查询</h3>
    <div style="text-align: center">
    	<img src="../images/discount.png" width="25px">
    	<h4 class="ltitle">正在重修课程</h4>
    </div>
    <span>
    	
    </span>
    
<div style="margin:0 50px">
<table class="layui-table">
    
    <?php

    $com="select * from course natural join teaches natural join (select name,tid from teacher) as t natural join (select * from takes where sid='$sid' and status='1' and score is null) as chosen  " ;
    $result=mysqli_query($db,$com);
    if($result){
    ?>
    	<thead>
    	<tr>
            <th>课程号</th>
            <th>课程名</th>
            <th>学分</th>
            <th>教师名</th>
    	</tr>
    	</thead>
    	<?php 
        while($row=mysqli_fetch_object($result)){
            $flag=1;
            ?>
            <tbody>
            <tr>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->name ?></td>
            </tr>
            </tbody>
            <?php
        }
    }
    else echo("无");
    ?>
</table>
</div>
<br><br><br><br>
	<div style="text-align: center">
    	<img src="../images/discount.png" width="25px">
    	<h4 class="ltitle">已重修课程</h4>
    </div>
<div style="margin:0 50px">
<table class="layui-table">
    
    <?php

    $com="select * from course natural join teaches natural join (select name,tid from teacher) as t natural join (select * from takes where sid='$sid' and status='1' and score is not null) as chosen  " ;
    
    $result=mysqli_query($db,$com);
    if($result){
    ?>    
    	<thead>
        <tr>
            <th>课程号</th>
            <th>课程名</th>
            <th>学分</th>
            <th>教师名</th>
            <th>成绩</th>
        </tr>
        </thead>
    
        <?php while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->score ?></td>
            </tr>
            </tbody>
            <?php
        }
    }
    else echo("无");
    ?>
</table>
</div>
<br><br><br><br>
<div style="text-align: center">
    	<img src="../images/discount.png" width="25px">
    	<h4 class="ltitle">不及格课程记录</h4>
    </div>
<div style="margin:0 50px">
<table class="layui-table">
    
    <?php

    $com="select * from course natural join teaches natural join (select name,tid from teacher) as t natural join (select * from takes where sid='$sid' and status='0' and score<60 ) as chosen  " ;
    
    $result=mysqli_query($db,$com);
    if($result){
    ?>
    <thead>
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>教师名</th>
        <th>成绩</th>
    </tr>
    </thead>
        <?php while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->score ?></td>
            </tr>
            </tbody>
            <?php
        }
    }
    else echo("无");
    mysqli_close($db);
    ?>
</table>
</div>
</body>
</html>
