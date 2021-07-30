-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 02:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `student_regno` varchar(16) NOT NULL,
  `kin_id` int(11) NOT NULL,
  `insurance_status` varchar(3) NOT NULL,
  `insurance_proof` text NOT NULL,
  `disability_status` varchar(3) NOT NULL,
  `disability_proof` text DEFAULT NULL,
  `explanation_disability` varchar(255) NOT NULL,
  `declaration` varchar(4) NOT NULL,
  `selected` varchar(15) NOT NULL DEFAULT 'unselected',
  `payment` varchar(15) NOT NULL DEFAULT 'unpaid',
  `when_applied` datetime DEFAULT current_timestamp(),
  `hostel_approval` varchar(100) NOT NULL,
  `payment_approval` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `student_regno`, `kin_id`, `insurance_status`, `insurance_proof`, `disability_status`, `disability_proof`, `explanation_disability`, `declaration`, `selected`, `payment`, `when_applied`, `hostel_approval`, `payment_approval`) VALUES
(39, 'imc/bcs/18/96208', 1, 'No', '5dab6bb2260935.51215672.jpg', 'No', '----------', '----------', 'Yes', 'selected', 'paid', '2019-10-19 23:01:54', 'warden', 'warden'),
(43, 'IMC/BBF/18/86208', 4, 'Yes', '5dac571f6e4812.66468006.jpg', 'Yes', '5dac571f6ded21.22441676.jpg', 'i got an accident', 'Yes', 'selected', 'paid', '2019-10-20 15:46:23', 'warden', 'warden'),
(44, 'imc/bcs/18/98070', 13, 'Yes', '5e5d400778bcd3.16982239.jpeg', 'No', '----------', '----------', 'Yes', 'selected', 'paid', '2020-03-02 20:19:03', 'warden', 'warden'),
(45, 'imc/bcs/18/98081', 2, 'No', '5e5e0b22771181.39006297.jpeg', 'No', '----------', '----------', 'Yes', 'selected', 'paid', '2020-03-03 10:45:38', 'warden', 'warden'),
(46, 'IMC/BCS/18/97731', 3, 'No', '5e5e0c0dece2d2.06059617.jpeg', 'No', '----------', '----------', 'Yes', 'selected', 'paid', '2020-03-03 10:49:33', 'warden', 'warden'),
(47, 'iMC/BCS/18/98043', 12, 'No', '5e5e0e8e060966.41697370.jpeg', 'No', '----------', '----------', 'Yes', 'selected', 'paid', '2020-03-03 11:00:14', 'warden', 'warden');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `block_name` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `block_name`) VALUES
(1, 'C'),
(2, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `hostelers`
--

CREATE TABLE `hostelers` (
  `id` int(11) NOT NULL,
  `student_regno` varchar(16) NOT NULL,
  `block_name` varchar(1) NOT NULL,
  `room_number` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kins`
--

CREATE TABLE `kins` (
  `id` int(11) NOT NULL,
  `firstKin_name` varchar(100) NOT NULL,
  `firstKin_relationship` varchar(50) NOT NULL,
  `firstKin_region` varchar(50) NOT NULL,
  `firstKin_district` varchar(50) NOT NULL,
  `firstKin_ward` varchar(50) NOT NULL,
  `firstKin_street` varchar(50) NOT NULL,
  `firstKin_occupation` varchar(50) NOT NULL,
  `firstKin_mobile` varchar(10) NOT NULL,
  `firstKin_email` varchar(50) DEFAULT NULL,
  `firstKin_postal_address` text NOT NULL,
  `secondKin_name` varchar(100) NOT NULL,
  `secondKin_relationship` varchar(50) NOT NULL,
  `secondKin_region` varchar(50) NOT NULL,
  `secondKin_district` varchar(50) NOT NULL,
  `secondKin_ward` varchar(50) NOT NULL,
  `secondKin_street` varchar(50) NOT NULL,
  `secondKin_occupation` varchar(50) NOT NULL,
  `secondKin_mobile` varchar(10) NOT NULL,
  `secondKin_email` varchar(50) DEFAULT NULL,
  `secondKin_postal_address` text NOT NULL,
  `student_regno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kins`
--

INSERT INTO `kins` (`id`, `firstKin_name`, `firstKin_relationship`, `firstKin_region`, `firstKin_district`, `firstKin_ward`, `firstKin_street`, `firstKin_occupation`, `firstKin_mobile`, `firstKin_email`, `firstKin_postal_address`, `secondKin_name`, `secondKin_relationship`, `secondKin_region`, `secondKin_district`, `secondKin_ward`, `secondKin_street`, `secondKin_occupation`, `secondKin_mobile`, `secondKin_email`, `secondKin_postal_address`, `student_regno`) VALUES
(1, 'juvenary jacob', 'father', 'kagera', 'bukoba urban', 'hamugembe', 'kashabo', 'peasant', '0655066097', 'juvenaryjacob@gmail.com', 'box 182 Bukoba', 'zerida juvenary', 'mother', 'kagera', 'bukoba urban', 'hamugembe', 'kashabo', 'peasant', '0759166097', 'zeridanyakato@gmail.com', 'box 182 Bukoba', 'IMC/BCS/18/96208'),
(2, 'Selemani', 'Father', 'Dar es Salaam', 'kinondoni', 'mwanyamala', 'mahakamani', 'peasant', '0715497037', 'razackmani@gmail.com', 'box 1900 kinondoni', 'Awadhi', 'Brother', 'Dar es Salaam', 'Kinondoni', 'Mwananyamala', 'Mahakamani', 'peasant', '0742612342', 'itundu@gmail.com', 'box 1900 kinondoni', 'IMC/BCS/18/98081'),
(3, 'Mwajuma Juma', 'Sister', 'Dar Es Salaam', 'Ubungo', 'mbezi', 'mbezi', 'Engineer', '0713612736', 'mwashari629@gmail.com', 'box 30138 kibaha', 'Ali Sharifu', 'Brother', 'Pwani', 'bagamoyo', 'Dunda', 'toptop', 'business', '0713705258', 'hamisishari@gmail.com', 'box 30138 kibaha', 'IMC/BCS/18/97731'),
(4, 'Kahindowa', 'father', 'Kagera', 'misenyi', 'ishozi', 'mkimala', 'peasant', '0759166097', NULL, '', 'Zeuria Nyangoma ', 'SIster', 'kagera', 'bukoba', 'kyakairabwa', 'kyakairabwa', 'peasant', '0655066097', NULL, '', 'IMC/BBF/18/86208'),
(12, 'John Chacha', 'father', 'mwanza', 'nyamagana', 'nyamagana', 'igoma', 'peasant', '0755108166', 'jchacha@gmail.com', '', 'juli', 'brother', 'mwanza', 'nyamagana', 'nyamagana', 'igoma', 'peasant', '0755108568', 'jui@gmail.com', '', 'IMC/BCS/18/98043'),
(13, 'malecha mrema', 'brother', 'Dar es salaam', 'ilala', 'ilala', 'gongo', 'banker', '0788908745', 'malecha@gmail.com', '', 'neema malecha', 'sister', 'Dar es salaam', 'ilala', 'ilala', 'gongo', 'Teacher', '0656667788', 'neema@gmail.com', '', 'IMC/BCS/18/98070');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `regno` varchar(16) NOT NULL,
  `active` varchar(3) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `regno`, `active`, `password`) VALUES
(1, 'imc/bcs/18/96208', 'yes', '$2y$10$.2cadQRezLqWzHcks3f56u7s6BUvrf8.HyC0F3pgT9.WHJjhfAio2'),
(2, 'imc/bcs/18/97731', 'yes', '$2y$10$k7d0q2b/DR.jrMmAI1l3m.CXviwhxDs4GMdL4hO1yzbipYRC1M1Va'),
(4, 'imc/bcs/18/98081', 'yes', '$2y$10$oTjjwQhgK0mNRNiNhbVM3e/WvooHkszWrIMYrn9dKxYc7QjB2ddxG'),
(6, 'IMC/BBF/18/86208', 'yes', '$2y$10$DFPIh.oUpzn7aAdIY7coLOch3sbf0dpwV/lnrK1GtSBEFQzASjo3y'),
(9, 'imc/bcs/18/98070', 'yes', '$2y$10$UQXAm0lTCxSzqmlmfw.mjO9LDMajHYUpWXXE5IeG4mWdplYVqP1.S'),
(10, 'iMC/BCS/18/98043', 'yes', '$2y$10$Rh7ZOFqCwY/52BGLLq3CG.XI5SNHzA3mOvqMhodsiBihRMOppeZrq');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(5) NOT NULL,
  `number_of_beds` int(11) NOT NULL DEFAULT 4,
  `block_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `number_of_beds`, `block_id`) VALUES
(1, '101', 4, 1),
(2, '101', 4, 2),
(3, '102', 4, 2),
(4, '102', 4, 1),
(5, '002', 4, 1),
(6, '002', 4, 2),
(7, '003', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `regno` varchar(16) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`regno`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `place_of_birth`, `physical_address`, `nationality`, `marital_status`, `mobile`, `email`, `sponsor`, `course`) VALUES
('IMC/BBF/18/86208', 'Zerida', 'Nyakato', 'Kahindowa', 'female', '1996-06-09', 'Bukoba', 'Bukoba ', 'Tanzanian', 'Single', '0759166097', 'zeridanyakato@gmail.com', 'Government', 'Bachelor in Banking and FInance'),
('IMC/BCS/18/96208', 'johnson', 'juvenary', 'jacob', 'male', '1996-06-09', 'Bukoba', 'kinondoni', 'tanzanian', 'single', '0769335532', 'johnsonthunderboy@gmail.com', 'private', 'Bachelor in Computer Science'),
('IMC/BCS/18/97731', 'Hamisi', 'Sharif', 'Juma', 'Male', '1994-05-04', 'Bagamoyo', 'Mbezi', 'Tanzanian', 'Single', '0656674004', 'hamisishari@gmail.com', 'Private', 'Bachelor in Computer Science'),
('IMC/BCS/18/98043', 'Julius', 'M', 'Chacha', 'male', '1996-10-25', 'mwanza', 'mwanza', 'tanzanian', 'single', '0755108569', 'jjohn9377@gmail.com', 'private', 'bachelor in computer science'),
('IMC/BCS/18/98070', 'Alex', 'Fransi', 'Mrema', 'male', '1997-07-02', 'Dar es salaam', 'Gongolamboto', 'Tanzania', 'single', '0657458535', 'alexismalecha@gmail.com', 'helsb', 'bachelor in computer science'),
('IMC/BCS/18/98081', 'Abdulrazack', NULL, 'Selemani', 'male', '2019-09-02', 'kinondoni', 'Kinondoni', 'Tanzanian', 'single', '0715497037', 'razackmani@gmail.com', 'private', 'Bachelor in Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`id`, `name`, `password`) VALUES
(1, 'warden', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `student_regno` (`student_regno`),
  ADD KEY `kin_id` (`kin_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `block_name` (`block_name`);

--
-- Indexes for table `hostelers`
--
ALTER TABLE `hostelers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_regno` (`student_regno`);

--
-- Indexes for table `kins`
--
ALTER TABLE `kins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `firstKin_mobile` (`firstKin_mobile`),
  ADD UNIQUE KEY `secondKin_mobile` (`secondKin_mobile`),
  ADD UNIQUE KEY `student_regno` (`student_regno`),
  ADD UNIQUE KEY `firstKin_email` (`firstKin_email`),
  ADD UNIQUE KEY `secondKin_email` (`secondKin_email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regno` (`regno`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_id` (`block_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`regno`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hostelers`
--
ALTER TABLE `hostelers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kins`
--
ALTER TABLE `kins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`student_regno`) REFERENCES `students` (`regno`),
  ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`kin_id`) REFERENCES `kins` (`id`);

--
-- Constraints for table `hostelers`
--
ALTER TABLE `hostelers`
  ADD CONSTRAINT `hostelers_ibfk_2` FOREIGN KEY (`student_regno`) REFERENCES `students` (`regno`);

--
-- Constraints for table `kins`
--
ALTER TABLE `kins`
  ADD CONSTRAINT `kins_ibfk_1` FOREIGN KEY (`student_regno`) REFERENCES `students` (`regno`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`regno`) REFERENCES `students` (`regno`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
