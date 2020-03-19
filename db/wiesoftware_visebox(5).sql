-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 07:26 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiesoftware_visebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '0000-00-00 00:00:00', '2017-07-21 12:22:20'),
(2, 'User', '0000-00-00 00:00:00', '2017-05-24 09:40:23'),
(3, 'Local User', '2017-07-06 20:04:26', '2017-07-06 20:07:35'),
(4, 'data entry', '2017-07-21 12:36:18', '2017-07-21 12:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `is_have_child` int(1) NOT NULL DEFAULT '0',
  `title` varchar(45) NOT NULL,
  `link` varchar(150) NOT NULL,
  `icon` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `is_have_child`, `title`, `link`, `icon`) VALUES
(1, 0, 3, 'Users Management', '', 'fa fa-user'),
(2, 1, 0, 'Users', 'admin/userlist', 'fa fa-user'),
(3, 1, 0, 'Groups', 'group/admin', 'fa fa-users'),
(4, 1, 0, 'Privileges', 'privilege/admin', 'fa fa-lock'),
(59, 0, 2, 'Products', '', 'fa fa-database'),
(60, 0, 0, 'Category', 'category/admin', 'fa fa-dollar'),
(62, 0, 2, 'Banner', '', 'fa fa-window-restore'),
(63, 62, 0, 'List', 'banner/admin', 'fa fa-cog'),
(64, 62, 0, 'Add', 'banner/admin/create', 'fa fa-cog'),
(81, 0, 2, 'Client', '', 'fa fa-map-o'),
(82, 81, 0, 'List', 'client/admin', 'fa fa-bell'),
(83, 81, 0, 'Add', 'client/admin/create', 'fa fa-users'),
(84, 0, 2, 'Manage CMS', 'pages/admin', 'fa fa-television'),
(85, 84, 0, 'List', 'pages/admin', 'fa fa-list'),
(86, 84, 0, 'Add', 'pages/admin/create', 'fa fa-plus-circle'),
(87, 0, 1, 'Contact Us', '', 'fa fa-envelope'),
(88, 87, 0, 'List', 'contact/admin', 'fa fa-list'),
(89, 0, 2, 'Site Settings', '', 'fa fa-wrench'),
(90, 89, 0, 'Header', 'setting/admin/headers', 'fa fa-header'),
(91, 89, 0, 'Footer', 'setting/admin/footers', 'fa fa-foursquare'),
(92, 0, 2, 'Colors', '', 'fa fa-connectdevelop'),
(93, 92, 0, 'List', 'colors/admin', 'fa fa-list'),
(94, 92, 0, 'Add', 'colors/admin/create', 'fa fa-pluse'),
(95, 59, 0, 'List', 'product/admin/index', 'fa fa-list'),
(96, 59, 0, 'Add', 'product/admin/create', 'fa fa-plus-circle'),
(97, 0, 2, 'Social Link', '', 'fa fa-scribd'),
(98, 97, 0, 'List', 'social/admin', 'fa fa-list'),
(99, 97, 0, 'Add', 'social/admin/create', 'fa fa-plus-circle'),
(100, 0, 2, 'Trustexport', '', 'fa fa-truck'),
(101, 100, 0, 'List', 'trustexport/admin', 'fa fa-list'),
(102, 100, 0, 'Add', 'trustexport/admin/create', 'fa fa-plus-circle'),
(103, 0, 2, 'Gallery', '', 'fa fa-picture-o'),
(104, 103, 0, 'List', 'gallery/admin', 'fa fa-list'),
(105, 103, 0, 'Add', 'gallery/admin/create', 'fa fa-plus-circle'),
(106, 84, 0, 'Banner Separate', 'bannerseparate/admin', ''),
(107, 87, 0, 'Contact Us Branches', 'contactus_branches/admin', ''),
(108, 0, 2, 'Manage Email Template', '', 'fa fa-envelope'),
(109, 108, 0, 'List', 'email/admin', 'fa fa-list'),
(110, 108, 0, 'add', 'email/admin/create', 'fa fa-plus-circle');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2650 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `group_id`, `menu_id`) VALUES
(2598, 1, 1),
(2599, 2, 1),
(2600, 3, 1),
(2601, 1, 2),
(2602, 2, 2),
(2603, 3, 2),
(2604, 1, 3),
(2605, 2, 3),
(2606, 1, 4),
(2607, 2, 4),
(2608, 1, 59),
(2609, 1, 95),
(2610, 1, 96),
(2611, 1, 60),
(2612, 1, 62),
(2613, 1, 63),
(2614, 1, 64),
(2615, 1, 81),
(2616, 2, 81),
(2617, 1, 82),
(2618, 1, 83),
(2619, 1, 84),
(2620, 1, 85),
(2621, 1, 86),
(2622, 1, 106),
(2623, 1, 87),
(2624, 2, 87),
(2625, 3, 87),
(2626, 4, 87),
(2627, 1, 88),
(2628, 2, 88),
(2629, 3, 88),
(2630, 4, 88),
(2631, 1, 107),
(2632, 1, 89),
(2633, 1, 90),
(2634, 1, 91),
(2635, 1, 92),
(2636, 1, 93),
(2637, 1, 94),
(2638, 1, 97),
(2639, 1, 98),
(2640, 1, 99),
(2641, 1, 100),
(2642, 1, 101),
(2643, 1, 102),
(2644, 1, 103),
(2645, 1, 104),
(2646, 1, 105),
(2647, 1, 108),
(2648, 1, 109),
(2649, 1, 110);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_book`
--

CREATE TABLE IF NOT EXISTS `tbl_add_book` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `name_of_book` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `author` varchar(500) NOT NULL,
  `selling_from` text NOT NULL,
  `book_edition` varchar(500) NOT NULL,
  `university_used` text NOT NULL,
  `course_used` text NOT NULL,
  `module_used` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_add_book`
--

