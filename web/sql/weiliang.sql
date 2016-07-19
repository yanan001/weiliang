/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : weiliang

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-07-19 19:21:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `aname` varchar(255) NOT NULL COMMENT '公众号名称',
  `account` varchar(255) NOT NULL COMMENT '简介',
  `appid` varchar(50) NOT NULL COMMENT 'appid',
  `appsecret` varchar(50) NOT NULL COMMENT 'appsecret',
  `atoken` varchar(50) DEFAULT NULL COMMENT '随机数',
  `atok` varchar(255) DEFAULT NULL,
  `aurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `FK_Relationship_4` (`uid`),
  KEY `FK_Relationship_5` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------


-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------


-- ----------------------------
-- Table structure for ip
-- ----------------------------
DROP TABLE IF EXISTS `ip`;
CREATE TABLE `ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip
-- ----------------------------


-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `reid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `rename` varchar(50) DEFAULT NULL,
  `rekeyword` varchar(50) DEFAULT NULL,
  `retype` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`reid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reply
-- ----------------------------

-- ----------------------------
-- Table structure for text_reply
-- ----------------------------
DROP TABLE IF EXISTS `text_reply`;
CREATE TABLE `text_reply` (
  `trid` int(11) NOT NULL AUTO_INCREMENT,
  `reid` int(11) DEFAULT NULL,
  `trcontent` varchar(255) NOT NULL,
  PRIMARY KEY (`trid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of text_reply
-- ----------------------------
