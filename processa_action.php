<!DOCTYPE html>
<html>
<head>
	<title>Processa Arquivo</title>
</head>
<body>
<?php 
	#pasta onde será armazenado o arquivo
	$uploaddir  = '/tmp/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Arquivo gravado com sucesso!";
		header('Location: processa_csv.php?nome_arquivo='.$_FILES['userfile']['name']);
	} else {
		echo "Erro! CODIGO=". $_FILES['userfile']['error'];
	}
?>
</body>
</html>