INSERT INTO `tbl_add_book` (`id`, `student_id`, `name_of_book`, `image`, `price`, `author`, `selling_from`, `book_edition`, `university_used`, `course_used`, `module_used`, `status`, `created_on`, `updated_on`) VALUES
(1, 1, 'compure', '150709759020171004.png', '200.rs', 'ram', '', '2015', '', '', '', 1, '2017-10-04 11:10:45', '0000-00-00 00:00:00'),
(2, 1, 'Algorithms', '150709759020171004.png', '300.rs', 'mahesh', '', '2016 Edition', 'Delhi Universiy', 'all algorithms', 'algo', 1, '2017-10-04 11:10:48', '2017-10-03 21:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `title`, `image`, `description`, `status`, `created_on`, `updated_on`) VALUES
(3, 'TRUST OUR WORK', '149967250520170710.jpg', '<span>Paint Your Life</span>\r\n\r\nOur Name Says Everything About Us\r\n', '1', '2017-07-10 13:11:19', '2017-07-10 13:30:46'),
(4, 'TRUST OUR WORK', '149967393320170710.jpg', '<span>Lorem Ipsum is simply dummy</span>text of the printing and typesetting industry...', '1', '2017-07-10 13:35:33', '0000-00-00 00:00:00'),
(5, 'We are the Happiness Sponsors', '149967397720170710.jpg', '<span>Paint Your Life</span>\r\nOur Name Says Everything About Us...', '1', '2017-07-10 13:36:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_separate`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_separate` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pages_name` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner_separate`
--

INSERT INTO `tbl_banner_separate` (`id`, `image`, `pages_name`, `page_description`, `status`, `created_on`, `updated_on`) VALUES
(5, '150114822920170727.jpg', 'Product/Solutions', '<div class="bradcamp clearfix">\r\n      <div class="mainWrap">\r\n        <ul>\r\n          <li><a href="" title="home">Home</a></li>\r\n          <li title="Our Products"><span>Our Products</span></li>\r\n        </ul>\r\n      </div>\r\n    </div>\r\n    <div class="whowe innerpg pro1 textCenter globalClr clearfix">\r\n      <div class="mainWrap globalClr clearfix">\r\n        <h1 class="mainh2">Our Products</h1>\r\n        <h3 class="subhd">TRUST is very well-known by the huge variety of its products. </h3>\r\n        <p>We provide all kinds of paints and coatings.  We deliver interior, exterior and decorative material. </p>\r\n      </div>\r\n    </div>', 1, '2017-07-27 11:07:29', '2017-07-27 11:07:29'),
(7, '150114832120170727.jpg', 'Trust Export', ' <div class="bradcamp clearfix">\n      <div class="mainWrap">\n        <ul>\n          <li><a href="" title="home">Home</a></li>\n          <li title="Trust Paint & Exports"><span>Trust Paint & Exports</span></li>\n        </ul>\n      </div>\n    </div>\n    <div class="innerpg trustpg textCenter globalClr clearfix">\n      <div class="mainWrap globalClr clearfix">\n        <h1 class="mainh2">Trust Paint & Exports</h1>\n        <div class="black extst">TRUST is divided into two parts:</div>\n        <span class="subhd2">TRUST PAINTS: Paints Manufacturer and Supplier  |  TRUST EXPORT: Shipping and Trading</span>\n        <div class="extlato">Ships, trades and supplies what we consider our partners abroad:</div>\n      </div>\n    </div>', 1, '2017-07-27 10:59:19', '2017-07-27 10:58:12'),
(8, '150114850120170727.jpg', 'Colors', ' <div class="bradcamp clearfix">\r\n    <div class="mainWrap">\r\n      <ul>\r\n        <li><a href="<>" title="home">Home</a></li>\r\n        <li title="Colors"><span>Colors</span></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class="innerpg trustpg textCenter globalClr clearfix">\r\n    <div class="mainWrap globalClr clearfix">\r\n      <h1 class="mainh2">Colors</h1>\r\n    </div>\r\n', 1, '2017-07-27 11:15:31', '2017-07-27 11:15:31'),
(9, '150114852920170727.jpg', 'Paint your space', '', 1, '2017-07-27 09:44:09', '0000-00-00 00:00:00'),
(10, '150115772820170727.jpg', 'clients', '<div class="main globalClr clearfix">\r\n  <div class="bradcamp clearfix">\r\n    <div class="mainWrap">\r\n      <ul>\r\n        <li><a href="<?php echo base_url(); ?>" title="home">Home</a></li>\r\n        <li title="Our Clients"><span>Our Clients</span></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class="innerpg trustpg textCenter globalClr clearfix">\r\n    <div class="mainWrap globalClr clearfix">\r\n      <h1 class="mainh2">Our Clients</h1>\r\n      <p>Most of our clients are Lebanese, and our source of work are mostly architects, <br/>\r\n        engineers, real estate contractors, etc.. (target audience) </p>\r\n    </div>\r\n	', 1, '2017-07-28 05:28:33', '2017-07-28 05:28:33'),
(11, '150115775620170727.jpg', 'Sitemap', '', 1, '2017-07-27 12:16:46', '0000-00-00 00:00:00'),
(12, '150115779020170727.jpg', 'Contact Us', '', 1, '2017-07-27 12:16:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `id` bigint(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `title`, `image`, `description`, `status`, `created_on`, `updated_on`) VALUES
(1, 'myblock', '150709759020171004.png', '<p>dfasfd11</p>\r\n', 1, '2017-10-04 06:33:39', '2017-10-04 06:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_on` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `name`, `slug`, `description`, `meta_keyword`, `meta_description`, `image`, `status`, `created_on`) VALUES
(7, 'Travel', 'travel', 'Travel', '', '', '149977533620170711.jpg', 1, '2017-04-14'),
(8, 'Arts & Music', 'arts-music', 'Arts & Music', '', '', '149977530420170711.jpg', 1, '2017-07-11'),
(9, 'Sport', 'sport', 'Sport', '', '', '149977536220170711.jpg', 1, '2017-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` bigint(20) NOT NULL,
  `country_id` int(25) DEFAULT NULL,
  `city_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `country_id`, `city_name`, `slug`, `status`, `created_on`, `updated_on`) VALUES
(2, 3, 'Athlone', 'athlone', 1, '2017-10-03 07:22:30', '2017-09-28 10:19:01'),
(3, 2, 'Delhi', 'delhi', 1, '2017-09-28 12:36:18', '2017-09-28 12:26:25'),
(4, 3, 'Cork', 'cork', 1, '2017-10-03 07:22:51', '2017-10-03 07:22:51'),
(5, 3, 'Dublin', 'dublin', 1, '2017-10-03 07:22:58', '2017-10-03 07:22:58'),
(6, 3, 'Galway', 'galway', 1, '2017-10-03 07:23:04', '2017-10-03 07:23:04'),
(7, 3, 'Kildare', 'kildare', 1, '2017-10-03 07:23:13', '2017-10-03 07:23:13'),
(8, 3, 'Limerick', 'limerick', 1, '2017-10-03 07:23:21', '2017-10-03 07:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE IF NOT EXISTS `tbl_client` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `image` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `name`, `designation`, `description`, `status`, `image`, `created_on`, `updated_on`) VALUES
(6, 'webit ', 'Noida Up', '<p>\r\n	<span class="nodeLabelBox repTarget " role="treeitem"><span class="nodeText editable "><span>Excellent service folks! I really appreciate your co-ordination and communication to facilitate</span></span></span></p>\r\n<p>\r\n	<span class="nodeLabelBox repTarget " role="treeitem"><span class="nodeText editable "><span>my venue selection and get best prices for the meeting event of my company STMicroelectronics.</span></span></span></p>\r\n<p>\r\n	<span class="nodeLabelBox repTarget " role="treeitem"><span class="nodeText editable "><span>I&#39;ll definitely recommend Venuexpo.com in my circle.</span></span></span></p>\r\n', '1', '148333580620170102.png', '2017-01-02 11:13:26', '0000-00-00 00:00:00'),
(7, 'test', 'test', '<p>gfxdggdfgd</p>\r\n', '1', '149969203220170710.jpg', '2017-07-10 18:36:59', '2017-07-10 18:37:12'),
(8, 'test2', NULL, NULL, '1', '149977716320170711.jpg', '2017-07-11 15:20:00', '2017-07-11 18:16:03'),
(9, 'dasdfaf', NULL, NULL, '1', '149977125120170711.jpg', '2017-07-11 16:37:31', NULL),
(10, 'asdasdd', NULL, NULL, '1', '149977125820170711.jpg', '2017-07-11 16:37:38', NULL),
(11, 'sdasd', NULL, NULL, '1', '149977126420170711.jpg', '2017-07-11 16:37:44', NULL),
(12, 'test2', NULL, NULL, '1', '149977718220170711.jpg', '2017-07-11 18:16:22', NULL),
(13, 'dfs', NULL, NULL, '1', '150122275220170728.jpg', '2017-07-28 11:49:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE IF NOT EXISTS `tbl_colors` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sequence` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`id`, `name`, `type`, `sequence`, `image`, `status`, `created_on`, `updated_on`) VALUES
(2, 'Green', 'Colors', 6, '149977407820170711.jpg', 1, '2017-07-11 11:54:38', '2017-07-11 11:54:38'),
(3, 'Red', 'Colors', 5, '149977408820170711.jpg', 1, '2017-07-11 11:54:48', '2017-07-11 11:54:48'),
(4, 'test2', 'Design', 1, '149977412120170711.jpg', 1, '2017-07-11 11:55:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `city`, `location`, `email`, `mobile_no`, `description`, `created_on`) VALUES
(6, 'Ritesh', NULL, 'dffdf', 'admin@admin.com', '8090090797', 'adfasffdsf', '2017-07-09 13:39:38'),
(10, 'ewrwrr/6757', NULL, NULL, 'admin@admin.com', '7657576757', '65757', '2017-07-10 00:00:00'),
(11, 'dsds/', NULL, NULL, 'dwivedi.preeti08@gmail.com', '8989884478', '', '2017-07-28 00:00:00'),
(12, 'dsds/', NULL, NULL, 'dwivedi.preeti08@gmail.com', '8989884478', '', '2017-07-28 00:00:00'),
(13, 'erfwe/werwr', NULL, NULL, 'dwivedi.preeti08@gmail.com', '3435356453', 'grtgrgr', '2017-07-28 00:00:00'),
(14, 'fss/edwsdwde', NULL, NULL, 'dwivedi.preeti08@gmail.com', '3425467896', 'feswedw', '2017-07-28 00:00:00'),
(15, 'ddfs/sdwedw', NULL, NULL, 'dwivedi.preeti08@gmail.com', '3454326786', 'dedewdwd', '2017-07-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus_branches`
--

CREATE TABLE IF NOT EXISTS `tbl_contactus_branches` (
  `id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `header` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contactus_branches`
--

INSERT INTO `tbl_contactus_branches` (`id`, `status`, `header`, `email`, `description`) VALUES
(1, 1, 'Trust Paints Contact Us', 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` bigint(20) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `country_name`, `slug`, `status`, `created_on`, `updated_on`) VALUES
(2, 'United Kingdom', 'united-kingdom', 1, '2017-10-03 07:21:29', '2017-09-28 11:13:14'),
(3, 'Ireland', 'ireland', 1, '2017-10-03 07:20:38', '2017-09-28 12:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `id` bigint(20) NOT NULL,
  `country_id` int(25) DEFAULT NULL,
  `city_id` int(25) DEFAULT NULL,
  `university_id` int(25) DEFAULT NULL,
  `course_name` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `country_id`, `city_id`, `university_id`, `course_name`, `slug`, `status`, `created_on`, `updated_on`) VALUES
(1, 3, 2, 2, 'AL000 Academic Writing', 'al000-academic-writing', 1, '2017-10-03 07:27:17', '2017-09-29 09:51:56'),
(2, 3, 2, 2, 'AL000 French', 'al000-french', 1, '2017-10-03 07:26:13', '2017-10-03 07:26:13'),
(3, 3, 2, 2, 'AL000 German', 'al000-german', 1, '2017-10-03 07:26:23', '2017-10-03 07:26:23'),
(4, 3, 2, 2, 'AL000 Italian', 'al000-italian', 1, '2017-10-03 07:26:35', '2017-10-03 07:26:35'),
(5, 3, 2, 2, 'AL000 Japanese', 'al000-japanese', 1, '2017-10-03 07:26:49', '2017-10-03 07:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE IF NOT EXISTS `tbl_email` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `title`, `subject`, `description`, `status`, `created_on`, `updated_on`) VALUES
(2, 'facebook', 'job', '<p>your facebook account</p>\r\n', 1, '2017-08-02 08:32:18', '0000-00-00 00:00:00'),
(3, 'text', 'holyday', '<p>hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>\r\n\r\n<p>jjjjjjjjjjjjjjjjjjjjjj</p>\r\n', 1, '2017-08-02 07:39:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL,
  `f_logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `f_email` varchar(255) DEFAULT NULL,
  `f_mobile` varchar(255) DEFAULT NULL,
  `f_phone` varchar(255) DEFAULT NULL,
  `f_fax` varchar(255) DEFAULT NULL,
  `f_url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `f_logo`, `address`, `f_email`, `f_mobile`, `f_phone`, `f_fax`, `f_url`, `status`) VALUES
(1, '149975995220170711.png', 'P.O Box: 0000 | Beirut, Lebanon', 'info@trustpaints.ae', '+961 0 000 000', '+961 0 000 000', '+961 0 000 000', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=''enabled'',0=''disabled''',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `product_id`, `title`, `type`, `image`, `status`, `created_on`, `updated_on`) VALUES
(13, 'NULL', 'TRASLATORS', NULL, 'g-img1.png', 1, '2017-02-18 10:27:33', '0000-00-00 00:00:00'),
(14, NULL, 'TRASLATORS', NULL, 'g-img2.png', 1, '2017-02-18 10:27:33', '0000-00-00 00:00:00'),
(15, NULL, 'TRASLATORS', NULL, 'g-img3.png', 1, '2017-02-18 10:27:33', '0000-00-00 00:00:00'),
(16, NULL, 'GOOD', NULL, 'g-img4.png', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, NULL, 'GOOD', NULL, 'g-img5.png', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, NULL, 'GOOD', NULL, 'g-img6.png', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, NULL, 'TRUST OUR WORK', NULL, 'pro1.jpg', 1, '2017-07-26 04:10:10', '0000-00-00 00:00:00'),
(40, '9', 'trust monocouche', NULL, 'colr12.jpg', 1, '2017-07-31 04:36:46', '0000-00-00 00:00:00'),
(41, '9', 'trust monocouche', NULL, 'colr13.jpg', 1, '2017-07-31 04:36:46', '0000-00-00 00:00:00'),
(44, '7', 'abc', NULL, 'ban1.jpg', 1, '2017-07-31 04:59:28', '0000-00-00 00:00:00'),
(45, '7', 'abc', NULL, 'ban2.jpg', 1, '2017-07-31 04:59:28', '0000-00-00 00:00:00'),
(46, '9', 'trust monocouche', NULL, 'colr10.jpg', 1, '2017-07-31 05:48:19', '0000-00-00 00:00:00'),
(47, '9', 'trust monocouche', NULL, 'colr11.jpg', 1, '2017-07-31 05:48:20', '0000-00-00 00:00:00'),
(48, '9', 'trust monocouche', NULL, 'colr12.jpg', 1, '2017-07-31 05:48:20', '0000-00-00 00:00:00'),
(49, '9', 'trust monocouche', NULL, 'colr13.jpg', 1, '2017-07-31 05:48:20', '0000-00-00 00:00:00'),
(52, '9', 'Trust Monocouche', NULL, '514076_35325550.jpg', 1, '2017-08-02 03:28:02', '0000-00-00 00:00:00'),
(53, '9', 'Trust Monocouche', NULL, '3d_landscape_28.jpg', 1, '2017-08-02 03:28:02', '0000-00-00 00:00:00'),
(54, '9', 'Trust Monocouche', NULL, '3d_landscape_28.jpg', 1, '2017-08-09 05:35:42', '0000-00-00 00:00:00'),
(55, '9', 'Trust Monocouche', NULL, '3d_landscape_115.jpg', 1, '2017-08-09 05:35:42', '0000-00-00 00:00:00'),
(56, '9', 'Trust Monocouche', NULL, '3d_landscape_125.jpg', 1, '2017-08-09 05:35:42', '0000-00-00 00:00:00'),
(57, '9', 'Trust Monocouche', NULL, '6.jpeg', 1, '2017-08-09 05:35:42', '0000-00-00 00:00:00'),
(58, '9', 'Trust Monocouche', NULL, '7eeb4ce45d293b6d3564dea77600c9f400b29acb.jpeg', 1, '2017-08-09 05:35:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header`
--

CREATE TABLE IF NOT EXISTS `tbl_header` (
  `id` int(100) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `h_logo` varchar(255) DEFAULT NULL,
  `h_mobile` varchar(255) DEFAULT NULL,
  `h_email` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `meta_title` text,
  `meta_keyword` text,
  `meta_description` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_header`
--

INSERT INTO `tbl_header` (`id`, `site_name`, `tag_line`, `h_logo`, `h_mobile`, `h_email`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_on`) VALUES
(1, 'Visebox', NULL, '149984879920170712.png', '(+961) 987654321', 'info@trustpaints.com', 1, 'Visebox', 'Visebox', 'Visebox', '2017-09-28 08:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `last_login_date` datetime NOT NULL,
  `user_id` bigint(10) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`last_login_date`, `user_id`, `group_id`, `firstname`, `lastname`, `email`, `password`, `createdDate`) VALUES
('2017-07-08 08:37:46', 1, 1, 'Admin', 'admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', '2017-01-20 07:31:29'),
('2017-07-26 00:00:00', 7, 2, 'VK', 'G', 'vk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-07-19 00:00:00'),
('0000-00-00 00:00:00', 8, 2, 'Rj', 'Jai', 'student@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-07-05 22:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mentors`
--

CREATE TABLE IF NOT EXISTS `tbl_mentors` (
  `mentor_id` bigint(20) NOT NULL,
  `country_id` int(25) DEFAULT NULL,
  `city_id` int(25) DEFAULT NULL,
  `university_id` int(25) DEFAULT NULL,
  `course_id` int(25) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `fullname` varchar(300) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bio` text NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `ip_address` varchar(300) NOT NULL,
  `last_login` varchar(300) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mentors`
--

INSERT INTO `tbl_mentors` (`mentor_id`, `country_id`, `city_id`, `university_id`, `course_id`, `category_id`, `fullname`, `first_name`, `last_name`, `email`, `phone_no`, `password`, `bio`, `description`, `status`, `ip_address`, `last_login`, `created_on`, `updated_on`) VALUES
(3, 3, 2, 2, NULL, 9, 'Sevastian Test', 'Sevastian', 'Test', 'rakesh1@gmail.com', '8090090795', '3c5a3cd0763f9b56b2342bce027e2f7d', 'rakesh@gmail.com', 'rakesh@gmail.com', 0, '::1', '1507530946', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 2, 2, NULL, 9, 'Vinay Gupta', 'Vinay', 'Gupta', 'mentor@gmail.com', '8090090795', '827ccb0eea8a706c4c34a16891f84e7b', 'Good', 'Good', 1, '::1', '1507531237', '2017-10-09 07:51:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mentor_module`
--

CREATE TABLE IF NOT EXISTS `tbl_mentor_module` (
  `id` bigint(20) NOT NULL,
  `mentorship_id` bigint(20) NOT NULL,
  `module_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mentor_module`
--

INSERT INTO `tbl_mentor_module` (`id`, `mentorship_id`, `module_id`, `status`) VALUES
(1, 3, 1, 0),
(2, 3, 2, 0),
(3, 5, 1, 0),
(4, 5, 2, 0),
(5, 2, 1, 0),
(6, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE IF NOT EXISTS `tbl_module` (
  `id` bigint(20) NOT NULL,
  `mentors_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `module_name` varchar(500) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`id`, `mentors_id`, `category_id`, `module_name`, `status`, `created_on`, `updated_on`) VALUES
(1, 2, 9, 'Criket', 1, '2017-10-06 08:36:37', '2017-10-06 08:36:37'),
(2, 0, 9, 'Hockey', 1, '2017-10-06 08:37:06', '2017-10-06 08:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mymentorship`
--

CREATE TABLE IF NOT EXISTS `tbl_mymentorship` (
  `id` bigint(20) NOT NULL,
  `mentor_id` bigint(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `op_msg` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mymentorship`
--

INSERT INTO `tbl_mymentorship` (`id`, `mentor_id`, `title`, `slug`, `price`, `category_id`, `description`, `op_msg`, `image`, `status`, `created_on`, `updated_on`) VALUES
(2, 5, 'Test', '', 7, 9, '<p>good</p>\r\n', 'good\r\n', '150755356320171009.jpg', 0, '2017-10-09 18:22:43', '2017-10-09 18:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE IF NOT EXISTS `tbl_newsletter` (
  `id` bigint(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `email`, `status`, `created_on`, `updated_on`) VALUES
(1, 'rakesh@gmail.com', 1, '2017-10-04 08:30:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE IF NOT EXISTS `tbl_pages` (
  `id` bigint(20) NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` text COLLATE utf8mb4_unicode_ci,
  `content` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 0=deactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `page_title`, `slug`, `short_content`, `content`, `meta_keyword`, `meta_description`, `parent`, `status`, `created_on`, `updated_on`, `image`) VALUES
(10, 'About us', 'about-us', '<div class="whowe textCenter globalClr clearfix">      <div class="mainWrap globalClr clearfix">        <h1 class="mainh2">Who We Are</h1>        <h3 class="subhd">We Grow with the Growth of Trust of People…</h3>        <p>Since its inception in 1988, TRUST has forged an enviable reputation of excellence and quality in manufacturing products designed to meet the demanding standards of architectural and building industry professionals.  Today, that reputation is the cornerstone of the company’s continued success.TRUST has developed a range of paint and specialist coating products for residential and commercial buildings that are second to none.</p>        <p>With manufacturing operations in Lebanon, Iraq, Angola, Guinea, Cameroun, Zambia, Cape Verde, RCA, Liberia and Sierra Leone, TRUST is undeniably a leading force in the Middle East and Africa paint market.</p>        <p>TRUST manufactures a diverse range of waterborne and solvent borne architectural, protective, wood and decorative coatings. TRUST continues to gain market share through the introduction of an increasing number of product innovations. </p>      </div>    </div>', '<div class="bannerSec clearfix globalClr">\r\n    <div class="innerBanner"> <img src="http://wiesoftware.com/trust/assets/front/images/aboutban.jpg" alt="banner"> </div>\r\n  </div>\r\n<div class="main globalClr clearfix">\r\n    <div class="bradcamp clearfix">\r\n      <div class="mainWrap">\r\n        <ul>\r\n          <li><a href="#" title="home">Home</a></li>\r\n          <li title="About Us"><span>About Us</span></li>\r\n        </ul>\r\n      </div>\r\n    </div>\r\n    <div class="whowe textCenter globalClr clearfix">\r\n      <div class="mainWrap globalClr clearfix">\r\n        <h1 class="mainh2">Who We Are</h1>\r\n        <h3 class="subhd">We Grow with the Growth of Trust of People…</h3>\r\n        <p>Since its inception in 1988, TRUST has forged an enviable reputation of excellence and quality in manufacturing products designed to meet the demanding standards of architectural and building industry professionals.  Today, that reputation is the cornerstone of the company’s continued success.TRUST has developed a range of paint and specialist coating products for residential and commercial buildings that are second to none.</p>\r\n        <p>With manufacturing operations in Lebanon, Iraq, Angola, Guinea, Cameroun, Zambia, Cape Verde, RCA, Liberia and Sierra Leone, TRUST is undeniably a leading force in the Middle East and Africa paint market.</p>\r\n        <p>TRUST manufactures a diverse range of waterborne and solvent borne architectural, protective, wood and decorative coatings. TRUST continues to gain market share through the introduction of an increasing number of product innovations. </p>\r\n      </div>\r\n    </div>\r\n    <div class="abouttx globalClr clearfix">\r\n      <div class="mainWrap">\r\n        <div class="aboutTx textJustify leftCls">\r\n          <h3 class="sub3">Our Mission</h3>\r\n          <p>Our mission is to satisfy our customers by delivering results through quality paints and coating products and services. Our desire to grow drives our passion to win in the marketplace. </p>\r\n          <h3 class="sub3">Labor</h3>\r\n          <p>Some clients don’t even have time to search for labor because of their business loads, and some others do not trust if the labor they will be hiring are able to use the product the right way. This is why, we also provide Labor upon the request of our clients individually or corporately.</p>\r\n          <h3 class="sub3">Uniquely Created</h3>\r\n          <p>Whatever color you might think of, yes we do create it. Even if you pick up sample colors of your taste, we create the same. Not to mention that TRUST provides all colors and color degradations. </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>', 'About', 'About', NULL, 1, '2017-04-11 09:09:14', '2017-07-31 13:07:16', '149975429520170711.jpg'),
(11, 'Treatment', 'treatment', 'Treatment', ' <div class="bannerSec clearfix globalClr">\r\n    <div class="innerBanner"> <img src="http://wiesoftware.com/trust/assets/front/images/treatban.jpg" alt="banner"/> </div>\r\n  </div>\r\n  <div class="main globalClr clearfix">\r\n    <div class="bradcamp clearfix">\r\n      <div class="mainWrap">\r\n        <ul>\r\n          <li><a href="#" title="home">Home</a></li>\r\n          <li title="treatment"><span>Treatment</span></li>\r\n        </ul>\r\n      </div>\r\n    </div>\r\n    <div class="innerpg textCenter globalClr clearfix">\r\n      <div class="mainWrap globalClr clearfix">\r\n        <h1 class="mainh2">treatment</h1>\r\n        <p class="black">We treat our clients as family. And of course if by any chance whatsoever something went wrong with the product, which still never happened, we do compensate very well, unless the applicant wasn’t aware of the method the product should be used. And of course just in case of late delivery, we also neutralize the inconveniences.</p>\r\n      </div>\r\n    </div>\r\n    <div class="treatpg globalClr clearfix">\r\n    	<div class="mainWrap">\r\n        	<div class="treatlt textJustify leftCls">\r\n            	<h2 class="linesub">Payment Facilities </h2>\r\n                <p>Payment facilities are available for our existing clients, and for reputation well known clients as well on the long term. And because of the fact that we are the manufacturers of our product, we sure are the decision makers of our prices. We would be providing the best quality at the lowest price. </p>\r\n\r\n<p>We do induce discounts and special prices for our regular contractors.</p>\r\n\r\n<p>Small quantity samples are available for any potential client of ours, since we care for people’s opinions and seek to always be in the process of development.</p> \r\n\r\n            </div>\r\n            <div class="treatrt rightCls">\r\n            	<div class="treatcir">\r\n                	<div class="treatimg">\r\n                    	<img src="images/trt1.png" alt="img"/>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n  </div>', 'Treatment', 'Treatment', NULL, 1, '2017-07-12 17:45:06', '2017-07-28 12:34:43', '150122548320170728.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` bigint(20) NOT NULL,
  `category_slug` varchar(255) DEFAULT NULL,
  `available_color` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `featured_products` varchar(255) DEFAULT 'No',
  `image` varchar(255) DEFAULT NULL,
  `catalogue` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text,
  `technical_description` text,
  `advised_description` text,
  `instruction_discription` text,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_slug`, `available_color`, `product_name`, `product_slug`, `sub_title`, `description`, `packing`, `featured_products`, `image`, `catalogue`, `meta_keyword`, `meta_title`, `meta_description`, `technical_description`, `advised_description`, `instruction_discription`, `status`, `created_on`, `updated_on`) VALUES
(7, 'interior', '2,3', 'TRUST ENAMEL', 'trust-enamel', 'TRUST ENAMEL', '<p>dsfdssf</p>\r\n', 'TRUST ENAMEL', 'Yes', '149977709420170711.jpg', '150106148720170726.docx', 'TRUST ENAMEL', 'TRUST ENAMEL', 'TRUST ENAMEL', '<p>TRUST ENAMEL</p>\r\n', '<p>TRUST ENAMEL</p>\r\n', '<p>TRUST ENAMEL</p>\r\n', 1, '2017-07-28 12:35:08', '2017-07-26 12:39:01'),
(9, 'exterior', '2', 'TRUST MONOCOUCHE', 'trust-monocouche', 'High quality pigmented continuous wall coating in thin, medium or big TROWELLED texture.', '<p>On interior and exterior surfaces such as rendered mortars, concretes Gypsum plasters, wood and its agglomerates, etc., whenever one wants to obtain a good aesthetical appearance in a specific texture, as well as a resistance to abrasion or shocks, imp', 'Drums of 25 kg. each', 'Yes', '149977702420170711.jpg', NULL, 'TRUST MONOCOUCHE', 'TRUST MONOCOUCHE', 'TRUST MONOCOUCHE', '<p>Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>\r\n', '<p>Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks. Composition: Based on acrylic polymers in aqueous emulsion, quartz powders and sands, calibrated and selected marble grains, organic and inorganic pigments with outstanding characteristics of resistance to light and alkali, additives which will give the product excellent filming characteristics, workability and resistance to bacterial attacks.</p>\r\n', 1, '2017-07-28 12:34:36', '2017-07-28 12:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE IF NOT EXISTS `tbl_product_image` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`id`, `product_id`, `image`, `status`, `created_on`) VALUES
(1, 0, '1499847434logo2.png', 1, '2017-07-12 08:17:14'),
(2, 0, '1499847707ridex_new_logo_by_red_maupa-d7mslrc.jpg', 1, '2017-07-12 08:21:47'),
(4, 0, '1499848515BANNER5.jpg', 1, '2017-07-12 08:35:16'),
(5, 0, '1499848582BANNER5.jpg', 1, '2017-07-12 08:36:22'),
(6, 0, '1499848613BANNER5.jpg', 1, '2017-07-12 08:36:53'),
(7, 0, '1499849098Dinner-Suit-blue-jacket-and-black-trousers.jpg', 1, '2017-07-12 08:44:58'),
(8, 0, '14998490981798113_Brown.jpg', 1, '2017-07-12 08:44:58'),
(9, 0, '1499849098WM2A2856_wm2a2856c32_v2.jpg', 1, '2017-07-12 08:44:58'),
(10, 0, '1499849098enzo 1-1000x1000.jpg', 1, '2017-07-12 08:44:58'),
(11, 0, '1499850175', 1, '2017-07-12 09:02:55'),
(12, 0, '1499850190BLACKMEANS_RIDERS_JACKET_07.jpg', 1, '2017-07-12 09:03:10'),
(13, 0, '1499850190JKT1.jpg', 1, '2017-07-12 09:03:10'),
(14, 0, '14998501906.jpeg', 1, '2017-07-12 09:03:11'),
(15, 0, '1499850190This_Means_War_Tom_Hardy_(Tuck Henson)_Black_Jacket-1000x1000.jpg', 1, '2017-07-12 09:03:11'),
(16, 7, '1499851961social_media_icons.jpg', 1, '2017-07-12 10:14:51'),
(18, 9, '1499851961r1.jpg', 1, '2017-07-12 10:01:00'),
(19, 0, '1499851961ridex_new_logo_by_red_maupa-d7mslrc.jpg', 1, '2017-07-12 09:32:42'),
(20, 0, '1499852748wiesoftware_surphy.sql', 1, '2017-07-12 09:45:48'),
(21, 0, '1499852748Dinner-Suit-blue-jacket-and-black-trousers.jpg', 1, '2017-07-12 09:45:48'),
(22, 0, '14998527481798113_Brown.jpg', 1, '2017-07-12 09:45:48'),
(23, 0, '1499852748WM2A2856_wm2a2856c32_v2.jpg', 1, '2017-07-12 09:45:48'),
(25, 0, '1499853043Lenovo-Phab-e1455511382139-288x300.jpg', 1, '2017-07-12 09:50:43'),
(26, 0, '1499853043lenovo-vibe-s1-lite-l.jpg', 1, '2017-07-12 09:50:43'),
(27, 0, '1499853043113201624435PM_635_lenovo_lemon_3.jpeg', 1, '2017-07-12 09:50:43'),
(28, 0, '1499853043lenovo-vibe-p1.jpeg', 1, '2017-07-12 09:50:44'),
(29, 0, '149985318216_S16_M65Caiman_M65Olive_025.jpg', 1, '2017-07-12 09:53:02'),
(30, 0, '1499853182chiron-collection-3.jpg', 1, '2017-07-12 09:53:02'),
(31, 0, '1499853182BANNER2.jpg', 1, '2017-07-12 09:53:03'),
(32, 0, '1499853182maxresdefault (2).jpg', 1, '2017-07-12 09:53:03'),
(33, 0, '1499854222BANNER5.jpg', 1, '2017-07-12 10:10:22'),
(34, 0, '1499854222BANNER4.jpg', 1, '2017-07-12 10:10:22'),
(35, 0, '1499854222BANNER2.jpg', 1, '2017-07-12 10:10:22'),
(36, 0, '1499854222BLACKMEANS_RIDERS_JACKET_07.jpg', 1, '2017-07-12 10:10:22'),
(37, 0, '1499854396BLACKMEANS_RIDERS_JACKET_07.jpg', 1, '2017-07-12 10:13:16'),
(38, 0, '1499854396JKT1.jpg', 1, '2017-07-12 10:13:17'),
(39, 0, '14998543966.jpeg', 1, '2017-07-12 10:13:17'),
(40, 0, '1499854396This_Means_War_Tom_Hardy_(Tuck Henson)_Black_Jacket-1000x1000.jpg', 1, '2017-07-12 10:13:17'),
(41, 0, '1499854757motorola-moto-x-style.jpg', 1, '2017-07-12 10:19:17'),
(42, 0, '1499854757K5.jpg', 1, '2017-07-12 10:19:17'),
(43, 0, '1499854757Lenovo-Vibe-X2.jpg', 1, '2017-07-12 10:19:17'),
(44, 0, '1499854757Lenovo-Vibe-K5-Phone1.jpg', 1, '2017-07-12 10:19:17'),
(45, 0, '1499854796social_media_icons.jpg', 1, '2017-07-12 10:19:56'),
(46, 0, '1499854796r2.jpg', 1, '2017-07-12 10:19:56'),
(47, 0, '1499854796r1.jpg', 1, '2017-07-12 10:19:56'),
(48, 0, '1499854796ridex_new_logo_by_red_maupa-d7mslrc.jpg', 1, '2017-07-12 10:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id` bigint(20) NOT NULL,
  `phone_no` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `why_visebox` text NOT NULL,
  `security` text NOT NULL,
  `earn_money` text NOT NULL,
  `community` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `phone_no`, `email`, `why_visebox`, `security`, `earn_money`, `community`, `created_on`, `updated_on`) VALUES
(1, '9876543210', 'rakesh@gmail.com', 'dsdfgfgkkjk', 'security puroose', 'rftrgfdg', 'dgdfgfdg', '2017-10-05 07:13:19', '2017-10-05 07:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_link`
--

CREATE TABLE IF NOT EXISTS `tbl_social_link` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `a_link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social_link`
--

INSERT INTO `tbl_social_link` (`id`, `title`, `a_link`, `image`, `status`, `created_on`, `update_on`) VALUES
(3, 'facebook', 'www.facebook.com', '149983973520170712.png', 1, '2017-07-12 06:08:55', '2017-07-12 06:08:55'),
(4, 'Twitter', 'www.twitter.com', '149984006720170712.png', 1, '2017-07-12 06:14:27', '2017-07-12 06:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE IF NOT EXISTS `tbl_treatment` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description_1` text NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description_2` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `su_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trustexports`
--

CREATE TABLE IF NOT EXISTS `tbl_trustexports` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trustexports`
--

INSERT INTO `tbl_trustexports` (`id`, `title`, `sub_title`, `slug`, `discription`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_on`, `updated_on`) VALUES
(3, 'text', 'sun text', 'text-sun-text', 'sdf', 'erfdgbh', 'fsdhj', 'tyuyttrewrq', 1, '2017-07-11 12:28:47', '2017-07-11 12:28:47'),
(4, 'Sierra Motors', '(Freetown-Sierra Leone)', 'sierra-motors-freetown-sierra-leone', 'Since its inception in 1988, TRUST has forged an enviable reputation of excellence and quality in manufacturing products designed to meet the demanding standards of architectural and building industry professionals. Today, that reputation is the cornerstone of the company’s continued success. TRUST has developed a range of paint and specialist coating products for residential and commercial buildings that are second to none.', 'Sierra Motors', 'Sierra Motors', 'Sierra Motors', 1, '2017-07-21 06:53:37', '2017-07-21 19:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutors`
--

CREATE TABLE IF NOT EXISTS `tbl_tutors` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT '1',
  `city` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_university`
--

CREATE TABLE IF NOT EXISTS `tbl_university` (
  `id` bigint(20) NOT NULL,
  `country_id` int(25) DEFAULT NULL,
  `city_id` int(25) DEFAULT NULL,
  `university_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_university`
--

INSERT INTO `tbl_university` (`id`, `country_id`, `city_id`, `university_name`, `slug`, `status`, `created_on`, `updated_on`) VALUES
(2, 3, 2, 'Athlone Institute of Technology', 'athlone-institute-of-technology', 1, '2017-10-03 07:25:07', '2017-09-28 10:50:24'),
(3, 3, 2, 'punjab University', 'punjab-university', 1, '2017-09-29 08:42:09', '2017-09-29 05:56:45'),
(4, 3, 2, 'mdu', 'mdu', 1, '2017-09-29 08:48:45', '2017-09-29 07:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `fullname` varchar(300) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) NOT NULL,
  `university_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `description` text,
  `phone` varchar(20) DEFAULT NULL,
  `image` text,
  `salt` varchar(255) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `fullname`, `fname`, `lname`, `email`, `password`, `college`, `country_id`, `city_id`, `university_id`, `course_id`, `description`, `phone`, `image`, `salt`, `active`, `remember_code`, `last_login`, `created_on`) VALUES
(1, '127.0.0.1', 'Vinay Gupta', 'Vinay', 'Gupta', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 'GvNm7sTawgKjWw3snS8tmO', 1486022560, 1447915390),
(41, '::1', 'Vinay Gupta', 'Vinay', 'Test', 'vinaygupta.kumar94@gmail.com', 'd0df9d63d36a2db2f52c72c8fbc7e36e', '4', 2, 1, 1, 1, 'ccc', '8090090795', NULL, NULL, 1, NULL, 2017, 2017),
(42, '::1', 'Vinay Test', 'Vinay', 'Test', 'vinaygupta.kumar941@gmail.com', '6d942a6aabc3067557beea213a00ba1f', '5', 3, 1, 1, 1, '111', '8090090795', NULL, NULL, 1, NULL, 1507023179, 1507023179),
(43, '::1', 'Vinay Test', 'Vinay', 'Test', 'admin1@admin.com', '46182f9c84a5f730af7c6871484a75d6', '', 3, 0, 0, 0, NULL, '8090090795', NULL, NULL, 1, NULL, 1507210433, 1507210433);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `tbl_add_book`
--
ALTER TABLE `tbl_add_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner_separate`
--
ALTER TABLE `tbl_banner_separate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus_branches`
--
ALTER TABLE `tbl_contactus_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_header`
--
ALTER TABLE `tbl_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_mentors`
--
ALTER TABLE `tbl_mentors`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Indexes for table `tbl_mentor_module`
--
ALTER TABLE `tbl_mentor_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mymentorship`
--
ALTER TABLE `tbl_mymentorship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social_link`
--
ALTER TABLE `tbl_social_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trustexports`
--
ALTER TABLE `tbl_trustexports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tutors`
--
ALTER TABLE `tbl_tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_university`
--
ALTER TABLE `tbl_university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2650;
--
-- AUTO_INCREMENT for table `tbl_add_book`
--
ALTER TABLE `tbl_add_book`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_banner_separate`
--
ALTER TABLE `tbl_banner_separate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_contactus_branches`
--
ALTER TABLE `tbl_contactus_branches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tbl_header`
--
ALTER TABLE `tbl_header`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_mentors`
--
ALTER TABLE `tbl_mentors`
  MODIFY `mentor_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_mentor_module`
--
ALTER TABLE `tbl_mentor_module`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_mymentorship`
--
ALTER TABLE `tbl_mymentorship`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_social_link`
--
ALTER TABLE `tbl_social_link`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_trustexports`
--
ALTER TABLE `tbl_trustexports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_tutors`
--
ALTER TABLE `tbl_tutors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_university`
--
ALTER TABLE `tbl_university`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `privileges_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
