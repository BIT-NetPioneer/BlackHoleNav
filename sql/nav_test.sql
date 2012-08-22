-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 22 日 11:36
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

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

--
-- 转存表中的数据 `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('112f58f347c6e44a8d7443ea156915c9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', 1345189782, 'a:4:{s:9:"user_data";s:0:"";s:5:"uname";s:5:"bitnp";s:5:"upass";s:40:"28765716e195114d7ba9795a70b94be9d75ddfb6";s:10:"permission";s:1:"9";}'),
('b0053062e606106d3b191193c76f7468', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', 1345189858, 'a:4:{s:9:"user_data";s:0:"";s:5:"uname";s:5:"bitnp";s:5:"upass";s:40:"28765716e195114d7ba9795a70b94be9d75ddfb6";s:10:"permission";s:1:"9";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`, `rank`, `status`) VALUES
(1, '论坛', 1, 1),
(2, '视听', 2, 1),
(3, '教学', 3, 1),
(4, '服务', 4, 1),
(5, '学校', 5, 1),
(6, '院系', 6, 1),
(7, '实验', 7, 1),
(8, '社团', 8, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

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
(33, 'http://jwc.bit.edu.cn/', '教务处', 162, 0, '2012-08-22 07:08:31', 4),
(34, 'http://bbs.bitnp.net/', '京工社区', 194, 0, '2012-08-22 07:08:31', 4),
(35, 'http://9stars.org/', '九星论坛', 194, 0, '2012-08-22 07:08:31', 4),
(36, 'http://cms.bit.edu.cn/', '网络教室', 194, 0, '2012-08-22 07:08:31', 4),
(37, 'http://gse.bit.edu.cn/', '教育科学研究所', 194, 0, '2012-08-22 07:08:31', 4),
(38, 'http://www.baidu.com/s?ie=utf-8&bs=测试', '测试', 200, 0, '2012-08-22 07:08:31', 4),
(39, 'http://www.bitunion.org/', 'FTP联盟', 200, 0, '2012-08-22 07:08:31', 4),
(40, 'http://music.bitnp.net/', '找乐网', 200, 0, '2012-08-22 07:08:31', 4);

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
('bit_news_time', '{"time":1345626120}'),
('clean_data_time', NULL),
('common_url_time', '{"time":1345619311}'),
('count_heat_time', '{"time":1345619311}'),
('jwc_news_time', '{"time":1345626120}'),
('on_task', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `url`, `date`, `source`, `status`) VALUES
(1, '2012年本科生秋季售书时间安排(新)', 'http://jwc.bit.edu.cn/plus/view.php?aid=2866', '2012-08-21 00:00:00', 1, 1),
(2, '关于对李某考试作弊的通报', 'http://jwc.bit.edu.cn/plus/view.php?aid=2864', '2012-08-20 00:00:00', 1, 1),
(3, '关于2012年暑假期间教务管理系统关闭的通', 'http://jwc.bit.edu.cn/plus/view.php?aid=2862', '2012-08-20 00:00:00', 1, 1),
(4, '2012-2013学年第一学期各专业接收学生情况', 'http://jwc.bit.edu.cn/plus/view.php?aid=2862', '2012-08-20 00:00:00', 1, 1),
(5, '关于对王某、?p某、闻某、马某及吕某五人', 'http://jwc.bit.edu.cn/plus/view.php?aid=2861', '2012-08-20 00:00:00', 1, 1),
(6, 'QS亚洲大学排名公布 北理工位居亚洲100强', 'http://www.bit.edu.cn/xww/xwtt/77913.htm', '2012-08-20 00:34:20', 2, 1),
(7, '北理工人文学院第六届天桥大学生主任助理暑期社会实践团结业...', 'http://www.bit.edu.cn/xww/xwtt/78212.htm', '2012-08-20 00:34:20', 2, 1),
(8, '北理工软件科技创新创业基地隆重召开2012年暑期集训总结...', 'http://www.bit.edu.cn/xww/xwtt/78213.htm', '2012-08-20 00:34:20', 2, 1),
(9, '北京理工大学徐特立科学营活动胜利闭幕', 'http://www.bit.edu.cn/xww/xwtt/78189.htm', '2012-08-20 00:34:20', 2, 1),
(10, '北理工软件科技创新创业基地举办“科技创新之夜”文艺晚会', 'http://www.bit.edu.cn/xww/xwtt/78214.htm', '2012-08-20 00:34:20', 2, 1),
(11, '中教大厅：良乡校区职工住宅沙盘展介', 'http://www.bit.edu.cn/ggfw/tzgg17/78068.htm', '2012-08-20 00:34:20', 3, 1),
(12, '关于组织申报2012年度“教育部-中国移动科研基金”项目...', 'http://www.bit.edu.cn/ggfw/tzgg17/78210.htm', '2012-08-20 00:34:20', 3, 1),
(13, '关于做好全国教育科学“十二五”规划2012年度课题组织申...', 'http://www.bit.edu.cn/ggfw/tzgg17/78185.htm', '2012-08-20 00:34:20', 3, 1),
(14, '“创新与成长”——北理工第二届校友论坛专题', 'http://www.bit.edu.cn/ggfw/tzgg17/78161.htm', '2012-08-20 00:34:20', 3, 1),
(15, '物理学院“博约学术论坛”系列报告第24期', 'http://www.bit.edu.cn/ggfw/tzgg17/78163.htm', '2012-08-20 00:34:20', 3, 1),
(16, '“2012多智能体分布式协调与控制国际学术研讨会“在北理...', 'http://www.bit.edu.cn/xww/xwtt/78220.htm', '2012-08-20 19:04:20', 2, 1),
(17, '关于2012年8月21日校园网电信出口短时间中断的通知', 'http://www.bit.edu.cn/ggfw/tzgg17/78222.htm', '2012-08-21 02:10:21', 3, 1),
(18, '中国兵器北化集团第二期中青年干部培训班在北理工举行开班典...', 'http://www.bit.edu.cn/xww/xwtt/78230.htm', '2012-08-22 12:17:22', 2, 1),
(19, '香川利春受聘北理工兼职教授、赵彤受聘北理工自动化学院顾问...', 'http://www.bit.edu.cn/xww/xwtt/78231.htm', '2012-08-22 12:17:22', 2, 1);

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

--
-- 转存表中的数据 `special`
--

INSERT INTO `special` (`id`, `name`, `url`, `description`, `image`, `date`, `status`) VALUES
(1, '《电车之狼R》校内PT下载', 'http://www.3dmgame.com/', '《电车之狼R》校内PT下载！10MB/s哦亲！', '1', '2012-08-31', 0),
(2, '《同校生》极限高压汉化版', 'http://www.baidu.com/', 'i社，Real-time引擎力作。经典3d游戏', '2', '2012-08-31', 0),
(3, '《工口医3D》自由下载', 'http://www.qq.com/', '2008年F社作品，《工口医3D》XX医生！', '3', '2012-08-31', 0),
(4, 'ABS-141!!!', 'http://115.com/file/e70ncwph', '90后 泷泽萝拉，你懂的。', '1-Medium_20120725135631125', '2012-08-31', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `statistics`
--

INSERT INTO `statistics` (`id`, `url`, `uid`, `ua`, `ip`, `timestamp`, `iscommon`) VALUES
(25, 'http://9stars.org/', 4, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:11:48', 0),
(26, 'http://gse.bit.edu.cn/', 16, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:12:04', 0),
(27, 'http://jwc.bit.edu.cn/', 21, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:12:15', 1),
(32, 'http://cms.bit.edu.cn/', 12, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 07:02:39', 0),
(31, 'http://bbs.bitnp.net/', 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 07:02:33', 0),
(30, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:36:07', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- 转存表中的数据 `urllist`
--

INSERT INTO `urllist` (`id`, `class`, `url`, `name`, `content`, `rank`, `is_direct`, `heat`, `heattimestamp`, `status`) VALUES
(1, 1, 'http://bbs.bitnp.net/', '京工社区', '京工社区', 0, 1, 1, '2012-08-22 07:08:30', 2),
(2, 1, 'http://www.bitunion.org/', 'FTP联盟', 'FTP联盟', 1, 1, 0, '2012-08-22 07:08:30', 2),
(3, 1, 'http://www.bitfx.org/', '飞翔论坛', '飞翔论坛', 2, 0, 0, '2012-08-22 07:08:30', 1),
(4, 1, 'http://9stars.org/', '九星论坛', '九星论坛', 3, 0, 1, '2012-08-22 07:08:30', 1),
(5, 1, 'http://bbs.bit.edu.cn/', '石桥驿站', '石桥驿站', 4, 0, 0, '2012-08-22 07:08:30', 1),
(6, 1, 'http://bitpt.cn/bbs/', '极速之星', '极速之星', 5, 0, 0, '2012-08-22 07:08:30', 8),
(7, 2, 'http://music.bitnp.net/', '找乐网', '找乐网', 1, 0, 0, '2012-08-22 07:08:30', 1),
(8, 2, 'http://bbs.bitnp.net/nplive', 'NPLIVE', 'NPLIVE', 2, 0, 0, '2012-08-22 07:08:30', 1),
(9, 2, 'http://bbs.bitnp.net/pt', '京工PT', '京工PT', 3, 0, 0, '2012-08-22 07:08:30', 1),
(10, 2, 'http://10.2.70.110/vod/index/index.php', '学生电视中心', '学生电视中心', 4, 0, 0, '2012-08-22 07:08:30', 1),
(11, 3, 'http://jwc.bit.edu.cn/', '教务处', '教务处', 5, 0, 46, '2012-08-22 07:08:30', 3),
(12, 3, 'http://cms.bit.edu.cn/', '网络教室', '网络教室', 6, 1, 1, '2012-08-22 07:08:30', 1),
(13, 3, 'http://eol.bit.edu.cn/', '教育在线', '教育在线', 7, 0, 0, '2012-08-22 07:08:30', 1),
(14, 3, 'http://www.pec.bit.edu.cn/', '物理实验中心', '物理实验中心', 8, 0, 0, '2012-08-22 07:08:30', 1),
(15, 3, 'http://ssc.bit.edu.cn:8086/xenon/', '开放实验选课', '开放实验选课', 9, 0, 0, '2012-08-22 07:08:30', 1),
(16, 3, 'http://gse.bit.edu.cn/', '教育科学研究所', '教育科学研究所', 10, 0, 1, '2012-08-22 07:08:31', 1),
(17, 3, 'http://cslab.bit.edu.cn/', '计算机实验中心', '计算机实验中心', 11, 0, 0, '2012-08-22 07:08:31', 1),
(18, 3, 'http://acm.bit.edu.cn/', '北理ACM', '北理ACM', 12, 0, 0, '2012-08-22 07:08:31', 1),
(19, 4, 'http://jwc.bit.edu.cn/plus/view.php?aid=2114', '校历', '校历', 1, 0, 0, '2012-08-22 07:08:30', 1),
(20, 4, 'http://www.bit.edu.cn/ggfw/bgdh18/gljgdh/29084.htm', '办公电话', '办公电话', 2, 0, 0, '2012-08-22 07:08:30', 1),
(21, 4, 'http://star.bit.edu.cn/ipsearch', '全网IP搜索', '全网IP搜索', 3, 0, 0, '2012-08-22 07:08:30', 1),
(22, 4, 'http://nod32.at.bitunion.org/', 'NOD32更新', 'NOD32更新', 4, 0, 0, '2012-08-22 07:08:30', 1),
(23, 4, 'http://down.bitnp.net/', '自由下载', '自由下载', 5, 0, 0, '2012-08-22 07:08:30', 1),
(24, 5, 'http://www.bit.edu.cn/', '北理首页', '北理首页', 1, 0, 0, '2012-08-22 07:08:30', 1),
(25, 5, 'http://lib.bit.edu.cn/', '图书馆', '图书馆', 2, 0, 0, '2012-08-22 07:08:30', 1),
(26, 5, 'http://mail.bit.edu.cn/', '北理邮箱', '北理邮箱', 3, 0, 0, '2012-08-22 07:08:30', 1),
(27, 5, 'http://10.0.0.55', '上网账号查询', '上网账号查询', 4, 0, 0, '2012-08-22 07:08:30', 1),
(28, 5, 'http://ccyl.bit.edu.cn/', '共青在线', '共青在线', 5, 0, 0, '2012-08-22 07:08:30', 1),
(29, 5, 'http://hq.bit.edu.cn/', '后勤集团', '后勤集团', 6, 0, 0, '2012-08-22 07:08:30', 1),
(30, 5, 'http://www.bitpress.com.cn/', '出版社', '出版社', 7, 0, 0, '2012-08-22 07:08:30', 1),
(31, 5, 'http://pla.bit.edu.cn/', '选妹啊', '选妹啊', 8, 0, 0, '2012-08-22 07:08:30', 1),
(32, 5, 'http://10.1.134.3/', '财务处', '财务处', 9, 0, 0, '2012-08-22 07:08:30', 1),
(33, 5, 'http://10.1.134.6/wingsoft/index.jsp', '工资查询', '工资查询', 10, 0, 0, '2012-08-22 07:08:31', 1),
(34, 5, 'http://renshichu.bit.edu.cn/', '人事处', '人事处', 11, 0, 0, '2012-08-22 07:08:31', 1),
(35, 5, 'http://10.1.133.6/', '科技处', '科技处', 12, 0, 0, '2012-08-22 07:08:31', 1),
(36, 5, 'http://10.1.141.18:8081/', '实验设备处', '实验设备处', 13, 0, 0, '2012-08-22 07:08:31', 1),
(37, 5, 'http://lgfx.bit.edu.cn/', '附属小学', '附属小学', 14, 0, 0, '2012-08-22 07:08:31', 1),
(38, 5, 'http://www.bitsu.org/', '学生会', '学生会', 15, 0, 0, '2012-08-22 07:08:31', 1),
(39, 5, 'http://10.1.153.33/', '校医院', '校医院', 16, 0, 0, '2012-08-22 07:08:31', 1),
(40, 5, 'http://10.102.20.2/', '校办', '校办', 17, 0, 0, '2012-08-22 07:08:31', 1),
(41, 6, 'http://grd.bit.edu.cn/', '研究生院', '研究生院', 1, 0, 0, '2012-08-22 07:08:30', 1),
(42, 6, 'http://cs.bit.edu.cn/stuwebcs/', '计算机学院学生事务平台', '计算机学院学生事务平台', 2, 0, 0, '2012-08-22 07:08:30', 1),
(43, 6, 'http://automation.at.bitunion.org/', '自动化学院', '自动化学院', 3, 0, 0, '2012-08-22 07:08:30', 1),
(44, 6, 'http://sme.bit.edu.cn/', '管理与经济学院', '管理与经济学院', 4, 0, 0, '2012-08-22 07:08:30', 1),
(45, 6, 'http://10.103.2.231/', '宇航学院', '宇航学院', 5, 0, 0, '2012-08-22 07:08:30', 1),
(46, 6, 'http://10.101.5.5/', '机械与车辆学院', '机械与车辆学院', 6, 0, 0, '2012-08-22 07:08:30', 1),
(47, 6, 'http://science.bit.edu.cn/', '理学院', '理学院', 7, 0, 0, '2012-08-22 07:08:30', 1),
(48, 6, 'http://office.bitss.com.cn/', '软件学院学生事务办公系统', '软件学院学生事务办公系统', 8, 0, 0, '2012-08-22 07:08:30', 1),
(49, 6, 'http://cs.bit.edu.cn/', '计算机学院', '计算机学院', 9, 0, 0, '2012-08-22 07:08:31', 1),
(50, 6, 'http://optoelectronic.bit.edu.cn/', '光电学院', '光电学院', 10, 0, 0, '2012-08-22 07:08:31', 1),
(51, 6, 'http://10.103.12.2:800/', '机电学院', '机电学院', 11, 0, 0, '2012-08-22 07:08:31', 1),
(52, 6, 'http://10.108.4.57/Index.asp', '外国语学院', '外国语学院', 12, 0, 0, '2012-08-22 07:08:31', 1),
(53, 6, 'http://sla.bit.edu.cn/', '基础教育学院', '基础教育学院', 13, 0, 0, '2012-08-22 07:08:31', 1),
(54, 6, 'http://life.bit.edu.cn/', '生命科学与技术学院', '生命科学与技术学院', 14, 0, 0, '2012-08-22 07:08:31', 1),
(55, 6, 'http://law.bit.edu.cn/', '法学院', '法学院', 15, 0, 0, '2012-08-22 07:08:31', 1),
(56, 6, 'http://ss.bit.edu.cn/', '软件学院', '软件学院', 16, 0, 0, '2012-08-22 07:08:31', 1),
(57, 6, 'http://mse.bit.edu.cn/', '材料学院', '材料学院', 17, 0, 0, '2012-08-22 07:08:31', 1),
(58, 6, 'http://www.bit.edu.cn/xxgk/xysz/hgyhjxy/index.htm', '化工与环境学院', '化工与环境学院', 18, 0, 0, '2012-08-22 07:08:31', 1),
(59, 8, 'http://assn.bit.edu.cn/', '北理社联', '北理社联', 1, 0, 0, '2012-08-22 07:08:30', 1),
(60, 8, 'http://home.bitnp.net/', '网络开拓者协会', '网络开拓者协会', 2, 0, 0, '2012-08-22 07:08:30', 1),
(61, 8, 'http://www.needforspeed.cn/bitauto/', '爱车协会', '爱车协会', 3, 0, 0, '2012-08-22 07:08:30', 1),
(62, 8, 'http://qgzx.bit.edu.cn/', '勤工助学中心', '勤工助学中心', 4, 0, 0, '2012-08-22 07:08:30', 1),
(63, 8, 'http://10.103.4.111/', '机电科协', '机电科协', 5, 0, 0, '2012-08-22 07:08:30', 1),
(64, 8, 'http://century.bit.edu.cn/ziqiang/', '自强社', '自强社', 6, 0, 0, '2012-08-22 07:08:30', 1),
(65, 8, 'http://www.bitacca.org/', '计算机协会', '计算机协会', 7, 0, 0, '2012-08-22 07:08:30', 1),
(66, 8, 'http://www.jgnews.org.cn/', '京工新闻社', '京工新闻社', 8, 0, 0, '2012-08-22 07:08:30', 1),
(67, 8, 'http://vol.bit.edu.cn/', '延河之星志愿者', '延河之星志愿者', 9, 0, 0, '2012-08-22 07:08:31', 1),
(68, 8, 'http://www.9news.org.cn/', '九歌新闻', '九歌新闻', 10, 0, 0, '2012-08-22 07:08:31', 1),
(69, 8, 'http://jgyjt.at.bitunion.org/', '京工演讲团', '京工演讲团', 11, 0, 0, '2012-08-22 07:08:31', 1),
(70, 8, 'http://lx.bitsu.org/', '基础教育学院学生会', '基础教育学院学生会', 12, 0, 0, '2012-08-22 07:08:31', 1),
(71, 1, 'http://www.baidu.com/s?ie=utf-8&bs=测试', '测试', '测试', -1, 1, 0, '2012-08-22 07:08:30', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
