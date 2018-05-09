<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calendario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Actualizar datos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style type="text/css">body{margin:0;}ul,li{list-style-type:none;margin:0;padding:0;}.calendar{padding:30px;}.calendar .day{background:#ecf0f1;border-bottom:2px solid #bdc3c7;float:left;margin:3px;position:relative;height:150px;width:150px;}.day.marked{background:#3498db;border-color:#2980b9;}.day .day-number{color:#7f8c8d;left:5px;position:absolute;top:5px;}.day.marked .day-number{color:white;}.day .events{color:white;margin:29px 7px 7px;height:78px;overflow-x:hidden;overflow-y:hidden;}.day .events h5{margin:0 0 5px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;width:100%;}.day .events strong,.day .events span{display:block;font-size:11px;}.day .events ul{}.day .events li{}</style>
    </head>
    <body>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a href="../mostrardatos.php" class="navbar-brand">Mostrar Canales</a>
        <a href="" class="navbar-brand">Añadir actividad</a>
  
    </nav>
   <div class="calendar">
    <?php
         include("../conexion.php");

        $result = $conn->query('SELECT * FROM eventos_calendario');

        if( !$result )
            die( $mysqli->error );

        $events = array();

        while($row = $result->fetch_assoc())
        {
            $start_date = new DateTime($row['fecha_inicio']);
            $end_date = new DateTime($row['fecha_fin']);
            $day = $start_date->format('j');

            $events[$day][] = array(
                'start_hour' => $start_date->format('G:i a'),
                'end_hour' => $end_date->format('G:i a'),
                'description' => $row['descripcion']
            );
        }

        $datetime = new DateTime();

        // mes en texto
        $txt_months = array(
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        );

        $month_txt = $txt_months[$datetime->format('n')-1];

        // ultimo dia del mes
        $month_days = date('j', strtotime("last day of"));

        echo '<h1>' . $month_txt . '</h1>';

        foreach(range(1, $month_days) as $day)
        {
            $marked = false;
            $events_list = array();

            foreach($events as $event_day => $event)
            {
                // si el dia del evento coincide lo marcamos y guardamos la informacion
                if($event_day == $day)
                {
                    $marked = true;
                    $events_list = $event;
                    break;
                }
            }

            ?>
             
             <div class="mx-auto" style="width: 1200px; margin:80px;">
                
            
            <?php
            echo '<div class="day' . ($marked ? ' marked' : '') . '">
                <strong class="day-number">' . $day . '</strong>
                <div class="events"><ul>';

                    foreach($events_list as $event)
                    {
                        echo '<li>
                            <h5>' . $event['description'] . '</h5>
                            <div>
                                <strong>Inicio:</strong>
                                <span>' . $event['start_hour'] . '</span>
                            </div>

                            <div>
                                <strong>Fin:</strong>
                                <span>' . $event['end_hour'] . '</span>
                            </div>
                        </li>';
                    }

                echo '</ul></div>
            </div>';
        }
        ?>
            </div>
         </div>
    </body>
    </html>