-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 05:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

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

CREATE TABLE `academicyear` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`id`, `name`) VALUES
(1, 'A.Y. 2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `courseoffering_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `date` date NOT NULL,
<<<<<<< HEAD
  `time_set` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseoffering_id_idx` (`courseoffering_id`),
  KEY `status_id_idx` (`status_id`),
  CONSTRAINT `courseoffering_id` FOREIGN KEY (`courseoffering_id`) REFERENCES `courseoffering` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `attendancestatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `time_set` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `attendance`
--

<<<<<<< HEAD
LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,1,1,'','2016-09-22','1500'),(2,1,1,'','2016-09-24','1500'),(3,2,2,'','2016-11-02','0945'),(4,2,1,'','2016-11-07','0945'),(5,3,1,'','2016-09-22','1500'),(6,4,1,'','2016-09-22','1130'),(7,5,1,'','2016-09-22','0945'),(8,6,1,'','2016-09-22','0945'),(9,7,1,'','2016-09-22','1130'),(10,8,2,'','2016-09-22','1315');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `attendance` (`id`, `courseoffering_id`, `status_id`, `remarks`, `date`, `time_set`) VALUES
(1, 1, 1, 'AB', '2016-09-22', '1500'),
(2, 1, 1, 'LA', '2016-09-24', '1500'),
(3, 2, 2, 'ED', '2016-11-02', '0945'),
(4, 1, 1, 'EA', '2016-11-07', '0945'),
(5, 3, 1, 'SW', '2016-09-22', '1500'),
(6, 4, 1, 'AB', '2016-09-22', '1130'),
(7, 5, 1, 'ED', '2016-09-22', '0945'),
(8, 6, 1, 'EA', '2016-09-22', '0945'),
(9, 7, 1, 'LA', '2016-09-22', '1130'),
(10, 8, 2, 'AB', '2016-09-22', '1315');

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `attendancestatus`
--

CREATE TABLE `attendancestatus` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendancestatus`
--

INSERT INTO `attendancestatus` (`id`, `code`, `name`, `description`) VALUES
(1, 'LA', 'Late', 'Faculty is late to class'),
(2, 'AB', 'Absent', 'Faculty did not come to class'),
(3, 'EA', 'Excused Absence', 'Faculty has a valid excuse'),
(4, 'ED', 'Early Dismissal', 'Faculty dismissed class early');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
<<<<<<< HEAD
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `building`
--

<<<<<<< HEAD
LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES (1,'Gokongwei'),(2,'Velasco');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `building` (`id`, `name`) VALUES
(1, 'Gokongwei'),
(2, 'Velasco');

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `checkeraccount`
--

CREATE TABLE `checkeraccount` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
<<<<<<< HEAD
  `rotation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rotation_id_idx` (`rotation_id`),
  CONSTRAINT `rotation_id` FOREIGN KEY (`rotation_id`) REFERENCES `rotation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `rotation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `checkeraccount`
--

<<<<<<< HEAD
LOCK TABLES `checkeraccount` WRITE;
/*!40000 ALTER TABLE `checkeraccount` DISABLE KEYS */;
INSERT INTO `checkeraccount` VALUES (1,'Keith','Ohare','Dyabooty','Keith','GwapoAko',1),(2,'Ralph','Jason','Bravante','Ralph','GwapoAko1',2),(3,'Jason','Jason','Sy','Jason','GwapoAko2',3);
/*!40000 ALTER TABLE `checkeraccount` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `checkeraccount` (`id`, `first_name`, `middle_name`, `last_name`, `user_name`, `password`, `rotation_id`) VALUES
(1, 'Keith', 'Ohare', 'Dyabooty', 'Keith', 'GwapoAko', 1),
(2, 'Ralph', 'Jason', 'Bravante', 'Ralph', 'GwapoAko1', 2),
(3, 'Jason', 'Jason', 'Sy', 'Jason', 'GwapoAko2', 3);

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `hours` varchar(45) NOT NULL,
<<<<<<< HEAD
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `course`
--

<<<<<<< HEAD
LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'HCIFACE','Human Computer Interfaces','3.0','undergraduate'),(2,'OPERSYS','Operating Systems','3.0','undergraduate'),(3,'DASALGO','Data structures and algorithms','3.0','undergraduate'),(4,'OBJECTP','Object Oriented Programming','3.0','undergraduate'),(5,'MACLERN','Machine Learning','3.0','undergraduate'),(6,'INTRODB','Introduction to Database Systems','3.0','undergraduate'),(7,'SOFENGG','Software Engineering','3.0','undergraduate'),(8,'WEBAPDE','Web Application Development','3.0','undergraduate'),(9,'MATAPRE','Math appreciation','3.0','undergraduate'),(10,'ENGTRIG','Trigonometry for Engineering Students','3.0','undergraduate');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;
=======
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
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `courseoffering`
--

CREATE TABLE `courseoffering` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` varchar(45) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `time_start` varchar(45) NOT NULL,
  `time_end` varchar(45) NOT NULL,
