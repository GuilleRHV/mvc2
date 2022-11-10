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
            if ($fila["usuario"] == $nombreintroducido && password_verify($passwordintroducido, $fila["password"])) {
                $valido = true;
            }
        }
        require_once "../App.php";
        $app = new App();
        if ($valido) {
            session_start();
            $_SESSION["usuario"]=$nombreintroducido;
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
