<?php
include "Viaje.php";

/** Menú principal
 * @return INT
*/
function seleccionarMenuPpal() {
    //INT $opcion
    echo "----------MENÚ DE OPCIONES----------\n1. Cargar la información de un viaje\n2. Modificar la información de un viaje\n3. Ver sus datos\n4. Salir\nSELECCIONE SU OPCION";
    $opcion = solicitarNumeroEntre(1, 4);
    return $opcion;
}

/** Solicita un numero entre un rango de valores y verifica que el numero ingresado se encuentre en ese rango
 * @param INT $min
 * @param INT $max
 * @return INT
 */
function solicitarNumeroEntre($min, $max) {
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/** Solicita una cadena, si no es una palabra formada unicamente por letras, vuelve a solicitar la cadena
 * @return STRING
 */
function esPalabra() {
    //INT $i, BOOLEAN $esLetra
    $cadena = trim(fgets(STDIN));
    $esLetra = true;
    $i = 0;
    while ($esLetra && $i < strlen($cadena)) {  //strlen, devuelve la cantidad de elementos que tiene un string
        $esLetra =  ctype_alpha($cadena[$i]);   //ctype_alpha, verifica que el string esté formado únicamente por letras
        $i++;
        while (!$esLetra) {
            echo "La palabra ingresada solo debe estar formada por letras. Ingrese la palabra correcta: ";
            $cadena = trim(fgets(STDIN));
            $i = 0;
        }
    }
    return $cadena;
}

/** Solicita un numero mayor a un numero especificado y verifica que el numero cumpla la condicion, caso contraro solicita otro numero
 * @param INT $min
 * @return INT
 */
function solicitarNumeroMayorA($min) {
    //INT $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min)) {
        echo "Debe ingresar un mayor a " . $min. ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/** Arma el arreglo pasajeros
 * @param INT $iMaximo
 * @return ARRAY
 */
function construirPasajeros($iMaximo) {
    //STRING $nombre
    echo '¿Cuantos pasajeros estan inculidos en el viaje?';
    $nroPasaje = trim(fgets(STDIN));
    for ($i=0; $i < $iMaximo && $i < $nroPasaje; $i++) {

        echo 'Datos del pasajero numero'. ($i + 1). "\n". 'Ingrese el nombre del pasajero: ';
        $nombre = esPalabra();
        echo 'Ingrese el apellido del pasajero: ';
        $apellido = esPalabra();
        echo 'Ingrese el numero de documento del pasajero: ';
        $nroDocumento = trim(fgets(STDIN));
        while (!is_int($nroDocumento)) {
            echo 'El numero de documento debe ser un numero. Ingrese el numero correctamente: ';
            $nroDocumento = trim(fgets(STDIN));
        }
        $pasajeros[$i]["nombre"] = $nombre;
        $pasajeros[$i]["apellido"] = $apellido;
        $pasajeros[$i]["nroDocumento"] = $nroDocumento;
    }
}

/** Menu opcion 2 - Modificar la informacion de un viaje
 * 
 */
function seleccionarMenu2() {
    //INT $eleccion
    echo "----------INGRESE SU OPCIÓN----------\n1. Cambiar el código del viaje\n2. Cambiar el destino del viaje\n3. Cambiar la capacidad máxima de pasajeros del viaje\n4. Modificar la nomina de pasajeros del viaje";
    $eleccion = solicitarNumeroEntre(1, 4);
    return $eleccion;
}

/** Menu opcion 2 / opcion 4 - Modificar la nomina de pasajeros de un viaje
 * 
 */
function seleccionarModPasajeros() {
    //INT $alternativa
    echo "----------INGRESE SU OPCIÓN----------\n1. Desechar la actual nomina y cargar una nueva\n2. Modificar un valor de la nomina";
    $alternativa = solicitarNumeroEntre(1, 2);
    return $alternativa;
}

do {
    $opcion = seleccionarMenuPpal();
    
    switch ($opcion) {
        case 1:         //1. Cargar la información de un viaje
            echo 'Ingrese el código del viaje: ';
            $codigo = trim(fgets(STDIN));
            
            echo 'Ingrese el destino del viaje: ';
            $destino = esPalabra();

            echo 'Ingrese la capacidad máxima de pasajeros del viaje: ';
            $cantMaxPasajeros = solicitarNumeroMayorA(0);

            $pasajeros = construirPasajeros($cantMaxPasajeros);

            $objViaje = new Viaje ($codigo, $destino, $cantMaxPasajeros, $pasajeros);

            break;
        
        case 2:         //2. Modificar la información de un viaje
            switch ($eleccion) {
                case 1:         //1. Cambiar el código del viaje
                    echo 'Ingrese el nuevo código: ';
                    $objViaje->codigo = trim(fgets(STDIN));               //DONDE ESTAN LOS OBJETOS VIAJE??? LOS VALIDO???
                    break;
                
                case 2:         //2. Cambiar el destino del viaje
                    echo 'Ingrese el nuevo destino: ';
                    $objViaje->destino = esPalabra();
                    break;

                case 3:         //3. Cambiar la capacidad máxima de pasajeros del viaje
                    echo 'Ingrese la nueva capacidad máxima de pasajeros del viaje: ';
                    $objViaje->cantMaxPasajeros = solicitarNumeroMayorA(0);
                    break;

                case 4:         //4. Modificar la nomina de pasajeros del viaje
                    switch ($alternativa) {
                        case 1:         //1. Desechar la actual nomina y cargar una nueva
                            $pasajeros = construirPasajeros($cantMaxPasajeros);
                            break;
                        
                        case 2:         //2. Modificar un valor de la nomina
                            # code...
                            break;
                    }
                    break;

            }
            break;
        
        case 3:
            echo $objViaje;
            break;
    }
} while ($opcion != 4);