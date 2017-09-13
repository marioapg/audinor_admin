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

$nombre= $_POST["nombre"];
$sede= $_POST["sede"];
$direccion= $_POST["direccion"];
$codpostal= $_POST["codpostal"];
$municipio= $_POST["municipio"];
$provincia= $_POST["provincia"];
$telefono= $_POST["telefono"];
$email= $_POST["email"];
$publicidad= $_POST["publicidad"];
$dni= $_POST["dni"];
$fechanacimiento= $_POST["fechanacimiento"];
$profesion= $_POST["profesion"];
$procedencia= $_POST["procedencia"];
$observaciones= $_POST["observaciones"];
$acompanante= $_POST["acompanante"];


	$consulta = "SELECT observaciones FROM cliente WHERE clave=".$_POST['idcliente']." AND sede='".$_POST['sedeori']."'";
	$resultado1 = mysql_query($consulta) or die("Error consultando");
	$row = mysql_fetch_array($resultado1);
	$observaciones = $row['observaciones']."-----".$observaciones;

	$query = "UPDATE cliente SET sede='".$sede."',full_name='".$nombre."',direccion='".$direccion."',codigo_postal=".$codpostal.",municipio='".$municipio."',provincia='".$provincia."',telefono='".$telefono."',email='".$email."',publicidad=".$publicidad.",dni='".$dni."',fecha_nacimiento='".$fechanacimiento."',profesion='".$profesion."',procedencia='".$procedencia."',observaciones='".$observaciones."',acompanante='".$acompanante."' WHERE clave=".$_POST['idcliente']." AND sede='".$_POST['sedeori']."' ";
	
	$resultado = mysql_query($query) or die("Error actualizando cliente");
	if(!is_null($resultado)){
		?>
		<script>changePage("clientes.php", "Cliente Actualizado");</script>
	<?php
		}else{
			?>
		<script>changePage("clientes.php", "ERROR Actualizando Perfil, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>