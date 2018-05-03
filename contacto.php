<?php

$errorNombre = $errorMail = $errorMensaje = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);    
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);

    if (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $email)) 
    {
        $errorMail = 'El email ingresado no es válido.';
    }

    if ($nombre == '')
        $errorNombre = 'Debes ingresar tu nombre.';

    if ($mensaje == '')
        $errorMensaje = 'Debes ingresar un comentario.';

    if ($errorMail == '' && $errorNombre == '' && $errorMensaje == '')
    {
        $receptor = 'matiasnoriega86@gmail.com';
        $encabezados = 'From: Contacto GNUno.com.ar <' . $email . '>' . "\r\n";
        $asunto = 'Contacto GNUno.com.ar';

        mail($receptor, $asunto, $mensaje, $encabezados);
    }

}

require('sections/header.php');
?>

    <div class="containerprincipal">
        
        <?php require('sections/barra_lateral_iz.php'); ?>

        <div class="cuadrocentral">
            <div class="articulovistahome">       
                <p style="font-family: monospace">Solicitá acceso a la lista de correos haciendo click <a target="_blank" href="http://lista.gnuno.com.ar/listinfo/uno-informatica">ACÁ</a>.</p>
                    
                <hr>
            
                <p style="font-family: monospace">También podés entrar al <a target="_blank" href="http://www.uno-foros.com.ar/viewforum.php?f=250">FORO</a></p>
                    
                <hr>
                
                <p style="font-family: monospace">Mandanos un mensaje desde acá</p>

                <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
                    Nombre:<br>
                    <input name="nombre" type="text" required value="" size="30"/>
                    <span style="color:red">* <?php if ($errorNombre != '') echo $errorNombre;?></span><br>

                    Email:<br>
                    <input name="email" required type="text" value="" size="30"/>
                    <span style="color:red">* <?php if ($errorMail != '') echo $errorMail;?></span><br>
                    
                    Mensaje:<br>            
                    <textarea name="mensaje" required rows="7" cols="30"></textarea>
                    <span style="color:red">* <?php if ($errorMensaje != '') echo $errorMensaje;?></span><br>
                    
                    <input name="submit" type="submit" value="Enviar"/>
                </form>	    					
                <hr>
           </div>    
        </div>
            
        <?php require('sections/barra_lateral_der.php'); ?>

    </div>
    
<?php require('sections/footer.php'); ?>