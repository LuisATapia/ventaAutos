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
    <title>Editar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/basicStyle.css">
</head>

<body >
    <?php include 'barTop.php';
    include 'Connections/Users/selectOne.php'
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">     
                <form  action="Connections/Users/updateUser.php" method="POST">
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
                    </div>
                    <div class="form-group">
                        <label for="registerCurp">Curp</label>
                        <input type="text" class="form-control" id="registerCurp" name="updateCurp" placeholder="" maxlength="18" value=<?php echo $curp;?> required>
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
                            <input type="password" class="form-control" id="registerTypeUser" name="updateTypeUser" value="user" value=<?php echo $typeUser;?>>
                        </div>
                        <div class="form-group col-md-2" style="display:none">
                            <label for="inputZip">Type User</label>
                            <input type="password" class="form-control" id="pass" name="pass" value=<?php echo $pass;?>>
                        </div>
                    </div>
                    <!--TARJETA-->
                    <h4>Editar Tarjeta <i class="fas fa-credit-card"></i></h4>
                    <div class="form-row">
                        <br>
                        <div class="form-group col-md-6">
                            <label for="registerNumCard">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="registerNumCard" name="updateNumCard" maxlength="16" value=<?php echo $numCard;?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerNumCard">Saldo de Cuenta:</label>
                            <label type="text" class="form-control" id="registerNumCard" name="updateMoney"><?php echo $money;?></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerExp">Fecha de Expiración</label>
                            <input type="text" class="form-control" id="registerExp" name="updateExp" placeholder="DD-YY" value=<?php echo $dateExp;?> required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerCvv">Código CVV</label>
                            <input type="password" class="form-control" id="updateCvv" name="updateCvv" maxlength="4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerCvv">Banco</label>
                            <input type="text" class="form-control" id="updateCvv" name="updateBank" maxlength="4" required="" value=<?php echo $bank;?>>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" id="registerCvv" name="cvv" maxlength="4" value=<?php echo $cvv;?> >
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" id="registerCvv" name="updateMoney" maxlength="4" value=<?php echo $money;?>>
                        </div>
                    </div>
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

