<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>学生管理 >> 新增学生</title>
</head>
<body>
	<h3 class="title">新增学生</h3>
	<form action="./fun/addStudent.php" method="post" target="resultbox" class="layui-form">
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">学号</label>
    			<div class="layui-input-inline">
    				<input name="sid" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">姓名</label>
    			<div class="layui-input-inline">
    				<input name="name" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">性别</label>
    			<div class="layui-input-inline">
    				<select required name="sex">
            			<option value="">未指定</option>
            			<option value="男">男</option>
            			<option value="女">女</option>
        			</select>
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">年龄</label>
    			<div class="layui-input-inline">
    				<input name="age" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">班级</label>
    			<div class="layui-input-inline">
    				<input name="class" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">院系</label>
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
                    ?>
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">专业</label>
    			<div class="layui-input-inline">
    				<?php
                    echo '<select required name="mid">';
                    $major=mysqli_query($db,"select mid,mname from major");
                    while($mr=mysqli_fetch_object($major)) {
                        var_dump($mr);
                        echo '<option value="'.$mr->mid.'" ';  echo '> '.$mr->mname.'</option>' ;
                    }
                    echo '</select>';
                    mysqli_close($db);
                    ?>
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">证件号</label>
    			<div class="layui-input-inline">
    				<input name="idnum" required type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">手机号</label>
    			<div class="layui-input-inline">
    				<input name="phone_number" required type="text" class="layui-input">
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