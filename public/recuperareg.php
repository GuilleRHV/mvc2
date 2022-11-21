<?php

class Login
{

    protected $nombreusu = null; //se debe llamar igual que la columna
    protected $password = null;

    //RECUPERAR FILAS
    /**
     * 1- preparar la consulta -> prepare
     * 2- establecer el modo de recuperacion: fetch_class , fetch_class_associate
     * 3- Ejecuta la consulta -> execute
     * 4- Recuperar los registros: fetch (un registro) / fetchAll (devuelve todos)
     */


    public static function all()
    {
        $dsn = "mysql:host=db;dbname=demo";
        $usuario = "dbuser";
        $password = "secret";


        try {
            $db = new PDO($dsn, $usuario, $password);
            //Establece el nivel de error que muestra la conexion
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "Select * from credenciales;";
            $sentencia = $db->prepare($sql);
            //Establece la forma de recuperar registros
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Login");
            $sentencia->execute(); //Ejecuta la sentencia

        /*    while ($obj = $sentencia->fetch()) {
                //print_r($obj);
                echo "<br>Nombre: " . $obj->nombreusu;
                echo "<br>Password: " . $obj->password;

            } //fin while*/
            $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS,"Login");
            foreach($credenciales as $credencial){
                echo "<br>Nombre: ". $credencial->nombreusu;
                echo "<br>Password: ". $credencial->password;

            }

        } catch (PDOException $e) {
            echo "<br>Error conexion: " . $e->getMessage() . "<br>";
        }
    }
} //fin clase

echo "<h2>Recuperando registros</h2>";
Login::all();
