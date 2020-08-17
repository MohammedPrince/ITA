-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 02:09 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ita`
--
CREATE DATABASE IF NOT EXISTS `ita` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ita`;

-- --------------------------------------------------------

--
-- Table structure for table `ita_category`
--

CREATE TABLE `ita_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `cat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ita_category`
--

INSERT INTO `ita_category` (`cat_id`, `cat_name`, `del`, `cat_date`) VALUES
(1, 'test', 1, '2019-10-01 15:59:03'),
(2, 'Pcs', 1, '2019-10-01 16:00:16'),
(4, 'df', 1, '2019-10-01 16:44:28'),
(5, 'test', 1, '2019-10-01 17:00:52'),
(6, 'pc', 1, '2019-10-01 17:00:59'),
(7, 'Pcs', 0, '2019-10-01 17:03:51'),
(8, 'Printers', 0, '2019-10-01 17:03:55'),
(9, 'Scanners', 0, '2019-10-01 17:03:58'),
(10, 'Software', 0, '2019-10-01 17:04:03'),
(11, 'Laptobs', 0, '2019-10-01 17:04:34'),
(12, 'Phones', 0, '2019-10-01 17:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `ita_companies`
--

CREATE TABLE `ita_companies` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_user_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ita_companies`
--

INSERT INTO `ita_companies` (`c_id`, `c_name`, `c_user_id`, `del`, `c_date`) VALUES
(1, 'fdf', 3, 1, '2019-10-02 14:25:51'),
(2, 'cc', 3, 0, '2019-10-02 14:25:56'),
(3, 'test', 3, 0, '2019-10-02 14:26:17'),
(4, 'zxf', 3, 0, '2019-10-02 14:26:31'),
(5, 'fx', 3, 0, '2019-10-02 14:26:33'),
(6, 'Arabian Computer ', 3, 0, '2019-10-03 15:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `ita_devices`
--

CREATE TABLE `ita_devices` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_model` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `d_details` text NOT NULL,
  `d_img` varchar(255) NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `d_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ita_devices`
--

INSERT INTO `ita_devices` (`d_id`, `d_name`, `d_model`, `cat_id`, `user_id`, `d_details`, `d_img`, `del`, `d_date`) VALUES
(1, 'dell100ptx', '97hjduye', 7, 3, 'null', 'abstract_0018.jpg', 0, '2019-10-02 15:28:44'),
(2, 'Dell', 'Dell 7060', 7, 3, 'core I7', 'abstract_0018.jpg', 0, '2019-10-03 15:35:02'),
(3, 'test', '3434343', 7, 3, 'null', 'abstract_0018.jpg', 0, '2019-10-05 13:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `ita_incoming_device`
--

CREATE TABLE `ita_incoming_device` (
  `in_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `rams` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `os_version` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `remaining` int(11) NOT NULL,
  `remaining_status` int(11) NOT NULL DEFAULT '0',
  `receiving_date` varchar(255) NOT NULL DEFAULT '0',
  `receipt` varchar(255) NOT NULL,
  `specifications` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `del` int(11) DEFAULT '0',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ita_incoming_device`
--

INSERT INTO `ita_incoming_device` (`in_id`, `cat_id`, `d_id`, `c_id`, `unit`, `rams`, `cpu`, `os_version`, `delivery_date`, `remaining`, `remaining_status`, `receiving_date`, `receipt`, `specifications`, `comments`, `user_id`, `del`, `date_time`) VALUES
(9, 7, 1, 2, 100, '', '', '', '', 0, 2, '2019-10-18', 'Capture.PNG', '', 'no', 3, 0, '2019-10-03 07:50:03'),
(11, 7, 3, 4, 54, '4', 'Coure I7', 'Win 10', '2019-10-26', 55, 1, '2019-10-05', 'Screenshot_2019-10-02 Material Dashboard .png', 'old_sem_7.pdf', 'null', 3, 0, '2019-10-05 13:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `ita_users`
--

CREATE TABLE `ita_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_emp_id` int(11) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user_active` int(11) NOT NULL DEFAULT '1',
  `del` int(11) NOT NULL DEFAULT '0',
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ita_users`
--

INSERT INTO `ita_users` (`user_id`, `user_name`, `user_pass`, `user_full_name`, `user_emp_id`, `user_type`, `user_active`, `del`, `user_date`) VALUES
(2, 'maverick', '3e2c12dd5a68e456024bfe3b0d14aaa4', 'Mohammed prince', 122, 3, 1, 0, '2019-10-02 08:41:50'),
(3, 'prince', '202cb962ac59075b964b07152d234b70', 'Mohammed', 0, 1, 1, 0, '2019-10-02 08:43:47'),
(4, 'ahmed', '97c1bfb4a5f4ad324692fed4f66eda3e', '', 0, 2, 1, 0, '2019-10-02 11:17:01'),
(5, 'ali mohammed', 'b891a482037cc4d7676e54bb655adb35', '', 0, 1, 1, 1, '2019-10-02 11:20:33'),
(6, 'ali.ahmed', 'b05b925aeddc566e7dc128974f23fab1', 'ali ahmed salih', 74734, 2, 1, 0, '2019-10-03 15:25:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ita_category`
--
ALTER TABLE `ita_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ita_companies`
--
ALTER TABLE `ita_companies`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ita_devices`
--
ALTER TABLE `ita_devices`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `ita_incoming_device`
--
ALTER TABLE `ita_incoming_device`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `ita_users`
--
ALTER TABLE `ita_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ita_category`
--
ALTER TABLE `ita_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ita_companies`
--
ALTER TABLE `ita_companies`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ita_devices`
--
ALTER TABLE `ita_devices`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ita_incoming_device`
--
ALTER TABLE `ita_incoming_device`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ita_users`
--
ALTER TABLE `ita_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
