<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>Title</title>
</head>
<body>
<h3 class="title"> 奖惩管理</h3>
	<form action="./fun/getLog.php" method="get" target="resultbox" class="layui-form">
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
    	</div>
    	<div class="layui-form-item">
    		<div class="layui-input-block">
    			<button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">查询</button>
    			<a href="./addLog.php">
    				<input name="" type="button" value="新增" class="layui-btn layui-btn-primary">
    			</a>
    		</div>
    	</div>
	</form>    
    

</form>

<iframe name="resultbox" frameborder="0" width="100%" height=690px ></iframe>
</body>
</html>