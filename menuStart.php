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
			<form  action="menuStart.php" method="POST">
				<input type="text" id="precioB" name="precioB" placeholder="Menor A..."><br>
				<input type="submit" name="bpb" value="Buscar" class="btn btn-info">
			</form>
		</div>
		<div>
			<form  action="menuStart.php" method="POST">
				<input type="text" id="precioM" name="precioM" placeholder="Mayor A..."><br>
				<input type="submit" name="bpM" value="Buscar" class="btn btn-info">
			</form>
		</div>
		<div>
			<form method="POST" action="menuStart.php">
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
			<form method="POST" action="menuStart.php">
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
		try
		{
			include 'Connections/Cars/cars.inc.php';
			$filter = [];	

			if(isset($_POST['bpb']))
			{
				$precio = $_POST["precioB"];
				$priceF = floatval($precio);
				$filter = ['price' =>['$lte'=>$priceF]];

			}elseif(isset($_POST['bpM']))
			{
				$precio = $_POST["precioM"];
				$priceF = floatval($precio);
				$filter = ['price' =>['$gt'=>$priceF] ];
			}elseif(isset($_POST['bpMarca']))
			{
				$marca = $_POST["marcaAuto"];
				$filter = ['marca' =>$marca];
			}elseif(isset($_POST['bpTrnas']))
			{
				$trans = $_POST["transAuto"];
				$filter = ['tipo' =>$trans];
			}


			$query = new MongoDB\Driver\Query($filter);
			$rows = $manager->executequery($dbname,$query);




			foreach($rows as $row)
			{
				if($row->status =="disponible")
				{
						//echo "<img src=".$row->image." width='150'>";
					echo "<div class='col-sm-3'>
					<div class='card' id='cardAuto'>
					<img src=Connections/Cars/".$row->image." class='card-img-top' >
					<div class='card-body' >
					<h5 class='card-title'>". $row->model." ".$row->year."</h5>
					<p class='card-text'> <Strong>Precio: </Strong>". $row->price."</p>
					<p><Strong>Marca: </Strong>".$row->marca."</p>
					<p><Strong>Transmisión: </Strong>".$row->tipo."</p><Strong>Características: </Strong>";
					foreach($row->tags as $tag)
					{
						echo "<label class='card-text'>
						". " -" . $tag ."</label>";
					}
					if($row->vendedor == $_SESSION["idUser"])
					{
						echo "
						</div>
						</div>
						</div>";
					}else
					{
						echo "
						<br>
						<a class='btn btn-primary' href='compra.php?idCar=".$row->_id .
						"&price=". $row->price.
						"&model=". $row->model.
						"&year=" . $row->year.
						"&niv=" . $row->niv.
						"&color=" . $row->color.
						"&plate=" . $row->plate.
						"&tag0=" . $row->tags[0]. 
						"&tag1=" . $row->tags[1].
						"&vendedor=" . $row->vendedor.
						"&marca=" . $row->marca.
						"&tipo=" . $row->tipo.  
						"'>Comprar</a>
						</div>
						</div>
						</div>
						";
					} 

				}
			}	
		}catch(MongoDB\Driver\Exception\Exception $e)
		{
			die("Error Encountered: ".$e);
		}
		?>
		</div>
		</body>

		</html>



