-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 02:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `myadmin`
--

CREATE TABLE `myadmin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `admin_mail` varchar(30) NOT NULL,
  `admin_pass` varchar(80) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myadmin`
--

INSERT INTO `myadmin` (`id`, `admin_name`, `admin_mail`, `admin_pass`, `created_date`, `updated_date`) VALUES
(1, 'arif', 'arif@mail.com', '900150983cd24fb0d6963f7d28e17f72', '2021-08-21 20:27:32', NULL),
(2, 'imran', 'imran@gmail.com', 'tcld', '2021-08-22 08:56:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mycategory`
--

CREATE TABLE `mycategory` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_detail` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycategory`
--

INSERT INTO `mycategory` (`id`, `cat_name`, `cat_detail`, `created_date`, `updated_date`) VALUES
(1, 'Latest', 'Latest News Today: Breaking news on Politics, Business, Sports, Bollywood, Education, Science.', '2021-08-25 07:28:29', '2021-08-25 07:37:10'),
(2, 'Bangladesh', 'All the news from Bangladesh regarding politics, business, industry, lifestyle, culture, sports, cri', '2021-08-25 07:32:16', '2021-08-25 07:42:07'),
(3, 'International', 'Get the latest international news and world events from Asia, Europe, the Middle East, and more. ', '2021-08-25 07:33:12', '2021-08-25 07:36:31'),
(4, 'Business', 'Business News: breaking personal finance, company, financial and economic news', '2021-08-25 07:35:46', NULL),
(5, 'Science', 'Science News features daily news articles, feature stories, reviews and more in all disciplines of s', '2021-08-25 07:38:41', NULL),
(6, 'Sports', 'Breaking news &amp; live sports coverage including results, video, audio and analysis on Football an', '2021-08-25 07:39:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mycomments`
--

CREATE TABLE `mycomments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(500) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mypost`
--

CREATE TABLE `mypost` (
  `id` int(11) NOT NULL,
  `post_title` varchar(300) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `post_details` longtext NOT NULL,
  `post_pic` varchar(250) DEFAULT NULL,
  `reporter_id` varchar(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `myreporter`
--

CREATE TABLE `myreporter` (
  `id` int(11) NOT NULL,
  `reporter_name` varchar(30) NOT NULL,
  `reporter_mail` varchar(30) NOT NULL,
  `reporter_mobile` varchar(14) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myreporter`
--

INSERT INTO `myreporter` (`id`, `reporter_name`, `reporter_mail`, `reporter_mobile`, `created_date`) VALUES
(1, 'Muhammad Imran', 'imran@gmail.com', '01780466895', '2021-08-25 07:15:40'),
(2, 'Ruma Akter', 'ruma@gmail.com', '01780466896', '2021-08-25 07:16:26'),
(3, 'Arif Hossain', 'arif@tmail.com', '01780466897', '2021-08-25 07:16:51'),
(4, 'Sakib Al Hasan', 'sakib@yahoo.com', '01934328259', '2021-08-25 07:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `myuser`
--

CREATE TABLE `myuser` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_pass` varchar(80) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myadmin`
--
ALTER TABLE `myadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_mail` (`admin_mail`);

--
-- Indexes for table `mycategory`
--
ALTER TABLE `mycategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `mycomments`
--
ALTER TABLE `mycomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mypost`
--
ALTER TABLE `mypost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myreporter`
--
ALTER TABLE `myreporter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reporter_mail` (`reporter_mail`);

--
-- Indexes for table `myuser`
--
ALTER TABLE `myuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myadmin`
--
ALTER TABLE `myadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mycategory`
--
ALTER TABLE `mycategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mycomments`
--
ALTER TABLE `mycomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mypost`
--
ALTER TABLE `mypost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `myreporter`
--
ALTER TABLE `myreporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `myuser`
--
ALTER TABLE `myuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
