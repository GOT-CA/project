<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩统计</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
    <script>
    function preview(oper){
        if (oper < 10){
            bdhtml=window.document.body.innerHTML;//获取当前页的html代码
            sprnstr="<!--startprint"+oper+"-->";//设置打印开始区域
            eprnstr="<!--endprint"+oper+"-->";//设置打印结束区域
            prnhtml=bdhtml.substring(bdhtml.indexOf(sprnstr)+18); //从开始代码向后取html
            prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));//从结束代码向前取html
            window.document.body.innerHTML=prnhtml;
            window.print();
            window.document.body.innerHTML=bdhtml;
        } else {
            window.print();
        }
    }</script>
</head>
<body style="margin-right: 50px">
<!--startprint1-->
<table class="layui-table">
	<thead>
    <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>班级</th>
        <th>课程</th>
        <th>学分</th>
        <th>成绩</th>
        <th>备注</th>
        <th></th>
    </tr>
    </thead>
    <?php
    require_once("../../config/database.php");
//成绩基本信息
    $com="select sid,name,sex,mname,dname,class,cname,score,credit,status,cid
from student natural join takes natural join (select cname,cid,credit from course) as c natural join major natural join (select did,dname from department) as d
where score is not null" ;
    $com4="select max(score) max_score,min(score) min_score
from student natural join takes natural join (select cname,cid,credit from course) as c natural join major natural join (select did,dname from department) as d
where score is not null" ;
    
//已得学分
    $com1="select round(sum(credit),2) sum_credit
from (
select max(score) mx,credit,sid,name,class,did,cname
from student natural join takes natural join (select cname,cid,credit from course) as c natural join major natural join (select did,dname from department) as d
group by cid,credit,sid,name,class,did,cname
) as f
where mx>=60";
    
//第一次修读拿到的学分（总学分）
    $com2="select round(sum(credit),2) sum_credit
from student natural join takes natural join (select cname,cid,credit from course) as c natural join major natural join (select did,dname from department) as d
where score is not null and status=0";
    
//计算绩点要用到的加权总分
    $com3="select sum(credit*(score-50)/10) sum_score
from student natural join takes natural join (select cname,cid,credit from course) as c natural join major natural join (select did,dname from department) as d
where score is not null and status=0 and score>=50";
    
//挂科的课程不算入已修学分，重修的课程在录入平均绩点时按照第一次修读时的成绩计算，小于50分的课程绩点为0
    if($_GET['sid']){
        $com=$com." and sid like '%".$_GET['sid']."%'";
        $com1=$com1." and sid like '%".$_GET['sid']."%'";
        $com2=$com2." and sid like '%".$_GET['sid']."%'";
        $com3=$com3." and sid like '%".$_GET['sid']."%'";
        $com4=$com4." and sid like '%".$_GET['sid']."%'";
    }
    if($_GET['name']){
        $com=$com." and name like '%".$_GET['name']."%'";
        $com1=$com1." and name like '%".$_GET['name']."%'";
        $com2=$com2." and name like '%".$_GET['name']."%'";
        $com3=$com3." and name like '%".$_GET['name']."%'";
        $com4=$com4." and name like '%".$_GET['name']."%'";
    }
    if($_GET['class']){
        $com=$com." and class like '%".$_GET['class']."%'";
        $com1=$com1." and class like '%".$_GET['class']."%'";
        $com2=$com2." and class like '%".$_GET['class']."%'";
        $com3=$com3." and class like '%".$_GET['class']."%'";
        $com4=$com4." and class like '%".$_GET['class']."%'";
    }
    if($_GET['did']){
        $com=$com." and did like '%".$_GET['did']."%'";
        $com1=$com1." and did like '%".$_GET['did']."%'";
        $com2=$com2." and did like '%".$_GET['did']."%'";
        $com3=$com3." and did like '%".$_GET['did']."%'";
        $com4=$com4." and did like '%".$_GET['did']."%'";
    }
    if($_GET['cname']){
        $com=$com." and cname like '%".$_GET['cname']."%'";
        $com1=$com1." and cname like '%".$_GET['cname']."%'";
        $com2=$com2." and cname like '%".$_GET['cname']."%'";
        $com3=$com3." and cname like '%".$_GET['cname']."%'";
        $com4=$com4." and cname like '%".$_GET['cname']."%'";
    }
    if($_GET['status']=="0" || $_GET['status']=="1"){
        $com=$com." and status=".$_GET['status']." ";
        $com4=$com4." and status=".$_GET['status']." ";
        //$com1=$com1." and status=".$_GET['status']." ";
        //$com2=$com2." and status=".$_GET['status']." ";
        //$com3=$com3." and status=".$_GET['status']." ";
    }
    
    $com=$com." order by score desc";

    $result=mysqli_query($db,$com);
    $result1=mysqli_query($db,$com1);
    $result2=mysqli_query($db,$com2);
    $result3=mysqli_query($db,$com3);
    $result4=mysqli_query($db,$com4);
    
    $row1=mysqli_fetch_object($result1);
    $row2=mysqli_fetch_object($result2);
    $row3=mysqli_fetch_object($result3);
    $row4=mysqli_fetch_object($result4);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                
                <td><?php echo $row->sid ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->sex ?></td>
                <td><?php echo $row->class ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->score ?></td>
                
                <td><?php if($row->status!=0)echo("重修");?></td>
                <td><a href="getStuScore.php?sid=<?php echo $row->sid."&cid=".$row->cid."&status=".$row->status; ?>">
                	<button class="layui-btn layui-btn-normal layui-btn-sm">成绩详情</button>
                	</a></td>
            </tr>
            </tbody>
            <?php
        }
    }?>
 <?php 
 if(($_GET['sid'] || $_GET['name']) && !$_GET['cname'] && !($_GET['status']=="0" || $_GET['status']=="1")){// && !$_GET['cname'] && $_GET['status']!="1" && $_GET['status']!="0" 
     ?>
</table>
<table class="layui-table">
	<thead>
	<tr>
        <th>已修学分</th>
        <th>总绩点</th>
        <th>最高分</th>
        <th>最低分</th>
	</tr>
	</thead>
	<tbody>
    <tr>
        <td><?php echo $row1->sum_credit ?></td>
        <td><?php if($row2->sum_credit !=0)echo round(($row3->sum_score)/($row2->sum_credit),2);else echo('0'); ?></td>
    	<td><?php echo $row4->max_score ?></td>
    	<td><?php echo $row4->min_score ?></td>
    </tr>
    </tbody>
</table>
    <?php
 }
 else {?>
     <table class="layui-table">
     <thead>
     <tr>
     <th>最高分</th>
     <th>最低分</th>
     </tr>
     </thead>
     <tbody>
     <tr>
     <td><?php echo $row4->max_score ?></td>
    <td><?php echo $row4->min_score ?></td>
    </tr>
    </tbody>
</table>
<?php
 }
 ?>
    <?php mysqli_close($db);
    ?>
<!--endprint1-->
<div style="text-align: center"><input type="button" name="button_export" title="打印1" onclick="preview(1)" class="layui-btn" value="打印"/></div>
</body>
</html>