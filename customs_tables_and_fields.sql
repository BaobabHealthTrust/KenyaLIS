-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: blis_revamp
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `activity_state`
--

DROP TABLE IF EXISTS `activity_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_state` (
 	`activity_state_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`state_id` int(11) NOT NULL,
	`test_id` int(10) ,
	`specimen_id` int(10) ,
	`date` datetime DEFAULT NULL,
	`reason` VARCHAR(255),
	`location` VARCHAR(255),
	`user_id` int(10) ,
	`doctor` VARCHAR(255),
	`comments` VARCHAR(255)	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_state`
--

LOCK TABLES `activity_state` WRITE;
/*!40000 ALTER TABLE `activity_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `container_type`
--

DROP TABLE IF EXISTS `container_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `container_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `container_type`
--

LOCK TABLES `container_type` WRITE;
/*!40000 ALTER TABLE `container_type` DISABLE KEYS */;
INSERT INTO `container_type` VALUES (1,'EDTA',NULL),(2,'Sterile Container',NULL),(3,'Fluoride Oxalate',NULL),(4,'Slide',NULL),(5,'DBS',NULL),(6,'BD Bactec Adult Bottle',NULL),(7,'BD Bactec Paed Bottle',NULL),(8,'Swab',NULL),(9,'Plain Tube',NULL);
/*!40000 ALTER TABLE `container_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`test_category_id` int(11),
	`active` tinyint DEFAULT 0,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`)	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `device_mac_addr` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specimen_type`
--

DROP TABLE IF EXISTS `specimen_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specimen_type` (
  `specimen_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `disabled` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`specimen_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specimen_type`
--

LOCK TABLES `specimen_type` WRITE;
/*!40000 ALTER TABLE `specimen_type` DISABLE KEYS */;
INSERT INTO `specimen_type` VALUES (26,'Whole blood','','2015-02-03 09:46:01',0),(27,'CSF','','2015-02-03 09:48:53',0),(28,'Sputum','','2015-02-03 09:55:19',0),(29,'Urine','','2015-02-03 09:57:05',0),(30,'Pus','','2015-02-03 09:53:04',0),(31,'Stool','','2015-02-03 09:56:04',0),(32,'Peritoneal fluid','','2015-02-03 09:50:07',0),(33,'Smear','','2015-02-03 09:53:53',0),(34,'Swab','','2015-02-03 09:58:46',0),(35,'Pleural fluid','','2015-02-03 09:52:46',0),(36,'Pericardial fluid','','2015-02-03 09:49:40',0);
/*!40000 ALTER TABLE `specimen_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_category`
--

DROP TABLE IF EXISTS `test_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_category` (
  `test_category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_category`
--

LOCK TABLES `test_category` WRITE;
/*!40000 ALTER TABLE `test_category` DISABLE KEYS */;
INSERT INTO `test_category` VALUES (26,'Parasitology','','2014-07-30 08:25:06'),(27,'Biochemistry','','2015-02-02 12:45:56'),(28,'Haematology','','2015-02-02 12:39:23'),(30,'Serology','','2014-07-30 08:37:36'),(32,'Blood bank','','2015-02-02 12:48:31'),(33,'Microbiology','','2015-02-02 12:48:31'),(34,'Histology','','2015-02-02 12:48:31'),(35,'Cytology','','2015-02-02 12:48:31'),(36,'Measles','','2015-02-02 12:48:31'),(37,'PCR','','2015-02-02 12:48:31'),(38,'Flow Cytometry','','2015-02-02 19:34:42'),(39,'Under five','','2015-02-02 19:12:00');
/*!40000 ALTER TABLE `test_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_type`
--

DROP TABLE IF EXISTS `test_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_type` (
  `test_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_test_type_id` int(10) DEFAULT '0',
  `name` varchar(45) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT NULL,
  `loinc_code` varchar(45) DEFAULT NULL,
  `test_code` varchar(45) DEFAULT NULL,
  `test_category_id` int(11) unsigned NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_panel` int(10) unsigned DEFAULT NULL,
  `disabled` int(10) unsigned NOT NULL DEFAULT '0',
  `clinical_data` longtext,
  `hide_patient_name` int(1) DEFAULT NULL,
  `prevalence_threshold` int(3) DEFAULT '70',
  `target_tat` int(3) unsigned DEFAULT NULL,
  `container_type` int(11) NOT NULL,
  PRIMARY KEY (`test_type_id`),
  KEY `test_category_id` (`test_category_id`),
  CONSTRAINT `test_type_ibfk_1` FOREIGN KEY (`test_category_id`) REFERENCES `test_category` (`test_category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type`
--

LOCK TABLES `test_type` WRITE;
/*!40000 ALTER TABLE `test_type` DISABLE KEYS */;
INSERT INTO `test_type` VALUES (222,0,'Blood grouping','ABO and Rh group [Type] in  Blood','882-1','Bg',32,'2015-02-02 13:07:57',0,0,NULL,NULL,70,NULL,0),(223,0,'Coombs test','Direct Antiglobulin test.unspecified reagent On Red Blood Cells','51006-5','DAT',32,'2015-02-02 13:17:55',0,0,NULL,NULL,70,NULL,0),(224,0,'Blood compatibility test','Major cross-match [interpretation]','1250-0','xm',32,'2015-02-02 13:17:55',0,0,NULL,NULL,70,NULL,0),(225,0,'Full blood count','CBC W Auto Differential Panel in Blood','57021-8','FBC',28,'2015-02-02 13:30:02',0,0,NULL,NULL,70,NULL,0),(226,0,'Peripheral blood smear','Microscopic Observation [Identifier] in Unspecified specimen by Gram stain','664-3','PBS',33,'2015-02-02 13:33:06',0,0,NULL,NULL,70,NULL,0),(227,0,'Sickle cell','Hemoglobin S [Presence] in Blood By Solubility test','6864-3','SC',28,'2015-02-02 13:53:24',0,0,NULL,NULL,70,NULL,0),(228,0,'Erythrocyte sedimentation rate','Erythrocyte sedimentation rate by Westergren method','4537-7','ESR',28,'2015-02-02 13:58:55',0,0,NULL,NULL,70,NULL,0),(229,0,'VDRL','Reagin Ab [Presence] in Serum by VDRL','5292-8',NULL,30,'2015-02-02 14:01:22',0,0,NULL,NULL,70,NULL,0),(230,0,'TPHA','Treponema pallidum Ab [Presence] in Serum by ???','8041-6',NULL,30,'2015-02-02 14:03:14',0,0,NULL,NULL,70,NULL,0),(231,0,'HEP B','Hepatitis B virus surface Ag [Presence] in Serum or Plasma by Immunoassay','5196-1',NULL,30,'2015-02-02 14:18:26',0,0,NULL,NULL,70,NULL,0),(232,0,'HIV','HIV 1 [interpretation] in Serum by Immunoassay','44607-0',NULL,30,'2015-02-02 14:18:26',0,0,NULL,NULL,70,NULL,0),(234,0,'PEP screening','HIV 1 RNA [Presence] in Unspecified specimen by Probe and target amplification method','5018-7',NULL,30,'2015-02-02 14:19:57',0,0,NULL,NULL,70,NULL,0),(235,0,'Glucose','Glucose [Moles/Volume] in Blood','15074-8','Glu',27,'2015-02-02 14:20:58',0,0,NULL,NULL,70,NULL,0),(237,0,'Urea','Urea nitrogen [Mass/Volume] in Serum or Plasma','3094-0','U & Es',27,'2015-02-02 14:25:36',NULL,0,NULL,NULL,70,NULL,0),(238,0,'Sodium','Sodium [Moles/Volume] in Serum or Plasma','2951-2','U & Es',27,'2015-02-02 14:26:50',NULL,0,NULL,NULL,70,NULL,0),(239,0,'Potassium','Potassium [Moles/Volume] in Serum or Plasma','2923-3','U & Es',27,'2015-02-02 14:27:58',NULL,0,NULL,NULL,70,NULL,0),(240,0,'Creatinine','Creatinine [Mass/Volume] in Serum or Plasma','2160-0','Crea',27,'2015-02-02 14:30:46',NULL,0,NULL,NULL,70,NULL,0),(242,0,'Alanine aminotransferase','Alanine aminotransferase [Enzymatic activity/volume] in Serum or Plasma','1742-6','LFTs',27,'2015-02-02 14:41:01',NULL,0,NULL,NULL,70,NULL,0),(243,0,'Aspartate aminotransferase ','Aspartate aminotransferase [Enzymatic activity/volume] in Serum or Plasma','1920-8','LFTs',27,'2015-02-02 14:41:01',NULL,0,NULL,NULL,70,NULL,0),(244,0,'Bilirubin (direct)','Bilirubin.direct [Mass/volume] in Serum or Plasma','1968-7','LFTs',27,'2015-02-02 14:43:47',NULL,0,NULL,NULL,70,NULL,0),(245,0,'Bilirubin (total)','Bilirubin.total [Mass/volume] in Serum or Plasma','1975-2','LFTs',27,'2015-02-02 14:50:45',NULL,0,NULL,NULL,70,NULL,0),(246,0,'Alkaline Phosphatase','Alkaline phosphatase [Enzymatic activity /volume] in Serum or Plasma','6768-6','LFTs',27,'2015-02-02 14:50:45',NULL,0,NULL,NULL,70,NULL,0),(247,0,'Albumin','Albumin [Mass/Volume] in Serum or Plasma','1751-7','LFTs',27,'2015-02-02 14:52:34',NULL,0,NULL,NULL,70,NULL,0),(248,0,'Gamma glutamyl transferase ','Gamma glutamyl transferase [Enzymatic activity/volume] in Serum or Plasma','2324-2',NULL,27,'2015-02-02 14:59:37',NULL,0,NULL,NULL,70,NULL,0),(249,0,'Blood culture','Bacteria identified in Blood by Culture','600-7',NULL,33,'2015-02-02 18:49:25',NULL,0,NULL,NULL,70,NULL,0),(250,0,'CSF','Bacteria identified in Cerebral spinal fluid by Culture','606-4','CSF',33,'2015-02-02 15:03:53',NULL,0,NULL,NULL,70,NULL,0),(251,0,'Pleural fluid','Bacteria identified in Sputum by Respiratory Culture','624-7',NULL,33,'2015-02-02 18:42:20',NULL,0,NULL,NULL,70,NULL,0),(252,0,'Swabs','Bacteria identified in Unspecified specimen by Aerobe culture','634-6',NULL,33,'2015-02-02 18:44:20',NULL,0,NULL,NULL,70,NULL,0),(253,0,'Pus','Bacteria identified in Unspecified specimen by Anaerobe culture','635-3',NULL,33,'2015-02-02 18:46:15',NULL,0,NULL,NULL,70,NULL,0),(254,0,'Ascitic fluid','Bacteria identified in Peritoneal fluid by Culture','619-7',NULL,33,'2015-02-02 18:48:20',NULL,0,NULL,NULL,70,NULL,0),(255,0,'Urine culture','Bacteria identified in Urine by Culture','630-4',NULL,33,'2015-02-02 18:49:25',NULL,0,NULL,NULL,70,NULL,0),(256,0,'Malaria microscopy','Miscroscopic observation [identifier] in  Blood by Giemsa stain','51714-4',NULL,26,'2015-02-02 18:51:20',NULL,0,NULL,NULL,70,NULL,0),(257,0,'MRDT','Plasmodium sp Ag [identifier] in Blood by Rapid immunoassay','70569-9',NULL,26,'2015-02-02 18:53:05',NULL,0,NULL,NULL,70,NULL,0),(258,0,'Urine analysis','Ova and parasites identified in Unspecified specimen by Light microscopy','673-4',NULL,26,'2015-02-02 18:58:02',NULL,0,NULL,NULL,70,NULL,0),(259,0,'Stool analysis','Ova+Parasites identified in stool by Concentration','10701-1',NULL,26,'2015-02-02 18:58:02',NULL,0,NULL,NULL,70,NULL,0),(261,0,'HVS analysis','Cytology report or Cevical or vaginal smear or scraping Cyto stain.thin prep','47527-7',NULL,35,'2015-02-02 19:06:03',NULL,0,NULL,NULL,70,NULL,0),(262,0,'Semen analysis','Ova and parasites identified in Unspecified specimen by Light microscopy','673-4',NULL,26,'2015-02-02 19:06:03',NULL,0,NULL,NULL,70,NULL,0),(263,0,'Sputum Tb microscopy','Microscopic observation [Identifier] in Unspecified specimen by acid fast stain','11545-1',NULL,33,'2015-02-02 19:09:43',NULL,0,NULL,NULL,70,NULL,0),(264,0,'Malaria rapid diagnostic test','Plasmodium sp Ag [Identifier] in Blood by Rapid immunoassay','70569-9','MRDT',39,'2015-02-02 19:15:08',NULL,0,NULL,NULL,70,NULL,0),(265,0,'Blood films','Blood smear finding [Identifier] in Blood by Light microscopy','5909-7','BF',28,'2015-02-02 19:28:27',NULL,0,NULL,NULL,70,NULL,0),(266,0,'Early infant diagnosis(HIV)','HIV 1 RNA [presence] in Unspecified specimen by Probe and target amplification method','5018-7','EID',37,'2015-02-02 19:25:05',NULL,0,NULL,NULL,70,NULL,0),(267,0,'Viral load (HIV)','HIV 1 RNA [#/volume] (viral load) in Unspecified specimen by Probe and target Amplification method','25836-8','VL',37,'2015-02-02 19:25:52',NULL,0,NULL,NULL,70,NULL,0),(268,0,'Influenza','Influenza virus A RNA [Presence] in Unspcified specimen by Probe and target amplification method','34487-9',NULL,37,'2015-02-02 19:28:27',NULL,0,NULL,NULL,70,NULL,0),(269,0,'Measles & Rubella','Measles virus RNA [Presence] in Unspecified specimen by probe and target amplification method','48508-6',NULL,36,'2015-02-02 19:31:47',NULL,0,NULL,NULL,70,NULL,0),(270,0,'CD4','CD4 T-cell absolute panel in Blood by Flow cytometry','65758-5',NULL,38,'2015-02-02 19:33:44',NULL,0,NULL,NULL,70,NULL,0);
/*!40000 ALTER TABLE `test_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specimen_test`
--

DROP TABLE IF EXISTS `specimen_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specimen_test` (
  `test_type_id` int(11) unsigned NOT NULL DEFAULT '0',
  `specimen_type_id` int(11) unsigned NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `test_type_id` (`test_type_id`),
  KEY `specimen_type_id` (`specimen_type_id`),
  CONSTRAINT `specimen_test_ibfk_1` FOREIGN KEY (`specimen_type_id`) REFERENCES `specimen_type` (`specimen_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `specimen_test_ibfk_2` FOREIGN KEY (`test_type_id`) REFERENCES `test_type` (`test_type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relates tests to the specimens that are compatible with thos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specimen_test`
--

LOCK TABLES `specimen_test` WRITE;
/*!40000 ALTER TABLE `specimen_test` DISABLE KEYS */;
INSERT INTO `specimen_test` VALUES (242,26,'2015-02-03 09:46:01'),(247,26,'2015-02-03 09:46:01'),(246,26,'2015-02-03 09:46:01'),(243,26,'2015-02-03 09:46:01'),(244,26,'2015-02-03 09:46:01'),(245,26,'2015-02-03 09:46:01'),(224,26,'2015-02-03 09:46:01'),(249,26,'2015-02-03 09:46:01'),(265,26,'2015-02-03 09:46:01'),(222,26,'2015-02-03 09:46:01'),(270,26,'2015-02-03 09:46:02'),(223,26,'2015-02-03 09:46:02'),(240,26,'2015-02-03 09:46:02'),(228,26,'2015-02-03 09:46:02'),(225,26,'2015-02-03 09:46:02'),(248,26,'2015-02-03 09:46:02'),(235,26,'2015-02-03 09:46:02'),(231,26,'2015-02-03 09:46:02'),(232,26,'2015-02-03 09:46:02'),(256,26,'2015-02-03 09:46:02'),(269,26,'2015-02-03 09:46:02'),(257,26,'2015-02-03 09:46:02'),(234,26,'2015-02-03 09:46:02'),(239,26,'2015-02-03 09:46:02'),(227,26,'2015-02-03 09:46:02'),(238,26,'2015-02-03 09:46:02'),(230,26,'2015-02-03 09:46:02'),(237,26,'2015-02-03 09:46:02'),(258,26,'2015-02-03 09:46:03'),(229,26,'2015-02-03 09:46:03'),(250,27,'2015-02-03 09:48:53'),(226,27,'2015-02-03 09:48:53'),(226,36,'2015-02-03 09:49:41'),(226,32,'2015-02-03 09:50:07'),(254,32,'2015-02-03 09:51:24'),(226,35,'2015-02-03 09:52:46'),(263,35,'2015-02-03 09:52:46'),(226,30,'2015-02-03 09:53:04'),(261,33,'2015-02-03 09:53:53'),(251,28,'2015-02-03 09:55:19'),(259,31,'2015-02-03 09:56:04'),(252,30,'2015-02-03 09:56:46'),(252,29,'2015-02-03 09:57:06'),(252,31,'2015-02-03 09:57:30'),(253,31,'2015-02-03 09:58:04'),(253,29,'2015-02-03 09:58:19'),(253,34,'2015-02-03 09:58:47'),(252,34,'2015-02-03 09:58:47');
/*!40000 ALTER TABLE `specimen_test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-03 12:01:03
