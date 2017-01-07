/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : projeto_brasiltur

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-07 14:25:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `arquivo`
-- ----------------------------
DROP TABLE IF EXISTS `arquivo`;
CREATE TABLE `arquivo` (
  `id_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `cod_arquivo` varchar(1) NOT NULL DEFAULT '1',
  `dt_geracao_arquivo` datetime NOT NULL,
  `quant_lotes_arquivo` varchar(6) NOT NULL,
  `quant_registros_arquivo` varchar(6) NOT NULL,
  PRIMARY KEY (`id_arquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arquivo
-- ----------------------------

-- ----------------------------
-- Table structure for `boleto`
-- ----------------------------
DROP TABLE IF EXISTS `boleto`;
CREATE TABLE `boleto` (
  `id_boleto` int(11) NOT NULL AUTO_INCREMENT,
  `id_pagamento_boleto` int(11) NOT NULL,
  `nosso_numero_boleto` varchar(8) NOT NULL,
  `nosso_numero_cnab_boleto` varchar(20) NOT NULL,
  `dt_emissao_boleto` date NOT NULL,
  `dt_vencimento_boleto` date NOT NULL,
  `valor_boleto` decimal(13,2) NOT NULL,
  `especie_boleto` varchar(2) NOT NULL,
  `aceite_boleto` varchar(1) NOT NULL,
  `cod_protesto_boleto` varchar(1) NOT NULL,
  `prazo_protesto_boleto` int(2) NOT NULL,
  `num_parcela_boleto` int(2) NOT NULL,
  `cod_moeda_boleto` varchar(2) NOT NULL,
  `informacao_boleto_3` varchar(40) DEFAULT NULL,
  `informacao_boleto_4` varchar(40) DEFAULT NULL,
  `informacao_boleto_5` varchar(40) DEFAULT NULL,
  `informacao_boleto_6` varchar(40) DEFAULT NULL,
  `informacao_boleto_7` varchar(40) DEFAULT NULL,
  `id_lote` int(11) NOT NULL,
  PRIMARY KEY (`id_boleto`),
  KEY `kf_pagamento_boleto` (`id_pagamento_boleto`),
  KEY `fk_boleto_lote` (`id_lote`),
  CONSTRAINT `fk_boleto_lote` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`) ON UPDATE CASCADE,
  CONSTRAINT `fk_pagamento_boleto` FOREIGN KEY (`id_pagamento_boleto`) REFERENCES `pagamento` (`id_pagamento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of boleto
-- ----------------------------

-- ----------------------------
-- Table structure for `cliente`
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) NOT NULL,
  `cpf_cliente` varchar(30) NOT NULL,
  `rg_cliente` varchar(30) NOT NULL,
  `dtnascimento_cliente` date NOT NULL,
  `endereco_cliente` varchar(255) NOT NULL,
  `bairro_sacado` varchar(50) NOT NULL,
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
INSERT INTO `cliente` VALUES ('2', 'Marlon Paranhos', '123.456.789.01', '12345678', '1991-04-04', 'Rua do Fogo, 444', '', 'Diamantina', 'MG', '39100-000', 'marlonparanhos@gmail.com', '(38) 3526-1159', '(38) 9-8838-1402', '2016-12-16');
INSERT INTO `cliente` VALUES ('3', 'Dante Golden', '458.128.186.59', '54523589', '2015-03-12', 'Rua São Sebastião, 10', '', 'Carbonita', 'MG', '39665-000', 'golden_dante@hotmail.com', '(38) 3526-4154', '(38) 9-9918-0810', '2016-12-16');
INSERT INTO `cliente` VALUES ('4', 'Mark Tremonti', '341.348.434.82', '48451541', '1984-10-21', 'Av. Amazonas, 3214, Ap. 405', '', 'Campinas', 'SP', '24682-774', 'tremontiab@yahoo.com', '(11) 4551-1772', '(11) 9-7468-2947', '2016-12-16');
INSERT INTO `cliente` VALUES ('5', 'Corey Taylor', '483.483.412.84', '235898235', '1974-03-07', 'Av. Augusto de Lima, 583, Ap. 201', '', 'Belo Horizonte', 'MG', '79929-754', 'stonesour@gmail.com', '(31) 5666-8524', '(31) 9-8847-5656', '2016-12-16');

-- ----------------------------
-- Table structure for `contrato`
-- ----------------------------
DROP TABLE IF EXISTS `contrato`;
CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `id_contratante` int(11) NOT NULL COMMENT 'fk id_cliente',
  `id_avalista` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `dt_contrato` date NOT NULL,
  `valor_contrato` decimal(10,2) NOT NULL,
  `pacote_contrato` int(11) NOT NULL,
  `numero_contrato` int(15) NOT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `fk_id_cliente` (`id_contratante`),
  KEY `fk_pacote_contrato` (`pacote_contrato`),
  KEY `fk_contrato_empresa` (`id_empresa`),
  KEY `fk_cliente_avalista` (`id_avalista`),
  CONSTRAINT `fk_cliente_avalista` FOREIGN KEY (`id_avalista`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_cliente` FOREIGN KEY (`id_contratante`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON UPDATE CASCADE,
  CONSTRAINT `fk_pacote_contrato` FOREIGN KEY (`pacote_contrato`) REFERENCES `produto_pacotes` (`id_produto_pacotes`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contrato
-- ----------------------------

-- ----------------------------
-- Table structure for `empresa`
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `cnpj_empresa` int(14) NOT NULL,
  `convenio_empresa` varchar(20) NOT NULL,
  `carteira_empresa` varchar(1) NOT NULL,
  `num_agencia_empresa` varchar(5) NOT NULL,
  `dv_agencia_empresa` varchar(1) NOT NULL,
  `num_conta_empresa` varchar(12) NOT NULL,
  `dv_conta_empresa` varchar(1) NOT NULL,
  `dv_ag_conta_empresa` varchar(1) NOT NULL,
  `razao_social_empresa` varchar(30) NOT NULL,
  `nome_fantasia_empresa` varchar(30) NOT NULL,
  `nome_banco_empresa` varchar(30) NOT NULL,
  `cod_banco_empresa` varchar(3) NOT NULL,
  `end_empresa` varchar(40) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresa
-- ----------------------------

-- ----------------------------
-- Table structure for `lote`
-- ----------------------------
DROP TABLE IF EXISTS `lote`;
CREATE TABLE `lote` (
  `id_lote` int(11) NOT NULL AUTO_INCREMENT,
  `controle_lote` int(4) NOT NULL,
  `informacao_1_lote` varchar(40) DEFAULT NULL,
  `informacao_2_lote` varchar(40) DEFAULT NULL,
  `num_remessa_lote` varchar(8) NOT NULL,
  `quant_registros_lote` varchar(6) DEFAULT NULL,
  `quant_cob_simples_lote` varchar(6) DEFAULT NULL,
  `valor_cob_simples_lote` decimal(13,2) DEFAULT NULL,
  `quant_cob_vinculada_lote` varchar(6) DEFAULT NULL,
  `valor_cob_vinculada_lote` decimal(13,2) DEFAULT NULL,
  `quant_cob_caucionada_lote` varchar(6) DEFAULT NULL,
  `valor_cob_caucionada_lote` decimal(13,2) DEFAULT NULL,
  `quant_cob_descontada_lote` varchar(6) DEFAULT NULL,
  `valor_cob_descontada_lote` decimal(13,2) DEFAULT NULL,
  `id_arquivo` int(11) NOT NULL,
  PRIMARY KEY (`id_lote`),
  KEY `fk_arquivo_lote` (`id_arquivo`),
  CONSTRAINT `fk_arquivo_lote` FOREIGN KEY (`id_arquivo`) REFERENCES `arquivo` (`id_arquivo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lote
-- ----------------------------

-- ----------------------------
-- Table structure for `pagamento`
-- ----------------------------
DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pagamento` enum('Dinheiro','Boleto','Cartão','Cheque') NOT NULL DEFAULT 'Boleto',
  `condicao_pagamento` enum('À Vista','Parcelado Cartão','Parcelado Cheque','Parcelado Boleto') NOT NULL,
  `dt_inicio_pagamento` date NOT NULL,
  `quant_parcelas_pagamento` tinyint(2) NOT NULL,
  `valor_bruto_pagamento` decimal(13,2) NOT NULL,
  `valor_taxas_pagamento` decimal(13,2) NOT NULL,
  `valor_liquido_pagamento` decimal(13,2) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `fk_pagamento_contrato` (`id_contrato`),
  CONSTRAINT `fk_pagamento_contrato` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pagamento
-- ----------------------------

-- ----------------------------
-- Table structure for `passageiro`
-- ----------------------------
DROP TABLE IF EXISTS `passageiro`;
CREATE TABLE `passageiro` (
  `id_passageiro` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `menor_passageiro` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_passageiro`),
  KEY `fk_passageiro_contrato` (`id_contrato`),
  CONSTRAINT `fk_cliente_passageiro` FOREIGN KEY (`id_passageiro`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  CONSTRAINT `fk_passageiro_contrato` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of passageiro
-- ----------------------------

-- ----------------------------
-- Table structure for `produto`
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
-- Table structure for `produto_controle`
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
-- Table structure for `produto_observacoes`
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
-- Table structure for `produto_pacotes`
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
-- Table structure for `produto_valores`
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
-- Table structure for `taxa`
-- ----------------------------
DROP TABLE IF EXISTS `taxa`;
CREATE TABLE `taxa` (
  `id_taxa` int(11) NOT NULL AUTO_INCREMENT,
  `id_pagamento` int(11) NOT NULL,
  `natureza_taxa` set('30','23','22','21','10') NOT NULL COMMENT '10 = Mora/Juros\r\n21 = Desconto 1\r\n22 = Desconto 2\r\n23 = Desconto 3\r\n30 = Multa',
  `cod_taxa` set('2','1') NOT NULL COMMENT '1  =  Valor Fixo Até a Data Informada\n 2  =  Percentual Até a Data Informada',
  `dt_aplica_taxa` date NOT NULL,
  `multiplicador_taxa` decimal(5,3) DEFAULT NULL,
  `valor_taxa` decimal(13,2) DEFAULT NULL,
  `descricao_taxa` varchar(40) NOT NULL,
  PRIMARY KEY (`id_taxa`),
  KEY `fk_taxa_pagamento` (`id_pagamento`),
  CONSTRAINT `fk_taxa_pagamento` FOREIGN KEY (`id_pagamento`) REFERENCES `pagamento` (`id_pagamento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taxa
-- ----------------------------

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
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
