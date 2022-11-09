<?php

require_once "Product.php";
class Controller
{



    function __construct()
    {
        //const vacio
    }


    /*funcion que:
    -recoge todos los productos
    - llama a vista de inventario */


    public function home()
    {
        $products = Product::all();
        require "views/home.php";
    }

    /*funcion que:
        -mostrar un producto en particular
         */
    public function show()
    {
        $id = $_GET["id"];
        $product = Product::find($id);
        require "views/show.php";
    }
}
