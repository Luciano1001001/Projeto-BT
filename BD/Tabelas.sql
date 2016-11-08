/*
Navicat MySQL Data Transfer

Source Server         : Marlon
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : projeto_brasiltur

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-11-08 19:50:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) NOT NULL,
  `cpf_cliente` varchar(30) NOT NULL,
  `rg_cliente` varchar(30) NOT NULL,
  `dtnascimento_cliente` date NOT NULL,
  `endereco_cliente` varchar(255) NOT NULL,
  `cidade_cliente` varchar(255) NOT NULL,
  `estado_cliente` varchar(255) NOT NULL,
  `cep_cliente` varchar(10) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `telfixo_cliente` varchar(30) NOT NULL,
  `celular_cliente` varchar(30) NOT NULL,
  `dtcadastro_cliente` date NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cliente
-- ----------------------------

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(255) NOT NULL,
  `info_produto` text NOT NULL,
  `periodo_produto` text NOT NULL,
  `transporte_produto` text NOT NULL,
  `hospedagem_produto` text NOT NULL,
  `alimentacao_produto` text NOT NULL,
  `estrutura_produto` text NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto
-- ----------------------------

-- ----------------------------
-- Table structure for produto_controle
-- ----------------------------
DROP TABLE IF EXISTS `produto_controle`;
CREATE TABLE `produto_controle` (
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `fk_produto` int(11) NOT NULL,
  `controle` int(11) NOT NULL,
  PRIMARY KEY (`id_controle`),
  KEY `fk_produto` (`fk_produto`) USING BTREE,
  CONSTRAINT `produto_controle_ibfk_1` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_controle
-- ----------------------------

-- ----------------------------
-- Table structure for produto_observacoes
-- ----------------------------
DROP TABLE IF EXISTS `produto_observacoes`;
CREATE TABLE `produto_observacoes` (
  `id_observacoes` int(11) NOT NULL AUTO_INCREMENT,
  `observacoes` varchar(255) NOT NULL,
  PRIMARY KEY (`id_observacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_observacoes
-- ----------------------------

-- ----------------------------
-- Table structure for produto_pacotes
-- ----------------------------
DROP TABLE IF EXISTS `produto_pacotes`;
CREATE TABLE `produto_pacotes` (
  `id_produto_pacotes` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pacote` text NOT NULL,
  `valor_pacote` varchar(255) NOT NULL,
  `descricao_pacote` text NOT NULL,
  `fk_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_produto_pacotes`),
  KEY `fk_produto` (`fk_produto`) USING BTREE,
  CONSTRAINT `produto_pacotes_ibfk_1` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_pacotes
-- ----------------------------

-- ----------------------------
-- Table structure for produto_valores
-- ----------------------------
DROP TABLE IF EXISTS `produto_valores`;
CREATE TABLE `produto_valores` (
  `id_produto_valores` int(11) NOT NULL AUTO_INCREMENT,
  `valor_produto` varchar(255) NOT NULL,
  `tipo_produto` text NOT NULL,
  `grupo_produto` text NOT NULL,
  `fk_observacoes` int(11) DEFAULT NULL,
  `info_pagamento` text NOT NULL,
  `fk_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_produto_valores`),
  KEY `fk_produto` (`fk_produto`) USING BTREE,
  KEY `fk_observacoes` (`fk_observacoes`) USING BTREE,
  CONSTRAINT `produto_valores_ibfk_1` FOREIGN KEY (`fk_observacoes`) REFERENCES `produto_observacoes` (`id_observacoes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produto_valores_ibfk_2` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_valores
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(20) NOT NULL,
  `telfixo_usuario` varchar(30) NOT NULL,
  `celular_usuario` varchar(30) NOT NULL,
  `nivel_usuario` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
