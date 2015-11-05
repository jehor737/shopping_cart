<?php
//este archivo es para nosotros como administradores
	require ("../conexion.php");
	if(!isset($_POST['Nombre']) &&  !isset($_POST['Descripcion']) && !isset($_POST['Precio'])){
		header("Location: agregarproducto.php");
	}else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$imagen="";
			$random=rand(1,999999);
			if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))){
			
		  	if ($_FILES["file"]["error"] > 0){
		  	
		    	echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
		    }else{
		    

		    	$imagen= $random.'_'.$_FILES["file"]["name"];
		    	if(file_exists("../images/".$random.'_'.$_FILES["file"]["name"])){
		      		echo $_FILES["file"]["name"] . " Ya existe. ";
		      	}
		      	else{
		      		move_uploaded_file($_FILES["file"]["tmp_name"],
		      		"../images/" .$random.'_'.$_FILES["file"]["name"]);
		      		echo "Archivo guardado en " . "../images/" .$random.'_'. $_FILES["file"]["name"];
		      		$producto=$_POST['Nombre'];
					$descripcion=$_POST['Descripcion'];
					$precio=$_POST['Precio'];
					mysql_query("INSERT INTO Productos (Producto, Descripcion, imagen, Precio) VALUES(
							'".$producto."',
							'".$descripcion."',
							'".$imagen."',
							'".$precio."')");
					header ("Location: agregarproducto.php");
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>
