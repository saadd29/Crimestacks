-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 06:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `nfc` ()  BEGIN	
	SELECT * FROM `criminal`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nfcc` ()  BEGIN	
	SELECT * FROM `fir`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nfp` ()  BEGIN
	SELECT * FROM `policeofficer`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nfs` ()  BEGIN	
	SELECT * FROM `station`;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_EMAIL` varchar(20) NOT NULL,
  `A_PSWD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_EMAIL`, `A_PSWD`) VALUES
('admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `CID` int(10) NOT NULL,
  `CRIME_IDS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`CID`, `CRIME_IDS`) VALUES
(32, '120'),
(32, '144'),
(33, '426'),
(33, '447'),
(34, '120'),
(34, '384'),
(34, '392');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `CRIME_ID` varchar(255) NOT NULL,
  `CRIME_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`CRIME_ID`, `CRIME_NAME`) VALUES
('120', 'PUNISHMENT FOR CRIMINAL CONSPIRACY'),
('144', 'JOINING UNLAWFUL ASSEMBLY WITH ARMED DEADLY WEAPON'),
('302', 'PUNISHMENT FOR MURDER'),
('363', 'PUNISHMENT FOR KIDNAPPING'),
('378', 'PUNISHMENT FOR THEFT'),
('384', 'PUNISHMENT FOR EXTORTION'),
('392', 'PUNISHMENT FOR ROBBERY'),
('395', 'PUNISHMENT FOR DACOITY'),
('406', 'PUNISHMENT FOR CRIMINAL BREACH OF TRUST'),
('417', 'PUNISHMENT FOR CHEATING'),
('426', 'PUNISHMENT FOR MISCHIEF'),
('447', 'PUNISHMENT FOR CRIMINAL TRESPASS'),
('467', 'PUNISHMENT FOR RIOTING');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `C_ID` int(11) NOT NULL,
  `C_AGE` int(3) NOT NULL,
  `C_GENDER` varchar(7) NOT NULL,
  `C_ADDRESS` varchar(20) NOT NULL,
  `OFF_ID` int(10) DEFAULT NULL,
  `FIR_NO` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`C_ID`, `C_AGE`, `C_GENDER`, `C_ADDRESS`, `OFF_ID`, `FIR_NO`) VALUES
(32, 35, 'Male', '73, Isha Heights, Mo', 1, 738),
(33, 31, 'Female', '84, Radheshyam Villa', 2, 739),
(34, 41, 'Male', '16, Mansarovar, Alwa', 3, 740);

--
-- Triggers `criminal`
--
DELIMITER $$
CREATE TRIGGER `logs` AFTER DELETE ON `criminal` FOR EACH ROW INSERT INTO `criminallog`(`CRIMINAL_ID`, `AGE`, `GENDER`, `ADDRESS`, `OFFID`, `FIRNO`) VALUES (old.C_ID,old.C_AGE,old.C_GENDER,old.C_ADDRESS,old.OFF_ID,old.FIR_NO)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `criminallog`
--

CREATE TABLE `criminallog` (
  `NO.` int(5) NOT NULL,
  `CRIMINAL_ID` int(10) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp(),
  `AGE` int(3) DEFAULT NULL,
  `GENDER` varchar(7) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `OFFID` int(3) DEFAULT NULL,
  `FIRNO` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `FIR_NO` int(6) NOT NULL,
  `C_NAME` varchar(20) NOT NULL,
  `PHOTO` varchar(1000) DEFAULT NULL,
  `CRIME_TIME` datetime(6) DEFAULT NULL,
  `CRIME_SCENE` varchar(100) DEFAULT NULL,
  `CRIME_DESC` varchar(500) DEFAULT NULL,
  `FIR_DATE` date NOT NULL DEFAULT current_timestamp(),
  `OFFICER_ID` int(5) DEFAULT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`FIR_NO`, `C_NAME`, `PHOTO`, `CRIME_TIME`, `CRIME_SCENE`, `CRIME_DESC`, `FIR_DATE`, `OFFICER_ID`, `STATUS`) VALUES
