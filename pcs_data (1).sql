-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 08:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcs_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `employee_id` int(100) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `initial` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `employee_id`, `lname`, `fname`, `initial`, `email`, `password`, `code`, `status`, `date_created`) VALUES
(1, 953175, 'Check', 'Geraldasdsadadsa', 'Sasdasda', 'tricore012@gmail.com', 'baff8366006e6317ee48cd8a29056c8e', 70403, 'VALID', '2022-10-29'),
(2, 698729, 'devcore', 'Gerald Mico', 'S', 'hellodevcore@gmail.com', 'ad93ee3499b7b6534228b5896a246281', 87053, 'INACTIVE', '2022-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_module_student`
--

CREATE TABLE `assigned_module_student` (
  `aid` int(11) NOT NULL,
  `module_id` int(50) NOT NULL,
  `assigned_id` int(50) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_module_student`
--

INSERT INTO `assigned_module_student` (`aid`, `module_id`, `assigned_id`, `status`) VALUES
(1, 2, 1, 'CLAIMED'),
(2, 2, 2, 'UN-CLAIMED'),
(3, 3, 1, 'CLAIMED'),
(4, 3, 2, 'UN-CLAIMED'),
(5, 4, 1, 'CLAIMED'),
(6, 4, 2, 'UN-CLAIMED'),
(7, 5, 1, 'CLAIMED'),
(8, 5, 2, 'UN-CLAIMED'),
(9, 7, 1, 'CLAIMED'),
(10, 7, 2, 'UN-CLAIMED'),
(11, 8, 1, 'CLAIMED'),
(12, 8, 2, 'UN-CLAIMED');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_section`
--

CREATE TABLE `assigned_section` (
  `id` int(11) NOT NULL,
  `teach_id` int(100) NOT NULL,
  `sec_id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_section`
--

INSERT INTO `assigned_section` (`id`, `teach_id`, `sec_id`, `email`) VALUES
(1, 88013, 2, 'tricore012@gmail.com'),
(2, 74344, 1, 'hellodevcore@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_section_student`
--

CREATE TABLE `assigned_section_student` (
  `id` int(11) NOT NULL,
  `stud_id` int(100) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_section_student`
--

INSERT INTO `assigned_section_student` (`id`, `stud_id`, `sec_id`, `email`) VALUES
(1, 82277, 2, 'tricore012@gmail.com'),
(2, 93529, 3, 'hellodevcore@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `email_security`
--

CREATE TABLE `email_security` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_attemp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_security`
--

INSERT INTO `email_security` (`id`, `user_id`, `code`, `status`, `date_attemp`) VALUES
(1, 2, 677713, 'USED', '2022-09-28'),
(2, 2, 961995, 'USED', '2022-09-28'),
(3, 2, 774749, 'USED', '2022-09-28'),
(4, 4, 920450, 'UNUSED', '2022-09-28'),
(5, 4, 894927, 'UNUSED', '2022-09-28'),
(6, 4, 683888, 'USED', '2022-09-28'),
(7, 4, 893412, 'USED', '2022-09-28'),
(8, 2, 867553, 'USED', '2022-09-28'),
(9, 1, 852243, 'USED', '2022-09-28'),
(10, 2, 808339, 'USED', '2022-09-28'),
(11, 1, 684376, 'USED', '2022-09-28'),
(12, 4, 673990, 'USED', '2022-09-28'),
(13, 4, 908172, 'USED', '2022-09-28'),
(14, 2, 918111, 'USED', '2022-09-28'),
(15, 4, 978129, 'USED', '2022-09-28'),
(16, 2, 840586, 'USED', '2022-09-28'),
(17, 4, 741739, 'USED', '2022-10-01'),
(18, 2, 905171, 'USED', '2022-10-02'),
(19, 4, 770954, 'USED', '2022-10-02'),
(20, 4, 941609, 'USED', '2022-10-02'),
(21, 2, 948425, 'USED', '2022-10-03'),
(22, 4, 951771, 'USED', '2022-10-03'),
(23, 2, 893676, 'USED', '2022-10-03'),
(24, 2, 758920, 'USED', '2022-10-06'),
(25, 4, 949127, 'USED', '2022-10-06'),
(26, 2, 973958, 'USED', '2022-10-06'),
(27, 4, 756621, 'USED', '2022-10-06'),
(28, 2, 895863, 'USED', '2022-10-06'),
(29, 4, 723937, 'USED', '2022-10-06'),
(30, 2, 851979, 'USED', '2022-10-06'),
(31, 4, 695535, 'USED', '2022-10-19'),
(32, 2, 980366, 'USED', '2022-10-19'),
(33, 2, 944040, 'VALID', '2022-10-19'),
(34, 2, 691080, 'USED', '2022-10-19'),
(35, 2, 696756, 'USED', '2022-10-19'),
(36, 2, 761138, 'USED', '2022-10-21'),
(37, 2, 906026, 'USED', '2022-10-21'),
(38, 2, 886576, 'USED', '2022-10-23'),
(39, 2, 790659, 'USED', '2022-10-23'),
(40, 2, 880299, 'UNUSED', '2022-10-24'),
(41, 2, 745370, 'USED', '2022-10-24'),
(42, 2, 974721, 'USED', '2022-10-24'),
(43, 2, 997182, 'UNUSED', '2022-10-24'),
(44, 2, 829365, 'USED', '2022-10-24'),
(45, 2, 728932, 'USED', '2022-10-24'),
(46, 2, 886148, 'USED', '2022-10-24'),
(47, 4, 678323, 'USED', '2022-10-27'),
(48, 2, 703399, 'USED', '2022-10-27'),
(49, 2, 828796, 'USED', '2022-10-29'),
(50, 4, 805846, 'UNUSED', '2022-10-30'),
(51, 4, 854736, 'USED', '2022-10-30'),
(52, 1, 929270, 'UNUSED', '2022-11-02'),
(53, 1, 967997, 'USED', '2022-11-02'),
(54, 1, 722024, 'USED', '2022-11-02'),
(55, 1, 811807, 'USED', '2022-11-02'),
(56, 1, 672311, 'UNUSED', '2022-11-02'),
(57, 1, 899963, 'USED', '2022-11-02'),
(58, 1, 900766, 'USED', '2022-11-02'),
(59, 1, 810983, 'USED', '2022-11-02'),
(60, 1, 717854, 'USED', '2022-11-02'),
(61, 1, 914784, 'USED', '2022-11-02'),
(62, 1, 773142, 'USED', '2022-11-02'),
(63, 1, 672535, 'USED', '2022-11-02'),
(64, 1, 813394, 'USED', '2022-11-02'),
(65, 1, 943613, 'USED', '2022-11-02'),
(66, 1, 879475, 'USED', '2022-11-02'),
(67, 1, 784809, 'UNUSED', '2022-11-02'),
(68, 1, 797525, 'USED', '2022-11-02'),
(69, 1, 786223, 'USED', '2022-11-02'),
(70, 1, 816690, 'USED', '2022-11-02'),
(71, 1, 686176, 'USED', '2022-11-02'),
(72, 1, 797973, 'USED', '2022-11-02'),
(73, 1, 710743, 'USED', '2022-11-02'),
(74, 1, 779784, 'USED', '2022-11-02'),
(75, 1, 704711, 'USED', '2022-11-02'),
(76, 1, 698353, 'USED', '2022-11-02'),
(77, 1, 721882, 'USED', '2022-11-02'),
(78, 1, 750528, 'USED', '2022-11-02'),
(79, 1, 992462, 'USED', '2022-11-03'),
(80, 1, 701008, 'USED', '2022-11-03'),
(81, 1, 887461, 'USED', '2022-11-03'),
(82, 1, 851389, 'USED', '2022-11-03'),
(83, 1, 924590, 'USED', '2022-11-03'),
(84, 1, 855671, 'USED', '2022-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_level`) VALUES
(2, 'GRADE 1'),
(3, 'GRADE 2 '),
(4, 'GRADE 3'),
(5, 'GRADE 4'),
(6, 'GRADE 5'),
(7, 'GRADE 6'),
(8, 'GRADE 7 '),
(9, 'GRADE 8 '),
(10, 'GRADE 9'),
(11, 'GRADE 10'),
(12, 'GRADE 11'),
(13, 'GRADE 12'),
(15, 'KINDER');

-- --------------------------------------------------------

--
-- Table structure for table `module_list`
--

CREATE TABLE `module_list` (
  `id` int(11) NOT NULL,
  `mod_name` varchar(250) NOT NULL,
  `week_no` varchar(250) NOT NULL,
  `quarter_no` varchar(250) NOT NULL,
  `subj_id` int(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_list`
--

INSERT INTO `module_list` (`id`, `mod_name`, `week_no`, `quarter_no`, `subj_id`, `date_created`) VALUES
(2, 'MICRO TEST', 'Week 1', '1st Quarter', 4, '2022-10-29'),
(3, 'MIRCO1', 'Week 1', '1st Quarter', 1, '2022-10-29'),
(4, 'MICRO TEST', 'Week 1', '1st Quarter', 2, '2022-10-29'),
(5, 'ASDADSA', 'Week 2', '1st Quarter', 3, '2022-10-29'),
(6, 'TEST', 'Week 1', '1st Quarter', 11, '2022-10-30'),
(7, 'TEST', 'Week 1', '2nd Quarter', 1, '2022-10-30'),
(8, 'CHECK ME NOT', 'Week 1', '1st Quarter', 1, '2022-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `grade_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `grade_id`) VALUES
(1, 'KALINGA', 3),
(2, 'MAPAGMAHAL', 2),
(3, 'MATAPAT', 2),
(4, 'MATIMTIMAN', 2),
(5, 'MARAPATDAPAT', 2),
(6, 'MAPAGKAWANGGAWA', 2),
(7, 'KINDERJOY', 15),
(8, 'MASAGANA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `security_check`
--

CREATE TABLE `security_check` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_login` date NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_check`
--

INSERT INTO `security_check` (`id`, `email`, `date_login`, `role`) VALUES
(35, 'tricore012@gmail.com', '2022-11-02', 'TEACHER'),
(36, 'tricore012@gmail.com', '2022-11-03', 'ADMIN'),
(37, 'tricore012@gmail.com', '2022-11-03', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `stud_lrn` int(100) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `initial` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `stud_lrn`, `lname`, `fname`, `initial`, `email`, `sec_id`, `password`, `code`, `status`, `date_created`) VALUES
(1, 966115, 'Check me not', 'Gerald Tan', 'S', 'tricore012@gmail.com', 2, 'baff8366006e6317ee48cd8a29056c8e', 82277, 'VALID', '2022-10-29'),
(2, 996826, 'Mico', 'Gerald', 'S', 'hellodevcore@gmail.com', 3, 'ad93ee3499b7b6534228b5896a246281', 93529, 'VALID', '2022-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_id` int(11) NOT NULL,
  `subj_name` varchar(200) NOT NULL,
  `subj_code` int(100) NOT NULL,
  `grade_level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `subj_name`, `subj_code`, `grade_level`) VALUES
(1, 'MATH', 829131, 2),
(2, 'ENGLISH', 943684, 2),
(3, 'ARALING PANLIPUNAN', 820566, 2),
(4, 'HOME ECONOMICS', 978820, 2),
(9, 'ENGLISH', 802906, 15),
(10, 'MOTHER TONGUE', 786488, 2),
(11, 'TEST', 926676, 3),
(12, 'MIZRAIM', 880360, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(11) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `initial` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sec_id` int(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `lname`, `fname`, `initial`, `email`, `sec_id`, `password`, `code`, `status`, `date_created`) VALUES
(1, 'Check', 'Gerald', 'S', 'tricore012@gmail.com', 2, 'baff8366006e6317ee48cd8a29056c8e', 88013, 'VALID', '2022-10-29'),
(2, 'devcore', 'Gerald Mico', 's', 'hellodevcore@gmail.com', 1, 'ad93ee3499b7b6534228b5896a246281', 74344, 'VALID', '2022-10-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `assigned_module_student`
--
ALTER TABLE `assigned_module_student`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `assigned_section`
--
ALTER TABLE `assigned_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_section_student`
--
ALTER TABLE `assigned_section_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_security`
--
ALTER TABLE `email_security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `module_list`
--
ALTER TABLE `module_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `security_check`
--
ALTER TABLE `security_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assigned_module_student`
--
ALTER TABLE `assigned_module_student`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assigned_section`
--
ALTER TABLE `assigned_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assigned_section_student`
--
ALTER TABLE `assigned_section_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_security`
--
ALTER TABLE `email_security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `module_list`
--
ALTER TABLE `module_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `security_check`
--
ALTER TABLE `security_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
