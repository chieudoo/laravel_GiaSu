-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 05:14 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrv12_giasu`
--

-- --------------------------------------------------------

--
-- Table structure for table `giasu_about`
--

CREATE TABLE `giasu_about` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci,
  `chinhsach` text COLLATE utf8_unicode_ci,
  `dichvu` text COLLATE utf8_unicode_ci,
  `lienhe` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_about`
--

INSERT INTO `giasu_about` (`id`, `phone1`, `phone2`, `address`, `gioithieu`, `chinhsach`, `dichvu`, `lienhe`, `created_at`, `updated_at`) VALUES
(1, '12345678901', '12324245646', 'P302 - Tòa nhà CT5D - KĐT Mễ Trì Hạ - Phạm Hùng - Nam Từ Liêm - Hà Nội', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, '2017-06-02 07:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `giasu_categories`
--

CREATE TABLE `giasu_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_categories`
--

INSERT INTO `giasu_categories` (`id`, `name`, `slug`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Tin Tức', 'tin-tuc', 1, 0, '2017-05-29 20:46:06', '2017-05-29 20:46:06'),
(2, 'Học Viên', 'hoc-vien', 1, 0, '2017-05-29 20:50:05', '2017-05-29 20:50:05'),
(3, 'Gia Sư', 'gia-su', 1, 0, '2017-05-29 20:50:11', '2017-05-29 20:50:11'),
(4, 'Góc Thảo Luận', 'goc-thao-luan', 1, 0, '2017-05-29 20:50:19', '2017-05-29 20:50:19'),
(5, 'Giới Thiệu', 'gioi-thieu', 1, 0, '2017-05-29 20:50:27', '2017-05-29 20:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `giasu_cauhoi`
--

CREATE TABLE `giasu_cauhoi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_file`
--

CREATE TABLE `giasu_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lop_id` int(11) NOT NULL,
  `mon_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_file`
--

INSERT INTO `giasu_file` (`id`, `name`, `lop_id`, `mon_id`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiếng Anh Basic', 1, 1, 'https://drive.google.com/file/d/0B7zSCMo7q9XMZWlrRTRiZjNpQ3c/view?usp=sharing', 1, '2017-05-30 19:23:10', '2017-05-29 17:09:34'),
(2, 'Toán Cơ Bản', 1, 2, 'https://www.facebook.com/', 1, '2017-05-30 08:13:44', '2017-05-30 09:10:52'),
(3, 'Toán Nâng Cao', 2, 3, 'https://github.com/imLuna/lrvGiasu', 1, '2017-05-30 09:11:46', '2017-05-30 09:11:46'),
(4, 'Tiếng Anh 2', 1, 1, 'https://github.com/imLuna/lrvGiasu', 1, '2017-05-30 09:14:05', '2017-05-30 09:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `giasu_giaovien`
--

CREATE TABLE `giasu_giaovien` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `hocvan` text COLLATE utf8_unicode_ci NOT NULL,
  `khanang` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `td` int(11) NOT NULL,
  `kn` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_hocvien`
--

CREATE TABLE `giasu_hocvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `yctd` int(11) NOT NULL,
  `ycgt` int(11) NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lop_id` int(11) NOT NULL,
  `mon_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_lophoc`
--

CREATE TABLE `giasu_lophoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_lophoc`
--

INSERT INTO `giasu_lophoc` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lớp 1', 'lop-1', 1, '2017-05-29 20:56:59', '2017-05-29 20:56:59'),
(2, 'Lớp 2', 'lop-2', 1, '2017-05-29 20:57:05', '2017-05-29 20:57:05'),
(3, 'Lớp 3', 'lop-3', 1, '2017-05-29 20:57:10', '2017-05-29 20:57:10'),
(4, 'Lơp 4', 'lop-4', 1, '2017-05-29 20:57:16', '2017-05-29 20:57:16'),
(5, 'Lớp 5', 'lop-5', 1, '2017-05-29 20:57:23', '2017-05-29 20:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `giasu_monhoc`
--

CREATE TABLE `giasu_monhoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lop_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_monhoc`
--

INSERT INTO `giasu_monhoc` (`id`, `name`, `slug`, `lop_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiếng Anh', 'tieng-anh', 1, 1, '2017-05-30 18:25:16', '2017-05-30 18:25:16'),
(2, 'Toán', 'toan', 1, 1, '2017-05-30 18:26:09', '2017-05-30 18:26:09'),
(3, 'Toán', 'toan', 2, 1, '2017-05-30 08:13:21', '2017-05-30 08:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `giasu_news`
--

CREATE TABLE `giasu_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_phancong`
--

CREATE TABLE `giasu_phancong` (
  `id` int(10) UNSIGNED NOT NULL,
  `hv_id` int(11) NOT NULL,
  `mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gv_id` int(11) NOT NULL,
  `ngay_bd` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `money` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sobuoi` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_slide`
--

CREATE TABLE `giasu_slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_users_admin`
--

CREATE TABLE `giasu_users_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_users_admin`
--

INSERT INTO `giasu_users_admin` (`id`, `name`, `email`, `status`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 0, '$2y$10$gnqeSdNZMAs6QQTk3c9Yw.MLn5GTEAiQHLR6/Eo0Qa//r7MwoLY6u', 'hpxBn3ApmPg5X6qsdlZbLi6bM5qWWQj92j2iB1iePTt3bNkyRZCwbumVzV8s', NULL, NULL),
(2, 'do van chieu', 'dovanchieu95@gmail.com', 1, 0, '$2y$10$auCFu4ssAby.Rg4gbiD9leu1kKlPNnAZI70gNl/4322GKsBiikKmW', 'OGqWsS6UtCd6EfiNWoXX9XcPdWopH9HMsWHuumfUn6YDBpR5JKLk7WlIyvr8', '2017-05-29 20:59:27', '2017-05-29 21:00:07'),
(4, 'chieu van', 'chieuth95@gmail.com', 1, 0, '$2y$10$Ow0/CpmOMhQy64DqS8Zc0O/uCsnR9EQS5vZPFwv3m0g3ywMWUMsoe', '8CekoqzAgCwKrPd7GiDgOewXmCOok93SljRot3DtUlqpUns1dJl2GPnAJWZN', '2017-05-30 07:47:36', '2017-05-30 07:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2017_04_24_151257_create_categories_table', 1),
(22, '2017_04_27_143033_create_news_table', 1),
(23, '2017_04_30_020036_create_thanhvien_table', 1),
(24, '2017_04_30_114407_create_class_table', 1),
(25, '2017_04_30_133115_create_monhoc_table', 1),
(26, '2017_05_03_041938_create_teacher_table', 1),
(27, '2017_05_05_035804_create_phancong_table', 1),
(28, '2017_05_18_004038_create_cauhoi_table', 1),
(29, '2017_05_22_232623_create_slide_table', 1),
(30, '2017_05_28_233842_create_file_table', 1),
(31, '2017_05_30_012938_create_about_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giasu_about`
--
ALTER TABLE `giasu_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_categories`
--
ALTER TABLE `giasu_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giasu_categories_name_unique` (`name`);

--
-- Indexes for table `giasu_cauhoi`
--
ALTER TABLE `giasu_cauhoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_file`
--
ALTER TABLE `giasu_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_giaovien`
--
ALTER TABLE `giasu_giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_hocvien`
--
ALTER TABLE `giasu_hocvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_lophoc`
--
ALTER TABLE `giasu_lophoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giasu_lophoc_name_unique` (`name`);

--
-- Indexes for table `giasu_monhoc`
--
ALTER TABLE `giasu_monhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_news`
--
ALTER TABLE `giasu_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giasu_news_name_unique` (`name`);

--
-- Indexes for table `giasu_phancong`
--
ALTER TABLE `giasu_phancong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_slide`
--
ALTER TABLE `giasu_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giasu_users_admin`
--
ALTER TABLE `giasu_users_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giasu_users_admin_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giasu_about`
--
ALTER TABLE `giasu_about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `giasu_categories`
--
ALTER TABLE `giasu_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `giasu_cauhoi`
--
ALTER TABLE `giasu_cauhoi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giasu_file`
--
ALTER TABLE `giasu_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `giasu_giaovien`
--
ALTER TABLE `giasu_giaovien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giasu_hocvien`
--
ALTER TABLE `giasu_hocvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giasu_lophoc`
--
ALTER TABLE `giasu_lophoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `giasu_monhoc`
--
ALTER TABLE `giasu_monhoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `giasu_news`
--
ALTER TABLE `giasu_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giasu_phancong`
--
ALTER TABLE `giasu_phancong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giasu_slide`
--
ALTER TABLE `giasu_slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giasu_users_admin`
--
ALTER TABLE `giasu_users_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
