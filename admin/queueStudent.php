<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>学生管理 >> 修改学生信息</title>
</head>
<body>
	<h3 class="title">修改学生信息</h3>
	<form action="./fun/getStudent.php" method="post" target="resultbox"  class="layui-form">
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
    			<label class="layui-form-label">性别</label>
    			<div class="layui-input-inline">
    				<select  name="sex">
            			<option value="">未指定</option>
            			<option value="男">男</option>
            			<option value="女">女</option>
        			</select>
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">院系</label>
    			<div class="layui-input-inline">
    				<input name="dname"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">证件号</label>
    			<div class="layui-input-inline">
    				<input name="idnum"  type="text" class="layui-input">
    			</div>
    		</div>
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="查找"></div>
    	</form>
<iframe name="resultbox" frameborder="0" width="100%" height="500px" ></iframe>
	<script src="../layui/layui.js" charset="utf-8"></script>
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
</body>
<!-- 
<body>
<h3 class="subtitle">学生管理 >> 修改学生信息</h3>
<form action="./fun/getStudent.php" method="post" target="resultbox">
    <div class="inputbox"><span>学号：</span><input name="sid"  type="text" ></div>
    <div class="inputbox"><span>姓名：</span><input name="name"  type="text"></div>
    <div class="inputbox"><span>性别：</span>
        <select  name="sex">
            <option value="">未指定</option>
            <option value="男">男</option>
            <option value="女">女</option>
        </select></div>
    <div class="inputbox"><span>院系：</span><input name="dname"  type="text"></div>
    <div class="inputbox"><span>证件号：</span><input name="idnum"  type="text"></div>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="查找"></div>
    <div class="redbox clickbox "><span></span><input name="reset" type="reset" value="清除"></div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height="500px" ></iframe>

</body> -->
</html>