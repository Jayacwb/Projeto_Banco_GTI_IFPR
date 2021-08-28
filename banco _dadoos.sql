CREATE SCHEMA sis_banco_bd;
    USE sis_banco_bd;

DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_conta` int(11) DEFAULT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `agencia` int(5) NOT NULL,
  `data_conta` datetime DEFAULT NULL,
  `cpf` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
 

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(10) NOT NULL,
  `deposito` decimal(10,2) NOT NULL,
  `saque` decimal(10,2) NOT NULL,
  `transferencia` decimal(10,2) NOT NULL,
  `data_movimentacao` datetime DEFAULT NULL,
  `conta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  CONSTRAINT fk_conta FOREIGN KEY (conta_id) REFERENCES conta(id)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `gerente`;
CREATE TABLE IF NOT EXISTS `gerente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `movimentacao_id` int(11),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


 