	<?php
			require_once("includes/connection.php");
			session_start();
			if(isset($_SESSION["session_username"])){
			// echo "Session is set"; // for testing purposes
			header("Location: dashboard.php");
		}

		if(isset($_POST["login"])){

			if(!empty($_POST['username']) && !empty($_POST['password'])) {
				//Quitamos posible SQLInjection
				$_POST['username'] = mysql_real_escape_string($_POST['username']);
				$_POST['password'] = md5(mysql_real_escape_string($_POST['password']));

				$username=$_POST['username'];
				$password=$_POST['password'];

				$query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password=('".$password."')");
				
				$numrows=mysql_num_rows($query);
				if($numrows!=0)
				{
					while($row=mysql_fetch_assoc($query))
					{
						$dbusername=$row['username'];
						$dbpassword=$row['password'];
					}

					if($username == $dbusername && $password == $dbpassword)
					{

						$_SESSION['session_username']=$username;
						echo $_SESSION['session_username'];
						//generamos un token aleatorio para el usuario
						$_SESSION['token'] = md5(rand().$_SESSION['session_username']);

           //actualizamos el token para qu sean iguales el de la db
           //y el de la sesión
						mysql_query("UPDATE usertbl SET ".
							"token = '{$_SESSION['token']}' WHERE ".
							"username = '{$_SESSION['session_username']}' ");

						/* Redireccion de inicio de sesion */
						header("Location: dashboard.php");
					}
				} else {
					session_destroy();
					$message = "Nombre de usuario ó contraseña invalida!";
				}

			} else {
				session_destroy();
				$message = "Todos los campos son requeridos!";
			}
		}
		?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Audinor</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
		<section class="main row">
		<div class="container col-md-4"></div>
		<div class="container mlogin col-md-4">
			<div id="login">
				<h2>Inicio de Sesión Audinor 1.0</h2>
				<form name="loginform" id="loginform" action="" method="POST">
					<p>
						<label for="user_login">Nombre De Usuario<br />
							<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
						</p>
						<p>
							<label for="user_pass">Contraseña<br />
								<input type="password" name="password" id="password" class="input" value="" size="20" /></label>
							</p>
							<p class="submit">
								<input type="submit" name="login" class="btn btn-primary" value="Entrar" />
							</p>
							<!-- <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p> -->
						</form>
					</div>
				</div>
			<div class="container col-md-4"></div>
				</section>

				<?//php include("includes/footer.php"); ?>

				<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

					<script type="text/javascript" src="js/jquery.js"></script>
					<script type="text/javascript" src="js/bootstrap.min.js"></script>
				</body>
				</html>