# 学生选课管理信息系统

###### 2022年06月

#### 系统简介

选用主流MySQL、PHP，实现一个完整的以数据库为核心的B/S架构的学生选课管理信息系统：

1. 要求系统可以准确地记录和查询学生信息，包括学生的姓名、单位、年龄、性别以及身份证号码等。

2. 要求系统可以准确地记录学生地每一次奖惩情况。

3. 系统可以对学校的院系情况进行管理，包括设置学院名称、修改某学院某专业方向的名称等。

4. 系统应该可以对基础数据进行维护。

5. 系统能够对开设的课程进行管理

6. 学生选课管理、考试（登记分数）、补考重修管理

7. 系统还应该提供强大数据统计、查询、报表生成以及打印等功能。

8. 用户权限管理

9. 异常提示功能

   

#### 安装说明

- ##### 本产品的开发语言为
  - 后台：PHP，MySQL
  - 前端：HTML，CSS，JavaScript

- ##### 开发工具为
  - IDE：Eclipse for PHP
  - PHP服务器组件：WampServer V3.2.3
  - MySQL管理工具：Navicat Premium 12

- ##### 运行项目须知
  - 安装主流版本的PHP/MySQL，配置Web服务器
  - 将项目文件复制到工作目录下，并授予文件权限
  - 向数据库导入数据库文件course_assistant.sql
  - 修改./course_assistant_php/config/database.php中的数据库连接信息



#### 功能介绍

- ##### 学生用户

  - 查看个人信息
  - 按照课程号、任课教师姓名、课程名等查询课程以及选课操作
  - 在不及格的课程中，选择重修该课
  - 成绩查询，成绩表导出以及打印
  - 查看不及格课程
  - 查看奖惩信息
  - 查看考试信息
  - 查看、打印课程表

- ##### 教师用户

  - 查看个人信息
  - 查看课程信息
  - 查看、打印授课表
  - 修改课程信息（上课地点、上课时间、学分数）
  - 录入成绩
  - 查看成绩，统计最高分、最低分、平均分等
  - 开设新课程
  - 新增或删除学生的奖惩信息

- ##### 管理员用户

  - 修改专业、学院名称
  - 修改课程信息
  - 修改教师、学生个人信息
  - 修改学生的奖惩信息





