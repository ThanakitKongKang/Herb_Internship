-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 04:10 AM
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
(51, '001', 4, 50, 27.85, 'sdn01'),
(52, '001', 1, 50, 27.85, 'sdn01'),
(51, '002', 5, 50, 27.85, 'sdn01'),
(52, '002', 2, 50, 27.85, 'sdn01'),
(51, '005', 8, 50, 27.21, 'sdn01'),
(52, '005', 2, 50, 27.21, 'sdn01'),
(52, '006', 4, 50, 23.53, 'sdn01'),
(52, '007', 1, 50, 24.71, 'sdn01');

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
(51, '2019-06-27 01:19:18'),
(52, '2019-06-27 01:52:39');

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
('001', 'ขมิ้นชัน', 'ED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 711, 'ขาย'),
('002', 'จันทลิลา', 'NED', '250 mg', '50 แคปซูล', 27.85, 50, 42.5, 50, 'ขาย'),
('003', 'ธาตุบรรจบ', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 32, 'เลิกขาย'),
('004', 'บอระเพ็ด', 'NED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 116, 'เลิกขาย'),
('005', 'เบาหวาน', 'NED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 470, 'ขาย'),
('006', 'ประสระไพล', 'ED', '250 mg', '50 เม็ด', 23.53, 50, 42.5, 952, 'ขาย'),
('007', 'ฟ้าทลายโจร', 'ED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 2747, 'ขาย'),
('008', 'มะระขี้นก', 'ED', '250 mg', '50 แคปซูล', 26.6, 50, 42.5, 83, 'ขาย'),
('009', 'ริดสีดวงทวาร', 'ED', '250 mg', '50 แคปซูล', 25.14, 50, 42.5222, 2, 'ขาย'),
('010', 'สหัสธารา', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 171, 'ขาย'),
('011', 'อัมฤควาที', 'ED', '250 mg', '50 เม็ด', 23.52, 50, 42.5, 1123083, 'ขาย'),
('012', 'อินทรจักร', 'ED', '250 mg', '50 เม็ด', 24.15, 50, 42.5, 128, 'ขาย'),
('013', 'ปราบชมพูทวีป', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 163, 'ขาย'),
('014', 'ปลูกไฟชาตุ', 'ED', '250 mg', '50 แคปซูล', 29.19, 50, 42.5, 93, 'ขาย'),
('015', 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 7099, 'ขาย'),
('016', 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.13, 90, 74.5, 101, 'ขาย'),
('017', 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 41, 'ขาย'),
('018', 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 500, 'เลิกขาย'),
('019', 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 699, 'ขาย'),
('020', 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 100, 'ขาย'),
('021', 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 203, 'ขาย'),
('022', 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.63, 90, 74.5, 502, 'ขาย'),
('023', 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.74, 90, 74.5, 401, 'ขาย'),
('024', 'สหัสธารา', 'ED', '250 mg', '100 แคปซูล', 58.88, 90, 74.5, 100, 'ขาย'),
('025', 'อัมฤควาที', 'ED', '250 mg', '100 เม็ด', 51.5, 90, 74.5, 100, 'ขาย'),
('026', 'อิททรจักร', 'ED', '250 mg', '100 เม็ด', 52.75, 90, 74.5, 102, 'ขาย'),
('027', 'พลทิพย์', 'ED', 'ระบุไม่ได้', '50 เม็ด', 15.53, 25, 20, 1, 'ขาย'),
('028', 'พลทิพย์', 'ED', '3 กรัม', 'ระบุไม่ได้', 7.28, 13, 10.5, 2, 'ขาย'),
('029', 'ขมิ้นซอง', 'ED', '', '20 กรัม', 19, 30, 24, 1, 'ขาย'),
('030', 'ยาหอมนวโกฐ', 'ED', 'ระบุไม่ได้', '15 กรัม', 23.27, 35, 29, 5, 'ขาย'),
('031', 'ยาชงชุมเห็ดเทศ', '', '2 g', '20 กรัม', 24.27, 35, 29, 1, 'ขาย'),
('032', 'ยาชงรางจืด', 'ED', '2 g', '20 กรัม', 26.02, 40, 35, 0, 'ขาย'),
('033', 'ยาธาตุอบเชย', 'ED', 'ระบุไม่ได้', '240 ml', 24.72, 35, 29, 0, 'ขาย'),
('034', 'ขี้ผึ่งไพลเล็ก', 'ED', '15 กรัม', '30% W/W', 11.72, 25, 20, 0, 'ขาย'),
('035', 'ขี้ผึ่งไพลใหญ่', 'ED', '30% W/W', '60 กรัม', 34.29, 55, 45, 1, 'ขาย'),
('036', 'ลูกประคบ', 'ED', 'ระบุไม่ได้', '150 กรัม', 24.7, 55, 45, 3, 'ขาย'),
('037', 'ลูกประคบจิ๋ว', 'ED', 'ระบุไม่ได้', '50 กรัม', 20.36, 50, 41, 2, 'ขาย'),
('038', 'ทดสอบ', 'ED', '22 mf', '22 d', 2, 2, 2, 3, 'ขาย'),
('039', 'เทส', 'ED', '123 d', '5 m', 24, 52, 32, 12, 'ขาย'),
('040', 'ฟไก', 'ED', '123 mf', '123 d', 123, 123, 123, 125, 'ขาย'),
('041', 'ไไก', 'ED', '250 mg', '50 เม็ด', 1, 1, 1, 2, 'ขาย'),
('042', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 3, 3, 3, 8, 'ขาย'),
('043', 'ก', 'ED', '250 mg', '50 เม็ด', 5, 5, 5, 7, 'ขาย'),
('044', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 1, 1, 1, 6, 'ขาย'),
('045', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 3, 3, 3, 6, 'ขาย'),
('046', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 3, 3, 3, 8, 'ขาย'),
('047', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 2, 2, 2, 2, 'เลิกขาย'),
('048', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 2, 2, 2, 7, 'ขาย'),
('049', 'ฟไก', 'ED', '250 mg', '50 เม็ด', 4, 4, 4, 7, 'ขาย'),
('050', 'หนเ่หี', 'ED', '250 mg', '50 เม็ด', 5, 5, 5, 4, 'ขาย');

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
(6, '2019-06-27 01:21:40', '001', 10, 'sdn01'),
(7, '2019-06-27 01:28:42', '001', 1, 'sdn01'),
(8, '2019-06-27 01:28:42', '002', 1, 'sdn01'),
(9, '2019-06-27 01:28:42', '006', 1, 'sdn01'),
(10, '2019-06-27 01:28:42', '005', 1, 'sdn01'),
(11, '2019-06-27 01:28:42', '008', 1, 'sdn01'),
(12, '2019-06-27 01:28:42', '007', 1, 'sdn01'),
(13, '2019-06-27 01:28:42', '009', 1, 'sdn01'),
(14, '2019-06-27 01:28:42', '010', 2, 'sdn01'),
(15, '2019-06-27 01:28:42', '011', 1, 'sdn01'),
(16, '2019-06-27 01:28:42', '012', 1, 'sdn01'),
(17, '2019-06-27 01:28:42', '013', 1, 'sdn01'),
(18, '2019-06-27 01:28:42', '016', 1, 'sdn01'),
(19, '2019-06-27 01:28:42', '017', 1, 'sdn01'),
(20, '2019-06-27 01:28:43', '019', 1, 'sdn01'),
(21, '2019-06-27 01:28:43', '050', 1, 'sdn01'),
(22, '2019-06-27 01:28:43', '049', 1, 'sdn01'),
(23, '2019-06-27 01:28:43', '048', 1, 'sdn01'),
(24, '2019-06-27 01:28:43', '046', 1, 'sdn01'),
(25, '2019-06-27 01:28:43', '045', 1, 'sdn01'),
(26, '2019-06-27 01:28:43', '044', 1, 'sdn01'),
(27, '2019-06-27 01:28:43', '043', 1, 'sdn01'),
(28, '2019-06-27 01:28:43', '042', 1, 'sdn01'),
(29, '2019-06-27 01:28:43', '037', 1, 'sdn01'),
(30, '2019-06-27 01:28:43', '038', 1, 'sdn01'),
(31, '2019-06-27 01:28:43', '036', 2, 'sdn01'),
(32, '2019-06-27 01:29:02', '001', 1, 'sdn01'),
(33, '2019-06-27 01:29:02', '002', 1, 'sdn01'),
(34, '2019-06-27 01:29:02', '005', 1, 'sdn01'),
(35, '2019-06-27 01:29:02', '007', 2, 'sdn01'),
(36, '2019-06-27 01:29:03', '008', 1, 'sdn01'),
(37, '2019-06-27 01:29:03', '006', 1, 'sdn01'),
(38, '2019-06-27 01:29:03', '009', 1, 'sdn01'),
(39, '2019-06-27 01:29:03', '010', 1, 'sdn01'),
(40, '2019-06-27 01:29:03', '015', 1, 'sdn01'),
(41, '2019-06-27 01:29:03', '014', 1, 'sdn01'),
(42, '2019-06-27 01:29:03', '016', 1, 'sdn01'),
(43, '2019-06-27 01:29:03', '023', 1, 'sdn01'),
(44, '2019-06-27 01:29:03', '022', 1, 'sdn01'),
(45, '2019-06-27 01:29:03', '021', 2, 'sdn01'),
(46, '2019-06-27 01:29:03', '030', 1, 'sdn01'),
(47, '2019-06-27 01:29:03', '027', 1, 'sdn01'),
(48, '2019-06-27 01:29:03', '026', 1, 'sdn01'),
(49, '2019-06-27 01:29:03', '037', 1, 'sdn01'),
(50, '2019-06-27 01:29:03', '036', 1, 'sdn01'),
(51, '2019-06-27 01:29:03', '035', 1, 'sdn01'),
(52, '2019-06-27 01:29:03', '042', 1, 'sdn01'),
(53, '2019-06-27 01:29:03', '044', 1, 'sdn01'),
(54, '2019-06-27 01:29:13', '050', 1, 'sdn01'),
(55, '2019-06-27 01:29:13', '049', 1, 'sdn01'),
(56, '2019-06-27 01:29:13', '048', 1, 'sdn01'),
(57, '2019-06-27 01:29:13', '045', 1, 'sdn01'),
(58, '2019-06-27 01:29:13', '046', 2, 'sdn01'),
(59, '2019-06-27 01:29:13', '044', 1, 'sdn01'),
(60, '2019-06-27 01:29:13', '043', 1, 'sdn01'),
(61, '2019-06-27 01:29:13', '042', 1, 'sdn01'),
(62, '2019-06-27 01:29:13', '040', 1, 'sdn01'),
(63, '2019-06-27 01:29:22', '049', 1, 'sdn01'),
(64, '2019-06-27 01:29:22', '048', 1, 'sdn01'),
(65, '2019-06-27 01:29:22', '046', 2, 'sdn01'),
(66, '2019-06-27 01:29:22', '044', 1, 'sdn01'),
(67, '2019-06-27 01:29:22', '042', 2, 'sdn01'),
(68, '2019-06-27 01:29:22', '045', 1, 'sdn01'),
(69, '2019-06-27 01:29:22', '041', 1, 'sdn01'),
(70, '2019-06-27 01:29:22', '040', 1, 'sdn01'),
(71, '2019-06-27 01:29:22', '031', 1, 'sdn01'),
(72, '2019-06-27 01:29:22', '030', 4, 'sdn01'),
(73, '2019-06-27 01:29:22', '029', 1, 'sdn01'),
(74, '2019-06-27 01:29:22', '028', 2, 'sdn01'),
(75, '2019-06-27 01:29:22', '026', 1, 'sdn01');

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
