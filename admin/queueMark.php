<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>选课管理 >> 登记分数</title>
</head>
<body>
	<h3 class="title">登记分数</h3>
	<form action="./fun/getMark.php" method="get" target="resultbox" class="layui-form">
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
    		<div class="layui-inline">
    			<label class="layui-form-label">教师编号</label>
    			<div class="layui-input-inline">
    				<input name="tid"  type="text" class="layui-input">
    			</div>
    		</div>
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="提交"></div>
	</form>
<div class="resultbox">
    <iframe name="resultbox" frameborder="0" width="100%" height=500px ></iframe>
</div>


</body>
</html>