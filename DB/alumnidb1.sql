-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 09:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnidb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE `branch_tbl` (
  `br_id` int(11) NOT NULL,
  `br_name` text NOT NULL,
  `ins_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`br_id`, `br_name`, `ins_id`) VALUES
(1, 'Department of Automobile Engineering', 1),
(2, 'Department of Civil Engineering', 1),
(3, 'Department of Electrical Engineering', 1),
(4, 'Department of Elect. & Comm. Engineering', 1),
(5, 'Department of Mechanical Engineering', 1),
(6, 'Department of Computer Engineering', 1),
(7, 'Department of Metallurgical Engineering', 1),
(8, 'Department of Management Studies', 2),
(9, 'Center for Indic Studies', 3),
(10, 'Indus Yoga and Wellness Center of Excellence', 3),
(11, 'Department of Computer Science', 4),
(12, 'Department of\r\nScience & Humanities', 5),
(13, 'Department of\r\nLife Sciences', 5),
(14, 'Indus Architecture School', 6),
(15, 'Indus Design School', 6),
(16, 'Indus Foundry Training & Research Center', 7),
(17, 'ISSCC', 7);

-- --------------------------------------------------------

--
-- Table structure for table `certificationcourses`
--

CREATE TABLE `certificationcourses` (
  `srno` int(11) NOT NULL,
  `course name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `course duration` varchar(50) NOT NULL,
  `starting date` date NOT NULL,
  `fees` varchar(10) NOT NULL,
  `last date to register` date NOT NULL,
  `link to register` varchar(255) NOT NULL,
  `note` varchar(500) NOT NULL,
  `contact detail` varchar(100) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `PDF` varchar(255) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificationcourses`
--

INSERT INTO `certificationcourses` (`srno`, `course name`, `description`, `course duration`, `starting date`, `fees`, `last date to register`, `link to register`, `note`, `contact detail`, `mode`, `PDF`, `createdon`) VALUES
(1, 'c name', 'c des', 'cdu', '2023-10-15', 'inr', '2023-10-15', 'link', 'no', 'c det', 'online', '../uploads/jobdocuments/skydroid.pdf', '2022-05-29 12:27:00'),
(2, 'qwerty', 'ok', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 14:51:15'),
(3, 'ok99', '99', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 14:53:28'),
(4, 'ipl', 'ipl', 'ipop', '2023-10-15', '8520', '2023-10-15', '1', '1', '1', 'Online', 'nofile', '2022-05-29 14:54:40'),
(5, 'q', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 14:58:28'),
(6, 'aaa', 'aaa', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 15:00:39'),
(7, 'z', 'z', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 15:01:05'),
(8, '1', '1', '1', '2025-10-15', '1', '2023-10-15', '1', '1', '1', '', '../uploads/jobdocuments/Akash Bhavsar Resume (4).pdf', '2022-05-29 16:59:23'),
(9, 'opl', '1', '1', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:38:51'),
(10, 'opl', '1', '1', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:38:53'),
(11, 'new course of python', 'ho gya ya nai?', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:42:51'),
(12, 'new course of python', 'ho gya ya nai?', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:42:51'),
(13, 'q', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:42:58'),
(14, 'q', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:42:58'),
(15, 'q', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:45:41'),
(16, 'q', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:45:41'),
(17, '1', '1', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:46:42'),
(18, '1', '1', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:46:43'),
(19, 'opopop', '777', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:48:29'),
(20, 'opopop', '777', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:48:29'),
(21, 'qwa', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:52:13'),
(22, 'qwa', 'q', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:52:13'),
(23, '111111', '1111111', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:55:13'),
(24, '111111', '1111111', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 17:55:13'),
(25, '1', '1', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 18:22:07'),
(26, '1', '1', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'nofile', '2022-05-29 18:22:07'),
(27, '1', '1', '1', '2023-10-15', '1', '0000-00-00', '', '', '', '', '../uploads/certificationcourse/skydroid.pdf', '2022-05-30 09:27:55'),
(28, '1', '1', '1', '2023-10-15', '1', '0000-00-00', '', '', '', '', '../uploads/certificationcourse/skydroid.pdf', '2022-05-30 09:30:51'),
(29, '1', '1', '1', '2023-10-15', '1', '0000-00-00', '', '', '', '', '../uploads/certificationcourse/skydroid.pdf', '2022-05-30 09:30:51'),
(30, 'Flutter for Beginners', 'Department of Computer Engineering, Indus Institute of Technology and Engineering, Indus University offers a Certification Program on  Flutter for Beginners    . The objective of the certification course is to provide hands-on skill development to students in the field of mobile app development for iphone as well as Android ', '4 weeks', '2022-06-02', '2000 INR', '2022-06-02', 'https://forms.gle/f3ZPc8T1nc9vo6a86', 'Computer Science and Engineering is also offering certification courses on \"Everythins as a Service ( XAAS) - Cloud \" in the same duration. You may register for both the courses if interested. The schedule will be prepared accordingly .', '', '', '../uploads/certificationcourse/basil-james-7x-Th7ws6T0-unsplash.jpg', '2022-06-02 10:08:40'),
(31, 'Flutter for Beginners', 'Department of Computer Engineering, Indus Institute of Technology and Engineering, Indus University offers a Certification Program on  Flutter for Beginners    . The objective of the certification course is to provide hands-on skill development to students in the field of mobile app development for iphone as well as Android ', '4 weeks', '2022-06-02', '2000 INR', '2022-06-02', 'https://forms.gle/f3ZPc8T1nc9vo6a86', 'Computer Science and Engineering is also offering certification courses on \"Everythins as a Service ( XAAS) - Cloud \" in the same duration. You may register for both the courses if interested. The schedule will be prepared accordingly .', '', '', '../uploads/certificationcourse/basil-james-7x-Th7ws6T0-unsplash.jpg', '2022-06-02 10:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`course_id`, `course_name`, `br_id`) VALUES
(1, 'B.Tech (Automobile Engineering)', 1),
(2, 'B.Tech (Civil Engineering)', 2),
(3, 'M.Tech (Civil Engineering)', 2),
(4, 'B.Tech (Electrical Engineering)', 3),
(5, 'M.Tech (Electric Power System)', 3),
(6, 'B. Tech (Electronics & Communication)', 4),
(7, 'M. Tech (Digital Communication)', 4),
(8, 'B.Tech (Mechanical Engineering)', 5),
(9, 'M. Tech (Digital Communication)', 5),
(10, 'B.Tech (Computer Engineering)', 6),
(11, 'M.Tech (Data Science)', 6),
(12, 'B.Tech  (Metallurgical Engineering)', 7),
(13, 'M.Tech  (Metallurgical Engineering)', 7),
(14, 'BBA', 8),
(15, 'MBA', 8),
(16, 'Integrated MBA', 8),
(17, 'Dual Degree MBA (BBA + MBA)', 8),
(18, 'B.Com (Honors) with ACCA UK - IIMS', 8),
(19, 'Breaking India – Rajiv Malhotra', 9),
(20, 'Natyashastra — 1', 9),
(21, 'Indian Models of Economy, Business and Management — 1', 9),
(22, 'भारत में मार्क्सवाद', 9),
(23, 'Introduction to Ayurveda', 9),
(24, 'Indian Linguistic Tradition — 1', 9),
(25, 'Indian Linguistic Tradition — 2', 9),
(26, 'भारतीय ज्ञान परम्परा — 1', 9),
(27, 'भारतीय ज्ञान परम्परा — 2', 9),
(28, 'Introduction to Hinduism — David Frawley (Vamadeva Shastri)', 9),
(29, 'Sati: Facts and Fiction', 9),
(30, 'Social Justice: Indic Concepts', 9),
(31, 'One month online Certificate Course in Yoga Therapy', 10),
(32, 'Dual Degree MSc (BSc + MSc) (CA & IT)', 11),
(33, 'Dual Degree MCA (BCA + MCA)', 11),
(34, 'MSc IT', 11),
(35, 'MCA', 11),
(36, 'B Sc. (Physics)', 12),
(37, 'B Sc. (Chemistry)', 12),
(38, 'B Sc. (Mathematics)', 12),
(39, 'B Sc. (Hons) Aircraft Maintenance', 12),
(40, 'M Sc. Physics', 12),
(41, 'M Sc. Chemistry', 12),
(42, 'M Sc. Mathematics', 12),
(43, 'Master of Arts in English Literature', 12),
(44, 'Master of Arts in English Language Teaching', 12),
(45, 'B Sc. - Clinical Research and Healthcare Management', 13),
(46, 'M Sc. - Clinical Research', 13),
(47, 'B.ARCH', 14),
(48, 'Fashion Design', 15),
(49, 'Industrial Design', 15),
(50, 'Communication Design', 15),
(51, 'IFTARC', 16),
(52, 'ISSCC', 17);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `srno` int(11) NOT NULL,
  `title` varchar(35) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `agenda` varchar(1000) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `PDF` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`srno`, `title`, `description`, `agenda`, `note`, `date`, `starttime`, `endtime`, `PDF`, `location`) VALUES
(1, 'Robotic Cafe', 'Aakash Gajjar, an alumnus of the Automobile Engineering department 2011 batch has opened a cafe called Robotic Cafe which is a fully machinery-based cafe where food is served by robots.\r\n\r\nHe currently holds the position of Managing Director in Penguin Innovative Engineering PVT LTD and his company is predisposed to inventions and making a difference in the field of technology. Penguin Innovative Engineering Pvt . Ltd has received Best Quality Product and Best New Innovative Product in 2022 by Honourable Chief Minister of Gujarat Shri Bhupendra Patel. Throughout its development and expansion, he has received high accolades from government officials.\r\n\r\nBeing a tech enthusiast, he has proved his excellence by providing food automatic solutions like Automatic pani puri machine , Automatic mukwas machine, Automatic sauce dispenser, Automatic tea-coffee maker.\r\n\r\nIndus University congratulate him for his success and best wishes for his future endeavors.', '', '', '2022-02-01', '10:00:00', '22:30:00', '', ' Penguin Innovative Engin'),
(2, 'National Science Day', 'Indus University and Vigyan Gurjari Karnavati Gandhinagar Unit jointly celebrate National Science day on 2nd March 2022.\r\n<br/>\r\nHonorable Minister of State for Higher & Technical Education and Legislative & Parliamentary affairs, Government of Gujarat  Dr. Kuberbhai Dindor, is invited as our esteemed chief guest. Dr. Prashant Kunjadiya, Director R&D, Joint Secretary and Treasurer Vigyan Gurjari, Gujarat Prant invited as esteem guest. In addition, Prof. Anil Bhardwaj, Director-PRL also grace the function as a Guest of Honour and enlighten the audience by his experience and valuable guidance. \r\n\r\nAfter the inaugural function, interesting and exciting events and competitions like Poster presentation, Quiz Competition and Speech competitions are arranged. All Students are actively participate in all the events.', '', 'Brochure: PDF Version', '2022-03-02', '09:30:00', '15:00:00', '', 'Indus University & Virtual'),
(3, 'Cyber Safety - Think Before you act', 'Women Development Cell, Indus University organized a workshop on Cyber Security against Cyber Crime on 8th March 2022.\r\n<br/>\r\nThe workshop mainly covers two broader aspects:\r\n<br/>\r\n1) Cyber Safety against Gender-based cybercrime (Harassment, stalking, blackmailing, threatening, etc)\r\n<br/>\r\n2) Cyber Security in digital space ( Phishing, spoofing, frauds, scams, etc)\r\n<br/>\r\nThis workshop provides a learning opportunity for all the students about the black side of cyberspace and how to deal with it through the individual level as well as with the help of legal aid.', '', '', '2022-03-08', '10:30:00', '14:30:00', '', 'MBA seminar hall'),
(5, 'Cyber Security Arms Race', 'An Expert talk on “Cyber Security Arms Race”  was organized virtually by The Computer Engineering Student Association [CESA] of IITE, Indus University on 12th March 2022. \r\n\r\nThe focus of the session is to elucidate the prospects of Cybersecurity,  it is often defined as an arms race between attackers and defenders: for example, when a new security model or algorithm is devised, it could act as a double-edged sword since it might both enhance the security posture of a system and introduce additional vulnerabilities.\r\n<br/> <br/>\r\n<b>Highlights of the event:</b><br>\r\n\r\n An interactive session was conducted Mr Ajinkya Lohakare,  CTO at Ditto security, Ethical Hacker | CHFI| LPT| Josh Talk speaker| TEDX Speaker| PODCASTER. Also delivered talks at general-interest events, such as JOSH TALK, VEDH TALK, THE DAIS CONCLAVE, Data security event.', '', 'Participation\r\n\r\n200+ total participants were there, students from CE, CS, IT, IIICT have participated in the event.\r\n\r\nKey Takeaways\r\n\r\nKnowledgeable session on understanding Cyber weapons and the new Arms Race by cultivating a cyber-culture through the types of data breaches, password protection techniques, breach monitoring, how to access the dark web, Osint Framework, phishing detection, security vulnerabilities on working of attack defence, SQL injection, web cache poisoning, forgery with server report, Maltego software usage, discussed darknet diaries also.\r\n\r\n', '2022-03-12', '11:30:00', '12:15:00', '', 'online'),
(12, 'Women\'s Day Celebration', 'To strengthen physical and mental health, WDC organizes yoga sessions for all female faculty/ staff members and girl students on 12th March 2022 by Ms Kinjal Yoga Session\r\n\r\nWomen Development Cell invited RJ Harsh from Radio Mirchi 104 to interact with faculty members and students\r\n\r\nWDC also provides a platform to our faculty and girl students to showcase their talent as a part of the International Women’s Day Celebration.', '', '', '2022-03-12', '09:45:00', '11:45:00', '', 'Auditorium, Indus University '),
(15, 'woman empowerment', 'Womens empowerment can be defined to promoting womens sense of self-worth, their ability to determine their own choices, and their right to influence social change for themselves and others.', '', '', '2022-04-28', '10:03:00', '11:03:00', '', 'Auditorium, main building');

-- --------------------------------------------------------

--
-- Table structure for table `eventsregistrations`
--

CREATE TABLE `eventsregistrations` (
  `srno` int(11) NOT NULL,
  `eventSrno` int(5) NOT NULL,
  `userSrno` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passout` varchar(4) NOT NULL,
  `course` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventsregistrations`
--

INSERT INTO `eventsregistrations` (`srno`, `eventSrno`, `userSrno`, `name`, `attendance`, `email`, `passout`, `course`, `department`) VALUES
(1, 13, 0, 'akash', 0, '', '2011', 'imsc', 'DCS'),
(2, 13, 0, 'akashbhavsar1510@gmail.com', 0, '', '7444', 'imsc', 'DCS'),
(3, 10, 0, 'akash', 0, '', '2011', 'imsc', 'DCS'),
(4, 10, 0, 'akash', 0, '', '2011', 'imsc', 'DCS'),
(5, 10, 0, 'akash', 0, '', '2011', 'imsc', 'DCS'),
(6, 10, 0, 'akash', 0, '', '2011', 'imsc', 'DCS'),
(7, 1, 1, 'akash', 1, '', '2011', 'oopp', 'DCS'),
(8, 15, 2, 'akash', 1, '', '2011', 'imsc', 'DCS'),
(9, 11, 15, 'akash bhavsar', 0, 'a@gmail.com', '2011', 'op', 'op'),
(12, 9, 15, 'akash bhavsar', 0, 'a@gmail.com', '2011', 'fffff', 'fff'),
(13, 7, 15, 'akash bhavsar', 0, 'a@gmail.com', '2011', 'op', 'op'),
(14, 7, 15, 'akash bhavsar', 0, 'a@gmail.com', '2011', 'imsc', 'DCS'),
(15, 12, 15, 'akash bhavsar', 1, 'a@gmail.com', '2019', 'imsc', 'dcs'),
(16, 12, 15, 'jiyan prajapati', 1, 'j@gmail.com', '2019', 'imsc', 'dcs'),
(17, 12, 15, 'khush shah', 1, 'ks@gmail.com', '2019', 'imsc', 'dcs'),
(18, 12, 15, 'mann kyada', 1, 'mk@gmail.com', '2020', 'imsc', 'DCS'),
(19, 5, 15, 'Jiyan  Prajapati', 0, 'mehujiyan@gmail.com', '2018', 'IMSC IT', 'DCS, IIICT'),
(20, 12, 39, 'a a', 1, 'q@k', '2011', '20', '20'),
(21, 12, 40, 'new 9', 1, 'q@q2', '2018', 'B.Tech (Civil Engineering)', 'Department of Civil Engineerin'),
(22, 12, 40, 'new 9', 1, 'q@q2', '2018', 'B.Tech (Civil Engineering)', 'Department of Civil Engineerin'),
(23, 12, 17, 'khush shah', 1, 'a@op.com', '2022', '<br /><b>Warning</b>:  Undefin', '<br /><b>Warning</b>:  Undefin');

-- --------------------------------------------------------

--
-- Table structure for table `institute_tbl`
--

CREATE TABLE `institute_tbl` (
  `ins_id` int(11) NOT NULL,
  `ins_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institute_tbl`
--

INSERT INTO `institute_tbl` (`ins_id`, `ins_name`) VALUES
(1, 'IITE - Indus Institute of Technology and Engineering'),
(2, 'IIMS - Indus Institute of Management Studies'),
(3, 'IISS - Indus Institute of Special Studies'),
(4, 'IIICT - Indus Institute of Information & Communication Technology'),
(5, 'IISHLS - Indus Institute of Sciences Humanities and Liberal Studies'),
(6, 'IIDEA - Indus Institute of Design Environment & Architecture'),
(7, 'ITSSC - Indus Technology and Smart Solution Centres');

-- --------------------------------------------------------

--
-- Table structure for table `jobopportunities`
--

CREATE TABLE `jobopportunities` (
  `srno` int(11) NOT NULL,
  `job role` varchar(30) NOT NULL,
  `job description` varchar(1000) NOT NULL,
  `company` varchar(30) NOT NULL,
  `about company` varchar(500) NOT NULL,
  `pdf link` varchar(255) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `eligibility` varchar(200) NOT NULL,
  `reqexp` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `deadline` date NOT NULL,
  `contact detail` varchar(100) NOT NULL,
  `verified` varchar(6) NOT NULL,
  `posted by` varchar(11) NOT NULL,
  `posted on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobopportunities`
--

INSERT INTO `jobopportunities` (`srno`, `job role`, `job description`, `company`, `about company`, `pdf link`, `salary`, `eligibility`, `reqexp`, `location`, `deadline`, `contact detail`, `verified`, `posted by`, `posted on`) VALUES
(1, 'title ', 'des', 'compny', 'about com', '', '4000', '', '', 'loc', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 16:53:25'),
(2, 'a', 'a', 'a', 'a', '', 'a', '', '', 'a', '2023-01-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 17:07:33'),
(3, 'a', 'a', 'a', 'a', '', 'a', '', '', 'a', '2023-01-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 17:08:01'),
(4, '4', '4', '4', '4', '', '4', '', '', '4', '2023-04-04', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:06:59'),
(5, '4', '4', '4', '4', '', '4', '', '', '4', '2023-04-04', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:09:01'),
(6, '4', '4', '4', '4', '', '4', '', '', '4', '2023-04-04', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:09:36'),
(7, '1', '1', '1', '1', '', '1', '', '', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:29:00'),
(8, '1', '1', '1', '1', '', '1', '', '', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:32:41'),
(9, '1', '1', '1', '1', '', '1', '', '', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:35:01'),
(10, '1', '1', '1', '1', '', '1', '', '', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:35:44'),
(11, '1', '1', '1', '1', '', '1', '', '', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-25 18:36:17'),
(12, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', '', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:42:54'),
(13, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:47:42'),
(14, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:49:02'),
(15, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:50:20'),
(16, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:50:55'),
(17, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:51:22'),
(18, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:51:48'),
(19, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:52:04'),
(20, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:52:23'),
(21, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:52:48'),
(22, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:53:04'),
(23, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:53:08'),
(24, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', '38', '2022-05-26 09:53:19'),
(25, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:54:14'),
(26, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', '', '2022-05-26 09:54:27'),
(27, 'tit', 'des', 'com', 'about com', '../uploads/jobdocuments/20b.pdf', 'sal', 'elig', '', 'loc', '2022-05-31', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 09:55:08'),
(28, 'tit', 'des', 'comp', 'about com', '../uploads/jobdocuments/skydroid.pdf', 'sal', 'req deg', '', 'loc', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 17:56:46'),
(29, 'tit', 'des', 'comp', 'about com', '../uploads/jobdocuments/skydroid.pdf', 'sal', 'req deg', '1q', 'loc', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-26 17:59:19'),
(30, '1', '1', '1', '1', '', '1', '1', '1', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', '', 'admin', '2022-05-27 15:05:06'),
(31, '2', '1', '1', '', '', '', '', '', '', '2022-05-04', '', 'true', '4', '2022-05-27 15:07:32'),
(32, 't', 'd', 'c', 'ac', 'nofile', 'sa', 're', 'exp', 'lo', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', 'admin', '2022-05-27 18:47:43'),
(33, 't', 'd', 'c', 'ac', 'nofile', 'sa', 're', 'exp', 'lo', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', 'admin', '2022-05-27 18:49:02'),
(34, 'jt', 'jd', 'c', 'ac', 'nofile', 's', 'req', 'exp', 'l', '2023-10-15', 'cdd', 'true', 'admin', '2022-05-27 18:53:16'),
(35, 'user', 'l', 'l', 'l', 'nofile', 'l', 'l', 'l', 'l', '2023-10-15', 'q', 'true', '39', '2022-05-27 19:12:53'),
(36, 'admin', 'l', 'l', 'l', '../uploads/jobdocuments/pySky34.docx.pdf', 'l', 'l', 'l', 'l', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', '39', '2022-05-27 19:13:50'),
(37, 'user', 'l', 'l', 'l', 'nofile', 'l', 'l', 'l', 'l', '2023-10-15', 'q', 'false', '39', '2022-05-27 19:17:42'),
(38, 'user', 'l', 'l', 'l', '../uploads/jobdocuments/20b22.pdf', 'l', 'l', 'l', 'l', '2023-10-15', 'q', 'true', 'admin', '2022-05-27 19:18:18'),
(39, '1', '1', '1', '1', 'nofile', '1', '1', '1', '1', '2023-10-15', 'ok', 'false', '16', '2022-05-28 09:15:29'),
(40, '1', '1', '1', '1', 'nofile', '1', '1', '1', '1', '2023-10-15', 'noke', 'true', '16', '2022-05-28 09:17:10'),
(41, '1', '1', '1', '1', 'nofile', '1', '1', '1', '1', '2023-11-11', ' Jiyan q > Email: q@q.com ', 'false', '16', '2022-05-28 09:44:36'),
(43, 'job29', '2', '2', '2', 'nofile', '2', '2', '2', '2', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', 'admin', '2022-05-29 18:12:35'),
(44, 'job29', '2', '2', '2', 'nofile', '2', '2', '2', '2', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', 'admin', '2022-05-29 18:12:35'),
(45, '1', '1', '1', '1', 'nofile', '1', '1', '1', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', 'admin', '2022-05-29 18:23:04'),
(46, '1', '1', '1', '1', 'nofile', '1', '1', '1', '1', '2023-10-15', 'Contact T&P cell of INDUS UNIVERSITY for more details.', 'true', 'admin', '2022-05-29 18:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_two`
--

CREATE TABLE `newsletter_two` (
  `srno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `PDF` varchar(255) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter_two`
--

INSERT INTO `newsletter_two` (`srno`, `title`, `PDF`, `createdon`) VALUES
(1, 'news title', '../uploads/newsletters/skydroid.pdf', '2022-05-30 09:34:18'),
(2, 'mark', 'nofile', '2022-05-31 10:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `noticeandupdates`
--

CREATE TABLE `noticeandupdates` (
  `srno` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `link` int(1) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticeandupdates`
--

INSERT INTO `noticeandupdates` (`srno`, `title`, `description`, `link`, `createdAt`) VALUES
(1, 'Archit Patadia on National Television ', 'Winners don’t wait for chances,\r\nthey take them and Archit\r\nPatadia from 7th semester\r\nMechanical Engineering of\r\nIndus University took this one\r\nchance of auditioning for India’s\r\nbiggest reality show THE\r\nVOICE INDIA SEASON-2 to set\r\nthe stage for his musical\r\njourney which has not been his\r\nhobby but passion since\r\nchildhood. His spectacular\r\nperformance vowed the\r\nprominent names from Music\r\nindustry of Bollywood namely\r\nShaan, Benny Dayal, & Salim\r\nMerchant, who gave our\r\nAmdavadi boy a standing\r\novation on his mellifluous\r\nrendition of ‘Mor Bani Thangat\r\nKare’, a beautiful remake of a\r\nGujarati song from the movie\r\nRam-Leela. Humility in his\r\nvoice was so endearing that\r\none of the judges Shaan\r\nremarked ‘You are not from\r\nA h m e d a b a d , Y o u a r e\r\nAmdavad!’', 0, '2022-04-20 03:46:24'),
(2, 'Faculty Achievement ', '<b>Prof. Tejendra Tank</b><br/>\r\ndelivered an Expert\r\nSession in the QIP\r\nSponsored Short Term\r\nCourse at SVNIT, Surat.\r\nThe title of Course was\r\n“Recent Advances in\r\nConcrete Technology &\r\nTesting of Materials” .The\r\nsession title was “Testing\r\nof Full-Scale Structural\r\nElements”. Faculty\r\nmembers from Gujarat\r\nand PhD Research\r\nScholars constituted a\r\nmajor section of the\r\naudience.<br/><br/>\r\n<b>Prof. Amit Singh from Civil</b><br/>\r\nEngineering Department\r\nattended and presented a\r\npaper in the “International\r\nC o n f e r e n c e O n\r\nTransportation Planning &\r\nI m p l e m e n t a t i o n\r\nM e t h o d o l o g i e s f o r\r\nDeveloping Countries”\r\no r g a n i z e d b y\r\nTransportation system\r\ne n g i n e e r i n g C i v i l\r\nengineering Department,\r\nIIT Bombay. The title of\r\npaper was “Use of Ceramic\r\nwaste as a filler as well as\r\naggregate in Bituminous\r\nConcrete” . ', 0, '2022-04-20 03:48:13'),
(3, 'Seminar on Aptitude Skill Development', 'ACSIT has organized one day seminar on aptitude skill development for Post graduation students on 4th August,2017. Mr. Deep and Mr. Parth from Logic Academy were invited for providing aptitude skill training which helped student to depict many aptitude techniques for competitive exams and interviews.', 0, '2022-04-20 03:54:30'),
(4, 'women emp', 'Womens empowerment can be defined to promoting womens sense of self-worth, their ability to determine their own choices, and their right to influence social change for themselves and others.', 0, '2022-04-20 07:05:25'),
(5, '', '', 0, '2022-05-29 12:24:35'),
(6, '1', '1', 0, '2022-05-29 17:27:26'),
(7, '1', '1', 0, '2022-05-29 17:28:11'),
(8, '1', '1', 1, '2022-05-29 17:28:38'),
(9, 'New certification course alert - 1 ', '', 1, '2022-05-29 17:46:43'),
(10, 'New certification course alert - qwa ', '', 1, '2022-05-29 17:52:13'),
(11, 'New certification course alert - 111111 ', '', 1, '2022-05-29 17:55:13'),
(12, '295op', 'event', 2, '2022-05-29 18:06:04'),
(13, 'New event added - 295op', 'event', 2, '2022-05-29 18:07:09'),
(14, 'New event added - job29', 'job', 3, '2022-05-29 18:12:35'),
(15, 'New certification course - 1 ', 'certification', 1, '2022-05-29 18:22:07'),
(16, 'New event added - 1', 'event', 2, '2022-05-29 18:22:43'),
(17, 'New job alert - 1', 'job', 3, '2022-05-29 18:23:05'),
(18, 'New certification course - 1 ', 'certification', 1, '2022-05-30 09:30:51'),
(19, 'New certification course - Flutter for Beginners ', 'certification', 1, '2022-06-02 10:08:40'),
(20, 'New event added - 0206', 'event', 2, '2022-06-02 12:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(3, 'akashbhavsar.19.imsc@iict.indusuni.ac.in', 'abb174445bee253f', '$2y$10$GoVQCGMd4EhQ0FBjyHp0OOLIYBKpSfrhzxDo8fJiOoSq1fU/b.yge', '1653868882'),
(16, 'akashbhavsar1510@gmail.com', 'bf55d074785efa0b', '$2y$10$d23VPsqG.IYoALukTxWKLuQ1i0n.j8Loy.z8EsUnwykP9ivFh3reC', '1653926217');

-- --------------------------------------------------------

--
-- Table structure for table `registerwaleuser`
--

CREATE TABLE `registerwaleuser` (
  `srno` int(11) NOT NULL,
  `first name` varchar(15) NOT NULL,
  `last name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `institute` varchar(2) NOT NULL,
  `branch` varchar(2) NOT NULL,
  `obtained degree` varchar(2) NOT NULL,
  `passout` int(4) NOT NULL,
  `company` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `created at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` text NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registerwaleuser`
--

INSERT INTO `registerwaleuser` (`srno`, `first name`, `last name`, `email`, `phoneno`, `password`, `institute`, `branch`, `obtained degree`, `passout`, `company`, `designation`, `country`, `city`, `created at`, `role`) VALUES
(47, 'Akash', 'Bhavsar', 'akashbhavsar1510@gmail.com', '8780154490', '$2y$10$r4fUjRdHiCzOOgTSjzh1Me9Wz5azr5s93IkZCCkvgBqxM2tGrHT0y', '1', '1', '1', 2018, 'Indus University', 'student', 'India', 'Ahmedabad', '2021-12-03 19:01:27', 'user'),
(48, 'ok', 'ok', 'ok@gmail.com', '8780154490', '$2y$10$7tTDpXnnVlgS7MEfehahMO.hfdDcESxOFWIdmm8S34fTxZwDTdvtu', '1', '1', '1', 2018, 'Indus University', 'student', 'India', 'Ahmedabad', '2021-12-03 19:01:52', 'user'),
(49, 'jiayn', 'hh', 'ji@gmail.com', '', '$2y$10$AOSutGnWg2xOCQBz8E46YOY7hz4MWGi5hHcUmpae7lDgo3g/PnbG.', '1', '1', '1', 2018, 'Indus University', 's', 'India', 'Ahmedabad', '2021-12-03 19:04:40', 'user'),
(50, 'Akash', 'Bhavsar', 'okakashbhavsar1510@gmail.com', '', '$2y$10$x0gqmmGrv3KXZp4IKJYHpuIycD63RfoWJ7UZ3k8MACiECNqdEA4R2', '1', '1', '1', 2018, 'Indus University', 'std', 'India', 'Ahmedabad', '2021-12-03 19:23:42', 'user'),
(51, 'Akash', 'Bhavsar', 'akashbhavsar111510@gmail.com', '8523232322', '$2y$10$Ca6brKDBnSERSmb2Vv8/Qe0aJ70TLzOvP5Jo8cpLVMDSMWZuZEP4e', '3', '9', '19', 2019, 'Indus University', 'st', 'India', 'Ahmedabad', '2021-12-03 19:30:45', 'user'),
(52, 'mann', 'khada', 'mk@gmail.com', '7111111111', '$2y$10$QyGKyDqWvSLEU.AUKpg..uLXrkN8WNhbvJxT9UtiCwrbyrblZJYmq', '2', '8', '16', 2020, 'igloo', 'senior dev', 'india', 'ahmedabad', '2021-12-04 11:51:18', 'user'),
(53, 'Akash', 'Bhavsar', '99akashbhavsa44r1510@gmail.com', '7417417414', '$2y$10$ObBgFMH4Ate5ktFVZ3CNS.Mmp.cGZ7oqahAE2xcpZueK6TfvO0sUO', '1', '1', '1', 2018, 'Indus University', 'student', 'India', 'Ahmedabad', '2021-12-04 11:52:10', 'user'),
(54, 'Akash', 'Bhavsar', 'akashbhavsar151000000@gmail.com', '8527417410', '$2y$10$UgSepojLGaVHygq8/VMIkeB0a5ovBdP5lD0UgLp9VjsQ2Swmh7vTS', '2', '8', '14', 2018, 'Indus University', 'student', 'India', 'Ahmedabad', '2021-12-04 11:55:36', 'user'),
(55, 'Akash', 'Bhavsar', 'akashbhavsar1bn510@gmail.com', '8780154440', '$2y$10$naTuD0vD6V874PZRH3f80exmAtrvVSrz9xg1LIsn4agKiHsXBMRc6', '1', '1', '1', 2018, 'Indus University', 'student', 'India', 'Ahmedabad', '2021-12-04 12:00:49', 'user'),
(56, 'ok', 'ok', 'ok741@gmail.com', '9121234564', '$2y$10$nTl6AH6nOn8Y3C9dU5eB1.xPEbgqOU1Fnt.nU2pF9kK4HqStsJN8i', '5', '12', '36', 2021, 'Indus University', 'std', 'India', 'Ahmedabad', '2021-12-04 12:06:36', 'user'),
(57, 'Jiyan', 'prajapati', 'jp@gmail.com', '8780154444', '$2y$10$tqHwQnJcx6hfg5.e4kqEceJrp1AYJOY3N2C//IB/adx/lZr6JMC2y', '1', '1', '1', 2018, 'indus', 'std', 'ind', 'ahd', '2021-12-04 13:57:57', 'user'),
(58, 'khush', 'shah', 'ks@gmail.com', '8780154474', '$2y$10$WBRtFQ.uomZ4NLL5uCfXzeVnWwaVueA1AeJyJZKye0R5aAgYwuD.e', '1', '3', '5', 2020, 'indus uni', 'std', 'ind', 'ahd', '2021-12-04 14:01:50', 'user'),
(59, 'Akash', 'Bhavsar', 'aka444shbhavsar1510@gmail.com', '8889996660', '$2y$10$AsFrJji9PqJg2rlF5tmleevw8jTF8bd5NWnPcfYEINKOXZlHzorrO', '2', '8', '16', 2019, 'Indus University', 'stf', 'India', 'Ahmedabad', '2021-12-04 14:12:02', 'user'),
(60, 'mann', 'kyada', 'mk2@gmail.com', '8989454522', '$2y$10$cm/ncrfG12//EtU1dS5I3eac1NUaOYYUxgo3W3FrQcZX1ZEfHYZsi', '1', '1', '1', 2019, 'indus uni', 'student', 'ind', 'surat', '2021-12-04 14:14:44', 'user'),
(61, 'Akash', 'Bhavsar', 'akashbhavsar1v510@gmail.com', '9638527412', '$2y$10$5rJ0N8qAzmIsEC9d2zhgje2TrcIr5Zhg/p8308vf7M/sXXWVmLcvu', '1', '1', '1', 2018, 'Indus University', 'mmm', 'India', 'Ahmedabad', '2021-12-04 19:11:35', 'user'),
(62, 'Akash', 'Bhavsar', 'akashbhavsar0001510@gmail.com', '8780154478', '$2y$10$behmSoCZunz.aUya2r/KB.bylT4jxt.3ipLTcU.eETNvZEP5mHSiO', '1', '1', '1', 2018, 'Indus University', 'io', 'India', 'Ahmedabad', '2021-12-04 19:32:16', 'user'),
(63, 'ok', 'ok', 'ok45@gmail.com', '8524562010', '$2y$10$6YQnNNnXNq77FRQt9LWA0uJwarLWWGBLFwr7NEoVFYY7kjQuhOp3i', '1', '1', '1', 2018, 'Indus University', 'op', 'India', 'Ahmedabad', '2021-12-04 20:23:07', 'user'),
(64, 'Akash', 'Bhavsar', 'akashbhavsar150010@gmail.com', '8780154409', '$2y$10$BZvD8VPVc79s42Uorhi5fOP8.DW4Dkbx8ChwX2edgomqTzkdF1F3m', '1', '', '', 2018, 'Indus University', 'oppp', 'India', 'Ahmedabad', '2021-12-04 20:28:37', 'user'),
(65, 'Akash', 'Bhavsar', 'ooakashbhavsar1510@gmail.com', '7417417439', '$2y$10$R8ACiSU6cx1aBoZPoop2mO.xL6QxIvCFhKBeRprmawhlPMusoONxe', '1', '1', '1', 2018, 'Indus University', 'io', 'India', 'Ahmedabad', '2021-12-04 20:31:21', 'user'),
(66, 'ok', 'ooook', 'up@gmail.com', '9685741230', '$2y$10$53SbzC33W1xwzoeCdDzGzOK43rbmHSGw1U7mHepiJO7qyM2ymDg5u', '1', '1', '1', 2018, 'op', 'op', 'op', 'o', '2021-12-04 20:34:30', 'user'),
(67, 'Akash', 'Bhavsar', '12akashbhavsar1510@gmail.com', '8780154433', '$2y$10$k/kRMlwdiO8puJy9qqqv7uocys6LNuJU3qmbFg1PMU6KKqCgjEFpO', '1', '3', '4', 2019, 'Indus University', 'std', 'India', 'Ahmedabad', '2021-12-05 08:57:32', 'user'),
(68, 'Akash', 'Bhavsar', 'ak101@gmail.com', '8780154452', '$2y$10$ngl3OB4ryFicuZBI1q4.Nu50.siNpjt0uncPfnG5EG4fPJr/Zijh.', '1', '1', '1', 2018, 'Indus University', 'ok', 'India', 'Ahmedabad', '2021-12-05 09:16:57', 'user'),
(69, 'Akash', 'Bhavsar', 'ak102@gmail.com', '8780156690', '$2y$10$KM8xk0vu4XyFdsjF1Yfmbuh6m8Kdb/IYFpDlr9zusXlpXr6IjFMVy', '1', '1', '1', 2018, 'Indus University', 'ok', 'India', 'Ahmedabad', '2021-12-05 09:19:04', 'user'),
(70, 'Akash', 'Bhavsar', 'ak103@gmail.com', '8780156691', '$2y$10$aAmPwt0f8KJyzF4o7VCIuOELjJvXQaT640bU.tZioDSjc45GfHm.O', '2', '8', '14', 2018, 'Indus University', 'ok', 'India', 'Ahmedabad', '2021-12-05 09:20:18', 'user'),
(71, 'Akash', 'Bhavsar', 'ak104@gmail.com', '8780156692', '$2y$10$qMNzw0vNdBmVUdttljWTA.4RVgkBZig1WDl7.7FEyxRwoz3cKmmuW', '3', '9', '19', 2018, 'Indus University', 'ok', 'India', 'Ahmedabad', '2021-12-05 09:21:37', 'user'),
(72, 'Akash', 'Bhavsar', 'ak105@gmail.com', '8780155505', '$2y$10$mUipAIJH.mVo6ddcx51UFOKR7fBD4q2ertY2pxe/EIj0OfMGsHIKG', '1', '1', '1', 2018, 'Indus University', 'ok', 'India', 'Ahmedabad', '2021-12-05 09:26:15', 'user'),
(73, 'Akash', 'Bhavsar', 'bhavsar1510@gmail.com', '7777777777', '$2y$10$0ydZZxNEueFE7AWvHF2PO.PlrB0KrYii9OguCxzvXUsygH2.NRap2', '1', '1', '1', 2018, 'Indus University', '78', 'India', 'Ahmedabad', '2021-12-06 19:23:18', 'user'),
(74, 'Khush', 'Shah', 'kshah172@gmail.com', '8128937197', '$2y$10$ZX8oQUJMyAbIz.qNcjY.EerqF0tjnH.tlG0YKTqTy73HDY6L9bwN6', '4', '11', '32', 2021, 'abc', 'xyz', 'India', 'Ahmedabad', '2021-12-07 14:53:10', 'user'),
(75, 'Khush', 'Shah', 'kshah@gmail.com', '9696969696', '$2y$10$pE2YECnAa.pjdHzTOGfq2eshRueeqfus/YOSglYJ04UAM0hMUqVVm', '4', '11', '32', 2019, 'abc', 'xyz', 'India', 'Ahmedabad', '2021-12-07 15:10:23', 'user'),
(76, 'Akash', 'Bhavsar', 'ak404@gmail.com', '8989898989', '$2y$10$aqcbdRj0FxYUqLdcZjggeeH1UfK2bzKIpfPkg8T49d4mhPMOnZD/i', '1', '1', '1', 2018, 'Indus University', 'lll', 'India', 'Ahmedabad', '2021-12-07 15:16:00', 'user'),
(77, 'Akash', 'Bhavsar', 'ar1510@gmail.com', '8780144442', '$2y$10$0tMNHRE4C21icHZ7UBlIpOxCm55Hl4m13iEsDFoSc87kLwBOHgGTC', '1', '1', '1', 2019, 'Indus University', '11', 'India', 'Ahmedabad', '2021-12-07 15:25:56', 'user'),
(78, 'Akash', 'Bhavsar', 'ar15100@gmail.com', '8780144447', '$2y$10$N2TwQwxRlGX4g1fQZM0kV.l3YmEEvvXLCZ5Qt.heoAr78zb0QGjtC', '3', '9', '19', 2019, 'Indus University', '11', 'India', 'Ahmedabad', '2021-12-07 15:31:05', 'user'),
(79, 'Akash', 'Bhavsar', 'amr15100@gmail.com', '8780144446', '$2y$10$PrjSXrdAtKPdPDMi/TRD7ukpSbs1S9COCGByNy2MXNE3KZET/ulNa', '5', '12', '36', 2020, 'Indus University', '11', 'India', 'Ahmedabad', '2021-12-07 15:42:33', 'user'),
(80, 'Akash', 'Bhavsar', 'pk55@gmail.com', '8989898984', '$2y$10$t5T3ZoYSvC.s1.KzeFPrie88NiZi6rIo91UKfeNVAGaWyTUv22Rpe', '2', '8', '14', 2018, 'Indus University', 'op', 'India', 'Ahmedabad', '2021-12-07 15:51:59', 'user'),
(81, 'Khush', 'Shah', 'o@gmail.com', '6789678999', '$2y$10$ddDxZuWgzeCQVv0rGa1amuQV7z0U72k0DBQklxm3684wmZtzfdAIG', '4', '11', '32', 2019, 'y', 'm', 'India', 'Ahmedabad', '2021-12-07 15:56:11', 'user'),
(82, 'Akash', 'Bhavsar', 'ak808@gmail.com', '8787858500', '$2y$10$0dDU8p6bT0BbK4l5vy/YMuZAuKyz.5IxUDxnoYyS2Y3cD0cIxShmC', '1', '2', '2', 2018, 'Indus University', 'ol', 'India', 'Ahmedabad', '2021-12-07 19:32:47', 'user'),
(83, 'Akash', 'Bhavsar', 'ak809@gmail.com', '8098098090', '$2y$10$a.rrvHJY8GE0.I14lgUvFuLeOWAIAPoYtCz6jO.syIKaqXNwhqprO', '1', '1', '1', 2018, 'Indus University', 'ol', 'India', 'Ahmedabad', '2021-12-07 19:35:30', 'user'),
(84, 'Akash', 'Bhavsar', 'ak1020@gmail.com', '9021021020', '$2y$10$xP0egzWORO2r9vLr9RALx.EK.j88dvZpNwQD5coY/Iuok/S5Vu1IO', '2', '8', '14', 2019, 'Indus University', 'op', 'India', 'Ahmedabad', '2021-12-07 19:45:56', 'user'),
(85, 'Akash', 'Bhavsar', 'ak10200@gmail.com', '9021021022', '$2y$10$rocsjeF3vAA2ygkKeKEMTOkBhQXZ3xbMIe./pTYqSDWUIw8PBUR6u', '3', '9', '19', 2019, 'Indus University', 'op', 'India', 'Ahmedabad', '2021-12-07 19:47:00', 'user'),
(86, 'Akash', 'Bhavsar', 'ak102002@gmail.com', '9021021028', '$2y$10$gUKimDCx1FT5b4gN2QWytegof1ucwCyFLFZUsLKz6nldi2z9bJS3C', '4', '11', '32', 2020, 'Indus University', 'op', 'India', 'Ahmedabad', '2021-12-07 19:47:32', 'user'),
(87, 'Akash', 'Bhavsar', 'ak1020020@gmail.com', '9021021027', '$2y$10$zHYFunvYWhaIxrHnRnJf6uIqfbgM0Fa/hALfByHbwqPKATf2HPfIm', '5', '12', '36', 2020, 'Indus University', 'op', 'India', 'Ahmedabad', '2021-12-07 19:52:50', 'user'),
(88, 'Akash', 'Bhavsar', 'akaslr1510@gmail.com', '9632122222', '$2y$10$EdylG1Z6eD74oYDGI7g/Q.qdrCVpra.BntepKZ2yZ7gC8IbGx2.6C', '1', '1', '1', 2018, 'Indus University', 'ppp', 'India', 'Ahmedabad', '2021-12-07 20:28:17', 'user'),
(89, 'Akash', 'Bhavsar', 'akpavsar1510@gmail.com', '8000111202', '$2y$10$Jyr/LQQ/jg6Gb3Jh1Qm8nOp4BD2LnyYtie0vtOaaJ7Ii.lUfpklWS', '1', '1', '1', 2018, 'Indus University', '444', 'India', 'Ahmedabad', '2021-12-08 19:15:44', 'user'),
(90, 'finally', 'done', 'fd@gmail.com', '9636541027', '$2y$10$NnplDY62LJuNhynDfp2Epe52VLzquEUqw3FY4jYlWTkOmxTPHRPSO', '1', '1', '1', 2018, 'o', 'o', 'o', 'o', '2021-12-08 19:26:21', 'user'),
(91, 'Akash', 'Bhavsar', 'op1510@gmail.com', '9632010147', '$2y$10$VAtxEwQIa8JYyFEY00Gnnua9OtBQlHJR13QNk6h9rvEkpNCvM3R9e', '1', '1', '1', 2018, 'Indus University', '1', 'India', 'Ahmedabad', '2021-12-10 09:04:02', 'user'),
(92, 'IU', 'ADMIN', 'iuadmin@iu', '9966331100', '$2y$10$Y8w4LTX4coRL7jJDRZrHu.yQtiiM34wKoXXT2vv87NnUALK/DDdoq', '4', '11', '32', 2018, 'iu', 'iu', 'iu', 'iu', '2021-12-10 09:46:54', 'admin'),
(93, 'ok', 'ok', 'o5k@gmail.com', '8521230012', '$2y$10$WSrh3Un0FYBtr2rul.EEuu0JBVADSpy9Usr9MNZL9t/o.a07qKl7C', '2', '8', '14', 2018, 'Indus University', 'oo', '44', 'Ahmedabad', '2021-12-10 09:49:39', 'user'),
(94, 'mann', 'kyada', 'mk000@gmail.com', '8780174480', '$2y$10$ONJeSwyLcMmBsxNBIKqxSO3LZJwPbrqoUSG6llXtaD1wL/CkI.Ylm', '1', '1', '1', 2018, 'indus uni', '44', 'India', 'ahd', '2021-12-11 19:30:31', 'user'),
(95, 'Akash', 'Bhavsar', 'akashbavsar1510@gmail.com', '9654120122', '$2y$10$wzhxc7O00GMEBDrM.hfJF.a9kS3PaztmgFRzTCROSs4Ljv9JvAilO', '', '', '', 0, 'Indus University', '4', 'India', 'Ahmedabad', '2022-01-02 20:43:02', 'user'),
(96, 'Akash', 'Bhavsar', 'akashbavsar17710@gmail.com', '9654120129', '$2y$10$O15bqXIJQnMDYwoj73aGcuyL1g47vmg0HzmCojDZoVRoAYVdGbK2y', '', '', '', 0, 'Indus University', '4', 'India', 'Ahmedabad', '2022-01-02 20:44:06', 'user'),
(97, 'Akash', 'Bhavsar', 'akashbavsar1771110@gmail.com', '9654120127', '$2y$10$lIEd1rOKbJWRUSFZjqQvRObTcwmdUOe5x/j064vwMyn1qMNt3a2Ou', '', '', '', 0, 'Indus University', '4', 'India', 'Ahmedabad', '2022-01-02 20:46:04', 'user'),
(98, 'Akash', 'Bhavsar', 'akashbhaavsar1510@gmail.com', '8521459871', '$2y$10$YrpoxsVWZsJNkTmCvpR1Ge34nnYP.Ev.5wUbeU5s2pHOWbJ4Qw8o2', '', '', '', 0, 'Indus University', '1', 'India', 'Ahmedabad', '2022-01-02 20:51:10', 'user'),
(99, 'Akash', 'Bhavsar', 'nextexp7a@gmail.com', '7451000000', '$2y$10$KfnoiUztQ3D5eFaoIvm2K.IOfxASe599eTbody9lZ.IPohlgO0MGW', '', '', '', 0, 'Indus University', '4', 'India', 'Ahmedabad', '2022-01-02 20:53:53', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `srno` int(11) NOT NULL,
  `profileimg` varchar(255) NOT NULL,
  `first name` varchar(15) NOT NULL,
  `last name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `enrolment` varchar(12) NOT NULL,
  `institute` varchar(2) NOT NULL,
  `branch` varchar(2) NOT NULL,
  `obtained degree` varchar(2) NOT NULL,
  `passout` varchar(4) NOT NULL,
  `company` varchar(25) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `created at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srno`, `profileimg`, `first name`, `last name`, `email`, `gender`, `password`, `phoneno`, `role`, `enrolment`, `institute`, `branch`, `obtained degree`, `passout`, `company`, `designation`, `country`, `city`, `created at`) VALUES
(1, '', 'Akash', 'Bhavsar', '1510@gmail.com', 'male', '$2y$10$Ylq/xS/M8pOQ7WqVBuhJp.H3nJlkPpibK2yl.GAGJvgmTTeSnGNtK', '2147483647', '1', '', '', '', '', '', '', '', '', '', '2022-02-04 18:47:02'),
(2, '', 'Akash', 'Bhavsar', '1517@gmail.com', 'male', '$2y$10$V3y3RtJWeEPIkr.vsFUViO2sfM1ziFlNRaHzjYolQccuBa1STfC5S', '2147483647', '1', '', '', '', '', '', '', '', '', '', '2022-02-04 18:51:03'),
(3, '', 'Akash', 'Bhavsar', 'akashbhavsar151', 'male', '$2y$10$Al4KaybZ62CzstcLBw3uHuyOcLWCdvTMPjO452yQG8whSvERzFUoi', '2147483647', '3', '', '', '', '', '', '', '', '', '', '2022-02-04 18:51:53'),
(4, '', 'Akash', 'Bhavsar', 'akashbhavsar@gm', 'male', '$2y$10$dvXoIL3.htB5AFMqwRuaLeBijwWnE/eqhgvqmArCKSKehKaNQzgmW', '2147483647', '2', '', '', '', '3', '2022', '', '', '', '', '2022-02-04 18:52:56'),
(5, '', 'IU', 'ADMIN', 'iuadmin@iu', 'other', '$2y$10$apoJnbKivCh7y/CKMpg/yusHUFee8YSrsIPm89ZOsS90yv21fXXAK', '0', 'admin', '', '', '', '', '', '', '', '', '', '2022-02-04 18:57:34'),
(6, '', 'Akash', 'Bhavsar', '15100@gmail.com', 'male', '$2y$10$Q5yX/Ylsfpe2TdCvPhYK8OWDyytgZWybquhKzloPkViZOe5lbjEQe', '2147483647', '1', '', '', '', '', '', '', '', '', '', '2022-02-04 19:06:39'),
(7, '', 'o', 'k', 'temp@w', 'male', '$2y$10$qEJCrXxa2Qh.aviTCvc5Aemmzx3NDX07Yx1J58w0DyIxO8h2dG38W', '8521204447', '1', '', '', '', '', '', '', '', '', '', '2022-02-04 19:14:18'),
(8, '', 'Akash', 'Bhavsar', 'akashbhavsar151', 'male', '$2y$10$LhDWMgMQWNx2I/8NgroQh.ls9gARuVTXgqCsLQ9ydQBiePi1m/csa', '8521224451', '2', '', '', '', '', '', '', '', '', '', '2022-02-05 14:17:53'),
(9, '', 'Akash', 'Bhavsar', 'akashbhavsar151', 'male', '$2y$10$8X/Kp2GkOVITRZztKBZya.eT2kjlEDgrf3hOtLSsMDAYp3aJQ9tLi', '8455110020', '1', '', '', '', '', '', '', '', '', '', '2022-02-05 14:19:45'),
(10, '', 'Akash', 'Bhavsar', 'akashbhavsar151', 'male', '$2y$10$VfwWaNCrQyKYRMAcWdTGsOjwJrHAbCXoY5gKfLh6VHr7TsocpWERO', '8544112201', '1', '', '', '', '', '', '', '', '', '', '2022-02-05 14:21:35'),
(11, '', 'Akash', 'Bhavsar', 'akashbhavsar1510@gmail.com', 'male', '$2y$10$qNhmy9QnVIr9htHsDKUViurpxOAPjVxijCPYwDHz4Lf9kyLyRM6TS', '8521223301', 'admin', '', '', '', '', '', '', '', '', '', '2022-02-05 14:24:02'),
(12, '', 'AARJAV', 'PATEL', 'aarjavpatel.19.imca@iict.indusuni.ac.in', 'male', '$2y$10$zRVtVEM.qxfbh79BzTDCyumYMde6o0Dh3asjay.H6wq3EQpR9ncGm', '8521410211', '2', '', '', '', '', '', '', '', '', '', '2022-02-25 14:22:43'),
(13, '', 'Akash', 'Bhavsar', '1510@gm', 'male', '$2y$10$Hi97e9.hk8QxmSqvYlUVW.821l8tKO6WqsuDEq.t3foUILj6f6kF2', '8521447752', '1', '', '', '', '', '', '', '', '', '', '2022-03-14 11:34:08'),
(14, '', 'akash', 'bhavsar', 'ak2@gmail.com', 'male', '$2y$10$GBR2k3A42kEAUn.80znvDeOAJg6VXcEC/uKibGzV2Bnbg5.B3Snk6', '9632110021', '1', '', '', '', '', '', '', '', '', '', '2022-03-24 18:09:12'),
(15, '', 'khush', 'shah', 'khushiscr@gmail.com', 'male', '$2y$10$tvLc9oeeu9ejQfUt4Fy71./srZBFF8yMfORwwKFP71CQS7p4ZAZjG', '7454111124', '1', '', '', '', '', '', '', '', '', '', '2022-04-05 18:15:05'),
(16, '', 'Jiyan', 'q', 'q@q.com', 'male', '$2y$10$Vhmh3Pn35Mso6kodFuQ/JOaN6M8nix.8zWpxv5K6T9OOOGwz8WURW', '8521004563', '1', '', '', '', '', '', '', '', '', '', '2022-04-29 10:07:34'),
(17, '', 'khush', 'shah', 'a@op.com', 'male', '$2y$10$LQcpU0VIMlyZG2UCauu8ruP4IB2SyWFHNd3Qrh6Gheq4HSXHSaj2y', '9855220047', '1', '', '', '', '', '', '', '', '', '', '2022-05-21 12:00:32'),
(18, '', 'akash', 'bhavsar', '', 'female', '$2y$10$2lNpiwTJVCaPb37cN9QtM.w2Vpx2qhV4FDcP750FnuVK4I/yjhGjq', '8522140042', '1', '', '', '', '', '', '', '', '', '', '2022-05-21 12:11:37'),
(19, '', 'akash', 'bhavsar', 'q2@wq.com', 'female', '$2y$10$dNQyCh.FDAjwY9ct0sYmfOg3F.HLPnApLf0tzeaOMxEc31JUVEANS', '8502140042', '1', '', '', '', '', '', '', '', '', '', '2022-05-21 12:14:26'),
(20, '', '', '', 'last@email.com', 'male', '$2y$10$3xibGovcfJ6gABpgWRD7Nu8efRQshPAe5Ff34HU1yfUFF9EFySbs2', '7777744444', '1', 'IU1983', '1', '1', '1', '2018', 'EY india', 'COE', 'India2', 'abad2', '2022-05-21 13:37:11'),
(21, '', 'new', 'name', 'all@email.com', 'male', '$2y$10$AwbTL0ZlLNSJmNR8N0IBR.4rzyHK/J8cqmxduEKaho7W6mmuICz9C', '8844110041', '2', 'IU1983', '3', '9', '26', '2020', 'softlab', 'op', 'op', 'op', '2022-05-21 13:49:29'),
(22, '', 'Akash', 'Bhavsar', 'ak15@gmail.com', 'male', '$2y$10$ve8O2ty/FQWHWL6dLmuzl.5mVoQCyM/mlT1Ptgk58VcDxTMjZmgi.', '8744112560', '1', 'IU74', '1', '1', '1', '2018', 'Indus University', 'op', 'India', 'Ahmedabad', '2022-05-23 20:08:20'),
(23, '', 'Akash', 'Bhavsar', 'ak3@gmail.com', 'male', '$2y$10$8Oqwi2OshN3uqutexwRFQO2Q3paoukoXM56mSoXlfo5I/kjBW0ZdO', '8521440027', '1', 'IU90', '2', '8', '14', '2018', 'Indus University', 'op', 'India', 'Ahmedabad', '2022-05-23 20:17:55'),
(24, '', 'Akash', 'Bhavsar', 'ak4@gmail.com', 'male', '$2y$10$4hvNu185ykkMjUOHTPTCcuS8yixKgBC5wGIKtLJbSf4kZ.b5uIywS', '7744551021', '1', 'IU777', '1', '1', '1', '2018', 'Indus University', 'o', 'India', 'Ahmedabad', '2022-05-23 21:28:28'),
(25, '', 'Akash', 'Bhavsar', 'ak5@gmail.com', 'male', '$2y$10$juhXoXQiY6bO4oPm/j6UM.TCemWfZHTY7rpCU0wQnZY1Pr7nIdXNS', '7744551088', '1', 'IU777', '2', '8', '14', '2018', 'Indus University', 'o', 'India', 'Ahmedabad', '2022-05-23 21:51:58'),
(26, '$php', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-24 08:39:25'),
(27, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-24 08:42:04'),
(28, '', 'Akash', 'Bhavsar', 'aka1@gmail.com', 'male', '$2y$10$qEtIuCciiCBiggSDalKpdexHTtIPUXS3pXa2Zo3ym02RwvQ/OTrOe', '9874554410', '1', 'IU41', '1', '1', '1', '2018', 'Indus University', 'op', 'India', 'Ahmedabad', '2022-05-24 08:42:05'),
(29, 'destinationfile', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-24 08:44:46'),
(30, '', 'Akash', 'Bhavsar', 'aka2@gmail.com', 'male', '$2y$10$kvi5oykJoS118X.93Pz0MeQ3J50uAYPzOtfGws9qlQu/oueWrjOUm', '9874554420', '1', 'IU41', '2', '8', '14', '2018', 'Indus University', 'op', 'India', 'Ahmedabad', '2022-05-24 08:44:46'),
(31, '', 'Akash', 'Bhavsar', 'aka8@gmail.com', 'male', '$2y$10$8aHQhttU2E.d/eDbBlksPuHaRDUcRONd/um.FDamURI6bjAc24Uku', '8744128770', '1', 'iu', '1', '1', '1', '2018', 'Indus University', 'op', 'India', 'Ahmedabad', '2022-05-24 08:51:53'),
(32, '../imgfolder/profileimgs/Happy Mother\'s Day.png', 'Akash', 'Bhavsar', 'aka9@gmail.com', 'male', '$2y$10$AzDAs0DDZZTHndVt9Ue4EeFYhlLN3Us5JKqWgSnjgZJELPD2dB0Ga', '8744128700', '1', 'iu', '2', '8', '14', '2018', 'Indus University', 'op', 'India', 'Ahmedabad', '2022-05-24 08:59:10'),
(33, '', 'khush', 'name', 'aa@aaa', 'male', '$2y$10$LFkGUzMUUQVCyDcc4p/X2.2hyinRxzoJtswsW2ChE8jDCI5/vlIl.', '9854247812', '1', 'IU', '2', '8', '14', '2018', 'o', 'op', 'op', 'op', '2022-05-24 09:36:43'),
(34, '../imgfolder/profileimgs/Screenshot_20220413-123115.jpg', 'Akash', 'Bhavsar', 'a71@gmail.com', 'male', '$2y$10$oHnETGCQ2Khd8Cw6L82MA.jwyj8vlJ6MQg/9zBzwDRJKjMdgwlFeq', '9856471149', '1', 'iu', '1', '1', '1', '2018', 'Indus University', 'p', 'India', 'Ahmedabad', '2022-05-24 09:40:27'),
(35, 'noimage', 'Akash', 'Bhavsar', 'a74@gmail.com', 'male', '$2y$10$NCvYVubG3Fi6UzWNgXBCf.8U5yoPoaNV5.xx/2/ZwCzxyAxSIpz8m', '9874789510', '1', 'iu', '1', '2', '2', '2018', 'Indus University', 'o', 'India', 'Ahmedabad', '2022-05-24 09:55:24'),
(36, '', 'khush', 'shah', 'op777@gmail.com', 'male', '$2y$10$h1xm7Uqh8CXIN2afYF59mOhfRyJnE4ceTn23ZwOYj/tPc6sCvX2jy', '7845884129', '1', 'iu', '3', '9', '19', '2018', '1', '1', '1', '1', '2022-05-24 10:22:35'),
(37, '', 'jiyan', 'p', 'p@p', 'male', '$2y$10$DsPMhXwmzfWfUNVP6N579.0f5meYI1K61HcBIlGJp/U2v0BZ/unzC', '9874587103', '1', 'iu', '1', '1', '1', '2018', '7', '7', '7', '7', '2022-05-24 11:33:39'),
(38, '../imgfolder/profileimgs/Screenshot_20220413-123104.jpg', 'm', 'k', 'm@k', 'male', '$2y$10$RYUWd6EuBPtzqKBp.igQU.C4VVd55psMSrnwijKCQrPRdZNKCIbOu', '9877447892', '1', 'iu', '2', '8', '14', '2018', '1', '1', '1', '1', '2022-05-24 13:16:49'),
(39, '../imgfolder/profileimgs/screencapture-localhost-Alumni-user-logedin-event-detail-php-2022-04-20-04_33_10.png', 'a', 'a', 'a@b', 'male', '$2y$10$F/CNJ65/8cF1uIXHRADs1evsOCCqk091AXGhzlhKAedIoeirCRzca', '8456778999', '1', 'iu', '1', '1', '1', '2018', '1', '', '1', '1', '2022-05-24 13:18:10'),
(40, '../imgfolder/profileimgs/screencapture-localhost-Alumni-index-php-2022-04-20-04_03_04.png', 'new', '9', 'q@q2', 'female', '$2y$10$sZXk8KQZZCsenymJs3TuD.Ay/QHH3Ito1tbtAIIkcuaoOYWy3hE7y', '8542693363', '1', '7', '1', '2', '2', '2018', '1', '', '1', '1', '2022-05-24 22:59:30'),
(41, '../imgfolder/profileimgs/screencapture-localhost-Alumni-user-logedin-event-detail-php-2022-04-20-04_33_10.png', 'Akash', 'Bhavsar', 'a0@gmail.com', 'male', '$2y$10$LD0j4DDGXRLqVI7ogz4bw.OZzepybCqOvCHOoyO6waJY4ThJXiTEa', '8569996693', '1', 'iu', '1', '1', '1', '2018', 'Indus University', '4', 'India', 'Ahmedabad', '2022-05-25 00:20:35'),
(42, '../uploads/profileimgs/Screenshot_20220413-123356.jpg', 'jiyan', 'op', 'op@op', 'male', '$2y$10$b67qbI3gmhrugdgf7ReLCeV3GBdSNL8tLa2.zHmh9CYBW75TvR/.G', '9636989964', '1', 'iu', '1', '1', '1', '2018', '1', '1', '1', '1', '2022-05-25 18:00:33'),
(43, 'noimage', 'ak', 'k', 'k@k', 'male', '$2y$10$9WJPbCYpygytokYP7.AXgewsME15MLsfkuX9ID7XokwfAFGKkwaR2', '9685447124', '1', 'iu', '6', '15', '49', '2021', '1', '1', '1', '1', '2022-05-26 09:26:57'),
(44, '../uploads/profileimgs/image.png', 'khush', 'op', 'op@k', 'male', '$2y$10$JTXoErR2W.xY8VeNlyut6erseGLgEcsfottm6bs9RqH9l4m3W7XhS', '9696998809', '1', 'iu', '1', '1', '1', '2018', '1', '1', '1', '1', '2022-05-27 15:03:12'),
(45, 'noimage', 'aaa', 'az', 'akashbhavsar.19.imsc@iict.indusuni.ac.in', 'male', '$2y$10$NMd9eSffVfumQbcHOteCquUGmYFZQHTz1fN/pyjhsqfEb3yPjWNQC', '8989885563', '1', 'iu', '1', '1', '1', '2018', '', '', '', '', '2022-05-31 17:03:58'),
(46, 'noimage', 'khush', 'shah', 'akashbha@gmail.com', 'male', '$2y$10$NM27i3cFLPf6rv72gp6LjOyqeS2mnkXqJHkCQvuWl0ioVS4/ZQOJO', '9638527410', '1', 'iu', '2', '8', '14', '2018', '', '', '', '', '2022-06-02 08:26:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `certificationcourses`
--
ALTER TABLE `certificationcourses`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `eventsregistrations`
--
ALTER TABLE `eventsregistrations`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `institute_tbl`
--
ALTER TABLE `institute_tbl`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `jobopportunities`
--
ALTER TABLE `jobopportunities`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `newsletter_two`
--
ALTER TABLE `newsletter_two`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `noticeandupdates`
--
ALTER TABLE `noticeandupdates`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `registerwaleuser`
--
ALTER TABLE `registerwaleuser`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `certificationcourses`
--
ALTER TABLE `certificationcourses`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `eventsregistrations`
--
ALTER TABLE `eventsregistrations`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `institute_tbl`
--
ALTER TABLE `institute_tbl`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobopportunities`
--
ALTER TABLE `jobopportunities`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `newsletter_two`
--
ALTER TABLE `newsletter_two`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `noticeandupdates`
--
ALTER TABLE `noticeandupdates`
  MODIFY `srno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registerwaleuser`
--
ALTER TABLE `registerwaleuser`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
