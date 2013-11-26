-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2013 at 11:02 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medimix`
--
CREATE DATABASE IF NOT EXISTS `medimix` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `medimix`;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE `diseases` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_ucreate` varchar(50) NOT NULL,
  `d_dmodify` timestamp NULL DEFAULT NULL,
  `d_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `disease_medicines`
--

DROP TABLE IF EXISTS `disease_medicines`;
CREATE TABLE `disease_medicines` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dm_ucreate` varchar(50) NOT NULL,
  `dm_dmodify` timestamp NULL DEFAULT NULL,
  `dm_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_ucreate` varchar(50) NOT NULL,
  `m_dmodify` timestamp NULL DEFAULT NULL,
  `m_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diseases`
--

DROP TABLE IF EXISTS `patient_diseases`;
CREATE TABLE `patient_diseases` (
  `pu_id` int(11) NOT NULL AUTO_INCREMENT,
  `pu_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pu_ucreate` varchar(50) NOT NULL,
  `pu_dmodify` timestamp NULL DEFAULT NULL,
  `pu_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sideeffects`
--

DROP TABLE IF EXISTS `sideeffects`;
CREATE TABLE `sideeffects` (
  `se_id` int(11) NOT NULL AUTO_INCREMENT,
  `si_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `se_ucreate` varchar(50) NOT NULL,
  `se_dmodify` timestamp NULL DEFAULT NULL,
  `se_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE `suggestions` (
  `su_id` int(11) NOT NULL AUTO_INCREMENT,
  `su_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `su_ucreate` varchar(50) NOT NULL,
  `su_dmodify` timestamp NULL DEFAULT NULL,
  `su_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`su_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `u_ucreate` varchar(50) NOT NULL,
  `u_dmodify` timestamp NULL DEFAULT NULL,
  `u_umodify` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
-- @aftri
--
-- Update structure for table `users`
--

ALTER TABLE  `users` ADD  `u_username` VARCHAR( 50 ) NOT NULL ,
ADD  `u_password` VARCHAR( 255 ) NOT NULL ,
ADD  `u_email` VARCHAR( 200 ) NOT NULL ,
ADD  `u_birthdate` DATE NOT NULL ,
ADD  `u_id_number` VARCHAR( 50 ) NOT NULL ,
ADD  `u_address` VARCHAR( 500 ) NOT NULL ,
ADD  `u_city` VARCHAR( 100 ) NOT NULL ,
ADD  `u_country` VARCHAR( 100 ) NOT NULL ,
ADD  `u_postcode` VARCHAR( 6 ) NOT NULL ,
ADD  `u_type` VARCHAR( 1 ) NOT NULL ,
ADD UNIQUE (
`u_username` ,
`u_email` ,
`u_id_number`
);

-- --------------------------------------------------------
-- @aftri
--
-- Add dummy data table `users`
--

INSERT INTO  `users` (
`u_id` ,
`u_dcreate` ,
`u_ucreate` ,
`u_dmodify` ,
`u_umodify` ,
`u_username` ,
`u_password` ,
`u_email` ,
`u_birthdate` ,
`u_id_number` ,
`u_address` ,
`u_city` ,
`u_country` ,
`u_postcode` ,
`u_type`
)
VALUES (
NULL , 
CURRENT_TIMESTAMP ,  'aftri', NULL , NULL ,  'aftri',  '5f4dcc3b5aa765d61d8327deb882cf99',  'aftrimarriska@gmail.com',  '2013-11-01',  '1234567890',  'Karlskrona',  'Karlskrona',  'Sweden',  '12345',  '0'
);

INSERT INTO  `medimix`.`users` (
`u_id` ,
`u_dcreate` ,
`u_ucreate` ,
`u_dmodify` ,
`u_umodify` ,
`u_username` ,
`u_password` ,
`u_email` ,
`u_birthdate` ,
`u_id_number` ,
`u_address` ,
`u_city` ,
`u_country` ,
`u_postcode` ,
`u_type`
)
VALUES (
NULL , 
CURRENT_TIMESTAMP ,  'aftri', NULL , NULL ,  'magnus',  '5f4dcc3b5aa765d61d8327deb882cf99',  'magnus_email',  '2013-11-01',  '1234567899',  'Karlskrona',  'Karlskrona',  'Sweden',  '12345',  '0'
), (
NULL , 
CURRENT_TIMESTAMP ,  'aftri', NULL , NULL ,  'tingting',  '5f4dcc3b5aa765d61d8327deb882cf99',  'tingting_email',  '2013-11-01',  '1234567898',  'Karlskrona',  'Karlskrona',  'Sweden',  '12345',  '0'
);

INSERT INTO  `medimix`.`users` (
`u_id` ,
`u_dcreate` ,
`u_ucreate` ,
`u_dmodify` ,
`u_umodify` ,
`u_username` ,
`u_password` ,
`u_email` ,
`u_birthdate` ,
`u_id_number` ,
`u_address` ,
`u_city` ,
`u_country` ,
`u_postcode` ,
`u_type`
)
VALUES (
NULL , 
CURRENT_TIMESTAMP ,  'aftri', NULL , NULL ,  'emmanuel',  '5f4dcc3b5aa765d61d8327deb882cf99',  'emmanuel_email',  '2013-11-01',  '1234567897',  'Karlskrona',  'Karlskrona',  'Sweden',  '12345',  '0'
), (
NULL , 
CURRENT_TIMESTAMP ,  'aftri', NULL , NULL ,  'philip',  '5f4dcc3b5aa765d61d8327deb882cf99',  'philip_email',  '2013-11-01',  '1234567896',  'Karlskrona',  'Karlskrona',  'Sweden',  '12345',  '0'
);

-- --------------------------------------------------------
-- @aftri
--
-- Update structure for table `suggestion`
--

ALTER TABLE  `suggestions` ADD  `d_id` INT NOT NULL ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
