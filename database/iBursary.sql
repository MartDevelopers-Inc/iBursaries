-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2021 at 01:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iBursary`
--

-- --------------------------------------------------------

--
-- Table structure for table `iBursary_admin`
--

CREATE TABLE `iBursary_admin` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `idno` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `adr` longtext NOT NULL,
  `bio` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBursary_admin`
--

INSERT INTO `iBursary_admin` (`id`, `name`, `email`, `password`, `phone`, `idno`, `profile`, `adr`, `bio`) VALUES
('a69681bcf334ae130217fea4505fd3c994f5683f', 'System Administrator', 'sysadmin@ibursary.org', 'a69681bcf334ae130217fea4505fd3c994f5683f', '0704031263', '35574881', 'devlan.jpg', '127 Localhost', 0x54686973206973206d792062696f6772617068792e);

-- --------------------------------------------------------

--
-- Table structure for table `iBursary_applicants`
--

CREATE TABLE `iBursary_applicants` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `idno` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `county` varchar(200) NOT NULL,
  `sub_county` varchar(200) NOT NULL,
  `ward` varchar(200) NOT NULL,
  `sub_location` varchar(200) NOT NULL,
  `village` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBursary_applicants`
--

INSERT INTO `iBursary_applicants` (`id`, `name`, `phone`, `dob`, `idno`, `email`, `password`, `sex`, `county`, `sub_county`, `ward`, `sub_location`, `village`) VALUES
('f34d68b28c248d224bf39ba914e71fd6d7a70e1000', 'Applicant 101', '7040313001', '27 Jul 1998', '35574911', 'applicant@ibursary.101', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1001', 'Applicant 102', '7040313002', '28 Jul 1998', '35574912', 'applicant@ibursary.102', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1002', 'Applicant 103', '7040313003', '29 Jul 1998', '35574913', 'applicant@ibursary.103', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1003', 'Applicant 104', '7040313004', '13 Jul 1998', '35574914', 'applicant@ibursary.104', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1004', 'Applicant 105', '7040313005', '14 Jul 1998', '35574915', 'applicant@ibursary.105', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1005', 'Applicant 106', '7040313006', '15 Jul 1998', '35574916', 'applicant@ibursary.106', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1006', 'Applicant 107', '7040313007', '16 Jul 1998', '35574917', 'applicant@ibursary.107', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1007', 'Applicant 108', '7040313008', '17 Jul 1998', '35574918', 'applicant@ibursary.108', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1008', 'Applicant 109', '7040313009', '18 Jul 1998', '35574919', 'applicant@ibursary.109', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1009', 'Applicant 110', '7040313010', '19 Jul 1998', '35574920', 'applicant@ibursary.110', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1010', 'Applicant 111', '7040313011', '20 Jul 1998', '35574921', 'applicant@ibursary.111', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1011', 'Applicant 112', '7040313012', '21 Jul 1998', '35574922', 'applicant@ibursary.112', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1012', 'Applicant 113', '7040313013', '22 Jul 1998', '35574923', 'applicant@ibursary.113', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1013', 'Applicant 114', '7040313014', '23 Jul 1998', '35574924', 'applicant@ibursary.114', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1014', 'Applicant 115', '7040313015', '24 Jul 1998', '35574925', 'applicant@ibursary.115', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1015', 'Applicant 116', '7040313016', '25 Jul 1998', '35574926', 'applicant@ibursary.116', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1016', 'Applicant 117', '7040313017', '26 Jul 1998', '35574927', 'applicant@ibursary.117', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1017', 'Applicant 118', '7040313018', '27 Jul 1998', '35574928', 'applicant@ibursary.118', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1018', 'Applicant 119', '7040313019', '28 Jul 1998', '35574929', 'applicant@ibursary.119', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1019', 'Applicant 120', '7040313020', '29 Jul 1998', '35574930', 'applicant@ibursary.120', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1020', 'Applicant 121', '7040313021', '13 Jul 1998', '35574931', 'applicant@ibursary.121', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1021', 'Applicant 122', '7040313022', '14 Jul 1998', '35574932', 'applicant@ibursary.122', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1022', 'Applicant 123', '7040313023', '15 Jul 1998', '35574933', 'applicant@ibursary.123', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1023', 'Applicant 124', '7040313024', '16 Jul 1998', '35574934', 'applicant@ibursary.124', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1024', 'Applicant 125', '7040313025', '17 Jul 1998', '35574935', 'applicant@ibursary.125', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1025', 'Applicant 126', '7040313026', '18 Jul 1998', '35574936', 'applicant@ibursary.126', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1026', 'Applicant 127', '7040313027', '19 Jul 1998', '35574937', 'applicant@ibursary.127', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1027', 'Applicant 128', '7040313028', '20 Jul 1998', '35574938', 'applicant@ibursary.128', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1028', 'Applicant 129', '7040313029', '21 Jul 1998', '35574939', 'applicant@ibursary.129', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1029', 'Applicant 130', '7040313030', '22 Jul 1998', '35574940', 'applicant@ibursary.130', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1030', 'Applicant 131', '7040313031', '23 Jul 1998', '35574941', 'applicant@ibursary.131', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1031', 'Applicant 132', '7040313032', '24 Jul 1998', '35574942', 'applicant@ibursary.132', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1032', 'Applicant 133', '7040313033', '25 Jul 1998', '35574943', 'applicant@ibursary.133', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1033', 'Applicant 134', '7040313034', '26 Jul 1998', '35574944', 'applicant@ibursary.134', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1034', 'Applicant 135', '7040313035', '27 Jul 1998', '35574945', 'applicant@ibursary.135', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1035', 'Applicant 136', '7040313036', '28 Jul 1998', '35574946', 'applicant@ibursary.136', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1036', 'Applicant 137', '7040313037', '29 Jul 1998', '35574947', 'applicant@ibursary.137', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1037', 'Applicant 138', '7040313038', '13 Jul 1998', '35574948', 'applicant@ibursary.138', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1038', 'Applicant 139', '7040313039', '14 Jul 1998', '35574949', 'applicant@ibursary.139', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1039', 'Applicant 140', '7040313040', '15 Jul 1998', '35574950', 'applicant@ibursary.140', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1040', 'Applicant 141', '7040313041', '16 Jul 1998', '35574951', 'applicant@ibursary.141', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1041', 'Applicant 142', '7040313042', '17 Jul 1998', '35574952', 'applicant@ibursary.142', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1042', 'Applicant 143', '7040313043', '18 Jul 1998', '35574953', 'applicant@ibursary.143', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1043', 'Applicant 144', '7040313044', '19 Jul 1998', '35574954', 'applicant@ibursary.144', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1044', 'Applicant 145', '7040313045', '20 Jul 1998', '35574955', 'applicant@ibursary.145', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1045', 'Applicant 146', '7040313046', '21 Jul 1998', '35574956', 'applicant@ibursary.146', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1046', 'Applicant 147', '7040313047', '22 Jul 1998', '35574957', 'applicant@ibursary.147', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1047', 'Applicant 148', '7040313048', '23 Jul 1998', '35574958', 'applicant@ibursary.148', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1048', 'Applicant 149', '7040313049', '13 Jul 1998', '35574959', 'applicant@ibursary.149', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1049', 'Applicant 150', '7040313050', '14 Jul 1998', '35574960', 'applicant@ibursary.150', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1050', 'Applicant 151', '7040313051', '15 Jul 1998', '35574961', 'applicant@ibursary.151', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1051', 'Applicant 152', '7040313052', '16 Jul 1998', '35574962', 'applicant@ibursary.152', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1052', 'Applicant 153', '7040313053', '17 Jul 1998', '35574963', 'applicant@ibursary.153', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1053', 'Applicant 154', '7040313054', '18 Jul 1998', '35574964', 'applicant@ibursary.154', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1054', 'Applicant 155', '7040313055', '19 Jul 1998', '35574965', 'applicant@ibursary.155', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1055', 'Applicant 156', '7040313056', '20 Jul 1998', '35574966', 'applicant@ibursary.156', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1056', 'Applicant 157', '7040313057', '21 Jul 1998', '35574967', 'applicant@ibursary.157', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1057', 'Applicant 158', '7040313058', '22 Jul 1998', '35574968', 'applicant@ibursary.158', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1058', 'Applicant 159', '7040313059', '23 Jul 1998', '35574969', 'applicant@ibursary.159', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1059', 'Applicant 160', '7040313060', '24 Jul 1998', '35574970', 'applicant@ibursary.160', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1060', 'Applicant 161', '7040313061', '25 Jul 1998', '35574971', 'applicant@ibursary.161', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1061', 'Applicant 162', '7040313062', '26 Jul 1998', '35574972', 'applicant@ibursary.162', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1062', 'Applicant 163', '7040313063', '27 Jul 1998', '35574973', 'applicant@ibursary.163', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1063', 'Applicant 164', '7040313064', '28 Jul 1998', '35574974', 'applicant@ibursary.164', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1064', 'Applicant 165', '7040313065', '29 Jul 1998', '35574975', 'applicant@ibursary.165', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1065', 'Applicant 166', '7040313066', '13 Jul 1998', '35574976', 'applicant@ibursary.166', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1066', 'Applicant 167', '7040313067', '14 Jul 1998', '35574977', 'applicant@ibursary.167', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1067', 'Applicant 168', '7040313068', '15 Jul 1998', '35574978', 'applicant@ibursary.168', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1068', 'Applicant 169', '7040313069', '16 Jul 1998', '35574979', 'applicant@ibursary.169', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1069', 'Applicant 170', '7040313070', '17 Jul 1998', '35574980', 'applicant@ibursary.170', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1070', 'Applicant 171', '7040313071', '18 Jul 1998', '35574981', 'applicant@ibursary.171', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1071', 'Applicant 172', '7040313072', '19 Jul 1998', '35574982', 'applicant@ibursary.172', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1072', 'Applicant 173', '7040313073', '20 Jul 1998', '35574983', 'applicant@ibursary.173', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1073', 'Applicant 174', '7040313074', '21 Jul 1998', '35574984', 'applicant@ibursary.174', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1074', 'Applicant 175', '7040313075', '22 Jul 1998', '35574985', 'applicant@ibursary.175', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1075', 'Applicant 176', '7040313076', '23 Jul 1998', '35574986', 'applicant@ibursary.176', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1076', 'Applicant 177', '7040313077', '24 Jul 1998', '35574987', 'applicant@ibursary.177', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1077', 'Applicant 178', '7040313078', '25 Jul 1998', '35574988', 'applicant@ibursary.178', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1078', 'Applicant 179', '7040313079', '26 Jul 1998', '35574989', 'applicant@ibursary.179', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1079', 'Applicant 180', '7040313080', '27 Jul 1998', '35574990', 'applicant@ibursary.180', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1080', 'Applicant 181', '7040313081', '28 Jul 1998', '35574991', 'applicant@ibursary.181', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1081', 'Applicant 182', '7040313082', '29 Jul 1998', '35574992', 'applicant@ibursary.182', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1082', 'Applicant 183', '7040313083', '13 Jul 1998', '35574993', 'applicant@ibursary.183', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1083', 'Applicant 184', '7040313084', '14 Jul 1998', '35574994', 'applicant@ibursary.184', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1084', 'Applicant 185', '7040313085', '15 Jul 1998', '35574995', 'applicant@ibursary.185', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1085', 'Applicant 186', '7040313086', '16 Jul 1998', '35574996', 'applicant@ibursary.186', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1086', 'Applicant 187', '7040313087', '17 Jul 1998', '35574997', 'applicant@ibursary.187', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1087', 'Applicant 188', '7040313088', '18 Jul 1998', '35574998', 'applicant@ibursary.188', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1088', 'Applicant 189', '7040313089', '19 Jul 1998', '35574999', 'applicant@ibursary.189', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1089', 'Applicant 190', '7040313090', '20 Jul 1998', '35575000', 'applicant@ibursary.190', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1090', 'Applicant 191', '7040313091', '21 Jul 1998', '35575001', 'applicant@ibursary.191', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1091', 'Applicant 192', '7040313092', '22 Jul 1998', '35575002', 'applicant@ibursary.192', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1092', 'Applicant 193', '7040313093', '23 Jul 1998', '35575003', 'applicant@ibursary.193', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1093', 'Applicant 194', '7040313094', '24 Jul 1998', '35575004', 'applicant@ibursary.194', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1094', 'Applicant 195', '7040313095', '25 Jul 1998', '35575005', 'applicant@ibursary.195', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1095', 'Applicant 196', '7040313096', '26 Jul 1998', '35575006', 'applicant@ibursary.196', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1096', 'Applicant 197', '7040313097', '27 Jul 1998', '35575007', 'applicant@ibursary.197', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1097', 'Applicant 198', '7040313098', '28 Jul 1998', '35575008', 'applicant@ibursary.198', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1098', 'Applicant 199', '7040313099', '29 Jul 1998', '35575009', 'applicant@ibursary.199', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1099', 'Applicant 200', '7040313100', '13 Jul 1998', '35575010', 'applicant@ibursary.200', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1100', 'Applicant 201', '7040313101', '14 Jul 1998', '35575011', 'applicant@ibursary.201', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1101', 'Applicant 202', '7040313102', '15 Jul 1998', '35575012', 'applicant@ibursary.202', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1102', 'Applicant 203', '7040313103', '16 Jul 1998', '35575013', 'applicant@ibursary.203', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1103', 'Applicant 204', '7040313104', '17 Jul 1998', '35575014', 'applicant@ibursary.204', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1104', 'Applicant 205', '7040313105', '18 Jul 1998', '35575015', 'applicant@ibursary.205', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1105', 'Applicant 206', '7040313106', '19 Jul 1998', '35575016', 'applicant@ibursary.206', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1106', 'Applicant 207', '7040313107', '20 Jul 1998', '35575017', 'applicant@ibursary.207', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1107', 'Applicant 208', '7040313108', '21 Jul 1998', '35575018', 'applicant@ibursary.208', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1108', 'Applicant 209', '7040313109', '22 Jul 1998', '35575019', 'applicant@ibursary.209', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1109', 'Applicant 210', '7040313110', '23 Jul 1998', '35575020', 'applicant@ibursary.210', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1110', 'Applicant 211', '7040313111', '24 Jul 1998', '35575021', 'applicant@ibursary.211', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1111', 'Applicant 212', '7040313112', '25 Jul 1998', '35575022', 'applicant@ibursary.212', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1112', 'Applicant 213', '7040313113', '26 Jul 1998', '35575023', 'applicant@ibursary.213', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1113', 'Applicant 214', '7040313114', '27 Jul 1998', '35575024', 'applicant@ibursary.214', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1114', 'Applicant 215', '7040313115', '28 Jul 1998', '35575025', 'applicant@ibursary.215', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1115', 'Applicant 216', '7040313116', '29 Jul 1998', '35575026', 'applicant@ibursary.216', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1116', 'Applicant 217', '7040313117', '13 Jul 1998', '35575027', 'applicant@ibursary.217', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1117', 'Applicant 218', '7040313118', '14 Jul 1998', '35575028', 'applicant@ibursary.218', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1118', 'Applicant 219', '7040313119', '15 Jul 1998', '35575029', 'applicant@ibursary.219', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1119', 'Applicant 220', '7040313120', '16 Jul 1998', '35575030', 'applicant@ibursary.220', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1120', 'Applicant 221', '7040313121', '17 Jul 1998', '35575031', 'applicant@ibursary.221', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1121', 'Applicant 222', '7040313122', '18 Jul 1998', '35575032', 'applicant@ibursary.222', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1122', 'Applicant 223', '7040313123', '19 Jul 1998', '35575033', 'applicant@ibursary.223', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1123', 'Applicant 224', '7040313124', '20 Jul 1998', '35575034', 'applicant@ibursary.224', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1124', 'Applicant 225', '7040313125', '21 Jul 1998', '35575035', 'applicant@ibursary.225', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1125', 'Applicant 226', '7040313126', '22 Jul 1998', '35575036', 'applicant@ibursary.226', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1126', 'Applicant 227', '7040313127', '23 Jul 1998', '35575037', 'applicant@ibursary.227', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1127', 'Applicant 228', '7040313128', '24 Jul 1998', '35575038', 'applicant@ibursary.228', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1128', 'Applicant 229', '7040313129', '25 Jul 1998', '35575039', 'applicant@ibursary.229', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1129', 'Applicant 230', '7040313130', '26 Jul 1998', '35575040', 'applicant@ibursary.230', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1130', 'Applicant 231', '7040313131', '27 Jul 1998', '35575041', 'applicant@ibursary.231', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1131', 'Applicant 232', '7040313132', '28 Jul 1998', '35575042', 'applicant@ibursary.232', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1132', 'Applicant 233', '7040313133', '29 Jul 1998', '35575043', 'applicant@ibursary.233', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1133', 'Applicant 234', '7040313134', '13 Jul 1998', '35575044', 'applicant@ibursary.234', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1134', 'Applicant 235', '7040313135', '14 Jul 1998', '35575045', 'applicant@ibursary.235', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1135', 'Applicant 236', '7040313136', '15 Jul 1998', '35575046', 'applicant@ibursary.236', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1136', 'Applicant 237', '7040313137', '16 Jul 1998', '35575047', 'applicant@ibursary.237', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1137', 'Applicant 238', '7040313138', '17 Jul 1998', '35575048', 'applicant@ibursary.238', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1138', 'Applicant 239', '7040313139', '18 Jul 1998', '35575049', 'applicant@ibursary.239', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1139', 'Applicant 240', '7040313140', '19 Jul 1998', '35575050', 'applicant@ibursary.240', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1140', 'Applicant 241', '7040313141', '20 Jul 1998', '35575051', 'applicant@ibursary.241', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1141', 'Applicant 242', '7040313142', '21 Jul 1998', '35575052', 'applicant@ibursary.242', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1142', 'Applicant 243', '7040313143', '22 Jul 1998', '35575053', 'applicant@ibursary.243', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1143', 'Applicant 244', '7040313144', '23 Jul 1998', '35575054', 'applicant@ibursary.244', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1144', 'Applicant 245', '7040313145', '24 Jul 1998', '35575055', 'applicant@ibursary.245', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1145', 'Applicant 246', '7040313146', '25 Jul 1998', '35575056', 'applicant@ibursary.246', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1146', 'Applicant 247', '7040313147', '26 Jul 1998', '35575057', 'applicant@ibursary.247', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1147', 'Applicant 248', '7040313148', '27 Jul 1998', '35575058', 'applicant@ibursary.248', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1148', 'Applicant 249', '7040313149', '28 Jul 1998', '35575059', 'applicant@ibursary.249', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1149', 'Applicant 250', '7040313150', '29 Jul 1998', '35575060', 'applicant@ibursary.250', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1150', 'Applicant 251', '7040313151', '13 Jul 1998', '35575061', 'applicant@ibursary.251', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1151', 'Applicant 252', '7040313152', '14 Jul 1998', '35575062', 'applicant@ibursary.252', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1152', 'Applicant 253', '7040313153', '15 Jul 1998', '35575063', 'applicant@ibursary.253', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1153', 'Applicant 254', '7040313154', '16 Jul 1998', '35575064', 'applicant@ibursary.254', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1154', 'Applicant 255', '7040313155', '17 Jul 1998', '35575065', 'applicant@ibursary.255', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1155', 'Applicant 256', '7040313156', '18 Jul 1998', '35575066', 'applicant@ibursary.256', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1156', 'Applicant 257', '7040313157', '19 Jul 1998', '35575067', 'applicant@ibursary.257', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1157', 'Applicant 258', '7040313158', '20 Jul 1998', '35575068', 'applicant@ibursary.258', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1158', 'Applicant 259', '7040313159', '21 Jul 1998', '35575069', 'applicant@ibursary.259', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1159', 'Applicant 260', '7040313160', '22 Jul 1998', '35575070', 'applicant@ibursary.260', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1160', 'Applicant 261', '7040313161', '23 Jul 1998', '35575071', 'applicant@ibursary.261', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1161', 'Applicant 262', '7040313162', '24 Jul 1998', '35575072', 'applicant@ibursary.262', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1162', 'Applicant 263', '7040313163', '25 Jul 1998', '35575073', 'applicant@ibursary.263', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1163', 'Applicant 264', '7040313164', '26 Jul 1998', '35575074', 'applicant@ibursary.264', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1164', 'Applicant 265', '7040313165', '27 Jul 1998', '35575075', 'applicant@ibursary.265', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1165', 'Applicant 266', '7040313166', '28 Jul 1998', '35575076', 'applicant@ibursary.266', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1166', 'Applicant 267', '7040313167', '29 Jul 1998', '35575077', 'applicant@ibursary.267', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1167', 'Applicant 268', '7040313168', '13 Jul 1998', '35575078', 'applicant@ibursary.268', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1168', 'Applicant 269', '7040313169', '14 Jul 1998', '35575079', 'applicant@ibursary.269', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1169', 'Applicant 270', '7040313170', '15 Jul 1998', '35575080', 'applicant@ibursary.270', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1170', 'Applicant 271', '7040313171', '16 Jul 1998', '35575081', 'applicant@ibursary.271', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1171', 'Applicant 272', '7040313172', '17 Jul 1998', '35575082', 'applicant@ibursary.272', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1172', 'Applicant 273', '7040313173', '18 Jul 1998', '35575083', 'applicant@ibursary.273', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1173', 'Applicant 274', '7040313174', '19 Jul 1998', '35575084', 'applicant@ibursary.274', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1174', 'Applicant 275', '7040313175', '20 Jul 1998', '35575085', 'applicant@ibursary.275', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1175', 'Applicant 276', '7040313176', '21 Jul 1998', '35575086', 'applicant@ibursary.276', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1176', 'Applicant 277', '7040313177', '22 Jul 1998', '35575087', 'applicant@ibursary.277', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1177', 'Applicant 278', '7040313178', '23 Jul 1998', '35575088', 'applicant@ibursary.278', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1178', 'Applicant 279', '7040313179', '24 Jul 1998', '35575089', 'applicant@ibursary.279', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1179', 'Applicant 280', '7040313180', '25 Jul 1998', '35575090', 'applicant@ibursary.280', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1180', 'Applicant 281', '7040313181', '26 Jul 1998', '35575091', 'applicant@ibursary.281', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1181', 'Applicant 282', '7040313182', '27 Jul 1998', '35575092', 'applicant@ibursary.282', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1182', 'Applicant 283', '7040313183', '28 Jul 1998', '35575093', 'applicant@ibursary.283', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1183', 'Applicant 284', '7040313184', '29 Jul 1998', '35575094', 'applicant@ibursary.284', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1184', 'Applicant 285', '7040313185', '13 Jul 1998', '35575095', 'applicant@ibursary.285', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1185', 'Applicant 286', '7040313186', '14 Jul 1998', '35575096', 'applicant@ibursary.286', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1186', 'Applicant 287', '7040313187', '15 Jul 1998', '35575097', 'applicant@ibursary.287', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1187', 'Applicant 288', '7040313188', '16 Jul 1998', '35575098', 'applicant@ibursary.288', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1188', 'Applicant 289', '7040313189', '17 Jul 1998', '35575099', 'applicant@ibursary.289', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1189', 'Applicant 290', '7040313190', '18 Jul 1998', '35575100', 'applicant@ibursary.290', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1190', 'Applicant 291', '7040313191', '19 Jul 1998', '35575101', 'applicant@ibursary.291', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1191', 'Applicant 292', '7040313192', '20 Jul 1998', '35575102', 'applicant@ibursary.292', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1192', 'Applicant 293', '7040313193', '21 Jul 1998', '35575103', 'applicant@ibursary.293', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1193', 'Applicant 294', '7040313194', '22 Jul 1998', '35575104', 'applicant@ibursary.294', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1194', 'Applicant 295', '7040313195', '23 Jul 1998', '35575105', 'applicant@ibursary.295', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1195', 'Applicant 296', '7040313196', '24 Jul 1998', '35575106', 'applicant@ibursary.296', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1196', 'Applicant 297', '7040313197', '25 Jul 1998', '35575107', 'applicant@ibursary.297', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1197', 'Applicant 298', '7040313198', '26 Jul 1998', '35575108', 'applicant@ibursary.298', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1198', 'Applicant 299', '7040313199', '27 Jul 1998', '35575109', 'applicant@ibursary.299', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1199', 'Applicant 300', '7040313200', '28 Jul 1998', '35575110', 'applicant@ibursary.300', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1200', 'Applicant 301', '7040313201', '29 Jul 1998', '35575111', 'applicant@ibursary.301', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1201', 'Applicant 302', '7040313202', '13 Jul 1998', '35575112', 'applicant@ibursary.302', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1202', 'Applicant 303', '7040313203', '14 Jul 1998', '35575113', 'applicant@ibursary.303', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1203', 'Applicant 304', '7040313204', '15 Jul 1998', '35575114', 'applicant@ibursary.304', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani');
INSERT INTO `iBursary_applicants` (`id`, `name`, `phone`, `dob`, `idno`, `email`, `password`, `sex`, `county`, `sub_county`, `ward`, `sub_location`, `village`) VALUES
('f34d68b28c248d224bf39ba914e71fd6d7a70e1204', 'Applicant 305', '7040313205', '16 Jul 1998', '35575115', 'applicant@ibursary.305', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1205', 'Applicant 306', '7040313206', '17 Jul 1998', '35575116', 'applicant@ibursary.306', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1206', 'Applicant 307', '7040313207', '18 Jul 1998', '35575117', 'applicant@ibursary.307', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1207', 'Applicant 308', '7040313208', '19 Jul 1998', '35575118', 'applicant@ibursary.308', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1208', 'Applicant 309', '7040313209', '20 Jul 1998', '35575119', 'applicant@ibursary.309', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1209', 'Applicant 310', '7040313210', '21 Jul 1998', '35575120', 'applicant@ibursary.310', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1210', 'Applicant 311', '7040313211', '22 Jul 1998', '35575121', 'applicant@ibursary.311', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1211', 'Applicant 312', '7040313212', '23 Jul 1998', '35575122', 'applicant@ibursary.312', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1212', 'Applicant 313', '7040313213', '24 Jul 1998', '35575123', 'applicant@ibursary.313', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1213', 'Applicant 314', '7040313214', '25 Jul 1998', '35575124', 'applicant@ibursary.314', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1214', 'Applicant 315', '7040313215', '26 Jul 1998', '35575125', 'applicant@ibursary.315', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1215', 'Applicant 316', '7040313216', '27 Jul 1998', '35575126', 'applicant@ibursary.316', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1216', 'Applicant 317', '7040313217', '28 Jul 1998', '35575127', 'applicant@ibursary.317', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1217', 'Applicant 318', '7040313218', '29 Jul 1998', '35575128', 'applicant@ibursary.318', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1218', 'Applicant 319', '7040313219', '13 Jul 1998', '35575129', 'applicant@ibursary.319', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1219', 'Applicant 320', '7040313220', '14 Jul 1998', '35575130', 'applicant@ibursary.320', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1220', 'Applicant 321', '7040313221', '15 Jul 1998', '35575131', 'applicant@ibursary.321', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1221', 'Applicant 322', '7040313222', '16 Jul 1998', '35575132', 'applicant@ibursary.322', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1222', 'Applicant 323', '7040313223', '17 Jul 1998', '35575133', 'applicant@ibursary.323', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1223', 'Applicant 324', '7040313224', '18 Jul 1998', '35575134', 'applicant@ibursary.324', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1224', 'Applicant 325', '7040313225', '19 Jul 1998', '35575135', 'applicant@ibursary.325', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1225', 'Applicant 326', '7040313226', '20 Jul 1998', '35575136', 'applicant@ibursary.326', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1226', 'Applicant 327', '7040313227', '21 Jul 1998', '35575137', 'applicant@ibursary.327', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1227', 'Applicant 328', '7040313228', '22 Jul 1998', '35575138', 'applicant@ibursary.328', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1228', 'Applicant 329', '7040313229', '23 Jul 1998', '35575139', 'applicant@ibursary.329', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1229', 'Applicant 330', '7040313230', '24 Jul 1998', '35575140', 'applicant@ibursary.330', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1230', 'Applicant 331', '7040313231', '25 Jul 1998', '35575141', 'applicant@ibursary.331', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1231', 'Applicant 332', '7040313232', '26 Jul 1998', '35575142', 'applicant@ibursary.332', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1232', 'Applicant 333', '7040313233', '27 Jul 1998', '35575143', 'applicant@ibursary.333', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1233', 'Applicant 334', '7040313234', '13 Jul 1998', '35575144', 'applicant@ibursary.334', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1234', 'Applicant 335', '7040313235', '14 Jul 1998', '35575145', 'applicant@ibursary.335', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1235', 'Applicant 336', '7040313236', '15 Jul 1998', '35575146', 'applicant@ibursary.336', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1236', 'Applicant 337', '7040313237', '16 Jul 1998', '35575147', 'applicant@ibursary.337', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1237', 'Applicant 338', '7040313238', '17 Jul 1998', '35575148', 'applicant@ibursary.338', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1238', 'Applicant 339', '7040313239', '18 Jul 1998', '35575149', 'applicant@ibursary.339', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1239', 'Applicant 340', '7040313240', '19 Jul 1998', '35575150', 'applicant@ibursary.340', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1240', 'Applicant 341', '7040313241', '20 Jul 1998', '35575151', 'applicant@ibursary.341', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1241', 'Applicant 342', '7040313242', '21 Jul 1998', '35575152', 'applicant@ibursary.342', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1242', 'Applicant 343', '7040313243', '22 Jul 1998', '35575153', 'applicant@ibursary.343', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1243', 'Applicant 344', '7040313244', '23 Jul 1998', '35575154', 'applicant@ibursary.344', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1244', 'Applicant 345', '7040313245', '24 Jul 1998', '35575155', 'applicant@ibursary.345', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1245', 'Applicant 346', '7040313246', '25 Jul 1998', '35575156', 'applicant@ibursary.346', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1246', 'Applicant 347', '7040313247', '26 Jul 1998', '35575157', 'applicant@ibursary.347', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1247', 'Applicant 348', '7040313248', '27 Jul 1998', '35575158', 'applicant@ibursary.348', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1248', 'Applicant 349', '7040313249', '28 Jul 1998', '35575159', 'applicant@ibursary.349', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e1249', 'Applicant 350', '7040313250', '29 Jul 1998', '35575160', 'applicant@ibursary.350', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni East', 'Kithungo', 'Kithungo', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e900', 'Applicant 001', '7040312901', '13 Jul 1998', '35574811', 'applicant@ibursary.001', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e901', 'Applicant 002', '7040312902', '14 Jul 1998', '35574812', 'applicant@ibursary.002', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e902', 'Applicant 003', '7040312903', '15 Jul 1998', '35574813', 'applicant@ibursary.003', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e903', 'Applicant 004', '7040312904', '16 Jul 1998', '35574814', 'applicant@ibursary.004', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e904', 'Applicant 005', '7040312905', '17 Jul 1998', '35574815', 'applicant@ibursary.005', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e905', 'Applicant 006', '7040312906', '18 Jul 1998', '35574816', 'applicant@ibursary.006', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e906', 'Applicant 007', '7040312907', '19 Jul 1998', '35574817', 'applicant@ibursary.007', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e907', 'Applicant 008', '7040312908', '20 Jul 1998', '35574818', 'applicant@ibursary.008', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e908', 'Applicant 009', '7040312909', '21 Jul 1998', '35574819', 'applicant@ibursary.009', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e909', 'Applicant 010', '7040312910', '22 Jul 1998', '35574820', 'applicant@ibursary.010', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e910', 'Applicant 011', '7040312911', '23 Jul 1998', '35574821', 'applicant@ibursary.011', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e911', 'Applicant 012', '7040312912', '24 Jul 1998', '35574822', 'applicant@ibursary.012', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e912', 'Applicant 013', '7040312913', '25 Jul 1998', '35574823', 'applicant@ibursary.013', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e913', 'Applicant 014', '7040312914', '26 Jul 1998', '35574824', 'applicant@ibursary.014', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e914', 'Applicant 015', '7040312915', '27 Jul 1998', '35574825', 'applicant@ibursary.015', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e915', 'Applicant 016', '7040312916', '28 Jul 1998', '35574826', 'applicant@ibursary.016', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e916', 'Applicant 017', '7040312917', '29 Jul 1998', '35574827', 'applicant@ibursary.017', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e917', 'Applicant 018', '7040312918', '13 Jul 1998', '35574828', 'applicant@ibursary.018', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e918', 'Applicant 019', '7040312919', '14 Jul 1998', '35574829', 'applicant@ibursary.019', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e919', 'Applicant 020', '7040312920', '15 Jul 1998', '35574830', 'applicant@ibursary.020', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e920', 'Applicant 021', '7040312921', '16 Jul 1998', '35574831', 'applicant@ibursary.021', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e921', 'Applicant 022', '7040312922', '17 Jul 1998', '35574832', 'applicant@ibursary.022', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e922', 'Applicant 023', '7040312923', '18 Jul 1998', '35574833', 'applicant@ibursary.023', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e923', 'Applicant 024', '7040312924', '19 Jul 1998', '35574834', 'applicant@ibursary.024', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e924', 'Applicant 025', '7040312925', '20 Jul 1998', '35574835', 'applicant@ibursary.025', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e925', 'Applicant 026', '7040312926', '21 Jul 1998', '35574836', 'applicant@ibursary.026', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e926', 'Applicant 027', '7040312927', '22 Jul 1998', '35574837', 'applicant@ibursary.027', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e927', 'Applicant 028', '7040312928', '23 Jul 1998', '35574838', 'applicant@ibursary.028', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e928', 'Applicant 029', '7040312929', '24 Jul 1998', '35574839', 'applicant@ibursary.029', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e929', 'Applicant 030', '7040312930', '25 Jul 1998', '35574840', 'applicant@ibursary.030', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e930', 'Applicant 031', '7040312931', '26 Jul 1998', '35574841', 'applicant@ibursary.031', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e931', 'Applicant 032', '7040312932', '27 Jul 1998', '35574842', 'applicant@ibursary.032', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e932', 'Applicant 033', '7040312933', '28 Jul 1998', '35574843', 'applicant@ibursary.033', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e933', 'Applicant 034', '7040312934', '29 Jul 1998', '35574844', 'applicant@ibursary.034', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e934', 'Applicant 035', '7040312935', '13 Jul 1998', '35574845', 'applicant@ibursary.035', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e935', 'Applicant 036', '7040312936', '14 Jul 1998', '35574846', 'applicant@ibursary.036', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e936', 'Applicant 037', '7040312937', '15 Jul 1998', '35574847', 'applicant@ibursary.037', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e937', 'Applicant 038', '7040312938', '16 Jul 1998', '35574848', 'applicant@ibursary.038', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e938', 'Applicant 039', '7040312939', '17 Jul 1998', '35574849', 'applicant@ibursary.039', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e939', 'Applicant 040', '7040312940', '18 Jul 1998', '35574850', 'applicant@ibursary.040', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e940', 'Applicant 041', '7040312941', '19 Jul 1998', '35574851', 'applicant@ibursary.041', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e941', 'Applicant 042', '7040312942', '20 Jul 1998', '35574852', 'applicant@ibursary.042', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e942', 'Applicant 043', '7040312943', '21 Jul 1998', '35574853', 'applicant@ibursary.043', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e943', 'Applicant 044', '7040312944', '22 Jul 1998', '35574854', 'applicant@ibursary.044', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e944', 'Applicant 045', '7040312945', '23 Jul 1998', '35574855', 'applicant@ibursary.045', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e945', 'Applicant 046', '7040312946', '24 Jul 1998', '35574856', 'applicant@ibursary.046', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e946', 'Applicant 047', '7040312947', '25 Jul 1998', '35574857', 'applicant@ibursary.047', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e947', 'Applicant 048', '7040312948', '26 Jul 1998', '35574858', 'applicant@ibursary.048', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e948', 'Applicant 049', '7040312949', '27 Jul 1998', '35574859', 'applicant@ibursary.049', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e949', 'Applicant 050', '7040312950', '28 Jul 1998', '35574860', 'applicant@ibursary.050', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e950', 'Applicant 051', '7040312951', '29 Jul 1998', '35574861', 'applicant@ibursary.051', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e951', 'Applicant 052', '7040312952', '13 Jul 1998', '35574862', 'applicant@ibursary.052', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e952', 'Applicant 053', '7040312953', '14 Jul 1998', '35574863', 'applicant@ibursary.053', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e953', 'Applicant 054', '7040312954', '15 Jul 1998', '35574864', 'applicant@ibursary.054', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e954', 'Applicant 055', '7040312955', '16 Jul 1998', '35574865', 'applicant@ibursary.055', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e955', 'Applicant 056', '7040312956', '17 Jul 1998', '35574866', 'applicant@ibursary.056', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e956', 'Applicant 057', '7040312957', '18 Jul 1998', '35574867', 'applicant@ibursary.057', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e957', 'Applicant 058', '7040312958', '19 Jul 1998', '35574868', 'applicant@ibursary.058', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e958', 'Applicant 059', '7040312959', '20 Jul 1998', '35574869', 'applicant@ibursary.059', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e959', 'Applicant 060', '7040312960', '21 Jul 1998', '35574870', 'applicant@ibursary.060', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e960', 'Applicant 061', '7040312961', '22 Jul 1998', '35574871', 'applicant@ibursary.061', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e961', 'Applicant 062', '7040312962', '23 Jul 1998', '35574872', 'applicant@ibursary.062', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e962', 'Applicant 063', '7040312963', '24 Jul 1998', '35574873', 'applicant@ibursary.063', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e963', 'Applicant 064', '7040312964', '25 Jul 1998', '35574874', 'applicant@ibursary.064', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e964', 'Applicant 065', '7040312965', '26 Jul 1998', '35574875', 'applicant@ibursary.065', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e965', 'Applicant 066', '7040312966', '27 Jul 1998', '35574876', 'applicant@ibursary.066', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e966', 'Applicant 067', '7040312967', '28 Jul 1998', '35574877', 'applicant@ibursary.067', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e967', 'Applicant 068', '7040312968', '29 Jul 1998', '35574878', 'applicant@ibursary.068', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e968', 'Applicant 069', '7040312969', '13 Jul 1998', '35574879', 'applicant@ibursary.069', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e969', 'Applicant 070', '7040312970', '13 Jul 1998', '35574880', 'applicant@ibursary.070', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e970', 'Applicant 071', '7040312971', '14 Jul 1998', '35574881', 'applicant@ibursary.071', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e971', 'Applicant 072', '7040312972', '15 Jul 1998', '35574882', 'applicant@ibursary.072', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e972', 'Applicant 073', '7040312973', '16 Jul 1998', '35574883', 'applicant@ibursary.073', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e973', 'Applicant 074', '7040312974', '17 Jul 1998', '35574884', 'applicant@ibursary.074', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e974', 'Applicant 075', '7040312975', '18 Jul 1998', '35574885', 'applicant@ibursary.075', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e975', 'Applicant 076', '7040312976', '19 Jul 1998', '35574886', 'applicant@ibursary.076', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e976', 'Applicant 077', '7040312977', '20 Jul 1998', '35574887', 'applicant@ibursary.077', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e977', 'Applicant 078', '7040312978', '21 Jul 1998', '35574888', 'applicant@ibursary.078', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e978', 'Applicant 079', '7040312979', '22 Jul 1998', '35574889', 'applicant@ibursary.079', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e979', 'Applicant 080', '7040312980', '23 Jul 1998', '35574890', 'applicant@ibursary.080', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e980', 'Applicant 081', '7040312981', '24 Jul 1998', '35574891', 'applicant@ibursary.081', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e981', 'Applicant 082', '7040312982', '25 Jul 1998', '35574892', 'applicant@ibursary.082', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e982', 'Applicant 083', '7040312983', '26 Jul 1998', '35574893', 'applicant@ibursary.083', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e983', 'Applicant 084', '7040312984', '27 Jul 1998', '35574894', 'applicant@ibursary.084', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e984', 'Applicant 085', '7040312985', '28 Jul 1998', '35574895', 'applicant@ibursary.085', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e985', 'Applicant 086', '7040312986', '29 Jul 1998', '35574896', 'applicant@ibursary.086', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e986', 'Applicant 087', '7040312987', '13 Jul 1998', '35574897', 'applicant@ibursary.087', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e987', 'Applicant 088', '7040312988', '14 Jul 1998', '35574898', 'applicant@ibursary.088', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e988', 'Applicant 089', '7040312989', '15 Jul 1998', '35574899', 'applicant@ibursary.089', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e989', 'Applicant 090', '7040312990', '16 Jul 1998', '35574900', 'applicant@ibursary.090', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e990', 'Applicant 091', '7040312991', '17 Jul 1998', '35574901', 'applicant@ibursary.091', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e991', 'Applicant 092', '7040312992', '18 Jul 1998', '35574902', 'applicant@ibursary.092', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e992', 'Applicant 093', '7040312993', '19 Jul 1998', '35574903', 'applicant@ibursary.093', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e993', 'Applicant 094', '7040312994', '20 Jul 1998', '35574904', 'applicant@ibursary.094', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e994', 'Applicant 095', '7040312995', '21 Jul 1998', '35574905', 'applicant@ibursary.095', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e995', 'Applicant 096', '7040312996', '22 Jul 1998', '35574906', 'applicant@ibursary.096', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e996', 'Applicant 097', '7040312997', '23 Jul 1998', '35574907', 'applicant@ibursary.097', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e997', 'Applicant 098', '7040312998', '24 Jul 1998', '35574908', 'applicant@ibursary.098', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e998', 'Applicant 099', '7040312999', '25 Jul 1998', '35574909', 'applicant@ibursary.099', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e999', 'Applicant 100', '7040313000', '26 Jul 1998', '35574910', 'applicant@ibursary.100', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Male', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani'),
('f34d68b28c248d224bf39ba914e71fd6d7a70e9f9d', 'Mart Mbithi', '0704031265', '13 Jul 1998', '35574812', 'martdevelopers254@gmail.com', 'd6dd656eec98d385dfdd9fd93cc48444e2aa0ff9', 'Female', 'Makueni', 'Mbooni West', 'Kyuu', 'Kyuu', 'Mitangani');

-- --------------------------------------------------------

--
-- Table structure for table `iBursary_application`
--

CREATE TABLE `iBursary_application` (
  `id` varchar(200) NOT NULL,
  `applicant_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `id_attachment` longtext NOT NULL,
  `disability` longtext NOT NULL,
  `parent_name` varchar(200) NOT NULL,
  `father_idno` varchar(200) NOT NULL,
  `father_mobile` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `mother_idno` varchar(200) NOT NULL,
  `mother_phone` varchar(200) NOT NULL,
  `gurdian_name` varchar(200) NOT NULL,
  `gurdian_idno` varchar(200) NOT NULL,
  `gurdian_phone` varchar(200) NOT NULL,
  `who_pays_fees` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `po_box` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `sch_email` varchar(200) NOT NULL,
  `year_of_admno` varchar(200) NOT NULL,
  `adm_no` varchar(200) NOT NULL,
  `year_of_study` varchar(200) NOT NULL,
  `school_id_attachment` longtext NOT NULL,
  `school_category` varchar(200) NOT NULL,
  `fee_payable` varchar(200) NOT NULL,
  `fee_paid` varchar(200) NOT NULL,
  `helb_loans` varchar(200) NOT NULL,
  `helb_loans_attachment` varchar(200) NOT NULL,
  `family_status` varchar(200) NOT NULL,
  `family_status_attachments` longtext NOT NULL,
  `main_income_source` varchar(200) NOT NULL,
  `income_per_month` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `recommendation` longblob NOT NULL,
  `chairman_name` varchar(200) NOT NULL,
  `secretary_name` varchar(200) NOT NULL,
  `date_approved` varchar(200) NOT NULL,
  `approval_status` varchar(200) NOT NULL,
  `funds_disbursed` varchar(200) NOT NULL,
  `bursary_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBursary_application`
