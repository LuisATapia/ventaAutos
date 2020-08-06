<?php
session_start();

if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Cars</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body {
      background-image: url(img/vocho.jpg);
      background-attachment: fixed;
      background-size: 100vw 100vh;
    }
    #form{
      background-color: rgba(255, 255, 255, 0.9);
        padding: 25px;
        border-radius: 15px;
    }
</style>
</head>
<body>
    <?php 
    include 'barTop.php';
    ?>
    <!--<div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cars</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="createCar.php">Add car</a>
            </div>
        </div>
    </div>-->
    <div class="container mt-5 pt-5" id="form">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="row justify-content-center">
                    <a class="btn btn-success" href="createCar.php">Add car</a>
                </div>
            </div>

            <h2>Lista de Autos</h2>
            <input id="buscar" type="text" class="form-control md-5" placeholder="Buscar Auto" />
            <?php 
            try{
                include 'Connections/Cars/cars.inc.php';
                $query = new MongoDB\Driver\Query([]);

                $rows = $manager->executeQuery($dbname, $query);

                echo "<table class='table' id='tabla'>
                <thead>
                <th>Estatus</th>
                <th>Marca</th>
                <th>Niv</th>
                <th>Model</th>
                <th>Year</th>
                <th>Plate</th>
                <th>Color</th>
                <th>Price</th>
                <th>Tags</th>
                <th>Action</th>
                </thead>";
                foreach($rows as $row){
                    if($row->vendedor == $_SESSION['idUser'])
                    {

                    
                    echo "<tr>".
                    "<td>".$row->status."</td>".
                    "<td>".$row->marca."</td>".
                    "<td>".$row->niv."</td>".
                    "<td>".$row->model."</td>".
                    "<td>".$row->year."</td>".
                    "<td>".$row->plate."</td>".    
                    "<td>".$row->color."</td>".
                    "<td>".$row->price."</td>"."<td>";
                    foreach ($row->tags as $tag)
                    {
                        echo "<p>".$tag."</p>";
                    }
                    if($row->status == "sold")
                    {
                        echo
                    "</td>"."<td> <a class='btn btn-danger' href='Connections/Cars/dropCar.php?id=".$row->_id."'>Delete</a></td>".
                    "</tr>";  
                    }else{
                    echo
                    "</td>"."<td><a class='btn btn-info' href='editCar.php?id=".$row->_id.
                    "&niv=".$row->niv.
                    "&model=".$row->model.
                    "&year=".$row->year.
                    "&plate=".$row->plate.
                    "&color=".$row->color.
                    "&price=".$row->price.
                    "&status=".$row->status.
                    "&tag0=".$row->tags[0].
                    "&tag1=".$row->tags[1].
                    "&vendedor=" . $row->vendedor.
                    "&marca=" . $row->marca.
                    "&tipo=" . $row->tipo.  
                    "'>Edit</a> ".
                    "<a class='btn btn-danger' href='Connections/Cars/dropCar.php?id=".$row->_id."'>Delete</a></td>".
                    "</tr>";    
                    }
                    
                    }
                }

                echo"</table>";
            }   catch(MongoDB\Driver\Exception\Exception $e){
                die("Error Encountered: ".$e);
            }
            ?>
        </div>
        <div class="card" style="width: 18rem;">

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    <script  src="js/buscarTable.js"></script>
    </html>


