--
-- Database: `doc_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_schedule`
--
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `morning_time_start` time DEFAULT NULL,
  `morning_time_end` time DEFAULT NULL,
  `morning_tokens` int(11)  NULL,
  `afternoon_time_start` time DEFAULT NULL,
  `afternoon_time_end` time DEFAULT NULL,
  `afternoon_tokens` int(11)  NULL,
  `evening_time_start` time DEFAULT NULL,
  `evening_time_end` time DEFAULT NULL,
  `evening_tokens` int(11) DEFAULT NULL,
  `times_updated` INT(3) DEFAULT NULL ,
  `day` INT(1) NOT NULL ,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `schedule_map`;
CREATE TABLE IF NOT EXISTS `schedule_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` INT(11) NOT NULL,
  `schedule_id` INT(11) NOT NULL,
  `day` INT(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `schedule_id` (`schedule_id`)
);
-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `appointment_schedule_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE IF NOT EXISTS `booking_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `name`) VALUES
(1, 'Pending for Approval'),
(2, 'Approved & Booked'),
(3, 'Cancelled by User'),
(4, 'Visited'),
(5, 'User failed to Visit');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `is_schedule_set` BOOL NOT NULL ,
  'picture_path' VARCHAR(100) DEFAULT NULL ,
  PRIMARY KEY (`id`),
  KEY `specialization_id` (`specialization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL ,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` VARCHAR(60) DEFAULT NULL ,
  `address` varchar(500) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--
DROP TABLE IF EXISTS `specialization`;
CREATE TABLE IF NOT EXISTS `specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `doctors`
    ADD CONSTRAINT `ea_doctors_ibfk_2` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE 'schedule'
    ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;





