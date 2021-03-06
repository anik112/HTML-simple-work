-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 06:30 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(1, 1, '2020-11-04', '22:19:33', 1),
(2, 2, '2020-08-08', '12:09:16', 0),
(3, 3, '2020-08-08', '12:08:20', 1);

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
  `payments` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 2, 'Sultana rahaman', 'Hi'),
(2, 3, 2, 'Sultana rahaman', 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dues`
--

CREATE TABLE `tb_dues` (
  `id` int(11) NOT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `student` varchar(150) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `head` varchar(150) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `dve_vat` int(11) DEFAULT NULL,
  `vat_adjusted` int(11) DEFAULT NULL,
  `payable` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 2, 1);

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
(1, 1, 2, 'Sultana rahaman'),
(2, 3, 2, 'Sultana rahaman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification_list`
--

CREATE TABLE `tb_notification_list` (
  `friend_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `friend_name` varchar(30) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_notification_list`
--

INSERT INTO `tb_notification_list` (`friend_id`, `user_id`, `post_id`, `friend_name`, `content`) VALUES
(2, 1, 3, 'Sultana rahaman', 'comment'),
(2, 1, 3, 'Sultana rahaman', 'like');

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
(1, 1, 'Anik paul', 'New online payment method of our company', 'Please check it', '../images/postImage/online payment-scr-s.jpg', 0, ''),
(2, 1, 'Anik paul', '', '', '../images/6anik_pic.jpg', 0, ''),
(3, 1, 'Anik paul', '', '', '../images/90avatar.png', 0, ''),
(4, 1, 'Anik paul', 'asdasdasd', 'asdasdasd', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_preregstration`
--

CREATE TABLE `tb_preregstration` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(150) DEFAULT NULL,
  `credits` varchar(150) DEFAULT NULL,
  `mandatory` varchar(150) DEFAULT NULL,
  `taken` int(11) DEFAULT NULL,
  `adviser` varchar(150) DEFAULT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `student` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `current_sts` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 1, '');

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
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_info`
--

INSERT INTO `tb_user_info` (`id`, `sur_name`, `nick_name`, `mobile`, `email`, `birthday`, `gender`, `current_city`, `home_town`, `interested_in`, `languages`, `relationship`, `about_you`, `image`, `user_name`, `password`) VALUES
(1, 'Anik paul', '', '01826995639', 'paulanik112@gmail.com', '1997-01-08', 'male', 'Dhaka', 'Dhaka', 'female', 'Bangla', 'single ', 'Hi, I am anik. ', 0x2e2e2f696d616765732f39306176617461722e706e67, 'anik112', '@anik112'),
(2, 'Sultana rahaman', '', '01524136521', 'anikarehman1998@gmail.com', '2020-08-12', 'female ', 'Dhaka', 'Dhaka', 'male', 'Bangla', 'single ', 'Nothing to say', 0x2e2e2f696d616765732f39363733656630383262313162353363343038386335373266326433303035342e6a7067, 'sultana', 'sultana'),
(3, 'Ashikur rahaman', '', '01852365421', 'anikarehman19988@gmail.com', '2020-09-02', 'male', 'Dhaka', 'Dhaka', 'male', 'Bangla', 'single ', '', 0x2e2e2f696d616765732f30312e6a7067, 'ashikur', 'ashikur');

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
-- Indexes for table `tb_comments_list`
--
ALTER TABLE `tb_comments_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_comments_list`
--
ALTER TABLE `tb_comments_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_frends_list`
--
ALTER TABLE `tb_frends_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_likes_list`
--
ALTER TABLE `tb_likes_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user_gallery`
--
ALTER TABLE `tb_user_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
