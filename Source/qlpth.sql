-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 04:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

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
  `TenBM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bomon`
--

INSERT INTO `bomon` (`id`, `TenBM`, `TenVietTat`) VALUES
(1, 'Công nghệ thông tin', 'CNTT'),
(2, 'Hệ thống thông tin', 'HTTT'),
(3, 'Khoa học máy tính', 'KHMT'),
(4, 'Kỹ thuật phần mềm', 'KTPM'),
(5, 'Truyền thông và mạng máy tính', 'TTMMT'),
(6, 'Tin học ứng dụng', 'THUD');

-- --------------------------------------------------------

--
-- Table structure for table `buoi`
--

CREATE TABLE `buoi` (
  `id` int(11) NOT NULL,
  `TenBuoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buoi`
--

INSERT INTO `buoi` (`id`, `TenBuoi`, `TenVietTat`) VALUES
(1, 'Sáng', 'S'),
(2, 'Chiều', 'C');

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
  `id` int(10) UNSIGNED NOT NULL,
  `MaGV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoGV` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TenGV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `SDT` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idBoMon` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KichHoat` tinyint(1) DEFAULT NULL,
  `idChucVu` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`id`, `MaGV`, `HoGV`, `TenGV`, `NgaySinh`, `GioiTinh`, `SDT`, `idBoMon`, `password`, `KichHoat`, `idChucVu`, `remember_token`, `Email`) VALUES
