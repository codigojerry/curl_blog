<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$nombre=$_POST['usuario'];

	$variables="nombre_user=".$nombre;
	$url="http://localhost/curl/curl_blog/datos.php";

	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_POST, true);//para hacer un HTTP POST normal. Este POST del tipo application/x-www-form-urlencoded, el más común en formularios HTML.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $variables);//datos para enviar vía HTTP "POST"
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//para devolver el resultado de la transferencia como string del valor de curl_exec() en lugar de mostrarlo directamente.
	
	$result = curl_exec($ch);//Ejecuta la sesión cURL que se le pasa como parámetro.
	curl_close($ch);	

}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>cURL</title>
</head>
<body>

    <h2>cURL</h2> https://codigojerry.blogspot.com/

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
		Nombre: <input type="text" name="usuario" placeholder="Entre usuario" required="required" />
		<input type="submit" value="Buscar" />

	</form>

	<hr>

	<?php 

		if(isset($result)){
			
			$user=json_decode($result);

			if(array_key_exists('nombre',$user)){
				
				echo 'Id: '.$user->id.'<br >';
				echo 'Nombre: '.$user->nombre.'<br >';
				echo 'Edad: '.$user->edad;
			}else{
				echo $user->message;
			}

		}

	?>

</body>
</html>