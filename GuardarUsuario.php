<?php
include 'Datos/Conexion.php';
include 'Entidades/Usuario.php';

$conexion = new Conexion();
$conexion->Conectar();
$conn= $conexion->getConexion();

$reg_usuario=$_REQUEST["reg_usuario"];
$pass=$_REQUEST["pass"];
$nombre=$_REQUEST["nombre"];

$usuario = new Usuario(null, $reg_usuario, $pass, $nombre);
    
$usuario->Guardar($conn);
$conexion->Desconectar();

echo $usuario->getNombre();