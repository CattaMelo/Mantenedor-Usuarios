<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
        <!--        JavaScript-->
        <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        
<!--        Bootstrap-->

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        
        
        <div id="login">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        
                        <h4>Seleccione el tipo de Login</h4>
                        
                        <input type="submit" onclick="location='LoginAdmin.php'" value="Ejecutivo Admision">
                        <input type="submit" onclick = "location='AgregarPostulante.php'" value="Postulante">
                        <input type="submit" onclick = "location='ConsultaSolicitud.php'" value="Consultar Estado">
                        
                        
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
