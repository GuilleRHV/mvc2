<?php
session_start();
$nuevousuario = false;
$errornuevousuario = false;
$usuarioeliminado = false;
$errorusuarioeliminado = false;
$fotovalida = false;
$errorfotovalida=false;

if (isset($_POST["cerrarsesion"])) {
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie(session_name(), "", time() - 1, "/");
    header("Location: ?method=login");
}

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
if (isset($_POST["envionuevapersona"])) {
    require "credencialesbbdd.php";
    $sql = "select * from `personas` where `nombre`='" . $_POST["nombre"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Existe alguien con ese nombre
        echo "Ya hay alguien con ese nombre";
        $errornuevousuario = true;
    } else {
        $sql = "insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["apellidos"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "');";
        $registros = $bd->query($sql);
        //Indicara un mensaje de exito
        $nuevousuario = true;
    }
}
//CREAMOS UNA EMPRESA

if (isset($_POST["envionuevaempresa"])) {

    require "credencialesbbdd.php";
    $sql = "select * from `empresas` where `nombre`='" . $_POST["nombre"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Existe alguien con ese nombre
        echo "Ya hay alguien con ese nombre";
    } else {
        $sql = "insert into `empresas`(`nombre`, `direccion`, `telefono`, `email`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "','" . $_POST["email"] . "');";
        $registros = $bd->query($sql);
        echo "empresa registrada correctamente";
    }
}

//*****************************ELIMINAMOS*******************************

if (isset($_POST["envioeliminar"])) {

    require "credencialesbbdd.php";

    $sql = "delete from `personas` where `nombre` LIKE '" . $_POST["nombreeliminar"] . "';";
    $sql = $sql . "delete from `empresas` where `nombre` LIKE '" . $_POST["nombreeliminar"] . "';";
    //$sql = $sql ."delete from `empresas` where `nombre`=='" . $_POST["nombreeliminar"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {

        $usuarioeliminado = true;
    } else {
        $errorusuarioeliminado = true;
    }
}
/***MODIFICAR USUARIOS*************************************** */
if (isset($_POST["modificar"])) {
    require_once "credencialesbbdd.php";
    $sql = "select * from empresas where nombre like '" . $_POST["nombremodificar"] . "';";
    $registros = $bd->query($sql);
    //echo $_POST["nombremodificar"];

    //VER SI EXISTE EN EMPRESAS
    if ($registros->rowCount() > 0) {
        session_start();
        $_SESSION["nombremodificar"] = $_POST["nombremodificar"];
        header("Location: ?method=modificarempresa");
    }
    $sql = $sql = " select * from personas where nombre like '" . $_POST["nombremodificar"] . "';";
    $registros = $bd->query($sql);
    //VER SI EXISTE EN PERSONAS
    if ($registros->rowCount() > 0) {
        session_start();
        $_SESSION["nombremodificar"] = $_POST["nombremodificar"];
        header("Location: ?method=modificarpersona");
    }
}
/********************SUBIR FOTO PERFIL**********************************************++ */

if (isset($_POST["subirfoto"])) {
    require_once "credencialesbbdd.php";
    $sql = "select * from empresas where nombre like '" . $_POST["nombreusuario"] . "';";
    $registros = $bd->query($sql);
    //VER SI EXISTE EN EMPRESAS
    if ($registros->rowCount() > 0) {
        require_once "Controladorxml.php";
        $control = new Controladorxml();
        $control->foto();
        $fotovalida = true;
    }
    $sql = $sql = " select * from personas where nombre like '" . $_POST["nombreusuario"] . "';";
    $registros = $bd->query($sql);
    //VER SI EXISTE EN PERSONAS
    if ($registros->rowCount() > 0) {
        require_once "Controladorxml.php";
        $control = new Controladorxml();
        $control->foto();
        $fotovalida = true;
    }

    if(!$fotovalida){
        $errorfotovalida=true;
    }
}


/*****************************MODIFICAR USUARIO*************************************************++++ */

