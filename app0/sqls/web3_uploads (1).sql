-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2021 at 08:47 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web3_uploads`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int NOT NULL,
  `comentario` text NOT NULL,
  `id_upload` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `id_upload`, `id_usuario`) VALUES
(15, 'add novo comentario', 15, 4),
(16, 'add novo comentario 2', 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id_upload` int NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `descricao` text NOT NULL,
  `ext_arquivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_usuario` int NOT NULL,
  `data_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id_upload`, `titulo`, `descricao`, `ext_arquivo`, `id_usuario`, `data_upload`) VALUES
(16, 'Abobrinha', 'Abobrinha', 'png', 4, '2021-11-25 23:45:35'),
(17, 'teste', 'Abacate', 'png', 4, '2021-11-25 23:45:52'),
(18, 'teste', 'Beringela', 'png', 4, '2021-11-25 23:46:03'),
(19, 'teste', 'Banana', 'png', 4, '2021-11-25 23:46:21'),
(20, 'teste', 'Melancia', 'png', 4, '2021-11-25 23:46:46'),
(21, 'teste', 'Melão', 'png', 4, '2021-11-25 23:47:00'),
(22, 'teste', 'Rabanete', 'png', 4, '2021-11-25 23:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(4, 'teste', 'teste@teste.com', '$2y$10$/36VwDmmgFAxhVWHejQGCeYhOK0078kyaiTwAn6nZKxn9vxr8uldK'),
(6, 'Rapazinho', 'teste1@teste.com', '$2y$10$bdEmN0F/2uclUtsH.IaiSOR4/k7yxf42G9ytZmQvnzK3dSCW4XRcO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_upload` (`id_upload`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id_upload`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id_upload` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
