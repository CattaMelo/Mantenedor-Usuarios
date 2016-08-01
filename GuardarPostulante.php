<?php
include 'Entidades/Solicitud.php';
include 'Datos/Conexion.php';
include 'Entidades/Postulante.php';

$conexion = new Conexion();
$conexion->Conectar();
$conn= $conexion->getConexion();

$rut=$_REQUEST["rut"];
$nombre=$_REQUEST["nombre"];
$apellido_paterno=$_REQUEST["apellido_paterno"];
$apellido_materno=$_REQUEST["apellido_materno"];
$fecha_nacimiento=$_REQUEST["fecha_nacimiento"];
$sexo=$_REQUEST["sexo"];
$telefono=$_REQUEST["telefono"];
$email=$_REQUEST["email"];
$direccion=$_REQUEST["direccion"];
$comuna=$_REQUEST["comuna"];
$educacion=$_REQUEST["educacion"];
$experiencia=$_REQUEST["experiencia"];
$modalidad=$_REQUEST["modalidad"];
$curso=$_REQUEST["curso"];
    
$postulante = new Postulante($rut, $nombre, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $sexo, $telefono, $email, $direccion, $comuna, $educacion, $experiencia, $modalidad, $curso);
$postulante->Guardar($conn);

$solicitud=new Solicitud(NULL,'Pendiente', $rut);
$solicitud->Guardar($conn);
$idSolicitud = $solicitud->getIdSolicitud();

$conexion->Desconectar();

echo 'Postulante almacenado, el nro de su solicitud es '.$idSolicitud;
