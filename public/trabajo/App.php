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

    /* function invalido()
    {
        header("Location: ../?method=login");
    }*/


    function conexion()
    {
        require_once "views/conexion.php";
    }

    /*  function crearpersona(){
        header("Location: ../?method=nuevapersona");
    }*/

    function nuevapersona()
    {
        //CREAMOS 1 PERSONA
/*if (isset($_POST["envionuevapersona"])) {

    require "credencialesbbdd.php";


    echo "conexion";



    $sql = "select * from `personas` where `nombre`='" . $_POST["nombre"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Existe alguien con ese nombre
        echo "Ya hay alguien con ese nombre";
        $errornuevousuario = true;
    } else {
        $sql = "insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["apellidos"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "');";
        $registros = $bd->query($sql);
        //Indicara un mensaje de exito
        $nuevousuario = true;
    }
}*/
        require_once "views/nuevapersona.php";
    }
    /*
    function crearempresa(){
        header("Location: ../?method=nuevaempresa");
    }
*/
    function nuevaempresa()
    {
        require_once "views/nuevaempresa.php";
    }



    /*
    function eliminarusuario(){
        header("Location: ../?method=eliminadausuario");
    }*/

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
