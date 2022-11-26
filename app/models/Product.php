<?php
//Fichero que simula el modelo con datos

namespace App\Models;

use PDO;
use Core\Model;

require_once '../core/Model.php';

class Product extends Model
{


    function __construct()
    { //cons vacio

        $this->birthdate = \DateTime::createFromFormat('Y-m-d', $this->birthdate);
    }
    //devuelve todos los productos
    public static function all()
    {
        // return Product::PRODUCTS;
        $db = Product::db();
        $sql = "select * from products";
        $registros = $db->query($sql);
        $productos = $registros->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $productos;
    }

    //devolver un producto en particular
    public static function find($id)
    {
        $db = Product::db();
        $sql = "select * from products where id=:id";
        $registros = $db->prepare($sql);
        $registros->execute(array(":id" => $id));
        $registros->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $producto = $registros->fetch(PDO::FETCH_CLASS);
        return $producto;
    }
    public function insert()
    {
        $db = Product::db();
        $sql = 'INSERT INTO products (name, type_id, price, fecha_compra) VALUES(:name, :type_id, :price, :fecha_compra)';
        $registros = $db->prepare($sql);
        $registros->bindValue(':name', $this->name);
        $registros->bindValue(':type_id', $this->type_id);
        $registros->bindValue(':price', $this->price);
        $registros->bindValue(':fecha_compra', $this->fecha_compra);
        return $registros->execute();
    }

    public function save()
    {
        $db = Product::db();
        $stmt = $db->prepare('UPDATE products SET name = :name, type_id = :type_id, price = :price, fecha_compra = :fecha_compra WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':type_id', $this->type_id);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        return $stmt->execute();
    }

    public function delete()
    {
        $db = Product::db();
        $stmt = $db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }
}//fin clase