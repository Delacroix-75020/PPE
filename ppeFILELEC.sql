
--
 DROP DATABASE IF EXISTS PPE;
 CREATE DATABASE PPE;
 USE PPE;
CREATE TABLE admin (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  primary key(id)
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `pass`) VALUES
(1, 'Delacroix', 'ad.dela75020@gmail.com', '4f9996ad3b634ef65d772b702509236456662a35'),
(2, 'admin', 'admin@admin.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--
CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(70) NOT NULL,
  tel varchar(20) NOT NULL,
  adresse varchar(128) DEFAULT NULL,
  email varchar(70) NOT NULL,
  pass varchar(70) DEFAULT NULL,
  primary key(id)
) ENGINE=InnoDB  ;
--
-- Déchargement des données de la table `users`
--

INSERT INTO users (id, username, tel, adresse,email,pass) VALUES
(1, 'steve', '0684753214', 'Place de la barbacane ', 'stevizou@g.com', '9ce5770b3bb4b2a1d59be2d97e34379cd192299f'),
(2, 'Adrien', '0674321465', '', 'ad.dela75020@gmail.com', '4493b1a16b57a2f7a66df59c1ab825911f69562d'),
(4, 'Adrien', '0155467323', '', 'momo@yahoo.com', '52036e5a96b401419e3b870bb3859828b111afd2'),
(6, 'Adrien', '0', '', 'admin@portfolio.com', '52036e5a96b401419e3b870bb3859828b111afd2'),
(7, 'chouaki', '2147483647', '150 rue jean jaures', 'aze@azer.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(8, 'adrien', '2147483647', '12 rue jean jaurès', 'adrien.doll@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(11, 'Adrien', '0865432176', NULL, 'azerty@gmail.com', NULL),
(13, 'azerty', '0688367843', NULL, 'azerty123@gmail.com', NULL),
(14, 'Delacroix', '0765389201', NULL, 'audd@pnl.com', NULL);

--
CREATE TABLE categorie (
  id_categorie int(11) NOT NULL,
  nom_categorie varchar(128) NOT NULL,
  primary key(id_categorie)
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO categorie (id_categorie, nom_categorie) VALUES
(1, 'Voiture'),
(2, 'Accessoires'),
(3, 'Bus'),
(4, 'Camion');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE commande (
  ref_com int(11) NOT NULL,
  date_commande date NOT NULL,
  id_u int(11) NOT NULL,
  primary key(ref_com),
  foreign key(id_u) REFERENCES users(id)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE image (
  id_image int(11) NOT NULL,
  nom_image varchar(128) NOT NULL,
  primary key(id_image)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO image (id_image, nom_image) VALUES
(1, 'moteurAudi.jpg'),
(2, 'retro.jpg'),
(3, 'VolantVoiture.jpg'),
(4, 'downpipe.jpg'),
(5, 'jante.jpg'),
(6, 'pessi.jpg');

-- --------------------------------------------------------

--
-- Structure de la table panier
--
CREATE TABLE produit (
  id_produit int(11) NOT NULL,
  nom_produit varchar(128) NOT NULL,
  p_motscles varchar(280) NOT NULL,
  description varchar(255) NOT NULL,
  qteProduit int(6) NOT NULL,
  prix float NOT NULL,
  primary key(id_produit),
  id_categorie int(11) NOT NULL,
  id_image int(11) NOT NULL,
  foreign key(id_categorie) REFERENCES categorie(id_categorie),
  foreign key(id_image) REFERENCES image(id_image)
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table produit
--

INSERT INTO produit (id_produit, nom_produit, p_motscles, description, qteProduit, prix, id_categorie, id_image) VALUES
(1, 'Moteur de Voiture Audi A3', 'Moteur;Voiture;Audi;A3;', 'Ceci est un moteur blablabla ', 1, 799, 1, 1),
(2, 'Rétroviseur Renault ', '', 'Rétroviseur de la marque Renault avec une tes grande flexibilité ', 100, 39, 2, 2),
(4, 'Volant GT sport +', 'volant, voiture, sport', 'Un volant en carbone de wish qui pèse environ 361 kg ce qui va te donner l\'impression de conduire un camtar', 200, 29, 1, 3),
(6, 'downpipe Scania V8', 'scania, camion, downpipe, V8', 'Downpipe pour Scania V8 5ème génération, idéal pour une reprogrammation moteur', 0, 299.99, 4, 4),
(7, 'jante pour bus', 'jante, bus,', 'jante en aluminium allégée', 0, 128.99, 3, 5),
(8, 'un truc qui coute cher ', 'voiture, ', 'Ce truc vaut une blinde ', 10, 1599, 2, 5);

-- --------------------------------------------------------

CREATE TABLE panier (
  id_produit int(11) NOT NULL,
  ref_com int(11) NOT NULL,
  total float DEFAULT NULL,
  PRIMARY key(id_produit,ref_com),
  foreign key(id_produit) REFERENCES produit(id_produit),
  foreign key(ref_com) REFERENCES commande(ref_com)
) ENGINE=InnoDB ;


