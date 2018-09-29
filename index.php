<?php 
    require('php/controller/pageloader.php');
    require('sections/header.php'); 
?>
<div class="w3-container">
        <div class="w3-row">
            <div class="w3-col l2">
                <?php require('sections/barra_lateral_iz.php'); ?>
            </div>        

            <div class="w3-col l8 w3-padding-right w3-padding-left">        
                <?php loadInnerPage(); ?>
            </div>

        <?php require('sections/barra_lateral_der.php'); ?>
        </div>
</div><!-- .w3-container -->
<?php require('sections/footer.php'); ?>