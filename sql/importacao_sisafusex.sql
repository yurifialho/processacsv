DROP TABLE IF EXISTS `importacao_csv`;
CREATE TABLE `importacao_csv` (
  `preccp` varchar(45) DEFAULT NULL,
  `seq_fam` varchar(45) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `data_nascimento` varchar(45) DEFAULT NULL,
  `cond_dep` varchar(45) DEFAULT NULL,
  `bi` varchar(45) DEFAULT NULL,
  `ua_vinc` varchar(45) DEFAULT NULL,
  `sigla_ua` varchar(45) DEFAULT NULL,
  `rm` varchar(45) DEFAULT NULL,
  `dt_incl` varchar(45) DEFAULT NULL,
  `dt_val` varchar(45) DEFAULT NULL
) 
