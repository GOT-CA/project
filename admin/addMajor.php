<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>专业管理 >> 新增专业</title>
</head>
<body>
<h3 class="title">新增专业</h3>
	<form action="./fun/addMajor.php" method="post" target="resultbox" class="layui-form">
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">专业编号</label>
    			<div class="layui-input-inline">
    				<input name="mid" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">专业名</label>
    			<div class="layui-input-inline">
    				<input name="mname" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">类别</label>
    			<div class="layui-input-inline">
    				<input name="type" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">所属学院</label>
        			<div class="layui-input-inline">
        			<?php
                    require_once '../config/database.php';
                    echo '<select required name="did">';
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
    		<div class="layui-inline">
    			<label class="layui-form-label">修读年限</label>
    			<div class="layui-input-inline">
    				<input name="study_time" required type="text" class="layui-input">
    			</div>
    		</div>
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="提交"></div>
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