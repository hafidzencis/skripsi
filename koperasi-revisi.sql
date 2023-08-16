-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: koperasi-revisi
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `deposits`
--

DROP TABLE IF EXISTS `deposits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type_deposit_id` int NOT NULL,
  `nominal_simpanan` int NOT NULL,
  `tanggal_membayar` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipe_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_transaction` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposits`
--

LOCK TABLES `deposits` WRITE;
/*!40000 ALTER TABLE `deposits` DISABLE KEYS */;
INSERT INTO `deposits` VALUES (1,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 09:35:38','2023-07-26 09:35:38','TRANSFER',60000),(2,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 09:45:06','2023-07-26 09:45:06','TRANSFER',60000),(3,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:02:10','2023-07-26 10:02:10','TRANSFER',60000),(4,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:13:21','2023-07-26 10:13:21','TRANSFER',60000),(5,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:15:06','2023-07-26 10:15:06','TRANSFER',60000),(6,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:21:49','2023-07-26 10:21:49','TRANSFER',60000),(7,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:23:36','2023-07-26 10:23:36','TRANSFER',60000),(8,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:24:56','2023-07-26 10:24:56','TRANSFER',60000),(9,2,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:25:24','2023-07-26 10:25:24','TRANSFER',60000),(10,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:26:29','2023-07-26 10:26:29','TRANSFER',60000),(11,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:33:28','2023-07-26 10:33:28','TRANSFER',60000),(12,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:34:07','2023-07-26 10:34:07','TRANSFER',60000),(13,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:34:30','2023-07-26 10:34:30','TRANSFER',60000),(14,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:44:25','2023-07-26 10:44:25','TRANSFER',60000),(15,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:48:22','2023-07-26 10:48:22','TRANSFER',60000),(16,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 10:52:24','2023-07-26 10:52:24','TRANSFER',60000),(17,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 11:01:09','2023-07-26 11:01:09','TRANSFER',60000),(18,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 11:18:48','2023-07-26 11:18:48','TRANSFER',60000),(19,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 11:21:26','2023-07-26 11:21:26','TRANSFER',60000),(20,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 11:24:11','2023-07-26 11:24:11','TRANSFER',60000),(21,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 23:09:07','2023-07-26 23:09:07','TRANSFER',60000),(22,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 23:14:03','2023-07-26 23:14:03','TRANSFER',60000),(23,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 23:21:13','2023-07-26 23:21:13','TRANSFER',60000),(24,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 23:26:59','2023-07-26 23:26:59','TRANSFER',60000),(25,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 23:37:56','2023-07-26 23:37:56','TRANSFER',60000),(26,4,2,50000,NULL,'PENDING',NULL,'2023-07-26 23:57:35','2023-07-26 23:57:35','TRANSFER',60000),(27,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:06:46','2023-07-27 00:06:46','TRANSFER',60000),(28,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:10:52','2023-07-27 00:10:52','TRANSFER',60000),(29,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:20:46','2023-07-27 00:20:46','TRANSFER',60000),(30,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:24:44','2023-07-27 00:24:44','TRANSFER',60000),(31,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:29:02','2023-07-27 00:29:02','TRANSFER',60000),(32,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:33:47','2023-07-27 00:33:47','TRANSFER',60000),(33,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:39:04','2023-07-27 00:39:04','TRANSFER',60000),(34,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:41:51','2023-07-27 00:41:51','TRANSFER',60000),(35,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:46:06','2023-07-27 00:46:06','TRANSFER',60000),(36,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:55:04','2023-07-27 00:55:04','TRANSFER',60000),(37,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 00:55:15','2023-07-27 00:55:15','TRANSFER',60000),(38,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 01:02:40','2023-07-27 01:02:40','TRANSFER',60000),(39,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 01:07:30','2023-07-27 01:07:30','TRANSFER',60000),(40,4,2,50000,NULL,'PENDING',NULL,'2023-07-27 01:12:55','2023-07-27 01:12:55','TRANSFER',60000),(41,4,2,50000,'2023-07-27','LUNAS',NULL,'2023-07-27 01:20:35','2023-07-27 01:21:37','TRANSFER',60000),(42,4,1,20000,NULL,'PENDING',NULL,'2023-07-27 06:54:18','2023-07-27 06:54:18','TRANSFER',30000),(43,2,2,50000,'2023-07-28','LUNAS',NULL,'2023-07-27 16:26:06','2023-07-27 16:27:14','TRANSFER',60000),(44,2,1,20000,NULL,'PENDING',NULL,'2023-07-27 16:28:32','2023-07-27 16:28:32','TRANSFER',30000),(45,2,1,20000,'2023-07-28','LUNAS',NULL,'2023-07-27 16:31:30','2023-07-27 16:32:01','TRANSFER',30000),(46,4,1,20000,'2023-07-28','LUNAS',NULL,'2023-07-28 02:46:12','2023-07-28 02:59:33','TRANSFER',30000),(47,4,1,20000,NULL,'PENDING',NULL,'2023-07-28 07:54:20','2023-07-28 07:54:20','TRANSFER',30000),(48,3,2,50000,NULL,'PENDING',NULL,'2023-07-28 14:52:01','2023-07-28 14:52:01','TRANSFER',60000),(49,3,2,50000,'2023-07-29','LUNAS',NULL,'2023-07-28 14:54:12','2023-07-28 14:54:36','TRANSFER',60000),(50,3,1,20000,'2023-07-29','LUNAS',NULL,'2023-07-28 14:55:06','2023-07-28 14:55:50','TRANSFER',30000),(51,5,2,50000,NULL,'PENDING','Top up mbah zeus','2023-07-29 20:30:59','2023-07-29 20:30:59','TRANSFER',60000),(52,5,2,50000,NULL,'PENDING','Top up mbah zeus 2','2023-07-29 20:33:30','2023-07-29 20:33:30','TRANSFER',60000),(53,6,2,50000,'2023-07-30','LUNAS','Ngutang','2023-07-29 20:44:12','2023-07-29 20:44:39','TRANSFER',60000),(54,2,1,20000,'2023-07-31','LUNAS',NULL,'2023-07-31 06:15:15','2023-07-31 06:18:19','TRANSFER',30000),(55,2,1,20000,'2023-08-10','LUNAS',NULL,'2023-08-09 19:51:46','2023-08-09 19:52:35','TRANSFER',30000),(56,12,2,50000,'2023-08-10','LUNAS',NULL,'2023-08-09 20:34:43','2023-08-09 20:35:14','TRANSFER',60000),(57,12,1,20000,NULL,'PENDING',NULL,'2023-08-09 20:38:24','2023-08-09 20:38:24','TRANSFER',30000),(58,12,1,20000,'2023-08-10','LUNAS',NULL,'2023-08-09 20:40:32','2023-08-09 20:41:22','TRANSFER',30000),(59,3,1,20000,'2023-08-11','LUNAS',NULL,'2023-08-09 21:01:04','2023-08-09 21:02:24','DITEMPAT',NULL);
/*!40000 ALTER TABLE `deposits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `installments`
--

DROP TABLE IF EXISTS `installments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `installments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `loan_id` int NOT NULL,
  `type_installment_id` int NOT NULL,
  `nominal_angsuran` int NOT NULL,
  `angsuran_ke` int NOT NULL DEFAULT '0',
  `tanggal_pembayaran` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nominal_hasil` int NOT NULL DEFAULT '0',
  `tipe_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_transaction` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `installments`
--

LOCK TABLES `installments` WRITE;
/*!40000 ALTER TABLE `installments` DISABLE KEYS */;
INSERT INTO `installments` VALUES (1,2,5,1,500000,1,NULL,'PENDING',NULL,'2023-07-27 17:08:52','2023-07-27 17:08:52',4500000,'TRANSFER',510000),(2,2,5,1,416667,1,NULL,'PENDING',NULL,'2023-07-27 17:15:06','2023-07-27 17:15:06',4583333,'TRANSFER',426667),(3,2,5,1,416667,1,NULL,'PENDING',NULL,'2023-07-27 17:27:47','2023-07-27 17:27:47',4583333,'TRANSFER',426667),(4,2,5,1,416667,1,NULL,'PENDING',NULL,'2023-07-27 17:37:10','2023-07-27 17:37:10',4583333,'TRANSFER',426667),(5,2,5,1,416667,1,NULL,'PENDING',NULL,'2023-07-27 17:39:30','2023-07-27 17:39:30',4583333,'TRANSFER',426667),(6,2,5,1,416667,1,'2023-07-28','LUNAS',NULL,'2023-07-27 17:45:16','2023-07-27 17:47:44',4583333,'TRANSFER',426667),(7,3,7,1,500000,1,'2023-07-29','LUNAS',NULL,'2023-07-28 16:46:52','2023-07-28 16:48:25',4500000,'TRANSFER',510000),(8,3,7,2,90000,2,'2023-07-29','LUNAS',NULL,'2023-07-28 19:59:51','2023-07-28 20:07:16',4500000,'TRANSFER',100000),(9,12,8,1,500000,1,'2023-08-10','LUNAS',NULL,'2023-08-09 20:45:58','2023-08-09 20:47:31',4500000,'TRANSFER',510000),(10,12,8,2,90000,2,'2023-08-10','LUNAS',NULL,'2023-08-09 20:50:37','2023-08-09 20:53:32',4500000,'TRANSFER',100000),(11,12,8,1,3000000,3,'2023-08-10','LUNAS',NULL,'2023-08-09 20:52:21','2023-08-09 20:53:24',1500000,'TRANSFER',3010000),(12,12,8,2,30000,4,NULL,'PENDING',NULL,'2023-08-09 20:53:19','2023-08-09 20:53:19',1500000,'TRANSFER',40000);
/*!40000 ALTER TABLE `installments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nominal_pinjaman` bigint NOT NULL,
  `tanggal_pembayaran_administrasi` date DEFAULT NULL,
  `jasa` int NOT NULL,
  `tenor` int NOT NULL,
  `setuju` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrasi` int DEFAULT NULL,
  `tanggal_acc_pinjaman` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lunas` date DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipe_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_transaction` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
INSERT INTO `loans` VALUES (1,1,5000000,NULL,2,12,'1',25000,'2023-07-26','MENGANGSUR',NULL,NULL,'2023-07-26 09:26:39','2023-07-26 09:26:39','DITEMPAT',NULL),(2,2,5000000,NULL,2,12,NULL,25000,NULL,'PENDING',NULL,NULL,'2023-07-27 16:32:55','2023-07-27 16:32:55','TRANSFER',35000),(3,2,5000000,NULL,2,12,NULL,25000,NULL,'PENDING',NULL,NULL,'2023-07-27 16:48:25','2023-07-27 16:48:25','TRANSFER',35000),(4,2,5000000,NULL,2,12,NULL,25000,NULL,'PENDING',NULL,NULL,'2023-07-27 16:51:58','2023-07-27 16:51:58','TRANSFER',35000),(5,2,5000000,'2022-08-16',2,12,'1',25000,NULL,'MENGANGSUR',NULL,NULL,'2023-07-27 17:02:51','2023-07-27 17:03:29','TRANSFER',35000),(6,4,5000000,'2022-08-29',2,24,'1',25000,NULL,'MENGANGSUR',NULL,NULL,'2023-07-28 14:36:39','2023-07-28 14:37:34','TRANSFER',35000),(7,3,5000000,'2023-07-29',2,12,'1',25000,NULL,'MENGANGSUR',NULL,NULL,'2023-07-28 15:46:49','2023-07-28 16:35:17','TRANSFER',35000),(8,12,5000000,'2023-08-10',2,12,'1',25000,NULL,'MENGANGSUR',NULL,NULL,'2023-08-09 20:42:19','2023-08-09 20:42:45','TRANSFER',35000);
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_14_032405_add_nik_field_to_users_table',1),(6,'2023_06_14_073214_add_no-hp_field_to_users_table',1),(7,'2023_06_14_073929_add_tempat-lahir_field_to_users_table',1),(8,'2023_06_14_074443_add_tanggal-lahir_field_to_users_table',1),(9,'2023_06_14_075608_add_alamat_field_to_users_table',1),(10,'2023_06_14_114146_add_image-ktp_field_to_users_table',1),(11,'2023_06_14_114315_add_image-3x4_field_to_users_table',1),(12,'2023_06_23_062707_create_deposits',1),(13,'2023_06_23_063431_create_type_deposits',1),(14,'2023_06_25_150603_create_loans',1),(15,'2023_06_28_034656_create_installments',1),(16,'2023_06_28_035333_create_type_installments',1),(17,'2023_07_01_110505_add_nominal-awal_field_to_installments_table',1),(18,'2023_07_14_115938_add_tipe_pembayaran_field_to_deposit',1),(19,'2023_07_14_120251_add_tipe_pembayaran_field_to_installments',1),(20,'2023_07_14_120319_add_tipe_pembayaran_field_to_loans',1),(21,'2023_07_16_105743_add_total_transaction_field_to_deposits',1),(22,'2023_07_17_084444_add_total_transaction_field_to_loans',1),(23,'2023_07_17_123225_add_total_transaction_field_to_installments',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `type_deposits`
--

DROP TABLE IF EXISTS `type_deposits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_deposits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tipe_deposit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_deposits`
--

LOCK TABLES `type_deposits` WRITE;
/*!40000 ALTER TABLE `type_deposits` DISABLE KEYS */;
INSERT INTO `type_deposits` VALUES (1,'Simpanan Pokok','2023-07-26 09:26:39','2023-07-26 09:26:39'),(2,'Simpanan Wajib','2023-07-26 09:26:39','2023-07-26 09:26:39');
/*!40000 ALTER TABLE `type_deposits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_installments`
--

DROP TABLE IF EXISTS `type_installments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_installments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tipe_angsuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_installments`
--

LOCK TABLES `type_installments` WRITE;
/*!40000 ALTER TABLE `type_installments` DISABLE KEYS */;
INSERT INTO `type_installments` VALUES (1,'Angsuran Pokok','2023-07-26 09:26:39','2023-07-26 09:26:39'),(2,'Angsuran Jasa','2023-07-26 09:26:39','2023-07-26 09:26:39');
/*!40000 ALTER TABLE `type_installments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_3x4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Muhammad Hafidz Febriansyah','hafidzfebrian21@gmail.com',NULL,'$2y$10$nkO0bDXDKzuP12628PkA.Ou8Cf5moQAyRrScFSQZmpw5xBfs36xiq',NULL,'ADMIN',NULL,'2023-07-26 09:26:39','2023-07-29 01:34:14','3314109907060001','085294243900','Solo','1997-09-20','Sragen','imgmock/scan3x4','assets/gallery/j7QV0pqGaQ3LdMnpPEsoJulefA4lSiglZZWWCTjT.png'),(2,'Falah Yudhistira Hanan','falahyudhistira@gmail.com',NULL,'$2a$04$UiJ2PIe.qUXseu9pnnkOd.X5NTZ1.aes7GePioBGBjgXSfu6ZIeC.',NULL,'USER',NULL,'2023-07-26 09:26:39','2023-07-26 09:26:39','543535363426326','085294243900','Solo','1997-09-20','Sragen','imgmock/scan3x4','imgmock/scanktp'),(3,'Raihan Anugerah Guntoro','raihananugerah@gmail.com',NULL,'$2y$10$U5MR1aXvEeXChTlAkB24QOMis0uVXsWXkUZgf5GOVSssZcPa.gv8W','099034564567','USER',NULL,'2023-07-26 09:26:39','2023-07-29 01:41:33','995809458093840','085294243900','Solo','1997-09-20','Sragen','assets/gallery/4XQioqete01l7gXC9YaIHmfoM2PVu1adoLcQ1MNM.webp','assets/gallery/AezkRxOJSdcX5jIhU3gObvewyNiZJgWC1qU2e0wg.jpg'),(4,'NdaktauCoy','hafidzfebrian20@gmail.com',NULL,'$2a$04$UiJ2PIe.qUXseu9pnnkOd.X5NTZ1.aes7GePioBGBjgXSfu6ZIeC.',NULL,'USER',NULL,'2023-07-26 09:26:39','2023-07-26 09:26:39','995809458093840','085294243900','Solo','1997-09-20','Sragen','imgmock/scan3x4','imgmock/scanktp'),(5,'Basuki Tjahaja Purnama','ahok@gmail.com',NULL,'$2y$10$SploK85TsWDE.OdqW0CiCe8aYwuLClf24lSBfPy.siocjVv9yFHe6',NULL,'USER',NULL,'2023-07-29 20:29:54','2023-07-29 20:29:54','1234567891112235','0812345678911','Tiongkok','1966-06-29','bikini bottom','assests/gallery/d1AyAa38pDmc9uRUTiZXDZHtDsEAndWzIN0BtDZW.png','assests/gallery/cT0kzg3RQxCTsRlslYGxpSmZmyk4CAytpRHvgl6f.png'),(6,'Tutu','tutu@gmail.com',NULL,'$2y$10$uX1dAc9fluS9jNU4fsLHJuGIispdhz0kHi8zkUc56YyWgKI95MJv2',NULL,'USER',NULL,'2023-07-29 20:43:26','2023-07-29 20:43:26','123','123','Sragen','2023-07-30','Sragen','assests/gallery/XwimR6LXiy3i4ObUGId2zgLKEkaeol3AsowKuJMD.jpg','assests/gallery/rvkSgL9OfIrVUkTYPUnVXyIE3pt4WLLB64aeHorY.jpg'),(7,'Muhammad Hafidz Febriansyah','hafidzfebrian27@gmail.com',NULL,'$2y$10$7.NiIFARvRyMscaxNXdXIepOOD.0F66xR8PfCLprhScmfXAqqOp8C',NULL,'USER',NULL,'2023-08-07 18:20:49','2023-08-07 18:20:49','3314109907060001','085294243129','Solo','2023-08-09','Sragen','assests/gallery/NUT5UMFDK6R674OY5agWZVwIaB1j6I3rcUsrrknF.png','assests/gallery/kcK3Lckz3u9QmcOjdWTNNmkh2vrTqxt0nqJyIQWs.png'),(8,'Muhammad Hafidz Febriansyah','hafidzfebrian29@gmail.com',NULL,'$2y$10$FXhT0Zlq/Xj.cfmOBReM3OUnzOH4mmjtdN23bK2sfNd7dvOfyo2Sa',NULL,'USER',NULL,'2023-08-08 07:11:58','2023-08-08 07:11:58','3314109907060001','085294243129','Solo','2023-08-09','Sragen','assests/gallery/F2BsnE20aWS5yuQvHfXtKc8YiSwRvu1nFOc62fXO.png','assests/gallery/8HPmPWwlyOy7CpknXZIhLIcJDxyjmPijiURtlKxt.png'),(9,'Muhammad Hafidz Febriansyah','hafidzfebrian2341@gmail.com',NULL,'$2y$10$tpJ6vyd/4DsDlx6Om1Ug9Oh8NUo.oYEEYTSkTWorzLLZAnm48N/IK',NULL,'USER',NULL,'2023-08-08 07:34:48','2023-08-08 07:34:48','3314109907060001','085294243129','Solo','2023-08-09','Sragen','assests/gallery/smNT8tYWZjKpnwVrsqk2AHEPfZCcSWNEOTrYUbwC.jpg','assests/gallery/Vq5FkLipXQBTcwFiWRN37BhLKPTKrW8bKu3dhhOr.jpg'),(10,'Muhammad Hafidz Febriansyah','hafidzfebrian21123@gmail.com',NULL,'$2y$10$ezCbWl/7xpglB3FOisF8rOmVtJlSf/jpQrKMIQ1ff26yD6hrUaDse',NULL,'USER',NULL,'2023-08-08 07:55:33','2023-08-08 07:55:33','3314109907060001','085294243129','Solo','2023-08-09','Sragen','assests/gallery/f7XdGcgxCnN5oQjeAjNfMcImONqufL53FmvrmwGn.jpg','assests/gallery/i7bsBLGJqNoV3lvJ4ds9xb88mh6EHh1v7xzTQkC8.jpg'),(11,'Bangun Supriyono','bangunsupriyono72@gmail.com',NULL,'$2y$10$h/vxly/mVPlaPlRmmaSCre6Qu1B2sLz/Ziq8b34PcrPmiacIBiLyC',NULL,'ADMIN',NULL,'2023-08-09 18:54:09','2023-08-09 18:54:09','3314101605720001','085725330156','Sragen','1972-05-16','Jl.Dr.Sutomo,No.8 Bangunsari RT4/RW14','assests/gallery/TTU3YdbwcgByUm7AwK49ULjx3rBtoyvDzLMnasNs.jpg','assests/gallery/g9oBb2BJwR2o5wIs9BENgH2QBswKdHchERpPtAa4.jpg'),(12,'Candra Pramudya','candrapramudya@gmail.com',NULL,'$2y$10$2ZmPg9gdPPjsyLXgXUi2UesTb1/m8Ps4rpY2Pzqhp1T5XhK3qBc/m','099034564567','USER',NULL,'2023-08-09 20:34:05','2023-08-09 20:34:05','3314101605720001','0856924567891','Cepu','2000-11-10','Cepu','assests/gallery/tFuQemM57Av5F3iCvf3YCao0tTG5ePjc3lrREqRl.jpg','assests/gallery/mFb0Q4w7j0ut92WssuSt6fkZhllZB7k3qECxRzF6.jpg');
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

-- Dump completed on 2023-08-16 16:33:49
