-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 04, 2024 lúc 08:54 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_khachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(10) NOT NULL,
  `TenHD` varchar(250) NOT NULL,
  `MaKH` varchar(10) NOT NULL,
  `TongTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `TenHD`, `MaKH`, `TongTien`) VALUES
('HD01', 'Hoá đơn', 'KH01', 200000),
('HD02', 'Hoá đơn 02', 'KH02', 170000),
('HD03', 'Hoá đơn 3', 'KH02', 900000),
('HD04', 'Hoá đơn 4', 'KH01', 170000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(10) NOT NULL,
  `TenKH` varchar(250) NOT NULL,
  `sdt` int(9) NOT NULL,
  `cccn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `sdt`, `cccn`) VALUES
('KH01', 'Nguyễn Sơn Hà', 2147483647, 'addwad213123'),
('KH02', 'Duy Thái', 2147483647, '13231e2eawede');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(10) NOT NULL,
  `TenPhong` varchar(250) NOT NULL,
  `TinhTrang` varchar(250) NOT NULL,
  `LoaiPhong` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`, `TinhTrang`, `LoaiPhong`) VALUES
('P1_01', 'Phòng đơn', 'Đã thuê', 'Phòng đơn'),
('P1_02', 'Phòng đôi', 'Chưa thuê', 'Phòng đôi'),
('P1_03', 'Phòng đơn', 'Đã thuê', 'Phòng đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `MaHD` varchar(10) NOT NULL,
  `MaPhong` varchar(10) NOT NULL,
  `NgayThue` date DEFAULT NULL,
  `NgayTra` date DEFAULT NULL,
  `GiaThue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`MaHD`, `MaPhong`, `NgayThue`, `NgayTra`, `GiaThue`) VALUES
('HD02', 'P1_02', NULL, NULL, NULL),
('HD02', 'P1_03', NULL, NULL, NULL),
('HD03', 'P1_01', NULL, NULL, NULL),
('HD03', 'P1_02', NULL, NULL, NULL),
('HD04', 'P1_02', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `fk_hd_kh` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`MaHD`,`MaPhong`),
  ADD KEY `fk_t_p` (`MaPhong`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hd_kh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Các ràng buộc cho bảng `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `fk_t_hd` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `fk_t_p` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
