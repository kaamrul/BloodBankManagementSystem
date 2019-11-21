-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 11:35 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_details`
--

CREATE TABLE `blood_details` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `a_pos` int(5) NOT NULL,
  `a_neg` int(5) NOT NULL,
  `b_pos` int(5) NOT NULL,
  `b_neg` int(5) NOT NULL,
  `ab_pos` int(5) NOT NULL,
  `ab_neg` int(5) NOT NULL,
  `o_pos` int(5) NOT NULL,
  `o_neg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_details`
--

INSERT INTO `blood_details` (`id`, `bank_id`, `a_pos`, `a_neg`, `b_pos`, `b_neg`, `ab_pos`, `ab_neg`, `o_pos`, `o_neg`) VALUES
(1, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(4, 4, 56, 4, 5, 5, 7, 7, 2, 3),
(5, 2, 5, 45, 7, 67, 87, 8, 78, 7),
(6, 3, 23, 54, 5, 45, 48, 5, 57, 45),
(7, 4, 58, 5, 45, 84, 51, 45, 5, 45),
(8, 5, 54, 5, 84, 58, 58, 45, 45, 48),
(9, 5, 54, 84, 54, 54, 84, 5, 48, 45),
(10, 7, 56, 45, 28, 5, 48, 54, 58, 48),
(11, 8, 45, 84, 54, 85, 4, 85, 45, 84),
(12, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(13, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(14, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(15, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(16, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(17, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(18, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(19, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(20, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(21, 1, 40, 44, 44, 34, 45, 40, 42, 44),
(22, 1, 40, 44, 44, 34, 45, 40, 42, 44);

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `request_id` int(11) NOT NULL,
  `doner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` char(100) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `req_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`request_id`, `doner_id`, `user_id`, `subject`, `message`, `date`, `req_date`, `status`) VALUES
