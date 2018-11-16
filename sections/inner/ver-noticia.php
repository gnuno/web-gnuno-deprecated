<?php
    require('php/init/config.php');
    require('php/model/ConexionMySQL.php');
    require('php/model/Nota.php');
    require('php/model/Usuario.php');
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    setlocale(LC_ALL,"es_ES");
    $objNota = new Nota();
    $objUsuario = new Usuario();
    $objNota->setIdNota(filter_var($_GET['id'],FILTER_VALIDATE_INT));
    $nota = $objNota->verNotaPorID();

    if($nota['habilitada']){
?>
    <div class="articulovistahome">
        <h4><?= $nota['titulo'] ?></h4>
        <p><?= $nota['cuerpo'] ?></p>
        <hr>
        <p><em>Escrito por <?= $objUsuario->verUsuarioPorID($nota['autor'])['nombre'] ?> - <?= $nota['fecha'] ?></em></p>
    </div>
<?php } ?>