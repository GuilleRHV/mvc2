<?php
namespace App\Controllers;
include "../Product.php";

class HomeController{

    function __construct()
    {
      //  echo "<br>Constructor clase HOMECONTROLLER";

    }//fin_constructor


    function index(){
        echo "<br>Dentro index de HOMECONTROLLER";
        //metodo home de Controller de mvc00
       $products = \Product::all();
      // include "../views/header.php";
        include "../app/views/home.php";
       // require "../views/footer.php";
    }//fin_mindex

    function show(){
        echo "<br>Dentro show de HOMECONTROLLER";
        //metodo show de Controller de mvc00
      $id = $_GET["id"];
      $product = \Product::find($id);
        require "../views/show.php";
    }//fin_mindex



}