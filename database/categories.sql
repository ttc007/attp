-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2019 lúc 06:39 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `attp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `hierarchy` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `hierarchy`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Y tế', 'y-te', 0, NULL, NULL, '2018-05-20 06:22:50', '2018-05-20 08:06:17'),
(2, 'Công thương', 'cong-thuong', 0, NULL, NULL, '2018-05-20 06:23:45', '2018-05-20 08:06:29'),
(3, 'Nông nghiệp', 'nong-nghiep', 0, NULL, NULL, '2018-05-20 06:23:58', '2018-05-20 08:06:38'),
(4, 'Thức ăn đường phố', 'thuc-an-duong-pho', 1, 'ward', 10, '2018-05-20 06:24:31', '2018-05-20 08:06:49'),
(5, 'Dịch vụ nấu ăn lưu động', 'dich-vu-an-uong', 1, 'ward', 13, '2018-05-20 06:24:47', '2018-06-09 11:25:14'),
(6, 'Nhóm trẻ gia đình', NULL, 1, 'ward', 11, '2018-05-20 06:25:12', '2018-05-20 06:25:12'),
(7, 'BATT doanh nghiệp xã quản lí', NULL, 1, 'ward', 15, '2018-05-20 06:25:45', '2018-05-20 06:25:45'),
(8, 'CSSX RƯỢU', 'cssx-ruou', 2, NULL, NULL, '2018-06-09 11:25:31', '2018-06-09 11:25:31'),
(10, 'Tạp hóa', 'tap-hoa', 2, NULL, NULL, '2018-07-21 02:21:32', '2018-07-21 02:21:32'),
(11, 'CSSX Bún Mỳ', 'cssx-bun-my', 2, NULL, NULL, '2018-07-21 02:22:28', '2018-07-21 02:22:28'),
(12, 'Chăn nuôi', 'chan-nuoi', 3, NULL, NULL, '2018-07-21 02:23:46', '2018-07-21 02:23:46'),
(13, 'Trồng rau', 'trong-rau', 2, NULL, NULL, '2018-07-21 02:24:26', '2018-07-21 02:24:26'),
(14, 'Trồng nấm', 'trong-nam', 3, NULL, NULL, '2018-07-21 02:24:43', '2018-07-27 02:58:01'),
(15, 'Quán ăn xã quản lí', 'quan-an', 1, 'ward', 12, '2018-07-21 04:30:19', '2018-07-21 04:30:19'),
(16, 'BATT TH - TH', 'bep-an-tap-the', 1, 'hql', 6, '2018-07-21 04:30:46', '2018-07-21 04:30:46'),
(17, 'Sản xuất kinh doanh', 'san-xuat-kinh-doanh', 1, 'hql', 8, '2018-07-21 04:31:04', '2018-07-21 04:31:04'),
(18, 'Trung tâm lưu trú huyện quản lí', 'trung-tam-luu-tru', 1, 'hql', 7, '2018-07-21 04:31:22', '2018-07-21 04:31:22'),
(19, 'Dịch vụ CF giải khát xã quản lí', 'dich-vu-cf-giai-khat', 1, 'ward', 16, '2018-07-21 04:31:41', '2018-07-21 04:31:41'),
(24, 'CSSX Bánh mỳ', 'cssx-banh-my', 2, NULL, NULL, '2019-05-18 08:15:17', '2019-05-18 08:15:17'),
(25, 'CSSX, KD Bánh mỳ', 'cssx-kd-banh-my', 1, NULL, NULL, '2019-05-18 08:20:29', '2019-05-18 08:20:29'),
(28, 'Trung tâm lưu trú xã quản lí', 'can-tin-truong-hoc', 1, 'ward', 14, '2019-05-18 08:23:53', '2019-05-18 08:23:53'),
(29, 'Căn tin', 'can-tin', 1, 'hql', 1, '2019-05-18 08:29:35', '2019-05-18 08:29:35'),
(30, 'Dịch vụ CF giải khát huyện quản lí', 'dich-vu-giai-khat', 1, 'hql', 9, '2019-05-18 09:52:52', '2019-05-18 09:52:52'),
(31, 'BATT doanh nghiệp huyện quản lí', 'batt-doanh-nghiep', 1, 'hql', 4, '2019-09-18 17:00:00', '2019-09-25 17:00:00'),
(32, 'BATT Mần non', 'batt-mam-non', 1, 'hql', 5, '2019-09-25 17:00:00', '2019-09-25 17:00:00'),
(33, 'BATT NLDLTT', 'batt-nldltt', 1, 'hql', 3, '2019-09-25 17:00:00', '2019-09-25 17:00:00'),
(34, 'Quán ăn huyện quản lí', 'quan-an-huyen-quan-li', 1, 'hql', 2, '2019-09-25 17:00:00', '2019-09-25 17:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
