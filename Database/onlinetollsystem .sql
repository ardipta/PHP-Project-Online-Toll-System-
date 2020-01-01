-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 12:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinetollsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Toll_ID` varchar(255) NOT NULL,
  `Toll_Location` varchar(255) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `Toll_Fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Toll_ID`, `Toll_Location`, `Vehicle_Type`, `Toll_Fee`) VALUES
(5, 'T-08', 'Rangpur', 'medium', '500'),
(6, 'T-04', 'Mymensingh', 'small', '500'),
(8, 'T-03', 'Gazipur', 'Small', '500'),
(9, 'T-03', 'Comilla', 'Medium', '600');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` int(255) NOT NULL DEFAULT 0,
  `isUser` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `isAdmin`, `isUser`) VALUES
(0, 'a@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1),
(1, 'ardipta82@gmail.com', '9996535e07258a7bbfd8b132435c5962', 0, 1),
(2, 'ashiqur35-2149@diu.edu.bd', '3b712de48137572f3849aabd5666a4e3', 1, 0),
(0, 'd@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 0, 1),
(3, 'dipto33@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1, 1),
(0, 'hh@gmail.com', 'd79c8788088c2193f0244d8f1f36d2db', 0, 1),
(0, 'shammi15@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toll`
--

CREATE TABLE `toll` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Card_Number` varchar(255) NOT NULL,
  `Expire_Date` varchar(255) NOT NULL,
  `CVV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Date_of_Birth` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `NID` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Vehicle_Number` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Gender`, `Date_of_Birth`, `Mobile`, `NID`, `Email`, `Address`, `Vehicle_Number`, `Password`) VALUES
(2, 'AR', '', '', '01981251882', '', 'effat35-2149@diu.edu.bd', '', '', '934b535800b1cba8f96a5d72f72f1611'),
(3, 'Shammi', '', '', '01798569372', '', 'shammi10-1579@diu.edu.bd', '', '', 'b59c67bf196a4758191e42f76670ceba'),
(18, 'Name', '', '', '0188993877', '', 'asr@gmail.com', '', '', '3b712de48137572f3849aabd5666a4e3'),
(19, 'Name', '', '', '0179736278', '', 'effat35-2146@diu.edu.bd', '', '', '3b712de48137572f3849aabd5666a4e3'),
(20, 'Name', '', '', '01984638378', '', 'toma@gmail.com', '', '', 'b59c67bf196a4758191e42f76670ceba'),
(21, 'Name', '', '', '0179873774', '', 'toma@gmail.com', '', '', 'b59c67bf196a4758191e42f76670ceba'),
(22, 'Name', '', '', '01797174800', '', 'ardipta82@gmail.com', '', '', '9996535e07258a7bbfd8b132435c5962'),
(23, 'Name', '', '', '01798569372', '', 'shammi15@gmail.com', '', '', 'b59c67bf196a4758191e42f76670ceba'),
(24, 'ee', '', '', '01994763883', '', 'a@gmail.com', '', '', 'b59c67bf196a4758191e42f76670ceba'),
(25, 'tt', '', '', '02993789', '', 'd@gmail.com', '', '', '4a7d1ed414474e4033ac29ccb8653d9b'),
(26, 'jj', '', '', '09989098', '', 'hh@gmail.com', '', '', 'd79c8788088c2193f0244d8f1f36d2db');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `toll`
--
ALTER TABLE `toll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `toll`
--
ALTER TABLE `toll`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
