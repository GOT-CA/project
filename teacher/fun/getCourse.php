<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
    <title>课程安排</title>
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
<!-- <h3 class="title">排课</h3> --> 
<!--startprint1-->
<table class="layui-table">
	<thead>
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>上课地址</th>
        <th>开课学院</th>
        <th>教师名</th>
    </tr>
    </thead>
    <?php
   require_once("../../config/database.php");

    $com='select * from course natural join teaches natural join (select TID,name from teacher) as t natural join (select did,dname from department) as didname where 1=1  ' ;
    if($_GET['cid']){
        $com=$com." and cid like '%".$_GET['cid']."%'";
    }
    if($_GET['cname']){
        $com=$com." and cname like '%".$_GET['cname']."%'";
    }
    if($_GET['credit']){
        $com=$com." and credit like '%".$_GET['credit']."%'";
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
</body>
</html>