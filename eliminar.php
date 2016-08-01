<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--        JavaScript-->
        <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
<!--        Bootstrap-->

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<?php 
include 'Entidades/Solicitud.php';
include 'Datos/Conexion.php';
include 'Entidades/Postulante.php';

$conexion = new Conexion();
$conexion->Conectar();
$conn= $conexion->getConexion();

$idSolicitud=$_REQUEST["idSolicitud"];
$solicitud=new Solicitud($idSolicitud,null, null);
$solicitud->Eliminar($conn);



$conexion->Desconectar();

echo 'Solicitud eliminada';
         ?>
       <div class="container">
            
  <input type="button" class="btn btn-primary" onclick = "location='ListarSolicitud.php'" value="Volver al Listado">                

       </div>
      
        <?php
        // put your code here
        ?>
    </body>
</html>