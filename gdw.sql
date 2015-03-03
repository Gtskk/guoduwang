-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-03-03 08:39:25
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
-- 表的结构 `attentions`
--

CREATE TABLE IF NOT EXISTS `attentions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attentions_topic_id_index` (`topic_id`),
  KEY `attentions_member_id_index` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- 表的结构 `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `favorites_topic_id_index` (`topic_id`),
  KEY `favorites_member_id_index` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `front_assigned_roles`
--

CREATE TABLE IF NOT EXISTS `front_assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `front_assigned_roles_member_id_foreign` (`member_id`),
  KEY `front_assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `front_assigned_roles`
--

INSERT INTO `front_assigned_roles` (`id`, `member_id`, `role_id`) VALUES
(9, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `front_permissions`
--

CREATE TABLE IF NOT EXISTS `front_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `front_permissions`
--

INSERT INTO `front_permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'manage_users', '用户管理', '2015-03-03 07:36:00', '2015-03-03 07:36:00'),
(2, 'manage_topics', '话题管理', '2015-03-03 07:36:00', '2015-03-03 07:36:00');

-- --------------------------------------------------------

--
-- 表的结构 `front_permission_role`
--

CREATE TABLE IF NOT EXISTS `front_permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `front_permission_role_permission_id_foreign` (`permission_id`),
  KEY `front_permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `front_permission_role`
--

INSERT INTO `front_permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `front_roles`
--

CREATE TABLE IF NOT EXISTS `front_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `front_roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `front_roles`
--

