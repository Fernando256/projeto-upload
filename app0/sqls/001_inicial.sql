CREATE DATABASE `web3_uploads` COLLATE utf8_unicode_ci;

CREATE TABLE `comentarios` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `id_upload` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_upload` (`id_upload`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB;

CREATE TABLE `uploads` (
  `id_upload` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) NOT NULL,
  `descricao` text NOT NULL,
  `ext_arquivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_usuario` int NOT NULL,
  `data_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_upload`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23;

INSERT INTO `uploads` VALUES (16,'Abobrinha','Abobrinha','png',4,'2021-11-25 23:45:35'),(17,'teste','Abacate','png',4,'2021-11-25 23:45:52'),(18,'teste','Beringela','png',4,'2021-11-25 23:46:03'),(19,'teste','Banana','png',4,'2021-11-25 23:46:21'),(20,'teste','Melancia','png',4,'2021-11-25 23:46:46'),(21,'teste','Melão','png',4,'2021-11-25 23:47:00'),(22,'teste','Rabanete','png',4,'2021-11-25 23:47:15');

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7;

INSERT INTO `usuarios` VALUES (4,'teste','teste1@teste.com','$2y$10$/36VwDmmgFAxhVWHejQGCeYhOK0078kyaiTwAn6nZKxn9vxr8uldK');