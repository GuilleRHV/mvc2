<?php
namespace Core;
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

     function crearusuario(){
        if ($_POST["opcionelemento"] == "persona") {
            require_once "views/nuevapersona.php";
        }
        if ($_POST["opcionelemento"] == "empresa") {
            require_once "views/nuevaempresa.php";
        }
    }

    function nuevapersona()
    {
       
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

    function cerrarsesion(){
        session_start();
        $_SESSION = array();
        session_destroy();
        setcookie(session_name(), "", time() - 1, "/");
        header("Location: ?method=login");
    }
    
}
