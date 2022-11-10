<?php
if(!isset($_SESSION["usuario"])){
    header("Location: ?method=login");
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

        <p><input type="button" name="crear" value="Crear"></p>
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
        ?>

    </form>
</body>

</html>