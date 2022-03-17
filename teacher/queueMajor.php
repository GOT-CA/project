<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>院系管理 >> 专业列表</title>
</head>
<body>
<h3 class="title">专业查询</h3>
<form action="./fun/getMajor.php" method="get" target="resultbox" class="layui-form">
	<div class="layui-form-item">
	    <div class="layui-form-label">院系</div>
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
	    <div class="layui-input-inline">
      		<button name="submit" type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
       	</div>
	</div>

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