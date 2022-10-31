SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `kolokvijumi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kolokvijumi`;

DROP TABLE IF EXISTS `prijave`;
CREATE TABLE `prijave` (
  `id` int(11) NOT NULL,
  `predmet` varchar(255) NOT NULL,
  `katedra` varchar(255) NOT NULL,
  `sala` varchar(255) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `prijave` (`id`, `predmet`, `katedra`, `sala`, `datum`) VALUES
(10, 'Matematika 1', 'Matematika', '015', '2020-12-26'),
(11, 'Matematika 2', 'Matematika', '015', '2020-12-12'),
(25, 'ITEH', 'ELAB', '105', '2021-01-19');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

ALTER TABLE `prijave`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prijave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;