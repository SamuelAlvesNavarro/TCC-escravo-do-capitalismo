-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2023 às 12:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `error`
--

CREATE TABLE `error` (
  `id_error` int(11) NOT NULL,
  `cod_error` varchar(5) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `error`
--

INSERT INTO `error` (`id_error`, `cod_error`, `description`) VALUES
(1, '1', 'Email já cadastrado no site'),
(2, '2', 'Senhas diferente'),
(3, '3', 'Processo falhou'),
(4, '4', 'Reservado'),
(5, '5', 'Você não está logado'),
(6, '6', 'Item não existe'),
(7, '7', 'Reservado'),
(8, '8', 'Sei la(Página de compra)'),
(9, '9', 'Item já foi comprado'),
(10, '10', 'Perfil inválido'),
(11, '11', 'Você já respondeu essa pergunta'),
(12, '12', 'Sei la(Página de resposta)'),
(13, '13', 'Reservado'),
(14, '14', 'Nenhuma história foi selecionada'),
(15, '15', 'Extensão inválida'),
(16, '16', 'Tamanho da imagem ultrapassou de 5 MB'),
(17, '17', 'Título ofensivo'),
(42, '42', 'Reservado'),
(666, '666', 'Reservado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`id_error`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `error`
--
ALTER TABLE `error`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
