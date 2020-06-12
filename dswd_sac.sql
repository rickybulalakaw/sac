-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 07:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dswd_sac`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay` varchar(18) DEFAULT NULL,
  `sacbeneficiaries` int(11) DEFAULT NULL,
  `district` int(11) NOT NULL,
  `psgc` varchar(15) DEFAULT NULL,
  `punongbarangay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay`, `sacbeneficiaries`, `district`, `psgc`, `punongbarangay`) VALUES
(1, 'Alinggan', 224, 7, NULL, NULL),
(2, 'Amanperez', 147, 7, '015511002', ''),
(3, 'Amancosiling Norte', 126, 3, '015511003', ''),
(4, 'Amancosiling Sur', 410, 3, NULL, NULL),
(5, 'Ambayat I', 127, 1, '15511005', ''),
(6, 'Ambayat II', 165, 1, NULL, NULL),
(7, 'Apalen', 114, 4, '015511007', ''),
(8, 'Asin', 69, 7, NULL, NULL),
(9, 'Ataynan', 177, 8, NULL, NULL),
(10, 'Bacnono', 280, 8, NULL, NULL),
(11, 'Balaybuaya', 236, 6, NULL, NULL),
(12, 'Banaban', 265, 7, NULL, NULL),
(13, 'Bani', 381, 7, NULL, NULL),
(14, 'Batangcaoa', 130, 6, NULL, NULL),
(15, 'Beleng', 170, 6, NULL, NULL),
(16, 'Bical Norte', 454, 3, NULL, NULL),
(17, 'Bical Sur', 228, 3, NULL, NULL),
(18, 'Bongato East', 277, 2, NULL, NULL),
(19, 'Bongato West', 105, 2, NULL, NULL),
(20, 'Buayaen', 363, 3, NULL, NULL),
(21, 'Buenlag 1st', 162, 8, NULL, NULL),
(22, 'Buenlag 2nd', 227, 8, NULL, NULL),
(23, 'Cadre Site', 321, 9, NULL, NULL),
(24, 'Carungay', 150, 4, NULL, NULL),
(25, 'Caturay', 153, 5, NULL, NULL),
(26, 'Darawey (Tangal)', 130, 4, NULL, NULL),
(27, 'Duera', 145, 4, NULL, NULL),
(28, 'Dusoc', 197, 4, NULL, NULL),
(29, 'Hermoza', 387, 4, NULL, NULL),
(30, 'Idong', 97, 5, NULL, NULL),
(31, 'Inanlorenza', 120, 5, NULL, NULL),
(32, 'Inirangan', 190, 5, NULL, NULL),
(33, 'Iton', 38, 2, NULL, NULL),
(34, 'Langiran', 205, 6, NULL, NULL),
(35, 'Ligue', 197, 7, NULL, NULL),
(36, 'M. H. del Pilar', 340, 9, NULL, NULL),
(37, 'Macayocayo', 162, 6, NULL, NULL),
(38, 'Magsaysay', 280, 9, NULL, NULL),
(39, 'Maigpa', 140, 5, NULL, NULL),
(40, 'Malimpec', 155, 6, NULL, NULL),
(41, 'Malioer', 272, 4, NULL, NULL),
(42, 'Managos', 181, 1, NULL, NULL),
(43, 'Manambong Norte', 155, 2, NULL, NULL),
(44, 'Manambong Parte', 280, 2, NULL, NULL),
(45, 'Manambong Sur', 282, 2, NULL, NULL),
(46, 'Mangayao', 155, 8, NULL, NULL),
(47, 'Nalsian Norte', 230, 8, NULL, NULL),
(48, 'Nalsian Sur', 225, 8, NULL, NULL),
(49, 'Pangdel', 254, 4, NULL, NULL),
(50, 'Pantol', 178, 2, NULL, NULL),
(51, 'Paragos', 94, 2, NULL, NULL),
(52, 'Poblacion Sur', 154, 9, NULL, NULL),
(53, 'Pugo', 157, 1, NULL, NULL),
(54, 'Reynado', 162, 5, NULL, NULL),
(55, 'San Gabriel 1st', 175, 3, NULL, NULL),
(56, 'San Gabriel 2nd', 296, 2, NULL, NULL),
(57, 'San Vicente', 338, 1, NULL, NULL),
(58, 'Sangcagulis', 207, 3, NULL, NULL),
(59, 'Sanlibo', 361, 5, NULL, NULL),
(60, 'Sapang', 265, 7, NULL, NULL),
(61, 'Tamaro', 270, 7, NULL, NULL),
(62, 'Tambac', 446, 8, NULL, NULL),
(63, 'Tampog', 154, 1, NULL, NULL),
(64, 'Tanolong', 430, 5, NULL, NULL),
(65, 'Tatarac', 168, 4, NULL, NULL),
(66, 'Telbang', 341, 3, NULL, NULL),
(67, 'Tococ East', 108, 6, NULL, NULL),
(68, 'Tococ West', 202, 6, NULL, NULL),
(69, 'Warding', 180, 1, NULL, NULL),
(70, 'Wawa', 214, 1, NULL, NULL),
(71, 'Zone I (Pob.)', 87, 9, NULL, NULL),
(72, 'Zone II (Pob.)', 89, 9, NULL, NULL),
(73, 'Zone III (Pob.)', 69, 9, NULL, NULL),
(74, 'Zone IV (Pob.)', 105, 9, NULL, NULL),
(75, 'Zone V (Pob.)', 209, 9, NULL, NULL),
(76, 'Zone VI (Pob.)', 103, 9, NULL, NULL),
(77, 'Zone VII (Pob.)', 172, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barangaybatch1complete`
-- (See below for the actual view)
--
CREATE TABLE `barangaybatch1complete` (
`barangaybatch1complete` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barangaybatch2complete`
-- (See below for the actual view)
--
CREATE TABLE `barangaybatch2complete` (
`barangaybatch2complete` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barangaynonsacsummary`
-- (See below for the actual view)
--
CREATE TABLE `barangaynonsacsummary` (
`barangayid` int(11)
,`barangayname` varchar(18)
,`brgynonsacrecorded` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barangaysacbatch1sum`
-- (See below for the actual view)
--
CREATE TABLE `barangaysacbatch1sum` (
`BarangayID` int(11)
,`Barangay` varchar(18)
,`Distributed` decimal(42,0)
,`Target` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barangaysacbatch2sum`
-- (See below for the actual view)
--
CREATE TABLE `barangaysacbatch2sum` (
`BarangayID` int(11)
,`Barangay` varchar(18)
,`Distributed` decimal(42,0)
,`Target` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `extension` varchar(15) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `sectorid` varchar(11) DEFAULT NULL,
  `healthconditionid` int(11) DEFAULT NULL,
  `typeofid` varchar(25) DEFAULT NULL,
  `idnumber` varchar(25) DEFAULT NULL,
  `monthlywage` int(11) DEFAULT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `indigenouspeople` varchar(5) NOT NULL DEFAULT 'No',
  `indigenouspeopletype` varchar(25) DEFAULT NULL,
  `placeofwork` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `civilstatus` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `barangay` int(11) NOT NULL,
  `homeaddress` varchar(255) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `barcode` varchar(11) DEFAULT NULL,
  `enteredby` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `revised` varchar(5) DEFAULT NULL,
  `memberadded` varchar(5) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `beneficiarybenefitview`
-- (See below for the actual view)
--
CREATE TABLE `beneficiarybenefitview` (
`BeneficiaryID` int(11)
,`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`Sex` varchar(10)
,`CivilStatus` varchar(25)
,`DateofBirth` date
,`BarCode` varchar(11)
,`Address` varchar(1000)
,`BarangayID` int(11)
,`SACBatch1Date` date
,`SACBatch2Date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `beneficiarybenefitwithdistrictview`
-- (See below for the actual view)
--
CREATE TABLE `beneficiarybenefitwithdistrictview` (
`BeneficiaryID` int(11)
,`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`Sex` varchar(10)
,`CivilStatus` varchar(25)
,`DOB` date
,`BarangayID` int(11)
,`BarangayName` varchar(18)
,`District` int(11)
,`BarCode` varchar(11)
,`BenefitPayoutID` int(11)
,`PayoutType` varchar(256)
,`PayoutDate` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `beneficiaryimage`
-- (See below for the actual view)
--
CREATE TABLE `beneficiaryimage` (
`BeneficiaryID` int(11)
,`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`Barangay` int(11)
,`BarangayID` int(11)
,`District` int(11)
,`ActionType` varchar(256)
,`Date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `districtdistributionsacbatch1`
-- (See below for the actual view)
--
CREATE TABLE `districtdistributionsacbatch1` (
`District` int(11)
,`Paid` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `districtdistributionsacbatch2`
-- (See below for the actual view)
--
CREATE TABLE `districtdistributionsacbatch2` (
`District` int(11)
,`Paid` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dswddatabase`
-- (See below for the actual view)
--
CREATE TABLE `dswddatabase` (
`ID` int(11)
,`Barcode` varchar(11)
,`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`Ext` varchar(255)
,`ReltoHHCode` int(11)
,`ReltoHH` varchar(25)
,`DOB` date
,`Sex` varchar(1)
,`Work` varchar(1000)
,`SectorID` varchar(11)
,`Sector` varchar(25)
,`HealthConditionID` int(11)
,`HealthCondition` varchar(25)
,`Tirahan` varchar(255)
,`Kalye` varchar(1000)
,`Barangay` varchar(18)
,`BarangayID` int(11)
,`PSGCCode` varchar(15)
,`TypeofID` varchar(25)
,`TypeofIDLabel` varchar(50)
,`Numero_ng_ID` varchar(25)
,`BuwanangKita` int(11)
,`Cellphone` varchar(15)
,`WorkPlace` varchar(255)
,`Katutubo` varchar(5)
,`KatutuboName` varchar(25)
,`DateRegistered` datetime
,`PunongBarangay` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fullmasterlist`
-- (See below for the actual view)
--
CREATE TABLE `fullmasterlist` (
`BeneficiaryID` int(11)
,`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`Sex` varchar(10)
,`DOB` date
,`CivilStatus` varchar(25)
,`Address` varchar(1000)
,`Barangay` varchar(18)
,`BarangayID` int(11)
,`BarCode` varchar(11)
,`EnteredBy` varchar(255)
,`EntryTimestamp` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `healthcondition`
--

CREATE TABLE `healthcondition` (
  `id` varchar(1) NOT NULL,
  `healthcondition` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `healthcondition`
--

INSERT INTO `healthcondition` (`id`, `healthcondition`) VALUES
('1', '1 - Sakit sa Puso'),
('2', '2 - Altapresyon'),
('3', '3 - Sakit sa Baga'),
('4', '4 - Diyabetis'),
('5', '5 - Kanser'),
('9', '0 - Wala sa pagpipilian');

-- --------------------------------------------------------

--
-- Table structure for table `imagerec`
--

CREATE TABLE `imagerec` (
  `id` int(11) NOT NULL,
  `entitytype` varchar(100) NOT NULL,
  `entityid` int(11) NOT NULL,
  `imagedbref` varchar(1000) DEFAULT NULL,
  `actiontype` varchar(256) NOT NULL,
  `enteredby` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imagerec`
--

INSERT INTO `imagerec` (`id`, `entitytype`, `entityid`, `imagedbref`, `actiontype`, `enteredby`, `timestamp`, `date`) VALUES
(1, 'beneficiary', 2931, NULL, 'sacdistribution1', 11, '2020-05-07 18:49:37', '2020-05-07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `masterlistnonsac`
-- (See below for the actual view)
--
CREATE TABLE `masterlistnonsac` (
`BeneficiaryID` int(11)
,`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`DOB` date
,`Sex` varchar(10)
,`CivilStatus` varchar(25)
,`BarCode` varchar(11)
,`Address` varchar(1000)
,`BarangayID` int(11)
,`Barangay` varchar(18)
,`fullname` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `masterlistsac`
-- (See below for the actual view)
--
CREATE TABLE `masterlistsac` (
`LastName` varchar(255)
,`FirstName` varchar(255)
,`MiddleName` varchar(255)
,`Sex` varchar(10)
,`CivilStatus` varchar(25)
,`DOB` date
,`Address` varchar(1000)
,`Barangay` varchar(18)
,`BarCode` varchar(11)
,`Encoder` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `reltohh` int(11) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `work` varchar(1000) DEFAULT NULL,
  `sectorid` varchar(5) DEFAULT NULL,
  `healthconditionid` varchar(11) DEFAULT NULL,
  `memberprimary` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `enteredby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `progressbybarangay`
-- (See below for the actual view)
--
CREATE TABLE `progressbybarangay` (
`id` int(11)
,`barangay` varchar(18)
,`target` int(11)
,`beneficiariesrecorded` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `progressbydistrictbatch1view`
-- (See below for the actual view)
--
CREATE TABLE `progressbydistrictbatch1view` (
`District` int(11)
,`Target` decimal(32,0)
,`Paid` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `progressbydistrictbatch2view`
-- (See below for the actual view)
--
CREATE TABLE `progressbydistrictbatch2view` (
`District` int(11)
,`Target` decimal(32,0)
,`Paid` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `progresssacbybarangay`
-- (See below for the actual view)
--
CREATE TABLE `progresssacbybarangay` (
`barangayid` int(11)
,`barangayname` varchar(18)
,`sacbentarget` int(11)
,`brgysacrecorded` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `reltohh`
--

CREATE TABLE `reltohh` (
  `id` int(11) NOT NULL,
  `relation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reltohh`
--

INSERT INTO `reltohh` (`id`, `relation`) VALUES
(1, '1 - Puno ng Pamilya'),
(2, '2 - Asawa'),
(3, '3 - Anak'),
(4, '4 - Kapatid'),
(5, '5 - Bayaw o Hipag'),
(6, '6 - Apo'),
(7, '7 - Tatay o Nanay'),
(8, '8 - Ibang Kamag-anak');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacbatch1dailyreportview`
-- (See below for the actual view)
--
CREATE TABLE `sacbatch1dailyreportview` (
`SACBatch1Date` date
,`BarangayID` int(11)
,`BeneficiaryCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacbatch1dailyview`
-- (See below for the actual view)
--
CREATE TABLE `sacbatch1dailyview` (
`Date` date
,`Paid` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacbatch2dailyreportview`
-- (See below for the actual view)
--
CREATE TABLE `sacbatch2dailyreportview` (
`SACBatch2Date` date
,`BarangayID` int(11)
,`BeneficiaryCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacbatch2dailyview`
-- (See below for the actual view)
--
CREATE TABLE `sacbatch2dailyview` (
`Date` date
,`Paid` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacdailyreportvstargetbatch1view`
-- (See below for the actual view)
--
CREATE TABLE `sacdailyreportvstargetbatch1view` (
`SACBatch1Date` date
,`BarangayID` int(11)
,`Barangay` varchar(18)
,`BeneficiaryCount` bigint(21)
,`Target` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacdailyreportvstargetbatch2view`
-- (See below for the actual view)
--
CREATE TABLE `sacdailyreportvstargetbatch2view` (
`SACBatch2Date` date
,`BarangayID` int(11)
,`Barangay` varchar(18)
,`BeneficiaryCount` bigint(21)
,`Target` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacdistribution1view`
-- (See below for the actual view)
--
CREATE TABLE `sacdistribution1view` (
`EntityID` int(11)
,`SACBatch1Date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sacdistribution2view`
-- (See below for the actual view)
--
CREATE TABLE `sacdistribution2view` (
`EntityID` int(11)
,`SACBatch2Date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sactargetbydistrict`
-- (See below for the actual view)
--
CREATE TABLE `sactargetbydistrict` (
`TargetBeneficiaries` decimal(32,0)
,`district` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` varchar(1) NOT NULL,
  `sector` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `sector`) VALUES
('A', 'A - Nakakatanda'),
('B', 'B - Buntis'),
('C', 'C - Nagpapasusong Ina'),
('D', 'D - PWD'),
('E', 'E - Solo Parent'),
('W', 'W - Wala sa pagpipilian');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sexsum`
-- (See below for the actual view)
--
CREATE TABLE `sexsum` (
`sex` varchar(10)
,`count(id)` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumbeneficiariesrecordedbybrgy`
-- (See below for the actual view)
--
CREATE TABLE `sumbeneficiariesrecordedbybrgy` (
`barangayid` int(11)
,`beneficiariesrecorded` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumbydistricthh2`
-- (See below for the actual view)
--
CREATE TABLE `sumbydistricthh2` (
`district` int(11)
,`sacbeneficiaries` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `systemrecord`
--

CREATE TABLE `systemrecord` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `object` int(11) NOT NULL,
  `record` varchar(1000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `systemrecordmaster`
-- (See below for the actual view)
--
CREATE TABLE `systemrecordmaster` (
`TransactionID` int(11)
,`User` varchar(255)
,`Record` varchar(1000)
,`ActivityObject` int(11)
,`timestamp` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalnonsac`
-- (See below for the actual view)
--
CREATE TABLE `totalnonsac` (
`totalnonsac` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalrecorded`
-- (See below for the actual view)
--
CREATE TABLE `totalrecorded` (
`totalrecorded` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalsacdistrib1`
-- (See below for the actual view)
--
CREATE TABLE `totalsacdistrib1` (
`totalsacdistrib1` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalsacdistrib2`
-- (See below for the actual view)
--
CREATE TABLE `totalsacdistrib2` (
`totalsacdistrib2` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalsacrecorded`
-- (See below for the actual view)
--
CREATE TABLE `totalsacrecorded` (
`totalsacrecorded` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `typeofid`
--

CREATE TABLE `typeofid` (
  `id` int(11) NOT NULL,
  `typeofid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofid`
--

INSERT INTO `typeofid` (`id`, `typeofid`) VALUES
(1, 'Barangay Certification'),
(2, 'Driver\'s License'),
(3, 'Employment ID'),
(4, 'GSIS UMID'),
(5, 'NCIP Certification'),
(6, 'OFW'),
(7, 'Passport'),
(8, 'Philhealth'),
(9, 'Postal'),
(10, 'PRC'),
(11, 'PWD'),
(12, 'Senior Citizen'),
(13, 'Solo Parent'),
(14, 'SSS UMID'),
(15, 'TIN'),
(16, 'Voter\'s ID');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(1000) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Inactive',
  `rights` varchar(15) DEFAULT 'DEFAULT',
  `createdtimestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `barangaybatch1complete`
--
DROP TABLE IF EXISTS `barangaybatch1complete`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangaybatch1complete`  AS  select count(`barangaysacbatch1sum`.`BarangayID`) AS `barangaybatch1complete` from `barangaysacbatch1sum` where `barangaysacbatch1sum`.`Distributed` >= `barangaysacbatch1sum`.`Target` ;

-- --------------------------------------------------------

--
-- Structure for view `barangaybatch2complete`
--
DROP TABLE IF EXISTS `barangaybatch2complete`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangaybatch2complete`  AS  select count(`barangaysacbatch2sum`.`BarangayID`) AS `barangaybatch2complete` from `barangaysacbatch2sum` where `barangaysacbatch2sum`.`Distributed` >= `barangaysacbatch2sum`.`Target` ;

-- --------------------------------------------------------

--
-- Structure for view `barangaynonsacsummary`
--
DROP TABLE IF EXISTS `barangaynonsacsummary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangaynonsacsummary`  AS  select `barangay`.`id` AS `barangayid`,`barangay`.`barangay` AS `barangayname`,count(`beneficiary`.`barangay`) AS `brgynonsacrecorded` from (`beneficiary` join `barangay`) where `barangay`.`id` = `beneficiary`.`barangay` and `beneficiary`.`barcode` = 0 group by `barangay`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `barangaysacbatch1sum`
--
DROP TABLE IF EXISTS `barangaysacbatch1sum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangaysacbatch1sum`  AS  select `sacdailyreportvstargetbatch1view`.`BarangayID` AS `BarangayID`,`sacdailyreportvstargetbatch1view`.`Barangay` AS `Barangay`,sum(`sacdailyreportvstargetbatch1view`.`BeneficiaryCount`) AS `Distributed`,`sacdailyreportvstargetbatch1view`.`Target` AS `Target` from `sacdailyreportvstargetbatch1view` group by `sacdailyreportvstargetbatch1view`.`BarangayID` ;

-- --------------------------------------------------------

--
-- Structure for view `barangaysacbatch2sum`
--
DROP TABLE IF EXISTS `barangaysacbatch2sum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangaysacbatch2sum`  AS  select `sacdailyreportvstargetbatch2view`.`BarangayID` AS `BarangayID`,`sacdailyreportvstargetbatch2view`.`Barangay` AS `Barangay`,sum(`sacdailyreportvstargetbatch2view`.`BeneficiaryCount`) AS `Distributed`,`sacdailyreportvstargetbatch2view`.`Target` AS `Target` from `sacdailyreportvstargetbatch2view` group by `sacdailyreportvstargetbatch2view`.`BarangayID` ;

-- --------------------------------------------------------

--
-- Structure for view `beneficiarybenefitview`
--
DROP TABLE IF EXISTS `beneficiarybenefitview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beneficiarybenefitview`  AS  select `beneficiary`.`id` AS `BeneficiaryID`,`beneficiary`.`lastname` AS `LastName`,`beneficiary`.`firstname` AS `FirstName`,`beneficiary`.`middlename` AS `MiddleName`,`beneficiary`.`sex` AS `Sex`,`beneficiary`.`civilstatus` AS `CivilStatus`,`beneficiary`.`dob` AS `DateofBirth`,`beneficiary`.`barcode` AS `BarCode`,`beneficiary`.`address` AS `Address`,`beneficiary`.`barangay` AS `BarangayID`,`sacdistribution1view`.`SACBatch1Date` AS `SACBatch1Date`,`sacdistribution2view`.`SACBatch2Date` AS `SACBatch2Date` from ((`beneficiary` left join `sacdistribution1view` on(`beneficiary`.`id` = `sacdistribution1view`.`EntityID`)) left join `sacdistribution2view` on(`beneficiary`.`id` = `sacdistribution2view`.`EntityID`)) order by `beneficiary`.`lastname`,`beneficiary`.`firstname` ;

-- --------------------------------------------------------

--
-- Structure for view `beneficiarybenefitwithdistrictview`
--
DROP TABLE IF EXISTS `beneficiarybenefitwithdistrictview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beneficiarybenefitwithdistrictview`  AS  select `beneficiary`.`id` AS `BeneficiaryID`,`beneficiary`.`lastname` AS `LastName`,`beneficiary`.`firstname` AS `FirstName`,`beneficiary`.`middlename` AS `MiddleName`,`beneficiary`.`sex` AS `Sex`,`beneficiary`.`civilstatus` AS `CivilStatus`,`beneficiary`.`dob` AS `DOB`,`barangay`.`id` AS `BarangayID`,`barangay`.`barangay` AS `BarangayName`,`barangay`.`district` AS `District`,`beneficiary`.`barcode` AS `BarCode`,`imagerec`.`id` AS `BenefitPayoutID`,`imagerec`.`actiontype` AS `PayoutType`,`imagerec`.`date` AS `PayoutDate` from ((`beneficiary` left join `barangay` on(`beneficiary`.`barangay` = `barangay`.`id`)) left join `imagerec` on(`beneficiary`.`id` = `imagerec`.`entityid`)) order by `beneficiary`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `beneficiaryimage`
--
DROP TABLE IF EXISTS `beneficiaryimage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `beneficiaryimage`  AS  select `beneficiary`.`id` AS `BeneficiaryID`,`beneficiary`.`lastname` AS `LastName`,`beneficiary`.`firstname` AS `FirstName`,`beneficiary`.`middlename` AS `MiddleName`,`beneficiary`.`barangay` AS `Barangay`,`beneficiary`.`barangay` AS `BarangayID`,`barangay`.`district` AS `District`,`imagerec`.`actiontype` AS `ActionType`,`imagerec`.`date` AS `Date` from ((`beneficiary` join `barangay`) join `imagerec`) where `beneficiary`.`id` = `imagerec`.`entityid` and `beneficiary`.`barangay` = `barangay`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `districtdistributionsacbatch1`
--
DROP TABLE IF EXISTS `districtdistributionsacbatch1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `districtdistributionsacbatch1`  AS  select `beneficiarybenefitwithdistrictview`.`District` AS `District`,count(`beneficiarybenefitwithdistrictview`.`BenefitPayoutID`) AS `Paid` from `beneficiarybenefitwithdistrictview` where `beneficiarybenefitwithdistrictview`.`PayoutType` = 'sacdistribution1' group by `beneficiarybenefitwithdistrictview`.`District` order by `beneficiarybenefitwithdistrictview`.`District` ;

-- --------------------------------------------------------

--
-- Structure for view `districtdistributionsacbatch2`
--
DROP TABLE IF EXISTS `districtdistributionsacbatch2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `districtdistributionsacbatch2`  AS  select `beneficiarybenefitwithdistrictview`.`District` AS `District`,count(`beneficiarybenefitwithdistrictview`.`BenefitPayoutID`) AS `Paid` from `beneficiarybenefitwithdistrictview` where `beneficiarybenefitwithdistrictview`.`PayoutType` = 'sacdistribution2' group by `beneficiarybenefitwithdistrictview`.`District` order by `beneficiarybenefitwithdistrictview`.`District` ;

-- --------------------------------------------------------

--
-- Structure for view `dswddatabase`
--
DROP TABLE IF EXISTS `dswddatabase`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dswddatabase`  AS  select `member`.`id` AS `ID`,`beneficiary`.`barcode` AS `Barcode`,`member`.`lastname` AS `LastName`,`member`.`firstname` AS `FirstName`,`member`.`middlename` AS `MiddleName`,`member`.`extension` AS `Ext`,`member`.`reltohh` AS `ReltoHHCode`,`reltohh`.`relation` AS `ReltoHH`,`member`.`dob` AS `DOB`,`member`.`sex` AS `Sex`,`member`.`work` AS `Work`,`beneficiary`.`sectorid` AS `SectorID`,`sector`.`sector` AS `Sector`,`beneficiary`.`healthconditionid` AS `HealthConditionID`,`healthcondition`.`healthcondition` AS `HealthCondition`,`beneficiary`.`homeaddress` AS `Tirahan`,`beneficiary`.`address` AS `Kalye`,`barangay`.`barangay` AS `Barangay`,`beneficiary`.`barangay` AS `BarangayID`,`barangay`.`psgc` AS `PSGCCode`,`beneficiary`.`typeofid` AS `TypeofID`,`typeofid`.`typeofid` AS `TypeofIDLabel`,`beneficiary`.`idnumber` AS `Numero_ng_ID`,`beneficiary`.`monthlywage` AS `BuwanangKita`,`beneficiary`.`cellphone` AS `Cellphone`,`beneficiary`.`placeofwork` AS `WorkPlace`,`beneficiary`.`indigenouspeople` AS `Katutubo`,`beneficiary`.`indigenouspeopletype` AS `KatutuboName`,`beneficiary`.`timestamp` AS `DateRegistered`,`barangay`.`punongbarangay` AS `PunongBarangay` from ((((((`member` left join `beneficiary` on(`member`.`memberprimary` = `beneficiary`.`id`)) left join `barangay` on(`beneficiary`.`barangay` = `barangay`.`id`)) left join `reltohh` on(`member`.`reltohh` = `reltohh`.`id`)) left join `healthcondition` on(`member`.`healthconditionid` = `healthcondition`.`id`)) left join `sector` on(`member`.`sectorid` = `sector`.`id`)) left join `typeofid` on(`beneficiary`.`typeofid` = `typeofid`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `fullmasterlist`
--
DROP TABLE IF EXISTS `fullmasterlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullmasterlist`  AS  select `beneficiary`.`id` AS `BeneficiaryID`,`beneficiary`.`lastname` AS `LastName`,`beneficiary`.`firstname` AS `FirstName`,`beneficiary`.`middlename` AS `MiddleName`,`beneficiary`.`sex` AS `Sex`,`beneficiary`.`dob` AS `DOB`,`beneficiary`.`civilstatus` AS `CivilStatus`,`beneficiary`.`address` AS `Address`,`barangay`.`barangay` AS `Barangay`,`barangay`.`id` AS `BarangayID`,`beneficiary`.`barcode` AS `BarCode`,`user`.`fullname` AS `EnteredBy`,`beneficiary`.`timestamp` AS `EntryTimestamp` from ((`beneficiary` join `user`) join `barangay`) where `barangay`.`id` = `beneficiary`.`barangay` and `beneficiary`.`enteredby` = `user`.`id` order by `beneficiary`.`lastname`,`beneficiary`.`firstname`,`beneficiary`.`middlename` ;

-- --------------------------------------------------------

--
-- Structure for view `masterlistnonsac`
--
DROP TABLE IF EXISTS `masterlistnonsac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `masterlistnonsac`  AS  select `beneficiary`.`id` AS `BeneficiaryID`,`beneficiary`.`lastname` AS `LastName`,`beneficiary`.`firstname` AS `FirstName`,`beneficiary`.`middlename` AS `MiddleName`,`beneficiary`.`dob` AS `DOB`,`beneficiary`.`sex` AS `Sex`,`beneficiary`.`civilstatus` AS `CivilStatus`,`beneficiary`.`barcode` AS `BarCode`,`beneficiary`.`address` AS `Address`,`barangay`.`id` AS `BarangayID`,`barangay`.`barangay` AS `Barangay`,`user`.`fullname` AS `fullname` from ((`beneficiary` join `barangay`) join `user`) where `beneficiary`.`enteredby` = `user`.`id` and `beneficiary`.`barangay` = `barangay`.`id` and `beneficiary`.`barcode` = 0 order by `beneficiary`.`lastname` ;

-- --------------------------------------------------------

--
-- Structure for view `masterlistsac`
--
DROP TABLE IF EXISTS `masterlistsac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `masterlistsac`  AS  select `beneficiary`.`lastname` AS `LastName`,`beneficiary`.`firstname` AS `FirstName`,`beneficiary`.`middlename` AS `MiddleName`,`beneficiary`.`sex` AS `Sex`,`beneficiary`.`civilstatus` AS `CivilStatus`,`beneficiary`.`dob` AS `DOB`,`beneficiary`.`address` AS `Address`,`barangay`.`barangay` AS `Barangay`,`beneficiary`.`barcode` AS `BarCode`,`user`.`fullname` AS `Encoder` from ((`beneficiary` join `user`) join `barangay`) where `beneficiary`.`enteredby` = `user`.`id` and `beneficiary`.`barangay` = `barangay`.`id` and `beneficiary`.`barcode` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `progressbybarangay`
--
DROP TABLE IF EXISTS `progressbybarangay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `progressbybarangay`  AS  select `barangay`.`id` AS `id`,`barangay`.`barangay` AS `barangay`,`barangay`.`sacbeneficiaries` AS `target`,`sumbeneficiariesrecordedbybrgy`.`beneficiariesrecorded` AS `beneficiariesrecorded` from (`barangay` join `sumbeneficiariesrecordedbybrgy`) where `barangay`.`id` = `sumbeneficiariesrecordedbybrgy`.`barangayid` ;

-- --------------------------------------------------------

--
-- Structure for view `progressbydistrictbatch1view`
--
DROP TABLE IF EXISTS `progressbydistrictbatch1view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `progressbydistrictbatch1view`  AS  select `sactargetbydistrict`.`district` AS `District`,`sactargetbydistrict`.`TargetBeneficiaries` AS `Target`,`districtdistributionsacbatch1`.`Paid` AS `Paid` from (`sactargetbydistrict` left join `districtdistributionsacbatch1` on(`sactargetbydistrict`.`district` = `districtdistributionsacbatch1`.`District`)) ;

-- --------------------------------------------------------

--
-- Structure for view `progressbydistrictbatch2view`
--
DROP TABLE IF EXISTS `progressbydistrictbatch2view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `progressbydistrictbatch2view`  AS  select `sactargetbydistrict`.`district` AS `District`,`sactargetbydistrict`.`TargetBeneficiaries` AS `Target`,`districtdistributionsacbatch2`.`Paid` AS `Paid` from (`sactargetbydistrict` left join `districtdistributionsacbatch2` on(`sactargetbydistrict`.`district` = `districtdistributionsacbatch2`.`District`)) ;

-- --------------------------------------------------------

--
-- Structure for view `progresssacbybarangay`
--
DROP TABLE IF EXISTS `progresssacbybarangay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `progresssacbybarangay`  AS  select `barangay`.`id` AS `barangayid`,`barangay`.`barangay` AS `barangayname`,`barangay`.`sacbeneficiaries` AS `sacbentarget`,count(`beneficiary`.`barangay`) AS `brgysacrecorded` from (`beneficiary` join `barangay`) where `barangay`.`id` = `beneficiary`.`barangay` and `beneficiary`.`barcode` > 0 group by `barangay`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `sacbatch1dailyreportview`
--
DROP TABLE IF EXISTS `sacbatch1dailyreportview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacbatch1dailyreportview`  AS  select `beneficiarybenefitview`.`SACBatch1Date` AS `SACBatch1Date`,`beneficiarybenefitview`.`BarangayID` AS `BarangayID`,count(`beneficiarybenefitview`.`BeneficiaryID`) AS `BeneficiaryCount` from `beneficiarybenefitview` where `beneficiarybenefitview`.`SACBatch1Date` <> '' group by `beneficiarybenefitview`.`SACBatch1Date`,`beneficiarybenefitview`.`BarangayID` order by `beneficiarybenefitview`.`SACBatch1Date`,`beneficiarybenefitview`.`BarangayID` ;

-- --------------------------------------------------------

--
-- Structure for view `sacbatch1dailyview`
--
DROP TABLE IF EXISTS `sacbatch1dailyview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacbatch1dailyview`  AS  select `sacbatch1dailyreportview`.`SACBatch1Date` AS `Date`,sum(`sacbatch1dailyreportview`.`BeneficiaryCount`) AS `Paid` from `sacbatch1dailyreportview` group by `sacbatch1dailyreportview`.`SACBatch1Date` ;

-- --------------------------------------------------------

--
-- Structure for view `sacbatch2dailyreportview`
--
DROP TABLE IF EXISTS `sacbatch2dailyreportview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacbatch2dailyreportview`  AS  select `beneficiarybenefitview`.`SACBatch2Date` AS `SACBatch2Date`,`beneficiarybenefitview`.`BarangayID` AS `BarangayID`,count(`beneficiarybenefitview`.`BeneficiaryID`) AS `BeneficiaryCount` from `beneficiarybenefitview` where `beneficiarybenefitview`.`SACBatch2Date` <> '' group by `beneficiarybenefitview`.`SACBatch2Date`,`beneficiarybenefitview`.`BarangayID` order by `beneficiarybenefitview`.`SACBatch2Date`,`beneficiarybenefitview`.`BarangayID` ;

-- --------------------------------------------------------

--
-- Structure for view `sacbatch2dailyview`
--
DROP TABLE IF EXISTS `sacbatch2dailyview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacbatch2dailyview`  AS  select `sacbatch2dailyreportview`.`SACBatch2Date` AS `Date`,sum(`sacbatch2dailyreportview`.`BeneficiaryCount`) AS `Paid` from `sacbatch2dailyreportview` group by `sacbatch2dailyreportview`.`SACBatch2Date` ;

-- --------------------------------------------------------

--
-- Structure for view `sacdailyreportvstargetbatch1view`
--
DROP TABLE IF EXISTS `sacdailyreportvstargetbatch1view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacdailyreportvstargetbatch1view`  AS  select `sacbatch1dailyreportview`.`SACBatch1Date` AS `SACBatch1Date`,`sacbatch1dailyreportview`.`BarangayID` AS `BarangayID`,`barangay`.`barangay` AS `Barangay`,`sacbatch1dailyreportview`.`BeneficiaryCount` AS `BeneficiaryCount`,`barangay`.`sacbeneficiaries` AS `Target` from (`sacbatch1dailyreportview` left join `barangay` on(`sacbatch1dailyreportview`.`BarangayID` = `barangay`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sacdailyreportvstargetbatch2view`
--
DROP TABLE IF EXISTS `sacdailyreportvstargetbatch2view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacdailyreportvstargetbatch2view`  AS  select `sacbatch2dailyreportview`.`SACBatch2Date` AS `SACBatch2Date`,`sacbatch2dailyreportview`.`BarangayID` AS `BarangayID`,`barangay`.`barangay` AS `Barangay`,`sacbatch2dailyreportview`.`BeneficiaryCount` AS `BeneficiaryCount`,`barangay`.`sacbeneficiaries` AS `Target` from (`sacbatch2dailyreportview` left join `barangay` on(`sacbatch2dailyreportview`.`BarangayID` = `barangay`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sacdistribution1view`
--
DROP TABLE IF EXISTS `sacdistribution1view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacdistribution1view`  AS  select `imagerec`.`entityid` AS `EntityID`,`imagerec`.`date` AS `SACBatch1Date` from `imagerec` where `imagerec`.`entitytype` = 'beneficiary' and `imagerec`.`actiontype` = 'sacdistribution1' ;

-- --------------------------------------------------------

--
-- Structure for view `sacdistribution2view`
--
DROP TABLE IF EXISTS `sacdistribution2view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sacdistribution2view`  AS  select `imagerec`.`entityid` AS `EntityID`,`imagerec`.`date` AS `SACBatch2Date` from `imagerec` where `imagerec`.`entitytype` = 'beneficiary' and `imagerec`.`actiontype` = 'sacdistribution2' ;

-- --------------------------------------------------------

--
-- Structure for view `sactargetbydistrict`
--
DROP TABLE IF EXISTS `sactargetbydistrict`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sactargetbydistrict`  AS  select sum(`barangay`.`sacbeneficiaries`) AS `TargetBeneficiaries`,`barangay`.`district` AS `district` from `barangay` group by `barangay`.`district` order by `barangay`.`district` ;

-- --------------------------------------------------------

--
-- Structure for view `sexsum`
--
DROP TABLE IF EXISTS `sexsum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sexsum`  AS  select `beneficiary`.`sex` AS `sex`,count(`beneficiary`.`id`) AS `count(id)` from `beneficiary` group by `beneficiary`.`sex` ;

-- --------------------------------------------------------

--
-- Structure for view `sumbeneficiariesrecordedbybrgy`
--
DROP TABLE IF EXISTS `sumbeneficiariesrecordedbybrgy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumbeneficiariesrecordedbybrgy`  AS  select `beneficiary`.`barangay` AS `barangayid`,count(`beneficiary`.`id`) AS `beneficiariesrecorded` from `beneficiary` group by `beneficiary`.`barangay` ;

-- --------------------------------------------------------

--
-- Structure for view `sumbydistricthh2`
--
DROP TABLE IF EXISTS `sumbydistricthh2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumbydistricthh2`  AS  select `barangay`.`district` AS `district`,sum(`barangay`.`sacbeneficiaries`) AS `sacbeneficiaries` from `barangay` group by `barangay`.`district` ;

-- --------------------------------------------------------

--
-- Structure for view `systemrecordmaster`
--
DROP TABLE IF EXISTS `systemrecordmaster`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `systemrecordmaster`  AS  select `systemrecord`.`id` AS `TransactionID`,`user`.`fullname` AS `User`,`systemrecord`.`record` AS `Record`,`systemrecord`.`object` AS `ActivityObject`,`systemrecord`.`timestamp` AS `timestamp` from (`systemrecord` join `user`) where `systemrecord`.`user` = `user`.`id` order by `systemrecord`.`timestamp` desc limit 50 ;

-- --------------------------------------------------------

--
-- Structure for view `totalnonsac`
--
DROP TABLE IF EXISTS `totalnonsac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalnonsac`  AS  select count(`beneficiary`.`id`) AS `totalnonsac` from `beneficiary` where `beneficiary`.`barcode` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `totalrecorded`
--
DROP TABLE IF EXISTS `totalrecorded`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalrecorded`  AS  select count(`beneficiary`.`id`) AS `totalrecorded` from `beneficiary` ;

-- --------------------------------------------------------

--
-- Structure for view `totalsacdistrib1`
--
DROP TABLE IF EXISTS `totalsacdistrib1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalsacdistrib1`  AS  select count(`imagerec`.`id`) AS `totalsacdistrib1` from `imagerec` where `imagerec`.`actiontype` = 'sacdistribution1' ;

-- --------------------------------------------------------

--
-- Structure for view `totalsacdistrib2`
--
DROP TABLE IF EXISTS `totalsacdistrib2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalsacdistrib2`  AS  select count(`imagerec`.`id`) AS `totalsacdistrib2` from `imagerec` where `imagerec`.`actiontype` = 'sacdistribution2' ;

-- --------------------------------------------------------

--
-- Structure for view `totalsacrecorded`
--
DROP TABLE IF EXISTS `totalsacrecorded`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalsacrecorded`  AS  select count(`beneficiary`.`id`) AS `totalsacrecorded` from `beneficiary` where `beneficiary`.`barcode` > 0 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthcondition`
--
ALTER TABLE `healthcondition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagerec`
--
ALTER TABLE `imagerec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reltohh`
--
ALTER TABLE `reltohh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemrecord`
--
ALTER TABLE `systemrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofid`
--
ALTER TABLE `typeofid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16422;

--
-- AUTO_INCREMENT for table `imagerec`
--
ALTER TABLE `imagerec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reltohh`
--
ALTER TABLE `reltohh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `systemrecord`
--
ALTER TABLE `systemrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2285;

--
-- AUTO_INCREMENT for table `typeofid`
--
ALTER TABLE `typeofid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
