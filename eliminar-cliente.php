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
	$id = $_GET['id'];
	$sede = $_GET['sede'];		
	$query = "DELETE FROM cliente WHERE clave='".$id."' AND sede='".$sede."';";
	$resultado = mysql_query($query) or die("ERROR Eliminando Cliente");
	if(!is_null($resultado)){
		?>
		<script>changePage("clientes.php", "Registro eliminado de manera exitosa");</script>
	<?php
		}else{
			?>
		<script>changePage("clientes.php", "ERROR Eliminando Cliente, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>