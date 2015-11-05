<?php
session_start();
require '../conexion.php';
$arra=$_SESSION['IDUsuario'];
$numeroVenta=0;
$re=mysql_query("SELECT idCompra,numeroVenta,Producto,imagen,Precio,Cantidad,Subtotal FROM Compras ORDER BY numeroVenta DESC LIMIT 1") or die(mysql_error());
while($f=mysql_fetch_array($re)){
$numeroVenta=$f['numeroVenta'];
}
if($numeroVenta==0){
$numeroVenta=1;
}
else{
$numeroVenta=$numeroVenta+1;
}
for($i=0;$i<count($arra);$i++){
mysql_query("INSERT INTO Compras (numeroVenta,Producto,imagen,Precio,Cantidad,Subtotal) VALUES (
".$numeroVenta.",
'".$arra[$i]['Nombre']."',
'".$arra[$i]['Imagen']."',
'".$arra[$i]['Precio']."',
'".$arra[$i]['Cantidad']."',
'".$arra[$i]['Precio']*$arra[$i]['Cantidad']."'
)")or die(mysql_error());

}

?>
