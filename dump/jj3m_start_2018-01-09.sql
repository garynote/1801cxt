-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2018 at 12:07 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jj3m`
--

--
-- Table structure for table `tblaccesslog`
--

DROP TABLE IF EXISTS `tblaccesslog`;
CREATE TABLE `tblaccesslog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `success` tinyint(1) NOT NULL,
  `str` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblaccesslog`
--

INSERT INTO `tblaccesslog` (`id`, `user_id`, `email`, `date`, `ip`, `success`, `str`) VALUES
(1, 1, 'jjadmin', '2018-01-09 18:57:25', '::1', 1, '112233'),
(2, 1, 'jjadmin', '2018-01-09 18:57:25', '::1', 1, '112233'),
(3, 5, 'mem001', '2018-01-09 18:58:38', '::1', 1, '112233'),
(4, 1, 'jjadmin', '2018-01-09 19:00:11', '::1', 1, '112233'),
(5, 1, 'jjadmin', '2018-01-09 19:00:11', '::1', 1, '112233'),
(6, 5, 'mem001', '2018-01-09 19:04:07', '::1', 1, '112233');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccesslog1`
--

DROP TABLE IF EXISTS `tblaccesslog1`;
CREATE TABLE `tblaccesslog1` (
  `id` int(11) NOT NULL,
  `user_name` varchar(80) DEFAULT NULL,
  `l_date` datetime NOT NULL,
  `l_type` varchar(4) DEFAULT NULL,
  `l_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbank`
--

DROP TABLE IF EXISTS `tblbank`;
CREATE TABLE `tblbank` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `bk_desc` varchar(120) NOT NULL,
  `bk_name` varchar(120) NOT NULL,
  `bk_holder` varchar(120) NOT NULL,
  `bk_account` varchar(120) NOT NULL,
  `bk_extra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcounter`
--

DROP TABLE IF EXISTS `tblcounter`;
CREATE TABLE `tblcounter` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcounter`
--

INSERT INTO `tblcounter` (`id`, `code`, `value`) VALUES
(1, 'GIVE', 8),
(2, 'MEM', 1),
(3, 'MISC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblhelp`
--

DROP TABLE IF EXISTS `tblhelp`;
CREATE TABLE `tblhelp` (
  `id` int(11) NOT NULL,
  `g_type` varchar(1) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `mgr_id` int(11) NOT NULL,
  `g_date` datetime NOT NULL,
  `g_plan` varchar(2) NOT NULL,
  `g_amount` double NOT NULL,
  `g_pending` double NOT NULL,
  `status` varchar(1) NOT NULL,
  `reentry` tinyint(1) NOT NULL,
  `date_match` datetime NOT NULL,
  `date_close` datetime NOT NULL,
  `note` varchar(10) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '5',
  `sms` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblhelpdetail`
--

DROP TABLE IF EXISTS `tblhelpdetail`;
CREATE TABLE `tblhelpdetail` (
  `id` int(11) NOT NULL,
  `tran_id` int(11) NOT NULL,
  `help_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `g_type` varchar(1) NOT NULL,
  `oth_id` int(11) NOT NULL,
  `g_date` datetime NOT NULL,
  `g_amount` double NOT NULL,
  `g_timer` datetime NOT NULL,
  `status` varchar(2) NOT NULL,
  `images` text,
  `notes` varchar(256) DEFAULT NULL,
  `stage` int(11) NOT NULL DEFAULT '0',
  `g_payment` datetime DEFAULT NULL,
  `g_confirm` datetime DEFAULT NULL,
  `g_extend` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblmavro`
--

DROP TABLE IF EXISTS `tblmavro`;
CREATE TABLE `tblmavro` (
  `id` int(11) NOT NULL,
  `help_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `m_type` varchar(1) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `release_days` smallint(6) NOT NULL,
  `category` varchar(1) NOT NULL,
  `real_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nominal_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `wallet` smallint(6) NOT NULL,
  `future_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(30) NOT NULL,
  `type` varchar(1) NOT NULL,
  `op_type` varchar(1) NOT NULL,
  `bonus` decimal(10,2) NOT NULL DEFAULT '0.00',
  `plan` int(11) NOT NULL DEFAULT '0',
  `ctr` int(11) NOT NULL DEFAULT '0',
  `date_close` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_release` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `op_level` int(11) NOT NULL DEFAULT '0',
  `incentive` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

DROP TABLE IF EXISTS `tblmember`;
CREATE TABLE `tblmember` (
  `id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `fullname` varchar(33) DEFAULT NULL,
  `referral` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `ref_name` varchar(32) DEFAULT NULL,
  `mgr_name` varchar(32) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `password2` varchar(40) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `language` varchar(2) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_manager` datetime DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(20) DEFAULT NULL,
  `wechat` varchar(30) DEFAULT NULL,
  `alipay` varchar(32) DEFAULT NULL,
  `whatsapp` varchar(32) DEFAULT NULL,
  `line` varchar(50) DEFAULT NULL,
  `last_ph` datetime DEFAULT '0000-00-00 00:00:00',
  `ph_count` int(11) NOT NULL DEFAULT '0',
  `directs` int(11) NOT NULL DEFAULT '0',
  `total_ph` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_gh` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` varchar(1) DEFAULT NULL,
  `pin` varchar(32) NOT NULL DEFAULT '',
  `bankname` varchar(50) DEFAULT NULL,
  `bankbranch` varchar(50) DEFAULT NULL,
  `bankaccount` varchar(50) DEFAULT NULL,
  `bankholder` varchar(70) DEFAULT NULL,
  `pins` int(11) NOT NULL DEFAULT '0',
  `note1` varchar(255) DEFAULT NULL,
  `note2` varchar(255) DEFAULT NULL,
  `autophdays` int(11) NOT NULL DEFAULT '0',
  `feature` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`id`, `username`, `rank`, `fullname`, `referral`, `manager`, `ref_name`, `mgr_name`, `email`, `password`, `password2`, `phone`, `country`, `region`, `language`, `currency`, `date_add`, `date_manager`, `last_login`, `last_ip`, `wechat`, `alipay`, `whatsapp`, `line`, `last_ph`, `ph_count`, `directs`, `total_ph`, `total_gh`, `status`, `pin`, `bankname`, `bankbranch`, `bankaccount`, `bankholder`, `pins`, `note1`, `note2`, `autophdays`, `feature`) VALUES
(1, 'jjadmin', 9, 'SYS Admin', 0, 0, NULL, NULL, 'jja@tmcc.us', 'd0970714757783e6cf17b26fb8e2298f', 'd54d1702ad0f8326224b817c796763c9', NULL, 'CN', NULL, 'en', 'RMB', '2015-06-03 01:51:00', '0000-00-00 00:00:00', '2018-01-09 19:00:11', '::1', '', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '', '', '', '', '', 1700, NULL, NULL, 0, ''),
(2, 'jjpin1', 8, 'SYS Pin', 0, 0, NULL, NULL, 'jjpin1@tmcc.us', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', NULL, 'CN', NULL, 'en', 'RMB', '2015-06-03 01:51:00', '0000-00-00 00:00:00', '2015-12-28 18:35:52', '173.245.48.125', '', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '', '', '', '', '', 22, NULL, NULL, 0, ''),
(3, 'jjmgr1', 8, 'SYS Manager', 0, 0, NULL, NULL, 'jjmgr@tmcc.us', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', NULL, 'CN', NULL, 'en', 'RMB', '2015-06-03 01:51:00', '0000-00-00 00:00:00', '2015-11-25 11:31:54', '::1', '', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '', '', '', '', '', 0, NULL, NULL, 0, ''),
(4, 'jjroot', 7, 'System Root', 0, 0, NULL, NULL, 'jjroot@tmcc.us', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', '13232507619', 'CN', NULL, 'en', 'RMB', '2015-06-03 03:03:00', '2015-11-24 16:55:10', '2018-01-09 06:52:10', '::1', '', '', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', 'JJ', '', '深圳罗湖国贸支行', 'aa', 'System Root', 5057, NULL, NULL, 0, ''),
(5, 'mem001', 7, 'mem001', 4, 4, 'jjroot', 'jjroot', 'mem@163.com', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', '13902313664', 'CN', NULL, 'en', 'RMB', '2015-06-03 11:11:00', '2015-11-24 16:55:02', '2018-01-09 19:04:07', '::1', '13902313664', '13902313664', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', 'hider0', '中国工商银行', '深圳和平', '12343434532788', '王登辉', 11501, NULL, NULL, 0, ''),
(6, 'mem002', 7, 'mem002', 5, 5, 'mem001', 'mem001', 'mem@163.com', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', '15017612207', 'CN', NULL, NULL, NULL, '2015-11-26 17:37:31', '2015-11-28 14:26:29', '2017-12-24 06:10:54', '::1', '', '15017612207', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '003N9P2F5VIBVSVAXFM4', '招商银行', '', '6214836555717889', '曾浩贤', 500, NULL, NULL, 0, NULL),
(7, 'mem003', 7, 'mem003', 6, 6, 'mem002', 'mem002', 'mem@163.com', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', '13825033994', 'CN', NULL, NULL, NULL, '2015-11-26 17:46:59', '2015-11-28 14:55:29', '2017-12-12 14:11:35', '::1', '', '13825033994', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '0121V7FF37A3G01GJTDI', '中国工商银行', '请打支付宝', '111', '代镕宏', 0, NULL, NULL, 0, NULL),
(8, 'mem004', 7, 'mem004', 7, 7, 'mem003', 'mem003', 'mem@163.com', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', '18588841689 ', 'CN', NULL, NULL, NULL, '2015-11-26 17:56:09', '2015-11-28 14:55:16', '2017-12-22 01:44:42', '::1', '', '18588841689', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '01HTG541W7RZBDCD4JJM', '中国工商银行', '', '请打支付宝', '吴瑜英', 1, NULL, NULL, 0, NULL),
(9, 'mem005', 7, 'mem005', 8, 8, 'mem004', 'mem004', 'mem@163.com', 'e10adc3949ba59abbe56e057f20f883e', '25d55ad283aa400af464c76d713c07ad', '13510628616', 'CN', NULL, NULL, NULL, '2015-11-26 17:57:48', '2015-11-28 14:26:57', '2018-01-08 00:07:59', '::1', '11111', '11111', '2', '3', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', 'Jason', '11111', '嘉宾路支行', '11111', 'GOH CHIN HONG', 401, NULL, NULL, 0, NULL),
(10, 'mem006', 7, 'mem006', 9, 9, 'mem005', 'mem005', 'mem@163.com', 'd0970714757783e6cf17b26fb8e2298f', '6512bd43d9caa6e02c990b0a82652dca', '13544209332', 'CN', NULL, NULL, NULL, '2015-11-26 17:59:23', '2015-11-28 14:27:08', '2018-01-08 10:47:17', '::1', 'sheirlly5633', '60-125247973', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', 'Sheirlly', '中国建设银行', '深圳市嘉宾路（支行）', '6236687200001552553', 'LIM POH ENG', 305, NULL, NULL, 0, NULL),
(30, 'mem601', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:37:34', '0000-00-00 00:00:00', '2017-12-16 03:57:01', '::1', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '01W6OK3DMRZ2Y6G8OHKV', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(31, 'mem602', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:37:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '04496PN209U6YGWHNAFL', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(32, 'mem603', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:37:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '05MFQS00IY65X78QRT9J', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(33, 'mem604', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '187GGVE1F77RGK4KKM0X', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(34, 'mem605', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '1BC039K01J46030J36KF', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(35, 'mem606', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '1MTVUTRX40W6MD7O35IJ', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(36, 'mem607', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '1OVQ367S4FOCFB4429D0', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(37, 'mem608', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '1X50V142CLB12I396R6M', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(38, 'mem609', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '29SY9IJC0RP6YFX4B54Q', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(39, 'mem610', 1, NULL, 10, 10, 'mem006', 'mem006', 'aa@bb.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '11', 'CN', NULL, NULL, NULL, '2017-12-16 03:38:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '316DVT78UCA5V153UA62', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(40, 'patrick', 5, 'Patrick', 5, 5, 'mem001', 'mem001', 'patrick@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '25d55ad283aa400af464c76d713c07ad', '123', 'CN', NULL, NULL, NULL, '2018-01-03 00:12:29', '2018-01-03 00:29:52', '2018-01-09 17:32:06', '::1', '', '', '', '', '0000-00-00 00:00:00', 0, 0, '0.00', '0.00', 'A', '0VU8747LTP4WR3A02JTA', '中国工商银行', '', '', 'Patrick', 0, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

DROP TABLE IF EXISTS `tblnews`;
CREATE TABLE `tblnews` (
  `id` int(11) NOT NULL,
  `newsdate` datetime NOT NULL,
  `title1` varchar(100) NOT NULL,
  `content1` longtext NOT NULL,
  `title2` varchar(100) NOT NULL,
  `content2` longtext NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpin`
--

DROP TABLE IF EXISTS `tblpin`;
CREATE TABLE `tblpin` (
  `id` int(11) NOT NULL,
  `managerid` int(11) DEFAULT NULL,
  `requestdate` datetime NOT NULL,
  `pin` varchar(40) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `status` varchar(3) NOT NULL,
  `useby` varchar(40) DEFAULT NULL,
  `usedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(50) NOT NULL,
  `note1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpin`
--

INSERT INTO `tblpin` (`id`, `managerid`, `requestdate`, `pin`, `paid`, `status`, `useby`, `usedate`, `note`, `note1`) VALUES
(1, 5, '2018-01-09 18:57:52', 'KEQ8622W60384181PXJJ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(2, 5, '2018-01-09 18:57:52', 'T3K9D7C943F639NADW36', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(3, 5, '2018-01-09 18:57:52', '076940HS7SFMCG5C8KS4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(4, 5, '2018-01-09 18:57:52', 'Q8N7425EDD1T91UZ7OMO', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(5, 5, '2018-01-09 18:57:52', '5PHU3DAQJ72R4EHO22I4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(6, 5, '2018-01-09 18:57:52', 'AWKUGCTH8LV7CA1W1VF7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(7, 5, '2018-01-09 18:57:52', 'V1S10S78ME8EO9V6N0YU', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(8, 5, '2018-01-09 18:57:52', 'TBM9M4FVP510LCI06DH8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(9, 5, '2018-01-09 18:57:52', 'E2A2G8ZLAV0QTFU42VMN', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(10, 5, '2018-01-09 18:57:52', 'H86UV4PYUROR1B5510P3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(11, 5, '2018-01-09 18:57:52', 'PT3O0F76NA52QM6BNG58', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(12, 5, '2018-01-09 18:57:52', 'I4626ZEM9I2Y784R7O82', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(13, 5, '2018-01-09 18:57:52', '6ULYAJJ1K61ANF12JOFD', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(14, 5, '2018-01-09 18:57:52', 'KAA0A7T10UV2175Q1010', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(15, 5, '2018-01-09 18:57:52', 'X6FZ3YA46SGEQ2NPBG5Y', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(16, 5, '2018-01-09 18:57:52', '5D168YCB9EG9YDDVLA7I', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(17, 5, '2018-01-09 18:57:52', 'Y7BDK4N5Z2MWS8WGFA2H', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(18, 5, '2018-01-09 18:57:52', 'LNP680AAF0U99Y80X6G3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(19, 5, '2018-01-09 18:57:52', 'U9U9F1M79QSYH2VPQIM5', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(20, 5, '2018-01-09 18:57:52', '3GGH03M67SLR04L7F4X0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(21, 5, '2018-01-09 18:57:52', '8L26AOJQ108YKC5LWGM7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(22, 5, '2018-01-09 18:57:52', '9C3299NM9CG1P2Q9SB6T', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(23, 5, '2018-01-09 18:57:52', '1DN8FGMRUAJE9439YP54', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(24, 5, '2018-01-09 18:57:52', 'NIIIIHYN0R68AWLAD1RR', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(25, 5, '2018-01-09 18:57:52', '5F4HTFC9GD1FKY2TG019', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(26, 5, '2018-01-09 18:57:52', '2AFV8H9XWUQCTV7Q8YF5', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(27, 5, '2018-01-09 18:57:52', 'Y76JS9P1LS9K1YO49PE7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(28, 5, '2018-01-09 18:57:52', '6JQ472050E3L71NIIKGB', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(29, 5, '2018-01-09 18:57:52', '5O5EUFAPE9J5NZ6VRMS0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(30, 5, '2018-01-09 18:57:52', 'UYI4C2JOXLHSPDO223UL', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(31, 5, '2018-01-09 18:57:52', 'TJW62TDZGN8XI1SQG2PX', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(32, 5, '2018-01-09 18:57:52', 'DBHBN84AHRV1AC9Y7SC0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(33, 5, '2018-01-09 18:57:52', '1QOCCN7UYQECN7MOG8B6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(34, 5, '2018-01-09 18:57:52', 'KRTXIO5K32863SB03QIC', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(35, 5, '2018-01-09 18:57:52', '759DXBMT95DD0Q0VT35L', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(36, 5, '2018-01-09 18:57:52', 'MT40T0XH1PEO6PC0Z51I', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(37, 5, '2018-01-09 18:57:52', '73IZ906T3Q6S6F3KFA1O', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(38, 5, '2018-01-09 18:57:52', '335MS38GG5680O8A77E6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(39, 5, '2018-01-09 18:57:52', 'D524967Q63FBBUQ03Z55', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(40, 5, '2018-01-09 18:57:52', '0X926N9HF9SJFC3RSPV2', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(41, 5, '2018-01-09 18:57:52', 'ISIIAY2PKXQ8T3LV12D4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(42, 5, '2018-01-09 18:57:52', '0QJY0EDU8T2NO89A274J', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(43, 5, '2018-01-09 18:57:52', '75A3414ZLESYCR54950A', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(44, 5, '2018-01-09 18:57:52', '9UCUW69Z6U2RDIPBUDZH', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(45, 5, '2018-01-09 18:57:52', 'M3G35J2MFE6J078E71JT', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(46, 5, '2018-01-09 18:57:52', 'K5VYQM3B2V3F0F9TU7V2', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(47, 5, '2018-01-09 18:57:52', '2Z83673ZD43685W4449N', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(48, 5, '2018-01-09 18:57:52', 'HO6D1G4NM83J8KQHDC04', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(49, 5, '2018-01-09 18:57:52', '0E20SBSR459J6901711Z', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(50, 5, '2018-01-09 18:57:52', 'UV829MBKLM83023AUJ49', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(51, 5, '2018-01-09 18:57:52', '1ELQ22FET3RI4824OX89', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(52, 5, '2018-01-09 18:57:52', 'LU4SP4LUSD5ADM58CJXP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(53, 5, '2018-01-09 18:57:52', 'GQ8M4T08O2CIUZ0Y01X0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(54, 5, '2018-01-09 18:57:52', '6MBM48SY5TYGJ6P6N507', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(55, 5, '2018-01-09 18:57:52', 'A3D0MMUG2JTO6DG6762I', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(56, 5, '2018-01-09 18:57:52', 'L1WELODIAIAS92E6H327', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(57, 5, '2018-01-09 18:57:52', 'I2GFQXCTLYJRO0A5Y448', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(58, 5, '2018-01-09 18:57:52', 'T579Y3OISWZ7BFM60M56', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(59, 5, '2018-01-09 18:57:52', 'FF0LE2CLKC1U278O86I7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(60, 5, '2018-01-09 18:57:52', '29QZB8C840A0113KCR4B', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(61, 5, '2018-01-09 18:57:52', '2XS0KP5WHQFLY1F3V9E8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(62, 5, '2018-01-09 18:57:52', 'KS6KE015N0CS72323PWM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(63, 5, '2018-01-09 18:57:52', '3QI31UH42JET50H562E9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(64, 5, '2018-01-09 18:57:52', '6CQ5O5VCEHTK64IP6315', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(65, 5, '2018-01-09 18:57:52', '3FXA9Y9NESHLJCK035PK', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(66, 5, '2018-01-09 18:57:52', 'GHYB5LW6GCHV966B1V47', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(67, 5, '2018-01-09 18:57:52', '59D839EV4C703I8QG10V', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(68, 5, '2018-01-09 18:57:52', '0952MYF8N11DHB6OFWZO', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(69, 5, '2018-01-09 18:57:52', 'Q64T9XGJ5Q5YDJIA1UG2', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(70, 5, '2018-01-09 18:57:52', 'OQD2VK230128V5FJ7573', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(71, 5, '2018-01-09 18:57:52', '71G48B2G11MJLFY03PAH', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(72, 5, '2018-01-09 18:57:52', '16PHAQ1G96105T7AS6ST', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(73, 5, '2018-01-09 18:57:52', 'H8501V759J6BZIKFNB8I', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(74, 5, '2018-01-09 18:57:52', 'MD98729Z9GOYN1TU3812', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(75, 5, '2018-01-09 18:57:52', 'U5553IUD7DV32J7TX76U', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(76, 5, '2018-01-09 18:57:52', 'BNS07DU7E4TH9PSKC92A', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(77, 5, '2018-01-09 18:57:52', '0YGQ7IRC01EAU571340H', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(78, 5, '2018-01-09 18:57:52', 'A77Y5G7RF98MV0AQEC71', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(79, 5, '2018-01-09 18:57:52', '2IUCG9ON9W67M7J97B7O', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(80, 5, '2018-01-09 18:57:52', '63L7T9J87WUS740020P3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(81, 5, '2018-01-09 18:57:52', '4B2X8NC582ZDI98YJTL0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(82, 5, '2018-01-09 18:57:52', 'LV1YHR3E9B655G2HEO05', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(83, 5, '2018-01-09 18:57:52', '3QV516S81098AUVAN9SH', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(84, 5, '2018-01-09 18:57:52', 'M82OP1E5C295H6R9EGP9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(85, 5, '2018-01-09 18:57:52', '626S85UVN5H2K8C6J511', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(86, 5, '2018-01-09 18:57:52', 'HAQQZ1D2Z2TQ30ZO9BQ7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(87, 5, '2018-01-09 18:57:52', 'K1B4D07Y8L6VW785KO29', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(88, 5, '2018-01-09 18:57:52', '2PT7IDKC2AGY9L8YZ7KF', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(89, 5, '2018-01-09 18:57:52', 'D398T5E31JVVR1W4X9LM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(90, 5, '2018-01-09 18:57:52', 'BU63HI8S64Z4ND128633', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(91, 5, '2018-01-09 18:57:52', '2NN8FB4SV62NF3AT7VKP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(92, 5, '2018-01-09 18:57:52', 'N3IR70Z204L75DKX7NV7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(93, 5, '2018-01-09 18:57:52', 'BKL4T143X1H1982Q517M', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(94, 5, '2018-01-09 18:57:52', '8VJ2U3UQ55RDE47S584Q', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(95, 5, '2018-01-09 18:57:52', 'DRJW3E5A362ZM90A01OV', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL);
INSERT INTO `tblpin` (`id`, `managerid`, `requestdate`, `pin`, `paid`, `status`, `useby`, `usedate`, `note`, `note1`) VALUES
(96, 5, '2018-01-09 18:57:52', 'MMK94UQ3Z8951883RVTX', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(97, 5, '2018-01-09 18:57:52', 'K65518W2DUA0DX70P7PZ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(98, 5, '2018-01-09 18:57:52', 'IR1A85LC5JI2F4E4VU2F', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(99, 5, '2018-01-09 18:57:52', '196V7FBS8M71X40EASU6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(100, 5, '2018-01-09 18:57:52', '8GZ4SD30AYYUM7FX0M76', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpin1`
--

DROP TABLE IF EXISTS `tblpin1`;
CREATE TABLE `tblpin1` (
  `id` int(11) NOT NULL,
  `managerid` int(11) DEFAULT NULL,
  `requestdate` datetime NOT NULL,
  `pin` varchar(40) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `status` varchar(3) NOT NULL,
  `useby` varchar(40) DEFAULT NULL,
  `usedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(50) NOT NULL,
  `note1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpin1`
--

INSERT INTO `tblpin1` (`id`, `managerid`, `requestdate`, `pin`, `paid`, `status`, `useby`, `usedate`, `note`, `note1`) VALUES
(1, 5, '2018-01-09 19:00:34', 'V47T0C0R4HGWJM1834BS', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(2, 5, '2018-01-09 19:00:34', '4XPV1DH1E362OL2E17WZ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(3, 5, '2018-01-09 19:00:34', '9RO1I75A5V2J2NSRPTR6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(4, 5, '2018-01-09 19:00:34', '5EACVXTNELBB7J4BITGC', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(5, 5, '2018-01-09 19:00:34', 'EHDZPW8V3L76K3490CEG', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(6, 5, '2018-01-09 19:00:34', '839J52UTD1RJM8IHT0JI', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(7, 5, '2018-01-09 19:00:34', 'XPJ9PXE5BM6NB905L0PL', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(8, 5, '2018-01-09 19:00:34', 'C09E3AK4BW2M19388N04', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(9, 5, '2018-01-09 19:00:34', 'A6E4DPAF8ZZNW795NS04', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(10, 5, '2018-01-09 19:00:34', 'K73JM13TSXJZW26I9PKM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(11, 5, '2018-01-09 19:00:34', 'SWOF762CBT5D2TE83YQ6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(12, 5, '2018-01-09 19:00:34', '7S4G2O07U2IEQ5ZC9QS8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(13, 5, '2018-01-09 19:00:34', '7C43G9DTZRYB0QA7KPN8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(14, 5, '2018-01-09 19:00:34', 'LPJ6SRLWU0YAR281I450', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(15, 5, '2018-01-09 19:00:34', 'IK5O1RVZ1M9Q69K65IU9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(16, 5, '2018-01-09 19:00:34', '0WFUH1H6J2X54Z889G82', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(17, 5, '2018-01-09 19:00:34', 'AVG8CRNZUOP83VJOJLA8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(18, 5, '2018-01-09 19:00:34', '2KUPKVZO39OW4K69OZ8U', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(19, 5, '2018-01-09 19:00:34', '2UBEVM7ZR0B55JE0316T', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(20, 5, '2018-01-09 19:00:34', 'Z0P8U59N52K60T92VP1P', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(21, 5, '2018-01-09 19:00:34', '30F9467FC1G5GS578F4P', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(22, 5, '2018-01-09 19:00:34', 'JSW4QL5C3AJ917HXM08Z', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(23, 5, '2018-01-09 19:00:34', 'LAN5WDC383Z48NUWV9SZ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(24, 5, '2018-01-09 19:00:34', '06EYSO0L2U4G4RRLLC7M', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(25, 5, '2018-01-09 19:00:34', 'F8578491OV0H38IT268T', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(26, 5, '2018-01-09 19:00:34', '687WL4V28A7X59O7H9QC', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(27, 5, '2018-01-09 19:00:34', '5S8W24A75L6GNWK6FF74', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(28, 5, '2018-01-09 19:00:34', 'B30AZW30B6MCMKT6217C', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(29, 5, '2018-01-09 19:00:34', 'L6DQNYFEZIL5S137EW0T', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(30, 5, '2018-01-09 19:00:34', 'W47B4U92V824F0A2D32O', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(31, 5, '2018-01-09 19:00:34', 'Q548FCA41RC64CE965R6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(32, 5, '2018-01-09 19:00:34', 'VRKU7357M1Q9TO1582PP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(33, 5, '2018-01-09 19:00:34', 'X3U8G2ZR3C4602CF7B0C', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(34, 5, '2018-01-09 19:00:34', '6GI430SV2UAYKNH986C8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(35, 5, '2018-01-09 19:00:34', 'NDQZY4KNN09J4U7M3K3O', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(36, 5, '2018-01-09 19:00:34', 'YF5H955N07A9MZUVY8Y1', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(37, 5, '2018-01-09 19:00:34', 'I9E93PF1UNWS9QCQ92Z4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(38, 5, '2018-01-09 19:00:34', 'LP6SR509F77N33KMJ17B', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(39, 5, '2018-01-09 19:00:34', '4AVO7SW8D5X0K0WTZ0ZK', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(40, 5, '2018-01-09 19:00:34', 'G21693GJBZ8UQM9DLK97', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(41, 5, '2018-01-09 19:00:34', '98R4H83U5XWHZS4G8DHC', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(42, 5, '2018-01-09 19:00:34', 'Y7GK8L80UBP7UV5O78RN', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(43, 5, '2018-01-09 19:00:34', 'MP24CU5Y6F09LUO7EPYQ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(44, 5, '2018-01-09 19:00:34', '8T1NY2V4ROBK8336ZF29', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(45, 5, '2018-01-09 19:00:34', '89T6H0V5RXLF0X0MF68J', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(46, 5, '2018-01-09 19:00:34', '93864N3PCB21Z205292J', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(47, 5, '2018-01-09 19:00:34', 'Z5E9C2ZL16W7I8JNW310', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(48, 5, '2018-01-09 19:00:34', 'XVYMD94TF8KOY800Y88W', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(49, 5, '2018-01-09 19:00:34', 'Z46151K9V182I19G3WM8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(50, 5, '2018-01-09 19:00:34', '370NHIQKZ33SOI4TU1P2', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(51, 5, '2018-01-09 19:00:34', '0J7H3O81LW0K3V44S82V', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(52, 5, '2018-01-09 19:00:34', '2297S9JHWFSI1M3Y49N7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(53, 5, '2018-01-09 19:00:34', 'TS9284O8KB2107IY4D0P', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(54, 5, '2018-01-09 19:00:34', 'RB28AZY341L5J08721AG', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(55, 5, '2018-01-09 19:00:34', 'W4WZ5F5VLM7JAUT211W8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(56, 5, '2018-01-09 19:00:34', '1HHOVV42994O1SS51INL', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(57, 5, '2018-01-09 19:00:34', 'KAWB53B0G09UP1WMAH88', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(58, 5, '2018-01-09 19:00:34', 'SSVUC61RTDY2J5O3I731', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(59, 5, '2018-01-09 19:00:34', 'WYD13IURXEHU39F61TE5', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(60, 5, '2018-01-09 19:00:34', 'L65E2PB5VSFS6NY414ZV', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(61, 5, '2018-01-09 19:00:34', '4X2NEG9W8ML163VHOC5H', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(62, 5, '2018-01-09 19:00:34', 'V6VSGK8902QUZ7GFG8O1', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(63, 5, '2018-01-09 19:00:34', '4KL9J18579YH1Y70F0F2', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(64, 5, '2018-01-09 19:00:34', '15YA0Y856LZ1M28YW8FJ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(65, 5, '2018-01-09 19:00:34', 'U7O8C0U9K7W6ZQ4I809U', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(66, 5, '2018-01-09 19:00:34', 'VYQWZ78851GH5U1AFX52', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(67, 5, '2018-01-09 19:00:34', 'UG4E0TVO0LMPH68RW6IH', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(68, 5, '2018-01-09 19:00:34', '511XHN17990D74S1V25S', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(69, 5, '2018-01-09 19:00:34', 'WJK6ZODQR0PO3L550V0S', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(70, 5, '2018-01-09 19:00:34', '50K979WFQSRD5H353GW4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(71, 5, '2018-01-09 19:00:34', 'ARYQVCZ495BFD303N7N3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(72, 5, '2018-01-09 19:00:34', '243NM9807P0TNZKGY96C', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(73, 5, '2018-01-09 19:00:34', '9HJ5XJZBU4O22BVM97RK', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(74, 5, '2018-01-09 19:00:34', '793E9W79AW59Q2V61G18', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(75, 5, '2018-01-09 19:00:34', '4BP2QTR760H73Y6S48ZN', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(76, 5, '2018-01-09 19:00:34', 'Q4CIFX65KP524HX29AL3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(77, 5, '2018-01-09 19:00:34', '635G98RABKBC0O30QP9O', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(78, 5, '2018-01-09 19:00:34', 'TT0ME4PDD00XZ14R7M9W', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(79, 5, '2018-01-09 19:00:34', 'CKK1NI2TNYJKMDWNDR6M', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(80, 5, '2018-01-09 19:00:34', '5CZRYAPXI2HT8H6Z347G', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(81, 5, '2018-01-09 19:00:34', 'EG1LOURZK82S34T2X2ZP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(82, 5, '2018-01-09 19:00:34', 'NKQXQ584GF8B5Y1NOA1J', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(83, 5, '2018-01-09 19:00:34', 'N8SW7CD8824073P449R9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(84, 5, '2018-01-09 19:00:34', 'ZDLXHHLCQ059066PVW9N', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(85, 5, '2018-01-09 19:00:34', 'LBVW5YC5YZ67MJ711K08', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(86, 5, '2018-01-09 19:00:34', 'KN4K0Z4298KDHR8O3NVP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(87, 5, '2018-01-09 19:00:34', '48NO405HN6Y133YU4RYM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(88, 5, '2018-01-09 19:00:34', 'RG8RE9UJDGWA7LUCTZ8D', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(89, 5, '2018-01-09 19:00:34', '6DXSF3JZI8235OA9TI7H', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(90, 5, '2018-01-09 19:00:34', '3EH0S912YD8I3PCN2786', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(91, 5, '2018-01-09 19:00:34', 'WD80689YDUC5FE3RW9PD', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(92, 5, '2018-01-09 19:00:34', 'IX911T8X56I94MW27064', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(93, 5, '2018-01-09 19:00:34', 'QOEL51CSAT4290O2WA6O', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(94, 5, '2018-01-09 19:00:34', '2A4FX64HI2LM5WFLSA64', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(95, 5, '2018-01-09 19:00:34', 'P0GZ2J8982I4G0K8S3MX', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL);
INSERT INTO `tblpin1` (`id`, `managerid`, `requestdate`, `pin`, `paid`, `status`, `useby`, `usedate`, `note`, `note1`) VALUES
(96, 5, '2018-01-09 19:00:34', '34L9HX3V73TURNL5FHR9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(97, 5, '2018-01-09 19:00:34', 'YTXG54L6IHN18M6EDX6L', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(98, 5, '2018-01-09 19:00:34', 'YCGQC8HGREU899LMO2FZ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(99, 5, '2018-01-09 19:00:34', 'E0H593CNU6L744DKEC16', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(100, 5, '2018-01-09 19:00:34', 'JP94QUZ3GI2O7IA4M558', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(101, 5, '2018-01-09 19:00:34', 'ETJA6NSI1974VGB331MM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpin2`
--

DROP TABLE IF EXISTS `tblpin2`;
CREATE TABLE `tblpin2` (
  `id` int(11) NOT NULL,
  `managerid` int(11) DEFAULT NULL,
  `requestdate` datetime NOT NULL,
  `pin` varchar(40) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `status` varchar(3) NOT NULL,
  `useby` varchar(40) DEFAULT NULL,
  `usedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(50) NOT NULL,
  `note1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpin2`
--

INSERT INTO `tblpin2` (`id`, `managerid`, `requestdate`, `pin`, `paid`, `status`, `useby`, `usedate`, `note`, `note1`) VALUES
(1, 5, '2018-01-09 19:00:52', 'Y25I1UK401JU7726U1LD', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(2, 5, '2018-01-09 19:00:52', 'VID2Z4WQ6575HBDA6VIU', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(3, 5, '2018-01-09 19:00:52', '460S3P8186IT7WKNFN6V', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(4, 5, '2018-01-09 19:00:52', 'R6V0O7IM6H04CH2HR7W7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(5, 5, '2018-01-09 19:00:52', 'RZ04IU7R19QXE2027NCU', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(6, 5, '2018-01-09 19:00:52', 'BH3CH1CH649JEVQ0G7Z7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(7, 5, '2018-01-09 19:00:52', 'RW6JK03U5AG8ZGO2309I', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(8, 5, '2018-01-09 19:00:52', '183X38VL3IWKRAQ9IB1K', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(9, 5, '2018-01-09 19:00:52', 'LA0G6T3EF735099I54R7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(10, 5, '2018-01-09 19:00:52', '3BL2006U5PTQ9T6D05N3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(11, 5, '2018-01-09 19:00:52', 'YNIGCK3HFQEQH8ZTEW2B', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(12, 5, '2018-01-09 19:00:52', '5I8L5GBSZ5VM8E4710F9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(13, 5, '2018-01-09 19:00:52', 'DS0D3SP4BM7MGROZ799S', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(14, 5, '2018-01-09 19:00:52', 'VGWLB7Z8UZG1M165FBRP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(15, 5, '2018-01-09 19:00:52', 'QKI4USTCKA4T0J8535WI', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(16, 5, '2018-01-09 19:00:52', 'BN1DD2V6HB7G81M019X9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(17, 5, '2018-01-09 19:00:52', '7OR294BFWJRYIX6XA8J4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(18, 5, '2018-01-09 19:00:52', 'GL9RJQL94K2G7BU952RE', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(19, 5, '2018-01-09 19:00:52', '7J8KOH0O325826WUZD03', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(20, 5, '2018-01-09 19:00:52', 'WEPGX5TRH6088HX2JL2W', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(21, 5, '2018-01-09 19:00:52', 'A7641TRQ29DXG633H5PH', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(22, 5, '2018-01-09 19:00:52', 'K8D4Z3RXJGA040177KQ6', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(23, 5, '2018-01-09 19:00:52', 'G12E53P02SB9642C56QW', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(24, 5, '2018-01-09 19:00:52', 'XJYK9UYT5E5D644Y059F', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(25, 5, '2018-01-09 19:00:52', 'D1NM7WG0FR259025IFZM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(26, 5, '2018-01-09 19:00:52', '63MDTMME571SR8UTQKYZ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(27, 5, '2018-01-09 19:00:52', 'LO0MD5UUR9M8404UKPG3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(28, 5, '2018-01-09 19:00:52', 'Y6685B181DAVX3D060JS', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(29, 5, '2018-01-09 19:00:52', '8UI2LBUO91307V3A5AHR', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(30, 5, '2018-01-09 19:00:52', '1QJJSTG4L44AXI7NYBG3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(31, 5, '2018-01-09 19:00:52', '83VUAU58NQ893I126LX0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(32, 5, '2018-01-09 19:00:52', 'CL54657CVZX3AC24LG0Y', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(33, 5, '2018-01-09 19:00:52', 'HG7Q5881Y89X99W2WSD5', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(34, 5, '2018-01-09 19:00:52', '4P7M5LLRUVO2BHZKUQBO', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(35, 5, '2018-01-09 19:00:52', 'N68D4TAPCDU8934HK0ZX', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(36, 5, '2018-01-09 19:00:52', '36ZWEMFSD9KZP8X22AZX', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(37, 5, '2018-01-09 19:00:52', '7O26D39VSXR0R27CD3ZB', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(38, 5, '2018-01-09 19:00:52', 'JPL69J88P2J20S91S5YG', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(39, 5, '2018-01-09 19:00:52', 'P7B3Y01E6X193195AIK4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(40, 5, '2018-01-09 19:00:52', 'EXH5SBDW7LLUKFXV88UN', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(41, 5, '2018-01-09 19:00:52', '2MEQ59F9O08AL4AYKP85', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(42, 5, '2018-01-09 19:00:52', 'SEBA65N4PKT274MO772X', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(43, 5, '2018-01-09 19:00:52', 'VZ39G7K6O9VQUL07OJ0H', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(44, 5, '2018-01-09 19:00:52', '5Q3FV8C1NL752659QK26', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(45, 5, '2018-01-09 19:00:52', '28Z8EE83S230QIK5PMG5', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(46, 5, '2018-01-09 19:00:52', 'H11K7IGLZZJJZS4Z8B50', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(47, 5, '2018-01-09 19:00:52', 'I05LS24CJUODMIZ8G060', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(48, 5, '2018-01-09 19:00:52', 'RCX62YDQ7NT5IK02KGY3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(49, 5, '2018-01-09 19:00:52', '88F0MCMQW3TXOKOLV8E0', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(50, 5, '2018-01-09 19:00:52', '6F31ZP4ASBL1B7LU9C7Q', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(51, 5, '2018-01-09 19:00:52', 'EY28Z128HB7B815T8MS4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(52, 5, '2018-01-09 19:00:52', '6A47E51GPS0KW639R1WL', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(53, 5, '2018-01-09 19:00:52', '41J5C7UN2SX9M29K5JJ9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(54, 5, '2018-01-09 19:00:52', 'DF4DJ7CRP47NVED74M54', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(55, 5, '2018-01-09 19:00:52', 'D0J9X1WDXT302T8D70OG', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(56, 5, '2018-01-09 19:00:52', 'J747DKQRS1CWJHE1LS64', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(57, 5, '2018-01-09 19:00:52', 'WVBEH02DO94BLSOKJ12V', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(58, 5, '2018-01-09 19:00:52', '6LP7T2Z787KI6GQNI501', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(59, 5, '2018-01-09 19:00:52', 'MR0FE1W6MD8JW4Y7F76S', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(60, 5, '2018-01-09 19:00:52', 'N84W99U9PJJ789RSI61Z', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(61, 5, '2018-01-09 19:00:52', 'JB5W8L1H56TGLUQTJ4BL', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(62, 5, '2018-01-09 19:00:52', 'MNWD6QIWN6G9V3DN10XP', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(63, 5, '2018-01-09 19:00:52', 'D3WBWNH2CW41MM79GK9M', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(64, 5, '2018-01-09 19:00:52', 'AENG50AC23VAXF3JK9IY', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(65, 5, '2018-01-09 19:00:52', 'JYEL2TXG52YEVV6T5O3G', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(66, 5, '2018-01-09 19:00:52', '1DGLVDJG4P20VY93RQ6N', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(67, 5, '2018-01-09 19:00:52', '0YE68ZQEMX0W2G84XR4K', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(68, 5, '2018-01-09 19:00:52', 'KKDLY94435Q8I9MEOI17', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(69, 5, '2018-01-09 19:00:52', 'W7595ABG781I6PO7S764', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(70, 5, '2018-01-09 19:00:52', 'V4O89XMA42OS6JV4RGM4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(71, 5, '2018-01-09 19:00:52', '97AOWDAMTOD000CZ2LA5', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(72, 5, '2018-01-09 19:00:52', 'UO8278N7MXVGPU00Y5RQ', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(73, 5, '2018-01-09 19:00:52', 'SD2EH9IOOBXC621239V4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(74, 5, '2018-01-09 19:00:52', 'HFTI5AUAV475OKFG1167', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(75, 5, '2018-01-09 19:00:52', '62K3FFF5CRSAET3J50F4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(76, 5, '2018-01-09 19:00:52', '9QJ94V6JCN3FAZN7S5GB', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(77, 5, '2018-01-09 19:00:52', '29H3DISGX5WA5JAEJOM7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(78, 5, '2018-01-09 19:00:52', '1OT5RC6MI6L3O3JQX7V9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(79, 5, '2018-01-09 19:00:52', '1DORN6ZZ50EFIO617849', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(80, 5, '2018-01-09 19:00:52', '2MW52M8ELXM4506A7FTG', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(81, 5, '2018-01-09 19:00:52', 'O47B1Y6W29RN7A2QU746', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(82, 5, '2018-01-09 19:00:52', '9EUOQ8IZ29PC2GF20D1C', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(83, 5, '2018-01-09 19:00:52', '5137V9WY3H2ETLA08YT4', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(84, 5, '2018-01-09 19:00:52', '5A674F3EI54M4PA006OM', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(85, 5, '2018-01-09 19:00:52', 'TU5R3MFCVIN3T2TRWC5I', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(86, 5, '2018-01-09 19:00:52', '5TBE7XZ4JX34F04VD4M8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(87, 5, '2018-01-09 19:00:52', 'GC5HZPA7XE8B3F8E9IS7', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(88, 5, '2018-01-09 19:00:52', 'D1X4RJBWW6J626Y8RHA1', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(89, 5, '2018-01-09 19:00:52', 'I51P20I78IS435ZK7P63', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(90, 5, '2018-01-09 19:00:52', '7S99L1DTV2XEPIS48784', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(91, 5, '2018-01-09 19:00:52', '74QELLL05RBNXAVPLCF9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(92, 5, '2018-01-09 19:00:52', '1KK35SE823A9RG3Q3MZI', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(93, 5, '2018-01-09 19:00:52', '3Q89Q6J60SK2M6032BV3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(94, 5, '2018-01-09 19:00:52', 'LKMA343G1Q6Z4GX1ZLZX', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(95, 5, '2018-01-09 19:00:52', '4ASQ453LUNKU2Y94H4G3', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL);
INSERT INTO `tblpin2` (`id`, `managerid`, `requestdate`, `pin`, `paid`, `status`, `useby`, `usedate`, `note`, `note1`) VALUES
(96, 5, '2018-01-09 19:00:52', 'J20YY4D1Y0LSLSGS2HSI', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(97, 5, '2018-01-09 19:00:52', 'UTY4RNZICCQJJOXAE8Y9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(98, 5, '2018-01-09 19:00:52', 'AFE571LKL0XQ3503ZRD8', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(99, 5, '2018-01-09 19:00:52', 'T89JR8A27JCTE14N86Z9', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(100, 5, '2018-01-09 19:00:52', '1LP1KRIYH3FYU80T1F2D', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(101, 5, '2018-01-09 19:00:52', 'YXMSIGPMJ1VQ46S21F2K', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL),
(102, 5, '2018-01-09 19:00:52', 'NME3Y50G272C93IMX418', 'Y', 'N', NULL, '0000-00-00 00:00:00', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpinlog`
--

DROP TABLE IF EXISTS `tblpinlog`;
CREATE TABLE `tblpinlog` (
  `id` int(11) NOT NULL,
  `requestby` varchar(30) NOT NULL,
  `requestdate` datetime NOT NULL,
  `issueby` varchar(20) NOT NULL,
  `pins` int(11) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `note` varchar(255) NOT NULL,
  `leader` varchar(20) NOT NULL,
  `leader1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpinlog`
--

INSERT INTO `tblpinlog` (`id`, `requestby`, `requestdate`, `issueby`, `pins`, `paid`, `note`, `leader`, `leader1`) VALUES
(1, 'mem001', '2018-01-09 18:57:52', 'jjadmin', 100, 'Y', '', 'mem001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpinlog1`
--

DROP TABLE IF EXISTS `tblpinlog1`;
CREATE TABLE `tblpinlog1` (
  `id` int(11) NOT NULL,
  `requestby` varchar(30) NOT NULL,
  `requestdate` datetime NOT NULL,
  `issueby` varchar(20) NOT NULL,
  `pins` int(11) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `note` varchar(255) NOT NULL,
  `leader` varchar(20) NOT NULL,
  `leader1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpinlog1`
--

INSERT INTO `tblpinlog1` (`id`, `requestby`, `requestdate`, `issueby`, `pins`, `paid`, `note`, `leader`, `leader1`) VALUES
(1, 'mem001', '2018-01-09 19:00:34', 'jjadmin', 101, 'Y', '', 'mem001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpinlog2`
--

DROP TABLE IF EXISTS `tblpinlog2`;
CREATE TABLE `tblpinlog2` (
  `id` int(11) NOT NULL,
  `requestby` varchar(30) NOT NULL,
  `requestdate` datetime NOT NULL,
  `issueby` varchar(20) NOT NULL,
  `pins` int(11) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `note` varchar(255) NOT NULL,
  `leader` varchar(20) NOT NULL,
  `leader1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpinlog2`
--

INSERT INTO `tblpinlog2` (`id`, `requestby`, `requestdate`, `issueby`, `pins`, `paid`, `note`, `leader`, `leader1`) VALUES
(1, 'mem001', '2018-01-09 19:00:52', 'jjadmin', 102, 'Y', '', 'mem001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpintran`
--

DROP TABLE IF EXISTS `tblpintran`;
CREATE TABLE `tblpintran` (
  `id` int(11) NOT NULL,
  `idfrom` int(11) NOT NULL,
  `idto` int(11) NOT NULL,
  `efrom` varchar(60) NOT NULL,
  `eto` varchar(60) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `trdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpintran`
--

INSERT INTO `tblpintran` (`id`, `idfrom`, `idto`, `efrom`, `eto`, `qty`, `trdate`) VALUES
(1, 1, 5, 'jjadmin', 'mem001', 100, '2018-01-09 18:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblpintran1`
--

DROP TABLE IF EXISTS `tblpintran1`;
CREATE TABLE `tblpintran1` (
  `id` int(11) NOT NULL,
  `idfrom` int(11) NOT NULL,
  `idto` int(11) NOT NULL,
  `efrom` varchar(60) NOT NULL,
  `eto` varchar(60) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `trdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpintran1`
--

INSERT INTO `tblpintran1` (`id`, `idfrom`, `idto`, `efrom`, `eto`, `qty`, `trdate`) VALUES
(1, 1, 5, 'jjadmin', 'mem001', 101, '2018-01-09 19:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblpintran2`
--

DROP TABLE IF EXISTS `tblpintran2`;
CREATE TABLE `tblpintran2` (
  `id` int(11) NOT NULL,
  `idfrom` int(11) NOT NULL,
  `idto` int(11) NOT NULL,
  `efrom` varchar(60) NOT NULL,
  `eto` varchar(60) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `trdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpintran2`
--

INSERT INTO `tblpintran2` (`id`, `idfrom`, `idto`, `efrom`, `eto`, `qty`, `trdate`) VALUES
(1, 1, 5, 'jjadmin', 'mem001', 102, '2018-01-09 19:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblsetup`
--

DROP TABLE IF EXISTS `tblsetup`;
CREATE TABLE `tblsetup` (
  `id` int(11) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `plan` varchar(5) NOT NULL,
  `pincost` int(11) NOT NULL,
  `pinrebate` int(11) NOT NULL,
  `phlist` varchar(200) NOT NULL,
  `exrate` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currencyname` varchar(30) NOT NULL,
  `phdays` varchar(10) NOT NULL DEFAULT '0',
  `banklist` varchar(1024) DEFAULT NULL,
  `maintain` int(11) NOT NULL DEFAULT '0',
  `manualdate` int(11) NOT NULL,
  `time_offset` varchar(20) NOT NULL,
  `masterpass` varchar(20) NOT NULL,
  `allowph` int(11) NOT NULL DEFAULT '1',
  `allowgh` int(11) NOT NULL DEFAULT '1',
  `lang` int(11) NOT NULL DEFAULT '2',
  `feature` varchar(50) NOT NULL,
  `nextph` varchar(20) DEFAULT NULL,
  `next_limit` int(11) NOT NULL DEFAULT '300',
  `next_state` varchar(2) NOT NULL DEFAULT 'B',
  `maxaccount` int(11) NOT NULL DEFAULT '999',
  `username_len` int(11) NOT NULL DEFAULT '0',
  `password_len` int(11) NOT NULL DEFAULT '0',
  `phone_len` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsetup`
--

INSERT INTO `tblsetup` (`id`, `domain`, `plan`, `pincost`, `pinrebate`, `phlist`, `exrate`, `currency`, `currencyname`, `phdays`, `banklist`, `maintain`, `manualdate`, `time_offset`, `masterpass`, `allowph`, `allowgh`, `lang`, `feature`, `nextph`, `next_limit`, `next_state`, `maxaccount`, `username_len`, `password_len`, `phone_len`) VALUES
(1, 'mmmtaiwan.com', '1', 60, 0, '100, 200, 300, 400, 500, 600, 700, 800, 900, 1000', '7', 'RMB', 'Renminbi', '0', '中国工商银行,中国建设银行,中国银行,中国农业银行,交通银行,招商银行,中国中信银行,上海浦东发展银行,兴业银行,中国民生银行,中国光大银行,平安银行,华夏银行,北京银行,广发银行,上海银行,江苏银行,恒丰银行,北京农村商业银行,重庆农村商业银行,渤海银行,上海农村商业银行,浙商银行,南京银行,广州农村商业银行,汇丰银行（中国）,宁波银行,徽商银行,杭州银行,天津银行,盛京银行广州银行,哈尔滨银行,大连银行成都农村商业银行,吉林银行,江南农村商业银行,包商银行,成都银行,东亚银行（中国）,渣打银行（中国）,龙江银行,天津农村商业银行,东莞农村商业银行,汉口银行,佛山顺德农村商业银行,昆仑银行,花旗银行（中国）,重庆银行,东莞银行,中国邮政储蓄银行,长沙', 0, 0, '0', 'gg1123212', 0, 0, 1, '', '18:00:00', 300, '0', 16, 6, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupport`
--

DROP TABLE IF EXISTS `tblsupport`;
CREATE TABLE `tblsupport` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `question` varchar(10) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `content` varchar(512) NOT NULL,
  `mdate` datetime NOT NULL,
  `rcontent` varchar(255) NOT NULL,
  `rdate` datetime NOT NULL,
  `status` varchar(2) NOT NULL,
  `action` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsupport`
--

INSERT INTO `tblsupport` (`id`, `mem_id`, `username`, `question`, `subject`, `content`, `mdate`, `rcontent`, `rdate`, `status`, `action`) VALUES
(1, 51, 'patrick', '', '', 'aaaaa', '2018-01-07 04:28:41', '', '0000-00-00 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccesslog`
--
ALTER TABLE `tblaccesslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccesslog1`
--
ALTER TABLE `tblaccesslog1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`user_name`,`l_date`);

--
-- Indexes for table `tblbank`
--
ALTER TABLE `tblbank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `tblcounter`
--
ALTER TABLE `tblcounter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tblhelp`
--
ALTER TABLE `tblhelp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`mem_id`,`g_date`),
  ADD KEY `status` (`status`,`id`),
  ADD KEY `g_type` (`g_type`,`id`),
  ADD KEY `mgr_id` (`mgr_id`),
  ADD KEY `priority` (`g_type`,`priority`,`g_date`),
  ADD KEY `sms` (`sms`);

--
-- Indexes for table `tblhelpdetail`
--
ALTER TABLE `tblhelpdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tran_id` (`tran_id`),
  ADD KEY `help_id` (`help_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `tblmavro`
--
ALTER TABLE `tblmavro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`email`),
  ADD KEY `help_id` (`help_id`),
  ADD KEY `mem_id` (`mem_id`,`op_type`);

--
-- Indexes for table `tblmember`
--
ALTER TABLE `tblmember`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpin`
--
ALTER TABLE `tblpin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`managerid`,`requestdate`,`pin`),
  ADD KEY `requestby` (`managerid`);

--
-- Indexes for table `tblpin1`
--
ALTER TABLE `tblpin1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`managerid`,`requestdate`,`pin`),
  ADD KEY `requestby` (`managerid`);

--
-- Indexes for table `tblpin2`
--
ALTER TABLE `tblpin2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`managerid`,`requestdate`,`pin`),
  ADD KEY `requestby` (`managerid`);

--
-- Indexes for table `tblpinlog`
--
ALTER TABLE `tblpinlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader` (`leader`);

--
-- Indexes for table `tblpinlog1`
--
ALTER TABLE `tblpinlog1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader` (`leader`);

--
-- Indexes for table `tblpinlog2`
--
ALTER TABLE `tblpinlog2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader` (`leader`);

--
-- Indexes for table `tblpintran`
--
ALTER TABLE `tblpintran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`idfrom`,`trdate`);

--
-- Indexes for table `tblpintran1`
--
ALTER TABLE `tblpintran1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`idfrom`,`trdate`);

--
-- Indexes for table `tblpintran2`
--
ALTER TABLE `tblpintran2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodupe` (`idfrom`,`trdate`);

--
-- Indexes for table `tblsetup`
--
ALTER TABLE `tblsetup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsupport`
--
ALTER TABLE `tblsupport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccesslog`
--
ALTER TABLE `tblaccesslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblaccesslog1`
--
ALTER TABLE `tblaccesslog1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblbank`
--
ALTER TABLE `tblbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcounter`
--
ALTER TABLE `tblcounter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblhelp`
--
ALTER TABLE `tblhelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblhelpdetail`
--
ALTER TABLE `tblhelpdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmavro`
--
ALTER TABLE `tblmavro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmember`
--
ALTER TABLE `tblmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpin`
--
ALTER TABLE `tblpin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tblpin1`
--
ALTER TABLE `tblpin1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `tblpin2`
--
ALTER TABLE `tblpin2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tblpinlog`
--
ALTER TABLE `tblpinlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpinlog1`
--
ALTER TABLE `tblpinlog1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpinlog2`
--
ALTER TABLE `tblpinlog2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpintran`
--
ALTER TABLE `tblpintran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpintran1`
--
ALTER TABLE `tblpintran1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpintran2`
--
ALTER TABLE `tblpintran2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblsetup`
--
ALTER TABLE `tblsetup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblsupport`
--
ALTER TABLE `tblsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
