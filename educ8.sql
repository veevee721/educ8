-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 01:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educ8`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'foreign key from user table',
  `action` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `userID`, `action`, `date`) VALUES
(1, 1, 'Added Class', '2019-10-17 14:49:29'),
(2, 1, 'Added Class', '2019-10-17 14:50:14'),
(3, 1, 'Archived Class', '2019-10-17 15:03:08'),
(4, 1, 'Restored Class', '2019-10-17 15:12:49'),
(5, 1, 'Archived Class', '2019-10-17 15:12:55'),
(6, 1, 'Restored Class', '2019-10-17 15:15:35'),
(7, 1, 'Archived Class', '2019-10-17 17:40:10'),
(8, 1, 'Restored Class', '2019-10-17 17:40:24'),
(9, 1, 'Updated Class', '2019-10-17 17:58:03'),
(10, 1, 'Updated Class', '2019-10-17 17:59:35'),
(11, 1, 'Updated Class', '2019-10-17 18:00:43'),
(12, 1, 'Added Class', '2019-10-21 18:31:07'),
(13, 1, 'Add Lesson to the Class', '2019-10-21 19:28:12'),
(14, 1, 'Archived a Lesson in the Class', '2019-10-21 19:31:37'),
(15, 1, 'Activated a Lesson in the Class', '2019-10-21 19:32:36'),
(16, 1, 'Archived a Lesson in the Class', '2019-10-21 19:32:49'),
(17, 1, 'Activated a Lesson in the Class', '2019-10-21 19:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL COMMENT 'random class code',
  `owner` int(11) NOT NULL COMMENT 'foreign key from user table',
  `class` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - archive, 1 - active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `code`, `owner`, `class`, `status`) VALUES
(1, '2zbbPRgTKf', 1, 'Hello World!', 1),
(2, 'RJJ2cZ6aYM', 1, 'Sample Class', 1),
(3, 'F1H1UY6UGs', 1, 'new class', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `classID` int(11) NOT NULL COMMENT 'foreign key from class table',
  `lesson` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - archived, 1 - active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `classID`, `lesson`, `status`) VALUES
(1, 1, 'Addition of Two Variables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `classID` int(11) NOT NULL COMMENT 'foreign key from class table',
  `userID` int(11) NOT NULL COMMENT 'foreign key from user table',
  `status` int(11) NOT NULL COMMENT '0 - pending, 1 - active, 2 - archive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `classID`, `userID`, `status`) VALUES
(1, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'foreign key from user table',
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0 - male, 1 - female',
  `bdate` varchar(10) NOT NULL,
  `grade` int(11) NOT NULL,
  `image` text NOT NULL COMMENT 'filename of image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `userID`, `email`, `fname`, `lname`, `gender`, `bdate`, `grade`, `image`) VALUES
(1, 4, 'student1@gmail.com', 'student', 'one', 1, '2000-03-02', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'foreign key from user table',
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0 - male, 1 - female',
  `bdate` varchar(10) NOT NULL,
  `image` text NOT NULL COMMENT 'filename of image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `userID`, `email`, `fname`, `lname`, `gender`, `bdate`, `image`) VALUES
(1, 1, 'teacher1@gmail.com', 'as', 'as', 0, '2222-02-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '0 - admin, 1 - teacher, 2 - student',
  `status` int(11) NOT NULL COMMENT '0 - deactivate, 1 - active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `status`) VALUES
(1, 'teacher1', '25d55ad283aa400af464c76d713c07ad', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
