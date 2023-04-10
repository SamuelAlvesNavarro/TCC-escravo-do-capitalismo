-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2021 às 17:29
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(4) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `nome`, `cpf`, `email`, `telefone`, `rua`, `numero`, `cidade`, `estado`, `usuario`, `senha`, `bairro`, `sexo`) VALUES
(23, 'Everaldo Silva de Freitas', '254.624.987-52', 'everaldo.freitas@ete', '(14)36954754', 'Rua Jose Telles', 165, 'Lins', 'São Paulo (SP)', 'freitas', 'e10adc3949ba59abbe56e057f20f883e', 'Real Parque', 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `chapa` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(4) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`chapa`, `nome`, `usuario`, `senha`, `cargo`, `cpf`, `rua`, `numero`, `cidade`, `estado`, `cep`, `bairro`, `telefone`, `email`) VALUES
(1, 'Julio Cesar Santos', 'juliocs', 'e10adc3949ba59abbe56e057f20f883e', 'atendente', '543.654.987-52', 'Campos Sales', 1000, 'Lins', 'Sã', '16400200', 'Centro', '(14)3616546546', 'juliocesar@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `codigo` int(4) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `ano` int(4) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `km` int(10) NOT NULL,
  `combustivel` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`codigo`, `modelo`, `placa`, `chassi`, `fabricante`, `ano`, `cor`, `tipo`, `km`, `combustivel`, `preco`, `imagem`) VALUES
(6, 'Conversivel Azul', 'EOR3E124', 'dfoisadoifuaoisd', 'Ferrari', 2021, 'Azul', 'Passeio', 12325456, 'Gasolina', '1500.00', 'carro1.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`chapa`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `chapa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
