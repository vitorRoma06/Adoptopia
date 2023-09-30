-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 05:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `animais`
--

CREATE TABLE `animais` (
  `id` int(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `porte` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `vacinado` char(1) NOT NULL,
  `castrado` char(1) NOT NULL,
  `patologia` varchar(200) NOT NULL,
  `situacao` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `descricao` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nomeArquivo` varchar(100) DEFAULT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animais`
--

INSERT INTO `animais` (`id`, `idade`, `raca`, `nome`, `cor`, `porte`, `sexo`, `vacinado`, `castrado`, `patologia`, `situacao`, `status`, `descricao`, `created_at`, `updated_at`, `nomeArquivo`, `path`) VALUES
(13, 2, 'BullDog', 'Thor', 'Marrom', 'Pequeno', 'M', 'S', 'N', 'Nenhuma', 'Bem cuidado', '.', 'Nenhuma', '2023-09-28 01:17:35', '2023-09-28 01:17:35', '6514d42f0b5b5.png', 'uploads/6514d42f0b5b5.png'),
(14, 0, 'dqd', 'dwq', 'wqd', 'dqdq', 'M', 'S', 'S', 'dwq', 'd', 'd', 'dwqd', '2023-09-28 01:19:52', '2023-09-28 01:19:52', '6514d4b8d5abe.png', 'uploads/6514d4b8d5abe.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `imagem` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `estado`, `cidade`, `telefone`, `data_nascimento`, `imagem`) VALUES
(38, 'VITOR DE ROMA HONORIO', 'vitorroma14@gmail.com', '123', 'MG', 'Belo Horizonte', '(31) 3047-0852', '1212-02-12', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animais`
--
ALTER TABLE `animais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
