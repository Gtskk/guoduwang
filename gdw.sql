-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-23 07:33:08
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
-- 表的结构 `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
(1, 'gtskk', 'tttt6399998@126.com', '15212230025', NULL, 0, 5, '$2y$10$Uz8Vvxy66Q5KoPgr9N0Ctu4iwUgwC/SlwXVNMCxJpTRDFw8vp7AnC', '6707b1779a7898496a5a906bfef822bc', 'QjOAnRlThIZoDm6scIcwMisMFvrQG5R3nAe4iZVdwMLHgo5xyoAbuF0rBCBX', 0, 0, '', '', NULL, NULL, NULL, '', '', '', '', '', '', '2015-03-03 07:19:32', '2015-04-22 11:00:38', NULL, 0);

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
('2015_02_12_095401_add_ghost_fields_to_members_table', 17),
('2015_03_04_142446_create_failed_jobs_table', 18),
('2015_04_22_141459_create_oauth_scopes_table', 19),
('2015_04_22_141500_create_oauth_grants_table', 19),
('2015_04_22_141501_create_oauth_grant_scopes_table', 19),
('2015_04_22_141502_create_oauth_clients_table', 19),
('2015_04_22_141504_create_oauth_client_endpoints_table', 19),
('2015_04_22_141505_create_oauth_client_scopes_table', 19),
('2015_04_22_141506_create_oauth_client_grants_table', 19),
('2015_04_22_141507_create_oauth_sessions_table', 19),
('2015_04_22_141508_create_oauth_session_scopes_table', 19),
('2015_04_22_141509_create_oauth_auth_codes_table', 19),
('2015_04_22_141510_create_oauth_auth_code_scopes_table', 19),
('2015_04_22_141511_create_oauth_access_tokens_table', 19),
('2015_04_22_141512_create_oauth_access_token_scopes_table', 19),
('2015_04_22_141513_create_oauth_refresh_tokens_table', 19);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `nodes`
--

INSERT INTO `nodes` (`id`, `name`, `slug`, `parent_node`, `description`, `topic_count`, `created_at`, `updated_at`) VALUES
(1, 'PHP', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Web 开发', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '移动开发', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '其他语言', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '社区', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '经验分享', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Wordpress', 'wordpress', 1, 'WordPress是一种使用PHP语言开发的博客平台，用户可以在支持PHP和MySQL数据库的服务器上架设属于自己的网站，有着非常丰富的插件库。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Laravel', 'laravel', 1, 'Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Composer', 'composer', 1, 'Composer是PHP中用来管理依赖（dependency）关系的工具。你可以在自己的项目中声明所依赖的外部工具库（libraries），Composer会帮你安装这些依赖的库文件。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '设计模式', 'design-pattern', 1, '设计模式（Design pattern）是一套被反复使用、多数人知晓的、经过分类编目的、代码设计经验的总结。使用设计模式是为了可重用代码、让代码更容易被他人理解、保证代码可靠性。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '测试', 'testing', 1, '软件测试（英语：software testing），描述一种用来促进鉴定软件的正确性、完整性、安全性和质量的过程。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '部署', 'deployment', 1, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '开源项目', 'opensource-project', 1, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '数据库', 'database', 2, '数据库（Database）是按照数据结构来组织、存储和管理数据的仓库，常见的数据库有Mysql、Oracle、Sqlite等', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Git', 'git', 2, 'Git是一个开源的分布式版本控制系统，用以有效、高速的处理从很小到非常大的项目版本管理。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Linux', 'linux', 2, 'Linux是一种自由和开放源码的类Unix操作系统，存在着许多不同的Linux版本，但它们都使用了Linux内核。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'WebServer', 'web-server', 2, 'WEB服务器也称为WWW(WORLD WIDE WEB)服务器，主要功能是提供网上信息浏览服务。常见的有 Nginx, Apache等', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '算法', 'algrithm', 2, '算法（Algorithm）是指解题方案的准确而完整的描述，是一系列解决问题的清晰指令，算法代表着用系统的方法描述解决问题的策略机制。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '网站安全', 'security', 2, '网站安全是指出于防止网站受到外来电脑入侵者对其网站进行挂马，篡改网页等行为而做出一系列的防御工作。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '云服务', 'cloud-service', 2, '云服务开发这一概念包含几种不同的开发类型 - 软件即服务(SaaS), 平台即服务(PaaS), Web服务, 按需(on—demand)计算', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'iOS', 'ios-development', 3, 'iOS 开发', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Android', 'android-development', 3, 'Android 开发', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'JavaScript', 'javascript', 4, 'JavaScript是一种基于对象和事件驱动并具有相对安全性的客户端脚本语言，其中nodejs（iojs）是其一个比较流行的方向', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'CSS', 'css', 4, 'css（层叠样式表）是一种用来表现HTML（标准通用标记语言的一个应用）或XML（标准通用标记语言的一个子集）等文件样式的计算机语言。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Python', 'python', 4, 'Python, 是一种面向对象、直译式计算机程序设计语言', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Ruby', 'ruby', 4, 'Ruby，一种为简单快捷的面向对象编程（面向对象程序设计）而创的脚本语言', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '公告', 'announcement', 5, '', 1, '0000-00-00 00:00:00', '2015-03-03 08:36:50'),
(28, 'Bug反馈', 'feedback', 5, '对于社区的优化或者 bug report , 可以在此节点下提', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '新功能', 'community-development', 5, '在该节点可以提出有关社区新功能的建议', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '健康', 'health', 6, '身体是革命的本钱，所以健康很重要', 1, '0000-00-00 00:00:00', '2015-03-03 10:22:31'),
(31, '理财', 'money', 6, '就是钱，让钱更值钱的密码^-^', 1, '0000-00-00 00:00:00', '2015-03-03 10:31:04'),
(32, '工具', 'toolings', 6, '使用工具, 是人类文明的标志', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '书籍', 'book-share', 6, '书籍是知识载体, 让我们一起站在巨人的肩膀上. ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '求职', 'request-a-job', 6, '介绍下你自己, 让大家帮你找到一份好的工作', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '招聘', 'hire', 6, '这里有高质量的 PHPer, 记得认真填写你的需求, 薪资待遇是必须写的哦.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '创业', 'start-up', 6, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '其他', 'other-share', 6, '抱歉, 如果你分享的话题不属于其他节点的话, 只能选择这里咯. ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- 表的结构 `oauth_access_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_access_tokens_id_session_id_unique` (`id`,`session_id`),
  KEY `oauth_access_tokens_session_id_index` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `session_id`, `expire_time`, `created_at`, `updated_at`) VALUES
('HOnFOHwcGKNLdExtfvaGOaBmRT6rq4dbtmFGtBPR', 3, 1429763739, '2015-04-23 03:35:39', '2015-04-23 03:35:39'),
('MlaioZfooROtCTpL4PmelKF0SjZRkVx6PRw4vU8w', 5, 1429768788, '2015-04-23 04:59:48', '2015-04-23 04:59:48'),
('totallyanaccesstoken1', 1, 1429699878, '2015-04-22 10:50:18', '2015-04-22 10:50:18'),
('totallyanaccesstoken2', 2, 1429699938, '2015-04-22 10:50:18', '2015-04-22 10:50:18'),
('vHuBTQO8LaSSHvYyDwxMN2SsAQ4XtpDMfYNqsOTy', 4, 1429764546, '2015-04-23 03:49:06', '2015-04-23 03:49:06');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_access_token_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_access_token_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_token_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_access_token_scopes_access_token_id_index` (`access_token_id`),
  KEY `oauth_access_token_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `oauth_auth_codes`
--

CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_session_id_index` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `oauth_auth_codes`
--

