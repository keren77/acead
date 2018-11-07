<?php

/* 
 Descripcion:       Define todas las opèraciones que se van a usar en todas las pantallas
 * Proyecto:        Academia CEAD
 * Desarrollador:   Nicolle Varela
 * Fecha:           24/10/2018
 */

session_start();
include '../config/db.php';

$conector = new basedatos();


//$creadopor = $_SESSION['userid'];

//validacion de los combobox
if (isset($_POST['cboroles'])){
    $roles = $_POST['cboroles'];
 
} else {
    echo 'aqui se dio el error';
}

if (isset($_POST['cbousuario'])){
    $usuarioid = $_POST['cbousuario'];
} else {
    echo '<script>alert("Debe seleccionar un usuario");window.location="nuevousuario.php";</script>';
}

if (isset($_POST['cbopregunta1'])){
   $pregunta1 = $_POST['cbopregunta1'];
} else {
    echo '<script>alert("Debe seleccionar una pregunta");window.location="nuevousuario.php";</script>';
}

if (isset($_POST['cbopregunta2'])){
  $pregunta2 = $_POST['cbopregunta2'];
} else {
    echo '<script>alert("Debe seleccionar una pregunta");window.location="nuevousuario.php";</script>';
}

if (isset($_POST['cbopregunta3'])){
  $pregunta3 = $_POST['cbopregunta3'];
} else {
    echo '<script>alert("Debe seleccionar una pregunta");window.location="nuevousuario.php";</script>';
}


//tomando el resto de los datos
$nombreusuario = $_POST['txtnombreusuario'];
$contraseña = $_POST['txtcontraseña1'];
$confirmacontraseña = $_POST['txtconfirmacontraseña'];
$usuario = $_POST['txtusuario'];
$respuesta1 = $_POST['txtres1'];
$respuesta2 = $_POST['txtres2'];
$respuesta3 = $_POST['txtres3'];
$fechavencimiento = $_POST['txtfechavencimiento'];
$correo = $_POST['txtcorreo'];
//$userid = $_SESSION['user_name'];

if ($contraseña === $confirmacontraseña){
    
    
}else{
    echo '<script>alert("Las contraseñas no coinciden");window.location="nuevousuario.php";</script>';
}
    

//aqui se llama a la funcion para crear un nuevo usuario
$conector->abrir_conexion();
$conector->insertausuario($usuario, $nombreusuario, $contraseña, $fechavencimiento, $correo, $roles, $usuarioid, "admin", $conector->CONECTOR(), $pregunta1, $pregunta2, $pregunta3, $respuesta1, $respuesta2, $respuesta3);
$conector->cerrar_connexion();
