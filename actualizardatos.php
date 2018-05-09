<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Actualizar datos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="mx-auto" style="width: 800px; margin:80px;">
<?php
	include("conexion.php");
	$sql="SELECT * FROM canalesyt where id=".$_GET['id']."";
					$registros = $conn->query($sql);
					if ($registros->num_rows > 0) {
						while($row = $registros->fetch_assoc()) {?>
		
			<form method="POST" action="actualiza.php">
	  	 				Nombre del canal:<input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>">
	  					Enlace: <input type="text" name="link" size="50" class="form-control" value="<?php echo $row['enlace']; ?>">
	  					Lenguajes: <textarea rows="3" class="form-control" name="lenguajes"><?php echo $row['lenguajes']; ?></textarea>
						Puntuacion: <select name="punt" class="form-control">
										<option selected ><?php echo $row['calificacion']; ?></option>
						  				<option value="1">1</option>
						  				<option value="2">2</option>
						  				<option value="3">3</option>
						  				<option value="4">4</option>
						  				<option value="5">5</option>
						  			 </select><br>
						  		<input type="hidden" name="codigo" value="<?php echo $_GET['id']; ?>"> 
								<input type="submit" value="modificar" class="btn btn-primary">	
			</form>
				<?php } 
					} 
					else {
				    	echo "0 results";
					}
					$conn->close();
				?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>