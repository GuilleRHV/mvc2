<?php
/**
 * - Si la url no especifica ningun controlador (recurso) => asigno
 *      uno por defecto => home
 * - Si no la url no especifica ningun metodo 0> asigno por defecto : index
 * 
 *  /recurso/accion/parametros
 */

 class App{
    function __construct()
    {
        // http://mvc.local/product/show => http://mvc.local/index.php?url=product/show

        if(isset($_GET["url"]) && !empty($_GET["url"])){
            $url=$_GET["url"];
        }else{
            $url = "home";
        }

        
        
        //product/show/5 => product: recurso; show: accion; 5: parametro
        //Explode separa una cadena (split en java)
        //trim te elimina el elemento del principio y final de la cadena
        $arguments = explode('/', trim($url,'/') );

        //Arguments sera un array, elemento 1-> recurso, elemento 2->accion 
        
        //array_shift quita el primer valor del array y lo devuelve
        $controllerName = array_shift($arguments);//=> product ; ProductController

        //ucwords convierte la primera letra de una cadena en mayuscula
        $controllerName=ucwords($controllerName) . "Controller";

        //VER SI TIENE MAS ELEMENTOS
        echo count($arguments);
        if(count($arguments)>0){
            $method = array_shift($arguments);
        }else{
            $method="index";
        }
        
        
        
        //voy a cargar el controlador. ProductoController.php
        $file = "../app/controllers/$controllerName" . ".php";
        //var_dump($file);
        if(file_exists($file)){
       
            require_once $file; //importo el fichero

        }else{
            http_response_code(404);
            die("No encontrado");
        }

        //existe el metodo en el controlador?
        $controllerObject = new $controllerName; //OBJETO de la clase
        if(method_exists($controllerObject, $method)){
            $controllerObject->$method($arguments);
        }else{  
            http_response_code(404);
            die("No encontrado");
        }
        


    }//fin_constructor



 }//fin app