-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: courier
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

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
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos` (
  `ida` int(11) NOT NULL AUTO_INCREMENT,
  `url_file` varchar(150) NOT NULL,
  `url_name` varchar(60) DEFAULT NULL,
  `solicitud_envio_ids` int(11) NOT NULL,
  PRIMARY KEY (`ida`),
  KEY `fk_archivos_solicitud_envio1_idx` (`solicitud_envio_ids`),
  CONSTRAINT `fk_archivos_solicitud_envio1` FOREIGN KEY (`solicitud_envio_ids`) REFERENCES `solicitud_envio` (`ids`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` VALUES (1,'3_U_oyr130812506.jpg','erika.jpg',11);
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `ncargo` varchar(45) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'ADMINISTRADOR'),(2,'CLIENTE');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codigo_tracking`
--

DROP TABLE IF EXISTS `codigo_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codigo_tracking` (
  `idct` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(150) NOT NULL,
  `descrip` varchar(100) DEFAULT NULL,
  `fecha_llegada` date DEFAULT NULL,
  `solicitud_envio_ids` int(11) NOT NULL,
  PRIMARY KEY (`idct`),
  KEY `fk_codigo_traking_solicitud_envio1_idx` (`solicitud_envio_ids`),
  CONSTRAINT `fk_codigo_traking_solicitud_envio1` FOREIGN KEY (`solicitud_envio_ids`) REFERENCES `solicitud_envio` (`ids`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codigo_tracking`
--

