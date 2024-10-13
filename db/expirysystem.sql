-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2024 at 04:40 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expirysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `registeredby` varchar(100) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Offline',
  `logtime` varchar(20) NOT NULL DEFAULT '0',
  `dis` varchar(6) NOT NULL,
  `dispensary` varchar(55) NOT NULL,
  `active` int(6) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sn`, `firstname`, `lastname`, `phone`, `email`, `username`, `password`, `usertype`, `registeredby`, `sex`, `district`, `created`, `status`, `logtime`, `dis`, `dispensary`, `active`) VALUES
(26, 'Dalang', 'Simdi James', '07067515948', '', 'dalang', 'ee6ef89459c70db139765b50e50fc27d', 'admin', 'femi', 'male', '', '2018-04-27 10:38:32', 'Online', '24/08/22 03:19', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `sn` int(6) NOT NULL AUTO_INCREMENT,
  `cat` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rep` varchar(55) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`sn`, `cat`, `created`, `rep`) VALUES
(1, 'pharmacy', '2024-08-22 14:36:18', 'dalang');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `company` varchar(200) NOT NULL,
  `other` varchar(1000) NOT NULL,
  `rep` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `tno` int(5) NOT NULL,
  `fno` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `salesrep` varchar(100) NOT NULL,
  `sms` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `yx` int(6) NOT NULL,
  `mx` varchar(225) NOT NULL,
  `dx` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clogo`
--

CREATE TABLE IF NOT EXISTS `clogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(250) NOT NULL,
  `rfooter` varchar(250) NOT NULL,
  `bglogo` varchar(250) NOT NULL,
  `rep` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `datt`
--

