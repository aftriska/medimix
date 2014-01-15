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

-- --------------------------------------------------------
-- @aftri 2013/12/16 10:51
--
-- Add first_name and last_name to table `users`
-- Update data on table `users`
-- Update structure for table `suggestion`
-- Add data to table `suggestion`

ALTER TABLE `users` ADD `u_gender` VARCHAR( 1 ) NOT NULL AFTER `u_birthdate` ;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_gender` = 'F' WHERE `users`.`u_id` =1;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_gender` = 'M' WHERE `users`.`u_id` =2;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_gender` = 'F' WHERE `users`.`u_id` =3;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_gender` = 'M' WHERE `users`.`u_id` =4;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_gender` = 'M' WHERE `users`.`u_id` =5;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_email` = 'aftri@gmail.com' WHERE `users`.`u_id` =1;

ALTER TABLE `users` ADD `u_first_name` VARCHAR( 100 ) NOT NULL AFTER `u_password` ,
ADD `u_last_name` VARCHAR( 100 ) NOT NULL AFTER `u_first_name` ;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_first_name` = 'aftri',
`u_last_name` = 'marriska' WHERE `users`.`u_id` =1;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_first_name` = 'magnus',
`u_last_name` = 'dannemyr' WHERE `users`.`u_id` =2;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_first_name` = 'tingting',
`u_last_name` = 'liu' WHERE `users`.`u_id` =3;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_first_name` = 'emmanuel',
`u_last_name` = 'perez' WHERE `users`.`u_id` =4;

UPDATE `medimix`.`users` SET `u_dmodify` = NULL ,
`u_first_name` = 'philip',
`u_last_name` = 'opougen' WHERE `users`.`u_id` =5;

DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE `suggestions` (
  `su_id` int(11) NOT NULL AUTO_INCREMENT,
  `su_dcreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `su_ucreate` varchar(50) NOT NULL,
  `su_dmodify` timestamp NULL DEFAULT NULL,
  `su_umodify` varchar(50) DEFAULT NULL,
  `disease` int(11) NOT NULL,
  `side_effect` varchar(500) NOT NULL,
  `suggestion` text NOT NULL,
  PRIMARY KEY (`su_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user''s information' AUTO_INCREMENT=1 ;

ALTER TABLE `suggestions` CHANGE `disease` `disease` VARCHAR( 200 ) NOT NULL ;

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_1', 'side_effect_1', 'suggestion_1_1');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_1', 'side_effect_2', 'suggestion_1_2');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_1', 'side_effect_3', 'suggestion_1_3');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_2', 'side_effect_1', 'suggestion_2_1');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_2', 'side_effect_2', 'suggestion_2_2');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_2', 'side_effect_3', 'suggestion_2_3');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_3', 'side_effect_1', 'suggestion_3_1');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_3', 'side_effect_2', 'suggestion_3_2');

INSERT INTO `medimix`.`suggestions` (`su_id`, `su_dcreate`, `su_ucreate`, `su_dmodify`, `su_umodify`, `disease`, `side_effect`, `suggestion`) VALUES (NULL, CURRENT_TIMESTAMP, 'medimix_trial', NULL, NULL, 'disease_3', 'side_effect_3', 'suggestion_3_3');

-- --------------------------------------------------------
-- @aftri 2014/01/13 18:35
--
-- Update database for iteration 2

ALTER TABLE `diseases` ADD `d_name` TEXT NOT NULL ,
ADD `d_symptom` TEXT NOT NULL ;

ALTER TABLE `patient_diseases` ADD `u_id` INT NOT NULL ,
ADD `d_id` INT NOT NULL ,
ADD `pu_diagnose_date` DATE NOT NULL ,
ADD `pu_recover_date` DATE NULL ;

INSERT INTO `medimix`.`diseases` (`d_id`, `d_dcreate`, `d_ucreate`, `d_dmodify`, `d_umodify`, `d_name`, `d_symptom`) VALUES (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'disease 1', 'symptom for disease 1'), (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'disease 1', 'symptom for disease 1');

INSERT INTO `medimix`.`diseases` (`d_id`, `d_dcreate`, `d_ucreate`, `d_dmodify`, `d_umodify`, `d_name`, `d_symptom`) VALUES (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'disease 3', 'symptom for disease 3'), (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'disease 4', 'symptom for disease 4');

ALTER TABLE `medicines` ADD `m_name` TEXT NOT NULL ,
ADD `m_description` TEXT NOT NULL ;

ALTER TABLE `disease_medicines` ADD `u_id` INT NOT NULL ,
ADD `d_id` INT NOT NULL ,
ADD `m_id` INT NOT NULL ,
ADD `dm_prescribed` VARCHAR( 1 ) NOT NULL ,
ADD `dm_dose` TEXT NOT NULL ,
ADD `dm_start_using` DATE NOT NULL ,
ADD `dm_finish_using` DATE NOT NULL ;

INSERT INTO `medimix`.`medicines` (`m_id`, `m_dcreate`, `m_ucreate`, `m_dmodify`, `m_umodify`, `m_name`, `m_description`) VALUES (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'medicine 1', 'description of medicine 1'), (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'medicine 2','description of medicine 2');

INSERT INTO `medimix`.`medicines` (`m_id`, `m_dcreate`, `m_ucreate`, `m_dmodify`, `m_umodify`, `m_name`, `m_description`) VALUES (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'medicine 3', 'description of medicine 3'), (NULL, CURRENT_TIMESTAMP, 'system', NULL, NULL, 'medicine 4', 'description of medicine 4');

ALTER TABLE `sideeffects` ADD `se_name` TEXT NOT NULL ,
ADD `se_description` TEXT NOT NULL ;

ALTER TABLE `sideeffects` CHANGE `si_dcreate` `se_dcreate` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE `sideeffects` ADD `u_id` INT NOT NULL AFTER `se_umodify` ;

ALTER TABLE `disease_medicines` ADD `deleted_by_user` VARCHAR( 1 ) NOT NULL ;

ALTER TABLE `patient_diseases` ADD `deleted_by_user` VARCHAR( 1 ) NOT NULL ;

ALTER TABLE `sideeffects` ADD `deleted_by_user` VARCHAR( 1 ) NOT NULL ;

-- ============= update end =============


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
