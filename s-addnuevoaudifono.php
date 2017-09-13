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
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	echo $marca."-".$modelo."<br>";
	$query = "INSERT INTO audifonos(marca,modelo,activo) VALUES ('".$marca."','".$modelo."','1')";
	$resultado = mysql_query($query) or die("ERROR AGREGANDO AUDIFONO");
	if(!is_null($resultado)){
		?>
		<script>changePage("dashboard.php", "Registro agregado de manera exitosa");</script>
	<?php
		}else{
			?>
		<script>changePage("dashboard.php", "ERROR agregando Audifono, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>