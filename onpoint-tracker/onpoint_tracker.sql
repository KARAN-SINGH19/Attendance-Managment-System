-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 05:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onpoint_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_student_id` int(11) NOT NULL,
  `attendance_class_id` int(11) NOT NULL,
  `attendance_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_student_id`, `attendance_class_id`, `attendance_status`) VALUES
(2, 9, 4, 'P'),
(4, 13, 4, 'P'),
(5, 14, 4, 'P'),
(6, 9, 5, 'L'),
(8, 13, 5, 'A'),
(9, 14, 5, 'P'),
(10, 9, 6, 'P'),
(12, 13, 6, 'L'),
(13, 14, 6, 'P'),
(14, 11, 7, 'L'),
(15, 15, 7, 'L'),
(16, 9, 8, 'P'),
(18, 13, 8, 'P'),
(19, 14, 8, 'P'),
(20, 9, 9, 'P'),
(22, 13, 9, 'P'),
(23, 14, 9, 'P'),
(24, 16, 9, 'L'),
(25, 9, 10, 'P'),
(27, 13, 10, 'A'),
(28, 14, 10, 'P'),
(29, 16, 10, 'A'),
(30, 9, 11, 'P'),
(31, 13, 11, 'A'),
(32, 14, 11, 'L'),
(33, 16, 11, 'A'),
(34, 9, 14, 'P'),
(35, 13, 14, 'A'),
(36, 14, 14, 'P'),
(37, 16, 14, 'A'),
(38, 17, 15, 'A'),
(39, 9, 16, 'P'),
(40, 13, 16, 'P'),
(41, 14, 16, 'L'),
(42, 16, 16, 'A'),
(43, 9, 17, 'P'),
(44, 13, 17, 'L'),
(45, 14, 17, 'P'),
(46, 16, 17, 'L'),
(47, 9, 18, 'P'),
(48, 13, 18, 'P'),
(49, 14, 18, 'P'),
(50, 16, 18, 'P'),
(51, 9, 19, 'P'),
(52, 13, 19, 'A'),
(53, 14, 19, 'P'),
(54, 16, 19, 'P'),
(55, 9, 20, 'P'),
(56, 13, 20, 'P'),
(57, 14, 20, 'P'),
(58, 16, 20, 'A'),
(59, 9, 21, 'P'),
(60, 13, 21, 'P'),
(61, 14, 21, 'L'),
(62, 16, 21, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_date` date NOT NULL,
  `class_time` time NOT NULL,
  `class_location` varchar(50) NOT NULL,
  `class_module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_date`, `class_time`, `class_location`, `class_module_id`) VALUES
