<?php
require_once "../App.php";
$app = new App();

if (isset($_POST["crear"])) {

    if ($_POST["opcionelemento"] == "persona") {
        $app->crearpersona();
    } else {
        $app->nuevaempresa();
    }
}

if (isset($_POST["envionuevo"])) {
            
    require "../credencialesbbdd.php";
        echo "1.";

        echo "conexion";



        $sql = "select * from `personas` where `nombre`='" . $_POST["nombre"] . "';";
        $registros = $bd->query($sql);
        if ($registros->rowCount() > 0) {
            //Existe alguien con ese nombre
            echo "Ya hay alguien con ese nombre";
        } else {
            $sql = "insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["apellidos"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "');";
            $registros = $bd->query($sql);
            echo "registrado correctamente";
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
    <form action="" method="post" enctype="multipart/form-data">
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
        <label for="">
            <h3>Foto</h3>
        </label>
        <p>Nombre usuario
            <input type="text" name="nombreusuario" id="">
            <input type="file" name="mifile" id="">
            <input type="submit" value="Subir foto" name="subirfoto">
        </p>
        <?php
        //A VECES DA ERROR:
        //a) Controladorxml.php     b)../Controladorxml.php

        //  $control->cargar();
        if (isset($_POST["subirfoto"])) {
            require_once "../Controladorxml.php";
            $control = new Controladorxml();
            //$control->foto();
            if ($control->existeusuario()) {

                $control->foto();
            } else {
                echo "El usuario no existe";
            }
        }



        



        ?>

    </form>
</body>

</html>