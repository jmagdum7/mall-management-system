-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 07:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mall`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_id` (IN `dept` VARCHAR(20), OUT `genid` INT)  BEGIN SELECT COUNT(store_id) INTO genid from employee_details JOIN (SELECT id from stores WHERE department = dept)st ON employee_details.store_id=st.id; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_manager` (IN `strname` VARCHAR(20), OUT `fullname` VARCHAR(50))  NO SQL
BEGIN
	SELECT concat(fname,' ',mname,' ',lname) INTO fullname FROM employee_details WHERE id = (SELECT manager_id FROM stores WHERE name=strname);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `product_id` int(11) NOT NULL COMMENT 'foreign key',
  `store_id` int(11) NOT NULL COMMENT 'foreign key',
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`product_id`, `store_id`, `price`, `stock`) VALUES
(1, 1, 1000, 247),
(1, 2, 1200, 225),
(1, 4, 1800, 750),
(1, 5, 1900, 600),
(1, 6, 1450, 548),
(1, 7, 1650, 550),
(2, 1, 1400, 300),
(2, 3, 2400, 150),
(2, 5, 900, 500),
(2, 6, 1450, 548),
(2, 7, 1400, 500),
(3, 1, 2200, 598),
(3, 5, 2100, 650),
(3, 6, 1400, 555),
(3, 7, 955, 655),
(4, 1, 1300, 548),
(4, 4, 1700, 700),
(4, 5, 2900, 800),
(4, 6, 2250, 750),
(4, 7, 650, 900),
(5, 1, 700, 947),
(5, 3, 2000, 350),
(5, 5, 1500, 550),
(6, 1, 1450, 470),
(6, 2, 1800, 100),
(6, 3, 2100, 150),
(6, 4, 1100, 547),
(6, 5, 1750, 730),
(7, 2, 1800, 100),
(7, 3, 2000, 50),
(7, 7, 2100, 800),
(8, 2, 1800, 100),
(8, 3, 2000, 50),
(8, 4, 1100, 350),
(8, 5, 1450, 950),
(8, 6, 2150, 850),
(9, 2, 3500, 850),
(9, 3, 1600, 550),
(9, 6, 1750, 700),
(9, 7, 1450, 750),
(10, 4, 1500, 650),
(11, 1, 2300, 350),
(11, 2, 7700, 150),
(11, 4, 1900, 400),
(12, 1, 2500, 650),
(12, 2, 6500, 250),
(12, 3, 1000, 500),
(12, 4, 1700, 449),
(13, 2, 3500, 600),
(13, 3, 2900, 700),
(13, 4, 1600, 450),
(13, 6, 2050, 950),
(13, 7, 2450, 650),
(14, 3, 1200, 500),
(14, 5, 1100, 750),
(14, 6, 1950, 350),
(14, 7, 1150, 950),
(15, 10, 250, 619),
(15, 14, 140, 600),
(16, 10, 250, 550),
(16, 14, 140, 600),
(17, 10, 250, 550),
(17, 14, 180, 600),
(18, 8, 55, 401),
(18, 9, 20, 450),
(18, 11, 45, 550),
(18, 12, 70, 800),
(18, 13, 30, 800),
(18, 14, 50, 600),
(19, 8, 55, 539),
(19, 9, 20, 540),
(19, 11, 45, 555),
(19, 12, 70, 800),
(19, 13, 30, 800),
(19, 14, 50, 595),
(20, 8, 50, 550),
(20, 9, 20, 950),
(20, 11, 45, 550),
(20, 12, 70, 800),
(20, 13, 30, 800),
(20, 14, 50, 597),
(21, 8, 50, 100),
(21, 9, 20, 700),
(21, 11, 45, 550),
(21, 12, 70, 800),
(21, 13, 30, 800),
(21, 14, 50, 600),
(22, 9, 40, 100),
(22, 14, 35, 800),
(23, 9, 50, 450),
(23, 10, 150, 550),
(23, 11, 85, 550),
(23, 13, 80, 800),
(24, 9, 45, 450),
(24, 10, 150, 549),
(24, 13, 85, 800),
(25, 9, 50, 800),
(25, 10, 150, 549),
(25, 11, 95, 550),
(25, 13, 90, 800),
(26, 8, 450, 542),
(26, 12, 400, 800),
(27, 8, 350, 545),
(27, 12, 500, 800),
(28, 8, 550, 549),
(28, 12, 400, 800),
(29, 12, 100, 800),
(30, 9, 25, 750),
(30, 10, 200, 549),
(30, 11, 60, 550),
(30, 13, 90, 800),
(36, 1, 1800, 660),
(36, 2, 1600, 100),
(39, 1, 700, 300);

--
-- Triggers `all_products`
--
DELIMITER $$
CREATE TRIGGER `product_stock_on_insert` BEFORE INSERT ON `all_products` FOR EACH ROW BEGIN
update products 
set stock=stock+new.stock
WHERE new.product_id=id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_stock_on_update` BEFORE UPDATE ON `all_products` FOR EACH ROW BEGIN
UPDATE products set stock=stock-old.stock+new.stock 
WHERE old.product_id=id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Bottomwear'),
(2, 'Topwear'),
(3, 'Fast food'),
(4, 'Beverages'),
(5, 'desserts');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `mname`, `lname`, `phone`, `address`, `city`, `state`, `pincode`, `country`, `email`, `DOB`) VALUES
(1, 'Pranav', 'Sanjeev', 'Agrawal', '9765229963', 'c/o Ajay Traders, R.B. street, Netaji chowk, Kamptee', 'Nagpur', 'Maharashtra', '441002', 'India', 'pranavagrawal012@gmail.com', '1997-11-22'),
(2, 'Omkesh', '', 'Mitkari', '7776887398', 'Katraj', 'Pune', 'Maharashtra', '411049', 'India', 'ommitkari@gmail.com', '1997-07-23'),
(3, 'Motish', '', 'Mehta', '9422247762', 'Katraj', 'Pune', 'Maharashtra', '411049', 'India', 'mehta.motish1197@gmail.com', '1997-11-11'),
(4, 'Chinmay', '', 'Shimpi', '9876543210', 'Katraj', 'Pune', 'Maharashtra', '411049', 'India', 'shimpichinmay@gmail.com', '1997-07-01'),
(5, 'Rishabh', '', 'Shetty', '9638527415', 'Hinjewadi', 'Pune', 'Maharashtra', '411046', 'India', 'shettyrish@gmail.com', '1997-01-05'),
(6, 'Sharan', '', 'Rajani', '9517538426', 'Shivaji Nagar', 'Pune', 'Maharashtra', '411048', 'India', 'sharanrajani1@gmail.com', '1997-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` varchar(4) COLLATE utf16_unicode_ci NOT NULL DEFAULT '001',
  `status` varchar(10) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'Active',
  `fname` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `mname` varchar(100) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `country` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(100) COLLATE utf16_unicode_ci DEFAULT NULL,
  `birth_date` date NOT NULL,
  `title` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `store_id` int(11) DEFAULT NULL COMMENT 'foreign key',
  `supervisor` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `ecd_fname` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `ecd_mname` varchar(100) COLLATE utf16_unicode_ci DEFAULT NULL,
  `ecd_lname` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `ecd_address` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `ecd_city` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `ecd_state` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `ecd_pincode` int(11) NOT NULL,
  `ecd_country` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `ecd_phone` bigint(10) NOT NULL,
  `ecd_relationship` varchar(100) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `status`, `fname`, `mname`, `lname`, `address`, `city`, `state`, `pincode`, `country`, `phone`, `email`, `birth_date`, `title`, `store_id`, `supervisor`, `start_date`, `salary`, `ecd_fname`, `ecd_mname`, `ecd_lname`, `ecd_address`, `ecd_city`, `ecd_state`, `ecd_pincode`, `ecd_country`, `ecd_phone`, `ecd_relationship`) VALUES
