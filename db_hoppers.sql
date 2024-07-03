-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/07/2024 às 05:28
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
(1, 'Guilherme', ' guifaria.m', '1234', 'administrador', 'e8ef89cfba8a919f9e65831997fad585.jpg'),
(3, 'Laura', '  Laura.teste', '1234', 'administrador', 'dd0a499dd53964db313cbbc48d555c54.jpg'),
(5, 'Laura ', '  Laura.teste', '1234', 'administrador', '781e0fe2a6dfeeb851094049353767a1.jpg'),
(6, 'teste', 'teste123', '1234', 'administrador', '2c867f68c92e1ee83b178f280d55dd34.jpg');

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
(20, '2024-07-03 03:27:08', 'Produto editado', 2, NULL);

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
(9, 'Camisa Mad', 'ee2b14f6f6fc597c945340be7b2a8ee4.jpg', 169.99);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
