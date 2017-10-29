-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 10:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attend` varchar(255) DEFAULT NULL,
  `att_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `expences_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_name`, `start_date`, `comment`) VALUES
(1, 'First Term', '2016-04-01', 'first'),
(2, 'Mid Term', '2016-08-01', 'mid'),
(3, 'Final Term', '2016-12-01', 'final');

-- --------------------------------------------------------

--
-- Table structure for table `expences`
--

CREATE TABLE `expences` (
  `id` int(11) NOT NULL,
  `tbl_teacher_teacher_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `due_amount` decimal(10,0) NOT NULL,
  `exp_date` date NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gradelevels`
--

CREATE TABLE `gradelevels` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `gradepoints` varchar(250) NOT NULL,
  `gradefrom` varchar(250) NOT NULL,
  `gradeto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradelevels`
--

INSERT INTO `gradelevels` (`id`, `name`, `description`, `gradepoints`, `gradefrom`, `gradeto`) VALUES
(1, 'A+', 'A+ is the height grade', '100', '80', '100'),
(2, 'A', 'A is the lowest height of A+ grade', '100', '70', '79'),
(3, 'A-', 'A- is the lowest height of A grade', '100', '60', '69');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'Octobar'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `profession` varchar(256) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sayclass`
--

CREATE TABLE `sayclass` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `tbl_teacher_teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sayclass`
--

INSERT INTO `sayclass` (`id`, `class_name`, `tbl_teacher_teacher_id`) VALUES
(1, 'five', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sayrole`
--

CREATE TABLE `sayrole` (
  `id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sayrole`
--

INSERT INTO `sayrole` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `saytbl_teacher`
--

CREATE TABLE `saytbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `c_group_id` int(11) DEFAULT NULL,
  `teacher_code` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `apply_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saytbl_teacher`
--

INSERT INTO `saytbl_teacher` (`teacher_id`, `teacher_name`, `photo`, `email`, `gender`, `c_group_id`, `teacher_code`, `mobile`, `apply_time`) VALUES
(1, 'Hasan', 'img/2468a1b2bd.jpg', 'hasan@gmail.com ', 'Male', 1, '101', '01723054944', '2017-05-22'),
(2, 'Maruf', 'img/4a50153d92.png', 'maruf@gmail.com ', 'Male', 2, '102', '01723054947', '2017-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `sayuser`
--

CREATE TABLE `sayuser` (
  `id` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(257) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sayuser`
--

INSERT INTO `sayuser` (`id`, `username`, `password`, `role_id`, `gender`, `email`, `address`, `mobile`, `join_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Male', 'sayed@gmail.com', 'Rangpur', '01723054948', '2000-12-20'),
(2, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 2, 'Male', 'rasel@gmail.com', 'Dhaka', '01723054948', '2010-12-20'),
(3, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 3, 'Male', 'topu@gmail.com', 'khulna', '01723054948', '2008-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `say_book`
--

CREATE TABLE `say_book` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `publisher` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `say_book`
--

INSERT INTO `say_book` (`id`, `name`, `author`, `publisher`, `description`) VALUES
(1, 'CodeIgnier', 'Unknown', 'Unknown', 'book description'),
(2, 'Laravel', 'Unknown', 'Unknown', 'book description'),
(3, 'PHP', 'IDB-BISEW', 'IDB-BISEW press', 'book description');

-- --------------------------------------------------------

--
-- Table structure for table `say_classschedule`
--

CREATE TABLE `say_classschedule` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `say_classschedule`
--

INSERT INTO `say_classschedule` (`id`, `class_id`, `photo`) VALUES
(1, 1, 'img/6e8a58aac6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `say_c_group`
--

CREATE TABLE `say_c_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `say_c_group`
--

INSERT INTO `say_c_group` (`id`, `group_name`) VALUES
(1, 'Science'),
(2, 'Commerce'),
(3, 'Arts'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `say_dormitories`
--

CREATE TABLE `say_dormitories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `number_of_room` longtext NOT NULL,
  `dormdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `say_driver`
--

CREATE TABLE `say_driver` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `say_issue_book`
--

CREATE TABLE `say_issue_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `say_member`
--

CREATE TABLE `say_member` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `say_member`
--

INSERT INTO `say_member` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'sayed', 'sayed@gmail.com', '01723054948', 'Dhaka'),
(2, 'kader', 'kader@gmail.com', '01723054949', 'Rangpur'),
(3, 'Hasan', 'hasan@gmail.com', '01723054945', 'Gangachara');

-- --------------------------------------------------------

--
-- Table structure for table `say_noticeboard`
--

CREATE TABLE `say_noticeboard` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `newsfor` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `newsdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `say_payment`
--

CREATE TABLE `say_payment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `paid_amount` decimal(10,0) NOT NULL,
  `due_amount` decimal(10,0) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `say_session`
--

CREATE TABLE `say_session` (
  `id` int(11) NOT NULL,
  `session_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `say_session`
--

INSERT INTO `say_session` (`id`, `session_name`) VALUES
(1, '2011-2012'),
(2, '2012-2013'),
(3, '2013-2014'),
(4, '2014-2015'),
(5, '2015-2016'),
(6, '2016-2017'),
(7, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `say_student`
--

CREATE TABLE `say_student` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `address` varchar(256) NOT NULL,
  `birth_day` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `class_id` varchar(11) NOT NULL,
  `roll` varchar(45) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `apply_date` date NOT NULL,
  `session_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `say_subject`
--

CREATE TABLE `say_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `say_subject`
--

INSERT INTO `say_subject` (`id`, `subject_name`) VALUES
(1, 'Bangla'),
(2, 'English'),
(3, 'Math'),
(4, 'Islamic Study'),
(5, 'Sociology'),
(6, 'Physic'),
(7, 'Chamestry'),
(8, 'General Konledge');

-- --------------------------------------------------------

--
-- Table structure for table `say_transportation`
--

CREATE TABLE `say_transportation` (
  `id` int(11) NOT NULL,
  `vehicle_name` varchar(45) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `route_name` varchar(45) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `source_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `source_name`) VALUES
(1, 'Monthly fee'),
(2, 'Exam fee'),
(3, 'Fine'),
(4, 'Library Charge '),
(5, 'Salary'),
(6, 'Admission fee'),
(7, 'Picnic'),
(8, 'Transport'),
(9, 'Gas Bill'),
(10, 'Water Bill'),
(11, 'Electric Bill'),
(12, 'Building Rent'),
(13, 'Classroom Equipments'),
(14, 'Classroom Decorations'),
(15, 'Inventory Purchase'),
(16, 'Exam Accessories'),
(17, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `s_promotion`
--

CREATE TABLE `s_promotion` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `p_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expences`
--
ALTER TABLE `expences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradelevels`
--
ALTER TABLE `gradelevels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sayclass`
--
ALTER TABLE `sayclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sayrole`
--
ALTER TABLE `sayrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saytbl_teacher`
--
ALTER TABLE `saytbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `sayuser`
--
ALTER TABLE `sayuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_book`
--
ALTER TABLE `say_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_classschedule`
--
ALTER TABLE `say_classschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_c_group`
--
ALTER TABLE `say_c_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_dormitories`
--
ALTER TABLE `say_dormitories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_driver`
--
ALTER TABLE `say_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_issue_book`
--
ALTER TABLE `say_issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_member`
--
ALTER TABLE `say_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_noticeboard`
--
ALTER TABLE `say_noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_payment`
--
ALTER TABLE `say_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_session`
--
ALTER TABLE `say_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_student`
--
ALTER TABLE `say_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_subject`
--
ALTER TABLE `say_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `say_transportation`
--
ALTER TABLE `say_transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_promotion`
--
ALTER TABLE `s_promotion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expences`
--
ALTER TABLE `expences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradelevels`
--
ALTER TABLE `gradelevels`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sayclass`
--
ALTER TABLE `sayclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sayrole`
--
ALTER TABLE `sayrole`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `saytbl_teacher`
--
ALTER TABLE `saytbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sayuser`
--
ALTER TABLE `sayuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `say_book`
--
ALTER TABLE `say_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `say_classschedule`
--
ALTER TABLE `say_classschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `say_c_group`
--
ALTER TABLE `say_c_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `say_dormitories`
--
ALTER TABLE `say_dormitories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `say_driver`
--
ALTER TABLE `say_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `say_issue_book`
--
ALTER TABLE `say_issue_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `say_member`
--
ALTER TABLE `say_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `say_noticeboard`
--
ALTER TABLE `say_noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `say_payment`
--
ALTER TABLE `say_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `say_session`
--
ALTER TABLE `say_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `say_student`
--
ALTER TABLE `say_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `say_subject`
--
ALTER TABLE `say_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `say_transportation`
--
ALTER TABLE `say_transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `s_promotion`
--
ALTER TABLE `s_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
