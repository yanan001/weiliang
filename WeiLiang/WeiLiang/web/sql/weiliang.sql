/*
Navicat MySQL Data Transfer

Source Server         : centos64
Source Server Version : 50547
Source Host           : 192.168.1.12:3306
Source Database       : weiliang

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-07-16 14:49:00
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
  `aname` varchar(255) NOT NULL COMMENT 'å…¬ä¼—å·åç§°',
  `account` varchar(255) NOT NULL COMMENT 'ç®€ä»‹',
  `appid` varchar(50) NOT NULL COMMENT 'appid',
  `appsecret` varchar(50) NOT NULL COMMENT 'appsecret',
  `atoken` varchar(50) DEFAULT NULL COMMENT 'éšæœºæ•°',
  `atok` varchar(255) DEFAULT NULL,
  `aurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `FK_Relationship_4` (`uid`),
  KEY `FK_Relationship_5` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `wl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip
-- ----------------------------
