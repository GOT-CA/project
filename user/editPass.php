<?php
session_start();
$sid=$_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>更改密码</title>
</head>
<body>
<h3 class="title">更改密码</h3>
<p style="font-size: 18px">（注意：下次将使用新密码登录，请保管好新设置的密码。）</p>

<form action="./changePassword.php" method="post" target="resultbox" class="layui-form" style="margin-top: 50px">
	<div class="layui-form-item">
    	<div class="layui-inline">
    		<label class="layui-form-label">旧密码</label>
    		<div class="layui-input-inline">
    			<input name="oldpass"  type="password" class="layui-input">
   			</div>
   		</div>
   	</div>
   	<div class="layui-form-item">
   		<div class="layui-inline">
    		<label class="layui-form-label">新密码</label>
    		<div class="layui-input-inline">
    			<input required name="newpass"  type="password" class="layui-input">
   			</div>
   		</div>
   	</div>
   	<div class="layui-form-item">
    	<div class="layui-input-block">
      		<button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
      	</div>
    </div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height=200px ></iframe>
</body>
</html>
