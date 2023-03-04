-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 03, 2023 lúc 03:58 PM
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
(1, 'Đại biểu HĐND 01', 1, 1, '2023-01-25 02:41:48', '2023-02-22 02:18:29'),
(2, 'Đại biểu HĐND 02', 2, 1, '2023-01-25 02:54:46', '2023-02-22 02:18:41'),
(3, 'Cán bộ VP Đoàn ĐBQH và HĐND', 3, 1, '2023-01-25 02:56:21', '2023-02-22 02:20:01'),
(4, 'Quản trị hệ thống', 4, 1, '2023-01-25 02:57:43', '2023-02-22 02:20:21');

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
-- Cấu trúc bảng cho bảng `giam_sat`
--

CREATE TABLE `giam_sat` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `noi_dung` text DEFAULT NULL,
  `thoi_gian_star` date DEFAULT NULL,
  `thoi_gian_end` date DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `tb_thanhvien` int(11) NOT NULL DEFAULT 0,
  `tb_lichtrinh` int(11) NOT NULL DEFAULT 0,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giam_sat`
--

INSERT INTO `giam_sat` (`id`, `ten`, `noi_dung`, `thoi_gian_star`, `thoi_gian_end`, `trang_thai`, `tb_thanhvien`, `tb_lichtrinh`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 'Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', '<p>Thực hiện C&ocirc;ng văn số 59-CV/TU, ngày 28/12/2020 của Thường trực Tỉnh ủy về việc ph&ecirc; duyệt nội dung gi&aacute;m s&aacute;t năm 2021 của Ủy ban Mặt trận T&ocirc;̉ quốc Việt Nam và c&aacute;c đoàn th&ecirc;̉ chính trị - xã hội tỉnh; Th&ocirc;ng b&aacute;o số 90/TBMTTQ-BTT, ngày 14/01/2021 của Ban Thường trực Ủy ban MTTQ Việt Nam tỉnh về việc thực hiện c&ocirc;ng t&aacute;c gi&aacute;m s&aacute;t, phản biện xã hội năm 2021, Ban Thường trực Ủy ban MTTQ Việt Nam tỉnh x&acirc;y dựng kế hoạch gi&aacute;m s&aacute;t việc tri&ecirc;̉n khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nh&acirc;n d&acirc;n tỉnh về kết quả gi&aacute;m s&aacute;t việc cấp giấy chứng nhận quyền sử dụng đất và quản l&yacute; sự biến động về đất đai trong giấy chứng nhận đã cấp theo Luật Đất đai năm 2013, cụ th&ecirc;̉ như sau:</p>\r\n\r\n<p><strong>I. MỤC Đ&Iacute;CH, Y&Ecirc;U CẦU</strong></p>\r\n\r\n<p>1. Nhằm đ&aacute;nh gi&aacute; việc chỉ đạo, tri&ecirc;̉n khai, t&ocirc;̉ chức thực hiện, ki&ecirc;̉m tra và hướng dẫn, th&aacute;o gỡ c&aacute;c kh&oacute; khăn, vướng mắc trong việc cấp giấy chứng nhận quyền sử dụng đất và quản l&yacute; sự biến động về đất đai tr&ecirc;n địa bàn huyện đã chỉ ra trong Nghị quyết số 43/NQ-HĐND, ngày 03/12/2020 của HĐND tỉnh.</p>\r\n\r\n<p>2. Th&ocirc;ng qua gi&aacute;m s&aacute;t, kiến nghị cấp ủy và c&aacute;c cơ quan chức năng xử l&yacute; những tồn tại, bất cập li&ecirc;n quan đến c&ocirc;ng t&aacute;c cấp giấy chứng nhận quyền sử dụng đất và quản l&yacute; sự biến động về đất đai tr&ecirc;n địa bàn.</p>\r\n\r\n<p>3. C&ocirc;ng t&aacute;c tri&ecirc;̉n khai gi&aacute;m s&aacute;t bảo đảm đ&uacute;ng quy định ph&aacute;p luật, nghi&ecirc;m t&uacute;c, kh&aacute;ch quan; c&oacute; sự ph&acirc;n c&ocirc;ng, phối hợp chặt chẽ, r&otilde; ràng, ph&ugrave; hợp với điều kiện thực tế và hiệu quả, kh&ocirc;ng làm cản trở đến hoạt động b&igrave;nh thường của t&ocirc;̉ chức và c&aacute; nh&acirc;n được gi&aacute;m s&aacute;t.</p>\r\n\r\n<p>4. Qu&aacute; tr&igrave;nh gi&aacute;m s&aacute;t phải đảm bảo c&aacute;c biện ph&aacute;p ph&ograve;ng chống dịch Covid-19 theo chỉ đạo của Chủ tịch UBND tỉnh và c&aacute;c ngành chức năng.</p>', '2023-02-25', '2023-02-28', 0, 1, 1, 1, '2023-02-23 15:02:02', '2023-02-23 15:06:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_sat_lich_trinh`
--