(4, 2, 3, 'Blood donation', 'i need blood.\r\n', '2017-11-26 09:24:29', '0000-00-00', 'pending'),
(5, 13, 3, 'Reason Blood', 'Can you give blood?', '2017-11-26 10:04:44', '0000-00-00', 'rejected'),
(6, 13, 3, 'sdfsdf', 'kljkj', '2017-11-26 09:52:50', '0000-00-00', 'accepted'),
(7, 13, 3, 'something', 'klfjdsklklf', '2017-11-26 10:19:25', '2017-11-16', 'accepted'),
(8, 13, 3, 'wijd', 'kjsdnas askdn', '2017-11-26 11:00:38', '2017-11-15', 'accepted'),
(9, 13, 3, 'blood', 'for blood', '2017-11-26 10:32:26', '2017-11-28', 'accepted'),
(10, 13, 3, 'blood need', 'blood jkn asn', '2017-11-26 10:57:04', '2017-11-29', 'accepted'),
(11, 2, 3, 'Blood', 'i need blood urgent', '2017-12-12 11:43:40', '2017-11-30', 'accepted'),
(12, 13, 3, 'Blood Donate', 'ihasiohd jakshdcas asdhanc', '2017-12-11 11:18:08', '2017-11-14', 'accepted'),
(13, 10, 3, 'blood need', 'asjka sjkak jkjas', '2017-11-26 11:22:31', '2017-11-21', 'accepted'),
(14, 13, 3, 'Blood', 'hospitali need blood on this date. \r\nYou will come Labid ', '2017-11-26 11:26:03', '2017-11-30', 'pending'),
(15, 4, 2, 'Blood donation', 'i need blood on 29th November.', '2017-11-27 07:54:52', '2017-11-28', 'pending'),
(16, 4, 3, 'Blood', 'On this date i need blood in Square Hospital, Dhanmondi.', '2017-11-27 07:57:04', '2017-11-30', 'pending'),
(17, 4, 3, 'Blood donation', 'i need blood in Apolo Hospital, Uttara', '2017-11-27 08:00:13', '2017-11-27', 'pending'),
(18, 2, 3, 'blood', 'I need blood urgently.', '2017-12-11 08:04:55', '2017-11-27', 'accepted'),
(19, 10, 3, 'Blood request', 'i  badly need A+ blood.', '2017-12-07 14:21:22', '2017-12-14', 'pending'),
(20, 10, 3, 'Blood request', 'i  badly need A+ blood.', '2017-12-07 14:24:34', '2017-12-14', 'pending'),
(21, 7, 3, 'Blood', 'Give me blood please.', '2017-12-11 15:05:50', '2017-12-12', 'accepted'),
(22, 12, 2, 'sdfdsfdsfds', 'sdfdsdsfdsfdsfdsfdsfd', '2017-12-11 17:26:38', '2017-12-12', 'pending'),
(23, 3, 2, 'Blood', 'Give me blood please.......!!!', '2017-12-12 10:03:01', '2017-12-30', 'accepted'),
(24, 3, 3, 'Blood', 'I need Blood. Give me please!', '2017-12-26 15:46:42', '2017-12-29', 'rejected'),
(25, 2, 2, 'Blood', 'Give me blood Please...!', '2017-12-12 11:08:43', '2017-12-29', 'pending'),
(26, 2, 2, 'Blood', 'Badly need blood', '2017-12-12 11:09:42', '2017-12-29', 'pending'),
(27, 2, 2, 'Blood', 'Badly need blood', '2017-12-12 11:10:56', '2017-12-29', 'pending'),
(28, 2, 2, 'Blood', 'Give me blood Please.!', '2017-12-12 11:11:29', '2017-12-29', 'pending'),
(29, 2, 2, 'blood', 'i need blood badly. ', '2017-12-12 11:13:03', '2017-12-29', 'pending'),
(30, 14, 2, 'Blood', 'Give me blood please......!', '2017-12-12 12:27:22', '2017-12-30', 'pending'),
(31, 3, 3, 'Blood', 'Give me blood Please.......!', '2017-12-26 15:30:59', '2018-01-01', 'pending'),
(32, 3, 3, 'Blood', 'I need blood.', '2017-12-26 15:40:03', '2017-12-28', 'pending'),
(33, 3, 3, 'Blood', 'May u give...!!!', '2017-12-26 15:40:41', '2018-01-02', 'pending'),
(34, 3, 3, 'Blood', 'Give me please.....!!!', '2017-12-26 15:42:24', '2018-01-04', 'pending'),
(35, 3, 3, 'Blood', 'Give me blood please!', '2017-12-26 15:45:45', '2018-01-05', 'pending'),
(36, 3, 3, 'Blood', 'Please give me!', '2017-12-26 15:47:28', '2017-12-26', 'pending'),
(37, 15, 3, 'Blood', 'Please give me.', '2017-12-26 17:15:19', '2018-01-01', 'rejected'),
(38, 15, 3, 'Blood', 'Give me Blood .', '2017-12-26 17:15:37', '2017-12-26', 'accepted'),
(39, 19, 3, 'Blood', 'Give me Blood Please!', '2017-12-28 16:23:26', '2018-01-01', 'rejected'),
(40, 20, 3, 'Blood', 'Give me blood please!!!', '2017-12-28 16:17:53', '2017-12-20', 'rejected'),
(41, 20, 3, 'Blood', 'Give me Blood Please...!!!', '2017-12-28 16:23:13', '2017-12-22', 'pending'),
(42, 20, 3, 'Blood', 'I badly need blood. Please give me blood!', '2017-12-28 16:03:39', '2017-12-25', 'accepted'),
(43, 20, 3, 'blood needed', 'rokto dao. rokto chai', '2017-12-28 16:49:08', '2017-12-28', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_info`
--

CREATE TABLE `tbl_admin_info` (
  `admin_id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_url` varchar(40) NOT NULL,
  `activation_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_info`
--

INSERT INTO `tbl_admin_info` (`admin_id`, `name`, `email`, `phone_number`, `password`, `img_url`, `activation_status`) VALUES
(14, 'Md. Mahedi Hasan', 'mahedi3126@gmail.com', '01636548228', '1', '../assets/admin_img/14422.jpg', 1),
(15, 'Md. Baker Hossain', 'bakerfpi@gmail.com', '01823979127', '1', '../assets/admin_img/9231.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_bank_info`
--

CREATE TABLE `tbl_blood_bank_info` (
  `bank_id` int(11) NOT NULL,
  `bank_name` char(50) NOT NULL,
  `category` char(40) NOT NULL,
  `district` char(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int(30) NOT NULL,
  `bank_email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blood_bank_info`
--

INSERT INTO `tbl_blood_bank_info` (`bank_id`, `bank_name`, `category`, `district`, `address`, `phone_no`, `bank_email`, `password`) VALUES
(1, 'Islami Bank Hospital Blood Bank', 'National', 'Dhaka', 'House- 04, Road-32, Sector-32, Dhanmondi, Dhaka, Bangladesh', 8317090, 'mahedi3126@gmail.com', '1'),
(2, 'Quantum Blood Bank', 'National', 'Rajshahi', 'House# 04, Road# 12, Tejkunipara, Rajshahi. ', 1636548228, 'mahedi.cse.iubat@gmail.com', '1'),
(3, 'Ibnesina', 'National', 'Dhaka', 'Kollanpur, Shayamoli, Dhaka', 2895628, 'ibnesina@gmail.com', '1'),
(4, 'Shandhani, Dhaka Dental College Branch', 'National', 'Dhaka', 'Dhaka Dental College Branch; Dhaka, Bangladesh', 9011887, 's@gmail.com', '1'),
(5, 'Sir Salimullah College Blood Bank', 'National', 'Dhaka', 'Dhanmondi, Dhaka, Bangladesh', 7319123, 'ssc@gmai.com', '1'),
(6, 'Red Crescent Blood Bank', 'National', 'Dhaka', 'Gulshan, Dhaka, Bangladesh', 925468, 'r@gmai.com', ''),
(7, 'Square Hospital', 'National', 'Dhaka', 'Dhamondi, Dhaka, Bangladesh', 123456, 'sq@gmail.com', '1'),
(8, 'Labid General Hospital', 'National', 'Dhaka', 'Uttara-13, Dhaka', 9865425, 'l@gmail.com', '1'),
(9, 'Pabna Sodor Hospital', 'National', 'Pabna', 'Shapla Chottor, Pabna.', 1659463548, 'pahospital@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_camp_info`
--

CREATE TABLE `tbl_camp_info` (
  `camp_id` int(11) NOT NULL,
  `bank_id` int(40) NOT NULL,
  `camp_area` varchar(60) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `time` time(1) NOT NULL,
  `date` date NOT NULL,
  `unit` int(3) NOT NULL,
  `contact_no` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_camp_info`
--

INSERT INTO `tbl_camp_info` (`camp_id`, `bank_id`, `camp_area`, `venue`, `time`, `date`, `unit`, `contact_no`) VALUES
(2, 2, 'Dhaka', 'IUB', '09:00:00.0', '2017-11-22', 100, '982564'),
(3, 6, 'Noakhali', 'NMC', '09:00:00.0', '2017-11-22', 100, '01715364285'),
(4, 4, 'Kolabagan, Dhaka', 'DIU', '09:00:00.0', '2017-11-24', 200, '65758686'),
(5, 5, 'Sector-10, Uttara, Dhaka', 'IUBAT', '10:00:00.0', '2017-02-12', 100, '01636548228'),
(6, 1, 'Shahbag, Dhaka', 'DU', '09:00:00.0', '2017-02-12', 100, '01636548228'),
(7, 7, 'Embankment Road, Uttara, Dhaka', 'IUBAT', '10:00:00.0', '2017-02-12', 100, '01636548228'),
(8, 1, 'Embankment Road, Uttara, Dhaka', 'IUBAT', '10:40:00.0', '2017-12-29', 52, '01955648236'),
(9, 9, 'hemayatpur, pabna', 'pagla garod', '10:00:00.0', '2017-12-30', 53, '01659463548'),
(10, 0, 'hemayatpur, pabna', 'pagla garod', '10:40:00.0', '2017-12-30', 50, '01749307467');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doner_info`
--

CREATE TABLE `tbl_doner_info` (
  `doner_id` int(11) NOT NULL,
  `doner_name` char(50) NOT NULL,
  `doner_email` varchar(100) NOT NULL,
  `doner_phone` varchar(33) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` char(6) NOT NULL,
  `blood_group` varchar(6) NOT NULL,
  `img_url` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `activation_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doner_info`
--

INSERT INTO `tbl_doner_info` (`doner_id`, `doner_name`, `doner_email`, `doner_phone`, `password`, `age`, `gender`, `blood_group`, `img_url`, `location`, `activation_status`) VALUES
(4, 'Baker Hossain', 'bakerfpi@gmail.com', '01627837462', '1', 3, 'MALE', 'B+', 'assets/doner_img/12899.png', 'Uttara', 1),
(5, 'Md. Kamal Hossain', 'kamal@gmail.com', '01735015583', '1', 29, 'MALE', 'B+', 'assets/doner_img/1138.jpg', 'Pabna', 1),
(7, 'Md. Ashraful Islam', 'ashraful@gmail.com', '01642153810', '1', 23, 'MALE', 'O+', 'assets/doner_img/32064.jpg', 'Tangail', 1),
(9, 'SK', 'sk@gmail.com', '01676380905', '1', 25, 'MALE', 'A-', 'assets/doner_img/4785.jpg', 'Gazipur', 1),
(10, 'Aslam Bin Akram', 'wahidaslam83@gmail.com', '01614004847', '1', 22, 'MALE', 'AB-', 'assets/doner_img/5014.jpg', 'Uttara', 1),
(11, 'Nur. Rahman Palash', 'nur@gmail.com', '01611195990', '1', 23, 'MALE', 'O-', 'assets/doner_img/21357.jpg', 'Khulna', 1),
(12, 'Mst. Shimul Akter', 'shimu@gmail.com', 'N/A', '1', 23, 'FEMALE', 'A-', 'assets/doner_img/27554.jpg', 'Bramonbaria', 1),
(13, 'Mohammad Zahangir', 'zahangir@gmail.com', '01714161906', '1', 36, 'MALE', 'A+', 'assets/doner_img/15127.jpg', 'Gulshan', 1),
(14, 'Md. Akram Chowdhury', 'akram.cse007@gmail.com', '01749307467', '1', 24, 'MALE', 'A+', 'assets/doner_img/24455.jpg', 'Norshingdi', 1),
(15, 'Nasim Huda', 'nasim@gmail.com', '01625458659', '1', 29, 'MALE', 'A+', 'assets/doner_img/26277.jpg', 'Pabna', 0),
(16, 'Milton', 'milton@gmail.com', '0164586954', '1', 24, 'MALE', 'O+', 'assets/doner_img/10874.jpg', 'Gazipur', 1),
(17, 'Josim Uddin', 'josim@gmail.com', 'N/A', '1', 26, 'MALE', 'A+', 'assets/doner_img/29227.jpg', 'Uttara', 1),
(18, 'SM Sakil', 'sakil@gmail.com', '01772586156', '1', 22, 'MALE', 'A+', 'assets/doner_img/8144.jpg', 'Pabna', 1),
(19, 'Md. Mahedi Hasan', 'mahedi3126@gmail.com', '01772586156', '1', 24, 'MALE', 'A+', 'assets/doner_img/7113.jpg', 'Uttara', 1),
(20, 'MH Murad', 'mahedi.cse.iubat@gmail.com', '01636548228', '1', 24, 'MALE', 'A+', 'assets/doner_img/26248.jpg', 'Uttara', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_to_bank`
--

CREATE TABLE `tbl_request_to_bank` (
  `request_id_bank` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` char(100) NOT NULL,
  `require_date` varchar(20) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bb_status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_request_to_bank`
--

INSERT INTO `tbl_request_to_bank` (`request_id_bank`, `bank_id`, `user_id`, `subject`, `require_date`, `blood_group`, `amount`, `message`, `date`, `bb_status`) VALUES
(1, 1, 2, 'I need blood', '2017-12-05', 'A+', 0, 'important', '2017-12-04 06:45:05', 'pending'),
(2, 7, 2, 'Bloo', '2017-12-16', 'A+', 2, 'i need blood', '2017-12-10 11:45:02', 'accepted'),
(3, 4, 3, 'Blood', '2017-12-13', 'A+', 3, 'i need blood', '2017-12-10 10:41:01', 'accepted'),
(4, 7, 2, 'I need blood', '2017-12-11', 'B+', 10, 'vvvvv', '2017-12-10 10:46:34', 'accepted'),
(5, 7, 2, 'I need blood', '2017-12-12', 'B+', 10, 'fdddd', '2017-12-10 11:41:46', 'accepted'),
(6, 1, 2, 'Blood', '2017-12-29', 'A+', 2, 'I need blood on this date.', '2017-12-12 11:19:08', 'accepted'),
(7, 1, 2, 'Blood', '2017-12-30', 'B+', 2, 'i need blood.', '2017-12-12 11:20:41', 'rejected'),
(8, 1, 2, 'Blood', '2017-12-30', 'O+', 1, 'i need blood on this date.', '2017-12-27 07:36:13', 'accepted'),
(9, 1, 2, 'Blood', '2017-12-30', 'O+', 1, 'On this date i need blood.', '2017-12-12 12:15:20', 'rejected'),
(10, 1, 3, 'Blood', '2017-12-26', 'A-', 4, 'I need blood.', '2017-12-26 17:44:47', 'accepted'),
(11, 2, 3, 'Blood', '2018-01-06', 'A-', 2, 'i need blood', '2017-12-26 17:47:10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `phone_number` int(36) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `location` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`user_id`, `user_name`, `user_email`, `phone_number`, `password`, `age`, `sex`, `location`) VALUES
(1, 'Mr. kamal Hossain', 'kamal@gmail.com', 1735015583, '1', 28, 'male', 'uttara'),
(2, 'Baker Hossain', 'bakerfpi@gmail.com', 1635968468, '1', 26, 'MALE', 'Dhaka'),
(3, 'Mahedi Hasan', 'mahedi3126@gmail.com', 1636548228, '1', 24, 'MALE', 'uttara'),
(5, 'Akram', 'akram.cse007@gmail.com', 1749307467, '1', 24, 'MALE', 'Norshingdi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_details`
--
ALTER TABLE `blood_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_admin_info`
--
ALTER TABLE `tbl_admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_blood_bank_info`
--
ALTER TABLE `tbl_blood_bank_info`
  ADD PRIMARY KEY (`bank_id`),
  ADD UNIQUE KEY `email` (`bank_email`);

--
-- Indexes for table `tbl_camp_info`
--
ALTER TABLE `tbl_camp_info`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `tbl_doner_info`
--
ALTER TABLE `tbl_doner_info`
  ADD PRIMARY KEY (`doner_id`),
  ADD UNIQUE KEY `doner_email` (`doner_email`);

--
-- Indexes for table `tbl_request_to_bank`
--
ALTER TABLE `tbl_request_to_bank`
  ADD PRIMARY KEY (`request_id_bank`);

--
-- Indexes for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_details`
--
ALTER TABLE `blood_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_admin_info`
--
ALTER TABLE `tbl_admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_blood_bank_info`
--
ALTER TABLE `tbl_blood_bank_info`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_camp_info`
--
ALTER TABLE `tbl_camp_info`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_doner_info`
--
ALTER TABLE `tbl_doner_info`
  MODIFY `doner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_request_to_bank`
--
ALTER TABLE `tbl_request_to_bank`
  MODIFY `request_id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
