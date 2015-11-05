<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<title>Productos</title>
<link rel="stylesheet" href="Principal.css">
<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
<header>
<h1>Productos</h1>
<img src="./images/logo.jpg" id="logo">
<a href="index.php"title="Inicio">
<img src="./images/inicio.png"  WIDTH=178 HEIGHT=180>
</a> <br><br><br><br><br><br><br><br><br><br>
<a href="./compras.php" title="Ver Carrito de compras">
<img src="./images/carrito.png">
</a>
</header>
<section>
<center>
<ul>
<li>
<?php
require 'conexion.php';
$re=mysql_query("SELECT idProductos,Producto,Descripcion,imagen,Precio FROM Productos") or die(mysql_error());
while ($f=mysql_fetch_array($re)) {
?>
<img src="./images/<?php echo $f['imagen'];?>"><br>
<div class="producto">
<span><?php echo $f['Producto'];?></span><br>
<span>Precio: $<?php echo $f['Precio'];?></span><br>
<span><?php echo $f['Descripcion'];?></span><br>
<a href="./compras.php?idProductos=<?php echo $f['idProductos'];?>">Añadir al carrito de compras</a>
</div>
<?php
}
?>

</li>
</ul>
</center>		
</section>
</body>
</html>
