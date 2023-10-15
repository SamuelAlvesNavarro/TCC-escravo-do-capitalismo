drop database if exists pi;
create database pi;
use pi;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Out-2023 às 16:20
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `email`, `senha`) VALUES
(1, 'Davi', 'davi.ana145@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `fk_id_question` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ban`
--

CREATE TABLE `ban` (
  `id_ban` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date_ban` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ban`
--

INSERT INTO `ban` (`id_ban`, `user_email`, `date_ban`) VALUES
(1, 'fdggf134@gmail.com', '2023-10-03'),
(2, 'fdggf@gmail', '2023-10-03'),
(3, 'fdggf1@gmail', '2023-10-03');

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
(1, 1, '2023-09-24'),
(1, 2, '2023-09-24'),
(1, 25, '2023-10-08'),
(1, 34, '2023-09-24'),
(1, 65, '2023-09-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `error`
--

CREATE TABLE `error` (
  `id_error` int(11) NOT NULL,
  `cod_error` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `returnT` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `error`
--

INSERT INTO `error` (`id_error`, `cod_error`, `description`, `returnT`) VALUES
(1, '1', 'Email já cadastrado no site', 1),
(2, '1', 'Senha não confirmada', 2),
(3, '4', 'Processo falhou', 1),
(4, '4', 'Reservado', 1),
(6, '2', 'Item não existe', 5),
(7, '4', 'Reservado', 1),
(8, '4', 'Sei la(Página de compra)', 1),
(9, '3', 'Item já foi comprado', 5),
(10, '3', 'Perfil inválido', 1),
(11, '3', 'Você já respondeu essa pergunta', 3),
(12, '4', 'Sei la(Página de resposta)', 3),
(13, '4', 'Reservado', 1),
(14, '2', 'Nenhuma história foi selecionada', 1),
(15, '2', 'Extensão inválida', 4),
(16, '1', 'Tamanho da imagem ultrapassou de 5 MB', 4),
(17, '2', 'Conteúdo Ofensivo', 4),
(18, '3', 'Você tentou acessar uma história que não é sua. Isso é proibido e passível de banimento.', 1),
(19, '1', 'Esse email é inválido', 1),
(20, '1', 'Você tentou comprar um item não disponível', 1),
(21, '1', 'Email informado não é válido', 2),
(22, '3', 'Você tentou injetar código na sua história', 3),
(42, '4', 'Reservado', 1),
(666, '4', 'Reservado', 1),
(667, '0', 'Você entrou na página de erro sem um erro. Por favor, não o faça novamente. Só acesse essa página quando necessário.', 1);

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
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `type` int(11) NOT NULL,
  `script` text DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `titulo`, `descr`, `type`, `script`, `active`) VALUES
(1, 'Cadastro', 'Todo novo usuário ganha 10 moedas ao se cadastrar', 1, 'darMoedas(10);', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gadget`
--

CREATE TABLE `gadget` (
  `id_gadget` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `g_status` int(11) NOT NULL DEFAULT 1,
  `nome` varchar(255) NOT NULL,
  `in_it` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gadget`
--

INSERT INTO `gadget` (`id_gadget`, `type`, `preco`, `g_status`, `nome`, `in_it`) VALUES
(1, 0, 0, 1, 'Novo Usuário Foto', 'background-image: url(../profile-gadgets/pc-profile/new-user.jpg);'),
(2, 3, 0, 1, 'Novo Usuário Fundo', 'background-image: url(../profile-gadgets/bc-profile/new-user.jpg);'),
(25, 0, 25, 1, 'Bolsonaro', 'background-image: url(../profile-gadgets/pc-profile/bonoro.jpg);'),
(26, 0, 25, 1, 'Cupcakke', 'background-image: url(../profile-gadgets/pc-profile/cucapkke.jpg);'),
(27, 0, 25, 1, 'Taylor Swift', 'background-image: url(../profile-gadgets/pc-profile/taylor.jpg);'),
(28, 0, 25, 1, 'Árvore Sábia', 'background-image: url(../profile-gadgets/pc-profile/wise-tree.jpg);'),
(29, 0, 10, 1, 'Muliro', 'background-image: url(../profile-gadgets/pc-profile/murilinho.jpg);'),
(30, 3, 15, 1, 'Cálcio', 'background-image: url(../profile-gadgets/bc-profile/cassio.jpg);'),
(31, 3, 30, 1, 'Slay', 'background-image: url(../profile-gadgets/bc-profile/slay-lacre.jpg);'),
(32, 3, 20, 1, 'Nicki Minaj Macha Era', 'background-image: url(../profile-gadgets/bc-profile/nicki.jpg);'),
(33, 3, 20, 1, 'Ariana Small', 'background-image: url(../profile-gadgets/bc-profile/ariana.jpg);'),
(34, 0, 0, 1, 'Alê', 'background-image: url(../profile-gadgets/bc-profile/ale.jpg);'),
(35, 0, 0, 1, 'Ana Julya', 'background-image: url(../profile-gadgets/pc-profile/anaJ.jpg);'),
(36, 0, 0, 1, 'André', 'background-image: url(../profile-gadgets/pc-profile/andre.png);'),
(37, 0, 0, 1, 'Beatriz', 'background-image: url(../profile-gadgets/pc-profile/beatriz.jpg);'),
(38, 0, 0, 1, 'Bianca', 'background-image: url(../profile-gadgets/pc-profile/bianca.jpeg);'),
(39, 0, 0, 1, 'Bruno', 'background-image: url(../profile-gadgets/pc-profile/bruno.jpg);'),
(40, 0, 0, 1, 'Caique Brito', 'background-image: url(../profile-gadgets/pc-profile/caique.jpg);'),
(41, 0, 0, 1, 'Carol', 'background-image: url(../profile-gadgets/pc-profile/carol.png);'),
(42, 0, 0, 1, 'Elô', 'background-image: url(../profile-gadgets/pc-profile/elo.jpeg);'),
(43, 0, 0, 1, 'Noc na bush', 'background-image: url(../profile-gadgets/pc-profile/felipe.jpeg);'),
(44, 0, 0, 1, 'Fravio', 'background-image: url(../profile-gadgets/pc-profile/flavio.jpg);'),
(45, 0, 0, 1, 'Arlindo', 'background-image: url(../profile-gadgets/pc-profile/arlindo.jpg);'),
(46, 0, 0, 1, 'Silva', 'background-image: url(../profile-gadgets/pc-profile/silva.jpg);'),
(47, 0, 0, 1, 'Maia', 'background-image: url(../profile-gadgets/pc-profile/maia.jpg);'),
(48, 0, 0, 1, 'Guilherme', 'background-image: url(../profile-gadgets/pc-profile/cintra.jpeg);'),
(49, 0, 0, 1, 'i', 'background-image: url(../profile-gadgets/pc-profile/igo.jpg);'),
(50, 0, 0, 1, 'Geeeeeeente', 'background-image: url(../profile-gadgets/pc-profile/kayc.jpg);'),
(51, 0, 0, 1, 'Kevão', 'background-image: url(../profile-gadgets/pc-profile/kevin.jpeg);'),
(52, 0, 0, 1, 'Fazendeiro', 'background-image: url(../profile-gadgets/pc-profile/dona.jpeg);'),
(53, 0, 0, 1, 'Verassimo', 'background-image: url(../profile-gadgets/pc-profile/verasmo.jpg);'),
(54, 0, 0, 1, 'Luan', 'background-image: url(../profile-gadgets/pc-profile/luan.jpg);'),
(55, 0, 0, 1, 'Méris', 'background-image: url(../profile-gadgets/pc-profile/meris.png);'),
(56, 0, 0, 1, 'Mário', 'background-image: url(../profile-gadgets/pc-profile/mario.png);'),
(57, 0, 0, 1, 'Albuquerque', 'background-image: url(../profile-gadgets/pc-profile/albu.jpg);'),
(58, 0, 0, 1, 'Sordado', 'background-image: url(../profile-gadgets/pc-profile/soldado.jpg);'),
(59, 0, 0, 1, 'Akali na base', 'background-image: url(../profile-gadgets/pc-profile/inoe.png);'),
(60, 0, 0, 1, 'Lacrador Profissional', 'background-image: url(../profile-gadgets/pc-profile/lacre.jpg);'),
(61, 0, 0, 1, 'Presente', 'background-image: url(../profile-gadgets/pc-profile/presente.jpeg);'),
(62, 0, 0, 1, 'Alemão', 'background-image: url(../profile-gadgets/pc-profile/rafa.jpg);'),
(63, 0, 0, 1, 'Renan', 'background-image: url(../profile-gadgets/pc-profile/renan.jpg);'),
(64, 0, 0, 1, 'Cancelado', 'background-image: url(../profile-gadgets/pc-profile/gomes.jpg);'),
(65, 0, 50, 1, 'Premiado', 'background-image: url(../profile-gadgets/pc-profile/rachel.jpg);');

-- --------------------------------------------------------

--
-- Estrutura da tabela `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `texto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `fundo` tinyint(4) NOT NULL DEFAULT 0,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estrutura da tabela `mods`
--

CREATE TABLE `mods` (
  `id_mod` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `mods`
--

INSERT INTO `mods` (`id_mod`, `nome`, `email`, `senha`) VALUES
(1, 'Davi', 'mods@gmail.com', 'mods1234');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `foto` int(11) NOT NULL DEFAULT 1,
  `fundoFoto` int(11) NOT NULL DEFAULT 0,
  `bordaFoto` int(11) NOT NULL DEFAULT 0,
  `fundoPerfil` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id_profile`, `foto`, `fundoFoto`, `bordaFoto`, `fundoPerfil`) VALUES
(1, 65, 0, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `quest_itself` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `question_user`
--

CREATE TABLE `question_user` (
  `fk_id_question` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `reason` text NOT NULL,
  `code` int(11) NOT NULL
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
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `report_profile`
--

INSERT INTO `report_profile` (`id_report`, `fk_id_reported`, `fk_id_reporter`, `reason`, `code`) VALUES
(1, 1, 666, 'AUTO - aos esgotos: 24/09/23 09:25:16 - 14 - OBS', 2),
(2, 1, 666, 'AUTO - aos esgotos: 08/10/23 03:17:35 - 14 - OBS', 2),
(3, 1, 666, 'AUTO - aos esgotos: 08/10/23 03:20:54 - 6 - BAN', 1),
(4, 1, 666, 'AUTO - aos esgotos: 08/10/23 03:21:41 - 6 - OBS', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_story`
--

CREATE TABLE `report_story` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported_story` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `code` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `story`
--

CREATE TABLE `story` (
  `id_story` int(11) NOT NULL,
  `font` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `fk_id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 'Apresentação', 'davi.carvalho@aluno.ifsp.edu.br', 'apresentacao123', 'The Boss', 100, 0, 9975);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `fk_id_question` (`fk_id_question`);

--
-- Índices para tabela `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id_ban`);

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
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

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
-- Índices para tabela `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`id_mod`);

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
  ADD PRIMARY KEY (`id_report`),
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
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ban`
--
ALTER TABLE `ban`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `error`
--
ALTER TABLE `error`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- AUTO_INCREMENT de tabela `error_user`
--
ALTER TABLE `error_user`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `gadget`
--
ALTER TABLE `gadget`
  MODIFY `id_gadget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mods`
--
ALTER TABLE `mods`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `reference`
--
ALTER TABLE `reference`
  MODIFY `id_reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `report_comment`
--
ALTER TABLE `report_comment`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `report_profile`
--
ALTER TABLE `report_profile`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `report_story`
--
ALTER TABLE `report_story`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `story`
--
ALTER TABLE `story`
  MODIFY `id_story` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
