<!DOCTYPE html>
<html>
<head>
	<title>Mostrar datos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<div class="mx-auto" style="width: 800px; margin:80px;">
    		<nav class="nav nav-pills nav-justified">
  				<a class="nav-link active" href="insertacanales.php">Anadir Canal</a>
  				<a class="nav-link " href="calendario/calendario2.php">Mostrar Calendario</a>
  				<a class="nav-link" href="#">Link</a>	
			</nav>
			<br>
      			<?php
 				/*	include("conexion.php");

					$sql = "SELECT * FROM canalesyt";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
				    	// output data of each row
				    	echo "<table class='table table-striped'>";
				    	echo "<thead><tr><th>Nombre</th><th>Descripción</th><th>Calificacion</th></tr></thead><tbody>";
				    	while($row = $result->fetch_assoc()) {?>
				        	<tr>
				        		<td><a href="<?php echo $row['enlace']; ?>" target="_blank"><?php echo $row["nombre"]; ?></a></td>
				        		<td><?php echo $row["lenguajes"];?></td>
				        		<td><?php echo $row["calificacion"];?></td>
				        		<td><a href="actualizardatos.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a></td>
			        	</tr>
				    	<?php } 
				    	echo "</tbody></table>";
					} else {
				    	echo "0 results";
					}
					$conn->close();*/

				   ?>
				   <table class='table table-striped'>
				   	<thead><tr><th>Nombre</th><th>Descripción</th><th>Calificacion</th></tr></thead><tbody>

				   <?php
				   include('conexion.php');
// Paginacion de resultado de los productos
$registros= 5; // cantidad de productos a mostrar
$contador = 1; // contador
$pagina ="";

if(isset($_GET["pagina"])){
  $pagina = (int)$_GET["pagina"];

}

/**
* Se inicia la paginación, si el valor de $pagina es 0 le asigna el valor 1 e $inicio entra con valor 0.
* si no es la pagina 1 entonces $inicio sera igual al numero de pagina menos 1 multiplicado por la cantidad de registro
*/
if ($pagina ==0 || $pagina=="" ){
  $inicio= 0;
  $pagina= 1;
}else{
  $inicio =($pagina -1) * $registros;
}
        // $mysqli es la variable o nombre de la conexión de BD
        $resultados = mysqli_query($conn,"SELECT * FROM canalesyt ");
        //contando la cantidad de filas entregadas por la consulta, para saber
        // cuantos registros fueron entregados por la query
        $total_registros=mysqli_num_rows($resultados);
         /* Generamos otra consulta la cual nos creara la paginación, ordenando
        y creando un limit en las consultas */
        $resultados= mysqli_query($conn,"SELECT * FROM canalesyt ORDER BY id ASC LIMIT $inicio,$registros");
        // con la función reordenaremos el resultado  total de Paginas

        // 4.53213 = 5
        $total_paginas= ceil($total_registros / $registros);

               if (!$resultados) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

        /* Si tenemos un retorno en la variable $total_registros iniciamos
        el ciclo para mostrar los datos */
        if($total_registros) {
          // variable para definir a los productos
          while($row=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
         ?>
          <tr>
            <td><a href="<?php echo $row['enlace']; ?>" target="_blank"><?php echo $row["nombre"]; ?></a></td>
            <td><?php echo $row["lenguajes"]; ?></td>
            <td><?php echo $row["calificacion"]; ?></td>
            <td><a href="actualizardatos.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a></td>
            <td><a onclick="return confirm('¿Estas seguro?');" href="eliminar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></td>
          </tr>
          <?php
          /**
                     * La variable $contador es la misma que iniciamos arriba con valor 1, en cada ciclo sumara 1 a este valor.
                     * $contador sirve para mostrar cuantos registros tenemos, es mas que nada una guía.
                      */
            $contador++;
            } // end while
        } /* end if */ else {
          echo "<font color='darkgray'>(Sin resultados)</font>";
        }
        // libera la memoria asociada a un resultado

          ?>
        </tbody></table>
      <div class="paginacion">

        <br>
			<nav aria-label="Page navigation example">
  				<ul class="pagination">
        <?php
         if($total_registros){
           /**
              * Acá activamos o desactivamos la opción "< Anterior", si estamos en la pagina 1 nos dará como resultado 0 por ende NO
              * activaremos el primer if y pasaremos al else en donde se desactiva la opción anterior. Pero si el resultado es mayor
              * a 0 se activara el href del link para poder retroceder.
              */
       if(($pagina -1 ) > 0){
         echo " <li class='page-item'><a class='page-link' href='mostrardatos.php?pagina=".($pagina-1)."'>Anterior</a></li>";
       }else{
         //echo "<a href='#'> Anterior </a>";
       }
       // Generamos el ciclo para mostrar la cantidad de paginas que tenemos
       for($i = 1 ;$i <= $total_paginas; $i++) {
         if($pagina == $i) {
           echo "<li class='page-item'><a class='page-link' href='#'>".$pagina."</a></li>";
         }else{
           echo "<li class='page-item'><a class='page-link' href='mostrardatos.php?pagina=$i'>$i</a></li>";
         }
       }
       /**
               * Igual que la opción primera de "< Anterior", pero acá para la opción "Siguiente >", si estamos en la ultima pagina no podremos
               * utilizar esta opción.
               */
      if(($pagina + 1)<=$total_paginas){
        echo " <li class='page-item'><a class='page-link' href='mostrardatos.php?pagina=".($pagina+1)."'>Siguiente ></a></li>";
      }else{
        //echo "<a href='#'>Siguiente</a>";
      }
     } // if total registros
         ?>

         		</ul>
			</nav>
		</div>
	</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>	