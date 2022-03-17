<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
</head>
<body style="margin-right: 50px">
<table class="layui-table">
	<thead>
    <tr>
    	<th>学生姓名</th>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>教师名</th>
        <th>成绩</th>
        <th>绩点</th>
        <th>本课最高分</th>
        <th>本课最低分</th>
        <th>备注</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once("../../config/database.php");
    $cid=$_GET["cid"];
    $sid=$_GET["sid"];
    $status=$_GET["status"];
    //$com="select * from course natural join (select cid,score,status from takes where score is not null and sid='$sid') as chosen natural join teaches natural join (select tid,name tname from teacher) as t  " ;
    $com="select sid,name,sex,mname,dname,class,cname,score,credit,status,CID,tname
from student natural join takes natural join (select cname,cid,credit from course where cid='$cid') as c natural join major natural join (select did,dname from department) as d
natural join teaches natural join (select tid,name tname from teacher) as t
where score is not null and sid='$sid' and status='$status' " ;
    $com1="select min(score) mn,max(score) mx from takes natural join course where cid='$cid'";

    $result=mysqli_query($db,$com);
    $result1=mysqli_query($db,$com1);
    $row1=mysqli_fetch_object($result1);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr >
            	<td><?php echo $row->name ?></td>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->tname ?></td>
                <td><?php echo $row->score ?></td>
                <td><?php echo max($row->score-50,0)/10 ?></td>
                <td><?php echo $row1->mx ?></td>
                <td><?php echo $row1->mn ?></td>
                <td><?php if($row->status==1)echo "重修" ;else echo "首次"?></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?></tbody>
</table>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>
</body>
</html>