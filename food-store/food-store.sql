-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 09:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(15, 'Seth Tada', 'sethtada', 'a19ea622182c63ddc19bb22cde982b82'),
(17, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(15, 'GOTO', 'Food_Category_161.jpg', 'Yes', 'Yes'),
(16, 'PANSIT', 'Food_Category_701.png', 'Yes', 'Yes'),
(17, 'LOMI', 'Food_Category_831.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(30, 'GOTO', 'GOTO-LAMAN(BIG)', '100.00', 'Food-Name-2446.jpg', 15, 'Yes', 'Yes'),
(33, 'GOTO', 'GOTO-LAMAN(SMALL)', '75.00', 'Food-Name-7547.jpg', 15, 'Yes', 'Yes'),
(34, 'GOTO', 'GOTO-HALO(BIG)', '80.00', 'Food-Name-2873.jpg', 15, 'Yes', 'Yes'),
(35, 'GOTO', 'GOTO-HALO(SMALL)', '65.00', 'Food-Name-4497.jpg', 15, 'Yes', 'Yes'),
(36, 'GOTO SINAMPALOKAN', 'GOTO SINAMPALOKAN (LAMAN)', '120.00', 'Food-Name-3469.jpg', 15, 'Yes', 'Yes'),
(37, 'GOTO SINAMPALOKAN', 'GOTO SINAMPALOKAN(HALO)', '100.00', 'Food-Name-5371.jpg', 15, 'Yes', 'Yes'),
(38, 'GOTO', 'GOTO KILAWIN', '100.00', 'Food-Name-9502.jpg', 15, 'Yes', 'Yes'),
(39, 'LOMI', 'LOMI(REGULAR)', '50.00', 'Food-Name-9881.jpg', 17, 'Yes', 'Yes'),
(40, 'LOMI', 'LOMI(BIG)', '70.00', 'Food-Name-2744.jpg', 17, 'Yes', 'Yes'),
(41, 'CHAMI', 'CHAMI TUSTADO TAMIS ANGHANG', '75.00', 'Food-Name-5152.jpg', 16, 'Yes', 'Yes'),
(42, 'CHAMI', ' CHAMI TAMIS ANGHANG', '70.00', 'Food-Name-6453.jpg', 16, 'Yes', 'Yes'),
(43, 'CHAMI', 'CHAMI REGULAR', '65.00', 'Food-Name-2653.jpg', 16, 'Yes', 'Yes'),
(44, 'GISADO', 'GISADO(REGULAR)', '55.00', 'Food-Name-2083.png', 16, 'Yes', 'Yes'),
(45, 'GISADO', 'GISADO TUSTADO', '60.00', 'Food-Name-4440.png', 16, 'Yes', 'Yes'),
(46, 'GISADO', 'GISADO TUSTADO TAMIS ANGHANG', '65.00', 'Food-Name-6116.png', 16, 'Yes', 'Yes'),
(47, 'GISADO', 'GISADO TAMIS ANGHANG', '60.00', 'Food-Name-5088.png', 16, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'GUISADO', '60.00', 13, '780.00', '2023-05-18 05:31:50', 'Ordered', 'Seth Tada', '9457836657', 'sethaldous@yahoo.com', 'Lipa City Batangas'),
(2, 'GOTO', '70.00', 5, '350.00', '2023-05-18 05:39:26', 'Ordered', 'Mark Fruelda', '9457836657', 'wahuivry@yahoo.com', 'Lipa City Batangas'),
(3, 'LOMI', '60.00', 2, '120.00', '2023-05-18 06:15:40', 'Delivered', 'Wahu Abaya', '9457836657', 'wahuivry@yahoo.com', 'Lipa Batangas'),
(4, 'GOTO', '70.00', 3, '210.00', '2023-05-18 06:19:01', 'Delivered', 'Yuji Itadori', '9457836657', 'sethaldous@yahoo.com', 'Batangas Lipa'),
(5, 'Goodies', '76.00', 3, '228.00', '2023-05-18 07:05:11', 'Cancelled', 'John Paul Samonte', '9457836657', 'sethaldous@yahoo.com', 'Lipa Dagatan'),
(6, 'GUISADO', '60.00', 1, '60.00', '2023-05-19 06:10:30', 'Ordered', 'Vjayy Thappa', '9457836657', 'wahuivry@yahoo.com', 'LIPA BATANGAS'),
(7, 'GOTO', '70.00', 1, '70.00', '2023-05-19 06:39:00', 'Ordered', 'John Paul Samonte', '9457836657', 'sethaldous@yahoo.com', 'Lipa Tanauan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
