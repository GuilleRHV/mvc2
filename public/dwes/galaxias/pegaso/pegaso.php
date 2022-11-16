<?php

namespace Dwes\Galaxias\Pegaso;

const RADIO = 0.75; // millones de años luz

function observar($mensaje){
    echo "<br>Estoy dirigiendome a la galaxia ". $mensaje;
}

class Galaxia
{

    function __construct()
    {

        $this->nacimiento();
    }

    function nacimiento()
    {
        echo "<br> Soy una nueva galaxia";
    }
    static function muerte()
    {
        echo "<br> Me estoy destruyendo!";
    }
}//fin_clase