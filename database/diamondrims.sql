-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 05 fév. 2020 à 16:32
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `diamondrims`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `BRAND_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BRAND_NAME` varchar(50) NOT NULL,
  `BRAND_DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`BRAND_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`BRAND_ID`, `BRAND_NAME`, `BRAND_DESCRIPTION`) VALUES
(1, 'Abarth', 'Abarth & C. SpA est une société fondée le 31 mars 1949 à Turin par Carlo Abarth. Né Karl Abarth à Vienne le 15 novembre 1908, ce dernier adoptera définitivement le prénom de Carlo après la Seconde Guerre mondiale lorsqu\'il s\'installera en Italie dans les faubourgs de Turin, à proximité des usines de Fiat et de Lancia, pour fonder sa société de préparation de voitures pour la course qui fabriquera en grande série surtout des modèles Fiat. '),
(2, 'Alfa Romeo', 'Alfa Romeo est une société de construction d\'automobiles italienne fondée le 24 juin 1910 à Milan2. Depuis 1986, ce constructeur automobile fait partie du groupe Fiat SpA et constitue depuis février 2007 une division de Fiat Group Automobiles SpA qui regroupe toutes les marques automobiles du groupe Fiat Chrysler Automobiles3. Il était auparavant la propriété de l\'État italien, à travers sa holding publique IRI, de 1933 à 1986. '),
(3, 'Alpine', 'Alpine (Société des automobiles Alpine SAS) est un constructeur automobile français, propriété du groupe Renault. La société a été créée à Dieppe, en Normandie, en 1955 par Jean Rédélé, à l\'époque concessionnaire Renault. Il fit une percée remarquable dans le secteur des automobiles sportives. Dix-sept ans après la fin de la production du dernier modèle Alpine, l\'A610, Carlos Ghosn, P-DG de Renault, annonce le 5 novembre 2012 la renaissance d\'Alpine.'),
(4, 'Aston Martin', 'Aston Martin est une marque anglaise de voitures de luxe et de course, créée en 1913 par Lionel Martin et Robert Bamford. Basée à Gaydon, dans le Warwickshire (Angleterre), elle est une filiale de Prodrive depuis 2007. Le nom vient du fait que Lionel Martin avait créé une voiture qui remporta la course d\'Aston Clinton, dont il fut vainqueur en 19143. La fusion des deux noms « Aston » et « Martin » donna donc le nom de la marque. L\'emblème ailé, introduit en 1932 par Sammy Davis, un ancien pilote de la marque Bentley, a pour origine le dieu égyptien Khépri, symbolisé par un scarabée4. '),
(5, 'Bentley', 'Bentley est un constructeur d\'automobiles de luxe et de course basé en Angleterre à Crewe, fondé par Walter Owen Bentley le 18 janvier 1919. Depuis 1998, la société fait partie du groupe allemand Volkswagen. '),
(6, 'BMW', 'BMW (ou Bayerische Motoren Werke en allemand, littéralement « Manufacture bavaroise de moteurs »), est un constructeur allemand d\'automobiles haut-de-gamme, sportives et luxueuses et de motos, après avoir été un grand constructeur de moteurs d\'avions. L\'entreprise a été fondée en 1916 par Gustav Otto et Karl Friedrich Rapp. BMW fait partie du Groupe BMW avec Mini et Rolls-Royce. '),
(7, 'Corvette', 'La Chevrolet Corvette est une famille d\'automobiles sportives, lancée le 30 juin 1953 à Flint, dans le Michigan, par la marque américaine Chevrolet. Un prototype aux lignes strictement identiques avait été présenté au début de l\'année 1953 au General Motors Motorama (en), le salon de l\'auto organisé par General Motors (1949 à 1961) dans l\'hôtel Waldorf-Astoria de New York. '),
(8, 'De Tomaso', 'De Tomaso est une société italienne de construction d\'automobiles. Elle fut fondée par l\'Argentin Alejandro de Tomaso (1928-2003) à Modène en Italie en 1959. Le logo de la marque, reprenant le signe représentant la déesse égyptienne Isis, rend hommage à la femme d\'Alejandro de Tomaso, Isabella. On avance aussi qu\'il proviendrait du signe dont il marquait ses vaches dans son ancien ranch aux États-Unis. À l\'origine, De Tomaso produit différents prototypes de voitures de course, dont une Formule 1 pour l\'équipe de Frank Williams en 1970.  '),
(9, 'Ferrari ', 'Ferrari S.p.A. est un constructeur automobile italien installé à Maranello en Italie, fondée par Enzo Ferrari en 1947. L\'histoire de Ferrari est indissociable de celle de la Scuderia Ferrari, écurie automobile évoluant en Sport-prototypes tout comme en grand tourisme – et plus tard en Formule 1 – depuis 1929, avec laquelle le constructeur a connu ses plus grands succès. Forte de son expérience en compétition, la marque au « cheval cabré » (« cavallino rampante ») y puise les techniques équipant ses modèles de série, comme en attestent les Ferrari 288 GTO, F50 ou encore Enzo, modèles aux performances exceptionnelles. '),
(10, 'Ford', 'Ford (officiellement Ford Motor Company ou FMC) est un constructeur automobile américain, basé à Dearborn, une banlieue de la ville de Détroit, dans le Michigan '),
(11, 'Hummer ', 'Hummer est un constructeur automobile américain appartenant au groupe automobile General Motors (GM). Hummer fabrique une série de véhicules utilitaires sportifs dérivée du véhicule tout-terrain militaire Humvee. Après les déboires financiers de GM en 2008, la marque a été mise en vente1 en 2009 puis fermée en 2010. En 2020, GMC relance la marque avec un Hummer électrique. '),
(12, 'Jaguar ', 'Jaguar, de son nom officiel « Jaguar Cars Ltd », est une marque automobile anglaise connue pour ses voitures de luxe et ses modèles sportifs, détenue depuis 2008 par le constructeur indien Tata Motors, au sein de Jaguar Land Rover. Les ventes en 2013 s\'élèvent à 76 668 unités, en augmentation de 42 % par rapport à 2012. La croissance la plus importante se constate en Allemagne, en Inde et aux États-Unis1. '),
(13, 'Lamborghini ', 'Lamborghini est un constructeur automobile fondé en 1963 par l\'industriel Ferruccio Lamborghini et installé à Sant\'Agata Bolognese en Italie. L\'entreprise est d\'abord spécialisée dans la construction de tracteurs agricoles destinés à répondre à une demande croissante d\'une Italie dévastée par la guerre et en pleine reconstruction. '),
(14, 'Lotus ', 'Lotus Cars est un constructeur automobile anglais spécialisé dans les voitures de sport et de compétition. Lotus sous-traite également de l\'ingénierie automobile pour des constructeurs généralistes désirant améliorer leurs voitures ou créer des modèles sportifs. Lotus était le surnom donné par Colin Chapman, le fondateur de Lotus, à son épouse.'),
(15, 'Maserati ', 'Maserati est un constructeur automobile italien filiale du groupe Fiat-Chrysler spécialisé dans les voitures de luxe, de sport et de course. Fondé par les frères Maserati en 1914, son symbole est un trident, inspiré de la fontaine de Neptune de Bologne. '),
(16, 'Mclaren ', 'McLaren Automotive est un constructeur automobile anglais créé en 1989, branche du McLaren Technology Group, spécialisé dans la conception de voitures de sport d\'élite. La société a été fondée par l\'homme d\'affaires britannique Ron Dennis, qui en fut également le dirigeant. '),
(17, 'Porsche ', 'Porsche est un constructeur d\'automobiles de sport allemand. La société fut fondée en 1931 par Ferdinand Porsche, puis reprise par son fils Ferry Porsche. Ferdinand Porsche est l\'ingénieur qui créa la première Volkswagen. Les principales usines du constructeur, situées à Leipzig et à Zuffenhausen, en Allemagne, comptaient plus de 17 000 salariés en 2012.'),
(18, 'Rolls Royce', 'Rolls-Royce Motor Cars est un constructeur d\'automobiles de luxe anglais créé en 1998 après le rachat par le Groupe BMW des droits à produire les automobiles Rolls-Royce de Rolls-Royce Motors. L\'entreprise est située en Angleterre à Goodwood, dans le West Sussex, non loin du circuit historique de Goodwood. 65 % des Rolls-Royce produites par le constructeur sont toujours sur la route. '),
(19, 'Shelby ', 'Shelby-American Inc. est une marque et ancienne écurie automobile américaine fondée par l\'ancien pilote Carroll Shelby spécialisé dans la modification de modèles Ford et en particulier de la Ford Mustang (équivalent de la concession Abarth pour exemple). La marque deviendra célèbre à partir de 1962 avec l\'AC Cobra, un dérivé musclé de la petite anglaise AC Bristol, et finira d\'asseoir sa notoriété grandissante avec la Shelby GT 350 ainsi que la Shelby GT 500, faisant de son nom une légende. '),
(20, 'Tesla ', 'Tesla, Inc., initialement appelé Tesla Motors jusqu\'au 1er février 20173, est un constructeur automobile de voitures électriques dont le siège social se situe à Palo Alto, en Californie, dans la Silicon Valley, aux États-Unis. L\'entreprise a été fondée en 2003 par Martin Eberhard et Marc Tarpenning et son personnage principal ainsi qu\'actuel patron est Elon Musk. Elle tient son nom de l\'inventeur Nikola Tesla. La mission de Tesla est « d’accélérer la transition mondiale vers un schéma énergétique durable »4, notamment en stimulant la compétitivité automobile dans le secteur électrique. La marque se distingue par les performances ainsi que le nombre de technologies embarquées de ses véhicules (pilotage automatique, mode de défense contre les armes biochimiques, etc.). La berline familiale Model S est actuellement le véhicule électrique de production à l\'accélération la plus rapide au monde. ');

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `CAR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CAR_MILAGE` int(11) NOT NULL,
  `CAR_COLOR` varchar(50) NOT NULL,
  `CAR_PRICE` int(11) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `MODEL_ID` int(11) NOT NULL,
  PRIMARY KEY (`CAR_ID`),
  KEY `Car_Model_FK` (`MODEL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `MODEL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODEL_NAME` varchar(50) NOT NULL,
  `MODEL_HORSE_POWER` int(11) NOT NULL,
  `MODEL_DESCRIPTION` text NOT NULL,
  `BRAND_ID` int(11) NOT NULL,
  PRIMARY KEY (`MODEL_ID`),
  KEY `Model_Brand_FK` (`BRAND_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`MODEL_ID`, `MODEL_NAME`, `MODEL_HORSE_POWER`, `MODEL_DESCRIPTION`, `BRAND_ID`) VALUES
