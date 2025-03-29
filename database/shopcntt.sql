-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 25, 2025 lúc 02:16 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopcntt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `service_type` enum('domain','hosting','vps') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('active','terminated','expired') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` varchar(255) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `percentage`, `expiry_date`, `discount_type`, `created_at`, `updated_at`) VALUES
('KM33', 20.00, '2025-12-11', 'manual', '2025-03-23 09:03:32', '2025-03-23 09:03:32'),
('KM66', 10.00, '2026-02-22', 'manual', '2025-03-25 00:37:44', '2025-03-25 00:37:44'),
('KV40', 10.00, '2025-11-20', 'vip', '2025-03-25 00:37:22', '2025-03-25 00:37:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `domain_accounts`
--

CREATE TABLE `domain_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_id` bigint(20) UNSIGNED NOT NULL,
  `registrar_panel` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `domain_accounts`
--

INSERT INTO `domain_accounts` (`id`, `domain_id`, `registrar_panel`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 2, 'r32r2', 'd2323', '1213', '2025-03-23 23:33:34', '2025-03-23 23:33:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `domain_product`
--

CREATE TABLE `domain_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `price_start` int(11) NOT NULL,
  `domain_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `domain_product`
--

INSERT INTO `domain_product` (`id`, `domain_name`, `price_start`, `domain_type`, `created_at`, `updated_at`, `price`) VALUES
(2, 'vn', 200, 'vietnamese', '2025-03-17 23:53:35', '2025-03-18 00:18:07', 1000),
(3, '.com', 300, 'international', '2025-03-18 00:09:32', '2025-03-18 00:09:32', 2000);

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
-- Cấu trúc bảng cho bảng `hosting_accounts`
--

CREATE TABLE `hosting_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hosting_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `control_panel` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hosting_accounts`
--

INSERT INTO `hosting_accounts` (`id`, `hosting_id`, `username`, `password`, `control_panel`, `created_at`, `updated_at`) VALUES
(1, 2, 'qweqweq', '123456', 'dsad', '2025-03-18 00:55:33', '2025-03-20 06:24:37'),
(2, 2, 'gaerwqfscsdc', '24232423423', 'đâsd', '2025-03-18 01:37:40', '2025-03-20 06:24:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hosting_product`
--

CREATE TABLE `hosting_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `disk_space` varchar(50) NOT NULL,
  `bandwidth` varchar(50) NOT NULL,
  `accounts_ftp` int(11) NOT NULL,
  `addon_domains` int(11) NOT NULL,
  `sub_domains` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hosting_product`
--

