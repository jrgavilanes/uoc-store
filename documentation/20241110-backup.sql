-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: uoc-store
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Sega','sega','Discover classic SEGA games! Relive iconic adventures and arcade action from the golden age of gaming!','sega.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(2,'Nintendo','nintendo','Explore classic 8-bit Nintendo games! Relive iconic adventures and retro fun from gaming\'s golden era!','nintendo.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(3,'TurboGrafx','turbografx','Discover TurboGrafx classics! Relive epic 16-bit adventures and unique retro gaming thrills!','turbografx.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(4,'Playstation','playstation','Explore iconic PlayStation 1 games! Relive classic adventures and timeless 3D gaming moments!','playstation.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (172,'0001_01_01_000000_create_users_table',1),(173,'0001_01_01_000001_create_cache_table',1),(174,'0001_01_01_000002_create_jobs_table',1),(175,'2024_10_09_071124_create_categories_table',1),(176,'2024_10_09_071125_create_products_table',1),(177,'2024_10_09_071312_create_orders_table',1),(178,'2024_10_09_072203_create_order_lines_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_lines`
--

DROP TABLE IF EXISTS `order_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_lines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_lines_order_id_foreign` (`order_id`),
  KEY `order_lines_product_id_foreign` (`product_id`),
  CONSTRAINT `order_lines_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `order_lines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_lines`
--

LOCK TABLES `order_lines` WRITE;
/*!40000 ALTER TABLE `order_lines` DISABLE KEYS */;
INSERT INTO `order_lines` VALUES (28,17,20,2,123.00,NULL,'2024-11-10 11:39:28','2024-11-10 11:39:28'),(29,18,15,1,115.00,NULL,'2024-11-10 11:59:18','2024-11-10 11:59:18'),(30,18,18,1,120.00,NULL,'2024-11-10 11:59:18','2024-11-10 11:59:18');
/*!40000 ALTER TABLE `order_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (17,NULL,'gues@guest.com','c/ guest, 1-2',NULL,'2024-11-10 11:39:28','2024-11-10 11:39:28'),(18,2,'user1@test.com','c/ registered, 10-20',NULL,'2024-11-10 11:59:18','2024-11-10 11:59:18');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Sonic the Hedgehog','sonic-the-hedgehog',1,120.00,'Classic SEGA game featuring Sonic.','sonic1.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(2,'Alex Kidd in Miracle World','alex-kidd-in-miracle-world',1,110.00,'Adventure game with Alex Kidd.','alexkid.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(3,'Wonder Boy III','wonder-boy-iii',1,130.00,'Action-packed journey in Monster Land.','wonderboy3.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(4,'Shinobi','shinobi',1,115.00,'Classic ninja action game.','shinobi.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(5,'Land of Illusion','land-of-illusion',1,125.00,'Fantasy adventure with Mickey Mouse.','landofillusion.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(6,'Double Dragon','double-dragon',1,140.00,'Classic beat-em-up action game.','doubledragon.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(7,'R-Type','r-type',1,150.00,'Sci-fi shooting game with intense action.','rtype.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(8,'OutRun','outrun',1,135.00,'Classic SEGA racing game.','outrun.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(9,'Streets of Rage','streets-of-rage',1,145.00,'Iconic beat-em-up with memorable characters.','streetofrage.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(10,'Bubble Bobble','bubble-bobble',1,100.00,'Puzzle game with cute characters and fun levels.','bubblebubble.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(11,'Castlevania','castlevania',2,100.00,'Classic platformer with gothic themes and challenging gameplay.','castlevania.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(12,'The Legend of Zelda','the-legend-of-zelda',2,90.00,'Adventure game featuring exploration, puzzles, and iconic characters.','legendofzelda.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(13,'Donkey Kong','donkey-kong',2,95.00,'Arcade classic featuring the famous Mario and challenging obstacles.','donkeykong.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(14,'Kirby\'s Adventure','kirbys-adventure',2,105.00,'Fun platformer with Kirby, a character with unique abilities to inhale enemies.','kirbyadventure.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(15,'Mega Man 2','mega-man-2',2,115.00,'Action platformer with challenging stages and robot masters.','megaman2.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(16,'Tetris','tetris',2,80.00,'Classic puzzle game that requires skill and quick thinking.','tetris.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(17,'Contra','contra',2,90.00,'Run and gun action game with intense levels and enemies.','contra.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(18,'Super Mario Bros 3','super-mario-bros-3',2,120.00,'One of the best Mario platformers with innovative gameplay and levels.','mario3.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(19,'Super Mario Bros','super-mario-bros',2,85.00,'The classic Mario game that defined platformers for generations.','mario.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(20,'Batman','batman',3,123.00,'Action game based on the iconic DC Comics character, featuring Gotham City.','batman.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(21,'Gradius','gradius',3,109.00,'Space shooter with innovative power-up system and memorable soundtrack.','gradius.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(22,'Ninja Spirit','ninja-spirit',3,120.00,'Action platformer with ninja combat and unique gameplay mechanics.','ninjaspirit.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(23,'Street Fighter II','street-fighter-ii',3,104.00,'Famous fighting game that introduced special moves and combos.','streetfighter2.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(24,'Splatterhouse','splatterhouse',3,112.00,'Horror-themed beat \'em up with gruesome enemies and dark environments.','splatterhouse.jpg',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('idlNlOdI0Cz94bjCpellan3m7Zg6XCOKFw5We0pX',1,'172.27.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:132.0) Gecko/20100101 Firefox/132.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoielMxaVUweTBEWUV2SE9jQnhqbHVweVp6M2JhaTRnNGxwTkhDdVNKZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvcHVyY2hhc2UtZGV0YWlsLzE3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoidXNlciI7YTo3OntzOjQ6InR5cGUiO3M6MTA6InJlZ2lzdGVyZWQiO3M6MjoiaWQiO2k6MTtzOjQ6Im5hbWUiO3M6NToiYWRtaW4iO3M6NToiZW1haWwiO3M6MTQ6ImFkbWluQHRlc3QuY29tIjtzOjc6ImFkZHJlc3MiO3M6MTM6ImFkbWluIGFkZHJlc3MiO3M6MTM6Imd1ZXN0X2FkZHJlc3MiO3M6MDoiIjtzOjExOiJndWVzdF9lbWFpbCI7czowOiIiO319',1731240445);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@test.com','2024-10-13 10:06:56','$2y$12$uqjWXw3iMrJv3kfRZLrlvOof0QlnFkLAcdP5HmF.7lzyyj1dJ6gf6','ficTFrPIQfDYctVYFiww4qfd6vpYyOF93pO93DKXwILqc1obFCYytU1hOV76',1,'admin address',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(2,'user1','user1@test.com','2024-10-13 10:06:57','$2y$12$DnaEFUSBtt1o.VJ.GSIQXeft4inmp/b8T49Neugxe3zLvIf3s/FRy','XNXOOJK5Wg',0,'user1 address',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57'),(3,'user2','user2@test.com','2024-10-13 10:06:57','$2y$12$A0UZCEprFpP8nnjbvLTT/u5qFnHG0a7fUpySj3DrwqPVpK1iE7RGC','aFMk8JnWaa',0,'user2 address',NULL,'2024-10-13 10:06:57','2024-10-13 10:06:57');
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

-- Dump completed on 2024-11-10 12:19:11
