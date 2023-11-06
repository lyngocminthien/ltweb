-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 10:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlchdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `User` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sdt` varchar(10) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `LoaiTK` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`User`, `Pass`, `HoTen`, `Email`, `Sdt`, `DiaChi`, `LoaiTK`) VALUES
('anthanh', '123', 'An Thành', 'anthanh@email.com', '0479301331', 'long an', 0),
('boo', '123', 'emboo', 'emboo@gmail.com', '0095977593', 'cần thơ', 1),
('minhthien', '123', 'Lý Ngọc Minh Thiện', 'minhthien@gmail.com', '077589390', 'Cần Thơ', 0),
('ngoccam', '123', 'Đinh Thị Ngọc Cầm', 'ngoccam@gmail.com', '006573831', 'Sóc Trăng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCTDH` int(11) NOT NULL,
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TenSP` varchar(1000) NOT NULL,
  `Hinh` varchar(500) NOT NULL,
  `NgayDatDon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaCTDH`, `MaDH`, `MaSP`, `SoLuong`, `TenSP`, `Hinh`, `NgayDatDon`, `Gia`) VALUES
(277, 6326, 16, 1, 'AirPods Pro\r\nThế hệ thứ 2\r\n(USB-C)', 'airpod_pro.png', '2023-11-05 20:48:00', 6199000),
(278, 6326, 12, 1, 'Apple Watch SE', 'iwatch_se.jpg', '2023-11-05 20:48:00', 6399000),
(279, 6326, 8, 1, 'iPad Pro', 'ipad_pro.png', '2023-11-05 20:48:00', 21199000),
(280, 6326, 5, 1, 'MacBook Pro 13', 'mac_pro13.jpg', '2023-11-05 20:48:00', 39999000),
(281, 6326, 2, 1, 'iPhone 15 ', 'ip15.png', '2023-11-05 20:48:00', 22999000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `TongSoLuong` int(11) NOT NULL,
  `User` varchar(100) NOT NULL,
  `TinhTrang` varchar(20) NOT NULL,
  `NgayTao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TongHD` int(11) NOT NULL,
  `YeuCauHuy` tinyint(1) NOT NULL,
  `ChapThuan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDH`, `TongSoLuong`, `User`, `TinhTrang`, `NgayTao`, `TongHD`, `YeuCauHuy`, `ChapThuan`) VALUES
(6326, 5, 'ngoccam', 'Đang giao hàng', '2023-11-05 20:48:44', 96795000, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `TenSP` varchar(1000) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `Hinh` varchar(500) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(100) NOT NULL,
  `NgayTao` date NOT NULL,
  `thuTu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`, `NgayTao`, `thuTu`) VALUES
(1, 'IPhone', '2023-06-11', 1),
(2, 'Mac', '2023-06-11', 2),
(3, 'IPad', '2023-06-11', 3),
(4, 'Watch', '2023-06-11', 4),
(5, 'AirPods', '2023-06-11', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(1000) NOT NULL,
  `MoTa` varchar(250) NOT NULL,
  `Gia` int(11) NOT NULL,
  `Hinh` varchar(500) NOT NULL,
  `NoiDung` varchar(5000) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `NgayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MoTa`, `Gia`, `Hinh`, `NoiDung`, `MaLoai`, `NgayTao`) VALUES
(1, 'iPhone 15 Pro', 'Một iPhone cực đỉnh, cực chất.', 28999000, 'ip15pro.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 1, '2023-06-11'),
(2, 'iPhone 15 ', 'Siêu mạnh mẽ trên mọi mặt.', 22999000, 'ip15.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 1, '2023-06-11'),
(3, 'iPhone 14', 'Luôn tuyệt vời như thế.', 19999000, 'ip14.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 1, '2023-06-11'),
(4, 'iPhone SE', 'Thực sự mạnh mẽ. Thực sự giá trị.', 11999000, 'ipse.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 1, '2023-06-11'),
(5, 'MacBook Pro 13', 'Máy tính xách tay Mac tiên tiến nhất cho các luồng công việc phức tạp.', 39999000, 'mac_pro13.jpg', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 2, '2023-06-11'),
(6, 'MacBook Pro 16', 'Siêu mỏng, siêu nhanh để làm việc, giải trí và sáng tạo bất cứ đâu.', 49999000, 'mac_pro16.jpg', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 2, '2023-06-11'),
(7, 'MacBook Air 15', 'Máy tính xách tay Mac giá hợp lý nhất.', 28999000, 'mac_air15.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 2, '2023-06-11'),
(8, 'iPad Pro', 'Trải nghiệm\r\niPad cực đỉnh\r\nvới công nghệ\r\ntiên tiến nhất.', 21199000, 'ipad_pro.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 3, '2023-06-11'),
(9, 'iPad Air', 'Hiệu năng mạnh mẽ trong một thiết kế mỏng nhẹ.', 15599000, 'ipad_air.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 3, '2023-06-11'),
(10, 'iPad\r\nthế hệ thứ 10', 'iPad màn hình toàn phần, đầy màu sắc. Cho mọi tác vụ hàng ngày.', 11499000, 'ipad.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 3, '2023-06-11'),
(11, 'iPad mini', 'Trọn vẹn\r\ntrải nghiệm iPad\r\nnằm gọn trên tay.', 12799000, 'ipad_mini.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 3, '2023-06-11'),
(12, 'Apple Watch SE', 'Tất cả tính năng bạn cần.\r\nGiá nhẹ nhàng.', 6399000, 'iwatch_se.jpg', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 4, '2023-06-11'),
(13, 'Apple Watch Series 9', 'Cảm biến mạnh mẽ,\r\ntính năng sức khỏe tiên tiến.', 10499000, 'iwatch_sr9.jpg', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 4, '2023-06-11'),
(14, 'Apple Watch Ultra 2', 'Ngầu và\r\ngiàu năng lực nhất.', 21999000, 'iwatch_ultra2.jpg', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 4, '2023-06-11'),
(15, 'AirPods\r\nThế hệ thứ 3', 'Âm thanh sống động, giá nhẹ nhàng.', 4499000, 'airpod.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 5, '2023-06-11'),
(16, 'AirPods Pro\r\nThế hệ thứ 2\r\n(USB-C)', 'Sang trọng, cá tính âm thanh vượt trội.', 6199000, 'airpod_pro.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 5, '2023-06-11'),
(17, 'AirPods Max', 'Năng động, âm thanh mượt mà rộng lớn, pin trâu.', 13199000, 'airpod_max.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 5, '2023-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`User`) USING BTREE;

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaCTDH`),
  ADD KEY `MaDH` (`MaDH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `User` (`User`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`User`) REFERENCES `account` (`User`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
