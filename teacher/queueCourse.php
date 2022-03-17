<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body>
    <h3 class="title">课程查询</h3>
    <form action="./fun/getCourse.php" method="get" target="resultbox" class="layui-form">
    	<div class="layui-form-item">
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
    			<label class="layui-form-label">学分</label>
    			<div class="layui-input-inline">
    				<input name="credit"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">上课地址</label>
    			<div class="layui-input-inline">
    				<input name="address"  type="text" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">开课学院</label>
    			<div class="layui-input-inline">
    				<?php
                        require_once '../config/database.php';
                        echo '<select  name="did">';
                        echo '<option value="">请选择</option>';
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
    			<label class="layui-form-label">教师姓名</label>
    			<div class="layui-input-inline">
    				<input name="tname"  type="text" class="layui-input">
    			</div>
    		</div>
    	</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="提交"></div>
    </form>
    <iframe name="resultbox" frameborder="0" width="100%" height=550px ></iframe>
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