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
      margin-left: 22.5%;
      float: left;
    }
    #cards {
      margin-right: 10px;
      border-radius: 10px;
      background-color: #FFB433;
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
					<h4 class="card-title text-center">Users</h4>
				</div>
			</a>
		</div>

		<div class=" text-body  mb-3 col-md-6" style="width: 12rem; padding:12px;" id="cards">
			<a href="verAutos.php">
				<img src="img/car.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h4 class="card-title text-center">Cars</h4>
				</div>
			</a>
		</div>
		
		<div class=" text-body  mb-3 col-md-6" style="width: 12rem; padding:12px;" id="cards">
			<a href="#">
				<img src="img/list.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h4 class="card-title text-center">Sales</h4>
				</div>
			</a>
		</div>
	</div>
</body>
</html>