if (isset($_POST["personamodificada"])) {
    require_once "credencialesbbdd.php";
    $sql = "update personas set `apellidos`='" . $_POST["apellidos"] . "', `direccion`='" . $_POST["direccion"] . "',`telefono`='" . $_POST["telefono"] . "' where `nombre`='" . $_SESSION["nombremodificar"] . "'";
    $registros = $bd->query($sql);
    session_start();
    unset($_SESSION["nombremodificar"]);
}


if (isset($_POST["empresamodificada"])) {
    require_once "credencialesbbdd.php";
    $sql = "update empresas set `direccion`='" . $_POST["direccion"] . "', `telefono`='" . $_POST["telefono"] . "',`email`='" . $_POST["email"] . "' where `nombre`='" . $_SESSION["nombremodificar"] . "'";
    $registros = $bd->query($sql);
    session_start();
    unset($_SESSION["nombremodificar"]);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/valido.css" type="text/css">
    <title>Valido</title>
</head>

<body>

    <h1>Bienvenido usuario <?= $_SESSION["usuario"] ?></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Crear contacto</label>
        <p><select name="opcionelemento" id="">
                <option selected value="persona">Persona</option>
                <option value="empresa">Empresa</option>
            </select>
        </p>
        <?php
        if ($nuevousuario) {
            echo "<h4 style='color: green; font-weight: bold;' >Usuario introducido correctamente</h4>";
        }
        if ($errornuevousuario) {
            echo "<h4 style='color: red; font-weight: bold;' >Ya existe un usuario con ese nombre</h4>";
        }

        ?>
        <p><input type="submit" name="crear" value="Crear"></p>
        <label for="">Eliminar contacto</label>
        <p><input type="submit" name="eliminar" value="Eliminar"></p>
        <?php
        if ($usuarioeliminado) {
            echo "<h4 style='color: green; font-weight: bold;' >Usuario eliminado correctamente</h4>";
        }
        if ($errorusuarioeliminado) {
            echo "<h4 style='color: red; font-weight: bold;' >No existe ningun usuario con ese nombre</h4>";
        }
        ?>
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
                echo "<h4 style='color: red; font-weight: bold;' >No se ha encontrado ningun usuario con el nombre introducido</h4>";
            } else {
                //SI EXISTE EL USUARIO BUSCAMOS SI TIENE FOTO DE PERFIL

                /************************BUSCANDO FOTO*/
                $fotoencontrada = false;
                $nombrebuscar = "uploads/" . $_POST["nombrebuscar"] . ".jpeg";
                //  echo $nombrebuscar;
                if (file_exists($nombrebuscar)) {
                    echo "<br>";
                    echo '<img src="' . $nombrebuscar . '" style="width: 150px;height: 150px"><img><br>';
                    $fotoencontrada = true;
                }
                $nombrebuscar = "uploads/" . $_POST["nombrebuscar"] . ".png";
                if (file_exists($nombrebuscar)) {
                    echo "<br>";
                    echo '<img src="' . $nombrebuscar . '" style="width: 150px;height: 150px"><img><br>';
                    $fotoencontrada = true;
                }
                //Con extension PDF no mostrará imagen
                if (!$fotoencontrada) {
                    echo "<p style='color: orange;'>No existe la foto</p>";
                }
                /*****************************  */
            }
        }
        /********************FIN BUSCAR USUARIO**********************************************+ */
        ?>
        <label for="">Modificar contacto</label>
        <p><input type="text" name="nombremodificar"><input type="submit" name="modificar" value="Modificar"></p>

        <hr>
        <label for="">
            <h3>Foto</h3>
        </label>
        <p>Nombre usuario
            <input type="text" name="nombreusuario" id="">
            <input type="file" name="mifile" id="">
            <input type="submit" value="Subir foto" name="subirfoto">
            <?php
            if ($fotovalida) {
                echo "<h4 style='color: green; font-weight: bold;' >Foto de usuario subida correctamente</h4>";
            }
            if($errorfotovalida){
                echo "<h4 style='color: red; font-weight: bold;' > No existe ningun usuario con ese nombre</h4>";
            }   
            
            ?>
        </p>


        <input type="submit" value="Cerrar sesion" style="font-weight: bold;" name="cerrarsesion">


    </form>
</body>




</html>