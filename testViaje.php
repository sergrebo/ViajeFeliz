<?php
include "Viaje.php";

//Arreglo predefinido
$pasaje = array(
    array("nombre" => "Emi", "apellido" => "Rebolledo", "nroDocumento" => 33823405),
    array("nombre" => "Juan", "apellido" => "Pérez", "nroDocumento" => 12345678),
    array("nombre" => "María", "apellido" => "González", "nroDocumento" => 23456789),
    array("nombre" => "Pedro", "apellido" => "Rodríguez", "nroDocumento" => 34567890),
    array("nombre" => "Ana", "apellido" => "Martínez", "nroDocumento" => 87654321));

//Creo el objeto
$cataratas = new Viaje(3258937, 'Cataratas', 48, $pasaje);

//Imprimo la informacion del objeto
echo $cataratas;
