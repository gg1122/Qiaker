/*
Navicat MySQL Data Transfer

Source Server         : 测试
Source Server Version : 50173
Source Host           : bdm240661320.my3w.com:3306
Source Database       : bdm240661320_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2017-11-23 17:31:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for main_info
-- ----------------------------
DROP TABLE IF EXISTS `main_info`;
CREATE TABLE `main_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dsp` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text CHARACTER SET utf8,
  `userid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `zan` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `top` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `jing` tinyint(4) NOT NULL DEFAULT '0' COMMENT '精贴',
  `pl` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1024 DEFAULT CHARSET=gbk;
