-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 06:34 AM
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
  `order_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `order_count`, `order_price`, `order_cost`) VALUES
(193, '001', 123, 50.025, 0),
(195, '001', 1, 50.025, 0),
(193, '005', 1, 50, 27.21),
(195, '005', 1, 50, 27.21),
(195, '006', 1, 50, 23.530000686645508),
(195, '011', 1, 50, 23.520000457763672),
(195, '012', 1, 50, 24.155),
(195, '013', 1, 50, 29.190000534057617),
(194, '014', 1, 50, 29.190000534057617);

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
(191, '2019-06-24 11:30:51'),
(192, '2019-06-24 11:31:12'),
(193, '2019-06-24 11:33:13'),
(194, '2019-06-24 11:33:41'),
(195, '2019-06-24 11:34:20'),
(196, '2019-06-24 11:34:30');

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
('001', 'ขมิ้นชัน', 'ED', '250 mg', '50 แคปซูล', 0, 50.025, 42.5111, 593, 'ขาย'),
('002', 'จันทลิลา', 'ED', '250 mg', '50  แคปซูล', 27.85, 50, 42.5, 2491, 'เลิกขาย'),
('003', 'ธาตุบรรจบ', 'ED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 32, 'เลิกขาย'),
('004', 'บอระเพ็ด', 'NED', '250 mg', '50 แคปซูล', 24.71, 50, 42.5, 116, 'เลิกขาย'),
('005', 'เบาหวาน', 'NED', '250 mg', '50 แคปซูล', 27.21, 50, 42.5, 194, 'ขาย'),
('006', 'ประสระไพล', 'ED', '250 mg', '50 เม็ด', 23.530000686645508, 50, 42.5, 1039, 'ขาย'),
('007', 'ฟ้าทลายโจร', 'ED', '250 mg', '50 แคปซูล', 24.719999313354492, 50, 42.5, 3144, 'ขาย'),
('008', 'มะระขี้นก', 'ED', '250 mg', '50 แคปซูล', 26.600000381469727, 50, 42.5, 96, 'ขาย'),
('009', 'ริดสีดวงทวาร', 'ED', '250 mg', '50 แคปซูล', 25.14, 50, 42.5222, 95, 'ขาย'),
('010', 'สหัสธารา', 'ED', '250 mg', '50 แคปซูล', 27.219999313354492, 50, 42.5, 186, 'ขาย'),
('011', 'อัมฤควาที', 'ED', '250 mg', '50 เม็ด', 23.520000457763672, 50, 42.5, 1123137, 'ขาย'),
('012', 'อินทรจักร', 'ED', '250 mg', '50 เม็ด', 24.155, 50, 42.5, 129, 'ขาย'),
('013', 'ปราบชมพูทวีป', 'ED', '250 mg', '50 แคปซูล', 29.190000534057617, 50, 42.5, 164, 'ขาย'),
('014', 'ปลูกไฟชาตุ', 'ED', '250 mg', '50 แคปซูล', 29.190000534057617, 50, 42.5, 97, 'ขาย'),
('015', 'ขมิ้นชัน', 'ED', '250 mg', '100 แคปซูล', 53.880001068115234, 90, 74.5, 7100, 'ขาย'),
('016', 'จันทลิลา', 'ED', '250 mg', '100 แคปซูล', 60.13999938964844, 90, 74.5, 100, 'ขาย'),
('017', 'ธาตุบรรจบ', 'ED', '250 mg', '100 แคปซูล', 58.88999938964844, 90, 74.5, 41, 'ขาย'),
('018', 'บอระเพ็ด', 'NED', '250 mg', '100 แคปซูล', 53.88, 90, 74.5, 500, 'เลิกขาย'),
('019', 'เบาหวาน', 'NED', '250 mg', '100 แคปซูล', 58.88999938964844, 90, 74.5, 700, 'ขาย'),
('020', 'ประสระไพล', 'ED', '250 mg', '100 เม็ด', 51.5099983215332, 90, 74.5, 100, 'ขาย'),
('021', 'ฟ้าทลายโจร', 'ED', '250 mg', '100 แคปซูล', 53.88999938964844, 90, 74.5, 201, 'ขาย'),
('022', 'มะระขี้นก', 'ED', '250 mg', '100 แคปซูล', 57.63999938964844, 90, 74.5, 501, 'ขาย'),
('023', 'ริดสีดวงทวาร', 'ED', '250 mg', '100 แคปซูล', 54.7400016784668, 90, 74.5, 400, 'ขาย'),
('024', 'สหัสธารา', 'ED', '250 mg', '100 แคปซูล', 58.88999938964844, 90, 74.5, 100, 'ขาย'),
('025', 'อัมฤควาที', 'ED', '250 mg', '100 เม็ด', 51.5099983215332, 90, 74.5, 100, 'ขาย'),
('026', 'อิททรจักร', 'ED', '250 mg', '100 เม็ด', 52.7599983215332, 90, 74.5, 100, 'ขาย'),
('027', 'พลทิพย์', 'ED', 'ระบุไม่ได้', '50 เม็ด', 15.539999961853027, 25, 20, 0, 'ขาย'),
('028', 'พลทิพย์', 'ED', '3 กรัม', 'ระบุไม่ได้', 7.28000020980835, 13, 10.5, 0, 'ขาย'),
('029', 'ขมิ้นซอง', 'ED', '', '20 กรัม', 19, 30, 24, 0, 'ขาย'),
('030', 'ยาหอมนวโกฐ', 'ED', 'ระบุไม่ได้', '15 กรัม', 23.270000457763672, 35, 29, 0, 'ขาย'),
('031', 'ยาชงชุมเห็ดเทศ', '', '2 g', '20 กรัม', 24.270000457763672, 35, 29, 0, 'ขาย'),
('032', 'ยาชงรางจืด', 'ED', '2 g', '20 กรัม', 26.020000457763672, 40, 35, 0, 'ขาย'),
('033', 'ยาธาตุอบเชย', 'ED', 'ระบุไม่ได้', '240 ml', 24.729999542236328, 35, 29, 0, 'ขาย'),
('034', 'ขี้ผึ่งไพลเล็ก', 'ED', '15 กรัม', '30% W/W', 11.720000267028809, 25, 20, 0, 'ขาย'),
('035', 'ขี้ผึ่งไพลใหญ่', 'ED', '30% W/W', '60 กรัม', 34.290000915527344, 55, 45, 0, 'ขาย'),
('036', 'ลูกประคบ', 'ED', 'ระบุไม่ได้', '150 กรัม', 24.709999084472656, 55, 45, 0, 'ขาย'),
('037', 'ลูกประคบจิ๋ว', 'ED', 'ระบุไม่ได้', '50 กรัม', 20.360000610351562, 50, 41, 0, 'ขาย'),
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
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_detail`
--

INSERT INTO `stock_detail` (`stock_id`, `stock_date`, `product_id`, `stock`) VALUES
(57, '2019-06-21 02:20:07', '013', 123),
(58, '2019-06-21 02:20:26', '010', 123),
(59, '2019-06-24 10:21:13', '006', 7),
(60, '2019-06-24 10:21:13', '001', 1),
(61, '2019-06-24 10:21:13', '005', 2),
(62, '2019-06-24 10:21:13', '007', 3),
(63, '2019-06-24 10:21:13', '008', 8);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
