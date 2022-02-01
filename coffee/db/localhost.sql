-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2020 at 01:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db_coffee`
--
CREATE DATABASE IF NOT EXISTS `project_db_coffee` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_db_coffee`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_firstname` varchar(50) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_lastname` varchar(100) NOT NULL,
  `m_img` varchar(100) DEFAULT NULL,
  `m_address` varchar(255) NOT NULL,
  `m_phone` varchar(20) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_level` varchar(10) NOT NULL,
  `m_datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `m_username`, `m_password`, `m_firstname`, `m_name`, `m_lastname`, `m_img`, `m_address`, `m_phone`, `m_email`, `m_level`, `m_datesave`) VALUES
(2, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'นาย', 'staff', 'sales', '60233846320190205_103833.png', 'fdsadf', '0988884884', 'alice@devbanban.com', 'Staff', '2019-02-02 06:11:43'),
(4, '33', 'b6692ea5df920cad691c20319a6fffd7a4a766b8', 'นาย', 'test ', 'sedd', '168439433820190210_131026.png', 'adadfa  fdadf', '0988884884', 'user1@user.com', 'Member', '2019-02-05 03:26:00'),
(5, 'aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'นาย', 'aaaa', 'bnb ', 'p178267528820190205_103745.png', 'baaaa', '03333333', 'na@g.com', 'Admin', '2019-02-05 03:37:45'),
(6, 'member', '6467baa3b187373e3931422e2a8ef22f3e447d77', 'นาย', 'สมชาย', 'คนที่ 1', '146833355020190214_173641.png', '1212', '0999', 'na111@g.com', 'Member', '2019-02-07 03:24:42'),
(7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'นาย', 'admin', 'addmin', '34732332520190214_173230.png', '555', '55555', 'user1555@user.com', 'Admin', '2019-02-08 06:46:08'),
(8, 'm2', '32d332da761f44df7959e5887b6b94cb4667d781', 'นาย', 'm2', 'm20', 'p8068249320190214_174144.png', 'bangkok', '02222', '002@test.com', 'Member', '2019-02-14 10:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `ref_m_id` int(11) NOT NULL DEFAULT 0,
  `ref_s_id` int(11) NOT NULL,
  `order_date_rev` date NOT NULL,
  `order_time_rev` varchar(10) DEFAULT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `ref_m_id`, `ref_s_id`, `order_date_rev`, `order_time_rev`, `order_total`, `order_date`) VALUES
(0001, 8, 3, '2019-03-11', '16.00', 63.00, '2019-03-11 11:16:21'),
(0002, 8, 3, '2019-03-11', '13.00', 154.00, '2019-03-11 11:16:56'),
(0003, 8, 3, '2019-03-11', '13.00', 100.00, '2019-03-11 11:21:51'),
(0004, 8, 3, '2019-03-11', '11.00', 50.00, '2019-03-11 11:22:06'),
(0005, 0, 3, '2019-03-11', '', 372.00, '2019-03-11 11:33:25'),
(0006, 6, 3, '2019-03-11', '', 558.00, '2019-03-11 11:33:46'),
(0007, 8, 3, '2019-03-14', '16.00', 130.00, '2019-03-14 16:40:15'),
(0008, 6, 3, '2019-03-14', '', 335.00, '2019-03-14 16:40:45'),
(0009, 6, 3, '2019-03-14', '', 737.00, '2019-03-14 16:41:55'),
(0010, 8, 3, '2019-03-19', '16.00', 175.00, '2019-03-19 11:44:55'),
(0011, 8, 3, '2019-03-19', '', 348.00, '2019-03-19 11:45:43'),
(0012, 0, 3, '2019-03-19', '', 40.00, '2019-03-19 11:45:57'),
(0013, 6, 3, '2020-01-29', '', 247.00, '2020-01-29 16:16:01'),
(0014, 5, 3, '2020-01-29', '19.00', 63.00, '2020-01-29 16:24:09'),
(0015, 0, 3, '2020-01-29', '', 206.25, '2020-01-29 16:44:13'),
(0016, 0, 3, '2020-01-29', '', 70.00, '2020-01-29 16:44:31'),
(0017, 6, 3, '2020-01-30', '', 757.75, '2020-01-30 12:40:36'),
(0018, 6, 3, '2020-01-30', '', 200.00, '2020-01-30 12:44:25'),
(0019, 6, 3, '2020-01-30', '18.00', 100.00, '2020-01-30 12:45:32'),
(0020, 6, 3, '2020-02-10', '', 322.50, '2020-02-10 15:27:39'),
(0021, 0, 3, '2020-03-15', '', 114.75, '2020-03-15 18:55:25'),
(0022, 0, 3, '2020-03-15', '', 113.75, '2020-03-15 18:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_log`
--

CREATE TABLE `tbl_orders_log` (
  `l_id` int(11) NOT NULL,
  `ref_order_id` int(11) NOT NULL,
  `ref_m_id` int(11) NOT NULL,
  `l_date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ประวัติ พนง. ที่รับ order';

--
-- Dumping data for table `tbl_orders_log`
--

INSERT INTO `tbl_orders_log` (`l_id`, `ref_order_id`, `ref_m_id`, `l_date_save`) VALUES
(1, 4, 8, '2019-03-11 04:30:53'),
(2, 2, 8, '2019-03-11 04:31:09'),
(3, 3, 8, '2019-03-11 04:31:20'),
(4, 5, 2, '2019-03-11 04:33:25'),
(5, 6, 2, '2019-03-11 04:33:46'),
(6, 8, 2, '2019-03-14 09:40:45'),
(7, 7, 8, '2019-03-14 09:40:56'),
(8, 1, 8, '2019-03-14 09:41:05'),
(9, 9, 2, '2019-03-14 09:41:55'),
(10, 10, 8, '2019-03-19 04:45:26'),
(11, 11, 2, '2019-03-19 04:45:43'),
(12, 12, 2, '2019-03-19 04:45:57'),
(13, 13, 2, '2020-01-29 09:16:01'),
(14, 14, 5, '2020-01-29 09:42:08'),
(15, 15, 2, '2020-01-29 09:44:13'),
(16, 16, 2, '2020-01-29 09:44:31'),
(17, 17, 2, '2020-01-30 05:40:36'),
(18, 18, 2, '2020-01-30 05:44:25'),
(19, 19, 6, '2020-01-30 05:46:26'),
(20, 20, 2, '2020-02-10 08:27:39'),
(21, 21, 2, '2020-03-15 11:55:25'),
(22, 22, 2, '2020-03-15 11:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(11) NOT NULL,
  `ref_order_id` int(11) NOT NULL,
  `ref_op_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_price_total` float(10,2) NOT NULL,
  `d_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `ref_order_id`, `ref_op_id`, `d_qty`, `d_price_total`, `d_date`) VALUES
(1, 1, 6, 1, 63.00, '2019-03-11'),
(2, 2, 38, 1, 30.00, '2019-03-11'),
(3, 2, 3, 1, 70.00, '2019-03-11'),
(4, 2, 8, 1, 54.00, '2019-03-11'),
(5, 1, 6, 1, 63.00, '2019-03-10'),
(6, 2, 38, 1, 30.00, '2019-03-10'),
(7, 2, 3, 1, 70.00, '2019-03-11'),
(8, 2, 8, 1, 54.00, '2019-03-10'),
(9, 3, 35, 1, 50.00, '2019-03-11'),
(10, 3, 27, 1, 30.00, '2019-03-11'),
(11, 3, 26, 1, 20.00, '2019-03-11'),
(12, 4, 35, 1, 50.00, '2019-03-10'),
(13, 5, 38, 1, 30.00, '2019-03-11'),
(14, 5, 37, 1, 20.00, '2019-03-11'),
(15, 5, 36, 1, 20.00, '2019-03-11'),
(16, 5, 29, 1, 50.00, '2019-03-11'),
(17, 5, 30, 1, 60.00, '2019-03-11'),
(18, 5, 31, 1, 75.00, '2019-03-11'),
(19, 5, 5, 1, 54.00, '2019-03-11'),
(20, 5, 6, 1, 63.00, '2019-03-11'),
(21, 6, 34, 3, 300.00, '2019-03-11'),
(22, 6, 33, 1, 80.00, '2019-03-11'),
(23, 6, 32, 1, 70.00, '2019-03-11'),
(24, 6, 5, 1, 54.00, '2019-03-11'),
(25, 6, 8, 1, 54.00, '2019-03-11'),
(26, 7, 34, 1, 100.00, '2019-03-14'),
(27, 7, 27, 1, 30.00, '2019-03-14'),
(28, 8, 36, 1, 20.00, '2019-03-14'),
(29, 8, 37, 1, 20.00, '2019-03-14'),
(30, 8, 38, 1, 30.00, '2019-03-14'),
(31, 8, 32, 1, 70.00, '2019-03-14'),
(32, 8, 31, 1, 75.00, '2019-03-14'),
(33, 8, 29, 1, 50.00, '2019-03-14'),
(34, 8, 26, 1, 20.00, '2019-03-14'),
(35, 8, 35, 1, 50.00, '2019-03-14'),
(36, 9, 35, 1, 50.00, '2019-03-14'),
(37, 9, 14, 2, 108.00, '2019-03-14'),
(38, 9, 31, 2, 150.00, '2019-03-14'),
(39, 9, 32, 1, 70.00, '2019-03-14'),
(40, 9, 33, 1, 80.00, '2019-03-14'),
(41, 9, 34, 1, 100.00, '2019-03-14'),
(42, 9, 8, 1, 54.00, '2019-03-14'),
(43, 9, 7, 1, 45.00, '2019-03-14'),
(44, 9, 37, 1, 20.00, '2019-03-14'),
(45, 9, 30, 1, 60.00, '2019-03-14'),
(46, 10, 34, 1, 100.00, '2019-03-19'),
(47, 10, 31, 1, 75.00, '2019-03-19'),
(48, 11, 29, 1, 50.00, '2019-03-19'),
(49, 11, 31, 1, 75.00, '2019-03-19'),
(50, 11, 26, 1, 20.00, '2019-03-19'),
(51, 11, 3, 1, 70.00, '2019-03-19'),
(52, 11, 9, 1, 63.00, '2019-03-19'),
(53, 11, 32, 1, 70.00, '2019-03-19'),
(54, 12, 37, 1, 20.00, '2019-03-19'),
(55, 12, 36, 1, 20.00, '2019-03-19'),
(56, 13, 36, 1, 20.00, '2020-01-29'),
(57, 13, 37, 1, 20.00, '2020-01-29'),
(58, 13, 7, 1, 45.00, '2020-01-29'),
(59, 13, 8, 1, 54.00, '2020-01-29'),
(60, 13, 9, 1, 63.00, '2020-01-29'),
(61, 13, 13, 1, 45.00, '2020-01-29'),
(62, 14, 15, 1, 63.00, '2020-01-29'),
(63, 15, 29, 1, 42.50, '2020-01-29'),
(64, 15, 3, 1, 70.00, '2020-01-29'),
(65, 15, 31, 1, 63.75, '2020-01-29'),
(66, 15, 38, 1, 30.00, '2020-01-29'),
(67, 16, 26, 1, 20.00, '2020-01-29'),
(68, 16, 35, 1, 50.00, '2020-01-29'),
(69, 17, 36, 1, 20.00, '2020-01-30'),
(70, 17, 8, 1, 54.00, '2020-01-30'),
(71, 17, 31, 1, 63.75, '2020-01-30'),
(72, 17, 3, 1, 70.00, '2020-01-30'),
(73, 17, 35, 11, 550.00, '2020-01-30'),
(74, 18, 34, 1, 100.00, '2020-01-30'),
(75, 18, 1, 1, 50.00, '2020-01-30'),
(76, 18, 35, 1, 50.00, '2020-01-30'),
(77, 19, 34, 1, 100.00, '2020-01-30'),
(78, 20, 29, 1, 42.50, '2020-02-10'),
(79, 20, 34, 1, 100.00, '2020-02-10'),
(80, 20, 32, 1, 70.00, '2020-02-10'),
(81, 20, 35, 1, 50.00, '2020-02-10'),
(82, 20, 2, 1, 60.00, '2020-02-10'),
(83, 21, 31, 1, 63.75, '2020-03-15'),
(84, 21, 30, 1, 51.00, '2020-03-15'),
(85, 22, 31, 1, 63.75, '2020-03-15'),
(86, 22, 1, 1, 50.00, '2020-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL,
  `ref_m_id` int(11) NOT NULL,
  `ref_b_id` int(11) NOT NULL,
  `pay_amount` float(10,2) NOT NULL,
  `pay_slip` varchar(200) CHARACTER SET latin1 NOT NULL,
  `pay_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `ref_t_id` int(11) NOT NULL COMMENT 'tbl_product_type',
  `p_promotion` int(1) NOT NULL DEFAULT 0 COMMENT 'ถ้าเป็น 1 คือสินค้าโปรโมชั่น',
  `ref_m_id` int(11) NOT NULL COMMENT 'tbl_member',
  `p_name` varchar(200) NOT NULL,
  `p_flavour` varchar(300) NOT NULL COMMENT 'รสชาติ',
  `p_detail` text NOT NULL,
  `p_price` float(10,2) NOT NULL DEFAULT 0.00,
  `p_price_sales` float(10,2) NOT NULL DEFAULT 0.00 COMMENT 'สินค้าลดราคา',
  `p_discount` int(5) NOT NULL COMMENT 'ส่วนลด %',
  `p_unit` varchar(20) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `ref_t_id`, `p_promotion`, `ref_m_id`, `p_name`, `p_flavour`, `p_detail`, `p_price`, `p_price_sales`, `p_discount`, `p_unit`, `p_img`, `p_qty`, `p_datesave`) VALUES
(3, 1, 0, 0, 'Cappuccino', 'หวาน นุ่ม อร่อย', '<p>คือกาแฟที่มีรสแก่และเข้ม ซึ่งมีวิธีการชงโดยใช้แรงอัดไอน้ำหรือน้ำร้อนผ่านเมล็ดกาแฟคั่วที่บดละเอียด ที่มาของชื่อ เอสเพรสโซ มาจากคำภาษาอิตาลี &quot;espresso&quot; แปลว่า เร่งด่วน เอสเพรสโซเป็นกาแฟที่นิยมมากที่สุดในแถบประเทศยุโรปตอนใต้ โดยเฉพาะประเทศอิตาลีและฝรั่งเศส การสั่งกาแฟ &quot;caffe&quot; ในร้านโดยทั่วไปก็คือสั่งเอสเพรสโซ ด้วยวิธีการชงแบบใช้แรงอัด ทำให้เอสเพรสโซมีรสชาติกาแฟซึ่งเข้มข้นและหนักแน่น ต่างจากกาแฟทั่ว ๆ ไปซึ่งชงแบบผ่านน้ำหยด และเพราะรสชาติเข้มข้นและหนักแน่นอันเป็นเอกลักษณ์นี้เอง ทำให้คอกาแฟดื่มเอสเพรสโซโดยไม่ปรุงด้วยน้ำตาลหรือนม และมักจะเสิร์ฟเป็นชอต (แก้วแบบจอก) เพื่อให้ปริมาณไม่มากจนเกินไป(ประมาณ 1-2 ออนซ์ หรือ 30-60มิลลิลิตร แตกต่างตาม พฤติกรรมการดื่ม ของแต่ละประเทศ)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; การสั่งเอสเพรสโซตามร้านกาแฟทั่วไป มักสั่งตามปริมาณเป็น &quot;ซิงเกิ้ล&quot; หรือ &quot;ดับเบิ้ล&quot; (ชอตเดียว หรือ สองชอต) เอสเพรสโซมีความไวสูงในการทำปฏิกิริยากับออกซิเจน เพื่อไม่ให้เสียรสชาติจึงควรดื่มตอนชงเสร็จใหม่ ๆ ผงกาแฟที่ใช้ ขึ้นอยู่กับแต่ละระบบการชง ระบบการชงแบบแรงดันน้ำหรือแรงอัด จะต้องใช้ผงละเอียด แต่ไม่ถึงกับเป็นแป้ง (ขนาดของไซด์ผงกาแฟที่บด จะแปรผันตาม ระยะเวลาที่ทำกาแฟ อาทิ เครื่องชงแบบ เอสเพรสโซ่ เวลามาตราฐานอยู่ที่ 18-30 วินาที ก็ต้องใช้ ผงละเอียด แต่หากเป็นการชง ลักษณะอื่นๆ เช่น ชงโดยที่ชงแบบเฟรนช์เพรส ก็ต้องบดให้หยาบขึ้นและระยะเวลาที่ชงก็จะเพิ่มขึ้นตามลำดับ &lt;ยิ่งหยาบยิ่งต้องใช้เวลานานขึ้นในการชง&gt;)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ในการชงเอสเพรสโซ จะต้องควบคุมปัจจัยต่างๆ ที่มีผลต่อรสชาด อาทิ เมล็ดกาแฟที่ใช้ (สมควรเป็นเมล็ดกาแฟที่คั่ว เก็บมาไม่เกิน 1 เดือน),การบดกาแฟ (ขนาดของผงกาแฟที่บด ต้องสัมพันธ์ กับเครื่องชงและระยะเวลาการไหล ของกาแฟ ขณะชง) , น้ำที่ใช้ชงกาแฟ (คุณภาพเป็นน้ำที่ใช้ บริโภค ไม่ควรใช้น้ำสะอาดบริสุทธิ์ จนเกินไป เพราะ นอกจากไม่ได้รับ สารอาหารที่มากับน้ำ แล้วยังมีผลกระทบ ต่อรสชาด ด้วย) , ระยะเวลาในการชง (ดังที่กล่าวไว้ ในข้างต้น หากใช้เวลา การชงเอสเพรสโซ่ต่ำกว่า 18 วินาที หรือ underextract แสดงว่า การแพคกาแฟ ต่อชอต ไม่แน่นพอ หรือ ปริมาณผงกาแฟในชอต มีน้อยเกินไป หรือ ขนาดผงกาแฟหยาบเกินไป หากการหลั่นกาแฟเอสเพรสโซ่ นานเกินกว่า 30 วินาที จะมีผลทำให้เอสเพรสโซ่ที่ได้ มีรสขม bitter ไม่เข้ม มีกลิ่นไหม้ burn จากการชงแบบเครื่องอัด ศัพท์ฝรั่งเรียก overextract)</p>\r\n', 100.00, 0.00, 10, 'แก้ว', '178742607720190205_103921.jpg', 11, '2019-02-02 07:00:33'),
(6, 1, 1, 0, 'Espresso', 'หวาน นุ่ม อร่อย', '<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 20.00, 99.00, 10, 'แก้ว', '100575129920190205_103914.jpg', 11, '2019-02-02 07:00:33'),
(9, 1, 1, 0, 'Americano\r\n', 'หวาน นุ่ม อร่อย', '<h3><strong>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</strong></h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 80.00, 100.00, 10, 'แก้ว', '115251726020190205_144427.jpg', 10, '2019-02-05 07:44:27'),
(15, 2, 0, 7, 'วุ้นสีแดง', 'หวาน, หอม', '<p>วุ้นสีแดงวุ้นสีแดงวุ้นสีแดง</p>\r\n', 0.00, 0.00, 0, 'ถ้วย', '7395481520190225_104835.jpg', 0, '2019-02-25 03:48:35'),
(16, 2, 0, 7, 'วุ้นสีเขียว1', 'หวาน, หอม1', '<p>วุ้นสีเขียววุ้นสีเขียว1</p>\r\n', 0.00, 0.00, 0, 'ถ้วย', 'f121174851720190225_104916.jpg', 0, '2019-02-25 03:49:16'),
(17, 1, 1, 7, 'LATTE', 'หวาน, หอม', '<p>คือกาแฟที่มีรสแก่และเข้ม ซึ่งมีวิธีการชงโดยใช้แรงอัดไอน้ำหรือน้ำร้อนผ่านเมล็ดกาแฟคั่วที่บดละเอียด ที่มาของชื่อ เอสเพรสโซ มาจากคำภาษาอิตาลี &quot;espresso&quot; แปลว่า เร่งด่วน เอสเพรสโซเป็นกาแฟที่นิยมมากที่สุดในแถบประเทศยุโรปตอนใต้ โดยเฉพาะประเทศอิตาลีและฝรั่งเศส การสั่งกาแฟ &quot;caffe&quot; ในร้านโดยทั่วไปก็คือสั่งเอสเพรสโซ ด้วยวิธีการชงแบบใช้แรงอัด ทำให้เอสเพรสโซมีรสชาติกาแฟซึ่งเข้มข้นและหนักแน่น ต่างจากกาแฟทั่ว ๆ ไปซึ่งชงแบบผ่านน้ำหยด และเพราะรสชาติเข้มข้นและหนักแน่นอันเป็นเอกลักษณ์นี้เอง ทำให้คอกาแฟดื่มเอสเพรสโซโดยไม่ปรุงด้วยน้ำตาลหรือนม และมักจะเสิร์ฟเป็นชอต (แก้วแบบจอก) เพื่อให้ปริมาณไม่มากจนเกินไป(ประมาณ 1-2 ออนซ์ หรือ 30-60มิลลิลิตร แตกต่างตาม พฤติกรรมการดื่ม ของแต่ละประเทศ)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; การสั่งเอสเพรสโซตามร้านกาแฟทั่วไป มักสั่งตามปริมาณเป็น &quot;ซิงเกิ้ล&quot; หรือ &quot;ดับเบิ้ล&quot; (ชอตเดียว หรือ สองชอต) เอสเพรสโซมีความไวสูงในการทำปฏิกิริยากับออกซิเจน เพื่อไม่ให้เสียรสชาติจึงควรดื่มตอนชงเสร็จใหม่ ๆ ผงกาแฟที่ใช้ ขึ้นอยู่กับแต่ละระบบการชง ระบบการชงแบบแรงดันน้ำหรือแรงอัด จะต้องใช้ผงละเอียด แต่ไม่ถึงกับเป็นแป้ง (ขนาดของไซด์ผงกาแฟที่บด จะแปรผันตาม ระยะเวลาที่ทำกาแฟ อาทิ เครื่องชงแบบ เอสเพรสโซ่ เวลามาตราฐานอยู่ที่ 18-30 วินาที ก็ต้องใช้ ผงละเอียด แต่หากเป็นการชง ลักษณะอื่นๆ เช่น ชงโดยที่ชงแบบเฟรนช์เพรส ก็ต้องบดให้หยาบขึ้นและระยะเวลาที่ชงก็จะเพิ่มขึ้นตามลำดับ &lt;ยิ่งหยาบยิ่งต้องใช้เวลานานขึ้นในการชง&gt;)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ในการชงเอสเพรสโซ จะต้องควบคุมปัจจัยต่างๆ ที่มีผลต่อรสชาด อาทิ เมล็ดกาแฟที่ใช้ (สมควรเป็นเมล็ดกาแฟที่คั่ว เก็บมาไม่เกิน 1 เดือน),การบดกาแฟ (ขนาดของผงกาแฟที่บด ต้องสัมพันธ์ กับเครื่องชงและระยะเวลาการไหล ของกาแฟ ขณะชง) , น้ำที่ใช้ชงกาแฟ (คุณภาพเป็นน้ำที่ใช้ บริโภค ไม่ควรใช้น้ำสะอาดบริสุทธิ์ จนเกินไป เพราะ นอกจากไม่ได้รับ สารอาหารที่มากับน้ำ แล้วยังมีผลกระทบ ต่อรสชาด ด้วย) , ระยะเวลาในการชง (ดังที่กล่าวไว้ ในข้างต้น หากใช้เวลา การชงเอสเพรสโซ่ต่ำกว่า 18 วินาที หรือ underextract แสดงว่า การแพคกาแฟ ต่อชอต ไม่แน่นพอ หรือ ปริมาณผงกาแฟในชอต มีน้อยเกินไป หรือ ขนาดผงกาแฟหยาบเกินไป หากการหลั่นกาแฟเอสเพรสโซ่ นานเกินกว่า 30 วินาที จะมีผลทำให้เอสเพรสโซ่ที่ได้ มีรสขม bitter ไม่เข้ม มีกลิ่นไหม้ burn จากการชงแบบเครื่องอัด ศัพท์ฝรั่งเรียก overextract)</p>\r\n', 0.00, 0.00, 15, 'แก้ว', '126798917220190225_110423.jpg', 0, '2019-02-25 04:04:23'),
(18, 1, 0, 7, 'Americano a1', 'หวาน, หอม', '<p>คัฟแฟะอาเมรีคาโน หรือ กาเฟอาเมริกาโน คือเครื่องดื่มกาแฟชนิดหนึ่ง มีวิธีการชงโดยเติมน้ำร้อนผสมลงไปในเอสเปรสโซ การเจือจางเอสเปรสโซซึ่งเป็นกาแฟเข้มข้นด้วยน้ำร้อน ทำให้คัฟแฟะอาเมรีคาโนมีความแก่พอ ๆ กับกาแฟธรรมดา แต่มีกลิ่นและรสชาติที่เข้มที่มาจากเอสเปรสโซ</p>\r\n', 0.00, 0.00, 0, 'แก้ว', '8411912620190225_135635.jpg', 0, '2019-02-25 06:56:35'),
(19, 2, 0, 7, 'วุ้นแฟนซี', 'หวาน, หอม', '<p>วุ้นถือเป็นขนมที่โดนใจหลายๆ คน เพราะกินง่าย โดยเฉพาะวุ้นแฟนซี สีสวย แถมยังทำเป็นรูปร่างต่างๆ ได้หลากหลาย สามารถแต่งสี แต่งกลิ่น แต่งรสได้ตามชอบใจ ช่วงหลังเมนูวุ้นจึงถือเป็นเมนูขนมยอดฮิตมาแรงอีกชนิดหนึ่ง เพราะขั้นตอนการทำไม่ยุ่งยาก แถมยังสวยน่ารักโดนใจทั้งเด็กและผู้ใหญ่ รูปแบบของวุ้นแฟนซีในปัจจุบันจึงมีหลากหลายมากขึ้น วันนี้ OpenRice ขอรวบรวมเมนูวุ้นแฟนซียอดฮิตที่หลายๆ คนชอบทำ ชอบกิน มาเป็นไอเดียให้ไปลองทำตามกันดูค่ะ ทั้งวุ้นเป็ด วุ้นกุหลาบ วุ้นหยดน้ำ วุ้นลูกแก้ว และวุ้นอัญมณี ไม่ยากเกินความสามารถของเพื่อนๆ แน่นอนจ้า</p>\r\n', 0.00, 0.00, 0, 'ถ้วย', 'f106533583120190225_140101.jpg', 0, '2019-02-25 07:01:01'),
(22, 1, 0, 7, 'Americano 02', 'หวาน, หอม', '<p>คัฟแฟะอาเมรีคาโน หรือ กาเฟอาเมริกาโน คือเครื่องดื่มกาแฟชนิดหนึ่ง มีวิธีการชงโดยเติมน้ำร้อนผสมลงไปในเอสเปรสโซ การเจือจางเอสเปรสโซซึ่งเป็นกาแฟเข้มข้นด้วยน้ำร้อน ทำให้คัฟแฟะอาเมรีคาโนมีความแก่พอ ๆ กับกาแฟธรรมดา แต่มีกลิ่นและรสชาติที่เข้มที่มาจากเอสเปรสโซ</p>\r\n', 0.00, 0.00, 0, 'แก้ว', '8411912620190225_135635.jpg', 0, '2019-02-25 06:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_option`
--

CREATE TABLE `tbl_product_option` (
  `op_id` int(11) NOT NULL,
  `ref_p_id` int(11) NOT NULL,
  `op_name` varchar(100) NOT NULL COMMENT 'ร้อน, เย็น, ปั่น',
  `op_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_option`
--

INSERT INTO `tbl_product_option` (`op_id`, `ref_p_id`, `op_name`, `op_price`) VALUES
(1, 3, 'ร้อน', 50),
(2, 3, 'เย็น', 60),
(3, 3, 'ปั่น', 70),
(7, 9, 'ร้อน', 50),
(8, 9, 'เย็น', 60),
(9, 9, 'ปั่น', 70),
(10, 7, 'ร้อน', 50),
(11, 7, 'เย็น', 60),
(12, 7, 'ปั่น', 70),
(13, 6, 'ร้อน', 50),
(14, 6, 'เย็น', 60),
(15, 6, 'ปั่น', 70),
(16, 1, 'ร้อน', 50),
(17, 1, 'เย็น', 60),
(18, 1, 'ปั่น', 70),
(19, 14, '', 50),
(20, 5, '', 50),
(21, 4, 'ร้อน', 60),
(24, 4, 'เย็น', 60),
(25, 4, 'ปั่น', 65),
(26, 16, 'วุ้นสีเขียว1', 20),
(27, 15, 'วุ้นสีแดง', 30),
(28, 13, 'วุ้นเป็ด', 30),
(29, 17, 'ร้อน', 50),
(30, 17, 'เย็น', 60),
(31, 17, 'ปั่น', 75),
(32, 18, 'ร้อน', 70),
(33, 18, 'เย็น', 80),
(34, 18, 'ปั่น', 100),
(35, 19, 'วุ้นแฟนซี', 50),
(36, 22, 'ร้อน', 20),
(37, 22, 'เย็น', 20),
(38, 22, 'ปั่น', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_type`
--

INSERT INTO `tbl_product_type` (`t_id`, `t_name`) VALUES
(1, 'เครื่องดื่ม'),
(2, 'เมนูอร่อย');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`s_id`, `s_name`) VALUES
(1, 'รอดำเนินการ'),
(2, 'รอชำระเงิน/มารับ'),
(3, 'เสร็จสิ้น');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_orders_log`
--
ALTER TABLE `tbl_orders_log`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_product_option`
--
ALTER TABLE `tbl_product_option`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_orders_log`
--
ALTER TABLE `tbl_orders_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_product_option`
--
ALTER TABLE `tbl_product_option`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
