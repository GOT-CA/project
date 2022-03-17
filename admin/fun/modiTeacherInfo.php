<?php
session_start();
if(!isset($_POST["age"])){
    $tid=$_GET["tid"];
}
require_once("../../config/database.php");
if(isset($_POST["age"])){
    if(!is_numeric($_POST["tel"])){
        echo "电话号码格式不符合要求";
        exit();
    }
    $com="update teacher set phone_number='".$_POST["tel"]."',name='".$_POST["name"]."',ID_number='".$_POST["idnum"]."',sex='".$_POST["sex"]."' where tid='".$_POST["tid"]."'" ;
    $com1="select * from teacher where tid='".$_POST["tid"]."' and pwd='".$_POST["pwd"]."'";
    
    $result=mysqli_query($db,$com);
    $result1=mysqli_query($db,$com1);
    
    if(mysqli_num_rows($result1)<1){
        mysqli_query($db,"update teacher set pwd='".md5($_POST["pwd"])."' where tid='".$_POST["tid"]."'");
//         echo "密码已更改";
    }
    else {
//         echo "密码未更改";
    }
    
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

$com="select * from teacher where tid='$tid'";

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
	<form action="./modiTeacherInfo.php" method="post" class="layui-form">
		<input name="tid" type="text" required value="<?php echo $row->TID ?>" hidden>
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">姓名</label>
    			<div class="layui-input-inline">
    				<input name="name"  type="text" required value="<?php echo $row->name ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">年龄</label>
    			<div class="layui-input-inline">
    				<input name="age"  type="text" required value="<?php echo $row->age ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">性别</label>
    			<div class="layui-input-inline">
    				<select  name="sex">
                        <option value="男" <?php echo $row->sex=="男"?"selected":""; ?>>男</option>
                        <option value="女" <?php echo $row->sex=="女"?"selected":""; ?>>女</option>
                    </select>
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">证件号</label>
    			<div class="layui-input-inline">
    				<input name="idnum"  type="text" required value="<?php echo $row->ID_number ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">手机号</label>
    			<div class="layui-input-inline">
    				<input name="tel" type="text" required value="<?php echo $row->phone_number ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">登陆密码</label>
    			<div class="layui-input-inline">
    				<input name="pwd" type="password" required value="<?php echo $row->pwd ?>" class="layui-input">
    			</div>
    		</div>
    	</div>
    		
        <div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="修改"></div>
        
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