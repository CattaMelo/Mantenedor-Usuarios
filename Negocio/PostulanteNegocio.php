<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostulanteNegocio
 *
 * @author Matt
 */
include_once './Entidades/Postulante.php';
include_once './Entidades/Postulantes.php';

class PostulanteNegocio {
    //put your code here
    
    
    public function Guardar($nuevoPostulante)
    {
        $res=false;
        $postulantes= new Postulantes();
        
        $encontrado=$postulantes->Buscar($nuevoPostulante);
        if($encontrado==null)
        {
            echo "No se ha encontrado nada  :  \n";
            $res=$postulantes->Nuevo($nuevoPostulante);
            
        }
        else
        {
            echo "Ya existe un Postulante con este Rut!";
        }
        return $res;
    }
}
