--
-- Structure of the `brand` table 
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `BRAND_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BRAND_NAME` varchar(50) NOT NULL,
  `BRAND_DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`BRAND_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure of the `car` table 
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

--
-- Constraints for the `car` table
--
ALTER TABLE `car`
  ADD CONSTRAINT `Car_Model_FK` FOREIGN KEY (`MODEL_ID`) REFERENCES `model` (`MODEL_ID`);

-- --------------------------------------------------------

--
-- Structure of the `model` table
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
-- Constraints for the `model` table
--
ALTER TABLE `model`
  ADD CONSTRAINT `Model_Brand_FK` FOREIGN KEY (`BRAND_ID`) REFERENCES `brand` (`BRAND_ID`);

-- --------------------------------------------------------

--
-- Structure of the `picture` table
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
-- Constraints for the `picture` table
--
ALTER TABLE `picture`
  ADD CONSTRAINT `PICTURE_Car_FK` FOREIGN KEY (`CAR_ID`) REFERENCES `car` (`CAR_ID`);
COMMIT;