INSERT INTO `oauth_auth_codes` (`id`, `session_id`, `redirect_uri`, `expire_time`, `created_at`, `updated_at`) VALUES
('totallyanauthcode1', 1, 'https://example1.com/', 1429699878, '2015-04-22 10:50:18', '2015-04-22 10:50:18'),
('totallyanauthcode2', 2, 'https://example2.com/', 1429699938, '2015-04-22 10:50:18', '2015-04-22 10:50:18');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_auth_code_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_auth_code_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_code_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_auth_code_scopes_auth_code_id_index` (`auth_code_id`),
  KEY `oauth_auth_code_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `oauth_clients`
--

CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_clients_id_secret_unique` (`id`,`secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `secret`, `name`, `created_at`, `updated_at`) VALUES
('client1id', 'client1secret', 'client1', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
('client2id', 'client2secret', 'client2', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_client_endpoints`
--

CREATE TABLE IF NOT EXISTS `oauth_client_endpoints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_client_endpoints_client_id_redirect_uri_unique` (`client_id`,`redirect_uri`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `oauth_client_endpoints`
--

INSERT INTO `oauth_client_endpoints` (`id`, `client_id`, `redirect_uri`, `created_at`, `updated_at`) VALUES
(1, 'client1id', 'http://guoduwang.net/api', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
(2, 'client2id', 'http://example2.com/callback', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_client_grants`
--

CREATE TABLE IF NOT EXISTS `oauth_client_grants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `grant_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_client_grants_client_id_index` (`client_id`),
  KEY `oauth_client_grants_grant_id_index` (`grant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `oauth_client_grants`
--

INSERT INTO `oauth_client_grants` (`id`, `client_id`, `grant_id`, `created_at`, `updated_at`) VALUES
(1, 'client1id', 'grant1', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
(2, 'client2id', 'grant2', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_client_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_client_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_client_scopes_client_id_index` (`client_id`),
  KEY `oauth_client_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `oauth_client_scopes`
--

INSERT INTO `oauth_client_scopes` (`id`, `client_id`, `scope_id`, `created_at`, `updated_at`) VALUES
(1, 'client1id', 'scope1', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
(2, 'client2id', 'scope2', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_grants`
--

CREATE TABLE IF NOT EXISTS `oauth_grants` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `oauth_grants`
--

INSERT INTO `oauth_grants` (`id`, `created_at`, `updated_at`) VALUES
('grant1', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
('grant2', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_grant_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_grant_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grant_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_grant_scopes_grant_id_index` (`grant_id`),
  KEY `oauth_grant_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `oauth_grant_scopes`
--

INSERT INTO `oauth_grant_scopes` (`id`, `grant_id`, `scope_id`, `created_at`, `updated_at`) VALUES
(1, 'grant1', 'scope1', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
(2, 'grant2', 'scope2', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_refresh_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`access_token_id`),
  UNIQUE KEY `oauth_refresh_tokens_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `expire_time`, `created_at`, `updated_at`) VALUES
('totallyarefreshtoken1', 'totallyanaccesstoken1', 1429699878, '2015-04-22 10:50:18', '2015-04-22 10:50:18');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_scopes` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `oauth_scopes`
--

INSERT INTO `oauth_scopes` (`id`, `description`, `created_at`, `updated_at`) VALUES
('scope1', 'Scope 1 Description', '2015-04-22 10:50:17', '2015-04-22 10:50:17'),
('scope2', 'Scope 2 Description', '2015-04-22 10:50:17', '2015-04-22 10:50:17');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_sessions`
--

CREATE TABLE IF NOT EXISTS `oauth_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `owner_type` enum('client','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `owner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_redirect_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_sessions_client_id_owner_type_owner_id_index` (`client_id`,`owner_type`,`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `oauth_sessions`
--

INSERT INTO `oauth_sessions` (`id`, `client_id`, `owner_type`, `owner_id`, `client_redirect_uri`, `created_at`, `updated_at`) VALUES
(1, 'client1id', 'user', '1', NULL, '2015-04-22 10:50:18', '2015-04-22 10:50:18'),
(2, 'client2id', 'user', '2', NULL, '2015-04-22 10:50:18', '2015-04-22 10:50:18'),
(3, 'client1id', 'user', '1', NULL, '2015-04-23 03:35:39', '2015-04-23 03:35:39'),
(4, 'client1id', 'user', '1', NULL, '2015-04-23 03:49:06', '2015-04-23 03:49:06'),
(5, 'client1id', 'user', '1', NULL, '2015-04-23 04:59:48', '2015-04-23 04:59:48');

-- --------------------------------------------------------

--
-- 表的结构 `oauth_session_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_session_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_session_scopes_session_id_index` (`session_id`),
  KEY `oauth_session_scopes_scope_id_index` (`scope_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `replies`
--

INSERT INTO `replies` (`id`, `body`, `member_id`, `topic_id`, `is_block`, `vote_count`, `created_at`, `updated_at`, `body_original`) VALUES
(1, '<p>:smile:</p>', 1, 1, 0, 0, '2015-03-03 08:53:04', '2015-03-03 08:53:04', ':smile:'),
(2, '<p>:smile:</p>', 1, 1, 0, 0, '2015-03-03 09:04:06', '2015-03-03 09:04:07', ':smile:'),
(3, '<p>:smile:</p>', 1, 1, 0, 0, '2015-03-03 09:10:51', '2015-03-03 09:10:51', ':smile:'),
(4, '<p>:smile:</p>', 1, 1, 0, 0, '2015-03-03 09:20:08', '2015-03-03 09:20:08', ':smile:'),
(5, '<p>:frowning:</p>', 1, 1, 0, 0, '2015-03-03 09:30:14', '2015-03-03 09:30:14', ':frowning:');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `topics`
--

INSERT INTO `topics` (`id`, `title`, `body`, `member_id`, `node_id`, `is_excellent`, `is_wiki`, `is_blocked`, `reply_count`, `view_count`, `favorite_count`, `vote_count`, `last_reply_user_id`, `order`, `deleted_at`, `created_at`, `updated_at`, `body_original`, `excerpt`) VALUES
(1, '网站开门啦', '<h3>网站开门红</h3>\r\n<p>大家好，今天过渡网正式和大家见面了，在这里你可以学习到学校中学不到的，所以的内容都是我自己的亲身经历，在此我分享给大家的原因是希望大家能更好的完成从学校到社会的<strong>过渡</strong>，希望大家都能做的更好，比我好 :smile:</p>\r\n<p>好了，废话不多说，网站尽量设计的简洁粗暴:frowning: ，让大家能一眼就看到，找到你说要的。</p>\r\n<p>所以，跟着我的脚步，Come on!</p>', 1, 27, 0, 0, 0, 5, 30, 0, 0, 1, 0, NULL, '2015-03-03 08:36:49', '2015-03-03 09:30:14', '### 网站开门红\r\n\r\n大家好，今天过渡网正式和大家见面了，在这里你可以学习到学校中学不到的，所以的内容都是我自己的亲身经历，在此我分享给大家的原因是希望大家能更好的完成从学校到社会的**过渡**，希望大家都能做的更好，比我好 :smile:\r\n\r\n好了，废话不多说，网站尽量设计的简洁粗暴:frowning: ，让大家能一眼就看到，找到你说要的。\r\n\r\n所以，跟着我的脚步，Come on!', '网站开门红 大家好，今天过渡网正式和大家见面了，在这里你可以学习到学校中学不到的，所以的内容都是我自己的亲身经历，在此我分享给大家的原因是希望大家能更好的完成从学校到社会的过渡，希望大家都能做的更好，比我好 :smile: 好了，废话不多说，网站尽量设计的简洁粗暴:frowning: ，让大家能一眼就看到，找到你说要的。 所以，跟着我的脚步，Come on!'),
(2, '身体是革命的本钱', '<h2><code>身体是革命的本钱</code></h2>\r\n<p>作为一个程序员，坐在电脑前的时间几乎占据了一天时间的80%，时间一长会觉得身体多少有些不适，这个时候想到的就是应该锻炼身体了，没有好的身体何来<code>升职加薪，当上总经理，出任CEO，赢取白富美，走上人生巅峰呢”</code>:laughing: </p>\r\n<p><code>总之，身体是最重要的</code></p>\r\n<p>就个人而言,在小区跑跑步,锻炼个四五十分钟,\r\n坚持每天吃早饭，饮食中少些垃圾食品，营养均衡一些。\r\n最主要的是要<code>坚持</code></p>\r\n<p>同为程序员或者有将来作为程序员打算又或者有着坏生活习惯的你是否也有锻炼身体的习惯呢？</p>\r\n<p>而你除了锻炼身体外还会做一些什么事情况来改善自己的身体状态呢?</p>\r\n<p>大家可以把自己的好习惯分享出来，供大家参考学习。:smiley: </p>', 1, 30, 1, 0, 0, 0, 4, 0, 0, 0, 0, NULL, '2015-03-03 10:22:31', '2015-03-03 10:22:31', '##`身体是革命的本钱`##\r\n\r\n作为一个程序员，坐在电脑前的时间几乎占据了一天时间的80%，时间一长会觉得身体多少有些不适，这个时候想到的就是应该锻炼身体了，没有好的身体何来`升职加薪，当上总经理，出任CEO，赢取白富美，走上人生巅峰呢”`:laughing: \r\n\r\n``` 总之，身体是最重要的```\r\n\r\n就个人而言,在小区跑跑步,锻炼个四五十分钟,\r\n坚持每天吃早饭，饮食中少些垃圾食品，营养均衡一些。\r\n最主要的是要`坚持`\r\n\r\n同为程序员或者有将来作为程序员打算又或者有着坏生活习惯的你是否也有锻炼身体的习惯呢？\r\n\r\n而你除了锻炼身体外还会做一些什么事情况来改善自己的身体状态呢?\r\n\r\n大家可以把自己的好习惯分享出来，供大家参考学习。:smiley: ', NULL),
(3, '小白理财', '<p>给大家推荐个小白理财入门教程，多些简七的倾情奉献。</p>\r\n<p><code>【简七读财】小白理财入门篇9堂课</code></p><p>\r\n<iframe height="230" width="260" src="http://www.ximalaya.com/swf/album/orange.swf?id=282259" frameborder="0"></iframe></p>', 1, 31, 1, 0, 0, 0, 39, 0, 0, 0, 1, NULL, '2015-03-03 10:31:04', '2015-03-03 10:31:04', '给大家推荐个小白理财入门教程，多些简七的倾情奉献。\r\n\r\n```【简七读财】小白理财入门篇9堂课```\r\n\r\n<iframe height="230" width="260" src="http://www.ximalaya.com/swf/album/orange.swf?id=282259" frameborder=0 allowfullscreen></iframe>', '给大家推荐个小白理财入门教程，多些简七的倾情奉献。 【简七读财】小白理财入门篇9堂课');

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
-- 限制表 `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD CONSTRAINT `oauth_access_tokens_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_access_token_scopes`
--
ALTER TABLE `oauth_access_token_scopes`
  ADD CONSTRAINT `oauth_access_token_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_access_token_scopes_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD CONSTRAINT `oauth_auth_codes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_auth_code_scopes`
--
ALTER TABLE `oauth_auth_code_scopes`
  ADD CONSTRAINT `oauth_auth_code_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_auth_code_scopes_auth_code_id_foreign` FOREIGN KEY (`auth_code_id`) REFERENCES `oauth_auth_codes` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_client_endpoints`
--
ALTER TABLE `oauth_client_endpoints`
  ADD CONSTRAINT `oauth_client_endpoints_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `oauth_client_grants`
--
ALTER TABLE `oauth_client_grants`
  ADD CONSTRAINT `oauth_client_grants_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `oauth_client_grants_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `oauth_client_scopes`
--
ALTER TABLE `oauth_client_scopes`
  ADD CONSTRAINT `oauth_client_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_client_scopes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_grant_scopes`
--
ALTER TABLE `oauth_grant_scopes`
  ADD CONSTRAINT `oauth_grant_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_grant_scopes_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD CONSTRAINT `oauth_refresh_tokens_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oauth_sessions`
--
ALTER TABLE `oauth_sessions`
  ADD CONSTRAINT `oauth_sessions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `oauth_session_scopes`
--
ALTER TABLE `oauth_session_scopes`
  ADD CONSTRAINT `oauth_session_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_session_scopes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE;

--
-- 限制表 `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
