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

$marca= $_POST["marca"];
$modelo= $_POST["modelo"];
$activo= $_POST["activo"];
$id= $_POST["id"];

	$query = "UPDATE audifonos SET marca='".$marca."',modelo='".$modelo."',activo='".$activo."' WHERE id=".$id." ";
	
	$resultado = mysql_query($query) or die("Error actualizando cliente");
	if(!is_null($resultado)){
		?>
		<script>changePage("audifonos.php", "Cliente Actualizado");</script>
	<?php
		}else{
			?>
		<script>changePage("audifonos.php", "ERROR Actualizando Perfil, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>