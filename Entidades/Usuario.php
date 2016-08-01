<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Catta
 */
class Usuario {

    private $idUsuario;
    private $usuario;
    private $password;
    private $nombre;
    
    function __construct($idUsuario, $usuario, $password, $nombre) {
        $this->idUsuario = $idUsuario;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->nombre = $nombre;
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function Buscar($conn, $usuario)
    {
      
        $sql = "select count(*)
                from Usuario
                where usuario = '$usuario'";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
  
            $stmt->bind_result($count);

            /* obtener valor */
            $stmt->fetch();
            
            if ($count == 0) {
                return false;
            }
            else
            {
                return true;
            }
            $stmt->close();
        } 
    }
   function VerificaPass($conn, $usuario, $pass)
    {
      
        $sql = "select count(*)
                from Usuario
                where usuario = '$usuario'
                  and password = '$pass'";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
  
            $stmt->bind_result($count);

            /* obtener valor */
            $stmt->fetch();
             $stmt->close();
            if ($count == 0) {
                return false;
            }
            else
            {
                $sql = "select idUsuario, usuario,password,nombre
                        from Usuario
                        where usuario = '$usuario'
                        and password = '$pass'";
        
                if ($stmt = $conn->prepare($sql)) {
                     $stmt->execute();
  
                    $stmt->bind_result($idUsuario,$usuario,$password,$nombre);

                       /* obtener valor */
                    $stmt->fetch();
                     $stmt->close();
                    $this->idUsuario=$idUsuario;
                    $this->usuario=$usuario;
                    $this->password=$password;
                    $this->nombre=$nombre;
                }
                return true;
            }
            
        } 
    }
     function Guardar($conn) {
        $sql = "insert into Usuario
                (usuario
                ,password
                ,nombre
                )
                values
                ('$this->usuario'
                ,'$this->password'
                ,'$this->nombre'
                )";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
        
        // obtiene el id
        $sql = "select LAST_INSERT_ID()";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
  
            $stmt->bind_result($idUsuario);

            /* obtener valor */
            $stmt->fetch();
            $this->idUsuario = $idUsuario;
             $stmt->close();
        }
  
    }

}
