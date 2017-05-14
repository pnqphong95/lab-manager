-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2017 lúc 01:36 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlpth`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `id` int(11) NOT NULL,
  `TenBM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`id`, `TenBM`, `TenVietTat`) VALUES
(1, 'Công nghệ thông tin', 'CNTT'),
(2, 'Hệ thống thông tin', 'HTTT'),
(3, 'Khoa học máy tính', 'KHMT'),
(4, 'Kỹ thuật phần mềm', 'KTPM'),
(5, 'Truyền thông và mạng máy tính', 'TTMMT'),
(6, 'Tin học ứng dụng', 'THUD'),
(7, 'Tin học ứng dụng 123', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buoi`
--

CREATE TABLE `buoi` (
  `id` int(11) NOT NULL,
  `TenBuoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `buoi`
--

INSERT INTO `buoi` (`id`, `TenBuoi`, `TenVietTat`) VALUES
(1, 'Sáng', 'S'),
(2, 'Chiều', 'C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhinh`
--

CREATE TABLE `cauhinh` (
  `id` int(11) UNSIGNED NOT NULL,
  `DLRam` int(11) NOT NULL,
  `DLOCung` int(11) NOT NULL,
  `CPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhinh`
--

INSERT INTO `cauhinh` (`id`, `DLRam`, `DLOCung`, `CPU`, `GPU`) VALUES
(1, 2, 100, 'Intel Core i3-6100', 'Không'),
(2, 2, 100, 'Intel Pentium G3258', 'Không'),
(3, 4, 100, 'Intel Pentium G3258', 'GeForce GT 730'),
(4, 4, 100, 'Intel Core i3-6100', 'GeForce GT 730');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) UNSIGNED NOT NULL,
  `TenCV` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `TenCV`) VALUES
(1, 'Giảng viên'),
(2, 'Quản lý bộ môn'),
(3, 'Quản lý khoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaGV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoGV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenGV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SDT` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idBoMon` int(10) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KichHoat` tinyint(1) NOT NULL,
  `idChucVu` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id`, `MaGV`, `HoGV`, `TenGV`, `NgaySinh`, `GioiTinh`, `SDT`, `idBoMon`, `password`, `KichHoat`, `idChucVu`, `remember_token`, `Email`) VALUES
(1, '0000', 'Account', 'Admin', '2017-04-07', 1, '0970000000', 1, '$2y$10$uXx91FdsuFeJA7pTSv/3bubcSME1xevGVIuw8.NSXLCXB75igrzKS', 1, 1, 'Py5O0xrdSzEVQssFNJqA3XMqC61eIlX86q7MDtJefdbuvKRi7NakMtFYBNav', NULL),
(2, '0001', 'Phạm Duy', 'Hậu', '2017-04-15', 0, '0971111111', 1, '$2y$10$4dUE9W4hRnK9q4LTyMf8bOBugz43UkrEYsEsbJ8SmzxXM07riHGk6', 1, 2, '86wWkWDJYaLitBnSiCouWUOwcMMeogP9wlcmKO7OQGNssBHPZs2U8KjKaynl', NULL),
(3, '0010', 'Quản lý bộ môn', 'HTTT', '2017-05-05', 1, '0971234567', 2, '$2y$10$CIpxbCXp8fgApKST7U5Kj.48gq4D3xgQNgBxF6u.7r./DyuviavMK', 1, 2, 'DZ7uFdbqECtUtW3NCiGqxWet1wtYo5ZbluDW8Y2vHbVtMQbJXJrUOWyMxMCq', NULL),
(4, '0002', 'Quản lý', 'Bộ môn', '2017-03-31', 0, '09874563214', 1, '$2y$10$KIo2xhJX7ddhYf9fepaWe.Ddkce5whRi78qreTbDQT3NZ5pN3h5Se', 1, 2, '', NULL),
(5, '0015', 'Phạm Duy', 'Hậu', '1995-10-03', 1, '0987456321', 1, '$2y$10$7bRYGbpU8Y8IbG5rC8l6cOParE9Fygu.8UsMZlfeAIxvg7SzqzlLG', 1, 1, '', 'wertyuio@sdfghjk.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky_nienkhoa`
--

CREATE TABLE `hocky_nienkhoa` (
  `id` int(11) NOT NULL,
  `HocKy` varchar(255) NOT NULL,
  `NienKhoa` varchar(255) NOT NULL,
  `NgayBD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocky_nienkhoa`
--

INSERT INTO `hocky_nienkhoa` (`id`, `HocKy`, `NienKhoa`, `NgayBD`) VALUES
(1, '1', '2016-2017', '2017-05-01'),
(2, '2', '2016-2017', '2017-05-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopthu`
--

CREATE TABLE `hopthu` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NguoiGui` int(10) UNSIGNED NOT NULL,
  `NguoiNhan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich`
--

CREATE TABLE `lich` (
  `id` int(11) NOT NULL,
  `idGiaoVien` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `Nhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idThu` int(11) NOT NULL,
  `idBuoi` int(11) NOT NULL,
  `idTuan` int(11) NOT NULL,
  `idHocKyNienKhoa` int(11) NOT NULL,
  `Loai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lich`
--

INSERT INTO `lich` (`id`, `idGiaoVien`, `idPhong`, `idMonHoc`, `Nhom`, `idThu`, `idBuoi`, `idTuan`, `idHocKyNienKhoa`, `Loai`) VALUES
(4, 1, 1, 1, '1', 2, 1, 4, 2, 0),
(6, 1, 1, 1, '1', 7, 1, 4, 2, 0),
(7, 1, 1, 1, '1', 2, 1, 7, 2, 0),
(8, 1, 1, 1, '1', 4, 1, 7, 2, 0),
(9, 1, 1, 1, '1', 7, 1, 7, 2, 0),
(10, 1, 1, 1, '1', 2, 1, 10, 2, 0),
(11, 1, 1, 1, '1', 4, 1, 10, 2, 0),
(12, 1, 1, 1, '1', 7, 1, 10, 2, 0),
(13, 1, 2, 1, '4', 2, 1, 1, 2, 0),
(14, 1, 3, 1, '5', 2, 1, 1, 2, 0),
(15, 1, 3, 1, '1', 4, 1, 1, 2, 0),
(16, 1, 1, 1, '321', 3, 2, 1, 2, 0),
(17, 1, 1, 1, '321', 5, 1, 1, 2, 0),
(18, 1, 1, 1, '321', 2, 1, 3, 2, 0),
(19, 1, 1, 1, '321', 3, 2, 3, 2, 0),
(20, 1, 1, 1, '321', 5, 1, 3, 2, 0),
(21, 1, 1, 1, '321', 2, 1, 5, 2, 0),
(22, 1, 1, 1, '321', 3, 2, 5, 2, 0),
(23, 1, 1, 1, '321', 5, 1, 5, 2, 0),
(24, 1, 4, 1, '369', 2, 1, 1, 2, 0),
(26, 1, 8, 1, '789', 2, 1, 1, 2, 0),
(27, 1, 1, 1, '321', 2, 1, 1, 2, 0),
(28, 1, 1, 1, '11', 3, 1, 2, 2, 0),
(29, 1, 7, 1, '101', 2, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_choduyet`
--

CREATE TABLE `lichsu_choduyet` (
  `id` int(11) NOT NULL,
  `idChoDuyet` int(11) NOT NULL,
  `idBMNhan` int(11) NOT NULL,
  `ngayNhan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ghiChu` varchar(255) NOT NULL,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lichsu_choduyet`
--

INSERT INTO `lichsu_choduyet` (`id`, `idChoDuyet`, `idBMNhan`, `ngayNhan`, `ghiChu`, `trangThai`) VALUES
(1, 12, 1, '2017-05-09 18:17:37', 'Yêu cầu xếp phòng', 0),
(2, 13, 1, '2017-05-09 18:17:49', 'Yêu cầu xếp phòng', 0),
(3, 1, 1, '2017-05-09 18:19:19', 'Yêu cầu xếp phòng', 0),
(4, 2, 1, '2017-05-09 18:19:26', 'Yêu cầu xếp phòng', 0),
(5, 2, 3, '2017-05-09 18:22:09', 'chuyen', 0),
(6, 3, 1, '2017-05-09 18:22:52', 'Yêu cầu xếp phòng', 0),
(7, 4, 1, '2017-05-10 02:51:43', 'Yêu cầu xếp phòng', 0),
(8, 2, 1, '2017-05-10 02:55:02', 'Đã xếp phòng', 1),
(9, 1, 2, '2017-05-10 02:55:23', 'chuyen', 0),
(10, 1, 2, '2017-05-10 02:56:14', 'Đã xếp phòng', 1),
(11, 3, 2, '2017-05-10 02:57:42', 'chuyen', 0),
(12, 3, 2, '2017-05-10 02:58:21', 'Đã xếp phòng', 1),
(13, 5, 2, '2017-05-10 03:00:36', 'Yêu cầu xếp phòng', 0),
(14, 5, 1, '2017-05-10 03:00:58', 'chuyen', 0),
(15, 5, 3, '2017-05-10 03:01:43', 'chuyen', 0),
(16, 6, 2, '2017-05-12 08:14:37', 'chuyen', 0),
(17, 6, 2, '2017-05-12 08:14:53', 'chuyen', 0),
(18, 6, 4, '2017-05-12 08:15:06', 'chuyen', 0),
(19, 7, 1, '2017-05-13 07:28:44', 'Yêu cầu xếp phòng', 0),
(20, 8, 1, '2017-05-13 07:28:52', 'Yêu cầu xếp phòng', 0),
(21, 9, 1, '2017-05-13 07:29:01', 'Yêu cầu xếp phòng', 0),
(22, 7, 2, '2017-05-13 07:29:53', 'chuyen', 0),
(23, 8, 2, '2017-05-13 07:30:06', 'chuyen', 0),
(24, 9, 2, '2017-05-13 07:30:14', 'chuyen', 0),
(25, 7, 2, '2017-05-13 07:40:44', 'Đã xếp phòng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_vande`
--

CREATE TABLE `lichsu_vande` (
  `id` int(11) NOT NULL,
  `idVanDe` int(11) NOT NULL,
  `ghiChu` varchar(255) NOT NULL,
  `nguoiNhan` int(11) NOT NULL,
  `ngayNhan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_choduyet`
--

CREATE TABLE `lich_choduyet` (
  `id` int(11) NOT NULL,
  `idGiaoVien` int(11) NOT NULL,
  `idPhong` int(11) DEFAULT NULL,
  `idMonHoc` int(11) NOT NULL,
  `Nhom` varchar(255) NOT NULL,
  `idThu` int(11) NOT NULL,
  `idBuoi` int(11) NOT NULL,
  `idTuan` int(11) NOT NULL,
  `idHocKyNienKhoa` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `idBMDuyet` int(11) DEFAULT NULL,
  `ngayGui` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lich_choduyet`
--

INSERT INTO `lich_choduyet` (`id`, `idGiaoVien`, `idPhong`, `idMonHoc`, `Nhom`, `idThu`, `idBuoi`, `idTuan`, `idHocKyNienKhoa`, `TrangThai`, `idBMDuyet`, `ngayGui`) VALUES
(1, 1, 5, 1, '3', 2, 1, 1, 2, 1, 2, '2017-05-09 18:19:19'),
(2, 1, 4, 1, '369', 2, 1, 1, 2, 1, 3, '2017-05-09 18:19:26'),
(3, 1, 8, 1, '789', 2, 1, 1, 2, 1, 2, '2017-05-09 18:22:52'),
(4, 1, 1, 1, '321', 2, 1, 1, 2, 1, 0, '2017-05-10 02:51:43'),
(5, 3, NULL, 1, '35', 2, 1, 1, 2, 0, 3, '2017-05-10 03:00:36'),
(6, 1, NULL, 1, '3', 2, 1, 1, 2, 0, 4, '2017-05-10 03:03:45'),
(7, 1, 7, 1, '101', 2, 1, 1, 2, 1, 2, '2017-05-13 07:28:44'),
(8, 1, NULL, 1, '102', 2, 1, 1, 2, 0, 2, '2017-05-13 07:28:52'),
(9, 1, NULL, 1, '103', 2, 1, 1, 2, 0, 2, '2017-05-13 07:29:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `id` int(11) NOT NULL,
  `MaCB` varchar(255) NOT NULL,
  `MaHP` varchar(255) NOT NULL,
  `Nhom` varchar(255) NOT NULL,
  `SoSV` int(11) NOT NULL,
  `idHocKyNienKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`id`, `MaCB`, `MaHP`, `Nhom`, `SoSV`, `idHocKyNienKhoa`) VALUES
(1, '000509', 'CT123', '01', 24, 2),
(2, '000509', 'CT126', '01', 58, 2),
(3, '000509', 'CT204', '01', 21, 2),
(4, '000509', 'CT311', '01', 87, 2),
(5, '000509', 'CT311', '02', 87, 2),
(6, '000509', 'CT311', '03', 84, 2),
(7, '000509', 'CT313', '01', 24, 2),
(8, '000510', 'CT103', '01', 44, 2),
(9, '000510', 'CT174', '05', 44, 2),
(10, '000510', 'CT174', '06', 12, 2),
(11, '000510', 'CT174', '07', 52, 2),
(12, '000515', 'CT106', '01', 37, 2),
(13, '000515', 'CT127', '01', 50, 2),
(14, '000515', 'CT127', '02', 52, 2),
(15, '000515', 'CT180', '01', 40, 2),
(16, '000515', 'CT180', '02', 39, 2),
(17, '000515', 'CT252', '05', 3, 2),
(18, '000515', 'CT431', '01', 40, 2),
(19, '000516', 'CT178', '05', 41, 2),
(20, '000516', 'CT178', '06', 41, 2),
(21, '000517', 'CT103', '03', 43, 2),
(22, '000517', 'CT103', '04', 44, 2),
(23, '000517', 'CT326', '01', 26, 2),
(24, '000517', 'CT327', '01', 23, 2),
(25, '000517', 'CT466', '01', 5, 2),
(26, '000520', 'CT103', '02', 44, 2),
(27, '000520', 'CT171', '05', 41, 2),
(28, '000520', 'CT171', '06', 41, 2),
(29, '000520', 'CT171', '07', 40, 2),
(30, '000520', 'CT171', '08', 41, 2),
(31, '000520', 'CT171', '09', 39, 2),
(32, '000520', 'CT171', 'H01', 25, 2),
(33, '000520', 'CT171', 'H02', 64, 2),
(34, '000520', 'CT240', '01', 82, 2),
(35, '000527', 'CT173', '03', 84, 2),
(36, '000527', 'CT173', '04', 50, 2),
(37, '000527', 'CT274', '01', 42, 2),
(38, '000527', 'CT329', '01', 26, 2),
(39, '001042', 'TN033', '01', 80, 2),
(40, '001042', 'TN033', '02', 80, 2),
(41, '001042', 'TN033', 'D08', 87, 2),
(42, '001042', 'TN196', 'H01', 22, 2),
(43, '001042', 'TN208', '01', 14, 2),
(44, '001042', 'TN407', 'H01', 70, 2),
(45, '001043', 'TN033', '03', 80, 2),
(46, '001043', 'TN033', '04', 65, 2),
(47, '001043', 'TN033', 'B01', 83, 2),
(48, '001043', 'TN403', '01', 15, 2),
(49, '001044', 'TN033', '19', 78, 2),
(50, '001044', 'TN033', 'E04', 70, 2),
(51, '001044', 'TN033', 'E05', 107, 2),
(52, '001044', 'TN211', '01', 50, 2),
(53, '001067', 'CT171', '01', 41, 2),
(54, '001067', 'CT171', '02', 41, 2),
(55, '001067', 'CT171', '03', 37, 2),
(56, '001067', 'CT171', '04', 39, 2),
(57, '001067', 'CT242', '01', 38, 2),
(58, '001067', 'CT309', '01', 85, 2),
(59, '001068', 'CT239', '02', 5, 2),
(60, '001069', 'CT120', '01', 61, 2),
(61, '001069', 'CT121', '01', 53, 2),
(62, '001069', 'CT174', '01', 80, 2),
(63, '001069', 'CT174', '02', 80, 2),
(64, '001069', 'CT174', '03', 80, 2),
(65, '001069', 'CT174', '04', 79, 2),
(66, '001069', 'CT438', '01', 29, 2),
(67, '001069', 'CT464', '01', 3, 2),
(68, '001069', 'CT594', '01', 37, 2),
(69, '001070', 'CT109', '01', 37, 2),
(70, '001070', 'CT109', '02', 39, 2),
(71, '001070', 'CT109', '03', 39, 2),
(72, '001070', 'CT180', '07', 38, 2),
(73, '001070', 'CT180', '08', 40, 2),
(74, '001070', 'CT182', '04', 40, 2),
(75, '001070', 'CT182', '05', 40, 2),
(76, '001070', 'CT236', '01', 39, 2),
(77, '001070', 'CT236', 'H01', 43, 2),
(78, '001070', 'CT237', '01', 21, 2),
(79, '001070', 'CT252', '01', 10, 2),
(80, '001070', 'CT430', '01', 33, 2),
(81, '001070', 'CT437', '01', 7, 2),
(82, '001070', 'CT461', '01', 6, 2),
(83, '001072', 'CT111', '01', 1, 2),
(84, '001072', 'CT225', '01', 65, 2),
(85, '001072', 'CT226', '01', 3, 2),
(86, '001072', 'CT306', '01', 2, 2),
(87, '001072', 'CT358', '01', 1, 2),
(88, '001072', 'CT428', '01', 43, 2),
(89, '001072', 'CT428', '02', 42, 2),
(90, '001072', 'CT428', '03', 42, 2),
(91, '001072', 'CT439', '01', 6, 2),
(92, '001112', 'CT270', '01', 12, 2),
(93, '001112', 'TN033', 'D01', 89, 2),
(94, '001112', 'TN033', 'D03', 48, 2),
(95, '001112', 'TN210', '01', 60, 2),
(96, '001112', 'TN213', '01', 35, 2),
(97, '001112', 'TN405', '01', 61, 2),
(98, '001112', 'TN408', '01', 49, 2),
(99, '001112', 'TN418', '01', 17, 2),
(100, '001112', 'TN418', 'H01', 61, 2),
(101, '001124', 'CT112', '01', 80, 2),
(102, '001124', 'CT224', '01', 36, 2),
(103, '001124', 'CT226', '03', 2, 2),
(104, '001124', 'CT233', '01', 5, 2),
(105, '001124', 'CT334', '01', 41, 2),
(106, '001124', 'CT334', '02', 29, 2),
(107, '001124', 'CT439', '03', 5, 2),
(108, '001128', 'CT226', '09', 2, 2),
(109, '001128', 'CT335', '01', 70, 2),
(110, '001128', 'CT344', '01', 53, 2),
(111, '001128', 'CT434', '01', 55, 2),
(112, '001128', 'CT439', '09', 5, 2),
(113, '001168', 'CT176', '01', 40, 2),
(114, '001168', 'CT176', '02', 40, 2),
(115, '001168', 'CT221', '01', 38, 2),
(116, '001168', 'CT226', '02', 2, 2),
(117, '001168', 'CT319', '01', 25, 2),
(118, '001168', 'CT439', '02', 5, 2),
(119, '001169', 'TN033', '13', 27, 2),
(120, '001169', 'TN033', 'D04', 78, 2),
(121, '001169', 'TN033', 'D05', 38, 2),
(122, '001169', 'TN404', '01', 13, 2),
(123, '001170', 'TN033', 'D12', 62, 2),
(124, '001170', 'TN033', 'D13', 50, 2),
(125, '001170', 'TN212', '01', 60, 2),
(126, '001170', 'TN229', '01', 30, 2),
(127, '001170', 'TN229', '02', 33, 2),
(128, '001229', 'CT179', '01', 41, 2),
(129, '001229', 'CT179', '02', 41, 2),
(130, '001229', 'CT179', '03', 41, 2),
(131, '001229', 'CT179', '04', 42, 2),
(132, '001229', 'CT412', '01', 24, 2),
(133, '001229', 'CT447', '01', 29, 2),
(134, '001229', 'CT466', '02', 10, 2),
(135, '001230', 'CT176', '03', 32, 2),
(136, '001230', 'CT176', '04', 39, 2),
(137, '001230', 'CT176', '05', 35, 2),
(138, '001230', 'CT176', '06', 39, 2),
(139, '001230', 'CT176', '07', 40, 2),
(140, '001230', 'CT226', '04', 2, 2),
(141, '001230', 'CT341', '01', 26, 2),
(142, '001230', 'CT439', '04', 5, 2),
(143, '001232', 'CT328', '01', 29, 2),
(144, '001322', 'TN033', '06', 79, 2),
(145, '001322', 'TN033', '07', 80, 2),
(146, '001322', 'TN033', 'B03', 68, 2),
(147, '001322', 'TN033', 'B04', 68, 2),
(148, '001322', 'TN033', 'E01', 58, 2),
(149, '001322', 'TN033', 'E02', 84, 2),
(150, '001322', 'TN185', '01', 43, 2),
(151, '001323', 'CT112', '02', 80, 2),
(152, '001323', 'CT338', '01', 23, 2),
(153, '001348', 'CT101', 'M01', 38, 2),
(154, '001348', 'CT101', 'M02', 38, 2),
(155, '001348', 'CT175', '01', 80, 2),
(156, '001348', 'CT175', '02', 80, 2),
(157, '001348', 'CT175', '03', 48, 2),
(158, '001348', 'CT175', '04', 81, 2),
(159, '001348', 'CT202', '01', 59, 2),
(160, '001348', 'CT311', 'H01', 64, 2),
(161, '001348', 'CT311', 'H02', 44, 2),
(162, '001349', 'CT211', '01', 35, 2),
(163, '001349', 'CT466', '03', 4, 2),
(164, '001352', 'CT109', 'H01', 39, 2),
(165, '001352', 'CT109', 'H02', 59, 2),
(166, '001352', 'CT180', '09', 40, 2),
(167, '001352', 'CT180', '10', 38, 2),
(168, '001352', 'CT181', '01', 39, 2),
(169, '001352', 'CT181', '02', 41, 2),
(170, '001352', 'CT181', '03', 41, 2),
(171, '001352', 'CT183', '01', 38, 2),
(172, '001352', 'CT183', '02', 40, 2),
(173, '001352', 'CT205', '01', 40, 2),
(174, '001352', 'CT205', '02', 40, 2),
(175, '001352', 'CT252', '02', 10, 2),
(176, '001352', 'CT269', 'H01', 54, 2),
(177, '001352', 'CT437', '02', 8, 2),
(178, '001352', 'CT461', '02', 6, 2),
(179, '001353', 'CT180', '03', 40, 2),
(180, '001353', 'CT180', '04', 40, 2),
(181, '001353', 'CT180', '05', 40, 2),
(182, '001353', 'CT180', '06', 40, 2),
(183, '001353', 'CT182', '01', 41, 2),
(184, '001353', 'CT182', '02', 41, 2),
(185, '001353', 'CT182', '03', 41, 2),
(186, '001353', 'CT252', '03', 11, 2),
(187, '001353', 'CT437', '03', 10, 2),
(188, '001353', 'CT461', '03', 6, 2),
(189, '001521', 'CT051H', 'M01', 38, 2),
(190, '001521', 'CT051H', 'M02', 38, 2),
(191, '001531', 'CT109', '05', 40, 2),
(192, '001531', 'CT109', '06', 40, 2),
(193, '001531', 'CT109', '07', 40, 2),
(194, '001531', 'CT180', '11', 30, 2),
(195, '001531', 'CT205', '03', 39, 2),
(196, '001531', 'CT205', '04', 20, 2),
(197, '001531', 'CT252', '04', 10, 2),
(198, '001531', 'CT253', '01', 42, 2),
(199, '001531', 'CT307', '01', 1, 2),
(200, '001531', 'CT461', '04', 6, 2),
(201, '001531', 'CT591', '01', 29, 2),
(202, '001533', 'CT178', '01', 41, 2),
(203, '001533', 'CT178', '02', 41, 2),
(204, '001533', 'CT187', '01', 40, 2),
(205, '001533', 'CT187', '02', 40, 2),
(206, '001533', 'CT466', '04', 6, 2),
(207, '001533', 'CT468', '01', 3, 2),
(208, '001533', 'TN033', 'M01', 38, 2),
(209, '001533', 'TN034', 'M01', 38, 2),
(210, '001586', 'CT101', '01', 41, 2),
(211, '001586', 'CT101', '02', 41, 2),
(212, '001586', 'CT101', 'G03', 39, 2),
(213, '001586', 'CT103', 'H01', 50, 2),
(214, '001586', 'CT158', '01', 32, 2),
(215, '001586', 'CT239', '01', 5, 2),
(216, '001602', 'TN033', '14', 43, 2),
(217, '001602', 'TN033', 'D10', 70, 2),
(218, '001602', 'TN033', 'D11', 55, 2),
(219, '001602', 'TN277', '01', 82, 2),
(220, '001603', 'TN033', '15', 79, 2),
(221, '001603', 'TN033', '16', 35, 2),
(222, '001603', 'TN033', 'C03', 77, 2),
(223, '001603', 'TN034', '01', 108, 2),
(224, '001603', 'TN034', '02', 98, 2),
(225, '001603', 'TN034', '03', 100, 2),
(226, '001603', 'TN034', '04', 109, 2),
(227, '001603', 'TN034', '05', 99, 2),
(228, '001603', 'TN034', '06', 114, 2),
(229, '001603', 'TN034', '07', 100, 2),
(230, '001603', 'TN034', 'B01', 91, 2),
(231, '001603', 'TN034', 'B03', 69, 2),
(232, '001603', 'TN034', 'B04', 81, 2),
(233, '001603', 'TN034', 'C01', 104, 2),
(234, '001603', 'TN034', 'C03', 73, 2),
(235, '001603', 'TN034', 'D01', 86, 2),
(236, '001603', 'TN034', 'D03', 74, 2),
(237, '001603', 'TN034', 'D04', 80, 2),
(238, '001603', 'TN034', 'D05', 38, 2),
(239, '001603', 'TN034', 'D07', 80, 2),
(240, '001603', 'TN034', 'D08', 75, 2),
(241, '001603', 'TN034', 'D10', 64, 2),
(242, '001603', 'TN034', 'D11', 51, 2),
(243, '001603', 'TN034', 'D12', 55, 2),
(244, '001603', 'TN034', 'D13', 56, 2),
(245, '001603', 'TN034', 'E01', 58, 2),
(246, '001603', 'TN034', 'E02', 44, 2),
(247, '001603', 'TN034', 'E03', 71, 2),
(248, '001603', 'TN034', 'E04', 53, 2),
(249, '001603', 'TN034', 'E05', 111, 2),
(250, '001603', 'TN034', 'G01', 66, 2),
(251, '001603', 'TN034', 'G02', 77, 2),
(252, '001603', 'TN034', 'G03', 21, 2),
(253, '001603', 'TN207', '01', 34, 2),
(254, '001603', 'TN216', '01', 63, 2),
(255, '001707', 'CT124', '01', 50, 2),
(256, '001707', 'CT128', '01', 25, 2),
(257, '001707', 'CT172', '01', 44, 2),
(258, '001707', 'CT172', '02', 44, 2),
(259, '001707', 'CT203', '01', 35, 2),
(260, '001707', 'CT465', '01', 8, 2),
(261, '001708', 'CT114', '01', 54, 2),
(262, '001708', 'CT333', '01', 17, 2),
(263, '001708', 'CT428', '04', 42, 2),
(264, '001708', 'CT428', '05', 40, 2),
(265, '001708', 'CT439', '08', 5, 2),
(266, '001806', 'CT101', 'H01', 47, 2),
(267, '001806', 'TN033', 'G01', 71, 2),
(268, '001806', 'TN033', 'G02', 69, 2),
(269, '001806', 'TN033', 'G03', 35, 2),
(270, '001943', 'CT112', '03', 80, 2),
(271, '001943', 'CT112', '04', 80, 2),
(272, '001943', 'CT118', '02', 49, 2),
(273, '001943', 'CT184', '01', 35, 2),
(274, '001943', 'CT184', '02', 32, 2),
(275, '001943', 'CT184', '03', 17, 2),
(276, '001943', 'CT184', '04', 27, 2),
(277, '001943', 'CT184', 'H01', 32, 2),
(278, '001943', 'CT184', 'H02', 49, 2),
(279, '001943', 'CT466', '05', 6, 2),
(280, '001943', 'CT468', '02', 2, 2),
(281, '001943', 'TN033', 'M02', 38, 2),
(282, '001943', 'TN034', 'M02', 38, 2),
(283, '002172', 'TN222', '01', 73, 2),
(284, '002207', 'CT101', '03', 41, 2),
(285, '002207', 'CT101', '04', 41, 2),
(286, '002207', 'CT101', '06', 41, 2),
(287, '002207', 'CT101', '07', 41, 2),
(288, '002207', 'CT101', '16', 39, 2),
(289, '002226', 'CT180', 'H02', 27, 2),
(290, '002226', 'CT180', 'H03', 21, 2),
(291, '002226', 'CT236', '02', 14, 2),
(292, '002266', 'CT110', '01', 16, 2),
(293, '002266', 'CT252', '06', 6, 2),
(294, '002266', 'CT304', '01', 39, 2),
(295, '002266', 'CT304', '02', 17, 2),
(296, '002266', 'CT437', '04', 8, 2),
(297, '002366', 'CT104', '01', 40, 2),
(298, '002366', 'CT173', '02', 84, 2),
(299, '002366', 'CT176', '08', 37, 2),
(300, '002366', 'CT176', '09', 40, 2),
(301, '002366', 'CT176', '10', 40, 2),
(302, '002366', 'CT176', '11', 11, 2),
(303, '002366', 'CT226', '06', 1, 2),
(304, '002366', 'CT439', '05', 5, 2),
(305, '002366', 'CT462', '01', 24, 2),
(306, '002366', 'CT592', '01', 23, 2),
(307, '002367', 'CT112', 'H01', 33, 2),
(308, '002367', 'CT112', 'H02', 40, 2),
(309, '002367', 'CT112', 'H03', 27, 2),
(310, '002367', 'CT173', '01', 85, 2),
(311, '002367', 'CT176', 'H03', 42, 2),
(312, '002367', 'CT226', '07', 2, 2),
(313, '002367', 'CT439', '06', 5, 2),
(314, '002395', 'TN033', '10', 29, 2),
(315, '002395', 'TN033', '11', 30, 2),
(316, '002395', 'TN033', 'C01', 100, 2),
(317, '002395', 'TN201', '01', 35, 2),
(318, '002455', 'TN033', '05', 34, 2),
(319, '002455', 'TN033', '09', 13, 2),
(320, '002455', 'TN033', 'D07', 76, 2),
(321, '002455', 'TN411', '01', 54, 2),
(322, '002480', 'CT112', '05', 77, 2),
(323, '002480', 'CT112', '06', 66, 2),
(324, '002480', 'CT337', '01', 27, 2),
(325, '002480', 'CT439', '07', 5, 2),
(326, '002481', 'CT176', '12', 39, 2),
(327, '002482', 'CT101', '12', 42, 2),
(328, '002482', 'CT101', '13', 42, 2),
(329, '002482', 'CT101', '14', 41, 2),
(330, '002482', 'CT174', 'H01', 24, 2),
(331, '002482', 'CT241', '01', 73, 2),
(332, '002482', 'CT251', '01', 44, 2),
(333, '002626', 'CT101', '15', 40, 2),
(334, '002626', 'CT101', 'G02', 40, 2),
(335, '002626', 'CT170', '01', 19, 2),
(336, '002626', 'CT179', 'H03', 39, 2),
(337, '002626', 'CT448', '01', 23, 2),
(338, '002628', 'CT101', '05', 41, 2),
(339, '002628', 'CT101', '08', 41, 2),
(340, '002628', 'CT101', '09', 38, 2),
(341, '002628', 'CT101', '10', 41, 2),
(342, '002628', 'CT101', '11', 41, 2),
(343, '002628', 'CT115', '01', 18, 2),
(344, '002628', 'CT276', '01', 98, 2),
(345, '002635', 'CT201', '01', 40, 2),
(346, '002635', 'CT312', '01', 27, 2),
(347, '002635', 'CT312', '02', 35, 2),
(348, '002635', 'CT316', '01', 37, 2),
(349, '002635', 'CT316', '02', 35, 2),
(350, '002635', 'CT332', '01', 60, 2),
(351, '002635', 'CT332', '02', 62, 2),
(352, '002635', 'CT332', 'H01', 63, 2),
(353, '002635', 'CT332', 'H02', 35, 2),
(354, '002635', 'CT440', '01', 25, 2),
(355, '002635', 'CT595', '01', 28, 2),
(356, '002685', 'CT178', '03', 41, 2),
(357, '002685', 'CT178', '04', 42, 2),
(358, '002685', 'CT187', '03', 43, 2),
(359, '002685', 'CT187', '04', 44, 2),
(360, '002685', 'CT271', '01', 13, 2),
(361, '002685', 'CT593', '01', 35, 2),
(362, '002692', 'CT172', '03', 27, 2),
(363, '002692', 'CT172', '04', 44, 2),
(364, '002692', 'CT172', '05', 40, 2),
(365, '002692', 'CT172', '06', 36, 2),
(366, '002692', 'CT172', '07', 44, 2),
(367, '002692', 'CT172', '08', 42, 2),
(368, '002742', 'CT178', 'H01', 89, 2),
(369, '002742', 'CT178', 'H02', 88, 2),
(370, '002742', 'CT183', '03', 32, 2),
(371, '002742', 'CT183', '04', 27, 2),
(372, '002742', 'CT187', '05', 41, 2),
(373, '002742', 'CT466', '07', 3, 2),
(374, '010006', 'CT057H', 'M01', 38, 2),
(375, '010006', 'CT057H', 'M02', 38, 2),
(376, '700508', 'CT336', '01', 26, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_02_14_044227_ChucVu', 1),
('2017_02_14_054640_BoMon', 1),
('2017_02_14_054907_LopHocPhan', 1),
('2017_02_14_055245_PhanMem', 1),
('2017_02_14_055533_CauHinh', 1),
('2017_02_14_055753_Thu', 1),
('2017_02_14_055929_MonHoc', 1),
('2017_02_14_060626_GiaoVien', 1),
('2017_02_14_060635_GiaoVien_ChucVu', 1),
('2017_02_14_060643_TaiKhoan', 1),
('2017_02_14_060713_Lich', 1),
('2017_02_14_060719_Phong', 1),
('2017_02_14_060730_Phong_PhanMem', 1),
('2017_03_16_051900_taoBangVanDe', 2),
('2017_03_16_053725_taoBangGiaoVien', 3),
('2017_03_29_085238_entrust_setup_tables', 3),
('2017_04_14_074848_TaoBangHopThu', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(11) NOT NULL,
  `MaMH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenMH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoTinChi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id`, `MaMH`, `TenMH`, `SoTinChi`) VALUES
(1, 'CT106', 'Hệ cơ sở dữ liệu', 4),
(2, 'CT110', 'Hệ quản trị cơ sở dữ liệu', 2),
(3, 'CT107', 'Hệ điều hành', 3),
(4, 'CT428', 'Lập trình Web', 3),
(5, 'CT128', 'Kỹ thuật đồ hoạ - CNTT', 2),
(6, 'CT332', 'Trí tuệ nhân tạo', 3),
(7, 'CT120', 'Phân tích và thiết kế thuật toán', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc_phanmem`
--

CREATE TABLE `monhoc_phanmem` (
  `id` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `idPhanMem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monhoc_phanmem`
--

INSERT INTO `monhoc_phanmem` (`id`, `idMonHoc`, `idPhanMem`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 1, 3),
(6, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanmem`
--

CREATE TABLE `phanmem` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenPM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhienBan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanmem`
--

INSERT INTO `phanmem` (`id`, `TenPM`, `PhienBan`) VALUES
(1, 'Ubuntu', '14.04'),
(2, 'windows', '8'),
(3, 'Xampp', '5.7'),
(4, 'DevC', '3.5'),
(5, 'NetBean', '8.1'),
(6, 'Eclipse', '10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenPhong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idBoMon` int(11) NOT NULL,
  `DLRam` int(11) NOT NULL,
  `DLOCung` int(11) NOT NULL,
  `CPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id`, `TenPhong`, `idBoMon`, `DLRam`, `DLOCung`, `CPU`, `GPU`) VALUES
(1, 'P01', 1, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(2, 'P02', 1, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(3, 'P03', 1, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(4, 'P04', 1, 2, 100, 'Intel Core i3-6100', 'Không'),
(5, 'P05', 2, 2, 100, 'Intel Core i5-6100', ''),
(7, 'P07', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(8, 'P08', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(9, 'P09', 3, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(11, 'P11', 3, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(12, 'P12', 3, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(13, 'P15', 5, 3, 120, 'Core i3', 'Không'),
(14, 'P10', 4, 3, 200, 'Core i5', 'Có');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_phanmem`
--

CREATE TABLE `phong_phanmem` (
  `id` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `idPhanMem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_phanmem`
--

INSERT INTO `phong_phanmem` (`id`, `idPhong`, `idPhanMem`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 3, 2),
(7, 3, 5),
(8, 3, 6),
(9, 4, 4),
(10, 4, 5),
(11, 4, 6),
(12, 5, 2),
(13, 6, 3),
(14, 7, 2),
(15, 8, 5),
(16, 9, 6),
(17, 10, 4),
(18, 11, 5),
(19, 12, 6),
(20, 3, 1),
(23, 1, 3),
(26, 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'Nhóm tài khoản quản trị hệ thống', '2017-04-05 23:49:24', '2017-04-05 23:49:24'),
(2, 'manager', 'Quản lý', 'Nhóm tài khoản quản lý hệ thống', '2017-04-05 23:49:24', '2017-04-05 23:49:24'),
(3, 'normal', 'Người dùng bình thường', 'Nhóm tài khoản bình thường', '2017-04-05 23:49:25', '2017-04-05 23:49:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thu`
--

CREATE TABLE `thu` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenThu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thu`
--

INSERT INTO `thu` (`id`, `TenThu`, `TenVietTat`) VALUES
(2, 'Thứ hai', 'Th2'),
(3, 'Thứ ba', 'Th3'),
(4, 'Thứ tư', 'Th4'),
(5, 'Thứ năm', 'Th5'),
(6, 'Thứ sáu', 'Th6'),
(7, 'Thứ bảy', 'Th7'),
(8, 'Chủ nhật', 'CN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuan`
--

CREATE TABLE `tuan` (
  `id` int(11) NOT NULL,
  `TenTuan` varchar(255) NOT NULL,
  `TenVietTat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tuan`
--

INSERT INTO `tuan` (`id`, `TenTuan`, `TenVietTat`) VALUES
(1, '01', 'T01'),
(2, '02', 'T02'),
(3, '03', 'T03'),
(4, '04', 'T04'),
(5, '05', 'T05'),
(6, '06', 'T06'),
(7, '07', 'T07'),
(8, '08', 'T08'),
(9, '09', 'T09'),
(10, '10', 'T10'),
(11, '11', 'T11'),
(12, '12', 'T12'),
(13, '13', 'T13'),
(14, '14', 'T14'),
(15, '15', 'T15'),
(16, '16', 'T16'),
(17, '17', 'T17'),
(18, '18', 'T18'),
(19, '19', 'T19'),
(20, '20', 'T20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vande`
--

CREATE TABLE `vande` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPhong` int(11) NOT NULL,
  `tomTatVD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiTietVD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangThai` tinyint(1) NOT NULL,
  `nguoiBaoCao` int(11) NOT NULL,
  `ngayBaoCao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nguoiNhan` int(11) NOT NULL,
  `ngayNhan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vande`
--

INSERT INTO `vande` (`id`, `idPhong`, `tomTatVD`, `chiTietVD`, `trangThai`, `nguoiBaoCao`, `ngayBaoCao`, `nguoiNhan`, `ngayNhan`) VALUES
(1, 1, 'Bị hỏng chuột', 'Bị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuột', 0, 0, '2017-05-09 13:18:25', 0, '2017-05-09 13:18:25'),
(2, 2, 'Bị hỏng màn hình', 'Bị hỏng màn hình', 1, 0, '2017-05-09 13:18:25', 0, '2017-05-09 13:18:25'),
(3, 9, 'Bị hỏng chuột', 'Bị hỏng chuột mays 40 40 40 404 070 40 0', 1, 0, '2017-05-09 13:18:25', 0, '2017-05-09 13:18:25'),
(4, 14, 'Bi hu chuot', 'qưertyuio', 0, 0, '2017-05-09 13:18:25', 0, '2017-05-09 13:18:25'),
(5, 1, 'Bi hỏng chuột', 'Tất cả chuột ở các máy đều biij hỏngs', 0, 1, '2017-05-09 20:43:51', 0, '2017-05-09 20:43:51'),
(6, 2, 'Chuột máy 2 hư', 'Chuột máy 2 hư', 0, 1, '2017-05-10 02:53:15', 0, '2017-05-10 02:53:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buoi`
--
ALTER TABLE `buoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cauhinh`
--
ALTER TABLE `cauhinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocky_nienkhoa`
--
ALTER TABLE `hocky_nienkhoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hopthu`
--
ALTER TABLE `hopthu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu_choduyet`
--
ALTER TABLE `lichsu_choduyet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lich_choduyet`
--
ALTER TABLE `lich_choduyet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoc_phanmem`
--
ALTER TABLE `monhoc_phanmem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `phanmem`
--
ALTER TABLE `phanmem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong_phanmem`
--
ALTER TABLE `phong_phanmem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `thu`
--
ALTER TABLE `thu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuan`
--
ALTER TABLE `tuan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vande`
--
ALTER TABLE `vande`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `buoi`
--
ALTER TABLE `buoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `cauhinh`
--
ALTER TABLE `cauhinh`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `hocky_nienkhoa`
--
ALTER TABLE `hocky_nienkhoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `hopthu`
--
ALTER TABLE `hopthu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lich`
--
ALTER TABLE `lich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT cho bảng `lichsu_choduyet`
--
ALTER TABLE `lichsu_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT cho bảng `lich_choduyet`
--
ALTER TABLE `lich_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `monhoc_phanmem`
--
ALTER TABLE `monhoc_phanmem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phanmem`
--
ALTER TABLE `phanmem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `phong_phanmem`
--
ALTER TABLE `phong_phanmem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `thu`
--
ALTER TABLE `thu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `tuan`
--
ALTER TABLE `tuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `vande`
--
ALTER TABLE `vande`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `giaovien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
