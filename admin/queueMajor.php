<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>专业管理 >> 修改专业信息</title>
</head>
<body>
	<h3 class="title">修改专业信息</h3>
	<form action="./fun/getMajor.php" method="post" target="resultbox" class="layui-form">
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">专业编号</label>
    			<div class="layui-input-inline">
    				<input name="mid" type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">专业名</label>
    			<div class="layui-input-inline">
    				<input name="mname" type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">修读年限</label>
    			<div class="layui-input-inline">
    				<input name="study_time" type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">所属学院</label>
        			<div class="layui-input-inline">
        			<?php
                    require_once '../config/database.php';
                    echo '<select name="did">';
                    echo '<option value="">未指定 </option>';
                    $dept=mysqli_query($db,"select did,dname from department");
                    while($dr=mysqli_fetch_object($dept)) {
                        var_dump($dr);
                        echo '<option value="'.$dr->did.'" ';  echo '> '.$dr->dname.'</option>' ;
                    }
                    echo '</select>';
                    mysqli_close($db);
                    ?>
    			</div>
    			
    		</div>
    		
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="提交"></div>
	</form>

<iframe name="resultbox" frameborder="0" width="100%" height=500px ></iframe>
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