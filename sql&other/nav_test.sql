-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 02 月 22 日 18:20
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `nav_test`
--

-- --------------------------------------------------------

--
-- 表的结构 `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `rank` int(4) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`, `rank`, `status`) VALUES
(1, '论坛', 1, 1),
(2, '资源', 2, 1),
(3, '教学', 3, 1),
(4, '服务', 4, 1),
(5, '学校', 5, 1),
(6, '学院', 6, 1),
(7, '院系', 7, 1),
(8, '实验', 8, 1),
(9, '社团', 9, 1),
(10, '友情', 10, 1);

-- --------------------------------------------------------

--
-- 表的结构 `common`
--

CREATE TABLE IF NOT EXISTS `common` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` int(4) NOT NULL,
  `heat` int(4) NOT NULL DEFAULT '0',
  `heattimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=193 ;

--
-- 转存表中的数据 `common`
--

INSERT INTO `common` (`id`, `url`, `name`, `rank`, `heat`, `heattimestamp`, `status`) VALUES
(1, 'http://www.baidu.com', '百度', 1, 0, '0000-00-00 00:00:00', 1),
(2, 'https://google.com', 'Google', 2, 0, '0000-00-00 00:00:00', 1),
(3, 'http://163.com', '网易', 5, 0, '0000-00-00 00:00:00', 1),
(4, 'http://renren.com', '人人', 3, 0, '0000-00-00 00:00:00', 1),
(6, 'http://www.youku.com', '优酷', 4, 0, '2012-08-16 05:54:05', 1),
(7, 'http://weibo.com', '新浪微博', 6, 0, '2012-08-16 05:54:05', 1),
(8, 'http://www.tudou.com', '土豆', 1, 0, '2012-08-16 06:00:01', 2),
(9, 'http://www.qq.com', '腾讯', 2, 0, '2012-08-16 06:00:01', 2),
(10, 'https://zh.wikipedia.org/zh-cn/', '维基百科', 3, 0, '2012-08-16 06:00:01', 2),
(11, 'http://www.taobao.com', '淘宝', 4, 0, '2012-08-16 06:00:01', 2),
(12, 'http://www.360buy.com', '京东', 5, 0, '2012-08-16 06:00:01', 2),
(13, 'http://www.amazon.cn/', '亚马逊', 6, 0, '2012-08-16 06:00:01', 2),
(14, 'http://www.dangdang.com', '当当网', 7, 0, '2012-08-16 06:00:01', 2),
(15, 'http://www.bilibili.tv', 'bilibili', 8, 0, '2012-08-16 06:00:01', 2),
(16, 'http://www.ifeng.com', '凤凰网', 9, 0, '2012-08-16 06:00:01', 2),
(17, 'http://ele.me', '饿了么', 10, 0, '2012-08-16 06:00:01', 2),
(18, 'http://www.cmbchina.com', '招商银行', 11, 0, '2012-08-16 06:00:01', 2),
(19, 'http://up.mydrivers.com/welcome.htm', '驱动精灵', 12, 0, '2012-08-16 06:00:01', 2),
(41, 'http://jwc.bit.edu.cn/', '教务处', 161, 0, '2012-08-22 12:28:24', 4),
(42, 'http://bbs.bitnp.net/', '京工社区', 194, 0, '2012-08-22 12:28:24', 4),
(43, 'http://9stars.org/', '九星论坛', 194, 0, '2012-08-22 12:28:24', 4),
(44, 'http://bbs.bitnp.net/pt', '京工PT', 194, 0, '2012-08-22 12:28:24', 4),
(45, 'http://cms.bit.edu.cn/', '网络教室', 194, 0, '2012-08-22 12:28:24', 4),
(46, 'http://gse.bit.edu.cn/', '教育科学研究所', 194, 0, '2012-08-22 12:28:24', 4),
(47, 'http://www.baidu.com/s?ie=utf-8&bs=测试', '测试', 200, 0, '2012-08-22 12:28:24', 4),
(48, 'http://www.bitunion.org/', 'FTP联盟', 200, 0, '2012-08-22 12:28:24', 4);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `item` varchar(255) NOT NULL,
  `value` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`item`, `value`) VALUES
