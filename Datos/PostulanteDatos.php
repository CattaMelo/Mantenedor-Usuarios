<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostulanteDatos
 *
 * @author Matt
 */
include_once 'Conexion.php';
include_once './Entidades/Postulante.php';

class PostulanteDatos {
    //put your code here
    
    
    private $cnn;
    
    public function __construct() {
        
        try {
            $conexion=new Conexion();
            $conexion->Conectar();
            $this->cnn= $conexion->getConexion();
        } 
        catch (Exception $ex) 
        {
            throw $ex;
        }
        
    }

    
    public function Guardar($nuevo){
        
        $res=false;
        
        if(isset($this->cnn))
            {
            
            $stmt=$this->cnn->prepare("insert into POSTULANTE (rut_cliente, nombre, apellidoPaterno,"
                    . "apellidoMaterno, fechaNacimiento, sexo, telefono, email, direccion, comuna, educacion,"
                    . "experiencia, modalidad, curso) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            
            
            $stmt->bind_param("ssssssssssssss", $nuevo->getRut(), $nuevo->getNombre(), $nuevo->getApellidoPaterno(),
                    $nuevo->getApellidoMaterno(),$nuevo->getFechaNacimiento(), $nuevo->getSexo(), $nuevo->getTelefono(), $nuevo->getEmail(),
                    $nuevo->getDireccion(), $nuevo->getComuna(), $nuevo->getEducacion(), $nuevo->getExperiencia(),
                    $nuevo->getModalidad(), $nuevo->getCurso());
            
            if($stmt->execute()>0)
            {
                $res=true;
            }
            
           }
        return $res;
    }
    
    
    
}
