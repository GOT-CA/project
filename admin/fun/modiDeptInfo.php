<?php
session_start();
if(!isset($_POST["address"])){
    $did=$_GET["did"];
}
require_once("../../config/database.php");
if(isset($_POST["address"])){
    $com="update department set dname='".$_POST["dname"]."',address='".$_POST["address"]."' where did='".$_POST["did"]."'" ;
    
    $result=mysqli_query($db,$com);
    if($result){
        echo '<h4 style="margin:30px;">提示：信息更改成功！</h4>';
    }
    else{
        echo '<h4 style="margin:30px;">注意：数据未更改！</h4>';
    }
    
    mysqli_close($db);
    ?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>
<?php
exit();
}

$com="select * from department where did='$did'";

$result=mysqli_query($db,$com);

if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <link rel="stylesheet" href="../../layui/css/layui.css">
    <title>Result</title>
</head>
<body>
<h3 class="title">修改信息</h3>
    <form action="./modiDeptInfo.php" method="post"  class="layui-form">
		<input name="did" type="text" required value="<?php echo $row->DID ?>" hidden>
		<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">院系名</label>
    			<div class="layui-input-inline">
    				<input name="dname"  type="text" required value="<?php echo $row->dname ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">学院位置</label>
    			<div class="layui-input-inline">
    				<select required name="address">
                        <option value="中心校区" <?php echo $row->address=="中心校区"?"selected":""; ?>>中心校区</option>
                        <option value="洪家楼校区" <?php echo $row->address=="洪家楼校区"?"selected":""; ?>>洪家楼校区</option>
                        <option value="趵突泉校区" <?php echo $row->address=="趵突泉校区"?"selected":""; ?>>趵突泉校区</option>
                        <option value="兴隆山校区" <?php echo $row->address=="兴隆山校区"?"selected":""; ?>>兴隆山校区</option>
                        <option value="软件园校区" <?php echo $row->address=="软件园校区"?"selected":""; ?>>软件园校区</option>
                        <option value="千佛山校区" <?php echo $row->address=="千佛山校区"?"selected":""; ?>>千佛山校区</option>
                        <option value="威海校区" <?php echo $row->address=="威海校区"?"selected":""; ?>>威海校区</option>
                        <option value="青岛校区" <?php echo $row->address=="青岛校区"?"selected":""; ?>>青岛校区</option>
                    </select>
    			</div>
    		</div>
    	<div  style="text-align:center; margin-top: 50px;"><input name="submit" type="submit" class="layui-btn"  value="修改"></div>
        </form>

        <?php
    }
}
mysqli_close($db);
?>
	<script src="../../layui/layui.js" charset="utf-8"></script>
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