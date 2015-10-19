-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2015 at 01:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_expressrentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE IF NOT EXISTS `blog_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_post_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_post_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Small_Flag_of_the_United_Nations_ZP.svg/488px-Small_Flag_of_the_United_Nations_ZP.svg.png', '2015-10-18 18:30:00', '2015-10-18 18:30:00'),
(2, 1, 'https://upload.wikimedia.org/wikipedia/commons/7/77/Small_stellated_dodecahedron.png', '2015-10-18 18:30:00', '2015-10-18 18:30:00'),
(3, 2, 'http://www.small-world.net/_borders/small_world_logo.gif', '2015-10-18 18:30:00', '2015-10-18 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_location`
--

CREATE TABLE IF NOT EXISTS `blog_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_post_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog_location`
--

INSERT INTO `blog_location` (`id`, `blog_post_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'America', '2015-10-18 18:30:00', '2015-10-18 18:30:00'),
(2, 2, 'India', '2015-10-18 18:30:00', '2015-10-18 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'first blog post', 'first blog post', '2015-10-18 18:30:00', '2015-10-18 18:30:00'),
(2, 9, 'second blog post', 'second blog post', '2015-10-18 18:30:00', '2015-10-18 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_19_073304_create_bolg_posts_table', 2),
('2015_10_19_073608_create_bolg_images_table', 2),
('2015_10_19_093728_create_bolg_location_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$mLWDYVdIA.vYWfZew85u8eqDmu/Y8w5oB0LGZgczwnkppuY56EwxS', 'LB7oQ3uNeUdJYLx9GVPlaGG0oimenO2I3iowO1YJ0Z1V9AV35X0lVOqwyjLD', '2015-10-15 18:30:00', '2015-10-19 06:01:37'),
(9, 'alok', 'sdd.sdei@gmail.com', '$2y$10$4oCxyf3iX9Ucqgb290CXW.I2oKXi/ec7MixjBmT3bIw8amvpPlObe', '7VcYma3HVaaFNOescivOf3CrGMscWSa3lVPYsyc3t07pEW8e9Tze2epmEA7M', '2015-10-18 23:33:35', '2015-10-19 06:27:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
