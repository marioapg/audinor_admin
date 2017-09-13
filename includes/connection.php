<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'pbwhlugc', 'dahubuqa')
or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
$conexion = mysql_select_db('pbwhlugc_audinordb') or die('No se pudo seleccionar la base de datos');
?>