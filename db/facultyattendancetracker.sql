CREATE DATABASE  IF NOT EXISTS `facultyattendancetracker` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `facultyattendancetracker`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: facultyattendancetracker
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academicyear`
--

DROP TABLE IF EXISTS `academicyear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academicyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academicyear`
--

LOCK TABLES `academicyear` WRITE;
/*!40000 ALTER TABLE `academicyear` DISABLE KEYS */;
INSERT INTO `academicyear` VALUES (1,'A.Y. 2015-2016');
/*!40000 ALTER TABLE `academicyear` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseoffering_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time_set` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseoffering_id_idx` (`courseoffering_id`),
  KEY `status_id_idx` (`status_id`),
  CONSTRAINT `courseoffering_id` FOREIGN KEY (`courseoffering_id`) REFERENCES `courseoffering` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `attendancestatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,1,2,'XX','2016-09-22','1500'),(2,1,2,'PM','2016-09-24','1500'),(3,2,2,'CF','2016-11-02','0945'),(4,2,2,'XX','2016-11-07','0945'),(5,3,2,'PM','2016-09-22','1500'),(6,4,1,'LA','2016-09-22','1130'),(7,5,3,'OB','2016-09-22','0945'),(8,6,3,'FT','2016-09-22','0945'),(9,7,3,'OB','2016-09-22','1130'),(10,8,2,'CF','2016-09-22','1315');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendancestatus`
--

DROP TABLE IF EXISTS `attendancestatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendancestatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendancestatus`
--

LOCK TABLES `attendancestatus` WRITE;
/*!40000 ALTER TABLE `attendancestatus` DISABLE KEYS */;
INSERT INTO `attendancestatus` VALUES (1,'LA','Late','Faculty is late to class'),(2,'AB','Absent','Faculty did not come to class'),(3,'EA','Excused Absence','Faculty has a valid excuse'),(4,'ED','Early Dismissal','Faculty dismissed class early');
/*!40000 ALTER TABLE `attendancestatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES (1,'Gokongwei'),(2,'Velasco');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkeraccount`
--

DROP TABLE IF EXISTS `checkeraccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkeraccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `rotation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rotation_id_idx` (`rotation_id`),
  CONSTRAINT `rotation_id` FOREIGN KEY (`rotation_id`) REFERENCES `rotation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkeraccount`
--

