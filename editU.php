<?php
session_start();

/*if (!isset($_SESSION['typeUser']) || !isset($_SESSION['idUser'])) {
    header("Location: log_in.php");
}*/
include 'Connections/Users/db.inc.php';
$id=$_GET['id'];

$filter = [
    '_id' => new MongoDB\BSON\ObjectId($id)
];
$query = new MongoDB\Driver\Query($filter);

try {
    $result = $manager->executeQuery($dbname, $query);
    $row=$result->toArray();
    $name=$row[0]->name;
    $last=$row[0]->lastname;
    $typeUser=$row[0]->typeUser;
    $curp=$row[0]->curp;
    $email=$row[0]->email;
    $pass=$row[0]->password;
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
    <title>Editar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/basicStyle.css">
</head>

<body >
    <?php include 'barraPrecio.php';
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">     
                <form  action="Connections/Users/editU.php" method="POST">
                    <h3>Editar Datos <i class="fas fa-user-plus"></i></h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerName">Nombre:</label>
                            <input type="text" class="form-control" id="registerName" name="updateName" value=<?php echo $name;?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerLastName">Apellido</label>
                            <input type="text" class="form-control" id="registerLastName" name="updateLastName" value=<?php echo $last;?> required>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="registerCurp">Curp</label>
                            <input type="text" class="form-control" id="registerCurp" name="updateCurp" placeholder="" maxlength="18" value=<?php echo $curp;?> required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Type User</label>
                            <select name="updateTypeUser" class="form-control">
                                <option value="user">Usuario</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="updateEmail" placeholder="" value=<?php echo $email;?> required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword" name="updatePassword">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerConfirm">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="updaterConfirm">
                        </div>
                        <div class="form-group col-md-2" style="display:none">
                            <label for="inputZip">Type User</label>
                            <input type="password" class="form-control" id="pass" name="pass" value=<?php echo $pass;?>>
                        </div>
                        <div class="form-group col-md-2" style="display:none">
                            <label for="inputZip">id</label>
                            <input type="password" class="form-control" id="pass" name="idUser" value=<?php echo $_GET['id'];?>>
                        </div>
                    </div>
                    <!--TARJETA-->
                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="JS/registerUsers.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>

