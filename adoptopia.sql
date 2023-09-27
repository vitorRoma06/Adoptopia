-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/09/2023 às 19:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



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
-- Despejando dados para a tabela `animais`
--

INSERT INTO `animais` (`id`, `idade`, `raca`, `nome`, `cor`, `porte`, `sexo`, `vacinado`, `castrado`, `patologia`, `situacao`, `status`, `descricao`, `created_at`, `updated_at`, `nomeArquivo`, `path`) VALUES
(10, 0, '', '', '', '', '', '', '', '', '', '', '', '2023-09-27 17:31:35', '2023-09-27 17:31:35', '651466f7c28f0.png', 'uploads/651466f7c28f0.png');


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `estado`, `cidade`, `telefone`, `data_nascimento`) VALUES
(17, 'Alok', 'alok@gmail.com', '123456', 'Minas Gerais', 'Contagem', '31940028927', '1991-08-26');


ALTER TABLE `animais`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `animais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;


