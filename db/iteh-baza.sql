SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `iteh-baza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iteh-baza`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`username`, `name`, `surname`, `email`, `phone`, `password`) VALUES
('Chola', 'Matija', 'Colakovic', 'matija.colo@gmail.com', '0665741025', 'kolo4life'),
('admin', null, null, null, null, 'pass');

DROP TABLE IF EXISTS `proizvodi`;
CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proizvod` varchar(50) NOT NULL,
  `proizvodjac` varchar(50) NOT NULL,
  `velicina` varchar(50),
  `materijal` varchar(50) NOT NULL,
  `boja` varchar(50) NOT NULL,
  `username` varchar(50),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`username`) REFERENCES `user`(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `proizvodi` (`id`, `proizvod`, `proizvodjac`, `velicina`, `materijal`, `boja`, `username`) VALUES
(1, 'Patike', 'Garsing', null, 'Koža', 'Crna', 'admin'),
(2, 'Ranac', 'Antiterror ', 'S', 'Tkanina', 'Crna', 'admin'),
(3, 'Ranac', 'Antiterror', 'L', 'Tkanina', 'Zelena', 'admin'),
(4, 'Torba', 'KombatUK', 'S', 'Tkanina', 'Crna', 'admin'),
(5, 'Ranac', 'Pendragon', 'M', 'Tkanina', 'Siva', 'admin'),
(6, 'Ranac', 'Pendragon', 'L', 'Tkanina', 'Plava', 'admin'),
(7, 'Jakna', 'Travel Defence', 'L', 'Flis/Tkanina', 'Siva', 'admin'),
(8, 'Jakna', 'Urban Scout', 'M', 'Koža', 'Crna', 'admin'),
(9, 'Jakna', 'Helly Hansen', 'XL', 'Tkanina', 'Bijela', 'admin'),
(10, 'Marama', 'KombatUK', null, 'Tkanina', 'Zelena', 'admin'),
(11, 'Majica', 'CoolMax', 'L', 'Tkanina', 'Crna', 'admin');

COMMIT;