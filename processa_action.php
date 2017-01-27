<!DOCTYPE html>
<html>
<head>
	<title>Processa Arquivo</title>
</head>
<body>
<?php 
	#pasta onde será armazenado o arquivo
	$uploaddir  = '/var/www/processacsv/arquivos_tmp/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Arquivo gravado com sucesso!";
	} else {
		echo "Erro!";
	}

	
	header('Location: processa_csv.php?nome_arquivo='.$_FILES['userfile']['name']);
?>
</body>
</html>