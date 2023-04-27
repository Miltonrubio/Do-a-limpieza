<?php
function conectar(){

    $host="localhost";
    $user="envelope_Milton";
    $pass="=Envelope.220";
    $bd="envelope_2023";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
