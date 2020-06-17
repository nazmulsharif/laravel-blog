-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 04:41 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villagemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `gender` text NOT NULL,
  `age` int(10) NOT NULL,
  `photo` varchar(400) NOT NULL,
  `symptom` varchar(40) NOT NULL,
  `corona` varchar(10) NOT NULL,
  `loc` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `father_name`, `mother_name`, `gender`, `age`, `photo`, `symptom`, `corona`, `loc`, `phone`) VALUES
(25, 'MD. NAZMUL HASAN SHARIF', 'Md.Nazrul Islam', 'Jharna Akter', 'male', 25, '334b2d50e69bacc09738468ae4e25076.png', 'No Symptoms', '0', 'Mazi Bari', '01825690358'),
(26, 'Sanjida Akter', 'Md.Nazrul Islam', 'Jharna Akter', 'female', 20, 'd41d8cd98f00b204e9800998ecf8427e.', 'No Symptoms', '0', 'Mazi Bari', '01834943215'),
(27, 'Tanjina Akter', 'Md.Nazrul Islam', 'Jharna Akter', 'female', 18, 'd41d8cd98f00b204e9800998ecf8427e.', 'No Symptoms', '0', 'Mazi Bari', '01816229131'),
(28, 'NUSRAT JAHAN', 'Nurul Alam', 'Selina Akter', 'female', 26, 'd41d8cd98f00b204e9800998ecf8427e.', 'No Symptoms', '0', 'Mazi Bari', '01303530446'),
(30, 'Taslima Akter', 'Abdur Rob', 'Mrs. Ruby Akter', 'female', 36, 'd41d8cd98f00b204e9800998ecf8427e.', 'Cough', '0', 'Mazi Bari', '01829839789');

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

CREATE TABLE `new_user` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `loc` varchar(30) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`id`, `name`, `phone`, `gender`, `loc`, `photo`, `pass`) VALUES
(15, 'MD. NAZMUL HASAN SHARIF', '01825690358', 'male', 'Mazi Bari', '4efdd2f969559e8b1c92e99f32ded48e.jpg', '123456'),
(18, 'Shakil Ahmed', '01625375931', 'male', 'Mazi Bari', 'bb459642196a1291ec091cea21b3f5d0.png', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_user`
--
ALTER TABLE `new_user`
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
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `new_user`
--
ALTER TABLE `new_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
