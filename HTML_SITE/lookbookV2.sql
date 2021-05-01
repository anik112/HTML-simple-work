-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 11:01 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lookbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_active_status`
--

CREATE TABLE `tb_active_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_activity_date` date NOT NULL,
  `last_activity_time` time NOT NULL,
  `login_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_active_status`
--

INSERT INTO `tb_active_status` (`id`, `user_id`, `last_activity_date`, `last_activity_time`, `login_status`) VALUES
(1, 1, '2021-05-02', '02:10:39', 1),
(2, 2, '2020-08-08', '12:09:16', 0),
(3, 3, '2020-08-08', '12:08:20', 1),
(4, 10, '2021-04-26', '08:53:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_billing`
--

CREATE TABLE `tb_billing` (
  `id` int(11) NOT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `student` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `total_outstanding` float DEFAULT NULL,
  `total_payable` float DEFAULT NULL,
  `total_paid` float DEFAULT NULL,
  `dues` float DEFAULT NULL,
  `payments` float DEFAULT NULL,
  `vat_amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `paidDate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat_list`
--

CREATE TABLE `tb_chat_list` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `friend_id` int(20) NOT NULL,
  `friend_name` varchar(150) DEFAULT NULL,
  `sending_text` varchar(255) DEFAULT NULL,
  `timestamp` varchar(150) NOT NULL,
  `in_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_chat_list`
--

INSERT INTO `tb_chat_list` (`id`, `user_id`, `user_name`, `friend_id`, `friend_name`, `sending_text`, `timestamp`, `in_out`) VALUES
(1, 1, 'anik', 2, 'shuvo', 'Hi..', '12/04.2021', 0),
(3, 1, 'Anik Paul', 2, '', 'gfsdfd', '0404-2929-2121 0909:19:53pm', 1),
(4, 1, 'Anik Paul', 2, '', 'gfsdfd', '0404-2929-2121 0909:23:09pm', 1),
(5, 1, 'Anik Paul', 2, '', 'asdasd sdfdf', '0404-2929-2121 0909:27:40pm', 1),
(6, 1, 'Anik Paul', 2, '', 'ghdfgsdsd', '29/04/21 09:28:48pm', 1),
(7, 1, 'Anik Paul', 2, '', 'ewrwerea', '29/04/21 09:29:05pm', 1),
(8, 1, 'Anik Paul', 2, '', 'zcxzxasd', '29/04/21 09:29:11pm', 1),
(9, 1, 'Anik Paul', 2, '', 'ewrwerea', '29/04/21 09:29:19pm', 1),
(10, 1, 'Anik Paul', 3, '', 'ghdfgsdsd', '29/04/21 09:32:40pm', 1),
(11, 1, 'Anik Paul', 3, '', 'zcxzxasd', '29/04/21 09:40:28pm', 1),
(12, 1, 'Anik Paul', 3, '', 'asdasd', '29/04/21 09:43:49pm', 1),
(13, 1, 'Anik Paul', 2, '', 'gfsdfd', '29/04/21 09:44:04pm', 1),
(14, 1, 'Anik Paul', 2, '', 'Hi , kemon achis?', '29/04/21 09:48:16pm', 1),
(15, 1, 'Anik Paul', 3, '', 'Ki re kothay tui?', '29/04/21 09:48:41pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments_list`
--

CREATE TABLE `tb_comments_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comments_list`
--

INSERT INTO `tb_comments_list` (`id`, `post_id`, `user_id`, `user_name`, `content`) VALUES
(1, 20, 1, 'Anik paul1', 'xvxcvxcv'),
(2, 19, 1, 'Anik Paul', 'asdasd'),
(3, 20, 10, 'Shuvo vvhomik', 'jhjgkfhjf'),
(4, 31, 10, 'Shuvo vvhomik', 'fsdfs'),
(5, 31, 10, 'Shuvo vvhomik', 'adad'),
(6, 21, 1, 'Anik Paul', 'hi.. !');

-- --------------------------------------------------------

--
-- Table structure for table `tb_compltd_semester`
--

CREATE TABLE `tb_compltd_semester` (
  `id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `studentID` varchar(150) NOT NULL,
  `credits` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_compltd_semester`
--

INSERT INTO `tb_compltd_semester` (`id`, `semester`, `studentID`, `credits`) VALUES
(1, 1, '182010', 15.5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_coures_info`
--

CREATE TABLE `tb_coures_info` (
  `course_id` varchar(150) NOT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `credits` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_coures_info`
--

INSERT INTO `tb_coures_info` (`course_id`, `course_name`, `credits`) VALUES
('CSE 303', 'Sociology', '3.4'),
('CSE 307', 'Data Communication', '3.0'),
('CSE 308', 'Data Communication Lab', '3.0'),
('CSE 400', 'Capstone Project/Thesis', '2.0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dues`
--

CREATE TABLE `tb_dues` (
  `id` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `student` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `head` varchar(150) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `dve_vat` int(11) DEFAULT NULL,
  `vat_adjusted` int(11) DEFAULT NULL,
  `payable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dues`
--

INSERT INTO `tb_dues` (`id`, `semester`, `student`, `adviser`, `date`, `head`, `amount`, `discount`, `dve_vat`, `vat_adjusted`, `payable`) VALUES
(4, 0, '182010', 'anik', '24/02/2021', 'Semester fee', 5000, 0, 0, 10, 5010),
(5, 1, '182010', 'anik', '12/01/2021', 'Semester fee', 10000, 0, 0, 0, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_frends_list`
--

CREATE TABLE `tb_frends_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `friends_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_frends_list`
--

INSERT INTO `tb_frends_list` (`id`, `user_id`, `friends_id`) VALUES
(3, 2, 1),
(4, 1, 2),
(5, 1, 3),
(8, 10, 2),
(9, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_likes_list`
--

CREATE TABLE `tb_likes_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_likes_list`
--

INSERT INTO `tb_likes_list` (`id`, `post_id`, `user_id`, `user_name`) VALUES
(1, 19, 1, 'Anik paul1'),
(2, 20, 1, 'Anik paul1'),
(3, 20, 1, 'Anik paul1'),
(4, 7, 1, 'Anik paul1'),
(5, 8, 1, 'Anik paul1'),
(6, 6, 1, 'Anik paul1'),
(7, 19, 1, 'Anik paul1'),
(8, 20, 1, 'Anik Paul'),
(9, 8, 1, 'Anik Paul'),
(10, 21, 1, 'Anik Paul'),
(11, 21, 10, 'Shuvo vvhomik'),
(12, 31, 10, 'Shuvo vvhomik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification_list`
--

CREATE TABLE `tb_notification_list` (
  `id` int(11) NOT NULL,
  `friend_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `friend_name` varchar(30) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_notification_list`
--

INSERT INTO `tb_notification_list` (`id`, `friend_id`, `user_id`, `post_id`, `friend_name`, `content`) VALUES
(1, 2, 1, 3, 'Sultana rahaman', 'comment'),
(2, 2, 1, 3, 'Sultana rahaman', 'like'),
(3, 10, 2, 0, 'Shuvo vvhomik', ' is connect with you. !'),
(4, 10, 1, 0, 'Shuvo vvhomik', ' is connect with you. !');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payments`
--

CREATE TABLE `tb_payments` (
  `id` int(11) NOT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `student` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `mr_no` varchar(150) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `cheque_no` varchar(150) DEFAULT NULL,
  `comments` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `imsge` varchar(100) NOT NULL,
  `likes` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`id`, `user_id`, `user_name`, `title`, `content`, `imsge`, `likes`, `comment`) VALUES
(6, 1, 'Anik paul1', '', 'asdasd', './images/mailSing.jpg', 0, ''),
(7, 1, 'Anik paul1', '', 'Hi, i am anik', '../images/44ioi 146.JPG', 0, ''),
(8, 1, 'Anik paul1', '', 'hfghfgh', '../images/9673ef082b11b53c4088c572f2d30054.jpg', 0, ''),
(19, 1, 'Anik paul1', '', 'asdasd', './images/182015010-Pranta paul.jpg', 0, '0'),
(20, 1, 'Anik paul1', '', 'tyurty', './images/Untitled Diagram.png', 0, '0'),
(21, 1, 'Anik Paul', '', 'sdfsdfsd', 'C:UserscarevDocuments/Happy-Pohela-Boishakh.jpg', 0, '0'),
(22, 10, 'Shuvo vvhomik', '', 'sdasdas', 'C:UserscarevDocuments/1618382860896.jpeg', 0, '0'),
(23, 10, 'Shuvo vvhomik', '', 'dfsdf', 'C:/Users/carev/Documents/Pohela-Boishakh-2019-Picture.jpg', 0, '0'),
(24, 10, 'Shuvo vvhomik', '', 'kjkjo', '../image/Pohela-Boishakh-2019-Picture.jpg', 0, '0'),
(25, 10, 'Shuvo vvhomik', '', 'bfbdf', '../images/1618382860896.jpeg', 0, '0'),
(26, 10, 'Shuvo vvhomik', '', 'bfbdf', '../images/1618382860896.jpeg', 0, '0'),
(27, 10, 'Shuvo vvhomik', '', 'lk;ljo', '../images/PRP_3318.JPG', 0, '0'),
(28, 10, 'Shuvo vvhomik', '', '', '../images/20160730_175557.jpg', 0, '0'),
(29, 10, 'Shuvo vvhomik', '', 'dfg', '../../images/20160730_175557.jpg', 0, '0'),
(30, 10, 'Shuvo vvhomik', '', '', '.../images/20160730_175557.jpg', 0, '0'),
(31, 10, 'Shuvo vvhomik', '', '', './images/20160730_175557.jpg', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_preregstration`
--

CREATE TABLE `tb_preregstration` (
  `id` int(11) NOT NULL,
  `course_id` varchar(150) DEFAULT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `credits` varchar(150) DEFAULT NULL,
  `mandatory` varchar(150) DEFAULT NULL,
  `taken` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `student` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_preregstration`
--

INSERT INTO `tb_preregstration` (`id`, `course_id`, `course_name`, `credits`, `mandatory`, `taken`, `adviser`, `semester`, `student`) VALUES
(1, 'CSE 303', 'Sociology', '3.4', 'NO', 'YES', 'Anik', 1, 1),
(2, 'CSE 307', 'Data Communication', '3.0', 'NO', 'YES', 'Anik', 1, 1),
(3, 'CSE 308', 'Data Communication Lab', '3.0', 'NO', 'YES', 'Anik', 1, 1),
(4, 'CSE 303', 'Sociology', '3.4', 'NO', 'YES', 'Anik', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_schedule`
--

CREATE TABLE `tb_schedule` (
  `id` int(11) NOT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `student` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `section` varchar(150) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `times` varchar(15) DEFAULT NULL,
  `room_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_studied_info`
--

CREATE TABLE `tb_studied_info` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `course` varchar(150) NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `result` varchar(11) NOT NULL,
  `student` int(11) NOT NULL,
  `cradit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_studied_info`
--

INSERT INTO `tb_studied_info` (`id`, `name`, `location`, `department`, `cgpa`, `semester`, `course`, `course_title`, `type`, `result`, `student`, `cradit`) VALUES
(2, 'Anik paul1', NULL, NULL, 1.5, 1, 'CSE 303', 'Sociology', 'GED', 'A-', 182010, 3.5),
(3, 'Anik paul1', NULL, NULL, 1.5, 2, 'CSE 304', 'Sociology aa', 'GED', 'A+', 182010, 3.5),
(4, 'Anik paul1', NULL, NULL, 1, 1, 'CSE 303', 'Sociology ab', 'GED', 'A-', 182010, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_teacher_evalution`
--

CREATE TABLE `tb_teacher_evalution` (
  `id` int(11) NOT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `student` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `course_teacher` varchar(150) DEFAULT NULL,
  `section` varchar(15) DEFAULT NULL,
  `evaluate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_about`
--

CREATE TABLE `tb_user_about` (
  `id` int(11) NOT NULL,
  `nick_name` varchar(200) DEFAULT NULL,
  `intro` varchar(250) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `current_city` varchar(50) DEFAULT NULL,
  `home_town` varchar(50) DEFAULT NULL,
  `interested_in` varchar(30) DEFAULT NULL,
  `languages` varchar(10) DEFAULT NULL,
  `relationship` varchar(10) DEFAULT NULL,
  `religious` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_about`
--

INSERT INTO `tb_user_about` (`id`, `nick_name`, `intro`, `mobile`, `email`, `birthday`, `gender`, `current_city`, `home_town`, `interested_in`, `languages`, `relationship`, `religious`) VALUES
(1, 'Anik paul', 'hgf', '01826995639', 'paulanik112@gmail.com', '1997-01-08', 'male', 'Dhaka', 'Dhaka', 'female', 'Bangla', 'single ', 'hg'),
(2, 'Sultana rahaman', 'jhj', '01524136521', 'anikarehman1998@gmail.com', '2020-08-12', 'femal', 'Dhaka', 'Dhaka', 'male', 'Bangla', 'single ', 'sultana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_gallery`
--

CREATE TABLE `tb_user_gallery` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_gallery`
--

INSERT INTO `tb_user_gallery` (`id`, `user_id`, `images`) VALUES
(2, 1, '../images/postImage/online payment-scr-s.jpg'),
(3, 1, '../images/6anik_pic.jpg'),
(4, 1, '../images/90avatar.png'),
(5, 2, '../images/9673ef082b11b53c4088c572f2d30054.jpg'),
(6, 3, '../images/01.jpg'),
(9, 1, '../images/Happy-Pohela-Boishakh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_info`
--

CREATE TABLE `tb_user_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sur_name` varchar(30) NOT NULL,
  `nick_name` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `birthday` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `current_city` varchar(30) NOT NULL,
  `home_town` varchar(30) DEFAULT NULL,
  `interested_in` varchar(10) DEFAULT NULL,
  `languages` varchar(10) NOT NULL,
  `relationship` varchar(10) NOT NULL,
  `about_you` varchar(200) DEFAULT NULL,
  `image` blob NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `runing_semester` int(40) NOT NULL,
  `student_id` varchar(150) NOT NULL DEFAULT '0',
  `image_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_info`
--

INSERT INTO `tb_user_info` (`id`, `sur_name`, `nick_name`, `mobile`, `email`, `birthday`, `gender`, `current_city`, `home_town`, `interested_in`, `languages`, `relationship`, `about_you`, `image`, `user_name`, `password`, `runing_semester`, `student_id`, `image_url`) VALUES
(1, 'Anik Paul', 'pp', '01826995639', 'Paulanik112@gmail.com', '2021-12-31', 'male', 'Dhaka', 'Dhaka', 'female', 'Bangla', 'married', 'HI i am anik !!, Say with me.', '', 'anik112', '@anik112', 1, '182010', '../images/anik_pic.jpg'),
(2, 'Sultana rahaman', '', '01524136521', 'anikarehman1998@gmail.com', '2020-08-12', 'female ', 'Dhaka', 'Dhaka', 'male', 'Bangla', 'single ', 'Nothing to say', 0x2e2e2f696d616765732f39363733656630383262313162353363343038386335373266326433303035342e6a7067, 'sultana', 'sultana', 1, '182010', ''),
(3, 'Ashikur rahaman', '', '01852365421', 'anikarehman19988@gmail.com', '2020-09-02', 'male', 'Dhaka', 'Dhaka', 'male', 'Bangla', 'single ', '', 0x2e2e2f696d616765732f30312e6a7067, 'ashikur', 'ashikur', 1, '182012', ''),
(10, 'Shuvo vvhomik', 'PP', '01826995630', 'shuvra_sss@yahoo.com', '2021-12-30', 'male', 'Dhaka', 'Dhaka', 'male', 'English', 'single ', '', '', 'shuvo1', 'shuvo1', 1, '182015', '../images/Pohela-Boishakh-2019-Picture.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_work_info`
--

CREATE TABLE `tb_work_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `company_location` varchar(250) DEFAULT NULL,
  `current_status` varchar(150) DEFAULT NULL,
  `start_date` varchar(150) DEFAULT NULL,
  `end_date` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_active_status`
--
ALTER TABLE `tb_active_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_billing`
--
ALTER TABLE `tb_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_chat_list`
--
ALTER TABLE `tb_chat_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_comments_list`
--
ALTER TABLE `tb_comments_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_compltd_semester`
--
ALTER TABLE `tb_compltd_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_coures_info`
--
ALTER TABLE `tb_coures_info`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tb_dues`
--
ALTER TABLE `tb_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_frends_list`
--
ALTER TABLE `tb_frends_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_likes_list`
--
ALTER TABLE `tb_likes_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_notification_list`
--
ALTER TABLE `tb_notification_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_preregstration`
--
ALTER TABLE `tb_preregstration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_studied_info`
--
ALTER TABLE `tb_studied_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_teacher_evalution`
--
ALTER TABLE `tb_teacher_evalution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_about`
--
ALTER TABLE `tb_user_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_gallery`
--
ALTER TABLE `tb_user_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_work_info`
--
ALTER TABLE `tb_work_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_active_status`
--
ALTER TABLE `tb_active_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_billing`
--
ALTER TABLE `tb_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_chat_list`
--
ALTER TABLE `tb_chat_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_comments_list`
--
ALTER TABLE `tb_comments_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_compltd_semester`
--
ALTER TABLE `tb_compltd_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dues`
--
ALTER TABLE `tb_dues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_frends_list`
--
ALTER TABLE `tb_frends_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_likes_list`
--
ALTER TABLE `tb_likes_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_notification_list`
--
ALTER TABLE `tb_notification_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_preregstration`
--
ALTER TABLE `tb_preregstration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_studied_info`
--
ALTER TABLE `tb_studied_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user_gallery`
--
ALTER TABLE `tb_user_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_active_status`
--
ALTER TABLE `tb_active_status`
  ADD CONSTRAINT `tb_active_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_comments_list`
--
ALTER TABLE `tb_comments_list`
  ADD CONSTRAINT `tb_comments_list_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tb_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_comments_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_frends_list`
--
ALTER TABLE `tb_frends_list`
  ADD CONSTRAINT `tb_frends_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_likes_list`
--
ALTER TABLE `tb_likes_list`
  ADD CONSTRAINT `tb_likes_list_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tb_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_likes_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD CONSTRAINT `tb_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_user_gallery`
--
ALTER TABLE `tb_user_gallery`
  ADD CONSTRAINT `tb_user_gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user_info` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