('bit_news_time', '{"time":1361552989}'),
('clean_data_time', '{"time":1361434523}'),
('common_url_time', '{"time":1361434523}'),
('count_heat_time', '{"time":1361434523}'),
('jwc_news_time', '{"time":1361437298}');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `source` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=541 ;

-- --------------------------------------------------------

--
-- 表的结构 `special`
--

CREATE TABLE IF NOT EXISTS `special` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `uid` int(4) NOT NULL,
  `ua` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iscommon` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=215 ;

-- --------------------------------------------------------

--
-- 表的结构 `submit_url`
--

CREATE TABLE IF NOT EXISTS `submit_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(1000) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(50) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `urllist`
--

CREATE TABLE IF NOT EXISTS `urllist` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `class` int(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `rank` int(4) NOT NULL,
  `is_direct` int(2) NOT NULL,
  `heat` int(4) NOT NULL DEFAULT '0',
  `heattimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- 转存表中的数据 `urllist`
--

INSERT INTO `urllist` (`id`, `class`, `url`, `name`, `content`, `rank`, `is_direct`, `heat`, `heattimestamp`, `status`) VALUES
(1, 1, 'http://bbs.bitnp.net', '京工社区', '京工社区', 1, 0, 1, '2013-02-21 08:15:22', 2),
(2, 1, 'http://bitpt.cn/bbs/', '极速论坛', '极速论坛', 2, 0, 1, '2013-02-21 08:15:22', 1),
(3, 1, 'http://bbs.bit.edu.cn', '石桥驿站', '石桥驿站', 3, 1, 1, '2013-02-21 08:15:22', 3),
(4, 1, 'http://www.bitunion.org/', '北理FTP联盟', '北理FTP联盟', 4, 0, 1, '2013-02-21 08:15:22', 1),
(5, 1, 'http://www.bitfx.org/', '飞翔论坛', '飞翔论坛', 5, 0, 1, '2013-02-21 08:15:22', 1),
(6, 1, 'http://9stars.org', '九星论坛', '九星论坛', 6, 0, 0, '2013-02-21 08:15:22', 1),
(7, 1, 'http://jwc.bit.edu.cn/forum', '教务处论坛', '教务处论坛', 7, 0, 0, '2013-02-21 08:15:22', 1),
(8, 1, 'http://hq.bit.edu.cn/GuestBook', '后勤集团', '后勤集团', 8, 0, 0, '2013-02-21 08:15:22', 1),
(9, 1, 'http://bbs.bitkaoyan.com', '北理考研论坛', '北理考研论坛', 9, 0, 0, '2013-02-21 08:15:22', 1),
(10, 1, 'http://tyzj.bit.edu.cn', '团员之家', '团员之家', 10, 0, 0, '2013-02-21 08:15:22', 1),
(11, 2, 'http://bitpt.cn/', '极速之星', '极速之星', 11, 0, 1, '2013-02-21 08:15:22', 2),
(12, 2, 'http://bbs.bitnp.net/nplive', 'NPLIVE', 'NPLIVE', 12, 0, 1, '2013-02-21 08:15:22', 1),
(13, 2, 'http://vod.bitnp.net/', '视听在线', '视听在线', 13, 0, 0, '2013-02-21 08:15:22', 1),
(14, 2, 'http://music.bitnp.net/', '找乐网', '找乐网', 14, 0, 0, '2013-02-21 08:15:22', 1),
(15, 2, 'http://10.2.70.23/', '校广播台', '校广播台', 15, 0, 0, '2013-02-21 08:15:22', 1),
(16, 2, 'http://10.1.0.155', '155', '155', 16, 0, 0, '2013-02-21 08:15:22', 1),
(17, 2, 'http://down.bitnp.net/', '自由下载', '自由下载', 17, 0, 0, '2013-02-21 08:15:22', 2),
(18, 2, 'http://dreamspark.eol.cn/', '微软学生软件资源', '微软学生软件资源', 18, 0, 1, '2013-02-21 08:15:22', 3),
(19, 3, 'http://acm.bit.edu.cn', '北理ACM', '北理ACM', 19, 0, 0, '2013-02-21 08:15:22', 1),
(20, 3, 'http://cslab.bit.edu.cn/', '计算机实验中心', '计算机实验中心', 20, 0, 0, '2013-02-21 08:15:22', 1),
(21, 3, 'http://jwc.bit.edu.cn', '教务处', '教务处', 21, 0, 1, '2013-02-21 08:15:22', 3),
(22, 3, 'http://eol.bit.edu.cn/', '教育在线', '教育在线', 22, 0, 0, '2013-02-21 08:15:22', 1),
(23, 3, 'http://ssc.bit.edu.cn:8086/xenon/', '开放实验选课', '开放实验选课', 23, 0, 0, '2013-02-21 08:15:22', 1),
(24, 3, 'http://cms.bit.edu.cn', '网络教室', '网络教室', 24, 0, 0, '2013-02-21 08:15:22', 3),
(25, 3, 'http://www.pec.bit.edu.cn', '物理实验中心', '物理实验中心', 25, 0, 0, '2013-02-21 08:15:22', 1),
(26, 3, 'http://grdms.bit.edu.cn/yjs/', '研究生管理系统', '研究生管理系统', 26, 0, 0, '2013-02-21 08:15:22', 1),
(27, 4, 'http://nod32.bit.edu.cn/', 'NOD32杀毒', 'NOD32杀毒', 27, 0, 1, '2013-02-21 08:15:22', 2),
(28, 4, 'http://www.bit.edu.cn/ggfw/bgdh18/gljgdh/29084.htm', '办公电话', '办公电话', 28, 0, 1, '2013-02-21 08:15:22', 1),
(29, 4, 'http://ddns.bitunion.org', '联盟DNS服务', '联盟DNS服务', 29, 0, 0, '2013-02-21 08:15:22', 1),
(30, 4, 'http://star.bit.edu.cn/ipsearch', '全网IP搜索', '全网IP搜索', 30, 0, 0, '2013-02-21 08:15:22', 1),
(31, 4, 'http://ravupd.bit.edu.cn/', '瑞星杀毒', '瑞星杀毒', 31, 0, 0, '2013-02-21 08:15:22', 1),
(32, 4, 'http://jwc.bit.edu.cn/plus/view.php?aid=2794', '校历', '校历', 32, 0, 0, '2013-02-21 08:15:22', 3),
(33, 4, 'http://10.4.50.213/', '形势政治答题', '形势政治答题', 33, 0, 0, '2013-02-21 08:15:22', 1),
(34, 5, 'http://www.bit.edu.cn/docs/20111115095609437636.pdf', '班车时刻表', '班车时刻表', 34, 0, 1, '2013-02-21 08:15:22', 3),
(35, 5, 'http://www.bit.edu.cn', '校园网', '校园网', 35, 0, 0, '2013-02-21 08:15:22', 1),
(36, 5, 'http://10.0.0.55:8800/', '外网帐号自服务 ', '外网帐号自服务 ', 36, 0, 0, '2013-02-21 08:15:22', 1),
(37, 5, 'http://mail.bit.edu.cn/', '邮箱', '邮箱', 37, 0, 0, '2013-02-21 08:15:22', 3),
(38, 5, 'http://smail.bit.edu.cn/', '新生邮箱', '新生邮箱', 38, 0, 0, '2013-02-21 08:15:22', 1),
(39, 5, 'http://10.102.20.2/', '校办', '校办', 39, 0, 0, '2013-02-21 08:15:22', 1),
(40, 5, 'http://century.bit.edu.cn/', '京工世纪', '京工世纪', 40, 0, 0, '2013-02-21 08:15:22', 1),
(41, 5, 'http://gonghui.bit.edu.cn/', '工会新闻', '工会新闻', 41, 0, 0, '2013-02-21 08:15:22', 1),
(42, 5, 'http://nsc.bit.edu.cn/', '网络服务中心', '网络服务中心', 42, 0, 0, '2013-02-21 08:15:22', 1),
(43, 5, 'http://ccyl.bit.edu.cn', '共青在线', '共青在线', 43, 0, 1, '2013-02-21 08:15:22', 1),
(44, 5, 'http://job.bit.edu.cn/', '就业信息网', '就业信息网', 44, 0, 0, '2013-02-21 08:15:22', 1),
(45, 5, 'http://www.bitpress.com.cn', '出版社', '出版社', 45, 0, 0, '2013-02-21 08:15:22', 1),
(46, 5, 'http://lib.bit.edu.cn/', '图书馆', '图书馆', 46, 0, 0, '2013-02-21 08:15:22', 3),
(47, 5, 'http://hq.bit.edu.cn', '后勤集团', '后勤集团', 47, 0, 0, '2013-02-21 08:15:22', 1),
(48, 5, 'http://pla.bit.edu.cn/', '选培办', '选妹啊', 48, 0, 0, '2013-02-21 08:15:22', 1),
(49, 5, 'http://10.1.134.3/', '财务处', '财务处', 49, 0, 0, '2013-02-21 08:15:22', 1),
(50, 5, 'http://10.1.134.6/wingsoft/index.jsp', '工资查询', '工资查询', 50, 0, 0, '2013-02-21 08:15:22', 1),
(51, 5, 'http://renshichu.bit.edu.cn/', '人事处', '人事处', 51, 0, 0, '2013-02-21 08:15:22', 1),
(52, 5, 'http://kjc.bit.edu.cn/', '科技处', '科技处', 52, 0, 0, '2013-02-21 08:15:22', 1),
(53, 5, 'http://ssc.bit.edu.cn/', '实验设备处', '实验设备处', 53, 0, 0, '2013-02-21 08:15:22', 1),
(54, 5, 'http://adge.edu.cn/', '学位与研究生教育', '学位与研究生教育', 54, 0, 0, '2013-02-21 08:15:22', 1),
(55, 5, 'http://www.bitsu.org/', '学生会', '学生会', 55, 0, 1, '2013-02-21 08:15:22', 1),
(56, 5, 'http://10.1.153.33/', '校医院', '校医院', 56, 0, 0, '2013-02-21 08:15:22', 1),
(57, 5, 'http://assn.bit.edu.cn/', '北理社联', '北理社联', 57, 0, 0, '2013-02-21 08:15:22', 1),
(58, 6, 'http://sae.bit.edu.cn/', '宇航学院', '宇航学院', 58, 0, 0, '2013-02-21 08:15:22', 1),
(59, 6, 'http://10.103.12.2:800/', '机电学院', '机电学院', 59, 0, 0, '2013-02-21 08:15:22', 1),
(60, 6, 'http://me.bit.edu.cn/AppWeb/Index/index.aspx', '机械与车辆学院', '机械与车辆学院', 60, 0, 0, '2013-02-21 08:15:22', 1),
(61, 6, 'http://optoelectronic.bit.edu.cn/', '光电学院', '光电学院', 61, 0, 0, '2013-02-21 08:15:22', 1),
(62, 6, 'http://sie.bit.edu.cn/', '信息与电子学院', '信息与电子学院', 62, 0, 0, '2013-02-21 08:15:22', 1),
(63, 6, 'http://ac.bit.edu.cn/', '自动化学院', '自动化学院', 63, 0, 0, '2013-02-21 08:15:22', 1),
(64, 6, 'http://cs.bit.edu.cn/', '计算机学院', '计算机学院', 64, 0, 0, '2013-02-21 08:15:22', 1),
(65, 6, 'http://ss.bit.edu.cn/', '软件学院', '软件学院', 65, 0, 1, '2013-02-21 08:15:22', 1),
(66, 6, 'http://mse.bit.edu.cn/', '材料学院', '材料学院', 66, 0, 0, '2013-02-21 08:15:22', 1),
(67, 6, 'http://www.bit.edu.cn/xxgk/xysz/hgyhjxy/index.htm', '化工与环境学院', '化工与环境学院', 67, 0, 0, '2013-02-21 08:15:22', 1),
(68, 6, 'http://life.bit.edu.cn/', '生命学院', '生命学院', 68, 0, 0, '2013-02-21 08:15:22', 1),
(69, 6, 'http://physics.bit.edu.cn/', '物理学院', '物理学院', 69, 0, 0, '2013-02-21 08:15:22', 1),
(70, 6, 'http://sc.bit.edu.cn/', '化学学院', '化学学院', 70, 0, 0, '2013-02-21 08:15:22', 1),
(71, 6, 'http://math.bit.edu.cn/', '数学学院', '数学学院', 71, 0, 0, '2013-02-21 08:15:22', 1),
(72, 6, 'http://sme.bit.edu.cn/', '管理与经济学院', '管理与经济学院', 72, 0, 0, '2013-02-21 08:15:22', 1),
(73, 6, 'http://rw.bit.edu.cn/', '人文与社会科学学院', '人文与社会科学学院', 73, 0, 0, '2013-02-21 08:15:22', 1),
(74, 6, 'http://law.bit.edu.cn/', '法学院', '法学院', 74, 0, 0, '2013-02-21 08:15:22', 1),
(75, 6, 'http://10.108.4.57/Index.asp', '外国语学院', '外国语学院', 75, 0, 0, '2013-02-21 08:15:22', 1),
(76, 6, 'http://design.bit.edu.cn/', '设计与艺术学院', '设计与艺术学院', 76, 0, 0, '2013-02-21 08:15:22', 1),
(77, 6, 'http://sla.bit.edu.cn/', '基础教育学院', '基础教育学院', 77, 0, 0, '2013-02-21 08:15:22', 1),
(78, 6, 'http://sice.bit.edu.cn/', '国际教育合作学院', '国际教育合作学院', 78, 0, 0, '2013-02-21 08:15:22', 1),
(79, 6, 'http://ioe.bit.edu.cn/', '教育研究院', '教育研究院', 79, 0, 0, '2013-02-21 08:15:22', 1),
(80, 7, 'http://law.bitss.com.cn/', '法学院学生事务办公系统', '法学院学生事务办公系统', 80, 0, 0, '2013-02-21 08:15:22', 1),
(81, 7, 'http://scee.bitss.com.cn/', '化工与环境学院学生事务办公系统', '化工与环境学院学生事务办公系统', 81, 0, 1, '2013-02-21 08:15:22', 1),
(82, 7, 'http://smve.bitss.com.cn/index.bit', '机械与车辆学院学生事务办公系统', '机械与车辆学院学生事务办公系统', 82, 0, 0, '2013-02-21 08:15:22', 1),
(83, 7, 'http://cs.bit.edu.cn/stuwebcs/', '计算机学院学生事务平台', '计算机学院学生事务平台', 83, 0, 0, '2013-02-21 08:15:22', 1),
(84, 7, 'http://ciunilag.org/', '拉各斯大学孔子学院', '拉各斯大学孔子学院', 84, 0, 0, '2013-02-21 08:15:22', 1),
(85, 7, 'http://bbs.bit.edu.cn/forumdisplay.php?fid=48', '理学与材料学部', '理学与材料学部', 85, 0, 0, '2013-02-21 08:15:22', 1),
(86, 7, 'http://ss.bit.edu.cn/OA/Login.aspx', '软件学院学生事务办公系统', '软件学院学生事务办公系统', 86, 0, 0, '2013-02-21 08:15:22', 1),
(87, 7, 'http://waiyu.bitss.com.cn/', '外语学院学生事务办公系统', '外语学院学生事务办公系统', 87, 0, 0, '2013-02-21 08:15:23', 1),
(88, 7, 'http://10.104.4.225', '信息与电子学院学生工作平台', '信息与电子学院学生工作平台', 88, 0, 1, '2013-02-21 08:15:23', 1),
(89, 7, 'http://grd.bit.edu.cn/', '研究生院', '研究生院', 89, 0, 0, '2013-02-21 08:15:23', 1),
(90, 8, 'http://est.bit.edu.cn/', '爆炸科学与技术国家重点实验室', '爆炸科学与技术国家重点实验室', 90, 0, 0, '2013-02-21 08:15:23', 1),
(91, 8, 'http://mse.bit.edu.cn/npc/', '材料学院纳米光子学课题组', '材料学院纳米光子学课题组', 91, 0, 0, '2013-02-21 08:15:23', 1),
(92, 8, 'http://shock.bit.edu.cn/', '冲击波物理与化学实验室', '冲击波物理与化学实验室', 92, 0, 0, '2013-02-21 08:15:23', 1),
(93, 8, 'http://www.cems.bj.cn/', '电磁仿真中心', '电磁仿真中心', 93, 0, 0, '2013-02-21 08:15:23', 1),
(94, 8, 'http://robot.bit.edu.cn/', '仿生机器人与系统教育部重点实验室', '仿生机器人与系统教育部重点实验室', 94, 0, 0, '2013-02-21 08:15:23', 1),
(95, 8, 'http://pnc.bit.edu.cn/', '高能材料合成实验室', '高能材料合成实验室', 95, 0, 0, '2013-02-21 08:15:23', 1),
(96, 8, 'http://10.1.85.99/', '管理信息实验室', '管理信息实验室', 96, 0, 0, '2013-02-21 08:15:23', 1),
(97, 8, 'http://www.kunpengfly.org/', '机器人视觉与运动控制实验室 ', '机器人视觉与运动控制实验室 ', 97, 0, 0, '2013-02-21 08:15:23', 1),
(98, 8, 'http://www.bitcae.com.cn/', '计算机应用与仿真实验室 ', '计算机应用与仿真实验室 ', 98, 0, 0, '2013-02-21 08:15:23', 1),
(99, 8, 'http://www.kjpj.net/', '科技评价与创新管理实验室', '科技评价与创新管理实验室', 99, 0, 0, '2013-02-21 08:15:23', 1),
(100, 8, 'http://mcislab.cs.bit.edu.cn/', '媒体计算与智能系统实验室', '媒体计算与智能系统实验室', 100, 0, 0, '2013-02-21 08:15:23', 1),
(101, 8, 'http://pris.bit.edu.cn/', '模式识别与智能系统研究所', '模式识别与智能系统研究所', 101, 0, 0, '2013-02-21 08:15:23', 1),
(102, 8, 'http://mse.bit.edu.cn/npc/', '纳米光子学实验室', '纳米光子学实验室', 102, 0, 0, '2013-02-21 08:15:23', 1),
(103, 8, 'http://www.ceep.net.cn/', '能源与环境政策研究中心', '能源与环境政策研究中心', 103, 0, 0, '2013-02-21 08:15:23', 1),
(104, 8, 'http://biomechanics.bit.edu.cn/', '生物力学与生物材料实验室', '生物力学与生物材料实验室', 104, 0, 0, '2013-02-21 08:15:23', 1),
(105, 8, 'http://life.bit.edu.cn/lichun/01/homezh.html', '生物转化与微生态课题组', '生物转化与微生态课题组', 105, 0, 0, '2013-02-21 08:15:23', 1),
(106, 8, 'http://www.commlab.cn/', '通信技术研究所', '通信技术研究所', 106, 0, 0, '2013-02-21 08:15:23', 1),
(107, 8, 'http://micromechanics.bit.edu.cn/', '细观力学实验室', '细观力学实验室', 107, 0, 0, '2013-02-21 08:15:23', 1),
(108, 8, 'http://www.pyrochem.com.cn/', '药剂化学组', '药剂化学组', 108, 0, 0, '2013-02-21 08:15:23', 1),
(109, 8, 'http://10.1.141.18:8080/sbweb/login.asp', '仪器设备管理', '仪器设备管理', 109, 0, 0, '2013-02-21 08:15:23', 1),
(110, 8, 'http://zzm.bit.edu.cn/', '应化周智明组', '应化周智明组', 110, 0, 0, '2013-02-21 08:15:23', 1),
(111, 8, 'http://robofly.bit.edu.cn/', '智能无人系统学科组', '智能无人系统学科组', 111, 0, 0, '2013-02-21 08:15:23', 1),
(112, 8, 'http://scee.bit.edu.cn/zcjktz/', '朱长进课题组', '朱长进课题组', 112, 0, 0, '2013-02-21 08:15:23', 1),
(113, 8, 'http://nlp.bit.edu.cn/', '自然语言处理', '自然语言处理', 113, 0, 0, '2013-02-21 08:15:23', 1),
(114, 8, 'http://blog.sina.com.cn/bitaolab', '自适应光学与空间光学实验室', '自适应光学与空间光学实验室', 114, 0, 0, '2013-02-21 08:15:23', 1),
(115, 8, 'http://www.bityrj.com/', '阻燃材料国家专业实验室', '阻燃材料国家专业实验室', 115, 0, 0, '2013-02-21 08:15:23', 1),
(116, 8, 'http://inin.bit.edu.cn/', '组合导航与智能导航研究室', '组合导航与智能导航研究室', 116, 0, 0, '2013-02-21 08:15:23', 1),
(117, 9, 'http://10.104.4.225/portal.php?mod=topic&topicid=2', '红雨新闻社', '红雨新闻社', 117, 0, 0, '2013-02-21 08:15:23', 1),
(118, 9, 'http://10.2.70.20/', '京工新闻社', '京工新闻社', 118, 0, 0, '2013-02-21 08:15:23', 1),
(119, 9, 'http://jgyjt.at.bitunion.org/', '京工演讲团', '京工演讲团', 119, 0, 0, '2013-02-21 08:15:23', 1),
(120, 9, 'http://www.9news.org.cn/', '九歌新闻社', '九歌新闻社', 120, 0, 1, '2013-02-21 08:15:23', 1),
(121, 9, 'http://qgzx.bit.edu.cn/', '勤工助学中心', '勤工助学中心', 121, 0, 0, '2013-02-21 08:15:23', 1),
(122, 9, 'http://home.bitnp.net/', '网络开拓者协会', '网络开拓者协会', 122, 0, 0, '2013-02-21 08:15:23', 2),
(123, 9, 'http://vol.bit.edu.cn/', '延河之星志愿者', '延河之星志愿者', 123, 0, 0, '2013-02-21 08:15:23', 1),
(124, 10, 'http://www.felixwoo.com/', 'Felix', 'Felix', 124, 0, 1, '2013-02-21 08:15:23', 1),
(125, 10, 'http://www.te168.cn', '风格独特', '风格独特', 125, 1, 1, '2013-02-21 08:15:23', 4),
(126, 2, 'http://baike.bitnp.net', '北理百科', '北理百科', 40, 1, 2, '2013-02-21 08:15:22', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
