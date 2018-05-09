<?php

# definimos los valores iniciales para nuestro calendario

$month=date("n");
$year=date("Y");
$diaActual=date("j");

# Obtenemos el dia de la semana del primer dia

# Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
# Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

 $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",

"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ejemplo de un simple calendario en PHP</title>

	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<style>

		#calendar {

			font-family:Arial;

			font-size:12px;

		}

		#calendar tr#Mes {

			text-align:left;

			padding:5px 10px;

			background-color:#3F51B5

			color:#fff;

			font-weight:bold;

		}

		#calendar th {

			background-color:#2196F3;

			color:#fff;
			width: 150px;

		}

		#calendar td {

			text-align:right;

			padding:2px 5px;

			background-color:#EEEEEE;
			height: 130px;
			vertical-align: top;

		}

		#calendar .hoy {

			background-color:#E57373;
			

		}

	</style>

</head>
<body>
<div class="mx-auto" style="width: 1200px; margin:20px;">
<nav class="nav nav-pills nav-justified">
  				<a class="nav-link active" href="../mostrardatos.php">Muestra canales</a>
  				<a class="nav-link " href="">Añadir Actividad</a>
  				<a class="nav-link" href="#">Link</a>	
			</nav><br>
 <table id="calendar" border="1">
 	<thead>
		<tr><th colspan="7"><?php echo $meses[$month]." ".$year?></th></tr>
	</thead>
		<tr>
			<th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th>
		</tr>
	
	<tr bgcolor="#ecf0f1;">
		<?php
			  include("../conexion.php");

       			 $result = $conn->query('SELECT * FROM eventos_calendario');

        if( !$result )
            die( $mysqli->error );

			$last_cell=$diaSemana+$ultimoDiaMes;

		// hacemos un bucle hasta 42, que es el máximo de valores que puede

		// haber... 6 columnas de 7 dias

		for($i=1;$i<=42;$i++)
		{
			if($i==$diaSemana){
				// determinamos en que dia empieza
			$day=1;
		}
		if($i<$diaSemana || $i>=$last_cell){

				// celca vacia
			echo "<td>&nbsp;</td>";

		}else{

				// mostramos el dia
				if($day==$diaActual){

					echo "<td class='hoy'>$day";
						  while($row = $result->fetch_assoc())
        					{
								echo "<div>".$row["descripcion"]."</div>";
        					}
					echo "</td>";

				}else{

					echo "<td>$day</td>";

				}
				$day++;
			}

			// cuando llega al final de la semana, iniciamos una columna nueva

			if($i%7==0){

				echo "</tr><tr>\n";

			}
		}

	?>
	</tr>

 </table>
</div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


</body>

</html>