-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 26 日 18:04
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

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
('bit_news_time', '{"time":1345804710}'),
('clean_data_time', '{"time":1345638472}'),
('common_url_time', '{"time":1345638504}'),
('count_heat_time', '{"time":1345638504}'),
('jwc_news_time', '{"time":1345804710}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

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
(19, '香川利春受聘北理工兼职教授、赵彤受聘北理工自动化学院顾问...', 'http://www.bit.edu.cn/xww/xwtt/78231.htm', '2012-08-22 12:17:22', 2, 1),
(20, '关于8月23日、24日倒闸停电的紧急通知', 'http://www.bit.edu.cn/ggfw/tzgg17/78234.htm', '2012-08-23 15:42:23', 3, 1),
(21, '教育部人文社会科学研究项目2012年中期检查工作的通知', 'http://www.bit.edu.cn/ggfw/tzgg17/78246.htm', '2012-08-24 18:38:24', 3, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `statistics`
--

INSERT INTO `statistics` (`id`, `url`, `uid`, `ua`, `ip`, `timestamp`, `iscommon`) VALUES
(25, 'http://9stars.org/', 4, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:11:48', 0),
(26, 'http://gse.bit.edu.cn/', 16, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:12:04', 0),
(27, 'http://jwc.bit.edu.cn/', 21, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:12:15', 1),
(32, 'http://cms.bit.edu.cn/', 12, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 07:02:39', 0),
(31, 'http://bbs.bitnp.net/', 1, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 07:02:33', 0),
(30, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 05:36:07', 0),
(33, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 09:49:47', 0),
(34, 'http://ele.me', 17, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 09:52:49', 1),
(35, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 10:31:38', 0),
(36, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)', '::1', '2012-08-22 10:32:17', 0),
(37, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 10:34:06', 0),
(38, 'http://bbs.bitnp.net/pt', 9, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 10:34:16', 0),
(39, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)', '::1', '2012-08-22 10:35:22', 0),
(40, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 10:35:30', 0),
(41, 'http://jwc.bit.edu.cn/', 11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0', '::1', '2012-08-22 10:35:36', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- 转存表中的数据 `urllist`
--

INSERT INTO `urllist` (`id`, `class`, `url`, `name`, `content`, `rank`, `is_direct`, `heat`, `heattimestamp`, `status`) VALUES
(1, 1, 'http://bbs.bitnp.net', '京工社区', '京工社区', 1, 0, 0, '2012-08-23 05:02:43', 1),
(2, 1, 'http://bitpt.cn/bbs/', '极速论坛', '极速论坛', 2, 0, 0, '2012-08-23 05:02:44', 1),
(3, 1, 'http://www.bitunion.org/', '北理FTP联盟', '北理FTP联盟', 3, 0, 0, '2012-08-23 05:02:44', 1),
(4, 1, 'http://bbs.bit.edu.cn', '石桥驿站', '石桥驿站', 4, 1, 0, '2012-08-23 05:02:44', 1),
(5, 1, 'http://www.bitfx.org/', '飞翔论坛', '飞翔论坛', 5, 0, 0, '2012-08-23 05:02:44', 1),
(6, 1, 'http://9stars.org', '九星论坛', '九星论坛', 6, 0, 0, '2012-08-23 05:02:44', 1),
(7, 1, 'http://jwc.bit.edu.cn/forum', '教务处论坛', '教务处论坛', 7, 0, 0, '2012-08-23 05:02:44', 1),
(8, 1, 'http://hq.bit.edu.cn/GuestBook', '后勤集团', '后勤集团', 8, 0, 0, '2012-08-23 05:02:44', 1),
(9, 1, 'http://bbs.bitkaoyan.com', '北理考研论坛', '北理考研论坛', 9, 0, 0, '2012-08-23 05:02:44', 1),
(10, 1, 'http://tyzj.bit.edu.cn', '团员之家', '团员之家', 10, 0, 0, '2012-08-23 05:02:44', 1),
(11, 2, 'http://bitpt.cn/', '极速之星', '极速之星', 12, 0, 0, '2012-08-23 05:02:44', 1),
(12, 2, 'http://bbs.bitnp.net/nplive', 'NPLIVE', 'NPLIVE', 13, 0, 0, '2012-08-23 05:02:44', 1),
(13, 2, 'http://vod.bitnp.net/', '视听在线', '视听在线', 14, 0, 0, '2012-08-23 05:02:44', 1),
(14, 2, 'http://music.bitnp.net/', '找乐网', '找乐网', 15, 0, 0, '2012-08-23 05:02:44', 1),
(15, 2, 'http://10.2.70.23/', '校广播台', '校广播台', 16, 0, 0, '2012-08-23 05:02:44', 1),
(16, 2, 'http://10.1.0.155', '155', '155', 17, 0, 0, '2012-08-23 05:02:44', 1),
(17, 2, 'http://down.bitnp.net/', '自由下载', '自由下载', 18, 0, 0, '2012-08-23 05:02:44', 1),
(18, 2, 'http://dreamspark.eol.cn/', '微软学生软件资源', '微软学生软件资源', 19, 0, 0, '2012-08-23 05:02:44', 1),
(19, 3, 'http://jwc.bit.edu.cn', '教务处', '教务处', 21, 0, 0, '2012-08-23 05:02:44', 1),
(20, 3, 'http://eol.bit.edu.cn/', '教育在线', '教育在线', 22, 0, 0, '2012-08-23 05:02:44', 1),
(21, 3, 'http://cms.bit.edu.cn', '网络教室', '网络教室', 23, 0, 0, '2012-08-23 05:02:44', 1),
(22, 3, 'http://www.pec.bit.edu.cn', '物理实验中心', '物理实验中心', 24, 0, 0, '2012-08-23 05:02:44', 1),
(23, 3, 'http://ssc.bit.edu.cn:8086/xenon/', '开放实验选课', '开放实验选课', 25, 0, 0, '2012-08-23 05:02:44', 1),
(24, 3, 'http://cslab.bit.edu.cn/', '计算机实验中心', '计算机实验中心', 26, 0, 0, '2012-08-23 05:02:44', 1),
(25, 3, 'http://acm.bit.edu.cn', '北理ACM', '北理ACM', 27, 0, 0, '2012-08-23 05:02:44', 1),
(26, 3, 'http://grdms.bit.edu.cn/yjs/', '研究生管理系统', '研究生管理系统', 28, 0, 0, '2012-08-23 05:02:44', 1),
(27, 4, 'http://jwc.bit.edu.cn/plus/view.php?aid=2114', '校历', '校历', 30, 0, 0, '2012-08-23 05:02:44', 1),
(28, 4, 'http://www.bit.edu.cn/ggfw/bgdh18/gljgdh/29084.htm', '办公电话', '办公电话', 31, 0, 0, '2012-08-23 05:02:44', 1),
(29, 4, 'http://star.bit.edu.cn/ipsearch', '全网IP搜索', '全网IP搜索', 32, 0, 0, '2012-08-23 05:02:44', 1),
(30, 4, 'http://ravupd.bit.edu.cn/', '瑞星杀毒', '瑞星杀毒', 33, 0, 0, '2012-08-23 05:02:44', 1),
(31, 4, 'http://nod32.bit.edu.cn/', 'NOD32杀毒', 'NOD32杀毒', 34, 0, 0, '2012-08-23 05:02:44', 1),
(32, 4, 'http://ddns.bitunion.org', '联盟DNS服务', '联盟DNS服务', 35, 0, 0, '2012-08-23 05:02:44', 1),
(33, 4, 'http://10.4.50.213/', '形势政治答题', '形势政治答题', 36, 0, 0, '2012-08-23 05:02:44', 1),
(34, 5, 'http://www.bit.edu.cn/docs/20111115095609437636.pdf', '班车时刻表', '班车时刻表', 38, 0, 0, '2012-08-23 05:02:44', 1),
(35, 5, 'http://www.bit.edu.cn', '校园网', '校园网', 39, 0, 0, '2012-08-23 05:02:44', 1),
(36, 5, 'http://10.0.0.55:8800/', '外网帐号自服务 ', '外网帐号自服务 ', 40, 0, 0, '2012-08-23 05:02:44', 1),
(37, 5, 'http://mail.bit.edu.cn/', '邮箱', '邮箱', 41, 0, 0, '2012-08-23 05:02:44', 1),
(38, 5, 'http://smail.bit.edu.cn/', '新生邮箱', '新生邮箱', 42, 0, 0, '2012-08-23 05:02:44', 1),
(39, 5, 'http://10.102.20.2/', '校办', '校办', 43, 0, 0, '2012-08-23 05:02:44', 1),
(40, 5, 'http://century.bit.edu.cn/', '京工世纪', '京工世纪', 44, 0, 0, '2012-08-23 05:02:44', 1),
(41, 5, 'http://gonghui.bit.edu.cn/', '工会新闻', '工会新闻', 45, 0, 0, '2012-08-23 05:02:44', 1),
(42, 5, 'http://nsc.bit.edu.cn/', '网络服务中心', '网络服务中心', 46, 0, 0, '2012-08-23 05:02:44', 1),
(43, 5, 'http://ccyl.bit.edu.cn', '共青在线', '共青在线', 47, 0, 0, '2012-08-23 05:02:44', 1),
(44, 5, 'http://job.bit.edu.cn/', '就业信息网', '就业信息网', 48, 0, 0, '2012-08-23 05:02:44', 1),
(45, 5, 'http://www.bitpress.com.cn', '出版社', '出版社', 49, 0, 0, '2012-08-23 05:02:44', 1),
(46, 5, 'http://lib.bit.edu.cn/', '图书馆', '图书馆', 50, 0, 0, '2012-08-23 05:02:44', 1),
(47, 5, 'http://hq.bit.edu.cn', '后勤集团', '后勤集团', 51, 0, 0, '2012-08-23 05:02:44', 1),
(48, 5, 'http://pla.bit.edu.cn/', '选妹啊', '选妹啊', 52, 0, 0, '2012-08-23 05:02:44', 1),
(49, 5, 'http://10.1.134.3/', '财务处', '财务处', 53, 0, 0, '2012-08-23 05:02:44', 1),
(50, 5, 'http://10.1.134.6/wingsoft/index.jsp', '工资查询', '工资查询', 54, 0, 0, '2012-08-23 05:02:44', 1),
(51, 5, 'http://renshichu.bit.edu.cn/', '人事处', '人事处', 55, 0, 0, '2012-08-23 05:02:44', 1),
(52, 5, 'http://kjc.bit.edu.cn/', '科技处', '科技处', 56, 0, 0, '2012-08-23 05:02:44', 1),
(53, 5, 'http://ssc.bit.edu.cn/', '实验设备处', '实验设备处', 57, 0, 0, '2012-08-23 05:02:44', 1),
(54, 5, 'http://adge.edu.cn/', '学位与研究生教育', '学位与研究生教育', 58, 0, 0, '2012-08-23 05:02:44', 1),
(55, 5, 'http://www.bitsu.org/', '学生会', '学生会', 59, 0, 0, '2012-08-23 05:02:44', 1),
(56, 5, 'http://10.1.153.33/', '校医院', '校医院', 60, 0, 0, '2012-08-23 05:02:44', 1),
(57, 5, 'http://assn.bit.edu.cn/', '北理社联', '北理社联', 61, 0, 0, '2012-08-23 05:02:45', 1),
(58, 6, 'http://sae.bit.edu.cn/', '宇航学院', '宇航学院', 63, 0, 0, '2012-08-23 05:02:45', 1),
(59, 6, 'http://10.103.12.2:800/', '机电学院', '机电学院', 64, 0, 0, '2012-08-23 05:02:45', 1),
(60, 6, 'http://me.bit.edu.cn/AppWeb/Index/index.aspx', '机械与车辆学院', '机械与车辆学院', 65, 0, 0, '2012-08-23 05:02:45', 1),
(61, 6, 'http://optoelectronic.bit.edu.cn/', '光电学院', '光电学院', 66, 0, 0, '2012-08-23 05:02:45', 1),
(62, 6, 'http://sie.bit.edu.cn/', '信息与电子学院', '信息与电子学院', 67, 0, 0, '2012-08-23 05:02:45', 1),
(63, 6, 'http://ac.bit.edu.cn/', '自动化学院', '自动化学院', 68, 0, 0, '2012-08-23 05:02:45', 1),
(64, 6, 'http://cs.bit.edu.cn/', '计算机学院', '计算机学院', 69, 0, 0, '2012-08-23 05:02:45', 1),
(65, 6, 'http://ss.bit.edu.cn/', '软件学院', '软件学院', 70, 0, 0, '2012-08-23 05:02:45', 1),
(66, 6, 'http://mse.bit.edu.cn/', '材料学院', '材料学院', 71, 0, 0, '2012-08-23 05:02:45', 1),
(67, 6, 'http://www.bit.edu.cn/xxgk/xysz/hgyhjxy/index.htm', '化工与环境学院', '化工与环境学院', 72, 0, 0, '2012-08-23 05:02:45', 1),
(68, 6, 'http://life.bit.edu.cn/', '生命学院', '生命学院', 73, 0, 0, '2012-08-23 05:02:45', 1),
(69, 6, 'http://physics.bit.edu.cn/', '物理学院', '物理学院', 74, 0, 0, '2012-08-23 05:02:45', 1),
(70, 6, 'http://sc.bit.edu.cn/', '化学学院', '化学学院', 75, 0, 0, '2012-08-23 05:02:45', 1),
(71, 6, 'http://math.bit.edu.cn/', '数学学院', '数学学院', 76, 0, 0, '2012-08-23 05:02:45', 1),
(72, 6, 'http://sme.bit.edu.cn/', '管理与经济学院', '管理与经济学院', 77, 0, 0, '2012-08-23 05:02:45', 1),
(73, 6, 'http://rw.bit.edu.cn/', '人文与社会科学学院', '人文与社会科学学院', 78, 0, 0, '2012-08-23 05:02:45', 1),
(74, 6, 'http://law.bit.edu.cn/', '法学院', '法学院', 79, 0, 0, '2012-08-23 05:02:45', 1),
(75, 6, 'http://10.108.4.57/Index.asp', '外国语学院', '外国语学院', 80, 0, 0, '2012-08-23 05:02:45', 1),
(76, 6, 'http://design.bit.edu.cn/', '设计与艺术学院', '设计与艺术学院', 81, 0, 0, '2012-08-23 05:02:45', 1),
(77, 6, 'http://sla.bit.edu.cn/', '基础教育学院', '基础教育学院', 82, 0, 0, '2012-08-23 05:02:45', 1),
(78, 6, 'http://sice.bit.edu.cn/', '国际教育合作学院', '国际教育合作学院', 83, 0, 0, '2012-08-23 05:02:45', 1),
(79, 6, 'http://ioe.bit.edu.cn/', '教育研究院', '教育研究院', 84, 0, 0, '2012-08-23 05:02:45', 1),
(80, 7, 'http://grd.bit.edu.cn/', '研究生院', '研究生院', 86, 0, 0, '2012-08-23 05:02:45', 1),
(81, 7, 'http://cs.bit.edu.cn/stuwebcs/', '计算机学院学生事务平台', '计算机学院学生事务平台', 87, 0, 0, '2012-08-23 05:02:45', 1),
(82, 7, 'http://10.104.4.225', '信息与电子学院学生工作平台', '信息与电子学院学生工作平台', 88, 0, 0, '2012-08-23 05:02:45', 1),
(83, 7, 'http://law.bitss.com.cn/', '法学院学生事务办公系统', '法学院学生事务办公系统', 89, 0, 0, '2012-08-23 05:02:45', 1),
(84, 7, 'http://waiyu.bitss.com.cn/', '外语学院学生事务办公系统', '外语学院学生事务办公系统', 90, 0, 0, '2012-08-23 05:02:45', 1),
(85, 7, 'http://scee.bitss.com.cn/', '化工与环境学院学生事务办公系统', '化工与环境学院学生事务办公系统', 91, 0, 0, '2012-08-23 05:02:45', 1),
(86, 7, 'http://ciunilag.org/', '拉各斯大学孔子学院', '拉各斯大学孔子学院', 92, 0, 0, '2012-08-23 05:02:45', 1),
(87, 7, 'http://bbs.bit.edu.cn/forumdisplay.php?fid=48', '理学与材料学部', '理学与材料学部', 93, 0, 0, '2012-08-23 05:02:45', 1),
(88, 7, 'http://ss.bit.edu.cn/OA/Login.aspx', '软件学院学生事务办公系统', '软件学院学生事务办公系统', 94, 0, 0, '2012-08-23 05:02:45', 1),
(89, 7, 'http://smve.bitss.com.cn/index.bit', '机械与车辆学院学生事务办公系统', '机械与车辆学院学生事务办公系统', 95, 0, 0, '2012-08-23 05:02:45', 1),
(90, 8, 'http://est.bit.edu.cn/', '爆炸科学与技术国家重点实验室', '爆炸科学与技术国家重点实验室', 97, 0, 0, '2012-08-23 05:02:45', 1),
(91, 8, 'http://mse.bit.edu.cn/npc/', '材料学院纳米光子学课题组', '材料学院纳米光子学课题组', 98, 0, 0, '2012-08-23 05:02:45', 1),
(92, 8, 'http://shock.bit.edu.cn/', '冲击波物理与化学实验室', '冲击波物理与化学实验室', 99, 0, 0, '2012-08-23 05:02:45', 1),
(93, 8, 'http://www.cems.bj.cn/', '电磁仿真中心', '电磁仿真中心', 100, 0, 0, '2012-08-23 05:02:45', 1),
(94, 8, 'http://robot.bit.edu.cn/', '仿生机器人与系统教育部重点实验室', '仿生机器人与系统教育部重点实验室', 101, 0, 0, '2012-08-23 05:02:45', 1),
(95, 8, 'http://pnc.bit.edu.cn/', '高能材料合成实验室', '高能材料合成实验室', 102, 0, 0, '2012-08-23 05:02:45', 1),
(96, 8, 'http://10.1.85.99/', '管理信息实验室', '管理信息实验室', 103, 0, 0, '2012-08-23 05:02:45', 1),
(97, 8, 'http://www.kunpengfly.org/', '机器人视觉与运动控制实验室 ', '机器人视觉与运动控制实验室 ', 104, 0, 0, '2012-08-23 05:02:45', 1),
(98, 8, 'http://www.bitcae.com.cn/', '计算机应用与仿真实验室 ', '计算机应用与仿真实验室 ', 105, 0, 0, '2012-08-23 05:02:45', 1),
(99, 8, 'http://www.kjpj.net/', '科技评价与创新管理实验室', '科技评价与创新管理实验室', 106, 0, 0, '2012-08-23 05:02:45', 1),
(100, 8, 'http://mcislab.cs.bit.edu.cn/', '媒体计算与智能系统实验室', '媒体计算与智能系统实验室', 107, 0, 0, '2012-08-23 05:02:45', 1),
(101, 8, 'http://pris.bit.edu.cn/', '模式识别与智能系统研究所', '模式识别与智能系统研究所', 108, 0, 0, '2012-08-23 05:02:45', 1),
(102, 8, 'http://mse.bit.edu.cn/npc/', '纳米光子学实验室', '纳米光子学实验室', 109, 0, 0, '2012-08-23 05:02:45', 1),
(103, 8, 'http://www.ceep.net.cn/', '能源与环境政策研究中心', '能源与环境政策研究中心', 110, 0, 0, '2012-08-23 05:02:45', 1),
(104, 8, 'http://biomechanics.bit.edu.cn/', '生物力学与生物材料实验室', '生物力学与生物材料实验室', 111, 0, 0, '2012-08-23 05:02:45', 1),
(105, 8, 'http://life.bit.edu.cn/lichun/01/homezh.html', '生物转化与微生态课题组', '生物转化与微生态课题组', 112, 0, 0, '2012-08-23 05:02:45', 1),
(106, 8, 'http://www.commlab.cn/', '通信技术研究所', '通信技术研究所', 113, 0, 0, '2012-08-23 05:02:46', 1),
(107, 8, 'http://micromechanics.bit.edu.cn/', '细观力学实验室', '细观力学实验室', 114, 0, 0, '2012-08-23 05:02:46', 1),
(108, 8, 'http://www.pyrochem.com.cn/', '药剂化学组', '药剂化学组', 115, 0, 0, '2012-08-23 05:02:46', 1),
(109, 8, 'http://10.1.141.18:8080/sbweb/login.asp', '仪器设备管理', '仪器设备管理', 116, 0, 0, '2012-08-23 05:02:46', 1),
(110, 8, 'http://zzm.bit.edu.cn/', '应化周智明组', '应化周智明组', 117, 0, 0, '2012-08-23 05:02:46', 1),
(111, 8, 'http://robofly.bit.edu.cn/', '智能无人系统学科组', '智能无人系统学科组', 118, 0, 0, '2012-08-23 05:02:46', 1),
(112, 8, 'http://scee.bit.edu.cn/zcjktz/', '朱长进课题组', '朱长进课题组', 119, 0, 0, '2012-08-23 05:02:46', 1),
(113, 8, 'http://nlp.bit.edu.cn/', '自然语言处理', '自然语言处理', 120, 0, 0, '2012-08-23 05:02:46', 1),
(114, 8, 'http://blog.sina.com.cn/bitaolab', '自适应光学与空间光学实验室', '自适应光学与空间光学实验室', 121, 0, 0, '2012-08-23 05:02:46', 1),
(115, 8, 'http://www.bityrj.com/', '阻燃材料国家专业实验室', '阻燃材料国家专业实验室', 122, 0, 0, '2012-08-23 05:02:46', 1),
(116, 8, 'http://inin.bit.edu.cn/', '组合导航与智能导航研究室', '组合导航与智能导航研究室', 123, 0, 0, '2012-08-23 05:02:46', 1),
(117, 9, 'http://home.bitnp.net/', '网络开拓者协会', '网络开拓者协会', 125, 0, 0, '2012-08-23 05:02:46', 1),
(118, 9, 'http://qgzx.bit.edu.cn/', '勤工助学中心', '勤工助学中心', 126, 0, 0, '2012-08-23 05:02:46', 1),
(119, 9, 'http://10.2.70.20/', '京工新闻社', '京工新闻社', 127, 0, 0, '2012-08-23 05:02:46', 1),
(120, 9, 'http://vol.bit.edu.cn/', '延河之星志愿者', '延河之星志愿者', 128, 0, 0, '2012-08-23 05:02:46', 1),
(121, 9, 'http://www.9news.org.cn/', '九歌新闻社', '九歌新闻社', 129, 0, 0, '2012-08-23 05:02:46', 1),
(122, 9, 'http://jgyjt.at.bitunion.org/', '京工演讲团', '京工演讲团', 130, 0, 0, '2012-08-23 05:02:46', 1),
(123, 9, 'http://10.104.4.225/portal.php?mod=topic&topicid=2', '红雨新闻社', '红雨新闻社', 131, 0, 0, '2012-08-23 05:02:46', 1),
(124, 10, 'http://www.felixwoo.com/', 'Felix', 'Felix', 133, 0, 0, '2012-08-23 05:02:46', 1),
(125, 10, 'http://www.te168.cn', '风格独特', '风格独特', 134, 1, 0, '2012-08-23 05:02:46', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