INSERT INTO `front_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '管理员', '2015-03-03 07:36:00', '2015-03-03 07:36:00'),
(2, '作者', '2015-03-03 07:36:00', '2015-03-03 07:36:00');

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
-- 表的结构 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_count` int(11) NOT NULL DEFAULT '0',
  `reply_count` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `real_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `github_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `github_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github_id` int(11) DEFAULT NULL,
  `ghost_id` int(11) DEFAULT NULL,
  `ghost_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `personal_website` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `introduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `notification_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_username_unique` (`username`),
  UNIQUE KEY `members_email_unique` (`email`),
  UNIQUE KEY `members_phone_unique` (`phone`),
  KEY `topic_count` (`topic_count`,`reply_count`),
  KEY `members_github_id_index` (`github_id`),
  KEY `members_is_banned_index` (`is_banned`),
  KEY `members_ghost_id_index` (`ghost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `phone`, `image_url`, `topic_count`, `reply_count`, `password`, `confirmation_code`, `remember_token`, `is_banned`, `confirmed`, `real_name`, `github_name`, `github_url`, `github_id`, `ghost_id`, `ghost_name`, `company`, `city`, `personal_website`, `signature`, `introduction`, `created_at`, `updated_at`, `deleted_at`, `notification_count`) VALUES
(1, 'gtskk', 'tttt6399998@126.com', '15212230025', NULL, 0, 0, '$2y$10$Uz8Vvxy66Q5KoPgr9N0Ctu4iwUgwC/SlwXVNMCxJpTRDFw8vp7AnC', '6707b1779a7898496a5a906bfef822bc', NULL, 0, 0, '', '', NULL, NULL, NULL, '', '', '', '', '', '', '2015-03-03 07:19:32', '2015-03-03 07:19:32', NULL, 0);

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
('2013_06_16_144920_create_permissions_table', 3),
('2014_11_07_082629_confide_setup_users_table', 4),
('2015_01_05_022810_create_topics_table', 5),
('2015_01_05_023451_create_nodes_table', 5),
('2015_01_05_023507_create_replies_table', 5),
('2015_01_30_153126_create_votes_table', 6),
('2015_01_30_165901_create_attention_table', 7),
('2015_01_30_170328_create_favorites_table', 8),
('2015_01_30_172219_entrust_setup_tables', 8),
('2015_02_04_132720_add_deleted_at_to_members_table', 9),
('2015_02_04_142529_create_notifications_table', 10),
('2015_02_04_142721_add_notifications_field_to_user_table', 11),
('2015_02_05_102745_add_body_original_field_to_topics_table', 12),
('2015_02_05_103432_add_body_original_field_to_replies_table', 13),
('2015_02_06_162250_add_fields_to_members_table', 14),
('2015_02_09_132636_add_github_fields_to_members_table', 15),
('2015_02_10_163953_add_excerpt_field_to_topics_table', 16),
('2015_02_12_095401_add_ghost_fields_to_members_table', 17);

-- --------------------------------------------------------

--
-- 表的结构 `nodes`
--

CREATE TABLE IF NOT EXISTS `nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_node` smallint(6) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `topic_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `nodes_name_index` (`name`),
  KEY `nodes_slug_index` (`slug`),
  KEY `nodes_parent_node_index` (`parent_node`),
  KEY `nodes_topic_count_index` (`topic_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_member_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifications_from_memeber_id_index` (`from_member_id`),
  KEY `notifications_memeber_id_index` (`member_id`),
  KEY `notifications_topic_id_index` (`topic_id`),
  KEY `notifications_reply_id_index` (`reply_id`),
  KEY `notifications_type_index` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- 表的结构 `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  `vote_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `body_original` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `replies_user_id_index` (`member_id`),
  KEY `replies_topic_id_index` (`topic_id`),
  KEY `replies_is_block_index` (`is_block`),
  KEY `replies_vote_count_index` (`vote_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `is_excellent` tinyint(1) NOT NULL DEFAULT '0',
  `is_wiki` tinyint(1) NOT NULL DEFAULT '0',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `reply_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `favorite_count` int(11) NOT NULL DEFAULT '0',
  `vote_count` int(11) NOT NULL DEFAULT '0',
  `last_reply_user_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `body_original` text COLLATE utf8_unicode_ci,
  `excerpt` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `topics_title_index` (`title`),
  KEY `topics_user_id_index` (`member_id`),
  KEY `topics_node_id_index` (`node_id`),
  KEY `topics_is_excellent_index` (`is_excellent`),
  KEY `topics_is_wiki_index` (`is_wiki`),
  KEY `topics_is_blocked_index` (`is_blocked`),
  KEY `topics_reply_count_index` (`reply_count`),
  KEY `topics_view_count_index` (`view_count`),
  KEY `topics_favorite_count_index` (`favorite_count`),
  KEY `topics_vote_count_index` (`vote_count`),
  KEY `topics_last_reply_user_id_index` (`last_reply_user_id`)
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
(1, 'tttt6399998@126.com', '$2y$10$jVfH7i6tXdsgrdQrI4SJAOqrrRdywWZl7DbAEP8AYMnUH5AktGxWe', '{"superuser":1}', 1, NULL, '2014-10-21 23:17:44', '2015-01-30 10:43:24', '$2y$10$JMl0hZud.rjyCXbFxKUEyuntKfZhiFLqMtLD.HUoIKL4JgQXaTaxq', NULL, 'Rock', 'Zhang', '2014-10-21 23:17:44', '2015-01-30 10:43:24');

-- --------------------------------------------------------

--
-- 表的结构 `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `votable_id` int(11) NOT NULL,
  `votable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeIs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `votes_member_id_index` (`member_id`),
  KEY `votes_votable_id_index` (`votable_id`),
  KEY `votes_votable_type_index` (`votable_type`),
  KEY `votes_typeis_index` (`typeIs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `attentions`
--
ALTER TABLE `attentions`
  ADD CONSTRAINT `attentions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attentions_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- 限制表 `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- 限制表 `front_assigned_roles`
--
ALTER TABLE `front_assigned_roles`
  ADD CONSTRAINT `front_assigned_roles_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `front_assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `front_roles` (`id`);

--
-- 限制表 `front_permission_role`
--
ALTER TABLE `front_permission_role`
  ADD CONSTRAINT `front_permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `front_permissions` (`id`),
  ADD CONSTRAINT `front_permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `front_roles` (`id`);

--
-- 限制表 `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
