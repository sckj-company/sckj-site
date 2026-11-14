-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: sckj-site-db
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Current Database: `sckj-site-db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sckj-site-db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sckj-site-db`;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba','i:1;',1794296152),('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba:timer','i:1794296152;',1794296152),('laravel-cache-b7ad7f2b04bd98f199a2b8c016e37e66c831b866','i:1;',1794472219),('laravel-cache-b7ad7f2b04bd98f199a2b8c016e37e66c831b866:timer','i:1794472218;',1794472218),('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0','i:1;',1793968105),('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0:timer','i:1793968105;',1793968105);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
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
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `servico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nova',
  `answered_by` bigint unsigned DEFAULT NULL,
  `answered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_messages_answered_by_foreign` (`answered_by`),
  KEY `contact_messages_status_index` (`status`),
  CONSTRAINT `contact_messages_answered_by_foreign` FOREIGN KEY (`answered_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'Márcio José','+244937289637','marcio@gmail.com','criacao-empresa','Testando 001','respondida',NULL,'2026-11-06 08:50:57','2026-11-06 08:13:28','2026-11-06 08:50:57'),(2,'Franco Francisco','+244937289637','franco@gmail.com','tratamento-documentos','Teste 002','respondida',4,'2026-11-09 14:41:44','2026-11-06 09:03:00','2026-11-09 14:41:44'),(3,'Marta Jurguem','+35134567821','jurguem@hotmail.com','consultoria-empresarial','Testando 003','nova',NULL,NULL,'2026-11-06 09:10:54','2026-11-06 09:10:54'),(4,'Pamela Caveiro','+557654123456','pamelacaveiro@yahoo.com','criacao-sistemas','Testando os campos de contacto da Página Inicial','nova',NULL,NULL,'2026-11-06 09:17:26','2026-11-06 09:17:26'),(5,'Lucia Vivian','+244943675321','lucia@gmail.com','website-plataforma','Teste 003','nova',NULL,NULL,'2026-11-06 09:19:16','2026-11-06 09:19:16'),(6,'Isabel Diogo','+244943675321','isabel@gmail.com','fornecimento-encomenda','Testando o Docker','nova',NULL,NULL,'2026-11-12 07:28:39','2026-11-12 07:28:39');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_11_05_153026_add_role_to_users_table',1),(5,'2026_11_06_082910_create_contact_messages_table',2),(6,'2026_11_06_102956_create_site_blocks_table',3),(7,'2026_11_09_064844_create_services_table',4),(8,'2026_11_09_083036_create_site_images_table',5),(9,'2026_11_09_141217_add_ativo_to_users_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo_pt` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_en` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_zh` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao_pt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descricao_zh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ordem` int unsigned NOT NULL DEFAULT '0',
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendente',
  `motivo_rejeicao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned DEFAULT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_created_by_foreign` (`created_by`),
  KEY `services_approved_by_foreign` (`approved_by`),
  KEY `services_status_index` (`status`),
  CONSTRAINT `services_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Criação de Empresas','Business Start-ups','企业创立','Criação de Empresas','Business Start-ups','大量测试',1,'publicado',NULL,1,1,'2026-11-09 06:21:59','2026-11-09 06:21:59','2026-11-09 13:00:41'),(2,'Tratamento de Documentos','Document Processing','文件处理','Tratamento de Documentos','Test Run','测试 运行',2,'publicado',NULL,NULL,1,'2026-11-09 06:26:05','2026-11-09 06:25:10','2026-11-09 13:01:08'),(3,'Sistemas para Empresas','Business Systems','企业系统','Sistemas para Empresas','New support','新服务',3,'publicado',NULL,1,1,'2026-11-09 07:11:47','2026-11-09 07:11:47','2026-11-09 13:02:13'),(4,'Websites Corporativos','Corporate Websites','企业网站','Websites Corporativos','Corporate Websites','企业网站',4,'publicado',NULL,1,1,'2026-11-09 13:04:12','2026-11-09 13:04:12','2026-11-09 13:04:12'),(5,'Equipamentos de Informática','Computer Equipment','计算机设备','Equipamentos de Informática','Computer Equipment','计算机设备',6,'pendente',NULL,4,NULL,NULL,'2026-11-09 14:35:50','2026-11-09 14:38:06'),(6,'Fornecimento Institucional','Institutional Procurement','机构供货','Fornecimento Institucional','Institutional Procurement','机构供货',5,'pendente',NULL,4,NULL,NULL,'2026-11-09 14:36:24','2026-11-09 14:37:47'),(7,'Testando o Docker','Testing','测试中','Testando o Docker','Testing Docker','测试 Docker',9,'publicado',NULL,1,1,'2026-11-12 08:30:57','2026-11-12 08:30:57','2026-11-12 08:33:54');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('POvg2UtGOSnldsaIfwO6kbpOVJu2jpNIptA0Ljst',NULL,'172.19.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJKMGp1WmFEMUJvZ2l4cTdZZnpZblB5bXRSMUlJQm5mSlBHRTB1N1laIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794483591);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_blocks`
