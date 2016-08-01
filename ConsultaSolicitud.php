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
        
       <script>
        $(document).ready(function(){
            $("#consultar").click(
                    function(){
                         rut = document.getElementById("rut").value;
                          nro_solicitud = document.getElementById("nro_solicitud").value;
                        //VALIDACIONES
                        if (rut == '') {
                             alert('rut vacio');
                            return false;
                        }
                        else if (nro_solicitud == ''){
                             alert('numero solicitud vacio');
                            return false;
                        }
                         
                         
                        var datos=$("#FormularioConsultar").serialize();
                        $.ajax({
                            type: "POST",
                            data: datos,
                            url: "ConsultarSolicitudBD.php",
                            success: function(data)
                            {
                                alert(data);
                            }
                        });
                      
                       
                        return true;
                   }
              );
        });
        
        
        </script>

    </head>
    <body>
        <div>
            <h2>Consultar solicitud</h2>
            <br>
            <form id="FormularioConsultar">
            <label>Rut</label>
            <input type="text" id="rut" name="rut" >
            <label>Número Solicitud</label>
            <input type="text" id="nro_solicitud" name="nro_solicitud">
            <input type="button" class="btn btn-primary"  id="consultar" name="consultar" value="Consultar">  
            <input type="button" class="btn btn-primary" onclick = "location='Index.php'" value="Volver a Inicio">

        

            </form>
        </div>
            
        
        <?php
        // put your code here
        ?>
    </body>
</html>
