-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2014 at 11:27 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharm`
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
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sn`, `firstname`, `lastname`, `phone`, `email`, `username`, `password`, `usertype`, `registeredby`, `sex`, `district`, `created`, `status`, `logtime`) VALUES
(1, 'Godwin', 'Ogbaji', '08032318588', 'ogbajigodwin@yahoo.com', 'ogbaji', 'ogbaji', 'salesrep', 'ogbaji', '', '', '0000-00-00 00:00:00', 'Offline', '14/08/04,  05:09'),
(2, 'godwin', 'ogbaji', '08032318588', 'ogbajigodwin@yahoo.com', 'godwin', 'godwin', 'manager', 'ogbaji', '', '', '0000-00-00 00:00:00', 'Online', '14/06/06,  02:07'),
(3, 'godwin', 'ogbaji', '08032318588', 'ogbajigodwin@yahoo.com', 'john', 'john', 'salesrep', 'ogbaji', '', '', '0000-00-00 00:00:00', 'Offline', '14/05/18,  11:11'),
(4, 'solex', 'solex', 'solex', 'solex', 'solex', 'solex', 'salesrep', 'john', '', '', '0000-00-00 00:00:00', 'Offline', '0000-00-00 00:00:00'),
(5, 'olaniran', 'omotola', '08032318588', 'simi@yahoo.com', 'olaniran', 'omotola', 'salesrep', 'godwin', 'male', '', '2014-06-05 21:10:01', 'Offline', '14/06/06,  04:58');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `email`, `address`, `company`, `other`, `rep`, `created`, `today`, `sex`, `dd`, `mm`, `yy`, `ww`, `tno`) VALUES
(1, 'godwin ogbaji John', '08032318588', 'simi@yahoo.com', '10, Ogo- Oluwa Street, Oshinle Quarters, Akure', 'trenet solutions Ltd', 'other information', 'ogbaji', '0000-00-00 00:00:00', 140529, 'male', 0, 0, 0, 0, 5),
(2, 'bolanle_supo', '08054704146', '87686867162738', '10, Ogo- Oluwa Street, Oshinle Quarters, Akure', 'trenet on line', 'the love of God constrains me', 'ogbaji', '2014-05-28 04:06:55', 140606, 'female', 0, 0, 0, 0, 8),
(3, 'salamatu', '08032318588', 'simi@yahoo.com', 'Zone 10, Ijoka Rd. , Akure', 'trenet solutions Ltd', 'other info', 'ogbaji', '2014-05-28 04:09:23', 140528, '', 0, 0, 0, 0, 2),
(4, 'segun_oni', '08054704146', 'gdhg@ghgh.cjk', 'Zone 10, Ijoka Rd. , Akure', 'trenet solutions Ltd', 'hjhjhk', 'ogbaji', '2014-05-28 04:11:41', 140528, '', 0, 0, 0, 0, 4),
(5, 'sunday_bewaji', '08054704146', 'james@olaniran.com', '2, Aduralere street', 'trenet', 'the love of God constrains me', 'opeyemi', '2014-05-28 04:13:07', 140528, 'male', 0, 0, 0, 0, 3),
(6, 'sunsay', '', '', '', '', '', 'opeyemi', '2014-05-28 04:18:02', 140528, 'male', 0, 0, 0, 0, 1),
(7, 'salamatu', '08054704146', '', '', '', '', 'opeyemi', '2014-05-28 04:27:18', 140528, 'female', 0, 0, 0, 0, 3),
(8, 'salamatu', '08054704146', '', '', '', '', 'opeyemi', '2014-05-28 04:34:36', 140528, '', 0, 0, 0, 0, 0),
(9, 'salamatu_jane', '08054704146', 'jdhkjshj@jhjhj.sdj', '8787598793', 'trenet', 'hjhkjhskjdhfksdhjh', 'opeyemi', '2014-05-28 05:08:32', 140528, 'female', 0, 0, 0, 0, 0),
(10, 'james bulus', '08054704146', 'simi@yahoo.com', '10, Ogo- Oluwa Street, Oshinle Quarters, Akure', 'trenet', '', 'opeyemi', '2014-05-28 05:12:19', 140528, 'male', 0, 0, 0, 0, 1),
(11, 'bsjkkj', '', 'kljjkjkl', '', '', '', 'opeyemi', '2014-05-28 05:17:02', 140528, '', 0, 0, 0, 0, 0),
(12, 'mama wale', '08054704146', 'hjhjk@hjhkjhkj.com', 'jjlkjklj', 'jkjk', 'kjkjkl', 'opeyemi', '2014-05-28 06:46:37', 140528, 'female', 0, 0, 0, 0, 4),
(13, 'mama_wale', '08032318588', 'hjhjk@hjhkjhkj.com', 'jjlkjklj', 'jkjk', 'kjkjkl', 'opeyemi', '2014-05-28 06:48:45', 140528, 'female', 0, 0, 0, 0, 1),
(14, 'james olu', '', 'jjolu@yahoo.com', 'Aduralere street', 'trenet solutions Ltd', '', 'opeyemi', '2014-05-29 17:13:48', 140529, 'male', 0, 0, 0, 0, 0),
(15, 'femi lolade', '08054704146', 'gdhg@ghgh.cjk', 'Aduralere street', 'trenet', '', 'opeyemi', '2014-05-29 17:22:47', 140529, 'female', 0, 0, 0, 0, 0),
(16, 'jimoh_ibrahim', '08032318588', 'simi@yahoo.com', 'Aduralere street', '', '', 'opeyemi', '2014-05-29 19:23:00', 140529, 'male', 0, 0, 0, 0, 0),
(17, 'bewaji_paula', '', '', '', '', '', 'olaniran', '2014-05-29 21:48:04', 140529, 'female', 0, 0, 0, 0, 0),
(18, 'kay toyo', '08032297157', 'jjk', 'jhjkhk', 'trenet solutions Ltd', '', 'olaniran', '2014-05-30 08:43:09', 140530, 'male', 0, 0, 0, 0, 0),
(19, 'Engr Tola Ojajuni', '08066653161', 'engr@yahoo.com', 'ministry of works', 'ministry of works', 'enterprise chat software', 'olaniran', '2014-06-02 12:21:42', 140602, 'male', 0, 0, 0, 0, 0),
(20, 'adewale adetokunbo', '08032318588', 'simi@yahoo.com', 'Aduralere street', 'trenet solutions Ltd', '', 'olaniran', '2014-06-06 03:04:07', 140606, 'male', 0, 0, 0, 0, 0),
(21, 'mimijo Atanda', '08032318588', 'gdhg@ghgh.cjk', 'Zone 10, Ijoka Rd. , Akure', 'ministry of works', '', 'godwin', '2014-06-06 03:07:13', 140606, 'male', 0, 0, 0, 0, 0),
(22, 'jasper tade', '08032318588', '', '', '', '', 'godwin', '2014-06-06 03:12:18', 140606, 'male', 0, 0, 0, 0, 0),
(23, 'olaniran wale', '08032318588', 'simi@yahoo.com', 'Aduralere street', 'trenet', '', 'godwin', '2014-06-06 08:35:14', 140606, 'male', 0, 0, 0, 0, 0),
(24, 'paul Toyo', '08032318588', 'ogbajigodwin@yahoo.com', '10, Ogo- Oluwa Street, Oshinle Quarters, Akure', 'trenet solutions Ltd', '', 'ogbaji', '2014-06-10 11:56:41', 140610, 'male', 0, 0, 0, 0, 0),
(25, 'mrs bello', '08038578508', '', '', '', '', 'ogbaji', '2014-06-17 19:36:03', 140617, 'female', 0, 0, 0, 0, 1),
(26, 'matthew segun', '08032318588', 'ogbajigodwin@yahoo.com', '', 'trenet', '', 'ogbaji', '2014-06-30 13:58:29', 140630, 'male', 0, 0, 0, 0, 4),
(27, 'james', '08032318588', '', '', '', '', 'ogbaji', '2014-07-01 09:56:36', 140701, 'male', 0, 0, 0, 0, 4),
(28, 'mercy james', '08032318588', '', '', '', '', 'ogbaji', '2014-07-14 20:12:38', 140714, 'female', 0, 0, 0, 0, 3),
(29, 'kemi james', '0809878979', '', '', '', '', 'ogbaji', '2014-07-16 09:50:43', 140716, 'female', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expend`
--

CREATE TABLE IF NOT EXISTS `expend` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL,
  `item` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `dd` int(10) NOT NULL,
  `mm` int(10) NOT NULL,
  `yy` int(10) NOT NULL,
  `ww` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rep` varchar(20) NOT NULL,
  `today` int(10) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='expenditure' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expend`
--

INSERT INTO `expend` (`sn`, `amount`, `item`, `des`, `cat`, `name`, `phone`, `dd`, `mm`, `yy`, `ww`, `created`, `rep`, `today`) VALUES
(1, 2000, 'calculator', '2 way scientific calc', 'Equipment Purchase', '', 0, 7, 7, 14, 28, '2014-07-07 17:35:59', 'ogbaji', 140707),
(2, 6500, 'fuel', 'car fuelling', 'Petrol & Electricity', '', 0, 7, 7, 14, 28, '2014-07-07 17:41:36', 'ogbaji', 140707),
(3, 3000, 'fueling', '', 'Petrol & Electricity', '', 0, 16, 7, 14, 29, '2014-07-16 09:33:49', 'ogbaji', 140716);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='expenditure item' AUTO_INCREMENT=28 ;

--
-- Dumping data for table `expitem`
--

INSERT INTO `expitem` (`sn`, `item`, `des`, `rep`, `created`, `today`, `tno`) VALUES
(2, 'Petrol & Electricity', 'blue kegs', '', '2014-07-01 15:34:43', 140528, 0),
(3, 'Recharge Cards', 'nokia xl phone', '', '2014-06-07 21:02:02', 140528, 0),
(10, 'Transport', 'size 23', '', '2014-06-07 21:02:19', 140529, 0),
(11, 'Cleaning & Maintenance', 'white', '', '2014-06-07 21:03:54', 140529, 0),
(12, 'Staff Salary', 'sachet', '', '2014-07-12 11:53:57', 140529, 0),
(13, 'Stationery', '3kva honda generator', 'ogbaji', '2014-06-07 21:04:47', 140609, 0),
(15, 'Bulk SMS', '17 inch monitor', 'ogbaji', '2014-06-07 21:06:41', 140610, 0),
(16, 'Marketing', '', '', '2014-06-07 21:08:51', 0, 0),
(17, 'Bonuses & Sales Commission', '', '', '2014-06-07 21:08:51', 0, 0),
(18, 'Rent', '', '', '2014-06-29 21:46:29', 0, 0),
(20, 'Other Expenses', '', '', '2014-06-07 21:12:39', 0, 0),
(24, 'Equipment Purchase', '', '', '2014-06-29 21:47:30', 0, 0),
(27, 'Tax and Levies', '', 'ogbaji', '2014-07-03 12:22:35', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incexp`
--

CREATE TABLE IF NOT EXISTS `incexp` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `income` int(10) NOT NULL,
  `expend` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dd` int(10) NOT NULL,
  `mm` int(10) NOT NULL,
  `yy` int(10) NOT NULL,
  `ww` int(5) NOT NULL,
  `today` int(10) NOT NULL,
  `rep` varchar(30) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='balancing expenditure with income' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `item` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `dd` int(10) NOT NULL,
  `mm` int(10) NOT NULL,
  `yy` int(10) NOT NULL,
  `ww` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rep` varchar(20) NOT NULL,
  `today` int(10) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`sn`, `id`, `amount`, `item`, `des`, `cat`, `name`, `phone`, `dd`, `mm`, `yy`, `ww`, `created`, `rep`, `today`) VALUES