LOCK TABLES `codigo_tracking` WRITE;
/*!40000 ALTER TABLE `codigo_tracking` DISABLE KEYS */;
INSERT INTO `codigo_tracking` VALUES (1,'25634',NULL,NULL,2),(2,'25689',NULL,NULL,2),(3,'25634',NULL,NULL,3),(4,'25689',NULL,NULL,3),(5,'25634',NULL,NULL,4),(6,'25689',NULL,NULL,4),(7,'sdgdhj',NULL,NULL,5),(8,'sdgdhjsfsf',NULL,NULL,5),(9,'htjoÂ´\'6u5yuio8',NULL,NULL,6),(10,'7998552',NULL,NULL,6),(11,'htjoÂ´\'6u5yuio8',NULL,NULL,7),(12,'7998552',NULL,NULL,7),(13,'htjoÂ´\'6u5yuio8',NULL,NULL,8),(14,'7998552',NULL,NULL,8),(15,'sdsghjklkjhg',NULL,NULL,9),(16,'sddsgfhh',NULL,NULL,9),(17,'sdsghjklkjhg',NULL,NULL,10),(18,'sddsgfhh',NULL,NULL,10),(19,'sfdghjhg',NULL,NULL,11),(20,'778sa8d88sdas',NULL,NULL,11),(21,'77877887',NULL,NULL,11);
/*!40000 ALTER TABLE `codigo_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_tracking`
--

DROP TABLE IF EXISTS `estado_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_tracking` (
  `ide` int(11) NOT NULL AUTO_INCREMENT,
  `testado` varchar(70) NOT NULL,
  `descripcion_lugar` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`ide`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_tracking`
--

LOCK TABLES `estado_tracking` WRITE;
/*!40000 ALTER TABLE `estado_tracking` DISABLE KEYS */;
INSERT INTO `estado_tracking` VALUES (1,'Llega paquete a miami',NULL),(2,'Embarque',NULL),(3,'Aeropuerto Miami',NULL),(4,'Tramite de Aduana',NULL),(5,'Liberado por Aduana',NULL),(6,'Almacen aduana',NULL),(8,'Reparto',NULL),(9,'Entregado',NULL);
/*!40000 ALTER TABLE `estado_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_tracking`
--

DROP TABLE IF EXISTS `historial_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_tracking` (
  `idht` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_trackin` date DEFAULT NULL,
  `hetestado_ide` int(11) NOT NULL,
  `pedido_detalle_idp` int(11) NOT NULL,
  PRIMARY KEY (`idht`),
  KEY `fk_historial_tracking_estado_tracking1_idx` (`hetestado_ide`),
  KEY `fk_historial_tracking_pedido_detalle1_idx` (`pedido_detalle_idp`),
  CONSTRAINT `fk_historial_tracking_estado_tracking1` FOREIGN KEY (`hetestado_ide`) REFERENCES `estado_tracking` (`ide`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historial_tracking_pedido_detalle1` FOREIGN KEY (`pedido_detalle_idp`) REFERENCES `pedido_detalle` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_tracking`
--

LOCK TABLES `historial_tracking` WRITE;
/*!40000 ALTER TABLE `historial_tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `idi` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `pedido_detalle_idp` int(11) NOT NULL,
  PRIMARY KEY (`idi`),
  KEY `fk_item_pedido_detalle1_idx` (`pedido_detalle_idp`),
  CONSTRAINT `fk_item_pedido_detalle1` FOREIGN KEY (`pedido_detalle_idp`) REFERENCES `pedido_detalle` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_detalle`
--

DROP TABLE IF EXISTS `pedido_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_detalle` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_seguimiento` varchar(50) NOT NULL,
  `consignatario` varchar(80) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `bulto` int(10) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `usuario_idu` int(11) NOT NULL,
  `testado_ide` int(11) NOT NULL,
  PRIMARY KEY (`idp`),
  KEY `fk_pedido_detalle_usuario1_idx` (`usuario_idu`),
  KEY `fk_pedido_detalle_estado_tracking1_idx` (`testado_ide`),
  CONSTRAINT `fk_pedido_detalle_estado_tracking1` FOREIGN KEY (`testado_ide`) REFERENCES `estado_tracking` (`ide`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pedido_detalle_usuario1` FOREIGN KEY (`usuario_idu`) REFERENCES `usuario` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_detalle`
--

LOCK TABLES `pedido_detalle` WRITE;
/*!40000 ALTER TABLE `pedido_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_envio`
--

DROP TABLE IF EXISTS `solicitud_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud_envio` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `no_documento` varchar(20) DEFAULT NULL,
  `detalle` varchar(3000) DEFAULT NULL,
  `estado` varchar(70) DEFAULT NULL,
  `observacion` varchar(150) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `fecha_hora_update` datetime DEFAULT NULL,
  `usuario_idu` int(11) NOT NULL,
  PRIMARY KEY (`ids`),
  KEY `fk_solicitud_envio_usuario1_idx` (`usuario_idu`),
  CONSTRAINT `fk_solicitud_envio_usuario1` FOREIGN KEY (`usuario_idu`) REFERENCES `usuario` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_envio`
--

LOCK TABLES `solicitud_envio` WRITE;
/*!40000 ALTER TABLE `solicitud_envio` DISABLE KEYS */;
INSERT INTO `solicitud_envio` VALUES (1,'7636497','traer mochilas','PENDIENTE',NULL,'2021-04-13 00:43:51','2021-04-13 00:43:51',3),(2,'7636497','traer mochilas','PENDIENTE',NULL,'2021-04-13 00:45:33','2021-04-13 00:45:33',3),(3,'7636497','traer mochilas','PENDIENTE',NULL,'2021-04-13 00:47:12','2021-04-13 00:47:12',3),(4,'7636497','traer mochilas','PENDIENTE',NULL,'2021-04-13 00:49:03','2021-04-13 00:49:03',3),(5,'adsggd','sfshgfd','PENDIENTE',NULL,'2021-04-13 00:53:34','2021-04-13 00:53:34',3),(6,'gdfgfhgjhk','ghjklkjhjklÃ±Ã±u','PENDIENTE',NULL,'2021-04-13 01:03:49','2021-04-13 01:03:49',3),(7,'gdfgfhgjhk','ghjklkjhjklÃ±Ã±u','PENDIENTE',NULL,'2021-04-13 01:04:28','2021-04-13 01:04:28',3),(8,'gdfgfhgjhk','ghjklkjhjklÃ±Ã±u','PENDIENTE',NULL,'2021-04-13 01:04:36','2021-04-13 01:04:36',3),(9,'dfghjukjhgfd','sdgfhjujhgfd','PENDIENTE',NULL,'2021-04-13 01:05:00','2021-04-13 01:05:00',3),(10,'dfghjukjhgfd','sdgfhjujhgfd','PENDIENTE',NULL,'2021-04-13 01:07:26','2021-04-13 01:07:26',3),(11,'76346485','detalaldnos los precios','PENDIENTE',NULL,'2021-04-13 01:13:19','2021-04-13 01:13:19',3);
/*!40000 ALTER TABLE `solicitud_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_persona` char(1) DEFAULT NULL,
  `nombres` varchar(70) NOT NULL,
  `no_doc` varchar(25) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(45) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `ultimo_ingreso` datetime DEFAULT NULL,
  `estado_usuario` char(15) DEFAULT NULL,
  `cargo_idc` int(11) NOT NULL,
  PRIMARY KEY (`idu`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_usuario_cargo_idx` (`cargo_idc`),
  CONSTRAINT `fk_usuario_cargo` FOREIGN KEY (`cargo_idc`) REFERENCES `cargo` (`idc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'N','jesus huancas','76346594','jesus@gmail.com','123456','av.los sauces','970312458',NULL,NULL,'ACTIVO',1),(2,'N','Manuel vargas','75634212','manuel@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','av.felipe 45','922444152',NULL,NULL,'ACTIVO',2),(3,NULL,'Maeba alva rios','76345897','malva@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',NULL,'929444156','2021-04-12 22:04:06','2021-04-12 22:04:06','ACTIVO',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-13 14:22:56
