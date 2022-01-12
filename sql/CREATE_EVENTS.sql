

-- CREATE DATABASE
DROP DATABASE IF EXISTS `scheduler`;
CREATE DATABASE `scheduler`;
USE `scheduler`;

-- CREATE EVENTS TABLE
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `start` DATETIME DEFAULT NULL,
  `duration` int DEFAULT NULL COMMENT 'minutes',
  `clicks` int DEFAULT 0,
  `shares` int DEFAULT 0,
  `isActive` boolean NOT NULL DEFAULT 1,
  `bookmarked` boolean NOT NULL DEFAULT 0
);

-- CREATE EVENTS TABLE
DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
  `event_id` int NOT NULL REFERENCES `event.id`,
  FOREIGN KEY (event_id) REFERENCES event(id)
);
