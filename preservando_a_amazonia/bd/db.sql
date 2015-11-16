-- phpMyAdmin SQL Dump
-- version 2.6.3-pl1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Fev 16, 2011 as 03:21 PM
-- Versão do Servidor: 5.1.26
-- Versão do PHP: 5.2.6
-- 
-- Banco de Dados: `jogo_amazonia`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `jogador`
-- 

CREATE TABLE `jogador` (
  `id_jogador` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jogador`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pontuacao`
-- 

CREATE TABLE `pontuacao` (
  `id_pontuacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogador` int(11) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `codigo_grupo` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_pontuacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `prova`
-- 

CREATE TABLE `prova` (
  `id_prova` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogador` int(11) DEFAULT NULL,
  `respondida` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prova`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `questao`
-- 

CREATE TABLE `questao` (
  `id_questao` int(11) NOT NULL AUTO_INCREMENT,
  `enunciado` varchar(400) NOT NULL,
  `licao` tinyint(4) NOT NULL,
  `alternativa_1` varchar(400) NOT NULL,
  `alternativa_2` varchar(400) NOT NULL,
  `alternativa_3` varchar(400) NOT NULL,
  `alternativa_4` varchar(400) NOT NULL,
  `correta` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_questao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `questao_prova`
-- 

CREATE TABLE `questao_prova` (
  `id_questao_prova` int(11) NOT NULL AUTO_INCREMENT,
  `id_questao` int(11) NOT NULL,
  `id_prova` int(11) NOT NULL,
  `nivel` tinyint(11) NOT NULL,
  `respondida` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_questao_prova`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `registro_jogo`
-- 

CREATE TABLE `registro_jogo` (
  `id_registro_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogador` int(11) NOT NULL,
  `id_questao_prova` int(11) NOT NULL,
  `area_desmatada` smallint(6) NOT NULL,
  `area_preservada` smallint(6) NOT NULL,
  `poluicao_rio` smallint(6) NOT NULL,
  `especies` smallint(6) NOT NULL,
  `acertos_primeira` smallint(6) NOT NULL,
  `acertos_segunda` smallint(6) NOT NULL,
  `acertos_terceira` smallint(6) NOT NULL,
  `fiscalizacao` tinyint(4) NOT NULL,
  `ajudas` tinyint(4) NOT NULL,
  `respondidas` smallint(6) NOT NULL,
  `respostas_certas_credito` tinyint(4) NOT NULL,
  `erros_rio` tinyint(4) NOT NULL,
  `erros_especies` tinyint(4) NOT NULL,
  `creditos` smallint(6) NOT NULL,
  `tempo_jogo` int(11) NOT NULL,
  `pontuacao_nivel` int(11) NOT NULL,
  `pontuacao_rodada` int(11) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_registro_jogo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
