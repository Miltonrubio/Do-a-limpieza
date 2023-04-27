

<form method="post">

<input type="email" name="miCampo" class="form-control" placeholder="Ingresa tu correo para la confirmacion" required>
    <br><br>
              <button class="button btn btn-primary" type="submit">Pagar ahora con Paypal</button>

</form >


<?php
session_start();

$correousuario = $_POST['miCampo'];
$_SESSION['usuario'] = $correousuario;


echo $_SESSION['usuario'];


// Eliminar todas las variables de sesión
session_unset();
 
// Cerrar sesión
session_destroy();
?>