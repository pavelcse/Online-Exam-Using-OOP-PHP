-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 01:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `ansid` int(11) NOT NULL,
  `quesno` int(11) NOT NULL,
  `rightans` int(11) DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`ansid`, `quesno`, `rightans`, `ans`) VALUES
(1, 1, 0, 'Abstract'),
(2, 1, 0, 'Protected'),
(3, 1, 1, 'Final'),
(4, 1, 0, 'Static'),
(5, 2, 0, 'classname()'),
(6, 2, 0, '_construct()'),
(7, 2, 0, 'function _construct()'),
(8, 2, 1, 'function __construct()'),
(9, 3, 0, 'PHP 4'),
(10, 3, 1, 'PHP 5'),
(11, 3, 0, 'PHP 5.3'),
(12, 3, 0, 'PHP 6'),
(13, 4, 0, 'exist()'),
(14, 4, 0, 'exist_class()'),
(15, 4, 1, 'class_exist()'),
(16, 4, 0, '__exist()'),
(17, 5, 0, 'obj_type()'),
(18, 5, 0, 'type()'),
(19, 5, 1, 'is_a()'),
(20, 5, 0, 'is_obj()'),
(21, 6, 1, 'Extends'),
(22, 6, 0, 'Implements'),
(23, 6, 0, 'Inherit'),
(24, 6, 0, 'Include');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `quesid` int(11) NOT NULL,
  `quesno` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`quesid`, `quesno`, `ques`) VALUES
(1, 1, 'Which method scope prevents a method from being overridden by a subclass?'),
(2, 2, 'PHP recognizes constructors by the name.'),
(3, 3, 'Which version of PHP introduced the instanceof keyword?'),
(4, 4, 'Which one of the following functions is used to determine whether a class exists? '),
(5, 5, 'Which one of the following functions is used to determine object type?'),
(6, 6, 'Which one of the following keyword is used to inherit our subclass into a superclass?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `email`, `password`, `status`) VALUES
(1, 'Pavel Parvej', 'pavel', 'pavel@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(2, 'Rasel Munshi', 'rasel', 'rasel@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(3, 'Sujon Mian', 'sujon', 'sujon@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(4, 'Parvez Ahsan', 'parvez', 'parvez@yahoo.com', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(5, 'Ahmmed Pavel', 'ahmmes', 'amd@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(6, 'Ahsan Ullah', 'ahsan', 'ahsan@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(7, 'Ruhul Amin', 'ruhul', 'ruhul@yahoo.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`ansid`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`quesid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `ansid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `quesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
