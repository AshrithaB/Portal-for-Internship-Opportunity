-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 05:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `PERSON_ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSON_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NAME`, `PASSWORD`) VALUES
('ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Stand-in structure for view `intern`
-- (See below for the actual view)
--
DROP TABLE IF EXISTS `intern`;
CREATE TABLE IF NOT EXISTS `intern` (
`INTERNSHIP_ID` varchar(10)
,`DESCRIPTION` varchar(400)
,`SKILLS` varchar(400)
);

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--
DROP TABLE IF EXISTS `internship`;
CREATE TABLE IF NOT EXISTS `internship` (
  `INTERNSHIP_ID` int(10) NOT NULL AUTO_INCREMENT ,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `DESCRIPTION` char(255) DEFAULT NULL,
  `LOCATION` char(255) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `SKILLS` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`INTERNSHIP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`COMPANY_ID`, `DESCRIPTION`, `LOCATION`, `START_DATE`, `END_DATE`, `SKILLS`) VALUES
(111, 'Final year students only', 'BANGALORE', '2020-10-23', '2020-11-23', 'C, PYTHON'),
(123, 'Final year students only', 'BANGALORE', '2020-11-11', '2020-12-11', 'C, C#, HTML'),
(123, 'Final year students only', 'CHENNAI', '2020-10-23', '2020-11-23', 'IOT, ML'),
(171, 'Final year students only', 'MYSORE', '2020-11-12', '2021-01-12', 'PHP, WEB DEVELOPMENT'),
(340, 'Final year students only', 'HYDERABAD', '2020-12-05', '2021-01-05', 'NETWORKS');

-- --------------------------------------------------------
--
-- Table structure for table `placements`
--
DROP TABLE IF EXISTS `placements`;
CREATE TABLE IF NOT EXISTS `placements` (
  `USN` varchar(10) DEFAULT NULL,
  `COMPANY_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Table structure for table `student`
--
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `USN` varchar(100) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `PHONE` bigint(10) DEFAULT NULL,
  `DEPARTMENT` varchar(100) DEFAULT NULL,
  `GRADUATION_YEAR` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `NAME`, `EMAIL`, `PASSWORD`, `PHONE`, `DEPARTMENT`, `GRADUATION_YEAR`) VALUES
('1ga17cs022', 'Archana ', 'archana@gmail.com', '$2y$10$CORoD/rcNcZ6DZ3qnKInjuC99H9BvKWWsJlVkKZf8KROHlDA0Kwnu', 9864846004, 'CSE', 2021),
('1ga17cs061', 'Harsh', 'harsh@gmail.com', '$2y$10$fW77QTxnauoq6Aq/w95eAO382sQMh.bx15Dln4PRe54V8ZyhjWfr2', 7754561226, 'CSE', 2021),
('1ga17is179', 'ram', 'ram@gmail.com', '$2y$10$6UXCfIHsoNuwU9q2zVIr/errGAeAjTrscJLAP4m2zH8hM5kgIwCu6', 7586990085, 'ISE', 2022),
('1ga17is185', 'Thrupthi', 'thrupthi@gmail.com', '$2y$10$RyqT/MjHfnPryMw.t5IGhOeFzIAlg8rodNFVhXm1FLlV7HQh/JScC', 8877551598, 'ISE', 2021),
('1ga17cs201', 'John', 'john123@gmail.com', '$2y$10$czm/guqfOoRNup.mQtz0DOdLJHr6mGV22jdGuDTqZUOXbTNP1Q1pm', 9801336562, 'CSE', 2022);


-- --------------------------------------------------------

--
-- Table structure for table `company`
--
DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `COMPANY_ID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PHONE` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`COMPANY_ID`, `NAME`, `EMAIL`, `PHONE`) VALUES
(111, 'TCS', 'tcs@gmail.com', 9234567890),
(123, 'IOTRACX', 'IOTRACX@GMAIL.COM', 8889993336),
(171, 'ACCENTURE', 'accenture@gmail.com', 7335162022),
(340, 'INFOSYS', 'infosys@gmail.com', 9923045298),
(589, 'LNT', 'lnt@gmail.com', 8104080120);

-- --------------------------------------------------------
--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`USN`, `COMPANY_ID`) VALUES
('1GA17IS179', 111),
('1GA17CS201', 123),
('1GA17CS201', 111);
--
-- Structure for view `intern`
--
DROP TABLE IF EXISTS `intern`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `intern`  AS  select `internship`.`INTERNSHIP_ID` AS `INTERNSHIP_ID`,`internship`.`DESCRIPTION` AS `DESCRIPTION`,`internship`.`SKILLS` AS `SKILLS` from `internship` ;

--
-- Indexes for dumped tables
--

-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD KEY `USN` (`USN`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `placements`
--
ALTER TABLE `placements`
  ADD CONSTRAINT `placements_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `placements_ibfk_2` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
