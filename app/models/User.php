<?php
namespace App\Models;

use PDO;
use Core\Model;

require_once '../core/Model.php';

/*
* Modelo de usuario
* Hereda de models
* No es necesario definir los atributos, PHP permite definirlos durante la ejecución
*/
class User extends Model
{
    public static function all(){ 
        $db = User::db();
        $sql = "select * from users";
        $registros = $db->query($sql);
        $users = $registros->fetchAll(PDO::FETCH_CLASS, User::class);
        return $users;      
    }
    public static function find($id){ 
        $db = User::db();
        $sql= "select * from users where id=:id";
        $registros = $db->prepare($sql);
        $registros->execute(array(":id" => $id));
        $registros->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $registros->fetch(PDO::FETCH_CLASS);
        return $user;
    }
    public function insert(){ 
        //TODO        
    }
    public function delete(){ 
        //TODO        
    }
    public function save(){ 
        //TODO        
    }
}