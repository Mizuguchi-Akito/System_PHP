-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-12 01:20:16
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `group`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `book`
--

CREATE TABLE `book` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `book`
--

INSERT INTO `book` (`id`, `name`, `customer_id`, `date`) VALUES
(1, '小説', NULL, NULL),
(2, '漫画', NULL, NULL),
(3, 'ビジネス本', NULL, NULL),
(4, '伝記', NULL, NULL),
(5, '絵本', NULL, NULL),
(6, '図鑑', NULL, NULL),
(7, '百科事典', NULL, NULL),
(8, '詩歌', NULL, NULL),
(9, '参考書', NULL, NULL),
(10, '哲学書', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `borrow`
--

CREATE TABLE `borrow` (
  `customer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`id`, `name`, `password`) VALUES
(1, '大原一郎', 'abc'),
(2, '中原二郎', 'def'),
(3, '小原三郎', 'ghi');

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `not_returned`
--

CREATE TABLE `not_returned` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `not_returned`
--

INSERT INTO `not_returned` (`id`, `name`, `customer_id`, `date`) VALUES
(1, '小説', NULL, NULL),
(2, '漫画', NULL, NULL),
(3, 'ビジネス本', NULL, NULL),
(4, '伝記', NULL, NULL),
(5, '絵本', NULL, NULL),
(6, '図鑑', NULL, NULL),
(7, '百科事典', NULL, NULL),
(8, '詩歌', NULL, NULL),
(9, '参考書', NULL, NULL),
(10, '哲学書', NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`customer_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`customer_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- テーブルのインデックス `not_returned`
--
ALTER TABLE `not_returned`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `not_returned`
--
ALTER TABLE `not_returned`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- テーブルの制約 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
