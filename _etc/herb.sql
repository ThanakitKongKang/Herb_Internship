-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 04:10 AM
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

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `order_count`, `order_price`, `order_cost`, `user`) VALUES
(4, '001', 1, 50, 27.85, ''),
(5, '001', 255, 50, 27.85, ''),
(8, '001', 1, 50, 27.85, ''),
(9, '001', 2, 50, 27.85, ''),
(10, '001', 1, 50, 27.85, ''),
(12, '001', 1, 50, 27.85, ''),
(15, '001', 1, 50, 27.85, ''),
(20, '001', 4, 50, 27.85, ''),
(21, '001', 2, 50, 27.85, ''),
(23, '001', 20, 50, 27.85, ''),
(36, '001', 1, 50, 27.85, 'someone'),
(45, '001', 3, 50, 27.85, 'someone'),
(1, '002', 10, 50, 27.85, ''),
(2, '002', 30, 50, 27.85, ''),
(6, '002', 1, 50, 27.85, ''),
(8, '002', 2, 50, 27.85, ''),
(9, '002', 1, 50, 27.85, ''),
(10, '002', 1, 50, 27.85, ''),
(13, '002', 1, 50, 27.85, ''),
(15, '002', 1, 50, 27.85, ''),
(17, '002', 1, 50, 27.85, ''),
(18, '002', 23, 50, 27.85, ''),
(19, '002', 1, 50, 27.85, ''),
(20, '002', 2, 50, 27.85, ''),
(21, '002', 2, 50, 27.85, ''),
(3, '005', 58, 50, 27.21, ''),
(7, '005', 2, 50, 27.21, ''),
(9, '005', 1, 50, 27.21, ''),
(11, '005', 1, 50, 27.21, ''),
(13, '005', 1, 50, 27.21, ''),
(16, '005', 1, 50, 27.21, ''),
(18, '005', 4, 50, 27.21, ''),
(19, '005', 1, 50, 27.21, ''),
(20, '005', 1, 50, 27.21, ''),
(21, '005', 2, 50, 27.21, ''),
(26, '005', 1, 50, 27.21, ''),
(9, '006', 1, 50, 23.53, ''),
(14, '006', 1, 50, 23.53, ''),
(15, '006', 1, 50, 23.53, ''),
(17, '006', 1, 50, 23.53, ''),
(18, '006', 2, 50, 23.53, ''),
(19, '006', 3, 50, 23.53, ''),
(20, '006', 2, 50, 23.53, ''),
(21, '006', 3, 50, 23.53, ''),
(46, '006', 1, 50, 23.53, 'someone'),
(8, '007', 1, 50, 24.71, ''),
(10, '007', 1, 50, 24.71, ''),
(14, '007', 1, 50, 24.71, ''),
(15, '007', 1, 50, 24.71, ''),
(17, '007', 1, 50, 24.71, ''),
(18, '007', 12, 50, 24.71, ''),
(21, '007', 1, 50, 24.71, ''),
(10, '008', 1, 50, 26.6, ''),
(13, '008', 1, 50, 26.6, ''),
(15, '008', 1, 50, 26.6, ''),
(28, '008', 1, 50, 26.6, ''),
(9, '010', 1, 50, 27.21, ''),
(12, '010', 1, 50, 27.21, ''),
(14, '010', 1, 50, 27.21, ''),
(18, '010', 3, 50, 27.21, ''),
(24, '010', 1, 50, 27.21, ''),
(25, '010', 1, 50, 27.21, ''),
(26, '010', 1, 50, 27.21, ''),
(27, '010', 1, 50, 27.21, ''),
(28, '010', 1, 50, 27.21, '');

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
(1, '2019-06-25 00:00:00'),
(2, '2019-06-25 01:54:49'),
(3, '2019-06-25 01:55:12'),
(4, '2019-06-25 03:02:42'),
(5, '2019-06-26 08:57:52'),
(6, '2019-06-26 10:33:58'),
(7, '2019-06-26 10:34:59'),
(8, '2019-06-26 10:35:29'),
(9, '2019-06-26 10:37:58'),
(10, '2019-06-26 10:39:51'),
(11, '2019-06-26 10:40:22'),
(12, '2019-06-26 10:43:29'),
(13, '2019-06-26 10:49:21'),
(14, '2019-06-26 10:49:47'),
(15, '2019-06-26 10:51:20'),
(16, '2019-06-26 10:53:37'),
(17, '2019-06-26 11:00:02'),
(18, '2019-06-26 11:00:27'),
(19, '2019-06-26 11:01:56'),
(20, '2019-06-26 11:03:48'),
(21, '2019-06-26 11:04:30'),
(22, '2019-06-26 12:48:41'),
(23, '2019-06-26 02:49:04'),
(24, '2019-06-26 02:49:07'),
(25, '2019-06-26 02:50:15'),
(26, '2019-06-26 02:50:23'),
(27, '2019-06-26 02:50:45'),
(28, '2019-06-26 02:51:14'),
(29, '2019-06-26 02:51:22'),
(30, '2019-06-27 08:53:34'),
(31, '2019-06-27 08:53:48'),
(32, '2019-06-27 08:55:14'),
(33, '2019-06-27 08:56:07'),
(34, '2019-06-27 08:57:33'),
(35, '2019-06-27 08:57:42'),
(36, '2019-06-27 08:58:16'),
(37, '2019-06-27 09:01:17'),
(38, '2019-06-27 09:01:28'),
(39, '2019-06-27 09:01:40'),
(40, '2019-06-27 09:01:51'),
(41, '2019-06-27 09:02:12'),
(42, '2019-06-27 09:03:25'),
(43, '2019-06-27 09:03:34'),
(44, '2019-06-27 09:03:54'),
(45, '2019-06-27 09:05:06'),
(46, '2019-06-27 09:05:13');

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
('001', 'ขมิ้นชัน', 'ED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 698, 'ขาย'),
('002', 'จันทลิลา', 'NED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 61, 'ขาย'),
('003', 'ธาตุบรรจบ', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 32, 'เลิกขาย'),
('004', 'บอระเพ็ด', 'NED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 116, 'เลิกขาย'),
('005', 'เบาหวาน', 'NED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 484, 'ขาย'),
('006', 'ประสระไพล', 'ED', '250 mg', '50 เม็ด', 23.53, 50, 42.5, 957, 'ขาย'),
('007', 'ฟ้าทลายโจร', 'ED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 2746, 'ขาย'),
('008', 'มะระขี้นก', 'ED', '250 mg', '50 แคปซูล', 26.6, 50, 42.5, 81, 'ขาย'),
('009', 'ริดสีดวงทวาร', 'ED', '250 mg', '50 แคปซูล', 25.14, 50, 42.5222, 0, 'ขาย'),
('010', 'สหัสธารา', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 168, 'ขาย'),
('011', 'อัมฤควาที', 'ED', '250 mg', '50 เม็ด', 23.52, 50, 42.5, 1123082, 'ขาย'),
('012', 'อินทรจักร', 'ED', '250 mg', '50 เม็ด', 24.15, 50, 42.5, 127, 'ขาย'),
('013', 'ปราบชมพูทวีป', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 162, 'ขาย'),
('014', 'ปลูกไฟชาตุ', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 92, 'ขาย'),
('015', 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 7098, 'ขาย'),
('016', 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.13, 90, 74.5, 99, 'ขาย'),
('017', 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 40, 'ขาย'),
('018', 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 500, 'เลิกขาย'),
('019', 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 698, 'ขาย'),
('020', 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 100, 'ขาย'),
('021', 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 201, 'ขาย'),
('022', 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.63, 90, 74.5, 501, 'ขาย'),
('023', 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.74, 90, 74.5, 400, 'ขาย'),
('024', 'สหัสธารา', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 100, 'ขาย'),
('025', 'อัมฤควาที', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 100, 'ขาย'),
('026', 'อิททรจักร', 'ED', '250 mg', '100 เม็ด', 52.75, 90, 74.5, 100, 'ขาย'),
('027', 'พลทิพย์', 'ED', 'ระบุไม่ได้', '50 เม็ด', 15.53, 25, 20, 0, 'ขาย'),
('028', 'พลทิพย์', 'ED', '3 กรัม', 'ระบุไม่ได้', 7.28, 13, 10.5, 0, 'ขาย'),
('029', 'ขมิ้นซอง', 'ED', '', '20 กรัม', 19, 30, 24, 0, 'ขาย'),
('030', 'ยาหอมนวโกฐ', 'ED', 'ระบุไม่ได้', '15 กรัม', 23.27, 35, 29, 0, 'ขาย'),
('031', 'ยาชงชุมเห็ดเทศ', '', '2 g', '20 กรัม', 24.27, 35, 29, 0, 'ขาย'),
('032', 'ยาชงรางจืด', 'ED', '2 g', '20 กรัม', 26.02, 40, 35, 0, 'ขาย'),
('033', 'ยาธาตุอบเชย', 'ED', 'ระบุไม่ได้', '240 ml', 24.72, 35, 29, 0, 'ขาย'),
('034', 'ขี้ผึ่งไพลเล็ก', 'ED', '15 กรัม', '30% W/W', 11.72, 25, 20, 0, 'ขาย'),
('035', 'ขี้ผึ่งไพลใหญ่', 'ED', '30% W/W', '60 กรัม', 34.29, 55, 45, 0, 'ขาย'),
('036', 'ลูกประคบ', 'ED', 'ระบุไม่ได้', '150 กรัม', 24.7, 55, 45, 0, 'ขาย'),
('037', 'ลูกประคบจิ๋ว', 'ED', 'ระบุไม่ได้', '50 กรัม', 20.36, 50, 41, 0, 'ขาย'),
('038', 'ทดสอบ', 'ED', '22 mf', '22 d', 2, 2, 2, 2, 'ขาย'),
('039', 'เทส', 'ED', '123 d', '5 m', 24, 52, 32, 12, 'ขาย'),
('040', 'ฟไก', 'ED', '123 mf', '123 d', 123, 123, 123, 123, 'ขาย'),
('041', 'ไไก', 'ED', '250 mg', '50 เม็ด', 1, 1, 1, 1, 'ขาย'),
('042', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 3, 3, 3, 3, 'ขาย'),
('043', 'ก', 'ED', '250 mg', '50 เม็ด', 5, 5, 5, 5, 'ขาย'),
('044', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 1, 1, 1, 2, 'ขาย'),
('045', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 3, 3, 3, 3, 'ขาย'),
('046', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 3, 3, 3, 3, 'ขาย'),
('047', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 2, 2, 2, 2, 'เลิกขาย'),
('048', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 2, 2, 2, 4, 'ขาย'),
('049', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 4, 4, 4, 4, 'ขาย'),
('050', 'หนเ่หี', 'ED', '250 mg', '50 เม็ด', 5, 5, 5, 2, 'ขาย');

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
(1, '2019-06-25 10:45:19', '002', 20, ''),
(2, '2019-06-25 01:27:48', '002', 20, ''),
(3, '2019-06-25 01:28:58', '005', 20, ''),
(4, '2019-06-25 01:55:48', '001', 1000, ''),
(5, '2019-06-27 09:07:48', '001', 1, 'someone');

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
