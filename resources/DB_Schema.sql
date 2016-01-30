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
  `morning_shift_start` time DEFAULT NULL,
  `morning_shift_end` time DEFAULT NULL,
  `morning_tokens` int(11)  NULL,
  `afternoon_shift_start` time DEFAULT NULL,
  `afternoon_shift_end` time DEFAULT NULL,
  `afternoon_tokens` int(11)  NULL,
  `evening_shift_start` time DEFAULT NULL,
  `evening_shift_end` time DEFAULT NULL,
  `evening_tokens` int(11) DEFAULT NULL,
  `times_updated` INT(3) DEFAULT NULL ,
  `day` INT NOT NULL ,
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
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requested_by` VARCHAR(30) NOT NULL ,
  `appointment_date` INT UNSIGNED NOT NULL ,
  `date_registered` INT UNSIGNED NOT NULL ,
  `day` INT,
  `description` text NOT NULL,
  `time_start` VARCHAR(4) NOT NULL,
  `time_end` VARCHAR(4) NOT NULL,
  `approved` BOOL DEFAULT NULL ,
  `user_notified` BOOL DEFAULT FALSE , -- FALSE not notified TRUE notified
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
INSERT INTO `appointments` (doctor_id, user_id, requested_by, day, appointment_date, date_registered, description, time_start, time_end) VALUES (1, 1, "Sanjib", 1, 20151223, 20061124, "Doctor I have been diagnozed with HIV Positive","10:30","12:30");


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
  `login_id` INT(11) NOT NULL ,
  `name` varchar(50) NOT NULL,
  `specialities` VARCHAR(100) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `hospital` VARCHAR(50) NOT NULL ,
  `address` varchar(1000) NOT NULL,
  `contact_number` VARCHAR(13) DEFAULT NULL ,
  `qualification` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `is_schedule_set` BOOL NOT NULL ,
  'profile_picture' VARCHAR(100) DEFAULT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO doctors (name,login_id,specialities,clinic_name,address,qualification) VALUES ("sanjib",1,"neurology","Sanjib's Clinic","28 kilo Dhulikhel","MD");

-- --------------------------------------------------------
DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` INT(11) NOT NULL ,
  `name` VARCHAR(30) NOT NULL ,
  `specialities` VARCHAR(100),
  `address` VARCHAR(60),
  `contact_number` VARCHAR(14),
  `ambulance_number` VARCHAR(14),
  `opening_hours` VARCHAR(20),
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE hospitals ADD CONSTRAINT `hospital_login` FOREIGN KEY (`login_id`) REFERENCES `login`(`id`) ON DELETE CASCADE ON UPDATE CASCADE ;

INSERT INTO hospitals (login_id, name, specialities, address, contact_number, ambulance_number, opening_hours) VALUE (2, "KU Hospital", "General", "Dhulikhel", "01485784","011234573", "24-hours" );


--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` INT(11) NOT NULL ,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` VARCHAR(60) DEFAULT NULL ,
  `address` varchar(500) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` INT(11) NOT NULL  AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `account` VARCHAR(8),
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

ALTER TABLE `doctors`
    ADD CONSTRAINT `doctor_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `users`
ADD CONSTRAINT `user_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE 'schedule'
    ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;



----------------------------------------
-- Dummy Data
----------------------------------------
INSERT INTO users (username, first_name, last_name, email, address, contact_number) VALUES ("dinesh","dinesh", "neupane","dinesh@gmail.com","Dhulikhel","9849022387");
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,1);
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,2);
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,3);
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,4);
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,5);
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,6);
INSERT INTO `schedule` (doctor_id, morning_shift_start, morning_shift_end, afternoon_shift_start, afternoon_shift_end, evening_shift_start, evening_shift_end, day)
VALUES (1,101200,121200,011200,031200,071200,101200,7);
