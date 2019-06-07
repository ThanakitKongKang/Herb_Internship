-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 09:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` enum('NED','ED') COLLATE utf8_unicode_ci NOT NULL,
  `product_potent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_cost` float NOT NULL,
  `product_price` float NOT NULL,
  `product_price_discount` float NOT NULL,
  `product_stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_potent`, `product_amount`, `product_cost`, `product_price`, `product_price_discount`, `product_stock`) VALUES
(1, 'ขมิ้นชัน', 'ED', '250 mg', '50 แคปซูล', 24.72, 50, 42.5, 500),
(2, 'จันทลิลา', 'ED', '250 mg', '50  แคปซูล', 27.85, 50, 42.5, 500),
(3, 'ธาตุบรรจบ', 'ED', '250 mg', '50 แคปซูล', 27.22, 50, 42.5, 0),
(4, 'บอระเพ็ด', 'NED', '250 mg', '50 แคปซูล', 24.72, 50, 42.5, 0),
(5, 'เบาหวาน', 'NED', '250 mg', '50 แคปซูล', 27.22, 50, 42.5, 0),
(6, 'ประสระไพล', 'ED', '250 mg', '50 เม็ด', 23.53, 50, 42.5, 0),
(7, 'ฟ้าทลายโจร', 'ED', '250 mg', '50 แคปซูล', 24.72, 50, 42.5, 0),
(8, 'มะระขี้นก', 'ED', '250 mg', '50 แคปซูล', 26.6, 50, 42.5, 0),
(9, 'ริดสีดวงทวาร', 'ED', '250 mg', '50 แคปซูล', 25.15, 50, 42.5, 0),
(10, 'สหัสธารา', 'ED', '250 mg', '50 แคปซูล', 27.22, 50, 42.5, 0),
(11, 'อัมฤควาที', 'ED', '250 mg', '50 เม็ด', 23.52, 50, 42.5, 0),
(12, 'อินทรจักร', 'ED', '250 mg', '50 เม็ด', 24.16, 50, 42.5, 0),
(13, 'ปราบชมพูทวีป', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 0),
(14, 'ปลูกไฟชาตุ', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 0),
(15, 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 0),
(16, 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.14, 90, 74.5, 0),
(17, 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.89, 90, 74.5, 0),
(18, 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.89, 90, 74.5, 0),
(19, 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.89, 90, 74.5, 0),
(20, 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.51, 90, 74.5, 0),
(21, 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.89, 90, 74.5, 0),
(22, 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.64, 90, 74.5, 0),
(23, 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.74, 90, 74.5, 0),
(24, 'สหัสธารา', 'ED', '250 mg', '100 แคปซูล', 58.89, 90, 74.5, 0),
(25, 'อัมฤควาที', 'ED', '250 mg', '100 เม็ด', 51.51, 90, 74.5, 0),
(26, 'อิททรจักร', 'ED', '250 mg', '100 เม็ด', 52.76, 90, 74.5, 0),
(27, 'พลทิพย์ 50 เม็ด', 'ED', 'ระบุไมได้', '50 เม็ด', 15.54, 25, 20, 0),
(28, 'พลทิพย์ 3 กรัม', 'ED', '3 กรัม', 'ระบุไมได้', 7.28, 13, 10.5, 0),
(29, 'ขมิ้นซอง', 'ED', '', '20 กรัม', 19, 30, 24, 0),
(30, 'ยาหอมนวโกฐ', 'ED', 'ระบุไมได้', '15 กรัม', 23.27, 35, 29, 0),
(31, 'ยาชงชุมเห็ดเทศ', '', '2 g', '20 กรัม', 24.27, 35, 29, 0),
(32, 'ยาชงรางจืด', 'ED', '2 g', '20 กรัม', 26.02, 40, 35, 0),
(33, 'ยาธาตุอบเชย', 'ED', 'ระบุไมได้', '240 ml', 24.73, 35, 29, 0),
(34, 'ขี้ผึ่งไพลเล็ก', 'ED', '15 กรัม', '30% W/W', 11.72, 25, 20, 0),
(35, 'ขี้ผึ่งไพลใหญ่', 'ED', '30% W/W', '60 กรัม', 34.29, 55, 45, 0),
(36, 'ลูกประคบ', 'ED', 'ระบุไมได้', '150 กรัม', 24.71, 55, 45, 0),
(37, 'ลูกประคบจิ๋ว', 'ED', 'ระบุไมได้', '50 กรัม', 20.36, 50, 41, 0),
(42, '23', 'ED', '123', '123', 3123, 123, 123, 123),
(43, '123', 'ED', '2', '2', 2, 3, 3, 3),
(44, 'test55', 'ED', '3', '3', 5.41, 5.25, 5.5, 5),
(45, 'test3', 'ED', '2', '2', 13, 4, 55, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
