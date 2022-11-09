<?php
/**
 * RECURSO/ACCION/PARAMETRO
 * recurso: controladores
 * accion: metodos del controlador
 * parametros: find  id del producto
 */
echo "<h2>Contenido privado</h2>";

/*$controller = new Controller();
$controller->home();
echo "SHOW";
$controller->show();*/


require "Controller.php";
$app = new Controller();
//Defino variable de peticion en la url

//1.-Recoger el metodo que pasan como parametro y si no
//espacifican ningin cargar el metodo home

if(isset($_GET["method"])){
    $method =$_GET["method"];//show, find..
}else{
    $method = "home";
}

//2.-Verificar que el metodo introducido existe
if(method_exists($app,$method)){
    
$app->$method();

}else{
    http_response_code(404);
    die("Metodo no encontrado");
}


