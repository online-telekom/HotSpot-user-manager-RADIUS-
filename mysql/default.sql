-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2017 at 01:04 AM
-- Server version: 10.0.30-MariaDB-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_logs`
--

CREATE TABLE IF NOT EXISTS `access_logs` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `ip_address` varchar(200) COLLATE utf8_bin NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `activation_links`
--

CREATE TABLE IF NOT EXISTS `activation_links` (
`id` int(11) NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `hash` varchar(255) CHARACTER SET latin1 NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `bonovi`
--

CREATE TABLE IF NOT EXISTS `bonovi` (
`id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `username` text NOT NULL,
  `trajanje` text NOT NULL,
  `datum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bruteforce_watchlist`
--

CREATE TABLE IF NOT EXISTS `bruteforce_watchlist` (
`id` bigint(20) NOT NULL,
  `ip_address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `datetime` text CHARACTER SET latin1 NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `core_settings`
--

CREATE TABLE IF NOT EXISTS `core_settings` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `data` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `core_settings`
--

INSERT INTO `core_settings` (`id`, `name`, `data`) VALUES
(1, 'WWW', 'YOU_IP_ADDRESS'),
(2, 'SITE_NAME', 'WIFI Coupons'),
(3, 'SITE_DESC', 'HOTSPOT COUPONS MANAGER'),
(4, 'SITE_KEYW', 'coupons'),
(6, 'SITE_EMAIL', 'MyMail <mail@domain.com>'),
(14, 'TIMEZONE', 'Europe/Sarajevo'),
(15, 'ADMIN_LEVEL', '293847'),
(16, 'THEME_NAME', 'onlinetelekom'),
(17, 'BRUTEFORCE_LIMIT', '5'),
(18, 'BRUTEFORCE_TIMEOUT', '1'),
(20, 'ADMIN_EMAIL', 'mail@domain.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
`id` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `count` bigint(20) unsigned NOT NULL,
  `f_count` bigint(20) unsigned NOT NULL,
  `t_count` bigint(20) unsigned NOT NULL,
  `g_count` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_level` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `primary_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `activated` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `suspended` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date_created` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `signup_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `whitelist` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_whitelist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_count` bigint(20) unsigned NOT NULL,
  `ime2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `user_level`, `primary_group`, `activated`, `suspended`, `date_created`, `last_login`, `signup_ip`, `last_ip`, `whitelist`, `ip_whitelist`, `login_count`, `ime2`) VALUES
(1, 1, 'Robert', 'Glavaš', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'info@online-telekom.com', '293847', '928366', '1', '0', '24.10.2016 09:33', '2017-04-11 00:34:17', '93.137.159.162', '31.45.232.155', '0', '', 1, 'Robert Glavaš');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE IF NOT EXISTS `user_levels` (
`id` int(11) NOT NULL,
  `level_id` bigint(11) NOT NULL,
  `level_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `auto` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `redirect_page` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'index.php',
  `admin` int(10) NOT NULL,
  `korisnik` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `level_id`, `level_name`, `auto`, `redirect_page`, `admin`, `korisnik`) VALUES
(1, 293847, 'Administrator', '0', 'index.php', 1, 1),
(2, 928366, 'Korisnik', '1', 'index.php', 0, 1),
(3, 341854, 'Podadmin', '0', 'index.php', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_logs`
--
ALTER TABLE `access_logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activation_links`
--
ALTER TABLE `activation_links`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonovi`
--
ALTER TABLE `bonovi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bruteforce_watchlist`
--
ALTER TABLE `bruteforce_watchlist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_settings`
--
ALTER TABLE `core_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_logs`
--
ALTER TABLE `access_logs`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `activation_links`
--
ALTER TABLE `activation_links`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonovi`
--
ALTER TABLE `bonovi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bruteforce_watchlist`
--
ALTER TABLE `bruteforce_watchlist`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `core_settings`
--
ALTER TABLE `core_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
