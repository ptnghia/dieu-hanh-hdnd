-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 21, 2023 lúc 10:51 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `stt` int(11) NOT NULL DEFAULT 0,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten`, `stt`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Đại Biểu Hội Đồng Nhân Dân', 1, 1, '2023-01-25 02:41:48', '2023-01-31 02:14:43'),
(2, 'Cán Bộ VP Đoàn ĐBQH và HĐND', 2, 1, '2023-01-25 02:54:46', '2023-01-25 02:54:46'),
(3, 'Ban thư ký', 3, 1, '2023-01-25 02:56:21', '2023-01-25 02:56:21'),
(4, 'Quản trị web', 4, 1, '2023-01-25 02:57:43', '2023-01-31 02:09:57'),
(8, 'Quản trị hệ thống', 5, 1, '2023-01-26 10:05:15', '2023-01-26 10:05:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_hop`
--

CREATE TABLE `ky_hop` (
  `id` int(11) NOT NULL,
  `ten` text DEFAULT NULL,
  `thoi_gian` date DEFAULT NULL,
  `hinh_thuc` int(11) NOT NULL DEFAULT 0,
  `ly_do` text DEFAULT NULL,
  `dia_diem` text DEFAULT NULL,
  `co_quan` text DEFAULT NULL,
  `noi_dung_hop` text DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ky_hop`
--

INSERT INTO `ky_hop` (`id`, `ten`, `thoi_gian`, `hinh_thuc`, `ly_do`, `dia_diem`, `co_quan`, `noi_dung_hop`, `trang_thai`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI', '2023-03-01', 0, 'Thảo luận về tình hình thực hiện nhiệm vụ kinh tế - xã hội, quốc phòng - an ninh năm 2021 và phương hướng, nhiệm vụ năm 2022', 'Uỷ Ban Nhân Dân Tỉnh Bình Thuận', 'HĐND Tỉnh Bình Thuận', '<p>Nội dung chủ yếu của kỳ họp tập trung thảo luận về t&igrave;nh h&igrave;nh thực hiện nhiệm vụ kinh tế - x&atilde; hội, quốc ph&ograve;ng - an ninh năm 2021 v&agrave; phương hướng, nhiệm vụ năm 2022. Đồng thời, xem x&eacute;t c&aacute;c b&aacute;o c&aacute;o, tờ tr&igrave;nh k&egrave;m dự thảo nghị quyết để ban h&agrave;nh nghị quyết HĐND tỉnh về việc giải quyết kiến nghị của cử tri tại c&aacute;c cuộc tiếp x&uacute;c với những người ứng cử đại biểu HĐND tỉnh kh&oacute;a XI; kết quả gi&aacute;m s&aacute;t c&ocirc;ng t&aacute;c bảo vệ, trồng rừng thay thế tr&ecirc;n địa b&agrave;n tỉnh, giai đoạn 2016 &ndash; 2020; chất vấn, trả lời chất vấn tại kỳ họp thường lệ cuối năm 2021 - HĐND tỉnh kh&oacute;a XI.</p>\r\n\r\n<p>Kỳ họp lần n&agrave;y, HĐND tỉnh cũng xem x&eacute;t c&aacute;c tờ tr&igrave;nh của UBND tỉnh k&egrave;m dự thảo nghị quyết để ban h&agrave;nh Nghị quyết HĐND tỉnh về Kế hoạch ph&aacute;t triển kinh tế - x&atilde; hội năm 2022; Dự to&aacute;n thu, chi ng&acirc;n s&aacute;ch nh&agrave; nước năm 2022; Kế hoạch đầu tư ph&aacute;t triển v&agrave; danh mục c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm của tỉnh năm 2022; Kế hoạch đầu tư c&ocirc;ng trung hạn nguồn vốn ng&acirc;n s&aacute;ch tỉnh v&agrave; danh mục c&aacute;c dự &aacute;n trọng điểm của tỉnh giai đoạn 2021 - 2025. Đồng thời, xem x&eacute;t tờ tr&igrave;nh v&agrave; ban h&agrave;nh nghị quyết HĐND tỉnh về Kế hoạch bi&ecirc;n chế c&ocirc;ng chức, số lượng người l&agrave;m việc hưởng lương từ ng&acirc;n s&aacute;ch trong đơn vị sự nghiệp c&ocirc;ng lập, bi&ecirc;n chế c&aacute;c tổ chức hội năm 2022 của tỉnh B&igrave;nh Thuận&hellip;</p>\r\n\r\n<p>Tại buổi họp b&aacute;o, c&aacute;c cơ quan b&aacute;o ch&iacute; quan t&acirc;m đến một số c&aacute;c nội dung cụ thể của kỳ họp lần 5, nhất l&agrave; phi&ecirc;n chất vấn tại kỳ họp thường lệ cuối năm 2021- HĐND tỉnh kh&oacute;a XI.</p>\r\n\r\n<p>Trong kỳ họp n&agrave;y, Văn ph&ograve;ng Đo&agrave;n ĐBQH v&agrave; HĐND tỉnh cho biết, tất cả c&aacute;c văn bản, t&agrave;i liệu ch&iacute;nh thức phục vụ kỳ họp HĐND tỉnh (trừ c&aacute;c t&agrave;i liệu mật, t&agrave;i liệu về c&ocirc;ng t&aacute;c c&aacute;n bộ thuộc thẩm quyền của HĐND tỉnh v&agrave; t&agrave;i liệu li&ecirc;n quan đến c&ocirc;ng t&aacute;c chất vấn) sẽ được gửi đến c&aacute;c đại biểu tham dự kỳ họp qua m&ocirc;i trường mạng.</p>', 1, 1, '2023-02-21 04:07:33', '2023-02-21 14:39:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_hop_thanh_vien`
--

CREATE TABLE `ky_hop_thanh_vien` (
  `id` int(11) NOT NULL,
  `ky_hop_id` int(11) NOT NULL DEFAULT 0,
  `thu_moi_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `ngay_nhan` datetime DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `them_su_kien` int(11) NOT NULL DEFAULT 0,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_hop_thu_moi`
--

CREATE TABLE `ky_hop_thu_moi` (
  `id` int(11) NOT NULL,
  `ky_hop_id` int(11) NOT NULL DEFAULT 0,
  `so` varchar(200) DEFAULT NULL,
  `dia_diem` text DEFAULT NULL,
  `thoi_gian` date DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `noi_nhan` text DEFAULT NULL,
  `co_quan_ky` text NOT NULL,
  `nguoi_ky` varchar(255) NOT NULL,
  `con_dau` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_hop_van_ban`
--

CREATE TABLE `ky_hop_van_ban` (
  `id` int(11) NOT NULL,
  `ky_hop_id` int(11) NOT NULL DEFAULT 0,
  `file_url` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) DEFAULT NULL,
  `key_file` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ky_hop_van_ban`
--

INSERT INTO `ky_hop_van_ban` (`id`, `ky_hop_id`, `file_url`, `file_name`, `file_ext`, `key_file`, `user_id`) VALUES
(1, 1, 'uploads/files/1676950750_hop-thuong-truc-mo-rong-11.202012.11.2020_07h00p21_signed.pdf', '1676950750_hop-thuong-truc-mo-rong-11.202012.11.2020_07h00p21_signed.pdf', 'pdf', '', 1),
(2, 1, 'uploads/files/1676952325_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', '1676952325_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', 'pdf', '', 1),
(3, 1, 'uploads/files/1676952326_quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346 (1).pdf', '1676952326_quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346 (1).pdf', 'pdf', '', 1),
(4, 1, 'uploads/files/1676952327_thong-bao-79-tb-vpcp073968548098.pdf', '1676952327_thong-bao-79-tb-vpcp073968548098.pdf', 'pdf', '', 1),
(8, 1, 'uploads/files/1676965009_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', '1676965009_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', 'pdf', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_23_023601_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `module_admins`
--

CREATE TABLE `module_admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `module_admins`
--

INSERT INTO `module_admins` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Quản lý chức vụ', 'chuc-vu', 1),
(2, 'Quản lý thành viên', 'thanh-vien', 1),
(3, 'Nhóm quyền', 'nhom-quyen', 1),
(4, 'Chức năng hệ thông', 'module', 1),
(5, 'Văn Bản', 'van-ban', 1),
(6, 'Quản lý kỳ họp HĐND', 'ky-hop', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-menu', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(2, 'user-list', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(3, 'user-create', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(4, 'user-edit', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(5, 'user-delete', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(6, 'role-menu', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(7, 'role-list', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(8, 'role-create', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(9, 'role-edit', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(10, 'role-delete', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(11, 'permission-menu', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(12, 'permission-list', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(13, 'permission-create', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(14, 'permission-edit', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(15, 'permission-delete', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions_group`
--

CREATE TABLE `permissions_group` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions_group`
--

INSERT INTO `permissions_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đại biểu HĐND', '2023-01-30 09:07:40', '2023-01-30 09:07:40'),
(2, 'Cán Bộ VP Đoàn ĐBQH và HĐND', '2023-01-30 09:07:40', '2023-01-30 09:07:40'),
(3, 'Quản trị hệ thống', '2023-01-30 09:09:28', '2023-01-30 09:09:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2023-01-22 19:42:45', '2023-01-22 19:42:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongso_vanban`
--

CREATE TABLE `thongso_vanban` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `id_loai` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongso_vanban`
--

INSERT INTO `thongso_vanban` (`id`, `ten`, `trang_thai`, `id_loai`, `created_at`, `updated_at`) VALUES
(1, 'Loại văn Bản', 1, 0, '2023-02-08 02:24:37', '2023-02-08 02:24:37'),
(2, 'Lĩnh vực', 1, 0, '2023-02-08 02:24:37', '2023-02-08 02:24:37'),
(3, 'Cơ quan ban hành', 1, 0, '2023-02-08 02:25:43', '2023-02-08 02:25:43'),
(10, 'Phiến pháp', 1, 1, '2023-02-19 09:17:37', '2023-02-19 09:17:37'),
(11, 'Văn bản luật', 1, 1, '2023-02-19 09:18:52', '2023-02-19 09:18:52'),
(12, 'Pháp lệnh', 1, 1, '2023-02-19 09:19:03', '2023-02-19 09:19:03'),
(13, 'Nghị định', 1, 1, '2023-02-19 09:19:10', '2023-02-19 09:19:10'),
(14, 'Thông tư', 1, 1, '2023-02-19 09:19:18', '2023-02-19 09:19:18'),
(15, 'Quốc phòng', 1, 2, '2023-02-19 09:26:00', '2023-02-19 09:26:00'),
(16, 'An ninh', 1, 2, '2023-02-19 09:27:26', '2023-02-19 09:27:26'),
(17, 'Giao thông vận tải', 1, 2, '2023-02-19 09:28:10', '2023-02-19 09:28:10'),
(18, 'Ban bí thư', 1, 3, '2023-02-19 09:31:17', '2023-02-19 09:31:17'),
(19, 'Bộ giao thông vận tải', 1, 3, '2023-02-19 09:31:37', '2023-02-19 09:31:37'),
(20, 'Văn phòng chính phủ', 1, 3, '2023-02-19 09:35:41', '2023-02-19 09:35:41'),
(21, 'Bộ tài chính', 1, 3, '2023-02-19 09:35:55', '2023-02-19 09:35:55'),
(23, 'Cải cách hành chính', 1, 2, '2023-02-19 09:38:17', '2023-02-19 09:38:17'),
(24, 'Thông báo', 1, 1, '2023-02-20 07:07:52', '2023-02-20 07:07:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id` int(11) NOT NULL,
  `user_gui` int(11) NOT NULL DEFAULT 0,
  `user_nhan` int(11) NOT NULL DEFAULT 0,
  `loai` int(11) NOT NULL DEFAULT 0 COMMENT '0: thống báo hệ thông, 1:thông báo họp, 2: thông báo khiếu nại, 3: thông báo ý kiến cử tri, 4:thông báo giám sát',
  `ngay_gui` datetime DEFAULT NULL,
  `tieu_de` text NOT NULL,
  `noi_dung` text DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `ngay_xem` datetime DEFAULT NULL,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gioi_tinh` varchar(10) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `dien_thoai` varchar(22) DEFAULT NULL,
  `zalo` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `chuc_vu_id` int(11) NOT NULL DEFAULT 0,
  `ma_so` varchar(50) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gioi_thieu` text DEFAULT NULL,
  `ten_dang_nhap` varchar(50) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1 COMMENT '0: tạm khóa, 1: đang hoạt động',
  `permissions_id` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `dien_thoai`, `zalo`, `email`, `email_verified_at`, `password`, `remember_token`, `chuc_vu_id`, `ma_so`, `hinh_anh`, `gioi_thieu`, `ten_dang_nhap`, `trang_thai`, `permissions_id`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Nam', '1994-05-11', 'Phường Xuân An, Tp Phan Thiết, Tỉnh Bình thuận', '0964091594', '0964091594', 'superadmin@gmail.com', NULL, '$2y$10$9ee9D0/PyUjbHJ9uWQID9O0vHe7UWWQm4iL4gICPaDLOM/TcOWVr6', 'CXIYrCuIoxQ3zgpaqT6fAGR2SXF5mScZeIb0RNqCaHOQ18CG3PPh8dylGq63', 2, NULL, 'uploads/images/1674890227_avatar-1.png', 'Giới thiệu bản thân', NULL, 1, 0, 1, '2023-01-22 19:42:45', '2023-01-28 08:22:43'),
(3, 'Đại Biểu 01', 'Nam', '1990-11-05', '05 Đ.Hải Thượng Lãn Ông, Bình Hưng, Thành phố Phan Thiết, Bình Thuận', '02326586588', '02326586588', 'daibieu01@gmail.com', NULL, '$2y$10$StJfmidySq48NFE6xewhrui2.TVUU40npOG.jusHN.ve/p3H2pfjy', 'jhKLp00jdZOrKSbRb6AooAQ1rbwubvv6NQStHBz9Isuq38do4c0K0EhkM5rc', 1, NULL, 'uploads/images/1674897741_avatar-11.png', NULL, NULL, 1, 1, 0, '2023-01-22 19:53:17', '2023-02-20 08:41:21'),
(4, 'Đại Biểu 01', 'Nam', '1985-10-01', '04 Đ.Hải Thượng Lãn Ông, Bình Hưng, Thành phố Phan Thiết, Bình Thuận', '02326565857', '02326565857', 'daibieu02@gmail.com', NULL, '$2y$10$vtXIRVLQGCVxHa5be7yUquZsFBc1kAPphr7xr2G.949Z0QGALV9PG', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, 0, '2023-01-30 03:13:43', '2023-02-20 08:41:59'),
(5, 'Cán bộ 01', 'Nam', '1980-02-15', 'Phan Thiết', '02223588285', '02223588285', 'canbo01@gmail.com', NULL, '$2y$10$/HLv9Y2EObNynvCjW0DCyO2jkGRw424s7/EYhTbkGxcZy92kXLiHW', NULL, 2, NULL, NULL, NULL, NULL, 1, 2, 0, '2023-02-20 08:43:08', '2023-02-20 08:43:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `van_ban`
--

CREATE TABLE `van_ban` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `so_hieu` varchar(255) DEFAULT NULL,
  `loai_vanban_id` int(11) NOT NULL DEFAULT 0,
  `linh_vuc_id` int(11) NOT NULL DEFAULT 0,
  `coquan_banhanh_id` int(11) NOT NULL DEFAULT 0,
  `hieu_luc` date DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `created_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `van_ban_ct`
--

CREATE TABLE `van_ban_ct` (
  `id` int(11) NOT NULL,
  `van_ban_id` int(11) NOT NULL,
  `file_url` text NOT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) DEFAULT NULL,
  `key_file` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `ky_hop`
--
ALTER TABLE `ky_hop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ky_hop_thanh_vien`
--
ALTER TABLE `ky_hop_thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ky_hop_thu_moi`
--
ALTER TABLE `ky_hop_thu_moi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ky_hop_van_ban`
--
ALTER TABLE `ky_hop_van_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `module_admins`
--
ALTER TABLE `module_admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `permissions_group`
--
ALTER TABLE `permissions_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `thongso_vanban`
--
ALTER TABLE `thongso_vanban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `van_ban`
--
ALTER TABLE `van_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `van_ban_ct`
--
ALTER TABLE `van_ban_ct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ky_hop`
--
ALTER TABLE `ky_hop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ky_hop_thanh_vien`
--
ALTER TABLE `ky_hop_thanh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ky_hop_thu_moi`
--
ALTER TABLE `ky_hop_thu_moi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ky_hop_van_ban`
--
ALTER TABLE `ky_hop_van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `module_admins`
--
ALTER TABLE `module_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `permissions_group`
--
ALTER TABLE `permissions_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thongso_vanban`
--
ALTER TABLE `thongso_vanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `van_ban`
--
ALTER TABLE `van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `van_ban_ct`
--
ALTER TABLE `van_ban_ct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
