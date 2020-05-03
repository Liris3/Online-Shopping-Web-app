-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-12-06 02:45:26
-- 服务器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- 数据库： `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `items`
--

CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_price` varchar(10) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `items`
--

INSERT INTO `items` (`item_ID`, `item_name`, `item_price`, `img`) VALUES
(1, 'Iphone XS', '999', 'Iphone XS.jpg'),
(2, 'Samsung S10+', '1219', 'Samsung Galaxy S10+.jpg'),
(3, 'Samsung Note 10+', '959', 'Samsung Galaxy Note 10+.jpg'),
(4, 'Google Pixel 3a XL', '499', 'Google Pixel 3a XL.jpg'),
(5, 'Google Pixel 4', '749', 'Google Pixel 4.jpg'),
(6, 'huawei p30', '899', 'huawei p30.jpg'),
(7, 'huawei p30 pro', '1099', 'huawei p30 pro.jpg'),
(8, 'iphone xs max', '1099', 'iphone xs max.jpg'),
(9, 'iphone 11 pro max', '1379', 'iphone 11 pro max.jpg'),
(10, 'iphone xr', '799', 'iphone xr.jpg'),
(11, 'Samsung Note 9', '799', 'Samsung Galaxy Note 9.jpg'),
(12, 'blackberry key2 le', '598', 'blackberry key2 le.jpg');

--
-- 转储表的索引
--

--
-- 表的索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_ID`);

--
--

--
--
ALTER TABLE `items`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