CREATE TABLE `giam_sat_lich_trinh` (
  `id` int(11) NOT NULL,
  `giam_sat_id` int(11) NOT NULL,
  `ngay` date DEFAULT NULL,
  `gio` time DEFAULT NULL,
  `dia_diem` text DEFAULT NULL,
  `thanh_phan_tham_du` text NOT NULL,
  `giam_sat_nhom_id` int(11) DEFAULT NULL,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giam_sat_lich_trinh`
--

INSERT INTO `giam_sat_lich_trinh` (`id`, `giam_sat_id`, `ngay`, `gio`, `dia_diem`, `thanh_phan_tham_du`, `giam_sat_nhom_id`, `created_user`, `created_at`, `updated_at`) VALUES
(2, 1, '2023-03-05', '13:00:00', 'Buổi chiều từ 13h00 giám sát lại Huyện Tánh Linh', '<p>Mời c&aacute;c l&atilde;nh đạo HĐND x&atilde;, thị trấn</p>\r\n\r\n<p>Mời c&aacute;c đồng ch&iacute; l&atilde;nh đạo UBNND</p>\r\n\r\n<p>C&ocirc;ng chức địa ch&iacute;nh - n&ocirc;ng nghiệp - x&acirc;y dựng - m&ocirc;i trường phụ tr&aacute;ch c&ocirc;ng t&aacute;c moi trường, c&ocirc;ng chức t&agrave;i ch&iacute;nh - kế to&aacute;n, c&ocirc;ng chức văn ph&ograve;ng - thống k&ecirc;</p>', 1, 1, '2023-02-26 02:24:35', '2023-03-02 04:26:26'),
(3, 1, '2023-03-06', '08:08:00', 'Buổi sáng từ 8h00 giám sát tại Huyện Hàm Thuận nam', '<p>Mời c&aacute;c l&atilde;nh đạo HĐND x&atilde;, thị trấn</p>\r\n\r\n<p>Mời c&aacute;c đồng ch&iacute; l&atilde;nh đạo UBNND</p>\r\n\r\n<p>C&ocirc;ng chức địa ch&iacute;nh - n&ocirc;ng nghiệp - x&acirc;y dựng - m&ocirc;i trường phụ tr&aacute;ch c&ocirc;ng t&aacute;c moi trường, c&ocirc;ng chức t&agrave;i ch&iacute;nh - kế to&aacute;n, c&ocirc;ng chức văn ph&ograve;ng - thống k&ecirc;</p>', 1, 5, '2023-03-02 07:09:03', '2023-03-02 07:09:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_sat_nhom`
--

CREATE TABLE `giam_sat_nhom` (
  `id` int(11) NOT NULL,
  `giam_sat_id` int(11) NOT NULL DEFAULT 0,
  `ten` varchar(255) DEFAULT NULL,
  `nhiem_vu` text DEFAULT NULL,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giam_sat_nhom`
--

INSERT INTO `giam_sat_nhom` (`id`, `giam_sat_id`, `ten`, `nhiem_vu`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tổ công tác số 1', 'Tổ chức làm việc trực tiếp với UBND thành phố Thuận\nAn, thị xã Bến Cát, huyện Bàu Bàng và 02 đơn vị cấp xã của từng huyện, thị xã, thành phố', 1, '2023-02-24 08:01:48', '2023-02-24 09:20:18'),
(3, 1, 'Tổ công tác số 2', 'Tổ chức làm việc trực tiếp với UBND thành phố Dĩ An, huyện Phú Giáo, Dầu Tiếng và 02 đơn vị cấp xã của từng huyện, thành phố', 1, '2023-02-25 07:55:16', '2023-02-25 07:55:16'),
(4, 1, 'Tổ công tác số 3', 'Tổ chức làm việc trực tiếp với UBND thành phố Dĩ An, huyện Phú Giáo, Dầu Tiếng và 02 đơn vị cấp xã của từng huyện, thành phố', 1, '2023-02-25 07:56:46', '2023-02-25 07:56:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_sat_noi_dung`
--

CREATE TABLE `giam_sat_noi_dung` (
  `id` int(11) NOT NULL,
  `giam_sat_id` int(11) NOT NULL DEFAULT 0,
  `thanh_vien_id` int(11) NOT NULL DEFAULT 0,
  `giam_sat_noi_dung` text DEFAULT NULL,
  `giam_sat_ket_qua` text DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_sat_noi_dung_van_ban`
--

CREATE TABLE `giam_sat_noi_dung_van_ban` (
  `id` int(11) NOT NULL,
  `giam_sat_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `ten` text DEFAULT NULL,
  `file_url` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) DEFAULT NULL,
  `key_file` varchar(200) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giam_sat_noi_dung_van_ban`
--

INSERT INTO `giam_sat_noi_dung_van_ban` (`id`, `giam_sat_id`, `user_id`, `ten`, `file_url`, `file_name`, `file_ext`, `key_file`, `type`) VALUES
(1, 1, 3, 'quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346', 'uploads/files/quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346-1677747898.pdf', 'quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346-1677747898.pdf', 'pdf', NULL, 1),
(2, 1, 3, 'quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346 (1)', 'uploads/files/quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346_(1)-1677751157.pdf', 'quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346_(1)-1677751157.pdf', 'pdf', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_sat_thanh_vien`
--

CREATE TABLE `giam_sat_thanh_vien` (
  `id` int(11) NOT NULL,
  `giam_sat_id` int(11) NOT NULL DEFAULT 0,
  `giam_sat_nhom_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `vai_tro` int(11) NOT NULL COMMENT '0: Thành viên, 1 thư ký, 2 tổ trưởng, 3 nhóm trưởng',
  `ngay_nhan` date DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `them_su_kien` int(11) NOT NULL DEFAULT 0,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giam_sat_thanh_vien`
--

INSERT INTO `giam_sat_thanh_vien` (`id`, `giam_sat_id`, `giam_sat_nhom_id`, `user_id`, `vai_tro`, `ngay_nhan`, `trang_thai`, `them_su_kien`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 1, NULL, 1, 0, 1, '2023-02-25 03:10:53', '2023-02-25 03:10:53'),
(4, 1, 1, 5, 3, NULL, 1, 0, 1, '2023-02-25 07:48:45', '2023-02-25 07:48:45'),
(5, 1, 1, 3, 0, NULL, 1, 0, 5, '2023-03-01 03:37:05', '2023-03-01 03:37:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_sat_vanban`
--

CREATE TABLE `giam_sat_vanban` (
  `id` int(11) NOT NULL,
  `giam_sat_id` int(11) NOT NULL DEFAULT 0,
  `ten` text DEFAULT NULL,
  `file_url` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) NOT NULL,
  `key_file` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giam_sat_vanban`
--

INSERT INTO `giam_sat_vanban` (`id`, `giam_sat_id`, `ten`, `file_url`, `file_name`, `file_ext`, `key_file`, `user_id`) VALUES
(1, 1, 'Kế hoạch giám sát', 'uploads/files/Ke_hoach_giam_sat-1677164520.pdf', 'Ke_hoach_giam_sat-1677164520.pdf', 'pdf', '', 1),
(2, 1, 'Thông báo lịch trình giám sát', 'uploads/files/Thong_bao_lich_trinh_giam_sat-1677164773.doc', 'Thong_bao_lich_trinh_giam_sat-1677164773.doc', 'doc', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieu_nai`
--

CREATE TABLE `khieu_nai` (
  `id` int(11) NOT NULL,
  `chu_de_id` int(11) NOT NULL DEFAULT 0,
  `tieu_de` text NOT NULL,
  `noi_dung_khieu_nai` text DEFAULT NULL,
  `noi_dung_tra_loi` text DEFAULT NULL,
  `user_gui_id` int(11) NOT NULL DEFAULT 0,
  `ngay_khieu_nai` date DEFAULT NULL,
  `user_traloi_id` int(11) NOT NULL DEFAULT 0,
  `ngay_tra_loi` date DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0 COMMENT '0: chưa xem, 1 đã xem - đang xử lý, 2 đã trả lời',
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khieu_nai`
--

INSERT INTO `khieu_nai` (`id`, `chu_de_id`, `tieu_de`, `noi_dung_khieu_nai`, `noi_dung_tra_loi`, `user_gui_id`, `ngay_khieu_nai`, `user_traloi_id`, `ngay_tra_loi`, `trang_thai`, `created_user`, `created_at`, `updated_at`) VALUES
(2, 2, 'Khiếu nại vấn đề sả thải gây ô nhiễm môi trường', '<p>Thời hiệu&nbsp;<strong>khởi kiện</strong>&nbsp;về m&ocirc;i trường được t&iacute;nh từ thời điểm tổ chức, c&aacute; nh&acirc;n bị thiệt hại ph&aacute;t hiện được thiệt hại do h&agrave;nh vi vi phạm ph&aacute;p luật về m&ocirc;i trường của tổ chức, c&aacute; nh&acirc;n kh&aacute;c.</p>\r\n\r\n<p>Cơ quan nh&agrave; nước, người c&oacute; thẩm quyền nhận được đơn khiếu nại, tố c&aacute;o c&oacute; tr&aacute;ch nhiệm xem x&eacute;t, giải quyết theo quy định của ph&aacute;p luật.</p>\r\n\r\n<p>Trường hợp cần thiết, thanh tra bảo vệ m&ocirc;i trường c&aacute;c cấp, UBND cấp huyện c&oacute; tr&aacute;ch nhiệm gi&uacute;p đỡ, phối hợp với UBND cấp x&atilde; kiểm tra, thanh tra về bảo vệ m&ocirc;i trường đối với tổ chức, c&aacute; nh&acirc;n c&oacute; vi phạm nghi&ecirc;m trọng ph&aacute;p luật về bảo vệ m&ocirc;i trường</p>', '<p>Giải quy&ecirc;́t v&acirc;́n đ&ecirc;̀ khi&ecirc;́u nại, t&ocirc;́ cáo, đ&ecirc;̀ nghị, ki&ecirc;́n nghị phản ánh trong thi hành án d&acirc;n sự lu&ocirc;n là việc l&agrave;m hết sức cần thiết v&agrave; kịp thời. căn cứ Th&ocirc;ng tư s&ocirc;́ 02/2016/TT-BTP ngày 01/02/2016 của B&ocirc;̣ Tư pháp ban hành quy định v&ecirc;̀ &ldquo;Quy trình giải quy&ecirc;́t đơn khi&ecirc;́u nại, t&ocirc;́ cáo, đ&ecirc;̀ nghị, ki&ecirc;́n nghị, phản ánh trong thi hành án d&acirc;n sự&rdquo; có hi&ecirc;̣u lực ngày 16/3/2016, nội dung Th&ocirc;ng tư này gồm các n&ocirc;̣i dung cơ bản như sau: Phạm vi đi&ecirc;̀u chỉnh và đ&ocirc;́i tượng áp dụng; nguy&ecirc;n tắc xử lý và ph&acirc;n loại đơn; quy định v&ecirc;̀ khi&ecirc;́u nại; quy định v&ecirc;̀ giải quy&ecirc;́t đơn t&ocirc;́ cáo, quy định v&ecirc;̀ ph&ocirc;́i hợp trong xử lý, rà soát, ph&acirc;n loại vụ vi&ecirc;̣c khi&ecirc;́u nại, t&ocirc;́ cáo phức tạp, t&ocirc;̀n đọng kéo dài và ch&ecirc;́ đ&ocirc;̣ báo cáo th&ocirc;́ng k&ecirc; qua đó góp ph&acirc;̀n đảm bảo quy&ecirc;̀n và lợi ích hợp pháp của các cơ quan, t&ocirc;̉ chức, cá nh&acirc;n, người có quy&ecirc;̀n lợi, nghĩa vụ li&ecirc;n quan đ&ecirc;́n vi&ecirc;̣c thi hành án d&acirc;n sự.</p>', 1, '2023-02-26', 1, '2023-02-27', 2, 1, '2023-02-26 14:13:59', '2023-02-27 02:16:23'),
(3, 1, 'Tố cáo vấn đề đua xe gây rối trật tự', '<p>Trong thời gian qua, lực lượng Cảnh s&aacute;t giao th&ocirc;ng n&oacute;i ri&ecirc;ng v&agrave; lực lượng C&ocirc;ng an n&oacute;i chung đ&atilde; ph&aacute;t hiện, ngăn chặn, xử l&yacute; nhiều nh&oacute;m đối tượng c&oacute; h&agrave;nh vi đua xe tr&aacute;i ph&eacute;p, g&acirc;y rối trật tự c&ocirc;ng cộng, điển h&igrave;nh C&ocirc;ng an Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; tỉnh Tiền Giang đ&atilde; khởi tố 2 vụ, 16 đối tượng với tội danh tổ chức, đua xe tr&aacute;i ph&eacute;p; C&ocirc;ng an th&agrave;nh phố H&agrave; Nội, Th&agrave;nh phố Hồ Ch&iacute; Minh, tỉnh Tiền Giang đ&atilde; khởi tố 3 vụ, 37 đối tượng với tội danh g&acirc;y rối trật tự c&ocirc;ng cộng...</p>\r\n\r\n<p>Tuy nhi&ecirc;n thời gian gần đ&acirc;y tại một số địa phương t&igrave;nh trạng thanh thiếu ni&ecirc;n tụ tập đua xe, g&acirc;y mất trật tự c&ocirc;ng cộng, mất an to&agrave;n giao th&ocirc;ng diễn biến kh&aacute; phức tạp, đặc biệt trong thời gian n&agrave;y l&agrave; thời điểm diễn ra c&aacute;c trận đấu b&oacute;ng đ&aacute; của Đội tuyển Việt Nam tại v&ograve;ng loại World Cup 2022 khu vực ch&acirc;u &Aacute;; giải v&ocirc; địch b&oacute;ng đ&aacute; ch&acirc;u &Acirc;u&hellip;</p>\r\n\r\n<p>Do đ&oacute;, Bộ C&ocirc;ng an chỉ đạo lực lượng C&ocirc;ng an to&agrave;n quốc cần x&acirc;y dựng kế hoạch, quy chế phối hợp, kế hoạch phối hợp để thực hiện đồng bộ c&aacute;c biện ph&aacute;p nghiệp vụ để xử l&yacute;, chặn đứng t&igrave;nh trạng đua xe tr&aacute;i ph&eacute;p.</p>\r\n\r\n<p>Trong đ&oacute;, Cục Cảnh s&aacute;t giao th&ocirc;ng phối hợp với C&ocirc;ng an c&aacute;c tỉnh, th&agrave;nh phố x&aacute;c định thống nhất c&aacute;c cụm tuyến, địa b&agrave;n li&ecirc;n tỉnh c&oacute; nguy cơ xảy ra đua xe tr&aacute;i ph&eacute;p để x&acirc;y dựng kế hoạch, phương &aacute;n, quy chế phối hợp giữa C&ocirc;ng an c&aacute;c tỉnh nhằm ph&ograve;ng ngừa, ngăn chặn, xử l&yacute; c&oacute; hiệu quả nạn đua xe tr&aacute;i ph&eacute;p. Kiểm tra, đ&ocirc;n đốc, hướng dẫn C&ocirc;ng an c&aacute;c đơn vị, địa phương triển khai thực hiện.</p>', '<p>Tuy nhi&ecirc;n thời gian gần đ&acirc;y tại một số địa phương t&igrave;nh trạng thanh thiếu ni&ecirc;n tụ tập đua xe, g&acirc;y mất trật tự c&ocirc;ng cộng, mất an to&agrave;n giao th&ocirc;ng diễn biến kh&aacute; phức tạp, đặc biệt trong thời gian n&agrave;y l&agrave; thời điểm diễn ra c&aacute;c trận đấu b&oacute;ng đ&aacute; của Đội tuyển Việt Nam tại v&ograve;ng loại World Cup 2022 khu vực ch&acirc;u &Aacute;; giải v&ocirc; địch b&oacute;ng đ&aacute; ch&acirc;u &Acirc;u&hellip;</p>\r\n\r\n<p>Do đ&oacute;, Bộ C&ocirc;ng an chỉ đạo lực lượng C&ocirc;ng an to&agrave;n quốc cần x&acirc;y dựng kế hoạch, quy chế phối hợp, kế hoạch phối hợp để thực hiện đồng bộ c&aacute;c biện ph&aacute;p nghiệp vụ để xử l&yacute;, chặn đứng t&igrave;nh trạng đua xe tr&aacute;i ph&eacute;p.</p>\r\n\r\n<p>Trong đ&oacute;, Cục Cảnh s&aacute;t giao th&ocirc;ng phối hợp với C&ocirc;ng an c&aacute;c tỉnh, th&agrave;nh phố x&aacute;c định thống nhất c&aacute;c cụm tuyến, địa b&agrave;n li&ecirc;n tỉnh c&oacute; nguy cơ xảy ra đua xe tr&aacute;i ph&eacute;p để x&acirc;y dựng kế hoạch, phương &aacute;n, quy chế phối hợp giữa C&ocirc;ng an c&aacute;c tỉnh nhằm ph&ograve;ng ngừa, ngăn chặn, xử l&yacute; c&oacute; hiệu quả nạn đua xe tr&aacute;i ph&eacute;p. Kiểm tra, đ&ocirc;n đốc, hướng dẫn C&ocirc;ng an c&aacute;c đơn vị, địa phương triển khai thực hiện.</p>\r\n\r\n<p>Trong đ&oacute;, Cục Cảnh s&aacute;t giao th&ocirc;ng phối hợp với C&ocirc;ng an c&aacute;c tỉnh, th&agrave;nh phố x&aacute;c định thống nhất c&aacute;c cụm tuyến, địa b&agrave;n li&ecirc;n tỉnh c&oacute; nguy cơ xảy ra đua xe tr&aacute;i ph&eacute;p để x&acirc;y dựng kế hoạch, phương &aacute;n, quy chế phối hợp giữa C&ocirc;ng an c&aacute;c tỉnh nhằm ph&ograve;ng ngừa, ngăn chặn, xử l&yacute; c&oacute; hiệu quả nạn đua xe tr&aacute;i ph&eacute;p. Kiểm tra, đ&ocirc;n đốc, hướng dẫn C&ocirc;ng an c&aacute;c đơn vị, địa phương triển khai thực hiện.</p>', 3, '2023-03-02', 5, '2023-03-03', 2, 3, '2023-03-02 14:54:34', '2023-03-03 04:04:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieu_nai_chu_de`
--

CREATE TABLE `khieu_nai_chu_de` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khieu_nai_chu_de`
--

INSERT INTO `khieu_nai_chu_de` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Trật tự - an ninh xã hội', '2023-02-26 13:35:19', '2023-02-26 13:35:19'),
(2, 'Môi trường', '2023-02-26 13:36:14', '2023-02-26 13:36:14'),
(3, 'Hành chính - dân sự', '2023-02-26 13:37:26', '2023-02-26 13:37:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieu_nai_theo_doi`
--

CREATE TABLE `khieu_nai_theo_doi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `khieu_nai_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khieu_nai_theo_doi`
--

INSERT INTO `khieu_nai_theo_doi` (`id`, `user_id`, `khieu_nai_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2023-03-03 10:50:46', '2023-03-03 10:50:46'),
(2, 3, 3, '2023-03-03 10:50:58', '2023-03-03 10:50:58'),
(3, 5, 2, '2023-03-03 10:52:59', '2023-03-03 10:52:59'),
(4, 5, 3, '2023-03-03 10:53:02', '2023-03-03 10:53:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieu_nai_van_ban`
--

CREATE TABLE `khieu_nai_van_ban` (
  `id` int(11) NOT NULL,
  `khieu_nai_id` int(11) NOT NULL DEFAULT 0,
  `ten` text DEFAULT NULL,
  `file_url` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) DEFAULT NULL,
  `key_file` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khieu_nai_van_ban`
--

INSERT INTO `khieu_nai_van_ban` (`id`, `khieu_nai_id`, `ten`, `file_url`, `file_name`, `file_ext`, `key_file`, `user_id`) VALUES
(2, 2, 'Đơn khiếu nại vấn đề ô nhiễm môi trường', 'uploads/files/Don_khieu_nai_van_de_o_nhiem_moi_truong-1677420750.pdf', 'Don_khieu_nai_van_de_o_nhiem_moi_truong-1677420750.pdf', 'pdf', '', 1),
(3, 3, 'nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316', 'uploads/files/nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316-1677768869.pdf', 'nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316-1677768869.pdf', 'pdf', '', 3);

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
(1, 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI', '2023-03-01', 0, 'Thảo luận về tình hình thực hiện nhiệm vụ kinh tế - xã hội, quốc phòng - an ninh năm 2021 và phương hướng, nhiệm vụ năm 2022', 'Uỷ Ban Nhân Dân Tỉnh Bình Thuận', 'HĐND Tỉnh Bình Thuận', '<p><span style=\\\"font-family:Times New Roman,Times,serif\\\"><span style=\\\"font-size:16px\\\">Nội dung chủ yếu của kỳ họp tập trung thảo luận về t&igrave;nh h&igrave;nh thực hiện nhiệm vụ kinh tế - x&atilde; hội, quốc ph&ograve;ng - an ninh năm 2021 v&agrave; phương hướng, nhiệm vụ năm 2022. Đồng thời, xem x&eacute;t c&aacute;c b&aacute;o c&aacute;o, tờ tr&igrave;nh k&egrave;m dự thảo nghị quyết để ban h&agrave;nh nghị quyết HĐND tỉnh về việc giải quyết kiến nghị của cử tri tại c&aacute;c cuộc tiếp x&uacute;c với những người ứng cử đại biểu HĐND tỉnh kh&oacute;a XI; kết quả gi&aacute;m s&aacute;t c&ocirc;ng t&aacute;c bảo vệ, trồng rừng thay thế tr&ecirc;n địa b&agrave;n tỉnh, giai đoạn 2016 &ndash; 2020; chất vấn, trả lời chất vấn tại kỳ họp thường lệ cuối năm 2021 - HĐND tỉnh kh&oacute;a XI.</span></span></p>\r\n\r\n<p><span style=\\\"font-family:Times New Roman,Times,serif\\\"><span style=\\\"font-size:16px\\\">Kỳ họp lần n&agrave;y, HĐND tỉnh cũng xem x&eacute;t c&aacute;c tờ tr&igrave;nh của UBND tỉnh k&egrave;m dự thảo nghị quyết để ban h&agrave;nh Nghị quyết HĐND tỉnh về Kế hoạch ph&aacute;t triển kinh tế - x&atilde; hội năm 2022; Dự to&aacute;n thu, chi ng&acirc;n s&aacute;ch nh&agrave; nước năm 2022; Kế hoạch đầu tư ph&aacute;t triển v&agrave; danh mục c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm của tỉnh năm 2022; Kế hoạch đầu tư c&ocirc;ng trung hạn nguồn vốn ng&acirc;n s&aacute;ch tỉnh v&agrave; danh mục c&aacute;c dự &aacute;n trọng điểm của tỉnh giai đoạn 2021 - 2025. Đồng thời, xem x&eacute;t tờ tr&igrave;nh v&agrave; ban h&agrave;nh nghị quyết HĐND tỉnh về Kế hoạch bi&ecirc;n chế c&ocirc;ng chức, số lượng người l&agrave;m việc hưởng lương từ ng&acirc;n s&aacute;ch trong đơn vị sự nghiệp c&ocirc;ng lập, bi&ecirc;n chế c&aacute;c tổ chức hội năm 2022 của tỉnh B&igrave;nh Thuận&hellip;</span></span></p>\r\n\r\n<p><span style=\\\"font-family:Times New Roman,Times,serif\\\"><span style=\\\"font-size:16px\\\">Tại buổi họp b&aacute;o, c&aacute;c cơ quan b&aacute;o ch&iacute; quan t&acirc;m đến một số c&aacute;c nội dung cụ thể của kỳ họp lần 5, nhất l&agrave; phi&ecirc;n chất vấn tại kỳ họp thường lệ cuối năm 2021- HĐND tỉnh kh&oacute;a XI.</span></span></p>\r\n\r\n<p><span style=\\\"font-family:Times New Roman,Times,serif\\\"><span style=\\\"font-size:16px\\\">Trong kỳ họp n&agrave;y, Văn ph&ograve;ng Đo&agrave;n ĐBQH v&agrave; HĐND tỉnh cho biết, tất cả c&aacute;c văn bản, t&agrave;i liệu ch&iacute;nh thức phục vụ kỳ họp HĐND tỉnh (trừ c&aacute;c t&agrave;i liệu mật, t&agrave;i liệu về c&ocirc;ng t&aacute;c c&aacute;n bộ thuộc thẩm quyền của HĐND tỉnh v&agrave; t&agrave;i liệu li&ecirc;n quan đến c&ocirc;ng t&aacute;c chất vấn) sẽ được gửi đến c&aacute;c đại biểu tham dự kỳ họp qua m&ocirc;i trường mạng.</span></span></p>', 1, 1, '2023-02-21 04:07:33', '2023-02-28 14:48:18'),
(2, 'Kỳ họp thứ 6 - HĐND tỉnh Bình Thuận , khóa XI', '2023-03-20', 1, 'Thảo luận về tình hình thực hiện nhiệm vụ kinh tế - xã hội, quốc phòng - an ninh năm 2023', 'Uỷ Ban Nhân Dân Tỉnh Bình Thuận', 'HĐND Tỉnh Bình Thuận', '<p>Nội dung chủ yếu của kỳ họp tập trung thảo luận về t&igrave;nh h&igrave;nh thực hiện nhiệm vụ kinh tế - x&atilde; hội, quốc ph&ograve;ng - an ninh năm 2021 v&agrave; phương hướng, nhiệm vụ năm 2022. Đồng thời, xem x&eacute;t c&aacute;c b&aacute;o c&aacute;o, tờ tr&igrave;nh k&egrave;m dự thảo nghị quyết để ban h&agrave;nh nghị quyết HĐND tỉnh về việc giải quyết kiến nghị của cử tri tại c&aacute;c cuộc tiếp x&uacute;c với những người ứng cử đại biểu HĐND tỉnh kh&oacute;a XI; kết quả gi&aacute;m s&aacute;t c&ocirc;ng t&aacute;c bảo vệ, trồng rừng thay thế tr&ecirc;n địa b&agrave;n tỉnh, giai đoạn 2016 &ndash; 2020; chất vấn, trả lời chất vấn tại kỳ họp thường lệ cuối năm 2021 - HĐND tỉnh kh&oacute;a XI.</p>\r\n\r\n<p>Kỳ họp lần n&agrave;y, HĐND tỉnh cũng xem x&eacute;t c&aacute;c tờ tr&igrave;nh của UBND tỉnh k&egrave;m dự thảo nghị quyết để ban h&agrave;nh Nghị quyết HĐND tỉnh về Kế hoạch ph&aacute;t triển kinh tế - x&atilde; hội năm 2022; Dự to&aacute;n thu, chi ng&acirc;n s&aacute;ch nh&agrave; nước năm 2022; Kế hoạch đầu tư ph&aacute;t triển v&agrave; danh mục c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm của tỉnh năm 2022; Kế hoạch đầu tư c&ocirc;ng trung hạn nguồn vốn ng&acirc;n s&aacute;ch tỉnh v&agrave; danh mục c&aacute;c dự &aacute;n trọng điểm của tỉnh giai đoạn 2021 - 2025. Đồng thời, xem x&eacute;t tờ tr&igrave;nh v&agrave; ban h&agrave;nh nghị quyết HĐND tỉnh về Kế hoạch bi&ecirc;n chế c&ocirc;ng chức, số lượng người l&agrave;m việc hưởng lương từ ng&acirc;n s&aacute;ch trong đơn vị sự nghiệp c&ocirc;ng lập, bi&ecirc;n chế c&aacute;c tổ chức hội năm 2022 của tỉnh B&igrave;nh Thuận&hellip;</p>\r\n\r\n<p>Tại buổi họp b&aacute;o, c&aacute;c cơ quan b&aacute;o ch&iacute; quan t&acirc;m đến một số c&aacute;c nội dung cụ thể của kỳ họp lần 5, nhất l&agrave; phi&ecirc;n chất vấn tại kỳ họp thường lệ cuối năm 2021- HĐND tỉnh kh&oacute;a XI.</p>\r\n\r\n<p>Trong kỳ họp n&agrave;y, Văn ph&ograve;ng Đo&agrave;n ĐBQH v&agrave; HĐND tỉnh cho biết, tất cả c&aacute;c văn bản, t&agrave;i liệu ch&iacute;nh thức phục vụ kỳ họp HĐND tỉnh (trừ c&aacute;c t&agrave;i liệu mật, t&agrave;i liệu về c&ocirc;ng t&aacute;c c&aacute;n bộ thuộc thẩm quyền của HĐND tỉnh v&agrave; t&agrave;i liệu li&ecirc;n quan đến c&ocirc;ng t&aacute;c chất vấn) sẽ được gửi đến c&aacute;c đại biểu tham dự kỳ họp qua m&ocirc;i trường mạng.</p>', 1, 5, '2023-02-27 15:36:58', '2023-02-27 22:36:58');

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

--
-- Đang đổ dữ liệu cho bảng `ky_hop_thanh_vien`
--

INSERT INTO `ky_hop_thanh_vien` (`id`, `ky_hop_id`, `thu_moi_id`, `user_id`, `ngay_nhan`, `trang_thai`, `them_su_kien`, `created_user`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 4, '2023-02-22 15:11:34', 0, 0, 1, '2023-02-22 08:11:34', '2023-02-22 08:11:34'),
(6, 1, 1, 3, '2023-02-22 15:57:44', 1, 1, 1, '2023-02-22 08:57:44', '2023-02-22 08:57:44'),
(7, 1, 1, 5, '2023-03-02 20:58:48', 1, 1, 5, '2023-03-02 13:58:48', '2023-03-02 13:58:48');

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
  `co_quan_ky` text DEFAULT NULL,
  `nguoi_ky` varchar(255) DEFAULT NULL,
  `con_dau` varchar(255) DEFAULT NULL,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ky_hop_thu_moi`
--

INSERT INTO `ky_hop_thu_moi` (`id`, `ky_hop_id`, `so`, `dia_diem`, `thoi_gian`, `noi_dung`, `noi_nhan`, `co_quan_ky`, `nguoi_ky`, `con_dau`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 1, '06/GM-HĐND', 'Bình Thuận', '2023-02-22', '<p>Để chuẩn bị c&aacute;c nội dung, x&acirc;y dựng chương tr&igrave;nh kỳ họp thứ 13, HĐND huyện kh&oacute;a XX, HĐND huyện tổ chức cuộc họp Thường trực HĐND huyện mở rộng, cụ thể như sau:</p>\r\n\r\n<p><strong>1. Th&agrave;nh phần:</strong></p>\r\n\r\n<p>- Thường trực HĐND huyện;</p>\r\n\r\n<p>- Đại diện L&atilde;nh đạo UBND huyện;</p>\r\n\r\n<p>- Đại diện Uỷ ban MTTQ Việt Nam huyện Tuần Gi&aacute;o;</p>\r\n\r\n<p>- Đại diện Ban Kinh tế - X&atilde; hội; Ban Ph&aacute;p chế; Ban D&acirc;n tộc HĐND huyện;</p>\r\n\r\n<p>- Đại diện L&atilde;nh đạo Viện kiểm s&aacute;t nh&acirc;n d&acirc;n huyện Tuần Gi&aacute;o;</p>\r\n\r\n<p>- Đại diện T&ograve;a &aacute;n nh&acirc;n d&acirc;n huyện Tuần Gi&aacute;o;</p>\r\n\r\n<p>- Đại diện Chi cục thi h&agrave;nh &aacute;n d&acirc;n sự huyện Tuần Gi&aacute;o;</p>\r\n\r\n<p>- Đại diện L&atilde;nh đạo v&agrave; chuy&ecirc;n vi&ecirc;n Văn ph&ograve;ng HĐND&amp;UBND huyện.</p>\r\n\r\n<p><strong>2. Thời gian:</strong></p>\r\n\r\n<p>14 giờ 00 ph&uacute;t, ng&agrave;y 16/11/2020 (thứ hai).</p>\r\n\r\n<p><strong>3. Địa điểm:</strong></p>\r\n\r\n<p>Hội trường tầng 2, trụ sở UBND huyện.</p>\r\n\r\n<p>Thường trực HĐND huyện tr&acirc;n trọng k&iacute;nh mời c&aacute;c đồng ch&iacute; đến dự đ&uacute;ng thời gian, th&agrave;nh phần./.</p>', '- Như trên;\r\n- Lưu VT.', 'TM. HỘI ĐỒNG NHÂN DÂN - Chủ Tịch', 'Trần Bình Trọng', 'uploads/images/1676991199_condau.png', 1, '2023-02-21 14:05:36', '2023-02-21 14:53:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_hop_van_ban`
--

CREATE TABLE `ky_hop_van_ban` (
  `id` int(11) NOT NULL,
  `ky_hop_id` int(11) NOT NULL DEFAULT 0,
  `ten` text DEFAULT NULL,
  `file_url` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) DEFAULT NULL,
  `key_file` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ky_hop_van_ban`
--

INSERT INTO `ky_hop_van_ban` (`id`, `ky_hop_id`, `ten`, `file_url`, `file_name`, `file_ext`, `key_file`, `user_id`) VALUES
(1, 1, 'Nghị quyết 47', 'uploads/files/1676950750_hop-thuong-truc-mo-rong-11.202012.11.2020_07h00p21_signed.pdf', '1676950750_hop-thuong-truc-mo-rong-11.202012.11.2020_07h00p21_signed.pdf', 'pdf', '', 1),
(2, 1, 'Nghị định 47', 'uploads/files/1676952325_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', '1676952325_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', 'pdf', '', 1),
(3, 1, 'Quyết định 46', 'uploads/files/1676952326_quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346 (1).pdf', '1676952326_quyet-dinh-46-qd-bcdcchc-ke-hoach-kiem-tra-cai-cach-hanh-chinh-nam-2021101550019346 (1).pdf', 'pdf', '', 1),
(4, 1, 'Thông báo 35', 'uploads/files/1676952327_thong-bao-79-tb-vpcp073968548098.pdf', '1676952327_thong-bao-79-tb-vpcp073968548098.pdf', 'pdf', '', 1),
(8, 1, 'thông báo 40', 'uploads/files/1676965009_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', '1676965009_nghi-dinh-47-2020-nd-cp-quan-ly-ket-noi-va-chia-se-du-lieu-so-cua-co-quan-nha-nuoc526561393316.pdf', 'pdf', '', 1),
(11, 2, 'Thông báo', 'uploads/files/Thong_bao-1677512201.pdf', 'Thong_bao-1677512201.pdf', 'pdf', '', 5),
(12, 2, 'Quyết định 45', 'uploads/files/Quyet_dinh_45-1677512202.pdf', 'Quyet_dinh_45-1677512202.pdf', 'pdf', '', 5),
(13, 2, 'Quyết định 46', 'uploads/files/Quyet_dinh_46-1677512203.pdf', 'Quyet_dinh_46-1677512203.pdf', 'pdf', '', 5),
(14, 2, 'Nghị định 47', 'uploads/files/Nghi_dinh_47-1677512204.pdf', 'Nghi_dinh_47-1677512204.pdf', 'pdf', '', 5);

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
(1, 'Nhóm thành viên', 'chuc-vu', 1),
(2, 'Quản lý thành viên', 'thanh-vien', 1),
(3, 'Nhóm quyền', 'nhom-quyen', 1),
(4, 'Chức năng hệ thông', 'module', 1),
(5, 'Văn Bản', 'van-ban', 1),
(6, 'Quản lý kỳ họp HĐND', 'ky-hop', 1),
(7, 'Quản lý hoạt động giám sát', 'giam-sat', 1),
(8, 'Quản lý khiếu nại tố cáo', 'khieu-nai', 1),
(9, 'Thư mời họp', 'thu-moi', 1),
(10, 'Hoạt động giám sát', 'tham-gia-giam-sat', 1),
(11, 'ý kiến cử tri', 'y-kien-cu-tri', 1);

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
  `display_name` text DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ky-hop-create', 'Thêm mới kỳ họp', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(2, 'ky-hop-list', 'Danh sách kỳ họp', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(3, 'ky-hop-edit', 'Chỉnh sửa kỳ họp', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(4, 'ky-hop-delete', 'Xóa kỳ họp', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(5, 'tao-thu-moi', 'Tạo thư mời họp', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(6, 'giam-sat', 'Hoạt động giám sát', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(7, 'giam-sat-create', 'Thêm mới hoạt động giám sát', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(8, 'giam-sat-edit', 'Sửa hoạt động giám sát', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(9, 'giam-sat-delete', 'Xóa hoạt động giám sát', 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(10, 'role-delete', NULL, 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(11, 'permission-menu', NULL, 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(12, 'permission-list', NULL, 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(13, 'permission-create', NULL, 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(14, 'permission-edit', NULL, 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19'),
(15, 'permission-delete', NULL, 'web', '2023-01-22 19:45:19', '2023-01-22 19:45:19');

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
-- Cấu trúc bảng cho bảng `permissions_user`
--

CREATE TABLE `permissions_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `permissions_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions_user`
--

INSERT INTO `permissions_user` (`id`, `user_id`, `permissions_id`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 5, 5),
(5, 5, 6),
(6, 5, 7),
(7, 5, 8);

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
-- Cấu trúc bảng cho bảng `sukien_giamsat`
--

CREATE TABLE `sukien_giamsat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `lich_trinh_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sukien_giamsat`
--

INSERT INTO `sukien_giamsat` (`id`, `user_id`, `lich_trinh_id`) VALUES
(1, 3, 2),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `su_kien`
--

CREATE TABLE `su_kien` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `ngay` date DEFAULT NULL,
  `tieu_de` text DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `bao_truoc` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `su_kien`
--

INSERT INTO `su_kien` (`id`, `user_id`, `ngay`, `tieu_de`, `noi_dung`, `link`, `bao_truoc`, `created_at`) VALUES
(2, 3, '2023-03-01', 'Tham gia Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI', 'Tham gia họp tại UBND tỉnh Bình thuận', 'http://127.0.0.1:8000/ky-hop/1', 1, '2023-02-28 15:55:57'),
(3, 3, '2023-03-05', 'Buổi chiều từ 13h00 giám sát lại Huyện Tánh Linh', NULL, 'http://127.0.0.1:8000/tham-gia-giam-sat/1/noi-dung', 1, '2023-03-02 04:26:35'),
(4, 3, '2023-03-05', 'Buổi chiều từ 13h00 giám sát lại Huyện Tánh Linh', NULL, 'http://127.0.0.1:8000/tham-gia-giam-sat/1/noi-dung', 1, '2023-03-02 07:30:46'),
(5, 5, '2023-03-05', 'Buổi chiều từ 13h00 giám sát lại Huyện Tánh Linh', NULL, 'http://127.0.0.1:8000/tham-gia-giam-sat/1/noi-dung', 1, '2023-03-02 13:57:18'),
(6, 5, '2023-03-01', 'Tham gia Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI', NULL, 'http://127.0.0.1:8000/ky-hop/1', 1, '2023-03-02 14:18:44');

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
(2, 'lĩnh vực áp dụng', 1, 0, '2023-02-08 02:24:37', '2023-02-08 02:24:37'),
(3, 'Cơ quan ban hành', 1, 0, '2023-02-08 02:25:43', '2023-02-08 02:25:43'),
(10, 'Phiến pháp', 1, 1, '2023-02-19 09:17:37', '2023-02-19 09:17:37'),
(11, 'Văn bản luật', 1, 1, '2023-02-19 09:18:52', '2023-02-19 09:18:52'),
(12, 'Pháp lệnh', 1, 1, '2023-02-19 09:19:03', '2023-02-19 09:19:03'),
(13, 'Nghị định', 1, 1, '2023-02-19 09:19:10', '2023-02-19 09:19:10'),
(14, 'Thông tư', 1, 1, '2023-02-19 09:19:18', '2023-02-19 09:19:18'),
(15, 'Quốc phòng', 1, 2, '2023-02-19 09:26:00', '2023-02-19 09:26:00'),
(16, 'An ninh', 1, 2, '2023-02-19 09:27:26', '2023-02-19 09:27:26'),
(17, 'Giao thông vận tải', 1, 2, '2023-02-19 09:28:10', '2023-02-19 09:28:10'),
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
  `link` text DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `ngay_xem` datetime DEFAULT NULL,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_bao`
--

INSERT INTO `thong_bao` (`id`, `user_gui`, `user_nhan`, `loai`, `ngay_gui`, `tieu_de`, `noi_dung`, `link`, `trang_thai`, `ngay_xem`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2023-02-22 15:11:34', 'Thư mời họp HĐND', 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI vào ngày 2023-03-01', '', 0, NULL, 1, '2023-02-22 08:11:34', '2023-02-22 08:11:34'),
(2, 1, 4, 1, '2023-02-22 15:11:34', 'Thư mời họp HĐND', 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI vào ngày 2023-03-01', '', 0, NULL, 1, '2023-02-22 08:11:34', '2023-02-22 08:11:34'),
(3, 1, 3, 1, '2023-02-22 15:12:48', 'Thư mời họp HĐND', 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI vào ngày 2023-03-01', '', 0, NULL, 1, '2023-02-22 08:12:48', '2023-02-22 08:12:48'),
(4, 1, 3, 1, '2023-02-22 15:57:23', 'Thu hồi thư mời họp HĐND', 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI vào ngày 2023-03-01', '', 0, NULL, 1, '2023-02-22 08:57:23', '2023-02-22 08:57:23'),
(5, 1, 3, 1, '2023-02-22 15:57:44', 'Thư mời họp HĐND', 'Kỳ họp thứ 5 - HĐND tỉnh Bình Thuận , khóa XI vào ngày 2023-03-01', '', 0, NULL, 1, '2023-02-22 08:57:44', '2023-02-22 08:57:44'),
(6, 5, 4, 4, '2023-03-01 10:40:23', 'Tham gia đoàn giám sát', 'Phân công tham gia hoạt động giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-01 03:40:23', '2023-03-01 03:40:23'),
(7, 5, 5, 4, '2023-03-01 10:40:23', 'Tham gia đoàn giám sát', 'Phân công tham gia hoạt động giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-01 03:40:23', '2023-03-01 03:40:23'),
(8, 5, 3, 4, '2023-03-01 10:40:23', 'Tham gia đoàn giám sát', 'Phân công tham gia hoạt động giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-01 03:40:23', '2023-03-01 03:40:23'),
(9, 5, 4, 4, '2023-03-01 11:03:25', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-01 04:03:25', '2023-03-01 04:03:25'),
(10, 5, 5, 4, '2023-03-01 11:03:25', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-01 04:03:25', '2023-03-01 04:03:25'),
(11, 5, 3, 4, '2023-03-01 11:03:26', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-01 04:03:26', '2023-03-01 04:03:26'),
(12, 5, 4, 4, '2023-03-02 14:00:27', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-02 07:00:27', '2023-03-02 07:00:27'),
(13, 5, 5, 4, '2023-03-02 14:00:27', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-02 07:00:27', '2023-03-02 07:00:27'),
(14, 5, 3, 4, '2023-03-02 14:00:27', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-02 07:00:27', '2023-03-02 07:00:27'),
(15, 5, 4, 4, '2023-03-02 14:09:19', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-02 07:09:19', '2023-03-02 07:09:19'),
(16, 5, 5, 4, '2023-03-02 14:09:19', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-02 07:09:19', '2023-03-02 07:09:19'),
(17, 5, 3, 4, '2023-03-02 14:09:19', 'Cập nhật lịch giám sát', 'Lịch phân công giám sát: Giám sát việc triển khai và thực hiện Nghị quyết số 43/NQ-HĐND ngày 03/12/2020 của Hội đồng nhân dân tỉnh', 'http://127.0.0.1:8000/giam-sat/1', 0, NULL, 5, '2023-03-02 07:09:19', '2023-03-02 07:09:19'),
(18, 5, 3, 2, '2023-03-03 11:04:33', 'Khiếu nại theo dõi', 'Khiếu nại theo dõi có cập nhật câu trả lời', 'http://127.0.0.1:8000/khieu-nai/3', 0, NULL, 5, '2023-03-03 04:04:33', '2023-03-03 04:04:33'),
(19, 5, 5, 2, '2023-03-03 11:04:33', 'Khiếu nại theo dõi', 'Khiếu nại theo dõi có cập nhật câu trả lời', 'http://127.0.0.1:8000/khieu-nai/3', 0, NULL, 5, '2023-03-03 04:04:33', '2023-03-03 04:04:33');

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
  `chuc_vu` text DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `dien_thoai`, `zalo`, `email`, `email_verified_at`, `password`, `remember_token`, `chuc_vu`, `chuc_vu_id`, `ma_so`, `hinh_anh`, `gioi_thieu`, `ten_dang_nhap`, `trang_thai`, `permissions_id`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Nam', '1994-05-11', 'Phường Xuân An, Tp Phan Thiết, Tỉnh Bình thuận', '0964091594', '0964091594', 'superadmin@gmail.com', NULL, '$2y$10$9ee9D0/PyUjbHJ9uWQID9O0vHe7UWWQm4iL4gICPaDLOM/TcOWVr6', 'EBIKp6c92asZrnp0lk4P5gM7w6KsTNWuguq9ldJorUtsr1sKafoJnQfvJCW0', NULL, 4, NULL, 'uploads/images/1674890227_avatar-1.png', 'Giới thiệu bản thân', NULL, 1, 3, 1, '2023-01-22 19:42:45', '2023-02-22 03:06:00'),
(3, 'Đại Biểu 01', 'Nam', '1990-11-05', '05 Đ.Hải Thượng Lãn Ông, Bình Hưng, Thành phố Phan Thiết, Bình Thuận', '02326586588', '02326586588', 'daibieu01@gmail.com', NULL, '$2y$10$StJfmidySq48NFE6xewhrui2.TVUU40npOG.jusHN.ve/p3H2pfjy', 'YT7XV61BtzMJHgVpfu8lujHZZExnCuKz6aQGk1f1XbGFTFyhbKNd2QvnsiFO', 'Phó Chủ tịch Thường trực UBMTTQVN tỉnh', 1, NULL, 'uploads/images/1674897741_avatar-11.png', NULL, NULL, 1, 1, 0, '2023-01-22 19:53:17', '2023-02-20 08:41:21'),
(4, 'Đại Biểu 02', 'Nam', '1985-10-01', '04 Đ.Hải Thượng Lãn Ông, Bình Hưng, Thành phố Phan Thiết, Bình Thuận', '02326565857', '02326565857', 'daibieu02@gmail.com', NULL, '$2y$10$vtXIRVLQGCVxHa5be7yUquZsFBc1kAPphr7xr2G.949Z0QGALV9PG', NULL, 'Phó Chủ tịch HĐND tỉnh', 2, NULL, NULL, NULL, NULL, 1, 1, 0, '2023-01-30 03:13:43', '2023-02-22 03:34:36'),
(5, 'Cán bộ 01', 'Nam', '1980-02-15', 'Phan Thiết', '02223588285', '02223588285', 'canbo01@gmail.com', NULL, '$2y$10$/HLv9Y2EObNynvCjW0DCyO2jkGRw424s7/EYhTbkGxcZy92kXLiHW', 'rWLiOwpvAwOIngz5XpGyHurW3B4QpLiaURNSCJzaokihDITkrKSgtBdd0GGy', 'Chủ tịch HĐND', 3, NULL, 'uploads/images/1677770973_avatar-16.png', NULL, NULL, 1, 2, 0, '2023-02-20 08:43:08', '2023-02-22 02:21:24');

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

--
-- Đang đổ dữ liệu cho bảng `van_ban`
--

INSERT INTO `van_ban` (`id`, `ten`, `so_hieu`, `loai_vanban_id`, `linh_vuc_id`, `coquan_banhanh_id`, `hieu_luc`, `mo_ta`, `trang_thai`, `created_user`, `created_at`, `updated_at`) VALUES
(3, 'Thông báo 79/2022/TB-VPCP Kết luận của Thủ tướng Chính phủ Phạm Minh Chính tại Phiên họp thứ nhất Ban Chỉ đạo Cải cách hành chính của Chính phủ', '79/2022/TB-VPCP', 13, 23, 20, '2023-03-01', '<p>Ng&agrave;y&nbsp;09&nbsp;th&aacute;ng&nbsp;3&nbsp;năm 2022, tại trụ sở Ch&iacute;nh phủ, Thủ tướng Ch&iacute;nh phủ&nbsp;Phạm Minh Ch&iacute;nh,&nbsp;Trưởng Ban Chỉ đạo Cải c&aacute;ch h&agrave;nh ch&iacute;nh của Ch&iacute;nh phủ&nbsp;đ&atilde; chủ tr&igrave;&nbsp;Phi&ecirc;n họp thứ nhất của Ban Chỉ đạo&nbsp;(sau đ&acirc;y gọi tắt l&agrave;&nbsp;Phi&ecirc;n họp). Tham dự&nbsp;Phi&ecirc;n họp&nbsp;c&oacute;&nbsp;c&aacute;c đồng ch&iacute;: Bộ trưởng Bộ Nội vụ, Phạm Thị Thanh Tr&agrave;, Ph&oacute; Trưởng ban thường trực; Bộ trưởng, Chủ nhiệm Văn ph&ograve;ng Ch&iacute;nh phủ Trần Văn Sơn, Ph&oacute; Trưởng ban; Thứ trưởng Bộ Nội vụ Nguyễn Trọng Thừa, Ph&oacute; Trưởng ban v&agrave; đại diện l&atilde;nh đạo c&aacute;c bộ, ng&agrave;nh, cơ quan l&agrave; th&agrave;nh vi&ecirc;n Ban Chỉ đạo.</p>\r\n\r\n<p>Sau khi nghe&nbsp;Bộ trưởng Bộ Nội vụ Phạm Thị Thanh Tr&agrave;, Ph&oacute; Trưởng ban thường trực b&aacute;o c&aacute;o t&oacute;m tắt kết quả triển khai thực hiện nhiệm vụ năm 2021 v&agrave; kế hoạch hoạt động năm 2022 của Ban Chỉ đạo, &yacute; kiến ph&aacute;t biểu của c&aacute;c th&agrave;nh vi&ecirc;n Ban Chỉ đạo; Thủ tướng Ch&iacute;nh phủ Phạm Minh Ch&iacute;nh, Trưởng Ban Chỉ đạo kết luận như sau:</p>\r\n\r\n<p>1. Đ&aacute;nh gi&aacute; cao c&ocirc;ng t&aacute;c chuẩn bị c&aacute;c t&agrave;i liệu, b&aacute;o c&aacute;o của Bộ Nội vụ, Cơ quan thường trực của Ban Chỉ đạo, &yacute; kiến ph&aacute;t biểu t&acirc;m huyết, thẳng thắn, tr&aacute;ch nhiệm, phản &aacute;nh kh&aacute;ch quan t&igrave;nh h&igrave;nh thực tế của c&aacute;c th&agrave;nh vi&ecirc;n Ban Chỉ đạo; giao Bộ Nội vụ phối hợp với Văn ph&ograve;ng Ch&iacute;nh phủ chắt lọc, tiếp thu &yacute; kiến, ho&agrave;n thiện c&aacute;c b&aacute;o c&aacute;o, c&aacute;c dự thảo, tập trung v&agrave;o c&ocirc;ng t&aacute;c l&atilde;nh đạo, chỉ đạo v&agrave; tổ chức thực hiện c&oacute; hiệu quả nhiệm vụ được giao; c&aacute;c bộ, cơ quan tiếp thu &yacute; kiến của c&aacute;c đại biểu để chủ động tổ chức thực hiện c&ocirc;ng t&aacute;c cải c&aacute;ch h&agrave;nh ch&iacute;nh trong bộ, ng&agrave;nh m&igrave;nh.</p>\r\n\r\n<p>2. Trong năm 2021, tr&ecirc;n tinh thần c&oacute; kế thừa, ổn định, đổi mới v&agrave; ph&aacute;t triển, ph&aacute;t huy kết quả của những năm trước, c&ocirc;ng t&aacute;c cải c&aacute;ch h&agrave;nh ch&iacute;nh đ&atilde; đạt được một số kết quả cụ thể sau: (i) Ch&iacute;nh phủ đ&atilde; ban h&agrave;nh Nghị quyết 76/NQ-CP ng&agrave;y 15 th&aacute;ng 7 năm 2021 về Chương tr&igrave;nh tổng thể cải c&aacute;ch h&agrave;nh ch&iacute;nh nh&agrave; nước giai đoạn 2021-2030; c&aacute;c bộ, ng&agrave;nh, địa phương đ&atilde; khẩn trương nghi&ecirc;n cứu, cụ thể h&oacute;a chỉ đạo của Ch&iacute;nh phủ tại Nghị quyết 76/NQ-CP v&agrave; ban h&agrave;nh kế hoạch h&agrave;nh động giai đoạn 5 năm, 10 năm để chỉ đạo, triển khai tại bộ, ng&agrave;nh, địa phương; (ii) Thủ tướng Ch&iacute;nh phủ đ&atilde; kiện to&agrave;n Ban Chỉ đạo cải c&aacute;ch h&agrave;nh ch&iacute;nh của Ch&iacute;nh phủ theo tinh thần của Ch&iacute;nh phủ nhiệm kỳ mới; (iii) Tập trung x&acirc;y dựng, ho&agrave;n thiện thể chế, cơ sở ph&aacute;p l&yacute; cho c&ocirc;ng t&aacute;c cải c&aacute;ch h&agrave;nh ch&iacute;nh, trong đ&oacute;, nhiều bộ, ng&agrave;nh đ&atilde; ban h&agrave;nh c&aacute;c ch&iacute;nh s&aacute;ch mới để kịp thời hỗ trợ, tạo điều kiện thuận lợi nhất cho hoạt động sản xuất, kinh doanh của doanh nghiệp, ổn định việc l&agrave;m, thu nhập cho người lao động trong điều kiện dịch bệnh COVID-19 c&oacute; những diễn biến ti&ecirc;u cực k&eacute;o d&agrave;i; (iv) Nghi&ecirc;n cứu, cắt giảm quy tr&igrave;nh, thủ tục h&agrave;nh ch&iacute;nh để đơn giản h&oacute;a v&agrave; tạo thuận lợi hơn cho người d&acirc;n, doanh nghiệp; (v) Tăng cường đầu tư cho c&ocirc;ng nghệ th&ocirc;ng tin v&agrave; chuyển đổi số phục vụ cải c&aacute;ch h&agrave;nh ch&iacute;nh thực chất, hiệu quả hơn; (vi) G&oacute;p phần ph&ograve;ng chống tham nhũng, ti&ecirc;u cực, s&aacute;ch nhiễu trong hệ thống c&aacute;c cơ quan h&agrave;nh ch&iacute;nh; (vii) Được Nh&acirc;n d&acirc;n, cộng đồng doanh nghiệp v&agrave; bạn b&egrave; quốc tế ghi nhận c&oacute; sự tiến bộ. Cụ thể l&agrave; Chỉ số về cải thiện chất lượng c&aacute;c quy định ph&aacute;p luật năm 2021 trong bộ Chỉ số đổi mới s&aacute;ng tạo của Việt Nam được Tổ chức Sở hữu tr&iacute; tuệ thế giới đ&aacute;nh gi&aacute; tăng 6 bậc.</p>\r\n\r\n<p>Thay mặt Ch&iacute;nh phủ, Thủ tướng Ch&iacute;nh phủ ghi nhận, biểu dương v&agrave; đ&aacute;nh gi&aacute; cao tinh thần tr&aacute;ch nhiệm của c&aacute;c bộ, ng&agrave;nh, cơ quan, địa phương đ&atilde; c&oacute; nhiều cố gắng với nhiều điểm s&aacute;ng trong c&ocirc;ng t&aacute;c cải c&aacute;ch h&agrave;nh ch&iacute;nh năm 2021.</p>', 1, 5, '2023-03-03 13:41:47', '2023-03-03 13:41:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `van_ban_ct`
--

CREATE TABLE `van_ban_ct` (
  `id` int(11) NOT NULL,
  `van_ban_id` int(11) NOT NULL,
  `ten` text DEFAULT NULL,
  `file_url` text NOT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) DEFAULT NULL,
  `key_file` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `van_ban_ct`
--

INSERT INTO `van_ban_ct` (`id`, `van_ban_id`, `ten`, `file_url`, `file_name`, `file_ext`, `key_file`, `user_id`) VALUES
(10, 0, NULL, 'uploads/files/1677420411_Phan_cong_nhiem_vu_thanh_vien_Doan_COVID-19 (1).pdf', '1677420411_Phan_cong_nhiem_vu_thanh_vien_Doan_COVID-19 (1).pdf', 'pdf', '11677420394', 1),
(11, 3, NULL, 'uploads/files/1677850905_thong-bao-79-tb-vpcp073968548098.pdf', '1677850905_thong-bao-79-tb-vpcp073968548098.pdf', 'pdf', '', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `y_kien`
--

CREATE TABLE `y_kien` (
  `id` int(11) NOT NULL,
  `chu_de_id` int(11) NOT NULL DEFAULT 0,
  `tieu_de` text DEFAULT NULL,
  `noi_dung_y_kien` text DEFAULT NULL,
  `noi_dung_tra_loi` text DEFAULT NULL,
  `user_gui_id` int(11) NOT NULL DEFAULT 0,
  `ngay_y_kien` date DEFAULT NULL,
  `user_traloi_id` int(11) NOT NULL DEFAULT 0,
  `ngay_tra_loi` date DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `y_kien`
--

INSERT INTO `y_kien` (`id`, `chu_de_id`, `tieu_de`, `noi_dung_y_kien`, `noi_dung_tra_loi`, `user_gui_id`, `ngay_y_kien`, `user_traloi_id`, `ngay_tra_loi`, `trang_thai`, `created_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'Một số Luật hiện nay còn thiếu tính ổn định lâu dài, chưa đảm bảo sự thống nhất trong hệ thống pháp luật', '<p>Một số Luật hiện nay c&ograve;n thiếu t&iacute;nh ổn định l&acirc;u d&agrave;i, chưa đảm bảo sự thống nhất trong hệ thống ph&aacute;p luật, c&aacute;c văn bản dưới Luật chưa ban h&agrave;nh kịp thời, thiếu t&iacute;nh khả thi khi &aacute;p dụng trong thực tế. Đề nghị Quốc hội cần tiếp tục cải tiến, n&acirc;ng cao chất lượng c&ocirc;ng t&aacute;c x&acirc;y dựng ph&aacute;p luật; gi&aacute;m s&aacute;t chặt chẽ việc ban h&agrave;nh văn bản dưới Luật để đảm bảo Luật ban h&agrave;nh sớm đi v&agrave;o cuộc sống để đ&aacute;p ứng nhu cầu thiết thực của người d&acirc;n.</p>', '<p>Cử tri ghi nhận v&agrave; đ&aacute;nh gi&aacute; rất cao sự l&atilde;nh đạo, chỉ đạo quyết liệt, hiệu quả cao của Đảng, Nh&agrave; nước về c&ocirc;ng t&aacute;c ph&ograve;ng chống dịch, vừa ph&aacute;t triển kinh tế nhằm đảm bảo đời sống nh&acirc;n d&acirc;n v&agrave; ổn định ch&iacute;nh trị; triển khai c&oacute; hiệu quả nhiều ch&iacute;nh s&aacute;ch, giải ph&aacute;p duy tr&igrave;, hỗ trợ sản xuất, kinh doanh v&agrave; k&iacute;ch th&iacute;ch ti&ecirc;u d&ugrave;ng trong nước, xuất khẩu trong bối cảnh dịch Covid &ndash; 19 v&agrave; diễn biến phức tạp. Cử tri kiến nghị Ch&iacute;nh phủ tiếp tục n&acirc;ng cao tr&aacute;ch nhiệm trước nh&acirc;n d&acirc;n; tập trung thực hiện c&oacute; hiệu quả c&aacute;c ch&iacute;nh s&aacute;ch ph&aacute;t triển kinh tế - x&atilde; hội vừa đảm bảo c&ocirc;ng t&aacute;c ph&ograve;ng, chống dịch bệnh; quan t&acirc;m gi&aacute;m s&aacute;t chặt chẽ đẩy nhanh tiến độ triển khai thực hiện c&aacute;c dự &aacute;n đầu tư c&ocirc;ng, nhất l&agrave; c&aacute;c dự &aacute;n lớn, quan trọng của đất nước, tr&aacute;nh g&acirc;y l&atilde;ng ph&iacute; t&agrave;i sản nh&agrave; nước.</p>', 3, '2023-03-03', 5, '2023-03-03', 2, 3, '2023-03-03 09:50:02', '2023-03-03 10:04:22'),
(2, 1, 'Một số Luật hiện nay còn thiếu tính ổn định lâu dài, chưa đảm bảo sự thống nhất trong hệ thống pháp luật', '<p>Một số Luật hiện nay c&ograve;n thiếu t&iacute;nh ổn định l&acirc;u d&agrave;i, chưa đảm bảo sự thống nhất trong hệ thống ph&aacute;p luật, c&aacute;c văn bản dưới Luật chưa ban h&agrave;nh kịp thời, thiếu t&iacute;nh khả thi khi &aacute;p dụng trong thực tế. Đề nghị Quốc hội cần tiếp tục cải tiến, n&acirc;ng cao chất lượng c&ocirc;ng t&aacute;c x&acirc;y dựng ph&aacute;p luật; gi&aacute;m s&aacute;t chặt chẽ việc ban h&agrave;nh văn bản dưới Luật để đảm bảo Luật ban h&agrave;nh sớm đi v&agrave;o cuộc sống để đ&aacute;p ứng nhu cầu thiết thực của người d&acirc;n.</p>', NULL, 3, '2023-03-03', 0, NULL, 0, 3, '2023-03-03 09:51:19', '2023-03-03 09:51:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `y_kien_chu_de`
--

CREATE TABLE `y_kien_chu_de` (
  `id` int(11) NOT NULL,
  `ten` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `y_kien_chu_de`
--

INSERT INTO `y_kien_chu_de` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Chính trị', '2023-03-03 09:35:04', '2023-03-03 09:35:04'),
(2, 'Xã hội', '2023-03-03 09:35:11', '2023-03-03 09:35:11'),
(3, 'Môi trường', '2023-03-03 09:35:18', '2023-03-03 09:35:18'),
(4, 'An sinh xã hội', '2023-03-03 09:35:25', '2023-03-03 09:35:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `y_kien_theo_doi`
--

CREATE TABLE `y_kien_theo_doi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `y_kien_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `y_kien_theo_doi`
--

INSERT INTO `y_kien_theo_doi` (`id`, `user_id`, `y_kien_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2023-03-03 09:51:19', '2023-03-03 09:51:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `y_kien_van_ban`
--

CREATE TABLE `y_kien_van_ban` (
  `id` int(11) NOT NULL,
  `y_kien_id` int(11) NOT NULL DEFAULT 0,
  `ten` text DEFAULT NULL,
  `file_url` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_ext` varchar(10) NOT NULL DEFAULT '0',
  `key_file` text DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `y_kien_van_ban`
--

INSERT INTO `y_kien_van_ban` (`id`, `y_kien_id`, `ten`, `file_url`, `file_name`, `file_ext`, `key_file`, `user_id`) VALUES
(4, 2, 'thong-bao-79-tb-vpcp073968548098', 'uploads/files/thong-bao-79-tb-vpcp073968548098-1677837001.pdf', 'thong-bao-79-tb-vpcp073968548098-1677837001.pdf', 'pdf', '', 3);

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
-- Chỉ mục cho bảng `giam_sat`
--
ALTER TABLE `giam_sat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giam_sat_lich_trinh`
--
ALTER TABLE `giam_sat_lich_trinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giam_sat_nhom`
--
ALTER TABLE `giam_sat_nhom`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giam_sat_noi_dung`
--
ALTER TABLE `giam_sat_noi_dung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giam_sat_noi_dung_van_ban`
--
ALTER TABLE `giam_sat_noi_dung_van_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giam_sat_thanh_vien`
--
ALTER TABLE `giam_sat_thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giam_sat_vanban`
--
ALTER TABLE `giam_sat_vanban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khieu_nai`
--
ALTER TABLE `khieu_nai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khieu_nai_chu_de`
--
ALTER TABLE `khieu_nai_chu_de`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khieu_nai_theo_doi`
--
ALTER TABLE `khieu_nai_theo_doi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khieu_nai_van_ban`
--
ALTER TABLE `khieu_nai_van_ban`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `permissions_user`
--
ALTER TABLE `permissions_user`
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
-- Chỉ mục cho bảng `sukien_giamsat`
--
ALTER TABLE `sukien_giamsat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `su_kien`
--
ALTER TABLE `su_kien`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `y_kien`
--
ALTER TABLE `y_kien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `y_kien_chu_de`
--
ALTER TABLE `y_kien_chu_de`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `y_kien_theo_doi`
--
ALTER TABLE `y_kien_theo_doi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `y_kien_van_ban`
--
ALTER TABLE `y_kien_van_ban`
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
-- AUTO_INCREMENT cho bảng `giam_sat`
--
ALTER TABLE `giam_sat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giam_sat_lich_trinh`
--
ALTER TABLE `giam_sat_lich_trinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giam_sat_nhom`
--
ALTER TABLE `giam_sat_nhom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `giam_sat_noi_dung`
--
ALTER TABLE `giam_sat_noi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giam_sat_noi_dung_van_ban`
--
ALTER TABLE `giam_sat_noi_dung_van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giam_sat_thanh_vien`
--
ALTER TABLE `giam_sat_thanh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giam_sat_vanban`
--
ALTER TABLE `giam_sat_vanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khieu_nai`
--
ALTER TABLE `khieu_nai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khieu_nai_chu_de`
--
ALTER TABLE `khieu_nai_chu_de`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khieu_nai_theo_doi`
--
ALTER TABLE `khieu_nai_theo_doi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khieu_nai_van_ban`
--
ALTER TABLE `khieu_nai_van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ky_hop`
--
ALTER TABLE `ky_hop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ky_hop_thanh_vien`
--
ALTER TABLE `ky_hop_thanh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ky_hop_thu_moi`
--
ALTER TABLE `ky_hop_thu_moi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ky_hop_van_ban`
--
ALTER TABLE `ky_hop_van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `module_admins`
--
ALTER TABLE `module_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT cho bảng `permissions_user`
--
ALTER TABLE `permissions_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT cho bảng `sukien_giamsat`
--
ALTER TABLE `sukien_giamsat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `su_kien`
--
ALTER TABLE `su_kien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thongso_vanban`
--
ALTER TABLE `thongso_vanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `van_ban`
--
ALTER TABLE `van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `van_ban_ct`
--
ALTER TABLE `van_ban_ct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `y_kien`
--
ALTER TABLE `y_kien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `y_kien_chu_de`
--
ALTER TABLE `y_kien_chu_de`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `y_kien_theo_doi`
--
ALTER TABLE `y_kien_theo_doi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `y_kien_van_ban`
--
ALTER TABLE `y_kien_van_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
