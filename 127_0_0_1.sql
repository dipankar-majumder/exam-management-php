-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 12:15 PM
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
DROP DATABASE IF EXISTS `exam_management`;
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
  `email` varchar(255) NOT NULL,
  `email_verification_code` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `has_details` tinyint(1) NOT NULL DEFAULT 0,
  `hrms_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `highest_educational_qualification` int(11) DEFAULT NULL,
  `additional_qualification` int(11) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `physically_handicapped` tinyint(1) DEFAULT NULL,
  `ex_service_man` tinyint(1) DEFAULT NULL,
  `exempted_category` tinyint(1) DEFAULT NULL,
  `date_of_joining_in_present_college` date DEFAULT NULL,
  `pay_band` int(11) DEFAULT NULL,
  `band_pay` int(11) DEFAULT NULL,
  `grade_pay` int(11) DEFAULT NULL,
  `pan_number` int(11) DEFAULT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `date_of_superannuation` date DEFAULT NULL,
  `present_addresses` int(11) DEFAULT NULL,
  `permanent_addresses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `email_verification_code`, `password`, `has_details`, `hrms_code`, `name`, `date_of_birth`, `highest_educational_qualification`, `additional_qualification`, `designation`, `department`, `gender`, `category`, `physically_handicapped`, `ex_service_man`, `exempted_category`, `date_of_joining_in_present_college`, `pay_band`, `band_pay`, `grade_pay`, `pan_number`, `mobile_number`, `date_of_superannuation`, `present_addresses`, `permanent_addresses`) VALUES
(6, 'teacher0@gmail.com', 'true', '$2y$10$3sOoELdpm4Q45vxllpiBYOTBcwO5yAF8/9tRAVSKcWqitZ3SqPWTW', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_qualifications`
--
ALTER TABLE `additional_qualifications`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;