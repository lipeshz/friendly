-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2023 às 15:19
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
(62, 41, 'dada', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nick` varchar(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `nick`, `email`, `cpf`, `data_nasc`, `senha`) VALUES
(36, 'Filipe Gabriel Ferreira de Lima', 'lipe', 'filipeglima2005@gmail.com', '51625366876', '2005-05-15', '$2y$10$TL.TZYQ.LbQHvS49LgIh9Oc9aVaV0x9oc0cj8/j1RZG76UDJBqTai'),
(37, 'Filipe Gabriel Ferreira de Lima', 'lipeshx', 'filipeglima2005@gmail.com', '51625366876', '2005-05-15', '$2y$10$kCYEDdCYuo0SPfIGUKcXfulJsO41QTtZNSkATfdWeK6tNc4dbj/E6'),
(39, 'Leonardo Filippetto', 'leo', 'gl8923443@gmail.com', '51625366876', '2005-05-15', '$2y$10$leH7jywyxs.WQsZEZ24nFu/pm09BfUJXNgrT3sJTo5/QUJ3TGBk8K'),
(40, 'Filipe Gabriel Ferreira de Lima', 'lipe', 'filipeglima2005@gmail.com', '51625366876', '2005-05-15', '$2y$10$zm7fwfqYNWNVBr3CgvW8Z.fTNHMxCBi84LvUQXCdB/HNAOoNAxzNW'),
(41, 'amandola', 'amanda', 'amanda@gmail.com', '11111111111', '2005-05-15', '$2y$10$nOVB99QpHUTsejRTKtbd4.UWJPDSESbA3HY5mcLEHYhbQBhzEZ.GW');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
