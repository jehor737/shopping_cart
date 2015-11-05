<?php
$server="localhost";
$username="jehor737";
$password="escorpion10";
$db='BreakingJava';
$con=mysql_connect($server,$username,$password)or die("No se ha podido establecer la conexion");
$sdb=mysql_select_db($db,$con)or die("La base de datos no existe");

?>
