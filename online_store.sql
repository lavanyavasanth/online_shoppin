-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 11:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `Username`, `Password`, `UserID`) VALUES
(11, 'abc', '$2y$10$oQFuvXuZDDl7R3g2LUCUX.Z19mZmNAw7QWfc3y6lAUVQjecbmElcy', 11),
(12, 'lav', '$2y$10$CvCsDoNuk0HJyBcDIV0ZF.A3EibmtHyKBoFdd7Y1tcB/Q.KLprTiq', 12),
(49, 'jsvnj', '$2y$10$iE7bME.vMvMTuFkXMBep6O6x9LqSlsN43bhYq/9ITq8KQt1950SDq', 49),
(50, '12', '$2y$10$R2xMlvqQWkW5msE7T1iTneYCg/SFWTBhqxQURJMcpKf3MA6RUUTwa', 50),
(51, 'peter', '$2y$10$CKS/BDR9COKj9ISt4Qd6oeWV1IthQnA7M92g2YYkWFuAxe/2MLdPy', 51),
(52, 'smith', '$2y$10$Y9zEiXROfYojWUfsfyOESekZZIIWk1CMGYgrbXo2VSOSM5tZo8/aK', 52),
(53, 'vini', '$2y$10$HL/zQL8oSFanl4o9aCC26OLyIzS1oEfiav1LQ7ApsLdV5JVAaZbEu', 53),
(54, 'vmh', '$2y$10$TE9txAKzsuq7EwyTzgLD0eZrFGEeFD1BtxoIpyA6ehXrAtwgXY7e2', 54),
(55, 'mmm', '$2y$10$0z/x8UCBVVli1eBHMT9LCevARIiGmNxw.Xk/i5ty6YoNifFKaP/pe', 55);

-- --------------------------------------------------------

--
-- Table structure for table `main_cat`
--

CREATE TABLE `main_cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_cat`
--

INSERT INTO `main_cat` (`cat_id`, `cat_name`) VALUES
(39, 'Salwar'),
(40, 'Lehenga'),
(41, 'Saree'),
(42, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `pro_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `cat_id`, `sub_cat_id`, `image`, `description`, `price`, `keyword`, `pro_added_date`) VALUES
(4, 'Bangle', 42, 24, 'acc1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 50, 'stone,bangle', '2018-09-21 02:04:13'),
(5, 'Blue earring ', 42, 42, 'acc3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 60, 'pearl, earring', '2018-09-21 02:04:37'),
(6, 'Pink Lehenga', 40, 40, 'lehenga1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 500, 'pink lehenga, lehenga, bridalwear', '2018-09-21 02:07:28'),
(7, 'Long lehenga', 40, 40, 'lehenga3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 550, 'bridalwear, pink lehenga, long lehenga', '2018-09-21 02:06:38'),
(8, 'Long jacket lehenga', 40, 40, 'lehenga13.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 550, 'black, lehenga,stonework, bridal wear', '2018-09-21 02:06:24'),
(9, 'Jacket lehenga', 40, 40, 'lehenga12.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 350, 'green, lehenga, jacket lehenga', '2018-09-21 02:04:57'),
(10, 'Printed saree', 41, 41, 'saree1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 250, 'printed saree, pista green', '2018-09-21 02:08:40'),
(11, 'Plain saree', 41, 41, 'saree2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 350, 'yellow saree, mirror designer, saree', '2018-09-21 02:08:01'),
(12, 'Plain red saree', 41, 41, 'saree3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 500, 'red saree, stone work, saree', '2018-09-21 02:07:45'),
(13, 'Printed pink saree', 41, 41, 'saree4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 380, 'pink saree, mirror work', '2018-09-21 02:08:21'),
(14, 'Lehenga saree ', 40, 40, 'lehenga7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 500, 'lehenga saree, floral design', '2018-09-21 02:06:04'),
(15, 'White lehenga saree', 40, 40, 'lehenga10.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 350, 'white lehenga, saree', '2018-09-21 02:09:33'),
(16, 'Partywear yellow salwar', 39, 39, 'salwar2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 200, 'salwar, partywear', '2018-09-21 02:07:13'),
(17, 'salwar kameez', 39, 39, 'salwar3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 250, 'salwar, partywear, blue ', '2018-09-21 02:08:56'),
(18, 'orange salwar ', 39, 39, 'salwar5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 200, 'orange, wedding saree', '2018-09-21 02:06:56'),
(19, 'wedding printed saree', 39, 39, 'salwar1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 450, 'printed saree, wedding saree', '2018-09-21 02:09:17'),
(20, 'long stone work saree', 39, 15, 'saree4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1500, 'long ,saree, stone', '2018-09-21 08:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(155) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(15, 'Partywear Salwar', 39),
(16, 'Wedding Salwar', 39),
(17, 'Plain Saree', 41),
(19, 'Lehengas Saree', 41),
(20, 'Printed Saree', 41),
(21, 'Bridal Lehengas', 40),
(22, 'Jacket Lehenga', 40),
(23, 'Footwear', 42),
(24, 'Jewellery', 42);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` enum('User','Admin') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Email`, `Role`) VALUES
(11, 'abc', 'abc', 'abc@abc.com', 'Admin'),
(12, 'lav', 'lav', 'lav@av.com', 'User'),
(49, 'jsk', 'jsvnj', 'jsnj', ''),
(50, '12', 'kmk', 'k@yshoo.com', ''),
(51, 'peter', 'david', 'peter@david.com', 'User'),
(52, 'smith', 'john', 'smith@smith.com', 'Admin'),
(53, 'kjhkhh', '14', 'b@b.com', 'Admin'),
(54, 'mjbm', 'hjh', 'jhghj', ''),
(55, 'mmm', 'mmm', 'mmm@yahoo.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `main_cat`
--
ALTER TABLE `main_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `main_cat`
--
ALTER TABLE `main_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `main_cat` (`cat_id`);

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `sub_cat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `main_cat` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
