<?php
// Initialize variables to null.
$nameError ="";
$emailError ="";
$commentError = "";
// On submitting form below function will execute.
if(isset($_POST['submit'])){
if (empty($_POST["nombre"])) {
$nameError = "Pone tu nombre";
} else {
$name = test_input($_POST["nombre"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameError = "Solo letras y espacios son admitidos";
}
}
if (empty($_POST["email"])) {
$emailError = "El mail es requerido!";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$emailError = "Formato de email invalido";
}
}
if (empty($_POST["mensaje"])) {
$commentError = "El mail es requerido!";
} else {
$comment = test_input($_POST["mensaje"]);
}
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
//php code ends here
?>