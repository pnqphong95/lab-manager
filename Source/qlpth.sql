-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2017 lúc 03:40 SA
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id`, `MaGV`, `HoGV`, `TenGV`, `NgaySinh`, `GioiTinh`, `SDT`, `idBoMon`, `password`, `KichHoat`, `idChucVu`, `remember_token`) VALUES
(1, '0000', 'Account', 'Admin', '2017-04-07', 1, '0970000000', 1, '$2y$10$Zg3hwGVbgsLB8teHJ24JnOwGP.A7PhiQViz7LMVYROciojGPO/ovO', 1, 1, '48jfAxcNHp2dZvssQ2pgg3IgK2uxX4YcDElbsX7tfvlEMN4OhWHG2kbOsraQ'),
(2, '0001', 'Phạm Duy', 'Hậu', '2017-04-15', 0, '0971111111', 1, '$2y$10$4dUE9W4hRnK9q4LTyMf8bOBugz43UkrEYsEsbJ8SmzxXM07riHGk6', 1, 2, '86wWkWDJYaLitBnSiCouWUOwcMMeogP9wlcmKO7OQGNssBHPZs2U8KjKaynl'),
(3, '0010', 'Quản lý bộ môn', 'HTTT', '2017-05-05', 1, '0971234567', 2, '$2y$10$CIpxbCXp8fgApKST7U5Kj.48gq4D3xgQNgBxF6u.7r./DyuviavMK', 1, 2, 'AWN3rp6keUwmnKIZO3JbSrzsl3BNHxMfqI2yV1d4IbTSbpMTgWbrggXriZgq'),
(4, '0002', 'Quản lý', 'Bộ môn', '2017-03-31', 0, '09874563214', 1, '$2y$10$KIo2xhJX7ddhYf9fepaWe.Ddkce5whRi78qreTbDQT3NZ5pN3h5Se', 1, 2, '');

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
  `idHocKyNienKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lich`
--

INSERT INTO `lich` (`id`, `idGiaoVien`, `idPhong`, `idMonHoc`, `Nhom`, `idThu`, `idBuoi`, `idTuan`, `idHocKyNienKhoa`) VALUES
(1, 1, 1, 1, '1', 2, 1, 1, 2),
(4, 1, 1, 1, '1', 2, 1, 4, 2),
(6, 1, 1, 1, '1', 7, 1, 4, 2),
(7, 1, 1, 1, '1', 2, 1, 7, 2),
(8, 1, 1, 1, '1', 4, 1, 7, 2),
(9, 1, 1, 1, '1', 7, 1, 7, 2),
(10, 1, 1, 1, '1', 2, 1, 10, 2),
(11, 1, 1, 1, '1', 4, 1, 10, 2),
(12, 1, 1, 1, '1', 7, 1, 10, 2),
(13, 1, 2, 1, '4', 2, 1, 1, 2),
(14, 1, 3, 1, '5', 2, 1, 1, 2),
(15, 1, 3, 1, '1', 4, 1, 1, 2);

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
(6, 3, 1, '2017-05-09 18:22:52', 'Yêu cầu xếp phòng', 0);

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
(1, 1, NULL, 1, '3', 2, 1, 1, 2, 0, 0, '2017-05-09 18:19:19'),
(2, 1, NULL, 1, '369', 2, 1, 1, 2, 0, 3, '2017-05-09 18:19:26'),
(3, 1, NULL, 1, '789', 2, 1, 1, 2, 0, 0, '2017-05-09 18:22:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `id` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `MaLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SiSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`id`, `idMonHoc`, `MaLop`, `TenLop`, `SiSo`) VALUES
(1, 1, 'CT00101', 'Tin hoc can ban', 50),
(2, 1, 'CT00102', 'Tin hoc can ban', 50),
(3, 1, 'Ct00201', 'He Dieu Hanh', 50);

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
(6, 'P06', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(7, 'P07', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(8, 'P08', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(9, 'P09', 3, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(11, 'P11', 3, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(12, 'P12', 3, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(13, 'P15', 5, 3, 120, 'Core i3', 'Không'),
(14, 'P10', 4, 3, 200, 'Core i5', 'Có'),
(15, 'P13', 5, 3, 200, 'Core i5', 'Không');

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
(21, 1, 4);

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
(5, 1, 'Bi hỏng chuột', 'Tất cả chuột ở các máy đều biij hỏngs', 0, 1, '2017-05-09 20:43:51', 0, '2017-05-09 20:43:51');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `lichsu_choduyet`
--
ALTER TABLE `lichsu_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `lich_choduyet`
--
ALTER TABLE `lich_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
