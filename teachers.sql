-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 06:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verification_code` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `one_time_password` varchar(255) DEFAULT NULL,
  `has_details` tinyint(1) NOT NULL DEFAULT 0,
  `hrms_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `highest_educational_qualification` varchar(255) DEFAULT NULL,
  `additional_qualification` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `physically_handicapped` tinyint(1) DEFAULT NULL,
  `ex_service_man` tinyint(1) DEFAULT NULL,
  `exempted_category` tinyint(1) DEFAULT NULL,
  `date_of_joining_in_service` date DEFAULT NULL,
  `date_of_joining_in_present_college` date DEFAULT NULL,
  `pay_band` varchar(255) DEFAULT NULL,
  `band_pay` int(11) DEFAULT NULL,
  `grade_pay` int(11) DEFAULT NULL,
  `pan_number` int(11) DEFAULT NULL,
  `mobile_number` int(11) UNSIGNED DEFAULT NULL,
  `date_of_superannuation` date DEFAULT NULL,
  `addresses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `email_verification_code`, `password`, `one_time_password`, `has_details`, `hrms_code`, `name`, `date_of_birth`, `highest_educational_qualification`, `additional_qualification`, `designation`, `department`, `gender`, `category`, `physically_handicapped`, `ex_service_man`, `exempted_category`, `date_of_joining_in_service`, `date_of_joining_in_present_college`, `pay_band`, `band_pay`, `grade_pay`, `pan_number`, `mobile_number`, `date_of_superannuation`, `addresses`) VALUES
(1, 'teacher0@gmail.com', 'true', '$2y$10$Wsd67AHn42L336ZvbUJIvuSe6SMoHWnbjtJhMbM.pKU4RhtBi7BWu', '', 1, NULL, 'Teacher Zero', '2020-01-24', 'Post Doctoral', 'PG Diploma', 'Principal', 'Computer Science', 'Male', 'Unreserved', 0, 0, 0, '2020-01-24', '2020-01-24', '37400-67000', 1, 1, 1, 4294967295, '2020-01-24', '{\"present_address\":{\"house_number\":\"1234\",\"location\":\"Example Street\",\"village\":\"Demo Village\",\"post_office\":\"Demo Post Office\",\"police_station\":\"Demo Police Station\",\"pin_code\":\"741248\",\"district\":\"Demo District\",\"state\":\"Demo State\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}'),
(4, 'teacher1@gmail.com', 'true', '$2y$10$svj6cGfWK9booQ4Qc7grxu9vNvNcE1069XV2DDwGxgRBXkeVDpMci', NULL, 1, NULL, 'Teacher One', '2020-01-28', 'Post Doctoral', 'PG Diploma', 'Gr-D', 'Computer Science', 'Male', 'Unreserved', 0, 0, 0, '2020-01-28', '2020-01-28', '37400-67000', 1, 1, 1, 4294967295, '2020-01-28', '{\"present_address\":{\"house_number\":\"1234\",\"location\":\"Street Name\",\"village\":\"Village\",\"post_office\":\"Post Office\",\"police_station\":\"Police Station\",\"pin_code\":\"000001\",\"district\":\"District\",\"state\":\"State\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"Street Name\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
