<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>院系信息</title>
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body style="margin-right: 50px">
    <h3 class="title">院系列表</h3>
<table class="layui-table" style="padding:50px">
	<thead>
    <tr>
        <th>院系序号</th>
        <th>院系名称</th>
        <th>所在地址</th>
    </tr>
    </thead>
    <?php
    require_once("../config/database.php");
    $com='select * from department order by did' ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
                
                <td><?php echo $row->DID ?></td>
                <td><?php echo $row->dname ?></td>
                <td><?php echo $row->address ?></td>
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