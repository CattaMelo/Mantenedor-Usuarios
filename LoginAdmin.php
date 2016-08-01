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
            $("#ingresar").click(
                    function(){
                        
                        usuario = document.getElementById("usuario").value;
                        pass = document.getElementById("pass").value;
  
                        /*VALIDACIONES*/
                        if (usuario == '') {
                             alert('usuario vacio');
                            return false;
                        }
                        else if (pass == ''){
                             alert('pass vacio');
                            return false;
                        }
                         
                        var datos=$("#LoginAdmin").serialize();
                        $.ajax({
                            type: "POST",
                            data: datos,
                            url: "IngresaUsuario.php",
                            success: function(data)
                            {
                                
                                if (data=='No existe')
                                    window.location.href = "RegistrarUsuario.php";
                                else if (data=='Password Incorecta')
                                    alert(data);
                                else {
                                    window.location.href = "ListarSolicitud.php?nom_usuario="+data;
                               }
 
                                
                            }
                        });
                       
                        return true;
                   }
              );
        });
        
        
        </script>
   </head>
    <body>
            <div class="container">
            
<!--            Mostrar Datos!-->
            <div class="row" id="mostrar">
            <form id="LoginAdmin">
                <h2>Ingresar Administrador</h2>
                <label>Usuario</label>
                <input type="text" id="usuario" name="usuario"><br>
                <label>Password</label>
                <input type="password" id="pass" name="pass"><br>
                
                 <input type="button" class="btn btn-primary" id="ingresar" name="ingresar" value="Ingresar">
                <input type="button" class="btn btn-primary" onclick = "location='Index.php'" value="Volver a Inicio">

                    
                    
            </form>
        </div>
            </div>
        <?php

        ?>
    </body>
</html>
