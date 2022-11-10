<?php
//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;
$dsn = "mysql:dbname=agenda;host=db";
$usuario = "root";
$clave = "password";

//echo "<br>Conexion satisfactioria<br>";
try {

    $nombreintroducido = $_POST["usuario"];
    $passwordintroducido = $_POST["password"];
    $bd = new PDO($dsn, $usuario, $clave);

    //USUARIO: normaluser, PASSWORD: usudwes
    //USUARIO: adminuser, PASSWORD: admindwes

    $sql = "select usuario,password from credenciales";
    $registros = $bd->query($sql);
    //echo "Numero de registros devueltos: " . $registros->rowCount();
    $valido = false;
    if ($registros->rowCount() > 0) {
        foreach ($registros as $fila) {
            /*  echo "<br>Nombre de usuario: " . $fila["usuario"];
            echo "<br>Password: " . $fila["password"];
            echo "<br>Password decodificada: " ;*/

            //PASSWORD HASH PARA CIFRAR!!
            if ($fila["usuario"] == $nombreintroducido && password_verify($passwordintroducido, $fila["password"])) {
                $valido = true;
            }
        }
        require_once "../App.php";
        $app = new App();
        if ($valido) {
            /*
                1. Crear bbdd: importar el .sql en phpmyadmin
                2. Leer los datos: nombre, apellidos... del xml 
            */

            session_start();
            $datos = simplexml_load_file("../agenda.xml");
            //Crear tabla
            try {
                $sql = "DROP TABLE IF EXISTS `personas`;
                CREATE TABLE IF NOT EXISTS `personas` (
                  `nombre` varchar(50) NOT NULL,
                  `apellidos` varchar(50) NOT NULL, `direccion` varchar(50) NOT NULL,`telefono` varchar(50) NOT NULL
                );
                CREATE TABLE IF NOT EXISTS `empresas` (
                    `nombre` varchar(50) NOT NULL,
                    `direccion` varchar(50) NOT NULL, `telefono` varchar(50) NOT NULL,`email` varchar(50) NOT NULL
                  );";
                
          //Creamos la tabla personas
               $personas=$datos->xpath("/agenda/contacto[@tipo='persona']/*");
               
               $datospersona=[];
      
               $cont=0;
                //4 es el numero de columnas
                for ($j=0;$j<count($personas)/4;$j++){
                    
                   for($i = 0;$i<4;$i++){
        
                     $datospersona[]=$personas[$i+$cont];
                     
                    }
                    $sql=$sql."insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('".$datospersona[0+$cont]."','".$datospersona[1+$cont]."','".$datospersona[2+$cont]."','".$datospersona[3+$cont]."');";
                    
                    $cont=$cont+4;
                } 



                //Creamos la tabla empresa
               $empresas=$datos->xpath("/agenda/contacto[@tipo='empresa']/*");
               
               $datosempresa=[];
      
               $cont2=0;
               //4 es el numero de columnas
                for ($j=0;$j<count($empresas)/4;$j++){
                    
                   for($i = 0;$i<4;$i++){
        
                     $datosempresa[]=$empresas[$i+$cont2];
                     
                    }
                    $sql=$sql."insert into `empresas`(`nombre`, `direccion`, `telefono`, `email`) VALUES ('".$datosempresa[0+$cont2]."','".$datosempresa[1+$cont2]."','".$datosempresa[2+$cont2]."','".$datosempresa[3+$cont2]."');";
                    
                    $cont2=$cont2+4;
                } 



                $registros=$bd->query($sql);
            
            } catch (PDOException $ex) {
                echo "Mensaje de la excepcion: " . $ex->getMessage();
                exit();
            }
            /*    $nombres = $datos->xpath("//nombre");
            
            foreach ($nombres as $nombre) {
                
            }*/





            $_SESSION["usuario"] = $nombreintroducido;
            $app->valido();
        } else {
            //header("Location: login.php");
            $app->invalido();
        }
    }

    // echo "Numero de registros devueltos: " . $registros->rowCount();
    //echo $registros;

} catch (PDOException $e) {
    echo "Mensaje de la excepcion: " . $e->getMessage();
    exit();
}
