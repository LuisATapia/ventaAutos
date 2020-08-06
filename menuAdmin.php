<?php
session_start();

if ($_SESSION['typeUser']=="user" || !isset($_SESSION['idUser'])) {
	header("Location: log_in.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Menú</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	 <style>
    #trg1 {
      margin-top: 10%;
      margin-left: 24.5%;
      float: left;
    }
    #cards {
      border-radius: 10px;
      background-color: #AFAFAF;
      transition: all 0.2s;
      margin: 25px;
    }
    #cards:hover {
      background-color: LightGreen;
    }
    body {
      background-attachment: fixed;
      background-size: 100vw 100vh;
      text-align: center;
      align-content: center;
      background-image: url(img/mercedes.jpg);
    }
    a {
      text-decoration: none;
      color: black;
    }
    h4{
    	text-decoration: none;
    }
  </style>
</head>
<body>
	<?php include 'barraPrecio.php' ?>
	<div class="container-fluid container card-group" id="trg1">

		<div class=" text-body  mb-3 col-md-6" style="width: 12rem; padding:12px;" id="cards">
			<a href="verUsuarios.php">
				<img src="img/user.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h4 class="card-title text-center">Usuarios</h4>
				</div>
			</a>
		</div>

		<div class=" text-body  mb-3 col-md-6" style="width: 12rem; padding:12px;" id="cards">
			<a href="verAutos.php">
				<img src="img/car.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h4 class="card-title text-center">Autos</h4>
				</div>
			</a>
		</div>
		
		<div class=" text-body  mb-3 col-md-6" style="width: 12rem; padding:12px;" id="cards">
			<a href="#">
				<img src="img/list.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h4 class="card-title text-center">Ventas</h4>
				</div>
			</a>
		</div>
	</div>
</body>
</html>