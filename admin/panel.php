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
        unset($_POST['enviar_nota']);
    }

    if(isset($_POST['deslogueo'])){
        session_destroy();
        session_unset();
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
    <div class="row">
        <div class="col-md-3 ml-md-auto">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control form-control-sm" required>
                </div >
                <input type="hidden" name="autor" value="<?= $_SESSION['idUsuario'] ?>">
                <input type="hidden" name="tipoNota" value="1">
                <div class="form-group">
                    <label for="cuerpo">Cuerpo:</label>
                    <textarea name="cuerpo" id="cuerpo" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <input class="btn btn-primary" type="submit" name="enviar_nota" value="Agregar Nota">
                
            </form>
        </div>
        <div class="col-md-2 ml-md-auto">
            <form action="" method="POST" style="float:right">
            <input type="submit" name="deslogueo" class="btn btn-danger mb-2 mr-sm-2" value="Desloguearse">
            </form>
        </div>
    </div>

</body>
</html>