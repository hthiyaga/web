-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 06:10 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `web_prj` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `web_prj`;

--
-- Database: `web_prj`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_info`
--

CREATE TABLE `archive_info` (
  `arch_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `archive_action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_info`
--

INSERT INTO `archive_info` (`arch_id`, `group_id`, `archive_action`) VALUES
(6, 1, 'unarchive'),
(7, 5, 'unarchive'),
(8, 2, 'unarchive'),
(9, 3, 'unarchive'),
(10, 4, 'unarchive'),
(11, 9, 'unarchive'),
(13, 10, 'unarchive'),
(14, 11, 'unarchive');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_Timestamp`) VALUES
(146, 146, 6, 'asd', '2018-11-09 04:35:39'),
(152, 146, 6, 'asd', '2018-11-10 06:48:48'),
(153, 165, 6, 'asd', '2018-11-11 03:09:45'),
(154, 146, 6, 'zxczx', '2018-11-11 03:09:56'),
(155, 260, 20, 'zczz', '2018-11-13 02:55:58'),
(156, 313, 20, 'asd', '2018-11-13 06:23:54'),
(157, 295, 20, 'asd', '2018-11-13 06:24:06'),
(158, 295, 20, 'as', '2018-11-13 06:25:13'),
(159, 295, 20, 'a', '2018-11-13 06:25:42'),
(160, 266, 20, 'a', '2018-11-13 06:26:29'),
(161, 314, 20, 'a', '2018-11-13 06:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `privacy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `owner_id`, `privacy`) VALUES
(1, 'Global', 0, 'public'),
(2, 'Electronics', 1, 'private'),
(3, 'Music', 2, 'private'),
(4, 'Bingo', 6, 'public'),
(9, 'a', 20, 'public'),
(10, 'b', 20, 'public'),
(11, 'soccer', 6, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `post_timestamp`, `group_id`) VALUES
(140, 7, 'Is this similar to OLX?', '2018-10-16 03:04:26', 2),
(176, 4, 'amazing', '2018-11-11 04:39:08', 1),
(210, 20, 'zxc', '2018-11-12 00:03:06', 2),
(258, 20, 'asda', '2018-11-13 02:36:01', 2),
(263, 20, 'asd', '2018-11-13 02:49:13', 3),
(264, 20, 'zxc', '2018-11-13 02:51:43', 4),
(265, 20, 'asd', '2018-11-13 02:54:42', 3),
(266, 20, 'asd', '2018-11-13 02:55:14', 4),
(268, 6, 'zzzzzzzzzzzzzz', '2018-11-13 03:03:37', 2),
(276, 6, 'a', '2018-11-13 04:27:24', 2),
(279, 6, 'asdadd', '2018-11-13 04:28:07', 11),
(280, 6, 'asdaddaa', '2018-11-13 04:28:08', 11),
(281, 6, 'a', '2018-11-13 04:28:14', 11),
(282, 6, 'as', '2018-11-13 04:28:19', 11),
(290, 20, ' x', '2018-11-13 04:56:18', 9),
(291, 20, 'z', '2018-11-13 04:56:30', 9),
(292, 20, 'z', '2018-11-13 04:56:34', 9),
(293, 20, ' z', '2018-11-13 04:56:37', 9),
(294, 20, 'asd', '2018-11-13 05:11:19', 2),
(306, 20, 'zc', '2018-11-13 06:13:32', 10),
(307, 20, 'asd', '2018-11-13 06:16:33', 1),
(312, 20, 's', '2018-11-13 06:20:03', 1),
(313, 20, 'd', '2018-11-13 06:20:05', 1),
(314, 20, 'g', '2018-11-13 06:20:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
(1, 141, 'dislike'),
(1, 146, 'like'),
(2, 141, 'dislike'),
(6, 140, 'like'),
(6, 141, 'dislike'),
(6, 196, 'dislike'),
(20, 193, 'like'),
(20, 197, 'like'),
(20, 208, 'dislike'),
(20, 210, 'like'),
(20, 211, 'like'),
(20, 249, 'like'),
(20, 267, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_image` text NOT NULL,
  `posts` text,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email_id`, `password`, `user_image`, `posts`, `comments`) VALUES
(1, 'Tow Mater', 'mater@rsprings.gov', '@mater', '1.png', 'yes', 'yes'),
(2, 'Sally Carrera', 'porsche@rsprings.gov', '@sally', '', NULL, ''),
(3, 'Doc Hudson', 'hornet@rsprings.gov', '@doc', '', NULL, ''),
(4, 'Finn McMissile', 'topsecret@agent.org', '@mcmissile', '', NULL, ''),
(5, 'Lighting McQueen', 'kachow@rusteze.com', '@mcqueen', '', NULL, ''),
(6, 'Hari T', 'hari', 'hari', '6.png', 'yes', 'yes'),
(7, 'Saketh K', 'saketh', 'saketh', '', 'yes', ''),
(20, 'admin', 'admin', 'admin', '', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `ugroup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ugroup_id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 1),
(5, 2, 2),
(6, 3, 1),
(7, 3, 2),
(8, 4, 1),
(9, 4, 3),
(10, 5, 1),
(12, 6, 1),
(13, 6, 2),
(14, 1, 3),
(15, 2, 3),
(16, 7, 1),
(17, 7, 2),
(119, 20, 1),
(120, 6, 4),
(121, 20, 4),
(122, 20, 2),
(123, 20, 3),
(132, 20, 9),
(133, 20, 10),
(134, 6, 11),
(135, 20, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_info`
--
ALTER TABLE `archive_info`
  ADD PRIMARY KEY (`arch_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `group_id_2` (`group_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`ugroup_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_info`
--
ALTER TABLE `archive_info`
  MODIFY `arch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `ugroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
