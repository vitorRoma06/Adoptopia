-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 08:55 AM
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
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `imagem` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cidade`, `telefone`, `data_nascimento`, `imagem`) VALUES
(65, 'VITOR DE ROMA HONORIO', 'vitorroma333@gmail.com', '$2y$10$O8NZxoqZ8V6nU/GZbS0xiOp6Rkn0GuAIfYJokBWZgIXpGXEU4QHYu', 'Piranguinho', '(31) 30470-8522', '2006-02-20', 'default.png'),
(66, 'vitor de roma', 'vitor@gmail.com', '$2y$10$qu7mQm6fPtvepuSQs5XjUuysmh6mYJhRQ0PAEKM4llEWlL1nK.Az.', 'Belo Horizonte', '(31) 97502-9406', '2006-02-20', 'default.png'),
(67, 'Testeaa', 'teste@teste.com', '$2y$10$A7qyaQcWcz7NFU2/wVJCluUDVTsrGluXpIgBNj9iJpekLDA5gm69q', 'Abre Campo', '(31) 30470-8522', '2006-02-20', 'leao.jpg'),
(68, 'ddd', 'ffffffff@ffd.cc', '$2y$10$OrZabKmZN7.MvYejubxmneKtVnR5yCJaNAlLe9R8g49XwvbcKQoSG', 'Belo Horizonte', '(35) 45454-5454', '2005-12-20', 'default.png'),
(71, 'vitor', 'teste@ta.com', '$2y$10$tCSHt9H6CKMaok5z8pp2cu1.uK6D6fctT9hJDwTj.mCkYK/t9unjS', 'Belo Horizonte', '(22) 22222-2222', '2006-02-20', 'leao.jpg'),
(72, 'teste', 'teste@teste.com', '$2y$10$vPaNEpV75P39ePvWJHQNxuCcfNJgH8e5xB0Dp3Mk3rB8.iCypNTu.', 'Belo Horizonte', '(22) 22222-2222', '2006-02-20', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
