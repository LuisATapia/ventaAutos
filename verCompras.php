<!DOCTYPE html>
<html>
<head>
	<title>Ver Compras</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
          background-image: url(img/nieve.jpg);
          background-attachment: fixed;
          background-size: 100vw 100vh;
      }
      #form{
          background-color: rgba(255, 255, 255, 0.9);
          padding: 25px;
          border-radius: 15px;
      }
  </style>
</head>
<body>
<?php 
session_start();
    include 'barTop.php';
    ?>

    <div class="container mt-5 pt-5" id="form">
        <div class="row">
        	<h1>Lista de Autos Comprados</h1>
        	<?php 
        	try
        	{
        		include 'Connections/Compras/compras.inc.php';
                $query = new MongoDB\Driver\Query([]);
                $rows = $manager->executeQuery($dbname, $query);
                echo "<table class='table' id='tabla'>
                <thead>
                <th>Marca</th>
                <th>Niv</th>
                <th>Model</th>
                <th>Year</th>
                <th>Plate</th>
                <th>Color</th>
                <th>Price</th>
                </thead>";
                foreach($rows as $row)
                {
                	if($row->idComprador == $_SESSION['idUser'])
                	{
                		echo "<tr>
                		<td>".$row->car->marca."</td>.
                		<td>".$row->car->niv."</td>.
                		<td>".$row->car->model."</td>.
                		<td>".$row->car->year."</td>
                		<td>".$row->car->plate."</td>.
                		<td>".$row->car->color."</td>.
                		<td>".$row->car->price."</td>.
                		</tr>";
                	}else
                	{
                        
                	}
                }
        	}catch(Exception $e)
        	{
        		die("Error ".$e);
        	}
        	?>
        </div>
    </div>
</body>
</html>