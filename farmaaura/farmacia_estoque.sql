-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/05/2026 às 19:36
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `farmacia_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `fabricante`, `preco`, `estoque`) VALUES
(6, 'Paracetamol', 'Vitalis Pharma', 18.50, 150),
(14, 'Ibuprofeno', 'EndoPharma', 120.90, 320),
(15, 'Dipirona Monoidratada', 'GlobalMed S.A.', 45.00, 85),
(16, 'Amoxicilina', 'LuthorCorp', 29.89, 60),
(17, 'Omeprazol', 'BioCorp', 22.39, 200),
(18, 'Losartana Potássica', 'AlphaLabs', 15.80, 180),
(19, 'Metformina', 'Vitalis Pharma', 34.09, 95),
(20, 'Simvastatina', 'VitaSuplementos', 4.49, 350),
(21, 'Neosaldina', 'GlobalMed S.A.', 39.90, 110),
(22, 'Dorflex', 'BioCorp', 50.00, 43),
(23, 'Buscopan', 'BioCorp', 9.90, 250),
(24, 'Tylenol', 'Vitalis Pharma', 19.30, 140),
(25, 'Aspirina', 'EndoPharma', 27.80, 75),
(26, 'Novalgina', 'Vitalis Pharma', 24.50, 90),
(27, 'Cataflam', 'BioCorp', 21.00, 130),
(28, 'Voltaren', 'GlobalMed S.A.', 88.90, 35),
(29, 'Loratadina', 'BioCorp', 14.00, 210),
(30, 'Allegra', 'AlphaLabs', 26.40, 80),
(31, 'Claritin', 'AlphaLabs', 16.20, 300),
(32, 'Pantoprazol', 'LuthorCorp', 41.00, 65),
(33, 'Fluoxetina', 'VitaSuplementos', 33.50, 125),
(34, 'Sertralina', 'VitaSuplementos', 65.00, 50),
(35, 'Clonazepam', 'EndoPharma', 18.90, 175);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
