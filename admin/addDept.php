<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>学院管理 >> 新增学院</title>
</head>
<body>
<h3 class="title"> 新增学院</h3>
	<form action="./fun/addDept.php" method="post" target="resultbox" class="layui-form">
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">学院编号</label>
    			<div class="layui-input-inline">
    				<input name="did" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">学院名</label>
    			<div class="layui-input-inline">
    				<input name="dname" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">学院位置</label>
    			<div class="layui-input-inline">
    				<select required name="address">
                        <option value="中心校区">中心校区</option>
                        <option value="洪家楼校区">洪家楼校区</option>
                        <option value="趵突泉校区">趵突泉校区</option>
                        <option value="兴隆山校区">兴隆山校区</option>
                        <option value="软件园校区">软件园校区</option>
                        <option value="千佛山校区">千佛山校区</option>
                        <option value="威海校区">威海校区</option>
                        <option value="青岛校区">青岛校区</option>
                    </select>
    			</div>
    		</div>
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="提交"></div>
    	
    </form>
    
</form>

    <iframe name="resultbox" frameborder="0" width="100%" height=200px ></iframe>
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
</html>