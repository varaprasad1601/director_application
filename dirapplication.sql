-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 01:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applied_campus`
--

CREATE TABLE `applied_campus` (
  `ApplicationId` varchar(255) NOT NULL,
  `appliedCampus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `ApplicationId` varchar(255) NOT NULL,
  `OtherInformation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `address` varchar(555) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `researchexp`
--

CREATE TABLE `researchexp` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `num_papersPublished_Nat` int(11) NOT NULL,
  `num_papersPublished_IntNat` int(11) NOT NULL,
  `papers_info` longtext NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personneldetails`
--
ALTER TABLE `personneldetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchexp`
--
ALTER TABLE `researchexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachingexp`
--
ALTER TABLE `teachingexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worked_universities`
--
ALTER TABLE `worked_universities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
