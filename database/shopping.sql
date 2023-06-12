-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: shopping
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB-3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE IF NOT EXISTS `shopping` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shopping`;
--
-- Table structure for table `Admin_Master`
--

DROP TABLE IF EXISTS `Admin_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin_Master` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin_Master`
--

LOCK TABLES `Admin_Master` WRITE;
/*!40000 ALTER TABLE `Admin_Master` DISABLE KEYS */;
INSERT INTO `Admin_Master` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `Admin_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Category_Master`
--

DROP TABLE IF EXISTS `Category_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category_Master` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category_Master`
--

LOCK TABLES `Category_Master` WRITE;
/*!40000 ALTER TABLE `Category_Master` DISABLE KEYS */;
INSERT INTO `Category_Master` VALUES (1,'Jeans','Fine Denim Jeans to wear','Jeans.jpg'),(3,'Shirts','New Branded Cotton shirts','1594.jpg'),(4,'T-Shirts','Cool T-Shirts Sporty Look','images.jpg');
/*!40000 ALTER TABLE `Category_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customer_Registration`
--

DROP TABLE IF EXISTS `Customer_Registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customer_Registration` (
  `CustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(200) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customer_Registration`
--

LOCK TABLES `Customer_Registration` WRITE;
/*!40000 ALTER TABLE `Customer_Registration` DISABLE KEYS */;
INSERT INTO `Customer_Registration` VALUES (1,'test','test','test','test@gmail.com',987654321,'male','0000-00-00','test','test');
/*!40000 ALTER TABLE `Customer_Registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Feedback_Master`
--

DROP TABLE IF EXISTS `Feedback_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Feedback_Master` (
  `FeedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`FeedbackId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Feedback_Master`
--

LOCK TABLES `Feedback_Master` WRITE;
/*!40000 ALTER TABLE `Feedback_Master` DISABLE KEYS */;
INSERT INTO `Feedback_Master` VALUES (1,1,'fwefwe'),(2,1,'shop lam an nhu concac');
/*!40000 ALTER TABLE `Feedback_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Item_Master`
--

DROP TABLE IF EXISTS `Item_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Item_Master` (
  `ItemId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `ItemName` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Item_Master`
--

LOCK TABLES `Item_Master` WRITE;
/*!40000 ALTER TABLE `Item_Master` DISABLE KEYS */;
INSERT INTO `Item_Master` VALUES (1,1,'test','test','10','meme.jpeg',10,10,10),(2,1,'test1','test1','10','polyglot.jpg',10,10,10),(3,6,'Toanbo-Leg','Chan Toanbo','100','',100,10,90),(4,8,'aaaaaa','bbbbbb','100','',100,10,34343);
/*!40000 ALTER TABLE `Item_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Offer_Master`
--

DROP TABLE IF EXISTS `Offer_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Offer_Master` (
  `OfferId` int(11) NOT NULL AUTO_INCREMENT,
  `Offer` varchar(500) NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Valid` date NOT NULL,
  PRIMARY KEY (`OfferId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Offer_Master`
--

LOCK TABLES `Offer_Master` WRITE;
/*!40000 ALTER TABLE `Offer_Master` DISABLE KEYS */;
INSERT INTO `Offer_Master` VALUES (1,'test','test','0000-00-00'),(2,'Buy 2 Get 1 Free','On a Purchase of 2 Branded Shirt Get 1 Tshirt Free ','2020-10-07');
/*!40000 ALTER TABLE `Offer_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shopping_Cart`
--

DROP TABLE IF EXISTS `Shopping_Cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shopping_Cart` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `ItemName` varchar(200) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shopping_Cart`
--

LOCK TABLES `Shopping_Cart` WRITE;
/*!40000 ALTER TABLE `Shopping_Cart` DISABLE KEYS */;
INSERT INTO `Shopping_Cart` VALUES (5,1,'Toanbo-Leg',1,90,90);
/*!40000 ALTER TABLE `Shopping_Cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shopping_Cart_Final`
--

DROP TABLE IF EXISTS `Shopping_Cart_Final`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shopping_Cart_Final` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `ItemName` varchar(200) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shopping_Cart_Final`
--

LOCK TABLES `Shopping_Cart_Final` WRITE;
/*!40000 ALTER TABLE `Shopping_Cart_Final` DISABLE KEYS */;
INSERT INTO `Shopping_Cart_Final` VALUES (1,1,'test1',1,10,10),(2,1,'test',1,10,10);
/*!40000 ALTER TABLE `Shopping_Cart_Final` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-30  9:02:36
