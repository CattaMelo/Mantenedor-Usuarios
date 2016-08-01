<?php

include_once '/Entidades/Usuario.php';
include_once '/Datos/Conexion.php';

$conexion = new Conexion();
$conexion->Conectar();
$conn= $conexion->getConexion();

$usuario=$_REQUEST["usuario"];
$pass=$_REQUEST["pass"];

 
$usu = new Usuario(null,NULL,NULL,NULL);
if(!$usu->Buscar($conn, $usuario))
{
    echo 'No existe';
}
else if(!$usu->VerificaPass($conn, $usuario, $pass))
{
    echo 'Password Incorecta';
}
 else {
    echo $usu->getNombre();
 }