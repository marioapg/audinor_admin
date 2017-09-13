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
			//alert(messageText);
			window.location=whereToGo;
		}
	</script>
</head>
<body>
	<?php 
	$id = $_GET['id'];
	$consulta = "SELECT activo FROM audifonos WHERE id='".$id."';";
	$resultado1 = mysql_query($consulta) or die("ERRO SELECCIONANDO");
	$row = mysql_fetch_array($resultado1);

	$query = "";
	if($row['activo'] == 1){
		$query = "UPDATE audifonos SET activo=0 WHERE id='".$id."';";
	}elseif ($row['activo'] == 0) {
		$query = "UPDATE audifonos SET activo=1 WHERE id='".$id."';";	
	}

	$resultado = mysql_query($query) or die("ERROR Actualizando Audifono");
	if(!is_null($resultado)){
		?>
		<script>changePage("audifonos.php", "Audifono actualizado de manera exitosa");</script>
	<?php
		}else{
			?>
		<script>changePage("audifonos.php", "ERROR Actualizando Audifono, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>