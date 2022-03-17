<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
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
<body>
<!--startprint1-->
<table border="1">
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>教师名</th>
        <th>开课学院</th>
        <th>选课人数</th>
        <th>已修人次</th>
        <th>平均分数</th>
        <th>操作</th>
    </tr>
    <?php
    require_once("../../config/database.php");
//选课人数是已经选课但还没出分的数目
//已修人次是修完这门课的人数，如果有人多次修这门课，则只算作一次
//平均分数是所有这门课的记录中分数的平均值，如果一个人多次选这门课，则每次的分数都会算入平均分数
    $com="select tmp1.cid cid,cname,tname,dname,taking,finished,avg_score,did
    from (
        select cid,cname,tname,dname,did from course natural join teaches natural join (select tid,name tname from teacher) as t natural join (select did,dname from department) as d
    ) as tmp1 left join (
        select cid,count(*) taking 
        from takes
        where score is null
        group by cid
    ) as tmp2 on tmp1.cid=tmp2.cid
    left join(
        select cid,count(*) finished 
        from takes
        where score is not null and status=0
        group by cid
    ) as tmp3 on tmp1.cid=tmp3.cid
    left join(
        select cid,avg(score) avg_score
        from takes
        where score is not null
        group by cid
    )as tmp4 on tmp1.cid=tmp4.cid where 1=1 ";

    
    
    if($_GET['cid']){
        $com=$com." and tmp1.cid like '%".$_GET['cid']."%'";
    }
    if($_GET['cname']){
        $com=$com." and cname like '%".$_GET['cname']."%'";
    }
    if($_GET['tname']){
        $com=$com." and tname like '%".$_GET['tname']."%'";
    }
    if($_GET['did']){
        $com=$com." and did like '%".$_GET['did']."%'";
    }

    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                
                <td><?php echo $row->cid ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->tname ?></td>
                <td><?php echo $row->dname ?></td>
                <td><?php if($row->taking==0)echo "0";else echo $row->taking ?></td>
                <td><?php if($row->finished==0)echo "0";else echo $row->finished ?></td>
                <td><?php if($row->avg_score==0)echo "0";else echo $row->avg_score ?></td>
                <td><a href="getClassScore.php?cid=<?php echo $row->cid ?>">详情</a></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
<!--endprint1-->
<input type="button" name="button_export" title="打印1" onclick="preview(1)" value="打印"/>
</body>
</html>