CREATE DATABASE  IF NOT EXISTS `musthelpdesk_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `musthelpdesk_db`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: musthelpdesk_db
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Mr.','George','Tumutech','tumutech@tumutech.io','12345678','2021-02-19 15:11:12');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agent` (
  `agentID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `pasword` varchar(200) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  PRIMARY KEY (`agentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent`
--

LOCK TABLES `agent` WRITE;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
INSERT INTO `agent` VALUES (1,'Mr','Joseph','Lawerence','Jose','jose@gmail.com','075656565','12345678',1);
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customerID` varchar(100) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `priority` enum('HIGH','MIDDLE','LOW') DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('AR-MUST','ACADEMIC REGISTRA','MAIN COMPASS','025656265','2366536','HIGH',1);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customeruser`
--

DROP TABLE IF EXISTS `customeruser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customeruser` (
  `customer_userID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` varchar(100) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`customer_userID`),
  KEY `fk_customer_user_idx` (`customerID`),
  CONSTRAINT `fk_customer_user` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customeruser`
--

LOCK TABLES `customeruser` WRITE;
/*!40000 ALTER TABLE `customeruser` DISABLE KEYS */;
INSERT INTO `customeruser` VALUES (1,'AR-MUST','Dr','Richman','Sessma','56565','richman@must.ac.ug','2365656',1,'12345678');
/*!40000 ALTER TABLE `customeruser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knowledge_category`
--

DROP TABLE IF EXISTS `knowledge_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `knowledge_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) DEFAULT NULL,
  `description` varchar(245) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledge_category`
--

LOCK TABLES `knowledge_category` WRITE;
/*!40000 ALTER TABLE `knowledge_category` DISABLE KEYS */;
INSERT INTO `knowledge_category` VALUES (1,'Software','sfdasdfwe','2023-09-22 11:43:47');
/*!40000 ALTER TABLE `knowledge_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knowledgebase`
--

DROP TABLE IF EXISTS `knowledgebase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `knowledgebase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) DEFAULT NULL,
  `title` varchar(245) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `state` enum('AGENT','CUSTOMER','ALL') DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  `attachment` varchar(2045) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_knowlege_category_idx` (`categoryID`),
  CONSTRAINT `fk_knowlege_category` FOREIGN KEY (`categoryID`) REFERENCES `knowledge_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledgebase`
--

LOCK TABLES `knowledgebase` WRITE;
/*!40000 ALTER TABLE `knowledgebase` DISABLE KEYS */;
INSERT INTO `knowledgebase` VALUES (2,1,'Installing Windows','Software install Windows OS','ALL',1,'NONE','2023-09-26 12:40:50'),(3,1,'Installing license for CAD','license CAD installing','ALL',1,'20230926094103_','2023-09-26 09:41:03'),(4,1,'Installing license for CAD','license CAD installing','ALL',1,'NONE','2023-09-26 09:42:30'),(5,1,'Installing license for CAD','license CAD installing','ALL',1,'NONE','2023-09-26 09:51:07'),(6,1,'Installing license for CAD','license CAD installing','ALL',1,'NONE','2023-09-26 09:54:41'),(7,1,'Installing license for CAD','license CAD installing','ALL',1,'NONE','2023-09-26 09:57:11'),(8,1,'Installing license for Adobe','license adobe installing','AGENT',1,'NONE','2023-09-26 09:59:17'),(9,1,'Installing license for Adobe','license adobe installing','AGENT',1,'NONE','2023-09-26 10:01:40'),(10,1,'Installing license for Adobe','license adobe installing','AGENT',1,'NONE','2023-09-26 10:03:00'),(11,1,'Installing license for Adobe','license adobe installing','ALL',1,'NONE','2023-09-26 10:03:47'),(12,1,'Installing license for CAD','license CAD installing','AGENT',1,'NONE','2023-09-26 10:07:44');
/*!40000 ALTER TABLE `knowledgebase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knowledgebase_contents`
--

DROP TABLE IF EXISTS `knowledgebase_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `knowledgebase_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `knowledge_id` int(11) DEFAULT NULL,
  `section_title` varchar(200) DEFAULT NULL,
  `content` text,
  `images` text,
  PRIMARY KEY (`id`),
  KEY `knowledge_id` (`knowledge_id`),
  CONSTRAINT `knowledgebase_contents_ibfk_1` FOREIGN KEY (`knowledge_id`) REFERENCES `knowledgebase` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledgebase_contents`
--

LOCK TABLES `knowledgebase_contents` WRITE;
/*!40000 ALTER TABLE `knowledgebase_contents` DISABLE KEYS */;
INSERT INTO `knowledgebase_contents` VALUES (2,5,'processing the license','The framework suggests that different crops and livestock are vulnerable to different climate variables. For example, some crops may be more sensitive to changes in temperature, while others may be more sensitive to changes in precipitation. The framework also suggests that the availability of water and other resources will play a critical role in determining the overall impact of climate change on agricultural productivity in Uganda. Finally, the framework suggests that adaptation and mitigation strategies, such as improved irrigation systems, crop diversification, and the use of climate-resistant crops, can help farmers in Uganda cope with the challenges posed by climate change.\r\nSignificance of the Study:\r\nThe study is significant for several reasons. First, it addresses an important and timely issue that has significant implications for food security and the economy in Uganda. Second, the study provides a comprehensive analysis of the impact of climate change on agricultural productivity in Uganda, taking into account the specific climate variables that affect crops and livestock. Third, the study offers insights into potential adaptation and mitigation strategies that can help farmers in Uganda cope with the challenges posed by climate change. Finally, the study contributes to the broader literature on the impact of climate change on agriculture, which is an important area of research in environmental science and economics.','20230926100744_pexels-cesar-perez-733745.jpg'),(3,6,'processing the license','The framework suggests that different crops and livestock are vulnerable to different climate variables. For example, some crops may be more sensitive to changes in temperature, while others may be more sensitive to changes in precipitation. The framework also suggests that the availability of water and other resources will play a critical role in determining the overall impact of climate change on agricultural productivity in Uganda. Finally, the framework suggests that adaptation and mitigation strategies, such as improved irrigation systems, crop diversification, and the use of climate-resistant crops, can help farmers in Uganda cope with the challenges posed by climate change.\r\nSignificance of the Study:\r\nThe study is significant for several reasons. First, it addresses an important and timely issue that has significant implications for food security and the economy in Uganda. Second, the study provides a comprehensive analysis of the impact of climate change on agricultural productivity in Uganda, taking into account the specific climate variables that affect crops and livestock. Third, the study offers insights into potential adaptation and mitigation strategies that can help farmers in Uganda cope with the challenges posed by climate change. Finally, the study contributes to the broader literature on the impact of climate change on agriculture, which is an important area of research in environmental science and economics.','20230926100744_pexels-cesar-perez-733745.jpg'),(4,7,'processing the license','The framework suggests that different crops and livestock are vulnerable to different climate variables. For example, some crops may be more sensitive to changes in temperature, while others may be more sensitive to changes in precipitation. The framework also suggests that the availability of water and other resources will play a critical role in determining the overall impact of climate change on agricultural productivity in Uganda. Finally, the framework suggests that adaptation and mitigation strategies, such as improved irrigation systems, crop diversification, and the use of climate-resistant crops, can help farmers in Uganda cope with the challenges posed by climate change.\r\nSignificance of the Study:\r\nThe study is significant for several reasons. First, it addresses an important and timely issue that has significant implications for food security and the economy in Uganda. Second, the study provides a comprehensive analysis of the impact of climate change on agricultural productivity in Uganda, taking into account the specific climate variables that affect crops and livestock. Third, the study offers insights into potential adaptation and mitigation strategies that can help farmers in Uganda cope with the challenges posed by climate change. Finally, the study contributes to the broader literature on the impact of climate change on agriculture, which is an important area of research in environmental science and economics.','20230926100744_pexels-cesar-perez-733745.jpg'),(5,8,'processing the license','The study is significant for several reasons. First, it addresses an important and timely issue that has significant implications for food security and the economy in Uganda. Second, the study provides a comprehensive analysis of the impact of climate change on agricultural productivity in Uganda, taking into account the specific climate variables that affect crops and livestock. Third, the study offers insights into potential adaptation and mitigation strategies that can help farmers in Uganda cope with the challenges posed by climate change. Finally, the study contributes to the broader literature on the impact of climate change on agriculture, which is an important area of research in environmental science and economics.\r\nIn conclusion, the proposed study aims to examine the impact of climate change on agricultural productivity in Uganda. The study identifies the dependent and independent variables, outlines the purpose and specific objectives of the study, develops a conceptual framework that shows the relationship between the variables, and highlights the significance of the study. The study is expected to contribute to our understanding of the impact of climate change on agriculture in Uganda and inform policy responses to the challenges posed by climate change.','20230926100744_pexels-cesar-perez-733745.jpg'),(6,9,'processing the license','The study is significant for several reasons. First, it addresses an important and timely issue that has significant implications for food security and the economy in Uganda. Second, the study provides a comprehensive analysis of the impact of climate change on agricultural productivity in Uganda, taking into account the specific climate variables that affect crops and livestock. Third, the study offers insights into potential adaptation and mitigation strategies that can help farmers in Uganda cope with the challenges posed by climate change. Finally, the study contributes to the broader literature on the impact of climate change on agriculture, which is an important area of research in environmental science and economics.\r\nIn conclusion, the proposed study aims to examine the impact of climate change on agricultural productivity in Uganda. The study identifies the dependent and independent variables, outlines the purpose and specific objectives of the study, develops a conceptual framework that shows the relationship between the variables, and highlights the significance of the study. The study is expected to contribute to our understanding of the impact of climate change on agriculture in Uganda and inform policy responses to the challenges posed by climate change.','20230926100744_pexels-cesar-perez-733745.jpg'),(7,10,'processing the license','The study is significant for several reasons. First, it addresses an important and timely issue that has significant implications for food security and the economy in Uganda. Second, the study provides a comprehensive analysis of the impact of climate change on agricultural productivity in Uganda, taking into account the specific climate variables that affect crops and livestock. Third, the study offers insights into potential adaptation and mitigation strategies that can help farmers in Uganda cope with the challenges posed by climate change. Finally, the study contributes to the broader literature on the impact of climate change on agriculture, which is an important area of research in environmental science and economics.\r\nIn conclusion, the proposed study aims to examine the impact of climate change on agricultural productivity in Uganda. The study identifies the dependent and independent variables, outlines the purpose and specific objectives of the study, develops a conceptual framework that shows the relationship between the variables, and highlights the significance of the study. The study is expected to contribute to our understanding of the impact of climate change on agriculture in Uganda and inform policy responses to the challenges posed by climate change.','20230926100744_pexels-cesar-perez-733745.jpg'),(8,11,'processing the license','asdfasdfsf','20230926100744_pexels-cesar-perez-733745.jpg'),(9,12,'processing the license','attachmentdfsdfas sadfsadfs ','20230926100744_pexels-cesar-perez-733745.jpg'),(10,2,NULL,'ou learned from the previous chapter that private variables can only be accessed within the same class (an outside class has no access to it). However, sometimes we need to access them - and it can be done with properties.\n\nA property is like a combination of a variable and a method, and it has two methods: a get and a set method','20230926100744_pexels-cesar-perez-733745.jpg');
/*!40000 ALTER TABLE `knowledgebase_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_notification`
--

DROP TABLE IF EXISTS `mail_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail_notification` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_user_ID` int(11) DEFAULT NULL,
  `agentID` int(11) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text,
  `Attachment` varchar(245) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `from` varchar(200) NOT NULL,
  `to` varchar(200) NOT NULL,
  `valid` int(11) NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `FK_customer_mail_idx` (`customer_user_ID`),
  KEY `FK_agent_response_idx` (`agentID`),
  CONSTRAINT `FK_agent_response` FOREIGN KEY (`agentID`) REFERENCES `agent` (`agentid`),
  CONSTRAINT `FK_customer_mail` FOREIGN KEY (`customer_user_ID`) REFERENCES `customeruser` (`customer_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_notification`
--

LOCK TABLES `mail_notification` WRITE;
/*!40000 ALTER TABLE `mail_notification` DISABLE KEYS */;
INSERT INTO `mail_notification` VALUES (8,1,1,'Progression','klhjklvkjbk','2','2023-09-20 11:22:24','helpdesksupport@must.ac.ug','richman@must.ac.ug',1),(9,1,1,'Updates on new changes','sdfasdfasdf','none','2023-09-21 12:10:53','helpdesk@must.ac.ug','richman@must.ac.ug',1),(10,1,1,'Ticket Status Update','Ticket is now at: PENDING','none','2023-09-21 12:31:37','notify@none','richman@must.ac.ug',1),(11,1,1,'Ticket Status Update','Ticket is now at: PENDING','none','2023-09-21 12:33:38','notify@none','richman@must.ac.ug',1),(12,1,1,'Ticket Status Update','Ticket is now at: PENDING','none','2023-09-21 12:35:28','notify@none','richman@must.ac.ug',1),(13,1,1,'Ticket Status Update','Ticket is now at: PENDING','none','2023-09-21 12:36:09','notify@none','richman@must.ac.ug',1),(14,1,1,'Ticket Status Update','Ticket is now at: PENDING','none','2023-09-21 12:36:40','notify@none','richman@must.ac.ug',1),(15,1,1,'Ticket Status Update','Ticket is now at: PENDING','none','2023-09-21 12:37:00','notify@none','richman@must.ac.ug',1),(16,1,1,'Ticket Status Update','Ticket is now at: CLOSED','none','2023-09-22 07:25:58','notify@none','richman@must.ac.ug',1),(17,1,1,'Updates on new changes','sadfasdfasdfasdf','2','2023-09-22 10:06:15','helpdesksupport@must.ac.ug','richman@must.ac.ug',1),(18,1,1,'Ticket Status Update','Ticket is now at: PROCESSING','none','2023-09-22 10:07:04','notify@none','richman@must.ac.ug',1),(19,1,1,'Ticket Status Update','Ticket is now at: CLOSED','none','2023-09-22 10:07:43','notify@none','richman@must.ac.ug',1),(20,1,1,'Ticket Status Update','Ticket is now at: CLOSED','none','2023-09-28 08:03:39','notify@none','richman@must.ac.ug',1),(21,1,1,'sfgsdfgsdfg','dfgsdfgsdfgsdfg','5','2023-09-29 08:44:01','helpdesksupport@must.ac.ug','richman@must.ac.ug',1),(22,1,1,'Ticket Status Update','Ticket is now at: PROCESSING','none','2023-09-29 08:44:15','notify@none','richman@must.ac.ug',1);
/*!40000 ALTER TABLE `mail_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_event`
--

DROP TABLE IF EXISTS `notification_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `valid_id` smallint(6) NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_event`
--

LOCK TABLES `notification_event` WRITE;
/*!40000 ALTER TABLE `notification_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_event_message`
--

DROP TABLE IF EXISTS `notification_event_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_event_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notification_event_message_notification_id` (`notification_id`),
  CONSTRAINT `fk_notification_message` FOREIGN KEY (`id`) REFERENCES `notification_event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_event_message`
--

LOCK TABLES `notification_event_message` WRITE;
/*!40000 ALTER TABLE `notification_event_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_event_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `open_tickets`
--

DROP TABLE IF EXISTS `open_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `open_tickets` (
  `ticket_num` int(11) NOT NULL AUTO_INCREMENT,
  `customer_userID` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL,
  `body` text,
  `attachment` varchar(2045) DEFAULT NULL,
  `create_time` varchar(45) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  PRIMARY KEY (`ticket_num`),
  KEY `FK_opentickets_user_idx` (`customer_userID`),
  CONSTRAINT `FK_opentickets_user` FOREIGN KEY (`customer_userID`) REFERENCES `customeruser` (`customer_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=100008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `open_tickets`
--

LOCK TABLES `open_tickets` WRITE;
/*!40000 ALTER TABLE `open_tickets` DISABLE KEYS */;
INSERT INTO `open_tickets` VALUES (100001,1,'Install Software','kjlsdkflksdf','jskjdkfsdf','none','2023-19-09 09:11',0),(100002,1,'Wires Broken in the server room','sdafasdfasdfsdf','sdafasdfasdfsdf','./uploads/Faveo.png','2023-09-22 10:00:28',0),(100003,1,'sxdfghjkl',';lkjhgfdds',';lkjhgfdds','./uploads/','2023-09-22 11:42:52',0),(100004,1,'Hard disk failure','gfgf','gfgf','./uploads/jcpicker.txt','2023-09-22 11:55:23',1),(100005,1,'Phone trouble','Cant start it','Cant start it','./uploads/','2023-09-22 12:30:56',1),(100006,1,'intern',';yoo',';yoo','./uploads/','2023-09-26 12:19:43',1),(100007,1,'Driver issues','My sound doesnt work','My sound doesnt work','./uploads/','2023-09-28 08:24:39',1);
/*!40000 ALTER TABLE `open_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queue`
--

DROP TABLE IF EXISTS `queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `queue` (
  `queueID` int(11) NOT NULL AUTO_INCREMENT,
  `agentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`queueID`),
  KEY `fk_agent_queue_idx` (`agentID`),
  CONSTRAINT `fk_agent_queue` FOREIGN KEY (`agentID`) REFERENCES `agent` (`agentid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queue`
--

LOCK TABLES `queue` WRITE;
/*!40000 ALTER TABLE `queue` DISABLE KEYS */;
INSERT INTO `queue` VALUES (1,1);
/*!40000 ALTER TABLE `queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `valid` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `sla_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`serviceID`),
  KEY `fk_sla_service_idx` (`sla_id`),
  CONSTRAINT `fk_sla_service` FOREIGN KEY (`sla_id`) REFERENCES `sla` (`sla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Software Installation','Installing Softwares',1,'2023-09-13',1);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_agent`
--

DROP TABLE IF EXISTS `session_agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_agent` (
  `session_id` int(11) NOT NULL,
  `agentID` int(11) DEFAULT NULL,
  `activity` text,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `fk_agent_session_idx` (`agentID`),
  CONSTRAINT `fk_agent_session` FOREIGN KEY (`agentID`) REFERENCES `agent` (`agentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_agent`
--

LOCK TABLES `session_agent` WRITE;
/*!40000 ALTER TABLE `session_agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_customer_user`
--

DROP TABLE IF EXISTS `session_customer_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_customer_user` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_user_id` int(11) DEFAULT NULL,
  `activity` text,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `fk_sessons_cust_idx` (`customer_user_id`),
  CONSTRAINT `fk_sessons_cust` FOREIGN KEY (`customer_user_id`) REFERENCES `customeruser` (`customer_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_customer_user`
--

LOCK TABLES `session_customer_user` WRITE;
/*!40000 ALTER TABLE `session_customer_user` DISABLE KEYS */;
INSERT INTO `session_customer_user` VALUES (1,1,'Logged in','2023-09-22 09:53:34',NULL),(2,1,'Logged in','2023-09-22 10:43:27',NULL),(3,1,'Logged in','2023-09-22 10:51:17',NULL),(4,1,'Logged in','2023-09-22 11:39:12',NULL),(5,1,'Logged in','2023-09-22 11:54:00','2023-09-22 12:47:50'),(6,1,'Logged in','2023-09-22 12:17:24',NULL),(7,1,'Logged in','2023-09-22 12:19:31','2023-09-22 12:47:14'),(8,1,'Logged in','2023-09-22 12:20:44',NULL),(9,1,'Logged in','2023-09-22 13:02:57',NULL),(10,1,'Logged in','2023-09-25 07:32:50',NULL),(11,1,'Logged in','2023-09-25 07:44:26',NULL),(12,1,'Logged in','2023-09-25 09:16:34','2023-09-25 09:17:03'),(13,1,'Logged in','2023-09-25 09:17:08',NULL),(14,1,'Logged in','2023-09-25 10:57:52',NULL),(15,1,'Logged in','2023-09-25 11:03:45','2023-09-25 11:04:52'),(16,1,'Logged in','2023-09-25 11:11:31',NULL),(17,1,'Logged in','2023-09-25 11:12:27',NULL),(18,1,'Logged in','2023-09-25 11:16:27',NULL),(19,1,'Logged in','2023-09-25 11:22:36',NULL),(20,1,'Logged in','2023-09-25 11:29:33',NULL),(21,1,'Logged in','2023-09-26 06:38:17','2023-09-26 06:42:25'),(22,1,'Logged in','2023-09-26 09:51:58','2023-09-26 11:59:09'),(23,1,'Logged in','2023-09-26 11:24:05','2023-09-26 11:25:44'),(24,1,'Logged in','2023-09-26 11:59:14',NULL),(25,1,'Logged in','2023-09-27 07:05:20',NULL),(26,1,'Logged in','2023-09-28 08:00:15',NULL),(27,1,'Logged in','2023-09-28 08:15:17',NULL),(28,1,'Logged in','2023-09-28 08:49:38',NULL),(29,1,'Logged in','2023-09-28 10:25:15',NULL),(30,1,'Logged in','2023-10-02 12:48:14','2023-10-02 12:50:14'),(31,1,'Logged in','2023-10-02 12:49:41','2023-10-02 12:50:58'),(32,1,'Logged in','2023-10-02 13:14:18','2023-10-02 13:19:39'),(33,1,'Logged in','2023-10-02 13:21:13',NULL);
/*!40000 ALTER TABLE `session_customer_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sla`
--

DROP TABLE IF EXISTS `sla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sla` (
  `sla_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `service_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `escalation_time` int(11) DEFAULT NULL,
  `escalation_update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`sla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sla`
--

LOCK TABLES `sla` WRITE;
/*!40000 ALTER TABLE `sla` DISABLE KEYS */;
INSERT INTO `sla` VALUES (1,'Software Installation',150,100,50,120);
/*!40000 ALTER TABLE `sla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_num` int(11) NOT NULL,
  `agentID` int(11) NOT NULL,
  `responsible` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `queueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `priority` enum('HIGH','MIDDLE','LOW') NOT NULL,
  `create_time` datetime NOT NULL,
  `state` enum('OPEN','PENDING','PROCESSING','CLOSED') NOT NULL,
  `valid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ticket_num_opentk_idx` (`ticket_num`),
  KEY `fk_queue_ticket_idx` (`queueID`),
  KEY `fk_sevice_tick_idx` (`serviceID`),
  KEY `FK_owner_ticket_idx` (`owner`),
  CONSTRAINT `FK_owner_ticket` FOREIGN KEY (`owner`) REFERENCES `agent` (`agentid`),
  CONSTRAINT `fk_queue_ticket` FOREIGN KEY (`queueID`) REFERENCES `queue` (`queueid`),
  CONSTRAINT `fk_sevice_tick` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceid`),
  CONSTRAINT `fk_ticket_num_opentk` FOREIGN KEY (`ticket_num`) REFERENCES `open_tickets` (`ticket_num`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (17,100001,1,1,1,1,1,'LOW','2023-09-20 11:22:24','CLOSED',1),(18,100002,1,1,1,1,1,'HIGH','2023-09-22 10:06:14','CLOSED',1),(19,100003,1,1,1,1,1,'HIGH','2023-09-29 08:44:01','PROCESSING',1);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-08  0:08:38
