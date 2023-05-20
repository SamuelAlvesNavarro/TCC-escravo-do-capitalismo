-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2023 às 12:50
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
(21, 2, 'nunca', 1),
(22, 2, '1', 0),
(23, 2, '2', 0),
(24, 2, '3', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliable`
--

CREATE TABLE `avaliable` (
  `fk_id_profile` int(11) NOT NULL,
  `fk_id_gadget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `texto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `error`
--

CREATE TABLE `error` (
  `id_error` int(11) NOT NULL,
  `cod_error` varchar(5) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `error_user`
--

CREATE TABLE `error_user` (
  `id_error` int(11) NOT NULL,
  `fk_id_profile` int(11) DEFAULT NULL,
  `fk_id_story` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `error_user`
--

INSERT INTO `error_user` (`id_error`, `fk_id_profile`, `fk_id_story`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gadget`
--

CREATE TABLE `gadget` (
  `id_gadget` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `assos_rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 'Peter Pan morreu'),
(2, 4, 'apenas um teste');

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
(1, 2, '../img-story/Peter Pan/Peter Pan-img-1');

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
(2, 1, 1, 1),
(3, 1, 2, 2),
(4, 2, 0, 0);

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
(1, 0, 0, 0, 0),
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0);

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
(2, 2, 'Quando Peter Pan morreu?');

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
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

CREATE TABLE `rank` (
  `id_ranking` int(11) NOT NULL,
  `minPontos` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `maxPontos` int(11) DEFAULT NULL
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

--
-- Extraindo dados da tabela `reference`
--

INSERT INTO `reference` (`id_reference`, `fk_id_page`, `path`) VALUES
(1, 3, 'https://web.whatsapp.com/');

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
(9, 1, 2, 5),
(10, 2, 2, 1),
(11, 3, 2, 5),
(12, 4, 2, 5);

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
(1, 0, 'Peter Pan', 0, 1, 1),
(2, 0, 'Historia Teste', 4, 1, 1);

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
(1, 1, 'Davi Carvalho de Souza', 'davi.ana999@gmail.com', '1234', 'Davi C', 700, 0, -590),
(2, 2, 'Davi Carvalho de Souza', 'davi.ana111@gmail.com', '1234', 'Davi', 100, 0, 20),
(3, 3, 'Davi Carvalho de Souza', 'davi.ana997@gmail.com', '1234', 'Dada', 100, 0, 20),
(4, 4, 'Davi', 'davi.ana949@gmail.com', '123', 'Davi', 100, 0, 20);

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
-- Índices para tabela `avaliable`
--
ALTER TABLE `avaliable`
  ADD PRIMARY KEY (`fk_id_profile`,`fk_id_gadget`),
  ADD KEY `fk_id_gadget` (`fk_id_gadget`);

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
-- Índices para tabela `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `fk_id_page` (`fk_id_page`);

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
  ADD PRIMARY KEY (`id_gadget`),
  ADD KEY `assos_rank` (`assos_rank`);

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
-- Índices para tabela `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id_ranking`);

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
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `error`
--
ALTER TABLE `error`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `error_user`
--
ALTER TABLE `error_user`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `gadget`
--
ALTER TABLE `gadget`
  MODIFY `id_gadget` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `rank`
--
ALTER TABLE `rank`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reference`
--
ALTER TABLE `reference`
  MODIFY `id_reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `story`
--
ALTER TABLE `story`
  MODIFY `id_story` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user_common`
--
ALTER TABLE `user_common`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`fk_id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliable`
--
ALTER TABLE `avaliable`
  ADD CONSTRAINT `avaliable_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliable_ibfk_2` FOREIGN KEY (`fk_id_gadget`) REFERENCES `gadget` (`id_gadget`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_id_gadget`) REFERENCES `gadget` (`id_gadget`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `error_user`
--
ALTER TABLE `error_user`
  ADD CONSTRAINT `error_user_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `error_user_ibfk_2` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `gadget`
--
ALTER TABLE `gadget`
  ADD CONSTRAINT `gadget_ibfk_1` FOREIGN KEY (`assos_rank`) REFERENCES `rank` (`id_ranking`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `user_common_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`),
  ADD CONSTRAINT `user_common_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
