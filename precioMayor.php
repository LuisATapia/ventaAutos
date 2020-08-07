<?php
session_start();

if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}
?>
<?php require 'barTop.php';?>
<html>
<head>
    <title>Car Sale</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css">
    <style type="text/css">
        #cuadroBusq{
            border-color: black;
            padding: 10;
            background-color: rgba(255, 255, 255, 0.8);
            margin:10px;
            width: 750px;
            border-radius: 20px;
        }
        body {
            background-image: url(img/porsche.jpg);
            background-attachment: fixed;
            background-size: 100vw 100vh;
        }
        #form{
            background-color: rgba(255, 255, 255, 0.8);
            padding: 25px;
            border-radius: 15px;
        }
        h3{
            color:white;
        }
        #cardAuto{
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body style="padding:75px;">

    <h3>Autos en Venta</h3><br>
    <div class="row" id="cuadroBusq">

        <div>
            <form  action="precioBajo.php" method="POST">
                <input type="text" id="precioB" name="precioB" placeholder="Menor A..."><br>
                <input type="submit" name="bpb" value="Buscar" class="btn btn-info">
            </form>
        </div>
        <div>
            <form  action="precioMayor.php" method="POST">
                <input type="text" id="precioM" name="precioM" placeholder="Mayor A..."><br>
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

        $precio = $_POST["precioM"];
        $priceF = floatval($precio);

        $filter = [
            'price' =>['$gt'=>$priceF]
        ];
        $query = new MongoDB\Driver\Query($filter);

        try{
            $result = $manager->executeQuery($dbname, $query);
            $row = $result->toArray();
            foreach($row as $r)
            {
                if($r->status == "disponible")
                {
                    echo "<div class='col-sm-3'>
                    <div class='card' id='cardAuto'>
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



