-- phpMyAdmin SQL Dump
-- version 2.11.7.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 11 月 24 日 23:58
-- 服务器版本: 5.1.30
-- PHP 版本: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `soulpu`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_admin`
--

CREATE TABLE IF NOT EXISTS `sp_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_name` varchar(60) NOT NULL COMMENT '管理员用户名',
  `admin_email` varchar(60) NOT NULL COMMENT '管理员邮箱',
  `admin_password` varchar(50) NOT NULL COMMENT '管理员密码',
  `access_permissions` varchar(200) NOT NULL COMMENT '访问权限',
  `last_login_time` int(11) NOT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员列表' AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `sp_admin`
--

INSERT INTO `sp_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `access_permissions`, `last_login_time`) VALUES
(1, 'admin', 'admin2@soulpu.com', '96e79218965eb72c92a549dd5a330112', 'a:3:{i:0;s:17:"view_product_list";i:1;s:17:"edit_product_info";i:2;s:10:"view_order";}', 1290438572),
(2, 'soulpu', 'soulpu@soulpu.com', 'd41d8cd98f00b204e9800998ecf8427e', 'a:5:{i:0;s:9:"view_home";i:1;s:17:"view_product_list";i:2;s:17:"edit_product_info";i:3;s:11:"add_product";i:4;s:10:"view_order";}', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_categories`
--

CREATE TABLE IF NOT EXISTS `sp_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `cat_pid` smallint(6) NOT NULL COMMENT '分类父ID',
  `cat_name` varchar(60) NOT NULL COMMENT '分类名称',
  `cat_value` varchar(50) NOT NULL COMMENT '分类EN',
  `cat_list_skin` varchar(100) NOT NULL COMMENT '列表模板',
  `cat_details_skin` varchar(100) NOT NULL COMMENT '详细模板',
  `cat_keywords` varchar(120) NOT NULL COMMENT '关键字',
  `cat_description` varchar(180) NOT NULL COMMENT '描述',
  `cat_sort` smallint(6) NOT NULL COMMENT '排序',
  `cat_is_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `sp_categories`
--

INSERT INTO `sp_categories` (`cat_id`, `cat_pid`, `cat_name`, `cat_value`, `cat_list_skin`, `cat_details_skin`, `cat_keywords`, `cat_description`, `cat_sort`, `cat_is_show`) VALUES
(1, 0, '男鞋', 'Man', '', '', '正品男鞋', '正品运动鞋休闲鞋的购物网站', 0, 1),
(2, 0, '女鞋', 'Shoes', '', '', '正品女鞋', '正品运动鞋休闲鞋的购物网站', 0, 1),
(3, 1, '篮球鞋', '', '', '', '', '', 0, 1),
(4, 1, '登山鞋', '', '', '', '', '', 0, 1),
(5, 2, '越野跑鞋', '', '', '', '', '', 0, 1),
(6, 2, '休闲正装鞋', '', '', '', '', '', 0, 1),
(7, 2, '高跟单鞋', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_permissions`
--

CREATE TABLE IF NOT EXISTS `sp_permissions` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `per_name` varchar(60) NOT NULL COMMENT '权限中文名称',
  `per_value` varchar(30) NOT NULL COMMENT '权限标识',
  PRIMARY KEY (`per_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限列表' AUTO_INCREMENT=6 ;

--
-- 导出表中的数据 `sp_permissions`
--

INSERT INTO `sp_permissions` (`per_id`, `per_name`, `per_value`) VALUES
(1, '后台首页', 'view_home'),
(2, '查看商品列表', 'view_product_list'),
(3, '修改商品信息', 'edit_product_info'),
(4, '添加新商品', 'add_product'),
(5, '查看订单', 'view_order');

-- --------------------------------------------------------

--
-- 表的结构 `sp_system_settings`
--

CREATE TABLE IF NOT EXISTS `sp_system_settings` (
  `sys_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `sys_name` varchar(60) NOT NULL COMMENT '配置名称',
  `sys_value` varchar(60) NOT NULL COMMENT '变量值',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统配置' AUTO_INCREMENT=19 ;

--
-- 导出表中的数据 `sp_system_settings`
--

INSERT INTO `sp_system_settings` (`sys_id`, `sys_name`, `sys_value`) VALUES
(1, 'APP_DEBUG', '1'),
(2, 'SYS_ENCODING', 'utf-8'),
(3, 'SYS_EMAIL', 'admin@admin.com'),
(4, 'CURRENCY', '&yen;'),
(5, 'SMTP_AUTH', '0'),
(6, 'SMTP_USERNAME', 'admin'),
(7, 'SMTP_PASSWORD', 'zhangxin'),
(8, 'SMTP_HOST', 'mail.soulpu.com'),
(9, 'DB_HOST', 'localhost'),
(10, 'DB_NAME', 'soulpu'),
(11, 'DB_TYPE', 'mysql'),
(12, 'DB_USER', 'root'),
(13, 'DB_PWD', ''),
(14, 'DB_PREFIX', 'sp_'),
(15, 'DB_PORT', '3306'),
(16, 'PRODUCT_IMAGES', ''),
(17, 'HOME_IMAGES', ''),
(18, 'ADMIN_IMAGES', '');

-- --------------------------------------------------------

--
-- 表的结构 `sp_users`
--

CREATE TABLE IF NOT EXISTS `sp_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(60) NOT NULL COMMENT '用户名称',
  `email` varchar(60) NOT NULL COMMENT '用户邮箱',
  `password` varchar(50) NOT NULL COMMENT '登录密码',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `sp_users`
--

