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
    $valido = false;
    if($registros->rowCount()>0){
        $valido = false;
        foreach($registros as $fila){
            if ($fila["usuario"]==$nombreintroducido && password_verify($passwordintroducido,$fila["password"])){
                //$fila["usuario"]==$nombreintroducido && $fila["password"]==$passwordintroducido
                $valido = true;
                
            }
        }
        if($valido){
            echo "<h1>correcto</h1>";
        }else{
            echo "<h1>Invalido</h1>";
        }
    }else{
        echo "<h1>Esta vacio</h1>";
    }
   // echo "Numero de registros devueltos: " . $registros->rowCount();
    //echo $registros;

}catch(PDOException $e){
    echo "Mensaje de la excepcion: " . $e->getMessage();
    exit();
}