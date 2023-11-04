-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 12:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coletek`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteById` (IN `table_name` VARCHAR(100), IN `id` INT)   BEGIN
	SET @query = CONCAT(CONCAT(CONCAT('DELETE FROM ', table_name), ' WHERE id=' ), id);
	PREPARE stmt FROM @query;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LinkSectorsToUser` (IN `sector_id` INT, IN `user_id` INT)   BEGIN
INSERT INTO user_sectors VALUES(sector_id, user_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NewSector` (IN `name` VARCHAR(100))   BEGIN
INSERT INTO sectors VALUES(NULL, name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NewUser` (IN `name` VARCHAR(100), IN `email` VARCHAR(100))   BEGIN
INSERT INTO users VALUES(NULL, name, email);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchUsersBySector` (IN `sector_name` VARCHAR(100))   BEGIN
SELECT u.id, u.name, u.email FROM users u, user_sectors us, sectors s WHERE s.name LIKE sector_name AND s.id=us.sector_id AND us.user_id=u.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAll` (IN `table_name` VARCHAR(100))   BEGIN
	SET @query = CONCAT('SELECT * FROM ', table_name);
	PREPARE stmt FROM @query;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectById` (IN `table_name` VARCHAR(100), IN `id` INT)   BEGIN
	SET @query = CONCAT(CONCAT(CONCAT('SELECT * FROM ', table_name), ' WHERE id=' ), id);
	PREPARE stmt FROM @query;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectNotLinked` (IN `user_id` VARCHAR(100))   BEGIN
	SELECT * FROM sectors WHERE id NOT IN (SELECT s.id FROM sectors s, user_sectors us WHERE s.id=us.sector_id AND us.user_id=user_id); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectSectorsByUser` (IN `id` INT)   BEGIN
SELECT user_id, sector_id, name FROM user_sectors us, sectors s WHERE user_id=id AND s.id=us.sector_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UnlinkSectorsToUser` (IN `sid` INT, IN `uid` INT)   BEGIN
DELETE FROM user_sectors 
WHERE user_id=uid AND sector_id=sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateSectorInfo` (IN `sector_id` INT, IN `sector_name` VARCHAR(100))   BEGIN
UPDATE sectors SET name=sector_name WHERE id=sector_id; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUserInfo` (IN `user_id` INT, IN `user_name` VARCHAR(100), IN `user_email` VARCHAR(100))   BEGIN
UPDATE users SET name=user_name, email=user_email WHERE id=user_id; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `name`) VALUES
(1, 'Informatica'),
(11, 'Manufaturação'),
(15, 'Produção'),
(16, 'Venda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Belle Golo', 'belgolo@example.com'),
(4, 'Osvaldo Ndonge', 'osvaldo@example.com'),
(5, 'Judo', 'marc@gmail.com'),
(9, 'Belle Golo', 'core@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_sectors`
--

CREATE TABLE `user_sectors` (
  `sector_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sectors`
--

INSERT INTO `user_sectors` (`sector_id`, `user_id`) VALUES
(1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_sectors`
--
ALTER TABLE `user_sectors`
  ADD UNIQUE KEY `sector_id` (`sector_id`,`user_id`),
  ADD KEY `fk_user_sector` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sectors`
--
ALTER TABLE `user_sectors`
  ADD CONSTRAINT `fk_sector_user` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`),
  ADD CONSTRAINT `fk_user_sector` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
