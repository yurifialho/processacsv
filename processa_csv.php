<!DOCTYPE html>
<html>
<head>
	<title>Processa Arquivo</title>
</head>
<body>
<?php

require_once("Progresso.php");
require_once('ProcessaCsv.php');

	echo 'Processa arquivos. => ' . $_GET['nome_arquivo'] . "</br/>";

    $arquivo = $_GET['nome_arquivo'];
    
    $p = new ProcessaCsv();
    
    $retorno = $p->gravar(Progresso::$diretorio. $arquivo);
    if($retorno) {
        foreach ($retorno as &$value) {
            echo 'Linha:'.$value['linha'].'-Coluna:'.$value['coluna']."Valor:".$value['valor'] ; 
            echo "<br/>";
        }
    }
?>
</body>
</html>