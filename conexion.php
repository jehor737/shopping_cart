<?php
$server="localhost";
$username="jehor737";
$password="escorpion*10";
$db='Shopping_cart';
$con=mysql_connect($server,$username,$password)or die("No se ha podido establecer la conexion");
$sdb=mysql_select_db($db,$con)or die("La base de datos no existe");
mysql_set_charset('utf8');
?>
