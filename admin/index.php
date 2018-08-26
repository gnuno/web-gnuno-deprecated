<?php
    require('../php/init/config.php');
    require('../php/model/ConexionMySQL.php');
    require('../php/model/Usuario.php');

    $objUsuario = new Usuario();

    if(isset($_POST['login'])){
        if($objUsuario->validarPassword($_POST['usuario'], $_POST['password_u'])){
            session_start();
            $_SESSION['id'] = md5(date("Y:m:d"));
            $_SESSION['idUsuario'] = $objUsuario->getIdUsuario();
            $_SESSION['permisos'] = $objUsuario->getPermisos();
            unset($_POST['login']);
            header("Location: panel.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="http://www.favicon.cc/logo3d/19880.png">
    <title>GNUno - Panel de Control</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col col-md-3">
                <form class="form-signin" action="" method="POST">
                    <h2 class="form-signin-heading">Login</h2>
                    <label for="usuario" class="sr-only">Email address</label>
                    <input type="email" id="usuario" name="usuario" class="form-control mb-2 mr-sm-2" placeholder="Email" required autofocus="on">
                    <label for="password_u" class="sr-only">Password</label>
                    <input type="password" id="password_u" name="password_u" class="form-control mb-2 mr-sm-2" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>