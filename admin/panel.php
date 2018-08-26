<?php

    session_start();
    require('../php/init/config.php');
    require('../php/model/ConexionMySQL.php');
    require('../php/model/Usuario.php');

    $objUsuario = new Usuario();

    if(!isset($_SESSION['id'])){
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
</body>
</html>