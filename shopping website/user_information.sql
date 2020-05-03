-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-12-06 02:45:42
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
-- 表的结构 `user_information`
--

CREATE TABLE `user_information` (
  `User_ID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_information`
--

INSERT INTO `user_information` (`User_ID`, `username`, `password`) VALUES
(11, 'qq', '112'),
(10, '123', '$2y$10$88H6.SFs8AQwf/huRMaLVOQkUiHXH3iRTpXlKRbPLwe9rU6gsd7AS'),
(12, 'testing', '$2y$10$kQYO4t2LP6kDZl4DZXTI7.OCinx7rwQMM5CBZYH0YQj9wLbElRU2W'),
(13, 'test', '$2y$10$tA2XphumWH3i5P1a3Ixt9e4DtNBMLsR4YOg5HwWbLGapfiYdrDIQ6'),
(14, 'testuser1', '$2y$10$y/4Z8uErgmg8n3PcbAcEGuur99X0Bx5irOnzbYA2j10AYVfgBYlLa'),
(15, 'newtest2', '$2y$10$YNR5XCx0L7.5PVH3EMx1juyANVAERqmphua8mKDCYiKwk8XmFKZ7u'),
(16, '1', '$2y$10$/qQB3BhK9S5IkYMCps3ziuV2u7jcaqXynFKcuocg19KqqvZl301U2'),
(17, 'test001', '$2y$10$tu5fi4bVdUWMMoinMsbPTuN6LV72wa0cyQh4qp3/nryj5ZyNWxMVy'),
(18, 'phpuser', '$2y$10$qw9LE1XrWjuUVLb3574P2e8HmnWfVbnXOGCJ4dpQ8vvvqXB7npymy');

--
-- 转储表的索引
--

--
-- 表的索引 `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`User_ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `user_information`
--
ALTER TABLE `user_information`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
