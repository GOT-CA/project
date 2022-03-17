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
    <title>成绩单</title>
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
    <h3 class="title">成绩管理</h3>
<!--startprint1-->
<div style="margin-right: 50px">
<table class="layui-table" >
	<thead>
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>教师名</th>
        <th>成绩</th>
        <th>备注</th>
    </tr>
    </thead>
    <?php

    $com="select * from course natural join teaches natural join (select name,tid from teacher) as t natural join (select cid,score,status from takes where score is not null and sid='$sid') as chosen  " ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                <td><?php echo $row->CID ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->score ?></td>
                <td><?php if($row->status==1)echo "重修" ?></td>
            </tr>
            </tbody>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
<!--endprint1-->
<div style="text-align:center; margin-top: 50px;">
<input class="layui-btn" type="button" name="button_export" title="打印1" onclick="preview(1)" value="打印"/>
</div>
</div>
</body>

</html>