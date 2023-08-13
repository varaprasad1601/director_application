-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 11:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dirapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrativeexp`
--

CREATE TABLE `administrativeexp` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `fromDate` varchar(255) NOT NULL,
  `toDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administrativeexp`
--

INSERT INTO `administrativeexp` (`sno`, `ApplicationId`, `position`, `fromDate`, `toDate`) VALUES
(1, 'DIR2K234BE7', 'cao', '2023-08-08', '2023-08-13'),
(2, 'DIR2K231FC5', 'cao', '2023-08-09', '2023-08-13'),
(3, 'DIR2K232BD9', 'cao', '2023-08-02', '2023-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `applied_campus`
--

CREATE TABLE `applied_campus` (
  `ApplicationId` varchar(255) NOT NULL,
  `appliedCampus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applied_campus`
--

INSERT INTO `applied_campus` (`ApplicationId`, `appliedCampus`) VALUES
('DIR2K234BE7', ',RK Valley,,Ongole'),
('DIR2K231FC5', ',RK Valley,,Ongole'),
('DIR2K232BD9', 'Nuzvid,,Srikakulam,');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `typeOf_case` varchar(255) NOT NULL,
  `CaseName` varchar(255) NOT NULL,
  `CaseStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`sno`, `ApplicationId`, `typeOf_case`, `CaseName`, `CaseStatus`) VALUES
