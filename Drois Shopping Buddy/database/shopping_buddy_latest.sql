-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: shopping_buddy
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `idadministrator` varchar(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  PRIMARY KEY (`idadministrator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES ('ddev','hero','boi','$2y$10$dFANOHYW3e6jeML8BbY2quhaTSh6Iic8I/6bh1bvvc3XR6/OEO3wy','hero@boi.com',1);
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `idcustomer` varchar(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('chuchu','Chuchu','Pongi','$2y$10$QpdBs8E72RGpxW6SSPTt0.P/CBk3DBDAsxRzuHN2sZmUsRR1yO51K','chuch@don.com',0),('Darwin','Darwin','Chaudhary','$2y$10$RlXlmC7qfWDljk03vYjjKuHS480BTYBNSW1ytWBu7.cwpEOr3opNq','darwinchoudhary2001@gmail.com',1),('dev','dev','dev','$2y$10$ZUa.nNgOtQrD4OZlBJnx3ezQkGH73esMe2YGcd7GPrxq/Z03k9dRy','dev@gmail.com',1),('Username','FirstName','LastName','$2y$10$Qeese8mRH1IqBhatcWB2tuG1vzuQYlrB0KmTeAS2LwMj6NrhJ0z2q','darwinchoudhary@gmail.com',1);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `iddelivery` int(11) NOT NULL AUTO_INCREMENT,
  `idOrder` int(11) NOT NULL,
  `idDriver` varchar(45) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  PRIMARY KEY (`iddelivery`),
  KEY `fk_order2` (`idOrder`),
  KEY `fk_driver1` (`idDriver`),
  CONSTRAINT `fk_driver1` FOREIGN KEY (`idDriver`) REFERENCES `driver` (`iddriver`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order2` FOREIGN KEY (`idOrder`) REFERENCES `order` (`idorder`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (1,4,'abdullah','309 Avery House'),(2,5,'abdullah','hanuman mandir'),(3,6,'abdullah','Brown House '),(4,7,NULL,'Chand Pe');
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver` (
  `iddriver` varchar(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddriver`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` VALUES ('abdullah','abdullah','chutiya','$2y$10$PYWXU6butNlk3lHcOjoX5uKujXreYm0iZ/Z5lMhENhYffg9kmjJgi','a@chutiya.com',1);
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(45) DEFAULT NULL,
  `itemPrice` decimal(5,2) DEFAULT NULL,
  `storeNumber` varchar(45) NOT NULL,
  `imageExt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iditem`),
  KEY `fk_store_number` (`storeNumber`),
  CONSTRAINT `fk_store_number` FOREIGN KEY (`storeNumber`) REFERENCES `store` (`idstore`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (11,'CyberPunk 2077',69.99,'1','jpg'),(12,'DualShock 4',39.99,'2','jpg'),(14,'Ps4',230.00,'3','jpg'),(15,'Ps5',400.00,'1','jpg'),(16,'Toilet Roll',20.00,'1','jpg'),(17,'Xbox s Controller',59.99,'1','jpg');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `idorder` int(11) NOT NULL,
  `idCust` varchar(45) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idorder`,`idItem`),
  KEY `fk_cust1` (`idCust`),
  KEY `fk_item20` (`idItem`),
  CONSTRAINT `fk_cust1` FOREIGN KEY (`idCust`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item20` FOREIGN KEY (`idItem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (6,'chuchu',14),(6,'chuchu',15),(6,'chuchu',17),(1,'Darwin',12),(1,'Darwin',14),(1,'Darwin',15),(1,'Darwin',16),(1,'Darwin',17),(2,'Darwin',11),(2,'Darwin',12),(3,'Darwin',11),(3,'Darwin',12),(4,'Darwin',11),(4,'Darwin',12),(5,'Darwin',11),(5,'Darwin',12),(7,'Darwin',14),(7,'Darwin',15);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store` (
  `idstore` varchar(45) NOT NULL,
  `storeName` varchar(45) DEFAULT NULL,
  `storeManager` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstore`),
  KEY `fk1` (`storeManager`),
  CONSTRAINT `fk1` FOREIGN KEY (`storeManager`) REFERENCES `storemanager` (`idstoreManager`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES ('1','Tesco',NULL),('2','Dunnes',NULL),('3','Lidl',NULL);
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storemanager`
--

DROP TABLE IF EXISTS `storemanager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storemanager` (
  `idstoreManager` varchar(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  PRIMARY KEY (`idstoreManager`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storemanager`
--

LOCK TABLES `storemanager` WRITE;
/*!40000 ALTER TABLE `storemanager` DISABLE KEYS */;
INSERT INTO `storemanager` VALUES ('hey','store','manager','$2y$10$ifzhM.X8mml0DRHWF07JY.EK5qPdLxXVAbcvJjpSAUo1eIFDv59eC','store@gmail.com',1);
/*!40000 ALTER TABLE `storemanager` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-19 23:50:25
