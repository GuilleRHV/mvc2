<?php
namespace App\Controllers;
require "../Product.php";

class LoginController{

    function __construct()
    {
        echo "<br>Constructor clase LOGINCONTROLLER";

    }//fin_constructor


    function index(){
        echo "<br>Dentro index de LOGINCONTROLLER";
        //metodo home de Controller de mvc00
 //       $products = Product::all();
   //     require "views/home.php";
    }//fin_mindex

    function show(){
        echo "<br>Dentro show de LOGINCONTROLLER";
        //metodo show de Controller de mvc00
  //      $id = $_GET["id"];
      //  $product = Product::find($id);
    //    require "views/show.php";
    }//fin_mindex



}