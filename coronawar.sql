-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 06:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coronawar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `EMAIL` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `PASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `NAME`, `EMAIL`, `PASS`) VALUES
(1, 'Admin', 'admin@gmail.com', 81);

-- --------------------------------------------------------

--
-- Table structure for table `admit`
--

CREATE TABLE `admit` (
  `id` int(11) NOT NULL,
  `patient` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `hospital` varchar(30) NOT NULL,
  `bed` varchar(20) NOT NULL,
  `admit_date` date NOT NULL,
  `token_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admit`
--

INSERT INTO `admit` (`id`, `patient`, `age`, `hospital`, `bed`, `admit_date`, `token_id`) VALUES
(10, 'Wu', 15, 'Square Hospital', 'general', '2021-09-30', 7602),
(11, 'Hafiz', 32, 'IBN SINA Hospital', 'icu', '2021-09-22', 8740),
(12, 'Hasan', 70, 'United Hospital', 'general', '2021-09-22', 1363),
(15, 'Frank', 37, 'Square Hospital', 'general', '2021-09-28', 3380),
(16, 'Rubel', 20, 'Square Hospital', 'cabin bed', '2021-09-27', 6956),
(18, 'Robi', 62, 'United Hospital', 'general', '2021-09-30', 6041),
(19, 'Salman', 33, 'Evercare Hospital', 'General', '2021-09-24', 3122),
(20, 'Md Masudur Rahman', 50, 'Square Hospital', 'Cabin Bed', '2021-09-23', 6886),
(21, 'Md Masudur Rahman', 50, 'Square Hospital', 'Cabin Bed', '2021-09-23', 4768),
(22, 'Md Masudur Rahman', 50, 'Square Hospital', 'Cabin Bed', '2021-09-23', 1107),
(23, 'Md Masudur Rahman', 50, 'Square Hospital', 'Cabin Bed', '2021-09-23', 462),
(24, 'Md Masudur Rahman', 50, 'Square Hospital', 'Cabin Bed', '2021-09-23', 438),
(25, 'Md Masudur Rahman', 50, 'Evercare Hospital', 'ICU', '2021-10-06', 2495),
(26, 'Md Masudur Rahman', 50, 'Evercare Hospital', 'ICU', '2021-10-06', 4603);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ID` int(255) NOT NULL,
  `P_NAME` varchar(255) NOT NULL,
  `P_CHAT` varchar(500) NOT NULL,
  `P_TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ID`, `P_NAME`, `P_CHAT`, `P_TIME`) VALUES
(18, 'Naeem', 'Naeem ms', '2021-09-27 14:04:02'),
(19, 'Naeem', 'publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or', '2021-09-27 14:13:42'),
(20, 'Naeem', 'adskfjskdfjksdjfksdjfk', '2021-09-27 14:44:20'),
(21, 'Naeem', 'sdsrerwqerr', '2021-09-27 16:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `NAME`, `TYPE`, `EMAIL`, `PASS`) VALUES
(4, 'Dr. Mahbub Rahman', 'Coronavirus Specialist', 'mrm@gmail.com', 81),
(5, 'Dr. Rakib Mahmud', 'Coronavirus expert', 'rakibd@gmail.com', 81),
(16, 'Dr. Obaidur Rahman', 'Corona Expart', 'obaidur@gmail.com', 81),
(17, 'Dr. Rabbi Mandal', 'Corona Expart', 'rabbi@gmail.com', 81),
(18, 'Dr. Abdul Malek', 'Corona Expert', 'malek@gmail.com', 81);

-- --------------------------------------------------------

--
-- Table structure for table `d_chat`
--

CREATE TABLE `d_chat` (
  `ID` int(11) NOT NULL,
  `D_NAME` varchar(255) NOT NULL,
  `D_CHAT` varchar(500) NOT NULL,
  `D_TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d_chat`
--

INSERT INTO `d_chat` (`ID`, `D_NAME`, `D_CHAT`, `D_TIME`) VALUES
(9, 'Dr. Mahbub Rahman', 'sssssssssssss', '2021-09-27 14:27:14'),
(10, 'Dr. Mahbub Rahman', 'I am doctor', '2021-09-27 14:44:59'),
(11, 'Dr. Mahbub Rahman', 'rotiortuor', '2021-09-27 16:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `info_bd`
--

CREATE TABLE `info_bd` (
  `id` int(11) NOT NULL,
  `cases` int(11) NOT NULL,
  `recovered` int(11) NOT NULL,
  `deaths` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_bd`
--

INSERT INTO `info_bd` (`id`, `cases`, `recovered`, `deaths`) VALUES
(7, 12, 13, 45),
(8, 1212, 1313, 1414);

-- --------------------------------------------------------

--
-- Table structure for table `info_world`
--

CREATE TABLE `info_world` (
  `id` int(11) NOT NULL,
  `cases` int(11) NOT NULL,
  `recovered` int(11) NOT NULL,
  `deaths` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_world`
--

INSERT INTO `info_world` (`id`, `cases`, `recovered`, `deaths`) VALUES
(19, 3434, 3434, 3434);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `NAME`, `EMAIL`, `PASS`) VALUES
(2, 'Naeem', 'naeem@gmail.com', 81),
(3, 'Karim Mondol', 'karim@gmail.com', 81),
(4, 'Rakib Hassan', 'hassan@gmail.com', 81),
(6, 'Saiful Islam', 'saiful@gmail.com', 81);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `client` varchar(20) NOT NULL,
  `trans_id` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `client`, `trans_id`, `amount`, `status`) VALUES
(1, 'Naeem', 'Bkash', 'd4dfj42434jk54j', 100, 'Pending'),
(7, 'Naeem', 'Nagad', 'd4dfj42434jk54j', 500, 'Pending'),
(8, 'Naeem', 'Nagad', 'd4dfj42434jk54j', 500, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `prevents`
--

CREATE TABLE `prevents` (
  `ID` int(11) NOT NULL,
  `WASH_HAND` text NOT NULL,
  `USE_MASK` text NOT NULL,
  `USE_SANITIZER` text NOT NULL,
  `AVOID_HANDSHAKE` text NOT NULL,
  `AVOID_TOUCH` text NOT NULL,
  `D_APPOINTMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prevents`
--

INSERT INTO `prevents` (`ID`, `WASH_HAND`, `USE_MASK`, `USE_SANITIZER`, `AVOID_HANDSHAKE`, `AVOID_TOUCH`, `D_APPOINTMENT`) VALUES
(1, 'asdasd', 'asdasd', 'adsasdsd', 'asdasdasd', 'asdsasd', 'adsdsd'),
(2, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \r\n', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `ID` int(11) NOT NULL,
  `D_NAME` varchar(255) NOT NULL,
  `P_NAME` varchar(255) NOT NULL,
  `S_TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`ID`, `D_NAME`, `P_NAME`, `S_TYPE`) VALUES
(58, 'Dr. Mahbub Rahman', 'Naeem', 'Antibody Test'),
(59, 'Dr. Mahbub Rahman', 'Saiful Islam', 'Corona Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admit`
--
ALTER TABLE `admit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `d_chat`
--
ALTER TABLE `d_chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_bd`
--
ALTER TABLE `info_bd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_world`
--
ALTER TABLE `info_world`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prevents`
--
ALTER TABLE `prevents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admit`
--
ALTER TABLE `admit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `d_chat`
--
ALTER TABLE `d_chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `info_bd`
--
ALTER TABLE `info_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `info_world`
--
ALTER TABLE `info_world`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prevents`
--
ALTER TABLE `prevents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
