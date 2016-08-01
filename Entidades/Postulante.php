<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Postulante
 *
 * @author Matt
 */
class Postulante {
    //put your code here
    
    private $rut;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $fechaNacimiento;
    private $sexo;
    private $telefono;
    private $email;
    private $direccion;
    private $comuna;
    private $educacion;
    private $experiencia;
    private $modalidad;
    private $curso;
    
    
    function __construct($rut, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $sexo, $telefono, $email, $direccion, $comuna, $educacion, $experiencia, $modalidad, $curso) {
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->comuna = $comuna;
        $this->educacion = $educacion;
        $this->experiencia = $experiencia;
        $this->modalidad = $modalidad;
        $this->curso = $curso;
    }
       
    function Guardar($conn) {
        $sql = "insert into Postulante
                (rut
                ,nombre
                ,apellido_paterno
                ,apellido_materno
                ,fecha_nacimiento
                ,sexo
                ,telefono
                ,email
                ,direccion
                ,comuna
                ,educacion
                ,experiencia
                ,modalidad
                ,curso
                )
                values
                ($this->rut
                ,'$this->nombre'
                ,'$this->apellidoPaterno'
                ,'$this->apellidoMaterno'
                ,'$this->fechaNacimiento'
                ,'$this->sexo'
                ,'$this->telefono'
                ,'$this->email'
                ,'$this->direccion'
                ,'$this->comuna'
                ,'$this->educacion'
                ,$this->experiencia
                ,'$this->modalidad'
                ,'$this->curso'
                )";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
    }
    
     function Actualizar($conn) {
        $sql = "update Postulante
                set nombre ='$this->nombre'
                ,apellido_paterno ='$this->apellidoPaterno'
                ,apellido_materno ='$this->apellidoMaterno'
                ,fecha_nacimiento ='$this->fechaNacimiento'
                ,sexo ='$this->sexo'
                ,telefono ='$this->telefono'
                ,email ='$this->email'
                ,direccion ='$this->direccion'
                ,comuna ='$this->comuna'
                ,educacion ='$this->educacion'
                ,experiencia =$this->experiencia
                ,modalidad ='$this->modalidad'
                ,curso ='$this->curso'
                where rut =$this->rut";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
        }
    }
    
    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getEducacion() {
        return $this->educacion;
    }

    function getExperiencia() {
        return $this->experiencia;
    }

    function getModalidad() {
        return $this->modalidad;
    }

    function getCurso() {
        return $this->curso;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    function setEducacion($educacion) {
        $this->educacion = $educacion;
    }

    function setExperiencia($experiencia) {
        $this->experiencia = $experiencia;
    }

    function setModalidad($modalidad) {
        $this->modalidad = $modalidad;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }


    
    
}
