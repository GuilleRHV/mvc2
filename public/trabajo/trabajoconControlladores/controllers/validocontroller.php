<?php



    if (isset($_POST["cerrarsesion"])) {
        session_start();
        $_SESSION = array();
        session_destroy();
        setcookie(session_name(), "", time() - 1, "/");
        header("Location: ../?method=login");
    }

    if (isset($_POST["crear"])) {
        require_once "../App.php";
        $app = new App();
        if ($_POST["opcionelemento"] == "persona") {
            header("Location: ../?method=nuevapersona");
        }
        if ($_POST["opcionelemento"] == "empresa") {
            header("Location: ../?method=nuevaempresa");
        }
    }
    //CREAMOS 1 PERSONA
if (isset($_POST["envionuevapersona"])) {
    require "../credencialesbbdd.php";
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
    header("Location: ../?method=valido");
    
}
//CREAMOS UNA EMPRESA

if (isset($_POST["envionuevaempresa"])) {

    require "../credencialesbbdd.php";
    $sql = "select * from `empresas` where `nombre`='" . $_POST["nombre"] . "';";
    $registros = $bd->query($sql);
    if ($registros->rowCount() > 0) {
        //Existe alguien con ese nombre
        //echo "Ya hay alguien con ese nombre";
    } else {
        $sql = "insert into `empresas`(`nombre`, `direccion`, `telefono`, `email`) VALUES ('" . $_POST["nombre"] . "','" . $_POST["direccion"] . "','" . $_POST["telefono"] . "','" . $_POST["email"] . "');";
        $registros = $bd->query($sql);
       
    }
    header("Location: ../?method=valido");

}


//*****************************ELIMINAMOS*******************************
if (isset($_POST["eliminar"])) {
    require_once "../App.php";
    $app = new App();
    header("Location: ../?method=eliminarusuario");
}



if (isset($_POST["envioeliminar"])) {

    require "../credencialesbbdd.php";

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
    require_once "../credencialesbbdd.php";
    $sql = "select * from empresas where nombre like '" . $_POST["nombremodificar"] . "';";
    $registros = $bd->query($sql);
    //echo $_POST["nombremodificar"];

    //VER SI EXISTE EN EMPRESAS
    if ($registros->rowCount() > 0) {
        session_start();
        $_SESSION["nombremodificar"] = $_POST["nombremodificar"];
        header("Location: ../?method=modificarempresa");
    }
    $sql = $sql = " select * from personas where nombre like '" . $_POST["nombremodificar"] . "';";
    $registros = $bd->query($sql);
    //VER SI EXISTE EN PERSONAS
    if ($registros->rowCount() > 0) {
        session_start();
        $_SESSION["nombremodificar"] = $_POST["nombremodificar"];
        header("Location: ../?method=modificarpersona");
    }
}


if (isset($_POST["subirfoto"])) {
    require_once "../credencialesbbdd.php";
    $sql = "select * from empresas where nombre like '" . $_POST["nombreusuario"] . "';";
    $registros = $bd->query($sql);
    //VER SI EXISTE EN EMPRESAS
    if ($registros->rowCount() > 0) {
        require_once "../Controladorxml.php";
        $control = new Controladorxml();
        $control->foto();
        $fotovalida = true;
    }
    $sql = $sql = " select * from personas where nombre like '" . $_POST["nombreusuario"] . "';";
    $registros = $bd->query($sql);
    //VER SI EXISTE EN PERSONAS
    if ($registros->rowCount() > 0) {
        require_once "../Controladorxml.php";
        $control = new Controladorxml();
        $control->foto();
        $fotovalida = true;
    }

    if(!$fotovalida){
        $errorfotovalida=true;
    }
    header("Location: ../?method=valido");   
}


/***BUSCA USUARIOS******************************************************************************* */

        if (isset($_POST["buscar"])) {
            require_once "../credencialesbbdd.php";
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
                echo "<a href= ../?method=valido >Volver a home</a>";
            } else {
                //SI EXISTE EL USUARIO BUSCAMOS SI TIENE FOTO DE PERFIL

                /************************BUSCANDO FOTO*/
                $fotoencontrada = false;
                $nombrebuscar = "../uploads/" . $_POST["nombrebuscar"] . ".jpeg";
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
                echo "<a href= ../?method=valido >Volver a home</a>";
            }
            
            
        }
