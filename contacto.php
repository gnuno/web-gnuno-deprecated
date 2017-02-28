<!DOCTYPE html> 
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
?>
<html>
<head>
<title>GNUno - Users GNU/Linux de la UNO</title>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="noindex, nofollow" name="robots">
    <script type="text/javascript" src="scripts/alert.js"></script>
</head>
<body>
    <header>
        <img class="inner" src="images/tuxgnu.png" width="170" height="193" alt="Logo GNU/Linux"/><h1 class="inner" style="font-family:monospace; font-weight:bolder; font-size:20px; min-width: 600px">GNUno - Usuarios de GNU/Linux de la Universidad Nacional del Oeste</h1>
    </header>

    <div class="continerprincipal">
        <div class="barraizquierda">
            <nav class="navbar">
                <h3 class="headerboxes">Contenidos</h3>
                <ul>    
                    <li class="linav"><a href="index.html">Inicio</a></li>
                    <li class="linav"><a href="softwarelibre.html">Software Libre</a></li>
                    <li class="linav"><a href="nosotros.html">¿Que es GNUno?</a></li>
                    <li class="linav"><a href="proyectos.html">Proyectos</a></li>
                    <li class="linav"><a href="eventos.html">Eventos</a></li>
                    <li class="linav"><a href="contacto.php">Contacto</a></li>
                </ul>
            </nav>
            <nav class="navbar2">
                <h3 class="headerboxes">Links</h3>
                <ul>    
                    <li class="linav"><a href="http://www.uno.edu.ar" target="_blank">Universidad Nacional del Oeste</a></li>
                    <li class="linav"><a href="http://www.uno-foros.com.ar" target="_blank">Foro No-Oficial de la UNO</a></li>
                    <li class="linav"><a href="https://www.gnu.org/gnu/gnu.html" target="_blank">Proyecto GNU</a></li>
                    <li class="linav"><a href="https://www.fsf.org/?set_language=es" target="_blank">Free Software Fundation</a></li>
                </ul>
            </nav>
        </div>

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
            
        <div class="barraderecha">
            <div class="navbarderecha">
                <h3 class="headerboxes">Amigos</h3>

                <a href="http://flisol.info/" target="_blank"><img src="images/flisol.png" alt="Link Flisol"  class="imagenesamigos"/></a>
                
                <a href="http://www.lanux.org.ar/" style="margin-top: 20px" target="_blank" ><img src="images/lanux.png" alt="Link Lanux" class="imagenesamigos"/></a>
            </div>
        </div>
    </div>
      
    <footer>GNUNO <?php echo date('Y'); ?></footer>
</body>
</html>
