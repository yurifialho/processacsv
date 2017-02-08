<?php 
require_once('Progresso.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

$progresso = Progresso::getInstance();

echo "PROCESSANDO LINHAS: ".$progresso->getProgress();

?>