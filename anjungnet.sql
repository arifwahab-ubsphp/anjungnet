/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100422
Source Host           : localhost:3306
Source Database       : anjungnet

Target Server Type    : MYSQL
Target Server Version : 100422
File Encoding         : 65001

Date: 2024-06-26 17:08:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  `role_status` varchar(100) DEFAULT NULL,
  `role_updateby` varchar(255) DEFAULT NULL,
  `role_date_update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `role_date_created` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Superadmin', 'Aktif', '18163', null, '2024-06-25 16:26:57');
INSERT INTO `roles` VALUES ('2', 'Admin', 'Aktif', '18163', null, '2024-06-25 16:27:36');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `nokp` varchar(255) NOT NULL DEFAULT '',
  `nok` varchar(255) NOT NULL DEFAULT '',
  `fname` varchar(255) NOT NULL DEFAULT '',
  `user_pwd` varchar(255) DEFAULT NULL,
  `user_salt` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_ptj` varchar(255) DEFAULT NULL,
  `ptj` varchar(255) DEFAULT NULL,
  `nama_stesen` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `userstat` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`userid`,`nokp`,`nok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '890612435089', '18163', 'FARIS ZAIDI BIN MOHD NOR', '123456', null, 'fariszaidi@mardi.gov.my', 'Pusat Pengurusan ICT', 'IM', 'Ibu Pejabat MARDI', '1', 'Aktif', '2024-06-25', null, '2024-06-26 17:05:05');
SET FOREIGN_KEY_CHECKS=1;
