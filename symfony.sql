-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Octobre 2017 à 18:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, ''),
(3, 'Patisserie'),
(4, 'Macarons'),
(5, 'A partager'),
(6, 'Mignardises'),
(7, 'Birthday cake');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C4584665A` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `author`, `commentaire`, `product_id`) VALUES
(1, '1', '<p>5</p>', NULL),
(2, '1', '<p>5</p>', NULL),
(3, 'testtete', '<p>test</p>', NULL),
(4, 'testtete', '<p>test</p>', NULL),
(5, 'testtete', '<p>test</p>', NULL),
(6, 'testtete', '<p>test</p>', NULL),
(7, 'testtete', '<p>test</p>', NULL),
(8, 'testtete', '<p>tes</p>', 9),
(9, 'testtete', '<p>tes</p>', 9),
(10, 'Jimmy', '<p>C&#39;est super!</p>', 9),
(11, 'Jimmy', '<p>C&#39;est super!</p>', 9),
(12, 'Jimmy', '<p>C&#39;est super!</p>', 9),
(13, 'Jimmy', '<p>C&#39;est super!</p>', 9),
(14, 'Elise', 'Mes préférées!', 15),
(15, 'Laura', 'Ma fille a l''adoré!', 14),
(16, 'Jimmy', 'La fraise géante!!!', 13),
(17, 'Amélie', 'Il y a tous les goûts! Je préfère les macarons à la pistache!', 12);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `content`, `price`, `image`, `category_id`) VALUES
(9, 'Produit avec cat', '<p>Produit avec cat&eacute;gorie</p>', 20, '0870843c7790a9e9cefa09587709d0af.jpeg', 1),
(10, 'Bavarois aux 3 chocolats', 'En vraie fan de chocolat, vous ne pouvez pas passer à côté!', 4, '3890eaae2aaef4ea954c81c666cb990a.jpeg', 3),
(11, 'Fei', 'Crémeux au thé vert, caramel, compote de haricot rouge, le tout sur une génoise au thé vert', 5, 'f3b836dc37bc5cfa23744825cc1e7359.jpeg', 3),
(12, 'Coffret Macaron', 'Assortiment de 16 macarons sélectionnés par notre chef patissier', 20, '6dff5291a4ec94514f153bb6c9d126af.jpeg', 4),
(13, 'Grande fraise', 'Mousse fraise, compote de rhubarbe, cara nougatine, biscuit à la pistache', 30, '916e1d97032b976c983dcfe05f2a102c.jpeg', 5),
(14, 'Hello Kitty', 'Gâteau Hello Kitty à la vanille composée de compote de fruits rouges et de génoise.', 55, 'c66c86017dd4cc012bed02801b9c02b8.jpeg', 7),
(15, 'Fraise habillée en chocolat', '30 fraise gariguette enrobé de chocolat blanc', 30, '889fc6f947ef6f517b643e0ed20aa338.jpeg', 6);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
