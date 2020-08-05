<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body style="padding:75px;">
    <div class="row">
        <?php 
        include 'cars.inc.php';
        include '../../barTop.php';

        $precio = $_POST["precioB"];

        $filter = [
            'price' =>['$gte'=>$precio]
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
            "'>Comprar</a>
            </div>
            </div>
            </div>";

        }
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
    ?>
</div>
</body>
</html>
