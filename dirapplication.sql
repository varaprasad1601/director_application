-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 02:08 PM
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
(1, 'DIR2K238D10', 'co', '2023-07-30', '2023-08-02'),
(2, 'DIR2K23BD93', 'coordinator', '2002-01-02', '2023-01-02'),
(3, 'DIR2K23DB21', 'jhnkjhj', '2021-12-31', '2022-12-31'),
(4, 'DIR2K238D25', 'UG Admissions Coordinator<>CDPC Department Placement Member', '2020-07-03<>2022-10-16', '2023-08-12<>2023-08-12');

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
('DIR2K238D10', 'Nuzvid'),
('DIR2K23BD93', 'Nuzvid'),
('DIR2K23DB21', ',,,'),
('DIR2K23232A', ', , , '),
('DIR2K233FA1', ', RK Valley, , '),
('DIR2K2362CC', ', RK Valley, , '),
('DIR2K238D25', 'Nuzvid,,Srikakulam,');

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
(1, 'DIR2K238D10', '-----', ' ', ' '),
(2, 'DIR2K23BD93', '', '', ''),
(3, 'DIR2K23DB21', '', '', ''),
(4, 'DIR2K238D25', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `sno` int(11) NOT NULL,
  `ApplicationId` varchar(255) NOT NULL,
  `OtherInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`sno`, `ApplicationId`, `OtherInformation`) VALUES
(0, 'DIR2K238D10', ''),
(0, 'DIR2K238D25', 'Vara Prasad - Final year B.Tech student at RGUKT Nuzvid. Experienced in web development and Python\nprogramming. Passionate about creating impactful solutions and eager to learn and grow. Seeking exciting\nopportunities to contribute my skills and be a part'),
(0, 'DIR2K23BD93', 'i am nothing than good'),
(0, 'DIR2K23DB21', '');

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
(1, 'DIR2K238D10', 'aruntejamenda', 'aruntejamenda@gmail.com', '9000599108', 'DIR2K238D10.jpeg', '2002-08-02', 21, 'Female', 'BC', 'm fk ', 'ikn', 'knj', 'on'),
(14, 'DIR2K23BD93', 'finalyes', 'final@gmail.com', '8999999999', 'DIR2K23BD93.jpeg', '2023-07-30', 0, 'Male', 'OC', 'final_add', 'final_des', 'finaldep', 'finaluni'),
(21, 'DIR2K23DB21', 'simon', 'simon@gmail.com', '8897182017', 'DIR2K23DB21.jpeg', '2019-11-30', 3, 'Male', 'OBC', 'gjhgjhbjgjj', 'student', 'cse', 'RGUKT_NUZVID'),
(26, 'DIR2K23232A', 'hijkhui', 'vara@gmail.com', '9999999999', 'DIR2K23232A.jpeg', '2008-10-30', 14, 'Male', 'hv', 'hhjvjv', 'hvvjhvj', 'hvhvjhv', 'hjvhjv'),
(28, 'DIR2K23A6EA', 'uhguih', 'sai@gmail.com', '8888888888', 'DIR2K23A6EA.jpeg', '2005-02-19', 18, 'Male', 'ST', 'hvuyvhj', 'bgyhvjhg', 'gjhghjg', 'gjhghbjh'),
(29, 'DIR2K238D25', 'Vasamsetti Sai Siva Sankara Vara Prasad', 'saiprasadvsp1601@gmail.com', '8897182017', 'DIR2K238D25.jpeg', '2002-01-16', 21, 'Male', 'OBC', '3-404, Appanapalli, Mamidikudhuru, East Godavari, Andhra Pradesh - 533247', 'Student', 'Computer Science and Engineering', 'Rajiv Gandhi University of Knowledge Technologies - Nuzvid');

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
(1, 'DIR2K238D10', 'Under Graduation', '2000', 's', 's'),
(2, 'DIR2K238D10', 'Post Graduation', '1999', 's', 's'),
(3, 'DIR2K238D10', 'Ph.D', '1998', 's', 's'),
(4, 'DIR2K23BD93', 'Under Graduation', '2020', 'cswaruncse', 'cseuni_cse'),
(5, 'DIR2K23BD93', 'Post Graduation', '2020', 'cseece', 'cseece'),
(6, 'DIR2K23BD93', 'Ph.D', '2020', 'mechcivilnothin', 'unniuninothing'),
(7, 'DIR2K23DB21', 'Under Graduation', '2020', 'kjnjk', 'bkhjbkhjb'),
(8, 'DIR2K23DB21', 'Post Graduation', '2020', 'kjbkhj', 'bhjbhjkb'),
(9, 'DIR2K23DB21', 'Ph.D', '2020', 'jhbhjb', 'jhbhjb'),
(10, 'DIR2K23A6EA', 'Under Graduation', '2020', 'hgjghhj', 'hghj'),
(11, 'DIR2K23A6EA', 'Post Graduation', '2020', 'jkbjhb', 'hjbhb'),
(12, 'DIR2K23A6EA', 'Ph.D', '2020', 'jkbjhkb', 'kbjhkb'),
(13, 'DIR2K238D25', 'Under Graduation', '2013<>2015', 'Computer Science and Engineering<>Computer Science and Engineering', 'Rajiv Gandhi University of Knowledge Technologies - Srikakulam<>Rajiv Gandhi University of Knowledge Technologies - Nuzvid'),
(14, 'DIR2K238D25', 'Post Graduation', '2019<>2020', 'Computer Science and Engineering<>Computer Science and Engineering', 'Indian Institute of Science Bengaluru<>Indian Institute of Technology Madras'),
(15, 'DIR2K238D25', 'Ph.D', '2021', 'Computer Science and Engineering', 'Indian Institute of Technology Delhi');

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
('vara@gmail.com', '8888888888', '567a089b877eb76464d3f6052edcdcd2', 'DIR2K23232A', 'tab2()', 'tab2()'),
('a@gmail.com', '9999999999', '567a089b877eb76464d3f6052edcdcd2', 'DIR2K233FA1', 'tab1()', 'tab1()'),
('b@gmail.com', '8988888888', '567a089b877eb76464d3f6052edcdcd2', 'DIR2K2362CC', 'tab1()', 'tab1()'),
('aruntejamenda@gmail.com', '9000599108', '722279e9e630b3e731464b69968ea4b4', 'DIR2K238D10', 'tab2()', 'tab6()'),
('saiprasadvsp1601@gmail.com', '8897182017', 'b067c7f0a90534d88bc35e1041330821', 'DIR2K238D25', 'tab2()', 'tab7()'),
('sai@gmail.com', '8888888888', '567a089b877eb76464d3f6052edcdcd2', 'DIR2K23A6EA', 'tab5()', 'tab5()'),
('final@gmail.com', '9000599108', '2a1585a864d9e67627c6ae04c807a2c5', 'DIR2K23BD93', 'tab6()', 'tab7()'),
('simon@gmail.com', '9000599108', 'b30bd351371c686298d32281b337e8e9', 'DIR2K23DB21', 'tab4()', 'tab6()');

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
  `num_projectsCompleted` int(11) NOT NULL,
  `num_reportsSubmitted` int(11) NOT NULL,
  `num_mphils_guided` int(11) NOT NULL,
  `num_phds_guided` int(11) NOT NULL,
  `num_SemConfPap_Nat` int(11) NOT NULL,
  `num_SemConfPap_IntNat` int(11) NOT NULL,
  `memberships_Nat` int(11) NOT NULL,
  `memberships_IntNat` int(11) NOT NULL,
  `num_awards_S` int(11) NOT NULL,
  `num_awards_N` int(11) NOT NULL,
  `num_awards_IntNat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchexp`
--

INSERT INTO `researchexp` (`sno`, `ApplicationId`, `num_papersPublished_Nat`, `num_papersPublished_IntNat`, `papers_info`, `num_patents`, `num_booksISBN`, `num_MajResearchProjs`, `num_MinResearchProjs`, `fundsFor_MajProjs`, `fundsFor_MinProjs`, `num_projectsCompleted`, `num_reportsSubmitted`, `num_mphils_guided`, `num_phds_guided`, `num_SemConfPap_Nat`, `num_SemConfPap_IntNat`, `memberships_Nat`, `memberships_IntNat`, `num_awards_S`, `num_awards_N`, `num_awards_IntNat`) VALUES
(1, 'DIR2K238D10', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'DIR2K23BD93', 1, 2, '', 3, 4, 55, 6, 77, 8, 0, 0, 9, 10, 13, 14, 15, 166, 0, 11, 12),
(3, 'DIR2K23DB21', 1, 2, '3', 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 17, 18, 19, 20, 14, 15, 16),
(4, 'DIR2K23A6EA', 1, 2, '3', 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20),
(5, 'DIR2K238D25', 4, 3, 'HTML, CSS, JavaScript, Advanced Python, Basics of Java, C, C++ etc.,', 9, 15, 13, 7, 17, 18, 16, 7, 6, 2, 12, 10, 9, 2, 23, 13, 4);

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
(1, 'DIR2K238D10', 0, 0, 0),
(2, 'DIR2K23BD93', 0, 0, 0),
(3, 'DIR2K23DB21', 4.2, 9, 9),
(4, 'DIR2K23A6EA', 4.5, 8, 9),
(5, 'DIR2K238D25', 3.5, 8, 9);

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
(1, 'DIR2K238D10', 'Professor', '', NULL, '', ''),
(2, 'DIR2K238D10', 'Associate Professor', '', NULL, '', ''),
(3, 'DIR2K238D10', 'Assistant Professor', '2023-07-31', NULL, '-', 'True'),
(4, 'DIR2K23BD93', 'Professor', '', NULL, '', ''),
(5, 'DIR2K23BD93', 'Associate Professor', '2023-07-30', NULL, 'uni', 'True'),
(6, 'DIR2K23BD93', 'Assistant Professor', '2023-05-30', NULL, 'uni', 'False'),
(7, 'DIR2K23DB21', 'Professor', '2023-08-03*2023-08-03', '2024-08-03*2024-08-03', 'Indian Institute of Technology Delhi*Indian Institute of Science Bengaluru', 'False*False'),
(8, 'DIR2K23DB21', 'Associate Professor', '2023-08-03', '2024-08-10', 'Indian Institute of Science Bengaluru', 'True'),
(9, 'DIR2K23DB21', 'Assistant Professor', '2023-08-12', '2024-11-09', 'Rajiv Gandhi University of Knowledge Technologies Nuzvid', 'False'),
(10, 'DIR2K23A6EA', 'Professor', '', NULL, '', ''),
(11, 'DIR2K23A6EA', 'Associate Professor', '2001-11-23', NULL, 'hgfgvh', 'True'),
(12, 'DIR2K23A6EA', 'Assistant Professor', '', NULL, '', ''),
(13, 'DIR2K238D25', 'Professor', '2021-08-19', '2023-08-12', 'Indian Institute of Technology Delhi', 'False'),
(14, 'DIR2K238D25', 'Associate Professor', '2020-01-16', '2021-07-31', 'Indian Institute of Science Bengaluru', 'True'),
(15, 'DIR2K238D25', 'Assistant Professor', '', '', '', '');

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personneldetails`
--
ALTER TABLE `personneldetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `researchexp`
--
ALTER TABLE `researchexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachingexp`
--
ALTER TABLE `teachingexp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `worked_universities`
--
ALTER TABLE `worked_universities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
