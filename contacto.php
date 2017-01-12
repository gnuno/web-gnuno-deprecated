<!DOCTYPE html> 
<?php
$emailError ="";
if(isset($_POST['submit'])){

$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$emailError = "Formato de email invalido";
}
    
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
}
//php code ends here
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
       
    <p style="font-family: monospace">Solicita acceso a la lista de correos enviando un mail <a target="_blank" href="http://lista.gnuno.com.ar/listinfo/uno-informatica">ACÁ</a>.</p>
        
     <hr>
        <p style="font-family: monospace">Podes entrar al <a target="_blank" href="http://www.uno-foros.com.ar/viewforum.php?f=250">FORO</a> tambien.</p>
        
     <hr>
    <p style="font-family: monospace">Mandanos un mensaje desde aca</p>
    <form  action="#" method="POST">
    Nombre:<br>
    <input name="nombre" type="text" required value="" size="30"/>
        <span style="color:red">* <?php echo $nameError;?></span>
        <br>
    Email:<br>
    <input name="email" required type="text" value="" size="30"/>
        <span style="color:red">* <?php echo $emailError;?></span><br>
    Mensaje:<br>
    <textarea name="mensaje" required rows="7" cols="30"></textarea>
        <span style="color:red">* <?php echo $commentError;?></span><br>
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
  
<footer>GNUNO 2016</footer>


</body>
</html>
