-- MariaDB dump 10.19  Distrib 10.5.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: game_generator
-- ------------------------------------------------------
-- Server version	10.5.15-MariaDB-0+deb11u1

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

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `emp_id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `player_support` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'God Of War','Action-Adventure','Single Player'),(2,'God Of War Ragnarok','Action-Adventure','Single Player'),(3,'Red Dead Redemption 2','Action-Adventure','Single Player/Multiplayer'),(4,'The Witcher 3: The Wild Hunt','Action-Adventure','Single Player'),(5,'Horizon Zero Dawn','Action-Adventure','Single Player'),(6,'Horizon Fordbidden West','Action-Adventure','Single Player'),(7,'Assassin`s Creed','Action-Adventure','Single Player'),(8,'Ghost Of Tsushima','Action-Adventure','Single Player'),(9,'Days Gone','Action-Adventure','Single Player'),(10,'Far Cry','Action-Adventure','Single Player'),(11,'Grand Theft Auto V','Action-Adventure','Single Player/Multiplayer'),(12,'Elden Ring','RPG','Single Player/Multiplayer'),(13,'Fallout','RPG','Single Player/Multiplayer'),(14,'Monster Hunter: World','RPG','Single Player'),(15,'Diablo III','RPG','Single Player/Co-op'),(16,'The Sims 4','Simulation','Single Player'),(17,'Cities: Skylines','Simulation','Single Player'),(18,'Euro Truck Simulator 2','Simulation','Single Player/Multiplayer'),(19,'Forza Horison','Simulation','Single Player/Multiplayer'),(20,'PowerWash Simulator','Simulation','Single Player'),(21,'Microsoft Flight Simulator','Simulation','Single Player'),(22,'Forza Horison','Racing','Single Player/Multiplayer'),(23,'Project Cars 2','Racing','Single Player/Multiplayer'),(24,'F1','Racing/Simulation','Single Player/Multiplayer'),(25,'Asseto Corsa','Racing','Single Player/Multiplayer'),(26,'FIFA','Sports','Single Player/Multiplayer'),(27,'NBA','Sports','Single Player/Multiplayer'),(28,'Madden NFL','Sports','Single Player/Multiplayer'),(29,'NHL','Sports','Single Player/Multiplayer'),(30,'Tony Hawk`s Pro Skater','Sports','Single Player'),(31,'Apex Legends','Online Competitive','Multiplayer'),(32,'Counter Strike: Global Offensive','Online Competitive','Multiplayer'),(33,'PUBG: Battlegrounds','Online Competitive','Multiplayer'),(34,'Call Of Duty','Online Competitive','Multiplayer'),(35,'Dead By Daylight','Online Competitive','Multiplayer'),(36,'Battlefield','Online Competitive','Multiplayer'),(37,'Rust','Online Competitive','Multiplayer'),(38,'League of Legends','Online Competitive','Multiplayer'),(39,'Rocket League','Online Competitive','Multiplayer');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dumitruvlad','vladandrei03@yahoo.com','1006'),(2,'mprdn','mihaiprodan@yahoo.com','1234'),(3,'ilincap','ilincaprecupenco@yahoo.com','1234');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (1,'nfs',60,NULL),(2,'Portal 2',30,1),(3,'CS:GO',10,2),(4,'Stardew Valley',25,1);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `your_list`
--

DROP TABLE IF EXISTS `your_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `your_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `hours` int(20) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `your_list`
--

LOCK TABLES `your_list` WRITE;
/*!40000 ALTER TABLE `your_list` DISABLE KEYS */;
INSERT INTO `your_list` VALUES (1,'God Of War Ragnarok','10',70,1),(15,'The Forest ','7.5',35,3),(17,'Red Dead Redemption','10',320,1),(19,'Fornite','6',60,1),(21,'Mario Cart','8.9',39,1),(22,'FIFA 23','10',27191,2),(24,'jasjda ','dsaj',21,1),(25,'laie','2',20,1),(26,'ccc','111',2222,1);
/*!40000 ALTER TABLE `your_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-12 20:24:35
