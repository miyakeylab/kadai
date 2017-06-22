-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 6 月 22 日 23:38
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db48`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_07_black_list_table`
--

CREATE TABLE IF NOT EXISTS `gs_07_black_list_table` (
  `user_id` int(12) NOT NULL COMMENT 'ユーザーID',
  `reason` text COLLATE utf8_unicode_ci,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_07_black_list_table`
--

INSERT INTO `gs_07_black_list_table` (`user_id`, `reason`, `add_time`) VALUES
(1, '借りパク', '2017-06-08 02:28:21'),
(3, '本の破損など', '2017-06-08 02:29:07');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_07_book_okini_table`
--

CREATE TABLE IF NOT EXISTS `gs_07_book_okini_table` (
`id` int(12) NOT NULL COMMENT 'お気に入りID',
  `user_id` int(12) NOT NULL COMMENT 'ユーザーID',
  `book_id` int(12) NOT NULL COMMENT '本ID',
  `add_time` datetime NOT NULL COMMENT '追加時間'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_07_book_okini_table`
--

INSERT INTO `gs_07_book_okini_table` (`id`, `user_id`, `book_id`, `add_time`) VALUES
(5, 1, 1, '2017-06-08 04:44:19'),
(6, 1, 3, '2017-06-08 04:44:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_07_book_rental_table`
--

CREATE TABLE IF NOT EXISTS `gs_07_book_rental_table` (
`rental_id` int(12) NOT NULL COMMENT 'レンタルID',
  `user_id` int(12) NOT NULL COMMENT 'ユーザーID',
  `book_key_id` int(12) NOT NULL COMMENT '本ID(keyId)',
  `rental_start_date` date NOT NULL COMMENT 'レンタル日付',
  `rental_end_date` date NOT NULL COMMENT '返却日付',
  `rental_flg` tinyint(1) NOT NULL COMMENT 'レンタルフラグ',
  `add_time` datetime NOT NULL COMMENT '追加時間'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_07_book_rental_table`
--

INSERT INTO `gs_07_book_rental_table` (`rental_id`, `user_id`, `book_key_id`, `rental_start_date`, `rental_end_date`, `rental_flg`, `add_time`) VALUES
(1, 1, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:17:42'),
(2, 2, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:20:38'),
(3, 3, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(4, 4, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(5, 5, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(6, 6, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(7, 7, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(8, 8, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(9, 9, 3, '2017-06-08', '2017-06-15', 1, '2017-06-08 03:22:48'),
(10, 1, 9, '2017-06-01', '2017-06-08', 1, '2017-06-08 03:24:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_07_book_table`
--

CREATE TABLE IF NOT EXISTS `gs_07_book_table` (
`id` int(12) NOT NULL COMMENT 'ID',
  `book_id` int(12) NOT NULL COMMENT '本ID',
  `book_title` text COLLATE utf8_unicode_ci NOT NULL COMMENT '本タイトル',
  `reg_time` datetime NOT NULL COMMENT '登録時間'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_07_book_table`
--

INSERT INTO `gs_07_book_table` (`id`, `book_id`, `book_title`, `reg_time`) VALUES
(1, 1, '本1', '2017-06-08 02:42:15'),
(4, 2, '本2', '2017-06-08 02:44:39'),
(8, 3, '本3', '2017-06-08 02:44:39'),
(9, 4, '本4', '2017-06-08 02:44:39'),
(10, 5, '本5', '2017-06-08 02:44:39'),
(11, 6, '本6', '2017-06-08 02:44:39'),
(12, 7, '本7', '2017-06-08 02:44:39'),
(13, 8, '本8', '2017-06-08 02:44:39'),
(14, 9, '本9', '2017-06-08 02:44:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_07_book_zaiko_table`
--

CREATE TABLE IF NOT EXISTS `gs_07_book_zaiko_table` (
`id` int(12) NOT NULL,
  `book_id` int(12) NOT NULL,
  `rental_flg` tinyint(1) NOT NULL,
  `reg_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_07_book_zaiko_table`
--

INSERT INTO `gs_07_book_zaiko_table` (`id`, `book_id`, `rental_flg`, `reg_time`) VALUES
(1, 1, 0, '2017-06-08 02:53:27'),
(2, 1, 0, '2017-06-08 02:54:29'),
(3, 1, 0, '2017-06-08 02:54:29'),
(4, 1, 0, '2017-06-08 02:54:29'),
(5, 1, 0, '2017-06-08 02:54:29'),
(6, 1, 0, '2017-06-08 02:54:29'),
(7, 1, 0, '2017-06-08 02:54:29'),
(8, 1, 0, '2017-06-08 02:54:29'),
(9, 2, 0, '2017-06-08 02:54:29'),
(10, 2, 0, '2017-06-08 02:54:29'),
(11, 2, 0, '2017-06-08 02:54:29'),
(12, 2, 0, '2017-06-08 02:54:29'),
(13, 2, 0, '2017-06-08 02:54:29'),
(14, 2, 0, '2017-06-08 02:54:29'),
(15, 3, 1, '2017-06-08 02:55:04'),
(16, 3, 1, '2017-06-08 02:55:43'),
(17, 3, 1, '2017-06-08 02:55:43'),
(18, 3, 1, '2017-06-08 02:55:43'),
(19, 3, 1, '2017-06-08 02:55:43'),
(20, 3, 1, '2017-06-08 02:55:43'),
(21, 3, 1, '2017-06-08 02:55:43'),
(22, 3, 1, '2017-06-08 02:55:43'),
(23, 3, 1, '2017-06-08 02:55:43'),
(24, 4, 0, '2017-06-08 02:57:04'),
(25, 5, 0, '2017-06-08 02:57:04'),
(26, 6, 0, '2017-06-08 02:57:04'),
(27, 7, 0, '2017-06-08 02:57:04'),
(28, 8, 0, '2017-06-08 02:57:04'),
(29, 9, 1, '2017-06-08 02:57:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_07_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_07_user_table` (
`id` int(12) NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` text COLLATE utf8_unicode_ci NOT NULL,
  `user_age` int(3) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_07_user_table`
--

INSERT INTO `gs_07_user_table` (`id`, `user_name`, `user_mail`, `user_age`, `time`) VALUES
(1, 'Miyake', 'Miyake@test.test', 32, '2017-06-08 02:22:51'),
(2, 'test1', 'test1@test.test', 15, '2017-06-08 02:24:38'),
(3, 'test2', 'test2@test.test', 45, '2017-06-08 02:24:38'),
(4, 'test3', 'test3@test.test', 50, '2017-06-08 02:24:38'),
(5, 'test4', 'test4@test.test', 23, '2017-06-08 02:24:38'),
(6, 'test5', 'test5@test.test', 35, '2017-06-08 02:24:38'),
(7, 'test6', 'test6@test.test', 104, '2017-06-08 02:24:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_08_user_access_log_table`
--

CREATE TABLE IF NOT EXISTS `gs_08_user_access_log_table` (
`log_id` int(16) NOT NULL,
  `user_id` int(12) NOT NULL,
  `login_time` datetime NOT NULL,
  `location` geometry DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_08_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_08_user_table` (
`id` int(12) NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `reg_time` datetime NOT NULL,
  `kanri_flg` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_08_user_table`
--

INSERT INTO `gs_08_user_table` (`id`, `user_name`, `user_pass`, `reg_time`, `kanri_flg`) VALUES
(1, 'tes@tes', 'tes', '2017-06-15 10:10:51', 1),
(4, 'test2@test', 'test2', '2017-06-15 11:23:06', 0),
(5, 'tes3@tes', 'tes3', '2017-06-15 11:45:55', 0),
(6, 'tes5', 'tes5', '2017-06-20 04:39:59', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_08_user_url_table`
--

CREATE TABLE IF NOT EXISTS `gs_08_user_url_table` (
`id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_08_user_url_table`
--

INSERT INTO `gs_08_user_url_table` (`id`, `user_id`, `url`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=Cnj64DsO8T8'),
(2, 1, 'https://www.youtube.com/watch?v=GTHZCppTRqg'),
(3, 1, 'https://www.youtube.com/watch?v=tsi5-O3Qe6c'),
(4, 1, 'https://www.youtube.com/watch?v=EHfx9LXzxpw'),
(5, 1, 'https://www.youtube.com/watch?v=BUItRCnW5Lw'),
(6, 1, 'https://www.youtube.com/watch?v=AKJnR8JPX2Q'),
(7, 4, 'https://www.youtube.com/watch?v=Em-d1f55NPg'),
(8, 5, 'https://www.youtube.com/watch?v=_HdidO6MVcY'),
(9, 5, 'https://www.youtube.com/watch?v=urBmzAvkcJ0'),
(10, 5, 'https://www.youtube.com/watch?v=hHjpJUECkKM'),
(11, 1, 'https://www.youtube.com/watch?v=XKu_SEDAykw'),
(12, 1, 'https://www.youtube.com/watch?v=Z5hOZ2FrF1Q'),
(13, 1, 'https://www.youtube.com/watch?v=KdHYS2OWYW0');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_09_message_table`
--

CREATE TABLE IF NOT EXISTS `gs_09_message_table` (
`id` int(12) NOT NULL,
  `message_id` int(12) NOT NULL,
  `send_time` datetime NOT NULL,
  `user_id` int(12) NOT NULL,
  `read_flg` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_09_message_table`
--

INSERT INTO `gs_09_message_table` (`id`, `message_id`, `send_time`, `user_id`, `read_flg`) VALUES
(1, 1, '2017-06-21 07:20:18', 0, 1),
(2, 2, '2017-06-22 07:38:31', 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='2017/06/03 ';

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(1, 'Miyake123_aaa', 'miyake@test.test123_aaa', 'テストmiyake123_aaa', '2017-06-10 15:58:48'),
(2, '日付も更新', '日付も更新', '日付も更新', '2017-06-10 15:58:51'),
(3, 'test2', 'test2@test.test', 'テスト2', '2017-06-10 16:00:58'),
(4, 'test3', 'test3@test.test', 'テスト3', '2017-06-10 16:00:55'),
(6, 'test5', 'test5@test.test', 'テスト5', '2017-06-10 16:15:50'),
(10, 'ffffffff', 'aaaaa', 'aaaaa', '2017-06-10 16:07:44'),
(12, 'aa', 'aa', 'aaa', '2017-06-03 17:41:37'),
(13, 'ted', 'tedddd', 'tesssss', '2017-06-10 16:07:48'),
(14, 'test0610＿更新', '0610＿更新', '0610＿更新', '2017-06-10 16:07:52');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lwd` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lwd`, `kanri_flg`, `life_flg`) VALUES
(1, 'test', 'test', 'test', 0, 0),
(2, 'test2', 'test2', 'test2', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_07_black_list_table`
--
ALTER TABLE `gs_07_black_list_table`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `gs_07_book_okini_table`
--
ALTER TABLE `gs_07_book_okini_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_07_book_rental_table`
--
ALTER TABLE `gs_07_book_rental_table`
 ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `gs_07_book_table`
--
ALTER TABLE `gs_07_book_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_07_book_zaiko_table`
--
ALTER TABLE `gs_07_book_zaiko_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_07_user_table`
--
ALTER TABLE `gs_07_user_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_08_user_access_log_table`
--
ALTER TABLE `gs_08_user_access_log_table`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `gs_08_user_table`
--
ALTER TABLE `gs_08_user_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_08_user_url_table`
--
ALTER TABLE `gs_08_user_url_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_09_message_table`
--
ALTER TABLE `gs_09_message_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_07_book_okini_table`
--
ALTER TABLE `gs_07_book_okini_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'お気に入りID',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gs_07_book_rental_table`
--
ALTER TABLE `gs_07_book_rental_table`
MODIFY `rental_id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'レンタルID',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gs_07_book_table`
--
ALTER TABLE `gs_07_book_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gs_07_book_zaiko_table`
--
ALTER TABLE `gs_07_book_zaiko_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `gs_07_user_table`
--
ALTER TABLE `gs_07_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gs_08_user_access_log_table`
--
ALTER TABLE `gs_08_user_access_log_table`
MODIFY `log_id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gs_08_user_table`
--
ALTER TABLE `gs_08_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gs_08_user_url_table`
--
ALTER TABLE `gs_08_user_url_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gs_09_message_table`
--
ALTER TABLE `gs_09_message_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
