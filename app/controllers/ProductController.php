<?php

require "../Product.php";

class ProductController{

    function __construct()
    {
        echo "<br>Constructor clase PRODUCTCONTROLLER";

    }//fin_constructor


    function index(){
        echo "<br>Dentro index de PRODUCTCONTROLLER";
        //metodo home de Controller de mvc00
        $products = Product::all();
        require "../views/home.php";
    }//fin_mindex

    function show(){
        echo "<br>Dentro show de PRODUCTCONTROLLER";
        //metodo show de Controller de mvc00
        $id = $_GET["id"];
        $product = Product::find($id);
        require "../views/show.php";
    }//fin_mindex



}