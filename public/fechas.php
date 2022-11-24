<?php

//horas

echo "<br>La hora es : " . time();

echo "<br> La hora es : " . strtotime("+1 month");

//fechas : date , DateTime

echo "<br> La fecha es : " . date("d-F-Y");

$fecha = new DateTime("now");
echo "<br><h2>Uso del datetime</h2>";
echo "<br>";

var_dump($fecha);
$fecha = new DateTime("+11 weeks");
echo "<br><br>";
var_dump($fecha);
echo "<br><h2>datetime->format()</h2><br>";
echo "Intento de fecha : " . $fecha->format("d-M-y") . "<br>";

$mifecha = DateTime::createFromFormat("d/m/Y","12/10/2018");
var_dump($mifecha);
echo "<br>Fecha en español : " . $fecha->format("j-n-Y") . "<br>";
