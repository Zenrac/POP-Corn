CREATE TABLE `test` (
  `test` varchar(32) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `album` (
  `numAlbum` varchar(32) NOT NULL,
  `nomAlbum` varchar(150) DEFAULT NULL,
  `anneeAlbum` datetime DEFAULT NULL,
  `imageAlbum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `auteur` (
  `numAuteur` varchar(32) NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `composer` (
  `numAuteur` varchar(32) NOT NULL,
  `numAlbum` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `contenir` (
  `numPlaylist` int(11) NOT NULL,
  `numMusique` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ecrire` (
  `numAuteur` varchar(32) NOT NULL,
  `numMusique` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `musique` (
  `numMusique` varchar(32) NOT NULL,
  `numAlbum` varchar(32) DEFAULT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `duree` varchar(6) DEFAULT NULL,
  `top` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `playlist` (
  `numPlaylist` int(11) NOT NULL,
  `numUser` int(11) NOT NULL,
  `nom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `posseder` (
  `numMusique` varchar(32) NOT NULL,
  `numTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tag` (
  `numTag` int(11) NOT NULL,
  `nomTag` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `utilisateur` (
  `numUser` int(11) NOT NULL,
  `pseudo` varchar(32) DEFAULT NULL,
  `mdpUser` varchar(32) DEFAULT NULL,
  `Admin` enum('Oui','Non') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `album`
  ADD PRIMARY KEY (`numAlbum`);

ALTER TABLE `auteur`
  ADD PRIMARY KEY (`numAuteur`);

ALTER TABLE `composer`
  ADD PRIMARY KEY (`numAuteur`,`numAlbum`),
  ADD KEY `FK_COMPOSER_ALBUM` (`numAlbum`);

ALTER TABLE `contenir`
  ADD PRIMARY KEY (`numPlaylist`,`numMusique`),
  ADD KEY `FK_CONTENIR_MUSIQUE` (`numMusique`);

ALTER TABLE `ecrire`
  ADD PRIMARY KEY (`numAuteur`,`numMusique`),
  ADD KEY `FK_ECRIRE_MUSIQUE` (`numMusique`);

ALTER TABLE `musique`
  ADD PRIMARY KEY (`numMusique`),
  ADD KEY `FK_MUSIQUE_ALBUM` (`numAlbum`);

ALTER TABLE `playlist`
  ADD PRIMARY KEY (`numPlaylist`),
  ADD KEY `FK_PLAYLIST_UTILISATEUR` (`numUser`);

ALTER TABLE `posseder`
  ADD PRIMARY KEY (`numMusique`,`numTag`),
  ADD KEY `FK_POSSEDER_TAG` (`numTag`);

ALTER TABLE `tag`
  ADD PRIMARY KEY (`numTag`);

ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`numUser`);

ALTER TABLE `playlist`
  MODIFY `numPlaylist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `tag`
  MODIFY `numTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `utilisateur`
  MODIFY `numUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `composer`
  ADD CONSTRAINT `FK_COMPOSER_ALBUM` FOREIGN KEY (`numAlbum`) REFERENCES `album` (`numAlbum`),
  ADD CONSTRAINT `FK_COMPOSER_AUTEUR` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`);

ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_CONTENIR_MUSIQUE` FOREIGN KEY (`numMusique`) REFERENCES `musique` (`numMusique`),
  ADD CONSTRAINT `FK_CONTENIR_PLAYLIST` FOREIGN KEY (`numPlaylist`) REFERENCES `playlist` (`numPlaylist`);

ALTER TABLE `ecrire`
  ADD CONSTRAINT `FK_ECRIRE_AUTEUR` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`),
  ADD CONSTRAINT `FK_ECRIRE_MUSIQUE` FOREIGN KEY (`numMusique`) REFERENCES `musique` (`numMusique`);

ALTER TABLE `musique`
  ADD CONSTRAINT `FK_MUSIQUE_ALBUM` FOREIGN KEY (`numAlbum`) REFERENCES `album` (`numAlbum`);

ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_PLAYLIST_UTILISATEUR` FOREIGN KEY (`numUser`) REFERENCES `utilisateur` (`numUser`);

ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_POSSEDER_MUSIQUE` FOREIGN KEY (`numMusique`) REFERENCES `musique` (`numMusique`),
  ADD CONSTRAINT `FK_POSSEDER_TAG` FOREIGN KEY (`numTag`) REFERENCES `tag` (`numTag`);

INSERT INTO `utilisateur` (`numUser`, `pseudo`, `mdpUser`, `Admin`) VALUES
(1, 'admin', 'password', 'Oui'),
(2, 'user', 'password', 'Non');

INSERT INTO `tag` (`numTag`, `nomTag`) VALUES
(1, 'Pop'),
(2, 'Pop-Rock'),
(3, 'K-Pop'),
(4, 'Hip-Pop'),
(5, 'Musique Alternative/indé'),
(6, 'Electro-Pop'),
(7, 'R&B/Soul'),
(8, 'Pop-Latino'),
(9, 'Pop-Rap'),
(10, 'Country-Pop');
