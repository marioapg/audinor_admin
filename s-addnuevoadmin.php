<?php 
include("includes/seguridad.php");
include("includes/security_token.php");
require_once("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script>
		function changePage(whereToGo, messageText)
		{
			alert(messageText);
			window.location=whereToGo;
		}
	</script>
</head>
<body>
	<?php 
	$nombreadmin = $_POST['nombreadmin'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$emailadmin = $_POST['emailadmin'];
	
	$query = "INSERT INTO usertbl(full_name,email,username,password,metodo) VALUES ('".$nombreadmin."','".$emailadmin."','".$username."',MD5('".$pass."'),'md5')";
	$resultado = mysql_query($query) or die("ERROR AGREGANDO ADMINISTRAOR");
	if(!is_null($resultado)){
		?>
		<script>changePage("dashboard.php", "Registro agregado de manera exitosa");</script>
	<?php
		}else{
			?>
		<script>changePage("dashboard.php", "ERROR agregando ADMINISTRAOR, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>