-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2015 at 03:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(10, 'Outputer');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(4) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL DEFAULT '8946919241',
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `user_id`) VALUES
(1, 'Rohit', '8946919241', 37),
(2, 'Shubham', '8561849825', 38),
(3, 'test', '8585858585', 39),
(4, 'asdfasdf', '232323', 40),
(6, 'ssssssss', '222222222', 2),
(7, 'dfsgsdfgsdgfsdgf', '356345', 40);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT 'waiting...',
  `part` varchar(10) NOT NULL DEFAULT 'header',
  `controller` varchar(100) NOT NULL DEFAULT 'welcomes',
  `action` varchar(100) NOT NULL DEFAULT 'index'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `part`, `controller`, `action`) VALUES
(1, 'home', 'header', 'welcomes', 'index'),
(2, 'ContactUs', 'header', 'welcomes', 'contactus'),
(4, 'Aboutus', 'header', 'welcomes', 'aboutus'),
(7, 'Carrer''s', 'footer', 'welcomes', 'carrer'),
(8, 'Location', 'footer', 'welcomes', 'location');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(4) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `body` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `category_id` int(20) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `image_url`, `created`, `modified`, `category_id`, `user_id`) VALUES
(20, 'it''s final edit ver', 'it''s final edit ver body', '', '2015-08-18', '2015-08-18', 9, 2),
(21, 'asdfsdf', 'asdfasdfadsf', '', '2015-08-18', '2015-08-18', 9, 37),
(22, 'asdfasdfasdf', 'adsfasdf', '', '2015-08-18', '2015-08-18', 9, 2),
(23, 'asdfasdfasdf', 'asdfasdf', '', '2015-08-18', '2015-08-18', 10, 2),
(24, 'dsfasdf', 'asdfasdfasdf', '', '2015-08-18', '2015-08-18', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `image_url`, `role`, `created`, `modified`, `status`) VALUES
(2, 'user3', '6db5e7b79808c277352a2ed2ea481ce787617e85', 'bbbbb@bbbbb.com', 'ppppp@pp.com_icoFacebbok.png', 'admin', '2015-08-13 08:32:50', '2015-08-14 07:37:33', 1),
(37, 'oneone', '6db5e7b79808c277352a2ed2ea481ce787617e85', 'one@one.co', 'Capture123.PNG', 'king', '2015-08-18 09:26:05', '2015-08-18 09:29:30', 1),
(38, 'twotwo', '6db5e7b79808c277352a2ed2ea481ce787617e85', 'twotwo@twotwo.com', 'twotwo@twotwo.com_', 'bishop', '2015-08-18 09:27:54', '2015-08-18 09:27:54', 1),
(39, 'hellow', '6db5e7b79808c277352a2ed2ea481ce787617e85', 'hellow@hellow.com', 'hellow@hellow.com_icoFacebbok.png', 'pawn', '2015-08-18 12:56:50', '2015-08-18 12:56:50', 1),
(40, 'helloo', '6db5e7b79808c277352a2ed2ea481ce787617e85', 'helloo@helloo.com', 'helloo@helloo.com_1.docx', 'rook', '2015-08-18 12:57:34', '2015-08-18 12:57:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `welcomes`
--

CREATE TABLE IF NOT EXISTS `welcomes` (
`id` int(10) unsigned NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcomes`
--
ALTER TABLE `welcomes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `welcomes`
--
ALTER TABLE `welcomes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
