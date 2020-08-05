<?php
session_start();

if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css">
    <style type="text/css">
        #cuadroBusq{
            border-radius: all;
            border-color: black;
            padding: 10;
            background-color: White;
        }
    </style>
</head>
<body style="padding:75px;">
    <h3>Buscar</h3><br>
    <div class="row" id="cuadroBusq">
        <div>
            <form  action="precioBajo.php" method="POST">
                <input type="text" id="precioB" name="precioB" placeholder="Menor A...">
                <input type="submit" name="bpb" value="Buscar" class="btn btn-info">
            </form>
            
        </div>
        <div>
            <form  action="precioMayor.php" method="POST">
                <input type="text" id="precioM" name="precioM" placeholder="Mayor A...">
                <input type="submit" name="bpM" value="Buscar" class="btn btn-info">
            </form>
        </div>
        <div>
                <form method="POST" action="marca.php">
                    <div id="marca" >
                        <select name="marcaAuto" class="form-control" selected="<?php echo $_GET["marca"]; ?>">
                            <option value="BMW">BMW</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Ford">Ford</option>
                            <option value="Mazda">Mazda</option>
                            <option value="Mercedes">Mercedes</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Volkswagen">Volkswagen</option>                         
                        </select>
                        <input type="submit" name="bpMarca" value="Buscar" class="btn btn-info">
                    </div>
                </form>
            </div>
            <div>
                <form method="POST" action="transmision.php">
                    <select name="transAuto" class="form-control">
                        <option value="Automático">Automático</option>
                        <option value="Manual">Manual</option>                  
                    </select>
                    <input type="submit" name="bpTrnas" value="Buscar" class="btn btn-info">
                </form>
            </div>
    </div>
    <div class="row">

        <?php 
        include 'Connections/Cars/cars.inc.php';
        include 'barTop.php';

        $marca = $_POST["transAuto"];

        $filter = [
            'tipo' =>$marca
        ];
        $query = new MongoDB\Driver\Query($filter);

        try{
            $result = $manager->executeQuery($dbname, $query);
            $row = $result->toArray();
        //$carId = $row->_id;
            foreach($row as $r)
            {
            /*echo $r->_id;
            echo '<br>';

            echo $r->model." ".$r->price;
            echo '<br>';*/
            if($r->status =="disponible")
            {
                echo "<div class='col-sm-6'>
                <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>". $r->model." ".$r->year."</h5>
                <p class='card-text'>". $r->price."</p>";
                foreach($r->tags as $tag)
                {
                    echo "<label class='card-text'>
                    ". " -" . $tag ."</label>";
                } 
                echo "
                <br><a class='btn btn-primary' href='compra.php?idCar=".$r->_id .
                "&price=". $r->price.
                "&model=". $r->model.
                "&year=" . $r->year.
                "&niv=" . $r->niv.
                "&color=" . $r->color.
                "&plate=" . $r->plate.
                "&tag0=" . $r->tags[0]. 
                "&tag1=" . $r->tags[1]. 
                "'>Comprar</a>
                </div>
                </div>
                </div>";
            }
        }
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
    ?>
</div>
</body>
</html>
