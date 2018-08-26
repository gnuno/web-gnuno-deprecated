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
    <title>GNUno - Users GNU/Linux de la UNO</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <form action="" method="POST">
        <label for="usuario">Usuario: 
        <input type="text" name="usuario" id="usuario"></label>
        <label for="password_u">Password: 
        <input type="password" name="password_u" id="password_u"></label>
        <input type="submit" name="login">
    </form>
</body>
</html>