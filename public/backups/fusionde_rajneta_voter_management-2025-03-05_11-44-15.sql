-- MySQL dump 10.13  Distrib 5.7.23-23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: fusionde_rajneta_voter_management
-- ------------------------------------------------------
-- Server version	5.7.23-23

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
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'salkia','2025-01-07 04:42:50','2025-01-07 04:42:50'),(2,'kolkata1','2025-01-07 04:44:53','2025-01-07 04:44:53'),(3,'kolkata2','2025-01-08 04:11:46','2025-01-08 04:11:46'),(4,'kolkata3','2025-01-08 05:17:28','2025-01-08 05:17:28');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `politician_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_logo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin',NULL,'admin@admin.com','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$dbpiX2scXZaiWaYOrbEHDeJqA7F4MJfUc6tR7ZoVmY5ffqUdVn5oi',NULL,'2024-10-21 01:24:37','2024-10-21 01:24:37'),(8,'Politician1',NULL,'politician1@gmail.com','politician','50','male','candidate_images/1729505619_download (1).jpg','1234567890','Howrah','Sade Lester','party_logo_images/1729505619_property2.jpg',NULL,'$2y$10$tGsnxSw1RqpJrl6igHjmVOUB2rkmBNbtcCywAF1rckowKdX1lFZOe',NULL,'2024-10-21 04:43:39','2024-10-21 04:43:39'),(10,'Politician2',NULL,'politician2@gmail.com','politician','50','male','candidate_images/1732787557_download (2).jpg','5635656345','Howrah','Demo Party','party_logo_images/1732787557_soham.png',NULL,'$2y$10$CwCF3jaRY2o9w6nrAC7rGuMuQdjpNKok38lOV1xGCJjcktcdG7KWW',NULL,'2024-11-28 04:22:38','2024-11-28 04:22:38');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bluetooth_slip_permissions`
--

DROP TABLE IF EXISTS `bluetooth_slip_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bluetooth_slip_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` tinyint(1) DEFAULT NULL,
  `booth` tinyint(1) DEFAULT NULL,
  `address` tinyint(1) DEFAULT NULL,
  `house_no` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bluetooth_slip_permissions`
--

LOCK TABLES `bluetooth_slip_permissions` WRITE;
/*!40000 ALTER TABLE `bluetooth_slip_permissions` DISABLE KEYS */;
INSERT INTO `bluetooth_slip_permissions` VALUES (1,1,0,0,1,'2025-03-03 04:20:04','2025-03-03 04:26:39');
/*!40000 ALTER TABLE `bluetooth_slip_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `castes`
--

DROP TABLE IF EXISTS `castes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `castes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `caste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `castes`
--

LOCK TABLES `castes` WRITE;
/*!40000 ALTER TABLE `castes` DISABLE KEYS */;
INSERT INTO `castes` VALUES (1,'hindu','2025-01-07 06:08:47','2025-01-07 06:08:47'),(2,'brahmin','2025-01-07 06:14:04','2025-01-07 06:14:04'),(3,'Jain','2025-01-08 06:58:06','2025-01-08 06:58:06');
/*!40000 ALTER TABLE `castes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_information`
--

DROP TABLE IF EXISTS `extra_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voter_user_id` bigint(20) unsigned NOT NULL,
  `extra_info_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_1_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_1_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_2_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_2_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_3_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_3_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_4_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_4_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_5_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_info_5_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_check_1` tinyint(1) NOT NULL DEFAULT '0',
  `extra_check_2` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `extra_information_voter_user_id_foreign` (`voter_user_id`),
  CONSTRAINT `extra_information_voter_user_id_foreign` FOREIGN KEY (`voter_user_id`) REFERENCES `voters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_information`
--

LOCK TABLES `extra_information` WRITE;
/*!40000 ALTER TABLE `extra_information` DISABLE KEYS */;
INSERT INTO `extra_information` VALUES (1,1,'First extra Information','First extra Information_mr','First extra Information_hi','Second extra Information',NULL,NULL,'Third extra Information',NULL,NULL,'Fourth extra Information',NULL,NULL,'Fifth Extra information',NULL,NULL,1,1,'2024-11-28 00:28:34','2025-02-18 04:57:29'),(2,2,'helo',NULL,NULL,'hello',NULL,NULL,'helo',NULL,NULL,'helo',NULL,NULL,'helo',NULL,NULL,1,0,'2024-11-28 00:34:01','2024-11-29 04:55:36'),(3,4,'information',NULL,NULL,'helo second information',NULL,NULL,'information',NULL,NULL,'information',NULL,NULL,'hii',NULL,NULL,0,0,'2024-11-28 00:34:14','2024-11-28 00:34:14'),(4,5,'demo1','demo1_mr','demo1_hi','demo2','demo2_mr','demo2_hi','demo','demo_mr','demo_hi','demo','demo_mr','demo_hi','demo','demo_mr','demo_hi',1,0,'2024-11-28 00:34:29','2024-12-06 07:54:32'),(5,6,'demo',NULL,NULL,'helo second information',NULL,NULL,'information',NULL,NULL,'information',NULL,NULL,'hii',NULL,NULL,0,1,'2024-11-28 00:34:47','2024-11-29 04:48:10'),(6,12,'demo',NULL,NULL,'demo2',NULL,NULL,'demo',NULL,NULL,'demo',NULL,NULL,'demo',NULL,NULL,1,0,'2024-11-28 00:50:53','2024-11-28 00:50:53'),(7,13,'extra information first','प्रथम अतिरिक्त माहिती','पहले अतिरिक्त जानकारी','extra information second','अतिरिक्त माहिती सेकंद','अतिरिक्त जानकारी दूसरा','extra information three','अतिरिक्त माहिती तीन','अतिरिक्त जानकारी तीन','extra nformation four','अतिरिक्त माहिती चार','अतिरिक्त जानकारी चार','extra information five','अतिरिक्त माहिती पाच','अतिरिक्त जानकारी पाँच',0,0,'2024-12-24 00:59:37','2024-12-24 00:59:37'),(8,14,'one','एक','एक','two','दोन','दो','three','तीन','तीन','four','चार','चार','five','पाच','पाँच',0,0,'2024-12-24 00:59:51','2024-12-24 00:59:51'),(9,15,'Minus tempora volupt','आनंदाच्या कमी वेळा','आनंद के कम समय','Ut quis eveniet nos','आमच्या बाबतीत घडणारे कोणीतरी म्हणून','किसी ऐसे व्यक्ति के रूप में जो हमारे साथ घटित होता है','Ducimus omnis sunt','आपण सर्व नेते आहोत','हम सब नेता हैं','Veniam velit dolore','त्याला वेदना घेऊन यायचे आहे','वह दर्द लेकर आना चाहता है','Eu aliquid dolore el','त्याला थोडे दुखले होते','उसे थोड़ा दर्द हुआ',0,0,'2024-12-31 01:34:04','2024-12-31 01:34:04'),(10,16,'test first','प्रथम चाचणी','पहले परीक्षण करें','test second','दुसरी चाचणी',NULL,'test third','चाचणी तिसरी','तीसरा परीक्षण','test fourth','चौथी चाचणी','चौथा परीक्षण','test fifth','पाचवी चाचणी','पांचवां परीक्षण',1,1,'2025-01-19 23:30:16','2025-01-19 23:34:43'),(11,17,'demo informartion first','प्रथम डेमो माहिती','सबसे पहले डेमो सूचना','demo informartion second','डेमो माहिती दुसरा',NULL,'demo informartion third','डेमो माहिती तिसरी','डेमो सूचना तीसरा','demo informartion fourth','डेमो माहिती चौथा','डेमो सूचना चौथा','demo informartion ffth','डेमो माहिती ffth','डेमो सूचना ffth',0,1,'2025-01-19 23:50:48','2025-01-19 23:51:53');
/*!40000 ALTER TABLE `extra_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyakarts`
--

DROP TABLE IF EXISTS `karyakarts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karyakarts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `karyakarta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyakarts`
--

