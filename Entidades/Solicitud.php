<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Solicitud
 *
 * @author Catta
 */
class Solicitud {
    private $idSolicitud;
    private $estado;  
    private $fecha_ingreso;
    private $postulante_rut;
    
    function __construct($idSolicitud, $estado, $postulante_rut) {
        $this->idSolicitud = $idSolicitud;
        $this->estado = $estado;
        $this->postulante_rut = $postulante_rut;
    }
    
       
    function Guardar($conn) {
        $sql = "insert into Solicitud
                (estado
                ,fecha_ingreso
                ,postulante_rut
                )
                values
                ('$this->estado'
                ,NOW()
                ,'$this->postulante_rut'
                )";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
        
        // obtiene el nro autoincrementable
        $sql = "select LAST_INSERT_ID()";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
  
            $stmt->bind_result($idSolicitud);

            /* obtener valor */
            $stmt->fetch();
            $this->idSolicitud = $idSolicitud;
             $stmt->close();
        }
  
    }
    
    function getIdSolicitud() {
        return $this->idSolicitud;
    }

    function getEstado() {
        return $this->estado;
    }
    function getFecha_ingreso() {
        return $this->fecha_ingreso;
    }

    
    function getPostulante_rut() {
        return $this->postulante_rut;
    }

    function setIdSolicitud($idSolicitud) {
        $this->idSolicitud = $idSolicitud;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function setFecha_ingreso($fecha_ingreso) {
        $this->fecha_ingreso = $fecha_ingreso;
    }

    
    function setPostulante_rut($postulante_rut) {
        $this->postulante_rut = $postulante_rut;
    }

    function Leer($conn, $rut, $nro_solicitud) {
        // validar que exista rut y mro_solicitud
        $sql = "select count(*)
                from Solicitud
                where postulante_rut = $rut
                  and idSolicitud = $nro_solicitud";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
  
            $stmt->bind_result($count);

            /* obtener valor */
            $stmt->fetch();
            
            if ($count != 1) {
                echo "Rut o Numero de Solicitud Invalidos";
                return false;
            }
            $stmt->close();
        } 
       
        // leer
        $sql = "select idSolicitud
                       ,estado     
                       ,fecha_ingreso
                       ,postulante_rut
                from Solicitud
                where postulante_rut = $rut
                  and idSolicitud = $nro_solicitud";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
  
            $stmt->bind_result($idSolicitud,$estado,$fecha_ingreso,$postulante_rut);
     

            /* obtener valor */
            $stmt->fetch();
           
            $this->idSolicitud=$idSolicitud;
            $this->estado=$estado;
            $this->fecha_ingreso=$fecha_ingreso;
            $this->postulante_rut=$postulante_rut;
           
            $stmt->close();
        } 
        return true;
              
        
    }

 
     function Actualizar($conn) {
        $sql = "update Solicitud
                set estado ='$this->estado'
                where idSolicitud =$this->idSolicitud";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
    }
      
     function Eliminar($conn) {
        $sql = "delete from Solicitud
                where idSolicitud =$this->idSolicitud";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
    }
            
}