CREATE TABLE IF NOT EXISTS `datt` (
  `sn` int(4) NOT NULL AUTO_INCREMENT,
  `snd` varchar(8) DEFAULT NULL,
  `dd` varchar(4) DEFAULT NULL,
  `ww` varchar(4) DEFAULT NULL,
  `w` varchar(4) DEFAULT NULL,
  `wk` varchar(4) DEFAULT NULL,
  `mm` varchar(4) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `yy` int(4) DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `date` varchar(16) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ymd` varchar(8) DEFAULT NULL,
  `x` varchar(25) DEFAULT NULL,
  `y` varchar(25) DEFAULT NULL,
  `z` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `datt`
--

INSERT INTO `datt` (`sn`, `snd`, `dd`, `ww`, `w`, `wk`, `mm`, `month`, `yy`, `day`, `date`, `created`, `ymd`, `x`, `y`, `z`) VALUES
(1, '234', '22', '4', '22', '34', '08', 'Aug', 24, 'Aug', '22-Aug-2024', '2024-08-22 03:17:43', '240822', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expitem`
--

CREATE TABLE IF NOT EXISTS `expitem` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `des` varchar(300) NOT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `tno` int(5) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='expenditure item' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `des` varchar(300) NOT NULL,
  `qty` varchar(9) NOT NULL,
  `unitprice` varchar(10) DEFAULT NULL,
  `packprice` varchar(10) DEFAULT NULL,
  `unitcost` varchar(12) NOT NULL,
  `cost` varchar(10) DEFAULT NULL,
  `pqty` varchar(10) DEFAULT '1',
  `uptimum` int(10) DEFAULT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `other` varchar(2000) NOT NULL,
  `cat` varchar(55) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `tno` int(6) NOT NULL,
  `sold` int(12) NOT NULL DEFAULT '0',
  `xm` varchar(5) NOT NULL,
  `xy` varchar(5) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `naf` varchar(100) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sn`, `item`, `des`, `qty`, `unitprice`, `packprice`, `unitcost`, `cost`, `pqty`, `uptimum`, `rep`, `created`, `today`, `other`, `cat`, `dd`, `mm`, `yy`, `ww`, `tno`, `sold`, `xm`, `xy`, `vendor`, `batch`, `naf`, `barcode`) VALUES
(1, 'something', '', '', '70', '67', '', NULL, '1', 2, 'dalang', '2024-08-22 14:36:57', 240822, '', 'pharmacy', 22, 8, 24, 34, 0, 0, '09', '21', '', '', '', '481122214276');

-- --------------------------------------------------------

--
-- Table structure for table `stockup`
--

CREATE TABLE IF NOT EXISTS `stockup` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `salesid` varchar(24) DEFAULT NULL,
  `pid` int(8) DEFAULT NULL,
  `item` varchar(50) NOT NULL,
  `des` varchar(300) NOT NULL,
  `qty` varchar(9) NOT NULL,
  `qtyb` int(11) NOT NULL,
  `qtya` int(11) NOT NULL,
  `unitprice` varchar(10) DEFAULT NULL,
  `packprice` varchar(10) DEFAULT NULL,
  `totalcost` varchar(10) DEFAULT NULL,
  `unitcost` int(10) DEFAULT NULL,
  `pqty` varchar(10) DEFAULT NULL,
  `packno` int(8) DEFAULT NULL,
  `uptimum` int(10) DEFAULT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '0',
  `today` int(30) NOT NULL,
  `other` varchar(2000) NOT NULL,
  `cat` varchar(55) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `tno` int(5) NOT NULL,
  `xm` varchar(5) NOT NULL,
  `xy` varchar(5) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `naf` varchar(100) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockup2`
--

CREATE TABLE IF NOT EXISTS `stockup2` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `salesid` varchar(24) NOT NULL,
  `inv` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `cash` varchar(10) NOT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `sms` varchar(225) NOT NULL,
  `dis` int(6) NOT NULL,
  `dispensary` varchar(55) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `sn` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone2` varchar(225) NOT NULL,
  `senderid` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL,
  `cos` varchar(225) NOT NULL,
  `tan` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `actno` varchar(225) NOT NULL,
  `motto` varchar(225) NOT NULL,
  `title2` varchar(225) NOT NULL,
  `nick` varchar(225) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`sn`, `name`, `address`, `phone`, `email`, `website`, `phone2`, `senderid`, `username`, `pwd`, `cos`, `tan`, `date`, `actno`, `motto`, `title2`, `nick`) VALUES
(1, 'Ronex Global', '', '', '', '', '', '', '', 'MjAyNS0wMi0wOA==', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE IF NOT EXISTS `transact` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `salesid` varchar(24) NOT NULL,
  `pid` int(24) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `des` varchar(300) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `cprice` varchar(250) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `cash` varchar(10) NOT NULL,
  `balance` varchar(10) NOT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `other` varchar(2000) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `sprice` varchar(10) NOT NULL,
  `inv` varchar(225) NOT NULL,
  `dis` int(6) NOT NULL,
  `dispensary` varchar(55) NOT NULL,
  `tr_type` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`sn`, `salesid`, `pid`, `name`, `phone`, `item`, `des`, `cat`, `qty`, `price`, `cprice`, `amount`, `cash`, `balance`, `rep`, `created`, `today`, `other`, `status`, `dd`, `mm`, `yy`, `ww`, `sprice`, `inv`, `dis`, `dispensary`, `tr_type`) VALUES
(1, '044304081124', 1, 'Ade', '', 'SDWEWWW', '', 'pharmacy', '3', '300', '60', '900', '', '', 'dalang', '2024-08-11 15:22:55', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(2, '044304081124', 4, 'Ade', '', 'food pack', '', 'pharmacy', '200', '108', '21400', '21600', '', '', 'dalang', '2024-08-11 15:22:55', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(3, '582205081124', 4, 'Customer', '', 'food pack', '', 'pharmacy', '1', '10800', '107', '10800', '', '', 'dalang', '2024-08-11 15:24:36', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(4, '582205081124', 2, 'Customer', '', 'New Drug', '', 'pharmacy', '1', '12', '80', '12', '', '', 'dalang', '2024-08-11 15:24:36', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(5, '582205081124', 3, 'Customer', '', 'PCM', '', 'pharmacy', '3', '140', '36', '420', '', '', 'dalang', '2024-08-11 15:24:36', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(6, '203605081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '2', '140', '24', '280', '', '', 'dalang', '2024-08-16 11:31:05', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(7, '114705081124', 4, 'Customer', '', 'food pack', '', 'pharmacy', '100', '108', '10700', '10800', '', '', 'dalang', '2024-08-11 15:47:27', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(8, '505205081124', 4, 'Ade', '', 'food pack', '', 'pharmacy', '1', '10800', '107', '10800', '', '', 'dalang', '2024-08-11 16:11:19', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(9, '291206081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '7', '140', '84', '980', '', '', 'dalang', '2024-08-11 16:13:13', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(10, '341306081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '7', '140', '84', '980', '', '', 'dalang', '2024-08-11 16:14:36', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(11, '131506081124', 3, 'Customer', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 16:28:45', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(12, '173406081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '8', '140', '96', '1120', '', '', 'dalang', '2024-08-11 16:34:44', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(13, '064406081124', 3, 'Customer', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 16:44:51', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(14, '034506081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 16:45:11', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(15, '374706081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 16:47:45', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(16, '015106081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 16:51:15', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(17, '180707081124', 3, 'Ade', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 17:07:27', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(18, '560707081124', 3, 'Customer', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 17:08:17', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(19, '320807081124', 3, 'Seun', '', 'PCM', '', 'pharmacy', '1', '140', '12', '140', '', '', 'dalang', '2024-08-11 17:08:55', 240811, '', '1', 11, 8, 24, 32, '', '', 0, '', 1),
(22, '060912081224', 5, 'Customer', '', 'biscuit x 12', '', 'pharmacy', '1', '10800', '10700', '10800', '', '', 'dalang', '2024-08-12 10:32:48', 240812, '', '1', 12, 8, 24, 33, '', '', 0, '', 1),
(23, '051401081624', 3, 'Customer', '', 'PCM', '', 'pharmacy', '4', '140', '48', '560', '', '', 'dalang', '2024-08-16 11:35:09', 240816, '', '1', 16, 8, 24, 33, '', '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transact2`
--

CREATE TABLE IF NOT EXISTS `transact2` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `salesid` varchar(24) NOT NULL,
  `inv` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `cprice` varchar(250) NOT NULL,
  `qty` int(250) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `cash` varchar(10) NOT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `sms` varchar(225) NOT NULL,
  `dis` int(6) NOT NULL,
  `dispensary` varchar(55) NOT NULL,
  `tfamount` varchar(20) NOT NULL,
  `cashp` varchar(20) NOT NULL,
  `pos` varchar(20) NOT NULL,
  `credit` varchar(20) NOT NULL,
  `crstatus` int(2) NOT NULL,
  `tr_type` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `transact2`
--

INSERT INTO `transact2` (`sn`, `id`, `salesid`, `inv`, `name`, `amount`, `cprice`, `qty`, `discount`, `cash`, `rep`, `created`, `today`, `dd`, `mm`, `yy`, `ww`, `sms`, `dis`, `dispensary`, `tfamount`, `cashp`, `pos`, `credit`, `crstatus`, `tr_type`) VALUES
(1, 0, '033201022624', '033201022624', 'Customer', '300', '10', 0, '20', '280', 'dalang', '2024-05-19 09:44:43', 240519, 19, 5, 24, 20, '', 0, 'CASH', '80', '200', '0', '0', 0, 1),
(2, 1, '144611051924', '144611051924', 'Ade', '600', '40', 0, '0', '600', 'dalang', '2024-08-11 16:47:29', 240519, 19, 5, 24, 20, '', 0, 'CASH', '0', '300', '0', '300', 0, 1),
(3, 0, '475302080924', '475302080924', 'Customer', '12', '80', 0, '0', '12', 'dalang', '2024-08-09 20:35:22', 240809, 9, 8, 24, 32, '', 0, 'CASH', '0', '12', '0', '0', 0, 1),
(4, 0, '553510080924', '553510080924', 'Customer', '12', '80', 0, '0', '12', 'dalang', '2024-08-09 20:53:58', 240809, 9, 8, 24, 32, '', 0, 'CASH', '0', '12', '0', '0', 0, 1),
(5, 0, '145510080924', '145510080924', 'Customer', '122', '800', 0, '0', '300', 'dalang', '2024-08-09 20:55:30', 240809, 9, 8, 24, 32, '', 0, 'CASH', '0', '300', '0', '0', 0, 1),
(6, 0, '170111080924', '170111080924', 'Customer', '12', '80', 0, '0', '12', 'dalang', '2024-08-09 22:21:47', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '12', '0', '0', 0, 1),
(7, 0, '502112081024', '502112081024', 'Customer', '30', '20', 0, '0', '30', 'dalang', '2024-08-09 22:22:03', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '30', '0', '0', 0, 1),
(8, 0, '052212081024', '052212081024', 'Customer', '300', '20', 0, '0', '300', 'dalang', '2024-08-09 22:22:20', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '300', '0', '0', 0, 1),
(9, 0, '342312081024', '342312081024', 'Customer', '84', '560', 0, '0', '84', 'dalang', '2024-08-09 22:23:53', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '84', '0', '0', 0, 1),
(10, 0, '462412081024', '462412081024', 'Customer', '300', '20', 0, '0', '300', 'dalang', '2024-08-09 22:25:01', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '300', '0', '0', 0, 1),
(11, 0, '282612081024', '282612081024', 'Customer', '300', '20', 0, '0', '300', 'dalang', '2024-08-09 22:26:36', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '300', '0', '0', 0, 1),
(12, 0, '542612081024', '542612081024', 'Customer', '12', '80', 0, '0', '12', 'dalang', '2024-08-09 22:27:13', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '12', '0', '0', 0, 1),
(13, 0, '542912081024', '542912081024', 'Customer', '48', '320', 0, '0', '48', 'dalang', '2024-08-09 22:30:17', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '48', '0', '0', 0, 1),
(14, 0, '213012081024', '213012081024', 'Customer', '244', '1600', 0, '0', '244', 'dalang', '2024-08-09 22:30:52', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '244', '0', '0', 0, 1),
(15, 0, '253112081024', '253112081024', 'Customer', '2400', '160', 0, '0', '2400', 'dalang', '2024-08-09 23:53:46', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '2400', '0', '0', 0, 1),
(16, 0, '593112081024', '593112081024', 'Customer', '140', '12', 0, '0', '140', 'dalang', '2024-08-09 22:40:29', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '140', '0', '0', 0, 1),
(17, 0, '394012081024', '394012081024', 'Customer', '1800', '10800', 0, '0', '1800', 'dalang', '2024-08-09 22:40:50', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '1800', '0', '0', 0, 1),
(18, 0, '134112081024', '134112081024', 'Customer', '1260', '108', 0, '0', '1260', 'dalang', '2024-08-09 22:41:40', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '1260', '0', '0', 0, 1),
(19, 0, '474512081024', '474512081024', 'Customer', '24', '160', 0, '0', '24', 'dalang', '2024-08-09 22:51:03', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '24', '0', '0', 0, 1),
(20, 0, '304001081024', '304001081024', 'Customer', '12', '80', 0, '10', '2', 'dalang', '2024-08-09 23:54:38', 240810, 10, 8, 24, 32, '', 0, 'CASH', '0', '2', '0', '0', 0, 1),
(21, 1, '044304081124', '044304081124', 'Ade', '22500', '21460', 0, '0', '22500', 'dalang', '2024-08-11 15:22:55', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '22500', '0', '0', 0, 1),
(22, 0, '582205081124', '582205081124', 'Customer', '11232', '223', 0, '0', '11232', 'dalang', '2024-08-11 15:24:36', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '11232', '0', '0', 0, 1),
(23, 1, '203605081124', '203605081124', 'Ade', '280', '24', 0, '0', '280', 'dalang', '2024-08-16 11:31:17', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '280', '0', '0', 0, 1),
(24, 0, '114705081124', '114705081124', 'Customer', '10800', '10700', 0, '0', '10800', 'dalang', '2024-08-11 15:47:27', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '10000', '0', '800', 1, 1),
(25, 1, '505205081124', '505205081124', 'Ade', '10800', '107', 0, '0', '10800', 'dalang', '2024-08-11 16:47:29', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '0', '0', '10800', 0, 1),
(26, 1, '291206081124', '291206081124', 'Ade', '980', '84', 0, '0', '980', 'dalang', '2024-08-11 16:47:29', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '0', '0', '980', 0, 1),
(27, 1, '341306081124', '341306081124', 'Ade', '980', '84', 0, '0', '980', 'dalang', '2024-08-11 16:47:29', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '260', '0', '720', 0, 1),
(28, 0, '131506081124', '131506081124', 'Customer', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 16:28:45', 240811, 11, 8, 24, 32, '', 0, 'CASH', '50', '40', '0', '50', 1, 1),
(29, 1, '173406081124', '173406081124', 'Ade', '1120', '96', 0, '0', '1120', 'dalang', '2024-08-11 16:47:29', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '300', '0', '820', 0, 1),
(30, 0, '064406081124', '064406081124', 'Customer', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 16:44:51', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '0', '0', '140', 1, 1),
(31, 1, '034506081124', '034506081124', 'Ade', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 16:47:29', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '0', '0', '140', 0, 1),
(32, 1, '374706081124', '374706081124', 'Ade', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 16:47:45', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '140', '0', '0', 0, 1),
(33, 1, '015106081124', '015106081124', 'Ade', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 16:51:15', 240811, 11, 8, 24, 32, '', 0, 'CASH', '20', '20', '0', '100', 1, 1),
(34, 1, '180707081124', '180707081124', 'Ade', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 17:07:26', 240811, 11, 8, 24, 32, '', 0, 'CASH', '0', '40', '0', '100', 1, 1),
(35, 0, '560707081124', '560707081124', 'Customer', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 17:08:17', 240811, 11, 8, 24, 32, '', 0, 'CASH', '20', '20', '0', '100', 1, 1),
(36, 2, '320807081124', '320807081124', 'Seun', '140', '12', 0, '0', '140', 'dalang', '2024-08-11 17:08:55', 240811, 11, 8, 24, 32, '', 0, 'CASH', '20', '20', '0', '100', 1, 1),
(37, 0, '060912081224', '060912081224', 'Customer', '10800', '10700', 0, '0', '10800', 'dalang', '2024-08-12 10:32:48', 240812, 12, 8, 24, 33, '', 0, 'CASH', '0', '0', '0', '10800', 1, 1),
(38, 0, '051401081624', '051401081624', 'Customer', '560', '48', 0, '0', '560', 'dalang', '2024-08-16 11:35:09', 240816, 16, 8, 24, 33, '', 0, 'CASH', '0', '0', '0', '560', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
