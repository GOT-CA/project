/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : course_assistant

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 30/11/2020 23:16:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `AID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员编号',
  `ID_number` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员身份证号',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员姓名',
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员手机号',
  `apw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员登陆密码',
  PRIMARY KEY (`AID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for advisor
-- ----------------------------
DROP TABLE IF EXISTS `advisor`;
CREATE TABLE `advisor`  (
  `SID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生学号',
  `TID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教师编号',
  PRIMARY KEY (`SID`) USING BTREE,
  INDEX `TID`(`TID`) USING BTREE,
  CONSTRAINT `SID` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `TID` FOREIGN KEY (`TID`) REFERENCES `teacher` (`TID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `CID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '课程编号',
  `cname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '课程名',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '上课地址',
  `DID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '开课学院',
  `credit` double(10, 1) NULL DEFAULT NULL COMMENT '学分',
  `test_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考试类型',
  `test_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考试地点',
  `test_date` datetime(0) NULL DEFAULT NULL COMMENT '考试时间',
  PRIMARY KEY (`CID`) USING BTREE,
  INDEX `sec_did`(`DID`) USING BTREE,
  CONSTRAINT `sec_did` FOREIGN KEY (`DID`) REFERENCES `department` (`DID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `DID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学院编号',
  `dname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学院名称',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学院所在位置',
  PRIMARY KEY (`DID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for has_major
-- ----------------------------
DROP TABLE IF EXISTS `has_major`;
CREATE TABLE `has_major`  (
  `MID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业编号',
  `DID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学院编号',
  PRIMARY KEY (`MID`) USING BTREE,
  INDEX `DID`(`DID`) USING BTREE,
  CONSTRAINT `DID` FOREIGN KEY (`DID`) REFERENCES `department` (`DID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `MID` FOREIGN KEY (`MID`) REFERENCES `major` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for major
-- ----------------------------
DROP TABLE IF EXISTS `major`;
CREATE TABLE `major`  (
  `MID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业编号',
  `mname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专业名称',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专业类型(理学、工学等)',
  `study_time` int(255) NULL DEFAULT NULL COMMENT '修读年限',
  PRIMARY KEY (`MID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rewards_punishment
-- ----------------------------
DROP TABLE IF EXISTS `rewards_punishment`;
CREATE TABLE `rewards_punishment`  (
  `RID` int(25) NOT NULL COMMENT '奖惩编号',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '奖惩类型(奖励或惩罚)',
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '奖惩详情',
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '缘由',
  INDEX `RID`(`RID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sec_time
-- ----------------------------
DROP TABLE IF EXISTS `sec_time`;
CREATE TABLE `sec_time`  (
  `CID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '课程号',
  `time_ID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '时间号',
  PRIMARY KEY (`CID`, `time_ID`) USING BTREE,
  INDEX `time_ID`(`time_ID`) USING BTREE,
  CONSTRAINT `CID` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `time_ID` FOREIGN KEY (`time_ID`) REFERENCES `time` (`time_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for stud_major
-- ----------------------------
DROP TABLE IF EXISTS `stud_major`;
CREATE TABLE `stud_major`  (
  `SID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生学号',
  `MID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业编号',
  PRIMARY KEY (`SID`, `MID`) USING BTREE,
  INDEX `stud_major_MID`(`MID`) USING BTREE,
  CONSTRAINT `stud_major_MID` FOREIGN KEY (`MID`) REFERENCES `major` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stud_major_SID` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for stud_re
-- ----------------------------
DROP TABLE IF EXISTS `stud_re`;
CREATE TABLE `stud_re`  (
  `RID` int(25) NOT NULL COMMENT '奖惩编号',
  `SID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生学号',
  `logdate` date NULL DEFAULT NULL COMMENT '录入时间',
  PRIMARY KEY (`RID`) USING BTREE,
  INDEX `stud_re_SID`(`SID`) USING BTREE,
  CONSTRAINT `stud_re_SID` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stud_re_RID` FOREIGN KEY (`RID`) REFERENCES `rewards_punishment` (`RID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `SID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学号',
  `ID_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '身份证号',
  `birthday` date NULL DEFAULT NULL COMMENT '生日 YYYY-MM-DD',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号',
  `age` int(255) NULL DEFAULT NULL COMMENT '年龄',
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登陆密码',
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '班级',
  PRIMARY KEY (`SID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for takes
-- ----------------------------
DROP TABLE IF EXISTS `takes`;
CREATE TABLE `takes`  (
  `SID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学号',
  `CID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '课程号',
  `score` decimal(5, 2) NULL DEFAULT NULL COMMENT '考试分数',
  `status` int(255) NOT NULL COMMENT '是否选过',
  PRIMARY KEY (`SID`, `CID`, `status`) USING BTREE,
  INDEX `takes_CID`(`CID`) USING BTREE,
  CONSTRAINT `takes_CID` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `takes_SID` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for teach_major
-- ----------------------------
DROP TABLE IF EXISTS `teach_major`;
CREATE TABLE `teach_major`  (
  `MID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专业编号',
  `TID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '教师编号',
  PRIMARY KEY (`TID`) USING BTREE,
  INDEX `teach_major_MID`(`MID`) USING BTREE,
  CONSTRAINT `teach_major_MID` FOREIGN KEY (`MID`) REFERENCES `major` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teach_major_TID` FOREIGN KEY (`TID`) REFERENCES `teacher` (`TID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `TID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '教师编号',
  `ID_number` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '教师身份证号',
  `birthday` date NULL DEFAULT NULL COMMENT '教师生日',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教师姓名',
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教师性别',
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教师电话号码',
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '教师密码',
  `age` int(11) NULL DEFAULT NULL COMMENT '教师年龄',
  PRIMARY KEY (`TID`, `ID_number`) USING BTREE,
  INDEX `TID`(`TID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for teaches
-- ----------------------------
DROP TABLE IF EXISTS `teaches`;
CREATE TABLE `teaches`  (
  `CID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '课程号',
  `TID` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '教师编号',
  PRIMARY KEY (`CID`, `TID`) USING BTREE,
  INDEX `teaches_TID`(`TID`) USING BTREE,
  CONSTRAINT `teaches_CID` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teaches_TID` FOREIGN KEY (`TID`) REFERENCES `teacher` (`TID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for time
-- ----------------------------
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time`  (
  `weekday` int(25) NULL DEFAULT NULL COMMENT '星期几',
  `lesson` int(25) NULL DEFAULT NULL COMMENT '第几大节',
  `start_week` int(255) NULL DEFAULT NULL COMMENT '第几周开课',
  `end_week` int(255) NULL DEFAULT NULL COMMENT '第几周结课',
  `time_ID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '时间号',
  PRIMARY KEY (`time_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
