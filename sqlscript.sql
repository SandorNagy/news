CREATE DATABASE IF NOT EXISTS `proba_kdavid`
DEFAULT CHARACTER SET `utf8`
DEFAULT COLLATE `utf8_general_ci`;

USE `proba_kdavid`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,     
  `username` varchar(255) NOT NULL,     
  `password` varchar(255) NOT NULL,     
   PRIMARY KEY  (`Id`)
);

CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num` int NOT NULL,   
  `title` varchar(120) NOT NULL,     
  `url` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `publishedAt` date,
  `introText` varchar(250) NOT NULL,
  `mainText` text NOT NULL,
  `isActive` boolean NOT NULL,
   PRIMARY KEY  (`Id`)
);

INSERT INTO `user`(`username`, `password`) VALUES ('admin','$2y$10$hFK5W7mDJk5r95HoncFtzePjRYRGbARuy5kBrK9UmdVhB5uAalATK');
