<?php
	require "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./Principal.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./images/logo.jpg" id="logo">
		<a href="./compras.php" title="Ver carrito de compras">
			<img src="./images/carrito.png">
		</a>
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="./">Inicio</a></li>
	    <li><a href="#" class="selected">Admin</a></li>
	    <li><a href="./user/agregarproducto.php" >Agregar</a></li>
	    <li><a href="./modificar.php" class="selected">Modificar</a></li>
	    <li><a href="#">Salir</a></li>
	  </menu>
	</nav>

	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</tr>	

		<?php
			$re=mysql_query("SELECT idCompra,numeroVenta,Producto,imagen,Precio,Cantidad,Subtotal FROM Compras");
			$numeroventa=0;
			while ($f=mysql_fetch_array($re)) {
					if($numeroventa	!=$f['numeroVenta']){
						echo '<tr><td>Compra Número: '.$f['numeroVenta'].' </td></tr>';
					}
					$numeroventa=$f['numeroVenta'];
					echo '<tr>
						<td><img src="./images/'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['Producto'].'</td>
						<td>'.$f['Precio'].'</td>
						<td>'.$f['Cantidad'].'</td>
						<td>'.$f['Subtotal'].'</td>

					</tr>';
			}
		?>
</table>
</section>
</body>
</html>
