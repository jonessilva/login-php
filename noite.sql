

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `rm` int(5) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `nivel_acesso` varchar(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rm`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`rm`, `nome`, `login`, `senha`, `email`, `foto`, `nivel_acesso`) VALUES
(19000, 'Admin', 'admin', 'admin', 'admin@teste.com', 'imagens/19000.png', '2');
COMMIT;

