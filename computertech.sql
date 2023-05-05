-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 mars 2023 à 18:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `computertech`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `titre` text NOT NULL,
  `prix` float NOT NULL,
  `stock` int(11) NOT NULL,
  `liste` text NOT NULL,
  `description` text NOT NULL,
  `images` int(11) NOT NULL DEFAULT '1',
  `id_categories` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_categories_FK` (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `titre`, `prix`, `stock`, `liste`, `description`, `images`, `id_categories`) VALUES
(2, 'AW2521H', 'Alienware 24.5\" LED - AW2521H', 679.94, 0, '• 1920 x 1080 pixels<br>\r\n• 1 ms (gris à gris)<br>\r\n• Format 16/9 - Dalle IPS<br>\r\n• HDR10 - 360 Hz<br>\r\n• G-SYNC<br>\r\n• Reflex Latency Analyzer<br>\r\n• DisplayPort/HDMI<br>\r\n• Pivot<br>\r\n• Hub USB 3.0<br>\r\n• Noir', 'Ultra-rapide et performant, le moniteur G-SYNC Alienware AW2521H se montre efficace pour vous faire grimper le classement ! Avec sa dalle Fast IPS, ses 360 Hz, sa résolution Full HD et son temps de réponse de 1 ms, cet écran 24.5\" vous offre des conditions de jeu digne d\'un véritable professionnel.', 4, 2),
(3, 'A320M', 'ASRock A320M Pro4-F', 77.99, 0, '• Socket AMD AM4 pour processeur AMD Ryzen<br>\r\n• (1000/2000/3000) et AMD série A/Athlon<br>\r\n• 4 Slots mémoire DDR4 3200+ MHz (OC)<br>\r\n• 4 ports SATA 6Gb/s  + 1x M.2 PCIe 3.0 x4 •+ 1x M.2 SATA 6 Gb/s<br>\r\n• 1 port PCI-Express 3.0 16x + 1 port PCI-•Express 2.0 16x (x2)compatible CrossFireX<br>\r\n• ASRock Polychrome SYNC<br>\r\n• Format Micro-ATX<br>', 'Basée sur le chipset AMD AM4, la carte mère ASRock A320M Pro4-F est conçue pour accueillir les processeurs AMD Ryzen.<br> Elle permettra l\'assemblage d\'une configuration Multimédia ou bureautique à moindre coût tout étant équipée d\'un processeur performant et en conservant une taille réduite.', 3, 1),
(4, 'A520M', 'ASRock A520M-HDV', 69.99, 0, '• Socket AMD AM4 pour processeur AMD Ryzen 3000/4000<br>\r\n• 2 Slots mémoire DDR4 4733+ MHz (OC) Dual-Channel<br>\r\n• 4 ports SATA 6Gb/s  + 1x M.2 PCIe 3.0 x4 / SATA 6 Gb/s<br>\r\n• 1 port PCI-Express 3.0 16x<br>\r\n• Format Micro-ATX<br>', 'Basée sur le chipset AMD A520, la carte mère ASRock A520M-HDV est conçue pour accueillir les processeurs AMD Ryzen sur socket AM4 à partir de la génération Zen 2. Elle permettra l\'assemblage d\'une configuration multimédia ou bureautique performante et en conservant une taille réduite. Grâce au support de cartes graphique PCI-Express 3.0 16x, des disques SATA 6Gb/s et M.2, de la mémoire vive DDR4 et de la norme USB 3.0, cette carte mère dispose de tout le nécessaire pour composer un PC équilibré à coût raisonnable.', 3, 1),
(5, 'B450', 'ASRock B450 Steel Legend', 114.95, 0, '• Socket AMD AM4 pour processeur AMD Ryzen (Pinnacle Ridge, Raven Ridge & Summit Ridge)<br>\r\n• 4 Slots mémoire DDR4 3533+ MHz (OC) Dual-Channel - 64 Go max. (4x 16 Go)<br>\r\n• 1 PCIe 3.0 x16, 1 PCIe 2.0 x16, 1 PCIe 2.0 x1<br>\r\n• Audio 7.1 CH HD (Realtek ALC892 Audio Codec), Nichicon Fine Gold Series Audio Caps<br>\r\n• 4 x SATA 6Gb/s, 1 x M.2 SATA3 6 Gbit/s / PCIe NVMe 3.0 2x , 1x M.2 PCIe NVMe 3.0 4x<br>\r\n• Deux ports USB 3.1<br>\r\n• 3 conecteurs LED RGB<br>', 'L\'interface PCIe Gen3 x4 Ultra M.2 permet des transferts de données jusqu\'à 32Gb/s. Elle est compatible avec les modules M.2 SATA3 6Gb/s et permet l\'utilisation du Kit ASRock U.2 (non fourni) et de SSDs U.2 PCIe Gen3 x4.<br> Un autre emplacement M.2 PCIE 3.0 2x NVMe vient compléter les connectiques SSD pour une machine très réactive. ', 3, 1),
(6, 'B100', 'Logitech B100 Optical USB Mouse (Noir)', 9.95, 0, '• Souris filaire<br>\r\n• ambidextre<br>\r\n• capteur optique 800 dpi<br>\r\n• 3 boutons', 'La souris Logitech B100 Optical USB Mouse est un modèle simple, robuste et efficace. Grâce à sa forme confortable, elle vous offrira un excellent niveau de confort pour toutes vos applications de bureautique. La forme ambidextre convient aux droitiers comme aux gauchers.', 1, 2),
(7, 'B227Qbmiprzx', 'Acer 21.5\" LED - B227Qbmiprzx', 199.95, 0, '• 1920 x 1080 pixels<br>\r\n• 4 ms (gris à gris)<br>\r\n• Format 16/9<br>\r\n• Dalle IPS<br>\r\n• 75 Hz<br>\r\n• HDMI/VGA/DisplayPort<br>\r\n• Hub USB<br>\r\n• Pivot<br>\r\n• Haut-parleurs<br>\r\n• Noir', 'Avec cet écran Acer B227Qbmiprzx, tous les ingrédients sont réunis pour bénéficier d\'un environnement optimal au quotidien. Résolution Full HD, dalle IPS 21.5\", hub USB 3.0 et pied ergonomique vous apporteront toutes les clés utiles pour gagner en efficacité et en productivité.', 3, 2),
(8, 'BlackWidow', 'Razer BlackWidow V3 (switches Razer Green)', 139.96, 0, '• Clavier gaming<br>\r\n• interrupteurs mécaniques verts à clics tactiles (switches Razer Green)<br>\r\n• rétroéclairage RGB 16.8 millions de couleurs Razer Chroma<br>\r\n• AZERTY, Français', 'Conçu spécifiquement pour le jeu, le Razer BlackWidow V3 est un clavier compact armé de switches Razer Green afin de vous offrir une exécution précise avec une sensation tactile. Prenez ainsi facilement le dessus sur vos adversaires lors de duels.', 4, 2),
(9, 'BW10', 'LDLC BW10 (AZERTY, Belge)', 12.95, 0, '• Clavier filaire<br>\r\n• résiste aux éclaboussures (AZERTY, Belge)', 'Fort d\'un design sobre et compact, le clavier LDLC BW10 est un clavier qui répondra parfaitement à vos besoins. Agréable au toucher grâce à ses touches carrées à bords arrondis et possédant une protection contre les éclaboussures, il sera un partenaire de choix au quotidien.', 2, 2),
(10, 'Designed', 'Designed by GG Dragon Slayer', 49.94, 0, '• Souris filaire pour gamer<br>\r\n• droitier<br>\r\n• capteur optique 12000 dpi<br>\r\n• 7 boutons<br>\r\n• rétro-éclairage RGB sur 4 zones', 'Souris filaire pour gamer - droitier - capteur optique 12000 dpi - 7 boutons - rétro-éclairage RGB sur 4 zones\r\nDesigned by GG Dragon Slayer Souris filaire pour gamer - droitier - capteur optique 12000 dpi - 7 boutons - rétro-éclairage RGB sur 4 zones ', 4, 2),
(11, 'K360', 'Logitech Wireless Keyboard K360', 41.95, 0, '• Clavier sans fil (AZERTY, Français)', 'Offrez-vous un clavier au design ultra-plat et original en faisant l\'achat du Logitech Wireless Keyboard K360. Ce clavier s\'adapte à votre bureau, à votre salon ou à tout endroit où vous utilisez votre ordinateur sans aucun souci.', 2, 2),
(12, 'M618GL', 'Delux M618GL (noir)', 44.95, 0, '• Souris ergonomique verticale sans fil', 'La souris verticale évite les torsions de l\'avant-bras pour un meilleur confort et une bonne santé. Elle permet d\'adopter une posture neutre verticale qui évite généralement à l\'avant- bras de se tordre.', 3, 2),
(13, 'MC-101', 'Bluestork MC-101', 12.95, 0, '• Casque-micro compatible PC et Mac', 'Le MC-101 est un micro-casque léger idéal pour le bureau ou la maison. Avec ses arceaux ajustables et ses mousses ultras confortables, il sera parfait pour vos appels téléphoniques, vos vidéos-conférences ou encore vos longues parties de jeux vidéos. LE micro est flexible pour un usage pratique.', 2, 2),
(14, 'Rev1', 'Bleujour CTRL PC Rev 1.0 (aluminium)', 119.95, 0, '• Clavier avec ou sans fil USB/Bluetooth<br>\r\n• rechargeable<br>\r\n• touches plates type chiclet<br>\r\n• châssis en aluminium<br>\r\n• AZERTY Français', 'Dans l\'air du temps, le clavier CTRL PC Rev 1.0 de Bleujour trouve facilement sa place sur votre bureau. Intégrant des touches extra fines, elles vous assurent un confort de frappe inégalé.', 2, 2),
(15, 'CG32UQ', 'ASUS 32\" LED - CG32UQ', 742.96, 0, '• 3840 x 2160 pixels<br>\r\n• 5 ms<br>\r\n• Format 16/9<br>\r\n• Dalle VA<br>\r\n• HDR<br>\r\n• RGB<br>\r\n• FreeSync<br>\r\n• HDMI/DisplayPort<br>\r\n• Noir', 'Avec le moniteur CG32UQ d\'ASUS, vous allez pouvoir profiter pleinement de vos jeux favoris pour une immersion totale et un divertissement à grande échelle grâce à sa dalle VA de 32\" 4K, la compatibilité HDR ou encore le rétroéclairage RGB évolutif Halo Sync.', 3, 2),
(16, 'LENOVO', 'Lenovo IdeaPad 3 15ADA05 (81W100D7FR)', 699, 0, '• Processeur AMD Ryzen 7 3700U (Quad-Core 2.3 GHz / 4 GHz Turbo - 8 Threads - Cache 6 Mo)<br>\r\n• 8 Go de mémoire DDR4 2400 MHz (4 Go soudés + 1x 4 Go)<br>\r\n• Ecran anti-reflets de 15.6\" avec résolution Full HD (1920 x 1080 pixels)<br>\r\n• Sortie HDMI, pour le raccordement  à un écran HD<br>\r\n• SSD M.2 PCIe de 128 Go + HDD 1 To<br>\r\n• Communication sans fil Wi-Fi AC + Bluetooth 5.0<br>\r\n• 2 ports USB 3.0 + 1 port USB 2.0<br>\r\n• Haut-parleurs stéréo avec technologie Dolby Audio<br>\r\n• Module TPM 2.0 (firmware)<br>\r\n• Windows 10 Famille 64 bits<br>\r\n• Garantie constructeur 2 ans<br>', 'Compact et performant, le PC portable Lenovo IdeaPad 3 15ADA05 est un excellent compagnon mobile. Avec son écran à cadre mince, il offre un bon confort d\'utilisation. Le PC portable Lenovo IdeaPad 3 15ADA05 (81W100D7FR) offre d\'excellentes performances et un fonctionnement rapide.', 3, 3),
(17, 'ACER', 'Acer Aspire 1 A114-61-S732 (NX.A4CEF.001)', 329, 0, '• Acer<br>\r\n• Système d\'exploitation: Windows 10 S 64bits<br>\r\n• Marque du processeur: Qualcomm<br>\r\n• Gamme du processeur: Snapdragon<br>\r\n• Modèle du processeur: Snapdragon 7c<br>\r\n• Fréquence de base du processeur: 1,80GHz<br>\r\n• Fréquence maximum du processeur: 2,40GHz<br>\r\n• Nombre de cœurs: 8<br>\r\n• Mémoire vive (RAM): 4Go<br>\r\n', 'Système d\'exploitation: Windows 10 S 64bitsMarque du processeur: QualcommGamme du processeur: SnapdragonModèle du processeur: Snapdragon 7cFréquence ', 3, 3),
(18, 'ACE', 'Acer Aspire 5 A514-53-72BS (NX.HUSEF.001)', 759, 0, '• Système d\'exploitation: Windows 10<br>\r\n• Famille 64bits<br>\r\n• Marque du processeur: Intel<br>\r\n• Gamme du processeur: Core i7<br>\r\n• Modèle du processeur: Core i7-1065G7<br>\r\n• Fréquence de base du processeur: 1,30GHz<br>\r\n• Fréquence maximum du processeur: 3,90GHz<br>\r\n• Nombre de cœurs: 4<br>\r\n• Mémoire vive (RAM): 8Go<br>\r\n• Type de mémoire: DDR4<br>', 'Système d\'exploitation: Windows 10 Famille 64bitsMarque du processeur: IntelGamme du processeur: Core i7Modèle du processeur: Core i7-1065G7Fréquence', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` float NOT NULL,
  `titre` text,
  `commentaire` text,
  `id_utilisateurs` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `avis_utilisateurs_FK` (`id_utilisateurs`),
  KEY `avis_articles0_FK` (`id_articles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `titre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `titre`) VALUES
