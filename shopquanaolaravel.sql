-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 19, 2022 lúc 02:51 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopquanaolaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_02_26_091457_create_tbl_admin_table', 1),
(11, '2022_02_26_103013_create_tbl_category_table', 2),
(13, '2022_02_27_021146_create_tbl_sub_category_table', 3),
(14, '2022_02_27_081514_create_tbl_product_table', 4),
(15, '2022_02_28_091927_create_tbl_brand_table', 5),
(16, '2022_02_28_092439_create_tbl_brand_table', 6),
(17, '2022_03_07_073921_create_tbl_customer_table', 7),
(18, '2022_03_19_105259_create_tbl_color_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`, `admin_email`, `admin_phone`, `admin_address`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Nhật Bản', 'trannhatban34@gmail.com', '0978119953', 'Hóc Môn, TP.HCM', '2022-02-26 09:30:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `brand_status`, `brand_slug`, `created_at`, `updated_at`) VALUES
(4, 'Levis', 'Thương hiệu Levi’s – kẻ khổng lồ trong lĩnh vực jeans/denim, đồng thời là nhà phát minh của những chiếc quần jeans đầu tiên, đến nay đã trở thành biểu tượng timeless trong thời trang.', 1, 'levis', NULL, NULL),
(6, 'Balenciaga', 'Thương hiệu thời trang nổi tiếng nhất thế giới Balenciaga hiện đã hơn 100 tuổi, với nhà mốt xa xỉ được thành lập ở Tây Ban Nha vào năm 1917, bởi Cristóbal Balenciaga.', 1, 'balenciaga', NULL, NULL),
(9, 'Saint Laurent', 'Yves Saint Laurent SAS (tiếng Pháp: [iv sɛ̃ lɔʁɑ̃] (nghe); viết tắt: YSL), còn được gọi là Saint Laurent, là một công ty thời trang nổi tiếng của Pháp được thành lập bởi Yves Saint Laurent và cộng sự Pierre Bergé vào năm 1961.', 1, 'saint-laurent', NULL, NULL),
(10, 'Gucci', 'Gucci cũng là nhãn hiệu thời trang bán chạy thứ 2 trên thế giới sau LVMH. The House of Gucci đã sáp nhập với công ty Kering của Pháp. Gucci có 425 cửa hiệu trên toàn thế giới. Họ bán sản phẩm của mình thông qua các cửa hàng hội viên.', 1, 'gucci', NULL, NULL),
(11, 'Puma', 'Puma SE (thương hiệu chính thức là PUMA) là một công ty đa quốc gia lớn của Đức chuyên sản xuất giày và các dụng cụ thể thao khác có trụ sở tại Herzogenaurach, Bavaria, Đức. Công ty được thành lập năm 1924 bởi Adolf và Rudolf Dassler với tên gọi ban đầu Gebrüder Dassler Schuhfabrik.', 1, 'puma', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `category_parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`, `category_description`, `category_status`, `category_parent`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 'nam', 'Sản phẩm dành cho nam', 1, 0, NULL, NULL),
(2, 'Nữ', 'nu', 'Sản phẩm dành cho nữ', 1, 0, NULL, NULL),
(5, 'Trẻ em', 'tre-em-18', 'Danh mục dành cho trẻ em', 1, 0, NULL, NULL),
(6, 'Người lớn', 'nguoi-lon', 'Danh mục dành cho người lớn', 0, 0, NULL, NULL),
(8, 'Quần jean nam', 'quan-jean-nam', 'Quần jean dành cho nam', 1, 1, NULL, NULL),
(9, 'Quần jean nữ', 'quan-jean-nu', 'Quần jean dành cho nữ', 1, 2, NULL, NULL),
(10, 'Áo hoodie nam', 'ao-hoodie-nam', 'Áo hoodie dành cho nam', 1, 1, NULL, NULL),
(11, 'Áo sơ mi nữ', 'ao-so-mi-nu', 'Áo sơ mi dành cho nữ', 1, 2, NULL, NULL),
(12, 'Áo sơ mi  nam', 'ao-so-mi-nam', 'Áo sơ mi dành cho nam', 1, 1, NULL, NULL),
(13, 'Váy', 'vay', 'Váy dành cho nữ', 1, 2, NULL, NULL),
(14, 'Áo sơ mi trẻ em', 'ao-so-mi-tre-em', 'Áo sơ mi dành cho trẻ em', 1, 5, NULL, NULL),
(15, 'Áo thun nam', 'ao-thun-nam', 'Áo thun dành cho nam', 1, 1, NULL, NULL),
(16, 'Áo thun nữ', 'ao-thun-nu', 'Áo thun dành cho nữ', 1, 2, NULL, NULL),
(17, 'Áo thun trẻ em', 'ao-thun-tre-em', 'Áo thun dành cho trẻ em', 1, 5, NULL, NULL),
(18, 'Áo khoác trẻ em', 'ao-khoac-tre-em', 'Áo khoác dành cho trẻ em', 1, 5, NULL, NULL),
(19, 'Quần áo thu đông', 'quan-ao-thu-dong', 'Quần áo dành thu đông tất cả các loại', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
CREATE TABLE IF NOT EXISTS `tbl_color` (
  `color_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `color_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`, `color_code`, `color_status`, `created_at`, `updated_at`) VALUES
(2, 'Màu trắng', '#FFFFFF', 1, NULL, NULL),
(3, 'Màu đen', '#000000', 1, NULL, NULL),
(4, 'Màu đỏ', '#FF0000', 1, NULL, NULL),
(5, 'Màu xám', '#808080', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`, `customer_address`, `created_at`, `updated_at`) VALUES
(4, 'Hàng Ngọc Hưng', 'hung@gmail.com', '0978119953', 'e10adc3949ba59abbe56e057f20f883e', 'Quận 7, TP.HCM', NULL, NULL),
(3, 'Bản Trần', 'bant835@gmail.com', '0978119953', 'e10adc3949ba59abbe56e057f20f883e', 'Hóc Môn, TP.HCM', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_status`, `product_slug`, `product_image`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo TX-3', 'Chất lượng', 300456.78, 1, 'ao-tx-3', 'buy-261.png', 10, 6, NULL, NULL),
(2, 'Sản phẩm 1', 'Sản phẩm váy nữ chất lượng hoàn hảo đến từng cen-ti-mét', 1900000, 1, 'san-pham-1', 'buy-360.png', 13, 6, NULL, NULL),
(5, 'Sản phẩm 4', 'Ok', 2131.76, 1, 'san-pham-4', 'category386.png', 8, 6, NULL, NULL),
(6, 'Sản phẩm 5', 'OK', 300456.78, 1, 'san-pham-5', 'pro7-anubhutte-98854.png', 13, 4, NULL, NULL),
(7, 'Sản phẩm 7', 'Chất lượng', 1900000, 1, 'san-pham-7', 'gucci372.jpg', 10, 10, NULL, NULL),
(8, 'Sản phẩm 8', 'Chất lượng', 300456.78, 1, 'san-pham-8', 'puma435.jpg', 8, 11, NULL, NULL),
(9, 'Sản phẩm 2', 'Chất lượng tuyệt vời', 4567.89, 1, 'san-pham-2', 'gucci423.jpg', 11, 10, NULL, NULL),
(10, 'Sản phẩm 3', 'Chất lượng', 4567.89, 1, 'san-pham-3', 'puma140.jpg', 16, 11, NULL, NULL),
(11, 'Sản phẩm 9', 'Chất lượng', 300456.78, 1, 'san-pham-9', 'gucci53.jpg', 15, 10, NULL, NULL),
(12, 'Áo thun trẻ em 1', 'Ok', 300456.78, 1, 'ao-thun-tre-em-1', 'pb378.jpg', 17, 9, NULL, NULL),
(13, 'Sản phẩm 10', 'Chất lượng', 300456.78, 0, 'san-pham-10', 'pbb122.jpg', 17, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_size_color`
--

DROP TABLE IF EXISTS `tbl_product_size_color`;
CREATE TABLE IF NOT EXISTS `tbl_product_size_color` (
  `product_size_color` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`product_size_color`),
  KEY `product_id` (`product_id`),
  KEY `size_id` (`size_id`),
  KEY `color_id` (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_size`
--

DROP TABLE IF EXISTS `tbl_size`;
CREATE TABLE IF NOT EXISTS `tbl_size` (
  `size_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_name` varchar(255) NOT NULL,
  `size_description` text NOT NULL,
  `size_status` int(11) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`, `size_description`, `size_status`) VALUES
(1, 'S', 'chiều cao 1m60 – 1m65, cân nặng 55-60kg', 1),
(3, 'L', 'size từ 66-70kg, cao 1m70 – 1m76', 1),
(4, 'M', 'chiều cao 1m64 – 1m69, cân nặng 60- 65kg', 1),
(5, 'XL', 'chiều cao 1m74 – 1m76, cân nặng 70 – 76kg', 1),
(6, 'XXL', 'chiều cao 1m76 – 1m77, cân nặng 77 – 80kg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_product_size_color`
--
ALTER TABLE `tbl_product_size_color`
  ADD CONSTRAINT `tbl_product_size_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_size_color_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `tbl_size` (`size_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_size_color_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `tbl_color` (`color_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
