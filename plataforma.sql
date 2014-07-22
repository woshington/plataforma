-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/07/2014 às 17:39
-- Versão do servidor: 5.5.38-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `plataforma`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Fazendo dump de dados para tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 142),
(2, 1, NULL, NULL, 'Categorias', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Despesas', 14, 25),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 1, NULL, NULL, 'Groups', 26, 37),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'view', 29, 30),
(17, 14, NULL, NULL, 'add', 31, 32),
(18, 14, NULL, NULL, 'edit', 33, 34),
(19, 14, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'Index', 38, 45),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 1, NULL, NULL, 'Orcamentos', 46, 57),
(23, 22, NULL, NULL, 'index', 47, 48),
(24, 22, NULL, NULL, 'view', 49, 50),
(25, 22, NULL, NULL, 'add', 51, 52),
(26, 22, NULL, NULL, 'edit', 53, 54),
(27, 22, NULL, NULL, 'delete', 55, 56),
(28, 1, NULL, NULL, 'Pages', 58, 61),
(29, 28, NULL, NULL, 'display', 59, 60),
(30, 1, NULL, NULL, 'TipoDespesas', 62, 73),
(31, 30, NULL, NULL, 'index', 63, 64),
(32, 30, NULL, NULL, 'view', 65, 66),
(33, 30, NULL, NULL, 'add', 67, 68),
(34, 30, NULL, NULL, 'edit', 69, 70),
(35, 30, NULL, NULL, 'delete', 71, 72),
(36, 1, NULL, NULL, 'Users', 74, 89),
(37, 36, NULL, NULL, 'index', 75, 76),
(38, 36, NULL, NULL, 'view', 77, 78),
(39, 36, NULL, NULL, 'add', 79, 80),
(40, 36, NULL, NULL, 'edit', 81, 82),
(42, 1, NULL, NULL, 'AclExtras', 90, 91),
(43, 1, NULL, NULL, 'DebugKit', 92, 99),
(44, 43, NULL, NULL, 'ToolbarAccess', 93, 98),
(45, 44, NULL, NULL, 'history_state', 94, 95),
(46, 44, NULL, NULL, 'sql_explain', 96, 97),
(47, 1, NULL, NULL, 'Albuns', 100, 113),
(48, 47, NULL, NULL, 'index', 101, 102),
(49, 47, NULL, NULL, 'view', 103, 104),
(50, 47, NULL, NULL, 'add', 105, 106),
(51, 47, NULL, NULL, 'edit', 107, 108),
(52, 47, NULL, NULL, 'delete', 109, 110),
(53, 1, NULL, NULL, 'Imagens', 114, 125),
(54, 53, NULL, NULL, 'index', 115, 116),
(55, 53, NULL, NULL, 'view', 117, 118),
(56, 53, NULL, NULL, 'add', 119, 120),
(57, 53, NULL, NULL, 'edit', 121, 122),
(58, 53, NULL, NULL, 'delete', 123, 124),
(59, 20, NULL, NULL, 'orcamentos', 41, 42),
(60, 20, NULL, NULL, 'despesas', 43, 44),
(61, 36, NULL, NULL, 'login', 83, 84),
(62, 36, NULL, NULL, 'logout', 85, 86),
(63, 36, NULL, NULL, 'initDB', 87, 88),
(64, 47, NULL, NULL, 'lista', 111, 112),
(65, 1, NULL, NULL, 'Memorandos', 126, 139),
(66, 65, NULL, NULL, 'index', 127, 128),
(67, 65, NULL, NULL, 'view', 129, 130),
(68, 65, NULL, NULL, 'add', 131, 132),
(69, 65, NULL, NULL, 'edit', 133, 134),
(70, 65, NULL, NULL, 'delete', 135, 136),
(71, 1, NULL, NULL, 'Upload', 140, 141),
(72, 65, NULL, NULL, 'download', 137, 138);

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns`
--

CREATE TABLE IF NOT EXISTS `albuns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `albuns`
--

