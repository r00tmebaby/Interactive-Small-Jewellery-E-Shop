/*
Navicat MySQL Data Transfer

Source Server         : wordpress
Source Server Version : 50545
Source Host           : localhost:3306
Source Database       : catalog

Target Server Type    : MYSQL
Target Server Version : 50545
File Encoding         : 1251

Date: 2019-01-01 03:40:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text COLLATE cp1251_bulgarian_ci,
  `name` text COLLATE cp1251_bulgarian_ci,
  `code` text COLLATE cp1251_bulgarian_ci,
  `price` text COLLATE cp1251_bulgarian_ci,
  `description` text COLLATE cp1251_bulgarian_ci,
  `availability` text COLLATE cp1251_bulgarian_ci,
  `image` text COLLATE cp1251_bulgarian_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=cp1251 COLLATE=cp1251_bulgarian_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Pendants', 'White Lab Opal', '10 01P', '8.99', 'Sterling Silver White Lab Opal Oval Pendant', '89', '../images/products/Pendants/1.jpg');
INSERT INTO `products` VALUES ('2', 'Pendants', 'Faith-Hope-Love', '10 02P', '18.99', 'Sterling Silver Faith-Hope-Love Heart Pendant', '100', '../images/products/Pendants/2.jpg');
INSERT INTO `products` VALUES ('3', 'Pendants', 'Cross ', '10 03P', '10.99', 'Sterling Silver Cross Pendant', '100', '../images/products/Pendants/3.jpg');
INSERT INTO `products` VALUES ('4', 'Pendants', 'Floral Cross ', '10 04P', '10.99                        ', 'Sterling Silver Floral Cross Pendant', '100', '../images/products/Pendants/4.jpg');
INSERT INTO `products` VALUES ('5', 'Pendants', 'Blue Lab Opal', '10 05P', '8.99                                      ', 'Sterling Silver Blue Lab Opal Oval Pendant', '100', '../images/products/Pendants/5.jpg');
INSERT INTO `products` VALUES ('6', 'Pendants', 'Pink Lab Opal Oval ', '10 06P', '8.99                                                     ', 'Sterling Silver Pink Lab Opal Oval Pendant', '100', '../images/products/Pendants/6.jpg');
INSERT INTO `products` VALUES ('7', 'Pendants', 'Moon and Sun Celtic', '10 07P', '17.99                            ', 'Sterling Silver Moon and Sun Celtic ', '100', '../images/products/Pendants/7.jpg');
INSERT INTO `products` VALUES ('8', 'Pendants', 'Whimsic Tree of Life ', '10 08P', '16.99   ', 'Sterling Silver Whimsic Tree of Life ', '100', '../images/products/Pendants/8.jpg');
INSERT INTO `products` VALUES ('9', 'Pendants', 'Silver Cushion Cut Rainbow Topaz CZ Ring', '10 09P', '11.99                                                  ', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '100', '../images/products/Pendants/9.jpg');
INSERT INTO `products` VALUES ('10', 'Pendants', 'Heart Pink CZ ', '10 10P', '12.99                       ', 'Sterling Silver Precious Heart Pink CZ Pendant', '100', '../images/products/Pendants/10.jpg');
INSERT INTO `products` VALUES ('39', 'Pendants', 'Sterling Silver Cross Heart CZ Pendant', '1011P', '17.99', 'Sterling Silver Cross Heart CZ Pendant', '100', '../images/products/Pendants/11.jpg');
INSERT INTO `products` VALUES ('40', 'Pendants', 'Sterling Silver Anchor Pendant', '1012P', '15.99', 'Sterling Silver Anchor Pendant', '100', '../images/products/Pendants/12.jpg');
INSERT INTO `products` VALUES ('41', 'Pendants', 'Sterling Silver \"A journey of a thousand miles begins with a single step\" ', '1013P', '11.99', 'Sterling Silver \"A journey of a thousand miles begins with a single step\" ', '100', '../images/products/Pendants/13.jpg');
INSERT INTO `products` VALUES ('42', 'Pendants', 'Sterling Silver Emerald Big Heart CZ Pendant', '1014', '13.50', 'Sterling Silver Emerald Big Heart CZ Pendant', '100', '../images/products/Pendants/14.jpg');
INSERT INTO `products` VALUES ('43', 'Pendants', 'Sterling Silver Multiple Heart Shaped Cross Pendant', '1015P', '8.99', 'Sterling Silver Multiple Heart Shaped Cross Pendant', '100', '../images/products/Pendants/15.jpg');
INSERT INTO `products` VALUES ('44', 'Pendants', 'Sterling Silver Multiple Heart Pendant', '1016P', '10.98', 'Sterling Silver Multiple Heart Pendant', '100', '../images/products/Pendants/16.jpg');
INSERT INTO `products` VALUES ('45', 'Pendants', 'Sterling Silver Feather Pendant', '1017P', '10.99', 'Sterling Silver Feather Pendant', '100', '../images/products/Pendants/17.jpg');
INSERT INTO `products` VALUES ('46', 'Pendants', 'Sterling Silver Winged Cross Clear CZ Pendant', '1018P', '15.99', 'Sterling Silver Winged Cross Clear CZ Pendant', '100', '../images/products/Pendants/18.jpg');
INSERT INTO `products` VALUES ('47', 'Pendants', 'Sterling Silver Horse Pendant', '1019P', '10.99', 'Sterling Silver Horse Pendant', '100', '../images/products/Pendants/19.jpg');
INSERT INTO `products` VALUES ('48', 'Pendants', 'Sterling Silver Butterfly Pendant', '1020P', '10.99', 'Sterling Silver Butterfly Pendant', '100', '../images/products/Pendants/20.jpg');
INSERT INTO `products` VALUES ('49', 'Pendants', 'Sterling Silver Rectangular Blue Sapphire CZ Pendant', '1021P', '19.99', 'Sterling Silver Rectangular Blue Sapphire CZ Pendant', '100', '../images/products/Pendants/21.jpg');
INSERT INTO `products` VALUES ('50', 'Pendants', 'Sterling Silver Floating Hearts Pendant', '1022P', '14.98', 'Sterling Silver Floating Hearts Pendant', '100', '../images/products/Pendants/22.jpg');
INSERT INTO `products` VALUES ('51', 'Pendants', 'Sterling Silver Key Pendant', '1023P', '10.99', 'Sterling Silver Key Pendant', '100', '../images/products/Pendants/23.jpg');
INSERT INTO `products` VALUES ('52', 'Pendants', 'Sterling silver Cherry Hearts', '1024P', '14.99', 'Sterling silver Cherry Hearts', '100', '../images/products/Pendants/24.jpg');
INSERT INTO `products` VALUES ('53', 'Pendants', 'Sterling Silver Dolphin Pendant', '1025P', '13.99', 'Sterling Silver Dolphin Pendant', '100', '../images/products/Pendants/25.jpg');
INSERT INTO `products` VALUES ('54', 'Pendants', 'Sterling Silver Bow Tie Cat Clear CZ Pendant', '1026P', '12.99', 'Sterling Silver Bow Tie Cat Clear CZ Pendant', '100', '../images/products/Pendants/26.jpg');
INSERT INTO `products` VALUES ('55', 'Pendants', 'Sterling Silver Clear CZ Set', '1027P', '23.99', 'Sterling Silver Clear CZ Set', '100', '../images/products/Pendants/27.jpg');
INSERT INTO `products` VALUES ('56', 'Pendants', 'Sterling Silver Four Leaf Clover CZ Pendant', '1028P', '14.99', 'Sterling Silver Four Leaf Clover CZ Pendant', '100', '../images/products/Pendants/28.jpg');
INSERT INTO `products` VALUES ('57', 'Pendants', 'Sterling Silver Frog Blue Lab Opal Pendant', '1029P', '21.99', 'Sterling Silver Frog Blue Lab Opal Pendant', '100', '../images/products/Pendants/29.jpg');
INSERT INTO `products` VALUES ('58', 'Pendants', 'Sterling Silver Precious Heart Blue Topaz CZ Pendant', '1030P', '13.99', 'Sterling Silver Precious Heart Blue Topaz CZ Pendant', '100', '../images/products/Pendants/30.jpg');
INSERT INTO `products` VALUES ('59', 'Pendants', 'Sterling Silver Love Pendant', '1031P', '12.99', 'Sterling Silver Love Pendant', '100', '../images/products/Pendants/31.jpg');
INSERT INTO `products` VALUES ('60', 'Pendants', 'Sterling Silver Rectangular Clear CZ Pendant', '1032P', '12.99', 'Sterling Silver Rectangular Clear CZ Pendant', '100', '../images/products/Pendants/32.jpg');
INSERT INTO `products` VALUES ('61', 'Pendants', 'Sterling Silver Clear Round CZ 10mm Pendant', '1033P', '10.99', 'Sterling Silver Clear Round CZ 10mm Pendant', '100', '../images/products/Pendants/33.jpg');
INSERT INTO `products` VALUES ('62', 'Pendants', 'Sterling Silver Horse Clear CZ Pendant', '1034P', '18.99', 'Sterling Silver Horse Clear CZ Pendant', '100', '../images/products/Pendants/34.jpg');
INSERT INTO `products` VALUES ('63', 'Pendants', 'Sterling Silver Garnet CZ Set', '1035P', '23.99', 'Sterling Silver Garnet CZ Set', '100', '../images/products/Pendants/35.jpg');
INSERT INTO `products` VALUES ('64', 'Pendants', 'Sterling Silver Hummingbird ', '1036P', '15.99', 'Sterling Silver Hummingbird ', '100', '../images/products/Pendants/36.jpg');
INSERT INTO `products` VALUES ('65', 'Pendants', 'Sterling Silver Lab Opal Greek Pendant', '10.37', '17.99', 'Sterling Silver Lab Opal Greek Pendant', '100', '../images/products/Pendants/37.jpg');
INSERT INTO `products` VALUES ('66', 'Pendants', 'Sterling Silver Tree of life Pendant', '1039P', '7.99', 'Sterling Silver Tree of life Pendant', '100', '../images/products/Pendants/39.jpg');
INSERT INTO `products` VALUES ('67', 'Pendants', 'Sterling Silver Crystal Ball CZ Set', '1040P', '20.99', 'Sterling Silver Crystal Ball CZ Set', '100', '../images/products/Pendants/40.jpg');
INSERT INTO `products` VALUES ('68', 'Pendants', 'Sterling Silver Round CZ Pendant', '1041P', '19.99', 'Sterling Silver Round CZ Pendant', '100', '../images/products/Pendants/41.jpg');
INSERT INTO `products` VALUES ('69', 'Pendants', 'Sterling Silver White Lab Opal Oval Pendant', '1042P', '22.99', 'Sterling Silver White Lab Opal Oval Pendant', '100', '../images/products/Pendants/42.jpg');
INSERT INTO `products` VALUES ('70', 'Pendants', 'Sterling Silver Faith-Hope-Love Heart Pendant', '1043P', '24.45', 'Sterling Silver Faith-Hope-Love Heart Pendant', '100', '../images/products/Pendants/43.jpg');
INSERT INTO `products` VALUES ('71', 'Pendants', 'Sterling Silver Cross Pendant', '1044P', '12.78', 'Sterling Silver Cross Pendant', '100', '../images/products/Pendants/44.jpg');
INSERT INTO `products` VALUES ('72', 'Pendants', 'Sterling Silver Floral Cross Pendant', '1045P', '13.50', 'Sterling Silver Floral Cross Pendant', '100', '../images/products/Pendants/45.jpg');
INSERT INTO `products` VALUES ('73', 'Pendants', 'Sterling Silver Blue Lab Opal Oval Pendant', '1046P', '10.93', 'Sterling Silver Blue Lab Opal Oval Pendant', '100', '../images/products/Pendants/46.jpg');
INSERT INTO `products` VALUES ('74', 'Pendants', 'Sterling Silver Pink Lab Opal Oval Pendant', '1047P', '10.98', 'Sterling Silver Pink Lab Opal Oval Pendant', '100', '../images/products/Pendants/47.jpg');
INSERT INTO `products` VALUES ('75', 'Pendants', 'Sterling Silver Moon and Sun Celtic Pendant', '1048P', '21.58', 'Sterling Silver Moon and Sun Celtic Pendant', '100', '../images/products/Pendants/48.jpg');
INSERT INTO `products` VALUES ('76', 'Pendants', 'Sterling Silver Whimsic Tree of Life Pendant', '1049P', '19.93', 'Sterling Silver Whimsic Tree of Life Pendant', '100', '../images/products/Pendants/49.jpg');
INSERT INTO `products` VALUES ('77', 'Pendants', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '1050P', '14.98', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '100', '../images/products/Pendants/50.jpg');
INSERT INTO `products` VALUES ('78', 'Pendants', 'Blue Heart', '14.35', '14.35', 'Blue Heart', '100', '../images/products/Pendants/51.jpg');
INSERT INTO `products` VALUES ('79', 'Pendants', 'Our Family Just Grew', '1052P', '14.35', 'Our Family Just Grew', '100', '../images/products/Pendants/52.jpg');
INSERT INTO `products` VALUES ('80', 'Pendants', 'Red Steel', '1053P', '14.98', 'Red Steel', '100', '../images/products/Pendants/53.jpg');
INSERT INTO `products` VALUES ('81', 'Pendants', 'Silver Star', '1054P', '14.35', 'Silver Star', '100', '../images/products/Pendants/54.jpg');
INSERT INTO `products` VALUES ('82', 'Pendants', 'Silver Moon', '1055P', '14.35', 'Silver Moon', '100', '../images/products/Pendants/55.jpg');
INSERT INTO `products` VALUES ('83', 'Pendants', 'Sterling Silver White Lab Opal Oval Pendant', '1056P', '10.98', 'Sterling Silver White Lab Opal Oval Pendant', '100', '../images/products/Pendants/56.jpg');
INSERT INTO `products` VALUES ('84', 'Pendants', 'Sterling Silver Faith-Hope-Love Heart Pendant', '1057P', '24.45', 'Sterling Silver Faith-Hope-Love Heart Pendant', '100', '../images/products/Pendants/57.jpg');
INSERT INTO `products` VALUES ('85', 'Pendants', 'Sterling Silver Cross Pendant', '1058P', '12.78', 'Sterling Silver Cross Pendant', '100', '../images/products/Pendants/58.jpg');
INSERT INTO `products` VALUES ('86', 'Pendants', 'Sterling Silver Floral Cross Pendant', '1059P', '13.50', 'Sterling Silver Floral Cross Pendant', '100', '../images/products/Pendants/59.jpg');
INSERT INTO `products` VALUES ('87', 'Pendants', 'Sterling Silver Blue Lab Opal Oval Pendant', '1060P', '10.93', 'Sterling Silver Blue Lab Opal Oval Pendant', '100', '../images/products/Pendants/60.jpg');
INSERT INTO `products` VALUES ('88', ' Pendants', ' Sterling Silver Pink Lab Opal Oval Pendant', ' 1061P', ' 10.98', ' Sterling Silver Pink Lab Opal Oval Pendant', ' 100', ' ../images/products/Pendants/61.jpg');
INSERT INTO `products` VALUES ('89', 'Pendants', 'Sterling Silver Moon and Sun Celtic Pendant', '1062P', '21.58', 'Sterling Silver Moon and Sun Celtic Pendant', '100', '../images/products/Pendants/62.jpg');
INSERT INTO `products` VALUES ('90', 'Pendants', 'Sterling Silver Whimsic Tree of Life Pendant', '1063P', '19.93', 'Sterling Silver Whimsic Tree of Life Pendant', '100', '../images/products/Pendants/63.jpg');
INSERT INTO `products` VALUES ('91', 'Pendants', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '1064P', '14.98', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '100', '../images/products/Pendants/64.jpg');
INSERT INTO `products` VALUES ('92', 'Pendants', 'Butterfly', '1065P', '14.35', 'Butterfly', '100', '../images/products/Pendants/65.jpg');
INSERT INTO `products` VALUES ('93', 'Pendants', 'Hope', '1066P', '14.35', 'Hope', '100', '../images/products/Pendants/66.jpg');
INSERT INTO `products` VALUES ('94', 'Pendants', 'Mom', '1067P', '14.98', 'Mom', '100', '../images/products/Pendants/67.jpg');
INSERT INTO `products` VALUES ('95', 'Pendants', 'Surcesla', '1068P', '14.35', 'Surcesla', '100', '../images/products/Pendants/68.jpg');
INSERT INTO `products` VALUES ('96', 'Pendants', 'Love You ', '1068P', '14.35', 'Love You ', '100', '../images/products/Pendants/69.jpg');
INSERT INTO `products` VALUES ('97', 'Pendants', 'Gold Hands', '1069P', '14.35', 'Gold Hands', '100', '../images/products/Pendants/70.jpg');
INSERT INTO `products` VALUES ('98', 'Pendants', 'Sterling Silver White Lab Opal Oval Pendant', '1071', '10.98', 'Sterling Silver White Lab Opal Oval Pendant', '100', '../images/products/Pendants/71.jpg');
INSERT INTO `products` VALUES ('99', 'Pendants', 'Sterling Silver Faith-Hope-Love Heart Pendant', '1072P', '24.45', 'Sterling Silver Faith-Hope-Love Heart Pendant', '100', '../images/products/Pendants/72.jpg');
INSERT INTO `products` VALUES ('100', 'Pendants', 'Sterling Silver Cross Pendant', '1073P', '12.78', 'Sterling Silver Cross Pendant', '100', '../images/products/Pendants/73.jpg');
INSERT INTO `products` VALUES ('101', 'Pendants', 'Sterling Silver Floral Cross Pendant', '1074P', '13.50', 'Sterling Silver Floral Cross Pendant', '100', '../images/products/Pendants/74.jpg');
INSERT INTO `products` VALUES ('102', 'Pendants', 'Sterling Silver Blue Lab Opal Oval Pendant', '1075P', '10.93', 'Sterling Silver Blue Lab Opal Oval Pendant', '100', '../images/products/Pendants/75.jpg');
INSERT INTO `products` VALUES ('103', 'Pendants', 'Sterling Silver Pink Lab Opal Oval Pendant', '1076P', '10.98', 'Sterling Silver Pink Lab Opal Oval Pendant', '100', '../images/products/Pendants/76.jpg');
INSERT INTO `products` VALUES ('104', 'Pendants', 'Sterling Silver Moon and Sun Celtic Pendant', '1077P', '21.58', 'Sterling Silver Moon and Sun Celtic Pendant', '100', '../images/products/Pendants/77.jpg');
INSERT INTO `products` VALUES ('105', 'Pendants', 'Sterling Silver Whimsic Tree of Life Pendant', '1078P', '19.93', 'Sterling Silver Whimsic Tree of Life Pendant', '100', '../images/products/Pendants/78.jpg');
INSERT INTO `products` VALUES ('106', 'Pendants', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '1079P', '14.98', 'Sterling Silver Cushion Cut Rainbow Topaz CZ Ring', '100', '../images/products/Pendants/79.jpg');
INSERT INTO `products` VALUES ('107', 'Pendants', 'Steel Doll', '1080P', '14.35', 'Steel Doll', '100', '../images/products/Pendants/80.jpg');
INSERT INTO `products` VALUES ('108', 'Pendants', 'Steel Angel1', '1081P', '14.35', 'Steel Angel1', '100', '../images/products/Pendants/81.jpg');
INSERT INTO `products` VALUES ('109', 'Pendants', 'Opal Ship', '1082P', '14.98', 'Opal Ship', '100', '../images/products/Pendants/82.jpg');
INSERT INTO `products` VALUES ('110', 'Pendants', 'Red Start', '1083P', '14.35', 'Red Start', '100', '../images/products/Pendants/83.jpg');
INSERT INTO `products` VALUES ('111', 'Pendants', 'Butterfly Steel', '1084P', '14.35', 'Butterfly Steel', '100', '../images/products/Pendants/84.jpg');
INSERT INTO `products` VALUES ('112', 'Pendants', 'Red Heart', '1085P', '14.35', 'Red Heart', '100', '../images/products/Pendants/85.jpg');
