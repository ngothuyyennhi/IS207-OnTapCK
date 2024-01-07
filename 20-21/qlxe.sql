-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2024 lúc 09:07 PM
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
-- Cơ sở dữ liệu: `qlxe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baoduong`
--

CREATE TABLE `baoduong` (
  `MABD` int(11) NOT NULL,
  `NGAYNHAN` date DEFAULT NULL,
  `NGAYTRA` date DEFAULT NULL,
  `SOKM` int(11) DEFAULT NULL,
  `NOIDUNG` varchar(255) DEFAULT NULL,
  `SOXE` varchar(10) DEFAULT NULL,
  `THANHTIEN` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baoduong`
--

INSERT INTO `baoduong` (`MABD`, `NGAYNHAN`, `NGAYTRA`, `SOKM`, `NOIDUNG`, `SOXE`, `THANHTIEN`) VALUES
(10, '2024-01-02', '2024-01-05', NULL, NULL, '29A123', 300250.00),
(11, '2024-01-02', '2024-01-05', NULL, NULL, '29A123', 300250.00),
(12, '2024-01-02', '2024-01-05', NULL, NULL, '29A123', 300250.00),
(15, '0000-00-00', NULL, NULL, NULL, '29A123', NULL),
(16, '0000-00-00', NULL, NULL, NULL, '29A123', NULL),
(17, '0000-00-00', NULL, NULL, NULL, '29A123', NULL),
(101, '2024-01-02', '2024-01-05', 500, 'Thay nhớt và lọc dầu', '29A123', 300250.00),
(102, '2024-02-02', '2024-02-03', 600, 'Bảo dưỡng định kỳ', '51C456', 2000000.00),
(103, '2024-03-01', '2024-03-03', 700, 'Thay bình xăng', '36D789', 1200000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `MACV` int(11) NOT NULL,
  `TENCV` varchar(50) DEFAULT NULL,
  `DONGIA` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`MACV`, `TENCV`, `DONGIA`) VALUES
(10, 'Công Việc 1', 100.00),
(11, 'Công Việc 2', 150.00),
(12, 'Công Việc 3', 200.00),
(15, 'Công Việc 4', 100.00),
(16, 'Công Việc 5', 150.00),
(17, 'Công Việc 6', 200.00),
(201, 'Bảo dưỡng định kỳ', 500000.00),
(202, 'Thay nhớt và lọc dầu', 300000.00),
(203, 'Thay bình xăng', 150000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_bd`
--

CREATE TABLE `ct_bd` (
  `MABD` int(11) NOT NULL,
  `MACV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_bd`
--

INSERT INTO `ct_bd` (`MABD`, `MACV`) VALUES
(10, 10),
(11, 11),
(15, 15),
(16, 16),
(17, 17),
(101, 202),
(102, 201),
(103, 203);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `HOTEN` varchar(255) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `DIENTHOAI` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `HOTEN`, `DIACHI`, `DIENTHOAI`) VALUES
(1, 'Nguyễn Văn A', '123 Đường ABC, HN', '0901234567'),
(2, 'Trần Thị B', '456 Đường XYZ, HCM', '0987654321'),
(3, 'Lê Quang C', '789 Đường LMN, DN', '0123456789'),
(5, 'Nguyễn Văn A', '123 Đường ABC, HN', '0901234567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `SOXE` varchar(10) NOT NULL,
  `HANGXE` varchar(50) DEFAULT NULL,
  `NAMSX` int(11) DEFAULT NULL,
  `MAKH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`SOXE`, `HANGXE`, `NAMSX`, `MAKH`) VALUES
('29A123', 'Toyota', 2020, 1),
('29A1234', 'Toyota', 2020, 1),
('36D789', 'Ford', 2022, 3),
('51C456', 'Honda', 2019, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baoduong`
--
ALTER TABLE `baoduong`
  ADD PRIMARY KEY (`MABD`),
  ADD KEY `SOXE` (`SOXE`);

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`MACV`);

--
-- Chỉ mục cho bảng `ct_bd`
--
ALTER TABLE `ct_bd`
  ADD PRIMARY KEY (`MABD`,`MACV`),
  ADD KEY `MACV` (`MACV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`SOXE`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baoduong`
--
ALTER TABLE `baoduong`
  ADD CONSTRAINT `baoduong_ibfk_1` FOREIGN KEY (`SOXE`) REFERENCES `xe` (`SOXE`);

--
-- Các ràng buộc cho bảng `ct_bd`
--
ALTER TABLE `ct_bd`
  ADD CONSTRAINT `ct_bd_ibfk_1` FOREIGN KEY (`MABD`) REFERENCES `baoduong` (`MABD`),
  ADD CONSTRAINT `ct_bd_ibfk_2` FOREIGN KEY (`MACV`) REFERENCES `congviec` (`MACV`);

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
