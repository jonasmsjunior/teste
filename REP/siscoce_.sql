-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2015 às 19:29
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
`idcomarca` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comarca`
--

INSERT INTO `comarca` (`idcomarca`, `descricao`) VALUES
(1, 'Palmas'),
(5, 'Gurupi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE IF NOT EXISTS `permissao` (
`idpermissao` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`idpermissao`, `descricao`) VALUES
(1, 'administrado'),
(2, 'gerente'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE IF NOT EXISTS `solicitacao` (
`idsolicitacao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `estado_civil` varchar(255) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `expeditor` varchar(255) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_tipo_solicitacao`
--

CREATE TABLE IF NOT EXISTS `solicitacao_tipo_solicitacao` (
  `idsolicitacao` int(11) NOT NULL,
  `idtipo_solicitacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_solic`
--

CREATE TABLE IF NOT EXISTS `status_solic` (
  `idstatus_solic` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_solicitacao`
--

CREATE TABLE IF NOT EXISTS `status_solicitacao` (
  `idstatus_solic` int(11) NOT NULL,
  `idsolicitacao` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_solicitacao`
--

CREATE TABLE IF NOT EXISTS `tipo_solicitacao` (
`idtipo_solicitacao` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_judiciaria`
--

CREATE TABLE IF NOT EXISTS `unidade_judiciaria` (
`idunidade_judiciaria` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `idcomarca` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade_judiciaria`
--

INSERT INTO `unidade_judiciaria` (`idunidade_judiciaria`, `descricao`, `idcomarca`) VALUES
(1, 'SSJ', 1),
(3, 'dsi', 1),
(4, 'teste', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `num_matricula` varchar(155) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `email` varchar(155) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `data_cadastro`, `num_matricula`, `senha`, `foto`, `data_atualizacao`, `email`, `status`) VALUES
(1, 'jonas de macedo sousa junior', '2015-05-22 00:00:00', '352527', '1016a9d130f4a3b91e9ec2564fb1d0d7', NULL, NULL, '', 1),
(2, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '352526', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2015-06-02 09:51:23', 'igrejaestreladejaco@gmail.com', 1),
(3, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '352528', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00 00:00:00', 'igrejaestreladejaco@gmail.com', 1),
(4, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '352529', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00 00:00:00', 'igrejaestreladejaco@gmail.com', 1),
(5, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '32529', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00 00:00:00', 'igrejaestreladejaco@gmail.com', 0),
(6, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '35252', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00 00:00:00', 'igrejaestreladejaco@gmail.com', 0),
(7, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '35', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0000-00-00 00:00:00', 'jonas.uft@gmail.com', 0),
(8, 'jonas de Macedo Sousa Junior', '0000-00-00 00:00:00', '87786456', 'e10adc3949ba59abbe56e057f20f883e', '87786456.png', '0000-00-00 00:00:00', 'igrejaestreladejaco@gmail.com', 1),
(9, 'administrador', '0000-00-00 00:00:00', '123456', 'e10adc3949ba59abbe56e057f20f883e', '123456.png', '0000-00-00 00:00:00', 'dfgdfgdf@ssd.com', 1),
(10, 'usuario', '2015-06-02 16:30:06', 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 'usuario.png', '0000-00-00 00:00:00', 'usuario@usuario.com', 1),
(11, 'usuario', '0000-00-00 00:00:00', 'usuario@usuario.com', '3a56719108c1d62ac10cb48f024fde9e', '', '0000-00-00 00:00:00', 'usuario@usuario.com', 1),
(12, 'maisumaves', '0000-00-00 00:00:00', 'maisumaves', '1dad43abfc12d4b81f4a572cbc27c429', 'maisumaves1.png', '0000-00-00 00:00:00', 'maisumaves@maisumaves.uuk', 1),
(13, 'dfgdfgdf@ssd.com', '2015-06-02 21:44:00', 'dfgdfgdf@ssd.com', 'bdadc04374536e6c66554028580b9416', '', '2015-06-02 21:44:00', 'dfgdfgdf@ssd.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_unidade_judiciaria`
--

CREATE TABLE IF NOT EXISTS `usuario_unidade_judiciaria` (
  `idusuario` int(11) NOT NULL,
  `idunidade_judiciaria` int(11) NOT NULL,
  `idcomarca` int(11) NOT NULL,
  `idpermissao` int(11) NOT NULL,
  `funcao` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_unidade_judiciaria`
--

INSERT INTO `usuario_unidade_judiciaria` (`idusuario`, `idunidade_judiciaria`, `idcomarca`, `idpermissao`, `funcao`, `status`, `data_atualizacao`) VALUES
(1, 1, 1, 1, 'Técnico judiciario', 0, '0000-00-00 00:00:00'),
(2, 4, 5, 2, 'técnico judiario', 0, '0000-00-00 00:00:00'),
(3, 1, 1, 1, 'asdasdas', 0, '0000-00-00 00:00:00'),
(4, 1, 1, 1, 'asdasdas', 0, '0000-00-00 00:00:00'),
(5, 1, 1, 1, 'técnico judiario', 0, '0000-00-00 00:00:00'),
(6, 4, 5, 1, 'técnico judiario', 0, '0000-00-00 00:00:00'),
(7, 1, 1, 1, 'asdasdas', 0, '0000-00-00 00:00:00'),
(8, 1, 1, 1, 'técnico judiario', 0, '0000-00-00 00:00:00'),
(9, 4, 5, 1, 'mestre', 0, '0000-00-00 00:00:00'),
(10, 1, 1, 1, 'técnico judiario', 1, '0000-00-00 00:00:00'),
(11, 1, 1, 1, 'técnico judiario', 1, '0000-00-00 00:00:00'),
(12, 1, 1, 1, 'técnico judiario', 1, '0000-00-00 00:00:00'),
(13, 1, 1, 1, 'dfgdfgdf@ssd.com', 1, '2015-06-02 21:44:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comarca`
--
ALTER TABLE `comarca`
 ADD PRIMARY KEY (`idcomarca`);

--
-- Indexes for table `permissao`
--
ALTER TABLE `permissao`
 ADD PRIMARY KEY (`idpermissao`);

--
-- Indexes for table `solicitacao`
--
ALTER TABLE `solicitacao`
 ADD PRIMARY KEY (`idsolicitacao`);

--
-- Indexes for table `solicitacao_tipo_solicitacao`
--
ALTER TABLE `solicitacao_tipo_solicitacao`
 ADD PRIMARY KEY (`idsolicitacao`,`idtipo_solicitacao`), ADD KEY `fk_solicitacao_has_tipo_solicitacao_tipo_solicitacao1_idx` (`idtipo_solicitacao`), ADD KEY `fk_solicitacao_has_tipo_solicitacao_solicitacao1_idx` (`idsolicitacao`);

--
-- Indexes for table `status_solic`
--
ALTER TABLE `status_solic`
 ADD PRIMARY KEY (`idstatus_solic`);

--
-- Indexes for table `status_solicitacao`
--
ALTER TABLE `status_solicitacao`
 ADD PRIMARY KEY (`idstatus_solic`,`idsolicitacao`), ADD KEY `fk_status_solic_has_solicitacao_solicitacao1_idx` (`idsolicitacao`), ADD KEY `fk_status_solic_has_solicitacao_status_solic1_idx` (`idstatus_solic`), ADD KEY `fk_status_solicitacao_usuario1_idx` (`idusuario`);

--
-- Indexes for table `tipo_solicitacao`
--
ALTER TABLE `tipo_solicitacao`
 ADD PRIMARY KEY (`idtipo_solicitacao`);

--
-- Indexes for table `unidade_judiciaria`
--
ALTER TABLE `unidade_judiciaria`
 ADD PRIMARY KEY (`idunidade_judiciaria`,`idcomarca`), ADD KEY `fk_unidade_judiciaria_comarca_idx` (`idcomarca`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `usuario_unidade_judiciaria`
--
ALTER TABLE `usuario_unidade_judiciaria`
 ADD PRIMARY KEY (`idusuario`,`idunidade_judiciaria`,`idcomarca`,`idpermissao`), ADD KEY `fk_usuario_has_unidade_judiciaria_unidade_judiciaria1_idx` (`idunidade_judiciaria`,`idcomarca`), ADD KEY `fk_usuario_has_unidade_judiciaria_usuario1_idx` (`idusuario`), ADD KEY `fk_usuario_unidade_judiciaria_permissao1_idx` (`idpermissao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comarca`
--
ALTER TABLE `comarca`
MODIFY `idcomarca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permissao`
--
ALTER TABLE `permissao`
MODIFY `idpermissao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `solicitacao`
--
ALTER TABLE `solicitacao`
MODIFY `idsolicitacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_solicitacao`
--
ALTER TABLE `tipo_solicitacao`
MODIFY `idtipo_solicitacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unidade_judiciaria`
--
ALTER TABLE `unidade_judiciaria`
MODIFY `idunidade_judiciaria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `solicitacao_tipo_solicitacao`
--
ALTER TABLE `solicitacao_tipo_solicitacao`
ADD CONSTRAINT `fk_solicitacao_has_tipo_solicitacao_solicitacao1` FOREIGN KEY (`idsolicitacao`) REFERENCES `solicitacao` (`idsolicitacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_solicitacao_has_tipo_solicitacao_tipo_solicitacao1` FOREIGN KEY (`idtipo_solicitacao`) REFERENCES `tipo_solicitacao` (`idtipo_solicitacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `status_solicitacao`
--
ALTER TABLE `status_solicitacao`
ADD CONSTRAINT `fk_status_solic_has_solicitacao_solicitacao1` FOREIGN KEY (`idsolicitacao`) REFERENCES `solicitacao` (`idsolicitacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_status_solic_has_solicitacao_status_solic1` FOREIGN KEY (`idstatus_solic`) REFERENCES `status_solic` (`idstatus_solic`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_status_solicitacao_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `unidade_judiciaria`
--
ALTER TABLE `unidade_judiciaria`
ADD CONSTRAINT `fk_unidade_judiciaria_comarca` FOREIGN KEY (`idcomarca`) REFERENCES `comarca` (`idcomarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_unidade_judiciaria`
--
ALTER TABLE `usuario_unidade_judiciaria`
ADD CONSTRAINT `fk_usuario_has_unidade_judiciaria_unidade_judiciaria1` FOREIGN KEY (`idunidade_judiciaria`, `idcomarca`) REFERENCES `unidade_judiciaria` (`idunidade_judiciaria`, `idcomarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuario_has_unidade_judiciaria_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuario_unidade_judiciaria_permissao1` FOREIGN KEY (`idpermissao`) REFERENCES `permissao` (`idpermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
