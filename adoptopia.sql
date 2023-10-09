-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 03:48 PM
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
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `tipo_animal` varchar(255) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `porte` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `vacinado` char(1) NOT NULL,
  `castrado` char(1) NOT NULL,
  `patologia` varchar(200) NOT NULL,
  `situacao` text NOT NULL,
  `descricao` text NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animais`
--

INSERT INTO `animais` (`id`, `nome`, `idade`, `tipo_animal`, `raca`, `cor`, `porte`, `sexo`, `vacinado`, `castrado`, `patologia`, `situacao`, `descricao`, `data_cadastro`, `imagem`) VALUES
(17, 'vitor', 12, '', 'Pastor-Alemão', 'Branco', 'dqwdqwd', 'M', 'S', 'S', 'dqwdwq', 'dqwdwq', 'qwdqwd', '2023-09-30 19:57:55', 'uploads/8ff8d4550c88d7f55428d5aa2dcc56a2.jpg'),
(20, 'vitor', 0, '', 'wefew', 'fwefwe', 'fewfew', 'M', 'S', 'S', 'fewfew', 'fwef', 'ewfew', '2023-09-30 20:53:46', 'uploads/FKSOPrKX0AEMA_2.jpg');

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
(38, 'VITOR DE ROMA HONORIO', 'vitorroma14@gmail.com', '123', 'MG', 'Belo Horizonte', '(31) 3047-0852', '1212-02-12', 'dXyCLE6M_400x400.jpg'),
(39, 'VITOR DE ROMA HONORIO', 'vitorroma13@gmail.com', '1234', 'MG', 'Belo Horizonte', '423432', '8000-07-08', 'FKSOPrKX0AEMA_2.jpg'),
(43, 'Ramon Din3', 'vitorroma12@gmail.com', '1234#Roma', 'MG', 'Belo Horizonte', '(31) 3047-0852', '2132-03-20', 'd97e419b65ae5e662e91103381cd7dbb.jpg'),
(44, 'VITOo DE ROMA HONORIO', 'vitorroma10@gmail.com', 'Roma#904bola', 'MG', 'Belo Horizonte', '(31) 3047-0853', '2006-02-20', '8ff8d4550c88d7f55428d5aa2dcc56a2.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
