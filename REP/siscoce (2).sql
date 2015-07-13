-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2015 às 22:58
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siscoce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comarca`
--

CREATE TABLE IF NOT EXISTS `comarca` (
  `idcomarca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcomarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `comarca`
--

INSERT INTO `comarca` (`idcomarca`, `nome`, `telefone`) VALUES
(1, 'Palmas', '(63) 3218-4432'),
(2, 'Porto Nacional', '(63) 3218-4431');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comarca_usuario`
--

CREATE TABLE IF NOT EXISTS `comarca_usuario` (
  `idcomarca` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `funcao` varchar(45) NOT NULL,
  `lotacao` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idcomarca`,`idusuario`),
  KEY `fk_comarca_has_usuario_usuario1_idx` (`idusuario`),
  KEY `fk_comarca_has_usuario_comarca_idx` (`idcomarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comarca_usuario`
--

INSERT INTO `comarca_usuario` (`idcomarca`, `idusuario`, `funcao`, `lotacao`, `status`) VALUES
(1, 2, 'Técnico Judiciario', 'Departamento de Tecnologia da Informação', 1),
(2, 2, 'Técnico Judiciario', 'DSI', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `solicitacao_certidao` (
  `idsolicitacao_certidao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `data_solicitacao` datetime DEFAULT NULL,
  `endereco` varchar(255) NOT NULL,
  `profissao` varchar(45) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `estado_civil` varchar(45) DEFAULT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  `filiacao_materna` varchar(45) DEFAULT NULL,
  `filiacao_paterna` varchar(45) DEFAULT NULL,
  `rg_orgao_expeditor` varchar(45) DEFAULT NULL,
  `sexo` int(11) NOT NULL,
  `idtipo_solicitacao_certidao` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitacao_certidao`,`idtipo_solicitacao_certidao`),
  KEY `fk_solicitacao_certidao_tipo_solicitacao_certidao1_idx` (`idtipo_solicitacao_certidao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `solicitacao_certidao`
--

INSERT INTO `solicitacao_certidao` (`idsolicitacao_certidao`, `nome`, `cpf`, `email`, `rg`, `data_solicitacao`, `endereco`, `profissao`, `data_nascimento`, `estado_civil`, `nacionalidade`, `filiacao_materna`, `filiacao_paterna`, `rg_orgao_expeditor`, `sexo`, `idtipo_solicitacao_certidao`) VALUES
(1, 'jonas', '12457575822', 'jonas@jonas.uft', '6756', '2015-06-26 21:22:49', 'tfjy', 'professor', '2015-10-06', 'viuvo', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 1, 1),
(2, 'jonas', '00401872335', 'jonas@jonas.uft', '6756', '2015-06-26 21:25:53', 'tfjy', 'professor', '2015-10-06', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 2, 1),
(3, 'jonas', '00401872335', 'jonas@jonas.uft', '6756', '2015-06-26 21:27:49', 'tfjy', 'professor', '2015-10-06', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 2, 1),
(4, 'jonas', '00401872335', 'jonas@jonas.uft', '6756', '2015-06-26 21:28:08', 'tfjy', 'professor', '2015-10-06', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 2, 1),
(5, 'jonas', '12457575821', 'jonas@jonas.uft', '6756', '2015-06-26 21:29:31', 'tfjy', 'professor', '2015-10-06', 'casado', 'wefhjfh', 'safsdfds dsfdsfs', '', 'ssp-MA', 2, 2),
(6, 'jonas', '12457575821', 'jonas@jonas.uft', '6756', '2015-06-26 21:30:11', 'tfjy', 'professor', '2015-10-06', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 1, 3),
(7, 'jonas', '12457575822', 'jonas@jonas.uft', '6756', '2015-06-26 21:31:49', 'tfjy', 'professor', '2015-10-06', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 1, 3),
(8, 'jonas', '12457575822', 'jonas@jonas.uft', '6756', '2015-06-26 22:07:20', 'tfjy', 'professor', '2015-10-10', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 1, 3),
(9, 'jonas', '12457575821', 'jonas@jonas.uft', '6756', '2015-06-26 22:08:41', 'tfjy', 'professor', '2015-10-06', 'casado', 'brasileiro', 'safsdfds dsfdsfs', '', 'ssp-MA', 1, 3),
(10, 'Meu Apartamento', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 03:41:10', 'palmas', 'professor', '2015-06-17', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '306 SUL  BLOCO 04 ALAMEDA 03 N° 15', 'ssp-ma', 1, 2),
(11, 'Meu Apartamento', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 03:51:19', 'palmas', 'professor', '2015-06-17', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '306 SUL  BLOCO 04 ALAMEDA 03 N° 15', 'ssp-ma', 1, 2),
(12, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 03:52:17', 'Palmas', 'professor', '2015-06-23', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 3),
(13, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 03:56:52', 'Palmas', 'professor', '2015-06-23', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 3),
(14, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 03:58:08', 'Palmas', 'professor', '2015-06-23', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 3),
(15, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 03:58:57', 'Palmas', 'professor', '2015-06-23', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 3),
(16, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 04:05:48', 'Palmas', 'professor', '2015-06-23', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 3),
(17, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 04:27:43', 'Palmas', 'professor', '2015-06-23', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 3),
(18, 'Meu Apartamento', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 04:35:46', 'palmas', 'professor', '2015-06-26', 'casado', 'brasileiro', '306 SUL  BLOCO 04 ALAMEDA 03 N° 15 TORRE', '306 SUL  BLOCO 04 ALAMEDA 03 N° 15 TORRE', 'ssp-ma', 1, 1),
(19, 'jonas m sousa jr', '00401872353', 'jonas.uft@gmail.com', '18745555', '2015-06-27 04:42:44', 'Palmas', 'professor', '2015-06-26', 'casado', 'tocantins', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 2, 3),
(20, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 05:13:53', 'Palmas', 'professor', '2015-06-25', 'casado', 'brasileiro', '306 SUL  BLOCO 04 ALAMEDA 03 N°', '404 norte alameda 2 lote 1A', 'ssp-ma', 1, 2),
(21, 'Meu Apartamento', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 05:26:08', 'palmas', 'professor', '2015-06-19', 'casado', 'tocantins', '306 SUL  BLOCO 04 ALAMEDA 03 N', '306 SUL  BLOCO 04 ALAMEDA 03 N', 'ssp-ma', 1, 2),
(22, 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '18745555', '2015-06-27 10:55:40', 'Palmas', 'professor', '2015-06-18', 'casado', 'brasileiro', 'Lucely Araújo Saraiva', 'Jonas de macedo Sousa', 'ssp-ma', 1, 3),
(23, 'ana caroline', '00000000011', 'usuario@usuario.com', '1100000000', '2015-06-27 17:52:50', 'palmas', 'jornalista', '2015-06-17', 'divorciado', 'brasileiro', 'msd dasd asd ddaas dd dasdasd', '', 'ssp-to', 2, 2),
(24, 'Meu Apartamento', '00440184233', 'jonas.uft@gmail.com', '18745555', '2015-06-27 19:48:17', 'palmas', 'professor', '2015-06-17', 'casado', 'brasileiro', 'Lucely Araujo Saraiva', '306 SUL  BLOCO 04 ALAMEDA 03 N° 15 TORR', 'ssp-to', 1, 3),
(25, 'jonas de Macedo Sousa Junior', '00401872335', 'jonas.uft@gmail.com', '1100000000', '2015-06-28 23:25:04', 'Palmas', 'professor', '2015-06-18', 'casado', 'brasileiro', 'Lucely Araujo Saraiva', 'jonas', 'ssp-ma', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_certidao_status_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `solicitacao_certidao_status_solicitacao_certidao` (
  `idsolicitacao_certidao` int(11) NOT NULL,
  `idstatus_solicitacao_certidao` int(11) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `idcomarca` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `usuario_idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsolicitacao_certidao`,`idstatus_solicitacao_certidao`,`idcomarca`),
  KEY `fk_solicitacao_certidao_has_status_solicitacao_certidao_sta_idx` (`idstatus_solicitacao_certidao`),
  KEY `fk_solicitacao_certidao_has_status_solicitacao_certidao_sol_idx` (`idsolicitacao_certidao`),
  KEY `fk_solicitacao_certidao_status_solicitacao_certidao_comarca_idx` (`idcomarca`),
  KEY `fk_solicitacao_certidao_status_solicitacao_certidao_usuario_idx` (`usuario_idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_certidao_status_solicitacao_certidao`
--

INSERT INTO `solicitacao_certidao_status_solicitacao_certidao` (`idsolicitacao_certidao`, `idstatus_solicitacao_certidao`, `observacao`, `idcomarca`, `data`, `usuario_idusuario`) VALUES
(16, 1, 'Sua solicitação foi iniciada', 1, '2015-06-27 04:05:48', NULL),
(16, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 04:05:48', NULL),
(17, 1, 'Sua solicitação foi iniciada', 1, '2015-06-27 04:27:43', NULL),
(17, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 04:27:43', NULL),
(18, 1, 'Sua solicitação foi iniciada', 1, '2015-06-27 04:35:46', NULL),
(18, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 04:35:46', NULL),
(19, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 04:42:44', NULL),
(20, 1, 'Sua solicitação foi iniciada', 1, '2015-06-27 05:13:54', NULL),
(21, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 05:26:08', NULL),
(22, 1, 'Sua solicitação foi iniciada', 1, '2015-06-27 10:55:40', NULL),
(22, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 10:55:40', NULL),
(22, 2, NULL, 1, '2015-07-17 00:00:00', NULL),
(22, 2, NULL, 2, '2015-06-05 00:00:00', NULL),
(22, 3, NULL, 2, '2015-06-05 00:00:00', 2),
(23, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 17:52:50', NULL),
(23, 2, NULL, 2, '2015-06-30 00:00:00', NULL),
(23, 3, NULL, 2, '2015-06-27 00:00:00', NULL),
(23, 4, NULL, 2, '2015-06-28 00:00:00', 2),
(24, 1, 'Sua solicitação foi iniciada', 1, '2015-06-27 19:48:17', NULL),
(24, 1, 'Sua solicitação foi iniciada', 2, '2015-06-27 19:48:17', NULL),
(25, 1, 'Sua solicitação foi iniciada', 2, '2015-06-28 23:25:04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `status_solicitacao_certidao` (
  `idstatus_solicitacao_certidao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstatus_solicitacao_certidao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `status_solicitacao_certidao`
--

INSERT INTO `status_solicitacao_certidao` (`idstatus_solicitacao_certidao`, `descricao`) VALUES
(1, 'Inicial'),
(2, 'Em Analise'),
(3, 'Liberado'),
(4, 'Recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `tipo_solicitacao_certidao` (
  `idtipo_solicitacao_certidao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo_solicitacao_certidao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tipo_solicitacao_certidao`
--

INSERT INTO `tipo_solicitacao_certidao` (`idtipo_solicitacao_certidao`, `descricao`) VALUES
(1, 'Cível'),
(2, 'Criminal'),
(3, 'Cível e criminal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `numero_matricula` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `numero_matricula_UNIQUE` (`numero_matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `numero_matricula`, `senha`, `nome`) VALUES
(2, '352527', 'e5a6957736b4ffbff324aa91fd54d8fa', 'Jonas de Macedo Sousa junior');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comarca_usuario`
--
ALTER TABLE `comarca_usuario`
  ADD CONSTRAINT `fk_comarca_has_usuario_comarca` FOREIGN KEY (`idcomarca`) REFERENCES `comarca` (`idcomarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comarca_has_usuario_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao_certidao`
--
ALTER TABLE `solicitacao_certidao`
  ADD CONSTRAINT `fk_solicitacao_certidao_tipo_solicitacao_certidao1` FOREIGN KEY (`idtipo_solicitacao_certidao`) REFERENCES `tipo_solicitacao_certidao` (`idtipo_solicitacao_certidao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao_certidao_status_solicitacao_certidao`
--
ALTER TABLE `solicitacao_certidao_status_solicitacao_certidao`
  ADD CONSTRAINT `fk_solicitacao_certidao_has_status_solicitacao_certidao_solic1` FOREIGN KEY (`idsolicitacao_certidao`) REFERENCES `solicitacao_certidao` (`idsolicitacao_certidao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitacao_certidao_has_status_solicitacao_certidao_statu1` FOREIGN KEY (`idstatus_solicitacao_certidao`) REFERENCES `status_solicitacao_certidao` (`idstatus_solicitacao_certidao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitacao_certidao_status_solicitacao_certidao_comarca1` FOREIGN KEY (`idcomarca`) REFERENCES `comarca` (`idcomarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitacao_certidao_status_solicitacao_certidao_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
