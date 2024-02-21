-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 19, 2024 at 09:08 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `module7`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `email`, `password`, `pseudo`, `date_creation`) VALUES
(1, 'alice@gmail.com', '123456', 'Alice', '2024-02-14 22:41:50'),
(2, 'bob@yahoo.com', 'abcdef', 'Bob', '2024-02-14 22:41:50'),
(3, 'charlie@outlook.com', 'qwerty', 'Charlie', '2024-02-14 22:41:50'),
(4, 'david@msn.com', 'azerty', 'David', '2024-02-14 22:41:50'),
(5, 'eve@protonmail.com', 'secret', 'Eve', '2024-02-14 22:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `Vehicle`
--

CREATE TABLE `Vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `date_creation` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `on_sale` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Vehicle`
--

INSERT INTO `Vehicle` (`id`, `name`, `model`, `description`, `date_creation`, `image`, `on_sale`) VALUES
(1, 'Tesla Model 3', '2024', 'A sleek and futuristic electric car with a long range and a high performance', '2024-01-15', 'https://hips.hearstapps.com/hmg-prod/images/honda-prelude-concept-front-three-quarters-653927960f1f4.jpg?crop=1.00xw:0.920xh;0,0.0801xh&resize=980:*', 1),
(2, 'Ford Mustang', '1967', 'A classic and iconic muscle car with a powerful V8 engine and a stunning design', '1967-05-23', 'ford_mustang.jpg', 0),
(3, 'Toyota Prius', '2019', 'A reliable and efficient hybrid car with a spacious interior and a low emission', '2019-08-12', 'https://lamag.com/.image/t_share/MTk3NTU2MDU5Mjc0MzU2NDE2/solo-electric-car.jpg', 1),
(4, 'Ferrari 488 Spider', '2021', 'A luxurious and sporty convertible car with a turbocharged V8 engine and a breathtaking speed', '2021-03-07', 'ferrari_488_spider.jpg', 0),
(5, 'Honda Civic', '2020', 'A practical and affordable compact car with a smooth ride and a good safety rating', '2020-10-18', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqPB6vu9dWDgaNMxgsFPjLVVTorDHoUw3gygBEuoQvwCjaCx5cIWHm0QFAcEjtXcEmvL8&usqp=CAU', 1),
(6, 'Tesla Model 3', '2024', 'A sleek and futuristic electric car with a long range and a high performance', '2024-01-15', 'https://media.zigcdn.com/media/model/2021/May/v8_360x240.jpg', 1),
(7, 'Ford Mustang', '1967', 'A classic and iconic muscle car with a powerful V8 engine and a stunning design', '1967-05-23', 'ford_mustang.jpg', 0),
(8, 'Toyota Prius', '2019', 'A reliable and efficient hybrid car with a spacious interior and a low emission', '2019-08-12', 'https://imgd-ct.aeplcdn.com/664x415/n/cw/ec/141125/kwid-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80', 1),
(9, 'Ferrari 488 Spider', '2021', 'A luxurious and sporty convertible car with a turbocharged V8 engine and a breathtaking speed', '2021-03-07', 'ferrari_488_spider.jpg', 0),
(10, 'Honda Civic', '2020', 'A practical and affordable compact car with a smooth ride and a good safety rating', '2020-10-18', 'https://www.motortrend.com/uploads/2022/08/2022-Bugatti-Chiron-Super-Sport-38.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Vehicle`
--
ALTER TABLE `Vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