LOCK TABLES `karyakarts` WRITE;
/*!40000 ALTER TABLE `karyakarts` DISABLE KEYS */;
INSERT INTO `karyakarts` VALUES (4,'dk','2025-01-07 05:23:19','2025-01-07 05:23:19'),(5,'mm','2025-01-07 05:28:04','2025-01-07 05:28:04'),(6,'manager','2025-01-08 05:47:22','2025-01-08 05:47:22'),(7,'Ram','2025-01-08 06:03:30','2025-01-08 06:03:30');
/*!40000 ALTER TABLE `karyakarts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_permissions`
--

DROP TABLE IF EXISTS `master_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_master` tinyint(1) NOT NULL DEFAULT '0',
  `address_master` tinyint(1) NOT NULL DEFAULT '0',
  `karyakarta_master` tinyint(1) NOT NULL DEFAULT '0',
  `caste_master` tinyint(1) NOT NULL DEFAULT '0',
  `position_master` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `master_permissions_user_id_foreign` (`user_id`),
  CONSTRAINT `master_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_permissions`
--

LOCK TABLES `master_permissions` WRITE;
/*!40000 ALTER TABLE `master_permissions` DISABLE KEYS */;
INSERT INTO `master_permissions` VALUES (1,1,'appuser',1,1,1,1,1,'2025-02-28 04:56:52','2025-02-28 05:10:38'),(2,4,'appuser',0,0,1,0,0,'2025-02-28 05:15:13','2025-03-03 03:35:15'),(3,5,'appuser',1,0,0,0,0,'2025-02-28 05:15:47','2025-02-28 06:52:12'),(4,7,'appuser',1,1,1,1,1,'2025-02-28 05:16:00','2025-02-28 05:16:00'),(5,8,'appuser',1,1,1,1,1,'2025-02-28 05:17:13','2025-02-28 05:57:12'),(6,9,'appuser',0,0,1,1,1,'2025-02-28 05:17:34','2025-02-28 05:17:34'),(7,10,'appuser',1,1,1,1,1,'2025-02-28 05:18:15','2025-02-28 05:18:15'),(8,11,'appuser',1,1,1,1,1,'2025-02-28 05:42:14','2025-02-28 05:48:54'),(9,26,'appuser',0,0,0,0,0,'2025-03-04 11:08:02','2025-03-04 11:08:41');
/*!40000 ALTER TABLE `master_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2019_12_14_000001_create_personal_access_tokens_table',1),(10,'2024_05_20_054910_create_admins_table',1),(11,'2024_10_22_085358_create_user_addresses_table',2),(12,'2024_10_22_090009_create_extra_information_table',3),(13,'2024_10_22_132627_create_voters_table',4),(14,'2024_10_23_064409_create_permissions_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_addresses`
--

DROP TABLE IF EXISTS `new_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voter_user_id` bigint(20) unsigned NOT NULL,
  `new_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_address_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_address_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `new_addresses_voter_user_id_foreign` (`voter_user_id`),
  CONSTRAINT `new_addresses_voter_user_id_foreign` FOREIGN KEY (`voter_user_id`) REFERENCES `voters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_addresses`
--

LOCK TABLES `new_addresses` WRITE;
/*!40000 ALTER TABLE `new_addresses` DISABLE KEYS */;
INSERT INTO `new_addresses` VALUES (1,1,'kolkata1','kolkata_mr',NULL,'2024-12-18 23:15:03','2024-12-19 02:03:35'),(2,2,'kolkata2',NULL,NULL,'2024-12-18 23:25:50','2024-12-18 23:25:50');
/*!40000 ALTER TABLE `new_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('0199e83b428832a7644fe4fa7d0799992d4209d9e773bbf8166e40c2fd8301fbccdda0a3fcea8a2b',22,'9d4e701d-bab6-462e-b6db-6fdb326c293c','niG7BUNhbT8QdcvDTUafIe4gA8TvtkkF2yCMejTwM0f6Z76sA0','[]',0,'2025-01-20 02:17:31','2025-01-20 02:17:31','2026-01-20 07:47:31'),('01a0351e47181c3eea98acc277129683e91c94d7c62fdb53256230055f4bcf74b03664c122e80395',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','dhwYAEs4YHQzKriFNEoXSenFk4LGKCKp2iuTzbeLffdhlShpdc','[]',0,'2024-11-25 04:15:08','2024-11-25 04:15:08','2025-11-25 09:45:08'),('02007e4cdd034546cbb9d96d19c91093d6ae1941cbd4e276dd8b80370b138cfbcfc8ca9e9ce92ed3',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Wl2Mgi2O44J3R5GuIOumPuCDCIOMFqEJg2rijuzJSKXuEJ5L7j','[]',0,'2025-01-20 07:11:43','2025-01-20 07:11:43','2026-01-20 12:41:43'),('03c43e975ed40d8c26e80d6d0840311ef5efeb237a283b79fe43928ab0f515db2fa4120e1b4bd5d2',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','8LrEmiuNQot7PA206ZF8Pe9V6rrRiqyWftAPBxZzGWGrevSpgN','[]',0,'2024-12-06 00:40:06','2024-12-06 00:40:06','2025-12-06 06:10:06'),('046890fba8943acd6ed139b5445e0cea2a2222f8a0df2edb0180d0e0320659752d9ddc86be77270e',12,'9d4e701d-bab6-462e-b6db-6fdb326c293c','u3pawo9poYgVc4T8PjMXHBCfqzPWaAUpmcrfxPkQTfVY7CESQU','[]',0,'2024-11-26 00:58:38','2024-11-26 00:58:38','2025-11-26 06:28:38'),('04b1130ee119d614ee6ac54d5a107f536baa62eb3e375559e2169531466e3c555478bc2ba361c3a5',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2E06pck6WYPzwx5vJDqkDaYozFc2MW6LIumFWI0eFzbkQ09R8a','[]',0,'2025-01-15 23:49:15','2025-01-15 23:49:15','2026-01-16 05:19:15'),('05a64b471f91c79edc79f3e880541e91c56b72a51bf7c8591ae55a8cd8907f88fde6f927982de123',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','YPaXW8JB42lEHm5RA7jgj2LAVjVlswbS9aFsptBybpMQ9nxOKJ','[]',0,'2025-01-15 23:51:31','2025-01-15 23:51:31','2026-01-16 05:21:31'),('061a79a9f5597d515c7872052cae4ed2f814ce6f9bc9e6b97cbe24c4f802b27939ab8508c1e94718',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','gMK6LM3ntNZxJJz4m4qwrz5LVTBl1eYesAwjF25M4fyCSNJaqt','[]',0,'2024-12-03 04:24:54','2024-12-03 04:24:54','2025-12-03 09:54:54'),('0851f19778dfb4bc0fa7bffcb72e9c355f60b509a1454b904b0958ecf1c93da307d0fcf88d1816f8',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','FSHJqsoW2RBLlSdEzLMBIbQm6H5IeNvsss0ZbRssdzW8qYLxgm','[]',0,'2024-11-29 10:09:27','2024-11-29 10:09:27','2025-11-29 15:39:27'),('0888f779057c3dd6a42327d97d0e41b00c02634d449e9c98f49142a1400507913709ed44ceae1106',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','qMVNJBZAtsLysKtUYkAeDXjiNGTfA0pGaeHENm7RmkGrnjrR41','[]',0,'2024-12-06 05:51:54','2024-12-06 05:51:54','2025-12-06 11:21:54'),('0cd5cc7fc02f9e52f6df88a3b1055ea6651c1f741d7b6ef8a372d634a78a5fc504d82b27de5dc916',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','zDelteclYf5aZHhOuc9UYKWsICDmRMN0AFpjxI7nbG896hD2Jj','[]',0,'2024-12-05 07:52:06','2024-12-05 07:52:06','2025-12-05 13:22:06'),('0d7c46cb555cef74ef41aed676a8a28e98cf44806d7900b86cf447e8cf5924e6e71a6ee3c5422323',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','sdLis2rG2u8c8QXLYWVxFOErvmXHeuWDys6RwAkQlJI1Do19Ic','[]',0,'2024-11-25 04:41:27','2024-11-25 04:41:27','2025-11-25 10:11:27'),('0e7708470d7509074a92ae2bd29c402401ad36294aff7a265c885bd273f264b7be9deef828e9419b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','pCnjY96GlPpOsSsM5LhmU7fAsbbLaiKfZ1rFTbtlmUU1C26AeO','[]',0,'2024-12-23 01:53:29','2024-12-23 01:53:29','2025-12-23 07:23:29'),('0f5ffe2cbb45dfe20abe6920fb488388b6368dabad2f3f08db5286745c42e7f5d6759a47b80ee7a8',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','7SUJIaDw1ZgXhejNERWdtNLVjuXQrOPfxSKCvg9deTrfdLfaaF','[]',0,'2025-01-17 06:50:52','2025-01-17 06:50:52','2026-01-17 12:20:52'),('1011521e683aba5d901406a96a6991fb2768bd1ceb892eaee20a96540452d14d59a4f864c39c8a32',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','HIuYPGRZQVbu7nKoNnRV7OrJ1EStC4x0M7xeIyU59varEFEtYv','[]',0,'2024-12-03 05:49:04','2024-12-03 05:49:04','2025-12-03 11:19:04'),('111dc2fc331b06949e080d13b428381d756308d5e40c53be9208c539e41c0d7bf9bd84fd36c943fc',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','gvttNoxbdHFlAnGfIaU8DOT5MQoZG31cPkdwiaRA2jNtKcSKPj','[]',0,'2025-01-14 09:15:32','2025-01-14 09:15:32','2026-01-14 14:45:32'),('14294861aeba9a2a82b988a5ceb4881e77692bc2cdb69d26ddfd82ab031babea9fa96c6c5b71fc53',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','IY2wHl2TvLRpfVaq4CqDYl0ACG7mVyFiq8iOXjfHPlFfTYqItS','[]',0,'2024-12-23 02:21:06','2024-12-23 02:21:06','2025-12-23 07:51:06'),('15502abbbfd335fcb466c67c55fae21a4e05091b5eddbb3481930486005692c215c170f734575e96',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','BGxTV5W5xlQ8TOZLrZqNs1y5PD4cwS3KGajsKg3cCw4JmTcY9b','[]',0,'2024-11-25 05:14:45','2024-11-25 05:14:45','2025-11-25 10:44:45'),('164670125678524e142f7e2641ada5ab68ecaceba7ad308c21e2b78c045e1b958fcef40f60dc74db',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','gQ0msxeBFl34MhtYQnSL8WGLV5gQrouiE4QXung5uhrEKju1a9','[]',0,'2025-01-20 01:52:32','2025-01-20 01:52:32','2026-01-20 07:22:32'),('17c1bf3eb8ddf2411fdffa56b5670372344a8c9ed4ff14a80c45f8de9b44658796fded0320156287',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Yje2jpkoQawZWvlE6q3IBzvQgz44ubtskzlPjMZZm0TkGZmCVo','[]',0,'2024-12-06 05:46:28','2024-12-06 05:46:28','2025-12-06 11:16:28'),('1a4c17c9e5e7fee7673ac4b8c27657695a433c09934d913d9baab9b4966a7d74f3a39104861ac5df',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','I4dVOepfGoP120bcviXdyreA53qWpZT71telk1ZrcGDpB94to6','[]',0,'2024-11-29 19:49:38','2024-11-29 19:49:38','2025-11-30 01:19:38'),('1bc4563db1517c2172473ed05a4f19216c5c42b2faf1dc6e1fa0c2682bef0b6cf7945c5a0e2b4c94',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','JHnK6KdujS5Ih3b90grZ2AtLiEFl91d0EX4vWjbU2G8HPxkoae','[]',1,'2025-01-20 06:47:33','2025-01-20 06:58:33','2026-01-20 12:17:33'),('1d40710797833d1cd8fb74637c5109a6564fbddb6579096b646c852409c731068398e18b8f01d162',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','8VAYusqSJVKXptsW67oDKtoRaElsZT3258qYOqlhp5iervsWmq','[]',0,'2024-12-12 23:56:53','2024-12-12 23:56:53','2025-12-13 05:26:53'),('1d987b64ac0889aba3339e74f1cfb4d3c1f7af738b0afc5f17d0b1d82f827bce856745089968a37f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','u47Q71EvVeBId59xmUyUlCwv0ktxXr0kY9uAwTvTm9GgMevqTc','[]',0,'2024-11-29 10:05:27','2024-11-29 10:05:27','2025-11-29 15:35:27'),('1dfb770cef7fd9e914391d2d7614b686ef359e6c81c46d906e59c7a0161e2fcbd231cae4499ec677',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','DFrTMSvInwLOrnaFY1ryDPi5e5JIw4dDWT8GSIWb8Dm1tqeHwS','[]',0,'2024-11-25 04:40:04','2024-11-25 04:40:04','2025-11-25 10:10:04'),('1e2adfa38cb5b595dc941111ac83e48888b2b2ae34ea391431a9d068000c593cd74d4eecefcb00fa',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','iMo3hIWc83sNFat6ua8rBN4arekgugoFh0HNA9ZcqYZSDMKpS2','[]',0,'2024-12-13 08:15:54','2024-12-13 08:15:54','2025-12-13 13:45:54'),('27f4aefd08c57888303fb657d080f1fb121d27cb6013e635e9bd8bfff0a9e968d77218fedbaf25f8',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ZMdLwWiwvBvgX8DeC77KROoKeUN7NyRH5TJt2StR3A9XNbNVW4','[]',0,'2024-12-13 08:15:54','2024-12-13 08:15:54','2025-12-13 13:45:54'),('2ade0c421b18ecfa54513c00c6c99b313839d91b71afbaffef39adb8e8a61a41e26911f1fe53c926',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','1hpOCPR1gBuVXknOFm1RV9Wl7aQX2mGmJln3U974Wld9SZFK4F','[]',0,'2025-01-20 01:42:36','2025-01-20 01:42:36','2026-01-20 07:12:36'),('2eeff1f33b231e94b040ca39c690e70a313f3eff88eac4d445c9e90e7a3e7924af5011e174582e04',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','w5Vl44agCtJbdU2Q7qoGXn5zLSXTw2KD8at3xkDtyHTQWYobbL','[]',0,'2025-03-04 05:01:22','2025-03-04 05:01:22','2026-03-04 10:31:22'),('2ff7a28c213685d7f2a53fc337722ecbdf3ca4a01d31fc32ff4af49e19a045a165d1c0971ddb024b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','alVJU1x2Dpc5ZYehpi6zWjw7FKGl9XsJ2TdXXWUmuuCHNQW0Vj','[]',0,'2024-12-10 11:05:12','2024-12-10 11:05:12','2025-12-10 16:35:12'),('31a6ef3e5e13b7568d1da0e0bcf940346da12bc827ec714792c80d9efff1440735731328e254446a',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','S79PqYNl6b50VDbUdfd7pT2WJ4vl7BWInzCGpSmRRKL2ACBPk1','[]',0,'2024-11-27 02:28:17','2024-11-27 02:28:18','2025-11-27 07:58:17'),('32a5bf921747b6830479196eccd9ebaae306d61ec8d9f7868b881aeab1eed2d0b70ce7bc026e72f9',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Q6IyGDQOwJW1hnkSe8Av0DLLnABkQt03xmuUPmhuhqTx0CVda6','[]',0,'2025-01-21 00:57:20','2025-01-21 00:57:20','2026-01-21 06:27:20'),('3307f21fb965fe9e20f2e729c26a060f3d9c980abbc9c342485913a4ca8816e68bbc43ec1c3293b0',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','mJB9xpkYI06mnvz4xseqK2MisCDKiFNSWdhOihudBH8k3d5Fsl','[]',0,'2025-01-17 05:01:25','2025-01-17 05:01:25','2026-01-17 10:31:25'),('36048bae379104d0596cee8e03bdf9177a1bc3bbeb676b8b9060be62b1278807f734a00108f6b33d',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','mBEK8X4XhJaHZgPOQI1zUxevYWJdmM3tbd62U6yaF58tdPV9DX','[]',1,'2025-01-20 05:05:05','2025-01-20 05:10:15','2026-01-20 10:35:05'),('382af4417b6a7e10e90b385b2b09a8b369e31282c8bdc96f06670f9c57bb363fcaaaa5705eb2750b',21,'9d4e701d-bab6-462e-b6db-6fdb326c293c','9PxENCsdzMdUh94tOMvCnSZOOsil8ELT7Ei8eJiZAZ4nqDz1o6','[]',0,'2025-01-20 01:52:45','2025-01-20 01:52:45','2026-01-20 07:22:45'),('3987f741eaac339d7cc4d93760c24213322b1e0736db7402649c10af674f527b430d5b9241ba329e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','LAaKcfnmz1zWYJJhVK2A7K4SLzbE7wGLVPpCusSrFkc658g4VH','[]',0,'2025-03-04 11:06:21','2025-03-04 11:06:21','2026-03-04 16:36:21'),('39f0b208af6e5f473ce3d1e232ae44f22aec3d4d49c397a361e35df7949b78724d0a97c43493f2c3',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','KKzaEqAnabl2HVbtKQ23PW0w8cWTMeIgCH7AHVwoiuCxV1cyhr','[]',0,'2024-12-03 04:16:25','2024-12-03 04:16:25','2025-12-03 09:46:25'),('3a5610d05b904ae90dda4ec7ed6ec1898a028ba86757eeaae656270036f23a702640cd820648ed0b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','45X4MYEvtsIwG9kDMnWH0yRPuUlqPrUXr4BDFKCkd2hKCuLzy0','[]',0,'2024-12-10 09:26:49','2024-12-10 09:26:49','2025-12-10 14:56:49'),('3ba49a4aea66a68aa43c6a98e6fccc57fc010312e6b0ef772e372ba6d3f8cce17ba175b1b946f0a2',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ytOCuz1yBdiGewfK9Dud0ZsevT41hkiqvG9dxr0F9VRv1cFDZf','[]',0,'2024-12-27 04:44:20','2024-12-27 04:44:20','2025-12-27 10:14:20'),('3cdb931f5ed08333064ab20be9bbfeffb4e5a2aafe7082d0c71ff57cea6ddc329dc2b0f25f25db93',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','BhJMXXKNKN1f4DLCOARVw45wddB6VAtZpUHvddM0sVqAP7wKV5','[]',0,'2025-01-08 02:13:09','2025-01-08 02:13:09','2026-01-08 07:43:09'),('3de66c877ef8a8d5ad1fb203f5bd657e12bea0a6a5b65719670db05d2cca99ab1c518785f238a8b2',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Y1azludO5QyghCBTdeGC3okVOwWixBUVeNYjwzSlcNQZwYAUvv','[]',0,'2025-03-03 04:08:17','2025-03-03 04:08:17','2026-03-03 09:38:17'),('3dfbc576847931b45e84c2f301b2f8e0e20b83c4bdab3262be826c7809d7f997f79f722289aa2a0f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','NnrDkYHjFgsEXuiQ5HBlHXqlZ4fIwlMsd39wdk3UEaDJG49F4s','[]',0,'2024-11-25 05:35:57','2024-11-25 05:35:57','2025-11-25 11:05:57'),('3e073c29e309681b5133146eda50a5cec1a3f680d4e2db67762af6991634e7268be5321fdb963b4b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bt9qvg5P1tP8nkJ1W4bTCEJGYDStBtgKvMQ7y4J5QHlZKS51Ze','[]',0,'2025-01-13 01:10:13','2025-01-13 01:10:13','2026-01-13 06:40:13'),('3e0c578926ac2c0508587c9f04300e2f9ba174a492e3f9e9a9a691c83270b12a6b4acc117b91ecec',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','yUiZVBl8bQCsuSUb8godjhx7ntjO5Z1dn1svo1O6k2F5SbeqFV','[]',0,'2025-01-13 08:06:23','2025-01-13 08:06:23','2026-01-13 13:36:23'),('3f5a45fc2b31de63434b30d6c207a01f8a98ce880d51e3582107da132c548493e65214bba0ac82ca',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','EdRCjGbzOlUy1Hdnr4KKqynZmUK580he3BBMc67xFSkMvfSZWe','[]',0,'2024-12-11 08:21:03','2024-12-11 08:21:03','2025-12-11 13:51:03'),('402ea4a132ee2c407789dc1445ab90681785949cbdcb5677249f49d1f8d6185e2a771e92926d437c',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Bu5Oi8MAdD5V9iO5tu8WrTFyXGJWIQ8c06RE12ILAUd8eIHPP7','[]',0,'2024-11-25 04:41:08','2024-11-25 04:41:08','2025-11-25 10:11:08'),('4112fbce60ce86474e77aec0e54a6ea45dc18df57123bbf2a862c989671740c35eecf782a9900b58',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','OPVqm6q1XZDgymjUxsfoRbHoK16KQCjc008C1djk0Hcd5dW9b8','[]',0,'2024-12-23 03:50:35','2024-12-23 03:50:35','2025-12-23 09:20:35'),('425461f3f795e950324308990d4ecec1a91ca3137dbd32e3e577c9033e55978a664c03c7557c97d0',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ZEftvI8jwgATrbWR7s5eWRnZQ71fZ5jw8mg6Ship0XEB5zHODy','[]',0,'2024-11-28 07:42:27','2024-11-28 07:42:27','2025-11-28 13:12:27'),('4257a2593c493c85d26b1254865301608c195f27c175dd1201161f3d2cd70fd577ce503c1e6fe1f3',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2GsXLBIvtnd8CVbLi2jwgG14U5oobTukAL7Hx4OHCra2goZCBO','[]',0,'2024-12-20 00:21:40','2024-12-20 00:21:40','2025-12-20 05:51:40'),('4263c46df172896c15d7dee7c495e6f24e2d004b28357004f9471fcf47484f4b0f9c4589ac47dbcf',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','VK6JVUOSSE5IjJvK2KPxChmr6KefEpjJdQXM6WHssQPZGIiANf','[]',0,'2024-11-25 05:18:10','2024-11-25 05:18:10','2025-11-25 10:48:10'),('42a6bb61b42d10d51ef977a660a3cebaa914ef9acba9fcb1761e98109323db1ff8ccc3ce6d3c8811',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','7RfLUnvvOkC3QvTNoNNQBcRVJrh72wF8jdVYpk3lNKpNdhlZY8','[]',0,'2024-11-25 04:47:11','2024-11-25 04:47:11','2025-11-25 10:17:11'),('476b1f048a56b4b4e95116e8fb52bd3f23abb533d9ad07e7b22def86bcd93a9f070985f7488ee388',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','1FygtUQi6RajfKIvsmCqaenHUDdBnJlKl7ETepaSzXLcOFI4sr','[]',0,'2025-01-10 01:21:44','2025-01-10 01:21:44','2026-01-10 06:51:44'),('48d35cab5d28ce970b7845c72322947e64cfc045724aa13533e085cd0748ed24d2e3a26610e34f4a',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','0QxLH48il1adba88IekxjWqCylsLnAgf2HkBFB26ZR3fTW8awK','[]',1,'2025-01-20 07:10:23','2025-01-20 07:18:39','2026-01-20 12:40:23'),('48ef1f676939d99244bf3d0b905339b4565e3c033d0576dcf3ccb7b53fc497aa16b24cce8ec1c8b1',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','fmtSj4Y9XYoeOM7z44HYmXXAx09wXuee42Zz7bspJIofg0BFTP','[]',0,'2025-01-20 07:18:55','2025-01-20 07:18:55','2026-01-20 12:48:55'),('49a3e55c49a268c9acffdfa06dc9f94a8e59368268504ca7d643f4c57a381efbe103dbba514b0c5e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','BV8aIsbYsZMkzOF7yjBpLxShUD2cPrF5hhWqmOLw72pXWbH4zB','[]',0,'2025-02-19 03:58:28','2025-02-19 03:58:28','2026-02-19 09:28:28'),('4ab8a6329136c56de1f34952e898d4d8351ae8f983614a4cbaec7bc7affd1b3c5298950bea15f643',22,'9d4e701d-bab6-462e-b6db-6fdb326c293c','IdcSj76lQnNUkbka1yz6JYDbGhwKqfnC463au2Ei3jhp5vAjw6','[]',0,'2025-01-20 01:59:00','2025-01-20 01:59:00','2026-01-20 07:29:00'),('4b13dbdbfc66b959f0f90a983e1b6f88fa1fa5adc33adbcc1f0e9c4c7e903552005ce7955eb421a1',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Y0w8OmmvUD8TA76fa5dENuMZiAn7OZt543zdkh49aPtbgrG1Ip','[]',0,'2025-01-15 23:49:14','2025-01-15 23:49:14','2026-01-16 05:19:14'),('4cba8771daf00abd211d5e782c15d15cb7c81c202aa42d68b746593e2b65550126183004e80ac555',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','37R7ilxHG0q5sz6DVJuirZzbegZF31w4kDUbBFZRiODdos5D9J','[]',0,'2025-01-20 06:37:08','2025-01-20 06:37:08','2026-01-20 12:07:08'),('4cf12af1811e5589c530a65a051089258493278d7de36fe52961166e746569e499d179681a63e0cf',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','nZ9zNAiNwS7oMCiwGN2Qf7lSPJ0TOm0z7LYdBuRJQYVKrRI74c','[]',1,'2025-01-20 06:50:00','2025-01-20 07:08:20','2026-01-20 12:20:00'),('4d071f429206dc47059dba9e5bffcf58fcdb9536c2ae7cc3e21ea7677e8b0789a8d60bcd2c706d33',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','kEfveCHdQDjnBmjWjRNSvPKY6n8wx2AuoMfYqaFthFzzYK7qIP','[]',0,'2024-12-11 08:21:03','2024-12-11 08:21:03','2025-12-11 13:51:03'),('4e63fe3c78250b3e724add76ed1f17951f90482c57f7dfce3bfac8b56686decd31dbb6ad3c5dfc70',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bhFVvR5fayYx7w18GFWujnWFobS2ehna283FECn1krQtRlofxa','[]',1,'2025-01-20 07:08:46','2025-01-20 07:08:52','2026-01-20 12:38:46'),('4f8654d8d4f4868568dba11115d6e467d6bbfbbe5caf6f1e505ef47d088aece771e7864f53837b2b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Ch1VyT8MbE8bosGYjH3HCUoAtw43oE1E8gTuzdEhhtJj7wWZN6','[]',0,'2025-01-14 01:02:36','2025-01-14 01:02:36','2026-01-14 06:32:36'),('503246352f67b87a112bb8af7d10e8dace7c064efa51ca6c868b59b1c92c6f2076d4a6bb224996ce',4,'9d4e701d-bab6-462e-b6db-6fdb326c293c','XTfJPe08bIgNlx4b6ARPwiwfs8OhXPYKY773HOLP8WjjMvearU','[]',0,'2024-11-25 04:12:00','2024-11-25 04:12:00','2025-11-25 09:42:00'),('5068b91730ca03c0126109fb34c210ffedde03c991b413631fc028d5c98252fe731117b908614569',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','XekHkMx5on9sb5dbEi1wREqW3ayrXE0AXTYuE79GgeYOGwNyyg','[]',0,'2025-01-27 04:43:07','2025-01-27 04:43:07','2026-01-27 10:13:07'),('512b6b580867121ff92b541c37045ad7dcf53e6e4db1d6264e2c19d3200314c1bc7cd01a706c63fd',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','qj00MvHzAZbQaat6MqcBFpMxlvEu5Q5MBhsSZw54jv1SJbDpG9','[]',0,'2024-11-29 08:49:57','2024-11-29 08:49:57','2025-11-29 14:19:57'),('52e9ada7eddc3f1881936be9178ce5854d4ffdbfa19912ec20c533db1f4ee995b35d398193db8c1e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','C0NCAPGrq9x5TyHWVdYtrKYx3iyJDqUlHg78BbOg3CRsqCkFlI','[]',0,'2025-01-14 08:47:53','2025-01-14 08:47:53','2026-01-14 14:17:53'),('53ea051d255e39c159394da77a5ca6464c9d0b88a0d50a0d03e8a8b971d1c98100bb2dcc244330b0',4,'9d4e701d-bab6-462e-b6db-6fdb326c293c','9tEYfUtR8SqTVAmkFz8YMErYXwCqB4nCJY81pVAtGVYhKbFD0X','[]',0,'2024-10-23 05:07:44','2024-10-23 05:07:44','2025-10-23 10:37:44'),('543140fabe0050055c6105ac32371bf02b190567d6a70aaf50e0abcf1354d4ee7cf9292e7bd1d8a6',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','WkDkAjFbe7HaDFsfommjH5JhndpmO7iizCGVtleIXtQ4ZBMR5t','[]',0,'2024-11-29 19:53:36','2024-11-29 19:53:36','2025-11-30 01:23:36'),('544058f89b4ca590953e89d48550a55ac8b7daaed28649db31de9fc4c2de0d001c75277c793cf223',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Sdfil392BXscOSk3cK4xwyFOUzbCvoFj5LjEeTDYodb5XlqCAB','[]',0,'2024-12-03 05:26:15','2024-12-03 05:26:15','2025-12-03 10:56:15'),('56bb2d9694b7a21eea763c56298f7d88eaaf0de0bf962011483ea72fe730ee4bb070eedf40573a8f',25,'9d4e701d-bab6-462e-b6db-6fdb326c293c','1Zy9MoGp13vG9dQFE5fg5aI4rLDmYdp9mpDLYGezZp03TZPae3','[]',0,'2025-03-04 07:52:08','2025-03-04 07:52:08','2026-03-04 13:22:08'),('57c57a2e5becf385b96e80a2727a44ed9cad6645200638bbc6304b002ec65d2e48c14e2092fe582c',21,'9d4e701d-bab6-462e-b6db-6fdb326c293c','U4m9PGy4hzLcOhh6GCWskGkrEYgOa3VG0JuD74eAaCYBLIjKOS','[]',0,'2025-01-20 02:15:51','2025-01-20 02:15:51','2026-01-20 07:45:51'),('58d85c10a59ec359b44ac4d7e4efa82fe365bfed4f6a0dd50a537c690cd4f05c55731ebdf218f317',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Q9CL8ZBSh3oWSdyl1CVOqB7kexLgOseivV9G51Y5cjVhBFrWA3','[]',0,'2024-12-17 07:18:53','2024-12-17 07:18:53','2025-12-17 12:48:53'),('5b1ca2c35ac2f0900617a35a753bcba5cce1e5e12a392cb271fe2ec4e609c3ad8c6f2ade5954d571',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Y3PEvO3RJlz5lFGD6epI4fJW0NbsM2EQwpiU9rm4z6GcdX3tgl','[]',0,'2024-12-23 07:58:15','2024-12-23 07:58:15','2025-12-23 13:28:15'),('5d620107ff9f0726f29e988f1a95ee952133d536507ee1d9f281e018ffc564a62305eb27d06a4c83',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','fNlfLHAxTb5h853HwkeUGoM5tpkc1kNwnUls14w2lqHrZnbN4O','[]',0,'2024-12-17 08:33:46','2024-12-17 08:33:46','2025-12-17 14:03:46'),('619ae34bad5d964b8c1ab66f02f1c504a822bb001f09fad551081ea0897061c200974a50b8ae361c',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','3ld1oeftBUgmcnd7uq2POHyAnjHzY6MQUweYsF6pY9JTrKWjcX','[]',0,'2024-11-25 05:29:16','2024-11-25 05:29:16','2025-11-25 10:59:16'),('63e407547cb545695adb2cdc0255eaec08670cebb62735ea57ff8f65ecb481864979df91b7ca35cc',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Ln1QlZejxBxGPvmfl4GX4jHY11plqoXXKYdl9og7mdsgzPInL5','[]',0,'2024-11-25 05:29:23','2024-11-25 05:29:23','2025-11-25 10:59:23'),('64173204a467e6ae82cad5ba23e328a7a2e31f134ca5c8772b0a1d38d8d86e762729d8a63012668d',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','hMwcAqnZ5jRQrtftExqB9fabAY4TxQ8CX0nJc8EYUQuiQjHFt2','[]',0,'2024-12-03 05:15:57','2024-12-03 05:15:57','2025-12-03 10:45:57'),('64c26c6d90911ea063159a34d00f8538a301e7c8b59ac2f97f749390a22dc2bbc8f93f130cab05c2',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bWEmnAJ6m1aYWQEJqwARdekpf6qSn6x3biYr4MRvaboOHpGn9q','[]',1,'2025-01-20 07:08:32','2025-01-20 07:08:38','2026-01-20 12:38:32'),('658d07baf1fd63c68b0e3ee87b85dceb9fe84f3a54089f7d9a2badf3fe0d0a54b74499aceb738084',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','IAu951ENdAZ35axFU7is42VVPXFDZ6eR0wnDlEQXuxEjH5CJOS','[]',0,'2024-11-29 01:13:56','2024-11-29 01:13:56','2025-11-29 06:43:56'),('6770e94455540ba5b60e6e1c1ebbda1f54d5560f640fb8b8bd21e64bb56c18ba0986aa0fa01f28cc',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','fX6JSURMg89e1VCL5BGJDJsg3XbuspnHnMyXr9tP0fyGgDS9E9','[]',0,'2025-01-16 07:07:42','2025-01-16 07:07:42','2026-01-16 12:37:42'),('68fe7b2cc0d56bb86ff9efb8f88f0949ba59f4d5c69b7598724c75574ecd78ca7bb66f181e254517',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','5ij0J76amyW0F7Bsd662JYDuIq6o1VhfvB4A8TpLo5IFTlmuK4','[]',0,'2024-11-25 05:17:57','2024-11-25 05:17:57','2025-11-25 10:47:57'),('6aff274626651fd0037a39c42a497a0d492b2bd0526e9af83dc8c8a5a9be13e2941e10af961c009b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','3ESlnHPaalxlTTbRO1jpfIt7iXx5A86M0BRGdhMoHOVKJYPFwK','[]',0,'2024-12-17 07:17:01','2024-12-17 07:17:01','2025-12-17 12:47:01'),('6d4b0e50da17a035cb2a00e2eaad59a9ac0d924f0aac4e0c6396114d05b433eb383cc3c714b2869d',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Unmfb5OfvT1yt8rBbeFXdv1QDBYE6fPCcouPs0t8pw2I9PIDvu','[]',0,'2025-01-20 06:44:04','2025-01-20 06:44:04','2026-01-20 12:14:04'),('6eb4a37de3c039ba2fd9bd8534a69a0edd43b5a5ab96d13225e3594a0b0e00d7b7ba71652734b193',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Ch9Ax1t2shdNEXKZxEolkGnVQGM1OzdhfAoxyXwPTjXdvIk4OM','[]',1,'2025-01-20 07:10:01','2025-01-20 07:10:15','2026-01-20 12:40:01'),('6f16a85ebb5211bac3653b8c3172389eaad2f98e6b0ee2daaa27e11e4cdddbee552e6b4d2b7c58fa',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','KpVJMWE0bZV3uJJo4s6jDgqLBMFSL3eJLvUcCTqoVST41UIZZ2','[]',0,'2025-01-08 06:17:02','2025-01-08 06:17:02','2026-01-08 11:47:02'),('6f42832d7b07561ecf8741e56f14d58eaa2549fa7ae0391a2d2ec8b1b9ddccd02f566d7e416913d7',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','AhL3ttIwolunii6dR3KR1w223WbYG4auF37wa1zR268nHMl02c','[]',0,'2025-01-16 04:42:03','2025-01-16 04:42:03','2026-01-16 10:12:03'),('7122b67d8d646e5377a8c22be22b9610044390120422f10489b969de83b139512f37436c8211d14b',26,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Z3xxpVyYwJdY8IyjPad8NeLr0SkeY4YvMd9y1KgiNm1Vi9PBrl','[]',0,'2025-03-04 10:53:59','2025-03-04 10:53:59','2026-03-04 16:23:59'),('73970a87453c17736a5e258baf7b1a6e0fcbb194b629eaa5ac0e80a7cb362092decf557e24275eed',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','mrrrfCFkjBNzdZvHpJ6P9wNhfDHtAWVpa6F1rkvTBvpBvn0yjt','[]',0,'2025-03-04 23:56:14','2025-03-04 23:56:14','2026-03-05 05:26:14'),('75347cd9d9f4c2bae8630261b2afb84388b5f773702bafe1a8c672be4013f2652b4635969b677430',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Gn5hcHClXSVPjjl4iTXrtWuoXlu4N0vgQZkt3D29dOBDBgzvYq','[]',0,'2025-01-07 00:05:31','2025-01-07 00:05:31','2026-01-07 05:35:31'),('75d856b08685b164bcafe61e46ecbee2aab2832c609d24ce94a690d8f5b31e68fbe8178a6ceaf860',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','UuNdvpNoVbH1kftM8uPWsJynjOhCTZSRWlxTBoWxNIOmIO5toz','[]',0,'2025-01-20 05:11:24','2025-01-20 05:11:24','2026-01-20 10:41:24'),('779c3e574fa2ad96e45ab0c8d8a4ccd693fba7629334a36a4eb0dbe7b49a8335bfc4594fdcb0a246',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','6nv9xjTsjjy1oXQJMrmc66XWgLGOpCM0CH8DbuUCPtV5eHfjFf','[]',0,'2025-01-20 08:17:01','2025-01-20 08:17:01','2026-01-20 13:47:01'),('786081d718767569de0fccbb29057ac1c6d26a90370ba984c3c4c592a81e747d2220d331d9815b16',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','UDJJN0UXjxgTrfj3if5nZdLa0yHwdeiHmyhSY30WiUcxNzCI51','[]',0,'2025-02-01 08:19:19','2025-02-01 08:19:19','2026-02-01 13:49:19'),('790d79657e594a0ee71ba7311ef6cf90f7c79a630c1aba49e0f1c06c5f91974ffd51dffea97bd6f1',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','pi1Ow6P3FMig3VrS9BnouFKL7jGVALYIOZVYDbnPewTG8ZLb4j','[]',0,'2025-02-21 00:29:29','2025-02-21 00:29:29','2026-02-21 05:59:29'),('7b6e0e0e2b23e19625af5ad9c100aabadc86f48d85d48e8c2f65f1c91b86589082b0c7a705ff633d',10,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ZjmnwskckJT4npduLYO9u4fJ7T0HJ9uBP0whkzVO4KJfr32r8Z','[]',0,'2024-12-31 01:19:50','2024-12-31 01:19:50','2025-12-31 06:49:50'),('7b856dbd97f98a0dda425177a32c756f588cc43320d2626cbbdc4dd4883dc6c1bccc3de882fc69d2',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','nusrZJUXRkXTnM632BE3XeoAViLTE8F3lonKBVuMKnWaJX9YEg','[]',0,'2024-12-20 02:09:28','2024-12-20 02:09:28','2025-12-20 07:39:28'),('7c2ae377a1ca2021a7af1f6351bd7be48a276d2c2bd329dd9b5654bdb57f0601bf3b956d52658f49',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','hiF4XxPGpd7whUkze5j6CLIjA2jUtdylxmACMvVbx7LdQvDDrM','[]',1,'2025-01-22 08:21:11','2025-01-22 08:25:58','2026-01-22 13:51:11'),('7c740f417a4bf4dfbe3276e7111aa41d6fb02c4a61615c69ccdd710fda44f38bc739c81849b8e0ae',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','YwkTqlQRPr8KLueXD5qv2mFuA9ANrFssqYRaPmfquBrlddpDdp','[]',0,'2024-11-25 04:51:43','2024-11-25 04:51:43','2025-11-25 10:21:43'),('7d8a73eda49ba1f4224160c5509b9f31235e60d13af1ffb37e150a7614a3852c69ad992f80fc93a3',12,'9d4e701d-bab6-462e-b6db-6fdb326c293c','lYZrwy7IIgGFBm9NqUMRBTiCiCQZZAYR0oOW30p8n9bhW5CKfg','[]',0,'2024-11-26 00:58:55','2024-11-26 00:58:55','2025-11-26 06:28:55'),('7d9d1a0a12ded15f8fd291ff369ee4897b0dd5599f3e99753b818c2017a10fd01f64afd7d3b9f39f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','TNdHEFYufAvZ09c7bJx5mMLHgWiz2KmcyG1LunCbifo9Ng2DBx','[]',0,'2024-11-25 05:29:33','2024-11-25 05:29:33','2025-11-25 10:59:33'),('7e88269ba904373798f8885761c6d24ac92cfff212d956e04054485cf5f3043b2c301515e00021d4',21,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bO3WLjEGWwotIDmiuRHPsowyVsGHklFn3KA5tui3PtSVIJUJDz','[]',0,'2025-01-20 01:38:25','2025-01-20 01:38:25','2026-01-20 07:08:25'),('7f7bd5e590cfdbb2470c3ddff5a7fd50db72901dbbdc06ad59f6f76031f87e7f28b0a07710041ee6',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Elfda3j3l18JywIT4zVWLLhE2yPptHljIloP2uGnjRT9JLiQMa','[]',0,'2025-01-24 03:03:23','2025-01-24 03:03:23','2026-01-24 08:33:23'),('80d4dda3c6f34d8ebe816a06df10137f5f9487548f593f0eabd9034ef13aa2bc6c5e5028325507a5',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','wv3mkYPc0hZ61yHLfVug0hLKQJLDCqIVBBMrPdSS93MFtivbGm','[]',0,'2024-11-30 04:13:58','2024-11-30 04:13:58','2025-11-30 09:43:58'),('81cec9a96742fe36b7c98d85430be61178a891db94e3439ba1401adfa9a1c671230851bea7c33dfd',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','m184C0EZ9Fno736cRwgFfoUJpakurwJcFhp6gWLHCZ9fvUQ3UQ','[]',0,'2024-11-25 06:54:31','2024-11-25 06:54:31','2025-11-25 12:24:31'),('8255706ba6c4b20b643e11a999cb4d20b47ae05704bf628cfd6c0cf72c9eb0e7e84e09b4e6828d9f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','eu1XdLhFCP0mYkPXAGq1gbjol9BpqhtPref26eI4TEd87aE9AT','[]',0,'2024-11-29 19:49:38','2024-11-29 19:49:38','2025-11-30 01:19:38'),('851726b4bf29d796bf3218bb47ac3f7c910d2ced6241179ea9ccdc17ccc4f3dc389c7eb14967da82',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','omaTkFxS0Uo8mKnz9N5xi3PlsPGDObyJUmuT0g5ECgvkNJXZmi','[]',0,'2024-11-25 04:10:39','2024-11-25 04:10:39','2025-11-25 09:40:39'),('85649009bf196147705b7cd70ea58bdbb77642c2eb0ae019904f9bb7787c307218bd64e014e342dc',22,'9d4e701d-bab6-462e-b6db-6fdb326c293c','AXNn1fT4tbNnxgq5p8JVvaLd0X82He0Y6U4iqmqS6bTtmyP2HD','[]',0,'2025-01-20 01:54:19','2025-01-20 01:54:19','2026-01-20 07:24:19'),('86acddc2e181fa749951b72076a663bc3b040bcd6cf472fe2f33fa4e30975d838d4404f810344fe4',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','yPGWVZ8ftw8osB7WQdE08Ty3fz5X9L8cKD7xIRJk7XTfkbKFa6','[]',0,'2024-11-29 21:56:33','2024-11-29 21:56:33','2025-11-30 03:26:33'),('86f69fa881c10f1c99956f4feed2bc5a7e4492ebc811656ae42c5e4db54bc741cc3f36942d71a32e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','qg9lxvweVZ2pLlvcGgmi7svVZ9Xd3brVTPvLAPVslXExpirM0z','[]',0,'2025-02-21 01:21:18','2025-02-21 01:21:18','2026-02-21 06:51:18'),('891bcfdb5c21b2adf2faab8fb0e42e26caf878816dd8e55b02355ca6e300e0b661bef38e5f30a843',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2zFeB3rwHHXBUxMQnoWZcl9i05z1bJC5PWfP41lsRDtZcaugkP','[]',0,'2024-11-25 05:29:56','2024-11-25 05:29:56','2025-11-25 10:59:56'),('89c1a563562ee8aca46949e8ab176ba7b51f10afb331366e9d53a6fffa2723acee0ba7aa53cc360d',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ZLc2PNopdA4fJKIVKMiGQwGGRqRezt94boX58N66TqLYqeWPnA','[]',0,'2024-11-25 04:11:00','2024-11-25 04:11:00','2025-11-25 09:41:00'),('8bdbe32990c9fe4ab57cbfb3f8464d7947e2fb87a6e3e73d9cdaf5cd25d0c4c2ec836435b7afeead',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','FrmRxdg0cUbK69IodaUVxVzfFnYLdGJe815QklNQaCRioFOeNe','[]',0,'2025-02-01 05:47:47','2025-02-01 05:47:47','2026-02-01 11:17:47'),('8c9b75f6cf8cca715b3fbb6f7d07c95b32a92ebe3ca8650fb12e98dec15668351dfc401ac9373d1f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','MQQqUCmE3acJ8tBom7RGJqPe4G0U4xJUu1wgqj3XhcPf5yk2Vi','[]',0,'2025-02-06 04:47:33','2025-02-06 04:47:33','2026-02-06 10:17:33'),('8fbe31a31f6a32d872ce86c7a5626eaa4082068aabf9e3f1a3f9e9c6d90370eb3c5937f344a054c2',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','4NwrABAnp1GcPMh94hHvNTtw9DRxWOHpAYhaHAOef8rNPZpd6Y','[]',0,'2024-11-25 04:10:52','2024-11-25 04:10:52','2025-11-25 09:40:52'),('92aba97e5b2f9a2064206fdb0e38cc25617411df134888164d5dea329089283823bcf2fb3a64a2ea',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','YruOsaksAdOWhbwP7UZoppvEufv4p6qh7Z91ZUmNZuhVCtbA07','[]',0,'2024-11-25 05:07:52','2024-11-25 05:07:52','2025-11-25 10:37:52'),('92e499d5be62ebb0c8b2f388517bee037e308cb7b409a02568801f8a88d5ab85ed15e883260bf498',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','sOOrANMr6BKqSwVnD7ex7ZUNDALt347iKEoC9mgpUujXACAG4U','[]',0,'2024-12-03 04:33:21','2024-12-03 04:33:21','2025-12-03 10:03:21'),('939f19b04f5857c31dbe1a6309934bdee1cace9b344a62f131af924e00b42395bd4f38112eef2afc',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','dOAnlRqWZjcb2R2AfREIlHVNSN5QUTeVqF0adlo1GRw1eu0Lug','[]',0,'2024-12-02 05:26:35','2024-12-02 05:26:35','2025-12-02 10:56:35'),('9574b76febd3ad44f6d483849cd1c43ae96601fb190f763e286646619d68e462260dd32fb0d55613',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','FUrmDN5GGtJnx3U6Pl7VS0iAp3sI6iexC5bWs5NPdRM7KMppHe','[]',0,'2025-01-13 00:37:34','2025-01-13 00:37:34','2026-01-13 06:07:34'),('959ffdfbf990b9b35019895cd104e1327bf22bc179621fba8ffc418c818f0c8deb14b430700661c4',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','KOk1DOgJmdmkwAgVefTWyUPduPFeDtDIHgcsh2MYOni1FVFAdG','[]',0,'2024-12-30 01:01:52','2024-12-30 01:01:52','2025-12-30 06:31:52'),('97e99fe940cd72fa1a013838429254b88018a909ec1e6897620379755aa89e058c51c57a775a265d',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','pzZbEe1VhTP6ZyrHyKunpSocV6JCdj0rsED8pcR5WsJ09wHjNg','[]',0,'2024-12-23 08:49:02','2024-12-23 08:49:02','2025-12-23 14:19:02'),('98b2bee28639fea367c5016f799463da3f369849334efb04ede55a587919ab3e35790c6d3c63847a',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','WZ2F9y8xVvEL8UNuX3gRDE4X06kezQN9LpSr9zJeG5AOyDrpua','[]',0,'2024-11-25 05:25:44','2024-11-25 05:25:44','2025-11-25 10:55:44'),('9c0b00ed5dc1ab2134dc9fddd4662fa6705223afede5bfe08116e1d6c67e1593a3c9e6d2feed763a',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bnVOKBD1akWig9L7Nb8xwp8Eg6X9rMbwWE8tb0TD45FSZOeTJ7','[]',0,'2025-02-18 04:59:07','2025-02-18 04:59:07','2026-02-18 10:29:07'),('9c50c59364503f1b307603a44e120d08b904510f386fd2eaac06849f54b6353ac3cd8d8cb8d3766e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ie5fk0nccJOvVsMuhJOQfE4tbYsOVEEYLEbe8YbR2tNkpYHOdm','[]',0,'2024-12-23 08:49:02','2024-12-23 08:49:02','2025-12-23 14:19:02'),('9d75bd1a0434c5dd1b49655a4b05bc17b3ee0684f876661aac1d61347ac76c71f3230e938e64f5c1',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','gFdMVknMafTl6jsGSIADIpiqtOUShXRHniZpL2YZuwen17m6Rq','[]',1,'2025-01-22 08:26:17','2025-01-22 08:37:13','2026-01-22 13:56:17'),('9e20e67c493141bd9222532677c5efdd1949185e091922b331f8330c9d2f84e110185904b453bdee',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','sovIO1v2yoFeLgkUkXE6ZiNFZZw9wBBghxFIHnd6lBxwvEF1dn','[]',0,'2025-01-20 01:55:03','2025-01-20 01:55:03','2026-01-20 07:25:03'),('a0fb1b20d4fbc93f0e7b5a2f4d00af327efc769c5ff04e56bc5e2405ae1cfdb7bb0f6ed1d476c900',24,'9d4e701d-bab6-462e-b6db-6fdb326c293c','pYtfUj6YsVjPElxITPgpFlO73OKraDYyf2llv1Wn7xtZ0ADBdK','[]',0,'2025-02-18 04:54:57','2025-02-18 04:54:57','2026-02-18 10:24:57'),('a12db046401973964601ce9a458e65b625efde396d3e6acfc19220edd6d756ee0397d54e550eaa8e',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','m7YRR5Yl67Lcwvyb0lu6NahydxYAMYDc276cVIa4HJ2ZmlnDk6','[]',0,'2024-11-28 02:21:57','2024-11-28 02:21:57','2025-11-28 07:51:57'),('a1a2d8494c02474893495117b0f276a6c0e78a58efb2a609e506c1a2126dfe1715f0631bfd54a24c',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','s2YN5WRlgebv9MIgpbeiJQrmzH886MXkWqgNu4pnDAbPbj9EP5','[]',0,'2024-11-25 05:30:08','2024-11-25 05:30:08','2025-11-25 11:00:08'),('a2a5c06857163d12f1dea373d857a49f153063910fb54e67c215ec1188b939e9e6169e91c1e153fc',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','g2yuGpS0yawfJSyOLD76VjIJB0Qu3O4suiLwFfRkm3UH1LsJ7C','[]',0,'2025-01-13 00:14:25','2025-01-13 00:14:25','2026-01-13 05:44:25'),('a43023291243168b309cad0df50a0b7468cfac0e28c2073d5298df716d996672e7a01d7935cf7640',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ZtviNMQ8aGfFCEzSjb6cjCATAPhmgtlkal6IQfRPe6lQkhPold','[]',0,'2024-11-29 10:42:00','2024-11-29 10:42:00','2025-11-29 16:12:00'),('a4654717d03c925df492734c5c267d184d927ac6af1bb14b958c4bba24eba5f191cfef488cc570d6',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','qlno6FfpcZemN0Hf39B8jRqiMpHpY0fmvKHk2ri3GKZ4eRUGyT','[]',0,'2024-11-30 04:13:58','2024-11-30 04:13:58','2025-11-30 09:43:58'),('a5cd2b67d04a44913143abfba077458dc73e84d9f318f6b77a3eddad541aed00037501bbcd73fa31',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','TD3jx6LkQYbraKoxh5TjsaM2hhD0jq3zkcOspnOotvQhzCXfx2','[]',0,'2025-01-20 08:17:01','2025-01-20 08:17:01','2026-01-20 13:47:01'),('a5e23b8e8f6cb8d6fdceed7dac4a2c0f5a073043b06132e6d0cbd647dbe4bb8fffa9e1ef207f6ae0',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','rbrYk3WOTzkrHEYmuP2ofvoIGDdMPa5pafWlqW1eDPpvwG6RFx','[]',0,'2025-01-16 05:11:06','2025-01-16 05:11:06','2026-01-16 10:41:06'),('a7b3834149e052e4ba53bfe69e42550ee2a7d186d6dd0df46af7c6eead6348f2ee12af92ac866c7e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','m1GFkor8DuquO0hXRBrEFrdeXC7VDQkKOEJ4J57HaN6AH7FiC5','[]',0,'2024-12-17 07:21:59','2024-12-17 07:21:59','2025-12-17 12:51:59'),('a95d440f01aa9a10c31816f54190d19d688351ffd770a1105f9bba86eaa038584de38c05f1ce0ab1',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','76ZZ3fC2eakcd9lxwvW2gy3msUf9hcNbeWMxjCcDesEMA0s0Y1','[]',0,'2024-12-27 04:32:37','2024-12-27 04:32:37','2025-12-27 10:02:37'),('a9be7434571c87f23bbb7118ddebe59a266ced2e0362da8159b0cffa0a812ebb214281a3a753b17c',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','eiqroGKba7nvb6JACWNtmlb2jD0qmRnos3rkp5kIwSZ81YTrGJ','[]',0,'2025-01-10 10:20:29','2025-01-10 10:20:29','2026-01-10 15:50:29'),('aad4d09eec327e10a7050e8124ca3c2ec3bb5be47ad44cbefb4dde8000727526081cee4fd618f509',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','qgxwkl5kJT8YjeBS5CjIY9wQjRzJwTdN4zpPtja8wSTl49jhfM','[]',0,'2024-12-20 01:48:50','2024-12-20 01:48:50','2025-12-20 07:18:50'),('ac2c9e945d4bb92455e1b92ee19bc0aa2b070d3c31e22b21c9fda066fd7a380e3a8131349a6c20f7',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','K6bz3S50nDYftKPz9PVB2BaM7kToUpVtJKWABikuHyzVBNfZSW','[]',0,'2025-01-20 05:29:51','2025-01-20 05:29:51','2026-01-20 10:59:51'),('ad57f00b66496e85beb591453db2adf1bf02636ae509c989fa11d9033c8eecfe8050f10c153b8db2',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','qJ2B0rYauF2AobsxcGJA6L0XaVLFtss22ZAhJmpih5vJJd86Qr','[]',0,'2024-11-29 08:53:52','2024-11-29 08:53:52','2025-11-29 14:23:52'),('aee1654c2846a6f0dcb4a4d9b143a0e1c101781e37b68129634070bb3eb1c4026f66387f7b0fbcde',4,'9d4e701d-bab6-462e-b6db-6fdb326c293c','SRWk0SaPUXjOi9JUK8p4vG5HooMW7bBXR7QproWRWNZiK3SMxo','[]',0,'2024-10-22 07:32:29','2024-10-22 07:32:30','2025-10-22 13:02:29'),('af94b89f4dcbc0175aa3836df5ad42f01d9d340a1edffac4925067f09c300634ce1f4f59876260bb',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bgJNLyA3pPn2RrvNyU0lFxUK7bS5o5qFduV1WvgPXEBECjHvX1','[]',0,'2024-11-25 04:15:26','2024-11-25 04:15:26','2025-11-25 09:45:26'),('b2cd0ad7bb32a7123bebe80b00301710582e8bb7bc8221c1d9b2eed17a63b3acb3b140c9370500bc',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','wlwGs8cpzv3UVkTbvNmtio4ZqPcrwTOajvTeQ5m8x5EQERpOoS','[]',0,'2025-02-01 06:28:52','2025-02-01 06:28:52','2026-02-01 11:58:52'),('b3226c92233685803c57e8853ee177dfd226ca82ffb2c86a180fc0db54e6cb2f52c13be141fab54e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2jfTcnBbB8rf77ZJldEBIioC6YMq67cBdYr7RoiP128lTkF5lt','[]',0,'2025-01-21 19:30:26','2025-01-21 19:30:26','2026-01-22 01:00:26'),('b3c14b4f62490424fe847fc25229739b8bb3001e6f5db0eca182a3c76ca0dbd774eb0461f993a4a6',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','VWP9v8Qg8kN1iOwrOdDb06auzX73uUcE9kGjQY8cloQMf2B1KC','[]',0,'2024-12-10 09:26:49','2024-12-10 09:26:49','2025-12-10 14:56:49'),('b899fda4073ab589330b8c3f36d1297e4ff8d37b2ac4a36bb6445db241e8ab74e58c98f60a2d95be',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','xs00ErYbo5DoridKvHqsxhzduiL0M5GQWMaSzx19GI4uO428aF','[]',0,'2024-12-17 08:33:46','2024-12-17 08:33:46','2025-12-17 14:03:46'),('ba10464c45e2c5e427bff9afede7989afcd6a4edaa1497066148173276f8075fcfa077a928cd7336',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','5Q0fD5t3JZ13V0HPRcHGDf8ZKsGsHQBqlfH53aeE4VSLivIcm9','[]',0,'2025-01-22 08:21:11','2025-01-22 08:21:11','2026-01-22 13:51:11'),('baad98580a578ccceb908dcec6d049098be45ee0c662e907913026d7212c5a32c10ff298d6a2f912',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','zUXPYVG3nBfLkHguHjUYMMnyJVB4rSLHHkKocHWto5j472Uy6e','[]',0,'2024-12-20 02:13:19','2024-12-20 02:13:19','2025-12-20 07:43:19'),('be8957a3767017229fe2ad506d3722dcdd7d3534a00d2f9ae81c8b4e75767549bdba104562769bf2',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','VXpxUo9f3hB18hHNpWsBZmoBzVLthn6fzw6odIuMPxiqapkTWD','[]',0,'2024-12-30 23:53:12','2024-12-30 23:53:12','2025-12-31 05:23:12'),('c0d546c5c508a8114465c86642f87d27336e9a5302ea0d8a1869e5edcba9f0d20f31c7716b3622c8',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Qr8dsiFOTw1WJ4TFHzjnINSxROFBR4cEcMaoyQaV9BuXk6BEGK','[]',0,'2025-01-17 05:01:25','2025-01-17 05:01:25','2026-01-17 10:31:25'),('c3b20059b991d3bbb525d6d0bd8f41548847050a47bf8802e329e656837dc4898601870544417ea7',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2Moe7Ur8hziew8O0dKRow5wAE3g8vZIdUpz9k6dYWfHVCed5C7','[]',0,'2025-01-08 06:12:06','2025-01-08 06:12:06','2026-01-08 11:42:06'),('c3becdc5c636608d4e1124b2cbca24f67e21503086171fe4e14db70ff9f72c295a9ff150b53b0266',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','aW8r3TNSxACCsUUAxB5S1wYHIbUL3F5b9rF5hMGVw4mBv4v3EL','[]',0,'2024-12-10 00:31:13','2024-12-10 00:31:13','2025-12-10 06:01:13'),('c60940c24189786a5047c3cc5d36aa2c24981b44f36798c1cc2fa6cb5951308cb5c4222ab49f2e03',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','rSbMYHpEaVDnw48lFtYQ1QcrRv8XKrU18GtUsmrPlfciupXHfo','[]',0,'2025-01-08 06:12:53','2025-01-08 06:12:53','2026-01-08 11:42:53'),('c65c018d65baccab2f07ade413203047d8075649e49829f67039cf70b2d32d50ccb82b75897906d5',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','GGZZ8UQWxweM2fGKwk8jTOnrR14sw4tKI11vMG8RiStQl4PjzA','[]',1,'2025-02-24 05:46:02','2025-03-04 05:01:13','2026-02-24 11:16:02'),('c80b12555b053237047e82e2bd2ecc31167c72649b3b21a078b686edc30676831b21f9c9e0b86707',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','EETpPxqq6swxAATb29WMXd9nb7PANaqgOZTLKnpxy2eMdyTbHu','[]',0,'2024-11-29 10:37:02','2024-11-29 10:37:02','2025-11-29 16:07:02'),('c8e2a94eaf26df53e21a7903aba9d7f46e9ca0914da7ed088fc6bc10fa8c6dcc26412e42e8b2d57c',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','8Dv1pY1Fvp69nHYxmEOY9c1jahigolGIup58NVkVMYBPJzqyDt','[]',0,'2024-12-13 00:07:29','2024-12-13 00:07:29','2025-12-13 05:37:29'),('cb9271ce7b735cff206fd6dfb8d4c210c3ec9d479ff4297e0eca44d45a14c63376f0207055371544',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','APLxEA6FEJAEiRzFC7VVMIm2x4euXgbPJFc0IXXXUBNsLhiRzR','[]',0,'2024-12-02 04:07:40','2024-12-02 04:07:40','2025-12-02 09:37:40'),('cc222ff1f6da83655a08391529dc7ed10d517bd97dde6c8a2fe348460aa3ea9e0d83217318c3f3e0',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','T5YDvHpHdk0TdpNzr1aI83DgyNFIAgJrN9AnYRtoAm5zfsa8aO','[]',0,'2024-12-18 10:03:13','2024-12-18 10:03:13','2025-12-18 15:33:13'),('ce4f6ceabf63edc405decc629c764b20e671657111509c5d2dbf10c6374e73903031255d17b70521',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','B16wsgWm0iZcsi7WEnL3c39dKK6caF3NHgnfQmf4zFqeCKUVws','[]',0,'2025-01-20 06:45:35','2025-01-20 06:45:35','2026-01-20 12:15:35'),('ce692451ec70b3f72f725d7dd1bff2363d0d568fd24aa812ef591c9b35c8fb58541f0fd4cc73b78c',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','bG6AR4mQ0ALcehRrQXt1hG1bRL5mdHts6pgtVJUhGCnPD0aikq','[]',0,'2025-01-14 08:47:53','2025-01-14 08:47:53','2026-01-14 14:17:53'),('d08773087bb9ec3777a885e64f383c53621ed0e50cd692ec06587826b9cef1e90dadc497682c310b',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','JoGk5zSwEkgFhOhwcfB5YTvmdim5iJ4JSG0ad5glu0vO2H5Hh2','[]',0,'2024-12-13 00:22:59','2024-12-13 00:22:59','2025-12-13 05:52:59'),('d1c014fb5ea8d2c50adc9326d4043827a5694cecb44beba972a768c568d18d7fe9e9e48ab90f447e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','0qG79UpuPuoouexWYve2EIOFV5QKftal4XSmAg18nEhMQljP3L','[]',0,'2024-12-12 23:40:29','2024-12-12 23:40:29','2025-12-13 05:10:29'),('d1c1e2263874b87dc972adccf1a788f15895e0ae6018c4a7e4f176a1a7b77567bcdd924a5798b8e5',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','8guNp7kxmSJpBxn5sVVnZnPu6L6mooXobhF5S8DVJaF0RIhSaQ','[]',0,'2025-02-28 04:28:20','2025-02-28 04:28:20','2026-02-28 09:58:20'),('d3946a0a27bdb16f83a1448da7e445274571e008eac8c409dfbbb7f58c0d7770d7d7ce79b7ba6e7d',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','J0sXfFlIra6UutfIdy44JCKiCxe35HQcjizJYSdB5JUsETTUxR','[]',0,'2024-12-20 01:21:15','2024-12-20 01:21:15','2025-12-20 06:51:15'),('d43b98da54ee5a30a85ed45d6f50166400c0f413cb4d9c57f4195ac2c940e0d01df21b73842ca3ec',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','NvE21QzIp91JCQr1Z1BHK0rMJ5kqZ70XFPrwDjaKz89eV0hLMO','[]',0,'2024-11-29 08:37:39','2024-11-29 08:37:39','2025-11-29 14:07:39'),('d52a3e42ec9034b3f8822baa45e44cbd425d0bd3782cde1129a02276fe916f08beb0e096ad8403cf',4,'9d4e701d-bab6-462e-b6db-6fdb326c293c','XYD0qbxYqgnmFgE89yeSDSP9nwzPMqKbbka39i6PFInYWxWHYT','[]',0,'2025-01-10 03:23:55','2025-01-10 03:23:55','2026-01-10 08:53:55'),('d573792ca692c6ac3d82e5360c881fa3fa8bccad4a67e9fb36893e801ba991c4a2e95168fc42dcc9',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','GvHTz4swFdJp0Mgzhrk8UciEzC5opWYTyG0q2Bbg4H8h5mZRq6','[]',0,'2025-01-20 07:11:54','2025-01-20 07:11:54','2026-01-20 12:41:54'),('d685714b8951d5fdf744ecbf8548207d77021c247abfe3719b98a59a7127c96444c96d3f8784ef5c',21,'9d4e701d-bab6-462e-b6db-6fdb326c293c','OKzPUWmCPVMjMuu9GExLynwlOwUaTmvKSnbazrsM7BelIg8LBq','[]',0,'2025-01-10 03:48:59','2025-01-10 03:48:59','2026-01-10 09:18:59'),('d9e67d784db511eeb4e43bffe2c487ee51016fdbfc2c44221ba832fc9339aa474deacd64eb9adca3',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','cmLufoF76yjDNBhx31RxqINRAbUCOLDsjT6yWjQCk2mRDmi77p','[]',0,'2024-11-25 05:31:35','2024-11-25 05:31:35','2025-11-25 11:01:35'),('dc2e3f4ce202aa956f14c2aca45f49f5703031bbdc5f72480429bba0fae5f6f77493879a73f052d1',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','ph7B4w97BYBcWGLaDFWZK9AGhUNH1SGATLk37hNvrWhJvaY2rw','[]',0,'2024-12-04 23:51:03','2024-12-04 23:51:03','2025-12-05 05:21:03'),('dd32e2612ff54ba1c2ae2679d3173d30769ae09cab0aac29ca2d1b29e4996e54c6af1d3b9c5ed426',21,'9d4e701d-bab6-462e-b6db-6fdb326c293c','97BqCcrzBwMtKzL8Ld6TqyebYgtVrZyASier4NbWImSWmMyX6W','[]',0,'2025-01-12 23:57:59','2025-01-12 23:57:59','2026-01-13 05:27:59'),('e159c6214908ee2f2aa3613d54980663da6cd7c0701a7c568255cadb3177cac447df203a24b19801',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','yHUzvTmqlNgP665Q29JxzhOkBwGdxG4wo3d6ubpDLvNU6oU06v','[]',0,'2025-01-08 06:17:01','2025-01-08 06:17:01','2026-01-08 11:47:01'),('e3c2acd7008135c51a063c5d301030a81d202a68c4dfb2baa16ecd6007d224505f9d777457e82e70',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','9wBTvIH8I8kQRCM1RgfLd45tPMDLkui37s7ljy3lk9fK9LR7aa','[]',0,'2024-12-03 04:42:27','2024-12-03 04:42:27','2025-12-03 10:12:27'),('e48f233351ba29a853654150803eb60b6b6d28509582349c2354b4a001c40573ed44de0311036d00',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','Z70nMNdTncDuERLUTnkgFKziRRpVKXXikb8XOxzVrB9RAi86fU','[]',0,'2025-01-20 07:58:24','2025-01-20 07:58:24','2026-01-20 13:28:24'),('e502131b5a0b2aaf77221c6470a78ed73b764e18cbb8e0be88c2a549a0aa10a19dfe363c0bfbcaf4',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','VYhonzn3Rsr611zmbwYf473SswmxfyErKrZdSzmGlUBHAPnfQE','[]',0,'2025-01-15 07:49:54','2025-01-15 07:49:54','2026-01-15 13:19:54'),('e68e7baf97323a994716db336ccf1e6b8f4081aca45e23843e23748bdbe69ac4899f6c256d4e4c75',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','3lZaWMCZG0333okEyaOtwyAW7UMniV5zkPipeIEJ9vuHn2nKwa','[]',0,'2024-11-29 08:37:22','2024-11-29 08:37:22','2025-11-29 14:07:22'),('e798fe20270a7ff93727db0ab005baf2f280105538552fa35a28e60803671114fc70fa242c13a5b1',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','mgbl6pIeHyvCxWjVWbevnGKcgUzHJ087poIDvyPTknZnJoDaHZ','[]',0,'2025-02-18 04:59:07','2025-02-18 04:59:07','2026-02-18 10:29:07'),('e84b18c6a3ef1f40a79fa7454c6c2ec9c1b1ab38332aa7e4b3b6845b93d1d29005037d2f617c9973',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','W3pzEJncIn8kmEzPabzoTVY3HgkenUqsj44hnFUqJoKxWNZyU9','[]',0,'2025-01-17 07:15:57','2025-01-17 07:15:57','2026-01-17 12:45:57'),('e8e72d9859ee6b17f15f61353c1b3435716a3071f37c6fb2bb0b8a7ed9a8fb1e160b23570632cdc7',22,'9d4e701d-bab6-462e-b6db-6fdb326c293c','JK4OzOkacyQYgtLoLzKMyGKUNauZc6D58P6RvCCRyQOzxKAcpf','[]',0,'2025-01-20 02:19:52','2025-01-20 02:19:52','2026-01-20 07:49:52'),('ea12b9f4e357b47ab8392dc6e172b9e2ae244eec16b9094463169a341dff633fe7f1ba79b81197a0',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','IHYOmwGQXuFRFoZlTpEOvLImKys8nDim9LRlLMAO4qtTU1CagJ','[]',0,'2024-12-17 07:30:17','2024-12-17 07:30:17','2025-12-17 13:00:17'),('ea1744e93496b53f92cc77999ecf8855b836403543628e09681ba95eb8b6452deb54bc77d34e44de',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','WCzbQMLs3Ly8byJKE5CJyevdUJ59xAWXC8Lq3Zdut5BJbrXZVC','[]',0,'2024-12-21 03:45:26','2024-12-21 03:45:26','2025-12-21 09:15:26'),('ea91ec1c86b4a617c0b38b7af8dc5c68487eb4b3e33ff20db2feb36d964f23a8bf161b9760a1b3a2',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','6IvZasA5xI4mtzMOJLYJ8DU4cAcaIGG2POhn2VDm1Ko7IIHgdM','[]',0,'2024-12-18 10:03:13','2024-12-18 10:03:13','2025-12-18 15:33:13'),('ec4a732dcb632ddfcdd405be358cec37a75a16b069301ee072d56788b4f4bf5c132669ebf3f9505e',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','pDVISEmH2fhvl8fLrsDoXUs5i4m9UZNrBclAdPHc3v77Qmv8yn','[]',0,'2024-11-29 08:48:19','2024-11-29 08:48:19','2025-11-29 14:18:19'),('ecf44c7ef94f527f3b53e057e2c1f94bd1ac4d1fcc3c3c9fa1999d214e8b74206a1effade90fc77f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','sdEnRMv4eHVDoIExZ4EqZi6A0Ck8LaNfWyjMa9DcrBCmUVOU9W','[]',0,'2024-11-29 10:19:15','2024-11-29 10:19:15','2025-11-29 15:49:15'),('ed8a9eb84c60568615eb4a29ebf87cc4dd3a36f03363130943ffc54d197efa9a18d502efc22b2dc0',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','4nz1SVuaziso083v0M3hFlHgGkDnBqYxqmX19CPhztq4IVyOWZ','[]',0,'2025-03-04 04:04:00','2025-03-04 04:04:00','2026-03-04 09:34:00'),('ee1531c5da6a2de0cd038678a9562fe2c914a39f6a44acf5f84682ad7d9be8d3b14b0e63fc066887',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','aZJL4pBzvmtapTlzq0XryIs5fzskTCvO2DVsbTp56hSbiqlBSA','[]',0,'2024-12-20 00:44:07','2024-12-20 00:44:07','2025-12-20 06:14:07'),('ee6b8be348f8aa33f1164eb6cd8c7ca8373a93fca5613582cede5ad8d6d25b03ea6e5c903a8bc838',17,'9d4e701d-bab6-462e-b6db-6fdb326c293c','fwWeJa47AnGBkxEVdViCJv1QgotnVBywhb7DfJY9BZcnO6KvC9','[]',0,'2024-12-10 11:50:39','2024-12-10 11:50:39','2025-12-10 17:20:39'),('efacb38edee67922bca2289abfd9a30915b60dd10c0b093b92eb31bb846425c28eb0c14ca0adb094',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','05ypeFxdh7slFkzqiG0JNx0x9vgNOa219KHbvj8cQ2RVC5h6Fj','[]',0,'2024-11-29 10:28:32','2024-11-29 10:28:32','2025-11-29 15:58:32'),('f08edbb1e87682b1b598792f1240be8cc434a60dfa5769d95343ef783e7e1f54d5741ddaf93e9619',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','8yVliOwLGr1CErJgOG8pxHddoevePVxhqs1zs9mAbMGEEhOtxI','[]',0,'2024-12-10 11:05:12','2024-12-10 11:05:12','2025-12-10 16:35:12'),('f0deebd6dd2301dd05480db6c62ca08ddbe1a96ec4cd32070f29506278cb471d46be713c76f88312',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','kbpxEffOJnZ3gN3lsMEEtiObTR3TCN59iYIl5j1yUJElpfEPYN','[]',0,'2025-01-13 08:06:23','2025-01-13 08:06:23','2026-01-13 13:36:23'),('f2edcb9d7a0d9e719b2adf133fcea47a6c0d9c690fd4b0885a402ea146dbda95bc3bb6f0ded85c56',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','D3tF1kBbTdFvufT2jGEQm96tr2Iwp43bfOWrW1t5mUwA4WsSuX','[]',0,'2025-02-01 07:32:28','2025-02-01 07:32:28','2026-02-01 13:02:28'),('f31e960f6f60a2f9be6245e3832d6aa32f354edd9bd4808891d470241a901ce5d5978ff054f33d57',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','4op2x6DlAc3mOBkq0iIcnmO5y9jeWXXxInNQoQtH5oWhiUZYQp','[]',0,'2024-11-29 08:32:28','2024-11-29 08:32:28','2025-11-29 14:02:28'),('f3cd2ab6395f3d4b5b53989aee5dc3e9739ddc6965aedc7f6f6613ba5a22f1a202c3e655e29ab439',11,'9d4e701d-bab6-462e-b6db-6fdb326c293c','6677F2UX78ugqsGoF9cUshESxuAYiontOz1hX7LtKDakoLsPzu','[]',0,'2024-12-09 04:57:06','2024-12-09 04:57:06','2025-12-09 10:27:06'),('f46b09dbe3787625575b4867fbe45967ac3e1404b27da1b02738ca4df9cabbd2fa5f9900c8383b84',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','oJYOExjF3lw1H2YhEbcUoPfj6d6nOxIwjSr7HCcEZ5MuHyjXeo','[]',0,'2025-01-27 04:43:07','2025-01-27 04:43:07','2026-01-27 10:13:07'),('f4e7bc2b440068d7587fd4395ac7b4b640c24affec54907bcfcb35010d6545fd62b83dbf32c36df9',21,'9d4e701d-bab6-462e-b6db-6fdb326c293c','DklwMFte2SCcawitsYxyxqj9AcORBbgM4sypXvRW9qu5v26jyK','[]',0,'2025-01-20 02:15:51','2025-01-20 02:15:51','2026-01-20 07:45:51'),('f5996d3d7cbad6ff5564132027a6072e660b406e95efe820824c227cf98b492b3a7c70a4db93555f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','wZ3U8cdTGl2stOkD8C5njEuvxsWPgbzP2aYUT5bKXSLGXGWQO1','[]',0,'2025-01-10 10:20:29','2025-01-10 10:20:29','2026-01-10 15:50:29'),('f5cb12a67e86cb26626da849dd1e59dff62a7a0436a29e222719a1e02b71456ccd07f758ef12347f',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','OgH8md76aay6bySYCHq7i1damG7YBN6ZuM1zHePHAwOA5r1F22','[]',0,'2025-02-21 01:21:18','2025-02-21 01:21:18','2026-02-21 06:51:18'),('f7ab257e8f0772b6abb67bf4610cdd71e41a2c06df2c74a2cca4996775a7ce2b0e9a5be7e57d9b56',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','EO6rwB0oVA0abSbuHIDM3zHKMOjghV5BJCYxSjcmClKY3VkGco','[]',0,'2024-11-25 04:45:11','2024-11-25 04:45:11','2025-11-25 10:15:11'),('f850e839c1423cdac0f9b1ec5810af07eca9737635b2317d247f2ca5a5826e2dddf4f615734aeea9',22,'9d4e701d-bab6-462e-b6db-6fdb326c293c','P1Ubh7uYr15Fgpq9NszNLELwzGb0OBAL3mBsdlgIMc47IoORiJ','[]',0,'2025-01-20 01:59:00','2025-01-20 01:59:00','2026-01-20 07:29:00'),('f8e0f23530c39b86d18654df23e74302b0ec875842b8f93cab47de3859b833f1b95e1c1a21601f99',7,'9d4e701d-bab6-462e-b6db-6fdb326c293c','JyaVuodrhg0K2m7B2g6Js0TNKyg1KFeKoUglonPO0TP1toENMF','[]',0,'2024-11-25 02:18:46','2024-11-25 02:18:46','2025-11-25 07:48:46'),('fd387398d6cc1caa88f5884ae5962b76fa103ac45e8ada3ebf7135d882d6df8d336e3db18bee2e62',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','hhY3L7h4NhBfdu67bIkVao4iTguPHHVDQOKubQeQ5SY1wYPkuF','[]',0,'2025-01-21 19:30:26','2025-01-21 19:30:26','2026-01-22 01:00:26'),('fd85121a3364b1f3bdd3302e1668fc6e9e3ebe97854df623d5f1a15ba62ce484e0934ee7a495cdaf',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','c5UiXU0WN7tA4y2XQMnpGC8rYDGG7gUGKnW1jFgnUTLFC4QGD0','[]',0,'2024-12-12 23:55:34','2024-12-12 23:55:34','2025-12-13 05:25:34'),('fe550461373bb7904be3c717b8e8183dd97f1c6da20f5126e9f801aaa2ac695e703ef1f7bf0c8257',23,'9d4e701d-bab6-462e-b6db-6fdb326c293c','j2yjIvLpvBX9rvQb7340YWGu6rXZUGotciZ7bbgWBKlW4alwDP','[]',0,'2025-03-04 05:15:06','2025-03-04 05:15:06','2026-03-04 10:45:06'),('ff1f9b13a40aa84ab99d8f5f70f9faa72f4d4a366fad905fa4ced890e5ff3e84c71e78ddb59762a7',8,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2E6GfFpKMraFt8MvV5z8gxBSYqvdLsDKrvbR94c2t7Qk9wIZxJ','[]',0,'2025-01-22 09:04:03','2025-01-22 09:04:03','2026-01-22 14:34:03');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES ('9d4e701d-bab6-462e-b6db-6fdb326c293c',NULL,'Laravel Personal Access Client','GPMzi3N3dXGtxqF9xF2z5qtfVdaZdZJBbxta7cL0',NULL,'http://localhost',1,0,0,'2024-10-22 07:32:20','2024-10-22 07:32:20'),('9d4e701e-65e5-4246-9106-cb6fd6e4a204',NULL,'Laravel Password Grant Client','eqWsV9ZPFdz6yVkzf29uhgkX4cdmdJbXyLjHxxBG','users','http://localhost',0,1,0,'2024-10-22 07:32:20','2024-10-22 07:32:20');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,'9d4e701d-bab6-462e-b6db-6fdb326c293c','2024-10-22 07:32:20','2024-10-22 07:32:20');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `politician_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bluetooth_access` tinyint(1) NOT NULL DEFAULT '0',
  `excelsheet_download` tinyint(1) NOT NULL DEFAULT '0',
  `call_access` tinyint(1) NOT NULL DEFAULT '0',
  `pdf_download` tinyint(1) NOT NULL DEFAULT '0',
  `image_download` tinyint(1) NOT NULL DEFAULT '0',
  `survey_import_from_server` tinyint(4) NOT NULL DEFAULT '0',
  `voter_slip` tinyint(4) NOT NULL DEFAULT '0',
  `society_master` tinyint(1) NOT NULL DEFAULT '0',
  `caste_master` tinyint(1) NOT NULL DEFAULT '0',
  `profession_master` tinyint(1) NOT NULL DEFAULT '0',
  `karyakarta_master` tinyint(1) NOT NULL DEFAULT '0',
  `address_master` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_politician_id_foreign` (`politician_id`),
  KEY `permissions_user_id_foreign` (`user_id`),
  CONSTRAINT `permissions_politician_id_foreign` FOREIGN KEY (`politician_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,8,7,'appuser',0,0,0,0,0,0,0,0,0,0,0,0,'2024-10-23 01:42:33','2024-10-23 02:14:58'),(4,NULL,5,'appuser',0,1,0,1,0,0,0,0,0,0,0,0,'2024-10-23 03:50:34','2024-10-23 04:22:47'),(5,NULL,4,'appuser',0,0,0,0,0,0,0,0,0,0,0,0,'2024-10-23 03:51:51','2024-10-23 04:18:37'),(6,8,8,'appuser',1,1,1,1,1,1,1,1,1,1,0,0,'2024-11-28 01:40:07','2025-01-10 05:29:15'),(7,NULL,17,'appuser',1,0,1,0,1,0,0,0,0,0,0,0,'2024-12-20 01:20:30','2024-12-27 02:25:13'),(8,NULL,11,'appuser',0,1,0,1,0,0,0,0,0,0,0,0,'2024-12-20 01:23:11','2024-12-20 01:42:23'),(11,8,18,'staff',1,1,1,1,1,0,0,0,0,0,0,0,'2024-12-27 03:59:01','2024-12-27 03:59:01'),(12,8,19,'staff',0,1,1,0,0,0,0,0,0,0,0,0,'2024-12-27 04:11:33','2024-12-27 04:11:33'),(13,8,20,'staff',1,0,1,1,1,0,0,0,0,0,0,0,'2024-12-31 00:15:28','2024-12-31 00:15:28'),(14,NULL,1,'appuser',1,1,1,1,1,0,0,0,0,0,0,0,'2025-01-10 02:13:11','2025-01-10 03:49:16'),(15,NULL,22,'appuser',1,0,1,1,1,1,1,1,1,1,0,0,'2025-01-20 02:01:31','2025-01-20 02:24:13');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professions`
--

DROP TABLE IF EXISTS `professions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professions`
--

LOCK TABLES `professions` WRITE;
/*!40000 ALTER TABLE `professions` DISABLE KEYS */;
INSERT INTO `professions` VALUES (1,'service','2025-01-07 06:33:40','2025-01-07 06:33:40'),(2,'business','2025-01-07 06:53:26','2025-01-07 06:53:26'),(3,'Engineer','2025-01-08 07:24:18','2025-01-08 07:24:18');
/*!40000 ALTER TABLE `professions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_permissions`
--

DROP TABLE IF EXISTS `sms_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voter_user_id` bigint(20) unsigned DEFAULT NULL,
  `description` tinyint(10) DEFAULT NULL,
  `middle_name_check` tinyint(1) DEFAULT NULL,
  `booth_check` tinyint(1) DEFAULT NULL,
  `assembly_name_check` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sms_permissions_voter_user_id_foreign` (`voter_user_id`),
  CONSTRAINT `sms_permissions_voter_user_id_foreign` FOREIGN KEY (`voter_user_id`) REFERENCES `voters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_permissions`
--

LOCK TABLES `sms_permissions` WRITE;
/*!40000 ALTER TABLE `sms_permissions` DISABLE KEYS */;
INSERT INTO `sms_permissions` VALUES (1,NULL,1,1,0,1,'2025-02-24 04:39:55','2025-03-05 05:46:01');
/*!40000 ALTER TABLE `sms_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societies`
--

DROP TABLE IF EXISTS `societies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `societies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `society` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societies`
--

LOCK TABLES `societies` WRITE;
/*!40000 ALTER TABLE `societies` DISABLE KEYS */;
INSERT INTO `societies` VALUES (1,'society1','2025-01-07 03:43:10','2025-01-07 03:43:10'),(2,'kalitala','2025-01-07 04:46:22','2025-01-07 04:46:22'),(3,'howrah','2025-01-08 03:34:41','2025-01-08 03:34:41');
/*!40000 ALTER TABLE `societies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terms_conditions`
--

DROP TABLE IF EXISTS `terms_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `terms_conditions` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms_conditions`
--

LOCK TABLES `terms_conditions` WRITE;
/*!40000 ALTER TABLE `terms_conditions` DISABLE KEYS */;
INSERT INTO `terms_conditions` VALUES (1,'By using this software, you must agree to the following terms and conditions:\r\n\r\n-This software is for voters, politicians, and volunteers to help search for voters and find their voting centers.\r\n-After searching, you must validate data in the list published by the government.\r\n-If you share data through the software, you must not disturb the privacy of voters.\r\n-Any misuse of the software will lead to legal action against you.\r\n-While using this software and its features, you must not violate any Achar Sanhita (Model Code of Conduct) rules.\r\n-While using the survey module, it is the responsibility of the user to follow the rules of the -survey and maintain the privacy of voters as per the law of local and central government.\r\n-If you misuse any feature provided in this software, you are fully liable for any legal disputes that occur.\r\n-Bluetooth printer activations are limited to printers purchased. For more activations, you need to pay license charges per printer.\r\n','2025-01-13 09:55:43','2025-01-13 09:55:43');
/*!40000 ALTER TABLE `terms_conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voter_user_id` bigint(20) unsigned NOT NULL,
  `society` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_no_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_no_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booth_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booth_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_no_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_no_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srn_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srn_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voting_centre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voting_centre_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voting_centre_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taluka` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taluka_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taluka_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assembly` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assembly_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assembly_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_addresses_voter_user_id_foreign` (`voter_user_id`),
  CONSTRAINT `user_addresses_voter_user_id_foreign` FOREIGN KEY (`voter_user_id`) REFERENCES `voters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

LOCK TABLES `user_addresses` WRITE;
/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
INSERT INTO `user_addresses` VALUES (1,1,'Salkia','सलकिया','सलकिया','demo-04','डेमो-04','डेमो-04','Flat-04','फ्लॅट-04','फ़्लैट-04','Sitapur','सीतापूर','सीतापुर','Boothno-04','बूथनो-04','बूथनो-04','Sahaganj','सहजगंज','साहगंज','Part-004\n','भाग-004','भाग-004','Test04','चाचणी04','टेस्ट04','18 - Pimpale','18 - पिंपळे','18 - पिंपले','Alibag','अलिबाग','अलीबाग','39 - Teosa\n','39 - तेओसा','39 - टीओसा','2024-11-28 00:28:34','2024-12-19 05:32:21'),(2,2,'Rishra','रिश्रा','रिशरा','demo-04','डेमो-04','डेमो-04','Flat-04','फ्लॅट-04','फ़्लैट-04','Sitapur','सीतापूर','सीतापुर','Boothno-04','\nबूथनो-04','बूथनो-04','Sahaganj','सहजगंज','साहगंज','Part-004\n','भाग-004','भाग-004','Test04','चाचणी04','टेस्ट04','18 - Pimpale','18 - पिंपळे','18 - पिंपले','Alibag','अलिबाग','अलीबाग','39 - Teosa\n','39 - तेओसा','39 - टीओसा','2024-11-28 00:34:01','2024-11-28 23:32:25'),(3,4,'Salkia','सलकिया','सलकिया','demo-03','डेमो-03','डेमो-03','Flat-03','फ्लॅट-03','फ़्लैट-03','Purbipara','पुर्बीपारा','पुरबिपारा','Boothno-03','बूथनो-03','बूथनो-03','Bharatpur','भरतपूर','भरतपुर','Part-003\n','भाग-003','भाग-003','Test03','चाचणी03','टेस्ट03','12 - Nimon','12 - निमोन','12 - निमोन','Alibag','अलिबाग','अलीबाग','39 - Teosa\n','39 - तेओसा','39 - टीओसा','2024-11-28 00:34:14','2024-11-28 06:17:18'),(4,5,'Arsha','अर्शा','अर्शा','demo-03','डेमो-03','डेमो-03','Flat-03','फ्लॅट-03','फ़्लैट-03','Raghunathpur\n','रघुनाथपूर','रघुनाथपुर','Boothno-03','बूथनो-03','बूथनो-03','Bharatpur','भरतपूर','भरतपुर','Part-003\n','भाग-003','भाग-003','Test03','चाचणी03','टेस्ट03','12 - Nimon','12 - निमोन','12 - निमोन','Alibag','अलिबाग','अलीबाग','21 - Malkapur','21 - मलकापूर','21-मलकापुर','2024-11-28 00:34:29','2024-11-28 00:34:29'),(5,6,'Salkia','सलकिया','सलकिया','demo-03','डेमो-03','डेमो-03','Flat-03','फ्लॅट-03','फ़्लैट-03','Purbipara','पुर्बीपारा','पुरबिपारा','Boothno-03','बूथनो-03','बूथनो-03','Bharatpur','भरतपूर','भरतपुर','Part-003\n','भाग-003','भाग-003','Test03','चाचणी03','टेस्ट03','12 - Nimon','12 - निमोन','12 - निमोन','Lanja','लांजा','लांजा','21 - Malkapur','21-मलकापुर','21-मलकापुर','2024-11-28 00:34:47','2024-11-28 00:34:47'),(6,12,'Arsha','अर्शा','अर्शा','demo-02','डेमो-02','डेमो-02','Flat-02','फ्लॅट-02','फ़्लैट-02','Sitapur','सीतापूर','सीतापुर','Boothno-02','बूथनो-02','बूथनो-02','Kishanganj','किशनगंज','किशनगंज','Part-002\n','भाग-002','भाग-002','Test02','चाचणी02','टेस्ट02','7 - Paregaon Bu.','7 - पारेगाव बु.','7- पारेगांव बु.','Lanja','लांजा','लांजा','21 - Malkapur','21 - मलकापूर','21 - मलकापूर','2024-11-28 00:50:53','2024-12-23 00:36:49'),(7,13,'Arsha','अर्शा','अर्शा','demo-02','डेमो-02','डेमो-02','Flat-02','फ्लॅट-02','फ़्लैट-02','Raghunathpur\n','रघुनाथपूर','रघुनाथपुर','Boothno-02','बूथनो-02','बूथनो-02','Kishanganj','किशनगंज','किशनगंज','Part-002\n','भाग-002','भाग-002','Test02','चाचणी02','टेस्ट02','7 - Paregaon Bu.','7 - पारेगाव बु.','7- पारेगांव बु.','Lanja','लांजा','लांजा','15 - Amalner','15 - अमळनेर','15 - अमलनेर','2024-12-24 00:59:34','2024-12-24 00:59:34'),(8,14,'Salkia','सलकिया','सलकिया','demo-02','डेमो-02','डेमो-02','Flat-02','फ्लॅट-02','फ़्लैट-02','Purbipara','पुर्बीपारा','पुरबिपारा','Boothno-02','बूथनो-02','बूथनो-02','Kishanganj','किशनगंज','किशनगंज','Part-002\n','भाग-002','भाग-002','Test02','चाचणी02','टेस्ट02','7 - Paregaon Bu.','7 - पारेगाव बु.','7- पारेगांव बु.','Kudal','कुडाळ','कुदाल','15 - Amalner','15 - अमळनेर','15 - अमलनेर','2024-12-24 00:59:46','2024-12-24 00:59:46'),(9,15,'Minus maiores est q','कमी प्रमुख q आहे','कम प्रमुख q है','demo-01','डेमो-01','डेमो-01','Flat-01','फ्लॅट-01','फ़्लैट-01','Sitapur','सीतापूर','सीतापुर','Boothno-01','बूथनो-01','बूथनो-01','Santoshpur','संतोषपूर','संतोषपुर','Part-001','मजा आहे कारण ती वेळ आहे','यह मज़ेदार है क्योंकि यह समय है','Test01','चाचणी01','टेस्ट01','1 - Devkauthe','1 - देवकौठे','1- देवकौथे','Kudal','कुडाळ','कुदाल','15 - Amalner','15 - अमळनेर','15 - अमलनेर','2024-12-31 01:34:01','2024-12-31 01:34:01'),(10,16,'Nilachal','नीलाचल','नीलाचल','demo-01','डेमो-01','डेमो-01','Flat-01','फ्लॅट-01','फ़्लैट-01','demo address','डेमो पत्ता','डेमो पता','Boothno-01','बूथनो-01','बूथनो-01','Santoshpur','संतोषपूर','संतोषपुर','Part-001','भाग01','भाग01','Test01','चाचणी01','टेस्ट01','1 - Devkauthe','1 - देवकौठे','1- देवकौथे','Kudal','कुडाळ','कुदाल','Purba','पुर्बा','पूर्ब','2025-01-19 23:30:14','2025-01-19 23:34:43'),(11,17,'Salkia','साल्किया','सलकिया','demo-01','डेमो-01','डेमो-01','Flat-01','फ्लॅट-01','फ़्लैट-01','Howrah','हावडा','हावड़ा','Boothno-01','बूथनो-01','बूथनो-01','Santoshpur','संतोषपूर','संतोषपुर','Part001','भाग001','भाग001','Test01','चाचणी01','टेस्ट01','1 - Devkauthe','1 - देवकौठे','1- देवकौथे','Santragachi','पोहणे','तैरना','Purbipara','पुर्बीपारा','Purbipara','2025-01-19 23:50:46','2025-01-19 23:51:53');
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `politician_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_login` int(10) NOT NULL DEFAULT '0',
  `otp` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_otp_verified` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Maia Fuller',NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,'sopexixuru@mailinator.com',NULL,NULL,NULL,NULL,NULL,'2024-10-21 06:18:03','2025-01-10 02:14:16'),(2,NULL,'Mona','Linus Cline','Cameron',NULL,NULL,0,0,NULL,NULL,NULL,'female','63','tagic@mailinator.com','1982-07-20','3767567567',NULL,NULL,NULL,'2024-10-22 04:56:01','2024-10-22 04:56:01'),(4,NULL,'first','app','mkuser','appuser',NULL,0,0,'1234','1',NULL,NULL,NULL,'mk@gmail.com',NULL,NULL,NULL,'2654995',NULL,'2024-10-22 06:51:30','2025-01-08 05:57:59'),(5,NULL,'first1','app','mkuser1','appuser',NULL,0,0,'8385',NULL,NULL,NULL,NULL,'mk1@gmail.com',NULL,NULL,NULL,'$2y$10$gT0/.MpEP8qba4Ra6jtLpuznyQmgDRvwWkd0KNfDWHb9jmJu96Qve',NULL,'2024-10-22 06:52:54','2025-01-08 05:57:56'),(7,NULL,'demo','user','surname','appuser',NULL,0,0,'887189','1',NULL,NULL,NULL,'demo@gmail.com',NULL,'78745400',NULL,'$2y$10$aq5V9JCbYLG2J57t5WpYTuVNMZyghYG650L7SMSz1xJiMBGltthWu',NULL,'2024-11-25 02:11:05','2025-01-08 05:57:53'),(8,NULL,'sanjay','kumar','ray','appuser',NULL,1,1,'1234','1',NULL,NULL,NULL,'sanjay1@gmail.com',NULL,'8092239202',NULL,'$2y$10$RF.DeZzldGmKM1Zpi//iVeT5ajQU0FxegG.ee8gkhzuxS1/YaWpee',NULL,'2024-11-25 03:30:14','2025-03-04 05:01:22'),(9,NULL,'first1','app','mkuser1','appuser',NULL,0,0,'674343',NULL,NULL,NULL,NULL,'mk21@gmail.com',NULL,'78907914182',NULL,'$2y$10$zehO1hcBCbtTGfG7PApZFerzrZDcwewX2ZpOgcoc7ZIwxzQT./3Gy',NULL,'2024-11-25 03:31:27','2025-01-08 05:57:51'),(10,NULL,'manish','kumar','madanlal','appuser',NULL,0,0,'1234','1',NULL,NULL,NULL,'manish@gmail.com',NULL,'1234567890',NULL,'$2y$10$pqPOaEx3bs0LlC030A2KqeykFaa0n9930JjQOJrtVoqGvgajztKKK',NULL,'2024-11-25 03:37:08','2025-01-08 05:57:49'),(11,NULL,'Manaswita','demo','karar','appuser',NULL,0,0,'1234','1',NULL,NULL,NULL,'manaswita@gmail.com',NULL,'789079333',NULL,'$2y$10$U8N7PbiBnnvklgcGduUDQeZMgGwUiEyUQm8YP.dfXHf6mqyBzGf82',NULL,'2024-11-25 04:08:35','2025-01-08 05:57:45'),(12,NULL,'manish','kumar','madanlal','appuser',NULL,0,0,'1234','1',NULL,NULL,NULL,'manish12@gmail.com',NULL,'1234567899',NULL,'$2y$10$r3QJwTpL.O/elJxc0BwsWuICMMpiTH8A4zblcfEYmV8z9DpAnZG0u',NULL,'2024-11-26 00:58:30','2025-01-13 05:37:28'),(17,NULL,'abc','xyz','pqr','appuser',NULL,0,0,'1234',NULL,NULL,NULL,NULL,'rijavanafakir@gmail.com',NULL,'8468854636',NULL,'$2y$10$ROVTXnhYTlmu.oUuzF9XbOGEXEAdMcT.Qc4sZhTqKHI/cD3KE3LQy',NULL,'2024-12-10 11:50:29','2025-01-13 05:37:10'),(18,8,'staff','middle','staffsurname','staff','Admin',0,0,NULL,NULL,'voter_images/1735623748_download.jpg','male','50','staffone@gmail.com',NULL,'1234567890',NULL,NULL,NULL,'2024-12-27 03:59:01','2024-12-31 00:12:28'),(19,8,'Regina','Linus Cline','Salinas','staff','Caste Master',0,0,NULL,NULL,'voter_images/1735292493_download (3).jpg','male','67','regina@gmail.com',NULL,'99933222355',NULL,NULL,NULL,'2024-12-27 04:11:33','2024-12-31 00:12:49'),(20,8,'Kristen','Rae Mullins','Peterson','staff','Karya Karta Master',0,0,NULL,NULL,'voter_images/1735623928_girl_avtar.jfif','female','71','myfateseb@mailinator.com',NULL,'14111736468',NULL,NULL,NULL,'2024-12-31 00:15:28','2024-12-31 00:15:28'),(21,NULL,'Ranajit','dhhd','Naskar','appuser',NULL,0,0,'1234','1',NULL,NULL,NULL,'ABC@gmail.com',NULL,'8420180644',NULL,'$2y$10$zi6R1K.bylM4.OIWQF5oA.zBdAEc3mpRPPGON.OiOnS1nlZ8K64HW',NULL,'2025-01-10 03:48:35','2025-01-10 03:49:12'),(22,NULL,'fustion','sa','ku','appuser',NULL,1,0,'1234','1',NULL,NULL,NULL,'fustion@12345',NULL,'8100156290',NULL,'$2y$10$A7U7qDuxI27vF0KBAJuet.G/injI.AHm5F.CEKHq65Nhqfn6LHwnq',NULL,'2025-01-20 01:54:09','2025-01-20 02:06:02'),(23,NULL,'fustion','f','com','appuser',NULL,1,1,'1234','1',NULL,NULL,NULL,'a@gmail.com',NULL,'8981552920',NULL,'$2y$10$N7TGL1oKa3ayDUL2b8HwTuwPOTgvtNCJop5lJoS/aeH49fu23dN5a',NULL,'2025-01-20 06:36:53','2025-03-04 11:07:10'),(24,NULL,'parsant','.','fusion','appuser',NULL,0,1,'1234','1',NULL,NULL,NULL,'prasant@gmail.com',NULL,'7908595844',NULL,'$2y$10$D4bb1pXv2rBAuzX12VXdK.5SUp76KuzASeK5jTl2anFyTvz.XNykW',NULL,'2025-02-18 04:54:32','2025-02-18 04:55:02'),(25,NULL,'fusion','fusion','techlab','appuser',NULL,0,1,'1234',NULL,NULL,NULL,NULL,'arindam@fusiontechlab.com',NULL,'9836626299',NULL,'$2y$10$FEYsXTCpJ7QFDFnfSesb0.xFiiLfkelvV7s8jBQockELpIPXZZarK',NULL,'2025-03-04 07:51:43','2025-03-04 07:52:08'),(26,NULL,'Asif','Bhikan','Shaikh','appuser',NULL,0,1,'1234','1',NULL,NULL,NULL,'asif@gmail.com',NULL,'9665559491',NULL,'$2y$10$fBLzte8acX.mld31pUzCX.eRtc23P6RPIBaqDVCp1eObUz9wDO4Ha',NULL,'2025-03-04 10:53:51','2025-03-04 10:54:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voters`
--

DROP TABLE IF EXISTS `voters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personnel` tinyint(1) DEFAULT '0',
  `voter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dead` tinyint(1) NOT NULL DEFAULT '0',
  `voted` tinyint(1) NOT NULL DEFAULT '0',
  `star_voter` tinyint(1) NOT NULL DEFAULT '0',
  `repeated_voter` tinyint(4) NOT NULL DEFAULT '0' COMMENT '''0''= "non repeated voter" ''1''="Repeated Voter"',
  `colour_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_member_id` json DEFAULT NULL,
  `demands` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demands_mr` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demands_hi` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `voters_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voters`
--

LOCK TABLES `voters` WRITE;
/*!40000 ALTER TABLE `voters` DISABLE KEYS */;
INSERT INTO `voters` VALUES (1,'Rudyard','रुडयार्ड','रुडयार्ड','Lance West','लांस वेस्ट','लान्स वेस्ट','Salinas','सॅलिनास','लांस वेस्ट','mail11@gmail.com',NULL,'voter_images/1737349207_download (1).jpg','male','male_mr','male_hi',51,'1985-01-13','Brahmin','ब्राह्मण','ब्राह्मणों','Sarpanch','सरपंच','सरपंच',0,'AA10239983BB',0,1,0,1,'#FF4CAF50','000000000001','000000000000','[11, 6]','demandsa','demands1_mr','demands1_hi','2024-10-22 23:49:56','2025-03-05 06:09:26'),(2,'Alden','अल्डेन','एल्डन','Vincent Bolton','व्हिन्सेंट बोल्टन','विंसेंट बोल्टन','Barry','बॅरी','बैरी','sanjaya@mailinator.com',NULL,'voter_images/1732777807_download (3).jpg','female','female_mr','female_hi',59,'2011-05-16','Brahmins','ब्राह्मण','ब्राह्मणों','Sarpanch','सरपंच','सरपंच',0,'AA1213442',1,1,0,0,'#FFF44336','877879878','387876554','[1, 4, 6, 10]','demands2','demands2_mr','demands2_hi','2024-10-23 00:07:22','2025-03-04 05:32:28'),(4,'Mollie','मोली','मौली','Kiona Zamora','किओना झामोरा','किओना ज़मोरा','Mcgowan','मॅकगोवन','मैकगोवन','waxahakyqy56@mailinator.com',NULL,'voter_images/1729662583_download.jpg','male','male_mr','male_hi',85,'2024-01-13','Brahmins','ब्राह्मण','ब्राह्मणों','Sarpanch','सरपंच','सरपंच',0,'Modi consectetur nu',0,1,1,0,'#008000','356546546','356546546','[6, 5, 2, 1]','demands3','demands3_mr','demands3_hi','2024-10-23 00:09:14','2024-11-28 06:18:47'),(5,'Ciara','सियारा','सियारा','Hilel Burch','हिलेल बर्च','हिलेल बर्च','Kirkland','किर्कलँड','किर्कलैंड','porak@mailinator.com',NULL,'voter_images/1732777807_download (3).jpg','other','other_mr','other_hi',67,'1999-03-12','Kshatriyas','क्षत्रिय','क्षत्रिय','Sarpanch','सरपंच','सरपंच',1,'Dicta voluptate mole',1,1,0,0,'#FF0000','1010101010','86444455','[4]','demands4','demands4_mr','demands4_hi','2024-10-23 00:10:50','2024-12-06 07:25:31'),(6,'Ciara','सियारा','सियारा','Venus Holcomb','वीनस होलकोम्ब','वीनस होलकोम्ब','Tate','टेट','टेट','dopipef@mailinator.com',NULL,'voter_images/1729662583_download.jpg','other','other_mr','other_hi',71,'1997-03-18','Kshatriyas','क्षत्रिय','क्षत्रिय','Sarpanch','सरपंच','सरपंच',1,'Aut velit ipsam faci',0,1,0,1,'#FFFF5722','4545445','4541212','[1, 2]','demands1','demands1_mr','demands1_hi','2024-10-23 00:19:43','2024-12-23 08:50:27'),(8,'Lila','लीला','लीला','Oscar Rodgers','ऑस्कर रॉजर्स','ऑस्कर रॉजर्स','Morgan','मॉर्गन','मॉर्गन','cujerakyle@mailinator.com',NULL,'voter_images/1732710269_download (3).jpg','male','male_mr','male_hi',90,'1995-12-28','Kshatriyas','क्षत्रिय','क्षत्रिय','Sarpanch','सरपंच','सरपंच',1,'Aut enim rerum optio',0,0,0,0,'#FFFFFF','1234567890','1234567890',NULL,'demands2','demands2_mr','demands2_hi','2024-11-27 06:54:29','2024-11-27 06:54:29'),(9,'Felicia','समर','मौली','Stephen Hall','सोमा','कोमल','Woodward','सॉलिस','किर्कलैंड','dyzonugaly@mailinator.com',NULL,'voter_images/1732710283_girl_avtar.jfif','female','female_mr','female_hi',41,'2000-10-14','Kshatriyas','क्षत्रिय','क्षत्रिय','deputy','उप','उप',0,'Dignissimos cum do c',0,1,0,0,'#008000','23456778','1234567890',NULL,'demands3','demands3_mr','demands3_hi','2024-11-27 06:54:43','2024-11-27 06:54:43'),(10,'Alan','रिया','Alan_hi','Harding Chaney','सोमा','कुमार','Hood','मॉर्गन','किर्कलैंड','viluf@mailinator.com',NULL,'voter_images/1732774647_property3.jpg','other','other_mr','other_hi',80,'2005-10-27','Vaishyas','वैश्यस्य','वैश्य','deputy','उप','उप',0,'Necessitatibus quos',1,0,0,1,'#FFF44336','6598989','1234567890',NULL,'demands4','demands4_mr','demands4_hi','2024-11-27 06:57:50','2025-01-14 00:07:03'),(11,'Megan','समर','Megan_hi','Odysseus Cross','रागावलेला रेली','कुमार','Lynch','Lynch_mr','सेन','magod@mailinator.com',NULL,'voter_images/1732774647_property3.jpg','other','other_mr','other_hi',7,'2024-01-10','Vaishyas','वैश्यस्य','वैश्य','deputy','उप','उप',0,'Eum sapiente veritat',0,1,0,0,'#FF2196F3','0123456789','454545647',NULL,'demands1','demands1_mr','demands1_hi','2024-11-28 00:47:27','2024-12-13 08:20:36'),(12,'Inez12','रिया','Inez_hi११११','Cain Vaughn','सोमा','कोमल','Fitzgerald','मॉर्गन','मिश्रा','baxuho@mailinator.com',NULL,'voter_images/1732774853_girl_avtar.jfif','male','male_mr','male_hi',6,'1979-04-03','Vaishyas','वैश्यस्य','वैश्य','deputy','उप','उप',0,'Voluptatibus vitae f',0,1,1,0,'#FFFFFF','9874561230','7895641',NULL,'demands2','demands2_mr','demands2    _hi','2024-11-28 00:50:53','2024-12-23 00:45:22'),(13,'sonikaa','ध्वनिलहरी','ध्वनि','raniii','जखमी','घायल','sen','सेन','सेन','moniii@gmail.com',NULL,'voter_images/1732715846_download (3).jpg','female','स्त्री','महिला',34,'2009-07-25','Brahmins','ब्राह्मण','ब्राह्मणों','deputy','उप','उप',1,'1234566',0,0,0,0,'#FF0000','12345678','7876874',NULL,'demands','मागण्या','मांगों','2024-12-24 00:59:30','2024-12-24 00:59:30'),(14,'riya','रिया','रिया','soma','सोमा','सोम','dev','देव','देव','riya@gmail.com',NULL,'voter_images/1729662583_download.jpg','female','स्त्री','महिला',23,'2009-04-03','Brahmins','ब्राह्मण','ब्राह्मणों','subdeputy','उपउपनियुक्त','उपउप',1,'2356888',0,0,1,0,'#FF0000','789456123','87451415',NULL,'demandsdemands','मागण्या','मांगेंमांगें','2024-12-24 00:59:41','2024-12-24 00:59:41'),(15,'Clayton','क्लेटन','क्लेटन','Marah Reilly','रागावलेला रेली','गुस्से में रेली','Solis','सॉलिस','सोलिस','hafupodan@mailinator.com',NULL,'voter_images/1735628630_download (2).jpg','male','पुरुष','पुरुष',85,'2019-01-10','Kshatriyas','क्षत्रिय','क्षत्रिय','subdeputy','उपउपनियुक्त','उपउप',0,'Iusto deserunt susci',0,1,1,0,NULL,'15445552','4548785858',NULL,NULL,NULL,NULL,'2024-12-31 01:33:54','2025-01-09 01:26:37'),(16,'Samar','समर','समर','Kumar','कुमार','कुमार','Sen','सेन','सेन','samar@gmail.com',NULL,'voter_images/1732774647_property3.jpg','male','पुरुष','पुरुष',50,'1994-02-01','Brahmin','ब्राह्मण','ब्राह्मण','subdeputy','उपउपनियुक्त','उपउप',0,'ABC123',0,0,1,0,'#ee82ee','78788978545','78744787870',NULL,'demo','डेमो','डेमो','2025-01-19 23:30:09','2025-01-19 23:30:09'),(17,'Rashi','राशी','राशि','Komal','कोमल','कोमल','Mishra','मिश्रा','मिश्रा','rashi@gmail.com',NULL,'voter_images/1737350439_girl_avtar.jfif','female','स्त्री','महिला',30,'2010-02-20','Brahmin','ब्राह्मण','ब्राह्मण','subdeputy','उपउपनियुक्त','उपउप',0,'XYZ001',0,0,1,0,'#0000ff','987456321','963852741',NULL,'testing','चाचणी','परीक्षण','2025-01-19 23:50:41','2025-01-19 23:50:41');
/*!40000 ALTER TABLE `voters` ENABLE KEYS */;
UNLOCK TABLES;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-05 17:14:16
