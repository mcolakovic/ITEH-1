SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `iteh-baza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iteh-baza`;

DROP TABLE IF EXISTS `proizvodi`;
CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `proizvod` varchar(50) NOT NULL,
  `proizvodjac` varchar(50) NOT NULL,
  `velicina` varchar(50) NOT NULL,
  `materijal` varchar(50) NOT NULL,
  `boja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `proizvodi` (`id`, `proizvod`, `proizvodjac`, `velicina`, `materijal`, `boja`) VALUES
(1, 'Patike', 'Garsing', null, 'Koža', 'Crna'),
(2, 'Ranac', 'Antiterror ', 'S', 'Tkanina', 'Crna'),
(3, 'Ranac', 'Antiterror', 'L', 'Tkanina', 'Zelena'),
(4, 'Torba', 'KombatUK', 'S', 'Tkanina', 'Crna'),
(5, 'Ranac', 'Pendragon', 'M', 'Tkanina', 'Siva'),
(6, 'Ranac', 'Pendragon', 'L', 'Tkanina', 'Plava'),
(7, 'Jakna', 'Travel Defence', 'L', 'Flis/Tkanina', 'Siva'),
(8, 'Jakna', 'Urban Scout', 'M', 'Koža', 'Crna'),
(9, 'Jakna', 'Helly Hansen', 'XL', 'Tkanina', 'Bijela'),
(10, 'Marama', 'KombatUK', null, 'Tkanina', 'Zelena'),
(11, 'Majica', 'CoolMax', 'L', 'Tkanina', 'Crna');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`username`, `name`, `surname`, `email`, `phone`, `password`) VALUES
('Chola', 'Matija', 'Colakovic', 'matija.colo@gmail.com', '0665741025', 'kolo4life');

ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
COMMIT;