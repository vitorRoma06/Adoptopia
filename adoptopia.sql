-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 02:58 AM
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
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_pet` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `tipo_animal` varchar(255) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `porte` varchar(20) NOT NULL,
  `sexo` char(5) NOT NULL,
  `vacinado` char(3) NOT NULL,
  `castrado` char(3) NOT NULL,
  `patologia` varchar(200) NOT NULL,
  `bairro` text NOT NULL,
  `descricao` text NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagem_pet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animais`
--

INSERT INTO `animais` (`id_post`, `id_usuario`, `nome_pet`, `idade`, `tipo_animal`, `raca`, `cor`, `porte`, `sexo`, `vacinado`, `castrado`, `patologia`, `bairro`, `descricao`, `data_cadastro`, `imagem_pet`) VALUES
(29, 38, 'Vitor', 12, 'Cachorro', 'Pastor-Alemão', 'Branco', 'Mini', 'M', 'N', 'N', 'Nenhuma', 'ff', '', '2023-10-23 22:50:33', 'uploads/cachorro-de-rua-o-que-fazer-ao-r.png'),
(41, 67, 'VITOR DE ROMA HONORIO', 2, 'Cachorro', 'Dqwd', 'Qwd', 'Médio', 'F', 'N', 'N', 'dwqd', 'Santa Terezinha', 'ssssssssssssssssssss', '2023-11-17 19:40:08', 'uploads/lamrador.jpg'),
(43, 67, 'VITOR DE ROMA HONORIO', 2, 'Cachorro', 'Dqwd', 'Qwd', 'Médio', 'F', 'S', 'N', 'dwqd', 'Santa Terezinha', 'sssssssssssss', '2023-11-17 19:55:23', 'uploads/lamrador.jpg'),
(44, 67, 'VITOR DE ROMA HONORIO', 2, 'Cachorro', 'Dqwd', 'Qwd', 'Médio', 'M', 'N', 'N', 'dwqd', 'Santa Terezinha', 'ssssssssssssssssssssss', '2023-11-17 19:55:44', 'uploads/max.jpg'),
(45, 67, 'VITOR DE ROMA HONORIO', 2, 'Cachorro', 'Dqwd', 'Qwd', 'Grande', 'Macho', 'Não', 'Não', 'dwqd', 'Santa Terezinha', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2023-11-17 20:43:02', 'uploads/leao.jpg'),
(46, 67, 'VITOR DE ROMA HONORIO', 2, 'Cachorro', 'Dqwd', 'Qwd', 'Médio', 'Macho', 'Sim', 'Sim', 'dwqd', 'Santa Terezinha', 'wwwwww', '2023-11-18 00:40:33', 'uploads/leao.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animais`
--
ALTER TABLE `animais`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
