<?php
//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
$dsn ="mysql:dbname=demo;host=db";
$usuario = "root";
$clave = "password";

echo "<br>Conexion satisfactioria<br>";
try{
    $nombreintroducido = $_POST["usuario"];
    $passwordintroducido = $_POST["password"];
    $bd = new PDO($dsn,$usuario,$clave);
    $sql = "select nombreusu,password from credenciales";
    $registros = $bd->query($sql);
    echo "Numero de registros devueltos: " . $registros->rowCount();
    if($registros->rowCount()>0){
        foreach($registros as $fila){
            
        }
    }
   // echo "Numero de registros devueltos: " . $registros->rowCount();
    //echo $registros;

}catch(PDOException $e){
    echo "Mensaje de la excepcion: " . $e->getMessage();
    exit();
}