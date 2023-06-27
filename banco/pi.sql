-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2023 às 03:10
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
-- Estrutura da tabela `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `fk_id_question` int(11) NOT NULL,
  `text` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `answer`
--

INSERT INTO `answer` (`id_answer`, `fk_id_question`, `text`, `status`) VALUES
(25, 1, 'ddddddd', 1),
(26, 1, 'dddddddddd', 0),
(27, 1, 'dddddddd', 0),
(28, 1, 'ddddddddddd', 0),
(29, 2, 'aaaaaaa', 1),
(30, 2, 'aaaaaa', 0),
(31, 2, 'aaaaaaaaaa', 0),
(32, 2, 'aaaaaaaaaa', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `fk_id_profile` int(11) NOT NULL,
  `fk_id_gadget` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`fk_id_profile`, `fk_id_gadget`, `data`) VALUES
(1, 2, '0000-00-00'),
(1, 21, '0000-00-00'),
(2, 1, '0000-00-00'),
(2, 2, '0000-00-00'),
(5, 5, '2023-06-08');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `error_user`
--

CREATE TABLE `error_user` (
  `id_error` int(11) NOT NULL,
  `fk_id_profile` int(11) DEFAULT NULL,
  `fk_id_story` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gadget`
--

CREATE TABLE `gadget` (
  `id_gadget` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `g_status` int(11) NOT NULL DEFAULT 1,
  `in_it` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gadget`
--

INSERT INTO `gadget` (`id_gadget`, `type`, `preco`, `g_status`, `in_it`) VALUES
(1, 1, 125, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(2, 0, 125, 1, 'background-image: url(../profile-gadgets/pc-profile/unicorn.jpg);'),
(3, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(4, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(5, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(6, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(7, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(8, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(9, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(10, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(11, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(12, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(13, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(14, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(15, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(16, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(17, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(18, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(19, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(20, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(21, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(22, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(23, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);'),
(24, 1, 500, 1, 'background-image: url(../profile-gadgets/bc-profile/red.jpg);');

-- --------------------------------------------------------

--
-- Estrutura da tabela `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `texto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `history`
--

INSERT INTO `history` (`id_history`, `fk_id_page`, `texto`) VALUES
(1, 1, 'fffffffffffffffffffffffffffffffffff'),
(2, 2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`id_image`, `fk_id_page`, `path`) VALUES
(1, 3, '../img-story/aaaaaaaaaaaaa/aaaaaaaaaaaaa-img-9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `like_comment`
--

CREATE TABLE `like_comment` (
  `fk_id_profile` int(11) NOT NULL,
  `fk_id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `order_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `page`
--

INSERT INTO `page` (`id_page`, `fk_id_story`, `type`, `order_p`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `foto` int(11) NOT NULL DEFAULT 0,
  `fundoFoto` int(11) NOT NULL DEFAULT 0,
  `bordaFoto` int(11) NOT NULL DEFAULT 0,
  `fundoPerfil` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id_profile`, `foto`, `fundoFoto`, `bordaFoto`, `fundoPerfil`) VALUES
