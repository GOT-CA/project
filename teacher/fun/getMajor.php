<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
    <style>
        a{
            font-size: 10px;
            margin: 3px;
        }
    </style>
</head>
<body style="margin-right: 50px">
    <?php
    require_once("../../config/database.php");

    $com="select * from major  natural join department where 1=1 " ;
    if($_GET['did']){
        $com=$com." and did=".$_GET['did'];
    }
    $result=mysqli_query($db,$com);
    if($result){
        ?>
    <table class="layui-table">
    <thead>
    <tr>
        <th>院系</th>
        <th>专业</th>
        <th>类型</th>
        <th>修读年限</th>
    </tr>
    </thead>
        <?php
        while($row=mysqli_fetch_object($result)){
            ?>
            <tbody>
            <tr>
            <td><?php echo $row->dname ?></td>
            <td><?php echo $row->mname ?></td>
            <td><?php echo $row->type ?></td>
            <td><?php echo $row->study_time ?></td>
            </tr>
            </tbody>
            <?php
        }
        echo("</ul>");?>
        </table>
    <?php
    }
    else{
        echo ("<h3>提示：你选择的学院当前没有开设专业</h3>");
    }

    mysqli_close($db);
    ?>
</body>
</html>