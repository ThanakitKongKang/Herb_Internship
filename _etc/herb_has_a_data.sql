-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 05:08 AM
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
  `order_price` float NOT NULL,
  `order_cost` double NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `product_cost` double NOT NULL,
  `product_price` double NOT NULL,
  `product_price_discount` double NOT NULL,
  `product_stock` int(10) NOT NULL,
  `product_status` enum('ขาย','เลิกขาย') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_potent`, `product_amount`, `product_cost`, `product_price`, `product_price_discount`, `product_stock`, `product_status`) VALUES
('001', 'ขมิ้นชัน', 'ED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 583, 'ขาย'),
('002', 'จันทลิลา', 'NED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 58, 'ขาย'),
('003', 'ธาตุบรรจบ', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 29, 'ขาย'),
('004', 'บอระเพ็ด', 'NED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 112, 'ขาย'),
('005', 'เบาหวาน', 'NED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 598, 'ขาย'),
('006', 'ประสระไพล', 'ED', '250 mg', '50 เม็ด', 23.53, 50, 42.5, 1045, 'ขาย'),
('007', 'ฟ้าทลายโจร', 'ED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 842, 'ขาย'),
('008', 'มะระขี้นก', 'ED', '250 mg', '50 แคปซูล', 26.6, 50, 42.5, 80, 'ขาย'),
('009', 'ริดสีดวงทวาร', 'ED', '250 mg', '50 แคปซูล', 25.14, 50, 42.5222, 0, 'ขาย'),
('010', 'สหัสธารา', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 170, 'ขาย'),
('011', 'อัมฤควาที', 'ED', '250 mg', '50 เม็ด', 23.52, 50, 42.5, 1123079, 'ขาย'),
('012', 'อินทรจักร', 'ED', '250 mg', '50 เม็ด', 24.15, 50, 42.5, 125, 'ขาย'),
('013', 'ปราบชมพูทวีป', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 159, 'ขาย'),
('014', 'ปลูกไฟชาตุ', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 85, 'ขาย'),
('015', 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 7094, 'ขาย'),
('016', 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.13, 90, 74.5, 97, 'ขาย'),
('017', 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 35, 'ขาย'),
('018', 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 498, 'ขาย'),
('019', 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 699, 'ขาย'),
('020', 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 99, 'ขาย'),
('021', 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 199, 'ขาย'),
('022', 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.63, 90, 74.5, 501, 'ขาย'),
('023', 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.74, 90, 74.5, 401, 'ขาย'),
('024', 'สหัสธารา', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 99, 'ขาย'),
('025', 'อัมฤควาที', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 99, 'ขาย'),
('026', 'อิททรจักร', 'ED', '250 mg', '100 เม็ด', 52.75, 90, 74.5, 101, 'ขาย'),
('027', 'พลทิพย์', 'ED', 'ระบุไม่ได้', '50 เม็ด', 15.53, 25, 20, 1, 'ขาย'),
('028', 'พลทิพย์', 'ED', '3 กรัม', 'ระบุไม่ได้', 7.28, 13, 10.5, 2, 'ขาย'),
('029', 'ขมิ้นซอง', 'ED', '', '20 กรัม', 19, 30, 24, 1, 'ขาย'),
('030', 'ยาหอมนวโกฐ', 'ED', 'ระบุไม่ได้', '15 กรัม', 23.27, 35, 29, 4, 'ขาย'),
('031', 'ยาชงชุมเห็ดเทศ', '', '2 g', '20 กรัม', 24.27, 35, 29, 0, 'ขาย'),
('032', 'ยาชงรางจืด', 'ED', '2 g', '20 กรัม', 26.02, 40, 35, 0, 'ขาย'),
('033', 'ยาธาตุอบเชย', 'ED', 'ระบุไม่ได้', '240 ml', 24.72, 35, 29, 0, 'ขาย'),
('034', 'ขี้ผึ่งไพลเล็ก', 'ED', '15 กรัม', '30% W/W', 11.72, 25, 20, 0, 'ขาย'),
('035', 'ขี้ผึ่งไพลใหญ่', 'ED', '30% W/W', '60 กรัม', 34.29, 55, 45, 0, 'ขาย'),
('036', 'ลูกประคบ', 'ED', 'ระบุไม่ได้', '150 กรัม', 24.7, 55, 45, 2, 'ขาย'),
('037', 'ลูกประคบจิ๋ว', 'ED', 'ระบุไม่ได้', '50 กรัม', 20.36, 50, 41, 1, 'ขาย');

-- --------------------------------------------------------

--
-- Table structure for table `stock_detail`
--

CREATE TABLE `stock_detail` (
  `stock_id` int(11) NOT NULL,
  `stock_date` datetime NOT NULL,
  `product_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user`, `user_name`, `user_password`) VALUES
('sdn01', 'นายศักดาดิ์ นาหก', 'sdn01'),
('snr01', 'นางสุดารัตน์  ศรีกะพา', 'snr01'),
('tpk01', 'นายธัญเทพ  เค้าทอง', 'tpk01'),
('wnk01', 'นางวรรณา หนูแก้ว', 'wnk01');

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
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

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
