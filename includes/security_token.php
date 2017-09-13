<?php 
//session_start();
//aqui se debe de conectar a la base de datos y todo
//la función para validar la sesion sería algo asi:
function CheckNivel() {
  if(!empty($_SESSION['session_username']) && !empty($_SESSION['token'])) {
      //quitamos el posible SQLInjection del user y password

    echo $_SESSION['token'];
  $_SESSION['session_username'] = mysql_real_escape_string($_SESSION['session_username']);
  $_SESSION['token'] = mysql_real_escape_string($_SESSION['token']);

echo "<br>".$_SESSION['token'];

      //checamos que exista
  $query = mysql_query("SELECT * FROM usertbl ".
    "WHERE username = '{$_SESSION['session_username']}' AND ".
    "token = '{$_SESSION['token']}' ");

  if(mysql_num_rows($query) == 1) {
           //volvemos a calcular un token
   $_SESSION['token'] = md5(rand().$_SESSION['session_username']);
   mysql_query("UPDATE usertbl SET ".
     "token = '{$_SESSION['token']}' WHERE ".
     "username = '{$_SESSION['session_username']}' ");
 } else {
   session_destroy();
   header("Location:index.php");
   exit;
 }
 mysql_free_result($query);
}
}
?>
