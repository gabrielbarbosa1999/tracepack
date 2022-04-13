-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Abr-2022 às 14:10
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tracepack`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `points`
--

INSERT INTO `points` (`id`, `nome`, `latitude`, `longitude`) VALUES
(5, 'Teste', '-51.38040146840632', '-22.751170700511594'),
(6, 'Minha Casa', '-51.378872445689076', '-22.745733963345764'),
(7, 'Casa Ana Luisa', '-51.372309526945905', '-22.757781332101818');

-- --------------------------------------------------------

--
-- Estrutura da tabela `poligono`
--

CREATE TABLE `poligono` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dados` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `poligono`
--

INSERT INTO `poligono` (`id`, `nome`, `dados`) VALUES
(2, 'Macacao', '-51.37288217856041,-22.756667063176923 -51.3721097023796,-22.754673476139356 -51.37137477712426,-22.755816205767047 -51.37359564614406,-22.755257209351342'),
(3, 'Test Poligono', '-51.37442254877904,-22.757759300344656 -51.37380564071798,-22.757388290557692 -51.37333893635875,-22.75809073490206 -51.37422406531591,-22.758179776884905');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `nome`) VALUES
(1, 'gabrielbarbosaoliveira1999@gmail.com', '3aaf71c0e53be2d79a64981d14494518', 'Gabriel'),
(4, 'admin@admin.com', '3aaf71c0e53be2d79a64981d14494518', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `poligono`
--
ALTER TABLE `poligono`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `poligono`
--
ALTER TABLE `poligono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