(1, 2, 0, 0, 21),
(2, 0, 0, 0, 1),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0),
(5, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `quest_itself` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `question`
--

INSERT INTO `question` (`id_question`, `fk_id_story`, `quest_itself`) VALUES
(1, 1, 'ddddddddddddddd?'),
(2, 2, 'aaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `question_user`
--

CREATE TABLE `question_user` (
  `fk_id_question` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `question_user`
--

INSERT INTO `question_user` (`fk_id_question`, `fk_id_profile`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reference`
--

CREATE TABLE `reference` (
  `id_reference` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_comment`
--

CREATE TABLE `report_comment` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `fk_id_comment` int(11) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `status_report` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_profile`
--

CREATE TABLE `report_profile` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `status_report` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_story`
--

CREATE TABLE `report_story` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported_story` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `status_report` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `nota` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `score`
--

INSERT INTO `score` (`id_score`, `fk_id_profile`, `fk_id_story`, `nota`) VALUES
(21, 1, 2, 4),
(22, 2, 1, 4),
(23, 2, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `story`
--

CREATE TABLE `story` (
  `id_story` int(11) NOT NULL,
  `font` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `fk_id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `story`
--

INSERT INTO `story` (`id_story`, `font`, `nome`, `rating`, `status`, `fk_id_profile`) VALUES
(1, 0, 'cufff', 4, 1, 1),
(2, 0, 'aaaaaaaaaaaaa', 4.5, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_common`
--

CREATE TABLE `user_common` (
  `id_user` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `apelido` varchar(15) NOT NULL,
  `pontos_leitor` int(11) NOT NULL DEFAULT 0,
  `ranking` int(11) NOT NULL DEFAULT 0,
  `moedas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user_common`
--

INSERT INTO `user_common` (`id_user`, `fk_id_profile`, `nome`, `email`, `senha`, `apelido`, `pontos_leitor`, `ranking`, `moedas`) VALUES
(1, 1, 'Davi', 'davi888@gmail.com', '123', 'Davi', 100, 0, 1875),
(2, 2, 'Davi Carvalho de Souza', 'davi.ana888@gmail.com', '123', 'z', 200, 0, 200),
(3, 3, 'x', 'x@gmail.com', '12', 'x', 0, 0, 0),
(4, 4, 'Davi Carvalho de Souza', 'davi.ana969@gmail.com', '11', 'd', 0, 0, 0),
(5, 5, 'Davi Carvalho de Souza', 'davi.ana145@gmail.com', '1234', 'Davi', 0, 0, 1500);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `fk_id_question` (`fk_id_question`);

--
-- Índices para tabela `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_id_story` (`fk_id_story`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`fk_id_profile`,`fk_id_gadget`),
  ADD KEY `fk_id_gadget` (`fk_id_gadget`);

--
-- Índices para tabela `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`id_error`);

--
-- Índices para tabela `error_user`
--
ALTER TABLE `error_user`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `fk_id_profile` (`fk_id_profile`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices para tabela `gadget`
--
ALTER TABLE `gadget`
  ADD PRIMARY KEY (`id_gadget`);

--
-- Índices para tabela `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_id_page` (`fk_id_page`);

--
-- Índices para tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_id_page` (`fk_id_page`);

--
-- Índices para tabela `like_comment`
--
ALTER TABLE `like_comment`
  ADD PRIMARY KEY (`fk_id_comment`,`fk_id_profile`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices para tabela `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices para tabela `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Índices para tabela `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices para tabela `question_user`
--
ALTER TABLE `question_user`
  ADD PRIMARY KEY (`fk_id_question`,`fk_id_profile`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices para tabela `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id_reference`),
  ADD KEY `fk_id_page` (`fk_id_page`);

--
-- Índices para tabela `report_comment`
--
ALTER TABLE `report_comment`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_id_reported` (`fk_id_reported`),
  ADD KEY `fk_id_reporter` (`fk_id_reporter`),
  ADD KEY `fk_id_comment` (`fk_id_comment`);

--
-- Índices para tabela `report_profile`
--
ALTER TABLE `report_profile`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_id_reported` (`fk_id_reported`),
  ADD KEY `fk_id_reporter` (`fk_id_reporter`);

--
-- Índices para tabela `report_story`
--
ALTER TABLE `report_story`
  ADD KEY `report_story_ibfk_1` (`fk_id_reported_story`),
  ADD KEY `report_story_ibfk_2` (`fk_id_reporter`);

--
-- Índices para tabela `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `fk_id_profile` (`fk_id_profile`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices para tabela `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id_story`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices para tabela `user_common`
--
ALTER TABLE `user_common`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `error`
--
ALTER TABLE `error`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT de tabela `error_user`
--
ALTER TABLE `error_user`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `gadget`
--
ALTER TABLE `gadget`
  MODIFY `id_gadget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reference`
--
ALTER TABLE `reference`
  MODIFY `id_reference` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `report_comment`
--
ALTER TABLE `report_comment`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `report_profile`
--
ALTER TABLE `report_profile`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `story`
--
ALTER TABLE `story`
  MODIFY `id_story` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user_common`
--
ALTER TABLE `user_common`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`fk_id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_id_gadget`) REFERENCES `gadget` (`id_gadget`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `error_user`
--
ALTER TABLE `error_user`
  ADD CONSTRAINT `error_user_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `error_user_ibfk_2` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `like_comment`
--
ALTER TABLE `like_comment`
  ADD CONSTRAINT `like_comment_ibfk_1` FOREIGN KEY (`fk_id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_comment_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `question_user`
--
ALTER TABLE `question_user`
  ADD CONSTRAINT `question_user_ibfk_1` FOREIGN KEY (`fk_id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_user_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `report_comment`
--
ALTER TABLE `report_comment`
  ADD CONSTRAINT `report_comment_ibfk_1` FOREIGN KEY (`fk_id_reported`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_comment_ibfk_2` FOREIGN KEY (`fk_id_reporter`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_comment_ibfk_3` FOREIGN KEY (`fk_id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `report_profile`
--
ALTER TABLE `report_profile`
  ADD CONSTRAINT `report_profile_ibfk_1` FOREIGN KEY (`fk_id_reported`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_profile_ibfk_2` FOREIGN KEY (`fk_id_reporter`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `report_story`
--
ALTER TABLE `report_story`
  ADD CONSTRAINT `report_story_ibfk_1` FOREIGN KEY (`fk_id_reported_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_story_ibfk_2` FOREIGN KEY (`fk_id_reporter`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `user_common`
--
ALTER TABLE `user_common`
  ADD CONSTRAINT `user_common_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_common_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
