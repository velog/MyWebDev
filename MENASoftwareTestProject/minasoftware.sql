-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minasoftware`
--
CREATE DATABASE IF NOT EXISTS `minasoftware` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `minasoftware`;

-- --------------------------------------------------------

--
-- Структура на таблица `cpu`
--

CREATE TABLE IF NOT EXISTS `cpu` (
  `cpu_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpu_name` varchar(60) NOT NULL,
  `cpu_price` double NOT NULL,
  `cpu_quantity` int(11) NOT NULL,
  PRIMARY KEY (`cpu_id`),
  UNIQUE KEY `cpu_id` (`cpu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `cpu`
--

INSERT INTO `cpu` (`cpu_id`, `cpu_name`, `cpu_price`, `cpu_quantity`) VALUES
(1, 'Intel i7', 99.99, 3),
(2, 'Intel i5', 88.99, 5),
(3, 'Intel i3', 79.99, 10);

-- --------------------------------------------------------

--
-- Структура на таблица `gpu`
--

CREATE TABLE IF NOT EXISTS `gpu` (
  `gpu_id` int(11) NOT NULL AUTO_INCREMENT,
  `gpu_name` varchar(60) NOT NULL,
  `gpu_price` double NOT NULL,
  `gpu_quantity` int(11) NOT NULL,
  PRIMARY KEY (`gpu_id`),
  UNIQUE KEY `gpu_id` (`gpu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `gpu`
--

INSERT INTO `gpu` (`gpu_id`, `gpu_name`, `gpu_price`, `gpu_quantity`) VALUES
(1, 'NVIDIA GTX 970', 199.99, 30),
(2, 'NVIDIA GTX 980', 299.99, 30),
(3, 'NVIDIA GTX 990', 499.99, 10);

-- --------------------------------------------------------

--
-- Структура на таблица `ram`
--

CREATE TABLE IF NOT EXISTS `ram` (
  `ram_id` int(11) NOT NULL AUTO_INCREMENT,
  `ram_name` varchar(60) NOT NULL,
  `ram_price` double NOT NULL,
  `ram_quantity` int(11) NOT NULL,
  PRIMARY KEY (`ram_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `ram`
--

INSERT INTO `ram` (`ram_id`, `ram_name`, `ram_price`, `ram_quantity`) VALUES
(1, 'Kingstone 2 GB', 22.99, 10),
(2, 'Kingstone 4 GB', 42.99, 15),
(3, 'Kingstone 8 GB', 62.99, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
