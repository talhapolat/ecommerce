-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Nis 2023, 18:25:59
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ahlatap`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `order` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`id`, `title`, `order`, `created_at`) VALUES
(1, 'Adidas', 1, '2022-12-15 19:37:51'),
(2, 'Nike', 2, '2022-12-15 19:37:51'),
(3, 'Puma', 3, '2022-12-15 19:37:51'),
(4, 'Zara', 4, '2022-12-15 19:37:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statu` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `main_category_id`, `no`, `description`, `slug`, `statu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KADIN', NULL, 2, NULL, 'kadin', 1, '2022-09-14 18:35:00', '2022-09-17 03:49:45', NULL),
(2, 'Trençkot', 4, 11, NULL, 'trenckot', 1, '2022-09-14 18:35:00', '2022-09-17 03:49:35', NULL),
(3, 'Tişört', 1, 12, 'Tişööörrtt', 'dfg', 1, '2022-09-17 03:36:32', '2022-09-17 03:49:35', NULL),
(4, 'ERKEK', NULL, 1, NULL, 'erkek', 1, '2022-09-17 03:45:04', '2022-09-17 03:46:04', NULL),
(6, 'Sweat', 4, 5, NULL, NULL, 1, '2022-09-17 03:47:49', '2022-09-17 03:49:48', NULL),
(7, 'Ceket', 1, 6, NULL, NULL, 1, '2022-09-17 03:48:01', '2022-09-17 03:49:48', NULL),
(8, 'Ceket', 4, 7, NULL, NULL, 1, '2022-09-17 03:48:16', '2022-09-17 03:49:48', NULL),
(9, 'Etek', 1, 8, NULL, NULL, 1, '2022-09-17 03:48:33', '2022-09-17 03:49:48', NULL),
(10, 'Pantolon', 4, 9, NULL, NULL, 1, '2022-09-17 03:48:43', '2022-09-17 03:49:48', NULL),
(11, 'Tişört', 4, 10, NULL, NULL, 1, '2022-09-17 03:48:59', '2022-09-17 03:49:48', NULL),
(12, 'ÇOCUK', NULL, 3, NULL, 'cocuk', 1, '2022-09-17 03:49:13', '2022-09-17 03:49:48', NULL),
(25, 'UNISEX', 0, NULL, NULL, 'unisex', 1, NULL, NULL, NULL),
(26, 'Aksesuar', 25, NULL, NULL, 'aksesuar', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `image` varchar(80) NOT NULL,
  `number` int(11) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `statu` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `collections`
--

INSERT INTO `collections` (`id`, `title`, `image`, `number`, `slug`, `statu`) VALUES
(1, 'Erkek Kış Koleksiyonu', '', 1, 'erkek-kis-koleksiyonu', 1),
(2, 'Kadın Kış Koleksiyonu', '', 2, 'kadin-kis-koleksiyonu', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(67, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(68, 8, 'title', 'text', 'Başlık', 1, 1, 1, 1, 1, 1, '{}', 3),
(69, 8, 'image', 'image', 'Resim', 0, 1, 1, 1, 1, 1, '{}', 2),
(70, 8, 'shortDesc', 'text', 'Kısa Açıklama', 0, 1, 1, 1, 1, 1, '{}', 4),
(71, 8, 'longDesc', 'text', 'Açıklama', 0, 0, 1, 1, 1, 1, '{}', 5),
(72, 8, 'price', 'text', 'Fiyat', 1, 1, 1, 1, 1, 1, '{}', 6),
(73, 8, 'slug', 'text', 'Kısa Link', 1, 1, 1, 1, 1, 1, '{}', 7),
(74, 8, 'brand_id', 'text', 'Brand Id', 0, 1, 1, 1, 1, 1, '{}', 8),
(75, 8, 'statu', 'text', 'Statü', 1, 1, 1, 1, 1, 1, '{}', 10),
(76, 8, 'created_at', 'timestamp', 'Oluşturma Tarihi', 1, 1, 1, 1, 0, 1, '{}', 11),
(77, 8, 'updated_at', 'timestamp', 'Güncelleme Tarihi', 0, 0, 0, 0, 0, 0, '{}', 12),
(78, 8, 'deleted_at', 'timestamp', 'Silme Tarihi', 0, 0, 1, 1, 1, 1, '{}', 13),
(80, 8, 'no', 'text', 'Sıra', 0, 0, 0, 0, 0, 0, '{}', 9),
(81, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(82, 10, 'product_id', 'text', 'Product Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(83, 10, 'category_id', 'text', 'Category Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(84, 10, 'created_at', 'timestamp', 'Kayıt Tarihi', 0, 1, 1, 0, 0, 0, '{}', 6),
(85, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(86, 10, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 8),
(87, 10, 'product_category_belongsto_product_relationship', 'relationship', 'Ürün Adı', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(88, 10, 'product_category_belongsto_w_category_relationship', 'relationship', 'Kategori Adı', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(89, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(90, 11, 'product_id', 'text', 'Product Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(91, 11, 'no', 'text', 'No', 0, 0, 0, 0, 0, 0, '{}', 5),
(92, 11, 'image', 'image', 'Resim', 1, 1, 1, 1, 1, 1, '{}', 3),
(93, 11, 'description', 'text', 'Açıklama', 0, 1, 1, 1, 1, 1, '{}', 6),
(94, 11, 'created_at', 'timestamp', 'Kayıt Tarihi', 0, 1, 1, 1, 0, 1, '{}', 7),
(95, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(96, 11, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 9),
(97, 11, 'gallery_belongsto_product_relationship', 'relationship', 'Ürün Adı', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(105, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(106, 13, 'product_id', 'text', 'Product Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(107, 13, 'suboption1', 'text', 'Suboption1', 1, 1, 1, 1, 1, 1, '{}', 4),
(108, 13, 'suboption2', 'text', 'Suboption2', 0, 1, 1, 1, 1, 1, '{}', 5),
(109, 13, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 8),
(110, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(111, 13, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 10),
(112, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(113, 14, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(114, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 3),
(115, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(116, 14, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 5),
(117, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(118, 15, 'option_id', 'text', 'Option Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(119, 15, 'title', 'text', 'Alt Özellik Adı', 1, 1, 1, 1, 1, 1, '{}', 4),
(120, 15, 'created_at', 'timestamp', 'Kayıt Tarihi', 0, 1, 1, 0, 0, 0, '{}', 5),
(121, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(122, 15, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 7),
(123, 15, 'suboption_belongsto_option_relationship', 'relationship', 'Ana Özellik Adı', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Option\",\"table\":\"options\",\"type\":\"belongsTo\",\"column\":\"option_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(124, 13, 'product_option_belongsto_product_relationship', 'relationship', 'Ürün', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(125, 13, 'product_option_belongsto_option_relationship', 'relationship', '1. Seçenek', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Suboption\",\"table\":\"suboptions\",\"type\":\"belongsTo\",\"column\":\"suboption1\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(126, 13, 'product_option_belongsto_option_relationship_1', 'relationship', '2. Seçenek', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Suboption\",\"table\":\"suboptions\",\"type\":\"belongsTo\",\"column\":\"suboption2\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(127, 13, 'qty', 'number', 'Stok', 0, 1, 1, 1, 1, 1, '{}', 8),
(128, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(129, 17, 'name', 'text', 'Başlık', 1, 1, 1, 1, 1, 1, '{}', 3),
(130, 17, 'main_category_id', 'text', 'Main Category Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(131, 17, 'no', 'text', 'No', 0, 1, 0, 0, 0, 0, '{}', 2),
(132, 17, 'description', 'text', 'Açıklama', 0, 1, 1, 1, 1, 1, '{}', 6),
(133, 17, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{}', 7),
(134, 17, 'statu', 'text', 'Statü', 1, 1, 1, 1, 1, 1, '{}', 8),
(135, 17, 'created_at', 'timestamp', 'Kayıt Tarihi', 0, 1, 1, 0, 0, 0, '{}', 9),
(136, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(137, 17, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 11),
(138, 17, 'category_belongsto_category_relationship', 'relationship', 'Üst Kategori', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"main_category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(139, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(140, 18, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(142, 18, 'color', 'text', 'Color', 0, 1, 1, 1, 1, 1, '{}', 4),
(143, 18, 'number', 'text', 'Number', 0, 1, 1, 1, 1, 1, '{}', 5),
(144, 18, 'parent', 'text', 'Parent', 0, 1, 1, 1, 1, 1, '{}', 6),
(145, 18, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, '{}', 7),
(146, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(147, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(148, 18, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 10),
(149, 18, 'navigation_belongsto_navigation_relationship', 'relationship', 'Üst Menü', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Navigation\",\"table\":\"navigations\",\"type\":\"belongsTo\",\"column\":\"parent\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(150, 18, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{}', 3),
(151, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(152, 19, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{}', 2),
(153, 19, 'first', 'text', 'First', 0, 1, 1, 1, 1, 1, '{}', 3),
(154, 19, 'second', 'text', 'Second', 0, 1, 1, 1, 1, 1, '{}', 4),
(155, 19, 'third', 'text', 'Third', 0, 1, 1, 1, 1, 1, '{}', 5),
(156, 19, 'button', 'text', 'Button', 0, 1, 1, 1, 1, 1, '{}', 6),
(157, 19, 'url', 'text', 'Url', 0, 1, 1, 1, 1, 1, '{}', 7),
(158, 19, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(159, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(160, 19, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 10),
(161, 19, 'number', 'text', 'Number', 0, 1, 1, 1, 1, 1, '{}', 11),
(162, 19, 'active', 'checkbox', 'Active', 0, 1, 1, 1, 1, 1, '{}', 12),
(163, 13, 'number', 'number', 'Number', 0, 1, 1, 1, 1, 1, '{}', 9),
(164, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(165, 23, 'url', 'text', 'Url', 1, 1, 1, 1, 1, 1, '{}', 2),
(166, 23, 'media_type', 'text', 'Media Type', 0, 1, 1, 1, 1, 1, '{}', 3),
(167, 23, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 4),
(168, 23, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{}', 5),
(169, 23, 'statu', 'text', 'Statu', 0, 1, 1, 1, 1, 1, '{}', 6),
(170, 23, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(171, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(172, 23, 'deleted_at', 'timestamp', 'Deleted At', 0, 1, 1, 1, 1, 1, '{}', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(8, 'products', 'products', 'Ürün', 'Ürünler', NULL, 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"no\",\"order_display_column\":\"title\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 16:09:07', '2022-09-16 19:09:34'),
(10, 'product_categories', 'product-categories', 'Ürün Kategorisi', 'Ürün Kategorileri', NULL, 'App\\ProductCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 18:47:44', '2022-09-16 19:38:28'),
(11, 'galleries', 'galleries', 'Fotoğraf', 'Ürün Fotoğrafları', NULL, 'App\\Gallery', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:06:52', '2022-09-16 19:11:24'),
(13, 'product_options', 'product-options', 'Product Option', 'Product Options', NULL, 'App\\ProductOption', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:19:32', '2022-11-19 21:23:32'),
(14, 'options', 'options', 'Seçenek', 'Seçenekler', NULL, 'App\\Option', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:21:24', '2022-09-17 06:30:39'),
(15, 'suboptions', 'suboptions', 'Seçenek', 'Seçenekler', NULL, 'App\\Suboption', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:23:30', '2022-09-17 06:30:08'),
(17, 'categories', 'categories', 'Kategori', 'Kategoriler', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"no\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:35:25', '2022-09-17 03:44:25'),
(18, 'navigations', 'navigations', 'Navigation', 'Navigations', NULL, 'App\\Navigation', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"number\",\"order_display_column\":\"title\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-24 08:18:27', '2022-09-24 13:01:11'),
(19, 'sliders', 'sliders', 'Slider', 'Sliders', NULL, 'App\\Slider', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"number\",\"order_display_column\":\"image\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-24 20:48:51', '2022-09-24 20:52:58'),
(23, 'media', 'media', 'Medium', 'Media', NULL, 'App\\Medium', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-12-01 17:46:44', '2022-12-01 17:46:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `delivery_title` varchar(32) NOT NULL,
  `delivery_image` varchar(50) DEFAULT NULL,
  `delivery_limit_1` float NOT NULL,
  `delivery_price_1` float NOT NULL,
  `delivery_limit_2` float NOT NULL,
  `delivery_price_2` float NOT NULL,
  `delivery_min_price` float NOT NULL,
  `delivery_statu` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `deliveries`
--

INSERT INTO `deliveries` (`id`, `delivery_title`, `delivery_image`, `delivery_limit_1`, `delivery_price_1`, `delivery_limit_2`, `delivery_price_2`, `delivery_min_price`, `delivery_statu`) VALUES
(1, 'Standart Kargo', NULL, 199, 25, 399, 15, 0, 1),
(2, 'Hızlı Kargo', NULL, 399, 59, 999, 49, 900, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `no` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_order` int(5) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `img_name`, `img_order`, `created`, `modified`, `status`) VALUES
(788, '18761681065559.jpg', 1, '2023-04-09 21:39:19', '0000-00-00 00:00:00', '1'),
(789, '19541681065914.jpg', 1, '2023-04-09 21:45:14', '0000-00-00 00:00:00', '1'),
(790, '19991681067002.jpg', 1, '2023-04-09 22:03:22', '0000-00-00 00:00:00', '1'),
(791, '16561681067391.jpg', 1, '2023-04-09 22:09:51', '0000-00-00 00:00:00', '1'),
(792, '14641681067523.jpg', 1, '2023-04-09 22:12:03', '0000-00-00 00:00:00', '1'),
(793, '16081681067683.jpg', 1, '2023-04-09 22:14:43', '0000-00-00 00:00:00', '1'),
(798, '13701681070197.jpg', 1, '2023-04-09 22:56:37', '0000-00-00 00:00:00', '1'),
(799, '16981681070226.jpg', 1, '2023-04-09 22:57:06', '0000-00-00 00:00:00', '1'),
(800, '11781681070275.jpg', 1, '2023-04-09 22:57:55', '0000-00-00 00:00:00', '1'),
(801, '29701681070275.png', 2, '2023-04-09 22:57:55', '0000-00-00 00:00:00', '1'),
(802, '37661681070275.jpg', 3, '2023-04-09 22:57:55', '0000-00-00 00:00:00', '1'),
(803, '44841681070275.jpg', 4, '2023-04-09 22:57:55', '0000-00-00 00:00:00', '1'),
(804, '5471681070275.jpg', 5, '2023-04-09 22:57:55', '0000-00-00 00:00:00', '1'),
(805, '69261681070275.jpg', 6, '2023-04-09 22:57:55', '0000-00-00 00:00:00', '1'),
(806, '16011681070293.jpg', 1, '2023-04-09 22:58:13', '0000-00-00 00:00:00', '1'),
(807, '27301681070293.png', 2, '2023-04-09 22:58:13', '0000-00-00 00:00:00', '1'),
(808, '32011681070293.jpg', 3, '2023-04-09 22:58:13', '0000-00-00 00:00:00', '1'),
(809, '45251681070293.jpg', 4, '2023-04-09 22:58:13', '0000-00-00 00:00:00', '1'),
(810, '55261681070293.jpg', 5, '2023-04-09 22:58:13', '0000-00-00 00:00:00', '1'),
(811, '67371681070293.jpg', 6, '2023-04-09 22:58:13', '0000-00-00 00:00:00', '1'),
(812, '19851681070328.jpg', 1, '2023-04-09 22:58:48', '0000-00-00 00:00:00', '1'),
(813, '15951681070414.jpg', 1, '2023-04-09 23:00:14', '0000-00-00 00:00:00', '1'),
(814, '14641681070447.jpg', 1, '2023-04-09 23:00:47', '0000-00-00 00:00:00', '1'),
(815, '19161681070502.jpg', 1, '2023-04-09 23:01:42', '0000-00-00 00:00:00', '1'),
(816, '1511681070592.jpg', 1, '2023-04-09 23:03:12', '0000-00-00 00:00:00', '1'),
(817, '11411681070746.jpg', 1, '2023-04-09 23:05:46', '0000-00-00 00:00:00', '1'),
(818, '1751681070976.jpg', 1, '2023-04-09 23:09:36', '0000-00-00 00:00:00', '1'),
(820, '11671681080527.jpg', 1, '2023-04-10 01:48:47', '0000-00-00 00:00:00', '1'),
(821, '12621681149942.jpg', 1, '2023-04-10 21:05:42', '0000-00-00 00:00:00', '1'),
(826, '13101681253695.jpg', 1, '2023-04-12 01:54:55', '0000-00-00 00:00:00', '1'),
(827, '17171681253754.jpg', 1, '2023-04-12 01:55:54', '0000-00-00 00:00:00', '1'),
(828, '11951681324585.jpg', 1, '2023-04-12 21:36:25', '0000-00-00 00:00:00', '1'),
(837, '14941681428924.jpg', 1, '2023-04-14 02:35:24', '0000-00-00 00:00:00', '1'),
(838, '14861681482787.jpg', 1, '2023-04-14 17:33:07', '0000-00-00 00:00:00', '1'),
(841, '1291681483449.jpg', 1, '2023-04-14 17:44:09', '0000-00-00 00:00:00', '1'),
(843, '18231681483955.jpg', 1, '2023-04-14 17:52:35', '0000-00-00 00:00:00', '1'),
(844, '17611681484229.jpg', 1, '2023-04-14 17:57:09', '0000-00-00 00:00:00', '1'),
(845, '13461681485586.jpg', 1, '2023-04-14 18:19:46', '0000-00-00 00:00:00', '1'),
(846, '13001681485681.jpg', 1, '2023-04-14 18:21:21', '0000-00-00 00:00:00', '1'),
(847, '19231681485831.jpg', 1, '2023-04-14 18:23:51', '0000-00-00 00:00:00', '1'),
(848, '15841681493419.jpg', 1, '2023-04-14 20:30:19', '0000-00-00 00:00:00', '1'),
(849, '18201681493440.jpg', 1, '2023-04-14 20:30:40', '0000-00-00 00:00:00', '1'),
(850, '14131681493984.jpg', 1, '2023-04-14 20:39:44', '0000-00-00 00:00:00', '1'),
(851, '17191681494052.jpg', 1, '2023-04-14 20:40:52', '0000-00-00 00:00:00', '1'),
(852, '12541681494103.jpg', 1, '2023-04-14 20:41:43', '0000-00-00 00:00:00', '1'),
(853, '17261681494125.jpg', 1, '2023-04-14 20:42:05', '0000-00-00 00:00:00', '1'),
(854, '11231681494150.jpg', 1, '2023-04-14 20:42:30', '0000-00-00 00:00:00', '1'),
(855, '22621681494150.jpg', 2, '2023-04-14 20:42:30', '0000-00-00 00:00:00', '1'),
(856, '37411681494150.jpg', 3, '2023-04-14 20:42:30', '0000-00-00 00:00:00', '1'),
(857, '1301681494227.jpg', 1, '2023-04-14 20:43:47', '0000-00-00 00:00:00', '1'),
(858, '27241681494227.jpg', 2, '2023-04-14 20:43:47', '0000-00-00 00:00:00', '1'),
(859, '3211681494227.jpg', 3, '2023-04-14 20:43:47', '0000-00-00 00:00:00', '1'),
(860, '17121681494411.jpg', 1, '2023-04-14 20:46:51', '0000-00-00 00:00:00', '1'),
(861, '23921681494411.jpg', 2, '2023-04-14 20:46:51', '0000-00-00 00:00:00', '1'),
(862, '38731681494411.jpg', 3, '2023-04-14 20:46:52', '0000-00-00 00:00:00', '1'),
(863, '13751681494693.jpg', 1, '2023-04-14 20:51:33', '0000-00-00 00:00:00', '1'),
(864, '27941681494693.jpg', 2, '2023-04-14 20:51:33', '0000-00-00 00:00:00', '1'),
(865, '37101681494693.jpg', 3, '2023-04-14 20:51:33', '0000-00-00 00:00:00', '1'),
(866, '16851681494767.jpg', 1, '2023-04-14 20:52:47', '0000-00-00 00:00:00', '1'),
(867, '24291681494767.jpg', 2, '2023-04-14 20:52:47', '0000-00-00 00:00:00', '1'),
(868, '31341681494767.jpg', 3, '2023-04-14 20:52:47', '0000-00-00 00:00:00', '1'),
(869, '11191681494847.jpg', 1, '2023-04-14 20:54:07', '0000-00-00 00:00:00', '1'),
(870, '25131681494847.png', 2, '2023-04-14 20:54:07', '0000-00-00 00:00:00', '1'),
(871, '31081681494847.jpg', 3, '2023-04-14 20:54:07', '0000-00-00 00:00:00', '1'),
(872, '14721681494994.jpg', 1, '2023-04-14 20:56:34', '0000-00-00 00:00:00', '1'),
(873, '2541681494994.jpg', 2, '2023-04-14 20:56:34', '0000-00-00 00:00:00', '1'),
(874, '37491681494994.jpg', 3, '2023-04-14 20:56:34', '0000-00-00 00:00:00', '1'),
(875, '19691681495040.jpg', 1, '2023-04-14 20:57:20', '0000-00-00 00:00:00', '1'),
(876, '26651681495040.jpg', 2, '2023-04-14 20:57:20', '0000-00-00 00:00:00', '1'),
(877, '32411681495040.jpg', 3, '2023-04-14 20:57:20', '0000-00-00 00:00:00', '1'),
(878, '1841681495071.jpg', 1, '2023-04-14 20:57:51', '0000-00-00 00:00:00', '1'),
(879, '27221681495071.jpg', 2, '2023-04-14 20:57:51', '0000-00-00 00:00:00', '1'),
(880, '31101681495071.jpg', 3, '2023-04-14 20:57:51', '0000-00-00 00:00:00', '1'),
(881, '16991681495606.jpg', 1, '2023-04-14 21:06:46', '0000-00-00 00:00:00', '1'),
(882, '24001681495606.jpg', 2, '2023-04-14 21:06:46', '0000-00-00 00:00:00', '1'),
(883, '1901681496157.jpg', 1, '2023-04-14 21:15:57', '0000-00-00 00:00:00', '1'),
(884, '29211681496157.jpg', 2, '2023-04-14 21:15:57', '0000-00-00 00:00:00', '1'),
(885, '32871681496157.jpg', 3, '2023-04-14 21:15:58', '0000-00-00 00:00:00', '1'),
(886, '15631681496260.jpg', 1, '2023-04-14 21:17:40', '0000-00-00 00:00:00', '1'),
(887, '25791681496260.jpg', 2, '2023-04-14 21:17:40', '0000-00-00 00:00:00', '1'),
(888, '33991681496260.jpg', 3, '2023-04-14 21:17:40', '0000-00-00 00:00:00', '1'),
(889, '16031681496296.jpg', 1, '2023-04-14 21:18:16', '0000-00-00 00:00:00', '1'),
(890, '21091681496296.jpg', 2, '2023-04-14 21:18:16', '0000-00-00 00:00:00', '1'),
(891, '36311681496296.jpg', 3, '2023-04-14 21:18:16', '0000-00-00 00:00:00', '1'),
(892, '14431681496388.jpg', 1, '2023-04-14 21:19:48', '0000-00-00 00:00:00', '1'),
(893, '22471681496388.jpg', 2, '2023-04-14 21:19:48', '0000-00-00 00:00:00', '1'),
(894, '38131681496388.jpg', 3, '2023-04-14 21:19:48', '0000-00-00 00:00:00', '1'),
(895, '14311681496522.jpg', 1, '2023-04-14 21:22:02', '0000-00-00 00:00:00', '1'),
(896, '24091681496522.jpg', 2, '2023-04-14 21:22:02', '0000-00-00 00:00:00', '1'),
(897, '3921681496522.jpg', 3, '2023-04-14 21:22:02', '0000-00-00 00:00:00', '1'),
(898, '17651681496698.jpg', 1, '2023-04-14 21:24:58', '0000-00-00 00:00:00', '1'),
(899, '21501681496698.jpg', 2, '2023-04-14 21:24:58', '0000-00-00 00:00:00', '1'),
(900, '38451681496698.jpg', 3, '2023-04-14 21:24:58', '0000-00-00 00:00:00', '1'),
(901, '14931681496764.jpg', 1, '2023-04-14 21:26:04', '0000-00-00 00:00:00', '1'),
(902, '17671681496846.jpg', 1, '2023-04-14 21:27:26', '0000-00-00 00:00:00', '1'),
(903, '16181681496885.jpg', 1, '2023-04-14 21:28:05', '0000-00-00 00:00:00', '1'),
(904, '16881681496966.jpg', 1, '2023-04-14 21:29:26', '0000-00-00 00:00:00', '1'),
(905, '19181681496974.png', 1, '2023-04-14 21:29:34', '0000-00-00 00:00:00', '1'),
(906, '16641681496977.jpg', 1, '2023-04-14 21:29:37', '0000-00-00 00:00:00', '1'),
(907, '14491681497020.jpg', 1, '2023-04-14 21:30:20', '0000-00-00 00:00:00', '1'),
(908, '17171681502781.jpg', 1, '2023-04-14 23:06:21', '0000-00-00 00:00:00', '1'),
(909, '11611681502795.jpg', 1, '2023-04-14 23:06:35', '0000-00-00 00:00:00', '1'),
(910, '12681681503007.jpg', 1, '2023-04-14 23:10:07', '0000-00-00 00:00:00', '1'),
(911, '14891681510751.jpg', 1, '2023-04-15 01:19:11', '0000-00-00 00:00:00', '1'),
(912, '16721681511517.jpg', 1, '2023-04-15 01:31:57', '0000-00-00 00:00:00', '1'),
(913, '1141681511590.jpg', 1, '2023-04-15 01:33:10', '0000-00-00 00:00:00', '1'),
(914, '21801681511590.jpg', 2, '2023-04-15 01:33:10', '0000-00-00 00:00:00', '1'),
(915, '17971681512766.jpg', 1, '2023-04-15 01:52:46', '0000-00-00 00:00:00', '1'),
(916, '17831681512823.jpg', 1, '2023-04-15 01:53:43', '0000-00-00 00:00:00', '1'),
(917, '17661681513820.jpg', 1, '2023-04-15 02:10:20', '0000-00-00 00:00:00', '1'),
(918, '16061681513832.jpg', 1, '2023-04-15 02:10:32', '0000-00-00 00:00:00', '1'),
(919, '1991681513937.jpg', 1, '2023-04-15 02:12:17', '0000-00-00 00:00:00', '1'),
(920, '17481681514028.jpg', 1, '2023-04-15 02:13:48', '0000-00-00 00:00:00', '1'),
(921, '1331681514066.jpg', 1, '2023-04-15 02:14:26', '0000-00-00 00:00:00', '1'),
(922, '1631681514135.jpg', 1, '2023-04-15 02:15:35', '0000-00-00 00:00:00', '1'),
(923, '17091681516633.jpg', 1, '2023-04-15 02:57:13', '0000-00-00 00:00:00', '1'),
(924, '19201681516872.jpg', 1, '2023-04-15 03:01:12', '0000-00-00 00:00:00', '1'),
(925, '11001681517587.jpg', 1, '2023-04-15 03:13:07', '0000-00-00 00:00:00', '1'),
(926, '17901681581355.jpg', 1, '2023-04-15 20:55:55', '0000-00-00 00:00:00', '1'),
(927, '23361681581355.jpg', 2, '2023-04-15 20:55:55', '0000-00-00 00:00:00', '1'),
(928, '19961681581482.jpg', 1, '2023-04-15 20:58:02', '0000-00-00 00:00:00', '1'),
(929, '17261681581529.jpg', 1, '2023-04-15 20:58:49', '0000-00-00 00:00:00', '1'),
(930, '12521681581576.jpg', 1, '2023-04-15 20:59:36', '0000-00-00 00:00:00', '1'),
(931, '1501681581649.jpg', 1, '2023-04-15 21:00:49', '0000-00-00 00:00:00', '1'),
(932, '15501681582345.jpg', 1, '2023-04-15 21:12:25', '0000-00-00 00:00:00', '1'),
(933, '12501681582351.jpg', 1, '2023-04-15 21:12:31', '0000-00-00 00:00:00', '1'),
(934, '13661681656903.jpg', 1, '2023-04-16 17:55:03', '0000-00-00 00:00:00', '1'),
(935, '19591681670736.jpg', 1, '2023-04-16 21:45:36', '0000-00-00 00:00:00', '1'),
(936, '15821681685042.jpg', 1, '2023-04-17 01:44:02', '0000-00-00 00:00:00', '1'),
(937, '22711681685042.jpg', 2, '2023-04-17 01:44:02', '0000-00-00 00:00:00', '1'),
(938, '37481681685042.jpg', 3, '2023-04-17 01:44:02', '0000-00-00 00:00:00', '1'),
(939, '41121681685042.jpg', 4, '2023-04-17 01:44:02', '0000-00-00 00:00:00', '1'),
(940, '15121681685090.jpg', 1, '2023-04-17 01:44:50', '0000-00-00 00:00:00', '1'),
(941, '23961681685090.jpg', 2, '2023-04-17 01:44:50', '0000-00-00 00:00:00', '1'),
(942, '371681685090.jpg', 3, '2023-04-17 01:44:50', '0000-00-00 00:00:00', '1'),
(943, '48551681685090.jpg', 4, '2023-04-17 01:44:50', '0000-00-00 00:00:00', '1'),
(944, '15721681685446.jpg', 1, '2023-04-17 01:50:46', '0000-00-00 00:00:00', '1'),
(945, '22591681685446.jpg', 2, '2023-04-17 01:50:46', '0000-00-00 00:00:00', '1'),
(946, '11401681685783.jpg', 1, '2023-04-17 01:56:23', '0000-00-00 00:00:00', '1'),
(947, '31001681685850.jpg', 1, '2023-04-17 01:57:30', '0000-00-00 00:00:00', '1'),
(948, '48861681685850.jpg', 2, '2023-04-17 01:57:30', '0000-00-00 00:00:00', '1'),
(949, '1141681685952.jpg', 1, '2023-04-17 01:59:12', '0000-00-00 00:00:00', '1'),
(950, '25451681685952.jpg', 2, '2023-04-17 01:59:12', '0000-00-00 00:00:00', '1'),
(951, '34231681685952.jpg', 3, '2023-04-17 01:59:12', '0000-00-00 00:00:00', '1'),
(952, '41131681685952.jpg', 4, '2023-04-17 01:59:12', '0000-00-00 00:00:00', '1'),
(953, '57121681685952.jpg', 5, '2023-04-17 01:59:12', '0000-00-00 00:00:00', '1'),
(954, '15471681686110.jpg', 1, '2023-04-17 02:01:50', '0000-00-00 00:00:00', '1'),
(955, '25051681686110.jpg', 2, '2023-04-17 02:01:50', '0000-00-00 00:00:00', '1'),
(956, '38881681686110.jpg', 3, '2023-04-17 02:01:50', '0000-00-00 00:00:00', '1'),
(957, '49081681686110.jpg', 4, '2023-04-17 02:01:50', '0000-00-00 00:00:00', '1'),
(958, '51671681686110.jpg', 5, '2023-04-17 02:01:50', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statu` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-09-14 18:11:48', '2022-09-14 18:11:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-09-14 18:11:48', '2022-09-14 18:11:48', 'voyager.dashboard', NULL),
(2, 1, 'Arşiv', '', '_self', 'voyager-images', '#000000', NULL, 3, '2022-09-14 18:11:48', '2022-09-17 06:09:06', 'voyager.media.index', 'null'),
(3, 1, 'Kullanıcılar', '', '_self', 'voyager-person', '#000000', 25, 1, '2022-09-14 18:11:48', '2022-09-17 06:09:03', 'voyager.users.index', 'null'),
(4, 1, 'Roller', '', '_self', 'voyager-lock', '#000000', 25, 2, '2022-09-14 18:11:48', '2022-09-17 06:09:06', 'voyager.roles.index', 'null'),
(5, 1, 'Araçlar', '', '_self', 'voyager-tools', '#000000', NULL, 6, '2022-09-14 18:11:48', '2022-09-17 06:09:06', NULL, ''),
(6, 1, 'Panel Menü Düzenleme', '', '_self', 'voyager-list', '#000000', 25, 4, '2022-09-14 18:11:48', '2022-09-17 06:13:47', 'voyager.menus.index', 'null'),
(7, 1, 'Veritabanı Ayarları', '', '_self', 'voyager-data', '#000000', 25, 5, '2022-09-14 18:11:48', '2022-09-17 06:13:02', 'voyager.database.index', 'null'),
(8, 1, 'Komut Oluşturucu', '', '_self', 'voyager-compass', '#000000', 25, 6, '2022-09-14 18:11:48', '2022-09-17 06:13:59', 'voyager.compass.index', 'null'),
(9, 1, 'Model Oluşturucu', '', '_self', 'voyager-bread', '#000000', 25, 7, '2022-09-14 18:11:48', '2022-09-17 06:14:17', 'voyager.bread.index', 'null'),
(10, 1, 'Genel Ayarlar', '', '_self', 'voyager-settings', '#000000', 25, 3, '2022-09-14 18:11:48', '2022-09-17 06:10:51', 'voyager.settings.index', 'null'),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 4, '2022-09-14 18:11:49', '2022-09-17 06:09:06', 'voyager.posts.index', NULL),
(13, 1, 'Sayfalar', '', '_self', 'voyager-file-text', '#000000', NULL, 5, '2022-09-14 18:11:49', '2022-09-17 06:09:06', 'voyager.pages.index', 'null'),
(15, 1, 'Ürünler', '', '_self', 'voyager-medal-rank-star', '#000000', NULL, 7, '2022-09-16 16:09:07', '2022-09-17 06:20:22', 'voyager.products.index', 'null'),
(18, 1, 'Ürün Kategorileri', '', '_self', NULL, '#000000', NULL, 13, '2022-09-16 18:47:44', '2022-09-17 06:09:36', 'voyager.product-categories.index', 'null'),
(19, 1, 'Ürün Fotoğrafları', '', '_self', 'voyager-photo', '#000000', NULL, 11, '2022-09-16 19:06:52', '2022-09-17 06:23:01', 'voyager.galleries.index', 'null'),
(21, 1, 'Product Options', '', '_self', NULL, NULL, NULL, 12, '2022-09-16 19:19:32', '2022-09-17 06:09:36', 'voyager.product-options.index', NULL),
(22, 1, 'Seçenekler', '', '_self', 'voyager-wand', '#000000', NULL, 9, '2022-09-16 19:21:24', '2022-09-17 06:22:37', 'voyager.options.index', 'null'),
(23, 1, 'Alt Seçenekler', '', '_self', 'voyager-wand', '#000000', NULL, 10, '2022-09-16 19:23:30', '2022-09-17 06:22:43', 'voyager.suboptions.index', 'null'),
(24, 1, 'Kategoriler', '', '_self', 'voyager-harddrive', '#000000', NULL, 8, '2022-09-16 19:35:25', '2022-09-17 06:22:05', 'voyager.categories.index', 'null'),
(25, 1, 'Yönetim', '#', '_self', 'voyager-tools', '#000000', NULL, 2, '2022-09-17 06:05:40', '2022-09-17 06:08:36', NULL, ''),
(26, 1, 'Navigations', '', '_self', NULL, NULL, NULL, 14, '2022-09-24 08:18:27', '2022-09-24 08:18:27', 'voyager.navigations.index', NULL),
(27, 1, 'Sliders', '', '_self', NULL, NULL, NULL, 15, '2022-09-24 20:48:51', '2022-09-24 20:48:51', 'voyager.sliders.index', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2016_01_01_000000_create_pages_table', 2),
(26, '2016_01_01_000000_create_posts_table', 2),
(27, '2016_02_15_204651_create_categories_table', 2),
(28, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `navigations`
--

CREATE TABLE `navigations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `navigations`
--

INSERT INTO `navigations` (`id`, `title`, `slug`, `color`, `number`, `parent`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anasayfa', '/', NULL, 1, NULL, NULL, '2022-09-24 08:21:49', '2022-09-24 08:21:49', NULL),
(2, 'Koleksiyon', '#', NULL, 2, NULL, NULL, '2022-09-24 08:22:00', '2022-11-20 16:16:22', NULL),
(3, 'Yeni Sezon', 'newseason', NULL, 3, NULL, NULL, '2022-09-24 08:22:32', '2022-09-24 08:22:32', NULL),
(4, 'Hakkımızda', 'about', NULL, 4, NULL, NULL, '2022-09-24 08:22:49', '2022-09-24 08:22:49', NULL),
(5, 'Erkek Kış Koleksiyonu', 'collection/erkek-kis-koleksiyonu', NULL, NULL, 2, NULL, '2022-09-24 08:29:14', '2022-09-24 08:29:14', NULL),
(6, 'Kadın Kış Koleksiyonu', 'collection/kadin-kis-koleksiyonu', NULL, NULL, 2, NULL, '2022-09-24 13:01:00', '2022-09-24 13:01:33', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statu` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`id`, `title`, `statu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Renk', 1, NULL, NULL, NULL),
(11, 'Beden', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_tax` float NOT NULL,
  `order_ship_name` varchar(32) NOT NULL,
  `order_ship_surname` varchar(32) NOT NULL,
  `order_ship_email` varchar(32) NOT NULL,
  `order_ship_phone` varchar(32) NOT NULL,
  `order_ship_city` varchar(32) NOT NULL,
  `order_ship_district` varchar(32) NOT NULL,
  `order_ship_address` text NOT NULL,
  `order_ship_type` varchar(32) DEFAULT NULL,
  `order_ship_tracking_number` varchar(32) DEFAULT NULL,
  `order_ship_price` float DEFAULT NULL,
  `order_coupon_code` varchar(32) DEFAULT NULL,
  `order_coupon_type` varchar(32) DEFAULT NULL,
  `order_coupon_discount` float DEFAULT NULL,
  `order_payment_type` varchar(32) DEFAULT NULL,
  `order_statu` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `order_amount`, `order_tax`, `order_ship_name`, `order_ship_surname`, `order_ship_email`, `order_ship_phone`, `order_ship_city`, `order_ship_district`, `order_ship_address`, `order_ship_type`, `order_ship_tracking_number`, `order_ship_price`, `order_coupon_code`, `order_coupon_type`, `order_coupon_discount`, `order_payment_type`, `order_statu`, `created_at`) VALUES
(4, '4413447', 1, 1998, 0, 'Talha', 'Polat', 'talhapolat@hotmail.com', '5316870777', 'istanbul', 'beyoğlu', 'kaptanpaşa mah 153', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-04-22'),
(5, '7745696', 1, 799, 0, 'talha', 'polat', 'talhapoatq@hotmail.com', '5316549877', 'istanbul', 'beyoğlu', 'sdfsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-04-22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` varchar(32) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(32) NOT NULL,
  `product_image` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_tax` float DEFAULT NULL,
  `product_discount` float DEFAULT NULL,
  `product_coupon` varchar(32) DEFAULT NULL,
  `product_option1` varchar(32) DEFAULT NULL,
  `product_option2` varchar(32) DEFAULT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `order_number`, `product_id`, `product_title`, `product_image`, `product_quantity`, `product_price`, `product_tax`, `product_discount`, `product_coupon`, `product_option1`, `product_option2`, `statu`) VALUES
(5, 4, '4413447', 80, 'Neck Tişört', 'http://127.0.0.1:8000/storage/galleries/15121681685090.jpg', 1, 799, NULL, NULL, NULL, 'Beyaz', 'S', 0),
(6, 4, '4413447', 82, 'Baseball Jacket', 'http://127.0.0.1:8000/storage/galleries/13701681070197.jpg', 1, 1199, NULL, NULL, NULL, '', '', 0),
(7, 5, '7745696', 80, 'Neck Tişört', 'http://127.0.0.1:8000/storage/galleries/15121681685090.jpg', 1, 799, NULL, NULL, NULL, 'Beyaz', 'S', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-09-14 18:11:49', '2022-09-14 18:11:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(2, 'browse_bread', NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(3, 'browse_database', NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(4, 'browse_media', NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(5, 'browse_compass', NULL, '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(6, 'browse_menus', 'menus', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(7, 'read_menus', 'menus', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(8, 'edit_menus', 'menus', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(9, 'add_menus', 'menus', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(10, 'delete_menus', 'menus', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(11, 'browse_roles', 'roles', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(12, 'read_roles', 'roles', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(13, 'edit_roles', 'roles', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(14, 'add_roles', 'roles', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(15, 'delete_roles', 'roles', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(16, 'browse_users', 'users', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(17, 'read_users', 'users', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(18, 'edit_users', 'users', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(19, 'add_users', 'users', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(20, 'delete_users', 'users', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(21, 'browse_settings', 'settings', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(22, 'read_settings', 'settings', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(23, 'edit_settings', 'settings', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(24, 'add_settings', 'settings', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(25, 'delete_settings', 'settings', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(31, 'browse_posts', 'posts', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(32, 'read_posts', 'posts', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(33, 'edit_posts', 'posts', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(34, 'add_posts', 'posts', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(35, 'delete_posts', 'posts', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(36, 'browse_pages', 'pages', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(37, 'read_pages', 'pages', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(38, 'edit_pages', 'pages', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(39, 'add_pages', 'pages', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(40, 'delete_pages', 'pages', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(46, 'browse_products', 'products', '2022-09-16 16:09:07', '2022-09-16 16:09:07'),
(47, 'read_products', 'products', '2022-09-16 16:09:07', '2022-09-16 16:09:07'),
(48, 'edit_products', 'products', '2022-09-16 16:09:07', '2022-09-16 16:09:07'),
(49, 'add_products', 'products', '2022-09-16 16:09:07', '2022-09-16 16:09:07'),
(50, 'delete_products', 'products', '2022-09-16 16:09:07', '2022-09-16 16:09:07'),
(51, 'browse_product_categories', 'product_categories', '2022-09-16 18:47:44', '2022-09-16 18:47:44'),
(52, 'read_product_categories', 'product_categories', '2022-09-16 18:47:44', '2022-09-16 18:47:44'),
(53, 'edit_product_categories', 'product_categories', '2022-09-16 18:47:44', '2022-09-16 18:47:44'),
(54, 'add_product_categories', 'product_categories', '2022-09-16 18:47:44', '2022-09-16 18:47:44'),
(55, 'delete_product_categories', 'product_categories', '2022-09-16 18:47:44', '2022-09-16 18:47:44'),
(56, 'browse_galleries', 'galleries', '2022-09-16 19:06:52', '2022-09-16 19:06:52'),
(57, 'read_galleries', 'galleries', '2022-09-16 19:06:52', '2022-09-16 19:06:52'),
(58, 'edit_galleries', 'galleries', '2022-09-16 19:06:52', '2022-09-16 19:06:52'),
(59, 'add_galleries', 'galleries', '2022-09-16 19:06:52', '2022-09-16 19:06:52'),
(60, 'delete_galleries', 'galleries', '2022-09-16 19:06:52', '2022-09-16 19:06:52'),
(66, 'browse_product_options', 'product_options', '2022-09-16 19:19:32', '2022-09-16 19:19:32'),
(67, 'read_product_options', 'product_options', '2022-09-16 19:19:32', '2022-09-16 19:19:32'),
(68, 'edit_product_options', 'product_options', '2022-09-16 19:19:32', '2022-09-16 19:19:32'),
(69, 'add_product_options', 'product_options', '2022-09-16 19:19:32', '2022-09-16 19:19:32'),
(70, 'delete_product_options', 'product_options', '2022-09-16 19:19:32', '2022-09-16 19:19:32'),
(71, 'browse_options', 'options', '2022-09-16 19:21:24', '2022-09-16 19:21:24'),
(72, 'read_options', 'options', '2022-09-16 19:21:24', '2022-09-16 19:21:24'),
(73, 'edit_options', 'options', '2022-09-16 19:21:24', '2022-09-16 19:21:24'),
(74, 'add_options', 'options', '2022-09-16 19:21:24', '2022-09-16 19:21:24'),
(75, 'delete_options', 'options', '2022-09-16 19:21:24', '2022-09-16 19:21:24'),
(76, 'browse_suboptions', 'suboptions', '2022-09-16 19:23:30', '2022-09-16 19:23:30'),
(77, 'read_suboptions', 'suboptions', '2022-09-16 19:23:30', '2022-09-16 19:23:30'),
(78, 'edit_suboptions', 'suboptions', '2022-09-16 19:23:30', '2022-09-16 19:23:30'),
(79, 'add_suboptions', 'suboptions', '2022-09-16 19:23:30', '2022-09-16 19:23:30'),
(80, 'delete_suboptions', 'suboptions', '2022-09-16 19:23:30', '2022-09-16 19:23:30'),
(81, 'browse_categories', 'categories', '2022-09-16 19:35:25', '2022-09-16 19:35:25'),
(82, 'read_categories', 'categories', '2022-09-16 19:35:25', '2022-09-16 19:35:25'),
(83, 'edit_categories', 'categories', '2022-09-16 19:35:25', '2022-09-16 19:35:25'),
(84, 'add_categories', 'categories', '2022-09-16 19:35:25', '2022-09-16 19:35:25'),
(85, 'delete_categories', 'categories', '2022-09-16 19:35:25', '2022-09-16 19:35:25'),
(86, 'browse_navigations', 'navigations', '2022-09-24 08:18:27', '2022-09-24 08:18:27'),
(87, 'read_navigations', 'navigations', '2022-09-24 08:18:27', '2022-09-24 08:18:27'),
(88, 'edit_navigations', 'navigations', '2022-09-24 08:18:27', '2022-09-24 08:18:27'),
(89, 'add_navigations', 'navigations', '2022-09-24 08:18:27', '2022-09-24 08:18:27'),
(90, 'delete_navigations', 'navigations', '2022-09-24 08:18:27', '2022-09-24 08:18:27'),
(91, 'browse_sliders', 'sliders', '2022-09-24 20:48:51', '2022-09-24 20:48:51'),
(92, 'read_sliders', 'sliders', '2022-09-24 20:48:51', '2022-09-24 20:48:51'),
(93, 'edit_sliders', 'sliders', '2022-09-24 20:48:51', '2022-09-24 20:48:51'),
(94, 'add_sliders', 'sliders', '2022-09-24 20:48:51', '2022-09-24 20:48:51'),
(95, 'delete_sliders', 'sliders', '2022-09-24 20:48:51', '2022-09-24 20:48:51'),
(96, 'browse_media', 'media', '2022-12-01 17:46:44', '2022-12-01 17:46:44'),
(97, 'read_media', 'media', '2022-12-01 17:46:44', '2022-12-01 17:46:44'),
(98, 'edit_media', 'media', '2022-12-01 17:46:44', '2022-12-01 17:46:44'),
(99, 'add_media', 'media', '2022-12-01 17:46:44', '2022-12-01 17:46:44'),
(100, 'delete_media', 'media', '2022-12-01 17:46:44', '2022-12-01 17:46:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-09-14 18:11:49', '2022-09-14 18:11:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortDesc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longDesc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` int(11) NOT NULL,
  `statu` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `shortDesc`, `longDesc`, `price`, `sale_price`, `slug`, `brand_id`, `product_keyword`, `product_type`, `statu`, `created_at`, `updated_at`, `deleted_at`, `no`) VALUES
(80, 'Neck Tişört', '22711681685042.jpg', NULL, '<p><br></p>', 799, NULL, 'neck-tshirt', 0, NULL, 1, 1, '2023-04-16 22:45:19', NULL, NULL, NULL),
(81, 'Jogger Pantolon', '15721681685446.jpg', NULL, '<p><br></p>', 699, NULL, 'jogger-pantolon', 0, NULL, 1, 1, '2023-04-16 22:52:12', NULL, NULL, NULL),
(82, 'Baseball Jacket', '13701681070197.jpg', NULL, '<p><br></p>', 1199, NULL, 'basball-jacket', 0, NULL, 1, 1, '2023-04-16 22:53:12', NULL, NULL, NULL),
(83, 'Coach Saat', '1511681070592.jpg', NULL, '<p><br></p>', 2999, NULL, 'coach-saat', 0, NULL, 1, 1, '2023-04-16 22:54:04', NULL, NULL, NULL),
(84, 'Kot Etek', '11401681685783.jpg', NULL, '<p><br></p>', 599, NULL, 'kot-etek', 0, NULL, 1, 1, '2023-04-16 22:56:41', NULL, NULL, NULL),
(85, 'Kapüşonlu Sweatshirt', '1141681685952.jpg', NULL, '<p><br></p>', 999, NULL, 'kapusonlu-sweatshirt', 0, NULL, 1, 1, '2023-04-16 23:00:33', NULL, NULL, NULL),
(86, 'Deri Çanta', '13101681253695.jpg', NULL, '<p><br></p>', 3999, NULL, 'deri-canta', 0, NULL, 1, 1, '2023-04-16 23:01:25', NULL, NULL, NULL),
(87, 'Monogram Hoodie', '15471681686110.jpg', NULL, '<p><br></p>', 1299, NULL, 'monogram-hoodie', 0, NULL, 1, 1, '2023-04-16 23:02:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(90, 80, 11, '2023-04-09 18:39:18', NULL, NULL),
(91, 81, 10, '2023-04-09 19:27:26', NULL, NULL),
(92, 84, 9, '2023-04-09 20:05:46', NULL, NULL),
(93, 85, 3, '2023-04-09 20:09:35', NULL, NULL),
(94, 86, 10, '2023-04-11 22:54:55', NULL, NULL),
(95, 87, 8, '2023-04-14 22:33:10', NULL, NULL),
(103, 83, 26, '2023-04-16 22:55:47', NULL, NULL),
(104, 86, 26, '2023-04-16 23:01:25', NULL, NULL),
(105, 87, 6, '2023-04-16 23:02:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_media`
--

CREATE TABLE `product_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `option_id`, `media_id`, `no`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3059, 80, 29, 940, 1, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3060, 80, 29, 941, 2, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3061, 80, 29, 942, 3, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3062, 80, 29, 943, 4, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3063, 80, 30, 936, 1, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3064, 80, 30, 937, 2, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3065, 80, 30, 938, 3, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3066, 80, 30, 939, 4, NULL, '2023-04-16 22:46:33', NULL, NULL),
(3077, 81, 30, 944, 1, NULL, '2023-04-16 22:52:12', NULL, NULL),
(3078, 81, 30, 945, 2, NULL, '2023-04-16 22:52:12', NULL, NULL),
(3085, 82, NULL, 798, 1, NULL, '2023-04-16 22:53:12', NULL, NULL),
(3086, 82, NULL, 802, 2, NULL, '2023-04-16 22:53:12', NULL, NULL),
(3087, 82, NULL, 803, 3, NULL, '2023-04-16 22:53:12', NULL, NULL),
(3089, 83, 30, 816, 1, NULL, '2023-04-16 22:55:47', NULL, NULL),
(3092, 84, NULL, 946, 1, NULL, '2023-04-16 22:56:41', NULL, NULL),
(3107, 85, 30, 949, 5, NULL, '2023-04-16 23:00:33', NULL, NULL),
(3108, 85, 30, 950, 1, NULL, '2023-04-16 23:00:33', NULL, NULL),
(3109, 85, 30, 951, 1, NULL, '2023-04-16 23:00:33', NULL, NULL),
(3110, 85, 30, 952, 1, NULL, '2023-04-16 23:00:33', NULL, NULL),
(3111, 85, 30, 953, 1, NULL, '2023-04-16 23:00:33', NULL, NULL),
(3112, 86, NULL, 826, 1, NULL, '2023-04-16 23:01:25', NULL, NULL),
(3128, 87, 30, 954, 5, NULL, '2023-04-16 23:02:38', NULL, NULL),
(3129, 87, 30, 955, 1, NULL, '2023-04-16 23:02:38', NULL, NULL),
(3130, 87, 30, 956, 1, NULL, '2023-04-16 23:02:38', NULL, NULL),
(3131, 87, 30, 957, 1, NULL, '2023-04-16 23:02:38', NULL, NULL),
(3132, 87, 30, 958, 1, NULL, '2023-04-16 23:02:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_options`
--

CREATE TABLE `product_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `suboption1` int(11) NOT NULL,
  `suboption2` int(11) DEFAULT NULL,
  `no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `suboption1`, `suboption2`, `no`, `created_at`, `updated_at`, `deleted_at`, `qty`, `number`) VALUES
(2089, 80, 29, 35, 0, NULL, NULL, NULL, NULL, NULL),
(2090, 80, 29, 36, 1, NULL, NULL, NULL, NULL, NULL),
(2091, 80, 29, 37, 2, NULL, NULL, NULL, NULL, NULL),
(2092, 80, 29, 38, 3, NULL, NULL, NULL, NULL, NULL),
(2093, 80, 30, 35, 0, NULL, NULL, NULL, NULL, NULL),
(2094, 80, 30, 36, 1, NULL, NULL, NULL, NULL, NULL),
(2095, 80, 30, 37, 2, NULL, NULL, NULL, NULL, NULL),
(2096, 80, 30, 38, 3, NULL, NULL, NULL, NULL, NULL),
(2103, 81, 30, 35, 0, NULL, NULL, NULL, NULL, NULL),
(2104, 81, 30, 36, 1, NULL, NULL, NULL, NULL, NULL),
(2105, 81, 30, 37, 2, NULL, NULL, NULL, NULL, NULL),
(2107, 83, 30, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(2108, 85, 30, 35, 0, NULL, NULL, NULL, NULL, NULL),
(2109, 85, 30, 36, 1, NULL, NULL, NULL, NULL, NULL),
(2110, 85, 30, 37, 2, NULL, NULL, NULL, NULL, NULL),
(2111, 85, 30, 38, 3, NULL, NULL, NULL, NULL, NULL),
(2112, 87, 30, 34, 0, NULL, NULL, NULL, NULL, NULL),
(2113, 87, 30, 35, 1, NULL, NULL, NULL, NULL, NULL),
(2114, 87, 30, 36, 2, NULL, NULL, NULL, NULL, NULL),
(2115, 87, 30, 37, 3, NULL, NULL, NULL, NULL, NULL),
(2116, 87, 30, 38, 4, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(11) NOT NULL,
  `product` int(5) NOT NULL,
  `tag` int(3) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product_tags`
--

INSERT INTO `product_tags` (`id`, `product`, `tag`, `created_at`) VALUES
(49, 80, 1, '2023-04-09'),
(50, 80, 3, '2023-04-15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-09-14 18:11:48', '2022-09-14 18:11:48'),
(2, 'user', 'Normal User', '2022-09-14 18:11:48', '2022-09-14 18:11:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'AHLAT', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', NULL, '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.statu', 'Mağaza Durumu', '1', NULL, '', 1, NULL),
(5, 'site.language', 'Mağaza Dili', '1', NULL, '', 1, NULL),
(6, 'site.currency', 'Para Birimi', '1', NULL, '', 1, NULL),
(7, 'site.phone', 'İletişim Numarası', '444 5 444', NULL, '', 1, NULL),
(8, 'site.name', 'Ad', 'TALHA', NULL, '', 1, NULL),
(9, 'site.surname', 'Soyad', 'POLAT', NULL, '', 1, NULL),
(10, 'site.companyname', 'Şirket Unvanı', 'AHLAT YAZILIM A.Ş.', NULL, '', 1, NULL),
(11, 'site.taxnumber', 'Vergi Numarası', '26541205284', NULL, '', 1, NULL),
(12, 'site.taxoffice', 'Vergi Dairesi', 'ŞİŞLİ', NULL, '', 1, NULL),
(13, 'site.country', 'Ülke', '1', NULL, '', 1, NULL),
(14, 'site.city', 'Şehir', '1', NULL, '', 1, NULL),
(15, 'site.district', 'İlçe', '1', NULL, '', 1, NULL),
(16, 'site.address', 'Adres', 'KAPTANPAŞA MAH REİS SOK NO 15 BEYOĞLU İSTANBUL', NULL, '', 1, NULL),
(17, 'site.postcode', 'Posta Kodu', '34420', NULL, '', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `first`, `second`, `third`, `button`, `url`, `created_at`, `updated_at`, `deleted_at`, `number`, `active`) VALUES
(1, 'sliders/September2022/UzlqIZsMNEoUof0d0X30.jpg', 'Birinci Başlık', 'İkince Başlık', 'Üçüncü Başlık', 'Buton', NULL, '2022-09-24 20:50:00', '2022-09-24 20:53:10', NULL, 1, 1),
(2, 'sliders/September2022/logiBHcTpqGjjVJZbr7y.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-24 20:50:00', '2022-09-25 06:48:59', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suboptions`
--

CREATE TABLE `suboptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statu` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `suboptions`
--

INSERT INTO `suboptions` (`id`, `option_id`, `title`, `statu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 10, 'Beyaz', 1, '2023-04-09 18:34:09', NULL, NULL),
(30, 10, 'Siyah', 1, '2023-04-09 18:34:20', NULL, NULL),
(31, 10, 'Kırmızı', 1, '2023-04-09 18:35:18', NULL, NULL),
(32, 10, 'Turuncu', 1, '2023-04-09 18:36:19', NULL, NULL),
(34, 11, 'XS', 1, '2023-04-09 18:36:48', NULL, NULL),
(35, 11, 'S', 1, '2023-04-09 18:36:53', NULL, NULL),
(36, 11, 'M', 1, '2023-04-09 18:36:59', NULL, NULL),
(37, 11, 'L', 1, '2023-04-09 18:37:04', NULL, NULL),
(38, 11, 'XL', 1, '2023-04-09 18:37:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `statu` int(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`id`, `title`, `statu`, `created_at`) VALUES
(1, 'Hediyelik', 1, '2022-12-11'),
(2, 'Yılbaşı', 1, '2022-12-11'),
(3, 'Anneler Günü', 1, '2022-12-11'),
(4, 'Vintage', 1, '2022-12-11'),
(5, 'Büyük Beden', 1, '2022-12-11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-09-14 18:11:49', '2022-09-14 18:11:49'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-09-14 18:11:49', '2022-09-14 18:11:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `city` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` int(11) NOT NULL,
  `bmonth` int(11) NOT NULL,
  `byear` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statu` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `surname`, `email`, `phone`, `gender`, `city`, `bday`, `bmonth`, `byear`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `statu`, `created_at`, `updated_at`) VALUES
(1, 1, 'Talha', 'Polat', 'talhapolat@hotmail.com', '5316870777', 1, 'istanbul', 4, 1, 1997, 'users/default.png', NULL, '$2y$10$mkoxRgwvxkJ8zvX4y7vULe4HK779AMmW2V7Rsy1AnLNyYiEmX3QY6', 'RM6M9E1CdUmFe7JYJ5AzC6k6Shh0xeu0g7MEQqRpzTmAU9zNUGAjywlHLopJ', '{\"locale\":\"tr\"}', 1, '2022-09-14 18:11:49', '2022-09-17 03:33:57'),
(3, 1, 'admin', '', 'admin@admin.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '$2y$10$KTwswGm0KsZ0r1g2BIzx/u.9Rl1bfRA.DghsvHbjM6tb12tEPeaom', NULL, '{\"locale\":\"tr\"}', 1, '2022-09-17 06:07:40', '2022-09-17 06:07:40'),
(9, NULL, 'asdas', 'dasd', 'masdehmetyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(10, NULL, 'asdas', 'dasd', 'masdehmasdetyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(13, NULL, 'asdas', 'dasd', 'masdehmasdetyilmazc@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(15, NULL, 'qweqw', 'eqwe', 'masdehmddasdetyilmazc@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(17, NULL, 'asda', 'sdasd', 'mehm33etyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(19, NULL, 'Mert', 'Kakoz', 'mertkako@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(20, NULL, 'Yusuf', 'Erdoğan', 'yusuferdo@hotmail.lcom', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(22, NULL, 'Tuğrul', 'Demirci', 'tugrul@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '302010', NULL, NULL, 1, NULL, NULL),
(24, NULL, 'Tuğrul', 'Demirci', 'tugreul@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '302010', NULL, NULL, 1, NULL, NULL),
(25, NULL, 'Aslı', 'Kayan', 'aslikayan@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '302010', NULL, NULL, 1, NULL, NULL),
(26, NULL, 'uuu', 'fsdf', 'eemehmetyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(27, NULL, 'fghfghf', 'fghfg', 'mehm456etyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '234234', NULL, NULL, 1, NULL, NULL),
(28, NULL, 'gjghjg', 'jghjghh', 'mehme7788tyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '234234', NULL, NULL, 1, NULL, NULL),
(29, NULL, 'dfgdfgd', 'fgdfg', 'mehmetkkjyilmaz@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '345345', NULL, NULL, 1, NULL, NULL),
(31, NULL, 'ghj', 'ghj', 'ghj@dfg.dfg', '', 0, '', 0, 0, 0, 'users/default.png', NULL, 'dfg', NULL, NULL, 1, NULL, NULL),
(32, NULL, 'ghj', 'ghj', 'gh7j@dfg.dfg', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '5', NULL, NULL, 1, NULL, NULL),
(33, NULL, 'fhfh', 'fghfgh', 'fgfh@hot.fgh', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(34, NULL, 'hjk', 'hjk', 'fg45699fh@hot.fgh', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(45, NULL, 'dfg', 'dfg', 'dfg@sff.sdff', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(46, NULL, 'dfg', 'dfgf', 'dfg@sff.sdffr', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(47, NULL, 'dfg', 'dfgdfg', 'dfgdddg@sff.sdff', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(48, NULL, 'dfgdff', 'dfg', 'dffffg@sff.sdff', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(49, NULL, 'erterte', 'rter', 'dfgc@sff.sdff', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '123123', NULL, NULL, 1, NULL, NULL),
(50, NULL, 'Kamil', 'Kuru', 'kamilkuru@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(51, NULL, 'Ragıp', 'Karama', 'ragip@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(52, NULL, 'Samet', 'Baş', 'samet@hotmail.co', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(53, NULL, 'Metin', 'Yıldız', 'metin@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(54, NULL, 'Metin', 'Yıldız', 'metin@gmail.comm', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '30201090', NULL, NULL, 1, NULL, NULL),
(55, NULL, 'Canan', 'Balcı', 'canan@hotmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '$2y$10$zI8KxKyLbmpmQphOSKKm1Ooc1Z72cXLsM7028gG00Smsr3x5UvIeO', NULL, NULL, 1, NULL, NULL),
(56, NULL, 'Deniz', 'Tarak', 'deniztarka@gmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '$2y$10$pyeqgrXSqLUfvYW2BCNTvuX3IOcK4XBcSqawIBxdGl1TIDJE2lZIy', NULL, NULL, 1, NULL, NULL),
(57, NULL, 'Mithat', 'Kara', 'mithat@hotmail.com', '', 0, '', 0, 0, 0, 'users/default.png', NULL, '$2y$10$9bQ4G2v1Z8FmUk3p9xu66eqz10OkSO8AWUeM1CJ.pyZBd.mP2Xo6G', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(3, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Tablo için indeksler `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Tablo için indeksler `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Tablo için indeksler `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Tablo için indeksler `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`);

--
-- Tablo için indeksler `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Tablo için indeksler `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `suboptions`
--
ALTER TABLE `suboptions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- Tablo için AUTO_INCREMENT değeri `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=959;

--
-- Tablo için AUTO_INCREMENT değeri `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Tablo için AUTO_INCREMENT değeri `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3133;

--
-- Tablo için AUTO_INCREMENT değeri `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2117;

--
-- Tablo için AUTO_INCREMENT değeri `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Tablo kısıtlamaları `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
