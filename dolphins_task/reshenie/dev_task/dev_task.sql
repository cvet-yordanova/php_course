-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            10.1.21-MariaDB - mariadb.org binary distribution
-- ОС на сървъра:                Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dev_task
CREATE DATABASE IF NOT EXISTS `dev_task` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dev_task`;

-- Дъмп структура за таблица dev_task.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `type` varchar(50) DEFAULT NULL,
  `buyer` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `date_visit` varchar(50) NOT NULL,
  `time_visit` varchar(50) NOT NULL,
  `date_bought` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица dev_task.tickets: ~45 rows (approximately)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` (`type`, `buyer`, `id`, `email`, `date_visit`, `time_visit`, `date_bought`) VALUES
	('adult', 'Tsvetelina Yordanova', 77, 'kambanka.dryn@gmail.com', '10/12/1984', '18:00', '2018-08-23'),
	('adult', 'Tsvetelina Yordanova', 78, 'kambanka.dryn@gmail.com', '10/12/1984', '18:00', '2018-08-23'),
	('child', 'Tsvetelina Yordanova', 79, 'kambanka.dryn@gmail.com', '10/12/1984', '18:00', '2018-08-23'),
	('child', 'Tsvetelina Yordanova', 80, 'kambanka.dryn@gmail.com', '10/12/1984', '18:00', '2018-08-23'),
	('adult', 'Petya Vasileva', 81, 'petyq@abv.bg', '10/26/2018', '18:00', '2018-08-23'),
	('child', 'Petya Vasileva', 82, 'petyq@abv.bg', '10/26/2018', '18:00', '2018-08-23'),
	('child', 'Petya Vasileva', 83, 'petyq@abv.bg', '10/26/2018', '18:00', '2018-08-23'),
	('adult', 'Marina Petkova', 86, 'marina@gmail.vom', '10/31/2018', '16:30', '2018-08-24'),
	('child', 'Marina Petkova', 87, 'marina@gmail.vom', '10/31/2018', '16:30', '2018-08-24'),
	('child', 'Marina Petkova', 88, 'marina@gmail.vom', '10/31/2018', '16:30', '2018-08-24'),
	('adult', 'Sybka Petrova', 89, 'kambanka.dryn@gmail.com', '10/26/2018', '13:30', '2018-08-24');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
