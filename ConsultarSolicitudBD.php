<?php
include 'Entidades/Solicitud.php';
include 'Datos/Conexion.php';

$conexion = new Conexion();
$conexion->Conectar();
$conn= $conexion->getConexion();

$rut=$_REQUEST["rut"];
$nro_solicitud=$_REQUEST["nro_solicitud"];
    
$solicitud=new Solicitud(NULL,null, null);
if ($solicitud->Leer($conn, $rut, $nro_solicitud)) {
    $estado = $solicitud->getEstado();
    $fecha_ingreso = $solicitud->getFecha_ingreso();

    echo "Estado solicitud: $estado";
        
   if($estado=="Aprobado")
    {
        echo ' Dentro de un plazo máximo de48horas, uno de nuestrosejecutivossepondrá en contactocon usted';
    }
    elseif($estado=='Rechazado')
    {
        echo ' Para más información puede llamarnos al número que aparece en nuestra página oficial';
    }
}

$conexion->Desconectar();

