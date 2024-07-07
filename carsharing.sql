-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: carsharing
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.24.04.1

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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `engine_volume` decimal(4,2) NOT NULL,
  `year_of_manufacture` year NOT NULL,
  `number_of_seats` int NOT NULL,
  `drive` enum('Передний','Задний','Полный') NOT NULL,
  `engine_power` int NOT NULL,
  `fuel_type` enum('Дизель','Бензин','Электро','Гибрид') NOT NULL,
  `steering_side` enum('Лево','Право') NOT NULL,
  `fuel_consumption` decimal(4,2) NOT NULL,
  `transmission` enum('Механика','Автомат','Робот') NOT NULL,
  `category` enum('Компактные','Средний класс','Кроссоверы','Люкс','Кабриолеты','Минивэны','Мото') NOT NULL,
  `preview_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (15,'BMW M5 F90',5.00,6.00,2024,4,'Полный',900,'Бензин','Лево',12.00,'Автомат','Люкс','uploads/cosySec.png'),(20,'1',1.00,1.00,2001,1,'Передний',1,'Дизель','Лево',0.77,'Механика','Компактные','uploads/cosySec.png'),(23,'Honda Civic',22000.00,2.00,2022,5,'Передний',158,'Бензин','Лево',7.20,'Механика','Средний класс','uploads/d.com_wallpaper.jpg'),(24,'BMW X5',60000.00,3.00,2020,5,'Полный',335,'Гибрид','Лево',8.50,'Автомат','Кроссоверы','uploads/Screenshot from 2023-10-14 15-08-18.png'),(25,'Audi A4',35000.00,2.00,2021,5,'Задний',188,'Дизель','Лево',7.00,'Робот','Средний класс','uploads/Screenshot from 2023-10-07 18-42-01.png'),(26,'Ford Mustang',55000.00,5.00,2019,4,'Задний',450,'Бензин','Лево',12.00,'Автомат','Кабриолеты','mustang.jpg'),(27,'Tesla Model S',80000.00,0.00,2021,5,'Полный',670,'Электро','Лево',0.00,'Автомат','Люкс','model_s.jpg'),(28,'Volkswagen Golf',25000.00,1.50,2022,5,'Передний',150,'Бензин','Лево',6.50,'Механика','Компактные','golf.jpg'),(29,'Nissan Qashqai',27000.00,1.60,2020,5,'Полный',160,'Бензин','Лево',7.40,'Автомат','Кроссоверы','qashqai.jpg'),(30,'Mercedes-Benz C-Class',40000.00,2.00,2021,5,'Задний',255,'Дизель','Лево',7.80,'Робот','Люкс','c_class.jpg'),(31,'Lexus RX',50000.00,3.50,2022,5,'Полный',295,'Гибрид','Лево',7.60,'Автомат','Кроссоверы','rx.jpg'),(32,'Mazda 3',23000.00,2.00,2020,5,'Передний',155,'Бензин','Лево',6.90,'Механика','Компактные','mazda3.jpg'),(33,'Chevrolet Camaro',45000.00,6.20,2019,4,'Задний',455,'Бензин','Лево',11.50,'Автомат','Кабриолеты','camaro.jpg'),(34,'Kia Sorento',35000.00,2.50,2021,7,'Полный',191,'Гибрид','Лево',7.30,'Автомат','Кроссоверы','sorento.jpg'),(35,'Subaru Outback',34000.00,2.40,2022,5,'Полный',260,'Бензин','Лево',7.70,'Автомат','Кроссоверы','outback.jpg'),(36,'Porsche 911',100000.00,3.00,2021,4,'Задний',443,'Бензин','Лево',10.20,'Робот','Кабриолеты','911.jpg'),(37,'Hyundai Tucson',28000.00,2.00,2020,5,'Полный',182,'Дизель','Лево',7.90,'Автомат','Кроссоверы','tucson.jpg'),(38,'Jeep Wrangler',45000.00,3.60,2019,5,'Полный',285,'Бензин','Лево',11.00,'Автомат','Кроссоверы','wrangler.jpg'),(39,'Fiat 500',17000.00,1.20,2021,4,'Передний',69,'Бензин','Лево',5.80,'Механика','Компактные','500.jpg'),(40,'Toyota Highlander',40000.00,3.50,2021,7,'Полный',295,'Гибрид','Лево',8.40,'Автомат','Кроссоверы','highlander.jpg'),(41,'Honda CR-V',32000.00,2.40,2020,5,'Полный',184,'Бензин','Лево',7.50,'Автомат','Кроссоверы','crv.jpg'),(42,'ADFAGJDSKL;',1.00,1.00,2001,1,'Передний',-12,'Дизель','Лево',12.00,'Механика','Компактные','uploads/preview_668a447cd92ba_d.com_wallpaper.jpg');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_images`
--

DROP TABLE IF EXISTS `car_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `car_images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_images`
--

LOCK TABLES `car_images` WRITE;
/*!40000 ALTER TABLE `car_images` DISABLE KEYS */;
INSERT INTO `car_images` VALUES (154,20,'uploads/Screenshot from 2023-10-16 21-23-27.png'),(155,20,'uploads/Screenshot from 2023-10-14 20-00-33.png'),(156,20,'uploads/Screenshot from 2023-10-14 15-08-26.png'),(157,20,'uploads/Screenshot from 2023-10-14 13-20-51.png'),(159,15,'uploads/Screenshot from 2023-10-14 15-08-26.png'),(160,15,'uploads/Screenshot from 2023-10-14 15-08-18.png'),(169,24,'uploads/Screenshot from 2023-10-14 20-00-33.png'),(170,24,'uploads/Screenshot from 2023-10-14 15-08-26.png'),(171,24,'uploads/Screenshot from 2023-10-14 15-08-18.png'),(172,24,'uploads/Screenshot from 2023-10-14 13-20-51.png'),(173,24,'uploads/Screenshot from 2023-10-07 18-42-01.png'),(174,25,'uploads/Screenshot from 2023-10-16 21-23-27.png'),(175,25,'uploads/Screenshot from 2023-10-14 20-00-33.png'),(176,25,'uploads/Screenshot from 2023-10-14 15-08-26.png'),(177,25,'uploads/Screenshot from 2023-10-14 15-08-18.png'),(178,25,'uploads/Screenshot from 2023-10-14 13-20-51.png'),(179,25,'uploads/Screenshot from 2023-10-07 18-42-01.png'),(180,23,'uploads/Screenshot from 2023-10-14 20-00-33.png'),(181,23,'uploads/Screenshot from 2023-10-14 15-08-26.png'),(182,23,'uploads/Screenshot from 2023-10-14 15-08-18.png'),(183,23,'uploads/Screenshot from 2023-10-14 13-20-51.png'),(184,23,'uploads/Screenshot from 2023-10-07 18-42-01.png'),(185,42,'uploads/image_668a447cdc480_gdsbd.jpg');
/*!40000 ALTER TABLE `car_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ashim','$2y$10$kVo/TtQe0JnRm06NmM.0Xum8GXLxQImCG81VRYA9z2/9sW2IEBOua');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-07 14:28:32
