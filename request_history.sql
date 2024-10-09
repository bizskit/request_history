-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 09:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `request_history`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสการเรียกดู',
  `user_id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสผู้ใช้',
  `status_name_id` int(2) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสชื่อสถานะ',
  `date_request` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ส่งคำขอ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `user_id`, `status_name_id`, `date_request`) VALUES
(0000004, 0000004, 05, '2024-09-19'),
(0000006, 0000006, 03, '2024-09-19'),
(0000007, 0000007, 05, '2024-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_name_id` int(2) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสชื่อสถานะ',
  `status_name` varchar(255) NOT NULL COMMENT 'ชื่อสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_name_id`, `status_name`) VALUES
(01, 'เสนอหัวหน้าแผนกทะเบียน อนุมัติเอกสาร'),
(02, 'เสนอ ผอ.รพ. อนุมัติเอกสาร'),
(03, 'จัดทำเอกสาร'),
(04, 'แพทย์สรุปประวัติการรักษา'),
(05, 'รับเอกสาร');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสผู้ใช้',
  `cid` varchar(13) NOT NULL COMMENT 'รหัสประชาชน',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อผู้มาขอประวัติ',
  `role` int(1) NOT NULL COMMENT 'สถานะเข้าใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `cid`, `name`, `role`) VALUES
(0000001, 'admin124', 'admin ', 1),
(0000004, '1549900568803', 'นายณัฐวัตร ทนันชัย', 0),
(0000006, '1549900568802', 'นายขยัน อดทน', 0),
(0000007, '1549900568801', 'นางทอง ประกายแสบ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_name_id` (`status_name_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_name_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสการเรียกดู', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_name_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสชื่อสถานะ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`status_name_id`) REFERENCES `status` (`status_name_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
