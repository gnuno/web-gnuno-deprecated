<?php 
    require('php/controller/pageloader.php');
    require('sections/header.php'); 
?>

<div class="containerprincipal">

    <?php require('sections/barra_lateral_iz.php'); ?>

    <div class="cuadrocentral">
        
        <?php loadInnerPage(); ?>

    </div>

    <?php require('sections/barra_lateral_der.php'); ?>

</div>

<?php require('sections/footer.php'); ?>