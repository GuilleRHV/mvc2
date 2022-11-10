<?php

if(isset($_POST["crear"])){
    require_once "../App.php";
    $app = new App();

    if($_POST["opcionelemento"]=="persona"){
        $app->crearpersona();
        
    }else{
        $app->nuevaempresa();
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Es valido</h1>
    <form action="valido.php" method="post" enctype="multipart/form-data">
        <label for="">Crear contacto</label>
        <p><select name="opcionelemento" id="">
            <option selected value="persona">Persona</option>
            <option value="empresa">Empresa</option>
        </select>
        </p>
        <p><input type="submit" name="crear" value="Crear"></p>
        <label for="">Eliminar contacto</label>
        <p><input type="button" name="eliminar" value="Eliminar"></p>
        <label for="">Buscar por nombre</label>
        <p><input type="text" name="nombrebuscar"><input type="button" name="buscar" value="Buscar"></p>
        <input type="button" value="Actualizar y guardar" style="font-weight: bold;" name="guardar">
        <hr>
        <label for=""><h3>Foto</h3></label>
        <p>Nombre usuario
        <input type="text" name="nombreusuario" id="">
        <input type="file" name="mifile" id="">
        <input type="submit" value="Subir foto" name="subirfoto">
        </p>
        <?php
        //A VECES DA ERROR:
        //a) Controladorxml.php     b)../Controladorxml.php
        require_once "../Controladorxml.php";
         $control = new Controladorxml();
        //  $control->cargar();
        if (isset($_POST["subirfoto"])) {
            //$control->foto();
            if($control->existeusuario()){

                $control->foto();
            }else{
                echo "El usuario no existe";
            }
        }

        

if (isset($_POST["envionuevo"])) {
    $dsn = "mysql:dbname=agenda;host=db";
    $usuario = "root";
    $clave = "password";
    try {
        $bd2 = new PDO($dns, $usuario, $clave);
        echo "conexion";



        $sql = "select * from `personas` where `nombre`='" . $_POST["nombre"] . "';";
        $registros = $bd2->query($sql);
        if ($registros->rowCount() > 0) {
            //Existe alguien con ese nombre
            echo "Ya hay alguien con ese nombre";
        } else {
            $sql = "insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["apellidos"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "');";
            $registros = $bd2->query(($sql));
            echo "registrado correctamente";
        }
    } catch (PDOException $ex) {
        echo "Mensaje de la excepcion: " . $ex->getMessage();
        exit();
    }
}


        
        ?>

    </form>
</body>

</html>