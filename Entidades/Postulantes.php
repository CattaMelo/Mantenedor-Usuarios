<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Postulantes
 *
 * @author Matt
 */
include_once 'Postulante.php';
include_once './Datos/PostulanteDatos.php';

class Postulantes {
    //put your code here
    
    private $postulante;
    
    public function __construct() {
        try
        {
            $this->postulante = new PostulanteDatos();
        } 
        catch (Exception $ex) 
        {
            throw $ex;
        }
        
    }

    
    
    public function Nuevo($nuevo)
    {
        
        $res=false;
        
        if($this->postulante->Guardar($nuevo))
        {
            $res = true;
        }
        return $res;
          
    }
    
    
    public function Modificar($modificar)
    {
        
        $res=false;
        
        if(isset($this->cnn))
        {
            $stmt=  $this->cnn->prepare("UPDATE POSTULANTE set nombre=?, apellidoPaterno=?, apellidoMaterno=?,"
                    . "fechaNacimiento=?, sexo=?, telefono=?, email=?, direccion=?, comuna=?, educacion=?,"
                    . "experiencia=?, modalidad=?, curso=? WHERE rut_cliente=?");
            
            $stmt->bind_param("ssssssssssssss", $modificar->getNombre(), $modificar->getApellidoPaterno(),
                    $modificar->getApellidoMaterno(), $modificar->getFechaNacimiento(), $modificar->getSexo(),
                    $modificar->getTelefono(), $modificar->getEmail(), $modificar->getDireccion(), $modificar->getComuna(),
                    $modificar->getEducacion(), $modificar->getExperiencia(), $modificar->getModalidad(), 
                    $modificar->getCurso(), $modificar->getRut());
            
            if($stmt->execute()>0)
                {
                $res=true;
                }
            
        }
        
        return $res;
        
    }
    
    
    
    public function Eliminar($eliminar)
    {
        
        $res=false;
        
        if(isset($this->cnn))
        {
            $stmt=$this->cnn->prepare("DELETE FROM POSTULANTE WHERE rut_cliente=?");
            
            $stmt->bind_param("s", $eliminar->getRut());
            
            if($stmt->execute()>0){
                
                $res=true;
            }
        }
        
        
        return $res;
        
    }
    
    public function Buscar($buscar)
            
    {
        
        $encontrado=null;
        $res=false;
        
        if(isset($this->cnn))
        {
            $stmt=$this->cnn->prepare("SELECT rut_cliente, nombre, apellidoPaterno,"
                    . "apellidoMaterno, fechaNacimiento, sexo, telefono, email, direccion, comuna, educacion,"
                    . "experiencia, modalidad, curso WHERE rut_cliente=?");
            
            $stmt->bind_param("s", $buscar->getRut());
            
            $stmt->bind_result($rut, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $sexo,
                    $telefono, $email, $direccion, $comuna, $educacion, $experiencia, $modalidad, $curso);
            
            $stmt->execute();
            
            while($stmt->fetch()){
                
                $encontrado= new Postulante($rut, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $sexo,
                    $telefono, $email, $direccion, $comuna, $educacion, $experiencia, $modalidad, $curso);
            }
        }
        
        return $encontrado;
        
    }
    
    
}
