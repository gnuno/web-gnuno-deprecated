<?php

    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: ./index.php");
    }

    require('../php/init/config.php');
    require('../php/model/ConexionMySQL.php');
    require('../php/model/Usuario.php');
    require('../php/model/Nota.php');


    $objUsuario = new Usuario();
    $objNota = new Nota();

    if(isset($_POST['enviar_nota'])){
        $objNota->agregarNota();
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
    <form action="" method="POST">
        <label for="titulo">Titulo:&nbsp;&nbsp;&nbsp;
        <input type="text" name="titulo" id="titulo"></label>
        <input type="hidden" name="autor" value="<?= $_SESSION['idUsuario'] ?>">
        <input type="hidden" name="tipoNota" value="1">
        <br><br>
        <label for="cuerpo">Cuerpo: 
        <textarea name="cuerpo" id="cuerpo" cols="30" rows="10"></textarea>
        </label><br>
        <br>
        <input type="submit" name="enviar_nota">
        <br>
        <br>
    </form>
    <input type="submit" name="deslogueo" value="Desloguearse">
</body>
</html>