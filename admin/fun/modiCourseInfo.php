<?php
session_start();
if(!isset($_POST["cname"])){
    $cid=$_GET["cid"];
}
require_once("../../config/database.php");
if(isset($_POST["cname"])){
//     $test_address=$_POST["test_address"];
//     $test_date=$_POST["test_date"];
//     if($test_address=="待定")$test_address=0;
//     else $test_address="&quot;".$test_address."&quot;";
//     if($test_date=="待定")$test_date=0;
//     else $test_date="&quot;".$test_date."&quot;";
    $com="update course set cname='".$_POST["cname"]."',credit='".$_POST["credit"]."',address='".$_POST["address"]."',did='".$_POST["did"]."' where cid='".$_POST["cid"]."'" ;
    $com1="update teaches set tid='".$_POST["tid"]."' where cid='".$_POST["cid"]."'";
    
    
    $result=mysqli_query($db,$com);
    $result1=mysqli_query($db,$com1);
    if($result && $result1){
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

$com="select * from course natural join teaches natural join (select tid,name from teacher) as t where cid='$cid'";

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
    <form action="./modiCourseInfo.php" method="post" class="layui-form">
    	<input name="cid" type="text" required value="<?php echo $row->CID ?>" hidden>
    	<div class="layui-form-item">
    		<div class="layui-inline">
    			<label class="layui-form-label">课程名</label>
    			<div class="layui-input-inline">
    				<input name="cname" type="text" required  value="<?php echo $row->cname ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">上课地址</label>
    			<div class="layui-input-inline">
    				<input name="address" type="text" required  value="<?php echo $row->address ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">学分</label>
    			<div class="layui-input-inline">
    				<input name="credit" type="text" required  value="<?php echo $row->credit ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">教师工号</label>
    			<div class="layui-input-inline">
    				<input name="tid" type="text" required  value="<?php echo $row->TID ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">开课学院</label>
    			<div class="layui-input-inline">
    				<?php
                    echo '<select name="did" >';
                    $dept=mysqli_query($db,"select did,dname from department");
                    while($dr=mysqli_fetch_object($dept)) {
                        echo '<option value="'.$dr->did.'"';echo $row->DID==$dr->did?" selected=&quot;selected&quot;>":">";  echo $dr->dname.'</option>' ;
                    }
                    echo '</select>';
                    ?>
        		</div>
    		</div>
    		<br>
    		<br>
    		<br>
    		<!-- <div class="layui-inline">
    			<label class="layui-form-label">考核方式</label>
    			<div class="layui-input-inline">
    				<input name="test_type" type="text" required  value="<?php echo $row->test_type ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-inline">
    			<label class="layui-form-label">考试地点</label>
    			<div class="layui-input-inline">
    				<input name="test_address" type="text"  value="<?php echo $row->test_address==null?"待定":$row->test_address; ?>" class="layui-input">
    			</div>
    		</div>
    		<div class="layui-form-item">
    			<label class="layui-form-label">考试日期</label>
    			<div class="layui-input-inline">
    				<input name="test_date" type="text" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value="<?php echo $row->test_date==null?"待定":$row->test_date; ?>" >
    			</div>
    		</div> -->
    		<!--  <div class="layui-form-item">
        		<label class="layui-form-label">时间</label>
        		<div class="layui-input-inline">
        			<input type="text" name="logdate" required id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
        		</div>
        	</div> -->
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