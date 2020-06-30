-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2020 at 02:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajerproyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Stuck','In Progress','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `image`, `name`, `address`, `industry`, `email`, `status`) VALUES
('5ef05e9220873', 'default.jpg', 'PT Sejahtera Abadi', 'surabaya', 'Edukasi', 'sejahtera@abadi.com', 'In Progress'),
('5ef05f25d4a7a', 'default.jpg', 'PT. brandon', 'sleman', 'Bisnis', 'brandon@gmail.com', 'Stuck'),
('5ef05fb7c2547', 'default.jpg', 'PT. wardana', 'paris', 'penerbangan', 'wardana@sport.com', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `email_company`
--

CREATE TABLE `email_company` (
  `email_id` int(11) NOT NULL,
  `protocol` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `mailtype` varchar(255) NOT NULL,
  `charset` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_company`
--

INSERT INTO `email_company` (`email_id`, `protocol`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `mailtype`, `charset`, `name`) VALUES
(1, 'smtp', 'ssl://smtp.googlemail.com', 'agungr439@gmail.com', 'muhammad23', 465, 'html', 'utf-8', 'Muhammad Agung Ramadhan');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL,
  `project_started` date NOT NULL,
  `project_ended` date NOT NULL,
  `client_id` varchar(64) DEFAULT NULL,
  `proj_status_id` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `price`, `image`, `description`, `project_started`, `project_ended`, `client_id`, `proj_status_id`) VALUES
('5ef0605b76e49', 'Website E-learning', 120000000, 'default.jpg', 'color base blue', '2020-06-22', '2020-06-26', '5ef05e9220873', '1'),
('5ef060c95a0cd', 'Website profile', 50000000, 'default.jpg', 'colorfull', '2020-06-22', '2020-06-27', '5ef05f25d4a7a', '2'),
('5ef060fce5ea5', 'Website reservasi tiket', 200000000, 'default.jpg', 'simple and fast', '2020-06-22', '2020-06-30', '5ef05fb7c2547', '3'),
('5ef632e707ef9', 'project A', 2000000, 'default.jpg', 'mantep dahh boss', '2020-01-01', '2020-01-10', '5ef05e9220873', '1'),
('5efa1f95466bc', 'project B', 30000000, 'default.jpg', 'mantap pull', '2020-04-08', '2020-04-23', '5ef05f25d4a7a', '1');

-- --------------------------------------------------------

--
-- Table structure for table `proj_status`
--

CREATE TABLE `proj_status` (
  `proj_status_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proj_status`
--

INSERT INTO `proj_status` (`proj_status_id`, `status`) VALUES
('1', 'In Progress'),
('2', 'Stuck'),
('3', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'default.zip',
  `date_uploaded` timestamp NULL DEFAULT NULL,
  `project_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `task_status_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `instruction`, `file`, `date_uploaded`, `project_id`, `task_status_id`, `user_id`) VALUES
('5ef0615570c7a', 'Design', 'pokok beress', 'Website_E-learning-Design-budi_pekerti.zip', '2020-06-30 04:44:00', '5ef0605b76e49', '1', 22),
('5ef0617f8eac5', 'Database', 'ini itu', 'default.zip', NULL, '5ef060fce5ea5', '3', 23),
('5ef06198cc27a', 'Layout', 'pokok beress boss', 'default.zip', '2020-06-29 12:04:43', '5ef060c95a0cd', '2', 22);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `task_status_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`task_status_id`, `status`) VALUES
('1', 'In Progress'),
('2', 'Stuck'),
('3', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('admin','employee','freelance') NOT NULL DEFAULT 'employee',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'dafault.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`) VALUES
(21, 'paijo', '33ca1335e7e0d3fdf92194e62d232b8a8236eb50', 'agungramadhan80@yahoo.com', 'paijo si bejo', '08234738723', 'admin', '2020-06-30 06:52:55', 'paijo_si_bejo.jpg', '2020-06-22 07:20:03'),
(22, 'budi', '83161a62f22277c65a6cdb7ebc314f218c376c63', 'budi@kece.com', 'budi pekerti', '08234738725', 'employee', '2020-06-30 04:43:27', 'budi_pekerti.jpg', '2020-06-22 07:53:58'),
(23, 'karto', '8fdbb3440dc57c09002288f7dfa06a075228b7ed', 'magungramadhan3@gmail.com', 'kartonom', '08234738725', 'freelance', '2020-06-30 04:33:02', 'kartonom.jpg', '2020-06-22 08:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(15, 'agungramadhan80@yahoo.com', 'Ais7ayII0TbYA5i4qbBx3LDkUt014lHvtOHkdDP+GeI=', 1593490296),
(16, 'magungramadhan3@gmail.com', 'yEMxh/Q4lTkHif04zvB/2yqdC3/TBsjQgFPe/KZHUc4=', 1593500961);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `email_company`
--
ALTER TABLE `email_company`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `proj_status_id` (`proj_status_id`);

--
-- Indexes for table `proj_status`
--
ALTER TABLE `proj_status`
  ADD PRIMARY KEY (`proj_status_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `task_status_id` (`task_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`task_status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_company`
--
ALTER TABLE `email_company`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`proj_status_id`) REFERENCES `proj_status` (`proj_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `proj_task` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`task_status_id`) REFERENCES `task_status` (`task_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
