-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-10-28 12:32:48
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gdw`
--

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `taxonomy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slides` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `memberlogs`
--

CREATE TABLE IF NOT EXISTS `memberlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `member` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `members_period_id_foreign` (`period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `members`
--

INSERT INTO `members` (`id`, `name`, `period_id`, `username`, `password`, `email`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rock', 1, 'rock', '$2y$10$86YIO2kk3.tlRpc9g5xqMuz/h1kOSYcsFB/9AxSR2/tT01/yuWpZG', '1071040729@qq.com', '15212230025', 1, 'O6zuVEkHCrHX0bZfaNeT2w5m7dUYWZk4INGxW8um1LxtDrgYv49JS28yKZ9A', '2014-10-28 01:05:41', '2014-10-28 02:44:07');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_07_074524_create_comments_table', 1),
('2014_01_07_110953_create_posts_table', 1),
('2014_01_24_081136_create_categories_table', 1),
('2014_01_24_082114_create_products_table', 1),
('2014_02_05_110000_create_members_table', 1),
('2014_02_05_110433_create_periods_table', 1),
('2014_02_05_111309_create_transactions_table', 1),
('2014_02_05_131800_create_periods_transactions_table', 1),
('2014_02_05_132022_create_memberlogs_table', 1),
('2014_02_05_133328_add_foreignkeys_to_members_table', 1),
('2014_02_05_133547_add_foreignkeys_to_periodstransactions_table', 1),
('2014_02_10_030122_add_price_to_products_table', 1),
('2014_02_11_032932_add_slides_to_categories_table', 1),
('2014_02_12_074450_add_unit_to_products_table', 1),
('2014_02_19_062704_create_single_categories_table', 1),
('2014_02_21_063043_add_thumbnail_to_posts_table', 1),
('2014_03_04_072002_create_pm_table', 1),
('2014_03_04_095849_create_pm_user_table', 1),
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 2),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 2),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 2),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 2),
('2013_06_16_144920_create_permissions_table', 3);

-- --------------------------------------------------------

--
-- 表的结构 `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `periods`
--

INSERT INTO `periods` (`id`, `period`) VALUES
(1, 'October');

-- --------------------------------------------------------

--
-- 表的结构 `periods_transactions`
--

CREATE TABLE IF NOT EXISTS `periods_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period_id` int(10) unsigned NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `periods_transactions_period_id_foreign` (`period_id`),
  KEY `periods_transactions_transaction_id_foreign` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '["cpanel.view"]', '2014-10-21 23:17:20', '2014-10-21 23:17:20'),
(2, 'Users', '["users.view","users.create","users.update","users.delete"]', '2014-10-21 23:17:20', '2014-10-21 23:17:20'),
(3, 'Groups', '["groups.view","groups.create","groups.update","groups.delete"]', '2014-10-21 23:17:20', '2014-10-21 23:17:20'),
(4, 'Permissions', '["permissions.view","permissions.create","permissions.update","permissions.delete"]', '2014-10-21 23:17:20', '2014-10-21 23:17:20');

-- --------------------------------------------------------

--
-- 表的结构 `pms`
--

CREATE TABLE IF NOT EXISTS `pms` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `user1read` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `user2read` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `pm_user`
--

CREATE TABLE IF NOT EXISTS `pm_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `pubdate` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `style` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `specification` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `process` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL,
  `top_status` int(11) NOT NULL DEFAULT '0',
  `top_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `price` decimal(10,3) NOT NULL DEFAULT '0.000',
  `unit` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `single_categories`
--

CREATE TABLE IF NOT EXISTS `single_categories` (
  `object_id` bigint(20) NOT NULL DEFAULT '0',
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `category_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `main_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'tttt6399998@126.com', '$2y$10$jVfH7i6tXdsgrdQrI4SJAOqrrRdywWZl7DbAEP8AYMnUH5AktGxWe', '{"superuser":1}', 1, NULL, '2014-10-21 23:17:44', '2014-10-27 22:27:06', '$2y$10$yiDuKJz.RVka1yAgl6iWKeJMc/s1hBhM.Ixok0ztJqQOchisQQIX6', NULL, 'Rock', 'Zhang', '2014-10-21 23:17:44', '2014-10-27 22:27:06');

-- --------------------------------------------------------

--
-- 表的结构 `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 限制导出的表
--

--
-- 限制表 `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`);

--
-- 限制表 `periods_transactions`
--
ALTER TABLE `periods_transactions`
  ADD CONSTRAINT `periods_transactions_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  ADD CONSTRAINT `periods_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
