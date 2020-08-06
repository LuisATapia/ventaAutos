<!DOCTYPE html>
<html>
<head>
    <title>Ver Autos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php 
    include 'barTop.php';
    ?>
    <div class="container mt-5 pt-5">
        <div class="row">
            <h1>Lista de Autos</h1>
                <input id="buscar" type="text" class="form-control md-5" placeholder="Buscar Auto" />
            <?php
            try{
                include 'Connections/Cars/cars.inc.php';
                $query = new MongoDB\Driver\Query([]);
                $rows = $manager->executeQuery($dbname, $query);

                echo "<table class='table' id='tabla'>
                <thead>
                <th>Estatus</th>
                <th>Niv</th>
                <th>Model</th>
                <th>Year</th>
                <th>Plate</th>
                <th>Color</th></thead>";
                foreach($rows as $row)
                {
                    echo "<tr>".
                    "<td>".$row->status."</td>".
                    "<td>".$row->niv."</td>".
                    "<td>".$row->model."</td>".
                    "<td>".$row->year."</td>".
                    "<td>".$row->plate."</td>".
                    "<td>".$row->color."</td>".
                    "<td>".
                    "<a class='btn btn-danger' href='Connections/Users/dropUser.php?id=".$row->_id."'>Eliminar</a>".
                    "</td></tr>";

                }
            echo "</table>";
            }catch(Exception $e)
            {

                
            }
            ?>
            </div>
        </div>
    </body>
    <script  src="js/buscarTable.js"></script>
    </html>