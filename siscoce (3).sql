-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jul-2015 às 21:17
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

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
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comarca`
--

INSERT INTO `comarca` (`id`, `nome`, `telefone`) VALUES
(1, 'Palmas', '(63) 3218 - 8425'),
(2, 'Gurupi', '(63) 3218 - 2367');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comarca_usuario`
--

CREATE TABLE IF NOT EXISTS `comarca_usuario` (
  `idcomarca` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `funcao` varchar(45) NOT NULL,
  `lotacao` varchar(45) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comarca_usuario`
--

INSERT INTO `comarca_usuario` (`idcomarca`, `idusuario`, `funcao`, `lotacao`, `status`) VALUES
(1, 1, 'Tenico judiciario', 'DTI', 1),
(1, 2, 'chefe', 'distribuidor', 1),
(2, 1, 'Tenico judiciario', 'DTI', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_certidao_pf`
--

CREATE TABLE IF NOT EXISTS `solicitacao_certidao_pf` (
`id` int(11) NOT NULL,
  `uid` varchar(45) NOT NULL,
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
  `sexo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_certidao_pf`
--

INSERT INTO `solicitacao_certidao_pf` (`id`, `uid`, `nome`, `cpf`, `email`, `rg`, `data_solicitacao`, `endereco`, `profissao`, `data_nascimento`, `estado_civil`, `nacionalidade`, `filiacao_materna`, `filiacao_paterna`, `rg_orgao_expeditor`, `sexo`) VALUES
(36, 'pf55a2bdc3a4528', 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '1100000000', '2015-07-12 21:19:31', 'Palmas', 'professor', '1984-09-30', 'solteiro', 'brasileiro', 'Lucely Araujo Saraiva', 'jonas de macedo sousa', 'ssp-ma', 1),
(37, 'pf55a2c002a204f', 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '1100000000', '2015-07-12 21:29:06', 'Palmas', 'professor', '1984-09-03', 'casado', 'brasileiro', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1),
(38, 'pf55a2c11ab5848', 'jonas m sousa jr', '00401872335', 'jonas.uft@gmail.com', '1100000000', '2015-07-12 21:33:46', 'Palmas', 'professor', '1984-09-30', 'casado', 'brasileiro', 'Lucely Araujo Saraiva', '404 norte alameda 2 lote 1A', 'ssp-ma', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_certidao_pj`
--

CREATE TABLE IF NOT EXISTS `solicitacao_certidao_pj` (
`id` int(11) NOT NULL,
  `uid` varchar(45) NOT NULL,
  `nome_fantasia` varchar(45) NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  `email` varchar(45) NOT NULL,
  `cnpj` varchar(14) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_certidao_pj`
--

INSERT INTO `solicitacao_certidao_pj` (`id`, `uid`, `nome_fantasia`, `data_solicitacao`, `email`, `cnpj`) VALUES
(5, 'pj55a2c2466d83c', 'Empresa fantasma', '2015-07-12 21:38:46', 'empresa@empresa.com.br', '11222333444455');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_certidao_status_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `solicitacao_certidao_status_solicitacao_certidao` (
  `idstatus_solicitacao_certidao` int(11) NOT NULL,
  `idcomarca` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `uidsolicitacao` varchar(45) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_certidao_status_solicitacao_certidao`
--

INSERT INTO `solicitacao_certidao_status_solicitacao_certidao` (`idstatus_solicitacao_certidao`, `idcomarca`, `idusuario`, `uidsolicitacao`, `observacao`, `data`) VALUES
(1, 1, NULL, 'pf55a2bdc3a4528', 'Sua solicitação foi iniciada', '2015-07-12 21:19:31'),
(1, 1, NULL, 'pf55a2c002a204f', 'Sua solicitação foi iniciada', '2015-07-12 21:29:06'),
(1, 1, NULL, 'pf55a2c11ab5848', 'Sua solicitação foi iniciada', '2015-07-12 21:33:46'),
(1, 1, NULL, 'pj55a2c2466d83c', 'Sua solicitação foi iniciada', '2015-07-12 21:38:46'),
(1, 2, NULL, 'pf55a2bdc3a4528', 'Sua solicitação foi iniciada', '2015-07-12 21:19:31'),
(1, 2, NULL, 'pf55a2c002a204f', 'Sua solicitação foi iniciada', '2015-07-12 21:29:06'),
(1, 2, NULL, 'pf55a2c11ab5848', 'Sua solicitação foi iniciada', '2015-07-12 21:33:46'),
(1, 2, NULL, 'pj55a2c2466d83c', 'Sua solicitação foi iniciada', '2015-07-12 21:38:46'),
(2, 1, 2, 'pf55a2c11ab5848', '', '2015-07-13 04:58:28'),
(2, 1, 1, 'pj55a2c2466d83c', '', '2015-07-13 05:36:08'),
(2, 2, 1, 'pf55a2c11ab5848', '', '2015-07-13 05:49:10'),
(2, 2, 1, 'pj55a2c2466d83c', '', '2015-07-13 05:54:07'),
(3, 1, 1, 'pj55a2c2466d83c', '', '2015-07-13 05:40:09'),
(4, 2, 1, 'pf55a2c11ab5848', 'Foi encontrado processos vinculados aos dados informados.', '2015-07-13 05:52:48'),
(4, 2, 1, 'pj55a2c2466d83c', '', '2015-07-13 05:54:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_certidao_tipo_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `solicitacao_certidao_tipo_solicitacao_certidao` (
  `idtipo_solicitacao_certidao` int(11) NOT NULL,
  `uidsolicitacao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_certidao_tipo_solicitacao_certidao`
--

INSERT INTO `solicitacao_certidao_tipo_solicitacao_certidao` (`idtipo_solicitacao_certidao`, `uidsolicitacao`) VALUES
(1, 'pf55a2c11ab5848'),
(2, 'pf55a2c11ab5848'),
(1, 'pj55a2c2466d83c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `status_solicitacao_certidao` (
`id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_solicitacao_certidao`
--

INSERT INTO `status_solicitacao_certidao` (`id`, `descricao`) VALUES
(1, 'iniciado'),
(2, 'em analise'),
(3, 'liberado'),
(4, 'recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_solicitacao_certidao`
--

CREATE TABLE IF NOT EXISTS `tipo_solicitacao_certidao` (
`id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_solicitacao_certidao`
--

INSERT INTO `tipo_solicitacao_certidao` (`id`, `descricao`) VALUES
(1, 'civel'),
(2, 'criminal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `numero_matricula` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `numero_matricula`, `senha`, `nome`) VALUES
(1, '352527', 'e5a6957736b4ffbff324aa91fd54d8fa', 'Jonas de Macedo Sousa Junior'),
(2, '112233', 'd0970714757783e6cf17b26fb8e2298f', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comarca`
--
ALTER TABLE `comarca`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comarca_usuario`
--
ALTER TABLE `comarca_usuario`
 ADD PRIMARY KEY (`idcomarca`,`idusuario`), ADD KEY `fk_comarca_has_usuario_usuario1_idx` (`idusuario`), ADD KEY `fk_comarca_has_usuario_comarca_idx` (`idcomarca`);

--
-- Indexes for table `solicitacao_certidao_pf`
--
ALTER TABLE `solicitacao_certidao_pf`
 ADD PRIMARY KEY (`id`,`uid`);

--
-- Indexes for table `solicitacao_certidao_pj`
--
ALTER TABLE `solicitacao_certidao_pj`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitacao_certidao_status_solicitacao_certidao`
--
ALTER TABLE `solicitacao_certidao_status_solicitacao_certidao`
 ADD PRIMARY KEY (`idstatus_solicitacao_certidao`,`idcomarca`,`uidsolicitacao`), ADD KEY `fk_solicitacao_certidao_has_status_solicitacao_certidao_sta_idx` (`idstatus_solicitacao_certidao`), ADD KEY `fk_solicitacao_certidao_status_solicitacao_certidao_comarca_idx` (`idcomarca`), ADD KEY `fk_solicitacao_certidao_status_solicitacao_certidao_usuario_idx` (`idusuario`);

--
-- Indexes for table `solicitacao_certidao_tipo_solicitacao_certidao`
--
ALTER TABLE `solicitacao_certidao_tipo_solicitacao_certidao`
 ADD KEY `fk_solicitacao_certidao_has_tipo_solicitacao_certidao_tipo__idx` (`idtipo_solicitacao_certidao`);

--
-- Indexes for table `status_solicitacao_certidao`
--
ALTER TABLE `status_solicitacao_certidao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_solicitacao_certidao`
--
ALTER TABLE `tipo_solicitacao_certidao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `numero_matricula_UNIQUE` (`numero_matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comarca`
--
ALTER TABLE `comarca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `solicitacao_certidao_pf`
--
ALTER TABLE `solicitacao_certidao_pf`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `solicitacao_certidao_pj`
--
ALTER TABLE `solicitacao_certidao_pj`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status_solicitacao_certidao`
--
ALTER TABLE `status_solicitacao_certidao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tipo_solicitacao_certidao`
--
ALTER TABLE `tipo_solicitacao_certidao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comarca_usuario`
--
ALTER TABLE `comarca_usuario`
ADD CONSTRAINT `fk_comarca_has_usuario_comarca` FOREIGN KEY (`idcomarca`) REFERENCES `comarca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_comarca_has_usuario_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao_certidao_status_solicitacao_certidao`
--
ALTER TABLE `solicitacao_certidao_status_solicitacao_certidao`
ADD CONSTRAINT `fk_solicitacao_certidao_has_status_solicitacao_certidao_statu1` FOREIGN KEY (`idstatus_solicitacao_certidao`) REFERENCES `status_solicitacao_certidao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_solicitacao_certidao_status_solicitacao_certidao_comarca1` FOREIGN KEY (`idcomarca`) REFERENCES `comarca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_solicitacao_certidao_status_solicitacao_certidao_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao_certidao_tipo_solicitacao_certidao`
--
ALTER TABLE `solicitacao_certidao_tipo_solicitacao_certidao`
ADD CONSTRAINT `fk_solicitacao_certidao_has_tipo_solicitacao_certidao_tipo_so1` FOREIGN KEY (`idtipo_solicitacao_certidao`) REFERENCES `tipo_solicitacao_certidao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
