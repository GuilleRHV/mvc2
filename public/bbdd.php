<?php
//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;


require "../bbddcon.php";

   /*
   Modelo Vista Controlador
   
   */
    $sql = "select nombreusu,password from credenciales";
    $registros = $bd->query($sql);
    echo "Numero de registros devueltos: " . $registros->rowCount();
    if($registros->rowCount()>0){
        foreach($registros as $fila){
            echo "<br>Nombre de usuario: " . $fila["nombreusu"];
            echo "<br>Password: " . $fila["password"];
        }
    }else{
        echo "<br>No se ha devuelto ninguna fila";
    }
    
