<!DOCTYPE html>
<html>
<head>
	<title>Ve Usuarios</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<?php 
	include 'barraPrecio.php';
	?>
	<div class="container mt-5 pt-5">
		<div class="row">
			<h1>Lista de Usuarios</h1>
			<input id="buscar" type="text" class="form-control md-5" placeholder="Buscar Auto" />
			<?php
			try{
				include 'Connections/Users/db.inc.php';
				$query = new MongoDB\Driver\Query([]);
				$rows = $manager->executeQuery($dbname, $query);

				echo "<table class='table' id='tabla'>
                <thead>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Curp</th>
                <th>Tipo Usuario</th>
                <th>Correo</th>
                <th>Actions</th>
                </thead>";
                foreach($rows as $row)
                {
                	echo "<tr>".
                	"<td>".$row->name."</td>".
                	"<td>".$row->lastname."</td>".
                	"<td>".$row->curp."</td>".
                	"<td>".$row->typeUser."</td>".
                	"<td>".$row->email."</td>".
                	"<td><a class='btn btn-info' href='editU.php?id=".$row->_id."'>Editar</a>".
                	"<a class='btn btn-danger' href='Connections/Users/dropUser.php?id=".$row->_id."'>Eliminar</a>".
                	"</td></tr>";

                }
                echo "</table>";
			}catch(Exception $e)
			{

				
			}
			?>
			</div>
		</div>
	</body>
	<script  src="js/buscarTable.js"></script>
	</html>