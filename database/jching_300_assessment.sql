-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `adminLogins`;
CREATE TABLE `adminLogins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `forename` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `adminLogins` (`id`, `username`, `hash`, `forename`, `surname`) VALUES
(6,	'admin',	'$2y$10$ImkIIz1RKdoMu1iiZLchq.eCgPDp6PMMES.W.sNWZG2ID0PjpR3rq',	'admin',	'admin'),
(10,	'jching',	'$2y$10$qgsEwseh1gW4imH7e.oaFOxNQCoys89qmNHDIzDudziKMqq5MzYvK',	'Josiah',	'Ching'),
(11,	'jRobert',	'$2y$10$lfCqez1e1JLaW4igMonCkO.vVumkUTW64cPtbgST/d3pX8f5mH5p.',	'John',	'Roberts'),
(12,	'jching123',	'$2y$10$aIkecr2aFFmedhVpZ20a9.rtZAgal/MzQU582ESBgY4FALJDLsmqW',	'jo',	'ching');

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `questionId` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionId` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `answers` (`id`, `questionId`, `text`) VALUES
(1,	1,	'8am-4:30pm on Mon to Fri'),
(2,	1,	'8am-4:30pm on Mon to Thu & 8am-4pm on Fri'),
(3,	1,	'8am-4pm on Mon to Fri'),
(4,	10,	'test'),
(5,	10,	'test'),
(6,	10,	'test'),
(7,	10,	'test'),
(8,	11,	'teddy'),
(9,	11,	'sun dial'),
(10,	11,	'bannan'),
(11,	13,	't'),
(12,	13,	'Add Answer'),
(13,	14,	'1'),
(14,	14,	'2'),
(15,	14,	'3'),
(16,	14,	'4'),
(17,	14,	'5'),
(18,	15,	'1'),
(19,	15,	'2'),
(20,	16,	'1'),
(21,	16,	'2'),
(22,	16,	'3'),
(23,	16,	'4'),
(24,	14,	'6'),
(25,	18,	'1'),
(26,	18,	'2');

DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys` (
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `keys` (`hash`) VALUES
('$2y$10$tfftHU9TgHEloZZYwQXKOunz4BKqPbBPaPQlg4aiRdSRVMjtW.b2K');

DROP TABLE IF EXISTS `libraryAreas`;
CREATE TABLE `libraryAreas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `libraryAreas` (`id`, `name`, `desc`) VALUES
(1,	'Seating and Book Area',	'This is where you will find the vast majority of the librarys books and the main seating area for reading and relaxing.'),
(2,	'Computer Suite',	'This is where the library\'s technology suite is located filled with plenty of computers for you to use.'),
(3,	'Front Desk',	'The front desk is where you will go to check in and out any books you want to loan and have any questions you may have about the library answered.'),
(4,	'Librarians Office',	'This is where the head librarian lives, feel free to pop in anytime you have a query.'),
(5,	'Silent Reading Space',	'The silent reading space is a no noise policy reading only area for people who want to enjoy there book in peace.');

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `areaId` int NOT NULL,
  `title` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correctAnswer` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `areaId` (`areaId`),
  KEY `correctAnswer` (`correctAnswer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `questions` (`id`, `areaId`, `title`, `text`, `correctAnswer`) VALUES
(1,	1,	'Library Open Times?',	'The librarians, Ms Jones & Mrs Maxwell arrived back from lunch and saw the empty shelves. It must have happened when the library was open, they thought. This means it must have happened when?',	2),
(14,	2,	'Test 1',	'Lorem ipsum odor amet, consectetuer adipiscing elit. Tempus parturient class ac fames elementum pharetra nascetur luctus. Dapibus lobortis porta himenaeos lobortis aliquet. Ultrices interdum lacus sollicitudin sit lacinia. Et potenti rutrum, tempus nascetur mollis felis. Praesent sodales laoreet eget ex volutpat blandit hendrerit libero. Accumsan aliquet varius dictum facilisi parturient molestie nostra. Facilisi dignissim primis gravida hendrerit in cursus. Inceptos felis consectetur class integer etiam condimentum taciti consequat.',	24),
(15,	3,	'test 2',	'Lorem ipsum odor amet, consectetuer adipiscing elit. Tempus parturient class ac fames elementum pharetra nascetur luctus. Dapibus lobortis porta himenaeos lobortis aliquet. Ultrices interdum lacus sollicitudin sit lacinia. Et potenti rutrum, tempus nascetur mollis felis. Praesent sodales laoreet eget ex volutpat blandit hendrerit libero. Accumsan aliquet varius dictum facilisi parturient molestie nostra. Facilisi dignissim primis gravida hendrerit in cursus. Inceptos felis consectetur class integer etiam condimentum taciti consequat.',	18),
(18,	4,	'test 3',	'lorem ipsum',	26);

-- 2024-09-02 23:23:07