--

INSERT INTO `iBursary_application` (`id`, `applicant_id`, `name`, `sex`, `dob`, `id_attachment`, `disability`, `parent_name`, `father_idno`, `father_mobile`, `mother_name`, `mother_idno`, `mother_phone`, `gurdian_name`, `gurdian_idno`, `gurdian_phone`, `who_pays_fees`, `school_name`, `po_box`, `tel`, `sch_email`, `year_of_admno`, `adm_no`, `year_of_study`, `school_id_attachment`, `school_category`, `fee_payable`, `fee_paid`, `helb_loans`, `helb_loans_attachment`, `family_status`, `family_status_attachments`, `main_income_source`, `income_per_month`, `bank_name`, `branch`, `account_no`, `recommendation`, `chairman_name`, `secretary_name`, `date_approved`, `approval_status`, `funds_disbursed`, `bursary_code`) VALUES
('38eb5a4f3d34c352234c3a68e6037bb71d047fe4f9', 'f34d68b28c248d224bf39ba914e71fd6d7a70e1005', 'Applicant 106', 'Male', '15 Jul 1998', 'desktop-grub (copy).png', 'N/A', 'James Doe', '781233425', '+987654321', 'Janet Doe', '1234567890', '098765432', 'N/A', 'N/A', 'N/A', 'Father', 'Demo School', '120, Localhost', '+254710020050', 'info@demo.ac.ke', '2019', '12790/90TG', '2ND Year', 'desktop-grub (copy).png', 'College / University', 'Ksh 450,000', 'Ksh 15,000', 'N/A', '', 'Poor Family', '', 'Farming', 'Ksh 1000', 'Equity Bank', 'Machakos', '90-127-90-098782', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2c2071756973206e6f737472756420657865726369746174696f6e20756c6c616d636f206c61626f726973206e69736920757420616c697175697020657820656120636f6d6d6f646f20636f6e7365717561742e2044756973206175746520697275726520646f6c6f7220696e20726570726568656e646572697420696e20766f6c7570746174652076656c697420657373652063696c6c756d20646f6c6f726520657520667567696174206e756c6c612070617269617475722e204578636570746575722073696e74206f6363616563617420637570696461746174206e6f6e2070726f6964656e742c2073756e7420696e2063756c706120717569206f666669636961206465736572756e74206d6f6c6c697420616e696d20696420657374206c61626f72756d2e, 'Mr James F Doe', 'Mrs Janet Doe', '2021-04-07', 'Approved', '17000', 'HVLIB 63820'),
('c990ead5719af874d291b9605ca1ac4016a3512b54', 'f34d68b28c248d224bf39ba914e71fd6d7a70e1000', 'Applicant 101', 'Male', '27 Jul 1998', 'devlan.jpg', 'N/A', 'James Doe', '127001', '0710010010', 'Jane Doe', '127002', '0710010022', 'N/A', 'N/A', 'N/A', 'Father', 'Demo School', '120, Localhost', '+254710020050', 'info@demo.ac.ke', '2019', '12790/90T', '2ND Year', 'devlan (copy).jpg', 'College / University', 'Ksh 450,000', 'Ksh 10,000', 'NO', '', 'Poor Family', '', 'Farming', 'Ksh 2500', 'Equity Bank', 'Machakos', '90-127-90-098782', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2c2071756973206e6f737472756420657865726369746174696f6e20756c6c616d636f206c61626f726973206e6973692075742061, 'Mr James F Doe', 'Mrs Janet Doe', '2021-04-07', 'Approved', '15000', 'HVLIB 63820');

