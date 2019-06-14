-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 05:03 AM
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
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `order_count` int(11) NOT NULL,
  `order_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `order_count`, `order_price`) VALUES
(183, '001', 1, 50),
(183, '002', 1, 50),
(183, '003', 1, 50),
(184, '003', 1, 50),
(183, '004', 1, 50),
(184, '004', 1, 50),
(184, '006', 1, 50),
(184, '007', 1, 50),
(184, '008', 2, 50),
(184, '011', 1, 50),
(184, '012', 2, 50),
(184, '013', 2, 50),
(184, '014', 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `order_date`) VALUES
(183, '2019-06-14 09:13:21'),
(184, '2019-06-14 09:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
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
('001', 'ขมิ้นชัน', 'ED', '250 mg', '50 แคปซูล', 24.72, 50, 42.5, 289),
('002', 'จันทลิลา', 'ED', '250 mg', '50  แคปซูล', 27.85, 50, 42.5, 300),
('003', 'ธาตุบรรจบ', 'ED', '250 mg', '50 แคปซูล', 27.22, 50, 42.5, 30),
('004', 'บอระเพ็ด', 'NED', '250 mg', '50 แคปซูล', 24.72, 50, 42.5, 15),
('005', 'เบาหวาน', 'NED', '250 mg', '50 แคปซูล', 27.22, 50, 42.5, 0),
('006', 'ประสระไพล', 'ED', '250 mg', '50 เม็ด', 23.53, 50, 42.5, 39),
('007', 'ฟ้าทลายโจร', 'ED', '250 mg', '50 แคปซูล', 24.72, 50, 42.5, 42),
('008', 'มะระขี้นก', 'ED', '250 mg', '50 แคปซูล', 26.6, 50, 42.5, 93),
('009', 'ริดสีดวงทวาร', 'ED', '250 mg', '50 แคปซูล', 25.15, 50, 42.5, 99),
('010', 'สหัสธารา', 'ED', '250 mg', '50 แคปซูล', 27.22, 50, 42.5, 63),
('011', 'อัมฤควาที', 'ED', '250 mg', '50 เม็ด', 23.52, 50, 42.5, 19),
('012', 'อินทรจักร', 'ED', '250 mg', '50 เม็ด', 24.16, 50, 42.5, 7),
('013', 'ปราบชมพูทวีป', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 42),
('014', 'ปลูกไฟชาตุ', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 98),
('015', 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 7100),
('016', 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.14, 90, 74.5, 100),
('017', 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.89, 90, 74.5, 41),
('018', 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.89, 90, 74.5, 500),
('019', 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.89, 90, 74.5, 700),
('020', 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.51, 90, 74.5, 100),
('021', 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.89, 90, 74.5, 200),
('022', 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.64, 90, 74.5, 500),
('023', 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.74, 90, 74.5, 400),
('024', 'สหัสธารา', 'ED', '250 mg', '100 แคปซูล', 58.89, 90, 74.5, 100),
('025', 'อัมฤควาที', 'ED', '250 mg', '100 เม็ด', 51.51, 90, 74.5, 100),
('026', 'อิททรจักร', 'ED', '250 mg', '100 เม็ด', 52.76, 90, 74.5, 100),
('027', 'พลทิพย์', 'ED', 'ระบุไม่ได้', '50 เม็ด', 15.54, 25, 20, 0),
('028', 'พลทิพย์', 'ED', '3 กรัม', 'ระบุไม่ได้', 7.28, 13, 10.5, 0),
('029', 'ขมิ้นซอง', 'ED', '', '20 กรัม', 19, 30, 24, 0),
('030', 'ยาหอมนวโกฐ', 'ED', 'ระบุไม่ได้', '15 กรัม', 23.27, 35, 29, 0),
('031', 'ยาชงชุมเห็ดเทศ', '', '2 g', '20 กรัม', 24.27, 35, 29, 0),
('032', 'ยาชงรางจืด', 'ED', '2 g', '20 กรัม', 26.02, 40, 35, 0),
('033', 'ยาธาตุอบเชย', 'ED', 'ระบุไม่ได้', '240 ml', 24.73, 35, 29, 0),
('034', 'ขี้ผึ่งไพลเล็ก', 'ED', '15 กรัม', '30% W/W', 11.72, 25, 20, 0),
('035', 'ขี้ผึ่งไพลใหญ่', 'ED', '30% W/W', '60 กรัม', 34.29, 55, 45, 0),
('036', 'ลูกประคบ', 'ED', 'ระบุไม่ได้', '150 กรัม', 24.71, 55, 45, 0),
('037', 'ลูกประคบจิ๋ว', 'ED', 'ระบุไม่ได้', '50 กรัม', 20.36, 50, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_detail`
--

CREATE TABLE `stock_detail` (
  `stock_id` int(11) NOT NULL,
  `stock_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock_detail`
--
ALTER TABLE `stock_detail`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_history` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
