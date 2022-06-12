-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 19 déc. 2021 à 23:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetmeccano`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte_bancaire`
--

DROP TABLE IF EXISTS `carte_bancaire`;
CREATE TABLE IF NOT EXISTS `carte_bancaire` (
  `idCard` int(11) NOT NULL AUTO_INCREMENT,
  `numCarte` text NOT NULL,
  `crypto` text NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCard`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carte_bancaire`
--

INSERT INTO `carte_bancaire` (`idCard`, `numCarte`, `crypto`, `idUser`) VALUES
(1, 'e8641071a4175198530c4e790c11841238c337ee1ac488adadc8185eb09e21f8', '303c8bd55875dda240897db158acf70afe4226f300757f3518b86e6817c00022', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` text NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Joint'),
(2, 'Roulement'),
(3, 'Fixation'),
(4, 'Liaison'),
(5, 'Construction'),
(6, 'Charge'),
(7, 'Engrenage'),
(8, 'Pneu'),
(9, 'Ressort'),
(10, 'Support'),
(11, 'Joint'),
(12, 'Roulement'),
(13, 'Fixation'),
(14, 'Liaison'),
(15, 'Construction'),
(16, 'Charge'),
(17, 'Engrenage'),
(18, 'Pneu'),
(19, 'Ressort'),
(20, 'Support');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE IF NOT EXISTS `contenu` (
  `idPanier` int(11) DEFAULT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL,
  `Prix` double DEFAULT NULL,
  KEY `idPanier` (`idPanier`),
  KEY `idProduit` (`idProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`idPanier`, `idProduit`, `Quantite`, `Prix`) VALUES
(6, 1, 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `PrixTotal` double DEFAULT NULL,
  `Valider` tinyint(1) NOT NULL DEFAULT '0',
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `PrixTotal`, `Valider`, `idUser`) VALUES
(6, 15, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `ProdName` char(50) NOT NULL,
  `Price` double NOT NULL,
  `imgProduit` text,
  `Description` char(255) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `ProdName`, `Price`, `imgProduit`, `Description`, `Quantite`, `idCategorie`) VALUES
(1, 'Pneu Auto', 7.5, '/MVC/imagesProduit/Pneu_Auto.jpg', 'Très utile en tant que pneu pour vos créations terrestre', 1961, 8),
(2, 'Pneu Poulie', 12, '/MVC/imagesProduit/Pneu_Poulie.jpg', 'Parfaits pour vos poulies', 997, 8),
(3, 'Poulie', 10, '/MVC/imagesProduit/Poulie.jpg', 'Une poulie bien pratique pour faire une grue par exemple', 8, 2),
(4, 'Anneau en Caoutchouc', 6, '/MVC/imagesProduit/Anneau_en_Caoutchouc.jpg', 'Un joint fort utile pour vos construction', 0, 1),
(5, 'Plaque', 10, '/MVC/imagesProduit/Plaque.jpg', 'Une plaque pour vos création', 19, 10),
(6, 'Pignon', 15, '/MVC/imagesProduit/Pignon.jpg', 'Un pignon, utile pour vos créations mouvantes', 55, 7);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `idProduit` int(11) DEFAULT NULL,
  `Reduction` double NOT NULL,
  `OldPrice` double NOT NULL,
  UNIQUE KEY `idProduit` (`idProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`idProduit`, `Reduction`, `OldPrice`) VALUES
(1, 25, 10);

-- --------------------------------------------------------

--
-- Structure de la table `tutorial`
--

DROP TABLE IF EXISTS `tutorial`;
CREATE TABLE IF NOT EXISTS `tutorial` (
  `idTutorial` int(11) NOT NULL AUTO_INCREMENT,
  `imgTutorial` text NOT NULL,
  PRIMARY KEY (`idTutorial`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tutorial`
--

INSERT INTO `tutorial` (`idTutorial`, `imgTutorial`) VALUES
(1, '/MVC/imagesTutorial/montage1.jpg'),
(2, '/MVC/imagesTutorial/montage2.jpg'),
(3, '/MVC/imagesTutorial/montBC1.jpg'),
(4, '/MVC/imagesTutorial/montBC2.jpg'),
(5, '/MVC/imagesTutorial/montBC3.jpg'),
(6, '/MVC/imagesTutorial/montBC4.jpg'),
(7, '/MVC/imagesTutorial/montBC5.jpg'),
(8, '/MVC/imagesTutorial/montBC6.jpg'),
(9, '/MVC/imagesTutorial/montBC7.jpg'),
(10, '/MVC/imagesTutorial/montBC8.jpg'),
(12, '/MVC/imagesTutorial/montBC10.jpg'),
(13, '/MVC/imagesTutorial/montBC11.jpg'),
(14, '/MVC/imagesTutorial/montBC12.jpg'),
(15, '/MVC/imagesTutorial/montBC13.jpg'),
(16, '/MVC/imagesTutorial/montBC14.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` char(50) NOT NULL,
  `MotDePasse` text NOT NULL,
  `Mail` varchar(70) NOT NULL,
  `Image` text,
  `isAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `UserName`, `MotDePasse`, `Mail`, `Image`, `isAdmin`) VALUES
(1, 'Sapone Guillaume', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'G.Sapone@mail.fr', NULL, 1),
(3, 'Dragnir Natsu', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'D.Natsu@mail.fr', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
