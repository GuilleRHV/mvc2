<?php
function insertar(){
//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
$dsn ="mysql:dbname=demo;host=db";
$usuario = "dbuser";
$clave = "secret";


echo "<br>Conexion satisfactioria<br>";
try{
    $bd = new PDO($dsn,$usuario,$clave);
    $sql = "insert into credenciales values ('usuario3','$2y$10$/LhHyl1eroxKsZDt8VkDGbufQShS0/NKVnB0.2yzg51MTUMv.LakBG')";
    $registros = $bd->query($sql);
   // echo "Numero de registros devueltos: " . $registros->rowCount();
    //echo $registros;
    


}catch(PDOException $e){
    echo "Mensaje de la excepcion: " . $e->getMessage();
}
}
//insertar();

function actualizar(){
    //mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
    $dsn ="mysql:dbname=demo;host=db";
    $usuario = "dbuser";
    $clave = "secret";
    
    
    echo "<br>Conexion satisfactioria<br>";
    try{
        $bd = new PDO($dsn,$usuario,$clave);
        $sql = "update credenciales set usuario3 = '$2y$10$2lisGduLK/o2kHKdgDb8/.0wAhScAbnhEMzr6X/b9Cn1XjpSozd1q'";
        $registros = $bd->query($sql);
       // echo "Numero de registros devueltos: " . $registros->rowCount();
        //echo $registros;
        
    
    
    }catch(PDOException $e){
        echo "Mensaje de la excepcion: " . $e->getMessage();
    }
    }
//actualizar();
function eliminar(){
    //mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
    $dsn ="mysql:dbname=demo;host=db";
    $usuario = "dbuser";
    $clave = "secret";
    
    
    echo "<br>Conexion satisfactioria<br>";
    try{
        $bd = new PDO($dsn,$usuario,$clave);
        $sql = "delete from credenciales where nombreusu='usuario3' ";
        $registros = $bd->query($sql);
       // echo "Numero de registros devueltos: " . $registros->rowCount();
        //echo $registros;
        
    
    
    }catch(PDOException $e){
        echo "Mensaje de la excepcion: " . $e->getMessage();
    }
    }
    eliminar();


