drop database if exists pi;
create database pi;
use pi;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 00:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `email`, `senha`) VALUES
(1, 'Davi', 'admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `fk_id_question` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `answer`
--

INSERT INTO `answer` (`id_answer`, `fk_id_question`, `text`, `status`) VALUES
(1, 1, 'A mansão era habitada por um assassino em série e apenas uma morte poderia quebrar a maldição.', 0),
(2, 1, 'A mansão era amaldiçoada por um espírito vingativo que exigia o sacrifício de uma pessoa inocente.', 1),
(3, 1, 'A mansão não era assombrada.', 0),
(4, 1, 'A mansão era o esconderijo de um tesouro amaldiçoado que precisava ser devolvido ao seu lugar.', 0),
(5, 2, 'errado', 1),
(6, 2, 'errado de novo', 0),
(7, 2, 'errado errado', 0),
(8, 2, 'terrível', 0),
(9, 3, 'certo', 1),
(10, 3, 'errado', 0),
(11, 3, 'erradíssimo', 0),
(12, 3, 'errei', 0),
(13, 4, 'errada', 0),
(14, 4, 'certa', 1),
(15, 4, 'erradíssima', 0),
(16, 4, 'não é essa', 0),
(17, 5, 'quebrei as regras da sociedade capitalista', 0),
(18, 5, 'sou curta demais', 0),
(19, 5, 'não sou uma história de terror', 0),
(20, 5, 'todos os motivos acima', 1),
(21, 6, 'uma criança perdida na escuridão', 1),
(22, 6, 'sombras grotescas', 0),
(23, 6, 'grandes olhos vermelhos', 0),
(24, 6, 'terríveis morcegos', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ban`
--

CREATE TABLE `ban` (
  `id_ban` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date_ban` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comment`
--

INSERT INTO `comment` (`id_comment`, `fk_id_story`, `fk_id_profile`, `text`) VALUES
(1, 4, 668, 'Que história louca, amei. Dei nota 3 de 5 de tanto que gostei!'),
(2, 1, 670, 'Sinceramente, fiquei com medo. Sério, não era para ter, sei lá, um final feliz????? Eles simplesmente m0rrem todos. É terror demais para um dia.'),
(3, 1, 671, 'Concordo, Sazin. Eu amei a história, mas é macabra demais =('),
(4, 1, 672, 'Sou o milior di todos.'),
(5, 1, 673, 'Que historie terríble. Je odiei le final. Terrible. No peux pas.'),
(7, 1, 669, 'BANE TODO MUNDO MODS!!!!!!!!!!!!!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `fk_id_profile` int(11) NOT NULL,
  `fk_id_gadget` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compra`
--

INSERT INTO `compra` (`fk_id_profile`, `fk_id_gadget`, `data`) VALUES
(666, 1, '2023-09-24'),
(666, 2, '2023-09-24'),
(667, 1, '2023-11-30'),
(667, 2, '2023-11-30'),
(668, 1, '2023-11-30'),
(668, 2, '2023-11-30'),
(668, 5, '2023-12-05'),
(669, 1, '2023-11-30'),
(669, 2, '2023-11-30'),
(669, 11, '2023-12-05'),
(670, 1, '2023-12-04'),
(670, 2, '2023-12-04'),
(670, 4, '2023-12-05'),
(671, 1, '2023-12-04'),
(671, 2, '2023-12-04'),
(671, 3, '2023-12-05'),
(672, 1, '2023-12-04'),
(672, 2, '2023-12-04'),
(673, 1, '2023-12-04'),
(673, 2, '2023-12-04'),
(673, 10, '2023-12-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `error`
--

CREATE TABLE `error` (
  `id_error` int(11) NOT NULL,
  `cod_error` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `returnT` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `error`
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
(42, '1', 'Texto muito longo', 1),
(666, '4', 'Reservado', 1),
(667, '0', 'Você entrou na página de erro sem um erro. Por favor, não o faça novamente. Só acesse essa página quando necessário.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `error_user`
--

CREATE TABLE `error_user` (
  `id_error` int(11) NOT NULL,
  `fk_id_profile` int(11) DEFAULT NULL,
  `fk_id_story` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `error_user`
--

INSERT INTO `error_user` (`id_error`, `fk_id_profile`, `fk_id_story`) VALUES
(1, 667, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
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
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `titulo`, `descr`, `type`, `script`, `active`) VALUES
(1, 'Cadastro', 'Todo novo usuário ganha 10 moedas ao se cadastrar', 1, 'darMoedas(10);', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `gadget`
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
-- Despejando dados para a tabela `gadget`
--

INSERT INTO `gadget` (`id_gadget`, `type`, `preco`, `g_status`, `nome`, `in_it`) VALUES
(1, 0, 0, 1, 'Novo Usuário Foto', 'background-image: url(../profile-gadgets/pc-profile/new-user.jpg);'),
(2, 3, 0, 1, 'Novo Usuário Fundo', 'background-image: url(../profile-gadgets/bc-profile/new-user.jpg);'),
(3, 0, 15, 1, 'Palhaço', 'background-image: url(../profile-gadgets/pc-profile/palhaco.jpg);'),
(4, 0, 55, 1, 'Bruxa', 'background-image: url(../profile-gadgets/pc-profile/bruxa.jpg);'),
(5, 3, 120, 1, 'Castelo Negro', 'background-image: url(../profile-gadgets/bc-profile/castelo.jpg);'),
(6, 3, 15, 1, 'Monstro', 'background-image: url(../profile-gadgets/bc-profile/monster.webp);'),
(7, 3, 100, 1, 'Fantasma', 'background-image: url(../profile-gadgets/bc-profile/fantasma.jpg);'),
(8, 3, 15, 1, 'Casa Sombria', 'background-image: url(../profile-gadgets/bc-profile/dark_house.jpg);'),
(9, 3, 60, 1, 'Policiais', 'background-image: url(../profile-gadgets/bc-profile/police.webp);'),
(10, 0, 200, 0, 'French', 'background-image: url(../profile-gadgets/pc-profile/french.jpg);'),
(11, 0, 12, 0, 'Bravo', 'background-image: url(../profile-gadgets/pc-profile/anger.jpg);');

-- --------------------------------------------------------

--
-- Estrutura para tabela `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `texto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `history`
--

INSERT INTO `history` (`id_history`, `fk_id_page`, `texto`) VALUES
(1, 1, '<div class=\'text\'>     Era uma noite escura e tempestuosa quando um grupo de cinco amigos decidiu explorar a antiga mansão abandonada, conhecida como a \"Casa dos Horrores\", na periferia da cidade. O local era envolto em lendas e histórias sinistras, mas isso só aumentava a empolgação do grupo. A mansão, de arquitetura gótica, estava <strong>mergulhada em mistério</strong> e abandonada há décadas.</div><div class=\'hr_space\'><hr></div><div class=\'text\'><h1>A Casa</h1>\r\n     Os amigos eram Mike, um cético convicto; Sarah, uma jovem destemida; Tom, o engraçadinho do grupo; Lisa, uma estudante de história obcecada com o sobrenatural; e Alex, um amante de adrenalina.</div><div class=\'img_story\'><img1></div><div class=\'text\'>\r\n     Ao adentrarem a mansão, a atmosfera ficou densa. As paredes rangiam, o cheiro de mofo era sufocante e um silêncio sepulcral dominava o lugar. Eles exploraram os quartos decadentes, repletos de móveis cobertos por lençóis empoeirados e retratos misteriosos que pareciam observá-los.\r\n     À medida que avançavam, eles começaram a ouvir sussurros inquietantes, passos silenciosos e sombras que se moviam rapidamente. O medo começou a se instalar em seus corações, mas nenhum deles queria admitir. Lisa, por outro lado, estava entusiasmada, acreditando que a mansão escondia segredos sombrios.\r\n     A primeira morte ocorreu quando Tom desapareceu de repente. Eles o procuraram por toda a mansão, mas ele tinha simplesmente sumido. Pânico se instalou no grupo. Eles discutiram sobre abandonar a mansão, mas o mau tempo os forçou a ficar. Enquanto estavam na sala de estar, um grito arrepiante ecoou de algum lugar desconhecido.\r\n     Sarah, em pânico, correu para a origem do som, mas ela também desapareceu. O grupo restante ficou aterrorizado e decidiram investigar o porão, onde suspeitavam que algo terrível estava escondido.\r\n     Ao entrarem no porão, encontraram uma sala sinistra com paredes cobertas de escritos enigmáticos e velas acesas. Em uma mesa no centro da sala, havia uma fotografia antiga que retratava a mansão como um local feliz há muitos anos. A imagem mostrava os cinco amigos, mas com um sexto membro, uma figura obscura nas sombras.</div><div class=\'img_story\'><img3></div><div class=\'text\'>\r\n     Logo, Alex foi atacado por uma força invisível, estrangulado até a morte. Ele caiu no chão, enquanto o grupo assistia horrorizado. Agora só restavam Mike e Lisa.\r\n     Em pânico, eles decidiram desvendar o mistério da mansão e encontrar uma maneira de sair. Eles seguiram os escritos nas paredes e descobriram que a mansão era assombrada por um antigo espírito vingativo, que exigia um sacrifício humano para quebrar a maldição. A fotografia indicava que o sexto membro era o alvo.\r\nLisa percebeu que ela era a única opção para ser o próximo sacrifício, mas Mike se recusou a permitir isso. Eles lutaram e, em um momento de desespero, Lisa esfaqueou Mike para se libertar e completar o sacrifício.\r\n     Ao fazê-lo, a mansão tremeu e os espíritos dos amigos mortos emergiram, agarrando Lisa e arrastando-a para as sombras. Com a maldição finalmente quebrada, a mansão começou a desmoronar. Lisa desapareceu nas trevas, enquanto a mansão desmoronava, engolindo-a junto com os segredos sombrios.</div><div class=\'img_story\'><img4></div>'),
(2, 4, '<div class=\'text\'>história para errar a pergunta</div>'),
(3, 6, '<div class=\'text\'>história para acertar a pergunta</div>'),
(4, 8, '<div class=\'text\'>história para dar nota</div>'),
(5, 10, '<div class=\'text\'>Infelizmente eu estou na quarentena.\r\n</div><div class=\'img_story\'><img1></div>'),
(6, 13, '<div class=\'text\'>    Era uma noite sombria e nebulosa, onde as sombras pareciam ganhar vida própria. Na pequena cidade de Ravenswood, cercada por densas florestas e montanhas imponentes, uma atmosfera de mistério pairava no ar. Os moradores locais sussurravam histórias sobre eventos estranhos e inexplicáveis que aconteciam na região, mas nenhuma história era tão temida quanto a lenda dos \"Fins Diversos\".\r    A lenda contava que, uma vez a cada década, uma série de eventos macabros assolava a cidade. Esses eventos, conhecidos como \"Fins Diversos\", eram uma manifestação sobrenatural que trazia consigo um destino sombrio para aqueles que ousassem cruzar o caminho das forças desconhecidas que habitavam a área.\r    Na noite em que a lenda previa o próximo ciclo dos Fins Diversos, um grupo de jovens intrépidos decidiu explorar a floresta proibida que cercava a cidade. O grupo era composto por quatro amigos: Julia, Marcos, Clara e Rafael. Eles acreditavam que as histórias eram apenas lendas urbanas, criadas para assustar os incautos. No entanto, estavam prestes a descobrir a verdade aterrorizante que se escondia nas sombras.\r</div><div class=\'img_story\'><img1></div><div class=\'text\'>\r    À medida que adentravam a floresta, a atmosfera ao redor se tornava mais densa, como se as árvores estivessem sussurrando segredos obscuros. O grupo caminhava cautelosamente, guiado apenas pela luz tênue da lua filtrada pelas copas das árvores. De repente, um murmúrio ecoou pelo ar, fazendo com que todos se detivessem. Parecia um sussurro distante, carregado de uma energia sinistra.\r    Ignorando a sensação de apreensão, continuaram sua jornada. À medida que avançavam, as sombras pareciam ganhar vida, dançando ao redor do grupo como espectros famintos por suas almas. Então, um a um, começaram a experimentar visões horríveis, cada uma personalizada com seus medos mais profundos e sombrios.\r    Marcos viu o rosto pálido de uma criança perdida na escuridão, enquanto Clara foi perseguida por sombras grotescas que se contorciam ao seu redor. Julia e Rafael ouviram sussurros que ecoavam seus segredos mais sombrios. O terror se intensificava a cada passo, e a floresta parecia se alimentar do medo que se espalhava entre eles.\r    À medida que a noite avançava, a floresta se tornou um labirinto de pesadelos, e o grupo percebeu que não estavam sozinhos. Criaturas sinistras emergiam das sombras, movendo-se silenciosamente entre as árvores, olhos brilhando com uma luz maligna. Eram os guardiões dos Fins Diversos, os arautos de um destino inescapável.\r    Em um frenesi de pânico, o grupo tentou encontrar uma saída, mas a floresta parecia se fechar ao seu redor. À medida que os Fins Diversos se aproximavam, os amigos compreenderam a verdade da lenda. Cada visão, cada suspiro, eram os prelúdios de um fim inevitável e terrível.\r    O amanhecer revelou uma floresta silenciosa e aparentemente inofensiva. Não havia sinal do grupo intrépido, apenas a lembrança sombria dos Fins Diversos que, mais uma vez, haviam cumprido seu ciclo de terror. Ravenswood guardava seus segredos sobrenaturais, e as lendas se perpetuavam, alertando os incautos a evitar as sombras da floresta proibida.\r</div><div class=\'img_story\'><img2></div><div class=\'text\'>\r                        </div>');

-- --------------------------------------------------------

--
-- Estrutura para tabela `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `fundo` tinyint(4) NOT NULL DEFAULT 0,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `images`
--

INSERT INTO `images` (`id_image`, `fk_id_page`, `fundo`, `path`) VALUES
(1, 2, 0, '../img-story/OSacrificionaCasadosHorrores/OSacrificionaCasadosHorrores-img-1.jpg'),
(2, 2, 1, '../img-story/OSacrificionaCasadosHorrores/OSacrificionaCasadosHorrores-img-2.jpg'),
(3, 2, 0, '../img-story/OSacrificionaCasadosHorrores/OSacrificionaCasadosHorrores-img-3.jpg'),
(4, 2, 0, '../img-story/OSacrificionaCasadosHorrores/OSacrificionaCasadosHorrores-img-4.jpg'),
(5, 11, 0, '../img-story/EstounaQuarentena/EstounaQuarentena-img-1.jpg'),
(6, 14, 0, '../img-story/Finsdiversos/Finsdiversos-img-1.jpg'),
(7, 14, 0, '../img-story/Finsdiversos/Finsdiversos-img-2.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mods`
--

CREATE TABLE `mods` (
  `id_mod` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mods`
--

INSERT INTO `mods` (`id_mod`, `nome`, `email`, `senha`) VALUES
(1, 'Davi', 'mods@gmail.com', 'mods1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `order_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `page`
--

INSERT INTO `page` (`id_page`, `fk_id_story`, `type`, `order_p`) VALUES
(1, 1, 0, 0),
(2, 1, 1, 1),
(3, 1, 2, 2),
(4, 2, 0, 0),
(5, 2, 2, 2),
(6, 3, 0, 0),
(7, 3, 2, 2),
(8, 4, 0, 0),
(9, 4, 2, 2),
(10, 5, 0, 0),
(11, 5, 1, 1),
(12, 5, 2, 2),
(13, 6, 0, 0),
(14, 6, 1, 1),
(15, 6, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `foto` int(11) NOT NULL DEFAULT 1,
  `fundoPerfil` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `profile`
--

INSERT INTO `profile` (`id_profile`, `foto`, `fundoPerfil`) VALUES
(666, 1, 2),
(667, 1, 2),
(668, 1, 5),
(669, 11, 2),
(670, 4, 2),
(671, 3, 2),
(672, 1, 2),
(673, 10, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `quest_itself` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `question`
--

INSERT INTO `question` (`id_question`, `fk_id_story`, `quest_itself`) VALUES
(1, 1, 'Qual foi a razão pela qual a mansão era assombrada e o que era necessário para quebrar a maldição?'),
(2, 2, 'Errado?'),
(3, 3, 'Certo?'),
(4, 4, 'nota?'),
(5, 5, 'Por que estou na quarentena?'),
(6, 6, 'Qual foi a visão de Marcos?');

-- --------------------------------------------------------

--
-- Estrutura para tabela `question_user`
--

CREATE TABLE `question_user` (
  `fk_id_question` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `question_user`
--

INSERT INTO `question_user` (`fk_id_question`, `fk_id_profile`) VALUES
(1, 669),
(1, 670),
(1, 671),
(1, 672),
(1, 673),
(3, 667),
(4, 667),
(4, 668),
(4, 669);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reference`
--

CREATE TABLE `reference` (
  `id_reference` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reference`
--

INSERT INTO `reference` (`id_reference`, `fk_id_page`, `path`) VALUES
(1, 3, 'https://chat.openai.com/'),
(2, 5, 'https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile=666'),
(3, 7, 'https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile=666'),
(4, 9, 'https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile=666'),
(5, 12, 'https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile=666'),
(6, 15, 'https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile=667');

-- --------------------------------------------------------

--
-- Estrutura para tabela `report_comment`
--

CREATE TABLE `report_comment` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `fk_id_comment` int(11) NOT NULL,
  `reason` text NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `report_comment`
--

INSERT INTO `report_comment` (`id_report`, `fk_id_reported`, `fk_id_reporter`, `fk_id_comment`, `reason`, `code`) VALUES
(1, 668, 669, 1, 'Como que a pessoa diz que ama uma história e depois simplesmente dá uma nota 3????? E outra, o cara é o autor da história e fica comentando que amou??? Bane ele, produção.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `report_profile`
--

CREATE TABLE `report_profile` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `report_profile`
--

INSERT INTO `report_profile` (`id_report`, `fk_id_reported`, `fk_id_reporter`, `reason`, `code`) VALUES
(1, 668, 669, 'Bane esse cara, moderação. Um doido.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `report_story`
--

CREATE TABLE `report_story` (
  `id_report` int(11) NOT NULL,
  `fk_id_reported_story` int(11) NOT NULL,
  `fk_id_reporter` int(11) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `report_story`
--

INSERT INTO `report_story` (`id_report`, `fk_id_reported_story`, `fk_id_reporter`, `reason`, `code`) VALUES
(1, 4, 669, 'Tanto quanto o autor, essa história é tão louca.', 1),
(2, 5, 669, 'Manda para a quarentena ademiro', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL,
  `fk_id_story` int(11) NOT NULL,
  `nota` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `score`
--

INSERT INTO `score` (`id_score`, `fk_id_profile`, `fk_id_story`, `nota`) VALUES
(1, 667, 4, 4),
(2, 668, 4, 3),
(3, 669, 4, 4),
(4, 670, 1, 5),
(5, 671, 1, 5),
(6, 672, 1, 5),
(7, 673, 1, 5),
(8, 669, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `story`
--

CREATE TABLE `story` (
  `id_story` int(11) NOT NULL,
  `font` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `fk_id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `story`
--

INSERT INTO `story` (`id_story`, `font`, `nome`, `rating`, `status`, `fk_id_profile`) VALUES
(1, 0, 'O Sacrifício na Casa dos Horrores', 4.8, 3, 666),
(2, 0, 'O experimento', 0, 3, 673),
(3, 0, 'Não vá ao topo da montanha', 0, 3, 673),
(4, 0, 'Balas soltas', 3.66667, 3, 672),
(5, 0, 'Estou na Quarentena', 0, 4, 672),
(6, 0, 'Fins diversos', 0, 1, 667);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_common`
--

CREATE TABLE `user_common` (
  `id_user` int(11) NOT NULL,
  `fk_id_profile` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `apelido` varchar(15) NOT NULL,
  `pontos_leitor` int(11) NOT NULL DEFAULT 0,
  `moedas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_common`
--

INSERT INTO `user_common` (`id_user`, `fk_id_profile`, `nome`, `email`, `senha`, `apelido`, `pontos_leitor`, `moedas`) VALUES
(1, 666, '?????', 'historito@mail.com', 'oMEWbFUQJdW72Q==', '?????', 0, 100200),
(2, 667, 'Apresentação do PI', 'apre@gmail.com', 'oNUJYApDddA=', 'Apresentação', 0, 100000),
(3, 668, 'Já me denunciaram', 'pd@gmail.com', 'scFKNwhFc9I=', 'Para denúncias', 100, 480),
(4, 669, 'Te denunciei', 'pd2@gmail.com', 'scFKNwhFc9I=', 'Te denunciarei', 200, 98),
(5, 670, 'Sazola', 'sazola@gmail.com', '8JdIMQ5Hcdw=', 'Sazin', 1000, 545),
(6, 671, 'Jg diff', 'jgdiff@gmail.com', '8JdIMQ5Hcdw=', 'Jg diffizin', 600, 45),
(7, 672, 'Sou o milior', 'souomillior@gmail.com', '8JdIMQ5Hcdw=', 'Milior', 10000, 60),
(8, 673, 'Pas co', 'as@gmail.com', '8JdIMQ5Hcdw=', 'Pas comme ça', 500, 400);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices de tabela `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `fk_id_question` (`fk_id_question`);

--
-- Índices de tabela `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id_ban`);

--
-- Índices de tabela `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_id_story` (`fk_id_story`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`fk_id_profile`,`fk_id_gadget`),
  ADD KEY `fk_id_gadget` (`fk_id_gadget`);

--
-- Índices de tabela `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`id_error`);

--
-- Índices de tabela `error_user`
--
ALTER TABLE `error_user`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `fk_id_profile` (`fk_id_profile`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices de tabela `gadget`
--
ALTER TABLE `gadget`
  ADD PRIMARY KEY (`id_gadget`);

--
-- Índices de tabela `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_id_page` (`fk_id_page`);

--
-- Índices de tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_id_page` (`fk_id_page`);

--
-- Índices de tabela `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`id_mod`);

--
-- Índices de tabela `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices de tabela `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Índices de tabela `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices de tabela `question_user`
--
ALTER TABLE `question_user`
  ADD PRIMARY KEY (`fk_id_question`,`fk_id_profile`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices de tabela `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id_reference`),
  ADD KEY `fk_id_page` (`fk_id_page`);

--
-- Índices de tabela `report_comment`
--
ALTER TABLE `report_comment`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_id_reported` (`fk_id_reported`),
  ADD KEY `fk_id_reporter` (`fk_id_reporter`),
  ADD KEY `fk_id_comment` (`fk_id_comment`);

--
-- Índices de tabela `report_profile`
--
ALTER TABLE `report_profile`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_id_reported` (`fk_id_reported`),
  ADD KEY `fk_id_reporter` (`fk_id_reporter`);

--
-- Índices de tabela `report_story`
--
ALTER TABLE `report_story`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `report_story_ibfk_1` (`fk_id_reported_story`),
  ADD KEY `report_story_ibfk_2` (`fk_id_reporter`);

--
-- Índices de tabela `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `fk_id_profile` (`fk_id_profile`),
  ADD KEY `fk_id_story` (`fk_id_story`);

--
-- Índices de tabela `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id_story`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- Índices de tabela `user_common`
--
ALTER TABLE `user_common`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_profile` (`fk_id_profile`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `ban`
--
ALTER TABLE `ban`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `error`
--
ALTER TABLE `error`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- AUTO_INCREMENT de tabela `error_user`
--
ALTER TABLE `error_user`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `gadget`
--
ALTER TABLE `gadget`
  MODIFY `id_gadget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `mods`
--
ALTER TABLE `mods`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674;

--
-- AUTO_INCREMENT de tabela `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `reference`
--
ALTER TABLE `reference`
  MODIFY `id_reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `report_comment`
--
ALTER TABLE `report_comment`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `report_profile`
--
ALTER TABLE `report_profile`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `report_story`
--
ALTER TABLE `report_story`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `story`
--
ALTER TABLE `story`
  MODIFY `id_story` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `user_common`
--
ALTER TABLE `user_common`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`fk_id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_id_gadget`) REFERENCES `gadget` (`id_gadget`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `error_user`
--
ALTER TABLE `error_user`
  ADD CONSTRAINT `error_user_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `error_user_ibfk_2` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `question_user`
--
ALTER TABLE `question_user`
  ADD CONSTRAINT `question_user_ibfk_1` FOREIGN KEY (`fk_id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_user_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`fk_id_page`) REFERENCES `page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`fk_id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `user_common`
--
ALTER TABLE `user_common`
  ADD CONSTRAINT `user_common_ibfk_1` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_common_ibfk_2` FOREIGN KEY (`fk_id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