LOCK TABLES `checkeraccount` WRITE;
/*!40000 ALTER TABLE `checkeraccount` DISABLE KEYS */;
INSERT INTO `checkeraccount` VALUES (1,'Keith','Ohare','Dyabooty','Keith','GwapoAko',1),(2,'Ralph','Jason','Bravante','Ralph','GwapoAko1',2),(3,'Jason','Jason','Sy','Jason','GwapoAko2',3);
/*!40000 ALTER TABLE `checkeraccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `hours` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'HCIFACE','Human Computer Interfaces','3.0','undergraduate'),(2,'OPERSYS','Operating Systems','3.0','undergraduate'),(3,'DASALGO','Data structures and algorithms','3.0','undergraduate'),(4,'OBJECTP','Object Oriented Programming','3.0','undergraduate'),(5,'MACLERN','Machine Learning','3.0','undergraduate'),(6,'INTRODB','Introduction to Database Systems','3.0','undergraduate'),(7,'SOFENGG','Software Engineering','3.0','undergraduate'),(8,'WEBAPDE','Web Application Development','3.0','undergraduate'),(9,'MATAPRE','Math appreciation','3.0','undergraduate'),(10,'ENGTRIG','Trigonometry for Engineering Students','3.0','undergraduate');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseoffering`
--

DROP TABLE IF EXISTS `courseoffering`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseoffering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `section` varchar(45) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `time_start` varchar(45) NOT NULL,
  `time_end` varchar(45) NOT NULL,
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

--
-- Dumping data for table `courseoffering`
--

LOCK TABLES `courseoffering` WRITE;
/*!40000 ALTER TABLE `courseoffering` DISABLE KEYS */;
INSERT INTO `courseoffering` VALUES (1,1,'S18',20148867,3,'1430','1600',1),(2,2,'S17',90478090,3,'0915','1045',1),(3,6,'S17',90762212,3,'1430','1600',3),(4,4,'S17',20141122,3,'1100','1230',5),(5,7,'S17',20147777,3,'0915','1045',4),(6,10,'EA',90788867,3,'0915','1045',8),(7,9,'EZ',90874564,3,'1100','1230',8),(8,9,'EZ',90874564,3,'1245','1415',8);
/*!40000 ALTER TABLE `courseoffering` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `college` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pic` varchar(45) NOT NULL,
  `mobile_number` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (20141122,'Briane','Paul','Samson','CCS','briane_samson@dlsu.edu.ph','sample','12345678901','Software Technology'),(20141142,'Thomas','James','Tiam-Lee','CCS','thomasjames_tiam-lee@dlsu.edu.ph','sample','12345678904','Software Technology'),(20141234,'Judith','Jay','Azcarraga','CCS','judith_azcarraga@dlsu.edu.ph','sample','12345678905','Software Technology'),(20147777,'Nagaaral','Ng','Mabooty','GCOE','mabooty_prof@dlsu.edu.ph','Sample','12345678907','Math'),(20148867,'Patrick Ruffio','Alvero','Arceo','CCS','patrick_arceo@dlsu.edu.ph','sample','09228500313','Math'),(90478090,'Darren','Goldwin','David','COE','darren_david@dlsu.edu.ph','sample','09165590089','Software Technology'),(90762212,'Ethel','Somthing','Ong','CCS','ethel_ong@dlsu.edu.ph','sample','12345678903','Software Technology'),(90788867,'Roger','Somthing','Uy','CCS','roger_uy@dlsu.edu.ph','sample','12345678902','Software Technology'),(90874564,'Teech','Ng','Eng','GCOE','some_eng_prof@dlsu.edu.ph','Sample','12345678906','Math');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leadaccount`
--

DROP TABLE IF EXISTS `leadaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leadaccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leadaccount`
--

LOCK TABLES `leadaccount` WRITE;
/*!40000 ALTER TABLE `leadaccount` DISABLE KEYS */;
INSERT INTO `leadaccount` VALUES (1,'Patrick Ruffio','Alvero','Arceo','123123','pubz');
/*!40000 ALTER TABLE `leadaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makeupclass`
--

DROP TABLE IF EXISTS `makeupclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `makeupclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_id` int(11) NOT NULL,
  `reason_code` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `time_start` varchar(45) NOT NULL,
  `time_end` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attendance_id_idx` (`attendance_id`),
  KEY `room_id_idx` (`room_id`),
  CONSTRAINT `attendanceid` FOREIGN KEY (`attendance_id`) REFERENCES `attendance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `roomid` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makeupclass`
--

LOCK TABLES `makeupclass` WRITE;
/*!40000 ALTER TABLE `makeupclass` DISABLE KEYS */;
INSERT INTO `makeupclass` VALUES (1,3,'CF','2016-11-04',1,'1100','1230'),(2,10,'CF','2016-09-23',1,'1100','1230');
/*!40000 ALTER TABLE `makeupclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `building_id_idx` (`building_id`),
  CONSTRAINT `building_id` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'G205',1),(2,'G209',1),(3,'G201',1),(4,'G211',1),(5,'G304B',1),(7,'G202',1),(8,'V202',2),(9,'V204',2),(10,'V311',2);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rotation`
--

DROP TABLE IF EXISTS `rotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotationroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rotationroom_id_idx` (`rotationroom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotation`
--

LOCK TABLES `rotation` WRITE;
/*!40000 ALTER TABLE `rotation` DISABLE KEYS */;
INSERT INTO `rotation` VALUES (3,1),(1,2),(2,3),(4,4);
/*!40000 ALTER TABLE `rotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rotationroom`
--

DROP TABLE IF EXISTS `rotationroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rotationroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id_list` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id_idx` (`room_id_list`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotationroom`
--

LOCK TABLES `rotationroom` WRITE;
/*!40000 ALTER TABLE `rotationroom` DISABLE KEYS */;
INSERT INTO `rotationroom` VALUES (1,'1,2,4,7'),(4,'2,4,6'),(2,'3,5,6'),(3,'8,9,10');
/*!40000 ALTER TABLE `rotationroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `term_no` varchar(45) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `year_id_idx` (`year_id`),
  CONSTRAINT `year_id` FOREIGN KEY (`year_id`) REFERENCES `academicyear` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term`
--

LOCK TABLES `term` WRITE;
/*!40000 ALTER TABLE `term` DISABLE KEYS */;
INSERT INTO `term` VALUES (1,'2016-09-21','2016-10-20','1',1),(2,'2016-11-01','2017-01-04','2',1),(3,'2017-01-09','2017-02-28','3',1);
/*!40000 ALTER TABLE `term` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-08  1:15:11