INSERT INTO `hosting_product` (`id`, `plan`, `price`, `disk_space`, `bandwidth`, `accounts_ftp`, `addon_domains`, `sub_domains`, `created_at`, `updated_at`) VALUES
(2, 'WIN SSD Đồng', 100, '1GB', '20GB', 15, 1, 10, '2025-03-20 06:20:49', '2025-03-20 06:20:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('unpaid','paid','overdue') NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `issued_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `due_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `name`, `email`, `dia_chi`, `sdt`, `created_at`, `updated_at`) VALUES
(4, 'trung hieu', 'hieu123123@gmail.com', '36 cot den', '3423423', NULL, NULL),
(5, 'Nguyen Van A', 'test@gmail.com', '123 Đường ABC, Hà Nội', '0123456789', '2025-03-24 07:34:44', '2025-03-24 07:34:44'),
(6, 'weqwe', 'phamtrunghieu04112003@gmail.com', 'chua hang', '3424324', '2025-03-24 07:34:53', '2025-03-24 07:35:05'),
(7, 'hieu', 'trunghieu123@gmail.com', '36 cot den', '0961169379', '2025-03-24 07:40:39', '2025-03-24 07:40:39'),
(8, 'TRUNG', 'trung@gmail.com', 'jbfsjkdbvfjabjkdsgbsjk', '3423832', '2025-03-25 00:44:46', '2025-03-25 00:44:46');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(10, '2025_03_15_134151_table_tai_khoan', 2),
(11, '2025_03_15_134212_table_quyen', 2),
(12, '2025_03_15_134229_table_phan_quyen', 2),
(13, '2025_03_15_134249_table_users', 2),
(14, '2025_03_15_134313_table_discount', 3),
(15, '2025_03_15_134300_table_orders', 4),
(16, '2025_03_15_134332_table_domain_product', 4),
(17, '2025_03_15_134344_table_hosting_product', 4),
(18, '2025_03_15_134408_table_vps_product', 4),
(19, '2025_03_15_134534_table_domain_account', 5),
(20, '2025_03_15_134543_table_hosting_account', 5),
(21, '2025_03_15_134551_table_vps_account', 5),
(22, '2025_03_15_134839_table_invoices', 5),
(23, '2025_03_15_141950_create_contracts_table', 6),
(24, '2025_03_17_133500_create_personal_access_tokens_table', 7),
(25, '2025_03_20_140703_add_discount_type_to_discounts_table', 8),
(26, '2025_03_20_145244_update_orders_table', 9),
(27, '2025_03_21_140830_add_duration_to_orders', 10),
(28, '2025_03_23_150532_update_discounts_table', 11),
(29, '2025_03_23_153222_drop_foreign_key_from_orders', 12),
(30, '2025_03_23_152009_change_discount_id_in_discounts', 13),
(31, '2025_03_23_152009_change_discount_id_to_string', 14),
(33, '2025_03_25_051928_update_status_column_in_tai_khoan_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_type` enum('domain','hosting','vps') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `duration_months` int(11) NOT NULL DEFAULT 1,
  `discount_id` varchar(255) DEFAULT 'NO_DISCOUNT',
  `status` enum('pending','paid','cancelled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `service_type`, `total_price`, `duration_months`, `discount_id`, `status`, `created_at`, `updated_at`, `name`, `email`, `sdt`, `dia_chi`) VALUES
(5, 2, 'domain', 0.00, 1, 'KM33', 'paid', NULL, '2025-03-25 00:52:03', 'hieu', 'trunghieu123@gmail.com', '0961169379', '36 cot den'),
(10, 1, 'vps', 0.00, 3, NULL, 'paid', '2025-03-23 09:46:32', '2025-03-25 00:29:48', 'dsadasc', 'phamtrunghieu04112003@gmail.com', '4234234', 'ceff23'),
(11, 2, 'hosting', 400.00, 4, NULL, 'paid', '2025-03-23 09:54:57', '2025-03-23 09:54:57', 'saSáÁ', 'phamtrunghieu041122131003@gmail.com', '231231', 'DQCQWEWE'),
(12, 2, 'hosting', 240.00, 3, 'KM33', 'cancelled', '2025-03-24 01:59:59', '2025-03-24 02:53:51', 'Trung Hiếu', 'hieu92484@st.vimaru.edu.vn', '096169379', '36 Cot Den'),
(13, 2, 'hosting', 300.00, 3, NULL, 'cancelled', '2025-03-24 02:03:52', '2025-03-24 02:03:52', 'eqweqweq', 'jfnjanfajskfn@gmail.com', '232102421412', 'cqeewvnenqnpqweq'),
(15, 1, 'vps', 0.00, 32, 'KM33', 'paid', '2025-03-25 00:42:45', '2025-03-25 00:44:46', 'TRUNG', 'trung@gmail.com', '3423832', 'jbfsjkdbvfjabjkdsgbsjk');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `ma_phan_quyen` int(11) NOT NULL,
  `ma_nhan_vien` int(11) NOT NULL,
  `ma_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_quyen`
--

INSERT INTO `phan_quyen` (`ma_phan_quyen`, `ma_nhan_vien`, `ma_quyen`) VALUES
(1, 2, 1),
(3, 6, 3),
(5, 4, 2),
(6, 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ten_quyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`ma_quyen`, `ten_quyen`) VALUES
(1, 'all'),
(3, 'Chỉnh sửa dịch vụ'),
(4, 'Quản lý hóa đơn, hợp đồng'),
(2, 'Xem thống kê');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('14mlhjx6naKHwm42mktStqCVMLt3w4YacgMAuvqb', NULL, '127.0.0.1', 'PostmanRuntime/7.43.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUldTbEtFUmMzd3h3akpTTnZZdTBnUnZkQlJ5SEx1ZWZlV0tWWnFDciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742825572),
('1d4Gxrjh7QwpsR0JhJAcZBwO4eZdOydqXLjNvH5V', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0NmZlBBc2dQVGNvVk9yeXJGaFNlUHpya2dqa0FRZ1N1NmlZRFgxTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742566097),
('2RrsncL4eeZrP4biRDkqsZ5Tg6MF8tzb5tLmetiR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOG1ZWnBReEd2dTl4Rm5LcFU2RHVVZFhIR25VZ0RwczhZRnpwdU51ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742744418),
('30jDPQPTSPSb1qFCsTwTO2dVTIxuczDbMnRqUlUm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjdQVTlFS05HZ2NtRnk4OEIyOWdYa2I0SzNTaUptZlh0VWtvakxOWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742218941),
('8y4ASGmWfp9VOI9gcydlg2OdqEWgldzTPFfSXbN9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoib0ZWSEFaUkNOd1JKQVVVc0hOeVpLNzBwbkNCZnl4SDgzMnFtMUJqNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742281477),
('cxyr3s2YeBKv3TOTcvDAMNL6ZaXjGFWSYY4spA6u', NULL, '127.0.0.1', 'PostmanRuntime/7.43.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaG9LTlJSS2J2eFNLc1JsOEtuVTI3OWVaNjFxVzZtYTlMS3lGSk1WRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742221393),
('dwAL4fd12ClTYKXZcffGEoBDJjiBt2Qfme6eJ36g', NULL, '127.0.0.1', 'PostmanRuntime/7.43.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzRqVlRjckRmZmluUzVLME01SGRBOGFuNzBUeHVUUFhmcW82ZVBuUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742280772),
('hqVOMzOHujSOHG3Hr4TO3HIGTXCnZCkC2dENeMq9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFTeXMzOGk0RE8yNUdEMElSVEQ5cWZoa0xOTWgzMmZ1UDdxWUZlWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742218952),
('NBcHzhOemhki41qfKb8Z9QIMV8rNlJuzSxuQ5vqp', NULL, '127.0.0.1', 'PostmanRuntime/7.43.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWdtSFl4RU9VblNTdEt1bWRVVmM5Wkk5eDJQM0p5Tmt0NEZHeEZ6NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742877138),
('qpotYSCe34VdeHIVgEy5CTNU04H5x0IOhOVyjY4C', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1NycVdCSnBYSFJBejRNVnc5RExoOFEzdERpRzBxcWVyM0FGUXpCMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742023419),
('rQTxDDjawmoy1ri8PLtr0We2Vy5W9YimkXLpL8Ol', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmszTHBBVGxiS1c4bUY3akFXZnhLcko5RlZ2TW1QV29jU21Ia0VURSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742271139),
('TkVRZNRMF7NA4RefWHoF4Kya7Xnjwkt4HGaKvzRQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVhFQnA1UjVuRk1YejVWTkt4RWVpcHc2S1FGd3NLTUVOQXlrU1YwUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742563918),
('VJrIva1RS3iGk6XhVnwhjfa5h9ILmchUxaejFWtQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3FZelVrVW96bmpSdG1DbFBSS0tsTDhWeEY4cURITTlRbWM1ekVuTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742281462),
('WS0ca5dcejxl4FWq6T2cPLEDaBoNWm5U7QepFtgF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzkyMm4xc2JUaTlWbDlpaDVGOU81WTQ5OFI0cjFtS2xqeWphc0tSciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742023409),
('XkLdcZcVY0xgEurSUI3hyPyybA36ZdQystvnvCaQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaU9wYzV4d1AxcHpVYVl1amhQdmxDczh4aDl4Sm9DZFl2T1NJUFNYWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742476916);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_nhan_vien` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `chuc_vu` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_nhan_vien`, `email`, `password`, `status`, `chuc_vu`, `hoten`) VALUES
(1, 'trunghieu@gmail.com', '04112003', 'active', 'CEO', 'Phạm Trung Hiếu'),
(2, 'test@example.com', '123456', 'none', 'Admin', 'Nguyen Van B'),
(4, 'test2@example.com', '$2y$12$REBoS37ho/3l9Pp9Ui1F1uGnHmY.fR0WreIALJm07MR1QJZcTuhmS', '0', 'Kế toán', 'Nguyen Van c'),
(6, 'tuan@gmail.com', '$2y$12$UL7Dljew3CdmzLdVinPAHujS/R3bYeQbpNmfASESfupnnJjUtT75u', 'active', 'Quản lý', 'tuan'),
(7, 'trung@gmail.com', '$2y$12$w..BYRt4oT5kPhgjBgTNB.R9BBQu3Ct7qR0enwPN1.VftAuRFg/L6', '0', 'nhân viên', 'Trung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vps_accounts`
--

CREATE TABLE `vps_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vps_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `os` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vps_accounts`
--

INSERT INTO `vps_accounts` (`id`, `vps_id`, `ip_address`, `username`, `password`, `os`, `created_at`, `updated_at`) VALUES
(1, 1, '127.213.13.43', 'asdasda', '3424234', 'asdasdasd', '2025-03-18 02:12:57', '2025-03-18 02:12:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vps_product`
--

CREATE TABLE `vps_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `bandwidth` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vps_product`
--

INSERT INTO `vps_product` (`id`, `plan`, `cpu`, `ram`, `storage`, `bandwidth`, `os`, `created_at`, `updated_at`, `price`) VALUES
(1, 'Premium VPS', '8 vCPUs', '16GB', '500GB SSD', '2TB', 'Ubuntu 22.04', '2025-03-17 07:24:26', '2025-03-18 00:28:02', 1000),
(2, 'VPS Đồng', 'vCPU2', '16GB', '500GB SSD', '2TB', 'Linux', '2025-03-18 00:28:55', '2025-03-18 00:28:55', 2000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_user_id_foreign` (`user_id`),
  ADD KEY `contracts_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `domain_accounts`
--
ALTER TABLE `domain_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_accounts_domain_id_foreign` (`domain_id`);

--
-- Chỉ mục cho bảng `domain_product`
--
ALTER TABLE `domain_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domain_product_domain_name_unique` (`domain_name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hosting_accounts`
--
ALTER TABLE `hosting_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hosting_accounts_hosting_id_foreign` (`hosting_id`);

--
-- Chỉ mục cho bảng `hosting_product`
--
ALTER TABLE `hosting_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khach_hang_email_unique` (`email`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_email_unique` (`email`),
  ADD KEY `orders_discount_id_foreign` (`discount_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`ma_phan_quyen`),
  ADD KEY `phan_quyen_ma_nhan_vien_foreign` (`ma_nhan_vien`),
  ADD KEY `phan_quyen_ma_quyen_foreign` (`ma_quyen`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_quyen`),
  ADD UNIQUE KEY `quyen_ten_quyen_unique` (`ten_quyen`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_nhan_vien`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vps_accounts`
--
ALTER TABLE `vps_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vps_accounts_vps_id_foreign` (`vps_id`);

--
-- Chỉ mục cho bảng `vps_product`
--
ALTER TABLE `vps_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `domain_accounts`
--
ALTER TABLE `domain_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `domain_product`
--
ALTER TABLE `domain_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hosting_accounts`
--
ALTER TABLE `hosting_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hosting_product`
--
ALTER TABLE `hosting_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phan_quyen`
--
ALTER TABLE `phan_quyen`
  MODIFY `ma_phan_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_nhan_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vps_accounts`
--
ALTER TABLE `vps_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vps_product`
--
ALTER TABLE `vps_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contracts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `domain_accounts`
--
ALTER TABLE `domain_accounts`
  ADD CONSTRAINT `domain_accounts_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domain_product` (`id`);

--
-- Các ràng buộc cho bảng `hosting_accounts`
--
ALTER TABLE `hosting_accounts`
  ADD CONSTRAINT `hosting_accounts_hosting_id_foreign` FOREIGN KEY (`hosting_id`) REFERENCES `hosting_product` (`id`);

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD CONSTRAINT `phan_quyen_ma_nhan_vien_foreign` FOREIGN KEY (`ma_nhan_vien`) REFERENCES `tai_khoan` (`ma_nhan_vien`),
  ADD CONSTRAINT `phan_quyen_ma_quyen_foreign` FOREIGN KEY (`ma_quyen`) REFERENCES `quyen` (`ma_quyen`);

--
-- Các ràng buộc cho bảng `vps_accounts`
--
ALTER TABLE `vps_accounts`
  ADD CONSTRAINT `vps_accounts_vps_id_foreign` FOREIGN KEY (`vps_id`) REFERENCES `vps_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
