-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2020 at 08:28 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
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
-- Database: `BDDjukebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int NOT NULL,
  `artist_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`) VALUES
(1, 'Jordi Savall'),
(2, 'Cinema Strange'),
(3, 'GZA'),
(4, 'DJ Rum'),
(5, 'Burial'),
(6, 'The Chemical Brothers'),
(7, 'Jefferson Airplane'),
(8, 'Metallica'),
(9, 'Rage Against the Machine'),
(10, 'Djeneba Seck'),
(11, 'Madosini'),
(12, 'Pantha du Prince'),
(13, 'Pixies'),
(14, 'Princess Chelsea'),
(15, 'The Cramps'),
(16, 'The Doors'),
(17, 'The Hacker');

-- --------------------------------------------------------

--
-- Table structure for table `assoc_tag_artist`
--

CREATE TABLE `assoc_tag_artist` (
  `assoc_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `artist_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `assoc_tag_artist`
--

INSERT INTO `assoc_tag_artist` (`assoc_id`, `tag_id`, `artist_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 4),
(9, 9, 4),
(10, 10, 4),
(11, 8, 5),
(12, 17, 5),
(13, 18, 5),
(14, 8, 6),
(15, 5, 7),
(16, 11, 7),
(17, 5, 8),
(18, 12, 8),
(19, 5, 9),
(20, 12, 9),
(21, 13, 10),
(22, 19, 10),
(23, 13, 11),
(24, 14, 11),
(25, 8, 12),
(26, 9, 12),
(27, 10, 12),
(28, 1, 12),
(29, 5, 13),
(30, 8, 14),
(31, 5, 15),
(32, 15, 15),
(33, 16, 15),
(34, 5, 16),
(35, 11, 16),
(36, 8, 17),
(37, 10, 17),
(38, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int NOT NULL,
  `tag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(1, 'Pop'),
(2, 'Africa'),
(3, 'Country'),
(4, 'goth'),
(5, 'rock'),
(6, 'glam'),
(7, 'hip hop'),
(8, 'electronic'),
(9, 'IDM'),
(10, 'techno'),
(11, 'psychedelic rock'),
(12, 'hard rock'),
(13, 'africa'),
(14, 'south africa'),
(15, 'punk rock'),
(16, 'rockabilly'),
(17, 'dubstep'),
(18, 'UK garage'),
(19, 'mali'),
(20, 'musique classique'),
(21, 'barroque'),
(22, 'batcave');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int NOT NULL,
  `track_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `track_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `artist_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `track_name`, `track_url`, `artist_id`) VALUES
(1, 'La Folia 1490-1701: Folia: Rodrigo Martínez (Anonyme, 1490)', 'https://www.youtube.com/embed/SW4Eq-tbgao', 1),
(2, 'Marche pour la cérémonie des Turcs', 'https://www.youtube.com/embed/uORg1aeD_Og', 1),
(3, 'V. 1539 Muerte de la Esposa de Carlos V: \"Mille Regretz\" (Chanson)', 'https://www.youtube.com/embed/faABsJyK3Xk', 1),
(4, 'Aboriginal Anemia', 'https://www.youtube.com/embed/h0PSZ_-RCWo', 2),
(5, 'Greensward Grey', 'https://www.youtube.com/embed/iZauWav37Bw', 2),
(6, 'Speak, Marauder!', 'https://www.youtube.com/embed/GFD7JqQJ3As', 2),
(7, 'Liquid Swords', 'https://www.youtube.com/embed/wA49DaVmJWQ', 3),
(8, 'Shadowboxin\'', 'https://www.youtube.com/embed/v8CAXqRfft4', 3),
(9, 'Hard To Say', 'https://www.youtube.com/embed/0YZcnBM0Iys', 4),
(10, 'Tournesol', 'https://www.youtube.com/embed/jznxbDOD6vk', 4),
(11, 'Spaceape', 'https://www.youtube.com/embed/JfyRjyKj05I', 5),
(12, 'Chemical Beats', 'https://www.youtube.com/embed/_GfcIprkuvw', 6),
(13, 'White Rabbit', 'https://www.youtube.com/embed/WANNqr-vcx0', 7),
(14, 'Nothing Else Matters', 'https://www.youtube.com/embed/tAGnKpE4NCI', 8),
(15, 'Killing In the Name', 'https://www.youtube.com/embed/bWXazVhlyxQ', 9),
(16, 'Know Your Enemy', 'https://www.youtube.com/embed/4smim2MNvF8', 9),
(17, 'Anka Maliba', 'https://www.youtube.com/embed/FAlfryrbvTM', 10),
(18, 'Yitileni', 'https://www.youtube.com/embed/KVuqQ2k07gM', 11),
(19, 'Saturn Strobe', 'https://www.youtube.com/embed/NYY4AGPJJBo', 12),
(20, 'Where Is My Mind', 'https://www.youtube.com/embed/49FB9hhoO6c', 13),
(21, 'The Cigarette Duet', 'https://www.youtube.com/embed/4TV_128Fz2g', 14),
(22, 'Human Fly', 'https://www.youtube.com/embed/9TR6QuOj-Gw', 15),
(23, 'Riders On The Storm', 'https://www.youtube.com/embed/iv8GW1GaoIc', 16),
(24, 'Fadin Away<img src=\"https://tinyurl.com/theh4cker4\">', 'https://www.youtube.com/embed/wd5zVMBVCII', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(11, 'azrael@gmail.com', '$2y$10$QGevLY9VJigIM9kCXao8oemiKg.rQT2uVGfqv70RTuBruwBo4l0m2', 'user'),
(12, 'lucas@gmail.com', '$2y$10$Q8.UrCCNHdXn6NGvdknnI.Dswsir.knl0gOKuiAivsFd7PGzVrz6u', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `assoc_tag_artist`
--
ALTER TABLE `assoc_tag_artist`
  ADD PRIMARY KEY (`assoc_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `assoc_tag_artist`
--
ALTER TABLE `assoc_tag_artist`
  MODIFY `assoc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assoc_tag_artist`
--
ALTER TABLE `assoc_tag_artist`
  ADD CONSTRAINT `assoc_tag_artist_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`),
  ADD CONSTRAINT `assoc_tag_artist_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`);

--
-- Constraints for table `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
