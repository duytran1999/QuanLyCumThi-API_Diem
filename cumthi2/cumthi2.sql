-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2021 lúc 07:34 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cumthi2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_thi`
--

CREATE TABLE `diem_thi` (
  `MaBT` int(11) NOT NULL,
  `SBD` varchar(20) NOT NULL,
  `MAMT` varchar(20) NOT NULL,
  `Diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `diem_thi`
--

INSERT INTO `diem_thi` (`MaBT`, `SBD`, `MAMT`, `Diem`) VALUES
(1, '02.0001', 'M1', 6),
(2, '02.0001', 'M2', 9),
(3, '02.0001', 'M3', 9),
(4, '02.0001', 'M4', 8),
(5, '02.0001', 'M5', 7),
(6, '02.0002', 'M1', 10),
(7, '02.0002', 'M2', 7),
(8, '02.0002', 'M3', 8),
(9, '02.0002', 'M4', 9),
(10, '02.0002', 'M5', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monthi`
--

CREATE TABLE `monthi` (
  `MaMT` varchar(20) NOT NULL,
  `TenMonThi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monthi`
--

INSERT INTO `monthi` (`MaMT`, `TenMonThi`) VALUES
('M1', 'Toán'),
('M2', 'Ngữ Văn'),
('M3', 'Ngoại Ngữ'),
('M4', 'Khoa Học Tự Nhiên'),
('M5', 'Khoa Học Xã Hội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thi_sinh`
--

CREATE TABLE `thi_sinh` (
  `SBD` varchar(20) NOT NULL,
  `HoTen` text NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `GioiTinh` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thi_sinh`
--

INSERT INTO `thi_sinh` (`SBD`, `HoTen`, `NgaySinh`, `GioiTinh`) VALUES
('02.0001', 'Nguyễn Tiến Cường', '2003-02-11 00:00:00', 'Nam'),
('02.0002', 'Ngô Thập Nhất', '2003-04-11 00:00:00', 'Ná»');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diem_thi`
--
ALTER TABLE `diem_thi`
  ADD PRIMARY KEY (`MaBT`),
  ADD KEY `FK_DIEMTHI_THISINH` (`SBD`),
  ADD KEY `FK_DIEMTHI_MONTHI` (`MAMT`);

--
-- Chỉ mục cho bảng `monthi`
--
ALTER TABLE `monthi`
  ADD PRIMARY KEY (`MaMT`);

--
-- Chỉ mục cho bảng `thi_sinh`
--
ALTER TABLE `thi_sinh`
  ADD PRIMARY KEY (`SBD`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem_thi`
--
ALTER TABLE `diem_thi`
  MODIFY `MaBT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem_thi`
--
ALTER TABLE `diem_thi`
  ADD CONSTRAINT `FK_DIEMTHI_MONTHI` FOREIGN KEY (`MAMT`) REFERENCES `monthi` (`MaMT`),
  ADD CONSTRAINT `FK_DIEMTHI_THISINH` FOREIGN KEY (`SBD`) REFERENCES `thi_sinh` (`SBD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
