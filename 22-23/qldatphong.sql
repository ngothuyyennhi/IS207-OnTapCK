-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2024 lúc 01:11 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldatphong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(50) NOT NULL,
  `TENHD` varchar(255) DEFAULT NULL,
  `MAKH` varchar(50) DEFAULT NULL,
  `TONGTIEN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `TENHD`, `MAKH`, `TONGTIEN`) VALUES
('HD001', 'Hoa don 1', 'KH001', 1500000),
('HD002', 'Hoa don 2', 'KH002', 2000000),
('HD003', 'Hoa don 3', 'KH003', 1800000),
('HD004', 'Hoa don 4', 'KH004', 2200000),
('HD005', 'Hoa don 5', 'KH005', 2500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(50) NOT NULL,
  `TENKH` varchar(255) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `CCCD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `CCCD`) VALUES
('KH001', 'Nguyen Van A', '0123456789', 'CCCD001'),
('KH002', 'Tran Thi B', '0987654321', 'CCCD002'),
('KH003', 'Le Van C', '0369852147', 'CCCD003'),
('KH004', 'Pham Thi D', '0765432198', 'CCCD004'),
('KH005', 'Hoang Van E', '0912345678', 'CCCD005');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MAPHONG` varchar(50) NOT NULL,
  `TENPHONG` varchar(255) DEFAULT NULL,
  `TINHTRANG` varchar(50) DEFAULT NULL,
  `LOAIPHONG` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MAPHONG`, `TENPHONG`, `TINHTRANG`, `LOAIPHONG`) VALUES
('P001', 'Phong A', 'Da co khach', 'Phong Don'),
('P002', 'Phong B', 'Da co khach', 'Phong Don'),
('P003', 'Phong C', 'Da co khach', 'Phong Doi'),
('P004', 'Phong D', 'Trong', 'Phong Don'),
('P005', 'Phong E', 'Trong', 'Phong Doi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `MAHD` varchar(50) NOT NULL,
  `MAPHONG` varchar(50) NOT NULL,
  `NGAYTHUE` date DEFAULT NULL,
  `NGAYTRA` date DEFAULT NULL,
  `GIATHUE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`MAHD`, `MAPHONG`, `NGAYTHUE`, `NGAYTRA`, `GIATHUE`) VALUES
('HD001', 'P001', '2023-01-01', '2023-01-05', 500000),
('HD002', 'P003', '2023-02-10', '2023-02-15', 700000),
('HD003', 'P002', '2023-03-20', '2023-03-25', 600000),
('HD004', 'P005', '2023-04-05', '2023-04-10', 800000),
('HD005', 'P004', '2023-05-15', '2023-05-20', 900000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MAPHONG`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`MAHD`,`MAPHONG`),
  ADD KEY `MAPHONG` (`MAPHONG`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Các ràng buộc cho bảng `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `thue_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `thue_ibfk_2` FOREIGN KEY (`MAPHONG`) REFERENCES `phong` (`MAPHONG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
