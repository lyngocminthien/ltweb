-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 02:53 AM
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
('NgocCam', '456', 'Đinh Thị Ngọc Cầm', 'nc2015@gmail.com', '0788781119', 'Sóc Trăng', 0),
('ViThanhNga', '123', 'Vi Thanh Ngà', 'vinga2015@gmail.com', '0788781116', 'Cần Thơ', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `TenSP` varchar(1000) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `GiaCu` int(11) NOT NULL,
  `GiaMoi` int(11) NOT NULL,
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
(1, 'IPhone', '2023-04-10', 1),
(2, 'Mac', '2023-04-10', 2),
(3, 'IPad', '2023-04-10', 3),
(4, 'Watch', '2023-04-10', 4),
(5, 'Airpods', '2023-04-10', 5);

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
  `NgayTao` date NOT NULL,
  `NoiBat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MoTa`, `Gia`, `Hinh`, `NoiDung`, `MaLoai`, `NgayTao`, `NoiBat`) VALUES
(1, 'iPhone 15 Pro', 'Một iPhone cực đỉnh.', 28000000, 'ip15pro.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh20 W', 1, '2023-04-14', 1),
(2, 'iPhone 15', 'Siêu mạnh mẽ trên mọi mặt.', 24990000, 'ip15.png', 'Màn hình: OLED 6.7\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A16 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 4323 mAh20 W', 1, '2023-04-14', 1),
(3, 'iPhone 14', 'Luôn tuyệt vời như thế.', 25990000, 'ip14.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 1 TB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3095 mAh20 W', 1, '2023-04-14', 0),
(5, 'iPhone SE', 'Thực sự mạnh mẽ. Thực sự giá trị.', 25990000, 'ipse.png', 'Màn hình: OLED 6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A16 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 512 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3200 mAh20 W', 1, '2023-04-14', 1),
(6, 'Apple Watch SE ', 'Tất cả tính năng bạn cần. Giá nhẹ nhàng.', 3990000, 'iwatch_se.jpg', 'Màn hình	OLED\r\nThời lượng pin	Khoảng 1.5 ngày (ở chế độ tiết kiệm pin)Khoảng 18 giờ (ở chế độ sử dụng thông thường)\r\nKết nối với hệ điều hành	iPhone 8 trở lên với iOS phiên bản mới nhất\r\nMặt	Ion-X strengthened glass40 mm\r\nTính năng cho sức khỏe:	Cảm biến nhiệt độ Chế độ luyện tập, Nhắc nhở nhịp tim cao thấp, Gửi thông báo khi có tai nạn, Đo nhịp tim, Theo dõi mức độ stress, Tính quãng đường chạy, Đếm số bước chân, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Theo dõi chu kì kinh nguyệt', 4, '2023-04-15', 0),
(7, 'Apple Watch Series 9', 'Cảm biến mạnh mẽ, tính năng sức khỏe tiên tiến.', 18990000, 'iwatch_sr9.jpg', 'Màn hình: OLED 1.92 inch\r\nThời lượng pin: Khoảng 36 giờ (ở chế độ sử dụng thông thường) Khoảng 60 giờ (ở chế độ tiết kiệm pin)\r\nKết nối với hệ điều hành: iPhone 8 trở lên với iOS phiên bản mới nhất\r\nMặt: Kính Sapphire49 mm\r\nTính năng cho sức khỏe: Cảm biến nhiệt độ, Chấm điểm giấc ngủ, Nhắc nhở nhịp tim cao thấp, Gửi thông báo khi có tai nạn, Ước tính ngày rụng trứng, Đo nhịp tim, Tính quãng đường chạy, Đếm số bước chân, Điện tâm đồ, Đo nồng độ oxy (SpO2)Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Theo dõi chu kì kinh nguyệt', 4, '2023-04-15', 1),
(9, 'Apple Watch Ultra 2', 'Ngầu và giàu năng lực nhất.', 18990000, 'iwatch_ultra2.jpg', 'Màn hình: OLED 1.92 inch\r\nThời lượng pin: Khoảng 36 giờ (ở chế độ sử dụng thông thường) Khoảng 60 giờ (ở chế độ tiết kiệm pin)\r\nKết nối với hệ điều hành: iPhone 8 trở lên với iOS phiên bản mới nhất\r\nMặt: Kính Sapphire49 mm\r\nTính năng cho sức khỏe: Cảm biến nhiệt độ, Chấm điểm giấc ngủ, Nhắc nhở nhịp tim cao thấp, Gửi thông báo khi có tai nạn, Ước tính ngày rụng trứng, Đo nhịp tim, Tính quãng đường chạy, Đếm số bước chân, Điện tâm đồ, Đo nồng độ oxy (SpO2)Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Theo dõi chu kì kinh nguyệt', 4, '2023-04-16', 1),
(12, 'iPad Pro', 'Trải nghiệm iPad cực đỉnh với công nghệ tiên tiến nhất.', 14290000, 'ipad_pro.png', 'Màn hình: 10.9\"Retina IPS LCD\r\nHệ điều hành: iPadOS 16\r\nChip: Apple A14 Bionic\r\nRAM: 4 GB\r\nDung lượng lưu trữ: 64 GB\r\nKết nối: Nghe gọi qua FaceTime\r\nCamera sau: 12 MP\r\nCamera trước: 12 MP\r\nPin, Sạc: 28.6 Wh (~ 7587 mAh)20 W', 3, '2023-04-18', 0),
(13, 'iPad Air', 'Hiệu năng mạnh mẽ trong một thiết kế mỏng nhẹ.', 15290000, 'ipad_air.png', 'Màn hình: 8.3\"LED-backlit IPS LCD\r\nHệ điều hành: iPadOS 15\r\nChip: Apple A15 Bionic\r\nRAM: 4 GB\r\nDung lượng lưu trữ: 64 GB\r\nKết nối: 5G Nghe gọi qua FaceTime\r\nSIM: 1 Nano SIM & 1 eSIM\r\nCamera sau: 12 MP\r\nCamera trước: 12 MP\r\nPin, Sạc: 19.3 Wh (~ 5175 mAh)20 W', 3, '2023-04-13', 0),
(14, 'iPad thế hệ thứ 10', 'iPad màn hình toàn phần, đầy màu sắc. Cho mọi tác vụ hàng ngày.', 20990000, 'ipad.png', 'Màn hình: 11\"Liquid Retina\r\nHệ điều hành: iPadOS 16\r\nChip: Apple M2 8 nhân\r\nRAM: 8 GB\r\nDung lượng lưu trữ: 128 GB\r\nKết nối: Nghe gọi qua FaceTime\r\nCamera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước: 12 MP\r\nPin, Sạc: 28.65 Wh (~ 7538 mAh)20 W', 3, '2023-04-22', 1),
(15, 'iPad Mini ', 'Trọn vẹn trải nghiệm iPad nằm gọn trên tay.', 31990000, 'ipad_mini.png', 'Màn hình: 12.9\"Liquid Retina XDR\r\nHệ điều hành: iPadOS 16\r\nChip: Apple M2 8 nhân\r\nRAM: 16 GB\r\nDung lượng lưu trữ: 2 TB\r\nKết nối: 5G Nghe gọi qua FaceTime\r\nSIM: 1 Nano SIM hoặc 1 eSIM\r\nCamera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR\r\nCamera trước: 12 MP\r\nPin, Sạc: 40.88 Wh (~ 10.835 mAh)20 W', 3, '2023-04-22', 1),
(17, 'MacBook Pro 13', 'Nhỏ gọn, sang trọng, tinh tế.', 63990000, 'mac_pro13.jpg', 'CPU: Apple M1 Pro200GB/s\r\nRAM: 32 GB\r\nỔ cứng: 1 TB SSD\r\nMàn hình: 16.2\"Liquid Retina XDR display (3456 x 2234)120Hz\r\nCard màn hình: Card tích hợp 16 nhân GPU\r\nCổng kết nối: HDMI3 x Thunderbolt 4 USB-CJack tai nghe 3.5 mm\r\nĐặc biệt: Có đèn bàn phím\r\nHệ điều hành: Mac OS\r\nThiết kế: Vỏ kim loại nguyên khối\r\nKích thước, khối lượng: Dài 355.7 mm - Rộng 248.1 mm - Dày 16.8 mm - Nặng 2.1 kg\r\nThời điểm ra mắt: 10/2021', 2, '2023-04-22', 1),
(18, 'MacBook Pro 16 ', 'Hiệu năng mạnh mẽ trong một thiết kế tuyệt vời.', 48290000, 'mac_pro16.jpg', 'CPU: Apple M2 Pro200GB/s\r\nRAM: 16 GB\r\nỔ cứng: 512 GB SSD\r\nMàn hình: 14.2\"Liquid Retina XDR display (3024 x 1964)120Hz\r\nCard màn hình: Card tích hợp16 nhân GPU\r\nCổng kết nối: HDMIJack tai nghe 3.5 mmMagSafe 33 x Thunderbolt 4\r\nĐặc biệt: Có đèn bàn phím\r\nHệ điều hành: Mac OS\r\nThiết kế: Vỏ kim loại\r\nKích thước, khối lượng: Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg\r\nThời điểm ra mắt: 2023', 2, '2023-04-22', 1),
(19, 'MacBook Air 15', 'Trải nghiệm mượt mà cùng với thiết kế mỏng nhẹ', 27590000, 'mac_air15.png', 'CPU: Apple M2100GB/s\r\nRAM: 8 GB\r\nỔ cứng: 256 GB SSD\r\nMàn hình: 13.6\"Liquid Retina (2560 x 1664)\r\nCard màn hình: Card tích hợp8 nhân GPU\r\nCổng kết nối: Jack tai nghe 3.5 mmMagSafe 32 x Thunderbolt 3\r\nĐặc biệt: Có đèn bàn phím\r\nHệ điều hành: Mac OS\r\nThiết kế: Vỏ kim loại\r\nKích thước, khối lượng: Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm - Nặng 1.24 kg\r\nThời điểm ra mắt: 6/2022', 2, '2023-04-22', 1),
(22, 'AirPods thế hệ thứ 3', 'Âm thanh đẹp, giá phải chăng.', 4190000, 'airpod.png', 'Thời gian tai nghe: Dùng 6 giờ\r\nThời gian hộp sạc: Dùng 30 giờ\r\nCổng sạc: Lightning\r\nCông nghệ âm thanh: Adaptive EQSpatial AudioCustom High Dynamic Range AmplifierCustom high-excursion Apple driverChip Apple H1\r\nTương thích: iOS (iPhone)AndroidiPadOS (iPad)macOS (Macbook, iMac)\r\nTiện ích: Chống nước IPX4, Có mic thoại\r\nHỗ trợ kết nối: Bluetooth 5.0\r\nĐiều khiển bằng: Cảm ứng lực\r\nHãng Apple', 5, '2023-04-15', 0),
(23, 'AirPods Pro thế hệ thứ 2', 'Pin trâu, thiết kế tuyệt đẹp, hỗ trợ (USB-C).', 3890000, 'airpod_pro.png', 'Thời gian tai nghe: Dùng 5 giờ - Sạc 2 giờ\r\nThời gian hộp sạc: Dùng 24 giờ - Sạc 2 giờ\r\nCổng sạc: Lightning\r\nCông nghệ âm thanh: Chip Apple H1\r\nTương thích: iOS (iPhone)Android\r\nTiện ích: Có mic thoại, Sạc nhanh\r\nHỗ trợ kết nối: Bluetooth 5.0\r\nĐiều khiển bằng: Cảm ứng chạm\r\nHãng Apple', 5, '2023-04-15', 0),
(24, 'Airpods Max', 'Cảm giác đeo tai mịn màng, âm thanh sống động, thiết kế sang trọng.', 2990000, 'airpod_max.png', 'Thời gian tai nghe: Dùng 5 giờ - Sạc 3 giờ\r\nThời gian hộp sạc: Dùng 24 giờ - Sạc 4 giờ\r\nCổng sạc: Lightning\r\nCông nghệ âm thanh: Adaptive EQActive Noise CancellationTransparency ModeSpatial AudioCustom High Dynamic Range AmplifierCustom high-excursion Apple driverChip Apple H1\r\nTương thích: iOS (iPhone)AndroidiPadOS (iPad)macOS (Macbook, iMac)\r\nTiện ích: Chống nước IPX4, Có mic thoại, Chống ồn chủ động\r\nHỗ trợ kết nối: Bluetooth 5.0\r\nĐiều khiển bằng: Cảm ứng lực\r\nHãng Apple.', 5, '2023-04-15', 0);

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
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

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
