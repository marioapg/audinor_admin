<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('host', 'user', 'pass')
or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
$conexion = mysql_select_db('db') or die('No se pudo seleccionar la base de datos');
?>