(1, '0000', 'Account', 'Admin', '1980-04-07', 1, '0970000000', 1, '$2y$10$uXx91FdsuFeJA7pTSv/3bubcSME1xevGVIuw8.NSXLCXB75igrzKS', 1, 1, 'ngTHW00JhYudc5reS1OSufYwZdzLGuvZDe9SzNmurzQsiF6IIXyAygN3s3x2', 'anmapmap2017@gmail.com'),
(2, '0001', 'Quản lý bộ môn', 'CNTT', '1990-04-15', 0, '0971111111', 1, '$2y$10$5EGLCcTl7H2rMGathFeS0.JOYB2lT1EbYRfBJpMZ0AVVI00O3HB8O', 1, 2, 'GeLDyknj3KDaye0Az59jvImwCtpyn7lmW34AaVQjKofkFAIEI1wT8ilFS9LI', 'oriduyhau@gmail.com'),
(3, '0010', 'Quản lý bộ môn', 'HTTT', '2017-05-05', 1, '0971234567', 2, '$2y$10$CIpxbCXp8fgApKST7U5Kj.48gq4D3xgQNgBxF6u.7r./DyuviavMK', 1, 2, 'CPML9zxDMrAhihGZuAp3Qa3gWEpVt03hV02yzpvzS7ULLdZeKqVQvC7CCQxW', 'ntatfff@gmail.com'),
(4, '0020', 'Quản lý bộ môn', 'KHMT', '1990-03-31', 0, '0987456321', 3, '$2y$10$KIo2xhJX7ddhYf9fepaWe.Ddkce5whRi78qreTbDQT3NZ5pN3h5Se', 1, 2, 'lEMzZoLnCgQVRziErrtVSCHR6YRXiWJDkjMK6rqnRokCytoC2Ozo14rK1j0u', 'yeoyeo1711@gmail.com'),
(5, '0030', 'Quản lý bộ môn', 'TT&MMT', '1995-10-03', 1, '0987456321', 5, '$2y$10$7bRYGbpU8Y8IbG5rC8l6cOParE9Fygu.8UsMZlfeAIxvg7SzqzlLG', 1, 1, '', 'wertyuio@sdfghjk.com'),
(6, '0040', 'Quản lý bộ môn', 'THUD', '1960-01-01', 1, '01234123123', 6, '$2y$10$7bRYGbpU8Y8IbG5rC8l6cOParE9Fygu.8UsMZlfeAIxvg7SzqzlLG', 1, 2, 'pOnYzDR8PQMuJTwnstzSWyop1FKrLnRkl4WZMMBqK43hXqV63M0CD3OuQJK2', NULL),
(13, '0050', 'Quản lý bộ môn', 'KTPM', '1970-01-01', 1, '0989898989', 4, '$2y$10$7bRYGbpU8Y8IbG5rC8l6cOParE9Fygu.8UsMZlfeAIxvg7SzqzlLG', 1, 2, 'VxibbXYlPr7dn1z5se3XbztEDxAYHOjXnfvTG51rLwuAokbYZoQnXvSXeYJl', NULL),
(208, '001000', 'Nguyễn Thị Anh', 'Thư', '1996-01-24', 1, '0963363636', 1, '$2y$10$Dz2wj3f/WGCf/a5xlqMpbeM/mPAPoeHiAMMCs5fp6lwvuiXvmpEwW', 1, 2, 'TGHOvqgoaYi5snWHIq1MHQsefGDdF25WczkkqjPiAVrlbDLYzbb2HF7VHr8L', NULL),
(393, '000509', 'Lê Quyết ', 'Thắng ', '1980-01-01', 0, '0912345678', 2, '$2y$10$T4AOjFr8A54.SlGU8EzIhORZkCyTQpuhXbKPrPnXjk3REyHXCuHzS', 1, 1, 'VdQv8t0FKhEVRyAQttPfy42d3wBP25dqeZj07tdrOH7Z2bfxRCNXimkBPvFD', NULL),
(394, '000510', 'Nguyễn Văn', 'Thầy Linh ', '1950-01-01', 0, '0909123123', 3, '$2y$10$ldHLKc9ta4JA6BU4YesTN.9nKWX.geI0BqGx5bQOWnXK2mYuuFkcG', 1, 1, 'T97ju6EC9fcZd2bSDy2kOJqCYss4bWh2Cvb88Kh5OHtxZG4dDc4oeF4MONNR', NULL),
(395, '000515', 'Lê Đức', 'Thắng ', '1960-01-01', 0, '01234123124', 4, '$2y$10$jHcz2ycY5CipZT8uTQodCui1dmMXyNCx3LAENEZRkwkF0qzpY6II2', 1, 1, '44IutgoIY8G4gxY30j3GPY3F4IG7HstFiwE8XdQWHUO66FeUGIUGIB2xIzgn', NULL),
(396, '000516', 'Nguyễn Hoàng', 'Việt ', '1980-01-01', 0, '0909123456', 5, '$2y$10$4wiFHmP42LPum5chSjWMs.EYr3sGeWTsBgxkL0tWwalbOcMPw2MVq', 1, 1, 'hfWOway3eksEpI3SA9Xo0pSskHV34JSE4Bo2bZeVQmrBt8t3OkHoYEgnQRY8', NULL),
(397, '000517', 'Trần Cao', 'Đệ ', '1980-01-01', 0, '0909888999', 1, '$2y$10$peNxwL7vXQAagHw/DmJMQOVT8ZuiI6vEG1POSqmJ2WblgFio9UYVi', 1, 1, 'XA7VYVcrnMZjfxDJWhuXhIHefaZbQsgDAK2zLheA28xUqGvckeHKmsg4cK5s', NULL),
(398, '000520', 'Trương Minh', 'Thái ', '1980-01-01', 0, '0939888999', 6, '$2y$10$6YoA0obgK3qdjfsNKaoJDOXgA8pTc9xj8m0EutpO13HR7P9Zr3g.q', 1, 1, 'oWPHzrISUuRq4WJf6wYp0CB8jOWnvH7jXdHKMiiBfexEztUvIloKwMDUCIXU', NULL),
(399, '000527', 'Đoàn Hòa', 'Minh ', '1950-01-01', 0, '01234123321', 1, '$2y$10$rOOc9mawXOt.W5b3iBkpy.2feGtEu/MirLgSR9SUbGCC/rKvf7uJC', 1, 1, 'JsFuZtq05xR9dg1S78ljZ2JwLDuxZOEx68gcqbmgKlAu8IPuYj0I2ADoFG4R', NULL),
(400, '001042', '', 'Vũ Duy Linh ', '1980-01-01', 0, NULL, 1, '$2y$10$xJjG4gy6UJM69Ajfck.pPuznfDzvYsuJMccAQY5A784wRcxXcs6je', 1, 1, '', NULL),
(401, '001043', '', 'Nguyễn Minh Trung ', '1980-01-01', 0, NULL, 1, '$2y$10$x2FBU/.JatWYR1CEBFkDYeoNHU7TxbPd7k.nn4JUTa3xUjBapV/l6', 1, 1, '', NULL),
(402, '001044', '', 'Nguyễn Nhị Gia Vinh ', '1980-01-01', 0, NULL, 1, '$2y$10$AiOZIlMk5P6bJM2rbWVMvecEWswJOjYl.cOXgeNeg2cM9fuSv50Da', 1, 1, '', NULL),
(403, '001067', '', 'Huỳnh Xuân Hiệp ', '1980-01-01', 0, NULL, 1, '$2y$10$tTM/kqdkL7SN7wwBd4k3duIyMtPs/y.suyrRthIBuqWJ4DVG.lBAG', 1, 1, '', NULL),
(404, '001068', '', 'Trương Thị Thanh Tuyền ', '1980-01-01', 0, NULL, 1, '$2y$10$foqMmq5Tlzn13fVX1lJxC.Pz0Jj13JkS8AafWGV4FKhJkHAkWRUcK', 1, 1, '', NULL),
(405, '001069', '', 'Võ Huỳnh Trâm ', '1980-01-01', 0, NULL, 1, '$2y$10$LXMrhWi4HBbYXfStpC4lfe0fuX4LznSS7RwCLosRXSey4LHe8IelC', 1, 1, '', NULL),
(406, '001070', '', 'Phan Tấn Tài ', '1980-01-01', 0, NULL, 1, '$2y$10$wGcBmcqFoTNsDHKOZQBlQ.XHYkclTcGm3I1NiIPMjwkauWI6iCVr.', 1, 1, '', NULL),
(407, '001072', '', 'Đỗ Thanh Nghị ', '1980-01-01', 0, NULL, 1, '$2y$10$a06ZiE24HDwb3D8t1JSMi.Pb.dwMFyj8gQDnh3R0bmHxHQf5DTRH6', 1, 1, '', NULL),
(408, '001112', '', 'Nguyễn Đức Khoa ', '1980-01-01', 0, NULL, 1, '$2y$10$8h1jmxFC7Gl/PSxpv3zvfOvQL9KsM9PYttrFRqlsqi4wLD4asGlHG', 1, 1, '', NULL),
(409, '001124', '', 'Ngô Bá Hùng ', '1980-01-01', 0, NULL, 1, '$2y$10$LGdIMMfp9FrXWtR5sfhkTeS0RlegToYvE3nxl5sZQVUG54ysK5jfO', 1, 1, '', NULL),
(410, '001128', '', 'Phạm Hữu Tài ', '1980-01-01', 0, NULL, 1, '$2y$10$EW9Hmm8c/0ZL.y3yN/CYtOalxRbXi0A2UaFQoS9K43uqYgyzyY62y', 1, 1, '', NULL),
(411, '001168', '', 'Nguyễn Công Huy ', '1980-01-01', 0, NULL, 1, '$2y$10$aNPpjioWDG2f4Ms2RaZikOdhKPPW5k10AUi7/ks0DrQSaZybavX9u', 1, 1, '', NULL),
(412, '001169', '', 'Hoàng Minh Trí ', '1980-01-01', 0, NULL, 1, '$2y$10$TuTLRgTLOAPs90JuCWcpeOjGubDye8UqtHT2C/qNOxzw/bG2ubSyy', 1, 1, '', NULL),
(413, '001170', '', 'Nguyễn Thị Thùy Linh ', '1980-01-01', 0, NULL, 1, '$2y$10$4Xd9/WvQlJE69UZO0.H1jeEaZLrs0NSSbwxrKAZ2SEjalH2XCyM6S', 1, 1, '', NULL),
(414, '001229', '', 'Phạm Thế Phi ', '1980-01-01', 0, NULL, 1, '$2y$10$Uyat2RoWGqy6iKqh.VJGIecQNTE.uPaTX.hCnV6DErwELGHvW0/w2', 1, 1, '', NULL),
(415, '001230', '', 'Phan Thượng Cang ', '1980-01-01', 0, NULL, 1, '$2y$10$l3XhE7bSG.Aqw2yeQqP3tONOBwaeDfDG1ucZ2hUoKehNvSL.NOjVm', 1, 1, '', NULL),
(416, '001232', '', 'Phan Phương Lan ', '1980-01-01', 0, NULL, 1, '$2y$10$UzrECC5EWO80bG2IsqD/rOVQT4whKoby6Z/WFljQFKHKERYkwrAti', 1, 1, '', NULL),
(417, '001322', '', 'Lê Thị Diễm ', '1980-01-01', 0, NULL, 1, '$2y$10$o1bsw874AWXxOv.h83ohm.4zNqlNhthUsD751frO.YW2geX53qedq', 1, 1, '', NULL),
(418, '001323', '', 'Trần Thanh Điền ', '1980-01-01', 0, NULL, 1, '$2y$10$7O/COAlOt7P5hzQL7ejk.O4RQv0CECVscsVCyUceU5NzZHGBMAFPu', 1, 1, '', NULL),
(419, '001348', '', 'Phạm Nguyên Khang ', '1980-01-01', 0, NULL, 1, '$2y$10$fXRbPhpNMDQFkCfDEZabKe9CyNBa.ttpHvzwcRnfArfMYNvOMReYS', 1, 1, '', NULL),
(420, '001349', '', 'Lê Văn Lâm ', '1980-01-01', 0, NULL, 1, '$2y$10$nHQ/jcvI5Vs9C0B1LkSYi.CzJ/XvcIWIXJko/jXgc8xnTi7kgUVMi', 1, 1, '', NULL),
(421, '001352', '', 'Nguyễn Thái Nghe ', '1980-01-01', 0, NULL, 1, '$2y$10$efCOmcTfFKlFMFKGbHmOJ.qXJke.AII/Eex8l1eV4t21rkJOkqXZi', 1, 1, '', NULL),
(422, '001353', '', 'Phạm Thị Ngọc Diễm ', '1980-01-01', 0, NULL, 1, '$2y$10$KRqK6j7uxY3/1iD2n5BNAeH7sw3ramNjsWdLMwq549Csue5FG/k4K', 1, 1, '', NULL),
(423, '001521', '', 'Nguyễn Thư Hương ', '1980-01-01', 0, NULL, 1, '$2y$10$obaL0HpCg/aqiv8YIdJ8ZuaImSTI45dzd0j9G4DMb3JbAXzqBXw8y', 1, 1, '', NULL),
(424, '001531', '', 'Trương Quốc Định ', '1980-01-01', 0, NULL, 1, '$2y$10$cXXB6/96r7csw.3IRoXcuOZ2ZeDnNIVaG1JEac4G1rvm0EnttoX7a', 1, 1, '', NULL),
(425, '001533', 'Trần Công', 'Án ', '1970-01-01', 0, '0939123456', 1, '$2y$10$7UKlrfkGfhn.r6x9e3WkTuZntui1utzfJxDcPRt6Fzb0Ofl1WZxuW', 1, 1, '', NULL),
(426, '001586', '', 'Phan Huy Cường ', '1980-01-01', 0, NULL, 1, '$2y$10$Z.yC7nX32GGBb9CWHRx.Dubc.hPQ.LEbiD16bIzT8oxC2pRVLfRmC', 1, 1, '', NULL),
(427, '001602', '', 'Huỳnh Phụng Toàn ', '1980-01-01', 0, NULL, 1, '$2y$10$SAGQz4WLEN.ZlihsQQnvReAooONaBvlV.mPYeV/eTLDRL6YpKoDtq', 1, 1, '', NULL),
(428, '001603', '', 'Hồ Văn Tú ', '1980-01-01', 0, NULL, 1, '$2y$10$0MIATuqlbF1pOoBOJM2dsuXV5WEDNH/PICiU.fk1D8OpKhOwM7VIG', 1, 1, '', NULL),
(429, '001707', '', 'Phạm Xuân Hiền ', '1980-01-01', 0, NULL, 1, '$2y$10$Fq2AWSEy47QSxAolkAdQCuxKvn8PURq633cGe0cBqubBHlmKLmI9S', 1, 1, '', NULL),
(430, '001708', '', 'Lâm Chí Nguyện ', '1980-01-01', 0, NULL, 1, '$2y$10$OiRH5fpy41PaENAYF0jT2O2x.T9Af0MNAWoWvuPGdCgKKQDKIe1d6', 1, 1, '', NULL),
(431, '001806', '', 'Sử Kim Anh ', '1980-01-01', 0, NULL, 1, '$2y$10$SpNibm34ha29vRkh2lbdOu04KlQmT4iS/25cvwTb8OiRFXXZ8L.Ca', 1, 1, '', NULL),
(432, '001943', '', 'Lâm Nhựt Khang ', '1980-01-01', 0, NULL, 1, '$2y$10$7Hh5xZPhy5HPaG1xKNDK2OkpnQnoN09l9VxkGGFRcXay/TnbGIq92', 1, 1, '', NULL),
(433, '002172', '', 'Trần Phước Lộc ', '1980-01-01', 0, NULL, 1, '$2y$10$14qmc4gp.W6KG6ZOUbLKYO9lO0K1UOfqBzLppFCOtzz4KPUsMJVIq', 1, 1, '', NULL),
(434, '002207', '', 'Phạm Thị Trúc Phương ', '1980-01-01', 0, NULL, 1, '$2y$10$Va1DnPZPQaiFOgWnRTc1JOYPJFLR/ARlUlwYZdtWp4PeTRYxMllhC', 1, 1, '', NULL),
(435, '002226', '', 'Trần Nguyễn Minh Thái ', '1980-01-01', 0, NULL, 1, '$2y$10$t3/2FjjhYO/ips/iZ4ey5uuTV9i85BDvlw5RTLJeLh3jF9MzzvHVu', 1, 1, '', NULL),
(436, '002266', '', 'Nguyễn Thị Thu An ', '1980-01-01', 0, NULL, 1, '$2y$10$R9slzMDbaBucZInhxloIhujgDnG8fig8xS0jTu.wqLCexBYZ1BgCG', 1, 1, '', NULL),
(437, '002366', '', 'Hà Duy An ', '1980-01-01', 0, NULL, 1, '$2y$10$.GC73axSegRXicGb5osnb.GNLQrFvTizhWNoNtyF/MRjwOJjvmCbO', 1, 1, '', NULL),
(438, '002367', '', 'Nguyễn Hữu Vân Long ', '1980-01-01', 0, NULL, 1, '$2y$10$dgrcg/fV1zQ2n/VVTZ50x.MHJIro7TF5fB61AG5aTZesMERzCIzwu', 1, 1, '', NULL),
(439, '002395', '', 'Đặng Mỹ Hạnh ', '1980-01-01', 0, NULL, 1, '$2y$10$kHOj31eZYEqx0/olZXqJSuRWVwGNBU4RQQwBXsMaj8NRKihKuGxB.', 1, 1, '', NULL),
(440, '002455', '', 'Lê Văn Quan ', '1980-01-01', 0, NULL, 1, '$2y$10$6V16saFvpOQ6UacNumjHjuACL8I7SStTMVXmZlfLCFy7Y28wZvE.G', 1, 1, '', NULL),
(441, '002480', '', 'Trần Thị Tố Quyên ', '1980-01-01', 0, NULL, 1, '$2y$10$XbeBLVR0AXNGKrtxpncpcO7H9AAzHe2fRTlExdC5OOZCx5gjM6TaG', 1, 1, '', NULL),
(442, '002481', '', 'Triệu Thanh Ngoan ', '1980-01-01', 0, NULL, 1, '$2y$10$Kh7z5rlsfercuIzToIz8neHZPA/HAGd3nOte9GCisK0MpinLC.AqK', 1, 1, '', NULL),
(443, '002482', '', 'Trần Văn Hoàng ', '1980-01-01', 0, NULL, 1, '$2y$10$KxcNgS7v7rfUP2/s5rBlaOE/mtohSoG6HbCJ0diD0JSJqQl.Zim2u', 1, 1, '', NULL),
(444, '002626', '', 'Bùi Võ Quốc Bảo ', '1980-01-01', 0, NULL, 1, '$2y$10$5TIPYEArlXalOlfG4cWDVOofT.A8nZhwY4Ap5y5T6vor8COppCcdq', 1, 1, '', NULL),
(445, '002628', '', 'Huỳnh Quang Nghi ', '1980-01-01', 0, NULL, 1, '$2y$10$Ywe7OlaKQVB9ToUs1TB/g.H53sJW9f9.pazh056DKfWTrC6UoydVC', 1, 1, '', NULL),
(446, '002635', '', 'Trần Nguyễn Minh Thư ', '1980-01-01', 0, NULL, 1, '$2y$10$aSbTpsxHwBtarJRQEbpLBOTggJ3TocFhGn1p.cqlFbdf2eOpv1XMe', 1, 1, '', NULL),
(447, '002685', '', 'Phạm Thị Xuân Diễm ', '1980-01-01', 0, NULL, 1, '$2y$10$XmChcuHeqBBwlUJcBO4Dhuvscb8WZjWEhhgkQ76BelRhhzZXFjSKG', 1, 1, '', NULL),
(448, '002692', '', 'Trần Việt Châu ', '1980-01-01', 0, NULL, 1, '$2y$10$EVNPdhcbQM3fsyHBNLjl0.9/w4VM9RFUPGbDhpfbVwdk4SAcu4qFS', 1, 1, '', NULL),
(449, '002742', '', 'Nguyễn Ngọc Mỹ ', '1980-01-01', 0, NULL, 1, '$2y$10$Y2vhYMmG1vGJTkRd6DgrH.d55OdDfy9DejxRhuJ4b3RZULpnRP...', 1, 1, '', NULL),
(450, '010006', '', 'Công nghệ thôngtin M.Giảng ', '1980-01-01', 0, NULL, 1, '$2y$10$Vb47yUylqKz27exUQFDamOTcLf4LrdnlfWd3MHMul9Y0cjdNGzLzS', 1, 1, '', NULL),
(451, '700508', '', 'Nguyễn Hồng Vân ', '1980-01-01', 0, NULL, 1, '$2y$10$ibivMUcIqdBZ/PfJ9c0A4u/KYByjNMwiNqr7tCX6h.wcbS6mD.ZQe', 1, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hocky_nienkhoa`
--

CREATE TABLE `hocky_nienkhoa` (
  `id` int(11) NOT NULL,
  `HocKy` varchar(255) NOT NULL,
  `NienKhoa` varchar(255) NOT NULL,
  `NgayBD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocky_nienkhoa`
--

INSERT INTO `hocky_nienkhoa` (`id`, `HocKy`, `NienKhoa`, `NgayBD`) VALUES
(1, '1', '2016-2017', '2017-05-01'),
(2, '2', '2016-2017', '2017-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `hopthu`
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
  `idHocKyNienKhoa` int(11) NOT NULL,
  `Loai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lich`
--

INSERT INTO `lich` (`id`, `idGiaoVien`, `idPhong`, `idMonHoc`, `Nhom`, `idThu`, `idBuoi`, `idTuan`, `idHocKyNienKhoa`, `Loai`) VALUES
(1, 393, 2, 9, '01-02-03', 2, 1, 1, 2, 0),
(2, 393, 2, 9, '01-02-03', 2, 2, 1, 2, 0),
(3, 393, 12, 9, '01-02-03', 3, 1, 1, 2, 0),
(4, 393, 19, 9, '01-02-03', 3, 2, 1, 2, 0),
(5, 393, 12, 9, '01-02-03', 4, 1, 1, 2, 0),
(6, 393, 2, 9, '01-02-03', 4, 2, 1, 2, 0),
(7, 393, 2, 9, '01-02-03', 5, 1, 1, 2, 0),
(8, 393, 12, 9, '01-02-03', 5, 2, 1, 2, 0),
(9, 393, 12, 9, '01-02-03', 6, 1, 1, 2, 0),
(10, 393, 2, 9, '01-02-03', 6, 2, 1, 2, 0),
(11, 393, 2, 9, '01-02-03', 2, 1, 2, 2, 0),
(12, 393, 2, 9, '01-02-03', 2, 2, 2, 2, 0),
(13, 393, 2, 9, '01-02-03', 3, 1, 2, 2, 0),
(14, 393, 2, 9, '01-02-03', 3, 2, 2, 2, 0),
(15, 393, 2, 9, '01-02-03', 4, 1, 2, 2, 0),
(16, 393, 19, 9, '01-02-03', 4, 2, 2, 2, 0),
(17, 393, 2, 9, '01-02-03', 5, 1, 2, 2, 0),
(18, 393, 2, 9, '01-02-03', 5, 2, 2, 2, 0),
(19, 393, 2, 9, '01-02-03', 6, 1, 2, 2, 0),
(20, 393, 2, 9, '01-02-03', 6, 2, 2, 2, 0),
(21, 393, 2, 9, '01-02-03', 2, 1, 3, 2, 0),
(22, 393, 2, 9, '01-02-03', 2, 2, 3, 2, 0),
(23, 393, 2, 9, '01-02-03', 3, 1, 3, 2, 0),
(24, 393, 2, 9, '01-02-03', 3, 2, 3, 2, 0),
(25, 393, 2, 9, '01-02-03', 4, 1, 3, 2, 0),
(26, 393, 2, 9, '01-02-03', 4, 2, 3, 2, 0),
(27, 393, 2, 9, '01-02-03', 5, 1, 3, 2, 0),
(28, 393, 2, 9, '01-02-03', 5, 2, 3, 2, 0),
(29, 393, 2, 9, '01-02-03', 6, 1, 3, 2, 0),
(30, 393, 2, 9, '01-02-03', 6, 2, 3, 2, 0),
(31, 393, 2, 9, '01-02-03', 2, 1, 4, 2, 0),
(32, 393, 2, 9, '01-02-03', 2, 2, 4, 2, 0),
(33, 393, 2, 9, '01-02-03', 3, 1, 4, 2, 0),
(34, 393, 2, 9, '01-02-03', 3, 2, 4, 2, 0),
(35, 393, 2, 9, '01-02-03', 4, 1, 4, 2, 0),
(36, 393, 2, 9, '01-02-03', 4, 2, 4, 2, 0),
(37, 393, 2, 9, '01-02-03', 5, 1, 4, 2, 0),
(38, 393, 2, 9, '01-02-03', 5, 2, 4, 2, 0),
(39, 393, 2, 9, '01-02-03', 6, 1, 4, 2, 0),
(40, 393, 2, 9, '01-02-03', 6, 2, 4, 2, 0),
(41, 393, 2, 9, '01-02-03', 2, 1, 5, 2, 0),
(42, 393, 2, 9, '01-02-03', 2, 2, 5, 2, 0),
(43, 393, 2, 9, '01-02-03', 3, 1, 5, 2, 0),
(44, 393, 2, 9, '01-02-03', 3, 2, 5, 2, 0),
(45, 393, 2, 9, '01-02-03', 4, 1, 5, 2, 0),
(46, 393, 2, 9, '01-02-03', 4, 2, 5, 2, 0),
(47, 393, 2, 9, '01-02-03', 5, 1, 5, 2, 0),
(48, 393, 2, 9, '01-02-03', 5, 2, 5, 2, 0),
(49, 393, 2, 9, '01-02-03', 6, 1, 5, 2, 0),
(50, 393, 12, 9, '01-02-03', 6, 2, 5, 2, 0),
(51, 393, 5, 10, '01', 2, 1, 4, 2, 0),
(52, 393, 5, 10, '01', 3, 1, 4, 2, 0),
(53, 393, 5, 10, '01', 4, 1, 4, 2, 0),
(54, 393, 2, 10, '01', 2, 1, 7, 2, 0),
(55, 393, 2, 10, '01', 3, 1, 7, 2, 0),
(56, 393, 2, 10, '01', 4, 1, 7, 2, 0),
(57, 393, 2, 10, '01', 2, 1, 10, 2, 0),
(58, 393, 2, 10, '01', 3, 1, 10, 2, 0),
(59, 393, 2, 10, '01', 4, 1, 10, 2, 0),
(60, 393, 2, 10, '01', 2, 1, 13, 2, 0),
(61, 393, 2, 10, '01', 3, 1, 13, 2, 0),
(62, 393, 2, 10, '01', 4, 1, 13, 2, 0),
(63, 393, 2, 10, '01', 2, 1, 17, 2, 0),
(64, 393, 2, 10, '01', 3, 1, 17, 2, 0),
(65, 393, 2, 10, '01', 4, 1, 17, 2, 0),
(66, 393, 2, 10, '01', 2, 1, 20, 2, 0),
(67, 393, 2, 10, '01', 3, 1, 20, 2, 0),
(68, 393, 2, 10, '01', 4, 1, 20, 2, 0),
(69, 398, 14, 1, '01', 3, 1, 1, 2, 0),
(70, 398, 14, 1, '01', 2, 1, 1, 2, 0),
(71, 398, 14, 1, '01', 2, 1, 2, 2, 0),
(72, 398, 14, 1, '01', 3, 1, 2, 2, 0),
(73, 398, 14, 1, '01', 2, 1, 3, 2, 0),
(74, 398, 14, 1, '01', 3, 1, 3, 2, 0),
(75, 398, 14, 1, '01', 2, 1, 4, 2, 0),
(76, 398, 14, 1, '01', 3, 1, 4, 2, 0),
(77, 398, 14, 1, '01', 2, 1, 5, 2, 0),
(78, 398, 14, 1, '01', 3, 1, 5, 2, 0),
(79, 398, 14, 1, '01', 2, 1, 6, 2, 0),
(80, 398, 14, 1, '01', 3, 1, 6, 2, 0),
(81, 399, 7, 30, '01', 2, 1, 1, 2, 0),
(82, 399, 1, 30, '01', 2, 1, 2, 2, 0),
(83, 399, 4, 19, '123', 2, 1, 1, 2, 0),
(84, 399, 4, 19, '123', 2, 1, 2, 2, 0),
(85, 399, 1, 19, '123', 2, 1, 3, 2, 0),
(86, 399, 1, 19, '123', 2, 1, 4, 2, 0),
(88, 399, 11, 19, '3', 2, 1, 1, 2, 0),
(89, 399, 5, 19, '5', 2, 1, 1, 2, 0),
(90, 393, 13, 9, '01', 2, 1, 1, 2, 0),
(91, 393, 5, 9, '01', 2, 2, 1, 2, 0),
(92, 393, 5, 9, '01', 2, 1, 2, 2, 0),
(93, 393, 5, 9, '01', 2, 2, 2, 2, 0),
(94, 393, 5, 9, '01', 2, 1, 3, 2, 0),
(95, 393, 5, 9, '01', 2, 2, 3, 2, 0),
(96, 393, 13, 9, '01', 2, 1, 4, 2, 0),
(97, 393, 5, 9, '01', 2, 2, 4, 2, 0),
(98, 393, 12, 14, '01', 2, 1, 1, 2, 0),
(99, 393, 12, 14, '01', 2, 2, 1, 2, 0),
(100, 393, 12, 14, '01', 2, 1, 2, 2, 0),
(101, 393, 12, 14, '01', 2, 2, 2, 2, 0),
(102, 393, 12, 14, '01', 2, 1, 3, 2, 0),
(103, 393, 12, 14, '01', 2, 2, 3, 2, 0),
(104, 393, 12, 14, '01', 2, 1, 4, 2, 0),
(105, 393, 12, 14, '01', 2, 2, 4, 2, 0),
(106, 399, 19, 19, '07', 2, 1, 1, 2, 1),
(107, 399, 3, 30, '12', 2, 1, 1, 2, 0),
(108, 399, 7, 30, '12', 2, 1, 3, 2, 0),
(109, 399, 1, 30, '12', 2, 1, 5, 2, 0),
(110, 399, 1, 19, '08', 2, 1, 1, 2, 1),
(111, 399, 1, 22, '1', 3, 1, 9, 2, 0),
(112, 399, 1, 22, '1', 4, 1, 1, 2, 0),
(113, 399, 1, 22, '1', 3, 1, 5, 2, 0),
(114, 399, 1, 22, '1', 3, 1, 1, 2, 0),
(115, 399, 1, 22, '1', 4, 1, 9, 2, 0),
(116, 399, 1, 22, '1', 3, 1, 13, 2, 0),
(117, 399, 1, 22, '1', 4, 1, 13, 2, 0),
(118, 399, 1, 22, '1', 4, 1, 5, 2, 0),
(119, 399, 1, 22, '1', 3, 1, 17, 2, 0),
(120, 399, 1, 22, '1', 4, 1, 17, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lichsu_choduyet`
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
-- Dumping data for table `lichsu_choduyet`
--

INSERT INTO `lichsu_choduyet` (`id`, `idChoDuyet`, `idBMNhan`, `ngayNhan`, `ghiChu`, `trangThai`) VALUES
(1, 1, 1, '2017-05-17 13:30:56', 'Yêu cầu xếp phòng', 0),
(2, 1, 1, '2017-05-17 13:36:31', 'chuyen', 0),
(3, 1, 1, '2017-05-17 13:36:58', 'chuyen', 0),
(4, 1, 2, '2017-05-17 13:37:30', 'chuyen', 0),
(5, 1, 2, '2017-05-17 13:39:09', 'chuyen', 0),
(6, 1, 2, '2017-05-17 13:40:07', 'chuyen', 0),
(7, 6, 3, '2017-05-17 17:59:02', 'Yêu cầu xếp phòng', 0),
(8, 7, 3, '2017-05-17 17:59:02', 'Yêu cầu xếp phòng', 0),
(9, 8, 3, '2017-05-17 17:59:02', 'Yêu cầu xếp phòng', 0),
(10, 9, 3, '2017-05-17 17:59:02', 'Yêu cầu xếp phòng', 0),
(11, 10, 3, '2017-05-17 17:59:02', 'Yêu cầu xếp phòng', 0),
(12, 11, 3, '2017-05-17 17:59:03', 'Yêu cầu xếp phòng', 0),
(13, 12, 3, '2017-05-17 17:59:03', 'Yêu cầu xếp phòng', 0),
(14, 13, 3, '2017-05-17 17:59:03', 'Yêu cầu xếp phòng', 0),
(15, 6, 3, '2017-05-17 18:00:03', 'chuyen', 0),
(16, 7, 3, '2017-05-17 18:00:16', 'chuyen', 0),
(17, 8, 5, '2017-05-17 18:00:26', 'chuyen', 0),
(18, 9, 5, '2017-05-17 18:00:41', 'chuyen', 0),
(19, 6, 6, '2017-05-17 18:01:38', 'chuyen', 0),
(20, 7, 4, '2017-05-17 18:02:10', 'chuyen', 0),
(21, 3, 2, '2017-05-17 18:15:35', 'chuyen', 0),
(22, 4, 2, '2017-05-17 18:15:50', 'chuyen', 0),
(23, 5, 2, '2017-05-17 18:15:58', 'chuyen', 0),
(24, 3, 2, '2017-05-17 18:16:37', 'Đã xếp phòng', 1),
(25, 5, 3, '2017-05-17 18:16:50', 'chuyen', 0),
(26, 10, 2, '2017-05-17 18:18:18', 'chuyen', 0),
(27, 11, 6, '2017-05-17 18:18:26', 'chuyen', 0),
(28, 12, 4, '2017-05-17 18:19:29', 'chuyen', 0),
(29, 6, 4, '2017-05-17 18:19:48', 'chuyen', 0),
(30, 14, 1, '2017-05-18 00:48:30', 'Yêu cầu xếp phòng', 0),
(31, 15, 1, '2017-05-18 00:48:30', 'Yêu cầu xếp phòng', 0),
(32, 4, 3, '2017-05-18 00:51:28', 'chuyen', 0),
(33, 4, 1, '2017-05-18 00:54:07', 'Đã xếp phòng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lichsu_vande`
--

CREATE TABLE `lichsu_vande` (
  `id` int(11) NOT NULL,
  `idVanDe` int(11) NOT NULL,
  `ghiChu` varchar(255) NOT NULL,
  `nguoiNhan` int(11) NOT NULL,
  `ngayNhan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichsu_vande`
--

INSERT INTO `lichsu_vande` (`id`, `idVanDe`, `ghiChu`, `nguoiNhan`, `ngayNhan`, `trangThai`) VALUES
(1, 8, 'Gửi yêu cầu xử lý', 2, '2017-05-14 18:13:23', 0),
(2, 8, 'đã xử lý', 2, '2017-05-14 18:14:04', 1),
(3, 9, 'Gửi yêu cầu xử lý', 2, '2017-05-14 18:15:19', 0),
(4, 9, 'Chưa xử lý được', 1, '2017-05-14 18:19:56', 0),
(5, 9, 'ok', 1, '2017-05-14 18:20:31', 1),
(6, 10, 'Gửi yêu cầu xử lý', 1, '2017-05-14 19:47:27', 0),
(7, 10, 'thành công', 1, '2017-05-14 19:47:34', 1),
(8, 10, 'thành công', 1, '2017-05-14 19:48:16', 1),
(9, 10, 'thành công', 1, '2017-05-14 19:48:48', 1),
(10, 10, 'thành công', 1, '2017-05-14 19:49:41', 1),
(11, 11, 'Gửi yêu cầu xử lý', 1, '2017-05-14 19:53:14', 0),
(12, 11, 'OKKKKKK', 1, '2017-05-14 19:53:22', 1),
(13, 12, 'Gửi yêu cầu xử lý', 1, '2017-05-14 19:54:37', 0),
(14, 12, 'OKKKKKK', 1, '2017-05-14 19:54:43', 1),
(15, 13, 'Gửi yêu cầu xử lý', 1, '2017-05-14 19:55:15', 0),
(16, 13, 'ok', 1, '2017-05-14 19:55:21', 1),
(17, 14, 'Gửi yêu cầu xử lý', 1, '2017-05-14 19:59:51', 0),
(18, 15, 'Gửi yêu cầu xử lý', 1, '2017-05-14 20:00:29', 0),
(19, 16, 'Gửi yêu cầu xử lý', 1, '2017-05-14 20:01:10', 0),
(20, 17, 'Gửi yêu cầu xử lý', 1, '2017-05-14 20:01:50', 0),
(21, 18, 'Gửi yêu cầu xử lý', 1, '2017-05-14 20:04:53', 0),
(22, 19, 'Gửi yêu cầu xử lý', 1, '2017-05-14 20:09:33', 0),
(23, 20, 'Gửi yêu cầu xử lý', 1, '2017-05-14 20:10:26', 0),
(24, 21, 'Gửi yêu cầu xử lý', 1, '2017-05-15 11:04:38', 0),
(25, 22, 'Gửi yêu cầu xử lý', 1, '2017-05-15 11:06:05', 0),
(26, 22, 'OKKKKKK', 1, '2017-05-15 11:07:38', 1),
(27, 23, 'Gửi yêu cầu xử lý', 1, '2017-05-16 15:16:07', 0),
(28, 24, 'Gửi yêu cầu xử lý', 2, '2017-05-16 15:16:47', 0),
(29, 25, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:06:07', 0),
(30, 26, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:06:28', 0),
(31, 27, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:08:08', 0),
(32, 28, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:10:39', 0),
(33, 29, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:10:54', 0),
(34, 30, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:11:21', 0),
(35, 31, 'Gửi yêu cầu xử lý', 1, '2017-05-17 08:11:31', 0),
(36, 23, 'Đã xử lý', 1, '2017-05-17 08:12:48', 1),
(37, 32, 'Gửi yêu cầu xử lý', 2, '2017-05-17 17:20:19', 0),
(38, 33, 'Gửi yêu cầu xử lý', 1, '2017-05-18 00:55:34', 0),
(39, 33, 'đã xử lý', 1, '2017-05-18 00:56:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lich_choduyet`
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
-- Dumping data for table `lich_choduyet`
--

INSERT INTO `lich_choduyet` (`id`, `idGiaoVien`, `idPhong`, `idMonHoc`, `Nhom`, `idThu`, `idBuoi`, `idTuan`, `idHocKyNienKhoa`, `TrangThai`, `idBMDuyet`, `ngayGui`) VALUES
(1, 399, 5, 19, '5', 2, 1, 1, 2, 1, 2, '2017-05-17 13:30:56'),
(2, 399, NULL, 19, '10', 2, 1, 1, 2, 2, NULL, '2017-05-17 13:44:28'),
(3, 399, 19, 19, '07', 2, 1, 1, 2, 1, 2, '2017-05-17 13:45:49'),
(4, 399, 1, 19, '08', 2, 1, 1, 2, 1, 3, '2017-05-17 13:45:54'),
(5, 399, NULL, 19, '09', 2, 1, 1, 2, 0, 3, '2017-05-17 13:45:59'),
(6, 394, NULL, 11, '02', 2, 1, 1, 2, 0, 4, '2017-05-17 17:59:02'),
(7, 394, NULL, 11, '02', 2, 2, 1, 2, 0, 4, '2017-05-17 17:59:02'),
(8, 394, NULL, 11, '02', 2, 1, 2, 2, 0, 5, '2017-05-17 17:59:02'),
(9, 394, NULL, 11, '02', 2, 2, 2, 2, 0, 5, '2017-05-17 17:59:02'),
(10, 394, NULL, 11, '02', 2, 1, 3, 2, 0, 2, '2017-05-17 17:59:02'),
(11, 394, NULL, 11, '02', 2, 2, 3, 2, 0, 6, '2017-05-17 17:59:02'),
(12, 394, NULL, 11, '02', 2, 1, 4, 2, 0, 4, '2017-05-17 17:59:03'),
(13, 394, NULL, 11, '02', 2, 2, 4, 2, 0, 0, '2017-05-17 17:59:03'),
(14, 399, NULL, 19, '12', 2, 1, 1, 2, 0, 0, '2017-05-18 00:48:30'),
(15, 399, NULL, 19, '12', 2, 1, 5, 2, 2, 0, '2017-05-18 00:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `lophocphan`
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
-- Dumping data for table `lophocphan`
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
('2017_03_16_051900_taoBangVanDe', 2),
('2017_03_16_053725_taoBangGiaoVien', 3),
('2017_03_29_085238_entrust_setup_tables', 3),
('2017_04_14_074848_TaoBangHopThu', 4);

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
(7, 'CT120', 'Phân tích và thiết kế thuật toán', 2),
(9, 'CT123', 'Quy hoạch tuyến tính - CNTT', 2),
(10, 'CT126', 'Lý thuyết xếp hàng', 2),
(11, 'CT174', 'Phân tích và thiết kế thuật toán', 3),
(12, 'CT123', 'Quy hoạch tuyến tính - CNTT', 2),
(13, 'CT126', 'Lý thuyết xếp hàng', 2),
(14, 'CT204', 'An toàn và bảo mật thông tin', 3),
(15, 'CT311', 'Phương pháp NCKH', 2),
(16, 'CT313', 'An toàn và bảo mật thông tin', 2),
(17, 'CT103', 'Cấu trúc dữ liệu', 4),
(18, 'CT174', 'Phân tích và thiết kế thuật toán', 3),
(19, 'CT106', 'Hệ cơ sở dữ liệu', 4),
(20, 'CT127', 'Lý thuyết thông tin', 2),
(21, 'CT180', 'Cơ sở dữ liệu', 3),
(22, 'CT252', 'Niên luận cơ sở ngành hệ thống thông tin', 3),
(23, 'CT431', 'Hệ quản trị CSDL đa phương tiện', 2),
(24, 'CT178', 'Nguyên lý hệ điều hành', 3),
(25, 'CT326', 'Kiểm thử phần mềm', 2),
(26, 'CT327', 'Đảm bảo chất lượng phần mềm', 2),
(27, 'CT466', 'Niên luận - CNTT', 3),
(28, 'CT171', 'Nhập môn công nghệ phần mềm', 3),
(29, 'CT240', 'Nguyên lý xây dựng phần mềm', 3),
(30, 'CT173', 'Kiến trúc máy tính', 3),
(31, 'CT274', 'Lập trình cho thiết bị di động', 3),
(32, 'CT329', 'Lập trình cho các thiết bị di động', 2),
(33, 'TN033', 'Tin học căn bản', 1),
(34, 'TN196', 'Lập trình hướng đối tượng Java', 3),
(35, 'TN208', 'Lập trình Java nâng cao', 3),
(36, 'TN407', 'Kỹ thuật dự báo', 3),
(37, 'TN403', 'Kho dữ liệu và OLAP', 3),
(38, 'TN211', 'Nhập môn hệ thống thông tin địa lý', 2),
(39, 'CT242', 'Kiến trúc và Thiết kế phần mềm', 3),
(40, 'CT309', 'Quản lý dự Án tin học', 2),
(41, 'CT239', 'Niên luận cơ sở ngành KTPM', 3),
(42, 'CT120', 'Phân tích và thiết kế thuật toán', 2),
(43, 'CT121', 'Tin học lý thuyết', 3),
(44, 'CT438', 'Niên luận Kỹ thuật phần mềm', 3),
(45, 'CT464', 'Tiểu luận tốt nghiệp - KTPM', 4),
(46, 'CT594', 'Luận văn tốt nghiệp - KTPM', 10),
(47, 'CT109', 'Phân tích và thiết kế hệ thống TT', 3),
(48, 'CT182', 'Ngôn ngữ mô hình hóa', 3),
(49, 'CT236', 'Quản trị cơ sở dữ liệu trên Windows', 2),
(50, 'CT237', 'Nguyên lý hệ quản trị cơ sở dữ liệu', 3),
(51, 'CT430', 'Phân tích hệ thống hướng đối tượng', 3),
(52, 'CT437', 'Niên luận Hệ thống thông tin', 3),
(53, 'CT461', 'Tiểu luận tốt nghiệp - HTTT', 4),
(54, 'CT111', 'Niên luận 2 - Tin học', 1),
(55, 'CT225', 'Lập trình Python', 2),
(56, 'CT226', 'Niên luận cơ sở mạng máy tính và truyền thông', 3),
(57, 'CT306', 'Niên luận 3 - Tin học', 1),
(58, 'CT358', 'Luận văn tốt nghiệp - Tin học', 10),
(59, 'CT428', 'Lập trình Web', 3),
(60, 'CT439', 'Niên luận Mạng máy tính và truyền thông', 3),
(61, 'CT270', 'Niên luận cơ sở - THƯD', 3),
(62, 'TN210', 'Ngôn ngữ mô hình hóa thống nhất', 2),
(63, 'TN213', 'Xây dựng hệ thống thông tin địa lý', 3),
(64, 'TN405', 'Thực tập thực tế - THƯD', 1),
(65, 'TN408', 'Niên luận - THƯD', 3),
(66, 'TN418', 'Luận văn tốt nghiệp - THƯD', 10),
(67, 'CT112', 'Mạng máy tính', 3),
(68, 'CT224', 'Công nghệ J2EE', 2),
(69, 'CT233', 'Điện toán đám mây', 3),
(70, 'CT334', 'Quản trị mạng trên Linux', 2),
(71, 'CT335', 'Thiết kế và cài đặt mạng', 3),
(72, 'CT344', 'Giải quyết sự cố mạng', 2),
(73, 'CT434', 'An toàn hệ thống và an ninh mạng', 3),
(74, 'CT176', 'Lập trình hướng đối tượng', 3),
(75, 'CT221', 'Lập trình mạng', 3),
(76, 'CT319', 'Lập trình mạng', 2),
(77, 'TN404', 'Quản trị hệ thống mạng', 3),
(78, 'TN212', 'Công nghệ web 3D', 3),
(79, 'TN229', 'Bảo mật hệ thống và an ninh mạng', 3),
(80, 'CT179', 'Quản trị hệ thống', 3),
(81, 'CT412', 'Xử lý ngôn ngữ tự nhiên', 2),
(82, 'CT447', 'Quản trị và bảo trì hệ thống', 3),
(83, 'CT341', 'Xây dựng dịch vụ mạng', 2),
(84, 'CT328', 'Bảo trì phần mềm', 2),
(85, 'TN185', 'Cấu trúc dữ liệu - Toán TK', 3),
(86, 'CT338', 'Mạng không dây và di động', 2),
(87, 'CT101', 'Lập trình căn bản A', 4),
(88, 'CT175', 'Lý thuyết đồ thị', 3),
(89, 'CT202', 'Nguyên lý máy học', 3),
(90, 'CT211', 'An ninh mạng', 3),
(91, 'CT181', 'Hệ thống thông tin doanh nghiệp', 3),
(92, 'CT183', 'Anh văn chuyên môn CNTT 1', 3),
(93, 'CT205', 'Quản trị cơ sở dữ liệu', 3),
(94, 'CT269', 'Hệ quản trị cơ sở dữ liệu Oracle', 2),
(95, 'CT051H', 'Vi - Tích phân', 4),
(96, 'CT253', 'Quản trị yêu cầu người dùng', 3),
(97, 'CT307', 'Niên luận 4 - Tin học', 1),
(98, 'CT591', 'Luận văn tốt nghiệp - HTTT', 10),
(99, 'CT187', 'Nền tảng công nghệ thông tin', 3),
(100, 'CT468', 'Tiểu luận tốt nghiệp - CNTT', 4),
(101, 'TN034', 'TT. Tin học căn bản', 2),
(102, 'CT158', 'Nguyên lý ngôn ngữ lập trình', 3),
(103, 'TN277', 'Quản trị dự Án tin học', 2),
(104, 'TN207', 'Lập trình .NET', 3),
(105, 'TN216', 'Phát triển ứng dụng trên thiết bị di động', 3),
(106, 'CT124', 'Phương pháp tính - CNTT', 2),
(107, 'CT128', 'Kỹ thuật đồ hoạ - CNTT', 2),
(108, 'CT172', 'Toán rời rạc', 4),
(109, 'CT203', 'Đồ họa máy tính', 3),
(110, 'CT465', 'Tiểu luận tốt nghiệp - KHMT', 4),
(111, 'CT114', 'Lập trình hướng đối tượng C++', 3),
(112, 'CT333', 'Quản trị mạng', 2),
(113, 'CT118', 'Anh văn chuyên môn tin học', 2),
(114, 'CT184', 'Anh văn chuyên môn CNTT 2', 3),
(115, 'TN222', 'Thống kê tin học Ứng dụng', 3),
(116, 'CT110', 'Hệ quản trị cơ sở dữ liệu', 2),
(117, 'CT304', 'Giao diện người - máy', 2),
(118, 'CT104', 'Kiến trúc máy tính', 2),
(119, 'CT462', 'Tiểu luận tốt nghiệp - TT&MMT', 4),
(120, 'CT592', 'Luận văn tốt nghiệp - TT&MMT', 10),
(121, 'TN201', 'Kỹ thuật xử lý Ảnh', 2),
(122, 'TN411', 'Xây dựng ứng dụng Web với PHP và MySQL', 3),
(123, 'CT337', 'Đánh giá hiệu năng mạng', 2),
(124, 'CT241', 'Phân tích yêu cầu phần mềm', 3),
(125, 'CT251', 'Phát triển Ứng dụng trên Windows', 3),
(126, 'CT170', 'Chuyên đề ngôn ngữ lập trình KHMT', 2),
(127, 'CT448', 'Công nghệ Web', 2),
(128, 'CT115', 'Chuyên đề ngôn ngữ lập trình 1', 2),
(129, 'CT276', 'Java', 3),
(130, 'CT201', 'Niên luận cơ sở ngành Khoa học máy tính', 3),
(131, 'CT312', 'Khai khoáng dữ liệu', 3),
(132, 'CT316', 'Xử lý Ảnh', 3),
(133, 'CT332', 'Trí tuệ nhân tạo', 3),
(134, 'CT440', 'Niên luận Khoa học máy tính', 3),
(135, 'CT595', 'Luận văn tốt nghiệp - KHMT', 10),
(136, 'CT271', 'Niên luận cơ sở - CNTT', 3),
(137, 'CT593', 'Luận văn tốt nghiệp - CNTT', 10),
(138, 'CT057H', 'Kỹ năng làm việc nhóm', 1),
(139, 'CT336', 'Truyền thông đa phương tiện', 2),
(140, 'CT123', 'Quy hoạch tuyến tính - CNTT', 2);

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
(4, 2, 4),
(5, 1, 3),
(6, 7, 1),
(7, 7, 2),
(9, 7, 3),
(10, 8, 2),
(11, 10, 2),
(12, 9, 2),
(13, 9, 1),
(14, 11, 1),
(15, 11, 2),
(16, 11, 6),
(17, 13, 2),
(18, 19, 1),
(19, 19, 2),
(20, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
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
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, 'Eclipse', '10'),
(7, 'Packet Trancer', '6.2');

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
(2, 'P02', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(3, 'P03', 4, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(4, 'P04', 3, 2, 100, 'Intel Core i3-6100', 'Không'),
(5, 'P05', 3, 2, 100, 'Intel Core i5-6100', 'Không'),
(7, 'P06', 1, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(8, 'P07', 5, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(9, 'P08', 4, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(11, 'P09', 1, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(12, 'P10', 2, 2, 100, 'Intel Core i3-6100', 'GeForce GT 730'),
(13, 'P11', 4, 3, 120, 'Core i3', 'Không'),
(14, 'P12', 6, 3, 200, 'Core i5', 'Có'),
(15, 'P13', 6, 2, 500, 'Core i5', 'Có'),
(16, 'P14', 6, 2, 200, 'Core i3', 'Không'),
(17, 'P15', 6, 3, 250, 'Core i3', 'Không'),
(18, 'P16', 6, 3, 200, 'Core i5', 'Không'),
(19, 'P17', 2, 3, 200, 'Core i3', 'Không'),
(20, 'P18 (TTDĐ3)', 5, 3, 200, 'Core i7', 'Có');

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
(6, 3, 2),
(7, 3, 5),
(8, 3, 6),
(9, 4, 4),
(10, 4, 5),
(11, 4, 6),
(12, 5, 2),
(13, 6, 3),
(15, 8, 5),
(17, 10, 4),
(19, 12, 6),
(23, 1, 3),
(27, 14, 2),
(30, 15, 2),
(32, 15, 3),
(33, 15, 4),
(34, 16, 5),
(35, 16, 6),
(36, 16, 7),
(37, 17, 4),
(38, 17, 6),
(39, 17, 1),
(41, 7, 1),
(42, 7, 4),
(43, 7, 7),
(44, 8, 1),
(46, 8, 3),
(47, 9, 1),
(49, 5, 1),
(50, 11, 1),
(51, 11, 3),
(52, 13, 2),
(53, 13, 1),
(56, 14, 3),
(57, 18, 1),
(59, 18, 4),
(60, 18, 5),
(61, 19, 1),
(62, 19, 3),
(64, 19, 7),
(65, 19, 4),
(66, 20, 1),
(68, 20, 7),
(69, 20, 6),
(70, 20, 5),
(71, 20, 4),
(72, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
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
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'Nhóm tài khoản quản trị hệ thống', '2017-04-05 23:49:24', '2017-04-05 23:49:24'),
(2, 'manager', 'Quản lý', 'Nhóm tài khoản quản lý hệ thống', '2017-04-05 23:49:24', '2017-04-05 23:49:24'),
(3, 'normal', 'Người dùng bình thường', 'Nhóm tài khoản bình thường', '2017-04-05 23:49:25', '2017-04-05 23:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(13, 2),
(208, 3),
(393, 3),
(394, 3),
(395, 3),
(396, 3),
(397, 3),
(398, 3),
(399, 3),
(425, 3);

-- --------------------------------------------------------

--
-- Table structure for table `thu`
--

CREATE TABLE `thu` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenThu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thu`
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
-- Table structure for table `tuan`
--

CREATE TABLE `tuan` (
  `id` int(11) NOT NULL,
  `TenTuan` varchar(255) NOT NULL,
  `TenVietTat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuan`
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
-- Table structure for table `vande`
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
-- Dumping data for table `vande`
--

INSERT INTO `vande` (`id`, `idPhong`, `tomTatVD`, `chiTietVD`, `trangThai`, `nguoiBaoCao`, `ngayBaoCao`, `nguoiNhan`, `ngayNhan`) VALUES
(24, 3, 'Hư màn hình', 'Máy 11', 0, 393, '2017-05-16 15:16:47', 3, '2017-05-16 15:16:47'),
(25, 1, 'Hư RAM', 'Máy 12', 0, 208, '2017-05-17 08:06:07', 1, '2017-05-17 08:06:07'),
(26, 1, 'Hư màn hình', 'máy 10', 0, 208, '2017-05-17 08:06:28', 1, '2017-05-17 08:06:28'),
(27, 1, 'Hư quạt', 'cây quạt số 1', 0, 208, '2017-05-17 08:08:08', 1, '2017-05-17 08:08:08'),
(28, 4, 'Hư RAM', 'máy 01', 0, 208, '2017-05-17 08:10:39', 4, '2017-05-17 08:10:39'),
(29, 4, 'Hư màn hình', 'máy 1', 0, 208, '2017-05-17 08:10:54', 4, '2017-05-17 08:10:54'),
(30, 11, 'Hư RAM', 'máy 02', 0, 208, '2017-05-17 08:11:21', 1, '2017-05-17 08:11:21'),
(31, 11, 'Hư màn hình', 'máy 01', 0, 208, '2017-05-17 08:11:31', 1, '2017-05-17 08:11:31'),
(32, 1, 'Hư RAM', 'máy 10', 0, 393, '2017-05-17 17:20:19', 1, '2017-05-17 17:20:19'),
(33, 1, 'Hư RAM', 'máy 12', 1, 208, '2017-05-18 00:55:34', 1, '2017-05-18 00:56:47');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hocky_nienkhoa`
--
ALTER TABLE `hocky_nienkhoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hopthu`
--
ALTER TABLE `hopthu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lichsu_choduyet`
--
ALTER TABLE `lichsu_choduyet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lichsu_vande`
--
ALTER TABLE `lichsu_vande`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;
--
-- AUTO_INCREMENT for table `hocky_nienkhoa`
--
ALTER TABLE `hocky_nienkhoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hopthu`
--
ALTER TABLE `hopthu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lich`
--
ALTER TABLE `lich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `lichsu_choduyet`
--
ALTER TABLE `lichsu_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `lichsu_vande`
--
ALTER TABLE `lichsu_vande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `lich_choduyet`
--
ALTER TABLE `lich_choduyet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `monhoc_phanmem`
--
ALTER TABLE `monhoc_phanmem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phanmem`
--
ALTER TABLE `phanmem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `phong_phanmem`
--
ALTER TABLE `phong_phanmem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `giaovien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
