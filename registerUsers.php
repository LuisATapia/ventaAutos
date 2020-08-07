
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
    <style>
    body {
      background-image: url(img/bmw.jpg);
      background-attachment: fixed;
      background-size: 100vw 100vh;
    }
    form{
      background-color: rgba(255, 255, 255, 0.9);
        padding: 25px;
        border-radius: 15px;
    }
</style>
<script src="js/Validaciones.js"></script> 
</head>

<body >
    <?php include 'topNav.php';
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">     
                <form  action="Connections/Users/addUser.php" method="POST" onsubmit="return validarUsuarios()">
                    <h3>Datos Usuario <i class="fas fa-user-plus"></i></h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerName">Nombre:</label>
                            <input type="text" class="form-control" id="registerName" name="registerName" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerLastName">Apellido</label>
                            <input type="text" class="form-control" id="registerLastName" name="registerLastName" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registerCurp">Curp</label>
                        <input type="text" class="form-control" id="registerCurp" name="registerCurp" placeholder="" maxlength="18" required="">
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="registerEmail" placeholder="" required="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword" name="registerPassword" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registerConfirm">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="registerConfirm" required="">
                        </div>
                        <div class="form-group col-md-2" style="display:none">
                            <label for="inputZip">Type User</label>
                            <input type="password" class="form-control" id="registerTypeUser" name="registerTypeUser" value="user">
                        </div>
                        <div class="justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div> 
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

