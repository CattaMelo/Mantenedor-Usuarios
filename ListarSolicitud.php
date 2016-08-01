<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar solicitudes</title>
         
        
<!--        JavaScript-->
        <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
<!--        Bootstrap-->

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        
        <div class="container">
            
<!--            Mostrar Datos!-->
            <div class="row" id="mostrar">
                
                <h1> Mantenedor de Postulantes, usuario: <?php echo $_REQUEST['nom_usuario']; ?> </h1>
                <table class="table table-hover">
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                      </tr> 
                      <?php 
                      include 'Datos/Conexion.php';

                        $conexion = new Conexion();
                        $conexion->Conectar();
                        $conn= $conexion->getConexion();

                        // obtiene el nro registrod
                        $sql = "select count(*)
                                from Postulante, Solicitud
                                where Solicitud.Postulante_rut = Postulante.rut";
                        if ($stmt = $conn->prepare($sql)) {
                             $stmt->execute();
                            $stmt->bind_result($count);
                          /* obtener valor */
                            $stmt->fetch();
                            $stmt->close();
                        } 

                           // obtiene los datos
                        $sql = "select Postulante.rut
                                        ,CONCAT(Postulante.nombre, ' ', Postulante.apellido_paterno, '  ', Postulante.apellido_materno) nom_postulante
                                        ,Solicitud.estado
                                        ,Solicitud.idSolicitud
                                from Postulante, Solicitud
                                where Solicitud.Postulante_rut = Postulante.rut";
                        if ($stmt = $conn->prepare($sql)) {
                             $stmt->execute();
  
                            $stmt->bind_result($rut, $nom_postulante,$estado, $idSolicitud);

                            for ($i=0; $i < $count; $i++) {
                                /* obtener valor */
                                $stmt->fetch();
                                
                                echo "<tr>";
                                echo "<td>$rut</td>";
                                echo "<td>$nom_postulante</td>";
                                echo "<td>$estado</td>";
                                echo '<td><a href="ver.php?idSolicitud='.$idSolicitud.'">Ver</a>&nbsp;'
                                        . '<a href="editar.php?idSolicitud='.$idSolicitud.'">Editar</a>&nbsp;'
                                        . '<a href="eliminar.php?idSolicitud='.$idSolicitud.'">Eliminar</a></td>';
                                echo "</tr>";
                            }
                            $stmt->close();
                        } 
                      ?> 
                </table>
<input type="button" class="btn btn-primary" onclick = "location='Index.php'" value="Volver a Inicio">                
            </div>
        </div>
    </body>
</html>
