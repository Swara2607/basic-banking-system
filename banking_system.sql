-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 11:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `from_user` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`from_user`, `to_user`, `balance`) VALUES
('Avinash', 'Prathamesh', 1100),
('Ajay', 'Nishant', 500),
('Avdhut', 'Rushi', 2200),
('Prathamesh', 'Harshal', 1100),
('Harshal', 'Ravina', 1110),
('Ravina', 'Avinash', 110);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `email`, `balance`) VALUES
('Avinash', 'avinash@gmail.com', 15000),
('Harshal', 'harshal@gmail.com',12000),
('Prathamesh', 'prathamesh@gmail.com', 30000),
('Ajay', 'ajay@gmail.com', 5000),
('Vaishali', 'vaishali@gmail.com', 22000),
('Monika', 'monika@gmail.com', 5000),
('Ravina', 'ravina@gmail.com', 15200),
('Nishant', 'nishanth@gmail.com', 30500),
('Avdhut', 'avdhut@gmail.com', 32000),
('Rushi', 'rushi@gmail.com', 60000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;