(1, 2, 3800, 'panadol', 'cards of 500mg panadol from emzor', 'panadol', '', 0, 7, 7, 14, 28, '2014-07-07 17:22:47', 'ogbaji', 140707),
(2, 3, 600, 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 'salamatu', 2147483647, 7, 7, 14, 28, '2014-07-07 17:25:31', 'ogbaji', 140707),
(3, 3, 600, 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 'salamatu', 2147483647, 7, 7, 14, 28, '2014-07-07 17:29:31', 'ogbaji', 140707),
(5, 4, 1920, 'Coatem', 'packs of coatem tabs', 'Coatem', 'segun_oni', 2147483647, 7, 7, 14, 28, '2014-07-07 17:40:15', 'ogbaji', 140707),
(6, 4, 1440, 'lipitol', 'cards of lipitol from pfizer', 'lipitol', 'segun_oni', 2147483647, 7, 7, 14, 28, '2014-07-07 17:40:38', 'ogbaji', 140707),
(7, 4, 30000, 'paracetamol', 'cards of 500mg paracetamol from emzor', 'paracetamol', 'segun_oni', 2147483647, 7, 7, 14, 28, '2014-07-07 17:44:17', 'ogbaji', 140707),
(8, 0, 102500, 'maladrin', 'maladrin', 'maladrin', '', 0, 8, 7, 14, 28, '2014-07-08 16:00:31', 'ogbaji', 140708),
(9, 0, 10500, 'maladrin', 'maladrin', 'maladrin', '', 0, 8, 7, 14, 28, '2014-07-08 16:01:00', 'ogbaji', 140708),
(10, 0, 6250, 'maladrin', 'maladrin', 'maladrin', '', 0, 8, 7, 14, 28, '2014-07-08 16:02:23', 'ogbaji', 140708),
(11, 0, 21000, 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', '', 0, 8, 7, 14, 28, '2014-07-08 16:03:31', 'ogbaji', 140708),
(12, 5, 2400, 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 'sunday_bewaji', 2147483647, 8, 7, 14, 28, '2014-07-08 16:05:06', 'ogbaji', 140708),
(13, 5, 307200, 'Coatem', 'packs of coatem tabs', 'Coatem', 'sunday_bewaji', 2147483647, 8, 7, 14, 28, '2014-07-08 16:05:46', 'ogbaji', 140708),
(14, 5, 9600, 'Coatem', 'packs of coatem tabs', 'Coatem', 'sunday_bewaji', 2147483647, 8, 7, 14, 28, '2014-07-08 16:07:16', 'ogbaji', 140708),
(15, 6, 22800, 'Bentazol', 'bentazol from emzor', 'Bentazol', 'sunsay', 0, 8, 7, 14, 28, '2014-07-08 19:38:55', 'ogbaji', 140708),
(16, 7, 7600, 'Bentazol', 'bentazol from emzor', 'Bentazol', 'salamatu', 2147483647, 8, 7, 14, 28, '2014-07-08 19:39:31', 'ogbaji', 140708),
(17, 10, 5700, 'Bentazol', 'bentazol from emzor', 'Bentazol', 'james bulus', 2147483647, 8, 7, 14, 28, '2014-07-08 19:40:00', 'ogbaji', 140708),
(18, 1, 1900, 'Bentazol', 'bentazol from emzor', 'Bentazol', 'godwin ogbaji John', 2147483647, 8, 7, 14, 28, '2014-07-08 19:40:32', 'ogbaji', 140708),
(19, 12, 960, 'Coatem', 'packs of coatem tabs', 'Coatem', 'mama wale', 2147483647, 9, 7, 14, 28, '2014-07-09 11:04:44', 'ogbaji', 140709),
(20, 12, 960, 'Coatem', 'packs of coatem tabs', 'Coatem', 'mama wale', 2147483647, 12, 7, 14, 28, '2014-07-12 07:54:57', 'ogbaji', 140712),
(21, 12, 0, '', '', '', 'mama wale', 2147483647, 12, 7, 14, 28, '2014-07-12 07:55:04', 'ogbaji', 140712),
(22, 4, 1200, 'paradana', 'paracetamol from dana', 'paradana', 'segun_oni', 2147483647, 12, 7, 14, 28, '2014-07-12 11:11:55', 'ogbaji', 140712),
(23, 7, 950, 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 'salamatu', 2147483647, 12, 7, 14, 28, '2014-07-12 11:19:13', 'ogbaji', 140712),
(24, 7, 750, 'maladrin', 'maladrin', 'maladrin', 'salamatu', 2147483647, 12, 7, 14, 28, '2014-07-12 11:19:26', 'ogbaji', 140712),
(25, 28, 1920, 'Coatem', 'packs of coatem tabs', 'Coatem', 'mercy james', 2147483647, 14, 7, 14, 29, '2014-07-14 20:14:33', 'ogbaji', 140714),
(26, 28, 2880, 'lipitol', 'cards of lipitol from pfizer', 'lipitol', 'mercy james', 2147483647, 14, 7, 14, 29, '2014-07-14 20:18:06', 'ogbaji', 140714),
(27, 28, 760, 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 'mercy james', 2147483647, 14, 7, 14, 29, '2014-07-14 20:18:31', 'ogbaji', 140714),
(28, 1, 760, 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 'godwin ogbaji John', 2147483647, 15, 7, 14, 29, '2014-07-15 07:43:11', 'ogbaji', 140715),
(29, 1, 1250, 'maladrin', 'maladrin', 'maladrin', 'godwin ogbaji John', 2147483647, 15, 7, 14, 29, '2014-07-15 07:44:15', 'ogbaji', 140715),
(30, 2, 1920, 'Coatem', 'packs of coatem tabs', 'Coatem', 'bolanle_supo', 2147483647, 16, 7, 14, 29, '2014-07-16 09:17:37', 'ogbaji', 140716),
(31, 2, 600, 'paracetamol', 'cards of 500mg paracetamol from emzor', 'paracetamol', 'bolanle_supo', 2147483647, 16, 7, 14, 29, '2014-07-16 09:18:39', 'ogbaji', 140716),
(32, 2, 1960, 'Prevenar 13', 'pain reliever from pfizer', 'Prevenar 13', 'bolanle_supo', 2147483647, 16, 7, 14, 29, '2014-07-16 09:18:58', 'ogbaji', 140716),
(33, 2, 0, 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 'bolanle_supo', 2147483647, 16, 7, 14, 29, '2014-07-16 09:20:04', 'ogbaji', 140716),
(34, 2, 0, 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 'bolanle_supo', 2147483647, 16, 7, 14, 29, '2014-07-16 09:20:34', 'ogbaji', 140716),
(35, 12, 360, 'paracetamol', 'cards of 500mg paracetamol from emzor', 'paracetamol', 'mama wale', 2147483647, 16, 7, 14, 29, '2014-07-16 09:49:34', 'ogbaji', 140716),
(36, 2, 1900, 'Bentazol', 'bentazol from emzor', 'Bentazol', 'bolanle_supo', 2147483647, 16, 7, 14, 29, '2014-07-16 15:26:26', 'ogbaji', 140716),
(37, 13, 38000, 'Bentazol', 'bentazol from emzor', 'Bentazol', 'mama_wale', 2147483647, 23, 7, 14, 30, '2014-07-23 14:06:54', 'ogbaji', 140723);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `sms` varchar(2000) NOT NULL,
  `cat` varchar(30) NOT NULL COMMENT 'category',
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smsrec`
--

CREATE TABLE IF NOT EXISTS `smsrec` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `recip` varchar(30) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `item` varchar(50) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `count` int(10) NOT NULL,
  `today` int(10) NOT NULL,
  `rep` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `smsrec`
--

INSERT INTO `smsrec` (`sn`, `id`, `category`, `recip`, `phone`, `item`, `msg`, `created`, `count`, `today`, `rep`, `status`, `dd`, `mm`, `yy`, `ww`) VALUES
(1, 0, 'Transaction', 'godwin ogbaji John', '08032318588', 'Coatem', 'Thank you Godwin ogbaji John for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:24:40', 1, 140630, 'ogbaji', '', 0, 0, 0, 0),
(2, 0, 'Transaction', 'godwin ogbaji John', '08032318588', '', 'Thank you Godwin ogbaji John for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:24:40', 1, 140630, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(3, 0, 'Transaction', 'godwin ogbaji John', '08032318588', 'paracetamol', 'Thank you Godwin ogbaji John for buying paracetamol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:25:03', 1, 140630, 'ogbaji', '', 0, 0, 0, 0),
(4, 0, 'Transaction', 'godwin ogbaji John', '08032318588', '', 'Thank you Godwin ogbaji John for buying paracetamol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:25:03', 1, 140630, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(5, 0, 'Transaction', 'matthew segun', '08032318588', 'panadol', 'Thank you Matthew segun for buying panadol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:55:52', 1, 140630, 'ogbaji', '', 0, 0, 0, 0),
(6, 0, 'Transaction', 'matthew segun', '08032318588', '', 'Thank you Matthew segun for buying panadol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:55:52', 1, 140630, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(7, 0, 'Transaction', 'matthew segun', '08032318588', 'paracetamol', 'Thank you Matthew segun for buying paracetamol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:56:32', 1, 140630, 'ogbaji', '', 0, 0, 0, 0),
(8, 0, 'Transaction', 'matthew segun', '08032318588', '', 'Thank you Matthew segun for buying paracetamol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:56:32', 1, 140630, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(9, 0, 'Transaction', 'matthew segun', '08032318588', 'Vitamin C', 'Thank you Matthew segun for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:56:48', 1, 140630, 'ogbaji', '', 0, 0, 0, 0),
(10, 0, 'Transaction', 'matthew segun', '08032318588', '', 'Thank you Matthew segun for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 17:56:48', 1, 140630, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(11, 0, 'Transaction', 'matthew segun', '08032318588', 'zentel', 'Thank you Matthew segun for buying zentel from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 18:17:36', 1, 140630, 'ogbaji', '', 0, 0, 0, 0),
(12, 0, 'Transaction', 'matthew segun', '08032318588', '', 'Thank you Matthew segun for buying zentel from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-06-30 18:17:36', 1, 140630, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(13, 0, 'Transaction', 'bolanle_supo', '08054704146', 'lipitol', 'Thank you Bolanle_supo for buying lipitol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-01 08:37:33', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(14, 0, 'Transaction', '', '08032318588,08038578508,', '', 'we have a new product', '2014-07-01 08:42:44', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(15, 0, 'Transaction', 'james', '08032318588', 'Vitamin C', 'Thank you James for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-01 09:58:11', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(16, 0, 'Transaction', 'james', '08032318588', 'Coatem', 'Thank you James for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-01 09:59:26', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(17, 0, 'Transaction', 'james', '08032318588', 'Coatem', 'Thank you James for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-01 09:59:59', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(18, 0, 'Transaction', 'james', '08032318588', 'zentel', 'Thank you James for buying zentel from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-01 12:03:06', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(19, 0, 'Transaction', 'mrs bello', '08038578508', 'lipitol', 'Thank you Mrs bello for buying lipitol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-01 12:04:27', 1, 140701, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(20, 0, 'Transaction', 'bolanle_supo', '08054704146', 'panadol', 'Thank you Bolanle_supo for buying panadol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-07 17:16:47', 1, 140707, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(21, 0, 'Transaction', 'salamatu', '08032318588', 'Vitamin C', 'Thank you Salamatu for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-07 17:29:31', 1, 140707, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(22, 0, 'Transaction', 'salamatu', '08032318588', 'Vitamin C', 'Thank you Salamatu for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-07 17:30:48', 1, 140707, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(23, 0, 'Transaction', 'segun_oni', '08054704146', 'Coatem', 'Thank you Segun_oni for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-07 17:40:15', 1, 140707, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(24, 0, 'Transaction', 'segun_oni', '08054704146', 'lipitol', 'Thank you Segun_oni for buying lipitol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-07 17:40:38', 1, 140707, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(25, 0, 'Transaction', 'segun_oni', '08054704146', 'paracetamol', 'Thank you Segun_oni for buying paracetamol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-07 17:44:17', 1, 140707, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(26, 0, 'Transaction', '', '', 'maladrin', 'Thank you  for buying maladrin from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:00:31', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(27, 0, 'Transaction', '', '', 'maladrin', 'Thank you  for buying maladrin from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:01:00', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(28, 0, 'Transaction', '', '', 'maladrin', 'Thank you  for buying maladrin from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:02:23', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(29, 0, 'Transaction', '', '', 'Vitamin C', 'Thank you  for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:03:31', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(30, 0, 'Transaction', 'sunday_bewaji', '08054704146', 'Vitamin C', 'Thank you Sunday_bewaji for buying Vitamin C from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:05:06', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(31, 0, 'Transaction', 'sunday_bewaji', '08054704146', 'Coatem', 'Thank you Sunday_bewaji for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:05:46', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(32, 0, 'Transaction', 'sunday_bewaji', '08054704146', 'Coatem', 'Thank you Sunday_bewaji for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 16:07:16', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(33, 0, 'Transaction', 'sunsay', '', 'Bentazol', 'Thank you Sunsay for buying Bentazol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 19:38:55', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(34, 0, 'Transaction', 'salamatu', '08054704146', 'Bentazol', 'Thank you Salamatu for buying Bentazol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 19:39:31', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(35, 0, 'Transaction', 'james bulus', '08054704146', 'Bentazol', 'Thank you James bulus for buying Bentazol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 19:40:00', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(36, 0, 'Transaction', 'godwin ogbaji John', '08032318588', 'Bentazol', 'Thank you Godwin ogbaji John for buying Bentazol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-08 19:40:32', 1, 140708, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(37, 0, 'Transaction', 'mama wale', '08054704146', 'Coatem', 'Thank you Mama wale for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-09 11:04:44', 1, 140709, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(38, 0, 'Transaction', 'mama wale', '08054704146', 'Coatem', 'Thank you Mama wale for buying Coatem from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-12 07:54:57', 1, 140712, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(39, 0, 'Transaction', 'mama wale', '08054704146', '', 'Thank you Mama wale for buying  from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-12 07:55:04', 1, 140712, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(40, 0, 'Transaction', 'segun_oni', '08054704146', 'paradana', 'Thank you Segun_oni for buying paradana from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-12 11:11:55', 1, 140712, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(41, 0, 'Transaction', 'salamatu', '08054704146', 'panadol', 'Thank you Salamatu for buying panadol from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-12 11:19:13', 1, 140712, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(42, 0, 'Transaction', 'salamatu', '08054704146', 'maladrin', 'Thank you Salamatu for buying maladrin from Trenet. We appreciate your patronage, hope to see you again. Our hotline is 08032318588', '2014-07-12 11:19:26', 1, 140712, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(43, 0, 'Transaction', 'mercy james', '08032318588', 'Coatem', 'Thank you Mercy james for buying Coatem from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-14 20:14:33', 1, 140714, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(44, 0, 'Transaction', '', '08032318588,08032318588,', '', 'i love u', '2014-07-14 20:16:23', 1, 140714, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(45, 0, 'Transaction', 'mercy james', '08032318588', 'lipitol', 'Thank you Mercy james for buying lipitol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-14 20:18:06', 1, 140714, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(46, 0, 'Transaction', 'mercy james', '08032318588', 'panadol', 'Thank you Mercy james for buying panadol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-14 20:18:31', 1, 140714, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(47, 0, 'Transaction', 'godwin ogbaji John', '08032318588', 'panadol', 'Thank you Godwin ogbaji John for buying panadol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-15 07:43:11', 1, 140715, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(48, 0, 'Transaction', 'godwin ogbaji John', '08032318588', 'maladrin', 'Thank you Godwin ogbaji John for buying maladrin from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-15 07:44:15', 1, 140715, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(49, 0, 'Transaction', 'bolanle_supo', '08054704146', 'Coatem', 'Thank you Bolanle_supo for buying Coatem from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 09:17:37', 1, 140716, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(50, 0, 'Transaction', 'bolanle_supo', '08054704146', 'paracetamol', 'Thank you Bolanle_supo for buying paracetamol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 09:18:39', 1, 140716, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(51, 0, 'Transaction', 'bolanle_supo', '08054704146', 'Prevenar 13', 'Thank you Bolanle_supo for buying Prevenar 13 from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 09:18:58', 1, 140716, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(52, 0, 'Transaction', 'bolanle_supo', '08054704146', 'panadol', 'Thank you Bolanle_supo for buying panadol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 09:20:04', 1, 140716, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(53, 0, 'Transaction', 'bolanle_supo', '08054704146', 'panadol', 'Thank you Bolanle_supo for buying panadol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 09:20:34', 1, 140716, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(54, 0, 'Transaction', 'mama wale', '08054704146', 'paracetamol', 'Thank you Mama wale for buying paracetamol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 09:49:35', 1, 140716, 'ogbaji', 'Not Sent', 0, 0, 0, 0),
(55, 0, 'Transaction', 'bolanle_supo', '08054704146', 'Bentazol', 'Thank you Bolanle_supo for buying Bentazol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-16 15:26:30', 1, 140716, 'ogbaji', 'Sent', 0, 0, 0, 0),
(56, 0, 'Transaction', 'mama_wale', '08032318588', 'Bentazol', 'Thank you Mama_wale for buying Bentazol from LumenCristi.We appreciate your patronage,hope to see you again.Our hotline is 08034100823', '2014-07-23 14:06:54', 1, 140723, 'ogbaji', 'Not Sent', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `des` varchar(300) NOT NULL,
  `qty` int(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `sprice` int(30) NOT NULL,
  `price` int(10) NOT NULL,
  `amount` int(30) NOT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `other` varchar(2000) NOT NULL,
  `cat` varchar(20) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `tno` int(5) NOT NULL,
  `xm` int(5) NOT NULL,
  `xy` int(5) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sn`, `item`, `des`, `qty`, `cp`, `sprice`, `price`, `amount`, `rep`, `created`, `today`, `other`, `cat`, `dd`, `mm`, `yy`, `ww`, `tno`, `xm`, `xy`) VALUES
