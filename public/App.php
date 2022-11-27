<?php

class App
{

    function run()
    {
        session_start();

        if (isset($_GET["method"])) {
            
            $method = $_GET["method"];
        }
         else {
            //Si se mantiene la sesion va directamente a valido
            if (isset($_SESSION["usuario"])) {
                
                $method = "valido";
            } else {
                $method = "login";
            }
        }
        $this->$method();
    }

    function login()
    {

        require_once "views/login.php";
    }
    function valido()
    {

        require_once "views/valido.php";
    }


    function conexion()
    {
        require_once "views/conexion.php";
    }


    function nuevapersona()
    {

        require_once "views/nuevapersona.php";
    }

    function nuevaempresa()
    {
        require_once "views/nuevaempresa.php";
    }

    function eliminarusuario()
    {
        require_once "views/eliminarusuario.php";
    }


    function modificarpersona(){
    
        require_once  "views/modificarpersona.php";
    }

    function modificarempresa(){
        require_once  "views/modificarempresa.php";
    }
    
}
