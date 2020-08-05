<?php
session_start();

if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}
?>
<html> 
<head>
    <title>Editar Auto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <?php include 'barTop.php';?>
    <div class="row" style="padding:15">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Auto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="showCars.php">Show cars</a>
            </div>
        </div> 
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">   
            <form action="Connections/Cars/updateCar.php" method="POST" style="padding: 25">
                <input type="hidden" name="id" id="id" value=<?php echo $_GET["id"]; ?>>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Niv:</strong>
                            <input type="text" name="niv" id="niv" class="form-control" placeholder="Niv" value=<?php echo $_GET["niv"]; ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Marca:</strong>
                            <select name="marcaAuto" class="form-control" selected="<?php echo $_GET["marca"]; ?>">
                                <option value="BMW">BMW</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Ford">Ford</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Volkswagen">Volkswagen</option>                         
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Model:</strong>
                            <input type="text" name="model" id="model" class="form-control" placeholder="Model" value=<?php echo $_GET["model"]; ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Transmisión:</strong>
                            <select name="transAuto" class="form-control">
                                <option value="Automático">Automático</option>
                                <option value="Manual">Manual</option>                  
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Year:</strong>
                            <input type="text" name="year" id="year" class="form-control" placeholder="Year" value=<?php echo $_GET["year"]; ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Plate:</strong>
                            <input type="text" name="plate" id="plate" class="form-control" placeholder="Plate" value=<?php echo $_GET["plate"]; ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Color:</strong>
                            <input type="text" name="color" id="color" class="form-control" placeholder="Color" value="<?php echo $_GET["color"]; ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="text" name="price" id="color" class="form-control" placeholder="Color" value=<?php echo $_GET["price"]; ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h4>Tags</h4>
                        <div id="tags" class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="tag0" class="form-control" value=<?php echo $_GET["tag0"]; ?> required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="tag1" class="form-control" required value=<?php echo $_GET["tag1"]; ?>>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="hidden" name="status" class="form-control" required value=<?php echo $_GET["status"]; ?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>



