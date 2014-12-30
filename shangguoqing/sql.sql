/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.6.17 : Database - cms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cms`;

/*Table structure for table `cms_ad` */

DROP TABLE IF EXISTS `cms_ad`;

CREATE TABLE `cms_ad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(50) DEFAULT NULL COMMENT '广告名称',
  `position_id` int(11) DEFAULT '0' COMMENT '广告位',
  `ad_link` varchar(100) DEFAULT NULL COMMENT '广告链接',
  `ad_code` varchar(200) DEFAULT NULL COMMENT '广告数据',
  `ad_image` varchar(100) DEFAULT NULL COMMENT '广告图片',
  `start_time` datetime DEFAULT NULL COMMENT '开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '结束时间',
  `state` tinyint(1) DEFAULT '0' COMMENT '0编辑中，1上架，2下架',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `is_delete` tinyint(1) DEFAULT '0',
  `admin_id` int(11) DEFAULT '0' COMMENT '管理员ID',
  `ext` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_ad_position` */

DROP TABLE IF EXISTS `cms_ad_position`;

CREATE TABLE `cms_ad_position` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) DEFAULT NULL COMMENT '广告位名称',
  `ad_type` tinyint(2) unsigned DEFAULT '0' COMMENT '广告类型，0图片广告，1文字广告，2代码广告',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示，0不显示，1显示',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `is_delete` tinyint(1) DEFAULT '0' COMMENT '0正常，1删除',
  `ext` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_admin_user` */

DROP TABLE IF EXISTS `cms_admin_user`;

CREATE TABLE `cms_admin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(64) DEFAULT NULL COMMENT '密码',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `is_delete` tinyint(1) DEFAULT '0' COMMENT '是否删除，0正常，1已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_article` */

DROP TABLE IF EXISTS `cms_article`;

CREATE TABLE `cms_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '文章标题',
  `short_title` varchar(200) DEFAULT NULL COMMENT '导读',
  `article_thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `content` text NOT NULL COMMENT '内容',
  `cat_id` int(11) DEFAULT '0' COMMENT '分类ID',
  `tags` varchar(100) DEFAULT NULL COMMENT '文章标签',
  `state` tinyint(1) DEFAULT '0' COMMENT '状态，0编辑中，1发布，2下架',
  `admin_id` int(11) DEFAULT '0' COMMENT '发布人',
  `referer` varchar(20) DEFAULT NULL COMMENT '来源',
  `create_time` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `ext` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_category` */

DROP TABLE IF EXISTS `cms_category`;

CREATE TABLE `cms_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL COMMENT '分类名称',
  `parent_id` int(5) DEFAULT '0' COMMENT '上级ID',
  `cate_desc` varchar(50) DEFAULT NULL COMMENT '分类描述',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `is_delete` tinyint(1) DEFAULT '0' COMMENT '是否删除，0正常，1已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_config` */

DROP TABLE IF EXISTS `cms_config`;

CREATE TABLE `cms_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_key` varchar(50) NOT NULL COMMENT '键名',
  `key_name` varchar(50) DEFAULT NULL COMMENT '描述',
  `config_value` text COMMENT '键值',
  `create_time` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_goods` */

DROP TABLE IF EXISTS `cms_goods`;

CREATE TABLE `cms_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(100) DEFAULT NULL COMMENT '商品名称',
  `cat_id` int(11) DEFAULT '0' COMMENT '分类ID',
  `sub_title` varchar(100) DEFAULT NULL COMMENT '促销语',
  `goods_desc` text COMMENT '商品描述',
  `goods_price` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `market_price` decimal(10,2) DEFAULT '0.00' COMMENT '市场价',
  `goods_thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `goods_image` varchar(100) DEFAULT NULL COMMENT '大图',
  `goods_number` int(11) DEFAULT '0' COMMENT '库存',
  `sale_number` int(11) DEFAULT '0' COMMENT '销量',
  `url` varchar(100) DEFAULT NULL COMMENT '跳转地址',
  `admin_id` int(11) DEFAULT '0' COMMENT '管理员id',
  `create_time` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1' COMMENT '状态，0下架，1上架',
  `is_delete` tinyint(1) DEFAULT '0' COMMENT '是否删除，0正常，1删除',
  `ext` varchar(50) DEFAULT NULL COMMENT '扩展',
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_log` */

DROP TABLE IF EXISTS `cms_log`;

CREATE TABLE `cms_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `log_name` varchar(20) DEFAULT NULL,
  `log_type` tinyint(2) DEFAULT '0' COMMENT '0查看，1添加，2修改，3删除',
  `log_data` text,
  `ip` varchar(20) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `ext` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_name` (`user_id`,`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Table structure for table `cms_suggest` */

DROP TABLE IF EXISTS `cms_suggest`;

CREATE TABLE `cms_suggest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `call_name` varchar(50) DEFAULT NULL COMMENT '称呼',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号',
  `content` text COMMENT '反馈内容',
  `create_time` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL,
  `ext` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `cms_zan` */

DROP TABLE IF EXISTS `cms_zan`;

CREATE TABLE `cms_zan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `type_id` tinyint(2) unsigned DEFAULT '0' COMMENT '0-赞，1-同感，2-呵呵',
  `article_id` int(11) DEFAULT '0' COMMENT '关联文章ID',
  `ip` varchar(20) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `ext` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`type_id`,`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
