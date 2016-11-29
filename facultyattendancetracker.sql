-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 01:17 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultyattendancetracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE IF NOT EXISTS `academicyear` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`id`, `name`) VALUES
(1, 'A.Y. 2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL,
  `courseoffering_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time_set` varchar(45) NOT NULL,
  `reason` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `courseoffering_id`, `status_id`, `remarks`, `date`, `time_set`, `reason`) VALUES
(1, 1, 1, '', '2016-09-22', '1500', ''),
(2, 1, 1, '', '2016-09-24', '1500', ''),
(3, 2, 2, '', '2016-11-02', '0945', 'CF'),
(4, 2, 1, '', '2016-11-07', '0945', ''),
(5, 3, 1, '', '2016-09-22', '1500', ''),
(6, 4, 1, '', '2016-09-22', '1130', ''),
(7, 5, 1, '', '2016-09-22', '0945', ''),
(8, 6, 1, '', '2016-09-22', '0945', ''),
(9, 7, 1, '', '2016-09-22', '1130', ''),
(10, 8, 2, '', '2016-09-22', '1315', 'CF');

-- --------------------------------------------------------

--
-- Table structure for table `attendancestatus`
--

CREATE TABLE IF NOT EXISTS `attendancestatus` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendancestatus`
--

INSERT INTO `attendancestatus` (`id`, `code`, `name`, `description`) VALUES
(1, 'LA', 'Late', 'Faculty is late to class'),
(2, 'AB', 'Absent', 'Faculty did not come to class'),
(3, 'SB', 'Substitute', 'Substitute was present');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`) VALUES
(1, 'Gokongwei'),
(2, 'Velasco');

-- --------------------------------------------------------

--
-- Table structure for table `checkeraccount`
--

CREATE TABLE IF NOT EXISTS `checkeraccount` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `rotation_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkeraccount`
--

