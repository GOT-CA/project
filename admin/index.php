<?php 
session_start();
if(!isset($_SESSION["admin"])||!$_SESSION["login"]==true){
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."../"); 
        exit();
    }
    require_once("../config/database.php");
    $userid=$_SESSION["admin"];
    $nowuser=mysqli_query($db,"select name from admin where aid='$userid'");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <title>学生选课信息管理系统@2020</title>
</head>
<body>
<div class="layui-layout layui-layout-admin ">
        <div class="layui-header ">
            <a href="./welcome.php" target="frame" class="logo">
              	学生选课信息管理系统
            </a>
            <ul class="layui-nav layui-layout-right">
            
                <li class="layui-nav-item">
                    <a href="javascript:;">
                    	
                        <?php while($row=mysqli_fetch_object($nowuser))echo $row->name ?>
                    </a>
                    <dl class="layui-nav-child">
                      <dd><a href="./changePassword.php" target="frame">修改密码</a></dd>
                      <dd><a href="../logout.php">登出</a></dd>
                    </dl>
                  </li>
              </ul>
        </div>
        <div class="layui-side layui-bg-black">
        	<div class="layui-side-scroll">
        		<ul class="layui-nav layui-nav-tree layui-inline" lay-filter="demo" style="margin-right: 10px;">
                    <li class="layui-nav-item">
                      <a href="javascript:;">学生管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./addStudent.php" target="frame">新增学生</a></dd>
                        <dd><a href="./queueStudent.php" target="frame">修改学生信息</a></dd>
                        <dd><a href="./getLog.php" target="frame">奖惩管理</a></dd>
                      </dl>
                    </li>
             		<li class="layui-nav-item">
                      <a href="javascript:;">教师管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./addTeacher.php" target="frame">新增教师</a></dd>
                        <dd><a href="./queueTeacher.php" target="frame">修改教师信息</a></dd>
                      </dl>
                    </li>
                    <li class="layui-nav-item">
                      <a href="javascript:;">院系管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./addDept.php" target="frame">新增院系</a></dd>
                        <dd><a href="./queueDept.php" target="frame">修改院系信息</a></dd>
                      </dl>
                    </li>
                    <li class="layui-nav-item">
                      <a href="javascript:;">专业管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./addMajor.php" target="frame">新增专业</a></dd>
                        <dd><a href="./queueMajor.php" target="frame">修改专业信息</a></dd>
                      </dl>
                    </li>
                    <li class="layui-nav-item">
                      <a href="javascript:;">课程管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./addCourse.php" target="frame">新增课程</a></dd>
                        <dd><a href="./queueCourse.php" target="frame">修改课程信息</a></dd>
                        <dd><a href="./applyCourse.php" target="frame">课程申请</a></dd>
                      </dl>
                    </li>
                    <li class="layui-nav-item">
                      <a href="javascript:;">选课管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./queueChoose.php" target="frame">学生选课</a></dd>
                        <dd><a href="./queueMark.php" target="frame">登记分数</a></dd>
                        <dd><a href="./queueRetake.php" target="frame">补考重修</a></dd>
                      </dl>
                    </li>
                </ul>
        	</div>
        	<div class="layui-body"  style="background-color: white">
        	<iframe name="frame" frameborder="0" width="100%"  scrolling="no"  src="./welcome.php"></iframe>
    	</div>
		<div class="layui-footer" style="color: black;">
            Copyright © 2020 马一凌
        </div>
    	</div>
</div>
 <script src="../layui/layui.js"></script>
<script>

layui.use('element', function(){
  var element = layui.element;
  element.init();


});
</script>
</body>
</html>