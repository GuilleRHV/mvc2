<?php

$aviso = "<p style='color: red; font-weight: bold;'>Prueba</p>";

if (isset($_POST["crear"])) {
    require_once "App.php";
    $app = new App();
    if ($_POST["opcionelemento"] == "persona") {
        header("Location: ?method=nuevapersona");
    }
    if ($_POST["opcionelemento"] == "empresa") {
        header("Location: ?method=nuevaempresa");
    }
}

if (isset($_POST["eliminar"])) {
    require_once "App.php";
    $app = new App();
    header("Location: ?method=eliminarusuario");
}

//CREAMOS 1 PERSONA
$personarepetida=false;
if (isset($_POST["envionuevapersona"])) {

    require "credencialesbbdd.php";
   
    $sql = "select * from `personas` where `nombre`='" . $_POST["nombrepersona"] . "';";
    $sql = $sql . "select * from `empresas` where `nombre`='" . $_POST["nombrepersona"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Existe alguien con ese nombre

        $personarepetida = true;
        echo "Ya hay alguien con ese nombre<br>";
        echo $sql;
        
    } else {
        $sql = "insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('" . $_POST["nombrepersona"] . "','" . $_POST["apellidospersona"] . "','" . $_POST["direccionpersona"] . "','" . $_POST["telefonopersona"] . "');";
        
        
        $registros = $bd->query($sql);
        echo $sql;
        echo "<br>persona registrada correctamente<br>";
       
    }
  /*  if(!$repetida){
        $sql = "insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["apellidos"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "');";
        $registros = $bd->query($sql);
    }*/
}
//CREAMOS UNA EMPRESA

if (isset($_POST["envionuevaempresa"])) {

    require "credencialesbbdd.php";


    echo "conexion";



    $sql = "select * from `empresas` where `nombre`='" . $_POST["nombre"] . "';";
    $sql = $sql . $sql = "select * from `personas` where `nombre`='" . $_POST["nombre"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Existe alguien con ese nombre
        echo "Ya hay alguien con ese nombre<br>";
        echo $sql;
        $personarepetida = true;
    } else {
        $sql = "insert into `empresas` (`nombre`, `direccion`, `telefono`, `email`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "','" . $_POST["email"] . "');";
        $registros2 = $bd->query($sql);
        echo $sql;
    }
}

//ELIMINAMOS*******************************



if (isset($_POST["envioeliminar"])) {
    $encontradoeliminar=false;
    require "credencialesbbdd.php";


    echo "conexion";



    //  DELETE FROM `personas` WHERE `nombre` LIKE 'Ana'; 


    $sql = "select * from `empresas` where `nombre`='" . $_POST["nombre"] . "';";
    $sql = $sql . $sql = "select * from `personas` where `nombre`='" . $_POST["nombre"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Se puede eliminar
        $sql = "delete from `personas` where `nombre` LIKE '" . $_POST["nombreeliminar"] . "';";
        $sql = $sql . "delete from `empresas` where `nombre` LIKE '" . $_POST["nombreeliminar"] . "';";
        //$sql = $sql ."delete from `empresas` where `nombre`=='" . $_POST["nombreeliminar"] . "';";
        $registros = $bd->query($sql);
        echo "Se ha eliminado un usuario";
        $encontradoeliminar=true;
    } else {
        echo "<p style='color: red; font-weight: bold;'>AVISO: No existe ninguna persona con ese nombre</p>";
    }
        
    }
    


    //      style='color: red; font-weight: bold;'








/*$cont = 0;
    if ($registros->rowCount() > 0) {
        //importan las mayusculas
        $sql = "delete from `personas` where `nombre`='" . $_POST["nombreeliminar"] . "';";
        echo "Se ha eliminado una persona";
        $cont++;
    }
    $sql = "select * from `empresas` where `nombre`='" . $_POST["nombreeliminar"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //importan las mayusculas
        $sql = $ql . "delete from `empresas` where `nombre`='" . $_POST["nombreeliminar"] . "';";
        echo "Se ha eliminado una persona";
        $cont++;
        $registros = $bd->query($sql);
    } else {
        if ($cont != 0) {
            echo "nº de usuarios eliminados: " + $cont;
        } else {
            echo $sql;
        }
    }*/





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valido</title>
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
        <?php
        if ($personarepetida) {
            echo "<p style='color: red; font-weight: bold;'>AVISO: Ya hay una persona con ese nombre</p>";
        }
        ?>
        <p><input type="submit" name="crear" value="Crear"></p>
        <label for="">Eliminar contacto</label>
        <p><input type="submit" name="eliminar" value="Eliminar"></p>
      
        <label for="">Buscar por nombre</label>
        <p><input type="text" name="nombrebuscar"><input type="submit" name="buscar" value="Buscar"></p>
        <?php
        /****BUSCA USUARIOS******************************************************************************* */
        if (isset($_POST["buscar"])) {
            require_once "credencialesbbdd.php";
            $encontrado = false;

            //Busca presona
            $sql = "select nombre, apellidos, direccion, telefono from `personas` where `nombre` LIKE '" . $_POST["nombrebuscar"] . "';";
            $registros = $bd->query($sql);

            if ($registros->rowCount() > 0) {
                $encontrado = true;
            }

            foreach ($registros as $persona) {
                echo "<h4>Persona</h4>";
                echo "Nombre: " . $persona["nombre"] . "<br>";
                echo "Apellidos: " . $persona["apellidos"] . "<br>";
                echo "Direccion: " . $persona["direccion"] . "<br>";
                echo "Telefono: " . $persona["telefono"] . "<br>";
            }
            //Busca empresa
            $sql = "select nombre, direccion, telefono, email from `empresas` where `nombre` LIKE '" . $_POST["nombrebuscar"] . "';";
            $registros = $bd->query($sql);
            if ($registros->rowCount() > 0) {
                $encontrado = true;
            }
            foreach ($registros as $empresa) {
                echo "<h4>Empresa</h4>";
                echo "Nombre: " . $empresa["nombre"] . "<br>";
                echo "Direccion: " . $empresa["direccion"] . "<br>";
                echo "Telefono: " . $empresa["telefono"] . "<br>";
                echo "Email: " . $empresa["email"] . "<br>";
            }
            if (!$encontrado) {
                echo "<h4  style='color: red; font-weight: bold;' >No se ha encontrado ningun usuario con el nombre introducido</h4>";
            }
        }
        /************************************************************************+ */
        ?>
        <br>
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