('A001', 'Active', 'Motish', 'Ashokkumar', 'Mehta', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9422247762, 'mehta.motish1197@gmail.com', '1997-11-11', 'Admin', NULL, 'A001', '2015-01-01', 100000, 'Pranav', 'Sanjeev', 'Agrawal', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9765229963, 'Friend'),
('C000', 'Active', 'Pranav', '', 'Agrawal', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9422247762, 'pranavagrawal012@gmail.com', '1997-09-05', 'Clothing Manager', NULL, 'A001', '2015-01-01', 50000, 'Motish', NULL, 'Mehta', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9422247762, 'Friend'),
('C001', 'Active', 'JOHN', 'HOLLAND', 'SMITH', '32 BANER ROAD', 'PUNE', 'MAHARASHTRA ', 411045, 'India', 9876543120, 'JOHN_HOLLAND@GMAIL.COM', '1991-09-20', 'Store Manager', 1, 'C000', '2017-09-22', 25000, 'Samuel', 'Holland', 'Smith', '32 Baner Road ', 'Pune', 'Maharashtra', 411035, 'India', 9111111111, 'Brother'),
('C002', 'Active', 'Will', 'John', 'Smith', 'abc circle', 'Pune', 'maharashtra', 411065, 'India', 9658741236, 'willsmith@abc.com', '2016-12-31', 'Store Manager', 2, 'C000', '2017-01-01', 35000, 'John', '', 'smith', 'Kondhwa', 'Pune', 'Maharashtra', 411046, 'India', 1236547890, 'Father'),
('C003', 'Active', 'Ranbir', 'Rishi', 'Kapoor', 'Warli', 'Mumbai', 'Maharashtra', 400018, 'India', 2147483647, 'r.123@gmail.com', '1991-01-05', 'Store Manager', 3, 'C000', '2014-01-01', 10000, 'Katrina', '', 'Kaif', 'Warli', 'Mumbai', 'Maharashtra', 400018, 'India', 2147483647, 'Girl Friend'),
('C004', 'Active', 'Katrina', '', 'Kaif', 'Warli', 'Mumbai', 'Maharashtra', 400018, 'India', 2147483647, 'kat@gmail.com', '1997-11-11', 'Store Manager', 4, 'C000', '2015-11-11', 10000, 'Ranbir', '', 'Kapoor', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 2147483647, 'Boyfriend'),
('C005', 'Active', 'Aditya', 'Krishna', 'Dixit', 'Aundh', 'Pune', 'Maharashtra', 411007, 'India', 9587624789, NULL, '1988-06-11', 'Store Manager', 5, 'C000', '2017-09-11', 25000, 'Amit', NULL, 'Dixit', 'Aundh', 'Pune', 'Maharashtra', 411007, 'India', 9877894565, 'Father'),
('C006', 'Active', 'Akshit', 'Akash', 'Singh', 'Pimpri', 'Pune', 'Maharashtra', 411044, 'India', 9877894565, '', '1983-06-19', 'Store Manager', 6, 'C000', '2017-09-11', 25000, 'Akash', '', 'Singh', 'Pimpri', 'Pune', 'Maharashtra', 411044, 'India', 8756598452, 'Father'),
('C007', 'Active', 'Omkesh', '', 'Mitkari', 'Shivaji Nagar', 'Pune', 'Maharashtra', 411007, 'India', 7776882135, '', '1997-04-22', 'Store Manager', 7, 'C000', '2017-09-11', 25000, 'Manish', '', 'Tripathi', 'Shivaji Nagar', 'Pune', 'Maharashtra', 411007, 'India', 9547682147, 'Father'),
('C008', 'Active', 'Anurag', '', 'Kallurwar', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9403947762, 'billyak@gmail.com', '1997-05-11', 'Sale Clerk', 1, 'C001', '2017-10-05', 10000, 'Motish', ' ', 'Mehta', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9422247762, 'friend'),
('C009', 'Active', 'Aniket', '', 'Jalan', 'Dhanakwadi', 'Pune', 'Maharashtra', 411049, 'India', 9452215487, 'jalanrocks@gmail.com', '1997-05-01', 'Sale Clerk', 4, 'C004', '2017-10-09', 10000, 'Shreyas', '', 'Bhaskarwar', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9587463215, 'Friend'),
('C010', 'Active', 'AMIT', '', 'FUNDE', 'PIMPRI', 'PIMPRI CHINCHWAD', 'MAHARASHTRA', 411041, 'India', 9422254786, 'AMITF12@GMAIL.COM', '1997-01-01', 'Sale Clerk', 6, 'C006', '2017-12-31', 10000, 'MOTISH', '', 'MEHTA', 'KATRAJ', 'PUNE', 'MAHARASHTRA', 411049, 'India', 9422247762, 'FRIEND'),
('C011', 'Inactive', 'JOGESH', '', 'MEHTA', 'KALYANPURA', 'BARMER', 'RAJASTHAN', 343110, 'India', 8547632165, '', '1997-01-01', 'Store Manager', 1, 'C000', '2017-02-01', 25000, 'MOTISH', '', 'MEHTA', 'VARDHAMAN RESIDENCY, NEAR MG PUMP', 'MALEGAON', 'MAHARASHTRA', 423203, 'India', 9422247762, 'COUSIN'),
('F000', 'Active', 'Junaid', '', 'Magdum', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9876543210, 'jmagdum@gmail.com', '1997-09-05', 'Food Manager', NULL, 'A001', '2015-01-01', 50000, 'Motish', NULL, 'Mehta', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9422247762, 'Friend'),
('F001', 'Active', 'Soham', '', 'Ray', '9 hills', 'Pune', 'maharashtra', 411060, 'India', 9547862131, '', '1997-02-19', 'Store Manager', 8, 'F000', '2017-09-20', 45000, 'sharan', '', 'Rajani', 'bhosri', 'Pune', 'maharashtra', 411052, 'India', 9587463210, 'Friend'),
('F002', 'Active', 'Shreyas', 'Sanjay', 'Chaudhari', 'Hinjewadi', 'Pune', 'Maharashtra', 411057, 'India', 9403311146, 'shre2398@gmail.com', '1998-02-12', 'Store Manager', 9, 'F000', '2017-09-04', 25000, 'Sanjay', '', 'Chaudhari', 'Hinjewadi', 'Pune', 'Maharashtra', 411057, 'India', 9214587633, 'father'),
('F003', 'Active', 'Rajesh', 'Sohan', 'Agrawal', 'Loni\r\n', 'Pune\r\n', 'Maharashtra', 413736, 'India', 9558866741, 'Rajesh@gmail.com', '1988-10-14', 'Store Manager', 10, 'F000', '2017-09-09', 25000, 'Sohan', NULL, 'Agrawal', 'Loni', 'Pune', 'Maharashtra', 413736, 'India', 9865425461, 'father'),
('F004', 'Active', 'Atharva', 'Kunal', 'Ghote', 'Shivaji Nagar\r\n', 'Pune\r\n', 'Maharashtra', 411005, 'India', 9887724563, 'Atharva@gmail.com', '1983-11-10', 'Store Manager', 11, 'F000', '2017-09-10', 25000, 'Kunal', NULL, 'Ghote', 'Shivaji Nagar', 'Pune', 'Maharashtra', 411005, 'India', 9756842139, 'father'),
('F005', 'Active', 'Hari', 'Kishore', 'Warse', ' Aundh\r\n', 'Pune\r\n', 'Maharashtra', 411007, 'India', 9874747651, 'Hari@gmail.com', '1986-12-09', 'Store Manager', 12, 'F000', '2017-09-11', 25000, 'Kishore', NULL, 'Warse', ' Aundh', 'Pune', 'Maharashtra', 411007, 'India', 9856245879, 'father'),
('F006', 'Active', 'Rishabh', 'Rohan', 'Shetty', 'Pimpri', 'Pune', 'Maharashtra', 411044, 'India', 9654785126, NULL, '1981-12-20', 'Store Manager', 13, 'F000', '2017-09-12', 25000, 'Rohan', NULL, 'Shetty', 'Pimpri', 'Pune', 'Maharashtra', 411044, 'India', 9685474154, 'Father'),
('F007', 'Active', 'Mihir', 'Aditya', 'karkare', 'Shivaji Nagar', 'Pune', 'Maharashtra', 411005, 'India', 9756489215, NULL, '1986-07-12', 'Store Manager', 14, 'F000', '2017-09-12', 25000, 'Aditya', NULL, 'Karkare', 'Shivaji Nagar', 'Pune', 'Maharashtra', 411005, 'India', 9875621478, 'Father'),
('F008', 'Active', 'Shreyas', '', 'Bhaskarwar', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9987654321, 'hotshotthebest@gmail.com', '1997-07-01', 'Sale Clerk', 13, 'F006', '2017-01-01', 10000, 'Motish', '', 'Mehta', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9123456789, 'Friend'),
('F009', 'Active', 'Chaitraj', '', 'Mete', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9234567891, 'chatwithchaitraj@gmail.com', '1997-06-02', 'Sale Clerk', 12, 'F005', '2017-03-31', 10000, 'Motish', '', 'Mehta', 'Katraj', 'Pune', 'Maharashtra', 411049, 'India', 9422247762, 'Friend'),
('F010', 'Active', 'Great', '', 'Khali', 'Delhi', 'Delhi', 'Delhi', 400001, 'India', 9587546321, '', '1984-12-31', 'Sale Clerk', 9, 'F002', '2017-12-31', 10000, 'John', '', 'Cena', 'Delhi', 'Delhi', 'Delhi', 400001, 'India', 9587462135, 'Colleague'),
('F011', 'Inactive', 'John', '', 'Cena', 'Delhi', 'Delhi', 'Delhi', 400001, 'India', 9512345687, '', '1984-01-01', 'Sale Clerk', 8, 'F001', '2017-01-01', 10000, 'Great', '', 'Khali', 'Delhi', 'Delhi', 'Delhi', 400001, 'India', 7418529630, 'Colleague'),
('F012', 'Active', 'MANISH', '', 'BHUTEKAR', 'KATRAJ', 'PUNE', 'MAHARASHTRA', 411049, 'India', 9857462315, 'MANISHB12@GMAIL.COM', '1997-11-11', 'Sale Clerk', 8, 'F001', '2015-01-01', 10000, 'MOTISH', '', 'MEHTA', 'KATRAJ', 'PUNE', 'MAHARSHTRA', 411049, 'India', 9422247762, 'FRIEND');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `employee_id` varchar(4) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(12) NOT NULL COMMENT 'length(9-12)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`employee_id`, `password`) VALUES
('A001', 'asdfghjkl;\''),
('C000', '987654321'),
('C001', '123456789'),
('C002', '123456789'),
('C003', '123456789'),
('C004', '123456789'),
('C005', '123456789'),
('C006', '123456789'),
('C007', '123456789'),
('F000', '987654321'),
('F001', '123456789'),
('F002', '123456789'),
('F003', '123456789'),
('F004', '123456789'),
('F005', '123456789'),
('F006', '123456789'),
('F007', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL COMMENT 'foreign key',
  `customer_id` int(11) NOT NULL COMMENT 'foreign key',
  `employee_id` varchar(4) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL DEFAULT '001' COMMENT 'foreign key',
  `date` date NOT NULL,
  `items_quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `store_id`, `customer_id`, `employee_id`, `date`, `items_quantity`, `total_amount`) VALUES
(1, 1, 1, 'C001', '2017-09-25', 17, 12800),
(3, 8, 1, 'F001', '2017-10-03', 2, 900),
(4, 1, 1, 'C001', '2017-10-04', 3, 1995),
(5, 8, 1, 'F001', '2017-10-09', 1, 50),
(6, 8, 1, 'F001', '2017-10-09', 3, 775),
(7, 8, 1, 'F001', '2017-10-09', 5, 933),
(8, 8, 1, 'F001', '2017-10-09', 10, 550),
(9, 8, 1, 'F001', '2017-10-09', 2, 700),
(10, 8, 1, 'F001', '2017-10-09', 1, 550),
(11, 8, 1, 'F001', '2017-10-09', 1, 55),
(12, 8, 1, 'F001', '2017-10-09', 1, 350),
(13, 8, 1, 'F001', '2017-10-09', 12, 660),
(14, 8, 1, 'F001', '2017-10-09', 1, 55),
(15, 8, 1, 'F001', '2017-10-09', 1, 55),
(16, 8, 1, 'F001', '2017-10-09', 123, 6765),
(17, 8, 1, 'F001', '2017-10-09', 3, 165),
(19, 8, 1, 'F001', '2017-10-09', 10, 550),
(20, 8, 2, 'F001', '2017-10-09', 1, 50),
(21, 1, 2, 'C001', '2017-10-09', 1, 1400),
(22, 10, 3, 'F003', '2017-10-11', 3, 600),
(23, 10, 4, 'F003', '2017-10-11', 1, 150),
(24, 4, 4, 'C004', '2017-10-11', 4, 5000),
(25, 6, 5, 'C006', '2017-10-11', 4, 5800),
(26, 14, 6, 'F007', '2017-10-11', 8, 400);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL COMMENT 'foreign key',
  `product_id` int(11) NOT NULL COMMENT 'foreign key',
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `final_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `total_price`, `discount`, `final_price`) VALUES
(1, 1, 3, 3000, 0, 3000),
(1, 2, 2, 2800, 0, 2800),
(1, 3, 2, 4400, 0, 4400),
(1, 4, 2, 2600, 0, 2600),
(3, 26, 2, 900, 0, 900),
(4, 5, 3, 2100, 5, 1995),
(5, 18, 1, 55, 10, 50),
(6, 19, 1, 55, 0, 55),
(6, 26, 2, 900, 20, 720),
(7, 18, 1, 55, 40, 33),
(7, 26, 4, 1800, 50, 900),
(8, 19, 10, 550, 0, 550),
(9, 27, 2, 700, 0, 700),
(10, 28, 1, 550, 0, 550),
(11, 18, 1, 55, 0, 55),
(12, 27, 1, 350, 0, 350),
(13, 18, 12, 660, 0, 660),
(14, 20, 1, 55, 0, 55),
(15, 18, 1, 55, 0, 55),
(16, 18, 123, 6765, 0, 6765),
(17, 18, 3, 165, 0, 165),
(19, 18, 10, 550, 0, 550),
(20, 18, 1, 55, 10, 50),
(21, 2, 1, 1400, 0, 1400),
(22, 15, 1, 250, 0, 250),
(22, 24, 1, 150, 0, 150),
(22, 30, 1, 200, 0, 200),
(23, 25, 1, 150, 0, 150),
(24, 6, 3, 3300, 0, 3300),
(24, 12, 1, 1700, 0, 1700),
(25, 1, 2, 2900, 0, 2900),
(25, 2, 2, 2900, 0, 2900),
(26, 19, 5, 250, 0, 250),
(26, 20, 3, 150, 0, 150);

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `Order_details_insert` BEFORE INSERT ON `order_details` FOR EACH ROW BEGIN
set new.total_price=new.quantity*(select price from all_products where product_id=new.product_id and store_id=(select store_id from orders where id=new.order_id));
set new.final_price=new.total_price*(1-new.discount/100);
UPDATE orders
SET items_quantity=items_quantity+new.quantity 
WHERE id=new.order_id;
UPDATE orders
SET total_amount=total_amount+new.final_price
WHERE id=new.order_id;
UPDATE all_products
set stock=stock-new.quantity
where product_id=new.product_id and store_id=(select store_id from orders where id=new.order_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key',
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `stock`) VALUES
(1, 'black jeans', 1, 2920),
(2, 'white shirt', 2, 1998),
(3, 'Blue Jeans', 1, 2458),
(4, 'Black Shirt', 2, 3698),
(5, 'Round neck T-Shirt full sleeves', 2, 1847),
(6, 'Cotton Shorts', 1, 1997),
(7, 'Hosiery Shorts', 1, 950),
(8, 'Printed Shorts', 1, 2300),
(9, 'Round neck T-Shirt half sleeves', 2, 2850),
(10, 'Round neck T-Shirt sleeveless', 2, 650),
(11, 'POLO T-Shirt full sleeves', 2, 900),
(12, 'POLO T-Shirt half sleeves', 2, 1849),
(13, 'ONE PIECE', 2, 3350),
(14, 'SKIRT', 1, 2550),
(15, 'Hara Bhara Kebab Sub', 3, 1219),
(16, 'Paneer Tikka Sub', 3, 1150),
(17, 'Turkey And Chicken Sub', 3, 1150),
(18, 'Coke', 4, 3601),
(19, 'Mountain Dew', 4, 3829),
(20, '7up', 4, 4247),
(21, 'Mirinda', 4, 3550),
(22, 'Cookie', 5, 900),
(23, 'Paneer tikka burger', 3, 2350),
(24, 'Veg cheese sandwich', 3, 1799),
(25, 'veg cheese burger', 3, 2699),
(26, 'Veg Peppy Paneer Pizza', 3, 1342),
(27, 'Barbeque Chicken Pizza', 3, 1345),
(28, 'Country Special Pizza', 3, 1349),
(29, 'Stuffed Garlic Bread', 3, 800),
(30, 'Coffee', 4, 2649),
(36, 'White joggers', 1, 760),
(38, 'blue joggers', 1, 0),
(39, 'Black Joggers', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Department` varchar(11) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `manager_id` varchar(4) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  `floor` int(11) NOT NULL,
  `block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `Department`, `manager_id`, `floor`, `block`) VALUES