(738, 'John', 'conv114.jpg', '2021-01-14 10:15:00.000000', '2nd Floor, 335, Shalimar House, Maulana Shaukatali Road, Above Shalimar Cinema, Grant Road\r\nMumbai, ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc congue nisi vitae suscipit tellus mauris a. At quis risus sed vulputate odio ut enim. Bibendum ut tristique et egestas quis. Nulla posuere sollicitudin aliquam ultrices sagittis orci a. Ut tellus elementum sagittis vitae et. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. In dictum non consectetur a. Viverra tellus in hac habitasse platea dict', '2021-01-16', 1, 'APPROVED'),
(739, 'Vaishali Sahni', 'conv1.jpg', '2021-01-12 11:21:00.000000', '35, Anjana Chowk, Kanpur - 254348', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Ultrices eros in cursus turpis. Est velit egestas dui id. Vitae suscipit tellus mauris a diam. Curabitur vitae nunc sed velit dignissim sodales ut eu. Vitae nunc sed velit dignissim sodales ut eu. Erat nam at lectus urna duis convallis. Proin nibh nisl condimentum id venenatis.', '2021-01-16', 2, 'APPROVED'),
(740, 'Amrit Singh', 'conv1122.jpg', '2021-01-14 10:23:00.000000', ' 40, Churchgate, Mumbai - 557525', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-01-16', 2, 'APPROVED'),
(741, 'Javed Pratap Shankar', 'conv.jpg', '2021-01-12 10:28:00.000000', '50, Hema Apartments, NitinPur Hisar - 498862', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-01-16', 4, 'APPROVED'),
(742, 'Roma Toor', 'conv.jpg', '2021-01-13 10:30:00.000000', '73, Vijay Heights, Goregaon Jamnagar - 315057', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-01-16', 5, 'APPROVED'),
(743, 'Gulzar Mahabir', 'conv.jpg', '2021-01-03 10:32:00.000000', '93, Sushmita Apartments, Kormangala Chandigarh - 123773', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2021-01-16', 6, 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `policeofficer`
--

CREATE TABLE `policeofficer` (
  `OFF_ID` int(10) NOT NULL,
  `OFF_NAME` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `PH_NO` varchar(10) DEFAULT NULL,
  `P_ADD` varchar(20) NOT NULL,
  `PSWD` varchar(10) DEFAULT NULL,
  `STN_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policeofficer`
--

INSERT INTO `policeofficer` (`OFF_ID`, `OFF_NAME`, `EMAIL`, `PH_NO`, `P_ADD`, `PSWD`, `STN_ID`) VALUES
(1, 'SINGHAM', 'sing@gmail.com', '3698521495', 'JAYANAGAR', 'singham123', 503),
(2, 'RATHORE', 'rathore@gmail.com', '3698521258', 'BTM LAYOUT', 'rathore123', 502),
(3, 'JAMES CHARLES', 'james@gmail.com', '3645521495', 'QUEENS ROAD', 'james123', 501),
(4, 'ROOPA', 'roopa@gmail.com', '8598521495', 'BANASWADI', 'roopa123', 509),
(5, 'PANDEY', 'pandey@gmail.com', '3123421495', 'KORAMANGALA', 'pandey123', 502),
(6, 'SHARIFF', 'shariff@gmail.com', '3698521123', 'FRAZER TOWN', 'shariff123', 503),
(7, 'KAMAL PANT', 'kamal@gmail.com', '7537537523', 'RK HEGDE NAGAR', 'kamal123', 505),
(8, 'BHASKAR RAO', 'rao@gmail.com', '7563514560', 'R T NAGAR', 'rao123', 504),
(9, 'RAGHAV', 'raghav@gmail.com', '2136546322', 'BENSON TOWN', 'raghav123', 502),
(10, 'SONALI', 'sonali@gmail.com', '1235406789', 'KAMANAHALLI', 'sonali123', 504);

--
-- Triggers `policeofficer`
--
DELIMITER $$
CREATE TRIGGER `ap` AFTER INSERT ON `policeofficer` FOR EACH ROW INSERT INTO `pos` VALUES (NEW.OFF_ID,new.STN_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `OFFID` int(20) NOT NULL,
  `STN_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`OFFID`, `STN_ID`) VALUES
(1, 503),
(2, 502),
(3, 501),
(4, 509),
(5, 502),
(6, 503),
(7, 505),
(8, 504),
(9, 502),
(10, 504);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `STN_ID` int(10) NOT NULL,
  `STN_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`STN_ID`, `STN_NAME`) VALUES
(501, 'BANASWADI  '),
(502, 'KORAMANGALA'),
(503, 'JAYANAGAR'),
(504, 'FRAZER TOWN'),
(505, 'BENSON TOWN'),
(506, 'VASANTH NAGAR '),
(509, 'RAMANAGAR    ');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE `witness` (
  `F_NO` int(20) NOT NULL,
  `I_NAME` varchar(25) NOT NULL,
  `I_ADDRESS` varchar(80) NOT NULL,
  `I_NUMBER` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `witness`
--

INSERT INTO `witness` (`F_NO`, `I_NAME`, `I_ADDRESS`, `I_NUMBER`) VALUES
(738, 'Ajay', '\r\n', 53932114),
(738, 'Rahul', '58, Shirdi Sai Baba Mandir Road\r\nBengaluru, Karnataka, 560008', 41123935),
(739, 'Giaan Raj Vohra', '82, JagrutiPur, Surat - 208990', 24854576),
(740, 'Charandeep', '20, Prabha Nagar, Kochi - 154272', 90495604),
(740, 'Sapna', '20, Vikhroli, Ratlam - 200058', 78871074),
(741, 'Chhaya Babu', '86, Deccan Gymkhana, Indore - 124052', 11672428),
(742, 'Abhishek Mathur', '83, Kanika Heights, PeterPur Rajkot - 373145', 5803834),
(742, 'Habib Singh', '9, Bandra, Bikaner - 275908', 3470),
(742, 'Shankar', '67, Shweta Apartments, Obaid Nagar Indore - 576806', 776404425),
(743, 'Anusha Vicky', '56, HrishikeshGunj, Hyderabad - 371713', 9385369);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_EMAIL`),
  ADD UNIQUE KEY `A_PSWD` (`A_PSWD`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`CID`,`CRIME_IDS`),
  ADD KEY `LM` (`CRIME_IDS`),
  ADD KEY `KL` (`CID`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`CRIME_ID`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `FIR_NO` (`FIR_NO`),
  ADD KEY `BC` (`OFF_ID`);

--
-- Indexes for table `criminallog`
--
ALTER TABLE `criminallog`
  ADD PRIMARY KEY (`NO.`),
  ADD KEY `XY` (`FIRNO`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`FIR_NO`),
  ADD KEY `GH` (`OFFICER_ID`);

--
-- Indexes for table `policeofficer`
--
ALTER TABLE `policeofficer`
  ADD PRIMARY KEY (`OFF_ID`),
  ADD UNIQUE KEY `PSWD` (`PSWD`),
  ADD UNIQUE KEY `PH_NO` (`PH_NO`),
  ADD KEY `DE` (`STN_ID`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`OFFID`,`STN_ID`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`STN_ID`);

--
-- Indexes for table `witness`
--
ALTER TABLE `witness`
  ADD PRIMARY KEY (`F_NO`,`I_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `criminallog`
--
ALTER TABLE `criminallog`
  MODIFY `NO.` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `FIR_NO` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=744;

--
-- AUTO_INCREMENT for table `policeofficer`
--
ALTER TABLE `policeofficer`
  MODIFY `OFF_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `KL` FOREIGN KEY (`CID`) REFERENCES `criminal` (`C_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LM` FOREIGN KEY (`CRIME_IDS`) REFERENCES `crime` (`CRIME_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criminal`
--
ALTER TABLE `criminal`
  ADD CONSTRAINT `BC` FOREIGN KEY (`OFF_ID`) REFERENCES `policeofficer` (`OFF_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `EF` FOREIGN KEY (`FIR_NO`) REFERENCES `fir` (`FIR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criminallog`
--
ALTER TABLE `criminallog`
  ADD CONSTRAINT `ABD` FOREIGN KEY (`FIRNO`) REFERENCES `fir` (`FIR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fir`
--
ALTER TABLE `fir`
  ADD CONSTRAINT `GH` FOREIGN KEY (`OFFICER_ID`) REFERENCES `policeofficer` (`OFF_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `policeofficer`
--
ALTER TABLE `policeofficer`
  ADD CONSTRAINT `DE` FOREIGN KEY (`STN_ID`) REFERENCES `station` (`STN_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `witness`
--
ALTER TABLE `witness`
  ADD CONSTRAINT `YZ` FOREIGN KEY (`F_NO`) REFERENCES `fir` (`FIR_NO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
