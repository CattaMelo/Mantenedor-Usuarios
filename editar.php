<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario del postulante</title>
        
        <!--        JavaScript-->
        <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
<!--        Bootstrap-->

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        
       <script>
        $(document).ready(function(){
            $("#guardar").click(
                    function(){
                        
                        rut = document.getElementById("rut").value;
                        nombre = document.getElementById("nombre").value;
                        apellido_paterno = document.getElementById("apellido_paterno").value;
                        apellido_materno = document.getElementById("apellido_materno").value;
                        fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
                         telefono = document.getElementById("telefono").value;
                        email = document.getElementById("email").value;
                        direccion = document.getElementById("direccion").value;
                        comuna = document.getElementById("comuna").value;
                        educacion = document.getElementById("educacion").value;
                        experiencia = document.getElementById("experiencia").value;
                        modalidad = document.getElementById("modalidad").value;
                        curso = document.getElementById("curso").value;
                        /*VALIDACIONES*/
                        if (rut == '') {
                             alert('rut vacio');
                            return false;
                        }
                        else if (nombre == ''){
                             alert('nombre vacio');
                            return false;
                        }
                         else if (apellido_paterno == ''){
                             alert('apellido paterno vacio');
                            return false;
                        }
                        else if (apellido_materno == ''){
                             alert('apellido materno vacio');
                            return false;
                        }
                        else if (fecha_nacimiento == ''){
                             alert('fecha nacimiento vacio');
                            return false;
                        } 
                        else if (telefono == ''){
                             alert('telefono vacio');
                            return false;
                        }
                         else if (email == ''){
                             alert('email vacio');
                            return false;
                        }
                        else if (direccion == ''){
                             alert('direccion vacio');
                            return false;
                        }
                        else if (comuna == ''){
                             alert('comuna vacio');
                            return false;
                        }
                           else if (educacion == ''){
                             alert('educacion vacio');
                            return false;
                        }
                          else if (experiencia == ''){
                             alert('experiencia vacio');
                            return false;
                        }
                          else if (modalidad == ''){
                             alert('modalidad vacio');
                            return false;
                        }
                          else if (curso == ''){
                             alert('curso vacio');
                            return false;
                        }
                        
                         
                        var datos=$("#FormularioGuardar").serialize();
                        $.ajax({
                            type: "POST",
                            data: datos,
                            url: "ActualizarPostulante.php",
                            success: function(data)
                            {
                                alert(data);
                                
                                 window.location.href = "ListarSolicitud.php";
                            }
                        });
                       
                        return true;
                   }
              );
        });
        
        
        </script>

    </head>
    <body>
        <div container>    
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
        <div id="agregar">
            <div class="modal-dialog">
                <div class="modal-content span12">
                    <div class="modal-header">
                        
                        <button type="button" class="close"></button>
                        <h4 class="modal-title">Formulario Postulante</h4>    
                    </div> 
                    <div class="modal-body">
                        
                       <form id="FormularioGuardar">     <!-- FORMULARIO-->
                            <div class="form-group">
                                <label for="rut_cliente">Rut</label>
                                <label class="label4" for="direccion">Direccion</label>
                            </div>  
                            <div class="form-group">
                                <input type="text" class="form-control" id="rut" name="rut" value="<?php echo $rut; ?>">
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
                                <input type="hidden" class="form-control" id="idSolicitud" name="idSolicitud" value="<?php echo $idSolicitud; ?>">
                            </div> 
                            <div class="form-group">
                                  <label for="nombre">Nombre</label>
                                  <label class="label3" for="comuna">Comuna</label>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                              <select class="form-control" id="comuna" name="comuna">
                                <option value="Santiago" <?php if ($comuna=="Santiago") echo "selected"; ?>>Santiago</option>
                                <option value="Vitacura" <?php if ($comuna=="Vitacura") echo "selected"; ?>>Vitacura</option>
                                <option value="San Ramon" <?php if ($comuna=="San Ramon") echo "selected"; ?>>San Ramón</option>
                                <option value="San Miguel" <?php if ($comuna=="San Miguel") echo "selected"; ?>>San Miguel</option>
                                <option value="San Joaquin" <?php if ($comuna=="San Joaquin") echo "selected"; ?>>San Joaquín</option>
                                <option value="Renca" <?php if ($comuna=="Renca") echo "selected"; ?>>Renca</option>
                                <option value="Recoleta" <?php if ($comuna=="Recoleta") echo "selected"; ?>>Recoleta</option>
                                <option value="Quinta Normal" <?php if ($comuna=="Quinta Normal") echo "selected"; ?>>Quinta Normal</option>
                                <option value="Quilicura" <?php if ($comuna=="Quilicura") echo "selected"; ?>>Quilicura</option>
                                <option value="Pudahuel" <?php if ($comuna=="Pudahuel") echo "selected"; ?>>Pudahuel</option>
                                <option value="Providencia" <?php if ($comuna=="Providencia") echo "selected"; ?>>Providencia</option>
                                <option value="Penalolen" <?php if ($comuna=="Penalolen") echo "selected"; ?>>Peñalolen</option>
                                <option value="Pedro Aguirre Cerda" <?php if ($comuna=="Pedro Aguirre Cerda") echo "selected"; ?>>Pedro Aguirre Cerda</option>
                                <option value="Nunoa" <?php if ($comuna=="Nunoa") echo "selected"; ?>>Ñuñoa</option>
                                <option value="Maipu" <?php if ($comuna=="Maipu") echo "selected"; ?>>Maipú</option>
                                <option value="Macul" <?php if ($comuna=="Macul") echo "selected"; ?>>Macul</option>
                                <option value="Lo Prado" <?php if ($comuna=="Lo Prado") echo "selected"; ?>>Lo Prado</option>
                                <option value="Lo Espejo" <?php if ($comuna=="Lo Espejo") echo "selected"; ?>>Lo Espejo</option>
                                <option value="Lo Barnechea" <?php if ($comuna=="Lo Barnechea") echo "selected"; ?>>Lo Barnechea</option>
                                <option value="Las Condes" <?php if ($comuna=="Las Condes") echo "selected"; ?>>Las Condes</option>
                                <option value="La Reina" <?php if ($comuna=="La Reina") echo "selected"; ?>>La Reina</option>
                                <option value="La Pintana" <?php if ($comuna=="La Pintana") echo "selected"; ?>>La Pintana</option>
                                <option value="La Granja" <?php if ($comuna=="La Granja") echo "selected"; ?>>La Granja</option>
                                <option value="La Florida" <?php if ($comuna=="La Florida") echo "selected"; ?>>La Florida</option>
                                <option value="La Cisterna" <?php if ($comuna=="La Cisterna") echo "selected"; ?>>La Cisterna</option>
                                <option value="Independencia" <?php if ($comuna=="Independencia") echo "selected"; ?>>Independencia</option>
                                <option value="Huechuraba" <?php if ($comuna=="Huechuraba") echo "selected"; ?>>Huechuraba</option>
                                <option value="Estacion Central" <?php if ($comuna=="Estacion Central") echo "selected"; ?>>Estación Central</option>
                                <option value="El Bosque" <?php if ($comuna=="El Bosque") echo "selected"; ?>>El Bosque</option>
                                <option value="Conchali" <?php if ($comuna=="Conchali") echo "selected"; ?>>Conchalí</option>
                                <option value="Cerro Navia" <?php if ($comuna=="Cerro Navia") echo "selected"; ?>>Cerro Navia</option>
                                <option value="Cerrillos" <?php if ($comuna=="Cerrillos") echo "selected"; ?>>Cerrillos</option>                             
                              </select>
                            </div>
                            
                            <div class="form-group">                               
                                 <label for="apellido_paterno">Apellido Paterno</label>
                                 <label class="label2" for="educacion">Educacion</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>">
                                <select class="form-control" id="educacion" name="educacion">
                                    <option value="Profesional" <?php if ($educacion=="Profesional") echo "selected"; ?>>Profesional</option>
                                    <option value="Tecnico"  <?php if ($educacion=="Tecnico") echo "selected"; ?>>Técnico</option>
                                    <option value="Media" <?php if ($educacion=="Media") echo "selected"; ?>>Media</option>
                                    <option value="Basica" <?php if ($educacion=="Basica") echo "selected"; ?>>Básica</option>
                                    <option value="No Posee" <?php if ($educacion=="No Posee") echo "selected"; ?>>No Posee</option>
                                </select>
                            </div>

                           <div class="form-group">
                                  <label for="apellido_materno">Apellido Materno</label>
                                  <label for="experiencia">Experiencia</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?php echo $apellido_materno; ?>">
                                <input type="text" class="form-control" id="experiencia" name="experiencia" value="<?php echo $experiencia; ?>">     
                            </div>
                                      
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <label class="label4" for="sexo">Sexo</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">
                                <input type="radio" name="sexo" value="M" checked> M
                                <input type="radio" name="sexo" value="F"> F<br>
                            </div>
                            
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <label class="label4" for="modalidad">Modalidad</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                                <select class="form-control" id="modalidad" name="modalidad" >
                                    <option value="Diurna" <?php if ($modalidad=="Diurna") echo "selected"; ?>>Diurna</option>
                                    <option value="Vespertina" <?php if ($modalidad=="Vespertina") echo "selected"; ?>>Vespertina</option>                                    
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <label class="label4" for="curso">Curso</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                <select class="form-control" id="curso" name="curso" >
                                    <option value="Java" <?php if ($curso=="Java") echo "selected"; ?>>Java</option>
                                    <option value=".NET" <?php if ($curso==".NET") echo "selected"; ?>>.NET</option>
                                    <option value="PHP" <?php if ($curso=="PHP") echo "selected"; ?>>PHP</option>                                    
                                </select>
                            </div>
                             <div class="form-group">
                                 <input type="checkbox" name="estado" value="Aprobado"> Aprobar<br>
                            </div>
                           
                            
                            <div class="form-group">
                                <input type="button" class="btn btn-primary" id="guardar" name="guardar" value="Actualizar">
                                <input type="button" class="btn btn-primary" onclick = "location='ListarSolicitud.php'" value="Volver al Listado">                
                            </div>
                        </form>
                    </div>
                </div>   
            </div>  
        </div>
    </div>    
        
        <?php
        // put your code here
        ?>
    </body>
</html>
