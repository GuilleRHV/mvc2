<?php
//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
$dsn = "mysql:dbname=agenda;host=db";
$usuario = "root";
$clave = "password";

try {
    $bd = new PDO($dsn, $usuario, $clave);
} catch (PDOException $e) {
    echo "Mensaje de la excepcion : " . $e->getMessage();
    exit();
}
