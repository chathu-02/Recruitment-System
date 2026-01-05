-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 11:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwtproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `image` blob NOT NULL,
  `Id` int(2) NOT NULL,
  `position` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`image`, `Id`, `position`, `description`, `status`) VALUES
(0x617373697374616e742e6a7067, 37, 'Assistant Manager', 'We are looking for an Assistant Manager who has Excellent verbal communication and strong leadership', 'Available'),
(0x73797374656d2e6a7067, 38, 'System Engineer', 'We are looking for a system Manager who have excellent communication, project management and skills.', 'Available'),
(0x636f6f7264696e61746f722e6a7067, 39, 'Training Coordinator', 'We are looking for a Training Coordinator who have responsibilities in communicating with managers.', 'Available'),
(0x363730343365333263623562645f616e6177696c756e646177612d77696c70617474752d6d696e6e65726979612d6f702d362e6a7067, 41, 'test', 'test', 'Available'),
(0x363730343364373136386337345f32736964652e6a7067, 42, 'test', 'thh', 'Available'),
(0x363730343464663531343130655f313239333833305f73637265656e73686f74735f32303234303832313136313931385f312e6a7067, 43, 'test', 'test', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `first_name`, `last_name`, `address`, `country`, `gender`, `dob`, `contact_no`, `email`, `password`) VALUES
(33, 'Disara', 'Methmali', 'NO 40,Millennium City,\r\nKurunegala', 'Colombo', 'Female', '2001-12-12', 715353455, 'disaramethmali2001@gmail', 'Meth@2001'),
(34, 'Chanuri', 'Nethma', 'No 33,\r\nFlower Road,\r\nMatara', 'Matara', 'Female', '2001-06-09', 714545200, 'chanuri@gmail.com', 'Cha@1'),
(35, 'Kavithma', 'Dilmani', 'No 2,\r\nKandy Road,\r\nKurunegala', 'Kandy', 'Female', '2001-05-17', 701232500, 'kavithma@gmail.com', 'Kavi@123'),
(36, 'Pethmi', 'Withana', 'No 55,\r\nNegombo Rd,\r\nNegombo.\r\n', 'Gampaha', 'Female', '2001-12-11', 784521600, 'peth@gmail.com', 'Peth@123'),
(37, 'Pemindi', 'Gamage', 'No 8/98,\r\nLotus Rd,\r\nJa-Ela', 'Ja-Ela', 'Female', '2001-12-05', 718197428, 'pemi@gmail.com', 'Pemi@2002');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `Name`, `Email`, `Description`) VALUES
(1, 'qwetgegg', 'kalanakasun2001@gmail.com', 'sbdvcvjlv '),
(2, 'qwetgegg', 'kalanakasun2001@gmail.com', 'sbdvcvjlv '),
(4, 'test', 'test@', 'gcv');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `Ename` varchar(100) NOT NULL,
  `Eaddress` varchar(200) NOT NULL,
  `salary` int(30) NOT NULL,
  `Eposition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `Ename`, `Eaddress`, `salary`, `Eposition`) VALUES
(10, 'Goshithaaa', 'No 21,Daham Rd,Negombo', 100000, 'hiring_manager'),
(11, 'Denuwandsdasz', 'No 2,4th lane,Anuradhapura', 50000, 'hiring_manager');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `candidate_id` int(11) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL,
  `interviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`candidate_id`, `interview_date`, `interview_time`, `interviewID`) VALUES
(12, '2023-12-05', '10:22:00', 1),
(10, '2023-08-12', '09:20:00', 8),
(1001, '2024-10-09', '01:50:00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `owner` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_number` int(50) NOT NULL,
  `cvv` int(3) NOT NULL,
  `expiration_month` varchar(20) NOT NULL,
  `expiration_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `owner`, `email`, `card_number`, `cvv`, `expiration_month`, `expiration_year`) VALUES
(2, 'Disara', 'disaramethmali@gmail.com', 2147483647, 123, 'Dec', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `proflies`
--

CREATE TABLE `proflies` (
  `p_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `job_vacancy` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proflies`
--

INSERT INTO `proflies` (`p_id`, `name`, `email`, `job_vacancy`) VALUES
(1, 'Disara', 'disaramethmali2001@gmail.com', 'HR manager'),
(4, 'Chanuri', 'chanuri@gmail.com', 'IT Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`interviewID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `proflies`
--
ALTER TABLE `proflies`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `interviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proflies`
--
ALTER TABLE `proflies`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
