<?php

    session_start();
    
    if(!isset($_SESSION['id'])) {
        header("Location: ./index.php");
    }

    require('../php/init/config.php');
    require('../php/model/ConexionMySQL.php');
    require('../php/model/Usuario.php');
    require('../php/model/Nota.php');


    $objUsuario = new Usuario();
    $objNota = new Nota();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['enviar_nota'])) {
            if (isset($_POST['accion']) && !empty($_POST['accion'])) {
                switch($_POST['accion']) {
                    case 'editar': 
                        $objNota->setIdNota($_POST['idNota']);
                        $objNota->setTipoNota($_POST['tipoNota']);
                        $objNota->setTitulo($_POST['titulo']);
                        $objNota->setCuerpo($_POST['cuerpo']);
                        $objNota->setFecha($_POST['fecha']);
                        $objNota->setAutor($_POST['autor']);

                        // TODO: Codificar eliminación lógica
                        $objNota->setHabilitada($_GET['habilitada']);

                        $objNota->modificarNota($_POST['idNota']);

                        header('Location: panel.php');

                        break;
                    default:
                        break;
                }
            } else {
                $objNota->agregarNota();
                unset($_POST['enviar_nota']);
            }
        }

        if(isset($_POST['deslogueo'])) {
            session_destroy();
            session_unset();
            header("Location: ../index.php");
        }
    } else {
        $accion = false;
        $editar = false;

        if (isset($_GET['accion']) && !empty($_GET['accion'])) {
            $accion = true;            
            switch($_GET['accion']) {
                case 'editar':
                    $editar = true;
                    $notaPorId = $objNota->setIdNota($_GET['id'])->verNotaPorID();
                    break;
                case 'habilitar':
                    $objNota->notaHabilitada($_GET['id'], $_GET['habilitada']);
                    break;
                default: 
                    break;
            }
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
    <script src="../ckeditor/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <!-- Listado de Artículos -->
    <div class="row justify-content-around">
        <?php
        $notas = $objNota->verNotas();
        ?>
        <div class="col col-md8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Título</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo Nota</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notas as $unaNota) { ?>
                    <tr>
                        <th scope="row"><?php echo $unaNota['idNota']; ?></th>
                        <td><?php echo $unaNota['autor']; ?></td>
                        <td><a href="panel.php?accion=editar&id=<?php echo $unaNota['idNota']; ?>" title="<?php echo $unaNota['titulo']; ?>"><?php echo $unaNota['titulo']; ?></a></td>
                        <td><?php echo $unaNota['fecha']; ?></td>
                        <td><?php echo $unaNota['tipoNota']; ?></td>
                        <td><a href="panel.php?accion=habilitar&id=<?php echo $unaNota['idNota']; ?>&habilitada=<?= ($unaNota['habilitada'])?  '0' : '1'; ?>"><?= ($unaNota['habilitada'])?  'Habilitada' : 'Deshabilitada'; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>        
    </div>
    <!-- / Listado de Artículos -->

    <div class="row justify-content-around">
        <div class="col col-md-8">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control form-control-sm" <?php if($accion && $editar) { ?>value="<?php echo htmlentities($notaPorId['titulo']); ?>"<?php } ?> required>
                </div >
                <input type="hidden" name="autor" value="<?= $_SESSION['idUsuario'] ?>">
                <?php if ($accion && $editar) { ?>
                    <input type="hidden" name="idNota" value="<?php echo $notaPorId['idNota']; ?>">
                    <input type="hidden" name="fecha" value="<?php echo $notaPorId['fecha']; ?>">                    
                    <input type="hidden" name="accion" value="editar">
                <?php } ?>
                <input type="hidden" name="tipoNota" value="1">
                <div class="form-group">
                    <label for="cuerpo">Cuerpo:</label>
                    <textarea name="cuerpo" id="cuerpo" class="form-control" cols="30" rows="10" required>
                    <?php
                    if ($accion && $editar) {
                        echo $notaPorId['cuerpo'];
                    }
                    ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="enviar_nota" value="Agregar Nota">
                </div>
                
            </form>
        </div>
        <div class="col col-md-2">
            <form action="" method="POST" style="float:right">
            <input type="submit" name="deslogueo" class="btn btn-danger mb-2 mr-sm-2" value="Desloguearse">
            </form>
        </div>
    </div>
    <script>
        var textarea = document.getElementById('cuerpo');
        var editor = CKEDITOR.replace(textarea,{
            filebrowserBrowseUrl: '../ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
        // FIX: CKFinder no existe
        // CKFinder.setupCKEditor( editor );
    </script>
</body>
</html>