-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 06:39 AM
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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'GLOBAL'),
(2, 'Electronics'),
(3, 'Music'),
(4, 'Sports'),
(5, 'Books');

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
(112, 6, 'asd', '2018-10-15 04:13:13', 1),
(113, 6, '&lt;b&gt;hi&lt;/b&gt;', '2018-10-15 04:19:40', 1),
(116, 6, 'asd', '2018-10-15 04:30:22', 1),
(117, 1, 'awesome', '2018-10-15 04:37:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `posts` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email_id`, `password`, `posts`) VALUES
(1, 'Tow Mater', 'mater@rsprings.gov', '@mater', 'yes'),
(2, 'Sally Carrera', 'porsche@rsprings.gov', '@sally', NULL),
(3, 'Doc Hudson', 'hornet@rsprings.gov', '@doc', NULL),
(4, 'Finn McMissile', 'topsecret@agent.org', '@mcmissile', NULL),
(5, 'Lighting McQueen', 'kachow@rusteze.com', '@mcqueen', NULL),
(6, 'Hari T', 'hari', 'hari', 'yes');

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
(11, 5, 4),
(12, 6, 1),
(13, 6, 2),
(14, 1, 3),
(15, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`ugroup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `ugroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;