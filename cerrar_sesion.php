<?php
require_once("includes/seguridad.php");
require_once("includes/security_token.php");
session_unset();
session_destroy();
header("Location: index.php");
?>