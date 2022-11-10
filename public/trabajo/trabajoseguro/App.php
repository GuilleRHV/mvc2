<?php

class App
{

    function run()
    {
        session_start();

        if (isset($_GET["method"])) {
            $method = $_GET["method"];
        } else {
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

    function invalido()
    {
        header("Location: ../?method=login");
    }


    function conexion()
    {
        require_once "views/conexion.php";
    }

    function crearpersona(){
        header("Location: ../?method=nuevapersona");
    }

    function nuevapersona(){
        require_once "views/nuevapersona.php";
    }


    function nuevaempresa(){
        header("Location: nuevaempresa.php");
    }
}
