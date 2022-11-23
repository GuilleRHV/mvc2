<?php
namespace App\Controllers;
require "../Product.php";
use \App\Model\Product;

class ProductController{

    function __construct()
    {
        echo "<br>Constructor clase PRODUCTCONTROLLER";

    }//fin_constructor


    function index(){
        echo "<br>Dentro index de PRODUCTCONTROLLER";
        //metodo home de Controller de mvc00
        $products = \Product::all();
        require "../views/home.php";
    }//fin_mindex

    function show(){
        echo "<br>Dentro show de PRODUCTCONTROLLER";
        //metodo show de Controller de mvc00
        $id = $_GET["id"];
        $product = \Product::find($id);
        require "../views/show.php";
    }//fin_mindex



    function pdf(){
        
        use Dompdf\Dompdf;
    include_once "../vendor/autoload.php";
    $dompdf = new Dompdf();
    $dompdf->loadHtml('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>');
    $dompdf->render();
    $contenido = $dompdf->output();
    $nombreDelDocumento = "1_hola.pdf";
    $bytes = file_put_contents($nombreDelDocumento, $contenido);


    }

}