-- --------------------------------------------------------

--
-- Table structure for table `iBursary_bursaries`
--

CREATE TABLE `iBursary_bursaries` (
  `id` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `allocated_funds` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBursary_bursaries`
--

INSERT INTO `iBursary_bursaries` (`id`, `code`, `year`, `allocated_funds`, `status`) VALUES
('c2a39c6ba7a3d940bcd857c9d77be6c1', 'HVLIB 63791', '1991-1992', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c10', 'HVLIB 63800', '1999-2001', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c11', 'HVLIB 63801', '1999-2002', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c12', 'HVLIB 63802', '1999-2003', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c13', 'HVLIB 63803', '1999-2004', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c14', 'HVLIB 63804', '1999-2005', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c15', 'HVLIB 63805', '1999-2006', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c16', 'HVLIB 63806', '1999-2007', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c17', 'HVLIB 63807', '1999-2008', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c18', 'HVLIB 63808', '1999-2009', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c19', 'HVLIB 63809', '1999-2010', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c2', 'HVLIB 63792', '1992-1993', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c20', 'HVLIB 63810', '1999-2011', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c21', 'HVLIB 63811', '1999-2012', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c22', 'HVLIB 63812', '1999-2013', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c23', 'HVLIB 63813', '1999-2014', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c24', 'HVLIB 63814', '1999-2015', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c25', 'HVLIB 63815', '1999-2016', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c26', 'HVLIB 63816', '1999-2017', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c27', 'HVLIB 63817', '1999-2018', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c28', 'HVLIB 63818', '1999-2019', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c29', 'HVLIB 63819', '1999-2020', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c3', 'HVLIB 63793', '1993-1994', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c30', 'HVLIB 63820', '1999-2021', '12000000', 'Open'),
('c2a39c6ba7a3d940bcd857c9d77be6c31', 'HVLIB 63821', '1999-2022', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c32', 'HVLIB 63822', '1999-2023', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c33', 'HVLIB 63823', '1999-2024', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c4', 'HVLIB 63794', '1994-1995', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c5', 'HVLIB 63795', '1995-1996', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c6', 'HVLIB 63796', '1996-1997', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c7', 'HVLIB 63797', '1997-1998', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c8', 'HVLIB 63798', '1998-1999', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c9', 'HVLIB 63799', '1999-2000', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c9000000000', 'HVLIB 63790', '1990-1991', '12000000', 'Closed'),
('c2a39c6ba7a3d940bcd857c9d77be6c974261bac96', 'HVLIB 63741', '2021-2022', '12000000', 'Closed'),
('d657e4e8ddd86d047797b9ca34d84364488daac51f', 'WLMKX 36702', '2021-2022', '350000', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `iBursary_mails`
--

CREATE TABLE `iBursary_mails` (
  `id` int(20) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `sender_email` varchar(200) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `receiver_id` varchar(200) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `receiver_name` varchar(200) NOT NULL,
  `subject` longtext NOT NULL,
  `details` longblob NOT NULL,
  `send_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBursary_mails`
--

INSERT INTO `iBursary_mails` (`id`, `sender_id`, `sender_email`, `sender_name`, `receiver_id`, `receiver_email`, `receiver_name`, `subject`, `details`, `send_on`, `status`) VALUES
(1, 'a69681bcf334ae130217fea4505fd3c994f5683f', 'sysadmin@ibursary.org', 'System Administrator', 'f34d68b28c248d224bf39ba914e71fd6d7a70e900', 'applicant@ibursary.001', 'Applicant 001', 'Test Mail', 0x54686973206973207465737420656d61696c2073656e6420766961206c6f63616c686f73742e, '2021-04-07 10:28:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iBursary_admin`
--
ALTER TABLE `iBursary_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iBursary_applicants`
--
ALTER TABLE `iBursary_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iBursary_application`
--
ALTER TABLE `iBursary_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iBursary_bursaries`
--
ALTER TABLE `iBursary_bursaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iBursary_mails`
--
ALTER TABLE `iBursary_mails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iBursary_mails`
--
ALTER TABLE `iBursary_mails`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
