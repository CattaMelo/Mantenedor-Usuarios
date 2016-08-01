<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author Matt
 */
class Conexion {
    
    private $servidor="localhost";
    private $username="root";
    private $password="mysql";
    private $baseDatos="mydb";
    private $conexion;
      
 
   
   
    public function Conectar()
    {
        try
        {
            $this->conexion=  @mysqli_connect($this->servidor,
                    $this->username,
                    $this->password,
                    $this->baseDatos);
            
            if($this->conexion->connect_errno){
                unset($this->conexion);
                throw new Exception("No se puede conectar al server");
            }
            
        } catch (Exception $ex) {
            throw new Exception("No se pudo conectar a la base de datos ". $ex->getMessage());
        }
    }
    
    public function getConexion(){
        
        return $this->conexion;
    }
    
    public function Desconectar() {
        $this->conexion->close();
    }

    
}
