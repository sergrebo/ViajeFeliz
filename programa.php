<?php
include "Viaje.php";

//FUNCIONES
/** Menú principal
 * @return INT
*/
function seleccionarMenuPpal() {
    //INT $opcion
    echo "----------MENÚ DE OPCIONES----------\n1. Cargar la información de un viaje\n2. Modificar la información de un viaje\n3. Ver sus datos\n4. Salir\nSELECCIONE SU OPCION: ";
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

/** Solicita una cadena, si no es una palabra formada unicamente por letras y espacios, vuelve a solicitar la cadena
 * @return STRING
 */
function esPalabra() {
    //INT $i, BOOLEAN $esLetra
    $cadena = trim(fgets(STDIN));
    $esLetra = true;
    $i = 0;
    while ($esLetra && $i < strlen($cadena)) {  //strlen, devuelve la cantidad de elementos que tiene un string
        $esLetra =  ctype_alpha($cadena[$i]);   //ctype_alpha, verifica que el string esté formado únicamente por letras
        
        if (!$esLetra) {
            $esLetra = ctype_space($cadena[$i]);         //ctype_space chequea posibles caracteres de espacio en blanco
        }
        $i++;
        while (!$esLetra) {
            echo "La palabra ingresada solo debe estar formada por letras. Ingrese la palabra correcta: ";
            $cadena = trim(fgets(STDIN));
            $i = 0;
            $esLetra = true;
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
        echo "Debe ingresar un numero mayor a " . $min. ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/** Arma el arreglo pasajeros
 * @param INT $iMaximo
 * @return ARRAY
 */
function construirPasajeros($iMaximo) {
    //STRING $nombre, $apellido $INT $nroPasaje, $nroDocumento ARRAY $pasajeros
    echo '¿Cuantos pasajeros estan inculidos en el viaje? ';
    $nroPasaje = trim(fgets(STDIN));
    for ($i=0; $i < $iMaximo && $i < $nroPasaje; $i++) {

        echo 'Datos del pasajero numero '. ($i + 1). "\n". 'Ingrese el nombre del pasajero: ';
        $nombre = esPalabra();
        echo 'Ingrese el apellido del pasajero: ';
        $apellido = esPalabra();
        echo 'Ingrese el numero de documento del pasajero: ';
        $nroDocumento = solicitarNumero();
        /*
        trim(fgets(STDIN));
        while (!(is_int($nroDocumento))) {
            echo 'El numero de documento debe ser un numero. Ingrese el numero correctamente: ';
            $nroDocumento = trim(fgets(STDIN));
            var_dump($nroDocumento);
        }
        */
        $pasajeros[$i]["nombre"] = $nombre;
        $pasajeros[$i]["apellido"] = $apellido;
        $pasajeros[$i]["nroDocumento"] = $nroDocumento;
    }
    return $pasajeros;
}

/** Menu opcion 2 - Modificar la informacion de un viaje
 * 
 */
function seleccionarMenu2() {
    //INT $eleccion
    echo "----------MENÚ DE OPCIONES----------\n1. Cambiar el código del viaje\n2. Cambiar el destino del viaje\n3. Cambiar la capacidad máxima de pasajeros del viaje\n4. Modificar la nomina de pasajeros del viaje\nINGRESE SU OPCIÓN: ";
    $eleccion = solicitarNumeroEntre(1, 4);
    return $eleccion;
}

/** Menu opcion 2 / opcion 4 - Modificar la nomina de pasajeros de un viaje
 * @return INT
 */
function seleccionarModPasajeros() {
    //INT $alternativa
    echo "----------MENÚ DE OPCIONES----------\n1. Desechar la actual nomina y cargar una nueva\n2. Modificar un valor de la nomina\nINGRESE SU OPCIÓN: ";
    $alternativa = solicitarNumeroEntre(1, 2);
    return $alternativa;
}

/** Solicita un numero y verifica que lo ingresado sea un numero
 * @return INT
 */
function solicitarNumero() {
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_numeric($numero)) {          //is_numeric comprueba si una variable es un número o un string numérico
        echo "Debe ingresar un número. Intentelo de nuevo: ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/** Menu opcion 2 / opcion 4 / opcion 2 - Modificar un dato dentro de la nomina de pasajeros de un viaje
 * @return INT
 */
function seleccionarModDatoPasajeros() {
    //INT $seleccion
    echo "----------MENÚ DE OPCIONES----------\n1. Cambiar el nombre de un pasajero\n2. Modificar el apellido de un pasajero\n3. Cambiar el número de documento de un pasajero\nINGRESE SU OPCIÓN: ";
    $seleccion = solicitarNumeroEntre(1, 3);
    return $seleccion;
}

//PROGRAMA PRINCIPAL
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

            $objViaje = new Viaje ($codigo, $destino, $cantMaxPasajeros, $pasajeros); //???

            break;
        
        case 2:         //2. Modificar la información de un viaje
            $eleccion = seleccionarMenu2();
            switch ($eleccion) {
                case 1:         //1. Cambiar el código del viaje
                    echo 'Ingrese el nuevo código: ';
                    $objViaje->setCodigo(trim(fgets(STDIN)));               //DONDE ESTAN LOS OBJETOS VIAJE??? LOS VALIDO???
                    break;
                
                case 2:         //2. Cambiar el destino del viaje
                    echo 'Ingrese el nuevo destino: ';
                    $objViaje->setDestino(esPalabra());
                    break;

                case 3:         //3. Cambiar la capacidad máxima de pasajeros del viaje
                    echo 'Ingrese la nueva capacidad máxima de pasajeros del viaje: ';
                    $objViaje->setCantMaxPasajeros(solicitarNumeroMayorA(0));
                    break;

                case 4:         //4. Modificar la nomina de pasajeros del viaje
                    $alternativa = seleccionarModPasajeros();
                    switch ($alternativa) {
                        case 1:         //1. Desechar la actual nomina y cargar una nueva
                            $objViaje->setPasajeros(construirPasajeros($cantMaxPasajeros));
                            break;
                        
                        case 2:         //2. Modificar un valor de la nomina
                            $seleccion = seleccionarModDatoPasajeros();
                            echo 'Ingrese el numero de pasajero que desea modificar: ';
                            $indicePasajero = solicitarNumeroEntre(0, (count($pasajeros))-1);        //DE DONDE PUEDE VER EL USUARIO EL NUMERO DEL INDICE??? count(getPasajeros())???
                            switch ($seleccion) {
                                case 1:         //1. Cambiar el nombre de un pasajero
                                    echo 'Ingrese el nuevo nombre que desea registrar: ';
                                    $nuevoNombre = esPalabra();
                                    $objViaje->setNombre($indicePasajero, $nuevoNombre);
                                    break;
                                
                                case 2:         //2. Modificar el apellido de un pasajero
                                    echo 'Ingrese el nuevo apellido que desea registrar: ';
                                    $nuevoApellido = esPalabra();
                                    $objViaje->setApellido($indicePasajero, $nuevoApellido);
                                    break;

                                case 3:         //3. Cambiar el número de documento de un pasajero
                                    echo 'Ingrese el nuevo número de documento que desea registrar: ';
                                    $nuevoNroDocumento = solicitarNumero();
                                    $objViaje->setNroDocumento($indicePasajero, $nuevoNroDocumento);
                                    break;
                            }
                            
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