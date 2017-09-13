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
	$consulta = "SELECT password FROM usertbl WHERE id='".$_GET['id']."'";
	$result = mysql_query($consulta) or die("ERROR consultando PASSWORD");
	$row = mysql_fetch_array($result);
	
	$query = "";
	$nombre = $_POST['nombre'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if($row['password'] == $password){
		$query = "UPDATE usertbl SET full_name='".$nombre."',email='".$email."',username='".$username."' WHERE id='".$_GET['id']."'";
	}else{
		$query = "UPDATE usertbl SET full_name='".$nombre."',email='".$email."',username='".$username."',password=MD5('".$password."'),metodo='md5' WHERE id='".$_GET['id']."'";
	}
	/*   FOR TESTING PURPOSE
	echo "BD PASS= ".$row['password']."<br>";        
	echo "USER PASS".$password."<br>";
	echo $query."<br>";
	*/
	$resultado = mysql_query($query) or die("ERROR Actualizando datos cliente");
	if(!is_null($resultado)){
		?>
		<script>changePage("modificar-perfil.php", "Perfil Actualizado");</script>
	<?php
		}else{
			?>
		<script>changePage("modificar-perfil.php", "ERROR Actualizando Perfil, intente mas tarde o vuelva a cargar los datos");</script>
		<?php	
		}
	?>
</body>
</html>