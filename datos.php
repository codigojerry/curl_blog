<?php

#json
$json_users=' [{"id":"01","nombre":"John","edad":"26"},
				{"id":"02","nombre":"Pete","edad":"34"},
				{"id":"03","nombre":"Wilson","edad":"56"},
				{"id":"04","nombre":"Alan","edad":"12"},
				{"id":"05","nombre":"Rob","edad":"43"}] ';


$nombre_user=$_POST['nombre_user'];

$datos_users=json_decode($json_users);


$respuesta='{"code":"404","message":"No encontrado"}';
for ($i=0; $i < count($datos_users); $i++) { 
	
	if (strtolower($datos_users[$i]->nombre)==strtolower($nombre_user)) {
		
		$respuesta='{"id":"'.$datos_users[$i]->id.'","nombre":"'.$datos_users[$i]->nombre.'","edad":"'.$datos_users[$i]->edad.'"}';
		break; 	

	}
}

echo $respuesta;

?>