(1, 'Allen Solly', 'Clothing', NULL, 1, 1),
(2, 'SuperDry', 'Clothing', NULL, 1, 2),
(3, 'Zara', 'Clothing', 'C003', 1, 3),
(4, 'USPA', 'Clothing', 'C004', 1, 4),
(5, 'UCB', 'Clothing', 'C005', 1, 5),
(6, 'Arrow', 'Clothing', 'C006', 1, 6),
(7, 'Forever 21', 'Clothing', 'C007', 1, 7),
(8, 'Domino\'s', 'Food', 'F001', 2, 1),
(9, 'Haldirams', 'Food', 'F002', 2, 2),
(10, 'Starbucks Coffee', 'Food', 'F003', 2, 3),
(11, 'McDonald\'s', 'Food', 'F004', 2, 4),
(12, 'Pizza Hut', 'Food', 'F005', 2, 5),
(13, 'Indian Coffee House', 'Food', 'F006', 2, 6),
(14, 'Subway', 'Food', 'F007', 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`product_id`,`store_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `supervisor` (`supervisor`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_products`
--
ALTER TABLE `all_products`
  ADD CONSTRAINT `all_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `all_products_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `employee_details_ibfk_2` FOREIGN KEY (`supervisor`) REFERENCES `employee_details` (`id`);

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_details` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`employee_id`) REFERENCES `employee_details` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `employee_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
