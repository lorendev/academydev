<?php
	include("conexion.php");
 	if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {

	   $nom = $_POST["nombre"];
  	   $leng = $_POST["lenguajes"];
  	   $enl = $_POST["link"];
  	   $point = $_POST["punt"];
  	   $ide = $_POST["codigo"];
  	   

		$sql2 = "UPDATE canalesyt SET nombre='$nom', enlace='$enl', lenguajes='$leng', calificacion='$point' WHERE id='$ide'";
		if ($conn->query($sql2) === TRUE) {
			echo "<script>
			alert('Canal modificado correctamente');
				window.location.href='http://localhost/sublime/phpya/mostrardatos.php';
			</script>";
		
		} else {
    	echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
}
?>