<?php
	session_start();
	include "./conexion.php";
	if(isset($_SESSION['IDUsuario'])){
	}else{
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./js/modificar.js"></script>
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
				<li><a href="./admin.php">Ultimas Compras</a></li>
	    		<li><a href="./user/agregarproducto.php" >Agregar</a></li>
	    		<li><a href="./modificar.php" class="selected">Modificar</a></li>
	    		<li><a href="./login/cerrar.php">Salir</a></li>
			</menu>
		</nav>
		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<table width="100%">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
		<?php 
			$resultado=mysql_query("SELECT idProductos, Producto, Descripcion, imagen, Precio FROM Productos");
			while($row=mysql_fetch_array($resultado)){
				echo '
				<tr>
					<td>
						<input type="hidden" value="'.$row[0].'">'.$row[0].'
						<input type="hidden" class="imagen" value="'.$row[3].'">
					</td>
					<td><input type="text" class="nombre" value="'.$row[1].'"></td>
					<td><input type="text" class="descripcion" value="'.$row[2].'"></td>
					<td><input type="text" class="precio" value="'.$row[4].'"></td>
					<td><button class="eliminar" data-id="'.$row[0].'">Eliminar</button></td>
					<td><button class="modificar" data-id="'.$row[0].'">Modificar</button></td>
				</tr>
				';
			}
		?>
	</table>
	</section>
</body>
</html>