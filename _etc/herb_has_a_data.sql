-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 06:23 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `order_count`, `order_price`, `order_cost`, `user`) VALUES
(2, '002', 3, 50, 27.85, 'sdn01'),
(3, '002', 2, 50, 27.85, 'sdn01'),
(4, '002', 1, 50, 27.85, 'sdn01'),
(5, '002', 2, 50, 27.85, 'sdn01'),
(2, '015', 3, 90, 53.88, 'sdn01'),
(3, '015', 2, 90, 53.88, 'sdn01'),
(4, '015', 12, 90, 53.88, 'sdn01'),
(5, '015', 2, 90, 53.88, 'sdn01'),
(3, '016', 2, 90, 60.13, 'sdn01'),
(4, '016', 14, 90, 60.13, 'sdn01'),
(5, '016', 4, 90, 60.13, 'sdn01'),
(2, '017', 3, 90, 58.88, 'sdn01'),
(4, '017', 14, 90, 58.88, 'sdn01'),
(5, '017', 2, 90, 58.88, 'sdn01'),
(4, '018', 15, 90, 53.88, 'sdn01'),
(5, '018', 2, 90, 53.88, 'sdn01'),
(2, '019', 1, 90, 58.88, 'sdn01'),
(4, '019', 12, 90, 58.88, 'sdn01'),
(5, '019', 2, 90, 58.88, 'sdn01'),
(4, '020', 12, 90, 51.5, 'sdn01'),
(2, '021', 2, 90, 53.88, 'sdn01'),
(4, '021', 2, 90, 53.88, 'sdn01');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `book_id` int(10) NOT NULL,
  `iv_id` int(10) NOT NULL,
  `status` enum('uncancelled','cancelled') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `order_date`, `book_id`, `iv_id`, `status`) VALUES
(2, '2019-07-12 17:40:44', 2, 10, 'cancelled'),
(3, '2019-07-15 19:42:22', 1, 2, 'uncancelled'),
(4, '2019-07-15 19:42:49', 5, 4, 'uncancelled'),
(5, '2019-07-16 22:58:57', 0, 0, 'uncancelled');

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
('002', 'จันทลิลา', 'NED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 51, 'ขาย'),
('015', 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 7065, 'ขาย'),
('016', 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.13, 90, 74.5, 50, 'ขาย'),
('017', 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 14, 'ขาย'),
('018', 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 484, 'ขาย'),
('019', 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 683, 'ขาย'),
('020', 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 87, 'ขาย'),
('021', 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 197, 'ขาย'),
('022', 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.63, 90, 74.5, 501, 'ขาย'),
('023', 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.74, 90, 74.5, 401, 'ขาย'),
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

--
-- Dumping data for table `stock_detail`
--

INSERT INTO `stock_detail` (`stock_id`, `stock_date`, `product_id`, `stock`, `user`) VALUES
(1, '2019-07-15 19:28:11', '002', 9, 'sdn01'),
(2, '2019-07-15 19:28:11', '017', 2, 'sdn01'),
(3, '2019-07-15 19:28:11', '018', 3, 'sdn01'),
(4, '2019-07-15 19:28:11', '015', 3, 'sdn01'),
(5, '2019-07-15 19:28:11', '019', 1, 'sdn01'),
(6, '2019-07-15 19:28:11', '016', 7, 'sdn01'),
(7, '2019-07-15 19:28:11', '021', 2, 'sdn01');

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
('admin', 'ผู้ดูแลระบบ', 'yongyung'),
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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
