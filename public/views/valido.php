<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/valido.css" type="text/css">
    <title>Home</title>
</head>

<body>

    <h1>Bienvenido usuario <?= $_SESSION["usuario"] ?></h1>

    <form action="controllers/validocontroller.php" method="post" enctype="multipart/form-data">
        <label for="">Crear contacto</label>
        <p><select name="opcionelemento" id="">
                <option selected value="persona">Persona</option>
                <option value="empresa">Empresa</option>
            </select>
        </p>
        <?php
        session_start();
        if (isset($_SESSION["estadocrear"])) {
            echo $_SESSION["estadocrear"];
            unset($_SESSION["estadocrear"]);
        }
        ?>
        <p><input type="submit" name="crear" value="Crear"></p>
        <label for="">Eliminar contacto</label>
        <p><input type="submit" name="eliminar" value="Eliminar"></p>
        <?php
        session_start();
        if (isset($_SESSION["estadoeliminar"])) {
            echo $_SESSION["estadoeliminar"];
            unset($_SESSION["estadoeliminar"]);
        }
        ?>
        <label for="">Buscar por nombre</label>
        <p><input type="text" name="nombrebuscar"><input type="submit" name="buscar" value="Buscar"></p>


        <label for="">Modificar contacto</label>
        <p><input type="text" name="nombremodificar"><input type="submit" name="modificar" value="Modificar"></p>
        <?php
        session_start();
        if (isset($_SESSION["estadomodificar"])) {
            echo $_SESSION["estadomodificar"];
            unset($_SESSION["estadomodificar"]);
        }
        ?>

        <hr>
        <label for="">
            <h3>Foto</h3>
        </label>
        <p>Nombre usuario
            <input type="text" name="nombreusuario" id="">
            <!--Maximo 5mb, solo permite png, jpg, jpeg y pdf-->
            <input type="file" name="mifile" id="" size="5000000" accept=".png,.jpeg,.pdf,.jpg">
            <input type="submit" value="Subir foto" name="subirfoto">
            <?php
            session_start();
            if (isset($_SESSION["estadofoto"])) {
                echo $_SESSION["estadofoto"];
                unset($_SESSION["estadofoto"]);
            }
            ?>
        </p>
        <input type="submit" value="Cerrar sesion" style="font-weight: bold;" name="cerrarsesion">


    </form>
</body>




</html>