-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 03:49 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
  `time_set` varchar(45) NOT NULL,
  `reason` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `courseoffering_id`, `status_id`, `remarks`, `date`, `time_set`, `reason`) VALUES
(1, 1, 2, '', '2016-12-01', '1500', ''),
(2, 1, 2, '', '2016-12-01', '1500', 'PM'),
(3, 1, 2, '', '2016-12-01', '0945', 'CF'),
(4, 2, 2, '', '2016-11-07', '0945', 'XX'),
(5, 2, 2, '', '2016-12-01', '1500', 'PM'),
(6, 5, 1, '', '2016-12-01', '1130', ''),
(7, 7, 1, '', '2016-12-01', '0945', ''),
(8, 7, 1, '', '2016-12-01', '0945', ''),
(9, 7, 1, '', '2016-12-01', '1130', ''),
(10, 8, 2, '', '2016-12-01', '1315', 'CF');

-- --------------------------------------------------------

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
(3, 'EA', 'Excused Abscence', 'Faculty has a valid excuse'),
(4, 'ED', 'Early Dismissal', 'Faculty dismissed class early');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`) VALUES
(1, 'Gokongwei'),
(2, 'Velasco'),
(3, 'Andrew'),
(4, 'Milagros Del Rosario'),
(5, 'St. La Salle'),
(6, 'Miguel'),
(7, 'Multen Marie'),
(8, 'Yuchengco'),
(9, 'STRC'),
(10, 'Razon');

-- --------------------------------------------------------

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
  `rotation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hours` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'ENGTRIG', 'Trigonometry for Engineering Students', '3.0', 'undergraduate'),
(11, 'ADVDISC', 'Advanced Discrete Structures', '3.0', 'undergraduate'),
(12, 'CSETHIC', 'CS Professional Ethics', '3.0', 'undergraduate'),
(13, 'HUMALIT', 'Introduction to Literature', '3.0', 'undergraduate'),
(14, 'ENGLCOM', 'Basic Communication and Study Skills', '6.0', 'undergraduate'),
(15, 'KASPIL1', 'Buhay, mga Sinulat at Nagawa ni Dr. Jose P. Rizal', '3.0', 'undergraduate'),
(16, 'KASPIL2', 'Kasaysayan ng Pilipinas', '3.0', 'undergraduate'),
(17, 'TREDTWO', 'The Filipino Christian in a Changing World', '3.0', 'undergraduate'),
(18, 'TREDTRI', 'The Christian and the Word', '3.0', 'undergraduate'),
(19, 'TREDFOR', 'The Christian Vocation to Life', '3.0', 'undergraduate'),
(20, 'SPEECOM', 'Oral Communication / Advanced Speech Class', '3.0', 'undergraduate'),
(21, 'ENGLRES', 'Basic Research Skills / English for Specific Purposes', '3.0', 'undergraduate'),
(22, 'HUMAART', 'Introduction to Art', '3.0', 'undergraduate'),
(23, 'SOCTEC1', 'Science, Technology and Society 1', '3.0', 'undergraduate'),
(24, 'SOCTEC2', 'Science, Technology and Society 2', '3.0', 'undergraduate'),
(25, 'MOBAPDE', 'Mobile Application Development', '3.0', 'undergraduate'),
(26, 'ALGOCOM', 'Algorithms and Complexity', '3.0', 'undergraduate'),
(27, 'AUTOMAT', 'Automata, Computability, and Formal Languages', '3.0', 'undergraduate'),
(28, 'ADVANDB', 'Advanced Topics in Database Systems', '3.0', 'undergraduate'),
(29, 'OPERSYS', 'Operating Systems', '3.0', 'undergraduate'),
(30, 'ARCHORG', 'Computer Architecture and Organization', '3.0', 'undergraduate');

-- --------------------------------------------------------

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
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseoffering`
--

INSERT INTO `courseoffering` (`id`, `course_id`, `section`, `faculty_id`, `term_id`, `time_start`, `time_end`, `room_id`) VALUES
(1, 27, 'S12', 20148670, 1, '1100', '1230', 7),
(2, 30, 'X23', 20148670, 1, '0730', '0900', 11),
(3, 2, 'S13', 20148670, 1, '1430', '1600', 5),
(4, 1, 'S14', 20148670, 1, '1615', '1745', 3),
(5, 10, 'XEE1', 97083692, 1, '0915', '1045', 11),
(6, 14, 'X22', 97083692, 1, '1100', '1230', 12),
(7, 20, 'C22', 97083692, 1, '1430', '1600', 13),
(8, 30, 'E22', 97083692, 1, '1615', '1745', 9);

-- --------------------------------------------------------

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
  `department` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `first_name`, `middle_name`, `last_name`, `college`, `email`, `pic`, `mobile_number`, `department`) VALUES
