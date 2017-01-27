<!DOCTYPE html>
<html>
<head>
	<title>Processa Arquivo</title>
</head>
<body>
<div id="preloader" style="display: none; position: fixed; left: 0; top: 0; z-index: 999; width: 100%; 
	height: 100%; overflow: visible; 
	background: #232323 url('img/preloader.gif') no-repeat center center; opacity: 0.7; "></div>
<form action="processa_action.php" enctype="multipart/form-data" method="POST" onsubmit='document.getElementById("preloader").style.display = "";'>
	Arquivo: <input name="userfile" type="file" />
	<input type="submit" value="Enviar" />
</form>
</body>
</html>