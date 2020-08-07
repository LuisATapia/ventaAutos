<?php
session_start();

if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}
?>
<html>
<head>
    <title>Add Car</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        body {
          background-image: url(img/vocho.jpg);
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
    <?php include './barTop.php';?>
    <div class="row" style="padding:15">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cars</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="showCars.php">Show cars</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 pt-5">
            <form action="Connections/Cars/addCar.php" method="POST">
                <h3>Agregar Auto<i class="fas fa-car"></i></h3>

                <div class="form-row">    
                    <div class="form-group col-md-6">
                        <strong>Niv:</strong>
                        <input type="text" name="niv" id="niv" class="form-control" placeholder="" required>
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
                        <strong>Model:</strong>
                        <input type="text" name="model" id="model" class="form-control" placeholder="" required>
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
                        <input type="text" name="year" id="year" class="form-control" placeholder="YYYY" required>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Placas:</strong>
                        <input type="text" name="plate" id="plate" class="form-control" placeholder="Sin Guiones" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Color:</strong>
                        <input type="text" name="color" id="color" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Price:</strong>
                        <input type="text" name="price" id="price" class="form-control" placeholder="" required maxlength="6">
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>Tags</h4>
                    <div id="tags" class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="tag1" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="tag2" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <input type="submit" name="btnsave" value="Registrar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

