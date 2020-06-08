-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 02:46 PM
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
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
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
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `duty` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`duty`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `type`, `semester`, `date`, `subject`, `duty`) VALUES
(16, 'Exam One', 'Theory', 1, '2020-06-08', 'Physics', '{\"question_paper_setters\":[{\"teacher\":4},{\"teacher\":3}],\"answer_paper_checkers\":[\"1\",\"2\"]}');

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
  `addresses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `email_verification_code`, `password`, `one_time_password`, `has_details`, `hrms_code`, `name`, `date_of_birth`, `highest_educational_qualification`, `additional_qualification`, `designation`, `department`, `gender`, `category`, `physically_handicapped`, `ex_service_man`, `exempted_category`, `date_of_joining_in_service`, `date_of_joining_in_present_college`, `pay_band`, `band_pay`, `grade_pay`, `pan_number`, `mobile_number`, `date_of_superannuation`, `addresses`) VALUES
(1, 'teacher0@gmail.com', 'true', '$2y$10$Wsd67AHn42L336ZvbUJIvuSe6SMoHWnbjtJhMbM.pKU4RhtBi7BWu', '', 1, NULL, 'Teacher Zero', '2020-01-24', 'Post Doctoral', 'PG Diploma', 'Principal', 'Computer Science', 'Male', 'Unreserved', 0, 0, 0, '2020-01-24', '2020-01-24', '37400-67000', 1, 1, 1, 4294967295, '2020-01-24', '{\"present_address\":{\"house_number\":\"1234\",\"location\":\"Example Street\",\"village\":\"Demo Village\",\"post_office\":\"Demo Post Office\",\"police_station\":\"Demo Police Station\",\"pin_code\":\"741248\",\"district\":\"Demo District\",\"state\":\"Demo State\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}'),
(2, 'teacher1@gmail.com', 'true', '$2y$10$svj6cGfWK9booQ4Qc7grxu9vNvNcE1069XV2DDwGxgRBXkeVDpMci', NULL, 1, NULL, 'Teacher One', '2020-01-28', 'Post Doctoral', 'PG Diploma', 'Gr-D', 'Computer Science', 'Male', 'Unreserved', 0, 0, 0, '2020-01-28', '2020-01-28', '37400-67000', 1, 1, 1, 4294967295, '2020-01-28', '{\"present_address\":{\"house_number\":\"1234\",\"location\":\"Street Name\",\"village\":\"Village\",\"post_office\":\"Post Office\",\"police_station\":\"Police Station\",\"pin_code\":\"000001\",\"district\":\"District\",\"state\":\"State\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"Street Name\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}'),
(3, 'teacher2@gmail.com', 'true', '$2y$10$EX8URHpFFzMT/XPqqjf7y.jb1fT7HlySdBdWGZjs1nPg8fgcYxBzW', NULL, 1, NULL, 'Teacher Two', '2020-06-08', 'Post Doctoral', 'PG Diploma', 'Principal', 'Computer Science', 'Male', 'Unreserved', 0, 0, 0, '2020-06-08', '2020-06-08', '5400-25200', 1, 1, 1, 4294967295, '2020-06-08', '{\"present_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}'),
(4, 'teacher3@gmail.com', 'true', '$2y$10$CKTxBJ.UduYFxGY45CmYVurV7T8fft8iB8n1mbpsGeP8I4Z0mPytS', NULL, 1, NULL, 'Teacher Three', '2020-06-08', 'M. Phil.', '', 'Associate Professor', 'Mathematics', 'Male', 'Unreserved', 0, 0, 0, '2020-06-08', '2020-06-08', '5400-25200', 1, 1, 1, 4294967295, '2020-06-08', '{\"present_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"},\"permanent_address\":{\"house_number\":\"\",\"location\":\"\",\"village\":\"\",\"post_office\":\"\",\"police_station\":\"\",\"pin_code\":\"\",\"district\":\"\",\"state\":\"\"}}');

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
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `exams`
--
ALTER TABLE `exams`
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
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
