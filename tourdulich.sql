-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 10, 2025 lúc 10:23 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourdulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `id_baocao` int NOT NULL,
  `id_hdv` int DEFAULT NULL,
  `loai_baocao` varchar(50) DEFAULT NULL,
  `noi_dung` text,
  `ngay_baocao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id_booking` int NOT NULL,
  `id_khachhang` int DEFAULT NULL,
  `id_tour` int DEFAULT NULL,
  `ngay_dat` date DEFAULT NULL,
  `so_nguoi` int DEFAULT NULL,
  `tong_tien` decimal(12,2) DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int NOT NULL,
  `id_khachhang` int DEFAULT NULL,
  `id_tour` int DEFAULT NULL,
  `so_sao` int DEFAULT NULL,
  `nhan_xet` text,
  `ngay_danhgia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuctour`
--

CREATE TABLE `danhmuctour` (
  `id_danhmuc` int NOT NULL,
  `ten_danhmuc` varchar(100) DEFAULT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemthamquan`
--

CREATE TABLE `diemthamquan` (
  `id_diem` int NOT NULL,
  `ten_diem` varchar(200) DEFAULT NULL,
  `mo_ta` text,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huongdanvien`
--

CREATE TABLE `huongdanvien` (
  `id_hdv` int NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `id_taikhoan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtrinhtour`
--

CREATE TABLE `lichtrinhtour` (
  `id_lichtrinh` int NOT NULL,
  `id_tour` int DEFAULT NULL,
  `ngay` date DEFAULT NULL,
  `mo_ta` text,
  `dia_diem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int NOT NULL,
  `ten_dang_nhap` varchar(50) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `vai_tro` varchar(20) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT NULL,
  `id_khachhang` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id_tour` int NOT NULL,
  `ten_tour` varchar(200) DEFAULT NULL,
  `mo_ta` text,
  `gia` decimal(12,2) DEFAULT NULL,
  `ngay_khoi_hanh` date DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `id_danhmuc` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_diemthamquan`
--

CREATE TABLE `tour_diemthamquan` (
  `id_tour` int DEFAULT NULL,
  `id_diem` int DEFAULT NULL,
  `thu_tu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`id_baocao`),
  ADD KEY `id_hdv` (`id_hdv`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_tour` (`id_tour`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_tour` (`id_tour`);

--
-- Chỉ mục cho bảng `danhmuctour`
--
ALTER TABLE `danhmuctour`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `diemthamquan`
--
ALTER TABLE `diemthamquan`
  ADD PRIMARY KEY (`id_diem`);

--
-- Chỉ mục cho bảng `huongdanvien`
--
ALTER TABLE `huongdanvien`
  ADD PRIMARY KEY (`id_hdv`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `lichtrinhtour`
--
ALTER TABLE `lichtrinhtour`
  ADD PRIMARY KEY (`id_lichtrinh`),
  ADD KEY `id_tour` (`id_tour`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id_tour`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tour_diemthamquan`
--
ALTER TABLE `tour_diemthamquan`
  ADD KEY `id_tour` (`id_tour`),
  ADD KEY `id_diem` (`id_diem`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baocao`
--
ALTER TABLE `baocao`
  MODIFY `id_baocao` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuctour`
--
ALTER TABLE `danhmuctour`
  MODIFY `id_danhmuc` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diemthamquan`
--
ALTER TABLE `diemthamquan`
  MODIFY `id_diem` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `huongdanvien`
--
ALTER TABLE `huongdanvien`
  MODIFY `id_hdv` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichtrinhtour`
--
ALTER TABLE `lichtrinhtour`
  MODIFY `id_lichtrinh` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id_tour` int NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_ibfk_1` FOREIGN KEY (`id_hdv`) REFERENCES `huongdanvien` (`id_hdv`);

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`);

--
-- Các ràng buộc cho bảng `huongdanvien`
--
ALTER TABLE `huongdanvien`
  ADD CONSTRAINT `huongdanvien_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `lichtrinhtour`
--
ALTER TABLE `lichtrinhtour`
  ADD CONSTRAINT `lichtrinhtour_ibfk_1` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuctour` (`id_danhmuc`);

--
-- Các ràng buộc cho bảng `tour_diemthamquan`
--
ALTER TABLE `tour_diemthamquan`
  ADD CONSTRAINT `tour_diemthamquan_ibfk_1` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`),
  ADD CONSTRAINT `tour_diemthamquan_ibfk_2` FOREIGN KEY (`id_diem`) REFERENCES `diemthamquan` (`id_diem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
