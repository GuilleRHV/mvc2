<?php
//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
$dsn ="mysql:dbname=demo;host=db";
$usuario = "dbuser";
$clave = "secret";

echo "<br>Conexion satisfactioria<br>";
try{
    $bd = new PDO($dsn,$usuario,$clave);

}catch(PDOException $e){
    echo "Mensaje de la excepcion: " . $e->getMessage();
    exit();
}