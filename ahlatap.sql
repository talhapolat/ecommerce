-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Eki 2022, 22:59:59
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.4

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
(2, 'Trençkot', 1, 11, NULL, 'trenckot', 1, '2022-09-14 18:35:00', '2022-09-17 03:49:35', NULL),
(3, 'Tişört', 1, 12, NULL, NULL, 1, '2022-09-17 03:36:32', '2022-09-17 03:49:35', NULL),
(4, 'ERKEK', NULL, 1, NULL, 'erkek', 1, '2022-09-17 03:45:04', '2022-09-17 03:46:04', NULL),
(5, 'Kazak', 4, 4, NULL, NULL, 1, '2022-09-17 03:47:39', '2022-09-17 03:49:48', NULL),
(6, 'Sweat', 4, 5, NULL, NULL, 1, '2022-09-17 03:47:49', '2022-09-17 03:49:48', NULL),
(7, 'Ceket', 1, 6, NULL, NULL, 1, '2022-09-17 03:48:01', '2022-09-17 03:49:48', NULL),
(8, 'Ceket', 4, 7, NULL, NULL, 1, '2022-09-17 03:48:16', '2022-09-17 03:49:48', NULL),
(9, 'Etek', 1, 8, NULL, NULL, 1, '2022-09-17 03:48:33', '2022-09-17 03:49:48', NULL),
(10, 'Pantolon', 4, 9, NULL, NULL, 1, '2022-09-17 03:48:43', '2022-09-17 03:49:48', NULL),
(11, 'Tişört', 4, 10, NULL, NULL, 1, '2022-09-17 03:48:59', '2022-09-17 03:49:48', NULL),
(12, 'ÇOCUK', NULL, 3, NULL, 'cocuk', 1, '2022-09-17 03:49:13', '2022-09-17 03:49:48', NULL);

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
(162, 19, 'active', 'checkbox', 'Active', 0, 1, 1, 1, 1, 1, '{}', 12);

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
(13, 'product_options', 'product-options', 'Product Option', 'Product Options', NULL, 'App\\ProductOption', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:19:32', '2022-09-16 19:31:08'),
(14, 'options', 'options', 'Seçenek', 'Seçenekler', NULL, 'App\\Option', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:21:24', '2022-09-17 06:30:39'),
(15, 'suboptions', 'suboptions', 'Seçenek', 'Seçenekler', NULL, 'App\\Suboption', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:23:30', '2022-09-17 06:30:08'),
(17, 'categories', 'categories', 'Kategori', 'Kategoriler', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"no\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-16 19:35:25', '2022-09-17 03:44:25'),
(18, 'navigations', 'navigations', 'Navigation', 'Navigations', NULL, 'App\\Navigation', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"number\",\"order_display_column\":\"title\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-24 08:18:27', '2022-09-24 13:01:11'),
(19, 'sliders', 'sliders', 'Slider', 'Sliders', NULL, 'App\\Slider', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"number\",\"order_display_column\":\"image\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-09-24 20:48:51', '2022-09-24 20:52:58');

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

--
-- Tablo döküm verisi `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `no`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 'galleries\\September2022\\E4XCxO3ksc65XUuI3sYg.jpg', NULL, '2022-09-16 19:10:23', '2022-09-16 19:10:23', NULL),
(2, 4, NULL, 'galleries\\September2022\\ntGZxCCVZ8vyy2WnvYYw.jpg', NULL, '2022-09-26 19:20:25', '2022-09-26 19:20:25', NULL);

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
(2, 'Koleksiyon', 'collection', NULL, 2, NULL, NULL, '2022-09-24 08:22:10', '2022-09-24 08:22:10', NULL),
(3, 'Yeni Sezon', 'newseason', NULL, 3, NULL, NULL, '2022-09-24 08:22:32', '2022-09-24 08:22:32', NULL),
(4, 'Hakkımızda', 'about', NULL, 4, NULL, NULL, '2022-09-24 08:22:49', '2022-09-24 08:22:49', NULL),
(5, 'Erkek Kış Koleksiyonu', 'erkek-kis-koleksiyonu', NULL, NULL, 2, NULL, '2022-09-24 08:29:14', '2022-09-24 08:29:14', NULL),
(6, 'Kadın Kış Koleksiyonu', 'kadin-kis-koleksiyonu', NULL, NULL, 2, NULL, '2022-09-24 13:01:00', '2022-09-24 13:01:33', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Renk', '2022-09-16 19:24:31', '2022-09-16 19:24:31', NULL),
(2, 'Beden', '2022-09-16 19:24:37', '2022-09-16 19:24:37', NULL),
(3, 'Numara', '2022-09-16 19:24:42', '2022-09-16 19:24:42', NULL);

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
(95, 'delete_sliders', 'sliders', '2022-09-24 20:48:51', '2022-09-24 20:48:51');

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
(95, 1);

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
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `statu` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `shortDesc`, `longDesc`, `price`, `slug`, `brand_id`, `statu`, `created_at`, `updated_at`, `deleted_at`, `no`) VALUES
(2, 'Klasik Trençkot Kahve', 'products\\September2022\\o38V6BikQ9ZrBIf4v1C7.jpg', 'Klasik Yaka, Cep Detaylı, Beli Bağlamalı Trençkot', 'Klasik Yaka, Cep Detaylı, Beli Bağlamalı Trençkot Klasik Yaka, Cep Detaylı, Beli Bağlamalı Trençkot Klasik Yaka, Cep Detaylı, Beli Bağlamalı Trençkot Klasik Yaka, Cep Detaylı, Beli Bağlamalı Trençkot', 199, 'klasik-trenckot-kahve', NULL, 1, '2022-09-24 09:35:00', '2022-09-24 06:35:00', NULL, 1),
(3, 'Kaplan Figürlü Sweat', 'products\\September2022\\CFdzYWs5txSLzWbBaFmb.jpg', 'Kaplanlıııı', NULL, 399, 'kaplan-figurlu-sweat', NULL, 1, '2022-09-16 21:38:50', '2022-09-16 18:38:50', NULL, 2),
(4, 'Kot Etek', 'products\\September2022\\mREmaI1zj8uBka9LXWRP.jpg', 'güzel kot etek', NULL, 499, 'kot-etek', NULL, 1, '2022-09-26 19:08:51', '2022-09-26 19:08:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2022-09-16 18:48:00', '2022-09-16 18:49:04', NULL),
(4, 2, 2, '2022-09-25 18:25:11', '2022-09-25 18:25:11', NULL),
(5, 3, 5, '2022-10-02 17:29:22', '2022-10-02 17:37:25', NULL),
(6, 3, 10, '2022-10-02 18:47:36', '2022-10-02 18:47:36', NULL),
(7, 3, 3, '2022-10-02 19:07:55', '2022-10-02 19:07:55', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_options`
--

CREATE TABLE `product_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `suboption1` int(11) NOT NULL,
  `suboption2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `suboption1`, `suboption2`, `created_at`, `updated_at`, `deleted_at`, `qty`) VALUES
(3, 2, 2, NULL, '2022-09-25 18:17:18', '2022-09-26 18:03:41', NULL, 111),
(4, 3, 3, 1, '2022-09-26 10:20:31', '2022-09-26 10:20:31', NULL, 111),
(5, 3, 3, 2, '2022-09-26 10:21:03', '2022-09-26 10:21:03', NULL, 111),
(6, 3, 5, 2, '2022-09-26 10:21:34', '2022-09-26 10:21:34', NULL, 111),
(7, 2, 1, NULL, '2022-09-26 18:01:36', '2022-09-26 18:01:36', NULL, 55);

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
(2, 'site.description', 'Site Description', 'Admin Paneli', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'admin.google_analytics_tracking_id', 'Google Analytics Tracking ID', 'UA-181497555-1', '', 'text', 4, 'Admin'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'AHLAT', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\September2022\\kYrMNxSFudCZaFi3Z1e2.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', 'UA-181497555-1', '', 'text', 1, 'Admin');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `suboptions`
--

INSERT INTO `suboptions` (`id`, `option_id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Beyaz', '2022-09-16 19:24:52', '2022-09-16 19:24:52', NULL),
(2, 1, 'Siyah', '2022-09-16 19:25:27', '2022-09-16 19:25:27', NULL),
(3, 2, 'Small', '2022-09-16 19:25:38', '2022-09-16 19:25:38', NULL),
(5, 2, 'Large', '2022-09-25 18:16:56', '2022-09-25 18:16:56', NULL);

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Talha Polat', 'talhapolat@hotmail.com', 'users/default.png', NULL, '$2y$10$mkoxRgwvxkJ8zvX4y7vULe4HK779AMmW2V7Rsy1AnLNyYiEmX3QY6', 'QBa5ilqOvOUNprQR7a0ZOqP895W19rEKXE8vBPwrmIPxmjjR5w6mH5CGfgIZ', '{\"locale\":\"tr\"}', '2022-09-14 18:11:49', '2022-09-17 03:33:57'),
(3, 1, 'admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$KTwswGm0KsZ0r1g2BIzx/u.9Rl1bfRA.DghsvHbjM6tb12tEPeaom', NULL, '{\"locale\":\"tr\"}', '2022-09-17 06:07:40', '2022-09-17 06:07:40');

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
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`);

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
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Tablo için AUTO_INCREMENT değeri `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
