-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 02:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anotez`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `author_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_author` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `author_image`, `is_author`) VALUES
(1, '/img/author/1584527205_IMG_20191012_111815.jpg', 0),
(2, '/img/author/1584527228_IMG_20191013_121505.jpg', 0),
(3, '/img/author/1584527246_20191209_192329.jpg', 1),
(4, '/img/author/1584527260_received_m_mid_1397231860922_56ae1260e2f6799d59_1.jpeg', 1),
(5, '/img/author/1584527275_WP_20160819_14_29_25_Pro.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `color`) VALUES
(1, 'Unknown', '#808080'),
(2, 'Important', '#ff0006'),
(3, 'Private', '#ffff00'),
(4, 'Work', '#804000'),
(5, 'Opste', '#ff00ff');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `ip`, `user`, `detail`, `date`) VALUES
(1, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_category', '2020-03-18'),
(2, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_category', '2020-03-18'),
(3, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_category', '2020-03-18'),
(4, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_category', '2020-03-18'),
(5, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_category', '2020-03-18'),
(6, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/edit_category', '2020-03-18'),
(7, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_author', '2020-03-18'),
(8, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_author', '2020-03-18'),
(9, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_author', '2020-03-18'),
(10, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_author', '2020-03-18'),
(11, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/add_author', '2020-03-18'),
(12, '127.0.0.1', 'nikola.nini@gmail.com', '/admin/edit_user', '2020-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `text`, `category_id`, `user_id`) VALUES
(1, 'Abeceda', '<p><strong>sasafafssafsafsaf</strong></p>', 1, 1),
(2, 'Abdicirati', '<p><em>fsabfsaihkasgsa</em></p>', 3, 1),
(3, 'Abrogancija', '<ul>\r\n<li>neko</li>\r\n<li>navodjenje</li>\r\n<li>blabla</li>\r\n</ul>', 4, 1),
(4, 'Ablativ', '<ol>\r\n<li>neko</li>\r\n<li>drugo&nbsp;</li>\r\n<li>navodjenje</li>\r\n<li>blyat</li>\r\n</ol>', 1, 1),
(5, 'Imenica', '<p>fasfsajiofsaosaf</p>', 1, 1),
(6, 'Imenik', '<p>safbfasbksafkafafs</p>\r\n<p>asfsaafssaffsa</p>', 1, 1),
(7, 'Imenovanje', '<p><strong>fasiisaflasgs;ksaags</strong></p>', 1, 1),
(8, 'Imenjak', '<p><em>safasojigsahgsalikgsa</em></p>', 1, 1),
(9, 'Imitacija', '<p style=\"text-align: center;\">afsfsaiojasagsasgsag</p>', 1, 1),
(10, 'Imovina', '<p><em>sfangsalnsga.ngsklgasgsa</em></p>', 1, 1),
(11, 'Maska', '<p>sanoaglgangas</p>', 5, 1),
(12, 'Maslac', '<p><strong>sasfsaasgagsgsaasgags</strong></p>', 2, 1),
(13, 'Maslina', '<p><em>sagsasgagsagsagsagsgsa</em></p>', 1, 1),
(14, 'Maslinast', '<p><strong>gasagsasgagssag</strong></p>', 3, 1),
(15, 'Mast', '<p><em>fsaafssaffsafsafsa</em></p>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role_id`) VALUES
(1, 'nikola.nini@gmail.com', '7311dfaa92453d065924c88b2508a53a', 1),
(2, 'test@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