--

DROP TABLE IF EXISTS `site_blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_blocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chave` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagina` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'texto',
  `valor_pt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `valor_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `valor_zh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_blocks_chave_unique` (`chave`),
  KEY `site_blocks_updated_by_foreign` (`updated_by`),
  KEY `site_blocks_pagina_index` (`pagina`),
  CONSTRAINT `site_blocks_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_blocks`
--

LOCK TABLES `site_blocks` WRITE;
/*!40000 ALTER TABLE `site_blocks` DISABLE KEYS */;
INSERT INTO `site_blocks` VALUES (1,'home.banner.titulo','home','Banner: título','texto','Soluções completas para a sua empresa','Complete solutions for your business','为您的企业提供完整解决方案',NULL,'2026-11-06 09:48:42','2026-11-06 09:48:42'),(2,'home.banner.subtitulo','home','Banner: subtítulo','texto_longo','Legalização, documentos, sistemas e consultoria num só lugar.','Company registration, documents, software and consulting in one place.','公司注册、文件办理、软件系统与咨询服务，一站式完成。',NULL,'2026-11-06 09:48:42','2026-11-06 09:48:42'),(17,'geral.rodape.descricao','geral','Rodapé: descrição da empresa','texto_longo','A SCKJ é uma empresa especializada em prestação de serviços e comércio geral: legalização e criação de empresas, tratamento documental, criação de sistemas empresariais e fornecimento corporativo.','SCKJ is a company specializing in the provision of services and general commerce: business incorporation and legalization, document processing, the development of business systems, and corporate supply.','SCKJ 是一家专门提供各类服务及从事综合贸易的公司，业务涵盖：企业注册与合规化、文件处理、商业系统开发，以及企业物资供应。',1,'2026-11-07 09:27:22','2026-11-07 09:30:32'),(18,'Contactos.telefone','geral','Rodapé: telefone','texto','+244 923 000 000','+244 923 000 000','+244 923 000 000',1,'2026-11-07 09:29:40','2026-11-07 09:30:32'),(19,'Email.email','geral','Rodapé: email','texto','geral@sckj.co.ao','geral@sckj.co.ao','geral@sckj.co.ao',NULL,'2026-11-07 10:01:19','2026-11-07 10:01:19'),(21,'Localização.localizacao','geral','Rodapé: localização','texto','Luanda, Angola','Luanda, Angola','Luanda, Angola',NULL,'2026-11-07 10:04:38','2026-11-07 10:04:38'),(25,'Horário.horario','horario','Horário: horario','texto','Seg - Sex: 8h às 17h | Sáb: 8h às 13h.','Mon – Fri: 8 am – 5 pm | Sat: 8 am – 1 pm','周一至周五：上午 8 点至下午 5 点 | 周六：上午 8 点至下午 1 点',NULL,'2026-11-07 10:43:54','2026-11-07 10:43:54');
/*!40000 ALTER TABLE `site_blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_images`
--

DROP TABLE IF EXISTS `site_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chave` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagina` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `padrao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `caminho` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `largura_rec` smallint unsigned DEFAULT NULL,
  `altura_rec` smallint unsigned DEFAULT NULL,
  `alt_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_zh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_images_chave_unique` (`chave`),
  KEY `site_images_updated_by_foreign` (`updated_by`),
  KEY `site_images_pagina_index` (`pagina`),
  CONSTRAINT `site_images_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_images`
--

LOCK TABLES `site_images` WRITE;
/*!40000 ALTER TABLE `site_images` DISABLE KEYS */;
INSERT INTO `site_images` VALUES (1,'home.banner','home','Banner da página inicial','assets/img/all-images/hero/hero-img1.png','imagens/aS6vU25JpKlLqlwCm6e49OKVbcCGhLhdofLTyKdg.png',1920,800,'Equipa da SCKJ a atender um cliente','SCKJ team assisting a client','SCKJ 团队为客户提供服务',1,'2026-11-09 07:41:47','2026-11-09 08:50:36'),(2,'home.segunda','home','Banner da página inicial','assets/img/all-images/about/about-img2.png',NULL,1920,800,'Equipa da SCKJ a atender um cliente','SCKJ team assisting a client','SCKJ 团队为客户提供服务',NULL,'2026-11-09 09:06:09','2026-11-09 09:06:09'),(3,'home.terceiro','home','Banner da página inicial','assets/img/all-images/about/about-img3.png',NULL,1920,800,'Equipa da SCKJ a atender um cliente','SCKJ team assisting a client','SCKJ 团队为客户提供服务',NULL,'2026-11-09 09:07:58','2026-11-09 09:07:58'),(6,'home.comercio1','home','Comercio','assets/img/all-images/work/work-img1.png',NULL,1920,800,'Na área de comércio geral, a SCKJ abastece a sua empresa com produtos seleccionados, rapidez logística e preços altamente competitivos.','In the general trade sector, SCKJ supplies your company with carefully selected products, rapid logistics, and highly competitive prices.','在一般贸易领域，SCKJ 为贵公司提供精选产品、快捷物流以及极具竞争力的价格。',NULL,'2026-11-09 09:33:01','2026-11-09 09:33:01'),(7,'home.comercio2','home','Comercio','assets/img/all-images/work/work-img2.png',NULL,1920,800,'Na área de comércio geral, a SCKJ abastece a sua empresa com produtos seleccionados, rapidez logística e preços altamente competitivos.','In the general trade sector, SCKJ supplies your company with carefully selected products, rapid logistics, and highly competitive prices.','在一般贸易领域，SCKJ 为贵公司提供精选产品、快捷物流以及极具竞争力的价格。',NULL,'2026-11-09 09:34:27','2026-11-09 09:34:27'),(8,'home.trabalhos','home','Como Trabalhamos','assets/img/all-images/case/case-img4.png',NULL,1920,800,'Processo Claro, Rápido e Sem Burocracia.','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 09:49:55','2026-11-09 09:49:55'),(9,'home.falar','home','Falar com um Consultor','assets/img/all-images/cta/cta-img1.png','imagens/aaN3j5c8uevDeEZo3MqPx22BEFK5MzCdy4osVm5U.png',1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','Ready to Start Your Business or Implement a Management System?','准备好开启创业之旅或实施管理系统了吗？',1,'2026-11-09 09:49:55','2026-11-12 08:39:13'),(10,'home.atendimento','home','Linha de Atendimento','assets/img/all-images/others/others-img2.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','Ready to Start Your Business or Implement a Management System?','准备好开启创业之旅或实施管理系统了吗？',NULL,'2026-11-09 09:55:36','2026-11-09 09:55:36'),(11,'Sobre.Nós','sobre','Banner da página incial','assets/img/all-images/hero/hero-img1.png',NULL,1920,800,'Equipa da SCKJ a atender um cliente','SCKJ team assisting a client','SCKJ 团队为客户提供服务',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(12,'Sobre.Nós2','sobre','Banner da página inicial','assets/img/all-images/about/about-img2.png',NULL,1920,800,'Equipa da SCKJ a atender um cliente','SCKJ team assisting a client','SCKJ 团队为客户提供服务',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(13,'Sobre.Nós3','sobre','Banner da página inicial','assets/img/all-images/about/about-img3.png',NULL,1920,800,'Equipa da SCKJ a atender um cliente','SCKJ team assisting a client','SCKJ 团队为客户提供服务',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(14,'Sobre.Nos4','sobre','Como Trabalhamos','assets/img/all-images/case/case-img4.png',NULL,1920,800,'Processo Claro, Rápido e Sem Burocracia.','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(15,'Sobre.Nós5','sobre','Falar com um Consultor','assets/img/all-images//cta/cta-img1.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(16,'Serviço.fala','services','Falar com um Consultor','assets/img/all-images//cta/cta-img1.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(17,'Comercio.fala','services','Falar com um Consultor','assets/img/all-images//cta/cta-img1.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(18,'FAQ.fala','services','Falar com um Consultor','assets/img/all-images//cta/cta-img1.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(19,'Contactos.fala','services','Falar com um Consultor','assets/img/all-images//cta/cta-img1.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56'),(20,'Contactos.atendimento','home','Linha de Atendimento','assets/img/all-images//others/others-img2.png',NULL,1920,800,'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?','A Clear, Fast, and Bureaucracy-Free Process.','清晰、快捷且无官僚作风的流程。',NULL,'2026-11-09 11:45:56','2026-11-09 11:45:56');
/*!40000 ALTER TABLE `site_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'funcionario',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','gerente@demo.site.ao',NULL,'$2y$12$uAG6l1MJ9VHNGpbHo2xGWeBg7tH0hssAuor3.ZluaO2kXJwcvwvgO','admin',1,NULL,'2026-11-06 06:09:49','2026-11-09 13:50:57'),(3,'Marta Yelim','marta@sckj.com',NULL,'$2y$12$H.X.jV5Lz9nMwhjmrjBTyuL.J99phQ6ro6UrPsoG9ReS/BO6M.s6K','funcionario',0,NULL,'2026-11-09 13:42:03','2026-11-09 13:46:11'),(4,'Braulio Miguel','braulio@scjk.com',NULL,'$2y$12$Qe.l6oB5XU9V.Df0OIOQbeSRUELmgWkKpwHxsWqaUaluk142xefHq','funcionario',1,NULL,'2026-11-09 13:52:01','2026-11-09 14:18:05'),(5,'teste','func@sckj.com',NULL,'$2y$12$gmAG3Vdc28TGZcp/DVjnIuX/6LYPE3EQrR2BY0x2LPZ6C9TW6mFO6','funcionario',1,NULL,'2026-11-10 06:49:26','2026-11-10 06:49:26');
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

-- Dump completed on 2026-11-12 11:41:07
