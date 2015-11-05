<?php
session_start();
					$arru=$_SESSION['IDUsuario'];
					$total=0;
					$numero=0;
					for($i=0;$i<count($arru);$i++){
						if($arru[$i]['Id']==$_POST['Id']){
							$numero=$i;
						}
					}
					$arru[$numero]['Cantidad']=$_POST['Cantidad'];
					for($i=0;$i<count($arru);$i++){
						$total=($arru[$i]['Precio']*$arru[$i]['Cantidad'])+$total;
					}
					$_SESSION['IDUsuario']=$arru;
					echo $total;

?>