INSERT INTO `albuns` (`id`, `titulo`, `created`, `modified`) VALUES
(1, 'Campeonato', '2014-07-22 08:11:55', '2014-07-22 08:11:55'),
(2, 'Encipro', '2014-07-22 09:26:26', '2014-07-22 09:26:26'),
(3, 'Intercampi', '2014-07-22 14:40:30', '2014-07-22 14:40:30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 2, NULL, 1, 6),
(2, 1, 'User', 3, NULL, 4, 5),
(3, NULL, 'Group', 3, NULL, 7, 8),
(4, 1, 'User', 4, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 3, 1, '-1', '-1', '-1', '-1'),
(3, 3, 65, '1', '1', '1', '1'),
(4, 3, 62, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`) VALUES
(2, 'Obras'),
(1, 'ServiÃ§o ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesas`
--

CREATE TABLE IF NOT EXISTS `despesas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `observacao` text,
  `tipo_despesa_id` int(10) NOT NULL,
  `orcamento_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_despesa_id` (`tipo_despesa_id`),
  KEY `orcamento_id` (`orcamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Fazendo dump de dados para tabela `despesas`
--

INSERT INTO `despesas` (`id`, `valor`, `observacao`, `tipo_despesa_id`, `orcamento_id`) VALUES
(1, 800, 'Teste', 1, 1),
(2, 700, 'Teste 1', 1, 1),
(3, 1500, 'Outra observacao', 1, 1),
(4, 1500.5, 'Teste', 2, 3),
(5, 100000, 'Outra observacao', 1, 1),
(6, 10500, 'Gastos com veiculo oficial no mes de julho devido as consequentes viagens', 3, 1),
(7, 1500, 'Despesa referente ao pagamento de bolsas de 10 alunos que foram para o intercampi realizado em floriano no periodo de 24 a 27 de Julho de 2014.', 1, 1),
(8, 1000, 'Diarias', 1, 1),
(9, 1500, 'Observacao', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(2, 'Administrador', '2014-07-16 14:25:38', '2014-07-16 14:25:38'),
(3, 'Comum', '2014-07-16 14:39:04', '2014-07-16 14:39:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `albun_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `albun_id` (`albun_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Fazendo dump de dados para tabela `imagens`
--

INSERT INTO `imagens` (`id`, `url`, `titulo`, `descricao`, `albun_id`, `created`, `modified`) VALUES
(1, 'Osi-model.png', 'Modelo OSI', 'Modelo OSI', 1, '2014-07-22 09:22:49', '2014-07-22 10:14:55'),
(2, 'TCP_IP.gif', 'TCP/IP', 'TCT/IP', 1, '2014-07-22 09:23:08', '2014-07-22 09:23:08'),
(3, 'DSC07214.JPG', 'Encipro 2012-1', 'ApresentaÃ§Ã£o de trabalhos', 2, '2014-07-22 09:27:14', '2014-07-22 09:29:39'),
(4, 'DSC07215.JPG', 'Encipro 2012', 'alunos 2', 2, '2014-07-22 09:27:36', '2014-07-22 09:27:36'),
(5, 'ComoEstudarSozinho.jpg', 'pq estudar', 'ExplicaÃ§Ã£o engraÃ§ada de por que estudar', 3, '2014-07-22 14:41:11', '2014-07-22 14:41:11'),
(6, 'estudar.jpg', 'pq estudar', 'testes', 3, '2014-07-22 14:41:27', '2014-07-22 14:41:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `memorandos`
--

CREATE TABLE IF NOT EXISTS `memorandos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `para` varchar(100) NOT NULL,
  `numero` int(5) DEFAULT NULL,
  `ano` int(4) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_memo_ano` (`numero`,`ano`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `memorandos`
--

INSERT INTO `memorandos` (`id`, `titulo`, `descricao`, `arquivo`, `para`, `numero`, `ano`, `user_id`) VALUES
(1, 'Memo 1', 'Memorando 1', 'CONCURSO_101_CLASSIFICACAO_POR_LOTACAO_CARGO_VAGA_07-07-2014.PDF', 'Jonas Antonio de Lima Brito', 1, 2014, 4),
(2, 'Consulta de preÃ§os', 'Consulta de preÃ§os', 'Consulta de preÃ§os sub item 16 corrigido.docx', 'Jonas Antonio de Lima Brito', 2, 2014, 4),
(3, 'relacao de valores', 'Relacao de valores quaisquer', 'RelaÃ§Ã£o de Valores em minha vida.docx', 'Jonas Antonio de Lima Brito', 3, 2014, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamentos`
--

CREATE TABLE IF NOT EXISTS `orcamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data_liberacao` date DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `ano`, `valor`, `data_liberacao`, `categoria_id`) VALUES
(1, 2014, 1000000, '2014-07-21', 1),
(2, 2015, 20000, '2014-07-21', 1),
(3, 2014, 150000, '2014-07-21', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_despesas`
--

CREATE TABLE IF NOT EXISTS `tipo_despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `tipo_despesas`
--

INSERT INTO `tipo_despesas` (`id`, `descricao`) VALUES
(1, 'Bolsa Estudantil'),
(2, 'Infraestrutura'),
(3, 'Veiculo Oficial');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_grupo_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `username`, `password`, `ativo`, `group_id`) VALUES
(3, 'woshington valdeci de sousa', 'oxito', '9f51bfd72a8e3f4252e2e0722f152f2a66fc3214', 1, 3),
(4, 'Coordenacao de TI', 'woshington', '9f51bfd72a8e3f4252e2e0722f152f2a66fc3214', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `part_no` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `despesas_ibfk_1` FOREIGN KEY (`tipo_despesa_id`) REFERENCES `tipo_despesas` (`id`),
  ADD CONSTRAINT `despesas_ibfk_2` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamentos` (`id`);

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`albun_id`) REFERENCES `albuns` (`id`);

--
-- Restrições para tabelas `memorandos`
--
ALTER TABLE `memorandos`
  ADD CONSTRAINT `memorandos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD CONSTRAINT `orcamentos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_grupo_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
