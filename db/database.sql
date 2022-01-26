-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2022 às 00:37
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_husky`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer`
--

CREATE TABLE `customer` (
  `cod_customer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `customer`
--

INSERT INTO `customer` (`cod_customer`, `name`) VALUES
(1, 'João'),
(2, 'Maria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `delivery`
--

CREATE TABLE `delivery` (
  `cod_delivery` int(11) NOT NULL,
  `cod_customer` int(11) NOT NULL,
  `cod_deliveryman` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `collect_point` varchar(255) NOT NULL,
  `destination_point` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `delivery`
--

INSERT INTO `delivery` (`cod_delivery`, `cod_customer`, `cod_deliveryman`, `status`, `collect_point`, `destination_point`) VALUES
(2, 1, NULL, 2, 'rua politeama', 'rua tulipa negra'),
(3, 1, 1, 3, 'rua a', 'rua b'),
(4, 1, 2, 1, 'rua politeama', 'rua a'),
(5, 2, 1, 4, 'rua b', 'rua tulipa negra'),
(6, 2, 3, 1, 'rua tulipa negra', 'rua a'),
(7, 1, 2, 1, 'rua a', 'rua politeama');

-- --------------------------------------------------------

--
-- Estrutura da tabela `deliveryman`
--

CREATE TABLE `deliveryman` (
  `cod_deliveryman` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `deliveryman`
--

INSERT INTO `deliveryman` (`cod_deliveryman`, `name`, `status`) VALUES
(1, 'José', 2),
(2, 'Joana', 1),
(3, 'Pedro', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cod_customer`);

--
-- Índices para tabela `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`cod_delivery`),
  ADD KEY `fk_customer` (`cod_customer`),
  ADD KEY `fk_deliveryman` (`cod_deliveryman`);

--
-- Índices para tabela `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`cod_deliveryman`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `customer`
--
ALTER TABLE `customer`
  MODIFY `cod_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `delivery`
--
ALTER TABLE `delivery`
  MODIFY `cod_delivery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `cod_deliveryman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`cod_customer`) REFERENCES `customer` (`cod_customer`),
  ADD CONSTRAINT `fk_deliveryman` FOREIGN KEY (`cod_deliveryman`) REFERENCES `deliveryman` (`cod_deliveryman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
