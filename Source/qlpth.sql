-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 01:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlpth`
--

-- --------------------------------------------------------

--
-- Table structure for table `bomon`
--

CREATE TABLE `bomon` (
  `id` int(11) NOT NULL,
  `TenBM` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bomon`
--

INSERT INTO `bomon` (`id`, `TenBM`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Hệ thống thông tin'),
(3, 'Khoa học máy tính'),
(4, 'Kỹ thuật phần mềm'),
(5, 'Truyền thông và mạng máy tính'),
(6, 'Tin học ứng dụng'),
(7, 'Tin học ứng dụng 123');

-- --------------------------------------------------------

--
-- Table structure for table `buoi`
--

CREATE TABLE `buoi` (
  `id` int(11) NOT NULL,
  `TenBuoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buoi`
--

INSERT INTO `buoi` (`id`, `TenBuoi`) VALUES
(1, 'Sáng'),
(2, 'Chiều');

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `id` int(11) UNSIGNED NOT NULL,
  `DLRam` int(11) NOT NULL,
  `DLOCung` int(11) NOT NULL,
  `CPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GPU` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhinh`
--

INSERT INTO `cauhinh` (`id`, `DLRam`, `DLOCung`, `CPU`, `GPU`) VALUES
(1, 2, 100, 'Intel Core i3-6100', 'Không'),
(2, 2, 100, 'Intel Pentium G3258', 'Không'),
(3, 4, 100, 'Intel Pentium G3258', 'GeForce GT 730'),
(4, 4, 100, 'Intel Core i3-6100', 'GeForce GT 730');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) UNSIGNED NOT NULL,
  `TenCV` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `TenCV`) VALUES
(1, 'Giảng viên'),
(2, 'Quản lý bộ môn'),
(3, 'Quản lý khoa');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(11) NOT NULL,
  `MaGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `SDT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idBoMon` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `KichHoat` int(11) NOT NULL,
  `idChucVu` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`id`, `MaGV`, `HoGV`, `TenGV`, `NgaySinh`, `GioiTinh`, `SDT`, `idBoMon`, `password`, `KichHoat`, `idChucVu`, `remember_token`) VALUES
(1, '0001', 'Phạm Duy', 'Hậu', '1995-02-01', 0, '0987123456', 1, '$2y$10$eaQyy.xQcw5eyzpp5kq/he.Ip4o0DF2.o9EW/oKjOpTSgQitWXQG.', 0, 1, 'Z2OWSmKXY9ZCxbMqhvyfcuGekitmAGeNSIawqQANuoB43SWKyEmDBOHzkhFF'),
(2, '0002', 'Nguyễn Văn', 'Ten', '1995-02-01', 0, '0987123456', 1, '$2y$10$CUZ/OGjn.Q/WLQmX10CtDeheMJTlct2UCs/EeCzQYEVSJ.JCYZGr6', 0, 2, '9Gqa5wBkJ1tsQWklhJ5qeiZ8NgL5M4Kdm1jSC6jAfioSg5PvbUpDKhpRyHvX'),
(3, '0003', 'Trần Thới', 'Lên', '1995-02-01', 1, '0987123456', 2, '', 0, 3, ''),
(4, '0004', 'Lê Lộc', 'Ba', '1995-02-01', 0, '0987123456', 2, '', 0, 1, ''),
(5, '0005', 'Hồ Anh', 'Tư', '1995-02-01', 0, '0987123456', 2, '', 0, 2, ''),
(6, '0006', 'Phan Ca', 'Bình', '1995-02-01', 1, '0987123456', 3, '', 0, 1, ''),
(7, '0007', 'Ninh Lâm', 'Hai', '1995-02-01', 1, '0987123456', 3, '', 0, 2, ''),
(8, '0008', 'Thái Anh', 'Nhàn', '1995-02-01', 1, '0987123456', 4, '', 0, 1, ''),
(9, '0009', 'Hoàng Quá', 'Kiệt', '1995-02-01', 1, '0987123456', 5, '', 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien_chucvu`
--

CREATE TABLE `giaovien_chucvu` (
  `id` int(11) NOT NULL,
  `idGiaoVien` int(11) NOT NULL,
  `idChucVu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien_chucvu`
--

INSERT INTO `giaovien_chucvu` (`id`, `idGiaoVien`, `idChucVu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 3, 1),
(6, 4, 1),
(7, 5, 1),
(8, 6, 1),
(9, 7, 1),
(10, 8, 1),
(11, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hocky_nienkhoa`
--

CREATE TABLE `hocky_nienkhoa` (
  `id` int(11) NOT NULL,
  `HocKy` varchar(255) NOT NULL,
  `NienKhoa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocky_nienkhoa`
--

INSERT INTO `hocky_nienkhoa` (`id`, `HocKy`, `NienKhoa`) VALUES
(1, '1', '2016-2017'),
(2, '2', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `lich`
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
-- Dumping data for table `lich`
--

INSERT INTO `lich` (`id`, `idGiaoVien`, `idPhong`, `idMonHoc`, `Nhom`, `idThu`, `idBuoi`, `idTuan`, `idHocKyNienKhoa`) VALUES
(1, 1, 1, 1, '3', 2, 1, 4, 2),
(2, 1, 1, 1, '3', 3, 2, 4, 2),
(3, 1, 1, 1, '3', 7, 1, 4, 2),
(4, 1, 1, 1, '3', 8, 2, 4, 2),
(5, 1, 1, 1, '3', 2, 1, 8, 2),
(6, 1, 1, 1, '3', 3, 2, 8, 2),
(7, 1, 1, 1, '3', 7, 1, 8, 2),
(8, 1, 1, 1, '3', 8, 2, 8, 2),
(9, 1, 1, 1, '3', 2, 1, 12, 2),
(10, 1, 1, 1, '3', 3, 2, 12, 2),
(11, 1, 1, 1, '3', 7, 1, 12, 2),
(12, 1, 1, 1, '3', 8, 2, 12, 2),
(13, 1, 1, 1, '3', 2, 1, 16, 2),
(14, 1, 1, 1, '3', 3, 2, 16, 2),
(15, 1, 1, 1, '3', 7, 1, 16, 2),
(16, 1, 1, 1, '3', 8, 2, 16, 2),
(17, 1, 1, 1, '3', 2, 1, 20, 2),
(18, 1, 1, 1, '3', 3, 2, 20, 2),
(19, 1, 1, 1, '3', 7, 1, 20, 2),
(20, 1, 1, 1, '3', 8, 2, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lich_choduyet`
--

CREATE TABLE `lich_choduyet` (
  `id` int(11) NOT NULL,
  `idGiaoVien` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `Nhom` varchar(255) NOT NULL,
  `idThu` int(11) NOT NULL,
  `idBuoi` int(11) NOT NULL,
  `idTuan` int(11) NOT NULL,
  `idLastHKNK` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lophocphan`
--

CREATE TABLE `lophocphan` (
  `id` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `MaLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SiSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophocphan`
--

INSERT INTO `lophocphan` (`id`, `idMonHoc`, `MaLop`, `TenLop`, `SiSo`) VALUES
(1, 1, 'CT00101', 'Tin hoc can ban', 50),
(2, 1, 'CT00102', 'Tin hoc can ban', 50),
(3, 1, 'Ct00201', 'He Dieu Hanh', 50);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
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
('2017_03_16_051900_taoBangVanDe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(11) NOT NULL,
  `MaMH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenMH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoTinChi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
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
-- Table structure for table `monhoc_phanmem`
--

CREATE TABLE `monhoc_phanmem` (
  `id` int(11) NOT NULL,
  `idMonHoc` int(11) NOT NULL,
  `idPhanMem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monhoc_phanmem`
--

INSERT INTO `monhoc_phanmem` (`id`, `idMonHoc`, `idPhanMem`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `phanmem`
--

CREATE TABLE `phanmem` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenPM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhienBan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanmem`
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
-- Table structure for table `phong`
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
-- Dumping data for table `phong`
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
-- Table structure for table `phong_phanmem`
--

CREATE TABLE `phong_phanmem` (
  `id` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `idPhanMem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phong_phanmem`
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
(20, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thu`
--

CREATE TABLE `thu` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenThu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thu`
--

INSERT INTO `thu` (`id`, `TenThu`) VALUES
(2, 'Thứ hai'),
(3, 'Thứ ba'),
(4, 'Thứ tư'),
(5, 'Thứ năm'),
(6, 'Thứ sáu'),
(7, 'Thứ bảy'),
(8, 'Chủ nhật');

-- --------------------------------------------------------

--
-- Table structure for table `tuan`
--

CREATE TABLE `tuan` (
  `id` int(11) NOT NULL,
  `TenTuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuan`
--

INSERT INTO `tuan` (`id`, `TenTuan`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20');

-- --------------------------------------------------------

--
-- Table structure for table `vande`
--

CREATE TABLE `vande` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPhong` int(11) NOT NULL,
  `tomTatVD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiTietVD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vande`
--

INSERT INTO `vande` (`id`, `idPhong`, `tomTatVD`, `chiTietVD`, `trangThai`) VALUES
(1, 1, 'Bị hỏng chuột', 'Bị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuộtBị hỏng chuột', 0),
(2, 2, 'Bị hỏng màn hình', 'Bị hỏng màn hình', 1),
(3, 9, 'Bị hỏng chuột', 'Bị hỏng chuột mays 40 40 40 404 070 40 0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buoi`
--
ALTER TABLE `buoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cauhinh`
--
ALTER TABLE `cauhinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MaGV` (`MaGV`);

--
-- Indexes for table `giaovien_chucvu`
--
ALTER TABLE `giaovien_chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hocky_nienkhoa`
--
ALTER TABLE `hocky_nienkhoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lich_choduyet`
--
ALTER TABLE `lich_choduyet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monhoc_phanmem`
--
ALTER TABLE `monhoc_phanmem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phanmem`
--
ALTER TABLE `phanmem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong_phanmem`
--
ALTER TABLE `phong_phanmem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thu`
--
ALTER TABLE `thu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuan`
--
ALTER TABLE `tuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vande`
--
ALTER TABLE `vande`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bomon`
--
ALTER TABLE `bomon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `buoi`
--
ALTER TABLE `buoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cauhinh`
--
ALTER TABLE `cauhinh`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `giaovien_chucvu`
--
ALTER TABLE `giaovien_chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hocky_nienkhoa`
--
ALTER TABLE `hocky_nienkhoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lich`
--
ALTER TABLE `lich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lich_choduyet`
--
ALTER TABLE `lich_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `monhoc_phanmem`
--
ALTER TABLE `monhoc_phanmem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `phanmem`
--
ALTER TABLE `phanmem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `phong_phanmem`
--
ALTER TABLE `phong_phanmem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `thu`
--
ALTER TABLE `thu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tuan`
--
ALTER TABLE `tuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `vande`
--
ALTER TABLE `vande`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
