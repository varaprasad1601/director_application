-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 08:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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

--
-- Dumping data for table `administrativeexp`
--

INSERT INTO `administrativeexp` (`sno`, `ApplicationId`, `position`, `fromDate`, `toDate`) VALUES
(1, 'DIR2K23FDF0', 'UG Admissions Coordinator<>CDPC Department Placement Member', '2021-06-13<>2023-04-05', '2023-08-12<>2023-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `applied_campus`
--

CREATE TABLE `applied_campus` (
  `ApplicationId` varchar(255) NOT NULL,
  `appliedCampus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_campus`
--

INSERT INTO `applied_campus` (`ApplicationId`, `appliedCampus`) VALUES
('DIR2K23FDF0', 'Nuzvid,,Srikakulam,');

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

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`sno`, `ApplicationId`, `typeOf_case`, `CaseName`, `CaseStatus`) VALUES
(1, 'DIR2K23FDF0', 'Departmental Cases', 'Police', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `ApplicationId` varchar(255) NOT NULL,
  `OtherInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`ApplicationId`, `OtherInformation`) VALUES
('DIR2K23FDF0', 'Vara Prasad - Final year B.Tech student at RGUKT Nuzvid. Experienced in web development and Python programming. Passionate about creating impactful solutions and eager to learn and grow. Seeking exciting opportunities to contribute my skills and be a part');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personneldetails`
--

INSERT INTO `personneldetails` (`sno`, `ApplicationId`, `name`, `email`, `phone`, `picture`, `dob`, `age`, `gender`, `category`, `address`, `designation`, `department`, `university`) VALUES
(1, 'DIR2K23FDF0', 'Vasamsetti Sai Siva Sankara Vara Prasad', 'saiprasadvsp1601@gmail.com', '8897182017', 'DIR2K23FDF0.jpeg', '2002-01-16', 21, 'Male', 'OBC', '3-404, Appanapalli, Mamidikudhuru, East Godavari, Andhra Pradesh - 533247', 'Student', 'Computer Science and Engineering', 'Rajiv Gandhi University of Knowledge Technologies - Nuzvid'),
(2, 'DIR2K23F3EC', 'jkjh', 'arun@gmail.com', '8888888888', 'DIR2K23F3EC.jpeg', '2023-08-10', 0, 'Male', 'OC', 'hjfgjyh', 'jhhjhjghj', 'ghjghjghg', 'hghjgj');

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

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`sno`, `ApplicationId`, `qualification`, `year`, `specialization`, `university`) VALUES
(1, 'DIR2K23FDF0', 'Under Graduation', '2018', 'Computer Science and Engineering', 'Rajiv Gandhi University of Knowledge Technologies - Nuzvid'),
(2, 'DIR2K23FDF0', 'Post Graduation', '2020<>2021', 'Computer Science and Engineering<>Computer Science and Engineering', 'Indian Institute of Science Bengaluru<>Indian Institute of Technology Madras'),
(3, 'DIR2K23FDF0', 'Ph.D', '2022', 'Computer Science and Engineering', 'Indian Institute of Technology Delhi'),
(4, 'DIR2K23F3EC', 'Under Graduation', '2020', 'jgjhkg', 'ghjghg'),
(5, 'DIR2K23F3EC', 'Post Graduation', '2020', 'hhjg', 'hjghjghjg'),
(6, 'DIR2K23F3EC', 'Ph.D', '2020', 'hvhj', 'hhjg');

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

--
-- Dumping data for table `reg_dir`
--

INSERT INTO `reg_dir` (`email`, `phoneno`, `password`, `ApplicationId`, `stage`, `all_done`) VALUES
('arun@gmail.com', '8888888888', '567a089b877eb76464d3f6052edcdcd2', 'DIR2K23F3EC', 'tab4()', 'tab5()'),
('saiprasadvsp1601@gmail.com', '8897182017', 'b067c7f0a90534d88bc35e1041330821', 'DIR2K23FDF0', 'tab5()', 'tab7()');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchexp`
--

INSERT INTO `researchexp` (`sno`, `ApplicationId`, `num_papersPublished_Nat`, `num_papersPublished_IntNat`, `papers_info`, `num_patents`, `num_booksISBN`, `num_MajResearchProjs`, `num_MinResearchProjs`, `fundsFor_MajProjs`, `fundsFor_MinProjs`, `maj_projectsOngoing`, `min_projectsOngoing`, `maj_fundsOngoing`, `min_fundsOngoing`, `num_mphils_guided`, `num_phds_guided`, `num_SemConfPap_Nat`, `num_SemConfPap_IntNat`, `memberships_Nat`, `memberships_IntNat`, `num_awards_S`, `num_awards_N`, `num_awards_IntNat`, `num_consultancy`, `total_amount_consultancy`) VALUES
(1, 'DIR2K23FDF0', 12, 8, 'HTML, CSS, Java Script, Advanced Python, Django, Basics of Java, C, C++ etc.,', 18, 9, 16, 10, 10, 5, 12, 8, 5, 2, 8, 9, 9, 6, 7, 2, 13, 9, 4, 3, 10),
(2, 'DIR2K23F3EC', 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0);

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

--
-- Dumping data for table `teachingexp`
--

INSERT INTO `teachingexp` (`sno`, `ApplicationId`, `total_exp`, `len_prof_service`, `leftover_service`) VALUES
(1, 'DIR2K23FDF0', 7.4, 1.5, 2),
(2, 'DIR2K23F3EC', 0, 8, 9);

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
-- Dumping data for table `worked_universities`
--

INSERT INTO `worked_universities` (`sno`, `ApplicationId`, `designation`, `dateOfAppointment`, `upto`, `university`, `privateCollege`) VALUES
(1, 'DIR2K23FDF0', 'Professor', '2021-01-01', '2023-08-12', 'Rajiv Gandhi University of Knowledge Technologies - Nuzvid', 'False'),
(2, 'DIR2K23FDF0', 'Associate Professor', '2020-02-13*2019-06-12', '2020-12-31*2020-01-01', 'Indian Institute of Science Bengaluru*Indian Institute of Technology Madras', 'True*False'),
(3, 'DIR2K23FDF0', 'Assistant Professor', '2015-01-16', '2018-06-13', 'Indian Institute of Technology Delhi', 'False'),
(4, 'DIR2K23F3EC', 'Professor', '2023-08-01', '2023-08-12', 'PRASAD', 'False'),
(5, 'DIR2K23F3EC', 'Associate Professor', '', '', '', ''),
(6, 'DIR2K23F3EC', 'Assistant Professor', '', '', '', '');

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personneldetails`
--
ALTER TABLE `personneldetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `researchexp`
--
ALTER TABLE `researchexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachingexp`
--
ALTER TABLE `teachingexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worked_universities`
--
ALTER TABLE `worked_universities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