INSERT INTO `checkeraccount` (`id`, `first_name`, `middle_name`, `last_name`, `user_name`, `password`, `rotation_id`) VALUES
(1, 'Keith', 'Ohare', 'Dyabooty', 'Keith', 'GwapoAko', 1),
(2, 'Ralph', 'Jason', 'Bravante', 'Ralph', 'GwapoAko1', 2),
(3, 'Jason', 'Jason', 'Sy', 'Jason', 'GwapoAko2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `hours` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `name`, `hours`, `type`) VALUES
(1, 'HCIFACE', 'Human Computer Interfaces', '3.0', 'undergraduate'),
(2, 'OPERSYS', 'Operating Systems', '3.0', 'undergraduate'),
(3, 'DASALGO', 'Data structures and algorithms', '3.0', 'undergraduate'),
(4, 'OBJECTP', 'Object Oriented Programming', '3.0', 'undergraduate'),
(5, 'MACLERN', 'Machine Learning', '3.0', 'undergraduate'),
(6, 'INTRODB', 'Introduction to Database Systems', '3.0', 'undergraduate'),
(7, 'SOFENGG', 'Software Engineering', '3.0', 'undergraduate'),
(8, 'WEBAPDE', 'Web Application Development', '3.0', 'undergraduate'),
(9, 'MATAPRE', 'Math appreciation', '3.0', 'undergraduate'),
(10, 'ENGTRIG', 'Trigonometry for Engineering Students', '3.0', 'undergraduate');

-- --------------------------------------------------------

--
-- Table structure for table `courseoffering`
--

CREATE TABLE IF NOT EXISTS `courseoffering` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` varchar(45) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `time_start` varchar(45) NOT NULL,
  `time_end` varchar(45) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseoffering`
--

INSERT INTO `courseoffering` (`id`, `course_id`, `section`, `faculty_id`, `term_id`, `time_start`, `time_end`, `room_id`) VALUES
(1, 1, 'S18', 1, 3, '1430', '1600', 1),
(2, 2, 'S17', 2, 3, '0915', '1045', 1),
(3, 6, 'S17', 5, 3, '1430', '1600', 3),
(4, 4, 'S17', 6, 3, '1100', '1230', 5),
(5, 7, 'S17', 3, 3, '0915', '1045', 4),
(6, 10, 'EA', 8, 3, '0915', '1045', 8),
(7, 9, 'EZ', 9, 3, '1100', '1230', 8),
(8, 9, 'EZ', 9, 3, '1245', '1415', 8);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `college` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pic` varchar(45) NOT NULL,
  `mobile_number` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `idnumber` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `first_name`, `middle_name`, `last_name`, `college`, `email`, `pic`, `mobile_number`, `department`, `idnumber`) VALUES
(1, 'Patrick Ruffio', 'Alvero', 'Arceo', 'CCS', 'patrick_arceo@dlsu.edu.ph', 'sample', '09228500313', 'Computer Technology', '11425725'),
(2, 'Darren', 'Goldwin', 'David', 'GCOE', 'darren_david@dlsu.edu.ph', 'sample', '09165590089', 'Software Technology', '99834214'),
(3, 'Briane', 'Paul', 'Samson', 'CCS', 'briane_samson@dlsu.edu.ph', 'sample', '12345678901', 'Software Technology', '97844213'),
(4, 'Roger', 'Somthing', 'Uy', 'CCS', 'roger_uy@dlsu.edu.ph', 'sample', '12345678902', 'Software Technology', '87811213'),
(5, 'Ethel', 'Somthing', 'Ong', 'CCS', 'ethel_ong@dlsu.edu.ph', 'sample', '12345678903', 'Software Technology', '67611213'),
(6, 'Thomas', 'James', 'Tiam-Lee', 'CCS', 'thomasjames_tiam-lee@dlsu.edu.ph', 'sample', '12345678904', 'Software Technology', '97661217'),
(7, 'Judith', 'Jay', 'Azcarraga', 'CCS', 'judith_azcarraga@dlsu.edu.ph', 'sample', '12345678905', 'Software Technology', '17891217'),
(8, 'Teech', 'Ng', 'Eng', 'GCOE', 'some_eng_prof@dlsu.edu.ph', 'Sample', '12345678906', 'Mathematics', '98761218'),
(9, 'Nagaaral', 'Ng', 'Mabooty', 'GCOE', 'mabooty_prof@dlsu.edu.ph', 'Sample', '12345678907', 'Mathematics', '20149929'),
(10, 'Reynaldo Jr', 'L', 'Bayeta', 'CCS', 'rey.bayeta@dlsu.edu.ph', 'Sample', '09112233445', 'Computer Technology', '20145587'),
(11, 'Richelle', 'J', 'Chua', 'CCS', 'richelle.chua@dlsu.edu.ph', 'Sample', '09160229537', 'Information Technology', '20134412'),
(12, 'Kazuto', 'S', 'Kirigaya', 'CCS', 'kazuto.kirigaya@dlsu.edu.ph', 'Sample', '09082717449', 'Information Technology', '97011458'),
(13, 'Miyuki', 'B', 'Tatsuya', 'CCS', 'miyuki.tatsuya@dlsu.edu.ph', 'Sample', '09120427391', 'Information Technology', '97038857'),
(14, 'Kristian', 'S', 'Sisayan', 'RVRCOB', 'kristian.sisayan@dlsu.edu.ph', 'Sample', '09062934915', 'Decision Sciences', '97033915'),
(15, 'Hannah', 'N', 'Sibayan', 'RVRCOB', 'hannah.sibayan@dlsu.edu.ph', 'Sample', '09192014401', 'Innovation Sciences', '20139950'),
(16, 'Jovy', 'S', 'Sanchez', 'GCOE', 'jovy.sanchez@dlsu.edu.ph', 'Sample', '09067921691', 'Electronics and Communications Engineering', '20130370'),
(17, 'Domrec Joseph', 'K', 'Ebare', 'GCOE', 'domrec.ebare@dlsu.edu.ph', 'Sample', '09284491056', 'Mechanical Engineering', '20145932'),
(18, 'Jimmy James', 'N', 'Neutron', 'GCOE', 'jimmy.james.neutron@dlsu.edu.ph', 'Sample', '09284491056', 'Chemical Engineering', '97038143'),
(19, 'Alyssa', 'M', 'Masilungan', 'CLA', 'alyssa.masilungan@dlsu.edu.ph', 'Sample', '09159929406', 'Philosophy', '97022961'),
(20, 'Rolando', 'A', 'Celestial', 'CLA', 'ronnie.celestial@dlsu.edu.ph', 'Sample', '09996819412', 'Theology and Religious Education', '20139958'),
(21, 'Subaru', 'G', 'Natsuki', 'CLA', 'subaru.natsuki@dlsu.edu.ph', 'Sample', '09134920554', 'Psychology', '20139958'),
(22, 'Jose', 'P', 'Rizal', 'CLA', 'jose.rizal@dlsu.edu.ph', 'Sample', '09295881503', 'Literature', '97081759'),
(23, 'Reginald', 'L', 'Bayeta', 'COS', 'reginald.bayeta@dlsu.edu.ph', 'Sample', '09295153360', 'Mathematics', '20136883'),
(24, 'Jeselyn', 'S', 'Rosema', 'COS', 'jeselyn.rosema@dlsu.edu.ph', 'Sample', '09155938923', 'Mathematics', '97022104'),
(25, 'Maria', 'L', 'Manzanares', 'COS', 'maria.manzanares@dlsu.edu.ph', 'Sample', '09127473929', 'Chemistry', '20134492'),
(26, 'Marlyn', 'L', 'Panganiban', 'COS', 'marlyn.panganiban@dlsu.edu.ph', 'Sample', '09281838220', 'Biology', '20120331'),
(27, 'Jeruel Jr', 'T', 'Trinidad', 'COS', 'jeruel.trinidad@dlsu.edu.ph', 'Sample', '9281448293', 'Physics', '20120144'),
(28, 'Shiba', 'B', 'Tatsuya', 'COS', 'tatsuya.shiba@dlsu.edu.ph', 'Sample', '9201103048', 'Physics', '97021839'),
(29, 'Edward Justin', 'J', 'Tiro', 'BAGCED', 'edward.tiro@dlsu.edu.ph', 'Sample', '09163395913', 'Physical Education', '97059266'),
(30, 'Naruto', 'M', 'Uzumaki', 'BAGCED', 'naruto.uzumaki@dlsu.edu.ph', 'Sample', '09172264652', 'Physical Education', '20148295'),
(31, 'Shirley', 'C', 'Dita', 'BAGCED', 'shirley.dita@dlsu.edu.ph', 'Sample', '09164349296', 'Department of English and Applied Linguistics', '97022153'),
(32, 'Soma', 'U', 'Yukihira', 'CCS', 'soma.yukihira@dlsu.edu.ph', 'Sample', '09175729391', 'Information Technology', '97012384'),
(33, 'Kirigaya', 'S', 'Kirigaya', 'CCS', 'kazuto.kirigaya@dlsu.edu.ph', 'Sample', '09082717449', 'Information Technology', '97011458'),
(34, 'Miyuki', 'B', 'Tatsuya', 'CCS', 'miyuki.tatsuya@dlsu.edu.ph', 'Sample', '09120427391', 'Information Technology', '97038857'),
(35, 'Princess Sarah', 'M', 'Lagbati', 'RVRCOB', 'sarah.lagbati@dlsu.edu.ph', 'Sample', '09192879843', 'Decision Sciences', '20145888'),
(36, 'Hannah', 'N', 'Sibayan', 'RVRCOB', 'hannah.sibayan@dlsu.edu.ph', 'Sample', '09192014401', 'Innovation Sciences', '20139950'),
(37, 'Jovy', 'S', 'Sanchez', 'GCOE', 'jovy.sanchez@dlsu.edu.ph', 'Sample', '09067921691', 'Electronics and Communications Engineering', '20130370'),
(38, 'Domrec Joseph', 'K', 'Ebare', 'GCOE', 'domrec.ebare@dlsu.edu.ph', 'Sample', '09284491056', 'Mechanical Engineering', '20145932'),
(39, 'Jimmy James', 'N', 'Neutron', 'GCOE', 'jimmy.james.neutron@dlsu.edu.ph', 'Sample', '09284491056', 'Chemical Engineering', '97038143'),
(40, 'Alyssa', 'M', 'Masilungan', 'CLA', 'alyssa.masilungan@dlsu.edu.ph', 'Sample', '09159929406', 'Philosophy', '97022961'),
(41, 'Rolando', 'A', 'Celestial', 'CLA', 'ronnie.celestial@dlsu.edu.ph', 'Sample', '09996819412', 'Theology and Religious Education', '20139958'),
(42, 'Subaru', 'G', 'Natsuki', 'CLA', 'subaru.natsuki@dlsu.edu.ph', 'Sample', '09134920554', 'Psychology', '20139958'),
(43, 'Jose', 'P', 'Rizal', 'CLA', 'jose.rizal@dlsu.edu.ph', 'Sample', '09295881503', 'Literature', '97081759'),
(44, 'Reginald Geoffrey', 'L', 'Bayeta', 'COS', 'reginald.bayeta@dlsu.edu.ph', 'Sample', '09295153360', 'Mathematics', '20136883'),
(45, 'Jeselyn', 'S', 'Rosema', 'COS', 'jeselyn.rosema@dlsu.edu.ph', 'Sample', '09155938923', 'Mathematics', '97022104'),
(46, 'Maria Teresa', 'L', 'Calanoc', 'COS', 'teresa.calanoc@dlsu.edu.ph', 'Sample', '09082941195', 'Biology', '97051153'),
(47, 'Marlyn', 'L', 'Panganiban', 'COS', 'marlyn.panganiban@dlsu.edu.ph', 'Sample', '09281838220', 'Biology', '20120331'),
(48, 'Jeruel Jr', 'T', 'Trinidad', 'COS', 'jeruel.trinidad@dlsu.edu.ph', 'Sample', '09281448293', 'Physics', '20120144'),
(49, 'Shiba', 'B', 'Tatsuya', 'COS', 'tatsuya.shiba@dlsu.edu.ph', 'Sample', '09201103048', 'Physics', '97021839'),
(50, 'Edward Justin', 'J', 'Tiro', 'BAGCED', 'edward.tiro@dlsu.edu.ph', 'Sample', '09163395913', 'Physical Education', '97059266'),
(51, 'Naruto', 'M', 'Uzumaki', 'BAGCED', 'naruto.uzumaki@dlsu.edu.ph', 'Sample', '09172264652', 'Physical Education', '20148295'),
(52, 'Shirley', 'C', 'Dita', 'BAGCED', 'shirley.dita@dlsu.edu.ph', 'Sample', '09164349296', 'Department of English and Applied Linguistics', '97022153'),
(53, 'Sterling', 'H', 'Plata', 'BAGCED', 'sterling.plata@dlsu.edu.ph', 'Sample', '09169371638', 'Department of English and Applied Linguistics', '97022153'),
(54, 'Jomel Jr', 'L', 'Lorenzo', 'SOE', 'jomel.lorenzo@dlsu.edu.ph', 'Sample', '09173392631', 'Economics', '97021395'),
(55, 'Arces', 'O', 'Talavera', 'SOE', 'arces.talavera@dlsu.edu.ph', 'Sample', '09169104053', 'Economics', '97082561'),
(56, 'Myla', 'L', 'Sayat', 'RVRCOB', 'myla.sayat@dlsu.edu.ph', 'Sample', '09169010483', 'Accountancy', '20129440'),
(57, 'Angela Christine', 'L', 'Lumba', 'RVRCOB', 'angela.christine.lumba@dlsu.edu.ph', 'Sample', '09156687023', 'Accountancy', '97029148'),
(58, 'Ferdinand Jr', 'B', 'Beltran', 'RVRCOB', 'ferdinand.beltran@dlsu.edu.ph', 'Sample', '09175810384', 'Behavioral Sciences', '97027122'),
(59, 'Maria Jameeca', 'H', 'Reyes', 'RVRCOB', 'jameeca.reyes@dlsu.edu.ph', 'Sample', '09221848292', 'Behavioral Sciences', '20135948'),
(60, 'Jose Protacio', 'R', 'Realonda', 'CLA', 'jose.protacio.realonda@dlsu.edu.ph', 'Sample', '09152014892', 'History', '97011304'),
(61, 'Emilio', 'F', 'Aguinaldo', 'CLA', 'emilio.aguinaldo@dlsu.edu.ph', 'Sample', '09175810384', 'History', '20143302'),
(62, 'Kei', 'N', 'Takishima', 'GCOE', 'kei.takishima@dlsu.edu.ph', 'Sample', '09221848292', 'Industrial Engineering', '20139911'),
(63, 'Vincent', 'N', 'Asparri', 'GCOE', 'vincent.asparri@dlsu.edu.ph', 'Sample', '09219382049', 'Industrial Engineering', '97066942'),
(64, 'Rafael', 'P', 'Conejos', 'CLA', 'rafael.conejos@dlsu.edu.ph', 'Sample', '09298416312', 'Literature', '20132014'),
(66, 'Shauna', 'R', 'Vayne', 'COS', 'shauna.vayne@dlsu.edu.ph', 'Sample', '09294830139', 'Chemistry', '97001620'),
(67, 'John', 'L', 'De La Salle', 'CLA', 'john.delasalle@dlsu.edu.ph', 'Sample', '09124938500', 'Theology and Religious Education', '97001911');

-- --------------------------------------------------------

--
-- Table structure for table `leadaccount`
--

CREATE TABLE IF NOT EXISTS `leadaccount` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leadaccount`
--

INSERT INTO `leadaccount` (`id`, `first_name`, `middle_name`, `last_name`, `password`, `user_name`) VALUES
(1, 'Patrick Ruffio', 'Alvero', 'Arceo', '123123', 'pubz');

-- --------------------------------------------------------

--
-- Table structure for table `makeupclass`
--

CREATE TABLE IF NOT EXISTS `makeupclass` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `reason_code` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `time_start` varchar(45) NOT NULL,
  `time_end` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makeupclass`
--

INSERT INTO `makeupclass` (`id`, `attendance_id`, `reason_code`, `date`, `room_id`, `time_start`, `time_end`) VALUES
(1, 3, 'CF', '2016-11-04', 1, '1100', '1230'),
(2, 10, 'CF', '2016-09-23', 1, '1100', '1230');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `building_id`) VALUES
(1, 'G205', 1),
(2, 'G209', 1),
(3, 'G201', 1),
(4, 'G211', 1),
(5, 'G304B', 1),
(7, 'G202', 1),
(8, 'V202', 2),
(9, 'V204', 2),
(10, 'V311', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rotation`
--

CREATE TABLE IF NOT EXISTS `rotation` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rotation`
--

INSERT INTO `rotation` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `rotationroom`
--

CREATE TABLE IF NOT EXISTS `rotationroom` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rotationroom`
--

INSERT INTO `rotationroom` (`id`, `room_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `term_no` varchar(45) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `start`, `end`, `term_no`, `year_id`) VALUES
(1, '2016-09-21', '2016-10-20', '1', 1),
(2, '2016-11-01', '2017-01-04', '2', 1),
(3, '2017-01-09', '2017-02-28', '3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseoffering_id_idx` (`courseoffering_id`),
  ADD KEY `status_id_idx` (`status_id`);

--
-- Indexes for table `attendancestatus`
--
ALTER TABLE `attendancestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkeraccount`
--
ALTER TABLE `checkeraccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rotation_id_idx` (`rotation_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseoffering`
--
ALTER TABLE `courseoffering`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id_idx` (`course_id`),
  ADD KEY `faculty_id_idx` (`faculty_id`),
  ADD KEY `term_id_idx` (`term_id`),
  ADD KEY `room_id_idx` (`room_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadaccount`
--
ALTER TABLE `leadaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeupclass`
--
ALTER TABLE `makeupclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_id_idx` (`attendance_id`),
  ADD KEY `room_id_idx` (`room_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id_idx` (`building_id`);

--
-- Indexes for table `rotation`
--
ALTER TABLE `rotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rotationroom`
--
ALTER TABLE `rotationroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id_idx` (`room_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year_id_idx` (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attendancestatus`
--
ALTER TABLE `attendancestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `checkeraccount`
--
ALTER TABLE `checkeraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `courseoffering`
--
ALTER TABLE `courseoffering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `leadaccount`
--
ALTER TABLE `leadaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `makeupclass`
--
ALTER TABLE `makeupclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rotation`
--
ALTER TABLE `rotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rotationroom`
--
ALTER TABLE `rotationroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `courseoffering_id` FOREIGN KEY (`courseoffering_id`) REFERENCES `courseoffering` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `attendancestatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `checkeraccount`
--
ALTER TABLE `checkeraccount`
  ADD CONSTRAINT `rotation_id` FOREIGN KEY (`rotation_id`) REFERENCES `rotation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courseoffering`
--
ALTER TABLE `courseoffering`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `makeupclass`
--
ALTER TABLE `makeupclass`
  ADD CONSTRAINT `attendanceid` FOREIGN KEY (`attendance_id`) REFERENCES `attendance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `roomid` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `building_id` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `year_id` FOREIGN KEY (`year_id`) REFERENCES `academicyear` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