<<<<<<< HEAD
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id_idx` (`course_id`),
  KEY `faculty_id_idx` (`faculty_id`),
  KEY `term_id_idx` (`term_id`),
  KEY `room_id_idx` (`room_id`),
  CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `courseoffering`
--

<<<<<<< HEAD
LOCK TABLES `courseoffering` WRITE;
/*!40000 ALTER TABLE `courseoffering` DISABLE KEYS */;
INSERT INTO `courseoffering` VALUES (1,1,'S18',1,3,'1430','1600',1),(2,2,'S17',2,3,'0915','1045',1),(3,6,'S17',5,3,'1430','1600',3),(4,4,'S17',6,3,'1100','1230',5),(5,7,'S17',3,3,'0915','1045',4),(6,10,'EA',8,3,'0915','1045',8),(7,9,'EZ',9,3,'1100','1230',8),(8,9,'EZ',9,3,'1245','1415',8);
/*!40000 ALTER TABLE `courseoffering` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `courseoffering` (`id`, `course_id`, `section`, `faculty_id`, `term_id`, `time_start`, `time_end`, `room_id`) VALUES
(1, 1, 'S18', 20134908, 3, '1430', '1600', 1),
(2, 2, 'S17', 20143854, 3, '0915', '1045', 1),
(3, 6, 'S17', 20143854, 3, '1430', '1600', 3),
(4, 4, 'S17', 97038133, 3, '1100', '1230', 5),
(5, 7, 'S17', 97066310, 3, '0915', '1045', 4),
(6, 10, 'EA', 20143854, 3, '0915', '1045', 8),
(7, 9, 'EZ', 20143854, 3, '1100', '1230', 8),
(8, 9, 'EZ', 97038133, 3, '1245', '1415', 8);

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `college` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pic` varchar(45) NOT NULL,
  `mobile_number` varchar(45) NOT NULL,
<<<<<<< HEAD
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `department` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `faculty`
--

<<<<<<< HEAD
LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (1,'Patrick Ruffio','Alvero','Arceo','CCS','patrick_arceo@dlsu.edu.ph','sample','09228500313','Math'),(2,'Darren','Goldwin','David','COE','darren_david@dlsu.edu.ph','sample','09165590089','Software Technology'),(3,'Briane','Paul','Samson','CCS','briane_samson@dlsu.edu.ph','sample','12345678901','Software Technology'),(4,'Roger','Somthing','Uy','CCS','roger_uy@dlsu.edu.ph','sample','12345678902','Software Technology'),(5,'Ethel','Somthing','Ong','CCS','ethel_ong@dlsu.edu.ph','sample','12345678903','Software Technology'),(6,'Thomas','James','Tiam-Lee','CCS','thomasjames_tiam-lee@dlsu.edu.ph','sample','12345678904','Software Technology'),(7,'Judith','Jay','Azcarraga','CCS','judith_azcarraga@dlsu.edu.ph','sample','12345678905','Software Technology'),(8,'Teech','Ng','Eng','GCOE','some_eng_prof@dlsu.edu.ph','Sample','12345678906','Math'),(9,'Nagaaral','Ng','Mabooty','GCOE','mabooty_prof@dlsu.edu.ph','Sample','12345678907','Math');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `faculty` (`id`, `first_name`, `middle_name`, `last_name`, `college`, `email`, `pic`, `mobile_number`, `department`) VALUES
(20134908, 'Ma Teresa', 'C', 'Calanoc', 'COS', 'ma.teresa.calanoc@dlsu.edu.ph', 'calanoc.jpeg', '09126790396', 'Biology'),
(20143854, 'Jovy', 'S', 'Sanchez', 'GCOE', 'jovy.sanchez@dlsu.edu.ph', 'sanchez.jpeg', '09151053598', 'Electronics and Communications Engineering'),
(97038133, 'Kousei', 'E', 'Arima', 'GCOE', 'kousei.arima@dlsu.edu.ph', 'arima.jpeg', '09106439714', 'Industrial Engineering'),
(97066310, 'Kaori', 'K', 'Miyazono', 'CCS', 'kaori.miyazono@dlsu.edu.ph', 'miyazono.jpeg', '09144219564', 'Software Technology');

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `leadaccount`
--

