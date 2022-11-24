<?php
class Controladorxml
{

    function cargar()
    {
        $datos = simplexml_load_file("../agenda.xml");
        // print_r($datos);
    }
    function existeusuario()
    {
        $datos = simplexml_load_file("../agenda.xml");
        $nombres = $datos->xpath("//nombre");
        $existe = false;
        foreach ($nombres as $nombre) {
            //echo "<br>Nombre: " . $nombre;
            if ($_POST["nombreusuario"] == $nombre) {
                $existe = true;
            }
        }
        if ($existe) {
            return true;
        } else {
            return false;
        }
    }
    function foto()
    {
             //Dar permisos a las carpetas (sudo chmod 777 uploads)
             if($_FILES["mifile"]["size"]<5000000){
             $destino = "uploads/" . $_FILES["mifile"]["name"];
             echo "nombre fichero: " . $_FILES["mifile"]["name"];
             $flag = move_uploaded_file($_FILES["mifile"]["tmp_name"], $destino);
             rename("uploads/" . $_FILES["mifile"]["name"],"uploads/" . $_POST["nombreusuario"]);
             echo $flag ? "<h4 style='color: green; font-weight: bold;' >Archivo guardado exitosamente</h4>" : "Error al subir";
             }else{
                 echo "<h4 style='color: red; font-weight: bold;' >El tamanyo maximo de archivo es 5mb</h4>";
             }
         
    }
}
