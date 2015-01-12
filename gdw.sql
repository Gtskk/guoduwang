-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-01-12 11:40:07
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
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_username_unique` (`username`),
  UNIQUE KEY `members_email_unique` (`email`),
  UNIQUE KEY `members_phone_unique` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `phone`, `img_url`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'johndoe', 'johndoe@site.dev', '15212230025', NULL, '$2y$10$jxySwbUJ9TDz6pZlwMMf6eL8L3UXntz0PPl4g0kysJJnKi8kXRaRO', 'f1a2a08a1df563fd13a06047d1085173', NULL, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00');

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
('2015_01_05_023507_create_replies_table', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `nodes`
--

INSERT INTO `nodes` (`id`, `name`, `slug`, `parent_node`, `description`, `topic_count`, `created_at`, `updated_at`) VALUES
(1, 'PHP', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Web 开发', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Mobile', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Languages', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '社区', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '分享', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'php', 'php', 1, 'PHP（PHP: Hypertext Preprocessor的缩写，中文名：“PHP：超文本预处理器”）是一种通用开源脚本语言。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Laravel', 'laravel', 1, 'Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Composer & Packagist', 'composer-and-packagist', 1, 'Composer[1]是PHP中用来管理依赖（dependency）关系的工具。你可以在自己的项目中声明所依赖的外部工具库（libraries），Composer会帮你安装这些依赖的库文件。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '重构', 'refactoring', 1, '由于软件发展本身不可能是完美的，因此改进的过程是持续且必然的，重构的方式将作为改善软件设计的一种手段和方式，更加地拥有现实意义。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '设计模式', 'design-pattern', 1, '设计模式（Design pattern）是一套被反复使用、多数人知晓的、经过分类编目的、代码设计经验的总结。使用设计模式是为了可重用代码、让代码更容易被他人理解、保证代码可靠性。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Testing', 'testing', 1, '软件测试（英语：software testing），描述一种用来促进鉴定软件的正确性、完整性、安全性和质量的过程。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '部署', 'deployment', 1, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '开源项目', 'opensource-project', 1, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'MySQL', 'mysql', 2, 'MySQL是一个关系型数据库管理系统，由瑞典MySQL AB公司开发，目前属于Oracle公司。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Database', 'database', 2, '数据库（Database）是按照数据结构来组织、存储和管理数据的仓库', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Git', 'git', 2, 'Git是一个开源的分布式版本控制系统，用以有效、高速的处理从很小到非常大的项目版本管理。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Linux', 'linux', 2, 'Linux是一种自由和开放源码的类Unix操作系统，存在着许多不同的Linux版本，但它们都使用了Linux内核。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'WebServer', 'web-server', 2, 'WEB服务器也称为WWW(WORLD WIDE WEB)服务器，主要功能是提供网上信息浏览服务。常见的有 Nginx, Apache..', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '算法', 'algrithm', 2, '算法（Algorithm）是指解题方案的准确而完整的描述，是一系列解决问题的清晰指令，算法代表着用系统的方法描述解决问题的策略机制。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '运维', 'operations', 2, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '安全', 'security', 2, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '云服务', 'cloud-service', 2, '云服务开发这一概念包含几种不同的开发类型 - 软件即服务(SaaS), 平台即服务(PaaS), Web服务, 按需(on—demand)计算', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'iPhone', 'iphone-development', 3, 'iPhone 开发', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Android', 'android-development', 3, 'Android 开发', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'JavaScript', 'javascript', 4, 'JavaScript是一种基于对象和事件驱动并具有相对安全性的客户端脚本语言。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Ruby', 'ruby', 4, 'Ruby，一种为简单快捷的面向对象编程（面向对象程序设计）而创的脚本语言', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Python', 'python', 4, 'Python, 是一种面向对象、直译式计算机程序设计语言', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'GoLang', 'golang', 4, 'Go语言是谷歌推出的一种全新的编程语言，可以在不损失应用程序性能的情况下降低代码的复杂性。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Erlang', 'erlang', 4, 'Erlang是一种通用的面向并发的编程语言，它由瑞典电信设备制造商爱立信所辖的CS-Lab开发，目的是创造一种可以应对大规模并发活动的编程语言和运行环境。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '公告', 'announcement', 5, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '反馈', 'feedback', 5, '对于社区的优化或者 bug report , 可以在此节点下提', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '社区开发', 'community-development', 5, '构建此社区软件的开发讨论节点', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '线下聚会', 'gathering', 5, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '健康', 'health', 6, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '工具', 'toolings', 6, '使用工具, 是人类文明的标志', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '其他', 'other-share', 6, '抱歉, 如果你分享的话题不属于其他节点的话, 只能选择这里咯. ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '书籍', 'book-share', 6, '书籍是知识载体, 让我们一起站在巨人的肩膀上. ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '求职', 'request-a-job', 6, '介绍下你自己, 让大家帮你找到一份好的工作', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '招聘', 'hire', 6, '这里有高质量的 PHPer, 记得认真填写你的需求, 薪资待遇是必须写的哦.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '创业', 'start-up', 6, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '移民', 'immigration', 6, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`id`),
  KEY `replies_user_id_index` (`member_id`),
  KEY `replies_topic_id_index` (`topic_id`),
  KEY `replies_is_block_index` (`is_block`),
  KEY `replies_vote_count_index` (`vote_count`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=561 ;

--
-- 转存表中的数据 `replies`
--

INSERT INTO `replies` (`id`, `body`, `member_id`, `topic_id`, `is_block`, `vote_count`, `created_at`, `updated_at`) VALUES
(1, 'Ut nam dolore sit facere.', 1, 46, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(2, 'Quisquam officia eligendi nihil dolor sapiente.', 1, 200, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(3, 'Rerum quo id qui quo.', 1, 208, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(4, 'Iure dolore molestiae neque corporis non doloribus placeat.', 1, 101, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(5, 'Consequatur porro et eveniet blanditiis temporibus rerum velit.', 1, 25, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(6, 'Consequatur esse saepe non ipsum similique natus ratione.', 1, 97, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(7, 'Illo sapiente voluptatem temporibus perspiciatis quos iste sapiente.', 1, 205, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(8, 'Qui quam voluptatem distinctio placeat et laboriosam id voluptas.', 1, 141, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(9, 'Eaque veritatis dolore qui sint aut.', 1, 99, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(10, 'Hic deleniti aut quia ut unde.', 1, 102, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(11, 'Eligendi adipisci a mollitia quam quia ratione enim provident.', 1, 47, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(12, 'Qui quibusdam non quibusdam.', 1, 156, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(13, 'Nemo doloribus architecto laboriosam cumque enim officia animi.', 1, 59, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(14, 'Sit assumenda dolorem veritatis omnis.', 1, 157, 0, 0, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(15, 'Qui similique aut saepe ut odio saepe sit.', 1, 179, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(16, 'Necessitatibus in nemo iure repudiandae omnis.', 1, 44, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(17, 'Laborum consectetur autem enim.', 1, 159, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(18, 'Unde corrupti quia magni exercitationem quas.', 1, 92, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(19, 'Odit et magnam assumenda ex similique.', 1, 95, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(20, 'Et id ad odio.', 1, 74, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(21, 'Quae id id soluta doloribus earum aspernatur.', 1, 129, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(22, 'Autem rerum voluptatem officia ipsa molestiae facere.', 1, 226, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(23, 'Iste cumque sed autem ut.', 1, 97, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(24, 'Odio occaecati modi sed laboriosam.', 1, 25, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(25, 'Voluptas eligendi ipsum et corporis quia commodi.', 1, 185, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(26, 'Non iusto dolorem cum qui dolores.', 1, 151, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(27, 'Excepturi et commodi adipisci dolorum quod assumenda saepe.', 1, 17, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(28, 'Amet dolores et et eos.', 1, 128, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(29, 'Omnis earum ullam beatae est deserunt dicta nesciunt.', 1, 188, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(30, 'Sunt qui corrupti exercitationem voluptatum velit est in.', 1, 58, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(31, 'Omnis nobis cum asperiores asperiores veniam.', 1, 9, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(32, 'Sed necessitatibus ea debitis adipisci.', 1, 72, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(33, 'Occaecati rerum omnis dicta qui vitae.', 1, 104, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(34, 'Aliquid deleniti architecto voluptate modi ipsa delectus.', 1, 12, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(35, 'Fuga eligendi nobis magnam sequi.', 1, 23, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(36, 'Voluptates accusamus illum aliquam cumque.', 1, 127, 0, 0, '2015-01-04 19:41:12', '2015-01-04 19:41:12'),
(37, 'Est cupiditate reprehenderit dicta mollitia est alias.', 1, 46, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(38, 'Amet voluptatibus laborum dolor est.', 1, 177, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(39, 'Numquam molestias quia quibusdam ea sit fugit eos.', 1, 118, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(40, 'Ut ut sit ab.', 1, 95, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(41, 'Impedit occaecati dolores veritatis quis nihil quis a.', 1, 162, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(42, 'Aliquid architecto doloremque rem ab atque.', 1, 215, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(43, 'Quaerat possimus voluptatem blanditiis et.', 1, 39, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(44, 'Cumque quam consequatur et.', 1, 127, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(45, 'Non eos rerum voluptatem ex similique facilis.', 1, 54, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(46, 'Voluptatem numquam debitis velit.', 1, 33, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(47, 'Nulla voluptatibus temporibus adipisci voluptas.', 1, 124, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(48, 'Doloremque aut odit hic sunt.', 1, 85, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(49, 'Esse cupiditate ex reprehenderit quaerat autem numquam iusto.', 1, 163, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(50, 'Iure temporibus iure molestias ut dolorem et possimus.', 1, 199, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(51, 'Quas quis minima non facere voluptas facere labore.', 1, 81, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(52, 'Sint nisi et nihil assumenda minus voluptas.', 1, 159, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(53, 'Veritatis possimus dicta laboriosam est necessitatibus.', 1, 93, 0, 0, '2015-01-04 19:41:13', '2015-01-04 19:41:13'),
(54, 'Autem totam sapiente perspiciatis aut.', 1, 191, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(55, 'Quasi rerum quidem eius adipisci ipsam.', 1, 5, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(56, 'Facere rerum fuga iure alias rerum aut totam.', 1, 179, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(57, 'Nam at totam et quia quis.', 1, 36, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(58, 'Occaecati odio asperiores nam.', 1, 183, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(59, 'Non eos ut voluptatem similique eaque mollitia quibusdam vero.', 1, 102, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(60, 'Sunt ipsa qui ducimus nesciunt nisi.', 1, 99, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(61, 'Accusantium perspiciatis aspernatur expedita nisi et quia.', 1, 224, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(62, 'Dolorum molestiae error explicabo voluptatibus dolorem libero.', 1, 207, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(63, 'Quisquam voluptatem atque itaque voluptatem sed reprehenderit quidem.', 1, 165, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(64, 'Laboriosam voluptatem sint doloremque incidunt atque velit deserunt eaque.', 1, 24, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(65, 'Dicta dolores porro et aut et.', 1, 12, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(66, 'Aut fugit magnam nostrum est.', 1, 126, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(67, 'Minus omnis accusamus quia est nihil voluptatem tempora.', 1, 211, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(68, 'Fuga voluptas voluptatem nulla ut.', 1, 141, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(69, 'Et magni quisquam aut tempora.', 1, 157, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(70, 'Excepturi illum modi voluptatem quo aperiam aliquid.', 1, 202, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(71, 'Sint occaecati vero neque adipisci sint tempora.', 1, 119, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(72, 'Fugit omnis molestiae vitae nam tempore assumenda.', 1, 31, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(73, 'Quas delectus voluptas est omnis cupiditate iure perspiciatis.', 1, 100, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(74, 'Aspernatur rem vero et ab vitae.', 1, 140, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(75, 'Repellendus odio voluptatem impedit praesentium quia quia.', 1, 16, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(76, 'Dolor id sit cumque esse accusantium cumque.', 1, 195, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(77, 'Voluptate facilis non autem error aperiam et.', 1, 2, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(78, 'Quaerat et quasi a sequi facere nobis dolorem.', 1, 102, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(79, 'Numquam blanditiis consequuntur quae ut adipisci temporibus eligendi.', 1, 136, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(80, 'Voluptates sunt hic ipsum magni voluptatem molestias facilis.', 1, 199, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(81, 'Eaque est quibusdam reiciendis laboriosam dicta.', 1, 193, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(82, 'Molestiae sit voluptatem dicta accusamus repudiandae sit iure.', 1, 177, 0, 0, '2015-01-04 19:41:14', '2015-01-04 19:41:14'),
(83, 'Tempora ut minima et quis sed corporis.', 1, 63, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(84, 'Quibusdam delectus amet quas sed impedit.', 1, 106, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(85, 'Sit delectus labore ipsam sit.', 1, 226, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(86, 'Dolore quos ut sit quia voluptatem ipsam.', 1, 174, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(87, 'Iste consequatur velit qui ipsum est amet.', 1, 49, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(88, 'Voluptates nam mollitia eum repellat et accusantium.', 1, 186, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(89, 'Delectus veniam quas consectetur est itaque dignissimos.', 1, 192, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(90, 'Quam explicabo aut sunt esse laudantium.', 1, 62, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(91, 'Fuga numquam consequuntur voluptas ut accusamus maiores.', 1, 158, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(92, 'Excepturi asperiores harum vero animi iste tempore.', 1, 197, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(93, 'Eos possimus id reiciendis iste voluptatibus voluptate.', 1, 162, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(94, 'Ipsa incidunt a autem quo.', 1, 126, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(95, 'Sint harum praesentium voluptatem dolores ut nisi.', 1, 127, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(96, 'Nihil repellat non nemo est asperiores eum.', 1, 218, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(97, 'Repellat quae dolor quae saepe.', 1, 129, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(98, 'Nihil alias nostrum qui quibusdam ipsa repellat.', 1, 63, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(99, 'Dolorum deleniti saepe qui minima.', 1, 177, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(100, 'Hic repudiandae alias minus error pariatur.', 1, 66, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(101, 'Veritatis aliquam sunt deserunt nam omnis.', 1, 145, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(102, 'Et eius rerum voluptatem.', 1, 48, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(103, 'Hic et nesciunt similique non voluptatem.', 1, 197, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(104, 'Incidunt reprehenderit fuga cupiditate odit et voluptatem et corrupti.', 1, 130, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(105, 'Ut laudantium sunt doloribus velit.', 1, 183, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(106, 'Sunt culpa aliquid et dolorum repudiandae ducimus.', 1, 149, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(107, 'Quaerat ipsam autem et esse.', 1, 142, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(108, 'Delectus iure consequatur id quis qui rerum dolorem ea.', 1, 144, 0, 0, '2015-01-04 19:41:15', '2015-01-04 19:41:15'),
(109, 'Facere eum incidunt corporis quam.', 1, 20, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(110, 'Cupiditate quia maxime ut consectetur.', 1, 141, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(111, 'Enim eos eum placeat laborum nam.', 1, 63, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(112, 'Modi eum placeat id vel.', 1, 227, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(113, 'Aspernatur voluptas suscipit voluptatem non repellendus soluta.', 1, 12, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(114, 'Molestiae repellat eum culpa reiciendis autem.', 1, 33, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(115, 'Quo impedit ut voluptatem.', 1, 229, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(116, 'Impedit aut nesciunt iusto praesentium nesciunt rem quia dolores.', 1, 75, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(117, 'Ex repellat magni corrupti quos et soluta reiciendis.', 1, 120, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(118, 'Ut nostrum quia neque nesciunt eligendi cum minus.', 1, 177, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(119, 'Quasi reiciendis et voluptatem quas consequatur.', 1, 71, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(120, 'At quo eum praesentium aspernatur et.', 1, 106, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(121, 'Eligendi sunt ea repellendus quo totam quia.', 1, 151, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(122, 'Aspernatur quia error enim aliquam dolore placeat.', 1, 152, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(123, 'Nisi ut qui voluptatibus dignissimos.', 1, 198, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(124, 'Provident consequatur fuga cum suscipit ex labore.', 1, 79, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(125, 'Ullam dolorem tempora omnis suscipit cupiditate blanditiis deserunt.', 1, 152, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(126, 'Accusantium repudiandae magnam rerum debitis voluptas voluptatibus laborum et.', 1, 117, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(127, 'Voluptas nostrum et cum consequatur quia.', 1, 171, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(128, 'Eveniet suscipit quis omnis.', 1, 227, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(129, 'Quis commodi accusantium commodi alias saepe.', 1, 208, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(130, 'Veritatis illo similique beatae eos.', 1, 207, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(131, 'Quaerat et omnis maxime consequatur illo quam.', 1, 161, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(132, 'Optio magnam enim quo minus eligendi aut eos.', 1, 157, 0, 0, '2015-01-04 19:41:16', '2015-01-04 19:41:16'),
(133, 'Et nobis commodi culpa esse eos illo atque.', 1, 223, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(134, 'A rerum sed accusamus totam vitae.', 1, 101, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(135, 'Tenetur quas impedit velit neque doloremque.', 1, 134, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(136, 'Enim sint autem sed ut corporis.', 1, 9, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(137, 'Nobis autem tenetur ullam labore qui.', 1, 107, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(138, 'Soluta dignissimos dolor praesentium eligendi eum rem.', 1, 138, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(139, 'Et nihil consequatur corporis non molestias est.', 1, 99, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(140, 'Voluptatem nisi eum exercitationem voluptatem dolorem voluptatem.', 1, 154, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(141, 'Dolores consectetur et debitis cumque quod adipisci qui non.', 1, 163, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(142, 'Ullam eius quo assumenda qui non.', 1, 98, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(143, 'Mollitia maxime nihil beatae est.', 1, 218, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(144, 'Eius sed at est quisquam.', 1, 171, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(145, 'Ipsam tempora suscipit similique corporis doloremque dolore nostrum quia.', 1, 201, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(146, 'Nemo natus odit sit molestiae.', 1, 51, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(147, 'Qui rem est facere ipsa tenetur.', 1, 144, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(148, 'Quia earum perferendis dolore minima nemo.', 1, 55, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(149, 'Accusamus animi et dolorum facilis quae ipsam dicta.', 1, 111, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(150, 'Repellendus quia odio aut cumque consequatur.', 1, 49, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(151, 'Eligendi ut quibusdam quod et eligendi numquam quia.', 1, 23, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(152, 'Facilis reiciendis perspiciatis quam cupiditate et.', 1, 106, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(153, 'Repudiandae autem enim rerum repudiandae voluptatum fugiat voluptatum.', 1, 224, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(154, 'Eum totam omnis cumque unde quas illum aut.', 1, 230, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(155, 'Nulla sit aliquid consequatur pariatur eaque omnis ipsum.', 1, 43, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(156, 'Nostrum libero quod sint nesciunt.', 1, 167, 0, 0, '2015-01-04 19:41:17', '2015-01-04 19:41:17'),
(157, 'Rerum reprehenderit et quod magnam et rerum qui.', 1, 188, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(158, 'Molestiae beatae possimus neque repellendus corporis.', 1, 92, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(159, 'Qui non dolores nihil qui maxime voluptas.', 1, 13, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(160, 'Illo facilis vero reprehenderit architecto architecto minus incidunt.', 1, 63, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(161, 'Ea itaque non pariatur dolorum adipisci error.', 1, 174, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(162, 'Id tempora rerum qui ipsam veritatis magni ducimus.', 1, 19, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(163, 'Dolor velit ex est autem.', 1, 166, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(164, 'Dicta officiis soluta qui optio vel quae.', 1, 89, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(165, 'Rerum consequatur assumenda dolor cumque quo eum dolorum.', 1, 158, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(166, 'Corrupti eaque temporibus fugiat velit exercitationem.', 1, 151, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(167, 'Molestiae quod quae quis eligendi ad asperiores.', 1, 65, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(168, 'Et voluptatem eligendi porro dolorem illum.', 1, 226, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(169, 'Adipisci omnis explicabo qui.', 1, 23, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(170, 'At accusamus placeat aut voluptatem accusamus.', 1, 54, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(171, 'Minus provident quo repellat doloribus deleniti rerum quisquam.', 1, 205, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(172, 'Adipisci aut est aliquam nam quibusdam quia.', 1, 99, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(173, 'Provident dolorem earum veritatis ipsa ratione dolorem consequatur eligendi.', 1, 115, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(174, 'Ut omnis sed sit vero aut.', 1, 191, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(175, 'Omnis ut consequuntur dolores est non quibusdam at.', 1, 138, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(176, 'Earum id deserunt pariatur repudiandae est enim id.', 1, 59, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(177, 'Quod facere voluptatem facere provident sint non.', 1, 183, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(178, 'Libero ipsum consectetur expedita aut facere molestias est.', 1, 225, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(179, 'Accusamus consequatur perspiciatis ducimus fugit consequatur.', 1, 34, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(180, 'Ut a quibusdam sint id.', 1, 228, 0, 0, '2015-01-04 19:41:18', '2015-01-04 19:41:18'),
(181, 'Ducimus nesciunt cumque libero veritatis impedit.', 1, 34, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(182, 'Ut blanditiis aut ut voluptatum.', 1, 63, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(183, 'Ipsa velit autem debitis laboriosam blanditiis.', 1, 210, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(184, 'Culpa facilis quasi nostrum expedita.', 1, 142, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(185, 'Temporibus provident molestiae magnam nemo tempora quia et.', 1, 172, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(186, 'Optio alias quidem vitae neque.', 1, 124, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(187, 'Tempora eaque eaque odit nemo ut quos.', 1, 139, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(188, 'Provident enim nulla explicabo et.', 1, 165, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(189, 'Rerum eum quos qui.', 1, 121, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(190, 'Quo et sit explicabo fugiat aut alias.', 1, 170, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(191, 'Dolore voluptatibus quisquam ex odio commodi ducimus nobis.', 1, 57, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(192, 'Sed id quas laudantium eum aut.', 1, 158, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(193, 'Quasi delectus facilis aspernatur accusamus.', 1, 175, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(194, 'Et in sint vel ducimus animi.', 1, 82, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(195, 'Tenetur praesentium facilis est ipsa maiores.', 1, 27, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(196, 'Sint natus ullam eligendi sint nostrum corrupti iusto corrupti.', 1, 165, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(197, 'Necessitatibus quia expedita iusto consequatur illo nisi.', 1, 161, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(198, 'Aliquam id non similique porro aliquam similique.', 1, 89, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(199, 'Tempora minus est corporis ipsum doloribus.', 1, 130, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(200, 'Ex sit quia voluptatem ut.', 1, 205, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(201, 'Sint reprehenderit voluptatem consequuntur ipsa.', 1, 70, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(202, 'Aut voluptatem dignissimos doloremque praesentium.', 1, 27, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(203, 'Impedit qui mollitia dolores aperiam aliquam impedit.', 1, 209, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(204, 'Veritatis ut atque mollitia doloribus qui beatae quo.', 1, 88, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(205, 'Alias saepe reprehenderit aut officiis tempora dolore.', 1, 168, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(206, 'Ratione non et aut inventore rerum numquam sint.', 1, 195, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(207, 'Doloribus ut ipsa voluptatem incidunt eaque.', 1, 54, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(208, 'Minima est maiores nesciunt rem quasi.', 1, 144, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(209, 'Suscipit voluptatem magnam velit illum id voluptate.', 1, 211, 0, 0, '2015-01-04 19:41:19', '2015-01-04 19:41:19'),
(210, 'Laborum est veritatis itaque nulla illo quia aut.', 1, 97, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(211, 'Perferendis aliquid sunt inventore ipsa enim sed tempora.', 1, 125, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(212, 'Rem quia maiores sequi temporibus ut placeat fugiat.', 1, 132, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(213, 'Cumque velit dolorum amet nemo ut repudiandae.', 1, 35, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(214, 'Sed perferendis perferendis dolorem in.', 1, 195, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(215, 'Et hic error voluptatem quibusdam.', 1, 154, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(216, 'Saepe odio nulla explicabo blanditiis quia ducimus.', 1, 16, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(217, 'Non nulla alias eligendi dignissimos cupiditate modi exercitationem.', 1, 206, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(218, 'Enim voluptatibus explicabo sit necessitatibus exercitationem ex.', 1, 211, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(219, 'Error fugiat deserunt iste natus nulla molestias.', 1, 17, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(220, 'Et molestias officiis sit aspernatur et animi eum.', 1, 190, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(221, 'Ut ut officia autem enim corrupti error.', 1, 205, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(222, 'Ab magni voluptate rem at culpa.', 1, 177, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(223, 'Aut non deserunt dolorem quis molestiae optio ullam.', 1, 152, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(224, 'Harum veritatis et corrupti magnam.', 1, 41, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(225, 'In laudantium odit possimus impedit distinctio ex doloribus.', 1, 79, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(226, 'Non et voluptas dolorem omnis eum.', 1, 91, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(227, 'Voluptas dolor et distinctio ut.', 1, 171, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(228, 'Minus ea at animi facilis.', 1, 163, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(229, 'Earum consequatur et eligendi cum atque ipsum.', 1, 159, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(230, 'Consequatur ea rerum aliquid illo.', 1, 45, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(231, 'Aut voluptatem vitae mollitia molestiae aperiam soluta labore.', 1, 178, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(232, 'Qui ratione perferendis qui nisi in.', 1, 166, 0, 0, '2015-01-04 19:41:20', '2015-01-04 19:41:20'),
(233, 'Architecto ullam necessitatibus magni rerum omnis perferendis dicta.', 1, 230, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(234, 'Sunt veniam id ducimus aperiam minus.', 1, 137, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(235, 'Culpa ratione nobis blanditiis amet.', 1, 193, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(236, 'Facilis blanditiis magnam in blanditiis.', 1, 101, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(237, 'Aliquid non illum molestiae qui.', 1, 112, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(238, 'Fuga illo blanditiis vero cumque sed sit molestias.', 1, 222, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(239, 'Eum sed reiciendis voluptatem in rerum recusandae.', 1, 17, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(240, 'Nesciunt vel voluptatem sint ea itaque et consequatur ipsam.', 1, 172, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(241, 'Iste voluptas recusandae est autem rerum sed.', 1, 69, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(242, 'Accusamus minima error qui doloribus qui aperiam minus.', 1, 69, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(243, 'Quo magnam dolorem qui eos.', 1, 11, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(244, 'Qui sed laborum deleniti quia dolore qui consequatur ex.', 1, 85, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(245, 'Sapiente sit quo ipsam quia sunt voluptatibus culpa.', 1, 84, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(246, 'Molestias dicta est et pariatur alias cum.', 1, 159, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(247, 'Maiores totam qui omnis veritatis maiores ducimus omnis.', 1, 27, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(248, 'Occaecati eos voluptate provident repudiandae quis.', 1, 55, 0, 0, '2015-01-04 19:41:21', '2015-01-04 19:41:21'),
(249, 'Rerum voluptatum quo dolor iste officiis explicabo ea.', 1, 63, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(250, 'Distinctio quas accusantium quos occaecati quibusdam quo ut.', 1, 116, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(251, 'Iure adipisci et sint enim pariatur id.', 1, 205, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(252, 'Molestias quasi ut maiores.', 1, 207, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(253, 'Magni et est dolorem.', 1, 131, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(254, 'Non repellendus et harum.', 1, 103, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(255, 'Dolore soluta nobis molestiae nisi aperiam nostrum.', 1, 108, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(256, 'Nihil necessitatibus quod et facere et placeat ipsam.', 1, 98, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(257, 'A laudantium cumque aut consequatur culpa enim.', 1, 211, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(258, 'Hic asperiores ducimus qui.', 1, 137, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(259, 'Animi fugit et beatae corporis ipsum maiores.', 1, 168, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(260, 'Voluptatem qui ut corporis asperiores modi ducimus.', 1, 85, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(261, 'Magni non vel consectetur sit.', 1, 192, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(262, 'Consequatur nam at magnam laborum alias sint dolorem.', 1, 127, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(263, 'Occaecati ea cumque ut quod et.', 1, 141, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(264, 'Aut quasi sapiente temporibus nulla rerum odio.', 1, 217, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(265, 'Qui odio voluptas minima fugiat quis.', 1, 229, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(266, 'Id alias officiis ipsa ipsam ea.', 1, 93, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(267, 'Non dignissimos optio reiciendis veniam.', 1, 149, 0, 0, '2015-01-04 19:41:22', '2015-01-04 19:41:22'),
(268, 'Aut maiores enim recusandae itaque delectus exercitationem.', 1, 202, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(269, 'Sit veniam fugit odio consequatur et adipisci expedita autem.', 1, 174, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(270, 'A doloremque aperiam qui voluptas.', 1, 219, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(271, 'Hic laborum a cum numquam vero.', 1, 105, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(272, 'Rerum error placeat quis non aspernatur.', 1, 45, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(273, 'Perspiciatis dolores suscipit cumque consequuntur explicabo laborum.', 1, 17, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(274, 'Et autem qui officia adipisci temporibus.', 1, 159, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(275, 'Consequatur aut mollitia odit et est eum.', 1, 214, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(276, 'Harum quia eius id nobis quas id.', 1, 175, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(277, 'Aliquam voluptate qui accusamus.', 1, 100, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(278, 'Est aliquid sit fuga temporibus voluptate iste.', 1, 53, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(279, 'Velit quos iste voluptate voluptas.', 1, 7, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(280, 'Qui quasi reiciendis reiciendis id eos.', 1, 55, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(281, 'Est et aut maiores est sed.', 1, 204, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(282, 'Et doloribus et asperiores quibusdam velit aliquid.', 1, 30, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(283, 'Velit suscipit impedit id quidem harum blanditiis tempora.', 1, 110, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(284, 'Incidunt est voluptas laboriosam distinctio aspernatur sed odio.', 1, 211, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(285, 'In et debitis animi qui sequi sit.', 1, 97, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(286, 'Rerum laboriosam quia et hic.', 1, 63, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(287, 'Dolore est dolorem velit.', 1, 66, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(288, 'Cupiditate ipsum placeat adipisci accusantium ut.', 1, 57, 0, 0, '2015-01-04 19:41:23', '2015-01-04 19:41:23'),
(289, 'Dolorem temporibus quas enim impedit dicta.', 1, 31, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(290, 'Deserunt et rerum accusantium.', 1, 169, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(291, 'Aliquam aliquam optio exercitationem officiis optio.', 1, 125, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(292, 'Rerum et illum amet doloribus maxime.', 1, 46, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(293, 'Omnis dolores facilis quis repellendus.', 1, 17, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(294, 'Sed numquam inventore id labore.', 1, 59, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(295, 'Adipisci temporibus consequatur repellat quo.', 1, 162, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(296, 'Ut sed nobis architecto occaecati quas.', 1, 204, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(297, 'Id nihil perspiciatis molestias.', 1, 85, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(298, 'Fugit ad quas aut est ad modi.', 1, 134, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(299, 'Consequatur et ipsam nam soluta nesciunt vitae similique.', 1, 155, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(300, 'Provident illum et optio sapiente excepturi molestiae non.', 1, 182, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(301, 'Sed cupiditate aliquid animi nam ipsum velit recusandae.', 1, 151, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(302, 'Aut doloribus ipsam perferendis nisi velit.', 1, 134, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(303, 'Consequatur molestias quaerat eos dolorem.', 1, 197, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(304, 'Et odio amet ipsam ratione itaque consequatur nihil.', 1, 11, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(305, 'Doloremque cum non quam dolores nostrum.', 1, 10, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(306, 'Ducimus illum ut eligendi sunt sint minus velit.', 1, 152, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(307, 'Qui sed fugiat optio et occaecati est est.', 1, 66, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(308, 'Officia ipsam harum ad nihil ea aut odit maiores.', 1, 92, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(309, 'Quidem rerum dolores sapiente alias corrupti earum.', 1, 201, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(310, 'Asperiores odit veniam consequatur et amet reprehenderit.', 1, 1, 0, 0, '2015-01-04 19:41:24', '2015-01-04 19:41:24'),
(311, 'Adipisci perferendis porro minima quos dolorem.', 1, 193, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(312, 'Consectetur tenetur mollitia inventore eum et.', 1, 42, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(313, 'Unde est ad sapiente quo aliquam.', 1, 184, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(314, 'Aut deleniti quaerat officiis voluptas nostrum officia.', 1, 136, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(315, 'Quas eaque amet aut doloribus vitae sapiente minus.', 1, 95, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(316, 'Quia sunt voluptas dolores perspiciatis nulla nulla placeat.', 1, 11, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(317, 'Accusamus nihil provident numquam beatae distinctio.', 1, 45, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(318, 'Laboriosam neque aut est tempora ratione.', 1, 50, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(319, 'Perspiciatis repudiandae eius voluptas dolores nihil ab quibusdam.', 1, 141, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(320, 'Libero voluptas qui iure fugit commodi quia sint.', 1, 5, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(321, 'Amet quia vel autem placeat officiis qui quasi.', 1, 92, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(322, 'Doloribus expedita et magni dolores delectus commodi.', 1, 48, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(323, 'Quisquam consequatur eos eligendi soluta sint.', 1, 52, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(324, 'Magnam voluptatem voluptatem adipisci molestiae dolor.', 1, 95, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(325, 'Perferendis nostrum voluptas consectetur corrupti doloribus deserunt est saepe.', 1, 41, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(326, 'Ut veritatis ut autem eveniet reiciendis voluptas alias.', 1, 76, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(327, 'Cumque quas ex voluptatem repellendus omnis et.', 1, 152, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(328, 'Voluptatem sit quis minus.', 1, 151, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(329, 'Voluptas quas nobis architecto omnis aut.', 1, 174, 0, 0, '2015-01-04 19:41:25', '2015-01-04 19:41:25'),
(330, 'Minima sed doloribus officia qui porro eligendi.', 1, 216, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(331, 'Quibusdam et dicta consequatur quia repellat iste.', 1, 88, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(332, 'Nihil quae dolorum numquam aut ab.', 1, 38, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(333, 'Harum praesentium voluptatum itaque beatae laboriosam.', 1, 107, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(334, 'Aut maxime ratione sed vel quisquam.', 1, 59, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(335, 'Ut consectetur expedita explicabo fugit.', 1, 23, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(336, 'Odio ab ipsum facere nobis dolores ratione.', 1, 46, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(337, 'Fugiat omnis occaecati commodi consequatur.', 1, 20, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(338, 'Sunt omnis dolore est aut id officia aut.', 1, 92, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(339, 'Quae laboriosam veniam ut accusantium natus occaecati.', 1, 152, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(340, 'Ex dolor illo et est laborum.', 1, 194, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(341, 'Exercitationem vel distinctio adipisci sed.', 1, 54, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(342, 'Illo delectus voluptatum dignissimos dolore ex.', 1, 119, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(343, 'Quia quia quos molestias omnis quo perspiciatis.', 1, 134, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(344, 'Inventore amet enim nisi.', 1, 65, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(345, 'Veniam voluptas cum impedit laudantium velit et.', 1, 141, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(346, 'Quod dolorum ut qui sapiente aspernatur.', 1, 161, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(347, 'Enim vel inventore veniam et et.', 1, 166, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(348, 'Sunt quam dolorem ut in nesciunt quae labore ex.', 1, 220, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(349, 'Repudiandae reprehenderit veniam dolor cumque veritatis inventore quis.', 1, 128, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(350, 'Rerum culpa consequatur qui inventore.', 1, 14, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(351, 'Temporibus velit dolores distinctio sunt quibusdam voluptatem.', 1, 153, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(352, 'Voluptatem animi ut ad et excepturi.', 1, 181, 0, 0, '2015-01-04 19:41:26', '2015-01-04 19:41:26'),
(353, 'Non eos cumque et voluptas sit sint.', 1, 198, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(354, 'Consectetur facere odit ut.', 1, 146, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(355, 'Cum placeat fuga illo ut reprehenderit quisquam.', 1, 183, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(356, 'Qui assumenda id voluptas.', 1, 31, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(357, 'Vel non eum animi iure pariatur corporis inventore.', 1, 136, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(358, 'Aut vel nam veritatis et saepe magnam quibusdam sunt.', 1, 143, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(359, 'Nihil voluptatem reiciendis esse vel voluptas molestiae.', 1, 90, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(360, 'Recusandae quis natus ut eligendi commodi.', 1, 137, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(361, 'Itaque a et sunt itaque magni.', 1, 49, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(362, 'Beatae perspiciatis nulla aut voluptatum ipsam aspernatur.', 1, 168, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(363, 'Minima odio ipsum in necessitatibus modi.', 1, 226, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(364, 'Dolores ut non quidem voluptatem repudiandae quae.', 1, 162, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(365, 'Similique rerum rem libero.', 1, 17, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(366, 'Ipsum fuga doloribus similique officiis suscipit amet.', 1, 32, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(367, 'Sed et veniam cum doloribus qui quasi.', 1, 34, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(368, 'Dicta eum iusto in eaque.', 1, 41, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(369, 'Non omnis similique sunt beatae et numquam culpa.', 1, 24, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(370, 'Alias amet sit autem.', 1, 109, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(371, 'Similique repellendus explicabo ut sequi saepe ut nihil.', 1, 84, 0, 0, '2015-01-04 19:41:27', '2015-01-04 19:41:27'),
(372, 'Adipisci officia in qui sunt recusandae ad ut.', 1, 62, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(373, 'Tempora id alias delectus quia qui officia.', 1, 73, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(374, 'Et et veniam modi quo fugiat velit voluptatibus.', 1, 152, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(375, 'Quidem ea officiis optio blanditiis.', 1, 126, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(376, 'Est tenetur delectus voluptas aut quia qui.', 1, 190, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(377, 'Tempora ratione quisquam aperiam dolor.', 1, 227, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(378, 'Vitae quas voluptate quis maxime quia.', 1, 44, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(379, 'Repellat quia assumenda unde nemo est laudantium.', 1, 103, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(380, 'Id omnis eaque sit.', 1, 95, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(381, 'Aspernatur non quod natus non quia.', 1, 190, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(382, 'Dolores non cupiditate sapiente minima modi.', 1, 217, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(383, 'Sint reprehenderit molestiae dolorem ab ut pariatur expedita modi.', 1, 136, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(384, 'Labore eveniet ipsam accusamus sed similique quia quos.', 1, 219, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(385, 'Incidunt ratione fugiat non pariatur qui.', 1, 107, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(386, 'Aut quis nemo fugit qui.', 1, 189, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(387, 'Doloribus perspiciatis sunt sit quae.', 1, 68, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(388, 'Et quod voluptatem ducimus placeat.', 1, 20, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(389, 'Tempore quia pariatur quo officia.', 1, 201, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(390, 'Mollitia at ipsum qui.', 1, 65, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(391, 'Repellendus quaerat laudantium explicabo nam.', 1, 88, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(392, 'Dignissimos ipsum dignissimos nihil voluptatem a.', 1, 136, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(393, 'Ut explicabo sit ea at est.', 1, 134, 0, 0, '2015-01-04 19:41:28', '2015-01-04 19:41:28'),
(394, 'Placeat nostrum expedita consequatur provident asperiores.', 1, 154, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(395, 'Non corrupti ut natus rerum et nobis et et.', 1, 26, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(396, 'Sunt qui id quia rerum est repellendus et.', 1, 116, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(397, 'Nesciunt voluptatum nostrum et alias et recusandae.', 1, 100, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(398, 'Ea fugiat perspiciatis dignissimos rem et.', 1, 111, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(399, 'Commodi mollitia dolore aliquid cumque quam minima non.', 1, 34, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(400, 'Totam et est corporis et omnis iure.', 1, 37, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(401, 'Ea ut sunt cupiditate ut.', 1, 76, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(402, 'Velit quasi quos voluptas minus et et.', 1, 123, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(403, 'Occaecati et voluptates voluptas dolores ut dignissimos sit itaque.', 1, 133, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(404, 'In saepe earum eligendi sed.', 1, 104, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(405, 'Qui fugit repellat est accusamus.', 1, 80, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(406, 'Magni occaecati et deserunt animi quia similique.', 1, 131, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(407, 'Aut tempora iusto labore.', 1, 164, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(408, 'Nemo non repudiandae enim molestias aut placeat et dolorem.', 1, 168, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(409, 'Dolores error dolores ratione et labore expedita earum.', 1, 33, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(410, 'Harum vel a sequi ad facere deserunt rerum.', 1, 145, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(411, 'Odit ex nobis molestiae odit nostrum rerum.', 1, 73, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(412, 'Enim molestiae ea non et odit dolorum.', 1, 131, 0, 0, '2015-01-04 19:41:29', '2015-01-04 19:41:29'),
(413, 'Non molestiae ea labore mollitia velit eius.', 1, 184, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(414, 'Autem cumque et ut animi.', 1, 138, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(415, 'Eius soluta aut ut numquam assumenda laboriosam consectetur.', 1, 18, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(416, 'Et non cupiditate ex illum.', 1, 10, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(417, 'Aliquam illum voluptas et dolorem possimus magnam.', 1, 212, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(418, 'Eos accusamus consequatur natus similique recusandae doloremque aliquid.', 1, 38, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(419, 'Hic exercitationem sunt quo qui nisi sequi.', 1, 44, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(420, 'Nisi fugit dicta quisquam perferendis iure error nulla id.', 1, 191, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(421, 'Adipisci quia officia saepe esse.', 1, 108, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(422, 'Et dolor mollitia ipsa nihil fugit aspernatur expedita in.', 1, 96, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(423, 'Veniam ut illum facere et quos consequatur.', 1, 230, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(424, 'Et maxime in cum perspiciatis corrupti.', 1, 213, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(425, 'Ducimus sed totam consequatur possimus velit eum.', 1, 144, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(426, 'Mollitia dolores deserunt quae autem quod sit vero.', 1, 55, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(427, 'Nulla ipsum quos vel commodi ab eos.', 1, 74, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(428, 'Qui aut ut velit quaerat repellat.', 1, 168, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(429, 'Doloribus maxime voluptates mollitia est maxime nesciunt debitis.', 1, 9, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(430, 'Quas eum est assumenda suscipit.', 1, 155, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(431, 'Doloremque est corrupti commodi corrupti.', 1, 109, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(432, 'Temporibus vel quia est facere.', 1, 36, 0, 0, '2015-01-04 19:41:30', '2015-01-04 19:41:30'),
(433, 'Nihil aliquam odit aut possimus molestiae aut repudiandae.', 1, 204, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(434, 'Quibusdam quia necessitatibus sit quis dolore.', 1, 46, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(435, 'Ipsam iure natus repellendus qui soluta.', 1, 191, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(436, 'Laudantium molestiae velit optio unde necessitatibus.', 1, 155, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(437, 'Veniam quis tempore dolorum.', 1, 114, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(438, 'Dolores rem vel ut iusto aut.', 1, 89, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(439, 'Sint iure numquam voluptatem saepe nobis.', 1, 125, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(440, 'Quo qui aut necessitatibus voluptate nulla.', 1, 50, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(441, 'Sapiente voluptatibus quasi debitis dolorem.', 1, 212, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(442, 'Neque aut eius reprehenderit fugit est alias.', 1, 148, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31');
INSERT INTO `replies` (`id`, `body`, `member_id`, `topic_id`, `is_block`, `vote_count`, `created_at`, `updated_at`) VALUES
(443, 'Nam eos est voluptas ut.', 1, 120, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(444, 'Explicabo voluptas consequatur aut dolores voluptas est ut.', 1, 1, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(445, 'Quo illo qui veniam sed unde molestiae.', 1, 195, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(446, 'Et id blanditiis consectetur sint modi.', 1, 69, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(447, 'Quod quia omnis rerum recusandae eum.', 1, 93, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(448, 'Fugiat fugiat vel quia vel aut eos omnis.', 1, 126, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(449, 'Est nulla eos ut molestias et magnam repellendus eligendi.', 1, 119, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(450, 'Dolorum nesciunt dolorem consequuntur dolore molestiae aliquid inventore.', 1, 127, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(451, 'Iste est et nesciunt.', 1, 183, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(452, 'Sunt laboriosam numquam doloribus a voluptas.', 1, 183, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(453, 'Quae exercitationem beatae impedit.', 1, 77, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(454, 'Illum voluptatibus ut itaque animi aut iusto voluptatem.', 1, 165, 0, 0, '2015-01-04 19:41:31', '2015-01-04 19:41:31'),
(455, 'Et debitis odio dicta deserunt ipsa placeat quia.', 1, 219, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(456, 'Dignissimos cum voluptatum ut consequatur aperiam assumenda.', 1, 60, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(457, 'Distinctio ut a voluptatem nulla voluptatem occaecati.', 1, 28, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(458, 'Ea quia eligendi corrupti similique.', 1, 219, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(459, 'Consequatur expedita doloremque soluta eveniet.', 1, 132, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(460, 'Nostrum vel officia nihil et earum similique.', 1, 194, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(461, 'Possimus eius ut accusantium eum.', 1, 111, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(462, 'Nisi ut nihil sit culpa qui et.', 1, 83, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(463, 'Ea omnis velit ipsa ab dolorem.', 1, 96, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(464, 'Rerum dolore asperiores officiis.', 1, 129, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(465, 'Ullam quia necessitatibus esse explicabo cupiditate quo.', 1, 125, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(466, 'Pariatur expedita incidunt ipsum quos.', 1, 16, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(467, 'Voluptas nemo voluptates esse atque labore laboriosam nihil.', 1, 12, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(468, 'Illum nemo suscipit cum quidem iusto officia.', 1, 75, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(469, 'Quasi voluptate maxime saepe saepe laborum vero.', 1, 95, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(470, 'Asperiores debitis itaque sapiente pariatur neque.', 1, 201, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(471, 'Quia omnis et vel dicta maxime numquam.', 1, 76, 0, 0, '2015-01-04 19:41:32', '2015-01-04 19:41:32'),
(472, 'Eaque praesentium sapiente voluptatem sequi sit nihil rem in.', 1, 27, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(473, 'Pariatur doloremque cumque saepe laudantium accusantium similique ad.', 1, 143, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(474, 'Non voluptatum itaque cupiditate magnam.', 1, 55, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(475, 'Architecto eligendi aut iste doloribus sit.', 1, 149, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(476, 'Dignissimos corporis vel dolore rerum.', 1, 1, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(477, 'Quae ab repellat repellendus dolorum eos ipsa ut excepturi.', 1, 85, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(478, 'Atque est dolorum veritatis nemo ducimus ad ad dolor.', 1, 119, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(479, 'Velit quia consequatur rerum vel eos quam.', 1, 55, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(480, 'Vero unde ea ratione molestiae est ut.', 1, 4, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(481, 'Quas similique laboriosam molestiae veniam cupiditate.', 1, 117, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(482, 'Itaque culpa veritatis et labore est.', 1, 175, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(483, 'Molestiae necessitatibus sapiente et quis ut nemo corporis.', 1, 95, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(484, 'Sint debitis qui qui pariatur nostrum facere accusamus non.', 1, 164, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(485, 'Laboriosam sed aut consequatur.', 1, 13, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(486, 'Facilis officiis nisi et quidem.', 1, 129, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(487, 'Dolore soluta vero quos quae velit qui explicabo qui.', 1, 98, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(488, 'Beatae aperiam maxime non tenetur cumque voluptatem eaque aut.', 1, 4, 0, 0, '2015-01-04 19:41:33', '2015-01-04 19:41:33'),
(489, 'Fugiat ut qui nobis tempore quis nulla quibusdam magnam.', 1, 217, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(490, 'Et est nulla rerum.', 1, 130, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(491, 'Molestiae illo ullam nihil nulla quia vero atque.', 1, 194, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(492, 'Molestiae aspernatur amet amet sunt consectetur.', 1, 194, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(493, 'Aliquam architecto ullam quia quam dolores.', 1, 58, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(494, 'Voluptas aperiam culpa dignissimos quos.', 1, 230, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(495, 'Dolorem nesciunt ullam nihil.', 1, 29, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(496, 'Est impedit maxime quo.', 1, 189, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(497, 'Ut libero doloribus voluptatem aliquid odit ducimus.', 1, 56, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(498, 'Eveniet consequatur quis impedit totam.', 1, 70, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(499, 'Repellat ut exercitationem asperiores itaque.', 1, 148, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(500, 'Sit inventore maxime quis.', 1, 150, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(501, 'Adipisci dolores soluta explicabo tempore.', 1, 191, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(502, 'Inventore deserunt architecto et consequatur accusantium sunt.', 1, 35, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(503, 'Est enim iure sit deserunt.', 1, 78, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(504, 'Possimus earum enim enim.', 1, 166, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(505, 'Vitae odit et esse quam.', 1, 111, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(506, 'Consequatur non ducimus quidem nihil corrupti quia.', 1, 34, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(507, 'Dolore repellat libero nam tempora iusto deserunt nemo.', 1, 192, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(508, 'Quam fugit possimus aut aliquid quo aut.', 1, 225, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(509, 'Doloremque distinctio dolor libero dolorum sunt aut magnam sunt.', 1, 104, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(510, 'Ab distinctio repellendus ab aut.', 1, 48, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(511, 'Aut id sed a.', 1, 152, 0, 0, '2015-01-04 19:41:34', '2015-01-04 19:41:34'),
(512, 'Alias quisquam consequatur et molestias.', 1, 222, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(513, 'Voluptas soluta voluptatem sapiente est sapiente facilis id reiciendis.', 1, 52, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(514, 'Eos accusamus illo exercitationem porro dolore non quia.', 1, 225, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(515, 'Earum et dignissimos architecto.', 1, 138, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(516, 'Animi quaerat est id qui corrupti et nam modi.', 1, 176, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(517, 'Laboriosam fuga excepturi aut.', 1, 119, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(518, 'Quod corrupti neque qui dignissimos ipsum quam.', 1, 47, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(519, 'Corrupti similique id id facere voluptas.', 1, 102, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(520, 'Ullam aliquam sed odit dolor.', 1, 132, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(521, 'Rerum repellendus minima quibusdam odit sapiente.', 1, 73, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(522, 'Ut modi inventore incidunt autem.', 1, 93, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(523, 'Accusantium placeat earum voluptas quod et deserunt harum.', 1, 55, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(524, 'Corrupti aut molestiae suscipit voluptatem.', 1, 76, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(525, 'Et ea et distinctio enim quo voluptatem.', 1, 169, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(526, 'Provident soluta quod et dolore.', 1, 52, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(527, 'Laudantium laboriosam eum sed aut perspiciatis nisi.', 1, 174, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(528, 'Aut distinctio sit esse iure perspiciatis numquam ipsam optio.', 1, 91, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(529, 'Qui quaerat fuga doloremque deleniti.', 1, 21, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(530, 'Animi ut et aspernatur perferendis voluptas non corrupti ratione.', 1, 127, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(531, 'Dolor fugiat sit quod id labore saepe.', 1, 199, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(532, 'Labore est omnis quo voluptates magnam corporis provident.', 1, 202, 0, 0, '2015-01-04 19:41:35', '2015-01-04 19:41:35'),
(533, 'Est dolores possimus incidunt molestiae repudiandae.', 1, 149, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(534, 'Sed molestiae eos veritatis consectetur.', 1, 52, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(535, 'Aperiam reprehenderit quo ea quae eos praesentium voluptas.', 1, 47, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(536, 'Officiis ea occaecati aliquid dolorum.', 1, 175, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(537, 'Molestias reprehenderit error ipsum.', 1, 215, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(538, 'Eius repellat aliquam atque.', 1, 7, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(539, 'Consectetur consequuntur voluptatum nulla.', 1, 97, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(540, 'Est itaque distinctio earum necessitatibus aut.', 1, 150, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(541, 'Commodi odit deleniti officia qui nostrum.', 1, 56, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(542, 'Odio sequi iusto cum qui.', 1, 166, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(543, 'Culpa est magnam dolores qui dolor cum.', 1, 230, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(544, 'Quibusdam totam dolore rerum sit et dolore molestiae tempora.', 1, 95, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(545, 'Cum vel molestiae iure aspernatur mollitia cupiditate qui.', 1, 226, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(546, 'Dolorem non unde ipsum quo magni ab est soluta.', 1, 200, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(547, 'Assumenda corrupti itaque nesciunt non.', 1, 153, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(548, 'Facere architecto doloribus aliquam sed vero nulla.', 1, 72, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(549, 'Sunt eum sit optio ullam sunt sequi.', 1, 96, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(550, 'Adipisci repellat minus esse quam consequatur architecto officiis adipisci.', 1, 76, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(551, 'Et qui quos aut eius et.', 1, 171, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(552, 'Aliquid quia sit minus rerum vel cumque aut.', 1, 1, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(553, 'Quam saepe quo iusto et porro ab.', 1, 173, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(554, 'Officia inventore et dolore ad ut.', 1, 39, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(555, 'Consequatur expedita id incidunt natus consequuntur sit.', 1, 7, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(556, 'Accusamus totam sequi eum nesciunt ut totam.', 1, 184, 0, 0, '2015-01-04 19:41:36', '2015-01-04 19:41:36'),
(557, 'Voluptates aliquam accusantium a dolores dicta.', 1, 110, 0, 0, '2015-01-04 19:41:37', '2015-01-04 19:41:37'),
(558, 'Praesentium et qui ut iste non saepe voluptatibus.', 1, 142, 0, 0, '2015-01-04 19:41:37', '2015-01-04 19:41:37'),
(559, 'Accusamus beatae distinctio fugiat qui rerum.', 1, 22, 0, 0, '2015-01-04 19:41:37', '2015-01-04 19:41:37'),
(560, 'Facilis sunt sint in et velit qui.', 1, 123, 0, 0, '2015-01-04 19:41:37', '2015-01-04 19:41:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 1, '172.16.13.162', 0, 0, 0, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=231 ;

--
-- 转存表中的数据 `topics`
--

INSERT INTO `topics` (`id`, `title`, `body`, `member_id`, `node_id`, `is_excellent`, `is_wiki`, `is_blocked`, `reply_count`, `view_count`, `favorite_count`, `vote_count`, `last_reply_user_id`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sint omnis provident at ab rem consequatur.', 'Et voluptatum est id architecto suscipit. Cumque atque id id ipsum neque. Consectetur vero velit nobis. Sunt ab ut explicabo rem assumenda delectus.', 1, 4, 0, 0, 0, 4, 0, 0, 0, 1, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(2, 'Voluptatibus commodi porro sit rerum placeat consequatur.', 'Sint aliquid ex a expedita. Architecto veritatis odit nesciunt. Cumque maxime eius corrupti sed labore et totam.', 1, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(3, 'Dolorem tenetur id sunt consectetur ut nisi assumenda.', 'Eum quo qui natus delectus. Rem velit quo deserunt nam consequuntur maxime totam. Autem velit cum et quas voluptatibus et eius.', 1, 41, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(4, 'Sint voluptatem totam qui facilis dolor magnam et excepturi.', 'Veritatis ab quisquam voluptatum adipisci. Possimus earum voluptatibus hic occaecati. Eligendi quis et ut.', 1, 27, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(5, 'Nobis quis nihil vero voluptatem qui et vitae.', 'Ducimus esse sed ipsum sed. Debitis quo doloribus recusandae ut voluptas ex. Nesciunt vel in qui ut necessitatibus.', 1, 7, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(6, 'Blanditiis magni voluptas corporis est reprehenderit numquam.', 'Voluptatum sed et omnis earum rerum dolorem dolor quaerat. Omnis eum ea odit atque. Facere quibusdam nulla suscipit similique voluptatum est. Qui nemo iusto reiciendis recusandae quia quis laborum.', 1, 41, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(7, 'Eaque ut voluptas ut et et deleniti eos.', 'Eum porro consequatur aut nesciunt distinctio. Eaque mollitia suscipit laboriosam exercitationem consequatur necessitatibus. Veniam consequatur sit autem error. Mollitia dolor saepe aut cupiditate.', 1, 12, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(8, 'Rerum blanditiis laudantium magnam qui sint numquam qui.', 'Veritatis temporibus quod odio maiores. Dicta et ut iusto et rerum. Deleniti iste alias sit sit voluptatem sed tempora incidunt.', 1, 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(9, 'Asperiores praesentium nihil non accusantium et.', 'Quis aut sint temporibus earum facere. Ut nostrum nemo pariatur sit. Consequatur perferendis ipsa dolores et eos ea voluptatibus qui. Eos velit eveniet dolores expedita delectus.', 1, 29, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(10, 'Amet quia aut quia est quos esse.', 'Itaque ad consequatur et voluptatem dolores sit aut distinctio. Qui ut quia accusantium incidunt. Expedita qui mollitia aut molestiae.', 1, 16, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(11, 'Qui tempore voluptate illo aspernatur molestias.', 'Eum ut dolor nobis. Voluptatem fugit quo consectetur nobis aperiam sunt dolores aperiam. Corporis cumque rerum ratione labore.', 1, 24, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(12, 'Voluptates esse magnam aut ut.', 'Perspiciatis quae sunt odit et. Officiis iure mollitia optio labore est animi. Et a qui rerum vel esse occaecati quisquam. Iusto dignissimos quaerat sed tempora sit architecto aut hic.', 1, 14, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(13, 'Eveniet laborum earum voluptatibus ipsa eum.', 'Ratione et est iusto voluptatem. Maxime molestias voluptate quas quia.', 1, 28, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(14, 'Animi ducimus officiis sunt nulla laboriosam hic.', 'Mollitia blanditiis rem id. Recusandae veniam cumque tempora ipsam ad et. Et consequatur maiores dolor quia in. Ducimus quidem debitis expedita dicta.', 1, 25, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:00', '2015-01-04 19:41:00'),
(15, 'Dolore ex molestiae consectetur modi.', 'Dolores assumenda quo sit et. Vel ullam minima voluptatem ut rem. Nihil consequuntur cupiditate fugiat rerum consequatur sint aut. Est omnis in est est.', 1, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(16, 'Id non distinctio incidunt nulla cupiditate itaque alias neque.', 'Et expedita labore accusamus corrupti architecto porro temporibus eaque. Iste dolorum et fuga iure exercitationem et in. Hic perspiciatis qui dolorem nulla.', 1, 24, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(17, 'Incidunt ex a accusantium error illo quas accusamus.', 'Accusantium ad et similique aut voluptate cumque. Iusto rerum dolor omnis incidunt nihil repellendus suscipit. Eveniet similique et et est.', 1, 22, 0, 0, 0, 6, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(18, 'Voluptatem minus quia numquam aut.', 'Illo alias aut et aut enim quia aut possimus. Aut expedita et illum adipisci magni quaerat eveniet. Aut porro nihil ipsa error. Saepe iure voluptatum accusantium.', 1, 10, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(19, 'Autem quia id ullam aliquam reiciendis dicta officiis.', 'Quia est delectus dolorem quae aliquid. Beatae quo velit nemo dolor nobis soluta qui. Sunt occaecati illum in sit consequuntur expedita. Quia velit ut sapiente.', 1, 14, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(20, 'Corporis repellendus possimus repellendus voluptatem rerum.', 'Quidem ex aut et consectetur. Ut veniam explicabo impedit voluptates. Numquam rerum dolor vel aliquid facere nihil. Facere placeat dolorem iste.', 1, 9, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(21, 'Eos animi expedita autem.', 'Quisquam quia sequi sequi sed voluptatem. Porro exercitationem provident id in. Magnam qui dolorem corporis aut. Cupiditate modi blanditiis eos rem.', 1, 8, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(22, 'Quo sint commodi quae sint.', 'Nihil est dolores quisquam voluptatibus. Reprehenderit explicabo aperiam et quas ipsa delectus.', 1, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(23, 'Incidunt saepe aliquam voluptate delectus et quasi voluptatibus.', 'Veniam veniam quaerat sed. Et ut voluptate ut qui quia pariatur. Atque iusto et minima magnam enim vel aperiam. Et consequatur animi qui.', 1, 14, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(24, 'Sint sapiente reiciendis ratione.', 'Ut nihil earum quae id. Minima omnis qui voluptatum illum. Enim et perspiciatis esse natus consequatur ut.', 1, 16, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(25, 'Repudiandae ipsam et et velit labore ex sed.', 'Deserunt est a quo et. Totam et est corrupti consequatur.\nHic doloribus in quo atque. Et nam animi nisi dicta. Pariatur et et iure nisi animi.', 1, 34, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(26, 'Eos optio molestiae rerum qui eveniet sed.', 'Necessitatibus eos ipsa ducimus eum in corrupti quidem. Aut sed quos possimus cum.', 1, 41, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(27, 'Fugit ea est debitis voluptas dolorem.', 'Suscipit enim facere et dolorum quae labore. Et perspiciatis accusantium quia. Amet pariatur nulla sit est est sequi.', 1, 36, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(28, 'Quaerat qui numquam sequi facilis dolorem suscipit.', 'Esse quo iure voluptas neque odit assumenda dicta. Veritatis beatae delectus perferendis. Ratione tempore repudiandae incidunt aut impedit.', 1, 28, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(29, 'Odio enim ducimus eligendi dignissimos eos inventore.', 'Adipisci quidem sapiente iusto nemo aperiam fugiat. Nihil ipsum repudiandae magni sed eius. Ut harum facere pariatur consequatur minus eaque. Id quam aut dolorem et sit non.', 1, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(30, 'Unde non laborum rerum aliquam totam.', 'Dolorem aut dolor dicta ratione soluta sint magnam. Nemo molestias sit voluptas enim soluta id quo. Tenetur qui minima exercitationem et velit. Cum fugiat eaque consequatur rerum eum voluptatem et.', 1, 5, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(31, 'Vitae recusandae dolor et id.', 'Similique maiores distinctio et et fugit praesentium enim placeat. Porro qui aspernatur est nemo esse omnis nisi omnis. Sit omnis ea nam sed.', 1, 4, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(32, 'Maiores rerum laboriosam dolor molestiae.', 'Excepturi et nobis eum qui ratione. Est laudantium perferendis placeat cupiditate porro. Eos accusantium tempore est eveniet exercitationem nihil debitis exercitationem.', 1, 35, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(33, 'Molestias voluptatibus distinctio est aut aut aut.', 'Velit in officiis recusandae iure repudiandae ea. Qui porro iure consequuntur aut maiores minima laboriosam. Praesentium fugiat nulla iste. Sequi sed necessitatibus sit in repellendus facere modi in.', 1, 17, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(34, 'Et quisquam nobis consequatur.', 'Et dignissimos sit minus itaque ad porro et. Vitae dolor enim dolorem. Eligendi numquam labore asperiores blanditiis officia suscipit. Quos magni quam minima sit repellat corporis ab eius.', 1, 27, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(35, 'Illum nostrum sit dolores quia sed.', 'Ipsam velit amet consectetur consequatur cumque dolorem. Beatae omnis eos dolor explicabo. Vitae necessitatibus consequuntur qui reiciendis.', 1, 10, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:01', '2015-01-04 19:41:01'),
(36, 'Vitae et vel et illo unde.', 'Eum amet id nihil exercitationem sunt nam. Repellat dolores qui fugiat natus eum. Libero dolor sit nam nostrum.', 1, 19, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(37, 'Exercitationem impedit dolorem quia rem ut et.', 'Laboriosam mollitia quos earum itaque natus architecto. Facere accusantium id quisquam quam nihil fugiat vel. Recusandae ut sed perferendis perferendis.', 1, 15, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(38, 'Soluta facilis aliquid occaecati explicabo.', 'Ab odio et veritatis ipsam. Non ea neque rerum quibusdam perspiciatis ut expedita. Ut est mollitia sed perspiciatis sint harum molestias.', 1, 35, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(39, 'Aut voluptatem asperiores iure quia autem rem natus.', 'Voluptatibus et necessitatibus voluptates ut et. Quos exercitationem nam velit rem sed veritatis qui. Officiis ea aut nihil qui officia. Vero totam voluptas ut repellendus cupiditate sint eos sed.', 1, 30, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(40, 'Animi voluptatem qui dolores sit dolor.', 'Et ipsum libero qui quos debitis est vel. In atque quasi qui vel. Rerum beatae iusto dolor et.', 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(41, 'Veritatis consectetur quas assumenda architecto perferendis.', 'Voluptas omnis quibusdam fugit eos recusandae. Nisi dolores possimus dolores aut nemo. Qui natus veniam repellat ut.\nAut aut perferendis temporibus sint iure amet. Adipisci et distinctio placeat qui.', 1, 31, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(42, 'Aut alias pariatur omnis.', 'Voluptatem quas suscipit impedit iure. Harum consequatur doloremque dolorum aut. Praesentium voluptas hic velit quo temporibus corporis. Aperiam nihil itaque quaerat similique error et.', 1, 20, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(43, 'Culpa eos ducimus modi inventore repellat sit.', 'Voluptatem esse voluptatem sed possimus facere earum eos. Enim voluptatem laudantium itaque. Omnis nulla voluptate atque sint aut eligendi.', 1, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(44, 'Neque aut aut pariatur est rerum.', 'Impedit veniam ullam labore. Atque at consequatur ipsum quis et officiis consequatur. Reprehenderit non necessitatibus ut et doloremque fugit. Et et itaque quibusdam neque.', 1, 9, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(45, 'Ex minima officia et architecto ut.', 'Officia esse cum unde aut. Adipisci odit quia quia amet fuga quidem qui ea.', 1, 9, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(46, 'Aut in corrupti libero aut quia.', 'Natus vel velit sed sunt esse et tempora. Atque ipsum ratione ipsa beatae modi. Suscipit nemo et ducimus beatae.', 1, 36, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(47, 'Autem at tenetur dolorem exercitationem consectetur libero.', 'Aliquam tempora quisquam odio nihil veritatis amet ratione. Eius ratione non et consequatur ipsa voluptas facilis. Ipsa quaerat ex voluptatum quia minus qui qui.', 1, 12, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(48, 'Similique quia exercitationem culpa sed.', 'Molestiae ipsum cupiditate ab rem asperiores. Voluptatum officiis placeat sit velit. Minus neque reiciendis nostrum quisquam. Similique labore possimus voluptatibus at ex maxime.', 1, 13, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(49, 'Delectus ut aut adipisci itaque.', 'Hic a quaerat velit provident natus tempora voluptatibus. Ratione mollitia occaecati quos ea iure. Sunt qui sequi deleniti. Vel tempora beatae nobis.', 1, 30, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(50, 'Qui animi explicabo ad nemo odit quos sint sit.', 'Mollitia in at praesentium et sunt. Soluta ipsum aut sed vel eaque ab. Accusantium omnis quasi eius recusandae. Odit eum officiis rerum dolorum corrupti dolore.', 1, 19, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(51, 'Autem quam sapiente eaque consequuntur.', 'Rerum neque rem aliquam enim optio rerum. Fugiat quisquam quaerat in excepturi vitae molestias. Qui minima reiciendis sit.', 1, 40, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(52, 'Et veniam voluptatem dolorem impedit voluptas.', 'Cupiditate odit vitae sed sunt porro. Suscipit laudantium voluptate odit delectus. Itaque sint perferendis delectus.', 1, 29, 1, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(53, 'Expedita fugiat molestiae repudiandae sit ad quo placeat.', 'Voluptatem omnis vero soluta quia nihil. Explicabo nam rem non et et in delectus. Ullam magni deserunt inventore cum et. Ipsum illum eius et rerum vel officiis.', 1, 37, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(54, 'Et a amet libero itaque explicabo voluptatem.', 'Et molestias et debitis repudiandae velit consequatur. Iure repudiandae aliquam ipsa mollitia molestias impedit totam.', 1, 18, 1, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(55, 'Aut porro architecto iste vel dolorum molestiae.', 'Repellat vitae non sit facilis aut. Ut quia nostrum quo rem.', 1, 13, 1, 0, 0, 7, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(56, 'Optio magnam ipsa nam nihil iste.', 'A nesciunt ea minima aperiam earum est. Et facilis illum totam qui unde ut. Quia quaerat molestias assumenda nobis praesentium odit. Rerum optio incidunt adipisci similique occaecati.', 1, 42, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(57, 'Id labore omnis recusandae sapiente velit molestiae.', 'Aut sit est recusandae. Aliquam omnis velit consectetur laborum expedita cupiditate eum perspiciatis. Sint voluptates omnis iste. Magni praesentium quo voluptatem facere.', 1, 5, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(58, 'Quos et nulla sed omnis eaque consequatur pariatur.', 'Et voluptatem qui magni. Sed reiciendis dicta rerum ipsam. Laborum dolorum doloremque ex et non.', 1, 42, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(59, 'Sequi sapiente qui ex dolores.', 'Aut odio quia culpa. At et et sit. Et maiores distinctio rem minus voluptatem corrupti dolores. Illum neque consequatur nihil odio atque fugit.\nDebitis aut sit nobis ea. Atque voluptas non itaque et.', 1, 35, 1, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(60, 'Repellat fuga velit eveniet ut.', 'Sit sunt quo consequatur consequatur. Voluptas nihil consequatur quis. Ratione voluptatibus aspernatur temporibus corrupti qui dicta.', 1, 33, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(61, 'Eos distinctio et labore.', 'Autem exercitationem iusto officiis numquam quibusdam ex iste. Quasi quia sit dicta. Dignissimos qui est nobis ipsa. Et vero id rerum aut a a dicta.', 1, 28, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(62, 'Fugiat repudiandae deserunt vel molestias.', 'Quaerat quidem doloremque sit ut pariatur aut. Et non ab autem et esse consequuntur et.', 1, 4, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(63, 'Doloribus voluptates dignissimos iusto adipisci est velit.', 'Omnis adipisci molestiae odio velit rerum. Sapiente harum quo sint nihil voluptas impedit quia nihil. Debitis nulla voluptas quo omnis id ipsum.', 1, 8, 1, 0, 0, 7, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:02', '2015-01-04 19:41:02'),
(64, 'Ut sed alias quia est et ipsa animi.', 'Eum sequi nisi ducimus perspiciatis dignissimos. Vero quia rerum dolorum inventore. Minus dolorum minus quas cum odio quaerat.', 1, 16, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(65, 'Similique illo molestiae atque quia.', 'Aperiam rerum est velit nisi tempora. Corrupti et et ad debitis. Dignissimos cum quis dolores non aut ut quis. Vero cum debitis saepe.', 1, 12, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(66, 'Et distinctio et est illo accusamus.', 'Sed sed repudiandae quas. Voluptatem nemo suscipit inventore eius aspernatur perspiciatis enim. Mollitia enim nihil quo non omnis necessitatibus. Porro nemo eius alias ipsa sunt eum.', 1, 7, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(67, 'Praesentium itaque doloremque ea architecto vel consectetur dolores ab.', 'Sapiente id commodi adipisci suscipit nesciunt. Qui sed omnis totam. Eaque occaecati cum explicabo quia reiciendis. Odit harum omnis est totam impedit.', 1, 33, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(68, 'Explicabo non consequuntur rerum architecto itaque accusamus.', 'Dolore est quibusdam ad consequuntur officia ipsam aliquid. Incidunt veritatis doloremque qui suscipit quia. Officia nulla quia inventore id.', 1, 13, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(69, 'Dolorem explicabo molestias natus corrupti.', 'Rerum ipsam voluptas earum. Delectus quia voluptas sit nesciunt optio quia reprehenderit.', 1, 6, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(70, 'Dolorem harum consequatur eos eaque cumque.', 'Delectus quia sit ad repellat. Consequatur molestiae alias ut debitis voluptatibus itaque iure quis. Corrupti non officia architecto eum. Velit sunt et commodi voluptates fugit.', 1, 38, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(71, 'Molestias laudantium eveniet numquam sapiente est eos.', 'Illum rerum iusto recusandae illo id. Non iusto et rerum aut mollitia ut distinctio vero. Qui nulla quisquam qui et.', 1, 11, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(72, 'In necessitatibus quam in omnis quia quasi fuga.', 'Sit deserunt tempora debitis ut libero numquam. Tempora et nam ipsum et distinctio neque. Dolor qui quaerat assumenda id velit.', 1, 36, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(73, 'Quidem sequi blanditiis ipsa quis.', 'Qui id voluptatem molestiae dolorem dolorem cupiditate reiciendis. Non rem enim facilis totam ipsum. Consequatur aut veniam vel dicta deleniti eaque iusto.', 1, 13, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(74, 'Non ipsam odio qui beatae pariatur quidem.', 'Ut voluptate voluptatem enim dolorem. Aspernatur similique ex autem pariatur nemo inventore. Dolor aut adipisci enim ratione. Laboriosam et et laudantium animi.', 1, 24, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(75, 'Culpa molestias ex sed aspernatur blanditiis.', 'Sequi neque laboriosam dicta eligendi. Et impedit repellendus non sed. In itaque atque voluptas et. Qui aliquam sit omnis eos sit eligendi.', 1, 24, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(76, 'Pariatur vel alias quo aliquam.', 'Consectetur voluptate vel quia. Autem nihil corporis quos odio aut. Veritatis veniam explicabo tempora autem repellat rem temporibus error.', 1, 24, 1, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(77, 'Vitae modi inventore ut odit.', 'Voluptas minima et cum nobis tenetur molestiae. Esse similique quae aut harum accusamus. Veniam occaecati in vitae eaque fuga qui quod sit.', 1, 19, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(78, 'In dolores architecto suscipit expedita eos.', 'Vitae illum excepturi et voluptatem quo. Et optio ut nihil et. Sequi molestias qui incidunt eum qui neque magni maxime.', 1, 12, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(79, 'Aut et aut amet rerum.', 'Qui consequatur et nesciunt odit accusantium animi. Cum dolores animi recusandae autem quo. Autem sunt natus quia consequatur voluptatem quisquam. Itaque aliquid inventore asperiores optio.', 1, 34, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(80, 'Quam nam deleniti rerum voluptate quaerat veniam.', 'Earum quia repellendus exercitationem deleniti aut ut. Placeat rem ea nulla. Quos qui deleniti et nemo suscipit quas corrupti.', 1, 29, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(81, 'Voluptatem sint ut excepturi ut.', 'Autem necessitatibus et qui dolorum aut ab. Iure voluptatem suscipit quo quia consectetur voluptatem. Qui quam porro quos et consequatur.', 1, 30, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(82, 'Occaecati ut ut commodi dolorem quis eum molestiae dolore.', 'Ipsa facere eum numquam dolores animi soluta deserunt. Eos temporibus provident repellat et ea praesentium.', 1, 39, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(83, 'Voluptatem quia est ullam ut quia.', 'Vel optio et neque. Ut consequatur soluta dolore ut. Rerum rem facere mollitia aperiam reprehenderit omnis. Ut sed quia quae quasi.', 1, 9, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(84, 'Reprehenderit veritatis et maxime dolorum qui doloremque nesciunt.', 'Ut officiis iure esse suscipit quia quia. Perferendis voluptatem laboriosam harum dolore aut molestias doloribus. Ut quam ducimus omnis ut officiis.', 1, 11, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:03', '2015-01-04 19:41:03'),
(85, 'Aliquid totam rerum facilis sunt ipsam.', 'Nulla ut laudantium magni labore quo explicabo voluptatibus sequi. Sunt aut velit alias quo in voluptatibus. Id sed placeat culpa mollitia aut.', 1, 22, 1, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(86, 'Facere hic corrupti vitae similique incidunt.', 'Iure dolor ad minima exercitationem laborum ipsam quidem illo. Blanditiis aut ut est sit. Aut dolor adipisci cum et repellendus et sapiente.', 1, 28, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(87, 'Rerum vero repellat vero distinctio amet.', 'Perspiciatis quisquam aliquam qui illo quibusdam consectetur qui. Aliquid ullam ad ut.', 1, 33, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(88, 'Cumque necessitatibus est non aut inventore quia.', 'Ea eum molestias aliquid laudantium impedit et illum. Libero qui ut sunt ex. Autem culpa maxime rem fugiat et.', 1, 10, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(89, 'Omnis commodi corrupti voluptate tempora ut et.', 'Doloremque dolore expedita id. Iste laborum veniam mollitia omnis odio repellat. Minima nobis adipisci laborum similique aut quisquam ipsam. Adipisci id ullam nam optio harum tempora.', 1, 1, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(90, 'Expedita laboriosam et et animi.', 'Aliquid earum impedit et natus. Sequi magnam consequatur ullam. Quia ipsum saepe tenetur molestiae ipsum magnam numquam. Est et consequatur distinctio blanditiis pariatur.', 1, 27, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(91, 'Hic id aut illo id molestiae.', 'Ut sunt aut aut id consequatur ut aut. Voluptas placeat nesciunt dicta qui.', 1, 4, 1, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(92, 'Blanditiis facere voluptatibus architecto corporis inventore rerum.', 'Accusamus quibusdam eos veniam sint molestiae. Qui soluta et et laudantium. Excepturi labore fugit corrupti qui. Qui sint sit expedita aut saepe aut.', 1, 1, 1, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(93, 'Quo et sit ad iure exercitationem.', 'Aliquid nesciunt error fugit suscipit et minima. Id iste atque in dolor odio pariatur. Nulla animi odit cum placeat.', 1, 41, 1, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(94, 'Veniam qui id et adipisci voluptate et id ducimus.', 'Quia aut alias recusandae totam facilis maxime. Ab id nemo modi quod sed vero sint. Hic quibusdam ipsa est cumque quia maxime ad. Est quia corporis repellendus animi.', 1, 38, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(95, 'Rerum nisi nemo enim ut eligendi aut quis ut.', 'Est facilis et magnam non laudantium. Sed doloribus iusto aut error ipsa dolorem sunt. Ratione provident voluptatum ex suscipit.', 1, 17, 1, 0, 0, 8, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(96, 'Nulla eos iusto omnis et sunt reprehenderit.', 'Sint ut fuga sit consectetur sapiente est distinctio. Eos et tempora et provident laboriosam eaque. Dolores sunt quia sed sapiente quam. Et nesciunt amet ipsa sunt.', 1, 25, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(97, 'Ex ut natus molestiae et dolores quidem.', 'Occaecati eveniet ipsa sunt reprehenderit nobis voluptatem est. Cum deleniti dolores pariatur porro sint. Repellat amet est ipsum et et aspernatur consequatur.', 1, 19, 1, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(98, 'Suscipit dignissimos fuga iure dolor amet inventore officia.', 'Dolore sunt veritatis est provident alias culpa. Et non ducimus maiores architecto. Sunt omnis ut excepturi eum. Incidunt esse libero voluptates qui laborum nihil sint provident.', 1, 10, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(99, 'Nisi nobis quibusdam unde.', 'Commodi ullam ut sit et. Tempora eligendi in est ut ipsam quisquam blanditiis. Eveniet est vitae dolor enim rerum architecto.', 1, 42, 1, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(100, 'Distinctio ab id ea voluptas.', 'Sit alias asperiores expedita quae. Explicabo nobis et pariatur occaecati in. In modi qui qui quae eum maiores vero in.', 1, 28, 1, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:04', '2015-01-04 19:41:04'),
(101, 'Libero voluptatem et quo sit laudantium velit accusantium.', 'Velit sed dicta fuga. Tenetur dicta et ut et ipsum veritatis. Sequi consequatur qui culpa quod non sunt.', 1, 32, 0, 1, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(102, 'Recusandae rerum repellat et ducimus.', 'Est asperiores cupiditate magni totam veritatis. Voluptatem fuga consequatur dolorem officiis dolores. Debitis fuga consequatur sed magni est.', 1, 41, 0, 1, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(103, 'Explicabo perspiciatis incidunt doloremque.', 'Laboriosam ipsa incidunt in aut perspiciatis. Tenetur ut dolores aspernatur cum iure. Hic qui deserunt quis consequatur dignissimos culpa. Temporibus dolor ut suscipit quia.', 1, 35, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(104, 'Veniam id ut a voluptas id ea voluptate.', 'Et aliquid quidem pariatur vel amet voluptas. Fugit commodi quidem non consequatur deserunt optio accusamus. Nostrum molestiae facilis nobis ratione laboriosam. Inventore voluptas ut corporis aut.', 1, 36, 0, 1, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(105, 'Optio vitae pariatur sequi placeat ex quas et.', 'Qui qui accusantium architecto at in. Minima ut nostrum tenetur facilis asperiores voluptas et delectus. Iste est labore cupiditate tenetur voluptates.', 1, 13, 0, 1, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(106, 'Porro perferendis fuga sint dolorem excepturi maiores.', 'Necessitatibus consequatur doloribus voluptas ipsam aut beatae aut eos. Facilis veniam qui voluptatibus quis repellendus iste enim. Et laudantium recusandae cupiditate modi.', 1, 27, 0, 1, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(107, 'Tempora eaque libero amet qui.', 'Voluptates aut magnam vero quidem tenetur dolor. Quae tempore soluta voluptas culpa officia consequatur consequuntur. Rem qui illo sed quia distinctio harum laborum ipsa.', 1, 31, 0, 1, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(108, 'Perferendis dolor dolor et est soluta.', 'Sunt possimus enim neque rem doloribus necessitatibus. Hic ut ipsa eos ullam. Repellat eos qui repellendus ullam maxime nobis dolorem. Delectus nulla voluptatibus maiores minima facilis.', 1, 40, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(109, 'Aut quam a eius vero.', 'Necessitatibus sit maxime aut aut velit. Ullam in ipsum eveniet quia vitae vel rerum. Dignissimos saepe vel dolores quis cumque eveniet. Et ipsa odit dolor accusantium natus veniam et et.', 1, 14, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(110, 'Cum et quibusdam id aut facilis quos dolorum.', 'Et eligendi iusto quasi odit sed provident eos. Beatae autem maxime consequatur ut cum quos est. Explicabo ullam ea sunt eos. Et dolorum quaerat velit incidunt eveniet rem.', 1, 15, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(111, 'Quia voluptatum voluptas vitae aut rerum.', 'Aut omnis sit quia repellat at dolore eos pariatur. Qui asperiores ut distinctio ullam rerum quidem quos. Consequatur minus non aut deserunt autem vel corrupti repellat.', 1, 29, 0, 1, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(112, 'Ut illum repellendus sit quasi dolor eius.', 'Consequatur impedit vel perferendis sed ad ducimus. Occaecati aspernatur sapiente aut vitae.', 1, 33, 0, 1, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(113, 'Et velit adipisci sint.', 'Voluptatem quis et voluptate quia. Illo et optio magnam eos et repellat. Quae ab exercitationem alias incidunt aperiam facere eos et.', 1, 22, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(114, 'Dolorem omnis magni sit labore ex suscipit dolorem.', 'Atque sapiente possimus voluptate rem. Natus et incidunt sit. Quia molestiae asperiores minus et pariatur nobis sed.', 1, 2, 0, 1, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(115, 'Ut repellat pariatur quaerat iste enim saepe.', 'Commodi et adipisci reiciendis reprehenderit. Vel non pariatur laborum quidem id.\nImpedit quidem incidunt ratione minima sit. Aut voluptas optio velit iusto corporis dignissimos.', 1, 11, 0, 1, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(116, 'Possimus quasi facere perferendis officiis nisi fuga quia necessitatibus.', 'Itaque est recusandae assumenda sed unde porro. Adipisci fugiat cum reprehenderit sint rerum veniam consequatur. Neque praesentium dolorem aspernatur repellendus hic maxime.', 1, 33, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(117, 'Tempore ea consequuntur dolor aut ab sunt.', 'Nam iste ut quidem quia. Quia quasi quam non cumque quia. Possimus provident occaecati deserunt possimus eum vel aut.', 1, 24, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(118, 'Nisi voluptatem voluptas dolorum eius ipsum eum consequatur.', 'Ut fuga rerum ut. Non animi quae labore facilis necessitatibus dolorem recusandae dolorem. Et a suscipit eos asperiores quod.', 1, 10, 0, 1, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(119, 'Eaque illum sit voluptas aut.', 'Facere hic rerum est nisi illum dolor. Porro omnis a quia rerum. Corrupti reiciendis et dolorum harum odio.', 1, 26, 0, 1, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(120, 'Eum aliquid voluptatem cumque consequatur sit odit nulla et.', 'Ipsa est labore est aut tenetur rerum quia. Illum quis quibusdam excepturi et est libero. Aut expedita id at cumque quisquam numquam eveniet.', 1, 3, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(121, 'Quia nostrum tenetur adipisci dolorem et et tempore.', 'Et illum quisquam amet ut. Qui aut maiores ipsam. Dolorum autem magnam et excepturi non modi reprehenderit. Modi autem commodi quae.', 1, 23, 0, 1, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(122, 'Reiciendis quis quis repellat ut.', 'Debitis ad neque sunt nisi a ut quaerat. Consequatur similique sunt voluptatem aut illo dolores. Quis officia possimus inventore soluta impedit.', 1, 30, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(123, 'Dolor blanditiis illum fugit nam aut fugit saepe.', 'Quisquam qui repudiandae qui officia voluptas. Aut aut ut rerum error aut voluptatem velit. Ab accusamus et ex quia et quae.', 1, 42, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(124, 'Debitis atque reiciendis error beatae et voluptatem quam modi.', 'Enim aspernatur iste in dolores et mollitia. Qui nulla incidunt est nostrum eaque quia. Sint non reprehenderit odit optio tenetur aliquam atque commodi.', 1, 30, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(125, 'Nobis quaerat architecto numquam ratione et eaque sunt.', 'Eligendi sequi cupiditate enim aliquam. Eveniet fugit sunt quis pariatur quia. Repudiandae repudiandae dolorem eveniet error. Deserunt ut qui necessitatibus nostrum deleniti.', 1, 25, 0, 1, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:05', '2015-01-04 19:41:05'),
(126, 'In porro itaque magni eligendi qui quia.', 'Harum voluptatem in eos magnam rerum cum saepe. Magnam magni sequi laborum sit ut itaque. Repellendus fuga exercitationem molestiae. Ipsa et enim incidunt ipsum.', 1, 12, 0, 1, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(127, 'Est eveniet minus deserunt fugit ut itaque blanditiis.', 'Possimus provident molestiae amet ut et sed. Rerum in aliquam dolores ipsam.', 1, 29, 0, 1, 0, 6, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(128, 'Velit maxime velit eaque eaque.', 'A ipsam omnis cum iusto accusantium aspernatur molestiae. Omnis fugiat atque est facilis id sed. Accusamus aut nam vel est voluptate. Iusto quos voluptatibus exercitationem iure et cum.', 1, 5, 0, 1, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(129, 'Qui at non fugiat corrupti provident reprehenderit.', 'Earum cupiditate cupiditate enim modi temporibus aut sit. Qui aperiam ipsa qui assumenda enim. Explicabo et deleniti quis doloremque et distinctio.', 1, 39, 0, 1, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(130, 'Nisi exercitationem nisi eum quia accusamus molestias.', 'Necessitatibus dolore natus beatae fugit doloremque tempora voluptatem. Corrupti dolorem asperiores unde qui labore quia.', 1, 27, 0, 1, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(131, 'Velit occaecati voluptas commodi dolor ducimus eum.', 'Voluptatem ipsam esse laborum recusandae iste optio odio. Et ea distinctio temporibus error eveniet eveniet. Placeat inventore quia totam.', 1, 10, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(132, 'Unde voluptas aut nulla cum dolorem saepe.', 'Quia ab id aspernatur nihil. Autem dolor sit non reiciendis. Delectus tenetur et sint.\nQuaerat et earum totam dolores labore corporis. Eum odio eum tempore et aspernatur.', 1, 35, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(133, 'Incidunt ea sed nobis dolorem hic voluptatem repellat.', 'Vitae est est quidem est esse rem. Sint est quasi ad.\nSapiente error tenetur autem quaerat corrupti hic soluta. Dolores et nihil incidunt quia quis. Aut ducimus id soluta minima blanditiis.', 1, 22, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(134, 'Molestiae vero rerum enim unde.', 'Quia fugiat molestias rerum odit impedit sunt saepe. Quia temporibus numquam nesciunt et esse quisquam. Dolorem omnis ut fugiat eos mollitia officiis.', 1, 18, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(135, 'Perspiciatis consectetur repellat est sunt odio.', 'Quis et exercitationem nobis molestias vitae minima delectus. Aliquam quis ullam nam minima qui sit sit. Fuga debitis similique adipisci tempora eligendi.', 1, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(136, 'Nostrum voluptatibus laboriosam laborum optio qui id vero.', 'Nisi rerum et vero illum sint pariatur. Ut ratione ipsam sequi sit numquam facere. Velit temporibus assumenda nostrum non accusantium quibusdam. Libero dolores harum sint explicabo voluptatem.', 1, 14, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(137, 'Nobis numquam atque culpa doloribus ex distinctio nobis.', 'Laborum dolorum aut esse id consequatur. Est repellendus quia consequuntur voluptas consequatur. Sequi et eos excepturi incidunt doloremque itaque.', 1, 9, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(138, 'Autem est magni velit sed quam nemo.', 'Voluptates recusandae et similique maxime quia harum aut. Dolorem est minus illum optio sunt officiis qui est. Sit reprehenderit est eos sint quod.', 1, 36, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(139, 'Beatae deserunt et quo quia quae velit.', 'Enim unde assumenda nihil tempore dignissimos ut. Autem error quia in. Nulla vero possimus cum.', 1, 2, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(140, 'Explicabo molestiae rerum quos numquam quibusdam error.', 'Quod eveniet maiores rerum doloremque vel. Et rem aut debitis blanditiis saepe. Eos exercitationem enim excepturi nihil facilis blanditiis.', 1, 37, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(141, 'Eos quos ipsam suscipit quod.', 'Atque ipsam suscipit odit ea nobis accusamus id. Dolor ad nihil ullam quia veniam voluptas. Architecto vero hic nam consequatur necessitatibus iste numquam.', 1, 10, 0, 0, 0, 6, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(142, 'Et voluptatem fugit autem.', 'Qui sequi distinctio id. Consequatur accusantium est minus facilis. Aperiam non eum omnis consectetur. Quia magnam officiis dolores deleniti esse quam earum.', 1, 42, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(143, 'Nesciunt eos atque placeat praesentium suscipit ut quae.', 'A quia et quos minima. Sed sint in laudantium autem ipsa numquam asperiores. Et fugit quos velit at.', 1, 10, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(144, 'Accusamus pariatur sed dolorum nam aut hic occaecati.', 'Est nostrum ea quam totam. Voluptatem aut libero possimus quas aut nam. Perspiciatis quis ipsa tempora recusandae. Atque quod sed ducimus ea consequuntur sed.', 1, 37, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(145, 'Itaque odio et deleniti placeat.', 'Nostrum dolorum aut voluptatem accusantium maxime rem neque. Maxime mollitia animi quia ab eius. Dicta explicabo tenetur aperiam sequi esse autem vel.', 1, 4, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(146, 'Aperiam consectetur dolores magni.', 'Esse ut quia voluptas rerum veniam placeat rem. Et occaecati aperiam aut possimus suscipit.', 1, 11, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(147, 'Id consequatur rem error debitis voluptates iste.', 'Et nisi nesciunt sunt qui. Aut velit et et occaecati. Velit est temporibus laborum modi aperiam et.', 1, 41, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(148, 'Ex repudiandae eos quia exercitationem enim id porro.', 'Placeat aspernatur harum non soluta eos sapiente. Laborum aliquam vel eum dolorem itaque vel voluptas. Iusto fuga quidem sit dolor vero saepe mollitia tenetur.', 1, 30, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(149, 'Qui ab fugiat nobis quos enim consectetur consequatur optio.', 'Quos modi laborum eius ea. Fuga officiis blanditiis saepe qui alias voluptas facilis et. Aliquid reiciendis ut ea aliquid totam repellendus quibusdam.', 1, 9, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:06', '2015-01-04 19:41:06'),
(150, 'Omnis non iste similique et voluptas.', 'Reiciendis quidem reprehenderit fugit distinctio. Dolorum eveniet quis voluptas eos. Dolores enim maiores voluptatem itaque voluptatem explicabo. Eum et esse dicta impedit alias est quibusdam.', 1, 25, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(151, 'In asperiores et odit et.', 'Laboriosam sit eligendi laborum doloribus cumque quos. Et laborum nemo voluptas quia asperiores cumque suscipit. Voluptate fugiat fugiat eligendi enim enim.', 1, 32, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(152, 'Est earum animi sunt non eum deserunt.', 'Excepturi ad nihil veritatis architecto ut. Consequatur non dolores eligendi quia. Consequatur cupiditate quidem veniam corrupti.', 1, 35, 0, 0, 0, 8, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(153, 'Dolores et et rerum harum.', 'Sapiente rem est optio consequatur ipsum voluptas enim. Possimus qui animi ipsam id et.', 1, 40, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(154, 'Aspernatur et quia at cum.', 'Corrupti qui dolorem autem. Ut officiis nihil rerum fugit pariatur. Dolorem qui officiis laudantium quia aut et. Cupiditate vero est placeat et molestias.', 1, 9, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(155, 'Quia magnam consequuntur fuga consequuntur laudantium eos rerum.', 'At sint sapiente veritatis dolorem omnis. Qui provident ut nisi quos repellendus. Aut quis incidunt accusamus. Officiis repellat ad molestiae.', 1, 33, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(156, 'Aspernatur sint tempora praesentium qui.', 'Dolorem voluptatem nostrum velit consequuntur. Ut eligendi officia non. Eos et perferendis cupiditate. Eligendi quia est odit quod delectus voluptas labore.', 1, 35, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(157, 'Reiciendis itaque in nostrum explicabo ipsum nam nesciunt.', 'Ducimus eos eveniet ad fugit. Odio quos qui consectetur expedita dolore et. Cumque doloremque ipsam nisi vero at rerum. Provident id sed nobis.', 1, 42, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(158, 'Officiis qui et sit debitis.', 'Totam rerum voluptas harum et et qui. Nulla dolore perspiciatis numquam molestias sunt. Laudantium tenetur eligendi voluptatem veniam et animi ut.', 1, 2, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(159, 'Eaque eligendi sit nostrum perferendis.', 'Rerum consequatur assumenda quis nam inventore ducimus. Quo quo molestiae eaque et ea sunt. Totam ullam iusto architecto repudiandae.', 1, 2, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(160, 'Ut et non sapiente.', 'Soluta ut ab non temporibus incidunt iste. Ut qui porro iusto nemo. Recusandae maxime aut perferendis eaque ut aut aut. Dolorum debitis doloremque ipsum consequatur.', 1, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(161, 'Dicta rerum enim vero voluptatum culpa iure.', 'Quae quis eos occaecati est aut voluptates. Maiores rerum vel adipisci sed quia ut nemo. Eius quas nihil modi officiis libero consequuntur voluptas.', 1, 42, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(162, 'Doloremque quod iste omnis et.', 'Iste molestiae officia aut sed consequatur. Temporibus non aut vel quaerat ut fuga. Neque deleniti dicta ipsum nesciunt.', 1, 13, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(163, 'Hic qui voluptatem ut quia omnis.', 'Perspiciatis autem ea officia aperiam quis sit. Sed optio doloribus voluptas commodi aut aut. Aut non fugit aut enim laboriosam ipsam assumenda officia.', 1, 17, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(164, 'Aut et voluptatibus sunt corporis voluptate asperiores ut.', 'Consequatur animi consectetur nisi quia harum perferendis quidem. Quos maxime pariatur ut voluptas sint autem accusantium. Aut quo ipsum et ut.', 1, 13, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(165, 'Qui voluptatem aspernatur voluptatem sed.', 'Tenetur nesciunt esse rerum repudiandae et ut sint. Odio pariatur ratione qui. Enim dolore rerum corrupti omnis voluptatum.', 1, 10, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(166, 'Necessitatibus et neque maiores voluptatum assumenda et dignissimos.', 'Eius quidem enim corporis illo qui. Recusandae temporibus similique ea cumque impedit accusamus.', 1, 22, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(167, 'Facilis velit facilis illo quod delectus culpa ipsa.', 'Veniam error aut earum. Velit sapiente dolores cum quis velit voluptatibus. Dolorem quia ipsam est. Eligendi pariatur ut officia minima dolores earum.', 1, 33, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(168, 'Dolor iure ut hic modi qui.', 'Eligendi sint eum laboriosam veritatis. Beatae placeat harum ad non modi vel quaerat facilis. Illum consequuntur sit molestiae et at unde fuga.', 1, 40, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(169, 'Repellat vitae consequatur sit sunt delectus a.', 'Officia voluptatem sed vero deserunt molestiae autem voluptatem. Culpa corporis et quia dignissimos quia repellendus et. Eos corrupti ducimus tempora cumque suscipit.', 1, 13, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(170, 'Quam est qui molestias eligendi facere voluptas voluptatem.', 'Cum doloremque saepe voluptas eos et vitae harum. Quia omnis perspiciatis occaecati nobis. Ut nulla consequatur laborum quod quam autem fugiat. Voluptatem esse eum qui.', 1, 31, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:07', '2015-01-04 19:41:07'),
(171, 'Eos culpa molestiae est a enim vitae.', 'Iure velit dolor enim omnis sit illo architecto. Ratione quaerat et ea. Pariatur dolores rerum quis occaecati in animi officiis. Omnis veritatis fugiat est vero hic qui aut.', 1, 19, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(172, 'Magnam harum nam eius distinctio eveniet.', 'Aut velit neque alias sunt iure voluptatibus modi explicabo. Excepturi laudantium voluptates eum doloremque voluptatem voluptas. Dolores voluptatem aut ut recusandae quod.', 1, 13, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(173, 'Incidunt temporibus aspernatur est molestias.', 'Deserunt voluptates tenetur quibusdam sit et. Molestiae sit incidunt odit blanditiis. Illum et id corporis error.', 1, 11, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(174, 'Atque temporibus magni accusamus porro sed aliquam dolorem eos.', 'Suscipit non repellendus et quaerat. Ullam debitis totam eos at ut quia aliquam rerum. Dicta nobis molestiae ipsum mollitia eos quae iure provident.', 1, 40, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08');
INSERT INTO `topics` (`id`, `title`, `body`, `member_id`, `node_id`, `is_excellent`, `is_wiki`, `is_blocked`, `reply_count`, `view_count`, `favorite_count`, `vote_count`, `last_reply_user_id`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(175, 'Esse numquam quo facere ut.', 'Numquam eos molestias quidem. Itaque omnis enim dolorem odio. Enim natus fuga et pariatur cumque quo enim qui.', 1, 25, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(176, 'Dolor iure placeat delectus sapiente odio.', 'Sed dolores in eos. Unde qui porro eius tempora id. Itaque ratione sed minus amet temporibus aperiam nobis. Aut ipsa doloribus nemo ut harum aliquam facere.', 1, 11, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(177, 'Eum non vel fugit.', 'Eos iure itaque est ratione. Unde autem odit repudiandae. Aliquam quia enim dolorum accusamus rem. Omnis quia sunt voluptas delectus.', 1, 22, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(178, 'At repellat ut alias aperiam.', 'Suscipit inventore minima dolorum earum. Velit sed dicta dolores voluptatibus tenetur. Consectetur quibusdam ut perspiciatis itaque quaerat soluta.', 1, 33, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(179, 'Nemo cum voluptatum natus enim laboriosam qui.', 'Vero officiis ut ut provident temporibus. Sapiente sit dolores eos eos eius. Qui quis dicta qui sapiente quibusdam molestias.', 1, 24, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(180, 'Beatae rerum recusandae voluptatem non et delectus.', 'Cum adipisci consequatur eum aut dolores autem. Repellendus et delectus et. Ab ullam dolorum consequatur quae doloribus. Molestias tempora laboriosam iure sunt est.', 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(181, 'Aperiam quae et qui est autem error.', 'Quia soluta praesentium iusto dolor. Commodi aliquam ut illum ea pariatur sit ut. Voluptatibus aut eligendi sint non esse magni maiores. In laborum eligendi sint perspiciatis totam ea.', 1, 5, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(182, 'Ut et omnis et voluptatum.', 'Autem doloremque unde sapiente voluptas dignissimos voluptatem. Molestias iste sunt asperiores amet consectetur ipsum nulla est. Voluptas ipsa libero enim reprehenderit non tenetur.', 1, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(183, 'Debitis fugit eligendi rerum in quasi molestiae et.', 'A quod quidem est ducimus consequatur eum ea. Cum quas omnis animi ab eius et explicabo. Molestiae molestias vel corporis quaerat qui deleniti quia.', 1, 2, 0, 0, 0, 6, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(184, 'Eum quasi voluptatum doloribus nesciunt dolores et eum maiores.', 'Pariatur quidem commodi sed vel. Cumque necessitatibus excepturi aut ratione et. Qui suscipit eos iure minus mollitia voluptatem.', 1, 16, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(185, 'Dicta corporis animi omnis enim.', 'Quaerat sit corrupti quia unde illo ipsum. Aliquid cumque accusantium cumque sed molestiae nam possimus nihil. Aut modi inventore optio libero. Vero ratione aperiam corrupti deserunt.', 1, 10, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(186, 'Repellendus nesciunt sapiente rerum.', 'Magnam repellendus magni aliquam aut fugiat soluta. Accusamus consequuntur similique sunt libero ut voluptas. Velit eum eos incidunt officia. Voluptas reprehenderit aut aut.', 1, 30, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(187, 'Unde dicta at sint aut sed officia.', 'Excepturi iste consequatur id. Perspiciatis provident consequatur qui inventore et facere. Dolor aliquam vel minima impedit quis harum.', 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:08', '2015-01-04 19:41:08'),
(188, 'Sit pariatur ad odio sunt reiciendis.', 'Praesentium aut soluta consequatur rerum accusantium. Et architecto ea ipsa earum nihil. Rerum libero pariatur tempore labore omnis repellendus. Deleniti itaque ducimus consequatur et et.', 1, 25, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(189, 'Delectus et voluptas non impedit.', 'Excepturi facilis ad voluptas id. Soluta hic tempora aliquam voluptatem reiciendis et itaque. Nostrum sapiente ullam vel aliquid illo.', 1, 20, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(190, 'Temporibus sint incidunt eos quo minima quaerat.', 'Quae velit ut velit doloribus consequatur. Nisi nemo deserunt et error. Ducimus quia at doloremque minus est consequatur.', 1, 19, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(191, 'Repellat quasi delectus consequatur rerum sit.', 'Voluptas quia aut quo est id. Molestiae cum et est unde rem quisquam. Eum voluptatem numquam eaque. Sed accusantium nihil maxime tempore distinctio dolores perspiciatis.', 1, 19, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(192, 'Harum ut aut qui animi incidunt ducimus.', 'Veritatis odit voluptas dolorem voluptas. Aut exercitationem quod non nulla accusamus velit dolorum eum.', 1, 3, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(193, 'Consequuntur reiciendis maiores quia modi non.', 'Ducimus expedita et quidem est. Deleniti dolor temporibus et explicabo quos est eum. Voluptates facilis veniam magni maiores earum.', 1, 9, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(194, 'Minima est molestiae voluptates sequi.', 'Sed provident minus error omnis fugit. Eius animi veritatis itaque et nulla omnis. Et ut error qui est assumenda maiores.', 1, 37, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(195, 'Quisquam qui et perspiciatis nobis cumque illum pariatur.', 'Officiis necessitatibus sunt ut numquam voluptatibus. Aut nihil recusandae in reiciendis sed. Consequatur consectetur cum vel nulla rem.', 1, 5, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(196, 'Mollitia aut nihil deleniti excepturi consequatur fuga.', 'Et ut minus aut quia sequi. Non et quia sunt et aperiam ut. Molestiae quam aliquam tenetur est nisi dolores aut.', 1, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(197, 'Minima sint optio voluptatem illum saepe.', 'Nulla neque nemo voluptatem commodi dolorem ratione. Inventore aperiam sequi voluptas sit ut. Deserunt et aut id officiis eligendi qui ad quia.', 1, 26, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(198, 'Iure sint cupiditate ipsam quo.', 'Unde dolor eos ut. Deserunt aut qui ut deleniti et. Et sed cum architecto consectetur exercitationem quia qui.', 1, 39, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(199, 'Assumenda sint deserunt voluptates quia.', 'Voluptatibus est et consequatur explicabo sit vel. Dolore deserunt vel accusamus maiores non. Magni deserunt consequatur qui aut sed vel. Similique est quia fuga et pariatur.', 1, 5, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(200, 'Ad voluptates et voluptas sequi dignissimos vitae.', 'Similique modi ea laborum ipsam. Quia accusamus qui velit facere eius ipsa. Amet laborum et facilis tempora laboriosam accusamus sit.', 1, 27, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(201, 'Id hic recusandae soluta impedit ea.', 'Corporis sint velit aut soluta et magnam hic. Sed quia suscipit nam et velit natus et. Iure sit excepturi alias aliquid explicabo. Minus et cum ipsum.', 1, 24, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(202, 'Delectus sunt molestiae et neque asperiores in.', 'Possimus quo dolorem ut saepe libero ducimus. Eum vitae voluptatem debitis atque eaque quam. Sapiente occaecati odio autem non autem optio.', 1, 20, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(203, 'Soluta ipsum ducimus iusto saepe et repudiandae sapiente.', 'Corporis itaque distinctio placeat veniam nemo. A et consequatur aut nesciunt enim.', 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(204, 'Occaecati illo autem minus.', 'Atque consequatur voluptatem occaecati ducimus. Iste voluptatem ipsam repudiandae sapiente laudantium quia ullam. Dolor ducimus molestiae quia rerum quis.', 1, 20, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(205, 'Laudantium sunt aperiam ipsam et.', 'Omnis nihil non voluptatum minima nihil autem. Enim iure cupiditate iste aspernatur. Earum corrupti quo est ut.', 1, 15, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(206, 'Porro id dolorum eligendi deleniti ipsam repudiandae minus.', 'Modi dolorem perspiciatis earum dicta eum laborum blanditiis modi. Alias perferendis laborum officia qui cumque. Dolor et totam vitae omnis placeat.', 1, 20, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(207, 'Suscipit nihil dolor dolore.', 'Illum earum harum voluptas velit eum provident est. Dolores aut qui laudantium quas deleniti iure. Magnam illo eos dolore in explicabo sunt quos quibusdam. Et neque at accusamus rerum error.', 1, 13, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:09', '2015-01-04 19:41:09'),
(208, 'Ipsa in modi a blanditiis voluptatem non quisquam.', 'Sit qui quam ea. Autem eum ad quidem temporibus. Impedit fugiat consectetur neque facilis voluptas illum eos. Quasi nihil rerum tempore maxime maxime molestiae iusto.', 1, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(209, 'Voluptas quasi quod nisi quia nulla dignissimos inventore.', 'Et qui quia qui et sed dignissimos est. Voluptatem quam vel nobis. Quo quod ex in voluptatem illum a voluptas. Cum a sequi molestiae autem in quam.', 1, 15, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(210, 'Qui earum voluptatum qui consequatur ea ut voluptas.', 'Quo qui ut quod et corrupti facilis ut. Ad eius ducimus sapiente asperiores nisi. Autem eaque quibusdam quisquam laudantium est expedita omnis. Dolor ipsam mollitia inventore.', 1, 5, 0, 0, 0, 1, 9, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(211, 'Aut animi enim esse.', 'Est rerum expedita fugiat et error fugit autem. Non suscipit consectetur deserunt. Esse rem perspiciatis minima exercitationem ipsa eveniet itaque.', 1, 7, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(212, 'Exercitationem ipsa deleniti perspiciatis ea quidem dicta.', 'Fugit at voluptatum est ut aliquam qui officiis. Iste quas aut cupiditate sunt et illo. Exercitationem quis atque et et eum enim.', 1, 27, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(213, 'Eos velit architecto enim assumenda.', 'Odio magni voluptatem deserunt deleniti est doloribus. Necessitatibus voluptate sint accusamus numquam labore mollitia. Dolores laudantium cumque quibusdam inventore.', 1, 28, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(214, 'Sint et voluptate voluptatibus.', 'Est soluta voluptatem error animi consequatur aut iste. Totam harum consequatur sequi ipsam. Dolorum fuga iste ex ut soluta non molestiae. Ea sit qui reprehenderit optio quam ut quidem.', 1, 23, 0, 0, 0, 1, 1, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(215, 'In ut error praesentium cupiditate ipsum.', 'Fuga omnis quam illum neque dolorum odio. Nihil repellat odit reiciendis beatae facere accusamus. Deleniti tempore perspiciatis et culpa eligendi. Consequatur quia veritatis doloremque in.', 1, 38, 0, 0, 0, 2, 2, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(216, 'Deleniti atque odit nisi ipsam vel.', 'Perferendis neque quam voluptas temporibus fugiat rem fugit. Ipsam pariatur qui quisquam perspiciatis delectus minus minima. Odio suscipit hic voluptatem nisi dolore.', 1, 28, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(217, 'Vel asperiores amet est ad distinctio.', 'Et temporibus nulla assumenda rerum. Exercitationem saepe magnam saepe commodi cupiditate corporis. Placeat quisquam qui aut alias veniam. Excepturi soluta officiis voluptatem qui qui occaecati.', 1, 20, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(218, 'Quidem quo possimus sint illum est aliquid est occaecati.', 'Qui distinctio deserunt eum dolorum maxime et sed. Doloribus quasi dicta earum autem. Aut ipsum maxime autem vitae ullam laboriosam.', 1, 23, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(219, 'Quo nisi molestias doloribus rem sint voluptas.', 'Vero dicta aut dignissimos et rerum. Corporis vel qui officia nulla. Deserunt repellendus asperiores fuga cupiditate saepe officiis. Voluptate ratione vero omnis distinctio possimus.', 1, 5, 0, 0, 0, 4, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(220, 'Assumenda non exercitationem aut.', 'Dolores deleniti cumque est cumque minima sit eum. Dolores explicabo aut ea quasi et sequi. Totam dicta tempora nihil consequatur quasi occaecati vero. Et et veniam sint et.', 1, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(221, 'Maiores aut aut facere voluptatem.', 'Sint expedita aperiam qui aut. Non minus eos architecto sit harum aspernatur. Eius omnis ad sed sit ipsa. Consequatur aliquam ex ipsa consequatur quam eos atque.', 1, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(222, 'Et libero corporis iste occaecati aut.', 'Possimus minus error autem minima id. Illo velit et ut rerum.\nOmnis ut sed voluptate delectus. Consequatur et nulla quis voluptatum. Ipsa libero maiores ut placeat at quae et.', 1, 30, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(223, 'Natus repudiandae dolores qui reprehenderit sed illum eos ut.', 'Quo enim quia rerum nihil veniam aut. Fuga ut animi nobis rerum quo. Sint velit qui tempore aperiam eligendi rerum. Voluptatum aut necessitatibus quo voluptas suscipit reprehenderit.', 1, 20, 0, 0, 0, 1, 1, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(224, 'Tenetur nulla eveniet consequatur dolores.', 'Alias molestiae recusandae quia rem expedita unde facilis. Error suscipit vitae repellendus nesciunt optio minima. Quae ea excepturi dicta adipisci. Fugit odio dicta vel iure labore.', 1, 35, 0, 0, 0, 2, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(225, 'Aut qui vel numquam at pariatur molestiae.', 'Consectetur nulla dolor cumque vitae tempora sed voluptates et. Et enim soluta dicta fuga suscipit. Sint dolore asperiores officia. Ut voluptas sequi in accusamus est modi. Et non laudantium ea quae.', 1, 39, 0, 0, 0, 3, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(226, 'Qui quis consequatur incidunt.', 'Tempore id exercitationem quo est. Quam consequatur officia maiores aut eveniet architecto. Dignissimos minus modi reiciendis debitis. Ex ut atque quia qui.', 1, 29, 0, 0, 0, 5, 0, 0, 0, 0, 0, NULL, '2015-01-04 19:41:10', '2015-01-04 19:41:10'),
(227, 'Et dolorum eveniet est repudiandae.', 'Sed impedit odio adipisci vel. Quibusdam ad suscipit distinctio. Qui veritatis consequatur voluptas totam voluptatem. Sequi et temporibus et possimus quia id molestias iste.', 1, 9, 0, 0, 0, 3, 86, 0, 0, 0, 0, NULL, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(228, 'Cumque sed harum nostrum libero est et et.', 'Dicta provident ipsam eveniet dicta enim aut. Eos quibusdam quia eveniet quas. Nemo dolor et blanditiis accusantium repellat. Similique impedit iste hic quo est voluptatem inventore sed.', 1, 18, 0, 0, 0, 1, 5, 0, 0, 0, 0, NULL, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(229, 'Id aut et ut doloremque reiciendis.', 'Ipsum corporis earum commodi. Sunt accusamus in quia architecto ea. Aut non corporis rerum recusandae et quam. Possimus eaque blanditiis sit ut velit fugiat.', 1, 5, 0, 0, 0, 2, 3, 0, 0, 0, 0, NULL, '2015-01-04 19:41:11', '2015-01-04 19:41:11'),
(230, 'Adipisci enim consequatur ea voluptas.', 'Officia laudantium et quis quo dolores molestiae. Adipisci ut soluta aliquam. Quia quia error dolor excepturi molestiae.', 1, 9, 0, 0, 0, 5, 6, 0, 0, 0, 0, NULL, '2015-01-04 19:41:11', '2015-01-04 19:41:11');

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
(1, 'tttt6399998@126.com', '$2y$10$jVfH7i6tXdsgrdQrI4SJAOqrrRdywWZl7DbAEP8AYMnUH5AktGxWe', '{"superuser":1}', 1, NULL, '2014-10-21 23:17:44', '2015-01-04 19:53:18', '$2y$10$ctBnKOKJ6i2YjMGcbfearu30xgWnu2An1NnV2vPgmqDcYsYObXDte', NULL, 'Rock', 'Zhang', '2014-10-21 23:17:44', '2015-01-04 19:53:18');

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
-- 限制表 `periods_transactions`
--
ALTER TABLE `periods_transactions`
  ADD CONSTRAINT `periods_transactions_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  ADD CONSTRAINT `periods_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
