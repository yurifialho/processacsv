<!DOCTYPE html>
<html>
<head>
	<title>Processa Arquivo</title>
</head>
<body>
<?php 
include_once "ProcessaCsv.php";

	echo 'Processa arquivos. => ' . $_GET['nome_arquivo'] . "</br/>";

?>
	<textarea rows="30%" cols="90%">
<?php
	$arquivo = $_GET['nome_arquivo'];

    $p = new ProcessaCsv();
    $retorno = $p->validarGravar('arquivos_tmp/'. $arquivo);
    if($retorno) {
    	foreach ($retorno as &$value) {
    		echo 'Linha:'.$value['linha'].'-Coluna:'.$value['coluna']."Valor:".$value['valor'] ; 
    		echo "\n";
    	}
    }
?>
</textarea><br/>
</body>
</html>