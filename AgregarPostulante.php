<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Postulante</title>
        
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
                            url: "GuardarPostulante.php",
                            success: function(data)
                            {
                                alert(data);
                                
                                document.getElementById("rut").value="" ;
                                document.getElementById("nombre").value="";
                                document.getElementById("apellido_paterno").value="";
                                document.getElementById("apellido_materno").value="";
                                document.getElementById("fecha_nacimiento").value="";
                                document.getElementById("telefono").value="";
                                document.getElementById("email").value="";
                                document.getElementById("direccion").value="";
                                comuna = document.getElementById("comuna").value;
                                educacion = document.getElementById("educacion").value;
                                document.getElementById("experiencia").value="";
                                modalidad = document.getElementById("modalidad").value;
                                curso = document.getElementById("curso").value;
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
    
        <div id="agregar">
            <div class="modal-dialog">
                <div class="modal-content span12">
                    <div class="modal-header">
                        
                        <button type="button" class="close"></button>
                        <h4 class="modal-title">Nuevo Postulante</h4>    
                    </div> 
                    <div class="modal-body">
                        
                       <form id="FormularioGuardar">     <!-- FORMULARIO-->
                            <div class="form-group">
                                <label for="rut_cliente">Rut</label>
                                <label class="label4" for="direccion">Direccion</label>
                            </div>  
                            <div class="form-group">
                                <input type="text" class="form-control" id="rut" name="rut">
                                <input type="text" class="form-control" id="direccion" name="direccion">
                            </div> 
                            <div class="form-group">
                                  <label for="nombre">Nombre</label>
                                  <label class="label3" for="comuna">Comuna</label>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="nombre" name="nombre">
                              <select class="form-control" id="comuna" name="comuna" >
                                <option value="Santiago">Santiago</option>
                                <option value="Vitacura">Vitacura</option>
                                <option value="San Ramon">San Ramón</option>
                                <option value="San Miguel">San Miguel</option>
                                <option value="San Joaquin">San Joaquín</option>
                                <option value="Renca">Renca</option>
                                <option value="Recoleta">Recoleta</option>
                                <option value="Quinta Normal">Quinta Normal</option>
                                <option value="Quilicura">Quilicura</option>
                                <option value="Pudahuel">Pudahuel</option>
                                <option value="Providencia">Providencia</option>
                                <option value="Penalolen">Peñalolen</option>
                                <option value="Pedro Aguirre Cerda">Pedro Aguirre Cerda</option>
                                <option value="Nunoa">Ñuñoa</option>
                                <option value="Maipu">Maipú</option>
                                <option value="Macul">Macul</option>
                                <option value="Lo Prado">Lo Prado</option>
                                <option value="Lo Espejo">Lo Espejo</option>
                                <option value="Lo Barnechea">Lo Barnechea</option>
                                <option value="Las Condes">Las Condes</option>
                                <option value="La Reina">La Reina</option>
                                <option value="La Pintana">La Pintana</option>
                                <option value="La Granja">La Granja</option>
                                <option value="La Florida">La Florida</option>
                                <option value="La Cisterna">La Cisterna</option>
                                <option value="Independencia">Independencia</option>
                                <option value="Huechuraba">Huechuraba</option>
                                <option value="Estacion Central">Estación Central</option>
                                <option value="El Bosque">El Bosque</option>
                                <option value="Conchali">Conchalí</option>
                                <option value="Cerro Navia">Cerro Navia</option>
                                <option value="Cerrillos">Cerrillos</option>                                
                              </select>
                            </div>
                            
                            <div class="form-group">                               
                                 <label for="apellido_paterno">Apellido Paterno</label>
                                 <label class="label2" for="educacion">Educacion</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno">
                                <select class="form-control" id="educacion" name="educacion" >
                                   <option value="Profesional">Profesional</option>
                                    <option value="Tecnico">Técnico</option>
                                    <option value="Media">Media</option>
                                    <option value="Basica">Básica</option>
                                    <option value="No Posee">No Posee</option>
                                </select>
                            </div>

                           <div class="form-group">
                                  <label for="apellido_materno">Apellido Materno</label>
                                  <label for="experiencia">Experiencia</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno">
                                <input type="text" class="form-control" id="experiencia" name="experiencia">     
                            </div>
                                      
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <label class="label4" for="sexo">Sexo</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                <input type="radio" name="sexo" value="M" checked> M
                                <input type="radio" name="sexo" value="F"> F<br>
                            </div>
                            
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <label class="label4" for="modalidad">Modalidad</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telefono" name="telefono">
                                <select class="form-control" id="modalidad" name="modalidad">
                                    <option value="Diurna">Diurna</option>
                                    <option value="Vespertina">Vespertina</option>                                    
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <label class="label4" for="curso">Curso</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email">
                                <select class="form-control" id="curso" name="curso">
                                    <option value="Java">Java</option>
                                    <option value=".NET">.NET</option>
                                    <option value="PHP">PHP</option>                                    
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                                <input type="button" class="btn btn-primary" id="guardar" name="guardar" value="Guardar">
                                <input type="button" class="btn btn-primary" onclick = "location='Index.php'" value="Volver a Inicio">
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
