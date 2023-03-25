<?php
class Viaje {
    //Atributos

    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;


    //Metodos

    public function __construct($codigo, $destino,$cantMaxPasajeros, $pasajeros) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->pasajeros = $pasajeros;
        //$this->pasajeros = $pasajeros['nombre', 'apellido', 'nroDocumento']; ???????
    }
    
    /** Retorna el valor codigo
     * @return STRING
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /** Setea el valor codigo
     * @param STRING $codigo
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    /** Retorna el valor destino
     * @return STRING
     */
    public function getDestino() {
        return $this->destino;
    }

    /** Setea el valor destino
     * @param STRING $destino
     */
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    /** Retorna el valor cantMaxPasajeros
     * @return INT
     */
    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }

    /** Setea el valor cantMaxPasajeros
     * @param INT $cantMaxPasajeros
     */
    public function setCantMaxPasajeros($cantMaxPasajeros) {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    /** Retorna el valor pasajeros
     * @return ARRAY
     */
    public function getPasajeros() {
        return $this->pasajeros;
    }

    /** Setea el valor pasajeros
     * @param ARRAY $pasajeros
     */
    public function setPasajeros($pasajeros) {
        $this->pasajeros = $pasajeros;
    }

    public function cambiarDatoPasajeros($indicePasajero, $clave, $nuevoDato) {
        $this->pasajeros[$indicePasajero][$clave] = $nuevoDato;
        
        /* while ($a <= count(getPasajeros())) {
            # code...
        }
        */
    }

    /** Setea el valor pasajeros[nombre]
     * @param INT $indicePasajero
     * @param STRING $nuevoNombre
     */
    public function setNombre($indicePasajero, $nuevoNombre) {
        $this->pasajeros[$indicePasajero]["nombre"] = $nuevoNombre;
    }

    /** Setea el valor pasajeros[apellido]
     * @param INT $indicePasajero
     * @param STRING $nuevoApellido
     */
    public function setApellido($indicePasajero, $nuevoApellido) {
        $this->pasajeros[$indicePasajero]["apellido"] = $nuevoApellido;
    }

    /** Setea el valor pasajeros[nroDocumento]
     * @param INT $indicePasajero
     * @param STRING $nuevoNroDocumento
     */
    public function setNroDocumento($indicePasajero, $nuevoNroDocumento) {
        $this->pasajeros[$indicePasajero]["nroDocumento"] = $nuevoNroDocumento;
    }

    /** Imprime en pantalla la informacion contenida en los atributos del objeto
     * @return STRING
     */
    public function __toString() {
    return ("Datos del viaje:\nCodigo: ". $this->getCodigo(). "\n". 'Destino: '. $this->getDestino(). "\n". 'Cantidad máxima de pasajeros: '. $this->getCantMaxPasajeros(). "\n". "Pasaje:\n". $this->pasajerosAString(). "\n");
    }
    
    /** Convierte el arreglo $pasajeros a un string legible
     * @return STRING
     */
     public function pasajerosAString() {
        //var_dump($this->getPasajeros());
        $oracion = "";
        foreach ($this->getPasajeros() as $pasajero) {
            $oracion .= "Nombre: ". $pasajero["nombre"]. " Apellido: ". $pasajero["apellido"]. " DNI ". $pasajero["nroDocumento"]. "\n";
        }
       /* for ($i = 0; $i < count($this->getPasajeros())-1; $i++) {
          foreach ($this->getPasajeros() as $pasajero) {
            $oracion .= $i. " Nombre: ". $this->getPasajeros()[$i]["nombre"]. " Apellido: ". $this->getPasajeros()[$i]["apellido"]. " DNI ". $this->getPasajeros()[$i]["nroDocumento"]. "\n";
          }
       } */
      return $oracion;
     }
  
}
