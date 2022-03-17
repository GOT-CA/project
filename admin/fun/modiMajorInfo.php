<?php
session_start();
if(!isset($_POST["did"])){
    $mid=$_GET["mid"];
}
require_once("../../config/database.php");
if(isset($_POST["did"])){
    $com="update major set mname='".$_POST["mname"]."',type='".$_POST["type"]."',did='".$_POST["did"]."',study_time='".$_POST["study_time"]."' where mid='".$_POST["mid"]."'";
    
    $result=mysqli_query($db,$com);
    if($result){
        echo '<h4 style="margin:30px;">提示：信息更改成功！</h4>';
    }
    else{
        echo '<h4 style="margin:30px;">注意：数据未更改！</h4>';
    }
    
    mysqli_close($db);
    ?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>
<?php
exit();
}

$com="select * from major where mid='$mid'";

$result=mysqli_query($db,$com);

if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
    <title>Result</title>
</head>
<body>
<h3 class="title">修改信息</h3>
    <form action="./modiMajorInfo.php" method="post" class="layui-form">
		<input name="mid" type="text" required value="<?php echo $row->MID ?>" hidden>
		<div class="layui-form-item">
			<div class="layui-inline">
    			<label class="layui-form-label">专业名</label>
    			<div class="layui-input-inline">
    				<input name="mname" required value="<?php echo $row->mname ?>" type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">类别</label>
    			<div class="layui-input-inline">
    				<input name="type" required value="<?php echo $row->type ?>" type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">所属学院</label>
        			<div class="layui-input-inline">
        			<?php
                    echo '<select name="did" >';
                    $dept=mysqli_query($db,"select did,dname from department");
                    while($dr=mysqli_fetch_object($dept)) {
                        echo '<option value="'.$dr->did.'"';echo $row->DID==$dr->did?" selected=&quot;selected&quot;>":">";  echo $dr->dname.'</option>' ;
                    }
                    echo '</select>';
                    ?>
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">修读年限</label>
    			<div class="layui-input-inline">
    				<input name="study_time" type="text" required value="<?php echo $row->study_time ?>" class="layui-input">
    			</div>
    		</div>
		</div>
        <div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="修改信息"></div>
	</form>

        <?php
    }
}
mysqli_close($db);
?>
	<script src="../../layui/layui.js" charset="utf-8"></script>
    <script>
    layui.use(['form', 'layedit', 'laydate'], function(){
      var form = layui.form
      ,layer = layui.layer
      ,layedit = layui.layedit
      ,laydate = layui.laydate;
      
      
      //表单取值
      layui.$('#LAY-component-form-getval').on('click', function(){
        var data = form.val('example');
        alert(JSON.stringify(data));
      });
      
    });
    </script>