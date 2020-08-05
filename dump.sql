-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: fortests
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `text` text,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Ovi','Hello World','2020-08-04 23:53:43','2020-08-04 23:53:43'),(2,'Vi','theuhu\r\n','2020-08-05 01:53:25','2020-08-05 01:53:25'),(3,'Vi','theuhu\r\n','2020-08-05 02:00:25','2020-08-05 02:00:25'),(4,'Vi','theuhu\r\n','2020-08-05 02:02:02','2020-08-05 02:02:02'),(5,'New','aotuheseu\r\n','2020-08-05 07:24:27','2020-08-05 07:24:27'),(6,'New','aotuheseu\r\n','2020-08-05 07:27:38','2020-08-05 07:27:38'),(7,'Ovi','Test','2020-08-05 07:33:54','2020-08-05 07:33:54'),(8,'Ovi','Test','2020-08-05 07:34:01','2020-08-05 07:34:01'),(9,'Ovi','Test','2020-08-05 07:40:39','2020-08-05 07:40:39'),(10,'Ovi','Test','2020-08-05 07:41:51','2020-08-05 07:41:51'),(11,'Ovi','Test','2020-08-05 07:43:42','2020-08-05 07:43:42'),(12,'aoeu','aoeu','2020-08-05 07:44:11','2020-08-05 07:44:11'),(13,'aoeu','aoeu','2020-08-05 07:46:45','2020-08-05 07:46:45'),(14,'aoeu','aoeu','2020-08-05 07:47:46','2020-08-05 07:47:46'),(15,'aoeu','aoeu','2020-08-05 07:48:09','2020-08-05 07:48:09'),(16,'AOEAO','AEOAOE','2020-08-05 07:50:45','2020-08-05 07:50:45'),(17,'AOEAO','AEOAOE','2020-08-05 07:50:54','2020-08-05 07:50:54'),(18,'aoeua','aoeu','2020-08-05 07:52:08','2020-08-05 07:52:08'),(19,'aaoeeu','euaoeu','2020-08-05 07:53:43','2020-08-05 07:53:43'),(20,'aaoeeu','euaoeu','2020-08-05 07:56:21','2020-08-05 07:56:21'),(21,'oaeuoe','aoeu','2020-08-05 07:56:38','2020-08-05 07:56:38'),(22,'aoeu','euoaoeu','2020-08-05 07:58:18','2020-08-05 07:58:18'),(23,'aoeu','aoeu','2020-08-05 08:00:21','2020-08-05 08:00:21'),(24,'aoeu','aoeut seems like something about the way we\'re using the bootstrap menus is triggering a console error (Empty string passed to getElementById) in Firefox whenever the user interacts with the page. Taking out all the dropdown menus fixes the issue (after applying the fix for bug 1333422, which also causes this warning)\r','2020-08-05 08:02:18','2020-08-05 08:02:18'),(25,'gdfhdthd','t seems like something about the way we\'re using the bootstrap menus is triggering a console error (Empty string passed to getElementById) in Firefox whenever the user interacts with the page. Taking ','2020-08-05 08:09:06','2020-08-05 08:09:06'),(26,'gdfhdthd','t seems like something about the way we\'re using the bootstrap menus is triggering a console error (Empty string passed to getElementById) in Firefox whenever the user interacts with the page. Taking ','2020-08-05 08:09:06','2020-08-05 08:09:06'),(27,'gdfhdthd','t seems like something about the way we\'re using the bootstrap menus is triggering a console error (Empty string passed to getElementById) in Firefox whenever the user interacts with the page. Taking t seems like something about the way we\'re using the bootstrap menus is triggering a console error (Empty string passed to getElementById) in Firefox whenever the user interacts with the page. Taking out all the dropdown menus fixes the issue (after applying the fix for bug 1333422, which also causes this warning)\r\n\r\nOstensibly this used to be a problem with bootstrap but is now fixed (supposedly): https://github.com/twbs/bootstrap/issues/5566\r\n\r\nSwapping things to use Angular bootstrap\'s dropdown directives also seems to fix the issue, but breaks the &quot;checkbox&quot; (tier, repository) menus. http://angular-ui.github.io/bootstrap/#/dropdown\r\n\r\nIt\'s unclear to me what the root cause is here: whether it\'s bootstrap, angular, or some interaction between the two. I can\'t really justify spending any more time on this right now, but it would be nice to fix this at some point as the error frequently causes people to misdiagnose problems.','2020-08-05 08:11:07','2020-08-05 08:11:07');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-05  9:11:09
