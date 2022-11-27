<?php
class ControladorFichero
{
    function foto()
    {
        //Dar permisos a las carpetas (sudo chmod 777 uploads) y (sudo chmod 777 ControladorFichero)
        $destino = "../uploads/" . $_FILES["mifile"]["name"];
        move_uploaded_file($_FILES["mifile"]["tmp_name"], $destino);
        rename("../uploads/" . $_FILES["mifile"]["name"], "../uploads/" . $_POST["nombreusuario"] . ".jpeg");
        
       
    }
}
