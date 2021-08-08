-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2021 lúc 07:33 PM
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
-- Cơ sở dữ liệu: `tintuc`
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
-- Cấu trúc bảng cho bảng `dscumthi`
--

CREATE TABLE `dscumthi` (
  `MaCT` int(11) NOT NULL,
  `TenCumThi` text NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dscumthi`
--

INSERT INTO `dscumthi` (`MaCT`, `TenCumThi`, `Link`) VALUES
(1, 'Trường Đại Học Khoa Học Tự Nhiên', 'http://localhost:8080/cumthi1'),
(2, 'Trường Đại Học Bách Khoa TPHCM', 'http://localhost:8080/cumthi2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monthi`
--

CREATE TABLE `monthi` (
  `MaMT` varchar(20) NOT NULL,
  `TenMonThi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monthi`
--

INSERT INTO `monthi` (`MaMT`, `TenMonThi`) VALUES
('M1', 'Toan'),
('M2', 'Ngu Van'),
('M3', 'Ngoai Ngu'),
('M4', 'KHTN'),
('M5', 'KHXH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_content`) VALUES
(1, 9, 'asdasd'),
(2, 9, 'asdfasdfasdf'),
(3, 9, '32'),
(4, 9, '23445'),
(5, 9, '213'),
(6, 9, '565'),
(7, 9, '456456'),
(8, 10, 'asdfasdfasdf'),
(9, 10, 'adawer'),
(10, 10, 'tyu'),
(11, 10, 'asdfasdrtyufasdf'),
(12, 10, 'dfghdfgh'),
(13, 14, 'asdfghjfghjghj'),
(14, 14, '3657ru'),
(15, 14, 'rtyurty'),
(16, 14, 'ghfghj'),
(17, 14, '7895689'),
(18, 14, 'Duy Cu Toasdfasdfasdfasdf'),
(19, 14, 'Duy Cu Toasdfasdfasdfasdf'),
(20, 14, 'Duy Cu Toasdfasdfasdfasdf'),
(21, 14, 'Duy Cu Toasdfasdfasdfasdf'),
(22, 14, 'Duy Cu Toasdfasdfasdfasdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thi_sinh`
--

CREATE TABLE `thi_sinh` (
  `SBD` varchar(20) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `GioiTinh` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thi_sinh`
--

INSERT INTO `thi_sinh` (`SBD`, `HoTen`, `NgaySinh`, `GioiTinh`) VALUES
('02.0001', 'Tran Bao Duy', '2003-02-11 00:00:00', 'Nam'),
('02.0002', 'Mina', '2003-04-11 00:00:00', 'Nu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `password` varchar(5000) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(6, 'Duy Tran', 'tranduy18121999@gmail.com', '$2y$10$8hdFh1ephpouUfXJOE6MD.GdF1JCh1Q.UPlGvubSpT78r0elH.xe2', 1),
(7, 'duytran1999', 'tranduy181219992@gmail.com', '$2y$10$l6NXGPvImb8Zb4ClyA5pHeJcLhCkT36psy0yPh2zJGkvirfOzIsua', 1),
(8, 'user', 'tranduy@gmail.com', '$2y$10$YCmylMDUVfwb1Ao/YPHNe.3wqs/uy/5C9GWMUVuoE82cZ1bm6NlMa', 1),
(9, 'user1', 'user1@gmail.com', '$2y$10$XbPWEZIVYYLAUGbsGS4Zce7jSXK.2IGB8aMA4ERA4M3veVQP.USwu', 1),
(10, 'user2', 'user2@gmail.com', '$2y$10$0drhOVJz28o74JsNyozplOGcF4N25TYzwjdi4N.p8.9TL8CZ9Ic8.', 1),
(11, 'duy tran', 'cc@gmail.com', '$2y$10$GdLxgyMwz2g5dkioUygJzugH4zSwkv2pxjoZVx9XOfbJXY6mtHxiK', 1),
(13, 'Hoa Thuan Duy Tran', 'hoathuan1', '$2y$10$A4BVT2mwe.PNIzisoL2hB.Ls4IZdi5MKr49MSlm0FUcsRQ8lPX6Hu', 1),
(14, 'Thuy Trang', 'thuytrang@gmail.com', '$2y$10$MIQEiv3v5xHeDbjBu/.QFekPMk8Kxg4MrFaLW2bPrJW7UdQjaSaf6', 1),
(15, 'Thuy Trang', 'thuytrang1@gmail.com', '$2y$10$KTGKkSCVZpe5tBpqC5zRUuiSG7v0IK4JhOB4KOUMSTFZYXc9mIiG2', 1);

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
-- Chỉ mục cho bảng `dscumthi`
--
ALTER TABLE `dscumthi`
  ADD PRIMARY KEY (`MaCT`);

--
-- Chỉ mục cho bảng `monthi`
--
ALTER TABLE `monthi`
  ADD PRIMARY KEY (`MaMT`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`user_id`);

--
-- Chỉ mục cho bảng `thi_sinh`
--
ALTER TABLE `thi_sinh`
  ADD PRIMARY KEY (`SBD`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem_thi`
--
ALTER TABLE `diem_thi`
  MODIFY `MaBT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dscumthi`
--
ALTER TABLE `dscumthi`
  MODIFY `MaCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem_thi`
--
ALTER TABLE `diem_thi`
  ADD CONSTRAINT `FK_DIEMTHI_MONTHI` FOREIGN KEY (`MAMT`) REFERENCES `monthi` (`MaMT`),
  ADD CONSTRAINT `FK_DIEMTHI_THISINH` FOREIGN KEY (`SBD`) REFERENCES `thi_sinh` (`SBD`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
