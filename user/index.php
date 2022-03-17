<?php 
session_start();
if(!isset($_SESSION["user"])||!$_SESSION["login"]==true){
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."../"); 
        exit();
    }
    require_once("../config/database.php");
    $userid=$_SESSION["user"];
    $nowuser=mysqli_query($db,"select name from student where sid='$userid'");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body>
    <div class="layui-layout layui-layout-admin ">
        <div class="layui-header ">
            <a href="./welcome.php" target="frame" class="logo">
              <!-- <img src="images/1.png" width="20%">  -->
              学生选课信息管理系统
            </a>
            <ul class="layui-nav layui-layout-right">
                
                <li class="layui-nav-item">
                  <a href="javascript:;">个人信息</a>
                  <dl class="layui-nav-child">
                    <dd><a href="./myInfo.php" target="frame">我的信息</a></dd>
                    <dd><a href="./editInfo.php" target="frame">修改信息</a></dd>
                  </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <?php while($row=mysqli_fetch_object($nowuser))
		                echo $row->name ?>
                    </a>
                    <dl class="layui-nav-child">
                      <dd><a href="./editPass.php" target="frame">修改密码</a></dd>
                      <dd><a href="../logout.php">登出</a></dd>
                    </dl>
                  </li>
              </ul>
        </div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="demo" style="margin-right: 10px;">
                    <li class="layui-nav-item">
                      <a href="javascript:;">选课管理</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./queueClass.php" target="frame">选课管理</a></dd>
                        <dd><a href="./myClass.php" target="frame">退选管理</a></dd>
                      </dl>
                    </li>
                    <li class="layui-nav-item">
                      <a href="javascript:;">成绩查询</a>
                      <dl class="layui-nav-child">
                        <dd><a href="./myScore.php" target="frame">学科成绩</a></dd>
                        <dd><a href="./myRetake.php" target="frame">重修管理</a></dd>                      </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">奖惩管理</a>
                        <dl class="layui-nav-child">
                          <dd><a href="./myLog.php" target="frame">奖惩查询</a></dd>
                      </li>
                  </ul>
            </div>
        </div>
        <div class="layui-body"  style="background-color: white">
        	<iframe name="frame" frameborder="0" width="100%" src="./welcome.php"></iframe>
    	</div>
        <div class="layui-footer" style="color: black;">
            <!-- <span>Copyright © 2020 马一凌</span> -->
            Copyright © 2020 马一凌
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