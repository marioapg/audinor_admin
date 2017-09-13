<?php 
include("includes/seguridad.php");
include("includes/security_token.php");
require_once("includes/connection.php");

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

	$queryy = "SELECT MAX(clave) from cliente";
	$resultadoo = mysql_query($queryy);
	$roww = mysql_fetch_array($resultadoo);
	$maxvalue = $roww['0'];
	$maxvalue = 1 + $maxvalue;

	$actualuno= $_POST["audifonouno"];
	$actualdos= $_POST["audifonodos"];
	$flag='N';
	if($actualuno != 'ninguno' ){
		if($actualdos !='ninguno'){
			$tipoadaptacion = 'BINAURAL';
		//echo "eligio adaptacion BINAURAL <br>";    //for debug purpose
		}else{
			$tipoadaptacion = 'MONOAURAL';
			$flag = 'D';
		//echo "eligio adaptacion DERECHO <br>"; 	//for debug purpose
		}
	}else{
		if($actualdos !='ninguno'){
			$tipoadaptacion = 'MONOAURAL';
			$flag = 'I';
		//echo "eligio el IZQUIERDO <br>";		//for debug purpose
		}else{
			$tipoadaptacion = 'NINGUNO';
		//echo "NO ELIGIO NADA <br>";			//for debug purpose
		}
	}

	$query = "INSERT INTO cliente (clave,registro,sede,full_name,direccion,codigo_postal,municipio,provincia,telefono,email,publicidad,dni,fecha_nacimiento,profesion,procedencia,observaciones,tipo_adaptacion,acompanante) 
	VALUES (".$maxvalue.",5000,'".$sede."','".$nombre."','".$direccion."','".$codpostal."','".$municipio."','".$provincia."','".$telefono."','".$email."',".$publicidad.",'".$dni."','".$fechanacimiento."','".$profesion."','".$procedencia."','".$observaciones."','".$tipoadaptacion."','".$acompanante."')";
	//echo $query;		//for debug purpose

	$fechadehoy = date("Y-m-d");
	$queri = '';
	$querii = '';
	if($tipoadaptacion == 'BINAURAL'){
		$queri = "INSERT INTO relacionca (registro,audifono,serie,fecha_compra,garantia,pila,precio,lado) VALUES ('".$maxvalue."','".$actualuno."','".$_POST['serieuno']."','".$fechadehoy."','".$_POST['garantiauno']."','".$_POST['pilauno']."','".$_POST['preciouno']."','D')";
//echo "<br>";		//for debug purpose
//echo $queri."<br>";		//for debug purpose

		$querii = "INSERT INTO relacionca (registro,audifono,serie,fecha_compra,garantia,pila,precio,lado) VALUES ('".$maxvalue."','".$actualdos."','".$_POST['seriedos']."','".$fechadehoy."','".$_POST['garantiados']."','".$_POST['pilados']."','".$_POST['preciodos']."','I')";
//echo "<br>";  			//for debug purpose
//echo $querii."<br>";		//for debug purpose
	}else{
		if($flag == 'D'){
			$queri = "INSERT INTO relacionca (registro,audifono,serie,fecha_compra,garantia,pila,precio,lado) VALUES ('".$maxvalue."','".$actualuno."','".$_POST['serieuno']."','".$fechadehoy."','".$_POST['garantiauno']."','".$_POST['pilauno']."','".$_POST['preciouno']."','D')";
//echo "<br>";		//for debug purpose
//echo $queri."<br>";		//for debug purpose
		}else{
			if($flag == 'I'){
				$querii = "INSERT INTO relacionca (registro,audifono,serie,fecha_compra,garantia,pila,precio,lado) VALUES ('".$maxvalue."','".$actualdos."','".$_POST['seriedos']."','".$fechadehoy."','".$_POST['garantiados']."','".$_POST['pilados']."','".$_POST['preciodos']."','I')";
//echo "<br>";		//for debug purpose
//echo $querii."<br>";		//for debug purpose
			}
		}
	}
	//echo $query."<br>";
	//echo $queri."<br>";
	//echo $querii."<br>";
	if($flag!='N'){
		echo $flag;
		if($tipoadaptacion == 'BINAURAL'){
			$resultado = mysql_query($query) or die("ERROR");
			$resultado1 = mysql_query($queri) or die("ERROR AGREGANDO RELACION CLIENTE AUDIFONO");
			$resultado2 = mysql_query($querii) or die("ERROR AGREGANDO RELACION CLIENTE AUDIFONO");
			if ((!is_null($resultado)) && (!is_null($resultado1)) && (!is_null($resultado2))){
				?>
				<script>changePage("dashboard.php", "Registro agregado de manera exitosa");</script>
				<?php
			}else{
				?>
				<script>changePage("#", "Hubo un ERROR agregando el registro, ingrese nuevamente los datos o intente más tarde"); window.history.back(-1);</script>
				<?php
			}
		}else{
			if($flag == 'D'){
				$resultado = mysql_query($query) or die("ERROR");
				$resultado1 = mysql_query($queri) or die("ERROR AGREGANDO RELACION CLIENTE AUDIFONO");
				if ((!is_null($resultado)) && (!is_null($resultado1))){
					?>
					<script>changePage("dashboard.php", "Registro agregado de manera exitosa");</script>
					<?php
				}else{
					?>
					<script>changePage("#", "Hubo un ERROR agregando el registro, ingrese nuevamente los datos o intente más tarde"); window.history.back(-1);</script>
					<?php
				}
			}else{
				if($flag == 'I'){
					$resultado = mysql_query($query) or die("ERROR");
					$resultado2 = mysql_query($querii) or die("ERROR AGREGANDO RELACION CLIENTE AUDIFONO");
					if ((!is_null($resultado)) && (!is_null($resultado2))){
						?>
						<script>changePage("dashboard.php", "Registro agregado de manera exitosa");</script>
						<?php
					}else{
						?>
						<script>changePage("#", "Hubo un ERROR agregando el registro, ingrese nuevamente los datos o intente más tarde"); window.history.back(-1);</script>
						<?php
					}
				}
			}
		}
	}else{
		$resultado = mysql_query($query) or die("ERROR");
		if (!is_null($resultado)){
				?>
				<script>changePage("dashboard.php", "Registro agregado de manera exitosa");</script>
				<?php
			}else{
				?>
				<script>changePage("#", "Hubo un ERROR agregando el registro, ingrese nuevamente los datos o intente más tarde"); window.history.back(-1);</script>
				<?php
			}
	}
	?>
</body>
</html>