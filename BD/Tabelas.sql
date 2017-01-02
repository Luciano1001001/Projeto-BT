/*
Navicat MySQL Data Transfer

Source Server         : Marlon
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : projeto_brasiltur

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-12-16 01:08:46
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('2', 'Marlon Paranhos', '123.456.789.01', '12345678', '1991-04-04', 'Rua do Fogo, 444', 'Diamantina', 'MG', '39100-000', 'marlonparanhos@gmail.com', '(38) 3526-1159', '(38) 9-8838-1402', '2016-12-16');
INSERT INTO `cliente` VALUES ('3', 'Dante Golden', '458.128.186.59', '54523589', '2015-03-12', 'Rua São Sebastião, 10', 'Carbonita', 'MG', '39665-000', 'golden_dante@hotmail.com', '(38) 3526-4154', '(38) 9-9918-0810', '2016-12-16');
INSERT INTO `cliente` VALUES ('4', 'Mark Tremonti', '341.348.434.82', '48451541', '1984-10-21', 'Av. Amazonas, 3214, Ap. 405', 'Campinas', 'SP', '24682-774', 'tremontiab@yahoo.com', '(11) 4551-1772', '(11) 9-7468-2947', '2016-12-16');
INSERT INTO `cliente` VALUES ('5', 'Corey Taylor', '483.483.412.84', '235898235', '1974-03-07', 'Av. Augusto de Lima, 583, Ap. 201', 'Belo Horizonte', 'MG', '79929-754', 'stonesour@gmail.com', '(31) 5666-8524', '(31) 9-8847-5656', '2016-12-16');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto
-- ----------------------------
INSERT INTO `produto` VALUES ('61', 'Reveillon Porto Seguro', 'Dividimos em até 10x no cartão ou em até 07x no boleto ou cheque.', '27/12/2016 à 03/01/2017', 'Em ônibus LEITO (Dois andares) da empresa Special Bus.', 'Hotel Moradas de Israel à 150m da Axé Mói, sendo 6 dias e 5 noites, o hotel possui uma área de Lazer com 02 piscinas, sauna, sala de ginástica, segurança 24hs. São 43 apartamentos com 02 e 03 suítes, sala-copa-cozinha equipados e ar-condicionado.', '05 cafés da manhã.', '- Equipe de Monitores da BrasilTur acompanhando o grupo em todas as atividades.\n- Ônibus exclusivo durante os passeios e festas.\n- Seguro-Viagem com: Assistência médica, odontológica e farmacêutica.\n- Kit primeiros socorros.\n- Carros de apoio 24h com assistência permanente ao grupo.');
INSERT INTO `produto` VALUES ('62', 'Caldas Novas', 'Dividimos em até 7x no cartão ou em até 5x no boleto ou cheque.', '12/01/2017 à 20/01/2017', 'Em ônibus leito da empresa Pássaro Verde.', 'Hotel Diamond Palace , sendo 6 dias e 5 noites, o hotel possui uma área de Lazer com 02 piscinas, sala de ginástica, segurança 24hs. São apartamentos com equipados com ar-condicionado e TV à cabo.', 'Café da manhã e almoço inclusos.', '- Equipe de Monitores da BrasilTur acompanhando o grupo em todas as atividades.\n- Ônibus exclusivo durante os passeios.\n- Seguro-Viagem com: Assistência médica, odontológica e farmacêutica.\n- Kit primeiros socorros.\n- Carros de apoio 24h com assistência permanente ao grupo.');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_controle
-- ----------------------------
INSERT INTO `produto_controle` VALUES ('2', '61', '0');
INSERT INTO `produto_controle` VALUES ('3', '62', '0');

-- ----------------------------
-- Table structure for produto_observacoes
-- ----------------------------
DROP TABLE IF EXISTS `produto_observacoes`;
CREATE TABLE `produto_observacoes` (
  `id_observacoes` int(11) NOT NULL AUTO_INCREMENT,
  `observacoes` text NOT NULL,
  `fk_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_observacoes`),
  KEY `fk_produto` (`fk_produto`),
  CONSTRAINT `produto_observacoes_ibfk_1` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_observacoes
-- ----------------------------
INSERT INTO `produto_observacoes` VALUES ('1', 'Cada cliente poderá optar pelo pagamento desejado, podendo ser parte no cartão, parte no boleto e parte no cheque.', '61');
INSERT INTO `produto_observacoes` VALUES ('2', 'Cada cliente poderá optar pelo pagamento desejado, podendo ser parte no cartão, parte no boleto e parte no cheque.', '62');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_pacotes
-- ----------------------------
INSERT INTO `produto_pacotes` VALUES ('1', 'Dois Passeios Históricos', '250,00', 'Em Cabrália e em Coroa Vermelha.', '61');
INSERT INTO `produto_pacotes` VALUES ('2', 'Translado no centro de Porto Seguro.', '150,00', 'Passarela do Álcool.', '61');
INSERT INTO `produto_pacotes` VALUES ('3', 'City Tour', '250,00', 'Tour por Caldas Novas', '62');
INSERT INTO `produto_pacotes` VALUES ('4', 'Parque de Águas Termais', '350,00', 'Passeio até ao maior parque aquático de Caldas Novas.', '62');

-- ----------------------------
-- Table structure for produto_valores
-- ----------------------------
DROP TABLE IF EXISTS `produto_valores`;
CREATE TABLE `produto_valores` (
  `id_produto_valores` int(11) NOT NULL AUTO_INCREMENT,
  `valor_produto` varchar(255) NOT NULL,
  `tipo_produto` text NOT NULL,
  `grupo_produto` text NOT NULL,
  `info_pagamento` text NOT NULL,
  `fk_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_produto_valores`),
  KEY `fk_produto` (`fk_produto`) USING BTREE,
  CONSTRAINT `produto_valores_ibfk_2` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produto_valores
-- ----------------------------
INSERT INTO `produto_valores` VALUES ('1', '990,00', 'Solteiro', 'por pessoa', 'Cartão, Cheque ou Boleto', '61');
INSERT INTO `produto_valores` VALUES ('2', '1190,00', 'Casal', 'por pessoa', 'Cartão, Cheque ou Boleto', '61');
INSERT INTO `produto_valores` VALUES ('3', '1090,00', 'Solteiro', 'por pessoa', 'Cartão ou Boleto', '62');
INSERT INTO `produto_valores` VALUES ('4', '1200,00', 'Casal', 'por pessoa', 'Cartão ou Boleto', '62');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '1', 'admin');
INSERT INTO `usuario` VALUES ('2', 'Marlon Paranhos', 'marlonparanhos@gmail.com', 'e2981b460eaa64b3d68b426a8250dc77dec79fe2', '(38) 3526-1159', '(38) 9-8838-1402', 'user');
