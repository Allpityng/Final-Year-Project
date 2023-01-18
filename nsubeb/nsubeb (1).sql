-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 12:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsubeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'assets/images/avatars/avatar.png',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `avatar`, `password`) VALUES
(1, 'admin', 'admin@nsubeb.com', 'assets/images/avatars/avatar.png', '$2y$10$6Qbj1ahLrX21fjgTfINMRetIcRG9nvHEztXswSj9dPHUZZBciphuy');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `email`, `type`, `datetime`) VALUES
(1, 'mike@gmail.com', 'SignIn', '2023-01-14 22:20:22'),
(2, 'adamufura98@gmail.com', 'SignIn', '2023-01-14 23:16:03'),
(3, 'adamufura98@gmail.com', 'SignOut', '2023-01-14 23:24:14'),
(4, 'abdul@gmail.com', 'SignIn', '2023-01-14 23:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fullnname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message_title` varchar(100) NOT NULL,
  `messaget_content` text NOT NULL,
  `data_time` datetime NOT NULL,
  `is_seen` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fullnname`, `email`, `message_title`, `messaget_content`, `data_time`, `is_seen`) VALUES
(1, 'Adamu Fura Suleiman', 'adamufura98@gmail.com', 'I am suggesting the platform to used in AUK', 'How about this platform is deployed in the entire institution? it will be great for sure. It&#39;s just a suggestion Since it solves problems that affect almost all the faculties.', '2021-12-11 06:53:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(100) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `dept_title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_id`, `dept_title`) VALUES
(1, 'NSUBEB/ADMIN', 'Department of Administration and Supplies'),
(2, 'NSUBEB/FINANCE', 'Department of Finance and Accounts'),
(3, 'NSUBEB/PLANNING', 'Department of Planning, Research & Statistics'),
(4, 'NSUBEB/SCHOOL', 'Department of All School Services'),
(5, 'NSUBEB/QUALITY', 'Department of Quality Assurance'),
(7, 'NSUBEB/MS', 'Computer Services');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'In Review',
  `title` varchar(200) NOT NULL,
  `written_application` text NOT NULL,
  `birth_certificate` text NOT NULL,
  `qualification` text NOT NULL,
  `secondary_certificate` text NOT NULL,
  `primary_certificate` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `email`, `status`, `title`, `written_application`, `birth_certificate`, `qualification`, `secondary_certificate`, `primary_certificate`, `datetime`) VALUES
(1, 'adamufura98@gmail.com', 'Declined', 'Leave For December Holiday and Wedding', '../documents/written_application_1.docx', '../documents/birth_certificate_1.docx', '../documents/qualification_1.docx', '../documents/primary_certificate_1.docx', '../documents/secondary_certificate_1.docx', '2023-01-06 15:34:38'),
(2, 'adamufura98@gmail.com', 'Accepted', 'Leave For Hajj', '../documents/written_application_1.docx', '../documents/birth_certificate_1.docx', '../documents/qualification_1.docx', '../documents/primary_certificate_1.docx', '../documents/secondary_certificate_1.docx', '2023-01-06 15:35:19'),
(3, 'mike@gmail.com', 'Accepted', 'Travel For Vacation', '../documents/written_application_3.jpg', '../documents/birth_certificate_3.jpg', '../documents/qualification_3.jpg', '../documents/primary_certificate_3.jpg', '../documents/secondary_certificate_3.pdf', '2023-01-06 17:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `address` varchar (250) NOT NULL,
  `avatar` varchar(250) NOT NULL DEFAULT 'assets/images/avatars/staff_avatar.png',
  `password` varchar(250) NOT NULL DEFAULT '$2y$10$fcKJs9J8YGn22J0vIreoIeduFadbGn0npKcoOPW9GZuEe2tgqT4nC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `email`, `first_name`, `last_name`, `phone_number`, `dob`, `gender`, `department`, `address`, `avatar`, `password`) VALUES
(4, 'ahmad@gmail.com', 'Ahmad', 'Muhammad', '08123456789', '2023-01-04', 'Male', 'NSUBEB/FINANCE', '', 'assets/images/avatars/staff_avatar.png', '$2y$10$CZ8E3C0gx125Jn6kzl0NVu9zvw5.n0aIxoV25HjE9IdAL1DftECBS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