(1, 'paracetamol', 'cards of 500mg paracetamol from emzor', 5070, 500, 50, 60, 0, 'ogbaji', '2014-07-16 09:49:34', 140630, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(2, 'panadol', 'cards of 500mg panadol from emzor', 3482, 300, 140, 190, 0, 'ogbaji', '2014-07-16 09:20:34', 140630, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(3, 'lipitol', 'cards of lipitol from pfizer', 568, 50, 580, 720, 0, 'ogbaji', '2014-07-14 20:18:06', 140630, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(4, 'Vitamin C', 'cards of vitamin C from Emzor', 59, 40, 50, 60, 0, 'ogbaji', '2014-07-08 16:05:06', 140630, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(5, 'zentel', 'caps of zentel from dana', 423, 30, 180, 200, 0, 'ogbaji', '2014-07-08 13:35:36', 140630, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(6, 'Coatem', 'packs of coatem tabs', 40, 30, 650, 960, 0, 'ogbaji', '2014-07-16 09:27:02', 140630, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(7, 'Prevenar 13', 'pain reliever from pfizer', 198, 20, 850, 980, 0, 'ogbaji', '2014-07-16 09:18:58', 140707, '', 'Drugs', 0, 0, 0, 0, 0, 0, 0),
(8, 'Phensic', 'phensic from dana', 500, 50, 100, 120, 0, 'ogbaji', '2014-07-07 20:00:24', 140707, '', 'Drugs', 7, 7, 14, 28, 0, 0, 0),
(9, 'paradana', 'paracetamol from dana', 483, 50, 70, 100, 0, 'ogbaji', '2014-07-12 11:11:55', 140707, '', 'Drugs', 7, 7, 14, 28, 0, 0, 0),
(11, 'maladrin', 'maladrin', 15, 50, 200, 250, 0, 'ogbaji', '2014-07-15 07:44:15', 140707, '', 'Drugs', 7, 7, 14, 28, 0, 5, 2014),
(13, 'Bentazol', 'bentazol from emzor', -17, 5, 1600, 1900, 0, 'ogbaji', '2014-07-23 14:06:54', 140708, '', 'Drugs', 8, 7, 14, 28, 0, 4, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `stockup`
--

CREATE TABLE IF NOT EXISTS `stockup` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL,
  `nqty` int(20) NOT NULL,
  `sprice` int(20) NOT NULL,
  `nprice` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rep` varchar(20) NOT NULL,
  `today` int(10) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `xm` int(5) NOT NULL,
  `xy` int(5) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `stockup`
--

INSERT INTO `stockup` (`sn`, `item`, `des`, `nqty`, `sprice`, `nprice`, `created`, `rep`, `today`, `dd`, `mm`, `yy`, `ww`, `xm`, `xy`) VALUES
(1, 'paracetamol', '', 6000, 50, 60, '2014-07-08 10:37:36', 'ogbaji', 0, 0, 0, 0, 0, 8, 2023),
(2, 'panadol', '', 3000, 120, 150, '2014-07-08 10:36:57', 'ogbaji', 0, 0, 0, 0, 0, 7, 2022),
(3, 'lipitol', '', 200, 500, 600, '2014-07-08 10:36:16', 'ogbaji', 0, 0, 0, 0, 0, 6, 2021),
(4, 'Vitamin C', '', 500, 50, 60, '2014-07-08 10:35:37', 'ogbaji', 0, 0, 0, 0, 0, 5, 2020),
(5, 'zentel', '', 360, 200, 240, '2014-07-08 10:33:52', 'ogbaji', 0, 0, 0, 0, 0, 4, 2019),
(6, 'Coatem', '', 300, 650, 960, '2014-07-07 22:22:02', 'ogbaji', 0, 0, 0, 0, 0, 3, 2015),
(7, 'lipitol', '', 50, 550, 650, '2014-07-07 21:14:46', 'ogbaji', 0, 0, 0, 0, 0, 4, 2018),
(8, 'panadol', '', 50, 140, 190, '2014-07-07 21:14:51', 'ogbaji', 0, 0, 0, 0, 0, 4, 2018),
(9, 'zentel', '', 20, 180, 200, '2014-07-07 21:14:56', 'ogbaji', 0, 30, 6, 14, 0, 2, 2018),
(11, 'Coatem', '', 50, 650, 960, '2014-07-07 21:15:09', 'ogbaji', 0, 1, 7, 14, 0, 4, 2016),
(12, 'lipitol', '', 300, 580, 720, '2014-07-07 21:15:13', 'ogbaji', 0, 1, 7, 14, 0, 5, 2016),
(13, 'paracetamol', '', 50, 50, 60, '2014-07-07 21:15:19', 'ogbaji', 0, 2, 7, 14, 0, 6, 2015),
(14, 'Prevenar 13', '', 200, 850, 980, '2014-07-08 10:45:03', 'ogbaji', 0, 0, 0, 0, 0, 7, 2014),
(15, 'Phensic', '', 500, 100, 120, '2014-07-07 21:11:18', 'ogbaji', 140707, 7, 7, 14, 28, 5, 2014),
(16, 'paradana', '', 500, 70, 100, '2014-07-07 21:15:24', 'ogbaji', 140707, 7, 7, 14, 28, 5, 2017),
(18, 'maladrin', '', 500, 200, 250, '2014-07-07 21:10:09', 'ogbaji', 140707, 7, 7, 14, 28, 5, 2014),
(20, 'panadol', '', 500, 140, 190, '2014-07-08 13:33:42', 'ogbaji', 0, 8, 7, 14, 0, 5, 2018),
(21, 'zentel', '', 50, 180, 200, '2014-07-08 13:35:36', 'ogbaji', 0, 8, 7, 14, 0, 12, 2018),
(22, 'lipitol', '', 50, 580, 720, '2014-07-08 13:50:19', 'ogbaji', 0, 8, 7, 14, 0, 10, 2021),
(23, 'Coatem', '', 20, 650, 960, '2014-07-08 16:06:38', 'ogbaji', 0, 8, 7, 14, 28, 10, 2019),
(24, 'Bentazol', 'bentazol from emzor', 20, 1600, 1900, '2014-07-08 19:38:02', 'ogbaji', 140708, 8, 7, 14, 28, 4, 2019),
(25, 'paracetamol', '', 50, 50, 60, '2014-07-09 10:57:18', 'ogbaji', 0, 9, 7, 14, 28, 6, 2018),
(26, 'paracetamol', '', -500, 50, 60, '2014-07-09 11:02:50', 'ogbaji', 0, 9, 7, 14, 28, 10, 2022),
(27, 'Bentazol', '', 5, 1600, 1900, '2014-07-14 20:31:47', 'ogbaji', 0, 14, 7, 14, 29, 8, 2017),
(28, 'paracetamol', '', 4, 50, 60, '2014-07-15 07:51:15', 'ogbaji', 0, 15, 7, 14, 29, 8, 2016),
(29, 'Coatem', '', 25, 650, 960, '2014-07-16 09:27:02', 'ogbaji', 0, 16, 7, 14, 29, 6, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `regno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE IF NOT EXISTS `transact` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `des` varchar(300) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `qty` int(30) NOT NULL,
  `price` int(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `cash` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `rep` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `today` int(30) NOT NULL,
  `other` varchar(2000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`sn`, `id`, `name`, `phone`, `item`, `des`, `cat`, `qty`, `price`, `amount`, `cash`, `balance`, `rep`, `created`, `today`, `other`, `status`, `dd`, `mm`, `yy`, `ww`) VALUES
(1, 1, 'godwin ogbaji John', '08032318588', 'Coatem', 'packs of coatem tabs', '', 2, 960, 1920, 1920, 0, 'ogbaji', '2014-07-10 10:34:55', 140630, '', '', 0, 0, 0, 27),
(2, 1, 'godwin ogbaji John', '08032318588', 'paracetamol', 'cards of 500mg paracetamol from emzor', '', 5, 60, 300, 0, 0, 'ogbaji', '2014-07-10 10:34:50', 140630, '', '', 0, 0, 0, 26),
(3, 26, 'matthew segun', '08032318588', 'panadol', 'cards of 500mg panadol from emzor', '', 5, 150, 750, 0, 0, 'ogbaji', '2014-07-10 10:34:43', 140630, '', '', 0, 0, 0, 25),
(4, 26, 'matthew segun', '08032318588', 'paracetamol', 'cards of 500mg paracetamol from emzor', '', 4, 60, 240, 0, 0, 'ogbaji', '2014-07-10 10:34:36', 140630, '', '', 0, 0, 0, 26),
(5, 26, 'matthew segun', '08032318588', 'Vitamin C', 'cards of vitamin C from Emzor', '', 25, 60, 1500, 0, 0, 'ogbaji', '2014-07-10 10:34:30', 140630, '', '', 0, 0, 0, 26),
(6, 26, 'matthew segun', '08032318588', 'zentel', 'caps of zentel from dana', 'zentel', 5, 240, 1200, 0, 0, 'ogbaji', '2014-07-12 10:49:24', 140630, '', '', 6, 6, 14, 26),
(7, 2, 'bolanle_supo', '08054704146', 'lipitol', 'cards of lipitol from pfizer', '', 2, 650, 1300, 0, 0, 'ogbaji', '2014-07-10 10:34:18', 140701, '', '', 0, 0, 0, 26),
(8, 27, 'james', '08032318588', 'Vitamin C', 'cards of vitamin C from Emzor', '', 6, 70, 420, 0, 0, 'ogbaji', '2014-07-10 10:34:05', 140701, '', '', 0, 0, 0, 27),
(9, 27, 'james', '08032318588', 'Coatem', 'packs of coatem tabs', '', 10, 960, 9600, 0, 0, 'ogbaji', '2014-07-10 10:34:00', 140701, '', '', 0, 0, 0, 25),
(10, 27, 'james', '08032318588', 'Coatem', 'packs of coatem tabs', '', 5, 960, 4800, 0, 0, 'ogbaji', '2014-07-10 10:33:55', 140701, '', '', 0, 0, 0, 26),
(11, 27, 'james', '08032318588', 'zentel', 'caps of zentel from dana', 'Zentel', 2, 200, 400, 0, 0, 'ogbaji', '2014-07-12 10:51:15', 140701, '', '', 13, 7, 14, 26),
(12, 25, 'mrs bello', '08038578508', 'lipitol', 'cards of lipitol from pfizer', '', 10, 750, 7500, 0, 0, 'ogbaji', '2014-07-10 10:33:40', 140701, '', '', 0, 0, 0, 27),
(13, 2, 'bolanle_supo', '08054704146', 'panadol', 'cards of 500mg panadol from emzor', '', 20, 190, 3800, 0, 0, 'ogbaji', '2014-07-07 17:16:47', 140707, '', '', 7, 7, 14, 28),
(14, 3, 'salamatu', '08032318588', 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 10, 60, 600, 0, 0, 'ogbaji', '2014-07-07 17:29:31', 140707, '', '', 7, 7, 14, 28),
(15, 3, 'salamatu', '08032318588', 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 10, 60, 600, 0, 0, 'ogbaji', '2014-07-07 17:30:48', 140707, '', '', 7, 7, 14, 28),
(16, 4, 'segun_oni', '08054704146', 'Coatem', 'packs of coatem tabs', 'Coatem', 2, 960, 1920, 0, 0, 'ogbaji', '2014-07-07 17:40:15', 140707, '', '', 7, 7, 14, 28),
(17, 4, 'segun_oni', '08054704146', 'lipitol', 'cards of lipitol from pfizer', 'lipitol', 2, 720, 1440, 0, 0, 'ogbaji', '2014-07-07 17:40:38', 140707, '', '', 7, 7, 14, 28),
(18, 4, 'segun_oni', '08054704146', 'paracetamol', 'cards of 500mg paracetamol from emzor', 'paracetamol', 500, 60, 30000, 0, 0, 'ogbaji', '2014-07-07 17:44:17', 140707, '', '', 7, 7, 14, 28),
(19, 4, 'segun_oni', '', 'maladrin', 'maladrin', 'maladrin', 410, 250, 102500, 0, 0, 'ogbaji', '2014-07-08 18:55:09', 140708, '', '', 8, 7, 14, 28),
(20, 4, 'segun_oni', '', 'maladrin', 'maladrin', 'maladrin', 42, 250, 10500, 0, 0, 'ogbaji', '2014-07-08 18:55:13', 140708, '', '', 8, 7, 14, 28),
(21, 4, 'segun_oni', '', 'maladrin', 'maladrin', 'maladrin', 25, 250, 6250, 0, 0, 'ogbaji', '2014-07-08 18:55:18', 140708, '', '', 8, 7, 14, 28),
(22, 4, 'segun_oni', '', 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 350, 60, 21000, 0, 0, 'ogbaji', '2014-07-08 18:55:30', 140708, '', '', 8, 7, 14, 28),
(23, 5, 'sunday_bewaji', '08054704146', 'Vitamin C', 'cards of vitamin C from Emzor', 'Vitamin C', 40, 60, 2400, 0, 0, 'ogbaji', '2014-07-08 16:05:06', 140708, '', '', 8, 7, 14, 28),
(24, 5, 'sunday_bewaji', '08054704146', 'Coatem', 'packs of coatem tabs', 'Coatem', 320, 960, 307200, 0, 0, 'ogbaji', '2014-07-08 16:05:46', 140708, '', '', 8, 7, 14, 28),
(25, 5, 'sunday_bewaji', '08054704146', 'Coatem', 'packs of coatem tabs', 'Coatem', 10, 960, 9600, 0, 0, 'ogbaji', '2014-07-08 16:07:16', 140708, '', '', 8, 7, 14, 28),
(26, 6, 'sunsay', '', 'Bentazol', 'bentazol from emzor', 'Bentazol', 12, 1900, 22800, 0, 0, 'ogbaji', '2014-07-08 19:38:55', 140708, '', '', 8, 7, 14, 28),
(27, 7, 'salamatu', '08054704146', 'Bentazol', 'bentazol from emzor', 'Bentazol', 4, 1900, 7600, 0, 0, 'ogbaji', '2014-07-08 19:39:31', 140708, '', '', 8, 7, 14, 28),
(28, 10, 'james bulus', '08054704146', 'Bentazol', 'bentazol from emzor', 'Bentazol', 3, 1900, 5700, 0, 0, 'ogbaji', '2014-07-08 19:40:00', 140708, '', '', 8, 7, 14, 28),
(29, 1, 'godwin ogbaji John', '08032318588', 'Bentazol', 'bentazol from emzor', 'Bentazol', 1, 1900, 1900, 0, 0, 'ogbaji', '2014-07-08 19:40:32', 140708, '', '', 8, 7, 14, 28),
(30, 12, 'mama wale', '08054704146', 'Coatem', 'packs of coatem tabs', 'Coatem', 1, 960, 960, 0, 0, 'ogbaji', '2014-07-12 10:53:25', 140709, '', '', 9, 8, 14, 28),
(31, 12, 'mama wale', '08054704146', 'Coatem', 'packs of coatem tabs', 'Coatem', 1, 960, 960, 0, 0, 'ogbaji', '2014-07-12 10:53:17', 140712, '', '', 12, 6, 14, 28),
(32, 12, 'mama wale', '08054704146', '', '', '', 0, 0, 0, 0, 0, 'ogbaji', '2014-07-12 07:55:04', 140712, '', '', 12, 7, 14, 28),
(33, 4, 'segun_oni', '08054704146', 'paradana', 'paracetamol from dana', 'paradana', 12, 100, 1200, 0, 0, 'ogbaji', '2014-07-12 11:11:55', 140712, '', '', 12, 7, 14, 28),
(34, 7, 'salamatu', '08054704146', 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 5, 190, 950, 0, 0, 'ogbaji', '2014-07-12 11:19:13', 140712, '', '', 12, 7, 14, 28),
(35, 7, 'salamatu', '08054704146', 'maladrin', 'maladrin', 'maladrin', 3, 250, 750, 0, 0, 'ogbaji', '2014-07-12 11:19:26', 140712, '', '', 12, 7, 14, 28),
(36, 28, 'mercy james', '08032318588', 'Coatem', 'packs of coatem tabs', 'Coatem', 2, 960, 1920, 0, 0, 'ogbaji', '2014-07-14 20:14:33', 140714, '', '', 14, 7, 14, 29),
(37, 28, 'mercy james', '08032318588', 'lipitol', 'cards of lipitol from pfizer', 'lipitol', 4, 720, 2880, 0, 0, 'ogbaji', '2014-07-14 20:18:06', 140714, '', '', 14, 7, 14, 29),
(38, 28, 'mercy james', '08032318588', 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 4, 190, 760, 0, 0, 'ogbaji', '2014-07-14 20:18:31', 140714, '', '', 14, 7, 14, 29),
(39, 1, 'godwin ogbaji John', '08032318588', 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 4, 190, 760, 0, 0, 'ogbaji', '2014-07-15 07:43:11', 140715, '', '', 15, 7, 14, 29),
(40, 1, 'godwin ogbaji John', '08032318588', 'maladrin', 'maladrin', 'maladrin', 5, 250, 1250, 0, 0, 'ogbaji', '2014-07-15 07:44:15', 140715, '', '', 15, 7, 14, 29),
(41, 2, 'bolanle_supo', '08054704146', 'Coatem', 'packs of coatem tabs', 'Coatem', 2, 960, 1920, 0, 0, 'ogbaji', '2014-07-16 09:17:37', 140716, '', '', 16, 7, 14, 29),
(42, 2, 'bolanle_supo', '08054704146', 'paracetamol', 'cards of 500mg paracetamol from emzor', 'paracetamol', 10, 60, 600, 0, 0, 'ogbaji', '2014-07-16 09:18:39', 140716, '', '', 16, 7, 14, 29),
(43, 2, 'bolanle_supo', '08054704146', 'Prevenar 13', 'pain reliever from pfizer', 'Prevenar 13', 2, 980, 1960, 0, 0, 'ogbaji', '2014-07-16 09:18:58', 140716, '', '', 16, 7, 14, 29),
(44, 2, 'bolanle_supo', '08054704146', 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 0, 0, 0, 0, 0, 'ogbaji', '2014-07-16 09:20:04', 140716, '', '', 16, 7, 14, 29),
(45, 2, 'bolanle_supo', '08054704146', 'panadol', 'cards of 500mg panadol from emzor', 'panadol', 5, 0, 0, 0, 0, 'ogbaji', '2014-07-16 09:20:34', 140716, '', '', 16, 7, 14, 29),
(46, 12, 'mama wale', '08054704146', 'paracetamol', 'cards of 500mg paracetamol from emzor', 'paracetamol', 6, 60, 360, 0, 0, 'ogbaji', '2014-07-16 09:49:34', 140716, '', '', 16, 7, 14, 29),
(47, 2, 'bolanle_supo', '08054704146', 'Bentazol', 'bentazol from emzor', 'Bentazol', 1, 1900, 1900, 0, 0, 'ogbaji', '2014-07-16 15:26:26', 140716, '', '', 16, 7, 14, 29),
(48, 13, 'mama_wale', '08032318588', 'Bentazol', 'bentazol from emzor', 'Bentazol', 20, 1900, 38000, 0, 0, 'ogbaji', '2014-07-23 14:06:54', 140723, '', '', 23, 7, 14, 30);

-- --------------------------------------------------------

--
-- Table structure for table `unstock`
--

CREATE TABLE IF NOT EXISTS `unstock` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `qty` int(20) NOT NULL,
  `cost` int(20) NOT NULL,
  `worth` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rep` varchar(20) NOT NULL,
  `dd` int(2) NOT NULL,
  `mm` int(2) NOT NULL,
  `yy` int(4) NOT NULL,
  `ww` int(5) NOT NULL,
  `xm` int(10) NOT NULL,
  `xy` int(10) NOT NULL,
  `reason` varchar(500) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `unstock`
--

INSERT INTO `unstock` (`sn`, `item`, `qty`, `cost`, `worth`, `created`, `rep`, `dd`, `mm`, `yy`, `ww`, `xm`, `xy`, `reason`) VALUES
(1, 'paracetamol', 3, 50, 150, '2014-07-09 16:36:28', 'ogbaji', 9, 7, 14, 28, 1, 2014, 'it fell off from the shelf and broke'),
(2, 'panadol', 25, 150, 3750, '2014-07-09 16:37:47', 'ogbaji', 9, 7, 14, 28, 4, 2014, 'they expired'),
(3, 'lipitol', 6, 580, 3480, '2014-07-10 09:30:00', 'ogbaji', 10, 7, 14, 28, 8, 2013, 'expired'),
(4, 'lipitol', 8, 580, 4640, '2014-07-12 10:06:07', 'ogbaji', 12, 7, 14, 28, 5, 2014, 'expiry'),
(5, 'paradana', 5, 70, 350, '2014-07-12 10:08:26', 'ogbaji', 12, 7, 14, 28, 5, 2014, 'expired'),
(6, 'Bentazol', 1, 1600, 1600, '2014-07-14 20:33:16', 'ogbaji', 14, 7, 14, 29, 1, 2014, 'broken bottle'),
(7, 'paracetamol', 6, 50, 300, '2014-07-16 09:28:39', 'ogbaji', 16, 7, 14, 29, 2, 2014, 'expired');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