(1, '124 Spider', 170, 'La Fiat 124 Spider est un roadster produit par Fiat, à partir du projet commun développé avec le constructeur japonais Mazda. Elle partage sa plateforme avec la Mazda MX-5 mais dispose d\'une carrosserie et de motorisations spécifiques1. Elle a été présentée en avant première le 18 novembre 20152 puis officiellement au Salon de Los Angeles en novembre 20153 et est lancée de juillet 2016 à fin 2019. Sa ligne s\'inspire de celle de son ancêtre, la Fiat 124 Sport Spider de 1966. ', 1),
(2, '695', 180, 'Il s\'agit d\'une série spéciale, créée dans le seul but d\'évoquer la glorieuse élaboration extrême de la fameuse Fiat 500 Abarth des années 1950 appelée « 695 ». Chaque exemplaire de cette fuoriserie doit être réservée on-line sur le site officiel dans la section spéciale Abarth Specialties. Les caractéristiques pariculières de ce modèle sont : moteur Fiat 1.4 Turbo T-Jet dont la puissance a été portée à 180 ch à 5 750 tr/min équipé d\'un turbocompresseur Garrett GT 1446, injecteurs spécifiques, système d\'échappement à quatre terminaux Record Monza (regroupés en deux terminaux sur l\'Edizione Maserati qui prennent le nom de Record Modena), freins Brembo avec disques ventilés augmentés : ø 305 × 28 mm à l\'avant et ø 264 × 22 mm à l\'arrière, suspensions Koni avec soupape FSD, commandes de boîte de vitesses robotisée MTA au volant, jantes en alliage de 17\" et pneumatiques Pirelli PZero 205/40. L\'habitacle reçoit des habillages en matériaux de haute qualité dont la fibre de carbone. ', 1),
(3, '8C Competizione', 450, 'L\'Alfa Romeo 8C Competizione est une voiture de sport produite par le constructeur automobile italien Alfa Romeo. Elle a d\'abord été présentée en 2003 comme un concept car au salon de l\'automobile de Francfort puis à Paris en 2006 en tant que modèle destiné à la vente pour 2007. ', 2),
(4, 'A110', 292, 'L\'A110 est un coupé sportif du constructeur automobile français Alpine, présenté en mars 2017, pour une commercialisation en mars 2018. Il marque la renaissance de la marque Alpine (propriété de Renault), plus de 60 ans après sa création en 1955, et plus de 20 ans après sa disparition en 1995. L\'A110 est la seconde génération d\'Alpine à porter ce nom.', 3),
(5, 'DB11', 639, 'L\'Aston Martin DB11 est une automobile Grand Tourisme Coupé et Cabriolet 2+2 de la marque britannique Aston Martin. Elle est présentée au salon international de l\'automobile de Genève 20161 dans sa version coupé et en octobre 2017 pour la version Volante (cabriolet). ', 4),
(6, 'Vantage GT8', 446, 'En 2016, Aston Martin lance une édition spéciale de sa V8 Vantage. Appelée GT8, c\'est une série spéciale limitée à 150 exemplaires. De par l\'utilisation de titane, de fibre de carbone et de polycarbonate, le poids de l\'engin baisse de 100 kg. Concernant le moteur, sa cylindrée n\'évolue pas mais sa puissance passe à 446 ch soit une hausse de 10 ch. ', 4),
(7, 'Vanquish ', 570, 'La Vanquish utilise une version améliorée du moteur V12 issu de l\'assemblage de deux V6 de Ford Mondeo (datant du moment où Aston Martin appartenait à Ford) avec une puissance de 573 ch à 6 750 tr/min et un couple de 620 N·m à 5 500 tr/min. La Vanquish utilise une boîte de vitesses automatique à six rapports. Les freins sont des disques en carbone-céramique. La suspension est un sous cadre léger avant en aluminium avec moulages creux à double levier triangulé indépendante incorporant la géométrie anti-plongée, ressorts hélicoïdaux, barre anti-roulis et amortisseurs monotube adaptatifs à l\'avant et double triangulation indépendants avec anti-squat et la géométrie anti-soulèvement, ressorts hélicoïdaux, barre antiroulis et amortisseurs adaptatifs monotube à l\'arrière. Il dispose d\'un système d\'amortissement réglable en trois étapes adaptatif comprenant les modes normal, sport et course.', 4),
(8, 'One-77', 750, 'L’Aston Martin One-77 est une supercar développée par le constructeur automobile britannique Aston Martin. Dans un premier temps dénommée Aston Martin BDX, elle opte finalement pour le nom de One-77, lors de sa présentation, plutôt discrète, au Mondial de l\'automobile de Paris 2008. Seulement 77 exemplaires seront produits, d\'où l\'origine du nom1. L’Aston Martin One-77 a été commercialisée depuis fin 2009. ', 4),
(9, 'Continental GT', 650, 'La Bentley Continental GT est un coupé de luxe présenté en 2002 au Mondial de l\'automobile de Paris. Commercialisée l\'année suivante, il s\'agit de la première Bentley de l\'ère Volkswagen, se situant dans une gamme inférieure à celle de la Continental. Ce mastodonte de plus de 2,3 tonnes est mû par un moteur W12 de 6 L de cylindrée. Une version restylée (phase II) est commercialisée à partir de 2012. Après 66 000 exemplaires vendus dans le monde1, elle est remplacée en 2017 par la Bentley Continental GT II. ', 5),
(10, 'Bentayga ', 635, 'La Bentley Bentayga est présentée en Allemagne au Salon de Francfort en septembre 2015, équipée d\'un moteur essence W12 de 6 litres de cylindrée. Son nom est inspiré d’un Roque des Iles Canaries (Rocher Bentayga) et elle est présentée comme le SUV « le plus rapide, puissant, luxueux et exclusif au monde »2 par Wolfgang Dürheimer , PDG de Bentley Motors. ', 5),
(11, 'I8', 374, 'La BMW i8 est une voiture de sport coupé 2+2 hybride rechargeable de grand tourisme du constructeur automobile allemand BMW. Le concept-car BMW Vision Efficient Dynamics est présenté au salon de l\'automobile de Francfort (IAA) 2009, et la version de série lors de l\'édition 2013. Elle fait partie, avec les BMW i3 et BMW i5, de la gamme BMW i de BMW. ', 6),
(12, 'M4', 431, 'La BMW M4 est un coupé du constructeur automobile allemand BMW M du groupe BMW, commercialisée depuis 2014. Basée sur la BMW Série 4, elle s\'inscrit dans la lignée et dans la philosophie des BMW M3, avec pour vocation de remplacer la BMW série 3 coupé. ', 6),
(13, 'M8 Gran coupé', 625, 'La Série 8 Gran Coupé est un Coupé 4-portes grand tourisme produit par le constructeur automobile allemand BMW et commercialisée à partir d\'octobre 2019. Elle dérive de la seconde génération de BMW série 8 commercialisée depuis 2018. ', 6),
(14, 'C7', 659, 'La Chevrolet Corvette (C7) est une voiture de sport américaine produite par Chevrolet depuis 2013. Elle représente la 7e génération de Chevrolet Corvette, dont la production a débuté en 1953 et fait renaître le nom « Stingray » (nom anglais de la raie à éperon), désignant à l\'origine la Corvette de deuxième génération. ', 7),
(15, 'C8', 495, 'La nouvelle mouture de la Chevrolet Corvette est présentée le 18 juillet 20193. La Corvette C8 se rapproche de ses concurrentes européenne Ferrari F8 Tributo, McLaren 600LT ou Lamborghini Huracán en adoptant le même type d\'architecture technique et en abandonnant le V8 en position avant. La C8 se différencie totalement de sa prédécesseure la C7 Stingray. ', 7),
(16, 'ZR1', 765, 'En novembre 2017, Chevrolet dévoile une version exclusive de sa Corvette, la Corvette ZR1 dotée d\'un moteur V8 6.2 de 765 ch14. La Corvette ZR1 Convertible, version cabriolet de la Corvette ZR1 Coupé, est dévoilée au Salon de Los Angeles 201715. ', 7),
(17, 'Pantera', 310, 'La De Tomaso Pantera est une supercar du constructeur automobile italien De Tomaso. Présentée en 1970 lors du Salon de New York, elle est produite ensuite de 1971 à 19921. La Pantera, qui succède à la Mangusta, a été conçue par Tom Tjaarda. Contrairement au modèle précédent, qui était monté sur un châssis-poutre en acier, la Pantera possède pour la première fois dans l\'histoire de De Tomaso, un châssis monocoque, lui aussi en acier. ', 8),
(18, 'Vallelunga', 232, 'La De Tomaso Vallelunga est une voiture de sport du constructeur automobile italien De Tomaso. Construite en 53 exemplaires de 1963 à 1967, elle a été suivie par la De Tomaso Mangusta. Son nom est une référence au circuit de Vallelunga. ', 8),
(19, 'LaFerrari', 963, 'La LaFerrari (également appelée F70 ou F150 en interne)1 est une supercar du constructeur automobile italien Ferrari. Succédant à l\'Enzo, la LaFerrari est issue des travaux réalisés sur la FXX et la Millechili, avec pour objectif d\'améliorer les performances en réduisant le poids plutôt qu\'en augmentant la puissance2. C’est à sa sortie la Ferrari de route la plus puissante. ', 9),
(20, 'F430 Scuderia', 510, 'La Ferrari 430 Scuderia est une version améliorée de la berlinette F430, dans le sens d\'une plus grande efficacité sur piste, au détriment du confort. Cette berlinette5 biplace représente la volonté de Ferrari de démontrer son savoir-faire dans l\'implantation de la technologie F1 dans une voiture de production. Développée avec le concours de Michael Schumacher6, la 430 Scuderia se positionne ainsi comme une rivale directe de la Porsche 911 GT2. ', 9),
(21, '458', 570, 'La 458 Italia est une voiture de sport produite par le constructeur italien Ferrari. Les deux premiers chiffres de son nom indiquent la cylindrée du moteur et le dernier, le nombre de cylindres. Le nom « Italia », succédant à « Modena » et « Maranello », rappelle les origines géographiques de la marque. ', 9),
(22, 'Roma', 620, 'La Ferrari Roma est dévoilée le 13 novembre 2019 à Maranello en Italie. C\'est une voiture de sport coupé 2+ selon Ferrari (2 places avant + 2 places d\'appoint arrière), et elle est une concurrente de l\'Aston Martin DB11, de la McLaren GT ou encore de la Bentley Continental GT.\r\n\r\nElle est basée sur le coupé-cabriolet Portofino, avec une carrosserie et un intérieur totalement différents. La ligne est épurée et moins radicale que les dernières nouveautés du constructeur au cheval cabré (SF90 Stradale, F8 Tributo).', 9),
(23, 'F12 TDF', 780, 'La F12tdf est une variante de la F12 Berlinetta présentée dévoilée en octobre 2015, appelée ainsi en hommage à la Ferrari 250 GT qui a remporté à plusieurs reprises le Tour de France automobile dans les années 19504. Il s\'agit d\'une édition limitée produite à 799 exemplaires. Elle est dotée d\'un V12 de 780 ch lui permettant d\'accélérer de 0 à 100 km/h en 2,9 s et d\'atteindre une vitesse maximale de 340 km/h. ', 9),
(24, 'GT', 656, 'La Ford GT est une voiture de sport du constructeur automobile américain Ford produite en 2016 et sortie en 2017. Elle est la seconde voiture de sport à porter ce nom après le modèle Ford GT produit de 2005 à 2006. Ces « GT » sont les héritières des GT40 victorieuses aux 24 Heures du Mans de 1966 à 1969.', 10),
(25, 'H2', 325, 'Le Hummer H2 est le premier véhicule civil de la marque après le Hummer H1 militaire, qui s\'illustra durant la guerre du Golfe. Petit à petit, le H1 devient populaire auprès des stars d\'Hollywood comme Arnold Schwarzenegger qui posséda le sien. C\'est à partir de là que General Motors, propriétaire de la marque depuis 1998, décide de concevoir le Hummer H2, destiné à un usage familial, et non militaire. ', 11),
(26, 'F-Type', 575, 'La Jaguar F-Type est dévoilée au Mondial de l\'automobile de Paris 20121. La production a commencé en 2013 et se décline en deux versions : une cabriolet et une coupé. La Jaguar F-Type est considérée comme la digne héritière de la Jaguar type E. Elle est destinée à concurrencer la mythique Porsche 911 (991) et la très récente AMG GT de Mercedes.', 12),
(27, 'XE SV Project 8', 600, 'Le 28 juin 2017, Jaguar dévoile une version sportive de la XE nommée XE SV Project 8 motorisée par un V8 de 600 ch produite à 300 exemplaires9.La Jaguar XE SV Project 8 a établi un record sur la boucle Nord du Nürburgring (Nürburgring Nordschleife) en 7 min 21 s 23. ', 12),
(28, 'Aventador', 770, 'La Lamborghini Aventador LP700-4 (700 ch), connue en interne sous les codes « LB834 » (coupé) et « LB835 » (roadster), est une supercar développée par le constructeur automobile italien Lamborghini. Dévoilée au salon de Genève 2011, elle remplace la Lamborghini Murciélago.', 13),
(29, 'Veneno', 750, 'La Lamborghini Veneno est créée pour fêter les cinquante ans de la marque italienne Lamborghini. Seulement trois exemplaires destinés à la commercialisation et un quatrième pour le musée Lamborghini devaient initialement être produits (version coupé)1 mais la firme a finalement décidé de construire neuf véhicules de plus en version roadster2 (sans toit, même en option). ', 13),
(30, 'Huracán Performante ', 640, ' La Performante a notamment inauguré un système inédit d\'aérodynamique active « ALA » (pour « Aerodinamica Lamborghini Attiva ») permettant d\'accroître ou de réduire la traînée d\'air de la voiture en fonction de l\'utilisation (moins de résistance à l\'air lors de vitesses élevées, appui sur la roue intérieure lors d\'un virage serré, résistance à l\'air maximum en freinage). Ce système se compose d\'un spoiler avant actif ainsi que d\'un aileron arrière, actif lui aussi (système de clapets).\r\n\r\nGrâce à son moteur V10 à 90° de 5 204 cm3 développant 640 chevaux (470 kW) à 8 000 tr/min (600 Nm à 6 500 tr/min) doté des technologies MPI (Injection Multipoint) et IDS (Injection Directe Stratifiée) en position longitudinale arrière et ses quatre roues motrices (LP 640-4), la Performante est devenue pendant un temps la voiture de série la plus rapide sur un tour du circuit allemand Nürburgring en 6 min 52 s. Son rapport poids/puissance de 2,15 kg/ch ainsi que sa boîte de vitesses à double embrayage aux passages de rapports quasi instantanés explique en grande partie cet exploit. ', 13),
(31, ' Murciélago LP670-4 SV ', 670, 'La LP 670-4 SV — pour SuperVeloce — est une version ultra-sportive de la Murciélago LP. Elle est commercialisée à partir d\'octobre 20092 à seulement 350 exemplaires (dont 28 à conduite à droite). Malheureusement, seul 186 SV ont été produites par manque de commande. Son moteur V12 de 6,5 L développe 670 chevaux à 8 000 tr/min (soit 103 ch/litre) pour un couple de 660 Nm à 6 500 tr/min3.', 13),
(32, 'Evora', 436, 'La Lotus Evora est un modèle automobile du constructeur britannique Lotus. Première nouveauté de la gamme depuis plus de dix ans, la voiture est développée sous le nom de code « Project Eagle » et est lancée le 22 juillet 2008 au British International Motor Show. Héritière de la lignée des Lotus Esprit, elle a été dessinée par le designer Russell Carr. ', 14),
(33, 'Exige Sport 410 ', 416, 'L\'Exige 410 Sport est développée à partir de la 430 Cup, en version coupé et roadster. Elle reçoit le V6 3.5 compressé de 416 ch (à 7 000 tr/min) et 420 Nm de couple (3 000 à 7 000 tr/min) Elle effectue le 0 à 100 km/h en 3,3 secondes pour une vitesse maximale de 290 km/h (en coupé). ', 14),
(34, 'Evija', 2000, '\'Evija est une hypercar électrique du constructeur automobile britannique Lotus. Produite à 130 exemplaires, c\'est le premier véhicule 100 % électrique de la marque. La Lotus Evija est construite à partir d\'une monocoque en fibre de carbone pesant seulement 129 kg. Elle est équipée de portes à ouverture en élytre et de caméras de rétro-vision. ', 14),
(35, 'GranTurismo ', 460, 'La Maserati GranTurismo est une automobile Grand Tourisme du constructeur automobile italien Maserati, présentée en mars 2007 au salon international de l\'automobile de Genève. La version cabriolet GranCabrio est présentée au salon de l\'automobile de Francfort 2009. ', 15),
(36, 'Ghibli ', 410, 'La Maserati Ghibli 3 (2013) est une automobile produite par le constructeur italien Maserati. Elle a été présentée en avril 2013 lors du salon de Shanghai. Il s\'agit de la première berline Maserati de taille inférieure à la Maserati Quattroporte et équipée d\'un moteur diesel. Elle est produite dans la nouvelle usine italienne FCA Grugliasco - G. Agnelli dans la banlieue de Turin, ancienne usine du carrossier Bertone rachetée par le groupe Fiat Auto en 2009 et entièrement réaménagée', 15),
(37, 'Levante ', 590, 'La Levante a d\'abord été présentée sous forme de croquis au salon de Francfort 20151, avant d\'être officiellement présenté au salon de Genève 20162. Ses premières photos officielles ont fuité sur le Web le 19 février 20163. La Levante est fabriquée dans l\'usine Fiat-Mirafiori à Turin en Italie. En mars 2018, Maserati présente au Salon de New York la version Maserati Levante Trofeo équipée d\'un V8 3.8 biturbo de 590 ch provenant du cousin Ferrari4. ', 15),
(38, '675LT', 675, 'La McLaren 675LT est une voiture de sport de McLaren. Elle est basée sur la McLaren 650S et a été présentée sur le Salon de Genève 2015. Par rapport à la 650S le poids est de 1 328 kg (contre 1 330 kg) et la puissance a été augmenté de 25 CH à 675 CH (496 kW) et elle possède un aérodynamisme évoluée. Son 0 à 100 km/h est de 2,9 secondes et elle peut atteindre une vitesse maximale de 330 km/h.', 16),
(39, '720S', 720, 'Aux lignes très basses, la 720S dispose de portes papillons. L\'aérodynamique est très travaillée pour faire place à de grandes entrées d\'air sur les flancs et ses phares sont aussi des entrées d\'air6. Elle possède une boîte double embrayage à sept rapports et sa transmission est une propulsion avec autoblocage7. Elle est équipée de disques de freins ventilés en carbone céramique. ', 16),
(40, 'Senna', 800, 'La supercar fait partie de la gamme des Ultimate Series de McLaren, elle succède aux mythiques F1 et P1. Elle rend hommage à Ayrton Senna disparu dans un accident de Formule 1 en 19944,5. Son prix est de 930 000 € et c\'est une série limitée à 500 exemplaires qui sont tous vendus4,6 avant même sa présentation publique. ', 16),
(41, 'P1', 906, 'Profitant des cinquante ans d\'expérience de l\'écurie McLaren Racing en Formule 1, la voiture dispose d\'une technologie hybride. Elle est concurrente des Ferrari LaFerrari, Lamborghini Veneno, Bugatti Veyron, Pagani Huayra, Koenigsegg Agera et Porsche 918 Spyder. Elle succède à la McLaren F1, datant de 1992. Les spécifications finales et les détails des 375 modèles exclusifs produits sont dévoilés au Salon international de l\'automobile de Genève 2013. Son design signé Frank Stephenson est inspiré de la McLaren MP4-12C de 2011 avec des lignes plus agressives. Le châssis et la carrosserie sont en fibre de carbone.  ', 16),
(42, '918', 887, 'La Porsche 918 Spyder2 est une supercar hybride rechargeable du constructeur allemand de voitures de sport Porsche produite de 2013 à 2015. Remplaçante de la Carrera GT, la 918 est mue par un moteur thermique traditionnel V8 secondé par deux moteurs électriques.', 17),
(43, '991 GT2 RS', 700, 'Annoncée au Festival de vitesse de Goodwood en Angleterre, la Porsche 991 GT2 RS est présentée lors de l\'édition 2017 du Salon de Francfort 20176 en septembre. Elle reprend le moteur Flat-6 3.8 bi-turbo de la 911 Turbo S (580 ch) gonflé par Porsche à 700 ch à 7 000 tr/min pour un couple de 750 Nm disponible dès 2 500 tr/min. Il s\'agit, à ce jour, de la 911 la plus puissante et la plus performante produite en série par Porsche. Elle revendique 340 km/h et exécute le 0 à 100 km/h en 2,8 s7 pour un tarif de 289 175 euros.  ', 17),
(44, '911 R', 500, 'En 2016, la 911 se décline en version sportive R avec un moteur atmosphérique 4,0 L développant 500 chevaux (le même que celui de la 911 GT3 RS) et une transmission manuelle à 6 rapports. Bien qu\'apparue en 2016, elle a une carrosserie ne comportant pas les modifications présentes sur la phase 2 apparue fin 2015. En effet, sa carrosserie est celle du 991 GT3 Phase 1 auquel Porsche a retiré l\'aileron fixe pour le remplacer par celui d\'une classique Carrera. Elle est présentée en mars 2016 lors du salon de Genève, sans que sa présence n\'ait été annoncée auparavant. C\'est une série limitée à 991 exemplaires.', 17),
(45, 'Cayman GT4', 385, 'La Cayman GT4 est la déclinaison la plus sportive du Cayman, et le premier Cayman à disposer d\'une appellation en « GTx », habituellement réservée à la 911. Il a été présenté en mars 2015 au Salon de Genève2, et est en vente en France à partir de 88 310 €. À sa sortie, il est disponible uniquement avec une boîte manuelle à 6 rapports, mais le constructeur a indiqué que la boîte robotisée PDK serait proposée prochainement3. Au niveau du design extérieur et des performances, il est très proche de son « cousin » cabriolet, le Boxster Spyder. ', 17),
(46, 'Phantom VIII', 571, 'La Phantom VIII est une limousine fabriquée par le constructeur anglais Rolls-Royce Motor Cars, filiale du groupe BMW. La première mondiale de cette voiture a lieu le 27 juillet 2017. C\'est la cinquième Rolls-Royce de l\'ère BMW. ', 18),
(47, 'Ghost ', 570, 'C\'est la deuxième Rolls-Royce créée sous la direction de BMW. Reprenant le style de la Phantom, la Ghost fait néanmoins 40 centimètres de moins en longueur que celle-ci, afin de convenir à une autre type de clientèle que celle de la Phantom. À partir de 2011, une version rallongée de 17 cm est proposée. La Ghost emprunte 20 % de ses pièces à la plate-forme de la BMW F01 qui équipe la BMW Série 7. La voiture a un empattement, une hauteur de toit, une hauteur de capot et des largeurs de voies qui lui sont propres. Les pièces issues de la BMW Série 7 sont utilisées pour les parties fonctionnelles de la voiture et sont invisibles du conducteur. Le moteur est un V12 bi-turbo de 6,6 litres à injection directe avec calage variable de soupapes couplé à une boîte automatique à huit rapports. La voiture pèse 2 470 kg. ', 18),
(48, 'GT350', 526, 'The GT350 was updated for the 2019 model year. The update includes new suspension, aerodynamics, and bespoke Michelin summer tires. The updated rear wing has an optional Gurney flap, helping downforce without adding too much drag. The other aerodynamics update is out front. The GT350 now gets the grille from the GT350R, which has fewer openings, creating less front-end drag.', 19),
(49, 'GT500', 760, 'The 2020 GT500 was unveiled at the January 2019 North American International Auto Show in Detroit. It is powered by a hand-built 5.2-liter \"Predator\" aluminum-alloy V8 engine with a 2.65-liter roots-type supercharger with air-to-liquid intercooler tucked in the engine valley. It s noteworthy that this is the opposite design of most roots-type superchargers, where the intercooler is actually above the twin vorticies. The Shelby GT500 produces 760 hp and 847 Nm of torque. However, it will not arrive to the European market due to the V8 5.2 liter motor not able to comply with European road regulations, therefore it will only focus on North America and Middle Eastern countries.', 19),
(50, 'Model S', 760, 'La Model S demeure le véhicule phare de Tesla, une berline haut de gamme avec plus d\'autonomie (416 à 539 kilomètres selon la version), plus d\'accélération (0-100 km/h en aussi peu que 2,7 secondes) ainsi que plus d\'options d\'affichage et de personnalisation. Les clients ont même droit à des crédits annuels de 400 kWh aux bornes de recharge de Tesla. Livrée de série avec un rouage intégral, elle comprend maintenant des phares adaptatifs qui améliorent la visibilité dans les courbes.', 20),
(51, 'Model 3', 462, 'La Tesla Model 3 est une berline familiale haut de gamme et 100 % électrique, conçue et produite par le constructeur automobile américain Tesla, Inc. Présentée au public le 31 mars 2016, les 30 premières livraisons ont eu lieu le 28 juillet 2017 aux États-Unis. Il s\'agit du quatrième modèle de voiture commercialisé par Tesla, après la Tesla Model X. Avec son autonomie supérieure à 500 km, la Model 3 est l\'une des voitures électriques les plus performantes au monde. ', 20),
(52, 'Roadster', 1500, 'The Tesla Roadster is an upcoming all-electric battery-powered four-seater sports car made by Tesla, Inc.[1] Tesla has said it will be capable of 0 to 97 km/h (0 to 60 mph) in 1.9 seconds,[2] quicker than any street legal production car to date at its announcement in November 2017. The Roadster is the successor to Tesla\'s first production car, which was the 2008 Roadster.\r\n\r\nTesla indicates that Roadster sales will begin in 2020, although not before the Tesla Model Y goes on sale. Tesla CEO Elon Musk has said that higher-performance trim levels will be available beyond the base specifications, including a model with about 10 cold gas thrusters.', 20);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `PICTURE_ID` varchar(50) NOT NULL,
  `PICTURE_NUM` int(11) NOT NULL,
  `PICTURE_DESCTIPTION` text NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  PRIMARY KEY (`PICTURE_ID`),
  KEY `PICTURE_Car_FK` (`CAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `Car_Model_FK` FOREIGN KEY (`MODEL_ID`) REFERENCES `model` (`MODEL_ID`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `Model_Brand_FK` FOREIGN KEY (`BRAND_ID`) REFERENCES `brand` (`BRAND_ID`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `PICTURE_Car_FK` FOREIGN KEY (`CAR_ID`) REFERENCES `car` (`CAR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
