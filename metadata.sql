-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: blis_revamp
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
  `priority` varchar(45) DEFAULT NULL,
  `test_category_id` int(11) unsigned NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_panel` int(10) unsigned DEFAULT NULL,
  `disabled` int(10) unsigned NOT NULL DEFAULT '0',
  `clinical_data` longtext,
  `hide_patient_name` int(1) DEFAULT NULL,
  `prevalence_threshold` int(3) DEFAULT '70',
  `target_tat` int(3) unsigned DEFAULT NULL,
  `container_type` int(11) NOT NULL,
  `min_specimen_qty` float DEFAULT NULL,
  `specimen_unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`test_type_id`),
  KEY `test_category_id` (`test_category_id`),
  CONSTRAINT `test_type_ibfk_1` FOREIGN KEY (`test_category_id`) REFERENCES `test_category` (`test_category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type`
--

LOCK TABLES `test_type` WRITE;
/*!40000 ALTER TABLE `test_type` DISABLE KEYS */;
INSERT INTO `test_type` VALUES (222,0,'Blood grouping','ABO and Rh group [Type] in  Blood','882-1','Bg','Routine',32,'2015-02-26 13:12:52',0,0,'%%%###',0,70,0,0,1,'ml'),(223,0,'Coombs test','Direct Antiglobulin test.unspecified reagent On Red Blood Cells','51006-5','DAT','Routine',32,'2015-02-19 07:26:56',0,0,NULL,NULL,70,NULL,0,1,'ml'),(224,0,'Blood compatibility test','Major cross-match [interpretation]','1250-0','xm','Routine',32,'2015-02-19 07:26:56',0,0,NULL,NULL,70,NULL,0,3,'ml'),(225,0,'Full blood count','CBC W Auto Differential Panel in Blood','57021-8','FBC','Routine',28,'2015-03-10 12:36:37',1,0,NULL,NULL,70,NULL,0,3,'ml'),(226,0,'Peripheral blood smear','Microscopic Observation [Identifier] in Unspecified specimen by Gram stain','664-3','PBS','Special',33,'2015-02-19 07:26:56',0,0,NULL,NULL,70,NULL,0,3,'ml'),(227,0,'Sickle cell','Hemoglobin S [Presence] in Blood By Solubility test','6864-3','SC','Special',28,'2015-02-26 16:00:14',0,0,'%%%###',0,70,0,0,3,'ml'),(228,0,'Erythrocyte sedimentation rate','Erythrocyte sedimentation rate by Westergren method','4537-7','ESR','Special',28,'2015-02-19 07:26:56',0,0,NULL,NULL,70,NULL,0,3,'ml'),(229,0,'VDRL','Reagin Ab [Presence] in Serum by VDRL','5292-8',NULL,'Routine',30,'2015-02-26 16:15:23',0,0,'%%%###',0,70,0,0,3,'ml'),(230,0,'TPHA','Treponema pallidum Ab [Presence] in Serum by ???','8041-6',NULL,'Routine',30,'2015-02-26 16:16:45',0,0,'%%%###',0,70,0,0,3,'ml'),(231,0,'HEP B','Hepatitis B virus surface Ag [Presence] in Serum or Plasma by Immunoassay','5196-1',NULL,'Routine',30,'2015-02-26 15:56:54',0,0,'%%%###',0,70,0,0,3,'ml'),(232,0,'HIV','HIV 1 [interpretation] in Serum by Immunoassay','44607-0',NULL,'Routine',30,'2015-02-19 07:26:56',0,0,NULL,NULL,70,NULL,0,3,'ml'),(234,0,'PEP screening','HIV 1 RNA [Presence] in Unspecified specimen by Probe and target amplification method','5018-7',NULL,'Urgent',30,'2015-02-26 16:18:05',0,0,'%%%###',0,70,0,0,NULL,NULL),(235,0,'Glucose','Glucose [Moles/Volume] in Blood','15074-8','Glu','Routine',27,'2015-02-19 07:26:56',0,0,NULL,NULL,70,NULL,0,3,'ml'),(237,0,'Urea','Urea nitrogen [Mass/Volume] in Serum or Plasma','3094-0','U & Es','Routine',27,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,3,'ml'),(238,0,'Sodium','Sodium [Moles/Volume] in Serum or Plasma','2951-2','U & Es','Routine',27,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,3,'ml'),(239,0,'Potassium','Potassium [Moles/Volume] in Serum or Plasma','2923-3','U & Es','Routine',27,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,3,'ml'),(240,0,'Creatinine','Creatinine [Mass/Volume] in Serum or Plasma','2160-0','Crea','Routine',27,'2015-02-26 15:46:12',0,0,'!#!-%%%###',0,70,0,0,3,'ml'),(242,0,'Alanine aminotransferase','Alanine aminotransferase [Enzymatic activity/volume] in Serum or Plasma','1742-6','LFTs','Routine',27,'2015-02-26 13:54:03',0,0,'!#!!#!-%%%###%%%###',0,70,0,0,3,'ml'),(243,0,'Aspartate aminotransferase ','Aspartate aminotransferase [Enzymatic activity/volume] in Serum or Plasma','1920-8','LFTs','Routine',27,'2015-02-26 14:56:21',0,0,'!#!-%%%###',0,70,0,0,3,'ml'),(244,0,'Bilirubin (direct)','Bilirubin.direct [Mass/volume] in Serum or Plasma','1968-7','LFTs','Routine',27,'2015-02-26 15:03:21',0,0,'%%%###',0,70,0,0,3,'ml'),(245,0,'Bilirubin (total)','Bilirubin.total [Mass/volume] in Serum or Plasma','1975-2','LFTs','Routine',27,'2015-02-26 15:08:55',0,0,'%%%###',0,70,0,0,3,'ml'),(246,0,'Alkaline Phosphatase','Alkaline phosphatase [Enzymatic activity /volume] in Serum or Plasma','6768-6','LFTs','Routine',27,'2015-02-26 14:22:57',0,0,'!#!-%%%###',0,70,0,0,3,'ml'),(247,0,'Albumin','Albumin [Mass/Volume] in Serum or Plasma','1751-7','LFTs','Routine',27,'2015-02-26 14:09:06',0,0,'!#!-%%%###',0,70,0,0,3,'ml'),(248,0,'Gamma glutamyl transferase ','Gamma glutamyl transferase [Enzymatic activity/volume] in Serum or Plasma','2324-2',NULL,'Special',27,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,3,'ml'),(249,0,'Blood culture','Bacteria identified in Blood by Culture','600-7',NULL,'Routine',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,3,'ml'),(250,0,'CSF','Bacteria identified in Cerebral spinal fluid by Culture','606-4','CSF','Urgent',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,1,'ml'),(251,0,'Pleural fluid','Bacteria identified in Sputum by Respiratory Culture','624-7',NULL,'Routine',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,1,'ml'),(252,0,'Swabs','Bacteria identified in Unspecified specimen by Aerobe culture','634-6',NULL,'Routine',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(253,0,'Pus','Bacteria identified in Unspecified specimen by Anaerobe culture','635-3',NULL,'Routine',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(254,0,'Ascitic fluid','Bacteria identified in Peritoneal fluid by Culture','619-7',NULL,'Routine',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,1,'ml'),(255,0,'Urine culture','Bacteria identified in Urine by Culture','630-4',NULL,'Routine',33,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(256,0,'Malaria microscopy','Miscroscopic observation [identifier] in  Blood by Giemsa stain','51714-4',NULL,'Routine',26,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,1,'blood drop'),(257,0,'MRDT','Plasmodium sp Ag [identifier] in Blood by Rapid immunoassay','70569-9',NULL,'Routine',26,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(258,0,'Urine analysis','Ova and parasites identified in Unspecified specimen by Light microscopy','673-4',NULL,'Routine',26,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,5,'ml'),(259,0,'Stool analysis','Ova+Parasites identified in stool by Concentration','10701-1',NULL,'Routine',26,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,2,'gm'),(261,0,'HVS analysis','Cytology report or Cevical or vaginal smear or scraping Cyto stain.thin prep','47527-7',NULL,'Urgent',35,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(262,0,'Semen analysis','Ova and parasites identified in Unspecified specimen by Light microscopy','673-4',NULL,'Routine',26,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,0.5,'ml'),(263,0,'Sputum Tb microscopy','Microscopic observation [Identifier] in Unspecified specimen by acid fast stain','11545-1',NULL,'Routine',33,'2015-04-01 08:23:51',0,0,'!#!-%%%###',0,70,0,0,NULL,NULL),(264,0,'Malaria rapid diagnostic test','Plasmodium sp Ag [Identifier] in Blood by Rapid immunoassay','70569-9','MRDT','Routine',39,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(265,0,'Blood films','Blood smear finding [Identifier] in Blood by Light microscopy','5909-7','BF','Special',28,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(266,0,'Early infant diagnosis(HIV)','HIV 1 RNA [presence] in Unspecified specimen by Probe and target amplification method','5018-7','EID','Special',37,'2015-02-26 16:22:14',0,0,'!#!%%%###%%%###',0,70,0,0,4,'circles'),(267,0,'Viral load (HIV)','HIV 1 RNA [#/volume] (viral load) in Unspecified specimen by Probe and target Amplification method','25836-8','VL','Special',37,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,NULL,NULL),(268,0,'Influenza','Influenza virus A RNA [Presence] in Unspecified specimen by Probe and target amplification method','34487-9',NULL,'Special',37,'2015-02-26 16:24:29',0,0,'!#!%%%###%%%###',0,70,0,0,NULL,NULL),(269,0,'Measles & Rubella','Measles virus RNA [Presence] in Unspecified specimen by probe and target amplification method','48508-6',NULL,'Special',36,'2015-02-26 16:25:45',0,0,'%%%###',0,70,0,0,1,'ml'),(270,0,'CD4','CD4 T-cell absolute panel in Blood by Flow cytometry','65758-5',NULL,'Routine',38,'2015-02-26 13:02:19',0,0,NULL,NULL,70,NULL,0,3,'ml'),(271,0,'Xpert MTB/RIF','Run using the Gene Expert Machine','48176-2',NULL,NULL,33,'2015-04-01 11:27:57',0,0,'!#!-%%%###',0,70,24,0,NULL,NULL);
/*!40000 ALTER TABLE `test_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `measure`
--

DROP TABLE IF EXISTS `measure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `measure` (
  `measure_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `unit_id` int(10) unsigned DEFAULT NULL,
  `measure_range` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unit` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`measure_id`),
  KEY `unit_id` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measure`
--

LOCK TABLES `measure` WRITE;
/*!40000 ALTER TABLE `measure` DISABLE KEYS */;
INSERT INTO `measure` VALUES (1,'Cell Count',NULL,':',NULL,'2014-04-01 21:41:31',''),(2,'CD4 Count',NULL,':',NULL,'2014-04-02 05:49:30','cell/ul'),(3,'12',NULL,':',NULL,'2014-03-07 14:09:36',''),(4,'Nominal Result',NULL,'$freetext$$',NULL,'2014-03-17 22:16:50',''),(5,'CD8 Count',NULL,':',NULL,'2014-04-02 05:49:30','cell/ul'),(6,'Cell Percentage',NULL,':',NULL,'2014-04-22 13:09:45',''),(7,'cells/L',NULL,':',NULL,'2014-04-22 13:52:18',''),(8,'cells/L ',NULL,':',NULL,'2014-04-23 05:10:25',''),(9,'g/dL',NULL,':',NULL,'2014-04-23 05:13:59',''),(10,'Glucose',NULL,':',NULL,'2014-06-18 12:47:27','mmol/L'),(11,'mm/Hr',NULL,':',NULL,'2014-06-18 08:26:54',''),(12,'units/g',NULL,':',NULL,'2014-04-28 07:34:22',''),(13,'+/++/+++',NULL,'$freetext$$',NULL,'2014-04-29 07:22:38',''),(14,'mmol/L',NULL,':',NULL,'2014-04-29 07:44:34',''),(15,'mmol/d',NULL,':',NULL,'2014-06-18 12:27:04',''),(16,'mu/l',NULL,':',NULL,'2014-04-29 11:15:06',''),(17,'pvf',NULL,':',NULL,'2014-06-18 13:17:36',''),(18,'+++/scanty',NULL,'Not done/Negative/+++/++/+/Scanty (1-3) per 100/Scanty (4-6) per 100/Scanty (7-9) per 100/Scanty (1-5) per 40/Scanty (6-9) per 40/Scanty (10-14) per 40/Scanty (15-19) per 40',NULL,'2015-04-02 14:42:26',''),(19,'Noticed/Not-Noticed',NULL,'$freetext$$',NULL,'2014-04-29 13:03:49',''),(20,'Count',NULL,'$freetext$$',NULL,'2014-04-29 13:04:37',''),(21,'(Units)',NULL,'$freetext$$',NULL,'2014-05-06 08:44:23',''),(22,'Units',NULL,':',NULL,'2014-05-29 13:45:42',''),(23,'Test Units',NULL,':',NULL,'2014-06-17 16:07:43',''),(24,'U/L',NULL,':',NULL,'2014-06-18 12:06:00',''),(25,'umol/L',NULL,':',NULL,'2014-06-18 12:21:26',''),(26,'mmol/d',NULL,':',NULL,'2014-06-18 12:26:01',''),(27,'mg/dL',NULL,':',NULL,'2014-06-18 12:29:10',''),(28,'Âµg/I ',NULL,':',NULL,'2014-07-15 11:32:13',''),(29,'Glucose',NULL,':',NULL,'2014-07-25 20:15:51',''),(30,'Positive/Negative',NULL,'Positive/Negative',NULL,'2014-10-24 20:17:51',''),(31,'mg/dl',NULL,':',NULL,'2014-07-30 10:39:43',''),(32,'mg/dl',NULL,':',NULL,'2014-07-30 12:28:24',''),(33,'mgN/dl',NULL,':',NULL,'2014-07-30 11:54:43',''),(34,'mEq/L',NULL,':',NULL,'2014-07-30 11:56:07',''),(35,'U/L',NULL,'Positive/Negative',NULL,'2014-10-08 11:14:52',''),(36,'ng/ml',NULL,':',NULL,'2014-07-30 13:24:47',''),(37,'ng/dL',NULL,':',NULL,'2014-07-30 13:41:56',''),(38,'mcg/dL',NULL,':',NULL,'2014-07-30 13:47:54',''),(39,'mIU/L',NULL,':',NULL,'2014-07-30 13:51:06',''),(40,'mcL',NULL,':',NULL,'2014-07-31 04:31:44',''),(41,'%',NULL,':',NULL,'2014-07-31 04:51:22',''),(42,'u/g',NULL,':',NULL,'2014-07-31 04:54:23',''),(43,'Minutes',NULL,':',NULL,'2014-07-31 05:05:43',''),(44,'Seconds',NULL,':',NULL,'2014-07-31 05:07:06',''),(45,'Copies/mL',NULL,':',NULL,'2014-07-31 09:12:09',''),(46,'testing measure',NULL,':',NULL,'2014-10-10 13:42:39',''),(47,'ABO',NULL,'A/B/AB/O',NULL,'2015-02-26 13:12:52',''),(48,'Rh',NULL,'+/-',NULL,'2015-02-26 13:12:52',''),(49,'Enzymatic activity/volume(U/L)',NULL,':',NULL,'2015-02-26 13:50:14','U/L'),(50,'Enzymatic activity/volume(U/L)',NULL,':',NULL,'2015-02-26 13:50:14','U/L'),(51,'Enzymatic activity/volume(mckat/L)',NULL,':',NULL,'2015-02-26 13:50:14','mckat/L'),(52,'Enzymatic activity/volume(mckat/L)',NULL,':',NULL,'2015-02-26 13:50:14','mckat/L'),(53,'Mass/Volume(g/dL)',NULL,':',NULL,'2015-02-26 14:11:47','g/dL'),(54,'Mass/Volume(g/L)',NULL,':',NULL,'2015-02-26 14:11:47','g/L'),(55,'Enzymatic activity /volume(U/L)',NULL,':',NULL,'2015-02-26 14:22:17','U/L'),(56,'Enzymatic activity /volume(U/L)',NULL,':',NULL,'2015-02-26 14:56:21','U/L'),(57,'Mass/volume(mg/dL)',NULL,':',NULL,'2015-02-26 15:03:21','mg/dL'),(58,'Mass/volume(mcmol/L)',NULL,':',NULL,'2015-02-26 15:03:21','mcmol/L'),(59,'Mass/volume(mg/dL)',NULL,':',NULL,'2015-02-26 15:08:55','mg/dL'),(60,'Mass/volume(mcmol/L)',NULL,':',NULL,'2015-02-26 15:08:55','mcmol/L'),(61,'Mass/Volume(mg/dL)',NULL,':',NULL,'2015-02-26 15:44:39','mg/dL'),(62,'Mass/Volume(mcmol/L)',NULL,':',NULL,'2015-02-26 15:46:11','mcmol/L'),(63,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 15:56:54',''),(64,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:00:14',''),(65,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:15:23',''),(66,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:16:45',''),(67,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:18:05',''),(68,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:22:14',''),(69,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:24:28',''),(70,'Present/Absent',NULL,'Present/Absent',NULL,'2015-02-26 16:25:45',''),(71,'Xpert Result',NULL,'Not done/MTB not detected/MTB detected (RIF Resistant not detected)/MTB detected (RIF resistant detected)/MTB detected (RIF resistant Indeterminate)',NULL,'2015-04-02 14:44:43','');
/*!40000 ALTER TABLE `measure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_type_measure`
--

DROP TABLE IF EXISTS `test_type_measure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_type_measure` (
  `test_type_id` int(11) unsigned NOT NULL DEFAULT '0',
  `measure_id` int(11) unsigned NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `test_type_id` (`test_type_id`),
  KEY `measure_id` (`measure_id`),
  CONSTRAINT `test_type_measure_ibfk_1` FOREIGN KEY (`test_type_id`) REFERENCES `test_type` (`test_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `test_type_measure_ibfk_2` FOREIGN KEY (`measure_id`) REFERENCES `measure` (`measure_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type_measure`
--

LOCK TABLES `test_type_measure` WRITE;
/*!40000 ALTER TABLE `test_type_measure` DISABLE KEYS */;
INSERT INTO `test_type_measure` VALUES (263,18,'2015-02-04 09:30:11'),(222,47,'2015-02-26 13:12:52'),(222,48,'2015-02-26 13:12:52'),(242,49,'2015-02-26 13:50:14'),(242,51,'2015-02-26 13:50:14'),(247,53,'2015-02-26 14:05:14'),(247,54,'2015-02-26 14:05:14'),(246,55,'2015-02-26 14:22:17'),(243,56,'2015-02-26 14:52:26'),(244,57,'2015-02-26 15:03:21'),(244,58,'2015-02-26 15:03:21'),(245,59,'2015-02-26 15:08:55'),(245,60,'2015-02-26 15:08:55'),(240,61,'2015-02-26 15:44:39'),(240,62,'2015-02-26 15:46:11'),(231,63,'2015-02-26 15:56:54'),(227,64,'2015-02-26 16:00:14'),(229,65,'2015-02-26 16:15:23'),(230,66,'2015-02-26 16:16:45'),(234,67,'2015-02-26 16:18:05'),(266,68,'2015-02-26 16:22:14'),(268,69,'2015-02-26 16:24:28'),(269,70,'2015-02-26 16:25:45'),(271,71,'2015-04-01 06:56:17');
/*!40000 ALTER TABLE `test_type_measure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_panel`
--

DROP TABLE IF EXISTS `test_panel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_panel` (
  `parent_test_type_id` int(11) NOT NULL,
  `child_test_type_id` int(11) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_panel`
--

LOCK TABLES `test_panel` WRITE;
/*!40000 ALTER TABLE `test_panel` DISABLE KEYS */;
INSERT INTO `test_panel` VALUES (225,242,0),(225,247,0),(225,246,0),(225,243,0),(225,244,0),(225,245,0),(225,240,0),(225,235,0),(225,239,0),(225,238,0),(225,237,0);
/*!40000 ALTER TABLE `test_panel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_type_container_type`
--

DROP TABLE IF EXISTS `test_type_container_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_type_container_type` (
  `test_type_id` int(11) unsigned NOT NULL,
  `container_type_id` int(11) NOT NULL,
  KEY `fk_test_type_has_container_type_container_type1_idx` (`container_type_id`),
  KEY `fk_test_type_has_container_type_test_type1_idx` (`test_type_id`),
  CONSTRAINT `fk_test_type_has_container_type_container_type1` FOREIGN KEY (`container_type_id`) REFERENCES `container_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_type_has_container_type_test_type1` FOREIGN KEY (`test_type_id`) REFERENCES `test_type` (`test_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type_container_type`
--

LOCK TABLES `test_type_container_type` WRITE;
/*!40000 ALTER TABLE `test_type_container_type` DISABLE KEYS */;
INSERT INTO `test_type_container_type` VALUES (222,1),(222,9),(223,1),(223,9),(224,9),(225,1),(226,2),(227,1),(228,1),(229,9),(230,9),(231,9),(232,9),(234,9),(235,2),(237,9),(238,9),(239,9),(240,9),(242,9),(243,9),(244,9),(245,9),(246,9),(247,9),(248,9),(249,6),(249,7),(250,2),(251,2),(252,2),(252,8),(253,2),(253,8),(254,2),(255,2),(256,1),(257,1),(258,1),(259,2),(261,4),(262,2),(263,2),(264,2),(265,1),(267,1),(267,5),(269,9),(270,1),(271,2);
/*!40000 ALTER TABLE `test_type_container_type` ENABLE KEYS */;
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
-- Table structure for table `specimen_test`
--

DROP TABLE IF EXISTS `specimen_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specimen_test` (
  `test_type_id` int(11) unsigned NOT NULL DEFAULT '0',
  `specimen_type_id` int(11) unsigned NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lifespan` int(11) DEFAULT '4',
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
INSERT INTO `specimen_test` VALUES (242,26,'2015-02-03 09:46:01',4),(247,26,'2015-02-03 09:46:01',4),(246,26,'2015-02-03 09:46:01',4),(243,26,'2015-02-03 09:46:01',4),(244,26,'2015-02-03 09:46:01',4),(245,26,'2015-02-03 09:46:01',4),(224,26,'2015-02-03 09:46:01',4),(249,26,'2015-02-03 09:46:01',4),(265,26,'2015-02-03 09:46:01',4),(222,26,'2015-02-03 09:46:01',4),(270,26,'2015-02-03 09:46:02',4),(223,26,'2015-02-03 09:46:02',4),(240,26,'2015-02-03 09:46:02',4),(228,26,'2015-02-03 09:46:02',4),(225,26,'2015-02-03 09:46:02',4),(248,26,'2015-02-03 09:46:02',4),(235,26,'2015-02-03 09:46:02',4),(231,26,'2015-02-03 09:46:02',4),(232,26,'2015-02-03 09:46:02',4),(256,26,'2015-02-03 09:46:02',4),(269,26,'2015-02-03 09:46:02',4),(257,26,'2015-02-03 09:46:02',4),(234,26,'2015-02-03 09:46:02',4),(239,26,'2015-02-03 09:46:02',4),(227,26,'2015-02-03 09:46:02',4),(238,26,'2015-02-03 09:46:02',4),(230,26,'2015-02-03 09:46:02',4),(237,26,'2015-02-03 09:46:02',4),(258,26,'2015-02-03 09:46:03',4),(229,26,'2015-02-03 09:46:03',4),(250,27,'2015-02-03 09:48:53',4),(226,27,'2015-02-03 09:48:53',4),(226,36,'2015-02-03 09:49:41',4),(226,32,'2015-02-03 09:50:07',4),(254,32,'2015-02-03 09:51:24',4),(226,35,'2015-02-03 09:52:46',4),(263,35,'2015-02-03 09:52:46',4),(226,30,'2015-02-03 09:53:04',4),(261,33,'2015-02-03 09:53:53',4),(251,28,'2015-02-03 09:55:19',4),(259,31,'2015-02-03 09:56:04',4),(252,30,'2015-02-03 09:56:46',4),(252,29,'2015-02-03 09:57:06',4),(252,31,'2015-02-03 09:57:30',4),(253,31,'2015-02-03 09:58:04',4),(253,29,'2015-02-03 09:58:19',4),(253,34,'2015-02-03 09:58:47',4),(252,34,'2015-02-03 09:58:47',4),(263,28,'2015-04-01 13:09:03',8),(266,26,'2015-02-26 16:22:15',4),(268,26,'2015-02-26 16:24:29',4),(271,35,'2015-04-01 07:01:07',4),(271,28,'2015-04-01 13:09:03',8);
/*!40000 ALTER TABLE `specimen_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `measure_mapping`
--

DROP TABLE IF EXISTS `measure_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `measure_mapping` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `measure_name` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
  `lab_id_measure_id` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
  `measure_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`measure_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measure_mapping`
--

LOCK TABLES `measure_mapping` WRITE;
/*!40000 ALTER TABLE `measure_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `measure_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specimen_custom_data`
--

DROP TABLE IF EXISTS `specimen_custom_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specimen_custom_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` int(11) unsigned NOT NULL DEFAULT '0',
  `specimen_id` int(10) unsigned NOT NULL DEFAULT '0',
  `field_value` varchar(45) NOT NULL DEFAULT '',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `specimen_id` (`specimen_id`),
  CONSTRAINT `specimen_custom_data_ibfk_1` FOREIGN KEY (`specimen_id`) REFERENCES `specimen` (`specimen_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specimen_custom_data`
--

LOCK TABLES `specimen_custom_data` WRITE;
/*!40000 ALTER TABLE `specimen_custom_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `specimen_custom_data` ENABLE KEYS */;
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
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `unit_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(45) NOT NULL DEFAULT '',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-07  9:16:12
