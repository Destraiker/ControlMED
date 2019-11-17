-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2019 às 21:01
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlmed`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `cnpj` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `farmacia`
--

INSERT INTO `farmacia` (`cnpj`, `nome`, `senha`) VALUES
(2147483647, 'Brener', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `crm` int(11) NOT NULL,
  `nome` varchar(35) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`crm`, `nome`, `senha`) VALUES
(1654654121, 'Joao', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_receita` int(11) NOT NULL,
  `farmacia_cnpj` int(11) NOT NULL,
  `medico_crm` int(11) NOT NULL,
  `data_emicao` date DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cpf_paciente` int(10) UNSIGNED DEFAULT NULL,
  `status_receita` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`crm`);

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_receita`),
  ADD KEY `receita_FKIndex1` (`medico_crm`),
  ADD KEY `receita_FKIndex2` (`farmacia_cnpj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
