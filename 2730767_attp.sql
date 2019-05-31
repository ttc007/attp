-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: fdb21.awardspace.net
-- Thời gian đã tạo: Th5 31, 2019 lúc 12:59 PM
-- Phiên bản máy phục vụ: 5.7.20-log
-- Phiên bản PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `2730767_attp`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Y tế', 'y-te', 0, '2018-05-20 06:22:50', '2018-05-20 08:06:17'),
(2, 'Công thương', 'cong-thuong', 0, '2018-05-20 06:23:45', '2018-05-20 08:06:29'),
(3, 'Nông nghiệp', 'nong-nghiep', 0, '2018-05-20 06:23:58', '2018-05-20 08:06:38'),
(4, 'Thức ăn đường phố', 'thuc-an-duong-pho', 1, '2018-05-20 06:24:31', '2018-05-20 08:06:49'),
(5, 'Dịch vụ ăn uống', 'dich-vu-an-uong', 1, '2018-05-20 06:24:47', '2018-06-09 11:25:14'),
(6, 'Nhóm trẻ gia đình', NULL, 1, '2018-05-20 06:25:12', '2018-05-20 06:25:12'),
(7, 'Dịch vụ tiệc cưới', NULL, 1, '2018-05-20 06:25:45', '2018-05-20 06:25:45'),
(8, 'CSSX RƯỢU', 'cssx-ruou', 2, '2018-06-09 11:25:31', '2018-06-09 11:25:31'),
(9, 'Y tế huyện quản lý', 'ubnn-quan-ly', 0, '2018-06-16 10:34:55', '2018-07-27 02:21:23'),
(10, 'Tạp hóa', 'tap-hoa', 2, '2018-07-21 02:21:32', '2018-07-21 02:21:32'),
(11, 'CSSX Bún Mỳ', 'cssx-bun-my', 2, '2018-07-21 02:22:28', '2018-07-21 02:22:28'),
(12, 'Chăn nuôi', 'chan-nuoi', 3, '2018-07-21 02:23:46', '2018-07-21 02:23:46'),
(13, 'Trồng rau', 'trong-rau', 2, '2018-07-21 02:24:26', '2018-07-21 02:24:26'),
(14, 'Trồng nấm', 'trong-nam', 3, '2018-07-21 02:24:43', '2018-07-27 02:58:01'),
(15, 'Quán ăn', 'quan-an', 9, '2018-07-21 04:30:19', '2018-07-21 04:30:19'),
(16, 'Bếp ăn tập thể', 'bep-an-tap-the', 9, '2018-07-21 04:30:46', '2018-07-21 04:30:46'),
(17, 'Sản xuất kinh doanh', 'san-xuat-kinh-doanh', 9, '2018-07-21 04:31:04', '2018-07-21 04:31:04'),
(18, 'Trung tâm lưu trú', 'trung-tam-luu-tru', 9, '2018-07-21 04:31:22', '2018-07-21 04:31:22'),
(19, 'Dịch vụ CF giải khát', 'dich-vu-cf-giai-khat', 9, '2018-07-21 04:31:41', '2018-07-21 04:31:41'),
(20, 'Công thương Huyện Quản lý', 'cong-thuong-huyen-quan-ly', 0, '2018-07-27 01:03:16', '2018-07-27 01:03:16'),
(21, 'SX bún tươi', 'sx-bun-tuoi', 20, '2018-07-27 01:04:16', '2018-07-27 01:04:16'),
(22, 'SX Kinh doanh', 'sx-kinh-doanh', 20, '2018-07-27 01:05:03', '2018-07-27 01:05:03'),
(23, 'SX Kinh doanh mỳ kí', 'sx-kinh-doanh-my-ki', 20, '2018-07-27 01:05:57', '2018-07-27 01:05:57'),
(24, 'CSSX Bánh mỳ', 'cssx-banh-my', 2, '2019-05-18 08:15:17', '2019-05-18 08:15:17'),
(25, 'CSSX, KD Bánh mỳ', 'cssx-kd-banh-my', 9, '2019-05-18 08:20:29', '2019-05-18 08:20:29'),
(26, 'Trung tâm lưu trú', 'trung-tam-luu-tru-1', 1, '2019-05-18 08:21:36', '2019-05-18 08:21:36'),
(27, 'Dịch vụ ăn uống', 'dich-vu-an-uong-1', 9, '2019-05-18 08:22:32', '2019-05-18 08:22:32'),
(28, 'Căn tin trường học', 'can-tin-truong-hoc', 9, '2019-05-18 08:23:53', '2019-05-18 08:23:53'),
(29, 'Căn tin', 'can-tin', 9, '2019-05-18 08:29:35', '2019-05-18 08:29:35'),
(30, 'Dịch vụ giải khát', 'dich-vu-giai-khat', 1, '2019-05-18 09:52:52', '2019-05-18 09:52:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `date_checked`
--

CREATE TABLE `date_checked` (
  `id` int(11) NOT NULL,
  `food_safety_id` int(255) NOT NULL,
  `year` varchar(11) NOT NULL,
  `ngay_xac_nhan_hien_thuc` date DEFAULT NULL,
  `ngay_kiem_tra_2` date DEFAULT NULL,
  `ngay_kiem_tra_3` date DEFAULT NULL,
  `ghi_chu_1` varchar(222) DEFAULT NULL,
  `ghi_chu_2` varchar(255) DEFAULT NULL,
  `ghi_chu_3` varchar(222) DEFAULT NULL,
  `hinh_thuc_xu_phat_1` varchar(222) DEFAULT NULL,
  `hinh_thuc_xu_phat_2` varchar(222) DEFAULT NULL,
  `hinh_thuc_xu_phat_3` varchar(222) DEFAULT NULL,
  `ket_qua_kiem_tra_1` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ket_qua_kiem_tra_2` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ket_qua_kiem_tra_3` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `date_checked`
--

INSERT INTO `date_checked` (`id`, `food_safety_id`, `year`, `ngay_xac_nhan_hien_thuc`, `ngay_kiem_tra_2`, `ngay_kiem_tra_3`, `ghi_chu_1`, `ghi_chu_2`, `ghi_chu_3`, `hinh_thuc_xu_phat_1`, `hinh_thuc_xu_phat_2`, `hinh_thuc_xu_phat_3`, `ket_qua_kiem_tra_1`, `ket_qua_kiem_tra_2`, `ket_qua_kiem_tra_3`) VALUES
(1, 6, '2019', '2019-02-08', '2019-02-07', '2019-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 6, '2020', '2020-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 19, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 510, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 517, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 547, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 530, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 569, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 580, '2019', '2019-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 602, '2019', '2019-05-31', NULL, NULL, 'Chua co nap', NULL, NULL, 'Nhac nho', NULL, NULL, 'Chưa đạt', NULL, NULL),
(11, 581, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_safeties`
--

CREATE TABLE `food_safeties` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_chu_co_so` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `ten_co_so` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `categoryb2_id` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village_id` int(11) DEFAULT NULL,
  `certification_date` date DEFAULT NULL,
  `so_cap` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_kham_suc_khoe` date DEFAULT NULL,
  `ngay_ky_cam_ket` date DEFAULT NULL,
  `ngay_xac_nhan_hien_thuc` date DEFAULT NULL,
  `ngay_kiem_tra_2` date DEFAULT NULL,
  `ngay_kiem_tra_3` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_tieu_thu` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ket_qua_kiem_tra_1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ket_qua_kiem_tra_2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ket_qua_kiem_tra_3` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghi_chu_1` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghi_chu_2` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghi_chu_3` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_thuc_xu_phat_1` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_thuc_xu_phat_2` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_thuc_xu_phat_3` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `food_safeties`
--

INSERT INTO `food_safeties` (`id`, `ten_chu_co_so`, `ten_co_so`, `category_id`, `categoryb2_id`, `address`, `village_id`, `certification_date`, `so_cap`, `ngay_kham_suc_khoe`, `ngay_ky_cam_ket`, `ngay_xac_nhan_hien_thuc`, `ngay_kiem_tra_2`, `ngay_kiem_tra_3`, `created_at`, `updated_at`, `phone`, `noi_tieu_thu`, `ket_qua_kiem_tra_1`, `ket_qua_kiem_tra_2`, `ket_qua_kiem_tra_3`, `ghi_chu_1`, `ghi_chu_2`, `ghi_chu_3`, `hinh_thuc_xu_phat_1`, `hinh_thuc_xu_phat_2`, `hinh_thuc_xu_phat_3`) VALUES
(6, 'Đặng Thị Huệ', 'Đặng Thị Huệ', 1, 6, NULL, 2, '2018-12-03', '1', '2018-05-11', '2017-05-12', '2018-01-23', '2018-04-11', NULL, '2018-06-09 15:10:18', '2019-02-14 09:02:07', '1692555605', NULL, NULL, NULL, NULL, 'Thiếu giỏ rác. Test', NULL, NULL, 'Cảnh cáo , test', NULL, NULL),
(7, 'Trần Thị Hòa', 'Trần Thị Hòa', 1, 6, NULL, 8, '2018-02-02', '4', '2018-05-11', '2017-05-12', '2018-07-20', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 03:48:20', '905087346', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Trần Thị Ngãi', 'Trần Thị Ngãi', 1, 6, NULL, 8, '2018-02-02', '5', '2018-05-11', '2017-05-12', '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 03:57:45', '263798621', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Lê Thị Bích Vân', 'Lê Thị Bích Vân', 1, 6, NULL, 7, '2018-02-02', '2', '2018-05-11', '2017-05-12', '2018-01-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 03:58:53', '1208029099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Nguyễn Thị Thanh Vân', 'Nguyễn Thị Thanh Vân', 1, 6, NULL, 7, '2018-02-02', '1', '2018-05-11', '2017-05-12', '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:28:44', '263799515', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Phạm Thị Sang', 'Phạm Thị Sang', 1, 6, NULL, 3, '2018-06-03', '6', '2018-05-11', '2017-05-12', '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:32:12', '905369161', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Doãn Thị Lệ Thu', 'Doãn Thị Lệ Thu', 1, 6, NULL, 5, '2018-06-03', '7', '2018-05-11', '2017-05-12', '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:34:04', '905996659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Lê Thị Nguyệt', 'Lê Thị Nguyệt', 1, 6, NULL, 3, '2019-01-08', '1', '2018-05-11', '2017-05-12', '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:35:17', '905684016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Nguyễn Thị Hiền', 'Nguyễn Thị Hiền', 1, 6, NULL, 8, '2019-01-08', '2', '2018-05-11', '2017-05-12', '2018-01-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:36:45', '236799831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Đặng Thị Sang', 'Đặng Thị Sang', 1, 6, NULL, 13, '2018-06-03', '9', '2018-05-11', '2018-05-12', '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:37:46', '935760662', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Nguyễn Thị Thu Trâm', 'Nguyễn Thị Thu Trâm', 1, 6, NULL, 3, '2018-06-03', '8', '2018-05-11', '2017-05-12', '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:38:50', '935760662', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Trần Thị Hồng', 'Trần Thị Hồng', 1, 6, NULL, 7, '2018-02-02', '7', '2018-05-11', '2017-05-12', '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:40:57', '932477559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Trần Thị Lệ', 'Trần Thị Lệ', 1, 6, NULL, 7, '2017-10-29', '3', '2018-05-11', '2017-05-12', '2018-08-09', '2018-08-18', '2018-08-29', '2018-06-09 15:10:18', '2019-02-14 08:41:43', '905085039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Dương Thị Minh Thảo', 'Dương Thị Minh Thảo', 1, 6, NULL, 11, '2016-05-01', '1', '2018-05-11', '2017-05-12', '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-20 23:52:10', '943006214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Ngô Thị Thu', 'Ngô Thị Thu', 1, 6, NULL, 10, '2017-10-29', '6', NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '1668866465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Nguyễn Thị Bích Thuận', 'Nguyễn Thị Bích Thuận', 1, 6, NULL, 9, '2017-10-29', '2', NULL, NULL, '2018-01-17', '2018-04-11', NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '1216000316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Nguyễn Thị Hà My', 'Nguyễn Thị Hà My', 1, 6, NULL, 10, '2017-10-29', '4', NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '906422007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Ngô Thị Tình', 'Ngô Thị Tình', 1, 6, NULL, 10, '2018-02-02', '6', NULL, NULL, '2018-01-17', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '905041291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Trần Thị Lâu', 'Trần Thị Lâu', 1, 6, NULL, 7, '2019-01-08', '3', NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2019-02-14 08:39:46', '905784512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Nguyễn Thị Thắng', 'Nguyễn Thị Thắng', 1, 6, NULL, 8, '2017-02-02', '1', NULL, NULL, '2018-04-11', '2018-01-17', NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '935730971', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Đặng Nguyễn Thị Hiền Mẫu', 'Đặng Nguyễn Thị Hiền Mẫu', 1, 6, NULL, 2, '2017-02-09', '1', NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '932573965', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Phan Thị Hoài Trinh', 'Phan Thị Hoài Trinh', 1, 6, NULL, 2, '2017-10-29', '5', NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '1263574539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Nguyễn Thị Oanh', 'Nguyễn Thị Oanh', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-01-24', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '0905 529 202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Trương Thị Thương ', 'Trương Thị Thương ', 1, 4, NULL, 9, '2017-05-04', NULL, NULL, NULL, '2018-01-24', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Ngô Thị Thảo', 'Ngô Thị Thảo', 1, 4, NULL, 9, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Nguyễn Thị bi', 'Nguyễn Thị bi', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Nguyễn Thi Mỹ Châu', 'Nguyễn Thi Mỹ Châu', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-12', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '1202729300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Nguyễn Thị Lợi', 'Nguyễn Thị Lợi', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:52', '905893151', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Đặng Thị Ngọc Vân', 'Đặng Thị Ngọc Vân', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '01234 333 959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Nguyễn Thị Thùy Dung', 'Nguyễn Thị Thùy Dung', 1, 4, NULL, 9, '2017-05-04', NULL, NULL, NULL, '2018-04-12', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '129608504', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Trần Thị Hiền', 'Trần Thị Hiền', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-01-21', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Hồ Thị Bích', 'Hồ Thị Bích', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-01-24', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '932434357', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Võ Thị Bảy', 'Võ Thị Bảy', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Trần Thị Kim Quyên', 'Trần Thị Kim Quyên', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Võ Thị Xuân', 'Võ Thị Xuân', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Lê Thị Cẩm Vân', 'Lê Thị Cẩm Vân', 1, 4, NULL, 2, '2017-05-04', NULL, NULL, NULL, '2018-05-18', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Nguyễn Thị Dung ', 'Nguyễn Thị Dung ', 1, 4, NULL, NULL, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Nguyễn Thị Thanh Hằng', 'Nguyễn Thị Thanh Hằng', 1, 4, NULL, 13, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Đặng Công Tuấn', 'Đặng Công Tuấn', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Đặng  Thị Thanh Phương', 'Đặng  Thị Thanh Phương', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Nguyễn Thị Minh', 'Nguyễn Thị Minh', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '129608507', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Ngô Thị Lộc', 'Ngô Thị Lộc', 1, 4, NULL, 8, '2017-05-04', NULL, NULL, NULL, '2018-05-18', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Nguyễn Thị Thương', 'Nguyễn Thị Thương', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Nguyễn văn dũng', 'Nguyễn văn dũng', 1, 5, NULL, 10, '2017-05-04', NULL, NULL, NULL, '2018-04-10', '2018-05-17', NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '9074707184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Huỳnh Thị Thúy', 'Huỳnh Thị Thúy', 1, 5, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-04-12', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Nguyễn Thị Bích Ngọc', 'Nguyễn Thị Bích Ngọc', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '931882149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Lê Thị Bích Hạnh', 'Lê Thị Bích Hạnh', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '906222480', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Nguyễn Văn Tài', 'Nguyễn Văn Tài', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Hồ Thị Diễm Thúy', 'Hồ Thị Diễm Thúy', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Nguyễn Thị Ý', 'Nguyễn Thị Ý', 1, 4, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Nguyễn Xuân Quốc Cảnh', 'Nguyễn Xuân Quốc Cảnh', 1, 4, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-01-24', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '905051432', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Phạm Thị BảoThi', 'Phạm Thị BảoThi', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Phan Thị Ánh Nguyệt', 'Phan Thị Ánh Nguyệt', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '0934 825 191', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Nguyễn Thị phượng', 'Nguyễn Thị phượng', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Nguyễn Thị Chúc', 'Nguyễn Thị Chúc', 1, 5, NULL, 7, '2016-06-04', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Nguyễn  Nở', 'Nguyễn  Nở', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Ngô Ngọc Điệp', 'Ngô Ngọc Điệp', 1, 5, NULL, 7, '2016-06-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '0987 797 232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Nguyễn Thị hương', 'Nguyễn Thị hương', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Nguyễn Văn kiếm', 'Nguyễn Văn kiếm', 1, 5, NULL, 7, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Nguyễn Thị Vũ', 'Nguyễn Thị Vũ', 1, 5, NULL, 7, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Đỗ Thị Thu Hạnh', 'Đỗ Thị Thu Hạnh', 1, 5, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-06-09 15:10:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Lê Thị Trang', 'Lê Thị Trang', 1, 5, NULL, 7, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Trần Thị Kim Trang', 'Trần Thị Kim Trang', 1, 5, NULL, 7, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '906443767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Nguyễn Thị Sang', 'Nguyễn Thị Sang', 1, 5, NULL, 7, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Lê Thị Lai', 'Lê Thị Lai', 1, 5, NULL, 2, NULL, NULL, NULL, NULL, '2018-05-18', NULL, NULL, '2018-06-09 15:10:18', '2018-07-31 01:09:33', '905950245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Lệ thị xuân', 'Lệ thị xuân', 1, 5, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-06-09 15:10:18', '9051023381', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Đặng thị chỉ', 'Đặng thị chỉ', 1, 5, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-06-09 15:10:18', '1263626169', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Nguyễn Thị sáu,Đạo', 'Nguyễn Thị sáu,Đạo', 1, 5, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Nguyễn Thị Hoa', 'Nguyễn Thị Hoa', 1, 5, NULL, 7, '2017-05-04', NULL, NULL, NULL, '2018-04-12', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Nguyễn văn Hà', 'Nguyễn văn Hà', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Nguyễn Thị Đấu', 'Nguyễn Thị Đấu', 1, 5, NULL, 8, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Đặng Thị Chúc', 'Đặng Thị Chúc', 1, 5, NULL, 8, '2016-06-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:18', '2018-08-12 09:48:51', '906544352', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Nguyễn Thị Bé', 'Nguyễn Thị Bé', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-05-16', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Nguyễn thị miên', 'Nguyễn thị miên', 1, 5, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Nguyễn Thị Thước', 'Nguyễn Thị Thước', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '934858127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Nguyễn Thị Thúy', 'Nguyễn Thị Thúy', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Ông Thị Thôi', 'Ông Thị Thôi', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '1214543776', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Nguyễn Văn Thắng', 'Nguyễn Văn Thắng', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '01697 337 335', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Lê Thị Hồng Lương', 'Lê Thị Hồng Lương', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '0905 331 079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Nguyễn Thị Nở,Cô Anh ,Minh Thu', 'Nguyễn Thị Nở,Cô Anh ,Minh Thu', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '0935 536 269.0905307309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Lê Thị Điền', 'Lê Thị Điền', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Hồ Thị Hải', 'Hồ Thị Hải', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Phạm Thị Lê', 'Phạm Thị Lê', 1, 5, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Nguyễn Hữu Hậu', 'Nguyễn Hữu Hậu', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Hùynh Thị Trâm', 'Hùynh Thị Trâm', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '988611637', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'Nguyễn Thị Lưu', 'Nguyễn Thị Lưu', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '1202366298', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'Nguyễn Thị Thu', 'Nguyễn Thị Thu', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'Nguyễn Thị Minh Hiệp', 'Nguyễn Thị Minh Hiệp', 1, 5, NULL, 13, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '01202 466 761', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'Nguyễn Thị Luyến', 'Nuyễn Thị Luyến', 1, 5, NULL, 13, '2017-05-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-07-31 00:43:35', '1226219079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'Phan Thị Thùy Ngân', 'Phan Thị Thùy Ngân', 1, 5, NULL, 13, '2017-05-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '923138111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Võ Nữ Thì Long', 'Võ Nữ Thì Long', 1, 5, NULL, 13, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '166866839', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Nguyễn Thị Diểm trang', 'Nguyễn Thị Diểm trang', 1, 5, NULL, 13, '2017-05-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '923138111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Trần Thị  Mai', 'Trần Thị  Mai', 1, 5, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '1627052972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Lê Thị Nhiêu', 'Lê Thị Nhiêu', 1, 5, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'Nguyễn Thị Như (Nguyễn Thị Hiền)', 'Nguyễn Thị Như (Nguyễn Thị Hiền)', 1, 5, NULL, 9, '2016-06-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '95333298', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'Nguyễn Thị lý', 'Nguyễn Thị lý', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '164570954', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Nguyễn Đà', 'Nguyễn Đà', 1, 5, NULL, 9, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'Lê thị năm', 'Lê thị năm', 1, 5, NULL, 9, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Nguyễn sáu', 'Nguyễn sáu', 1, 5, NULL, 9, '2017-04-15', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Huỳnh Thị Huệ', 'Huỳnh Thị Huệ', 1, 5, NULL, 9, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '1225525784', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Trần thị nguyệt ', 'Trần thị nguyệt ', 1, 5, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Đặng Thị Hồng, Lê Thị Ánh Hồng', 'Đặng Thị Hồng, Lê Thị Ánh Hồng', 1, 5, NULL, 9, '2017-04-15', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:19', '2018-07-31 00:45:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'Nguyễn Thị Hải', 'Nguyễn Thị Hải', 1, 5, NULL, 13, '2016-06-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '905363658', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'Đặng Thị Xuân Hương', 'Đặng Thị Xuân Hương', 1, 5, NULL, 3, '2016-06-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '905331079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Hồ thị thu sương', 'Hồ thị thu sương', 1, 5, NULL, 8, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '908621516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Nguyễn thi Hồng', 'Nguyễn thi Hồng', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Ngô thi ba', 'Ngô thi ba', 1, 5, NULL, 10, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', '906657132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Vỏ Thị Tơ', 'Vỏ Thị Tơ', 1, NULL, NULL, 10, NULL, NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '1219157810', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Nguyễn Thị Lạng', 'Nguyễn Thị Lạng', 1, 5, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Nguyễn thị trinh', 'Nguyễn thị trinh', 1, 5, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Phạm thị Tố', 'Phạm thị Tố', 1, 5, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Ngô thị Quay', 'Ngô thị Quay', 1, 5, NULL, 10, NULL, NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'Huỳnh Thị Hương', 'Huỳnh Thị Hương', 1, 5, NULL, 10, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Huỳnh thị Vân', 'Huỳnh thị Vân', 1, 5, NULL, 10, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '0906546665', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Huỳnh thị Phương', 'Huỳnh thị Phương', 1, 5, NULL, 10, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '0124546969', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Đinh Thị Hiệp', 'Đinh Thị Hiệp', 1, 5, NULL, 10, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '1692483676', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Nguyễn Thị Loan', 'Nguyễn Thị Loan', 1, 5, NULL, 12, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Đặng Thị Lược', 'Đặng Thị Lược', 1, 5, NULL, 11, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Đặng Thị Thùy Liên', 'Đặng Thị Thùy Liên', 1, 5, NULL, 11, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Nguyễn Thị lê', 'Nguyễn Thị lê', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Trần Thị Năm ,Lê Thị Lệ Phương', 'Trần Thị Năm ,Lê Thị Lệ Phương', 1, 5, NULL, 4, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '932490533', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Hồ Thị Bé', 'Hồ Thị Bé', 1, 5, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Nguyễn thị Việt ,Nguyễn Thị Cúc', 'Nguyễn thị Việt ,Nguyễn Thị Cúc', 1, 5, NULL, 4, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '905677028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Nguyễn Thi Ánh Tuyết', 'Nguyễn Thi Ánh Tuyết', 1, 5, NULL, 4, '2017-05-04', NULL, NULL, NULL, '2018-04-11', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '1682754221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Lê Thị Thanh Xuân', 'Lê Thị Thanh Xuân', 1, 5, NULL, 2, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '905102381', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Đặng Thị Hương', 'Đặng Thị Hương', 1, 5, NULL, 2, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '1247383259', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Nguyễn Thị loài', 'Nguyễn Thị loài', 1, 5, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '935950245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Nguyễn thi ánh', 'Nguyễn thi ánh', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Lê Thanh Tuấn', 'Lê Thanh Tuấn', 1, 5, NULL, 6, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Đặng Thị lanh', 'Đặng Thị lanh', 1, 5, NULL, 6, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Đặng Thị Chơi', 'Đặng Thị Chơi', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, '2018-04-10', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Ông thị thu', 'Ông thị thu', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Huỳnh thị ngữ ', 'Huỳnh thị ngữ ', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Nguyễn Thị Tâm', 'Nguyễn Thị Tâm', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'Nguyễn thi châu', 'Nguyễn thi châu', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'Nguyễn thi Thi ', 'Nguyễn thi Thi ', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'Nguyễn thi nghiêu', 'Nguyễn thi nghiêu', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'Nguyễn thi thu hạnh', 'Nguyễn thi thu hạnh', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Nguyễn Thị sương', 'Nguyễn Thị sương', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Nguyễn Thị phúc', 'Nguyễn Thị phúc', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'Vũ Ngọc Công', 'Vũ Ngọc Công', 1, 5, NULL, 3, '2017-05-04', NULL, NULL, NULL, '2018-01-23', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', '988408606', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'Trên bà sang', 'Trên bà sang', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'Nguyễn Thị Hằng', 'Nguyễn Thị Hằng', 1, 5, NULL, 3, '2017-04-15', NULL, NULL, NULL, '2018-05-17', NULL, NULL, '2018-06-09 15:10:19', '2018-08-12 09:48:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'Nguyễn Văn Phong', 'Nguyễn Văn Phong', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '982225557', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'NgôThị Duyên', 'NgôThị Duyên', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '1268542554', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'Nguyễn Đức Thông', 'Nguyễn Đức Thông', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '906432627', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'Nguyễn Thị Thùy Ninh', 'Nguyễn Thị Thùy Ninh', 1, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '935470681', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'Trần thị Bé ', 'Trần thị Bé ', 1, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '1699857060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'Nguyễn Thi kiêu', 'Nguyễn Thi kiêu', 1, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '1863253089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'Nguyễn Thi Mai + Nguyễn Thị Lệ', 'Nguyễn Thi Mai + Nguyễn Thị Lệ', 1, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '1262749087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'Đặng Thị Liên', 'Đặng Thị Liên', 1, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '1219464810', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'Ông Thị Lệ', 'Ông Thị Lệ', 1, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '932491538', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, ' Ông Thị Hồng,Bùi Thị Bình ,Phan Thị Tán', ' Ông Thị Hồng,Bùi Thị Bình ,Phan Thị Tán', 1, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '12637399352', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'Nguyễn Thị Gái', 'Nguyễn Thị Gái', 1, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-09 15:10:19', '2018-06-09 15:10:19', '906492768', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'Nguyễn Thị Hai', 'Nguyễn Thị Hai', 2, 10, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-21 02:34:03', '2018-07-21 02:34:03', '02363798359', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'Nguyễn Thị Bảo', 'Nguyễn Thị Bảo', 2, 10, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-21 02:36:24', '2018-07-21 02:36:24', '01225433222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'Ngô Thị Duyên', 'Ngô Thị Duyên', 2, 10, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-21 02:37:28', '2018-07-21 02:37:28', '01214239043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'Đặng Thị Nhành', 'Đặng Thị Nhành', 2, 10, NULL, 11, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:14:54', '2018-07-25 07:14:54', '0906492773', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'Đặng Thị Luận', 'Đặng Thị Luận', 2, 10, NULL, 11, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:16:11', '2018-07-25 07:16:11', '01213534525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'Nguyễn Thị Qúy', 'Nguyễn Thị Qúy', 2, 10, NULL, 11, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:17:16', '2018-07-25 07:17:16', '02363798780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'Trần Thị Thiên Hương', 'Trần Thị Thiên Hương', 2, 10, NULL, 11, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:18:01', '2018-07-25 07:18:01', '02363799382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'Nguyễn Thanh Sơn', 'Nguyễn Thanh Sơn', 2, 10, NULL, 12, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:19:06', '2018-07-25 07:19:06', '01626253453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'Đặng Thị Lý', 'Đặng Thị Lý', 2, 10, NULL, 12, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:20:26', '2018-07-25 07:20:26', '0935808708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'Nguyễn Thị Duẩn', 'Nguyễn Thị Duẩn', 2, 10, NULL, 12, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:21:14', '2018-07-25 07:21:14', '01649369140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'Nguyễn Thị Mực', 'Nguyễn Thị Mực', 2, 10, NULL, 12, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:21:53', '2018-07-25 07:22:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'Tạp Hóa Phương Linh', 'Tạp Hóa Phương Linh', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:23:28', '2018-07-25 07:23:28', '0934805785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'Tạp Hóa Bảo Quốc', 'Tạp Hóa Bảo Quốc', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:24:36', '2018-07-25 07:24:36', '0935865344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'Tạp Hóa Hằng Hân', 'Tạp Hóa Hằng Hân', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:25:17', '2018-07-25 07:25:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'Trần Thị Mỹ', 'Trần Thị Mỹ', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:26:29', '2018-07-25 07:26:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'Trần Thị Mỹ', 'Trần Thị Mỹ', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:26:30', '2018-07-25 07:26:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'Trần Thị Thanh Phong', 'Trần Thị Thanh Phong', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:27:46', '2018-07-25 07:27:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'Nguyễn Thị Hồng', 'Nguyễn Thị Hồng', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:30:20', '2018-07-25 07:30:20', '01248025609', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'Đặng Thị Dần', 'Đặng Thị Dần', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:31:10', '2018-07-25 07:31:10', '01215534735', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'Nguyễn Thanh Trà', 'Nguyễn Thanh Trà', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:31:58', '2018-07-25 07:31:58', '0935865344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'Nguyễn Văn Liên', 'Nguyễn Văn Liên', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:32:34', '2018-07-25 07:32:34', '01215667981', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'Nguyễn Thi Xa', 'Nguyễn Thi Xa', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:33:13', '2018-07-25 07:33:13', '01202610715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'Bùi Lâm', 'Bùi Lâm', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:33:53', '2018-07-25 07:33:53', '01224889691', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'Đặng Thị Hà Tiên', 'Đặng Thị Hà Tiên', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:34:49', '2018-07-25 07:34:49', '01282616867', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'Nguyễn Thị Thương', 'Nguyễn Thị Thương', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:35:25', '2018-07-25 07:35:25', '0905548927', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'Nguyễn Thị Nguyệt', 'Nguyễn Thị Nguyệt', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:36:07', '2018-07-25 07:36:07', '02363799912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'Nguyễn Thị Thanh Hà', 'Nguyễn Thị Thanh Hà', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:36:59', '2018-07-25 07:36:59', '0934830557', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'Nguyễn Thị Hồng Hà', 'Nguyễn Thị Hồng Hà', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:37:45', '2018-07-25 07:37:45', '0934825125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'Nguyễn Thị Khương', 'Nguyễn Thị Khương', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:38:23', '2018-07-25 07:38:23', '0905548927', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'Trần Thị Tuyết', 'Trần Thị Tuyết', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:39:00', '2018-07-25 07:39:00', '02363798983', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'Nguyễn Thị Hà', 'Nguyễn Thị Hà', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:39:42', '2018-07-25 07:39:42', '0906439754', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'Bùi Thị Thu Hà', 'Bùi Thị Thu Hà', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:40:17', '2018-07-25 07:40:17', '01697370237', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'Đặng Thị Diệu', 'Đặng Thị Diệu', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:41:06', '2018-07-25 07:41:06', '0935033724', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'Đặng Thị Luận', 'Đặng Thị Luận', 2, 10, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:41:50', '2018-07-25 07:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'Nguyễn Thị Hường', 'Nguyễn Thị Hường', 2, 10, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:42:41', '2018-07-25 07:42:41', '01267172610', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'Võ Thị Thùy', 'Võ Thị Thùy', 2, 10, NULL, 6, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:43:55', '2018-07-25 07:43:55', '0935230775', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'Đặng Thị Thu', 'Đặng Thị Thu', 2, 10, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:44:54', '2018-07-25 07:44:54', '02363798185', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'Lê Công Hạnh', 'Lê Công Hạnh', 2, 10, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:45:33', '2018-07-25 07:45:33', '01632172148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'Đặng Ka', 'Đặng Ka', 2, 10, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-25 07:46:08', '2018-07-25 07:46:08', '02363798097', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'Nguyễn Thị Hoa', 'Nguyễn Thị Hoa', 2, 10, NULL, 4, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 08:56:43', '2018-07-26 08:56:43', '01208747590', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'Ngô Thị Liên', 'Ngô Thị Liên', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 08:57:26', '2018-07-26 08:57:26', '0905155161', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'Ngô Thị Tâm', 'Ngô Thị Tâm', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 08:57:58', '2018-07-26 08:57:58', '0120133125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'Nguyễn Thị Hồng', 'Nguyễn Thị Hồng', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 08:58:28', '2018-07-26 08:58:28', '01262778116', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'Cửa Hàng Thùy Ly', 'Cửa Hàng Thùy Ly', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 08:59:04', '2018-07-26 08:59:04', '01225727640', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'Cửa hàng Văn Giao', 'Cửa hàng Văn Giao', 2, 10, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:00:00', '2018-07-26 09:00:00', '0905346719', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'Tạp Hóa Quyến', 'Tạp Hóa Quyến', 2, 10, NULL, 3, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:00:37', '2018-07-26 09:00:37', '02363799994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'Lê Thị Vân', 'Lê Thị Vân', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:01:16', '2018-07-26 09:01:16', '02363798058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'Đặng Thị Hòa', 'Đặng Thị Hòa', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:01:45', '2018-07-26 09:01:45', '0905620295', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'Nguyễn Thị Hương', 'Nguyễn Thị Hương', 2, 10, NULL, 8, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:02:14', '2018-07-26 09:02:14', '0935001519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'Đặng Thị Bưởi', 'Đặng Thị Bưởi', 2, 10, NULL, 3, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:03:04', '2018-07-26 09:03:04', '0935962732', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'Huỳnh Thị Xuân', 'Huỳnh Thị Xuân', 2, 10, NULL, 3, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:03:45', '2018-07-26 09:03:45', '0905520806', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'Ngô Thị Kim Loan', 'Ngô Thị Kim Loan', 2, 10, NULL, 5, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:04:14', '2018-07-26 09:04:14', '0938514417', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'Đặng Thị Kim Hộp', 'Đặng Thị Kim Hộp', 2, 10, NULL, 3, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:04:40', '2018-07-26 09:04:40', '0908861293', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'Nguyễn Thị Bé', 'Nguyễn Thị Bé', 2, 10, NULL, 3, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:05:07', '2018-07-26 09:05:07', '0236367099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'Đặng Thị Biêu', 'Đặng Thị Biêu', 2, 10, NULL, 2, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:05:47', '2018-07-26 09:05:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 'Trương Thị Nha', 'Trương Thị Nha', 2, 10, NULL, 8, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:09:37', '2018-07-26 09:09:37', '0236798058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'Nguyễn Thị Nhạn', 'Nguyễn Thị Nhạn', 2, 10, NULL, 8, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:10:23', '2018-07-26 09:10:23', '0236798094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'Nguyễn Thị Nhạn', 'Nguyễn Thị Nhạn', 2, 10, NULL, 8, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:10:23', '2018-07-26 09:10:23', '0236798094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'Ngô Thị Cần', 'Ngô Thị Cần', 2, 10, NULL, 8, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:11:00', '2018-07-26 09:11:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `food_safeties` (`id`, `ten_chu_co_so`, `ten_co_so`, `category_id`, `categoryb2_id`, `address`, `village_id`, `certification_date`, `so_cap`, `ngay_kham_suc_khoe`, `ngay_ky_cam_ket`, `ngay_xac_nhan_hien_thuc`, `ngay_kiem_tra_2`, `ngay_kiem_tra_3`, `created_at`, `updated_at`, `phone`, `noi_tieu_thu`, `ket_qua_kiem_tra_1`, `ket_qua_kiem_tra_2`, `ket_qua_kiem_tra_3`, `ghi_chu_1`, `ghi_chu_2`, `ghi_chu_3`, `hinh_thuc_xu_phat_1`, `hinh_thuc_xu_phat_2`, `hinh_thuc_xu_phat_3`) VALUES
(219, 'Tạp Hóa Tuyết', 'Tạp Hóa Tuyết', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:12:02', '2018-07-26 09:12:02', '0236798983', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'Tạp Hóa Nguyệt', 'Tạp Hóa Nguyệt', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:13:09', '2018-07-26 09:13:09', '0236799912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 'Tạp Hóa Thanh Nhã', 'Tạp Hóa Thanh Nhã', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:13:43', '2018-07-26 09:13:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 'Tạp Hóa Minh Hòa', 'Tạp Hóa Minh Hòa', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:14:15', '2018-07-26 09:14:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 'Nguyễn Thị Sáu', 'Nguyễn Thị Sáu', 2, 10, NULL, 7, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:14:49', '2018-07-26 09:14:49', '0905355499', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 'Tạp Hóa Hiệp', 'Tạp Hóa Hiệp', 2, 10, NULL, 7, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:15:27', '2018-07-26 09:15:27', '0905333195', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 'Trần Duyên', 'Trần Duyên', 2, 10, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:16:05', '2018-07-26 09:16:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 'Nguyễn Thị Ánh', 'Nguyễn Thị Ánh', 2, 10, NULL, 3, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:16:48', '2018-07-26 09:16:48', '0905148140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 'Lê Thị Sưa', 'Lê Thị Sưa', 2, 10, NULL, 2, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:17:20', '2018-07-26 09:17:20', '0976647433', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 'Nguyễn Thị Yến', 'Nguyễn Thị Yến', 2, 8, NULL, 10, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:23:17', '2018-07-26 09:23:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 'Nguyễn Thị Hồng', 'Nguyễn Thị Hồng', 2, 8, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:24:57', '2018-07-26 09:24:57', '02363798342', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 'Nguyễn Thanh Xuân', 'Nguyễn Thanh Xuân', 2, 8, NULL, 7, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:25:30', '2018-07-26 09:25:30', '0905888940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 'Lê Văn Lê', 'Lê Văn Lê', 2, 8, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:26:19', '2018-07-26 09:26:19', '01263620711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 'Nguyễn Thị Thọ', 'Nguyễn Thị Thọ', 2, 10, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:42:48', '2018-07-26 09:42:48', '01202792975', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 'Hồ Thị Vân', 'Hồ Thị Vân', 2, 8, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:43:41', '2018-07-26 09:43:41', '0905202317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 'Bùi Thị Ngọc Lan', 'Bùi Thị Ngọc Lan', 2, 8, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:44:30', '2018-07-26 09:44:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 'Nguyễn Thị Nguyệt', 'Nguyễn Thị Nguyệt', 2, 8, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:45:16', '2018-07-26 09:45:16', '01223269906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 'Đặng Văn Dũng', 'Đặng Văn Dũng', 2, 8, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:47:38', '2018-07-26 09:47:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, 'Đặng Đào', 'Đặng Đào', 2, 8, NULL, 5, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:48:06', '2018-07-26 09:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, 'Đặng Quang Diên', 'Đặng Quang Diên', 2, 8, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:49:22', '2018-07-26 09:49:22', '0984846707', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, 'Võ Thứ', 'Võ Thứ', 2, 8, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:49:59', '2018-07-26 09:49:59', '0905597486', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, 'Lê Văn Trí', 'Lê Văn Trí', 2, 8, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:50:26', '2018-07-26 09:50:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, 'Thái Thị Kiều', 'Thái Thị Kiều', 2, 8, NULL, 4, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:50:56', '2018-07-26 09:50:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 'Đặng Thị Thương', 'Đặng Thị Thương', 2, 8, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-26 09:51:30', '2018-07-26 09:51:30', '01216589750', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, 'Nguyễn Văn Nhiên', 'Nguyễn Văn Nhiên', 2, 8, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 00:57:11', '2018-07-27 00:57:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, 'Huỳnh Thị Mai', 'Huỳnh Thị Mai', 2, 8, NULL, 2, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 00:57:51', '2018-07-27 00:57:51', '0128751034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, 'Nguyễn Thị Hồng', 'Nguyễn Thị Hồng', 2, 8, NULL, 2, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:00:28', '2018-07-27 01:00:28', '0236798342', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 'Nguyễn Đức Ngư', 'Nguyễn Đức Ngư', 2, 8, NULL, 2, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:00:54', '2018-07-27 01:00:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, 'Nguyễn Phú Đà', 'Nguyễn Phú Đà', 2, 8, NULL, 9, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:01:30', '2018-07-27 01:01:30', '01202589923', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, 'Nguyễn Đống', 'Nguyễn Đống', 20, 21, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:07:03', '2018-07-27 01:07:03', '0935890258', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, 'Đặng Quang Minh', 'Đặng Quang Minh', 20, 21, NULL, 6, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:13:27', '2018-07-27 01:13:27', '0905628701', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, 'Nguyễn Văn Hùng', 'Nguyễn Văn Hùng', 20, 23, NULL, 3, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:14:34', '2018-07-27 01:14:34', '0935733843', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, 'Nguyễn Thị Hồng', 'Nguyễn Thị Hồng', 20, 23, NULL, 3, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:16:20', '2018-07-27 01:16:20', '01658914297', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, 'Nguyễn Thị Loan', 'Nguyễn Thị Loan', 20, 23, NULL, 2, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:19:13', '2018-07-27 01:19:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, 'Đặng Thị Lại', 'Đặng Thị Lại', 20, 21, NULL, 3, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:42:18', '2018-07-27 01:42:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, 'Lê Thị Cơ', 'Lê Thị Cơ', 20, 23, NULL, 3, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:42:46', '2018-07-27 02:19:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, 'Từ Thị Hường', 'Từ Thị Hường', 20, 23, NULL, 2, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:53:38', '2018-07-27 02:19:33', '01645347182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, 'Huỳnh Thị Hạ', 'Huỳnh Thị Hạ', 20, 23, NULL, 3, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:56:51', '2018-07-27 01:56:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 'Lê Thị Thống', 'Lê Thị Thống', 20, 23, NULL, 2, NULL, 'Có đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 01:57:18', '2018-07-27 02:19:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, 'Ngô Thị Lanh', 'Ngô Thị Lanh', 20, 21, NULL, 2, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:00:23', '2018-07-27 02:00:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, 'Dương Thị Qúy Đông', 'Dương Thị Qúy Đông', 20, 23, NULL, 10, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:01:16', '2018-07-27 02:01:16', '01222500357', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, 'Ngô Thị Hiền', 'Ngô Thị Hiền', 20, 23, NULL, 10, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:02:49', '2018-07-27 02:02:49', '01282697449', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, 'Nguyễn Thị Hường', 'Nguyễn Thị Hường', 20, 23, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:09:15', '2018-07-27 02:09:15', '01886946065', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, 'Nguyễn Thị Hồng Vân', 'Nguyễn Thị Hồng Vân', 20, 23, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:10:09', '2018-07-27 02:10:09', '01213597424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, 'Phạm Thị Yến', 'Phạm Thị Yến', 20, 23, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:10:46', '2018-07-27 02:10:46', '0905682295', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, 'Nguyễn Thị Dung', 'Nguyễn Thị Dung', 20, 21, NULL, 9, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:11:23', '2018-07-27 02:11:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, 'Phạm Thị Lộc', 'Phạm Thị Lộc', 20, 21, NULL, 13, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:17:35', '2018-07-27 02:17:35', '0937020186', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, 'Nguyễn Thị Hồng', 'Nguyễn Thị Hồng', 20, 21, NULL, 8, NULL, 'Không đăng ký kinh doanh', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:18:26', '2018-07-27 02:18:26', '0905329393', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, 'Nguyễn Thị Huệ', 'Mầm non Minh Trí', 9, 16, NULL, 13, '2015-12-11', '27/2015/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:23:22', '2018-07-27 02:23:22', '02363799926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, 'Ông Thị Hồng Phương', 'MN Hòa Tiến 2', 9, 16, NULL, 13, '2016-04-26', '11/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:25:02', '2018-07-27 02:25:37', '02363799787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, 'Ông Thị Hồng Phương', 'MN Hòa Tiến 2', 9, 16, NULL, 5, '2016-04-26', '12/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:26:57', '2018-07-27 02:26:57', '02363799787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, 'Ông Thị Hồng Phương', 'MN Hòa Tiến 2', 9, 16, NULL, 2, '2016-04-26', '13/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:27:33', '2018-07-27 02:27:33', '02363799787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, 'Nguyễn Thị Hồng Thắm', 'Quán cơm Bốn', 9, 15, NULL, 7, '2016-05-17', '20/2016_ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:28:57', '2018-07-27 02:28:57', '01219439089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, 'Nguyễn Thị Lực', 'Quán mỳ bà Lực', 9, 15, NULL, 3, '2016-06-08', '27/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:30:03', '2018-07-27 02:30:03', '0905729116', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, 'Văn Thị Thạnh', 'Quán Long Thạnh', 9, 15, NULL, 3, '2016-06-19', '32/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:31:44', '2018-07-27 02:31:44', '0948515168', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, 'Trần Thị Phương', 'Quán Hồ Xanh', 9, 15, NULL, 8, '2016-06-29', '38/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:35:12', '2018-07-27 02:35:12', '0903514599', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, 'Trần Thị Thu Vân', 'Bánh mỳ Kim Hùng', 9, 17, NULL, 2, '2016-08-24', '48/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:36:30', '2018-07-27 02:36:30', '09833799202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, 'Nguyễn Thu Hà', 'Trung tâm lưu trú Hòa Thuận', 9, 18, NULL, 8, '2016-08-26', '51/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:37:48', '2018-07-27 02:37:48', '0935600719', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, 'Đỗ Nữ Lâm Thanh', 'MN Hòa Tiến 1', 9, 16, NULL, 10, '2016-09-26', '61/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:39:06', '2018-07-27 02:39:06', '0906475777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, 'Đỗ Nữ Lâm Thanh', 'MN Hòa Tiến 1', 9, 16, NULL, 9, '2016-09-26', '62/2016_ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:40:22', '2018-07-27 02:40:22', '0906475777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, 'Lê Văn Đại Dương', 'Quán Dương', 9, 15, NULL, 2, '2016-10-11', '71/2016/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:41:35', '2018-07-27 02:41:35', '0905510642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, 'Nguyễn Thỏa', 'MN Ánh Khuyên', 9, 16, NULL, 3, '2017-01-18', '02/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:42:49', '2018-07-27 02:42:49', '02363846092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, 'Đặng Thị Hòa Lợi', 'Cafe Garden', 9, 19, NULL, 3, '2017-02-18', '01/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:44:04', '2018-07-27 02:44:04', '0945295777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, 'Nguyễn Thị Nhị', 'May Tiến Thắng', 9, 16, NULL, 13, '2017-03-15', '10/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:45:11', '2018-07-27 02:45:11', '0935458858', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, 'Nguyễn Thị Kim Sơn', 'Quán cơm Sơn', 9, 15, NULL, 7, '2017-03-28', '11/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:46:18', '2018-07-27 02:46:18', '0938476559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, 'Trương Thị Ngọc Bích', 'Cafe Minsk', 9, 19, NULL, 10, '2017-06-30', '33/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:47:27', '2018-07-27 02:47:27', '01228599711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, 'Nguyễn Thị Thu Hà', 'TH số 1 Hoà Tiến', 9, 16, NULL, 8, '2017-11-01', '59/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:48:42', '2018-07-27 02:48:42', '02363879383', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, 'Nguyễn Thị Thu Thảo', 'Cafe Anh Thư', 9, 19, NULL, 7, '2017-11-21', '65/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:49:58', '2018-07-27 02:49:58', '0906401268', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, 'Trần Ngọc Thái', 'Cafe Anh Thư 2', 9, 19, NULL, 3, '2017-11-21', '66/2017/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:51:17', '2018-07-27 02:51:17', '0935606045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, 'Đặng Minh Đức', 'Quán bê thui Mạnh', 9, 15, NULL, 3, '2018-02-02', '05/2018/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:52:23', '2018-07-27 02:52:23', '01229558798', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, 'Đặng Thị Đỡ', 'Quán A Sinh', 9, 15, NULL, 7, '2018-04-20', '17/2018/ATTP-CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:53:25', '2018-07-27 02:53:25', '0905730486', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, 'Lê Hồng Cảnh', 'Quán 3 Cảnh', 9, 15, NULL, 7, '2018-04-27', '19/2018/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:54:33', '2018-07-27 02:54:33', '0941955990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, 'Lê Thị Kháng', 'Quán bún Kháng', 9, 15, NULL, 6, '2018-04-27', '21/2018/ATTP_CNĐK', NULL, NULL, NULL, NULL, NULL, '2018-07-27 02:55:30', '2018-07-27 02:55:30', '02363798097', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, 'Nguyễn thi lai', 'Nguyễn thi lai', 1, 5, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 09:48:51', '2018-08-12 09:48:51', '905950245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, 'Nuyễn Thị Luyến', 'Nuyễn Thị Luyến', 1, 5, NULL, 13, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 09:48:51', '2018-08-12 09:48:51', '1226219079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, 'Đặng Thị Hồng,lê Thị Ánh Hồng', 'Đặng Thị Hồng,lê Thị Ánh Hồng', 1, 5, NULL, 9, '2017-04-15', NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 09:48:51', '2018-08-12 09:48:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, 'Nguyễn Hữu Liêu', 'Nguyễn Hữu Liêu', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, 'Ngô Thị Tín', 'Ngô Thị Tín', 3, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, 'Ngô Ngọc Trà', 'Ngô Ngọc Trà', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 'Ngô Ngọc Ái', 'Ngô Ngọc Ái', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, 'Ngô Ngọc Lượng', 'Ngô Ngọc Lượng', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, 'Phan Thị Liên', 'Phan Thị Liên', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, 'Nguyễn Hữu Dân', 'Nguyễn Hữu Dân', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, 'Ngô Văn Hiệp', 'Ngô Văn Hiệp', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, 'Ngô Ngọc Bán', 'Ngô Ngọc Bán', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, 'Nguyễn Thị Gia', 'Nguyễn Thị Gia', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, 'Nguyễn Thị Mau', 'Nguyễn Thị Mau', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, 'Ngô Ngọc Hường', 'Ngô Ngọc Hường', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, 'Nguyễn Chất', 'Nguyễn Chất', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 'Ngô Văn Trà', 'Ngô Văn Trà', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 'Phan Bé', 'Phan Bé', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 'Ngô Văn Mua', 'Ngô Văn Mua', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 'Ngô Trường Mẹo', 'Ngô Trường Mẹo', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 'Phan Hùng', 'Phan Hùng', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, 'Ngô Ngọc Đông', 'Ngô Ngọc Đông', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 'Nguyễn Hữu Khôi', 'Nguyễn Hữu Khôi', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 'Ngô Ngọc Dàn', 'Ngô Ngọc Dàn', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, 'Trần Trị', 'Trần Trị', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, 'Ngô Thành Phước', 'Ngô Thành Phước', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 'Nguyễn Văn Thông', 'Nguyễn Văn Thông', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 'Võ Thị Nguyệt', 'Võ Thị Nguyệt', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, 'Ngô Trường Sinh', 'Ngô Trường Sinh', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 'Huỳnh Văn Hùng', 'Huỳnh Văn Hùng', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 'Ngô Minh Hùng', 'Ngô Minh Hùng', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 'Huỳnh Thị Thuận', 'Huỳnh Thị Thuận', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 'Huỳnh Thị Hà', 'Huỳnh Thị Hà', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 'Ngô Trường Lung', 'Ngô Trường Lung', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 'Ngô Thị Mỹ', 'Ngô Thị Mỹ', 3, 12, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Lò mổ xã Hòa Tiến', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 'Lê Hồng Anh', 'Lê Hồng Anh', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 'Đặng Thị Hòa', 'Đặng Thị Hòa', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, 'Lê Hội', 'Lê Hội', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, 'Lê Sang', 'Lê Sang', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 'Lê Thì', 'Lê Thì', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 'Đặng Lư', 'Đặng Lư', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'Đặng Hưng Bình', 'Đặng Hưng Bình', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 'Lê Bình ( hoàng)', 'Lê Bình ( hoàng)', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 'Lê Bình ( thôi)', 'Lê Bình ( thôi)', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 'Đặng Văn Quáng', 'Đặng Văn Quáng', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 'Đặng Nghiêu', 'Đặng Nghiêu', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 'Lê Văn Sơn', 'Lê Văn Sơn', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 'Lê Thị Tân', 'Lê Thị Tân', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 'Lê Thị Thụy', 'Lê Thị Thụy', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 'Đặng Thị Đây', 'Đặng Thị Đây', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, 'Đặng Hân', 'Đặng Hân', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, 'Đặng Văn Hữu', 'Đặng Văn Hữu', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, 'Lê Hữu Lịch', 'Lê Hữu Lịch', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 'Lê Văn Phước', 'Lê Văn Phước', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, 'Đặng Văn Thiệu', 'Đặng Văn Thiệu', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 'Đặng Văn Trình', 'Đặng Văn Trình', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, 'Đặng Văn  Lập', 'Đặng Văn  Lập', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, 'Lê Đương', 'Lê Đương', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, 'Lê Văn Tiên', 'Lê Văn Tiên', 3, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, 'Đặng Thị Tựu', 'Đặng Thị Tựu', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Bán tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, 'Nguyễn Xin', 'Nguyễn Xin', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(353, 'Đặng Văn Toàn', 'Đặng Văn Toàn', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, 'Nguyễn Minh Tâm', 'Nguyễn Minh Tâm', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, 'Phạm Rô', 'Phạm Rô', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, 'Phạm Văn Tiến', 'Phạm Văn Tiến', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, 'Đặng Văn Quân', 'Đặng Văn Quân', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(358, 'Nguyễn Thị Hạnh', 'Nguyễn Thị Hạnh', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, 'Võ Văn Phi Hùng', 'Võ Văn Phi Hùng', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(360, 'Nguyễn Tư', 'Nguyễn Tư', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, 'Võ Lai', 'Võ Lai', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(362, 'Đặng Văn Quốc', 'Đặng Văn Quốc', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(363, 'Đặng Ký', 'Đặng Ký', 3, 12, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(364, 'Lê Văn Côi', 'Lê Văn Côi', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(365, 'Lê Bi', 'Lê Bi', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(366, 'Đặng Thành Lành', 'Đặng Thành Lành', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(367, 'Lê Văn Công', 'Lê Văn Công', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(368, 'Lê Thị Mai', 'Lê Thị Mai', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(369, 'Nguyễn Phú Cư', 'Nguyễn Phú Cư', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(370, 'Lê Xuân Hoàng', 'Lê Xuân Hoàng', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(371, 'Võ Hạnh', 'Võ Hạnh', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(372, 'Phạm Xê', 'Phạm Xê', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(373, 'Lê Văn Cứ', 'Lê Văn Cứ', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(374, 'Ngô Thành Trung', 'Ngô Thành Trung', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(375, 'Đặng Minh Đức', 'Đặng Minh Đức', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(376, 'Nguyễn Bá Lợi', 'Nguyễn Bá Lợi', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(377, 'Võ Thiện Phúc', 'Võ Thiện Phúc', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(378, 'Phan Thị Hà', 'Phan Thị Hà', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(379, 'Nguyễn Hòa', 'Nguyễn Hòa', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(380, 'Lê Văn Than', 'Lê Văn Than', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(381, 'Lê Văn Lý', 'Lê Văn Lý', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(382, 'Lê Văn Hùng', 'Lê Văn Hùng', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(383, 'Lê Học', 'Lê Học', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(384, 'Lê Thị Thơm', 'Lê Thị Thơm', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(385, 'Lê Văn Mười', 'Lê Văn Mười', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(386, 'Nguyễn Thị Ánh Tuyết', 'Nguyễn Thị Ánh Tuyết', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, 'Nguyễn Hữu Hổ', 'Nguyễn Hữu Hổ', 3, 12, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, 'Nguyễn Thị Mai', 'Nguyễn Thị Mai', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(389, 'Phạm Văn Tơi', 'Phạm Văn Tơi', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(390, 'Phan Thị Lựu', 'Phan Thị Lựu', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(391, 'Nguyễn Văn Nhiên', 'Nguyễn Văn Nhiên', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(392, 'Lý Thị Hoa', 'Lý Thị Hoa', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(393, 'Nguyễn văn Chức', 'Nguyễn văn Chức', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(394, 'Nguyễn Tiến Phong', 'Nguyễn Tiến Phong', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, 'Nguyễn Văn Hùng', 'Nguyễn Văn Hùng', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, 'Nguyễn Văn Ba', 'Nguyễn Văn Ba', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, 'Huỳnh Tấn Trớ', 'Huỳnh Tấn Trớ', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(398, 'Nguyễn Thị Xí', 'Nguyễn Thị Xí', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(399, 'Trần Đình Quế', 'Trần Đình Quế', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(400, 'Nguyễn Văn Cúc', 'Nguyễn Văn Cúc', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(401, 'Nguyễn Văn Xạ', 'Nguyễn Văn Xạ', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(402, 'Trần Đình Chiêm', 'Trần Đình Chiêm', 3, 12, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(403, 'Đặng Thống', 'Đặng Thống', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(404, 'Nguyễn Thị Thu', 'Nguyễn Thị Thu', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(405, 'Đặng Thị Ngân Hạnh', 'Đặng Thị Ngân Hạnh', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(406, 'Trương Sinh', 'Trương Sinh', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(407, 'Đặng Cúc', 'Đặng Cúc', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(408, 'Trương Xí', 'Trương Xí', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, 'Trần Văn Hiệu', 'Trần Văn Hiệu', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, 'Nguyễn Đức Liên', 'Nguyễn Đức Liên', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, 'Đặng Thô', 'Đặng Thô', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(412, 'Nguyễn Mười', 'Nguyễn Mười', 3, 12, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, 'Nguyễn Thanh Sơn', 'Nguyễn Thanh Sơn', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(414, 'Nguyễn Kim Hoàng', 'Nguyễn Kim Hoàng', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Không xác định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(415, 'Nguyễn Văn Thướt', 'Nguyễn Văn Thướt', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(416, 'Nguyễn Văn Sô', 'Nguyễn Văn Sô', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(417, 'Nguyễn Văn Quảng', 'Nguyễn Văn Quảng', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(418, 'Nguyễn Thêm', 'Nguyễn Thêm', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(419, 'Nguyễn Văn Mực', 'Nguyễn Văn Mực', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(420, 'Nguyễn Nga', 'Nguyễn Nga', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(421, 'Nguyễn Văn Tài', 'Nguyễn Văn Tài', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(422, 'Nguyễn Trường', 'Nguyễn Trường', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(423, 'Nguyễn Ngọc Hoàng', 'Nguyễn Ngọc Hoàng', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(424, 'Nguyễn Văn Trình', 'Nguyễn Văn Trình', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(425, 'Nguyễn văn Trường', 'Nguyễn văn Trường', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Thương lái tự do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(426, 'Nguyễn Văn Do', 'Nguyễn Văn Do', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(427, 'Nguyễn Thị Cúc', 'Nguyễn Thị Cúc', 3, 12, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(428, 'Huỳnh Hùng', 'Huỳnh Hùng', 3, 12, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(429, 'Lê Tuất', 'Lê Tuất', 3, 12, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(430, 'Đặng Thị Thảo', 'Đặng Thị Thảo', 3, 12, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(431, 'Đặng Văn Cư', 'Đặng Văn Cư', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(432, 'Nguyễn Thị Sinh', 'Nguyễn Thị Sinh', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(433, 'Đặng Mại', 'Đặng Mại', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(434, 'Đinh Thị Kim Quy', 'Đinh Thị Kim Quy', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(435, 'Hồ Phi Nghĩa', 'Hồ Phi Nghĩa', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(436, 'Đặng Thị Xuân', 'Đặng Thị Xuân', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(437, 'Lê Văn Hà', 'Lê Văn Hà', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `food_safeties` (`id`, `ten_chu_co_so`, `ten_co_so`, `category_id`, `categoryb2_id`, `address`, `village_id`, `certification_date`, `so_cap`, `ngay_kham_suc_khoe`, `ngay_ky_cam_ket`, `ngay_xac_nhan_hien_thuc`, `ngay_kiem_tra_2`, `ngay_kiem_tra_3`, `created_at`, `updated_at`, `phone`, `noi_tieu_thu`, `ket_qua_kiem_tra_1`, `ket_qua_kiem_tra_2`, `ket_qua_kiem_tra_3`, `ghi_chu_1`, `ghi_chu_2`, `ghi_chu_3`, `hinh_thuc_xu_phat_1`, `hinh_thuc_xu_phat_2`, `hinh_thuc_xu_phat_3`) VALUES
(438, 'Nguyễn Văn Hùng', 'Nguyễn Văn Hùng', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(439, 'Đặng Hiệp', 'Đặng Hiệp', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(440, 'Đặng cẩm', 'Đặng cẩm', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(441, 'Nguyễn Phát', 'Nguyễn Phát', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(442, 'Đặng Thị Châu', 'Đặng Thị Châu', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:05', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(443, 'Đặng Xí', 'Đặng Xí', 3, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:05', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(444, 'Lê Hữu Diệu', 'Lê Hữu Diệu', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(445, 'Đặng Thành Đáng', 'Đặng Thành Đáng', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(446, 'Đặng Thị Phương', 'Đặng Thị Phương', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(447, 'Đặng Diệt', 'Đặng Diệt', 3, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(448, 'Đặng Hồng', 'Đặng Hồng', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(449, 'Phan Văn Châu', 'Phan Văn Châu', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(450, 'Phạm Thuận', 'Phạm Thuận', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(451, 'Phạm Lại', 'Phạm Lại', 3, 12, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(452, 'Nguyễn Thị Minh', 'Nguyễn Thị Minh', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(453, 'Nguyễn Thị Hạnh', 'Nguyễn Thị Hạnh', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(454, 'Nguyễn Ta', 'Nguyễn Ta', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(455, 'Nguyễn Thị Điền', 'Nguyễn Thị Điền', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(456, 'Nguyễn Văn Phi', 'Nguyễn Văn Phi', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(457, 'Trần Đình Hiền', 'Trần Đình Hiền', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(458, 'Nguyễn Thị Chiến', 'Nguyễn Thị Chiến', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(459, 'Nguyễn Văn Chiến', 'Nguyễn Văn Chiến', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(460, 'Nguyễn Văn Tương', 'Nguyễn Văn Tương', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(461, 'Trần Thị Liên', 'Trần Thị Liên', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(462, 'Nguyễn Dõng', 'Nguyễn Dõng', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(463, 'Huỳnh Tra', 'Huỳnh Tra', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(464, 'Nguyễn Phú Nễ', 'Nguyễn Phú Nễ', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(465, 'Trần Thị Sách', 'Trần Thị Sách', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(466, 'Trần Toàn', 'Trần Toàn', 3, 12, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(467, 'Nguyễn Hoanh', 'Nguyễn Hoanh', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(468, 'Nguyễn Thị Chơn', 'Nguyễn Thị Chơn', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(469, 'Nguyễn Văn Lý', 'Nguyễn Văn Lý', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(470, 'Nguyễn Mính', 'Nguyễn Mính', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(471, 'Đặng Thị Lý', 'Đặng Thị Lý', 3, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(472, 'Đặng Thị Nhị', 'Đặng Thị Nhị', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(473, 'Trần Thị Ba', 'Trần Thị Ba', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(474, 'Nguyễn Thị Hảo', 'Nguyễn Thị Hảo', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(475, 'Đặng thị Ái', 'Đặng thị Ái', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(476, 'Nguyễn Thị Hương', 'Nguyễn Thị Hương', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(477, 'Đặng Thị Đích', 'Đặng Thị Đích', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(478, 'Hứa Thị A', 'Hứa Thị A', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các lò mổ xã Hòa Tiến\nchợ túy loan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(479, 'Võ Thị Bườn', 'Võ Thị Bườn', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(480, 'Đinh Thị Phong', 'Đinh Thị Phong', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(481, 'Nguyễn Thị Mua', 'Nguyễn Thị Mua', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(482, 'Nguyễn Thị Đãi', 'Nguyễn Thị Đãi', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(483, 'Nguyễn Thị Đáng', 'Nguyễn Thị Đáng', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(484, 'Nguyễn THị Hiệu', 'Nguyễn THị Hiệu', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Túy Loan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(485, 'Đặng Gang', 'Đặng Gang', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Chợ Lệ Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(486, 'Đặng Thị Thử', 'Đặng Thị Thử', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(487, 'Lê Thị Tuyết', 'Lê Thị Tuyết', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(488, 'Bùi Thị Nghĩa', 'Bùi Thị Nghĩa', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(489, 'Phan Thị Song', 'Phan Thị Song', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(490, 'Nguyễn Thị Nghiệp', 'Nguyễn Thị Nghiệp', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(491, 'Nguyễn Thị Xuân', 'Nguyễn Thị Xuân', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(492, 'Nguyễn Thị Thông', 'Nguyễn Thị Thông', 3, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(493, 'Nguyễn Thị Thông', 'Nguyễn Thị Thông', 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(494, 'Nguyễn Thị Trúc', 'Nguyễn Thị Trúc', 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(495, 'Nguyễn Thị Hưng', 'Nguyễn Thị Hưng', 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(496, 'Nguyễn Thị Ngôn', 'Nguyễn Thị Ngôn', 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(497, 'Đặng Thị Hảo', 'Đặng Thị Hảo', 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(498, 'Bùi Thị Cường', 'Bùi Thị Cường', 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(499, 'Đặng Nhì', 'Đặng Nhì', 3, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(500, 'Đặng Thị Kim Oanh', 'Đặng Thị Kim Oanh', 3, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(501, 'Đặng Ngân', 'Đặng Ngân', 3, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-12 10:39:06', '2018-08-12 10:39:06', NULL, 'Các chợ tại địa phương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(502, 'Cơ sở Tân Vinh', 'Cơ sở Tân Vinh', 9, 15, NULL, NULL, '2016-02-17', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-18 09:09:24', '2019-05-18 09:09:24', '905889606', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(504, 'Cơ sở TEST 1', 'Cơ sở TEST 1', 9, 25, NULL, 14, '2016-02-17', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-18 09:23:13', '2019-05-18 09:23:13', '905889606', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(505, 'Bánh mỳ TEST 2', 'Bánh mỳ TEST 2', 9, 25, NULL, 14, '2016-03-11', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-18 09:23:13', '2019-05-18 09:23:13', '3788619', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(507, 'phạm thị chữ', 'nhóm trẻ gia đình quỳnh linh', 1, 6, NULL, NULL, NULL, NULL, '2018-12-10', NULL, NULL, NULL, NULL, '2019-05-27 07:56:35', '2019-05-27 07:56:35', '0000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(508, 'đặng thị ngọc ánh', 'nhóm trẻ ngọc ánh', 1, 6, NULL, 16, NULL, NULL, '2018-12-07', NULL, NULL, NULL, NULL, '2019-05-27 08:14:06', '2019-05-27 08:14:06', '0762884939', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(510, 'Nguyễn Thị Bốn', 'Quán cơm Bốn', 1, 5, NULL, 15, '2019-12-06', NULL, '2019-01-01', NULL, NULL, NULL, NULL, '2019-05-28 02:09:07', '2019-05-28 02:10:02', '0707439089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(511, 'nguyễn thị hoa', 'quán bún', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 02:59:39', '2019-05-28 02:59:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(512, 'nguyễn thị hoa', 'quán bún', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 02:59:40', '2019-05-28 02:59:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(514, 'nguyễn thị lan', 'quán bún', 1, 5, NULL, 29, NULL, NULL, NULL, '2017-06-03', NULL, NULL, NULL, '2019-05-28 03:08:34', '2019-05-28 03:08:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(515, 'ngô thị hoài phương', 'bánh canh', 1, 5, NULL, 29, NULL, NULL, NULL, '2017-11-02', NULL, NULL, NULL, '2019-05-28 03:19:21', '2019-05-28 03:19:21', '0905911945', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(516, 'dương thị kim', 'quán bún', 1, 5, NULL, 30, NULL, NULL, NULL, '2017-06-03', NULL, NULL, NULL, '2019-05-28 03:22:09', '2019-05-28 03:22:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(517, 'Hồ Thị Cúc', 'Quán Chị Bảy', 1, 5, NULL, 28, '2017-03-29', NULL, '2018-09-29', '2018-06-04', NULL, NULL, NULL, '2019-05-29 03:08:21', '2019-05-29 07:54:57', '0906.457.626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(518, 'nguyễn Thị Phương', 'dịch vụ bán trú Phương', 1, 26, NULL, 15, '2018-03-08', '35/2018', '2018-11-01', NULL, NULL, NULL, NULL, '2019-05-29 07:12:48', '2019-05-29 07:12:48', '0935854732', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(519, 'Lê Thị Vân', 'Quán Cháo Lòng', 1, 5, NULL, 28, '2017-03-29', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-29 08:02:54', '2019-05-29 08:02:54', '0935.451.039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(520, 'Phạm Thị Hường', 'Quán Bún Mỳ', 1, 5, NULL, 28, '2017-03-29', NULL, '2018-05-29', '2017-03-29', NULL, NULL, NULL, '2019-05-29 08:04:46', '2019-05-29 08:04:46', '0782.118.447', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(521, 'Mai Thị Trinh Thúy', 'Quán Bún', 1, 5, NULL, 28, '2017-03-29', NULL, '2018-03-22', '2018-03-22', NULL, NULL, NULL, '2019-05-29 08:06:35', '2019-05-29 08:06:35', '0935.132.752', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(522, 'Võ Thị Mười', 'Quán Bún Mỳ', 1, 5, NULL, 28, '2017-03-29', NULL, '2018-05-29', '2017-04-17', NULL, NULL, NULL, '2019-05-29 08:08:04', '2019-05-29 08:08:04', '0799.072.775', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(523, 'Nguyễn Thị Thảo', 'Quán Nhậu', 1, 5, NULL, 28, '2017-03-29', NULL, NULL, '2017-05-17', NULL, NULL, NULL, '2019-05-29 08:10:22', '2019-05-29 08:10:22', '0935.251.406', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(524, 'Trần Thị Mực', 'Quán Bún Mỳ', 1, 5, NULL, 28, '2017-06-06', NULL, '2018-05-29', '2017-02-17', NULL, NULL, NULL, '2019-05-29 08:45:36', '2019-05-29 08:45:36', '0906.455.243', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(525, 'Nguyễn Thị Diễm', 'Quán Bún Mỳ', 1, 5, NULL, 28, NULL, NULL, NULL, '2017-05-17', NULL, NULL, NULL, '2019-05-29 08:46:47', '2019-05-29 08:46:47', '036.7676.882', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(526, 'nguyễn Thị Ngọc Lan', 'Quán Bún', 1, 5, NULL, 28, NULL, NULL, '2018-05-29', '2018-06-04', NULL, NULL, NULL, '2019-05-29 08:48:32', '2019-05-29 08:48:32', '0988.789.539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(527, 'Mai Thị Xuân Hương', 'Quán Bánh Mỳ', 1, 5, NULL, 28, NULL, NULL, '2018-04-20', '2018-10-27', NULL, NULL, NULL, '2019-05-29 08:49:46', '2019-05-29 08:49:46', '0976.180.355', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(528, 'trần Thị Trang', 'Quán Bún Mỳ', 1, 5, NULL, 28, NULL, NULL, '2018-05-29', '2018-03-23', NULL, NULL, NULL, '2019-05-29 08:51:00', '2019-05-29 08:51:00', '0935.530.874', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(529, 'Nguyễn Văn Quốc', 'Quán Nhậu', 1, 5, NULL, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 08:51:31', '2019-05-29 08:51:31', '0905.700.715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(530, 'Bùi Thị Hồng Diễm', 'Quán Bún Mỳ', 1, 5, NULL, 28, '2019-05-09', NULL, '2019-02-21', '2019-02-21', NULL, NULL, NULL, '2019-05-29 08:52:35', '2019-05-29 14:57:14', '0705.985.884', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(532, 'huỳnh thị ngũ', 'mỳ quãng', 1, 5, NULL, 33, NULL, NULL, NULL, '2017-07-07', NULL, NULL, NULL, '2019-05-29 14:08:48', '2019-05-29 14:08:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(534, 'nguyễn thị hoa', 'quán bún', 1, 5, NULL, 29, NULL, NULL, NULL, '2017-06-03', NULL, NULL, NULL, '2019-05-29 14:12:20', '2019-05-29 14:12:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(535, 'hồ thị nhì', 'mỳ quãng', 1, 5, NULL, 30, NULL, NULL, NULL, '2017-06-03', NULL, NULL, NULL, '2019-05-29 14:14:36', '2019-05-29 14:14:36', '0122818011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(536, 'đặng thị cúc', 'quán bún', 1, 5, NULL, 30, NULL, NULL, NULL, '2017-06-03', NULL, NULL, NULL, '2019-05-29 14:18:44', '2019-05-29 14:18:44', '0905403501', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(537, 'huỳnh thị thùy trang', 'mỳ quãng', 1, 5, NULL, 30, NULL, NULL, NULL, '2018-05-24', NULL, NULL, NULL, '2019-05-29 14:21:46', '2019-05-29 14:21:46', '0905292193', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(538, 'nguyễn thị trang tuấn', 'quán bún', 1, 5, NULL, 35, NULL, NULL, NULL, '2017-03-09', NULL, NULL, NULL, '2019-05-29 14:25:50', '2019-05-29 14:25:50', '0963232323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(539, 'mai thị hoa', 'quán bún', 1, 5, NULL, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 14:27:47', '2019-05-29 14:27:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(540, 'lương thị kim ân', 'quán bún', 1, 5, NULL, 30, NULL, NULL, NULL, '2017-03-09', NULL, NULL, NULL, '2019-05-29 14:30:31', '2019-05-29 14:30:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(541, 'lê thị lợi', 'bánh canh', 1, 5, NULL, 29, NULL, NULL, NULL, '2016-11-01', NULL, NULL, NULL, '2019-05-29 14:32:07', '2019-05-29 14:32:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(542, 'phan thị thủy', 'mỳ quãng', 1, 5, NULL, 30, NULL, NULL, NULL, '2017-08-07', NULL, NULL, NULL, '2019-05-29 14:35:08', '2019-05-29 14:35:08', '0362544612', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(543, 'đổ thị trang', 'quán nhậu', 1, 5, NULL, 29, NULL, NULL, NULL, '2018-09-24', NULL, NULL, NULL, '2019-05-29 14:39:00', '2019-05-29 14:39:00', '0975132374', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(544, 'nguyễn thị gái', 'gỏi cá', 1, 5, NULL, 29, NULL, NULL, NULL, '2017-05-18', NULL, NULL, NULL, '2019-05-29 14:43:12', '2019-05-29 14:43:12', '0905572921', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(545, 'nguyễn thị hoa', 'quán bún', 1, 5, NULL, 31, NULL, NULL, NULL, '2017-05-11', NULL, NULL, NULL, '2019-05-29 14:44:14', '2019-05-29 14:44:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(546, 'trần thị một', 'cháo chơ', 1, 5, NULL, 29, NULL, NULL, NULL, '2018-03-08', NULL, NULL, NULL, '2019-05-29 14:46:15', '2019-05-29 14:46:15', '0387859300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(547, 'Dương thị hiền', 'quán bún', 1, 5, NULL, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 14:47:23', '2019-05-29 14:52:37', '0905729198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(549, 'trần thị huệ', 'cháo lòng', 1, 5, NULL, 29, NULL, NULL, NULL, '2018-03-08', NULL, NULL, NULL, '2019-05-29 14:48:08', '2019-05-29 14:48:08', '0777660058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(550, 'trần thị ngọc hạnh', 'quán bún', 1, 5, NULL, 29, NULL, NULL, NULL, '2017-05-25', NULL, NULL, NULL, '2019-05-29 14:49:21', '2019-05-29 14:49:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(551, 'mai thị tuyết nhung', 'nhóm trẻ', 1, 6, NULL, 30, NULL, NULL, NULL, '2017-06-03', NULL, NULL, NULL, '2019-05-29 14:52:55', '2019-05-29 14:52:55', '0935575174', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(552, 'nguyễn thị hoa', 'dịch vụ hoa', 1, 7, NULL, 30, NULL, NULL, NULL, '2016-10-06', NULL, NULL, NULL, '2019-05-29 14:56:11', '2019-05-29 14:56:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(553, 'nguyễn thị lan', 'dịch vụ lan', 1, 7, NULL, 30, NULL, NULL, NULL, '2016-10-06', NULL, NULL, NULL, '2019-05-29 14:57:59', '2019-05-29 14:57:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(554, 'nguyễn thị lệ hoa', 'dịch vụ hoa', 1, 7, NULL, 30, NULL, NULL, NULL, '2016-10-06', NULL, NULL, NULL, '2019-05-29 14:59:18', '2019-05-29 14:59:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(555, 'trần thế lực', 'dịch vụ lực', 1, 5, NULL, 29, NULL, NULL, NULL, '2017-02-23', NULL, NULL, NULL, '2019-05-29 15:00:44', '2019-05-29 15:00:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(556, 'phan thị tường', 'bánh mỳ', 1, 4, NULL, 29, NULL, NULL, NULL, '2017-07-07', NULL, NULL, NULL, '2019-05-29 15:03:22', '2019-05-29 15:03:22', '0354728922', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(557, 'trần thị em', 'bánh mỳ', 1, 4, NULL, 29, NULL, NULL, NULL, '2017-07-07', NULL, NULL, NULL, '2019-05-29 15:04:28', '2019-05-29 15:04:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(558, 'trương thị nê', 'bánh mỳ', 1, 4, NULL, 29, NULL, NULL, NULL, '2017-05-18', NULL, NULL, NULL, '2019-05-29 15:05:24', '2019-05-29 15:05:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(559, 'Mai Thị Băng Tâm', 'Quán Bún Mỳ', 1, 5, NULL, 28, '2019-03-29', NULL, NULL, '2019-03-22', NULL, NULL, NULL, '2019-05-29 15:05:27', '2019-05-29 15:05:27', '0935371413', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(560, 'Phạm Thị Thúy', 'Quán Bún Mỳ', 1, 5, NULL, 50, '2017-06-06', NULL, '2018-08-20', '2017-05-17', NULL, NULL, NULL, '2019-05-29 15:14:15', '2019-05-29 15:14:15', '0782543310', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(561, 'Đặng Thị Thôi', 'Quán Bún Mỳ', 1, 5, NULL, 50, '2017-06-21', NULL, '2018-05-29', '2018-06-04', NULL, NULL, NULL, '2019-05-29 15:20:31', '2019-05-29 15:20:31', '0796568973', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(562, 'Nguyễn Thanh', 'Quán Bún Mỳ', 1, 5, NULL, 50, '2017-06-19', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-29 15:25:04', '2019-05-29 15:25:04', '0389357165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(563, 'Bùi thị Phúc', 'Quán Bún ,bánh bèo', 1, 5, NULL, 50, '2017-04-01', NULL, '2018-05-19', '2017-05-17', NULL, NULL, NULL, '2019-05-29 15:46:22', '2019-05-29 15:46:22', '0935333804', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(564, 'Phạm Thị Loan', 'Quán Bún Mỳ', 1, 5, NULL, 50, '2017-04-01', NULL, NULL, '2018-05-17', NULL, NULL, NULL, '2019-05-29 15:51:06', '2019-05-29 15:51:06', '0799049219', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(565, 'Nguyễn Thị TUYẾT', 'Quán Bún Mỳ', 1, 5, NULL, 50, NULL, NULL, NULL, '2018-06-04', NULL, NULL, NULL, '2019-05-29 15:54:51', '2019-05-29 15:54:51', '0707028372', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(566, 'nGUYỄN THỊ sANH', 'Quán Bún Mỳ,Cơm', 1, 5, NULL, 51, NULL, NULL, NULL, '2017-05-17', NULL, NULL, NULL, '2019-05-29 16:00:48', '2019-05-29 16:00:48', '0374420221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(567, 'Nguyễn Thị Chín', 'Quán Bún Mỳ', 1, 5, NULL, 53, '2017-03-29', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-29 16:05:45', '2019-05-29 16:05:45', '0935308805', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(568, 'Lê Thị Thanh Hà', 'Quán Bún, mỳ', 1, 5, NULL, 27, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 08:39:03', '2019-05-30 08:39:03', '0935373494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(569, 'Phạm Thị Sương', 'Quán Bún, bánh ướt', 1, 4, NULL, 24, NULL, NULL, '2018-05-18', '2018-05-18', NULL, NULL, NULL, '2019-05-30 08:54:20', '2019-05-30 09:11:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(570, 'Trần Quang Vĩnh', 'Quán thit Cầy quay', 1, 4, NULL, 27, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 08:57:18', '2019-05-30 08:57:18', '0906541704', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(571, 'Lý Xuân Thịnh', 'Quán Bê thui Đạt', 1, 4, NULL, 24, NULL, NULL, '2018-05-18', '2018-05-18', NULL, NULL, NULL, '2019-05-30 09:09:30', '2019-05-30 09:09:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(572, 'Nguyễn Văn Cường', 'Phở Hương Nam Định', 1, 4, NULL, 27, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 09:15:13', '2019-05-30 09:15:13', '0964990686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(573, 'Nguyễn Thị Thùy Trang', 'Bánh bèo, bún mắm', 1, 4, NULL, 25, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 09:18:31', '2019-05-30 09:18:31', '0773221327', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(574, 'Nguyễn Thị Thu Luyến', 'Quán nhậu Thu Luyến', 1, 4, NULL, 22, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 09:35:09', '2019-05-30 09:35:09', '0798107366', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(575, 'Nguyễn Thị Yến', 'Quán nhậu bình dân', 1, 4, NULL, 27, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 11:16:34', '2019-05-30 11:16:34', '0905631127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(576, 'Nguyễn Thị Hồng Vân', 'Quán cơm Hồng Vân', 1, 4, NULL, 24, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 11:40:57', '2019-05-30 11:40:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(577, 'Nguyễn Thị Uyên Sơn', 'Quán cơm Uyên Sơn', 1, 4, NULL, 24, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 11:50:08', '2019-05-30 11:50:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(578, 'Ngô Thị Sương', 'Quán bún', 1, 4, NULL, 27, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 11:53:56', '2019-05-30 11:53:56', '0935688315', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(579, 'Nguyễn Thị Huệ Linh', 'Quán Bún, bánh canh', 1, 4, NULL, 27, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 11:58:29', '2019-05-30 11:58:29', '0963377078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(580, 'Nguyễn Thị Kim Nhi', 'Cháo vịt', 1, 4, NULL, 27, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 12:03:43', '2019-05-30 12:04:44', '0934994462', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(581, 'Nguyễn Thị Siêng', 'Quán Cháo vịt', 1, 4, NULL, 27, NULL, NULL, '2018-05-18', '2018-05-18', NULL, NULL, NULL, '2019-05-30 12:09:25', '2019-05-31 07:23:04', '0934883825', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(582, 'Phan Thị Nhung', 'Quán bún, mỳ quảng', 1, 4, NULL, 27, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 12:14:09', '2019-05-30 12:14:09', '0905082812', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(583, 'Trần Trung Tín', 'Cháo Dinh dưỡng', 1, 4, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 12:17:45', '2019-05-30 12:17:45', '0795802015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(584, 'Bùi Thị Ly Na', 'Cháo Huyền Trâm', 1, 4, NULL, 27, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 12:20:53', '2019-05-30 12:20:53', '0906552010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(585, 'Nguyễn Thị Thanh Liên', 'Mỳ Quảng', 1, 4, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 12:23:38', '2019-05-30 12:23:38', '0906484060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(586, 'Nguyễn Thị Kim Nin', 'Kim Nin Bánh canh', 1, 4, NULL, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 12:25:45', '2019-05-30 12:25:45', '0934777244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(587, 'Trần Thị Vũ Giang', 'Quán Bún mỳ', 1, 4, NULL, 25, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 12:28:13', '2019-05-30 12:28:13', '0774406861', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(588, 'Nguyễn Nhật Phong', 'Quán Phong Phương Cháo lòng', 1, 4, NULL, 25, NULL, NULL, '2018-05-18', '2018-05-18', NULL, NULL, NULL, '2019-05-30 12:32:51', '2019-05-30 12:32:51', '0764088337', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(589, 'Nguyễn Thị Kim Y', 'Quán nhậu bình dân', 1, 4, NULL, 22, NULL, NULL, '2019-05-21', '2019-05-21', NULL, NULL, NULL, '2019-05-30 12:36:17', '2019-05-30 12:36:17', '0934890947', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(590, 'Võ Thị Kim Chung', 'Quán Bánh Canh', 1, 4, NULL, 27, NULL, NULL, NULL, '2019-05-21', NULL, NULL, NULL, '2019-05-30 12:58:14', '2019-05-30 12:58:14', '0898242581', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(591, 'Đặng ThịThôi', 'quán bún, mỳ', 1, 5, NULL, 50, '2017-06-21', NULL, '2018-05-29', '2019-05-29', NULL, NULL, NULL, '2019-05-31 01:14:12', '2019-05-31 01:14:12', '0796568973', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(592, 'Nguyễn Thanh', 'quán bún, mỳ', 1, 5, NULL, 50, '2017-06-19', NULL, '2018-05-29', NULL, NULL, NULL, NULL, '2019-05-31 01:17:25', '2019-05-31 01:17:25', '0389357165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(593, 'Nguyễn Thị Tuyết', 'quán bún, mỳ', 1, 5, NULL, 50, NULL, NULL, NULL, '2018-06-06', NULL, NULL, NULL, '2019-05-31 02:28:07', '2019-05-31 02:28:07', '0707028372', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(594, 'Nguyễn Thị Sanh', 'quán bún, mỳ', 1, 5, NULL, 51, '2017-03-29', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-31 02:34:53', '2019-05-31 02:34:53', '036693085', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(595, 'Nguyễn thị Chín', 'quán bún, mỳ', 1, 5, NULL, 53, '2017-03-29', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-31 02:38:40', '2019-05-31 02:38:40', '0935308805', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(596, 'Nguyễn Thị Bé Hòa', 'quán bún, mỳ', 1, 5, NULL, 53, '2017-05-26', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-31 02:44:12', '2019-05-31 02:44:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(597, 'Trần Thị Nghĩa', 'Quán nhậu', 1, 5, NULL, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:46:31', '2019-05-31 02:46:31', '0935746176', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(598, 'Lê Thị Lý', 'quán bún, mỳ,chè', 1, 5, NULL, 52, '2017-06-06', NULL, '2018-05-29', '2018-05-17', NULL, NULL, NULL, '2019-05-31 03:18:01', '2019-05-31 03:18:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(599, 'Võ Thị Lan Ngọc', 'quán bún, mỳ', 1, 5, NULL, 52, '2017-03-27', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-31 03:24:57', '2019-05-31 03:24:57', '0905674218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(600, 'Lê Thị Sửu', 'quán bún, mỳ', 1, 5, NULL, 52, '2017-03-27', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-31 03:29:25', '2019-05-31 03:29:25', '0772807660', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(601, 'Ngô Trọng Cường', 'quán bún, mỳ', 1, 5, NULL, 52, '2017-03-29', NULL, '2018-05-29', '2017-05-17', NULL, NULL, NULL, '2019-05-31 03:34:14', '2019-05-31 03:34:14', '0796639131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(602, 'nguyễn Thọ', 'Trường TH Hòa Bắc', 9, 16, NULL, 61, '2018-03-01', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:21:58', '2019-05-31 05:43:35', '0905627218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(603, 'Trần Phước Hoàn', 'Trường THCS Nguyễn Tri Phương', 9, 16, NULL, 61, '2018-12-06', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:23:52', '2019-05-31 05:23:52', '02363770213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(604, 'Trương Thị Phương', 'Trường MN Hòa Bắc', 9, 16, NULL, 61, '2018-05-09', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:25:55', '2019-05-31 05:25:55', '0906499684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(605, 'Trương Thị Phương', 'Trường MN Hòa Bắc', 9, 16, NULL, 61, '2018-05-09', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:26:43', '2019-05-31 05:26:43', '0906499684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(606, 'Lâm Thị Hương', 'Trường MN Hòa Châu', 9, 16, NULL, 59, '2018-12-04', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:27:56', '2019-05-31 05:27:56', '02363670036', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(607, 'Ngô Thị Mai', 'Trường TH Hòa Châu', 9, 16, NULL, 59, '2018-02-08', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:30:25', '2019-05-31 05:30:25', '0905111425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(608, 'Ngô Thị Mỹ Lệ', 'Trường MN Hoa Mai', 9, 16, NULL, 59, '2018-10-09', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:38:20', '2019-05-31 05:38:20', '0935535615', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(609, 'Chế Thị Tới', 'Trường MN Hòa Khương', 9, 16, NULL, 57, '2018-08-20', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 05:43:10', '2019-05-31 05:43:10', '0905321625', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(610, 'Võ Thị Kim Chung', 'Bánh canh', 1, 4, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 07:10:08', '2019-05-31 07:10:08', '0898242581', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(611, 'Nguyễn Thị Tường Vi', 'Quán Bún', 1, 4, NULL, 27, '2018-05-18', NULL, '2018-05-18', '2018-05-18', NULL, NULL, NULL, '2019-05-31 07:14:37', '2019-05-31 07:14:37', '0906493870', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(612, 'Trần Thị Vũ Giang', 'Quán Bún, mỳ', 1, 5, NULL, 25, NULL, NULL, '2018-05-18', '2018-05-18', NULL, NULL, NULL, '2019-05-31 07:19:49', '2019-05-31 07:19:49', '0774406881', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_19_165253_create_food_safeties_table', 1),
(4, '2018_05_19_171706_create_villages_table', 2),
(5, '2018_05_19_171936_create_categories_table', 2),
(6, '2018_05_20_141751_update_phone_safety', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Truong Thanh Cong', 'truongthanhcong1909@gmail.com', '$2y$10$zAwmHFBM/1C4uHUfpHUgmOL0yFmMiAjMBZ14YHdYHtxETSsHyqIbu', 'H2fSQYBqrk44LAShA0MbJGC6fW5FhykzmrWEUvq3naXImSAtr3hJirtBTVUf', '2018-05-19 10:14:01', '2018-05-19 10:14:01', 'admin'),
(2, 'Hoa Tien', 'hoatien_attp@gmail.com', '$2y$10$oMGCCJ9So/TaVWAgvBdbCuQq2e21AvgJN32a0J0aMndH2lBRseOSS', 'mcNxD6aXKiKoNbScGhLLAakfdzZZievtG05eEFYhpMpX24UTbucrACZ9FY3v', '2018-07-21 02:19:29', '2018-07-21 02:19:29', '1'),
(3, 'Hòa Sơn', 'hoason_attp@gmail.com', '$2y$10$AzSHGfN6dJqeMBiTRFLw7ut6gP54QmXlqFpliJhqh7JdYHhlAGanu', '4lTXzyucSxnUAfH26UChPRiUzymYF9qzjrOo9DzO3kGv0eEC4N7gSilB8G0c', '2019-05-18 07:38:47', '2019-05-18 07:38:55', '2'),
(4, 'Hòa Phước', 'hoaphuoc_attp@gmail.com', '$2y$10$NDb2akOzLAJBRBXwuQ.uJOsRt.KvO9xw/dug/dRNVWScCIJg1Klbu', NULL, '2019-05-18 07:40:41', '2019-05-18 07:40:55', '3'),
(5, 'Hòa Phú', 'hoaphu_attp@gmail.com', '$2y$10$.eULHr2KL3Mtbuu1fzFlbO7qjokw6seVmHDAqp1rWdBo1Zg.4seOy', '1S2CUZQVF6u1WqTtLoCI2CscrPfIwi0IzpFeRu9W1964A96Hge1NsTVd6CXq', '2019-05-18 07:41:28', '2019-05-18 07:42:15', '4'),
(6, 'Hòa Phong', 'hoaphong_attp@gmail.com', '$2y$10$ekO9izf0XWE/WRUWb9uri.nHGz2bsFVJmd5QfTd/YYgPZ0FWGGtxK', NULL, '2019-05-18 07:41:58', '2019-05-18 07:42:21', '5'),
(7, 'Hòa Ninh', 'hoaninh_attp@gmail.com', '$2y$10$DiIILVd00C8V8yIa2uLkXOGfpqA3KOob8ezT8.uK7HmK9UqnVSQSa', NULL, '2019-05-18 07:42:44', '2019-05-18 07:43:17', '6'),
(8, 'Hòa Nhơn', 'hoanhon_attp@gmail.com', '$2y$10$If093eXLAspbgNdCqEPyJ.ZrkP4z6A6Ir7LN4t3dph0kb//nH6HOq', NULL, '2019-05-18 07:43:09', '2019-05-18 07:43:22', '7'),
(9, 'Hòa Liên', 'hoalien_attp@gmail.com', '$2y$10$z8dNB0schxWV31bBN7AIGuhA0lNwdqLooWVrOA/OM6I9W.S89CxWG', NULL, '2019-05-18 07:43:55', '2019-05-18 07:45:39', '8'),
(10, 'Hòa Khương', 'hoakhuong_attp@gmail.com', '$2y$10$LV3/VBp68TfpVo.cuhfPaeWzXx4RKSUwRxkS6zyFAEjqpSsRgtuky', NULL, '2019-05-18 07:46:00', '2019-05-18 07:47:16', '9'),
(11, 'Hòa Châu', 'hoachau_attp@gmail.com', '$2y$10$h/nBlLXKAVTS6kq0gzN3bexqEJhLFMPuPrZxVHIZWKcdhX2ufAvjO', NULL, '2019-05-18 07:46:28', '2019-05-18 07:47:11', '10'),
(12, 'Hòa Bắc', 'hoabac_attp@gmail.com', '$2y$10$xbJJ2N4IJgUCGpBN8f2r5OwsEQrLZVyi6z2aVGDuvgFpHIxEj7BNW', 'Rlm8TSRy36GoeHCh5B74iNhfwTANeIpaCYE1BrrNI7Cmgg101xRdWmlyktIk', '2019-05-18 07:46:59', '2019-05-18 07:47:07', '11'),
(13, 'Attp Hòa Vang Huyện thực hiện', 'hoavang_attp@gmail.com', '$2y$10$/xKorSVpVqFpVVKYOiK6NuE3rk1Xbj0ZHBoTDlrbrtBQkGKY4sMDC', 'CytygDNx83Rd6w32Vj5qSYLQMsGD4RLDQBUBuhRIkaFv1N9WW9DIJtU3lea0', '2019-05-18 07:57:43', '2019-05-18 07:57:52', '12'),
(14, 'Hòa Vang Huyện quản lí', 'hoavang_huyenquanli@gmail.com', '$2y$10$/e9eOzBqCdvUOVkZ.6080O.y7raTMigF1RD2korSvRfF5DZcKp2ie', '93PtshgJHWQempft2muNtulrymLoJG555NulNx1lcZrcRmkzG1DuIMiC1ufF', '2019-05-18 10:03:27', '2019-05-18 10:03:27', 'hql');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `villages`
--

CREATE TABLE `villages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `villages`
--

INSERT INTO `villages` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Lệ Sơn Nam', 'le-son-nam', 1, '2018-05-19 10:49:55', '2018-05-19 10:49:55'),
(3, 'Lệ Sơn Bắc', 'le-son-bac', 1, '2018-05-23 11:23:33', '2018-05-23 11:23:33'),
(4, 'Nam Sơn', 'nam-son', 1, '2018-06-09 11:02:56', '2018-06-09 11:02:56'),
(5, 'An Trạch', 'an-trach', 1, '2018-06-09 11:03:26', '2018-06-09 11:03:26'),
(6, 'Lệ Sơn 2', 'le-son-2', 1, '2018-06-09 11:03:38', '2018-06-09 11:03:38'),
(7, 'Dương Sơn', 'duong-son', 1, '2018-06-09 11:03:54', '2018-06-09 11:03:54'),
(8, 'Yến Nê 1', 'yen-ne-1', 1, '2018-06-09 11:04:03', '2018-06-09 11:04:03'),
(9, 'Yến Nê 2', 'yen-ne-2', 1, '2018-06-09 11:04:12', '2018-06-09 11:04:12'),
(10, 'Cẩm Nê', 'cam-ne', 1, '2018-06-09 11:04:41', '2018-06-09 11:04:41'),
(11, 'Thạch Bồ', 'thach-bo', 1, '2018-06-09 11:04:55', '2018-06-09 11:04:55'),
(12, 'Bắc An', 'bac-an', 1, '2018-06-09 11:05:13', '2018-06-09 11:05:13'),
(13, 'La Bông', 'la-bong', 1, '2018-06-09 11:05:26', '2018-06-09 11:05:26'),
(14, 'Hoà Khê', 'hoa-khe', 2, '2019-05-18 09:16:41', '2019-05-18 09:16:41'),
(16, 'phước thái', 'phuoc-thai', 7, '2019-05-27 08:00:48', '2019-05-27 08:00:48'),
(18, 'phước hưng', 'phuoc-hung', 7, '2019-05-27 08:11:42', '2019-05-27 08:11:42'),
(21, 'Phú Hạ', 'phu-ha', 2, '2019-05-27 23:42:30', '2019-05-30 08:03:03'),
(22, 'Phú Thượng', 'phu-thuong', 2, '2019-05-27 23:42:53', '2019-05-30 08:02:47'),
(23, 'Tùng Sơn', 'tung-son', 2, '2019-05-27 23:43:21', '2019-05-30 08:02:30'),
(24, 'An Ngãi Tây 1', 'an-ngai-tay-1', 2, '2019-05-27 23:43:45', '2019-05-30 08:02:09'),
(25, 'An Ngãi Tây 2', 'an-ngai-tay-2', 2, '2019-05-27 23:44:06', '2019-05-30 08:01:56'),
(26, 'An Ngãi Tây 3', 'an-ngai-tay-3', 2, '2019-05-27 23:44:26', '2019-05-30 08:01:27'),
(27, 'An Ngãi Đông', 'an-ngai-dong', 2, '2019-05-27 23:44:45', '2019-05-30 08:01:01'),
(28, 'Đông Lâm', 'dong-lam', 4, '2019-05-28 01:44:43', '2019-05-29 03:04:04'),
(29, 'Phò Nam', 'pho-nam', 11, '2019-05-28 02:52:46', '2019-05-28 02:52:46'),
(30, 'Nam Yên', 'nam-yen', 11, '2019-05-28 02:53:08', '2019-05-28 02:53:08'),
(31, 'An Định', 'an-dinh', 11, '2019-05-28 02:53:39', '2019-05-28 02:53:39'),
(32, 'Lộc Mỹ', 'loc-my', 11, '2019-05-28 02:53:57', '2019-05-28 02:53:57'),
(33, 'Nam Mỹ', 'nam-my', 11, '2019-05-28 02:54:25', '2019-05-28 02:54:25'),
(34, 'Giàn Bí', 'gian-bi', 11, '2019-05-28 02:54:40', '2019-05-28 02:54:40'),
(35, 'Tà Lang', 'ta-lang', 11, '2019-05-28 02:54:53', '2019-05-28 02:54:53'),
(36, 'phú sơn Nam', 'phu-son-nam', 9, '2019-05-28 09:42:54', '2019-05-28 09:42:54'),
(37, 'phú sơn 1', 'phu-son-1', 9, '2019-05-28 09:43:18', '2019-05-28 09:43:18'),
(38, 'Phú sơn 2', 'phu-son-2', 9, '2019-05-28 09:43:39', '2019-05-28 09:43:39'),
(39, 'phú sơn 3', 'phu-son-3', 9, '2019-05-28 09:44:00', '2019-05-28 09:44:00'),
(40, 'phú sơn Tây', 'phu-son-tay', 9, '2019-05-28 09:46:06', '2019-05-28 09:46:06'),
(41, 'gò hà', 'go-ha', 9, '2019-05-28 09:46:26', '2019-05-28 09:46:26'),
(42, 'La châu', 'la-chau', 9, '2019-05-28 09:46:42', '2019-05-28 09:46:42'),
(43, 'Hương lam', 'huong-lam', 9, '2019-05-28 09:47:06', '2019-05-28 09:47:06'),
(44, 'Thôn 5', 'thon-5', 9, '2019-05-28 09:47:27', '2019-05-28 09:47:27'),
(45, 'la châu Bắc', 'la-chau-bac', 9, '2019-05-28 09:48:10', '2019-05-28 09:48:10'),
(47, 'Hòa Phước', 'hoa-phuoc', 4, '2019-05-29 03:02:35', '2019-05-29 03:02:35'),
(48, 'An Châu', 'an-chau', 4, '2019-05-29 03:02:52', '2019-05-29 03:02:52'),
(49, 'Hòa Thọ', 'hoa-tho', 4, '2019-05-29 03:03:03', '2019-05-29 03:03:03'),
(50, 'Hòa Hải', 'hoa-hai', 4, '2019-05-29 03:03:15', '2019-05-29 03:03:15'),
(51, 'Phú Túc', 'phu-tuc', 4, '2019-05-29 03:03:27', '2019-05-29 03:03:27'),
(52, 'Hòa Phát', 'hoa-phat', 4, '2019-05-29 03:03:39', '2019-05-29 03:03:39'),
(53, 'Hội Phước', 'hoi-phuoc', 4, '2019-05-29 03:03:49', '2019-05-29 03:03:49'),
(54, 'Hòa Phong', 'hoa-phong', 12, '2019-05-29 07:14:31', '2019-05-29 07:14:31'),
(55, 'Hòa Tiến', 'hoa-tien', 12, '2019-05-29 07:14:49', '2019-05-29 07:14:49'),
(56, 'Hòa Nhơn', 'hoa-nhon', 12, '2019-05-29 07:15:02', '2019-05-29 07:15:02'),
(57, 'Hòa Khương', 'hoa-khuong', 12, '2019-05-29 07:15:14', '2019-05-29 07:15:14'),
(58, 'Hòa Sơn', 'hoa-son', 12, '2019-05-29 07:15:29', '2019-05-29 07:15:29'),
(59, 'Hòa Châu', 'hoa-chau', 12, '2019-05-29 07:15:50', '2019-05-29 07:15:50'),
(60, 'Hòa Ninh', 'hoa-ninh', 12, '2019-05-29 07:16:06', '2019-05-29 07:16:06'),
(61, 'Hòa Bắc', 'hoa-bac', 12, '2019-05-29 07:16:22', '2019-05-29 07:16:22'),
(62, 'Hòa Phú', 'hoa-phu', 12, '2019-05-29 07:16:36', '2019-05-29 07:16:36'),
(63, 'Hòa Phước', 'hoa-phuoc-1', 12, '2019-05-29 07:16:54', '2019-05-29 07:16:54'),
(64, 'Hòa Liên', 'hoa-lien', 12, '2019-05-29 07:17:21', '2019-05-29 07:17:21'),
(66, 'Đại La', 'dai-la', 2, '2019-05-30 07:59:32', '2019-05-30 07:59:32'),
(67, 'Xuân Phú', 'xuan-phu', 2, '2019-05-30 08:00:07', '2019-05-30 08:00:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wards`
--

CREATE TABLE `wards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wards`
--

INSERT INTO `wards` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Hòa Tiến', 'hoa-tien', NULL, '2018-08-12 04:52:27', '2018-08-12 04:52:27'),
(2, 'Hòa Sơn', 'hoa-son', NULL, '2018-08-12 04:52:37', '2018-08-12 04:53:22'),
(3, 'Hòa Phước', 'hoa-phuoc', NULL, '2019-04-06 05:45:06', '2019-04-06 05:45:06'),
(4, 'Hòa Phú', 'hoa-phu', NULL, '2019-04-06 05:46:10', '2019-04-06 05:46:10'),
(5, 'Hòa Phong', 'hoa-phong', NULL, '2019-04-06 05:47:46', '2019-04-06 05:47:46'),
(6, 'Hòa Ninh', 'hoa-ninh', NULL, '2019-04-06 05:48:00', '2019-04-06 05:48:00'),
(7, 'Hòa Nhơn', 'hoa-nhon', NULL, '2019-04-06 05:48:22', '2019-04-06 05:48:22'),
(8, 'Hòa Liên', 'hoa-lien', NULL, '2019-04-06 05:48:34', '2019-04-06 05:48:34'),
(9, 'Hòa Khương', 'hoa-khuong', NULL, '2019-04-06 05:48:51', '2019-04-06 05:48:51'),
(10, 'Hòa Châu', 'hoa-chau', NULL, '2019-04-06 05:49:05', '2019-04-06 05:49:05'),
(11, 'Hòa Bắc', 'hoa-bac', NULL, '2019-04-06 05:49:16', '2019-04-06 05:49:16'),
(12, 'Huyện quản lí', 'huyen-quan-li', NULL, '2019-05-18 07:56:43', '2019-05-18 07:56:43');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `date_checked`
--
ALTER TABLE `date_checked`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food_safeties`
--
ALTER TABLE `food_safeties`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `date_checked`
--
ALTER TABLE `date_checked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `food_safeties`
--
ALTER TABLE `food_safeties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT cho bảng `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
