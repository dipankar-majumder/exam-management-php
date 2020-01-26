-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 08:04 PM
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
CREATE DATABASE IF NOT EXISTS `exam_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `exam_management`;

-- --------------------------------------------------------

--
-- Table structure for table `additional_qualifications`
--

CREATE TABLE `additional_qualifications` (
  `id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `additional_qualifications`
--

INSERT INTO `additional_qualifications` (`id`, `qualification`) VALUES
(1, 'NET'),
(2, 'SLET'),
(3, 'Certificate'),
(4, 'Diploma'),
(5, 'PG Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@email.com', '$2y$10$y316HFn59wPtf9trOfrW0OuBY4XA4yUm0nIYoOB2RFtDZlXJWpDnW');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Unreserved'),
(2, 'SC'),
(3, 'ST'),
(4, 'OBC-A'),
(5, 'OBC-B');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`) VALUES
(1, 'Principal'),
(2, 'Vice-Principal'),
(3, 'Asst. Prof Stage I'),
(4, 'Asst. Prof Stage II'),
(5, 'Asst. Prof Stage III'),
(6, 'Associate Professor'),
(7, 'Professor'),
(8, 'Librarian'),
(9, 'Librarian Sr. Scale'),
(10, 'Librarian Sr. Grade Scale'),
(11, 'GLI'),
(12, 'GLI Sr. Scale'),
(13, 'GLI Sr. Grade Scale'),
(14, 'Gr-B'),
(15, 'Gr-C'),
(16, 'Gr-D');

-- --------------------------------------------------------

--
-- Table structure for table `educational_qualifications`
--

CREATE TABLE `educational_qualifications` (
  `id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educational_qualifications`
--

INSERT INTO `educational_qualifications` (`id`, `qualification`) VALUES
(1, 'Below Secondary'),
(2, 'Secondary'),
(3, 'Higher Secondary'),
(4, 'Graduate'),
(5, 'Hons. Graduate'),
(6, 'Post Graduate'),
(7, 'M. Phil.'),
(8, 'Ph. D.'),
(9, 'Post Doctoral');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `pay_bands`
--

CREATE TABLE `pay_bands` (
  `id` int(11) NOT NULL,
  `band` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_bands`
--

INSERT INTO `pay_bands` (`id`, `band`) VALUES
(1, '5400-25200'),
(2, '4900-16200'),
(3, '15600-39100'),
(4, '37400-67000'),
(5, '7100-37600');

-- --------------------------------------------------------

--
-- Table structure for table `permanent_addresses`
--

CREATE TABLE `permanent_addresses` (
  `id` int(11) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post_office` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `present_addresses`
--

CREATE TABLE `present_addresses` (
  `id` int(11) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post_office` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `pin_code` int(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `email_verification_code` tinytext DEFAULT NULL,
  `password` tinytext NOT NULL,
  `one_time_password` tinytext DEFAULT NULL,
  `has_details` tinyint(1) NOT NULL DEFAULT 0,
  `hrms_code` tinytext DEFAULT NULL,
  `name` tinytext DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `highest_educational_qualification` tinytext DEFAULT NULL,
  `additional_qualification` tinytext DEFAULT NULL,
  `designation` tinytext DEFAULT NULL,
  `department` tinytext DEFAULT NULL,
  `gender` tinytext DEFAULT NULL,
  `category` tinytext DEFAULT NULL,
  `physically_handicapped` tinyint(1) DEFAULT NULL,
  `ex_service_man` tinyint(1) DEFAULT NULL,
  `exempted_category` tinyint(1) DEFAULT NULL,
  `date_of_joining_in_service` date DEFAULT NULL,
  `date_of_joining_in_present_college` date DEFAULT NULL,
  `pay_band` tinytext DEFAULT NULL,
  `band_pay` int(11) DEFAULT NULL,
  `grade_pay` int(11) DEFAULT NULL,
  `pan_number` int(11) DEFAULT NULL,
  `mobile_number` int(11) UNSIGNED DEFAULT NULL,
  `date_of_superannuation` date DEFAULT NULL,
  `present_address` int(11) DEFAULT NULL,
  `permanent_address` int(11) DEFAULT NULL,
  `addresses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '{}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `email_verification_code`, `password`, `one_time_password`, `has_details`, `hrms_code`, `name`, `date_of_birth`, `highest_educational_qualification`, `additional_qualification`, `designation`, `department`, `gender`, `category`, `physically_handicapped`, `ex_service_man`, `exempted_category`, `date_of_joining_in_service`, `date_of_joining_in_present_college`, `pay_band`, `band_pay`, `grade_pay`, `pan_number`, `mobile_number`, `date_of_superannuation`, `present_address`, `permanent_address`, `addresses`) VALUES
(1, 'teacher0@gmail.com', 'true', '$2y$10$Wsd67AHn42L336ZvbUJIvuSe6SMoHWnbjtJhMbM.pKU4RhtBi7BWu', '', 1, NULL, 'Teacher Zero', '2020-01-24', 'Post Doctoral', 'PG Diploma', 'Principal', 'Computer Science', 'Male', 'Unreserved', 0, 0, 0, '2020-01-24', '2020-01-24', '37400-67000', 1, 1, 1, 4294967295, '2020-01-24', NULL, NULL, '{\"present_address\":{\"house_number\":\"1234\",\"location\":\"Example Street\",\"village\":\"Demo Village\",\"post_office\":\"Demo Post Office\",\"police_station\":\"Demo Police Station\",\"pin_code\":\"741248\",\"district\":\"Demo District\",\"state\":\"Demo State\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_qualifications`
--
ALTER TABLE `additional_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_qualifications`
--
ALTER TABLE `educational_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_bands`
--
ALTER TABLE `pay_bands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permanent_addresses`
--
ALTER TABLE `permanent_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `present_addresses`
--
ALTER TABLE `present_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_qualifications`
--
ALTER TABLE `additional_qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `educational_qualifications`
--
ALTER TABLE `educational_qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pay_bands`
--
ALTER TABLE `pay_bands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permanent_addresses`
--
ALTER TABLE `permanent_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `present_addresses`
--
ALTER TABLE `present_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