CREATE TABLE `leadaccount` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leadaccount`
--

INSERT INTO `leadaccount` (`id`, `first_name`, `middle_name`, `last_name`, `password`, `user_name`) VALUES
(1, 'Patrick Ruffio', 'Alvero', 'Arceo', '123123', 'pubz');

-- --------------------------------------------------------

--
-- Table structure for table `makeupclass`
--

CREATE TABLE `makeupclass` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `reason_code` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `time_start` varchar(45) NOT NULL,
  `time_end` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
<<<<<<< HEAD
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `building_id_idx` (`building_id`),
  CONSTRAINT `building_id` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `room`
--

<<<<<<< HEAD
LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'G205',1),(2,'G209',1),(3,'G201',1),(4,'G211',1),(5,'G304B',1),(7,'G202',1),(8,'V202',2),(9,'V204',2),(10,'V311',2);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;
=======
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
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `rotation`
--

CREATE TABLE `rotation` (
<<<<<<< HEAD
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `id` int(11) NOT NULL,
  `rotationroom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `rotation`
--

<<<<<<< HEAD
LOCK TABLES `rotation` WRITE;
/*!40000 ALTER TABLE `rotation` DISABLE KEYS */;
INSERT INTO `rotation` VALUES (1),(2),(3),(4);
/*!40000 ALTER TABLE `rotation` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `rotation` (`id`, `rotationroom_id`) VALUES
(1, 7),
(2, 2),
(3, 1),
(4, 2);

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `rotationroom`
--

CREATE TABLE `rotationroom` (
<<<<<<< HEAD
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id_idx` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
=======
  `id` int(11) NOT NULL,
  `room_id_list` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/master

--
-- Dumping data for table `rotationroom`
--

<<<<<<< HEAD
LOCK TABLES `rotationroom` WRITE;
/*!40000 ALTER TABLE `rotationroom` DISABLE KEYS */;
INSERT INTO `rotationroom` VALUES (1,1),(2,2),(3,2),(4,7);
/*!40000 ALTER TABLE `rotationroom` ENABLE KEYS */;
UNLOCK TABLES;
=======
INSERT INTO `rotationroom` (`id`, `room_id_list`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 7);

-- --------------------------------------------------------
>>>>>>> refs/remotes/origin/master

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `term_no` varchar(45) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `room_id_idx` (`room_id_list`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attendancestatus`
--
ALTER TABLE `attendancestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `checkeraccount`
--
ALTER TABLE `checkeraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `courseoffering`
--
ALTER TABLE `courseoffering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `leadaccount`
--
ALTER TABLE `leadaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `makeupclass`
--
ALTER TABLE `makeupclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rotation`
--
ALTER TABLE `rotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rotationroom`
--
ALTER TABLE `rotationroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Constraints for table `rotation`
--
ALTER TABLE `rotation`
  ADD CONSTRAINT `rotationroom_id` FOREIGN KEY (`id`) REFERENCES `rotationroom` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `year_id` FOREIGN KEY (`year_id`) REFERENCES `academicyear` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
<<<<<<< HEAD
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-18  1:02:37
=======
>>>>>>> refs/remotes/origin/master
