-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/07/2024 às 17:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_hoppers`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` enum('administrador','funcionario') DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `email`, `senha`, `cargo`, `foto`) VALUES
(7, 'Guilherme', ' guifaria.m@email.com', '1234', 'administrador', 'fed816e91fca4acb930c0068f4b17278.jpg'),
(8, 'Laura', 'laura.b@email.com', '1234', 'administrador', '8aaa413c8e9dea3c2a195f6f49a29389.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `descricao` varchar(255) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`id`, `data`, `descricao`, `id_produto`, `id_funcionario`) VALUES
(3, '2024-07-02 23:48:59', 'Produto editado', 2, 1),
(4, '2024-07-03 00:36:55', 'Produto editado', 2, 1),
(5, '2024-07-03 00:44:41', 'Produto editado', 4, 1),
(6, '2024-07-03 00:44:57', 'Produto editado', 5, 1),
(7, '2024-07-03 00:45:14', 'Produto editado', 6, 1),
(8, '2024-07-03 00:45:31', 'Produto editado', 7, 1),
(9, '2024-07-03 00:46:36', 'Produto editado', 8, 1),
(10, '2024-07-03 00:54:53', 'Produto editado', 9, 1),
(11, '2024-07-03 00:56:04', 'Produto editado', 3, 1),
(12, '2024-07-03 00:57:42', 'Produto editado', 1, 1),
(16, '2024-07-03 01:55:38', 'Produto editado', 2, 1),
(17, '2024-07-03 01:55:53', 'Produto editado', 2, 1),
(18, '2024-07-03 03:23:16', 'Produto editado', 5, NULL),
(19, '2024-07-03 03:27:01', 'Produto editado', 2, NULL),
(20, '2024-07-03 03:27:08', 'Produto editado', 2, NULL),
(25, '2024-07-03 04:42:30', 'Produto inserido', NULL, 7),
(26, '2024-07-03 04:46:22', 'Produto inserido', NULL, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) NOT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `descricao`, `imagem`, `preco`) VALUES
(1, 'Camisa Class Reverse', 'd1340f46e10bf25a251820d1b6594f8e.jpg', 199.99),
(2, 'Camisa High', '10e0f9dba7cf51bae3f1963ffc0c77f8.jpg', 129.99),
(3, 'Camisa Mad Enlatados Verde', 'bdaa5edb29a099421a120bf0f02b1984.jpg', 189.99),
(4, 'Camisa Class Azul', 'dddcb1d6682f9918970af7db7ca103fa.jpg', 199.99),
(5, 'Camisa Class Verde 4', '2c32834f3fb39f8cf0ba51ddd2ee7d67.jpg', 199.99),
(6, 'Calça Prive', 'c9a80e0807f86eb5b4ee18854ecc824d.jpg', 399.99),
(7, 'Camisa Prive', 'b7a5c80cce0a1341440002b5d26674a8.jpg', 139.99),
(8, 'Calça Sufgang', '5ada7031a14ba68ba489fee72ef50654.jpg', 379.99),
(9, 'Camisa Mad', 'ee2b14f6f6fc597c945340be7b2a8ee4.jpg', 169.99),
(19, 'teste', '7fc69ce74656ace7d6ee8488795a55f2.jpg', 123.00),
(20, 'teste', 'fa5f7d8968b7e74e23224738f3146ea0.jpg', 123.00),
(21, 'teste', '69cbd3d94e1835ff347b7c7ca416ed33.jpg', 123.00),
(22, 'teste', '918f9efc52fe60ec972d0dc15d54666f.jpg', 123.00),
(23, 'teste', 'c8ab160ef4e8b7b740376c10f8ea92e0.jpg', 123.00),
(24, 'teste', '27b38387e97cc7bb6762063ed77f212f.jpg', 123.00),
(25, 'teste', '1e0942749fef93eed14b116063a52c3c.jpg', 123.00),
(26, 'aaa', '48fe34db4f39007c5b531a88ab846fe4.jpg', 1234.00),
(27, 'aaa', '5f24f5abcc55ae4baf88c2c45a160914.jpg', 1234.00),
(28, 'bbb', '0d5f0856a4f1e4e3bc712f6a7bf61ce4.jpg', 1234.00),
(29, 'cccc', '64a4cfc2a3db33c041ff8c2541a7d963.jpg', 1234.00),
(30, 'dddd', 'fcb1241de5120df80524202d679019db.jpg', 12345.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
