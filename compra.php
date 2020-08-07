<?php
session_start();

if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}
    include 'Connections/Cars/cars.inc.php';
    $id=$_GET['idCar'];

    $filter = [
        '_id' => new MongoDB\BSON\ObjectId($id)
    ];
    $query = new MongoDB\Driver\Query($filter);

    try {
        $result = $manager->executeQuery($dbname, $query);
        $row=$result->toArray();
        $model=$row[0]->model;
        $niv=$row[0]->niv;
        $year=$row[0]->year;
        $plate=$row[0]->plate;
        $marca=$row[0]->marca;
        $price=$row[0]->price;
        $tipo=$row[0]->tipo;
        $vendedor=$row[0]->vendedor;
        $color=$row[0]->color;
        $tag0=$row[0]->tags[0];
        $tag1=$row[0]->tags[1];
        $pic=$row[0]->image;
    } catch (MongoDB\Driver\Exception\Exception $e) {
        die("Error Encountered:" . $e);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
          background-image: url(img/nieve.jpg);
          background-attachment: fixed;
          background-size: 100vw 100vh;
      }
      form{
          background-color: rgba(255, 255, 255, 0.9);
          padding: 25px;
          border-radius: 15px;
      }
  </style>
</head>
<body>

    <?php include 'barTop.php'; ?>
    <?php include 'Connections/Users/selectOne.php'    ?>
    <div class="container mt-5" id="form">

        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">                
                <form action="Connections/Compras/addCompra.php" method="POST">
                    <h2 class="text-center">Compra de Auto</h2>
                    <div class="form-group">
                        <img src="Connections/Cars/<?php echo $pic;?>" width="490" heigh="400">
                    </div>
                    <h4> Datos del auto</h4>
                    <div class="form-group">
                        <label for="username"><Strong>Niv: </Strong></label>
                        <label name="Lprice"><?php echo $niv; ?> </label>
                    </div>
                    <div class="form-group">
                        <label for="username"><Strong>Placa: </Strong></label>
                        <label name="Lprice"><?php echo $plate; ?> </label>
                    </div>
                    <div class="form-group">
                        <label for="username"><Strong>Modelo: </Strong></label>
                        <label><?php echo $model; ?> </label>
                    </div>
                    <div class="form-group">
                        <label for="username"><Strong>Year: </Strong></label>
                        <label><?php echo $year; ?> </label>
                    </div>
                    <div class="form-group">
                        <label for="username"><Strong>Price: </Strong></label>
                        <label name="Lprice"><?php echo $price; ?> </label>
                    </div>
                    

                    <div class="form-group">
                        <input type="hidden" name="price" value=<?php echo $price; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="model" value=<?php echo $model; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="year" value=<?php echo $year; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="color" value=<?php echo $color; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="niv" value=<?php echo $niv; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="plate" value=<?php echo $plate; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tag0" value=<?php echo $tag0; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tag1" value=<?php echo $tag1; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="marca" value=<?php echo $marca; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipoT" value=<?php echo $tipo; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="vendedor" value=<?php echo $vendedor; ?>>
                    </div>
                    <div>
                        <input type="hidden" name="idCar" value= <?php echo $id; ?>>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" value="Comprar" class="btn btn-primary btn-block">
                    </div>  
                </form>
            </div>
        </div>
    </div>
</body>
</html>