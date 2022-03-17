<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>选课管理 >> 重修管理</title>
</head>
<body>

<h3 class="title">重修管理</h3>
	<form action="./fun/getRetake.php" method="get" target="resultbox" class="layui-form">
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">学号</label>
    			<div class="layui-input-inline">
    				<input name="sid"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">姓名</label>
    			<div class="layui-input-inline">
    				<input name="name"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">课程号</label>
    			<div class="layui-input-inline">
    				<input name="cid"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">课程名</label>
    			<div class="layui-input-inline">
    				<input name="cname"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">教师名</label>
    			<div class="layui-input-inline">
    				<input name="tname"  type="text" class="layui-input">
    			</div>
    		</div>
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="提交"></div>
	</form>
	<!-- 
<div class="formbox">
    <form action="./fun/getRetake.php" method="get" target="resultbox">
        <div class="input_mid">学号<input name="sid"  type="text"></div>
        <div class="input_mid">学生姓名<input name="name"  type="text"></div>
        <div class="input_mid">课程号<input name="cid"  type="text"></div>
        <div class="input_mid">课程名<input name="cname"  type="text"></div>
        <div class="input_mid">教师姓名<input name="tname"  type="text"></div>
        <div class="clickbox clearfloat greenbox firstbox"><input name="submit" type="submit" value="提交"></div>
        <div class="redbox clickbox "><input name="reset" type="reset" value="清除"></div>
    </form>
</div> -->

<div class="resultbox">
    <iframe name="resultbox" frameborder="0" width="100%" height=500px ></iframe>
</div>


</body>
</html>