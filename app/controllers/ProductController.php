<?php

namespace App\Controllers;

require_once "../app/models/Product.php";

use App\Models\Product;

//require "../Product.php";

class ProductController
{

    function __construct()
    {
        // echo "<br>Constructor clase PRODUCTCONTROLLER";
    } //fin_constructor


    public function index()
    {
        //buscar datos
        $products = Product::all();
        require("../app/views/product/index.php");
    }

    function show($args)
    {
        //  echo "<br>Dentro show de PRODUCTCONTROLLER";
        //metodo show de Controller de mvc00
        list($id) = $args;
        $product = Product::find($id);
        require('../app/views/product/show.php');
    } //fin_mindex
    public function create()
    {
        require '../app/views/product/create.php';
    }

    public function store()
    {
        $product = new Product();
        $product->name = $_REQUEST['name'];
        $product->type_id = $_REQUEST['type_id'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];
        $product->insert();
        header('Location:/product');
    }
    /**UPDATE
     * Necesita 2 metodos: edit y update
     */


    /**Funcion edit:
     * Genera formulario de modificacion de datos, busca en la
     * bbdd antes de crear el formulario
     */
    public function edit($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        require "../app/views/product/edit.php";
    }

    /**
     * Funcion update: 
     * Recibe los datos del formulario. Se busca en la 
     * bbdd y despues modificarlo
     */
    public function update()
    {
        $id = $_REQUEST['id'];
        $product = Product::find($id);
        $product->name = $_REQUEST['name'];
        $product->type_id = $_REQUEST['type_id'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];
        $product->save();
        header('Location:/product');
    }
    public function delete($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        $product->delete();
        header('Location:/product');
    }
}