(20121062, 'Joshua', 'C', 'Ramos', 'CLA', 'joshua.ramos@dlsu.edu.ph', 'ramos.jpeg', '09119245472', 'International Studies'),
(20121170, 'Angel', 'E', 'Alva', 'SOE', 'angel.alva@dlsu.edu.ph', 'alva.jpeg', '09150448089', 'Economics'),
(20121543, 'Sandra', 'B', 'Vazquez', 'COS', 'sandra.vazquez@dlsu.edu.ph', 'vazquez.jpeg', '09120370208', 'Chemistry'),
(20121633, 'Lorenzo', 'V', 'Santos', 'CCS', 'lorenzo.santos@dlsu.edu.ph', 'santos.jpeg', '09185044755', 'Computer Technology'),
(20121696, 'Timothy', 'I', 'Shelton', 'SOE', 'timothy.shelton@dlsu.edu.ph', 'shelton.jpeg', '09152254056', 'Economics'),
(20121739, 'Pamela', 'D', 'Pruitt', 'RVRCOB', 'pamela.pruitt@dlsu.edu.ph', 'pruitt.jpeg', '09172686323', 'Accountantcy'),
(20121914, 'Francine', 'X', 'Meyers', 'CCS', 'francine.meyers@dlsu.edu.ph', 'meyers.jpeg', '09155574330', 'Computer Technology'),
(20122176, 'Virginia', 'Q', 'Nichols', 'BAGCED', 'virginia.nichols@dlsu.edu.ph', 'nichols.jpeg', '09149788042', 'Physical Education'),
(20123578, 'James', 'N', 'Burgess', 'GCOE', 'james.burgess@dlsu.edu.ph', 'burgess.jpeg', '09173563799', 'Mechanical Engineering'),
(20123660, 'Wendy', 'V', 'Culley', 'GCOE', 'wendy.culley@dlsu.edu.ph', 'culley.jpeg', '09138541187', 'Manufacturing Engineering and Management'),
(20123864, 'Tamra', 'M', 'Inman', 'RVRCOB', 'tamra.inman@dlsu.edu.ph', 'inman.jpeg', '09111006615', 'Accountantcy'),
(20124181, 'Otis', 'P', 'Line', 'GCOE', 'otis.line@dlsu.edu.ph', 'line.jpeg', '09102244146', 'Electronics and Communications Engineering'),
(20124380, 'Jose', 'G', 'Davis', 'SOE', 'jose.davis@dlsu.edu.ph', 'davis.jpeg', '09195859871', 'Economics'),
(20124487, 'Andrea', 'F', 'Estuart', 'GCOE', 'andrea.estuart@dlsu.edu.ph', 'estuart.jpeg', '09122326057', 'Manufacturing Engineering and Management'),
(20125194, 'Kyle', 'P', 'Black', 'RVRCOB', 'kyle.black@dlsu.edu.ph', 'black.jpeg', '09183272365', 'Marketing Management'),
(20125342, 'Duane', 'V', 'Herrera', 'RVRCOB', 'duane.herrera@dlsu.edu.ph', 'herrera.jpeg', '09167408768', 'Decision Sceiences and Innovation Department'),
(20125763, 'Sakura', 'S', 'Haruno', 'RVRCOB', 'sakura.haruno@dlsu.edu.ph', 'haruno.jpeg', '09183376635', 'Marketing Management'),
(20125892, 'Queen', 'V', 'Dickson', 'BAGCED', 'queen.dickson@dlsu.edu.ph', 'dickson.jpeg', '09146592757', 'Educational Leadership and Management'),
(20126532, 'John', 'M', 'Cruz', 'CLA', 'john.cruz@dlsu.edu.ph', 'cruz.jpeg', '09179546365', 'International Studies'),
(20126848, 'Carla', 'D', 'Lopez', 'COS', 'carla.lopez@dlsu.edu.ph', 'lopez.jpeg', '09110790381', 'Biology'),
(20126971, 'Brent', 'Z', 'Johnson', 'COS', 'brent.johnson@dlsu.edu.ph', 'johnson.jpeg', '09113037990', 'Physics'),
(20127403, 'David', 'S', 'Cloutier', 'CLA', 'david.cloutier@dlsu.edu.ph', 'cloutier.jpeg', '09102721779', 'Communication'),
(20127829, 'Michelle', 'F', 'Snyder', 'SOE', 'michelle.snyder@dlsu.edu.ph', 'snyder.jpeg', '09141457795', 'Economics'),
(20128496, 'Raymond', 'S', 'McLendon', 'BAGCED', 'raymond.mclendon@dlsu.edu.ph', 'mclendon.jpeg', '09133363580', 'Educational Leadership and Management'),
(20128633, 'Lisa', 'S', 'McNatt', 'RVRCOB', 'lisa.mcnatt@dlsu.edu.ph', 'mcnatt.jpeg', '09118444742', 'Decision Sceiences and Innovation Department'),
(20128898, 'Gio', 'U', 'Valdez', 'CLA', 'gio.valdez@dlsu.edu.ph', 'valdez.jpeg', '09175448349', 'Communication'),
(20129652, 'Susan', 'J', 'Hyland', 'SOE', 'susan.hyland@dlsu.edu.ph', 'hyland.jpeg', '09157093969', 'Economics'),
(20129884, 'Miyuki', 'B', 'Tatsuya', 'COS', 'miyuki.tatsuya@dlsu.edu.ph', 'tatsuya.jpeg', '09121590233', 'Mathematics'),
(20129960, 'Helen', 'I', 'McInnis', 'BAGCED', 'helen.mcinnis@dlsu.edu.ph', 'mcinnis.jpeg', '09152037501', 'Physical Education'),
(20130064, 'Stephanie', 'Z', 'McInturff', 'BAGCED', 'stephanie.mcinturff@dlsu.edu.ph', 'mcinturff.jpeg', '09156643188', 'Educational Leadership and Management'),
(20130673, 'Rikki', 'C', 'Logsdon', 'CLA', 'rikki.logsdon@dlsu.edu.ph', 'logsdon.jpeg', '09133993633', 'Psychology'),
(20130788, 'Jabe', 'C', 'Antonio', 'BAGCED', 'jabe.antonio@dlsu.edu.ph', 'antonio.jpeg', '09116485167', 'Department of English and Applied Linguistics'),
(20131314, 'Daniela', 'S', 'Sison', 'GCOE', 'daniela.sison@dlsu.edu.ph', 'sison.jpeg', '09175911059', 'Industrial Engineering'),
(20131374, 'Michael', 'F', 'Ramirez', 'SOE', 'michael.ramirez@dlsu.edu.ph', 'ramirez.jpeg', '09195021942', 'Economics'),
(20131445, 'Lorelei', 'R', 'Montero', 'GCOE', 'lorelei.montero@dlsu.edu.ph', 'montero.jpeg', '09109071504', 'Civil Engineering'),
(20131770, 'Ria', 'F', 'Alejar', 'COS', 'ria.alejar@dlsu.edu.ph', 'alejar.jpeg', '09175638321', 'Chemistry'),
(20131913, 'Ngoc', 'S', 'Bloodworth', 'SOE', 'ngoc.bloodworth@dlsu.edu.ph', 'bloodworth.jpeg', '09142658800', 'Economics'),
(20132558, 'Jeremy', 'T', 'Langston', 'BAGCED', 'jeremy.langston@dlsu.edu.ph', 'langston.jpeg', '09104247007', 'Science Education'),
(20132644, 'Pamela', 'H', 'Pontiff', 'RVRCOB', 'pamela.pontiff@dlsu.edu.ph', 'pontiff.jpeg', '09189998791', 'Marketing Management'),
(20133014, 'Kaguya', 'O', 'Otsutsuki', 'CLA', 'kaguya.otsutsuki@dlsu.edu.ph', 'otsutsuki.jpeg', '09127437919', 'Philosophy'),
(20133173, 'Jacquelyne', 'U', 'Marchand', 'SOE', 'jacquelyne.marchand@dlsu.edu.ph', 'marchand.jpeg', '09100016721', 'Economics'),
(20133798, 'Thomas', 'Y', 'Knight', 'SOE', 'thomas.knight@dlsu.edu.ph', 'knight.jpeg', '09165026031', 'Economics'),
(20133968, 'Judy', 'S', 'Armstead', 'SOE', 'judy.armstead@dlsu.edu.ph', 'armstead.jpeg', '09142191280', 'Economics'),
(20134945, 'Charles', 'T', 'Randazzo', 'COS', 'charles.randazzo@dlsu.edu.ph', 'randazzo.jpeg', '09147387644', 'Chemistry'),
(20135358, 'Kinshiki', 'A', 'Otsutsuki', 'COS', 'kinshiki.otsutsuki@dlsu.edu.ph', 'otsutsuki.jpeg', '09185806476', 'Chemistry'),
(20135516, 'Kristian', 'O', 'Sisayan', 'GCOE', 'kristian.sisayan@dlsu.edu.ph', 'sisayan.jpeg', '09182987566', 'Chemical Engineering'),
(20135540, 'Jomdrew', 'V', 'Amigo', 'BAGCED', 'jomdrew.amigo@dlsu.edu.ph', 'amigo.jpeg', '09184585409', 'Science Education'),
(20136231, 'Darlene', 'A', 'Odegaard', 'CCS', 'darlene.odegaard@dlsu.edu.ph', 'odegaard.jpeg', '09194948601', 'Information Technology'),
(20137250, 'Jeanne', 'Y', 'Smith', 'CCS', 'jeanne.smith@dlsu.edu.ph', 'smith.jpeg', '09146450250', 'Computer Technology'),
(20137458, 'Shin', 'J', 'Uchiha', 'SOE', 'shin.uchiha@dlsu.edu.ph', 'uchiha.jpeg', '09187662759', 'Economics'),
(20137609, 'Kabuto', 'E', 'Yakushi', 'COS', 'kabuto.yakushi@dlsu.edu.ph', 'yakushi.jpeg', '09186041931', 'Mathematics'),
(20138231, 'Joshua', 'N', 'Maldonado', 'GCOE', 'joshua.maldonado@dlsu.edu.ph', 'maldonado.jpeg', '09181065224', 'Chemical Engineering'),
(20138256, 'Charlotte', 'Q', 'Estell', 'BAGCED', 'charlotte.estell@dlsu.edu.ph', 'estell.jpeg', '09196996686', 'Educational Leadership and Management'),
(20138261, 'Ronan', 'C', 'Sayato', 'BAGCED', 'ronan.sayato@dlsu.edu.ph', 'sayato.jpeg', '09194236594', 'Science Education'),
(20138498, 'Debbi', 'T', 'Mcdonough', 'COS', 'debbi.mcdonough@dlsu.edu.ph', 'mcdonough.jpeg', '09173930227', 'Mathematics'),
(20138517, 'Cynthia', 'N', 'Chase', 'GCOE', 'cynthia.chase@dlsu.edu.ph', 'chase.jpeg', '09162932908', 'Mechanical Engineering'),
(20138784, 'Chelsea', 'L', 'Hao', 'SOE', 'chelsea.hao@dlsu.edu.ph', 'hao.jpeg', '09152231103', 'Economics'),
(20138876, 'Czeide', 'D', 'Avanzado', 'COS', 'czeide.avanzado@dlsu.edu.ph', 'avanzado.jpeg', '09195379446', 'Chemistry'),
(20139183, 'Edward', 'F', 'Abram', 'BAGCED', 'edward.abram@dlsu.edu.ph', 'abram.jpeg', '09199915459', 'Physical Education'),
(20139373, 'Rudy', 'B', 'Bonner', 'CCS', 'rudy.bonner@dlsu.edu.ph', 'bonner.jpeg', '09122112706', 'Computer Technology'),
(20139637, 'Stephen', 'C', 'Dy', 'SOE', 'stephen.dy@dlsu.edu.ph', 'dy.jpeg', '09155139148', 'Economics'),
(20139844, 'Ann	', 'S', 'Cole', 'CCS', 'ann	.cole@dlsu.edu.ph', 'cole.jpeg', '09180250863', 'Computer Technology'),
(20140664, 'William', 'K', 'Conley', 'RVRCOB', 'william.conley@dlsu.edu.ph', 'conley.jpeg', '09148678919', 'Management and Organization Department'),
(20140680, 'John', 'X', 'McKenzie', 'CCS', 'john.mckenzie@dlsu.edu.ph', 'mckenzie.jpeg', '09117556064', 'Software Technology'),
(20140812, 'Lula', 'J', 'Bush', 'RVRCOB', 'lula.bush@dlsu.edu.ph', 'bush.jpeg', '09135673637', 'Decision Sceiences and Innovation Department'),
(20141804, 'Kakashi', 'N', 'Hakate', 'BAGCED', 'kakashi.hakate@dlsu.edu.ph', 'hakate.jpeg', '09105071476', 'Department of English and Applied Linguistics'),
(20142203, 'Anne', 'Q', 'Lara', 'COS', 'anne.lara@dlsu.edu.ph', 'lara.jpeg', '09172784210', 'Mathematics'),
(20143436, 'Merlin', 'K', 'Brumfield', 'BAGCED', 'merlin.brumfield@dlsu.edu.ph', 'brumfield.jpeg', '09188272581', 'Educational Leadership and Management'),
(20143525, 'George', 'I', 'Hamblin', 'BAGCED', 'george.hamblin@dlsu.edu.ph', 'hamblin.jpeg', '09172120316', 'Science Education'),
(20143621, 'Elizabeth', 'J', 'Hunt', 'RVRCOB', 'elizabeth.hunt@dlsu.edu.ph', 'hunt.jpeg', '09174120852', 'Accountantcy'),
(20144075, 'Bryant', 'Q', 'Willison', 'SOE', 'bryant.willison@dlsu.edu.ph', 'willison.jpeg', '09132456954', 'Economics'),
(20144140, 'John', 'W', 'Hames', 'RVRCOB', 'john.hames@dlsu.edu.ph', 'hames.jpeg', '09177344881', 'Decision Sceiences and Innovation Department'),
(20144506, 'Justin', 'P', 'Jaramillo', 'COS', 'justin.jaramillo@dlsu.edu.ph', 'jaramillo.jpeg', '09111942556', 'Biology'),
(20144899, 'Jordan', 'O', 'Purvis', 'CLA', 'jordan.purvis@dlsu.edu.ph', 'purvis.jpeg', '09190760877', 'History'),
(20145587, 'Reynaldo Jr', 'L', 'Bayeta', 'CCS', 'rey.bayeta@dlsu.edu.ph', 'bayeta.jpeg', '09112233445', 'Computer Technology'),
(20145918, 'Neil', 'G', 'Ruiz', 'SOE', 'neil.ruiz@dlsu.edu.ph', 'ruiz.jpeg', '09148900804', 'Economics'),
(20146240, 'Delpha', 'S', 'Ashley', 'GCOE', 'delpha.ashley@dlsu.edu.ph', 'ashley.jpeg', '09186906729', 'Electronics and Communications Engineering'),
(20146366, 'Susan', 'X', 'Pratt', 'CLA', 'susan.pratt@dlsu.edu.ph', 'pratt.jpeg', '09141736568', 'Communication'),
(20147908, 'Florence', 'X', 'Johnson', 'CCS', 'florence.johnson@dlsu.edu.ph', 'johnson.jpeg', '09145414892', 'Information Technology'),
(20147961, 'Dorothy', 'A', 'Okeefe', 'BAGCED', 'dorothy.okeefe@dlsu.edu.ph', 'okeefe.jpeg', '09125929584', 'Science Education'),
(20148093, 'Krishna', 'I', 'Stegall', 'RVRCOB', 'krishna.stegall@dlsu.edu.ph', 'stegall.jpeg', '09136131874', 'Accountantcy'),
(20148126, 'Frank', 'H', 'Gowin', 'GCOE', 'frank.gowin@dlsu.edu.ph', 'gowin.jpeg', '09182451271', 'Electronics and Communications Engineering'),
(20148304, 'Hermano', 'T', 'Pule', 'BAGCED', 'hermano.pule@dlsu.edu.ph', 'pule.jpeg', '09117058174', 'Department of English and Applied Linguistics'),
(20148613, 'Marianne', 'H', 'Mak', 'COS', 'marianne.mak@dlsu.edu.ph', 'mak.jpeg', '09123396217', 'Chemistry'),
(20148670, 'Sasuke', 'F', 'Uchiha', 'RVRCOB', 'sasuke.uchiha@dlsu.edu.ph', 'uchiha.jpeg', '09151425597', 'Management and Organization Department'),
(20149165, 'Sebastian', 'M', 'Boehm', 'SOE', 'sebastian.boehm@dlsu.edu.ph', 'boehm.jpeg', '09166385831', 'Economics'),
(20149803, 'Allisa', 'S', 'Aquino', 'SOE', 'allisa.aquino@dlsu.edu.ph', 'aquino.jpeg', '09188773698', 'Economics'),
(20149824, 'Betty', 'H', 'Anderson', 'COS', 'betty.anderson@dlsu.edu.ph', 'anderson.jpeg', '09121278006', 'Chemistry'),
(20149913, 'Lawrence', 'M', 'West', 'CCS', 'lawrence.west@dlsu.edu.ph', 'west.jpeg', '09141173637', 'Information Technology'),
(97002501, 'Marti', 'E', 'Salud', 'SOE', 'marti.salud@dlsu.edu.ph', 'salud.jpeg', '09134632132', 'Economics'),
(97002557, 'Jerome', 'P', 'Patiga', 'BAGCED', 'jerome.patiga@dlsu.edu.ph', 'patiga.jpeg', '09156730727', 'Physical Education'),
(97003017, 'Rhovic', 'T', 'Floro', 'GCOE', 'rhovic.floro@dlsu.edu.ph', 'floro.jpeg', '09174088352', 'Civil Engineering'),
(97004451, 'Lorene', 'L', 'Jones', 'CLA', 'lorene.jones@dlsu.edu.ph', 'jones.jpeg', '09112501748', 'Psychology'),
(97004972, 'Audrey', 'B', 'Leonard', 'SOE', 'audrey.leonard@dlsu.edu.ph', 'leonard.jpeg', '09128710743', 'Economics'),
(97005270, 'Angela', 'S', 'Lumba', 'SOE', 'angela.lumba@dlsu.edu.ph', 'lumba.jpeg', '09101123000', 'Economics'),
(97005976, 'Robyn', 'I', 'McMillan', 'CCS', 'robyn.mcmillan@dlsu.edu.ph', 'mcmillan.jpeg', '09129893010', 'Computer Technology'),
(97008228, 'Audrea', 'X', 'Mcneely', 'CCS', 'audrea.mcneely@dlsu.edu.ph', 'mcneely.jpeg', '09106074105', 'Information Technology'),
(97008270, 'Patrick', 'L', 'Tobias', 'SOE', 'patrick.tobias@dlsu.edu.ph', 'tobias.jpeg', '09158104115', 'Economics'),
(97009377, 'Tom', 'T', 'Bentley', 'RVRCOB', 'tom.bentley@dlsu.edu.ph', 'bentley.jpeg', '09173483419', 'Management and Organization Department'),
(97010691, 'Robin', 'S', 'Hood', 'CLA', 'robin.hood@dlsu.edu.ph', 'hood.jpeg', '09186273473', 'Political Science'),
(97011134, 'Kevin', 'S', 'Black', 'COS', 'kevin.black@dlsu.edu.ph', 'black.jpeg', '09121079125', 'Chemistry'),
(97014231, 'Robert', 'D', 'Gray', 'COS', 'robert.gray@dlsu.edu.ph', 'gray.jpeg', '09161213570', 'Chemistry'),
(97016125, 'Arica', 'Y', 'Mcduffie', 'RVRCOB', 'arica.mcduffie@dlsu.edu.ph', 'mcduffie.jpeg', '09183057021', 'Accountantcy'),
(97016412, 'Camille', 'X', 'Dizon', 'COS', 'camille.dizon@dlsu.edu.ph', 'dizon.jpeg', '09157858434', 'Biology'),
(97016827, 'Marina', 'N', 'Sang', 'CLA', 'marina.sang@dlsu.edu.ph', 'sang.jpeg', '09141827730', 'Political Science'),
(97019398, 'Nancy', 'Z', 'Armstrong', 'SOE', 'nancy.armstrong@dlsu.edu.ph', 'armstrong.jpeg', '09122006247', 'Economics'),
(97019953, 'Sara', 'T', 'Hendricks', 'GCOE', 'sara.hendricks@dlsu.edu.ph', 'hendricks.jpeg', '09126232736', 'Civil Engineering'),
(97021107, 'Mariann', 'N', 'Glaser', 'SOE', 'mariann.glaser@dlsu.edu.ph', 'glaser.jpeg', '09154583685', 'Economics'),
(97025547, 'Stephanie', 'D', 'Durden', 'CLA', 'stephanie.durden@dlsu.edu.ph', 'durden.jpeg', '09111678178', 'Psychology'),
(97026994, 'Janae', 'T', 'Parman', 'GCOE', 'janae.parman@dlsu.edu.ph', 'parman.jpeg', '09191835229', 'Civil Engineering'),
(97027108, 'Momoshiki', 'Z', 'Otsutsuki', 'COS', 'momoshiki.otsutsuki@dlsu.edu.ph', 'otsutsuki.jpeg', '09108437306', 'Biology'),
(97027319, 'Cara', 'W', 'Wieneke', 'COS', 'cara.wieneke@dlsu.edu.ph', 'wieneke.jpeg', '09145933357', 'Biology'),
(97028301, 'Weston', 'N', 'Smith', 'BAGCED', 'weston.smith@dlsu.edu.ph', 'smith.jpeg', '09143444644', 'Physical Education'),
(97028496, 'Shanel', 'T', 'Fairley', 'RVRCOB', 'shanel.fairley@dlsu.edu.ph', 'fairley.jpeg', '09160215148', 'Accountantcy'),
(97032367, 'Ria', 'E', 'Arca', 'COS', 'ria.arca@dlsu.edu.ph', 'arca.jpeg', '09111063776', 'Mathematics'),
(97040207, 'Zabuza', 'I', 'Momochi', 'BAGCED', 'zabuza.momochi@dlsu.edu.ph', 'momochi.jpeg', '09109447575', 'Counseling and Educational Psychology Departm'),
(97041484, 'Toneri', 'H', 'Otsutsuki', 'BAGCED', 'toneri.otsutsuki@dlsu.edu.ph', 'otsutsuki.jpeg', '09180745841', 'Physical Education'),
(97042050, 'William', 'A', 'Maciejewski', 'BAGCED', 'william.maciejewski@dlsu.edu.ph', 'maciejewski.jpeg', '09188193452', 'Educational Leadership and Management'),
(97044414, 'Bryan', 'J', 'Cartwright', 'SOE', 'bryan.cartwright@dlsu.edu.ph', 'cartwright.jpeg', '09115986392', 'Economics'),
(97045162, 'Lawrence', 'W', 'Johnson', 'RVRCOB', 'lawrence.johnson@dlsu.edu.ph', 'johnson.jpeg', '09174281358', 'Accountantcy'),
(97045764, 'Maynard', 'Y', 'Si', 'CCS', 'maynard.si@dlsu.edu.ph', 'si.jpeg', '09181215518', 'Information Technology'),
(97046698, 'Patricia', 'F', 'Parks', 'SOE', 'patricia.parks@dlsu.edu.ph', 'parks.jpeg', '09165921886', 'Economics'),
(97047405, 'Yolande', 'I', 'Jenson', 'BAGCED', 'yolande.jenson@dlsu.edu.ph', 'jenson.jpeg', '09192326010', 'Department of English and Applied Linguistics'),
(97050575, 'Roy', 'P', 'Perez', 'RVRCOB', 'roy.perez@dlsu.edu.ph', 'perez.jpeg', '09135211587', 'Commercial Law'),
(97050958, 'Richard', 'S', 'Erdmann', 'BAGCED', 'richard.erdmann@dlsu.edu.ph', 'erdmann.jpeg', '09184112362', 'Department of English and Applied Linguistics'),
(97051500, 'Dan', 'R', 'Gridley', 'COS', 'dan.gridley@dlsu.edu.ph', 'gridley.jpeg', '09128022640', 'Physics'),
(97052162, 'Cathern', 'Q', 'Valentin', 'SOE', 'cathern.valentin@dlsu.edu.ph', 'valentin.jpeg', '09129094118', 'Economics'),
(97052682, 'Kenneth', 'W', 'Miller', 'BAGCED', 'kenneth.miller@dlsu.edu.ph', 'miller.jpeg', '09107035178', 'Department of English and Applied Linguistics'),
(97053331, 'Kayla', 'X', 'Frey', 'CCS', 'kayla.frey@dlsu.edu.ph', 'frey.jpeg', '09127004293', 'Computer Technology'),
(97055036, 'Virginia', 'M', 'Williams', 'GCOE', 'virginia.williams@dlsu.edu.ph', 'williams.jpeg', '09117848528', 'Chemical Engineering'),
(97055059, 'Ryan', 'B', 'Roque', 'SOE', 'ryan.roque@dlsu.edu.ph', 'roque.jpeg', '09183473760', 'Economics'),
(97055309, 'Elizabeth', 'Q', 'Church', 'BAGCED', 'elizabeth.church@dlsu.edu.ph', 'church.jpeg', '09153010857', 'Counseling and Educational Psychology Departm'),
(97055457, 'Jamie', 'A', 'Heffington', 'CLA', 'jamie.heffington@dlsu.edu.ph', 'heffington.jpeg', '09103560181', 'Department of Literature'),
(97058133, 'Angel', 'W', 'Torbert', 'BAGCED', 'angel.torbert@dlsu.edu.ph', 'torbert.jpeg', '09175164170', 'Educational Leadership and Management'),
(97061791, 'Helen', 'E', 'White', 'GCOE', 'helen.white@dlsu.edu.ph', 'white.jpeg', '09182749389', 'Manufacturing Engineering and Management'),
(97062359, 'Tyree', 'K', 'Liu', 'CLA', 'tyree.liu@dlsu.edu.ph', 'liu.jpeg', '09121306043', 'Theology and Religious Education'),
(97062514, 'Leone', 'N', 'Daily', 'CLA', 'leone.daily@dlsu.edu.ph', 'daily.jpeg', '09130085844', 'Philosophy'),
(97062907, 'James', 'J', 'Adams', 'CLA', 'james.adams@dlsu.edu.ph', 'adams.jpeg', '09176736932', 'Communication'),
(97063074, 'Gary', 'S', 'Pixley', 'GCOE', 'gary.pixley@dlsu.edu.ph', 'pixley.jpeg', '09152208246', 'Civil Engineering'),
(97063177, 'Nella', 'Z', 'Ealy', 'RVRCOB', 'nella.ealy@dlsu.edu.ph', 'ealy.jpeg', '09152988700', 'Management and Organization Department'),
(97063511, 'John', 'M', 'Folsom', 'CCS', 'john.folsom@dlsu.edu.ph', 'folsom.jpeg', '09107796934', 'Computer Technology'),
(97064929, 'Jessica', 'A', 'Woody', 'RVRCOB', 'jessica.woody@dlsu.edu.ph', 'woody.jpeg', '09192708072', 'Decision Sceiences and Innovation Department'),
(97065657, 'Laura', 'G', 'Peak', 'CLA', 'laura.peak@dlsu.edu.ph', 'peak.jpeg', '09174995861', 'Theology and Religious Education'),
(97067059, 'Carolyn', 'Y', 'Gregory', 'GCOE', 'carolyn.gregory@dlsu.edu.ph', 'gregory.jpeg', '09115091984', 'Manufacturing Engineering and Management'),
(97068306, 'Francis', 'C', 'Magalona', 'GCOE', 'francis.magalona@dlsu.edu.ph', 'magalona.jpeg', '09100046533', 'Industrial Engineering'),
(97068874, 'Lewis', 'K', 'Martin', 'GCOE', 'lewis.martin@dlsu.edu.ph', 'martin.jpeg', '09186146465', 'Civil Engineering'),
(97069458, 'Nicol', 'G', 'Barnhill', 'COS', 'nicol.barnhill@dlsu.edu.ph', 'barnhill.jpeg', '09124603205', 'Biology'),
(97073766, 'Travis', 'G', 'Coleman', 'CLA', 'travis.coleman@dlsu.edu.ph', 'coleman.jpeg', '09152399037', 'Behavioral Sceiences'),
(97073948, 'Eddie', 'M', 'Flores', 'BAGCED', 'eddie.flores@dlsu.edu.ph', 'flores.jpeg', '09165325901', 'Counseling and Educational Psychology Departm'),
(97075959, 'Christopher', 'P', 'Condron', 'COS', 'christopher.condron@dlsu.edu.ph', 'condron.jpeg', '09162187542', 'Chemistry'),
(97076002, 'Angela', 'Y', 'Christine', 'CLA', 'angela.christine@dlsu.edu.ph', 'christine.jpeg', '09153650324', 'Departamento ng Filipino'),
(97076278, 'Ruth', 'D', 'Clark', 'CLA', 'ruth.clark@dlsu.edu.ph', 'clark.jpeg', '09130333814', 'Political Science'),
(97078015, 'James', 'B', 'Witcher', 'SOE', 'james.witcher@dlsu.edu.ph', 'witcher.jpeg', '09139362632', 'Economics'),
(97078213, 'Bianca', 'L', 'Carandang', 'COS', 'bianca.carandang@dlsu.edu.ph', 'carandang.jpeg', '09151341719', 'Mathematics'),
(97079420, 'Madara', 'H', 'Uchiha', 'CLA', 'madara.uchiha@dlsu.edu.ph', 'uchiha.jpeg', '09177388033', 'Department of Literature'),
(97080864, 'Luhinia', 'S', 'Ofren', 'CCS', 'luhinia.ofren@dlsu.edu.ph', 'ofren.jpeg', '09180385547', 'Software Technology'),
(97081128, 'Cheryl', 'O', 'Cloud', 'SOE', 'cheryl.cloud@dlsu.edu.ph', 'cloud.jpeg', '09197147477', 'Economics'),
(97082718, 'David', 'F', 'King', 'COS', 'david.king@dlsu.edu.ph', 'king.jpeg', '09194143702', 'Mathematics'),
(97082954, 'Berniece', 'Y', 'Haller', 'RVRCOB', 'berniece.haller@dlsu.edu.ph', 'haller.jpeg', '09103593070', 'Marketing Management'),
(97083692, 'Naruto', 'P', 'Uzumaki', 'SOE', 'naruto.uzumaki@dlsu.edu.ph', 'uzumaki.jpeg', '09140665589', 'Economics'),
(97086491, 'Shante', 'Y', 'Walker', 'BAGCED', 'shante.walker@dlsu.edu.ph', 'walker.jpeg', '09187147673', 'Science Education'),
(97086782, 'Andrea', 'V', 'Chua', 'SOE', 'andrea.chua@dlsu.edu.ph', 'chua.jpeg', '09135182501', 'Economics'),
(97087831, 'Kyle', 'C', 'Subido', 'CCS', 'kyle.subido@dlsu.edu.ph', 'subido.jpeg', '09111212853', 'Information Technology'),
(97088318, 'Orochimaru', 'Q', 'Haku', 'BAGCED', 'orochimaru.haku@dlsu.edu.ph', 'haku.jpeg', '09152660322', 'Counseling and Educational Psychology Departm'),
(97089579, 'Susana', 'B', 'Gray', 'CLA', 'susana.gray@dlsu.edu.ph', 'gray.jpeg', '09195724621', 'Behavioral Sceiences'),
(97089785, 'Steve', 'L', 'Miller', 'CCS', 'steve.miller@dlsu.edu.ph', 'miller.jpeg', '09183513796', 'Computer Technology'),
(97091233, 'Debbie', 'K', 'Kring', 'GCOE', 'debbie.kring@dlsu.edu.ph', 'kring.jpeg', '09197514025', 'Mechanical Engineering'),
(97091676, 'Phil', 'O', 'Whitten', 'GCOE', 'phil.whitten@dlsu.edu.ph', 'whitten.jpeg', '09101896203', 'Manufacturing Engineering and Management'),
(97092359, 'Violeta', 'R', 'Whitfield', 'CLA', 'violeta.whitfield@dlsu.edu.ph', 'whitfield.jpeg', '09143127958', 'Department of Literature'),
(97096071, 'JM', 'U', 'Hilario', 'GCOE', 'jm.hilario@dlsu.edu.ph', 'hilario.jpeg', '09163993296', 'Electronics and Communications Engineering'),
(97096165, 'Richard', 'L', 'Horn', 'COS', 'richard.horn@dlsu.edu.ph', 'horn.jpeg', '09182097121', 'Biology');

-- --------------------------------------------------------

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
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'V311', 2),
(11, 'W403', 4),
(12, 'W411', 4),
(13, 'A1205', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rotation`
--

CREATE TABLE `rotation` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `rotationroom` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `room_id_idx` (`room_id`),
  ADD KEY `faculty_id` (`faculty_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `checkeraccount`
--
ALTER TABLE `checkeraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
