-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2019 às 19:42
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
CREATE DATABASE IF NOT EXISTS `controlmed` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `controlmed`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `cnpj` varchar(14) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `farmacia`
--

INSERT INTO `farmacia` (`cnpj`, `nome`, `senha`) VALUES
('11111111111111', 'Araujo', '$2y$10$XZyH6gYV.oktehCLe.KXb.EQeCWMEuMgsA55JLY7vk5EBzJW.h4K6'),
('2147483647', 'Brener', ''),
('22222', 'Araujão', '$2y$10$4CvtxfH9ev3qvY0.hv9eTeQ8KxHOVox4kqSC.eX.TyFdrlLgCFoDO'),
('45121546415455', 'Testao', '$2y$10$uOXneeW8sHGJ7IwNVlJYvO5ztpCKGqw33HFms8iViFr9rkjE/1iK.'),
('65895548522365', 'Teste', '$2y$10$ou2U2Z5TueOQvbsuOQPkAO1sLSZmz6x9j83EmTvTX72PcEa4kW3G.'),
('95884411251122', 'Araujo', '$2y$10$YZ.bdONEi2fZipx8E7aMl.KM4GXg9cReHZ.Dy4B9kalLat3LGNa8m');

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
(4352432, 'Brener', '$2y$10$KGVfxntWzhAOoYQMJBHAXOjqL0b3Dyg5lUG0OMHYGESty53oODMnS'),
(65489521, 'Joao da silva', '$2y$10$HmMBTLIW8tY3I/AHuKzhneE/d38OLRMfhpTLXcPqRpeKwhcjA.7e2'),
(656856565, 'Brener Eduardo Rodrigues', '$2y$10$Lo83sQJzX.jfiduKlbza5uZixPtvKe7DKrnZ.oSI16d62DbA4Jwbm'),
(1654654121, 'Joao', ''),
(2147483647, 'Brener', '$2y$10$B4USlVRgNamBFmvZ//ryguWjqlMJq14/3xleAbu1XvTGyg9ufYcSK');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_receita` int(11) NOT NULL,
  `farmacia_cnpj` varchar(14) DEFAULT NULL,
  `medico_crm` int(11) NOT NULL,
  `data_emicao` date DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cpf_paciente` varchar(11) DEFAULT NULL,
  `status_receita` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id_receita`, `farmacia_cnpj`, `medico_crm`, `data_emicao`, `vencimento`, `descricao`, `cpf_paciente`, `status_receita`) VALUES
(1, '95884411251122', 4352432, '2019-12-03', '2019-12-31', 'Nozaldina: 3 comprimidos ao dia;', '14213463621', 0),
(2, '95884411251122', 4352432, '0000-00-00', '2019-12-24', 'Nozaldina:3 comprimidos ao dia', '142.134.636', 0),
(3, '95884411251122', 4352432, '0000-00-00', '2019-12-15', 'Teste de incert', '142.134.636', 0),
(4, NULL, 4352432, '0000-00-00', '2019-12-25', 'Tssklfhnlaflsa', '142.134.636', 1),
(5, NULL, 4352432, '0000-00-00', '2019-12-30', 'Teste de testes', '665.655.656', 1),
(6, NULL, 4352432, '0000-00-00', '2019-12-12', 'Teste final', '121.212.121', 1),
(7, NULL, 4352432, '0000-00-00', '2019-12-12', 'Teste final mesmo', '121.212.121', 1),
(8, NULL, 4352432, '2019-12-05', '2019-12-12', 'Teste final serio', '121.212.121', 1),
(9, NULL, 4352432, '2019-12-05', '2019-12-24', 'Remedio de teste', '142.134.636', 1);

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
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
