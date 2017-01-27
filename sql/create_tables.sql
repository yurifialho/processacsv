DROP TABLE IF EXISTS `controle_csv`;
CREATE TABLE `controle_csv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_arquivo` varchar(45) NOT NULL,
  `data_importacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;
DROP TABLE IF EXISTS `importacao_csv`;
CREATE TABLE `importacao_csv` (
  `nr` varchar(45) DEFAULT NULL,
  `cat` varchar(45) DEFAULT NULL,
  `preccp` varchar(45) DEFAULT NULL,
  `grad` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `agencia` varchar(45) DEFAULT NULL,
  `conta` varchar(45) DEFAULT NULL,
  `receita` varchar(45) DEFAULT NULL,
  `desconto` varchar(45) DEFAULT NULL,
  `liquido` varchar(45) DEFAULT NULL,
  `sitpag` varchar(45) DEFAULT NULL
);

