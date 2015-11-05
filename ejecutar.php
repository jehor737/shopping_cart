<?php 
	require "./conexion.php";
	if($_POST['Caso']=="Eliminar"){
		mysql_query("DELETE FROM Productos WHERE idProductos=".$_POST['Id']);
		unlink("./images/".$_POST['Imagen']);
		echo 'El producto se ha eliminado';
	}
	if($_POST['Caso']=="Modificar"){
		mysql_query("UPDATE Productos SET Nombre='".$_POST['Nombre']."' WHERE idProductos=".$_POST['Id']);
		mysql_query("UPDATE Productos SET Descripcion='".$_POST['Descripcion']."' WHERE idProductos=".$_POST['Id']);
		mysql_query("UPDATE Productos SET Precio='".$_POST['Precio']."' WHERE idProductos=".$_POST['Id']);
		echo 'El producto se ha modificado';
	}

?>