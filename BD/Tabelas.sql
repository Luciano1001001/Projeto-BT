/*
Navicat MySQL Data Transfer

Source Server         : Marlon
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : projeto_brasiltur

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-10-06 11:37:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
`id_cliente`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_cliente`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cpf_cliente`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`rg_cliente`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`dtnascimento_cliente`  date NOT NULL ,
`endereco_cliente`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cidade_cliente`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estado_cliente`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cep_cliente`  varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`email_cliente`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`telfixo_cliente`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`celular_cliente`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`dtcadastro_cliente`  date NOT NULL ,
PRIMARY KEY (`id_cliente`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of cliente
-- ----------------------------
BEGIN;
INSERT INTO `cliente` VALUES ('1', 'Marlon Paranhos', '097.641.231.64', '15151515', '2012-12-11', 'Rua do Fogo, Centro', 'Diamantina', 'MG', '39100-000', 'marlonparanhos@gmail.com', '(38) 3531-3531', '(38) 9-9999-9999', '2016-08-17'), ('2', 'Oliver Bowden', '222.222.222.22', '12583548', '1980-05-20', 'Rua do Bicame, Bicame', 'Diamantina', 'MG', '39100-000', 'oliverbowden@hotmail.com', '(38) 3531-4321', '(38) 9-8888-8777', '2016-08-17'), ('3', 'Dante', '189.458.458.34', '1584228', '2000-01-10', 'Rad dsfa', 'Diamantina', 'MG', '39100-000', 'dante@dante.com', '(38) 3526-1159', '(38) 9-9918-0810', '2016-09-27');
COMMIT;

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
`id_produto`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_produto`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`info_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`periodo_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`transporte_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`hospedagem_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`alimentacao_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estrutura_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_produto`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of produto
-- ----------------------------
BEGIN;
INSERT INTO `produto` VALUES ('1', 'Caldas Novas', 'Pacote referente à Carbonita-MG.', '23/07/2016 à 29/07/2016', 'Em ônibus LEITO (Dois Andares), Serviço de Bordo e Seguro Viagem.', 'Hotel L´cáqua Diroma, sendo 5 dias e 4 noites, o hotel possui uma área de Lazer completa com 11 piscinas, Mini parque, Sala de Ginástica, Espaço Kids, 06 Ofurôs e Segurança 24 hs.', '04 Cafés da Manhã / 04 Almoços com bebidas inclusas (Sucos, Refrigerante e Água) e sobremesas à vontade!', '- Estrutura de Monitores da BrasilTur acompanhando o grupo em todas as atividades.\n- Controle de acesso com pulseiras personalizadas.\n- Seguro-Viagem com: Assistência Médica, Odontológica e Farmacêutica / Kit primeiros socorros.');
COMMIT;

-- ----------------------------
-- Table structure for produto_pacotes
-- ----------------------------
DROP TABLE IF EXISTS `produto_pacotes`;
CREATE TABLE `produto_pacotes` (
`id_produto_pacotes`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_pacote`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descricao_pacote`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_produto_pacotes`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of produto_pacotes
-- ----------------------------
BEGIN;
INSERT INTO `produto_pacotes` VALUES ('1', 'Translado', 'Para o centro de Caldas Novas.');
COMMIT;

-- ----------------------------
-- Table structure for produto_valores
-- ----------------------------
DROP TABLE IF EXISTS `produto_valores`;
CREATE TABLE `produto_valores` (
`id_produto_valores`  int(11) NOT NULL AUTO_INCREMENT ,
`valor_produto`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`tipo_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`grupo_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`observacoes_produto`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`info_pagamento`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_produto_valores`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of produto_valores
-- ----------------------------
BEGIN;
INSERT INTO `produto_valores` VALUES ('1', '1090,00', 'Apto Duplo.', 'Por pessoa', 'Criança: 0 à 5 anos: Free (Criança de Colo)\nCriança: 06 à 08 anos: 60% do valor do Apto Duplo.', 'Somente no Boleto');
COMMIT;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
`id_usuario`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_usuario`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`email_usuario`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`senha_usuario`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`telfixo_usuario`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`celular_usuario`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`nivel_usuario`  varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_usuario`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES ('1', 'Marlon', 'marlon@gmail.com', 'marlon', '(11) 1111-1111', '(11) 1-1111-1111', 'user'), ('2', 'Admin do Sistema', 'admin@admin.com', 'admin', '(38) 3531-1234', '(38) 9-1234-5678', 'admin'), ('3', 'Teste', 'teste@teste.com', 'teste', '(38) 3838-3838', '(99) 9-9999-9999', 'user');
COMMIT;

-- ----------------------------
-- Auto increment value for cliente
-- ----------------------------
ALTER TABLE `cliente` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for produto
-- ----------------------------
ALTER TABLE `produto` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for produto_pacotes
-- ----------------------------
ALTER TABLE `produto_pacotes` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for produto_valores
-- ----------------------------
ALTER TABLE `produto_valores` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for usuario
-- ----------------------------
ALTER TABLE `usuario` AUTO_INCREMENT=4;