(4, 'Introudction to scrum', '2023-12-03', '09:30:00', 'Room 5', 1),
(5, 'Sprint Review', '2023-12-06', '11:30:00', 'Computer Lab 5', 1),
(6, 'Sprint Retrospective ', '2023-12-05', '09:30:00', 'Lab 2', 1),
(7, 'Intro to ERP', '2023-12-05', '09:30:00', 'Classroom 1', 2),
(8, 'Queues', '2023-12-05', '09:30:00', 'Room 2', 3),
(9, 'Scrum introduction', '2023-12-05', '09:30:00', 'Room 5', 3),
(10, 'Python Classes', '2023-12-07', '09:30:00', 'Lab 2', 4),
(11, 'Machine Learning', '2023-12-12', '11:30:00', 'Lab 3', 4),
(12, 'Python intro', '2023-12-09', '09:30:00', 'room 4', 7),
(13, 'ERP', '2023-12-09', '09:30:00', 'Room 5', 2),
(14, 'Scrum introduction', '2023-12-09', '09:30:00', 'Room 5', 3),
(15, 'Python Intro', '2023-12-10', '09:30:00', 'Lab 10', 7),
(16, 'Scrum introduction', '2023-12-13', '09:30:00', 'Room 5', 1),
(17, 'Sprint Review', '2023-12-14', '09:30:00', 'Lab 2', 1),
(18, 'JS', '2023-12-13', '09:30:00', 'Room 5', 5),
(19, 'HTML', '2023-12-14', '09:30:00', 'Lab 2', 5),
(20, 'CSS', '2023-12-15', '09:30:00', 'Room 5', 5),
(21, 'Definition of Done', '2023-12-15', '10:30:00', 'Lab 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_manager_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_manager_id`) VALUES
(2, 'Software Engineering - Yr 3', 6),
(3, 'Computing - Yr 3', 10),
(4, 'Machine Learning', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `course_manager_name`
-- (See below for the actual view)
--
CREATE TABLE `course_manager_name` (
`course_id` int(10)
,`course_name` varchar(50)
,`course_manager_id` int(10)
,`user_fname` varchar(50)
,`user_lname` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `leave_id` int(11) NOT NULL,
  `leave_student_id` int(11) DEFAULT NULL,
  `leave_module_id` int(11) DEFAULT NULL,
  `leave_reason` varchar(255) DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_status` char(1) DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`leave_id`, `leave_student_id`, `leave_module_id`, `leave_reason`, `leave_date`, `leave_status`) VALUES
(1, 9, 4, 'sick', '2023-11-28', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(50) DEFAULT NULL,
  `module_course_id` int(11) NOT NULL,
  `module_tutor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_course_id`, `module_tutor_id`) VALUES
(1, 'SWE6202 - Agile Programming', 2, 6),
(2, 'SEC6202 - ERP', 3, 10),
(3, 'SWE6203 - Data Structures', 2, 10),
(4, 'SWE5201 - Python Programming', 2, 6),
(5, 'SWE4202 - Web Development', 2, 6),
(6, 'SWE4203 - Networking Fundamentals', 2, 6),
(7, 'Python', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_title` varchar(255) NOT NULL,
  `notification_messsage` varchar(255) DEFAULT NULL,
  `notification_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_title`, `notification_messsage`, `notification_date`) VALUES
(5, 'Clas is gone', 'SWE6202 Class cancelled', '2023-12-15'),
(6, 'All classes are cancelled tommrow due to bad weather.', 'Weather Warning', '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Student'),
(3, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role_id`, `user_course_id`) VALUES
(6, 'Renuka', 'Nyayadish', 'renuka@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, 2),
(8, 'Mohammed', 'Fazal', 'fazal@bolton.ac.uk', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2),
(9, 'Iftekhar', 'Ahmed', 'iftekharahmed2003@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 2),
(10, 'Rehna ', 'Kalam', 'rehnakalam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, 2),
(11, 'Zoe', 'Varma', 'zoe@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 3),
(13, 'Muhammed', 'Zaid', 'zaid@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2),
(14, 'Abrar', 'Talpur', 'abrar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2),
(15, 'Karandeep', 'Singh', 'karan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 3),
(16, 'Vivek', 'Kumar', 'vivek@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 2),
(17, 'Mohammed', 'Ahmed', 'ahmed@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 4);

-- --------------------------------------------------------

--
-- Structure for view `course_manager_name`
--
DROP TABLE IF EXISTS `course_manager_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_manager_name`  AS SELECT `course`.`course_id` AS `course_id`, `course`.`course_name` AS `course_name`, `course`.`course_manager_id` AS `course_manager_id`, `user`.`user_fname` AS `user_fname`, `user`.`user_lname` AS `user_lname` FROM (`course` join `user`) WHERE `course`.`course_manager_id` = `user`.`user_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendance_class_id` (`attendance_class_id`),
  ADD KEY `attendance_student_id` (`attendance_student_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_module_id` (`class_module_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_manager_id` (`course_manager_id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `leave_student_id` (`leave_student_id`),
  ADD KEY `leave_module_id` (`leave_module_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `module_tutor_id` (`module_tutor_id`),
  ADD KEY `module_course_id` (`module_course_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id` (`user_role_id`),
  ADD KEY `user_course_id` (`user_course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`attendance_class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`attendance_student_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`class_module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`course_manager_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD CONSTRAINT `leave_request_ibfk_1` FOREIGN KEY (`leave_student_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `leave_request_ibfk_2` FOREIGN KEY (`leave_module_id`) REFERENCES `module` (`module_id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`module_tutor_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`module_course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
