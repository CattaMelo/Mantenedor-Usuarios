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
            $("#registrar").click(
                    function(){
                        
                        reg_usuario = document.getElementById("reg_usuario").value;
                        pass = document.getElementById("pass").value;
                        nombre = document.getElementById("nombre").value;
                        
                        /*VALIDACIONES*/
                        if (reg_usuario == '') {
                             alert('usuario vacio');
                            return false;
                        }
                        else if (pass == ''){
                             alert('password vacia');
                            return false;
                        }
                         else if (nombre == ''){
                             alert('nombre vacio');
                            return false;
                        }
                        
                         
                        var datos=$("#FormularioGuardar").serialize();
                        $.ajax({
                            type: "POST",
                            data: datos,
                            url: "GuardarUsuario.php",
                            success: function(data)
                            {
                                window.location.href = "ListarSolicitud.php?nom_usuario="+data;
                                
                            }
                        });
                       
                        return true;
                   }
              );
        });
        
        
        </script>

    </head>
    <body>
        <h2>Registra Usuario</h2>
        <form id="FormularioGuardar">
                <label>Usuario:</label>
                <input type="text" id="reg_usuario" name="reg_usuario"><br>
                <label>Password</label>
                <input type="password" id="pass" name="pass"><br>
                <label>Nombre</label>
                <input type="nombre" id="nombre" name="nombre"><br>
           
                <input type="button" class="btn btn-primary" id="registrar" name="registrar" value="Registrar">
                <input type="button" class="btn btn-primary" onclick = "location='Index.php'" value="Volver a Inicio">
        </form>
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
