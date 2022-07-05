-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 10:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khao-yai_elephant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_area`
--

CREATE TABLE `tb_area` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name_ar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_area`
--

INSERT INTO `tb_area` (`id`, `province_id`, `name_ar`) VALUES
(2, 1, 'เมืองปราจีนบุรี'),
(3, 1, 'ประจันตคาม'),
(4, 1, 'กบินทร์บุรี'),
(5, 1, 'นาดี'),
(6, 2, 'บ้านนา'),
(7, 2, 'ปากพลี'),
(8, 2, 'เมืองนครนายก'),
(9, 3, 'ปากช่อง'),
(10, 3, 'วังน้ำเขียว'),
(11, 4, 'มวกเหล็ก'),
(12, 4, 'แก่งคอย');

-- --------------------------------------------------------

--
-- Table structure for table `tb_damage`
--

CREATE TABLE `tb_damage` (
  `id` int(11) NOT NULL,
  `damage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_damage`
--

INSERT INTO `tb_damage` (`id`, `damage`) VALUES
(1, 'ไม่พบความเสียหาย'),
(2, 'ทรัพย์สิน'),
(3, 'กล้วย'),
(4, 'อ้อย'),
(5, 'ข้าวโพด'),
(6, 'มะพร้าว'),
(7, 'ขนุน'),
(8, 'หมาก'),
(9, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elephant`
--

CREATE TABLE `tb_elephant` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_elephant`
--

INSERT INTO `tb_elephant` (`id`, `name`) VALUES
(1, 'พลายสาริกา'),
(2, 'พลายงาเดียว'),
(3, 'ช้างพลายมาใหม่'),
(4, 'พลายงาเดียว'),
(5, 'พลายด้วน'),
(6, 'พลายเบี่ยงเล็ก'),
(7, 'พลายแคระ'),
(8, 'พลายกอล์ฟ'),
(9, 'พลายบิด');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `id` int(11) NOT NULL,
  `name_ele` varchar(255) NOT NULL,
  `date` varchar(15) NOT NULL,
  `timeimg` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_province`
--

CREATE TABLE `tb_province` (
  `id` int(11) NOT NULL,
  `name_pr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_province`
--

INSERT INTO `tb_province` (`id`, `name_pr`) VALUES
(1, 'ปราจีนบุรี'),
(2, 'นครนายก'),
(3, 'นครราชสีมา'),
(4, 'สระบุรี');

-- --------------------------------------------------------

--
-- Table structure for table `tb_show`
--

CREATE TABLE `tb_show` (
  `id` int(11) NOT NULL,
  `name_user` text NOT NULL,
  `agency` varchar(20) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `province_name` varchar(20) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `subarea_name` varchar(20) NOT NULL,
  `num_ele` int(11) DEFAULT NULL,
  `ele_name` text NOT NULL,
  `location_in_x` text NOT NULL,
  `location_in_y` text NOT NULL,
  `location_out_x` text NOT NULL,
  `location_out_y` text NOT NULL,
  `location` text NOT NULL,
  `no_damage` text DEFAULT NULL,
  `property` text DEFAULT NULL,
  `banana` text DEFAULT NULL,
  `sugarcane` text DEFAULT NULL,
  `sweetcorn` text DEFAULT NULL,
  `coconut` text DEFAULT NULL,
  `jackfruit` text DEFAULT NULL,
  `mak` text DEFAULT NULL,
  `other` text DEFAULT NULL,
  `location_damage_N` int(20) DEFAULT NULL,
  `location_damage_E` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_subarea`
--

CREATE TABLE `tb_subarea` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `name_sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_subarea`
--

INSERT INTO `tb_subarea` (`id`, `area_id`, `name_sub`) VALUES
(11, 2, 'เนินหอม'),
(12, 2, 'ดงขี้เหล็ก'),
(13, 3, 'โพธิ์งาม'),
(14, 3, 'หนองแก้ว'),
(15, 3, 'บุฝ้าย'),
(16, 3, 'คำโตนด'),
(17, 4, 'นนทรี'),
(18, 4, 'นาแขม'),
(19, 5, 'สะพานหิน'),
(20, 5, 'นาดี'),
(21, 5, 'ทุ่งโพธิ์'),
(22, 5, 'บุพราหมณ์'),
(23, 6, 'เขาเพิ่ม'),
(24, 7, 'หนองแสง'),
(25, 7, 'นาหินลาด'),
(26, 8, 'สาริกา'),
(27, 8, 'หินตั้ง'),
(28, 8, 'เขาพระ'),
(29, 9, 'หมูสี'),
(30, 9, 'โป่งตาลอง'),
(31, 9, 'พญาเย็น'),
(32, 10, 'วังหมี'),
(33, 10, 'วังน้ำเขียว'),
(34, 11, 'มวกเหล็ก'),
(35, 11, 'มิตรภาพ'),
(36, 12, 'ชะอม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Agency` varchar(20) NOT NULL,
  `Rank` varchar(40) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `First_name`, `Last_name`, `UserName`, `Password`, `Agency`, `Rank`, `Status`) VALUES
(23, 'admin', '', 'admin@gmail.com', '12345678', 'เขาใหญ่', '', 'Admin'),
(24, 'วงศพัท', 'ฉัตรวิชัย', 'riew12345', '12345678', 'วิชาการ', 'น.ศ.ฝึกงาน', 'User'),
(26, 'ทัศนีย์', 'บุญเตี่ยม', 'thasanee', '12345678', 'ฝ่ายวิชาการ', 'นักศึกษาฝึกงาน', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `join_tb_area` (`province_id`);

--
-- Indexes for table `tb_damage`
--
ALTER TABLE `tb_damage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_elephant`
--
ALTER TABLE `tb_elephant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_province`
--
ALTER TABLE `tb_province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_show`
--
ALTER TABLE `tb_show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_show_province` (`province_name`),
  ADD KEY `tb_show_area` (`area_name`),
  ADD KEY `tb_show_subarea` (`subarea_name`);

--
-- Indexes for table `tb_subarea`
--
ALTER TABLE `tb_subarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `join_tb_subarea` (`area_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_damage`
--
ALTER TABLE `tb_damage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_elephant`
--
ALTER TABLE `tb_elephant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tb_province`
--
ALTER TABLE `tb_province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_show`
--
ALTER TABLE `tb_show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_subarea`
--
ALTER TABLE `tb_subarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD CONSTRAINT `join_tb_area` FOREIGN KEY (`province_id`) REFERENCES `tb_province` (`id`);

--
-- Constraints for table `tb_subarea`
--
ALTER TABLE `tb_subarea`
  ADD CONSTRAINT `join_tb_subarea` FOREIGN KEY (`area_id`) REFERENCES `tb_area` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
