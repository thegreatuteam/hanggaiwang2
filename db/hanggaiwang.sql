-- MySQL dump 10.13  Distrib 5.6.23, for Win32 (x86)
--
-- Host: localhost    Database: hanggaiwang
-- ------------------------------------------------------
-- Server version	5.6.23-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'liuxin','469931f010c83aac43d30a2fb4e23c34d694c343');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homework`
--

DROP TABLE IF EXISTS `homework`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(10) NOT NULL,
  `question` varchar(50) NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `answer` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homework`
--

LOCK TABLES `homework` WRITE;
/*!40000 ALTER TABLE `homework` DISABLE KEYS */;
INSERT INTO `homework` VALUES (1,1,'1','A','B','C','D','A'),(2,2,'2','A','B','C','D','BCD'),(3,3,'3','A','B','C','D','B'),(4,4,'4','A','B','C','D','B'),(5,5,'5','A','B','C','D','AB'),(6,6,'6','A','B','C','D','CD'),(7,7,'7','A','B','C','D','C'),(8,8,'8','A','B','C','D','C'),(9,9,'9','A','B','C','D','AD'),(10,10,'10','A','B','C','D','D'),(11,11,'11','A','B','C','D','D'),(12,12,'12','A','B','C','D','C'),(13,13,'13','A','B','C','D','AC'),(14,14,'14','A','B','C','D','B'),(15,15,'15','A','B','C','D','ABD'),(16,16,'16','A','B','C','D','A'),(17,17,'17','A','B','C','D','BD'),(18,18,'18','A','B','C','D','A'),(19,19,'19','A','B','C','D','ACD'),(20,20,'20','A','B','C','D','D');
/*!40000 ALTER TABLE `homework` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hwscore`
--

DROP TABLE IF EXISTS `hwscore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hwscore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teachernumber` int(10) NOT NULL,
  `classnumber` int(10) NOT NULL,
  `score` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hwscore`
--

LOCK TABLES `hwscore` WRITE;
/*!40000 ALTER TABLE `hwscore` DISABLE KEYS */;
INSERT INTO `hwscore` VALUES (10,12345678,1111,NULL),(11,12345678,1111,'null'),(12,12345678,1111,NULL),(14,12345678,1111,'null'),(15,12345678,1111,'null'),(16,12345678,1111,'[[],{\"name\":\"姚璐\",\"snumber\":\"14051001\",\"score\":1},{\"name\":\"刘昕\",\"snumber\":\"14051028\",\"score\":1},{\"name\":\"朱诗慧\",\"snumber\":\"14051003\",\"score\":1}]'),(22,12345678,1111,NULL),(23,12345678,1111,'[[],{\"name\":\"姚璐\",\"snumber\":\"14051001\",\"score\":0},{\"name\":\"朱诗慧\",\"snumber\":\"14051003\",\"score\":0},{\"name\":\"刘昕\",\"snumber\":\"14051028\",\"score\":0}]'),(24,12345678,1111,'[[],{\"name\":\"朱诗慧\",\"snumber\":\"14051003\",\"score\":1},{\"name\":\"刘昕\",\"snumber\":\"14051028\",\"score\":1},{\"name\":\"姚璐\",\"snumber\":\"14051001\",\"score\":3}]'),(25,12345678,1111,NULL),(26,12345678,1111,NULL);
/*!40000 ALTER TABLE `hwscore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sethw`
--

DROP TABLE IF EXISTS `sethw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sethw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(10) NOT NULL,
  `chapter` varchar(10) NOT NULL,
  `ksdate` date NOT NULL,
  `jsdate` date NOT NULL,
  `teachernumber` int(10) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `indexx` int(11) DEFAULT NULL,
  `danxmin` int(10) NOT NULL,
  `danxmax` int(10) NOT NULL,
  `duoxmin` int(10) NOT NULL,
  `duoxmax` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sethw_hwscore` (`indexx`),
  CONSTRAINT `FK_sethw_hwscore` FOREIGN KEY (`indexx`) REFERENCES `hwscore` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sethw`
--

LOCK TABLES `sethw` WRITE;
/*!40000 ALTER TABLE `sethw` DISABLE KEYS */;
INSERT INTO `sethw` VALUES (7,1111,'chapter1','2016-02-01','2016-02-16',12345678,'2016-02-18 13:31:29',10,0,0,0,0),(9,1111,'chapter2','2016-01-01','2016-01-27',12345678,'2016-02-18 13:45:56',12,0,0,0,0),(13,1111,'chapter4','2016-02-01','2016-02-29',12345678,'2016-02-20 12:04:39',16,0,0,0,0),(18,1111,'chapter5','2016-03-01','2016-03-15',12345678,'2016-02-23 23:28:36',22,0,0,0,0),(19,1111,'chapter3','2016-02-15','2016-02-29',12345678,'2016-02-23 23:40:04',23,0,0,0,0),(20,1111,'chapter4','2016-02-18','2016-03-10',12345678,'2016-02-23 23:41:44',24,0,0,0,0),(21,1111,'chapter1','2016-02-15','2016-03-01',12345678,'2016-02-24 10:05:10',25,0,0,0,0),(22,1111,'chapter4','2016-02-18','2016-03-15',12345678,'2016-02-24 10:07:50',26,0,0,0,0);
/*!40000 ALTER TABLE `sethw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `classnumber` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'',1111,12345678,'7c4a8d09ca3762af61e59520943dc26494f8941b','2016-02-15 11:10:51');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(10) NOT NULL,
  `question` varchar(150) NOT NULL DEFAULT 'C5',
  `a` varchar(50) NOT NULL DEFAULT 'A',
  `b` varchar(50) NOT NULL DEFAULT 'B',
  `c` varchar(50) NOT NULL DEFAULT 'C',
  `d` varchar(50) NOT NULL DEFAULT 'D',
  `answer` varchar(50) NOT NULL DEFAULT 'A',
  `score` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,1,'2013年6月，“神州”10号飞船发射成功，宇航员王亚军在太空进行了中国首次______。','A 太空行走','B 太空对接','C 太空授课','D 太空实验','C',1),(2,2,'_______年“神州”9号飞船将中国第一位女宇航员刘洋送入太空。','A 2009','B 2010','C 2011','D 2012','D',1),(3,3,'2011年11月“天宫”1号目标飞行器和_______飞船进行了首次空间无人交会对接，标志着中国突破了空间交会对接及组合体运行第一系列关键技术。','A“神州”7号','B “神州”8号','C“神州”9号','D“神州”10号','B',1),(4,4,'中国首颗数据中继卫星“天链”1号于_______年发射成功。','A 2007','B 2008','C 2009','D 2010','B',1),(5,5,'2008年9月25日，“神州”7号飞船在酒泉卫星发射中心发射升空，9月27日，航天员_______首次进行出舱活动，成为中国太空行走第一人。','A 聂海胜','B 费俊龙','C 景海鹏','D 翟志刚','D',1),(6,6,'2005年10月12日“神州”6号飞船发射成功，飞船搭载两名航天员______在太空飞行了5天时间。','A 杨利伟','B 聂海胜','C 费俊龙','D 翟志刚','BC',2),(7,7,'2008年9月25日，“神州”7号飞船搭载______在酒泉卫星发射中心发射升空。','A 景海鹏','B 费俊龙','C 刘伯明','D 翟志刚','ACD',2),(8,8,'中国2003年启动了名为“嫦娥”工程的月球探测计划，该计划分为______几个阶段实施。','A 发射环绕月球的卫星','B 发射月球探测器','C 载人登月','D 送机器人上月球并建立观测站','ABD',2),(9,9,'2008年11月28日，中国首架自主知识产权的涡扇支线客机______上海成功首飞。','A 运10','B 小鹰500','C ARJ21-700','D K8','C',1),(10,10,'“嫦娥”1号月球探测卫星是由_______运载火箭发射的。','A 长征”2号E','B 长征”2号F','C 长征”3号甲','D 长征”4号乙','C',1),(11,11,'中国于______成功发射了第一艘载人飞船 ——“神舟”5号。','A 2002年10月15日 ','B 2003年10月15日','C 2004年10月15日','D 2005年10月15日','待改',1),(12,12,'中国发射的第一艘载人飞船“神舟”5号，其航天员______成为第一名飞入太空的中国人。','A 聂海胜','B 费俊龙','C 杨利伟','D 翟志刚','C',1),(13,13,'把中国载人飞船“神舟”5号成功地送上太空的火箭是______。','A “长征”1号','B “长征”2号E','C “长征”2号F','D “长征”3号乙','C',1),(14,14,'航空是指载人或不载人的飞行器在地球______的航行活动。','A 高空','B 大气层内','C 宇宙','D 大气层外','B',1),(15,15,'航天是指载人或不载人的航天器在地球______的航行活动。','A 高空','B 大气层中','C 宇宙','D 大气层外','D',1),(16,16,'C3','A','B','C','D','A',1),(17,17,'c2','A','B','C','D','A',1),(18,18,'C2','A','B','C','D','AB',2),(19,19,'C2','A','B','C','D','AB',2),(20,20,'C2','A','B','C','D','AB',2),(21,21,'C3','A','B','C','D','A',1),(22,22,'C3','A','B','C','D','A',1),(23,23,'C3','A','B','C','D','A',1),(24,24,'c3','A','B','C','D','A',1),(25,25,'C3','A','B','C','D','A',1),(26,26,'C3','A','B','C','D','A',1),(27,27,'c3','A','B','C','D','A',1),(28,28,'C3','A','B','C','D','AB',2),(29,29,'C3','A','B','C','D','AB',2),(30,30,'C3','A','B','C','D','AB',2),(31,31,'C4','A','B','C','D','A',1),(32,32,'c4','A','B','C','D','A',1),(33,33,'C4','A','B','C','D','A',1),(34,34,'C4','A','B','C','D','A',1),(35,35,'C4','A','B','C','D','A',1),(36,36,'c4','A','B','C','D','A',1),(37,37,'C4','A','B','C','D','A',1),(38,38,'C4','A','B','C','D','AB',2),(39,39,'c4','A','B','C','D','AB',2),(40,40,'C4','A','B','C','D','AB',2),(41,41,'C5','A','B','C','D','A',1),(42,42,'c5','A','B','C','D','A',1),(43,43,'C5','A','B','C','D','A',1),(44,44,'C5','A','B','C','D','A',1),(45,45,'C5','A','B','C','D','A',1),(46,46,'c5','A','B','C','D','A',1),(47,47,'c5','A','B','C','D','A',1),(48,48,'C5','A','B','C','D','AB',2),(49,49,'C5','A','B','C','D','AB',2),(50,50,'C5','A','B','C','D','AB',2),(51,51,'1','A','B','C','D','A',1);
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user14051001`
--

DROP TABLE IF EXISTS `user14051001`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user14051001` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` text,
  `score` text,
  `number` text,
  `type` varchar(10) DEFAULT NULL,
  `indexx` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user14051001`
--

LOCK TABLES `user14051001` WRITE;
/*!40000 ALTER TABLE `user14051001` DISABLE KEYS */;
INSERT INTO `user14051001` VALUES (1,'1456239781','2','!1!2!5!9!10','test',NULL),(2,'1456240499','0','!11!12!13!15!16!18','test',NULL),(3,'1456240530','1','!22!23!24!25!26!27','test',NULL),(6,'1456241748','1','!13!15!16','hw',16),(9,'1456242050','0','!9!10!11!12','hw',23),(11,'1456468965','3','!14!15','作业',24);
/*!40000 ALTER TABLE `user14051001` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user14051003`
--

DROP TABLE IF EXISTS `user14051003`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user14051003` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` text,
  `score` text,
  `number` text,
  `type` varchar(10) DEFAULT NULL,
  `indexx` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user14051003`
--

LOCK TABLES `user14051003` WRITE;
/*!40000 ALTER TABLE `user14051003` DISABLE KEYS */;
INSERT INTO `user14051003` VALUES (1,'1456242924','1','!13!15!16','hw',16),(2,'1456242939','0','!9!10!11!12','hw',23),(3,'1456243226','1','!13!15!16','hw',24);
/*!40000 ALTER TABLE `user14051003` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user14051028`
--

DROP TABLE IF EXISTS `user14051028`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user14051028` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` text,
  `score` text,
  `number` text,
  `type` varchar(10) DEFAULT NULL,
  `indexx` int(11) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user14051028`
--

LOCK TABLES `user14051028` WRITE;
/*!40000 ALTER TABLE `user14051028` DISABLE KEYS */;
INSERT INTO `user14051028` VALUES (1,'1456242544','1','!13!15!16','作业',16,NULL),(2,'1456279164','0','!9!10!11!12','作业',23,NULL),(3,'1456386857','2','!1!7!8','自我测试',NULL,NULL),(4,'1456468615','1','!13!15!16','作业',24,NULL);
/*!40000 ALTER TABLE `user14051028` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_number` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `classnumber` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,14051028,'7c4a8d09ca3762af61e59520943dc26494f8941b','2016-02-22 22:03:30','刘昕',1111),(11,14051001,'7c4a8d09ca3762af61e59520943dc26494f8941b','2016-02-23 23:00:34','姚璐',1111),(12,14051003,'7c4a8d09ca3762af61e59520943dc26494f8941b','2016-02-23 23:55:03','朱诗慧',1111),(13,14051231,'dd5fef9c1c1da1394d6d34b248c51be2ad740840','2016-03-02 15:33:57','骆明',1111);
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

-- Dump completed on 2016-03-04 17:58:37
