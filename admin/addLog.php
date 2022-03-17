<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>Title</title>
</head>
<body>
<h3 class="title">新增奖惩</h3>
	<form style="margin:30px;"action="./fun/addLog.php" method="post" id="log" class="layui-form">
		<div class="layui-form-item">
    		<label class="layui-form-label">学号</label>
    		<div class="layui-input-inline">
    			<input name="sid" required type="text" class="layui-input">
    		</div>
    	</div>
    	<div class="layui-form-item">
    		<label class="layui-form-label">奖惩</label>
    		<div class="layui-input-block">
    			<input type="radio" name="type" required value="奖" title="奖" checked="">
      			<input type="radio" name="type" value="惩" title="惩">
    		</div>
    	</div>
    	<div class="layui-form-item">
    		<label class="layui-form-label">时间</label>
    		<div class="layui-input-inline">
    			<input type="text" name="logdate" required id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
    		</div>
    	</div>
    	<div class="layui-form-item">
    		<label class="layui-form-label">缘由</label>
    		<div class="layui-input-inline">
    			<input name="reason" required type="text" class="layui-input">
    		</div>
    	</div>
    	<div class="layui-form-item layui-form-text">
    	<label class="layui-form-label">详情</label>
    		<div class="layui-input-block">
    		    <textarea placeholder="请输入内容" class="layui-textarea" style="width: 600px" name="detail" required form="log"></textarea><br>
    		</div>
    	</div>
    	
    	<div class="layui-form-item">
    		<div class="layui-input-block">
      			<button name="submit" type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
      			<button name="submit" type="" class="layui-btn layui-btn-primary" onclick="javascript:history.back(-1);">返回</button>
      		</div>
    	</div>
</form>
</body>
<script src="../layui/layui.js" charset="utf-8"></script>
    <script>
    layui.use(['form', 'layedit', 'laydate'], function(){
      var form = layui.form
      ,layer = layui.layer
      ,layedit = layui.layedit
      ,laydate = layui.laydate;
      
      //日期
  	  laydate.render({
    	  elem: '#date'
  	  });
  	  laydate.render({
    	  elem: '#date1'
  	  });
      
      //表单取值
      layui.$('#LAY-component-form-getval').on('click', function(){
        var data = form.val('example');
        alert(JSON.stringify(data));
      });
      
    });
    </script>
</html>