<?php

$dsn = "mysql:dbname=agenda;host=db";
$usuario = "root";
$clave = "password";

try{
$bd = new PDO($dns,$usuario,$clave);
echo "conexion";
}catch(PDOException $ex){
    echo "Mensaje de la excepcion: " . $ex->getMessage();
    exit();
}