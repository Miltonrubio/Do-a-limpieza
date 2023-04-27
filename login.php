

<?php



error_reporting(E_ERROR | E_PARSE); 

//Linea de conexion a la bd

$mysqli=new mysqli("localhost","root","","alba2");
if ($mysqli->connect_errno) {
  //Si hay un error, se muestr un mensaje con el error
  echo "Error al conectarse con My SQL debido al error".$mysqli->connect_error;
};


session_start();
//pide el email
$usu=$_POST['usuario'];

//pide el password
$pass=$_POST['clave'];
//indica el rol del correo y la clave tales como instalador, administrador etc.
$usuarios=$mysqli->query("SELECT * FROM usuarios Where username='".$usu."' AND password='".$pass."'");
if ($usuarios->num_rows==1):
  /*valida que si hay un usuario que coincidan sus datos, ejecute la consulta 
  y guarde los resultados en la variable datos*/
  $datos= $usuarios->fetch_assoc();
  
  //toma los datros de la consulta y los guarda en la sesion "usuario
  $_SESSION['usuario']= $datos;
  //Si se ejecuta, manda que no hay error, y te muestra el rol tomado
    echo json_encode(array('error'=>false,'rol'=>$datos['rol']));


    if ($datos['rol'] == true) {
       
       switch ($datos['rol']) {
            case "Admin";
                echo ("<script> window.location='admin.php'; </script>");
                break;

            case "Usuario";
              echo ("<script> window.location='usuario.php'; </script>");
         
                break;

            default:
        }
    } else {
        echo "<div></div>";
    }



else:

    //si no se ejecuta, te muestra que hay un error
endif;

$mysqli->close();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Doña Limpieza - Entrar o registrarse</title>
</head>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="assets/img/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Inicia Sesión</h1>
                <div>recuerda colocar los datos correctos</div>
            </div>
            <form class="login-card-form" action="" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="text" placeholder="Correo" id="emailForm" name="usuario" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="password" placeholder="Contraseña" id="passwordForm" name="clave" required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" checked>
                        <label for="rememberMeCheckbox">Recordame</label>
                    </div>
                    <a href="#">Olvide mi contraseña</a>
                </div>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <div class="login-card-footer">
                ¿No tienes una cuenta? <a href="#">Registrate</a>
            </div>
        </div>
    </div>

</body>

</html>