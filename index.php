<!DOCTYPE html>
<html>
<head>
<?php 
	session_start();
?>

	<title>Processa Arquivo</title>
	<script src="js/jquery-3.1.1.min.js"></script>

	
	<script type="text/javascript">
		var request = {
            checkStatus: function () {
                $.ajax({
                    type: 'GET',
                    url: 'status.php',
                    success: function (data) {
                    	request.setStatus(data);
                    }
                });
            },
            setStatus: function (status) {
                $('#dados').html(status);
            },
            _interval: null,
            clearInterval: function () {
                clearInterval(request._interval);
            }
        };

        function processar() {
        	document.getElementById("preloader").style.display = "";
        	request._interval = setInterval(request.checkStatus, 1000);
        }
         
	</script>
</head>
<body>
<div id="preloader" style="display: none; position: fixed; left: 0; top: 0; z-index: 999; width: 100%; 
	height: 100%; overflow: visible; align-items: center; align-content: center;
	background: #232323 url('img/preloader.gif') no-repeat center center; opacity: 0.7;">
	<center style="background-color: white;width: 100% "><span id="dados">INICIANDO...</span></center></div>
<form action="processa_action.php" enctype="multipart/form-data" method="POST" onsubmit='processar();'>
	Arquivo: <input name="userfile" type="file" />
	<input type="submit" value="Enviar" />
</form>
</body>
</html>