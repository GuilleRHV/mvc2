<?php


namespace Dwes\Galaxias;

echo "<br>Namespace actual: ". __NAMESPACE__;

/**
 * Direccionamiento namespace
 * 1 - Sin direccionamiento
 * 2 - Direccionamiento relativo
 * 3 - direccionamiento absoluto
 *
 */

 include "galaxia1.php";
 
 echo "<h2>Sin direccionamiento</h2>";
 echo "Radio de la galaxia : " . RADIO;
 observar("Via Lactea");
 $gl = new Galaxia();
 Galaxia::muerte();


 echo "<h2>Direccionamiento relativo</h2>";
//navego a partir de mi ubicacion ACTUAL
 include "pegaso/pegaso.php";
 echo "Radio de la galaxia : ". Pegaso\RADIO;
Pegaso\observar("Via Lactea");
$gl = new Pegaso\Galaxia();
 Pegaso\Galaxia::muerte();



 echo "<h2>Direccionamiento absoluto</h2>";
 //navego a partir de mi ubicacion ACTUAL

  echo "Radio de la galaxia : ". \Dwes\Galaxias\Pegaso\RADIO;
  \Dwes\Galaxias\Pegaso\observar("Via Lactea");
 $gl = new \Dwes\Galaxias\Pegaso\Galaxia();
  \Dwes\Galaxias\Pegaso\Galaxia::muerte();

//Elemento individual
  use const \Dwes\Galaxias\Pegaso\RADIO;
  use function \Dwes\Galaxias\observar;
  use \Dwes\Galaxias\Galaxia;
  echo "<br>El radio es: " . RADIO;
  echo "<br>El radio es: " . observar("Otra galaxia");
  echo "<br>objeto de galaxia generico: " . new Galaxia();

  //Apodar namespace -> alias
  use \Dwes\Galaxias\Pegaso\Galaxia as Seiya;
  use \Dwes\Galaxias\Galaxia as Galaxus;
  echo "<br><br>";
  $pg = new Seiya();
  $glc = new Galaxus();
  //Seiya\observar("Observando a Seiya");
  //Galaxus\observar("Observando a Galaxus");