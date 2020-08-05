
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/basicStyle.css">
</head>

<body >
    <?php include 'topNav.php';
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">     
                <form  action="Connections/Users/addUser.php" method="POST">
                    <h3>Datos Usuario <i class="fas fa-user-plus"></i></h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerName">Nombre:</label>
                            <input type="text" class="form-control" id="registerName" name="registerName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerLastName">Apellido</label>
                            <input type="text" class="form-control" id="registerLastName" name="registerLastName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registerCurp">Curp</label>
                        <input type="text" class="form-control" id="registerCurp" name="registerCurp" placeholder="" maxlength="18">
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="registerEmail" placeholder="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword" name="registerPassword">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerConfirm">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="registerConfirm">
                        </div>
                        <div class="form-group col-md-2" style="display:none">
                            <label for="inputZip">Type User</label>
                            <input type="password" class="form-control" id="registerTypeUser" name="registerTypeUser" value="user">
                        </div>
                    </div>
                    <!--TARJETA-->
                    <h4>Tarjeta <i class="fas fa-credit-card"></i></h4>
                    <div class="form-row">
                        <br>
                        <div class="form-group col-md-6">
                            <label for="registerNumCard">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="registerNumCard" name="registerNumCard" maxlength="16">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerNumCard">Banco</label>
                            <input type="text" class="form-control" id="registerBank" name="registerBank" maxlength="16">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="registerExp">Fecha de Expiración</label>
                            <input type="text" class="form-control" id="registerExp" name="registerExp" placeholder="DD-YY">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="registerCvv">Código CVV</label>
                            <input type="password" class="form-control" id="registerCvv" name="registerCvv" maxlength="4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="registerCvv">Saldo</label>
                            <input type="money" class="form-control" id="registerMoney" name="registerMoney" maxlength="10">
                        </div>
                    </div>
                    
                    <div class="justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="JS/registerUsers.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>

