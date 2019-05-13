-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: final
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `booked_by` varchar(100) NOT NULL DEFAULT 'Not Booked',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (12,1,'2022-10-22','05:00 PM','3','Not Booked'),(13,1,'2015-02-11','02:30 AM','12','Not Booked'),(14,1,'2222-02-22','12:00 PM','4','Not Booked'),(15,1,'0001-12-25','12:00 AM','5','Not Booked'),(16,1,'3050-03-12','09:00 AM','1','Not Booked'),(25,1,'2020-04-27','05:00 PM','4','Not Booked'),(27,1,'2020-04-30','05:00 PM','4','Not Booked'),(28,1,'2020-05-01','05:00 PM','4','Not Booked'),(29,1,'2020-04-25','05:00 PM','4','Not Booked'),(30,1,'2020-04-28','05:00 PM','4','Not Booked'),(31,1,'2012-01-28','08:00 AM','5','Not Booked'),(32,1,'2012-01-29','08:00 AM','5','Not Booked'),(33,1,'2012-02-07','08:00 AM','5','Not Booked'),(34,1,'2012-02-01','08:00 AM','5','Not Booked'),(35,1,'2012-02-04','08:00 AM','5','Not Booked'),(36,1,'2012-02-02','08:00 AM','5','Not Booked'),(37,1,'2012-02-08','08:00 AM','5','Not Booked'),(38,1,'2012-02-06','08:00 AM','5','Not Booked'),(39,1,'2012-02-09','08:00 AM','5','Not Booked'),(40,1,'2012-01-30','08:00 AM','5','Not Booked'),(41,1,'2012-02-05','08:00 AM','5','Not Booked'),(42,1,'2012-02-03','08:00 AM','5','Not Booked');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jnadolna@csumb.edu','$2y$10$w/m17S/9rijVsjP593RyCuKu6dNSsQqf4v6i96JBCG0Jg.61cBHCK'),(2,'admin','$2y$10$w/m17S/9rijVsjP593RyCuKu6dNSsQqf4v6i96JBCG0Jg.61cBHCK');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-13 17:09:24
