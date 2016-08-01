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
        include 'Datos/Conexion.php';

        $conexion = new Conexion();
        $conexion->Conectar();
        $conn= $conexion->getConexion();

        $idSolicitud = $_REQUEST['idSolicitud'];
        
        $sql = "select Postulante.rut
                        ,Postulante.email
                        ,Postulante.nombre
                        ,Postulante.direccion
                        ,Postulante.apellido_paterno
                        ,Postulante.comuna
                        ,Postulante.apellido_materno
                        ,Postulante.educacion
                        ,Postulante.fecha_nacimiento
                        ,Postulante.experiencia
                        ,Postulante.sexo
                        ,Postulante.modalidad
                        ,Postulante.telefono
                        ,Postulante.curso
                from Postulante, Solicitud
                where Solicitud.idSolicitud = $idSolicitud
                  and Solicitud.Postulante_rut = Postulante.rut";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($rut, $email, $nombre, $direccion,$apellido_paterno, $comuna, $apellido_materno,$educacion, $fecha_nacimiento, $experiencia, $sexo, $modalidad, $telefono, $curso);
                          
            /* obtener valor */
            $stmt->fetch();
            $stmt->close();
        } 
         ?>
       <div class="container">
            
<!--            Mostrar Datos!-->
            <div class="row" id="mostrar">
                
                <h1> Ficha Postulante </h1>
        <table  class="table table-hover">
            <tr>
                <td>Rut</td>
                <td><?php echo $rut; ?></td>
                <td>Email</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><?php echo $nombre; ?></td>
                <td>Direccion</td>
                <td><?php echo $direccion?></td>
            </tr>
            <tr>
                <td>Apellido Paterno</td>
                <td><?php echo $apellido_paterno ?></td>
                <td>Comuna</td>
                <td><?php echo $comuna ?></td>
            </tr>
            <tr>
                <td>Apellido Materno</td>
                <td><?php echo $apellido_materno ?></td>
                <td>Educacion</td>
                <td><?php echo $educacion ?></td>
            </tr>
            <tr>
                <td>Fecha Nacimiento</td>
                <td><?php echo $fecha_nacimiento ?></td>
                <td>Experiencia Laboral</td>
                <td><?php echo $experiencia ?></td>
            </tr> 
             <tr>
                <td>Sexo</td>
                <td><?php echo $sexo ?></td>
                <td>Modalidad</td>
                <td><?php echo $modalidad ?></td>                
            </tr>
             <tr>
                <td>Telefono</td>
                <td><?php echo $telefono ?></td>
                <td>Curso</td>
                <td><?php echo $curso ?></td>
            </tr> 
            
        </table>
            </div>
  <input type="button" class="btn btn-primary" onclick = "location='ListarSolicitud.php'" value="Volver al Listado">                

       </div>
      
        <?php
        // put your code here
        ?>
    </body>
</html>
