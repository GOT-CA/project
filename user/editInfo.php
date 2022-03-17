<?php
session_start();
$sid=$_SESSION["user"];
require_once("../config/database.php");
if(isset($_POST["age"])){
    $tel=$_POST["tel"];
    if(strlen($tel)!=11 || !is_numeric($tel)){
        echo '<h4 style="margin:30px;">注意：电话格式有误！</h4>';
        exit(0);
    }
    $com="update student set age='".$_POST["age"]."',phone_number='".$_POST["tel"]."' where SID='".$sid."'" ;

    $result=mysqli_query($db,$com);
    if($result){
        echo '<h4 style="margin:30px;">提示：信息更改成功！</h4>';
    }
    else{
        echo '<h4 style="margin:30px;">注意：数据未更改！</h4>';
    }

    mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px">
	<div style="margin: 0 auto;width: 90px;height: 30px;background-color: #009688">
		<a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a>
	</div>
</div>
<?php
exit();
}

$com="select * from student where sid='$sid'";

$result=mysqli_query($db,$com);

if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>Result</title>
</head>
<body>
<h3 class="title">修改信息</h3>
    <form action="./editInfo.php" method="post" class="layui-form">
    <div class="layui-form-item">
    	<div class="layui-inline">
    		<label class="layui-form-label">姓名</label>
    		<div class="layui-input-inline">
    			<input name="name"  type="text" required disabled value="<?php echo $row->name ?>" class="layui-input">
   			</div>
   		</div>
   		<div class="layui-inline">
    		<label class="layui-form-label">年龄</label>
    		<div class="layui-input-inline">
    			<input name="age"  type="text" required value="<?php echo $row->age ?>" class="layui-input">
   			</div>
   		</div>
   		<div class="layui-inline">
    		<label class="layui-form-label">手机</label>
    		<div class="layui-input-inline">
    			<input name="tel"  type="text" required value="<?php echo $row->phone_number ?>" class="layui-input">
   			</div>
   		</div>
    </div>
	<div style="text-align:center; margin-top: 50px;">
		<input class="layui-btn" type="submit" name="submit" title="打印1" onclick="preview(1)" value="修改信息"/>
	</div>	
    </form>

        <?php
    }
}
mysqli_close($db);
?>

