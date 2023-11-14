-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2022 at 04:59 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `orderName` varchar(250) NOT NULL,
  `quantity` int(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Path` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Email`, `Name`, `Price`, `Path`) VALUES
(1, 'chivinodya12@gmail.com\r\n', 'Espresso', 'Rs.400', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\espresso.jpg\"'),
(2, 'chivinodya12@gmail.com\r\n', 'Latte', 'Rs.600', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\latte.jpg\"'),
(3, 'chivinodya12@gmail.com\r\n', 'Cappuccino', 'Rs.530', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\cappuccino.jpg\"'),
(4, 'chivinodya12@gmail.com\r\n', 'Mocha', 'Rs.850', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\mocha.png\"'),
(5, 'chivinodya12@gmail.com\r\n', 'Iced Americano', 'Rs.500', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\iced americano.jpg\"'),
(6, 'chivinodya12@gmail.com', 'Macchiato', 'Rs.650', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\macchiato.jpg\"'),
(7, 'chivinodya12@gmail.com', 'Love You Coffee', 'Rs.350', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\love you coffee.jpg\"'),
(8, 'chivinodya12@gmail.com', 'Black Coffee', 'Rs.400', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\black coffee.jpg\"'),
(9, 'chivinodya12@gmail.com', 'Affogato', 'Rs.650', '\"C:\\Users\\CHIRANJI\\OneDrive\\Desktop\\CoffeeExpress\\Images\\affogato.jpg\"');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Uname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Utype` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Uname`, `Email`, `Phone`, `Password`, `Utype`) VALUES
(1, 'admin', 'admin@gmail.com', '0711234567', '12345', 'admin'),
(2, 'chiranji', 'chivinodya12@gmail.com', '0719143846', '123', 'customer'),
(3, 'dfs', 'aaa@gmail.com', '0719143846', '11111', 'customer'),
(4, 'dfs', 'aaa@gmail.com', '0719143846', '11111', 'customer'),
(5, 'asdasdas', 'bbb@gmail.com', '0719143846', 'aaaaa', 'customer'),
(6, 'admin', 'admin@gmail.com', '0711234567', '12345', 'customer'),
(7, 'chiranji', 'chivinodya12@gmail.com', '0719143846', '123', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
