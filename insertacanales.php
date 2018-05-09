<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Insertar datos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>

<?php
	include("conexion.php");
 	if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {

	   $nom = $_POST["nombre"];
  	   $leng = $_POST["lenguajes"];
  	   $enl = $_POST["link"];
  	   $point = $_POST["punt"];

	$sql = "INSERT INTO canalesyt (nombre, enlace, lenguajes, calificacion) VALUES ('".$nom."', '".$enl."', '".$leng."', '".$point."')";
	if ($conn->query($sql) === TRUE) {
			echo "<script>
			alert('Canal añadido correctamente');
				window.location.href='http://localhost/sublime/phpya/insertacanales.php';
			</script>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();
?>  
		<div class="mx-auto" style="width: 800px; margin:80px;">
			<form method="POST" action="insertacanales.php">
	  	 				Nombre del canal:<input type="text" name="nombre" class="form-control">
	  					Enlace: <input type="text" name="link" size="50" class="form-control">
	  					Lenguajes: <textarea rows="3" class="form-control" name="lenguajes"></textarea><br>
						Puntuacion: <select name="punt" class="form-control">
						  				<option value="1">1</option>
						  				<option value="2">2</option>
						  				<option value="3">3</option>
						  				<option value="4">4</option>
						  				<option value="5">5</option>
						  			 </select><br>
								<input type="submit" value="Inserta" class="btn btn-primary">
								<a href="mostrardatos.php" class="btn btn-outline-secondary">mostrar canales</a>
					</form>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>