(1, 'pieces', 'Pièces'),
(2, 'peripheriques', 'Périphériques'),
(3, 'ordinateurs', 'Ordinateurs');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int(11) NOT NULL,
  `date` text NOT NULL,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `email` text NOT NULL,
  `telephone` text NOT NULL,
  `adresse` text NOT NULL,
  `ville` text NOT NULL,
  `region` text NOT NULL,
  `code_postal` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateurs`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_utilisateurs`, `date`, `prenom`, `nom`, `email`, `telephone`, `adresse`, `ville`, `region`, `code_postal`, `prix_total`) VALUES
(3, 33, '07/05/2022', 'Yacine', 'Tamiro', 'Yacine.Tamiro@gmail.com', '06 43 53 55 23', '1 rue Lisle ', 'Villejuif', 'Val-de-Marne', 94800, 779.82),
(4, 34, '08/05/2022', 'Dylan', 'Techtonik', 'diditechno@gmail.com', '0612346548', '3 rue de jsp ou', 'La ', '94 oee', 94444, 862.69),
(5, 34, '08/05/2022', 'Dylan', 'Techtonik', 'diditechno@gmail.com', 'a', 'a', 'a', 'a', 7, 1220.97),
(6, 34, '08/05/2022', 'Dylan', 'Techtonik', 'diditechno@gmail.com', 'a', 'a', 'a', 'a', 7, 821.61),
(7, 34, '08/05/2022', 'Dylan', 'Techtonik', 'diditechno@gmail.com', 'a', 'a', 'a', 'a', 1, 9.95),
(8, 35, '23/05/2022', 'Yacine', 'Tamiro', 'Yacine.Tamiro@gmail.com', '0666070269', '1 Rue Lamartine', 'Villejuif', 'Val-de-Marne', 94800, 759);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_details`
--

DROP TABLE IF EXISTS `commandes_details`;
CREATE TABLE IF NOT EXISTS `commandes_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commandes` int(11) NOT NULL,
  `titre` text NOT NULL,
  `quantiter` int(11) DEFAULT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commandes` (`id_commandes`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes_details`
--

INSERT INTO `commandes_details` (`id`, `id_commandes`, `titre`, `quantiter`, `prix`) VALUES
(5, 3, 'Alienware 24.5\" LED - AW2521H', 1, 679.94),
(6, 3, 'Designed by GG Dragon Slayer', 2, 99.88),
(7, 4, 'Designed by GG Dragon Slayer', 1, 49.94),
(8, 4, 'Bluestork MC-101', 1, 12.95),
(9, 4, 'Acer 21.5\" LED - B227Qbmiprzx', 4, 799.8),
(10, 5, 'ASRock A320M Pro4-F', 3, 233.97),
(11, 5, 'Acer Aspire 1 A114-61-S732 (NX.A4CEF.001)', 3, 987),
(12, 6, 'LDLC BW10 (AZERTY, Belge)', 2, 25.9),
(13, 6, 'ASRock A520M-HDV', 3, 209.97),
(14, 6, 'Bluestork MC-101', 2, 25.9),
(15, 6, 'Razer BlackWidow V3 (switches Razer Green)', 4, 559.84),
(16, 7, 'Logitech B100 Optical USB Mouse (Noir)', 1, 9.95),
(19, 8, 'Acer Aspire 5 A514-53-72BS (NX.HUSEF.001)', 1, 759);

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

DROP TABLE IF EXISTS `paniers`;
CREATE TABLE IF NOT EXISTS `paniers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantiter` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paniers_utilisateurs_FK` (`id_utilisateurs`),
  KEY `paniers_articles0_FK` (`id_articles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pourcentage` int(11) NOT NULL,
  `code_promo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`id`, `pourcentage`, `code_promo`) VALUES
(1, 10, 'test ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `mdp` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `mdp`, `nom`, `prenom`, `admin`) VALUES
(33, 'allo@gmail.com', '4c6a5bd54bfd4ff4225848576d2755ef', 'Allo ', 'Bonjour', 0),
(34, 'diditechno@gmail.com', '2ced53a6cd7b8fe51fcf4bb9b5c3a0ae', 'Techtonik', 'Dylan', 0),
(35, 'gdzuyg@gmail.com', 'ba2f3a0ef7ac2b5b6b6b8b7b453b9370', 'Tamiro', 'Yacine', 0),
(36, 'projet2022@gmail.com', '182d9b2e3a4dc8f696118ded4adc95f8', 'Tamiro', 'Yacine', 0),
(37, 'yacine@gmail.com', 'a977f646405359ff8387bb29127ea94e', 'AZSXWQ', 'AZSXWQ', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categories_FK` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_articles0_FK` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `avis_utilisateurs_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `commandes_details`
--
ALTER TABLE `commandes_details`
  ADD CONSTRAINT `commandes_details_ibfk_1` FOREIGN KEY (`id_commandes`) REFERENCES `commandes` (`id`);

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_articles0_FK` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `paniers_utilisateurs_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