(1, 'DIR2K234BE7', 'Vigilance', 'police', 'clear'),
(2, 'DIR2K231FC5', 'Departmental Cases', 'police', 'clearedtq'),
(3, 'DIR2K232BD9', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `ApplicationId` varchar(255) NOT NULL,
  `OtherInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`ApplicationId`, `OtherInformation`) VALUES
('DIR2K231FC5', 'tq'),
('DIR2K232BD9', ''),
('DIR2K234BE7', 'tq');

-- --------------------------------------------------------

--
-- Table structure for table `personneldetails`
--

CREATE TABLE `personneldetails` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `category` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personneldetails`
--

INSERT INTO `personneldetails` (`sno`, `ApplicationId`, `name`, `email`, `phone`, `picture`, `dob`, `age`, `gender`, `category`, `address`, `designation`, `department`, `university`) VALUES
(1, 'DIR2K234BE7', 'jaya', 'jaya@gmail.com', '9876543210', 'DIR2K234BE7.jpeg', '2023-08-01', 0, 'Male', 'ST', 'n', 'n', 'n', 'n'),
(2, 'DIR2K231FC5', 'buddi', 'buddi@gmail.com', '9876543210', 'DIR2K231FC5.jpeg', '2023-08-02', 0, 'Male', 'OBC', 'n', 'n', 'n', 'n'),
(3, 'DIR2K232BD9', 'h', 'h@gmail.com', '9876543210', 'DIR2K232BD9.jpeg', '2023-08-01', 0, 'Male', 'SC', 'n', 'n', 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`sno`, `ApplicationId`, `qualification`, `year`, `specialization`, `university`) VALUES
(1, 'DIR2K234BE7', 'Under Graduation', '2001', 'n', 'n'),
(2, 'DIR2K234BE7', 'Post Graduation', '2002', 'n', 'n'),
(3, 'DIR2K234BE7', 'Ph.D', '2003', 'n', 'n'),
(4, 'DIR2K231FC5', 'Under Graduation', '2001', 'c', 'c'),
(5, 'DIR2K231FC5', 'Post Graduation', '2002', 'c', 'c'),
(6, 'DIR2K231FC5', 'Ph.D', '2003', 'c', 'c'),
(7, 'DIR2K232BD9', 'Under Graduation', '2001', 'v', 'v'),
(8, 'DIR2K232BD9', 'Post Graduation', '2002', 'v', 'v'),
(9, 'DIR2K232BD9', 'Ph.D', '2003', 'v', 'vv');

-- --------------------------------------------------------

--
-- Table structure for table `reg_dir`
--

CREATE TABLE `reg_dir` (
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `stage` varchar(255) DEFAULT NULL,
  `all_done` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reg_dir`
--

INSERT INTO `reg_dir` (`email`, `phoneno`, `password`, `ApplicationId`, `stage`, `all_done`) VALUES
('buddi@gmail.com', '9876543210', '827ccb0eea8a706c4c34a16891f84e7b', 'DIR2K231FC5', 'tab6()', 'tab7()'),
('h@gmail.com', '9876543210', '827ccb0eea8a706c4c34a16891f84e7b', 'DIR2K232BD9', 'tab6()', 'tab7()'),
('jaya@gmail.com', '9876543210', '827ccb0eea8a706c4c34a16891f84e7b', 'DIR2K234BE7', 'tab6()', 'tab7()');

-- --------------------------------------------------------

--
-- Table structure for table `researchexp`
--

CREATE TABLE `researchexp` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `num_papersPublished_Nat` int(11) NOT NULL,
  `num_papersPublished_IntNat` int(11) NOT NULL,
  `papers_info` varchar(255) NOT NULL,
  `num_patents` int(11) NOT NULL,
  `num_booksISBN` int(11) NOT NULL,
  `num_MajResearchProjs` int(11) NOT NULL,
  `num_MinResearchProjs` int(11) NOT NULL,
  `fundsFor_MajProjs` int(11) NOT NULL,
  `fundsFor_MinProjs` int(11) NOT NULL,
  `maj_projectsOngoing` int(11) NOT NULL,
  `min_projectsOngoing` int(11) NOT NULL,
  `maj_fundsOngoing` int(11) NOT NULL,
  `min_fundsOngoing` int(11) NOT NULL,
  `num_mphils_guided` int(11) NOT NULL,
  `num_phds_guided` int(11) NOT NULL,
  `num_SemConfPap_Nat` int(11) NOT NULL,
  `num_SemConfPap_IntNat` int(11) NOT NULL,
  `memberships_Nat` int(11) NOT NULL,
  `memberships_IntNat` int(11) NOT NULL,
  `num_awards_S` int(11) NOT NULL,
  `num_awards_N` int(11) NOT NULL,
  `num_awards_IntNat` int(11) NOT NULL,
  `num_consultancy` int(11) NOT NULL,
  `total_amount_consultancy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `researchexp`
--

INSERT INTO `researchexp` (`sno`, `ApplicationId`, `num_papersPublished_Nat`, `num_papersPublished_IntNat`, `papers_info`, `num_patents`, `num_booksISBN`, `num_MajResearchProjs`, `num_MinResearchProjs`, `fundsFor_MajProjs`, `fundsFor_MinProjs`, `maj_projectsOngoing`, `min_projectsOngoing`, `maj_fundsOngoing`, `min_fundsOngoing`, `num_mphils_guided`, `num_phds_guided`, `num_SemConfPap_Nat`, `num_SemConfPap_IntNat`, `memberships_Nat`, `memberships_IntNat`, `num_awards_S`, `num_awards_N`, `num_awards_IntNat`, `num_consultancy`, `total_amount_consultancy`) VALUES
(1, 'DIR2K234BE7', 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(2, 'DIR2K231FC5', 1, 1, '1', 1, 1, 1, 2, 3, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3),
(3, 'DIR2K232BD9', 1, 1, '1', 1, 1, 2, 3, 2, 5, 2, 6, 1, 5, 1, 0, 1, 0, 1, 1, 0, 1, 1, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `teachingexp`
--

CREATE TABLE `teachingexp` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `total_exp` float NOT NULL,
  `len_prof_service` float NOT NULL,
  `leftover_service` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachingexp`
--

INSERT INTO `teachingexp` (`sno`, `ApplicationId`, `total_exp`, `len_prof_service`, `leftover_service`) VALUES
(1, 'DIR2K234BE7', 0, 10, 0),
(2, 'DIR2K231FC5', 0, 5, 0),
(3, 'DIR2K232BD9', 0, 20, 9);

-- --------------------------------------------------------

--
-- Table structure for table `worked_universities`
--

CREATE TABLE `worked_universities` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dateOfAppointment` varchar(255) NOT NULL,
  `upto` varchar(255) DEFAULT NULL,
  `university` varchar(255) NOT NULL,
  `privateCollege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `worked_universities`
--

INSERT INTO `worked_universities` (`sno`, `ApplicationId`, `designation`, `dateOfAppointment`, `upto`, `university`, `privateCollege`) VALUES
(1, 'DIR2K234BE7', 'Professor', '2023-08-01', '2023-08-13', 'rgukt', 'True'),
(2, 'DIR2K234BE7', 'Associate Professor', '', '', '', ''),
(3, 'DIR2K234BE7', 'Assistant Professor', '', '', '', ''),
(4, 'DIR2K231FC5', 'Professor', '2023-08-02', '2023-08-13', 'r', 'False'),
(5, 'DIR2K231FC5', 'Associate Professor', '', '', '', ''),
(6, 'DIR2K231FC5', 'Assistant Professor', '', '', '', ''),
(7, 'DIR2K232BD9', 'Professor', '2023-08-08', '2023-08-13', 'nuzd', 'False'),
(8, 'DIR2K232BD9', 'Associate Professor', '', '', '', ''),
(9, 'DIR2K232BD9', 'Assistant Professor', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrativeexp`
--
ALTER TABLE `administrativeexp`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`ApplicationId`);

--
-- Indexes for table `personneldetails`
--
ALTER TABLE `personneldetails`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ApplicationId` (`ApplicationId`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `reg_dir`
--
ALTER TABLE `reg_dir`
  ADD PRIMARY KEY (`ApplicationId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `researchexp`
--
ALTER TABLE `researchexp`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ApplicationId` (`ApplicationId`);

--
-- Indexes for table `teachingexp`
--
ALTER TABLE `teachingexp`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ApplicationId` (`ApplicationId`);

--
-- Indexes for table `worked_universities`
--
ALTER TABLE `worked_universities`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrativeexp`
--
ALTER TABLE `administrativeexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personneldetails`
--
ALTER TABLE `personneldetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `researchexp`
--
ALTER TABLE `researchexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachingexp`
--
ALTER TABLE `teachingexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worked_universities`
--
ALTER TABLE `worked_universities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
