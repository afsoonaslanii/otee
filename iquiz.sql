-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 06:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `admin_fname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin_lname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin_picture` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `admin_fname`, `admin_lname`, `gender`, `phone`, `email`, `admin_picture`, `user_id`) VALUES
(1, 'admin', 'afsoon', 'aslanii', 'Female', '09037380557', 'aslani.a7260@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `course_code` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `course_code`, `teacher_id`) VALUES
(1, 3954, 4),
(2, 3918, 5),
(5, 333, 6),
(7, 8888, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `course_code` int(11) NOT NULL,
  `course_status` varchar(1) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_code`, `course_status`) VALUES
(1, 'zaban', 3954, '1'),
(2, 'farsi', 3918, '0'),
(3, 'system amel', 333, '1'),
(5, 'shimi', 8888, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `exam_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `exam_date` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `exam_duration` int(11) NOT NULL,
  `passmark` int(11) NOT NULL,
  `re_exam` int(11) NOT NULL,
  `exam_status` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `exam_terms` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `class_id`, `exam_title`, `exam_date`, `exam_duration`, `passmark`, `re_exam`, `exam_status`, `exam_terms`) VALUES
(3, 2, 'farsi', '12/17/2018', 5, 20, 1, '0', 'farsi exam'),
(4, 1, 'zaban', '11/10/2017', 20, 20, 0, '1', ''),
(6, 5, 'os', '02/15/2018', 10, 20, 2, '1', 'its ok to all'),
(7, 5, 'operating system', '02/23/2018', 10, 20, 2, '1', 'moafagh bashin'),
(8, 7, 'shimi1', '03/03/2018', 10, 20, 1, '1', 'moafagh bashid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_answers`
--

CREATE TABLE `tbl_exam_answers` (
  `answer_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_exam_answers`
--

INSERT INTO `tbl_exam_answers` (`answer_id`, `exam_id`, `student_id`, `question_id`, `answer`) VALUES
(2, 3, 13, 6, 'chon k shod'),
(3, 3, 13, 6, 'noti'),
(4, 3, 13, 6, '3'),
(5, 3, 13, 6, '32'),
(6, 3, 13, 6, 'chon k shod'),
(7, 3, 13, 6, 'noti'),
(8, 3, 13, 6, '3'),
(9, 3, 13, 6, '32'),
(10, 3, 13, 6, 'chon k shod'),
(11, 3, 13, 6, 'noti'),
(12, 3, 13, 6, '3'),
(13, 3, 13, 6, '32'),
(14, 3, 13, 6, 'chon k shod'),
(15, 3, 13, 6, 'noti'),
(16, 3, 13, 6, '3'),
(17, 3, 13, 6, '32'),
(18, 3, 13, 6, 'chon k shod'),
(19, 3, 13, 6, 'noti'),
(20, 3, 13, 6, '3'),
(21, 3, 13, 6, '32'),
(22, 3, 13, 6, 'chon k shod'),
(23, 3, 13, 6, 'noti'),
(24, 3, 13, 6, '3'),
(25, 3, 13, 6, '32'),
(26, 3, 13, 6, 'chon k shod'),
(27, 3, 13, 6, 'noti'),
(28, 3, 13, 6, '3'),
(29, 3, 13, 6, '32'),
(30, 3, 13, 6, 'chon k shod'),
(31, 3, 13, 6, 'noti'),
(32, 3, 13, 6, '3'),
(33, 3, 13, 6, '32'),
(34, 3, 13, 6, 'chon k shod'),
(35, 3, 13, 6, 'noti'),
(36, 3, 13, 6, '3'),
(37, 3, 13, 6, '32'),
(38, 3, 13, 6, 'chon k shod'),
(39, 3, 13, 6, 'noti'),
(40, 3, 13, 6, '3'),
(41, 3, 13, 6, '32'),
(42, 3, 13, 6, 'chon k shod'),
(43, 3, 13, 6, 'noti'),
(44, 3, 13, 6, '3'),
(45, 3, 13, 6, '32'),
(46, 3, 13, 6, 'chon k shod'),
(47, 3, 13, 6, 'noti'),
(48, 3, 13, 6, '3'),
(49, 3, 13, 6, '32'),
(50, 3, 13, 6, 'chon k shod'),
(51, 3, 13, 6, 'noti'),
(52, 3, 13, 6, '3'),
(53, 3, 13, 6, '32'),
(54, 3, 13, 6, 'chon k shod'),
(55, 3, 13, 6, 'noti'),
(56, 3, 13, 6, '3'),
(57, 3, 13, 6, '32'),
(58, 3, 13, 6, 'chon k shod'),
(59, 3, 13, 6, 'noti'),
(60, 3, 13, 6, '3'),
(61, 3, 13, 6, '32'),
(62, 3, 13, 6, 'chon k shod'),
(63, 3, 13, 6, 'noti'),
(64, 3, 13, 6, '3'),
(65, 3, 13, 6, '32'),
(66, 3, 13, 6, 'chon k shod'),
(67, 3, 13, 6, 'noti'),
(68, 3, 13, 6, '3'),
(69, 3, 13, 6, '32'),
(70, 3, 13, 6, 'chon k shod'),
(71, 3, 13, 6, 'noti'),
(72, 3, 13, 6, '3'),
(73, 3, 13, 6, '32'),
(74, 3, 13, 6, 'chon k shod'),
(75, 3, 13, 6, 'noti'),
(76, 3, 13, 6, '3'),
(77, 3, 13, 6, '32'),
(78, 3, 13, 6, 'baraye inke'),
(79, 3, 13, 6, 'setiii'),
(80, 3, 13, 6, '4'),
(81, 3, 13, 6, '30'),
(82, 3, 13, 6, 'chon k shod'),
(83, 3, 13, 6, 'noti'),
(84, 3, 13, 6, '1'),
(85, 3, 13, 6, '40'),
(86, 3, 13, 6, 'chon k shod'),
(87, 3, 13, 6, 'noti'),
(88, 3, 13, 6, '1'),
(89, 3, 13, 6, '40'),
(90, 3, 13, 6, 'chon k shod'),
(91, 3, 13, 6, 'noti'),
(92, 3, 13, 6, '1'),
(93, 3, 13, 6, '40'),
(94, 3, 13, 6, 'chon k shod'),
(95, 3, 13, 6, 'noti'),
(96, 3, 13, 6, '3'),
(97, 3, 13, 6, '40'),
(98, 3, 13, 6, 'chon k shod'),
(99, 3, 13, 6, 'bitii'),
(100, 3, 13, 6, '3'),
(101, 3, 13, 6, '35'),
(102, 3, 13, 6, 'chon k shod'),
(103, 3, 13, 6, 'bitii'),
(104, 3, 13, 6, '3'),
(105, 3, 13, 6, '35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `option4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `exam_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(7, 3, 'chera ingone shod?', 'chon k shod', 'chera nashavad', 'zira', 'baraye inke', 'option1'),
(4, 3, 'chetorayi', 'khoobbbb', 'noti', 'bitii', 'setiii', 'option2'),
(5, 3, '2*2 = ?', '1', '2', '3', '4', 'option1'),
(6, 3, '6*5 = ?', '40', '30', '35', '32', 'option1'),
(8, 3, 'fel kodam ast?  ali amad', 'ast', 'amad', 'ali', 'kodam', 'option2'),
(9, 4, 'how are you today?', 'im ok', 'not good', 'bad', 'soso', 'option1'),
(10, 6, 'whats tol?', 'time to live', 'toto', 'titi', 'tete', 'option1'),
(11, 4, 'test mishavad?', 'bale', 'kheyr', 'chera', 'zira', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `student_fname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `student_lname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `student_picture` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `acc_stat` varchar(1) COLLATE utf8_persian_ci NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `username`, `student_fname`, `student_lname`, `gender`, `email`, `phone`, `student_picture`, `acc_stat`, `user_id`) VALUES
(20, 'ahmadrezai', 'ahmad', 'rezai', 'male', 'ahmadrezai@gmail.com', '012345', NULL, '1', 25),
(17, 'sepsep', 'sepide', 'mirakhorli', 'Female', 's.mir@gail.com', '0903735246', NULL, '1', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_st_class`
--

CREATE TABLE `tbl_st_class` (
  `st_class_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `status_student` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `take_date` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `retake_date` varchar(11) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_st_class`
--

INSERT INTO `tbl_st_class` (`st_class_id`, `class_id`, `exam_id`, `student_id`, `score`, `status_student`, `take_date`, `retake_date`) VALUES
(57, 5, 6, 17, '5', 'FAIL', '2018/04/11', '04/13/2018'),
(56, 1, 4, 14, '15', 'PASS', '2/15/2018', '2/16/2018'),
(53, 1, 3, 13, '5', 'FAIL', '2018/02/13', '02/13/2018'),
(54, 2, 3, 17, '20', 'PASS', '2018/02/13', '02/14/2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `teacher_fname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `teacher_lname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `teacher_picture` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `acc_stat` varchar(1) COLLATE utf8_persian_ci NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `username`, `teacher_fname`, `teacher_lname`, `gender`, `phone`, `email`, `teacher_picture`, `acc_stat`, `user_id`) VALUES
(4, 'hojat', 'hojat', 'aslani', 'Male', '0912222', 'aslani@yahoo.com', NULL, '1', 14),
(7, 'sarasara', 'sara', 'akbari', 'Female', '012345', 'sara@sara.com', NULL, '1', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_type` varchar(7) COLLATE utf8_persian_ci NOT NULL,
  `pointer` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `user_type`, `pointer`) VALUES
(1, 'admin', '123', 'afsoon', 'aslanii', 'admin', ''),
(2, 'stu', '123', 'افی', 'اصلانی', 'user', ''),
(3, '', '321', NULL, NULL, '', ''),
(4, 'babakhamidi', '0000', 'babak', 'hamidi', '', ''),
(7, 'haniyerazaghi', '0000', 'hanie', 'razaghi', 'teacher', 'a51HNNoV'),
(9, 'samane', '0000', 'samane', 'pak', 'teacher', 'Yeri71ln'),
(10, 'reza', '0000', 'reza', 'alizade', 'teacher', 'fhhsKUX3'),
(14, 'hojat', '123', 'hojat', 'aslani', 'teacher', 'WSTU2iEu'),
(26, 'sarasara', '0000', 'sara', 'akbari', 'teacher', 'Db8Znbrp'),
(25, 'ahmadrezai', '0000', 'ahmad', 'rezaii', 'student', 'RPIYFVso'),
(22, 'sepsep', '0000', 'sepide', 'mirakhorli', 'student', 'jQYla6UJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_exam_answers`
--
ALTER TABLE `tbl_exam_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_st_class`
--
ALTER TABLE `tbl_st_class`
  ADD PRIMARY KEY (`st_class_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_exam_answers`
--
ALTER TABLE `tbl_exam_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_st_class`
--
ALTER TABLE `tbl_st_class`
  MODIFY `st_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
