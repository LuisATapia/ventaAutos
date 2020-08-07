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

                <div class="form-row">    
                    <div class="form-group col-md-6">
                        <strong>Númerod e Identificación Vehicular:</strong>
                        <input type="text" name="niv" id="niv" class="form-control" placeholder="" required value="<?php echo $_GET["niv"]?>">
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Marca:</strong>
                        <select name="marcaAuto" class="form-control">
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

                <div class="form-row">  
                    <div class="form-group col-md-6">
                        <strong>Modelo:</strong>
                        <input type="text" name="model" id="model" class="form-control" placeholder="" required value="<?php echo $_GET["model"]?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <strong>Transmisión:</strong>
                        <select name="transAuto" class="form-control">
                            <option value="Automático">Automático</option>
                            <option value="Manual">Manual</option>                  
                        </select>
                    </div>
                </div>

                <div class="form-row">  
                    <div class="form-group col-md-6">
                        <strong>Año:</strong>
                        <input type="text" name="year" id="year" class="form-control" placeholder="YYYY" required value="<?php echo $_GET["year"]?>">
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Placa:</strong>
                        <input type="text" name="plate" id="plate" class="form-control" placeholder="" required value="<?php echo $_GET["plate"]?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Color:</strong>
                        <input type="text" name="color" id="color" class="form-control" placeholder="" required value="<?php echo $_GET["color"]?>" >
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Precio:</strong>
                        <input type="text" name="price" id="price" class="form-control" placeholder="" requiredvalue="<?php echo $_GET["price"]?>" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h4>Características</h4>
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



