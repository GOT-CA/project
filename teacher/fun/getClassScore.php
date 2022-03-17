<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
        <th>学院</th>
        <th>班级</th>
        <th>成绩</th>
        <th>备注</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once("../../config/database.php");
    $cid=$_GET["cid"];
    $com="select sid,name,dname,class,score,status
from takes natural join student natural join major natural join (select did,dname from department) as d
where cid='$cid';" ;
    

    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                <td><?php echo $row->sid ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->dname ?></td>
                <td><?php echo $row->class ?></td>
                <td><?php if($row->score==0) echo("未考试"); else echo $row->score ?></td>
                <td><?php if($row->status==1)echo "重修" ;?></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</tbody></table>
<!--endprint1-->
<div style="text-align: center"><input type="button" name="button_export" title="打印1" onclick="preview(1)" class="layui-btn" value="打印"/></div>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>
</body>
</html>