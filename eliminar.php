<?php
	include("conexion.php");

	$sql = "DELETE FROM canalesyt WHERE id=".$_GET['id']."";

	if ($conn->query($sql) === TRUE) {
			echo "<script>
			alert('Canal eliminado correctamente');
				window.location.href='http://localhost/sublime/phpya/mostrardatos.php';
			</script>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
?> 