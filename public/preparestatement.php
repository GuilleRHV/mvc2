<?php

$dsn = "mysql:dbname=demo;host=db";
$usuario ="dbuser";
$password = "secret";
/**
 * 1 - preparar la consulta -> prepare
 * 2 - vincular los datos -> bindParam / bindValue
 * 3 - ejecutar la sentencia -> execute(); (query, exec)
 */
try {
$db = new PDO($dsn,$usuario,$password);
//Establece el nivel de error que muestra la excepcion
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (:nombre,:clave)");
//Paso 2
$nombre = "Juan";
$clave1 = "1234";
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam('clave',$clave1);

$nombre = "Pedro";
$clave1 = "789";
$sentencia->execute(); //ejecuta la sentencia

echo "<h2>Exito</h2>";

}catch(PDOException $e){
 echo "Error producido al conectar " . $e->getMessage();
}