-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `workbank`
--

-- --------------------------------------------------------

--
-- 資料表結構 `borrow`
--

CREATE TABLE `borrow` (
  `cid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `borrow`
--

INSERT INTO `borrow` (`cid`, `pid`, `brdate`) VALUES
('666666', '002', '2018-10-09'),
('666666', '003', '0000-00-00'),
('777777', '001', '2019-08-01'),
('777777', '004', '2020-01-01'),
('888888', '001', '2019-06-04');

-- --------------------------------------------------------

--
-- 資料表結構 `branch`
--

CREATE TABLE `branch` (
  `bname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdate` date NOT NULL,
  `addr` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `branch`
--

INSERT INTO `branch` (`bname`, `bid`, `mname`, `mdate`, `addr`) VALUES
('hh分行', '00001', '王汪汪', '2019-04-14', 'ddddddd'),
('ss分行', '00002', '嘿嘿嘿', '2015-04-09', 'aaaaaaaaaa'),
('zz分行', '00003', '咳咳咳', '2019-07-07', 'aaaaaaaaaaaaaaaaaaa'),
('kkk', '00006', 'jjjj', '2019-04-14', 'hhhhhhhh'),
('eeeeee', '00009', 'eeeeeee', '2019-04-14', 'eeeeeeeeeee');

-- --------------------------------------------------------

--
-- 資料表結構 `client`
--

CREATE TABLE `client` (
  `cname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cphone` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `client`
--

INSERT INTO `client` (`cname`, `cid`, `rname`, `cphone`) VALUES
('王大大', '007788', '王小小', '0909094444'),
('王歡歡', '666666', '哈哈哈', '0953167008'),
('李剛', '777777', '老領導', '0945456666'),
('白居易', '888888', '李白', '0999111666');

-- --------------------------------------------------------

--
-- 資料表結構 `plan`
--

CREATE TABLE `plan` (
  `pname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bid` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loan` float NOT NULL DEFAULT '0',
  `payyear` float NOT NULL DEFAULT '0',
  `pphone` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `plan`
--

INSERT INTO `plan` (`pname`, `pid`, `bid`, `loan`, `payyear`, `pphone`) VALUES
('愛錢計劃', '001', '00001', 200000, 1000, '0909151315'),
('發大財', '002', '00001', 500000000, 2000, '0933464979'),
('發小財', '003', '00002', 50000, 200, '0944464979'),
('愛計劃', '004', '00002', 200000, 1000, '0909177715');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`cid`,`pid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- 資料表索引 `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bname` (`bname`),
  ADD KEY `bid` (`bid`);

--
-- 資料表索引 `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

--
-- 資料表索引 `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pname` (`pname`),
  ADD KEY `pid` (`pid`),
  ADD KEY `bid` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
