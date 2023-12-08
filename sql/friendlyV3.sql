-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2023 às 15:07
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `friendly`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `id_publicador` int(11) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `anexo` text DEFAULT NULL,
  `curtida` int(11) DEFAULT NULL,
  `id_curtidor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `id_publicador`, `texto`, `anexo`, `curtida`, `id_curtidor`) VALUES
(54, 36, 'dada', '1701908356GxIx6s9FmyaCvscrmnDGOfAk.', 8, 0),
(55, 36, 'dawada', '1701908805Pb8cfLjKWSz7nYZSZtc5ppKh.', 41, 0),
(56, 36, 'dawda', '1701908994S5RA7Vt9E5X0n1dV4oEnPCIq.', 0, 0),
(57, 36, 'a', '1701909394j2OupC8eZ4H5ShfhouEl0Bcp.', 2, 0),
(59, 39, 'aaa', '1701950043W3rpsaeQvDGbB23sKukOSx5i.', 3, 0),
(60, 41, 'aaaaa', '1701979321ezbLRcRxJtBO2vdBRLLKsqCx.', 1, 0),
(61, 41, 'dad', '', 0, 0),
(62, 41, 'dada', '', 0, 0),
(63, 41, 'dada', '', 0, 0),
(64, 41, 'dada', '', 0, 0),
(66, 41, 'fafa', '', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
