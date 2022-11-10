<?php

class App{
    
    function run(){
        require_once "views/home.php";
      /*  if(isset($_POST["method"])){
            $method = $_POST["method"];
        }else{
            $method = "conexion";
        }
        $this->$method();*/
    }
    function valido(){
        require_once "views/valido.php";
    }


    function conexion(){
        require_once "views/conexion.php";
    }


}