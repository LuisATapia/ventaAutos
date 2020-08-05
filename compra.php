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
    <title>Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <?php include 'barTop.php'; ?>
    <?php include 'Connections/Users/selectOne.php'    ?>
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">                
                <form action="Connections/Compras/addCompra.php" method="POST">
                    <h2 class="text-center">Compra de Auto</h2>
                    <h4> Datos del auto</h4>
                    <div class="form-group">
                        <label for="username">Modelo:</label>
                        <label><?php echo $_GET['model']; ?> </label>
                    </div>
                    <div class="form-group">
                        <label for="username">Year:</label>
                        <label><?php echo $_GET['year']; ?> </label>
                    </div>
                    <div class="form-group">
                        <label for="username">Price:</label>
                        <label name="Lprice"><?php echo $_GET['price']; ?> </label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="price" value=<?php echo $_GET['price']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="model" value=<?php echo $_GET['model']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="year" value=<?php echo $_GET['year']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="color" value=<?php echo $_GET['color']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="niv" value=<?php echo $_GET['niv']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="plate" value=<?php echo $_GET['plate']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tag0" value=<?php echo $_GET['tag0']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tag1" value=<?php echo $_GET['tag1']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="marca" value=<?php echo $_GET['marca']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipoT" value=<?php echo $_GET['tipo']; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="vendedor" value=<?php echo $_GET['vendedor']; ?>>
                    </div>
                    <div>
                        <input type="hidden" name="idCar" value= <?php echo $_GET['idCar']; ?>>
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