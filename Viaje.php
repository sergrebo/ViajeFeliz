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
    
    /**
     * Retorna el valor codigo
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Setea el valor codigo
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    /**
     * Retorna el valor destino
     */
    public function getDestino() {
        return $this->destino;
    }

    /**
     * Setea el valor destino
     */
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    /**
     * Retorna el valor cantMaxPasajeros
     */
    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }

    /**
     * Setea el valor cantMaxPasajeros
     */
    public function setCantMaxPasajeros($cantMaxPasajeros) {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    /**
     * Retorna el valor pasajeros
     */
    public function getPasajeros() {
        return $this->pasajeros;
    }

    /**
     * Setea el valor pasajeros
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

    /**
     * Imprime en pantalla la informacion contenida en los atributos del objeto
     */
    public function __toString() {
    return ("Datos del viaje:\nCodigo: ". $this->getCodigo(). "\n". 'Destino: '. $this->getDestino(). "\n". 'Cantidad máxima de pasajeros: '. $this->getCantMaxPasajeros(). "\n". "Pasaje:\n". $this->pasajerosAString. "\n" /* json_encode($this->getPasajeros()) */);
    }
    
    /**
     * 
     */
     public function pasajerosAString() {
       for ($i = 0; $i < count($this->getPasajeros()-1); $i++) {
          $oracion = "";
          foreach ($this->getPasajeros() as $pasajero) {
            $oracion = $i. " Nombre: ". $this->getPasajeros()["nombre"]. " Apellido: ". $this->getPasajeros()["apellido"]. " DNI ". $this->getPasajeros()["nroDocumento"];
          }
       }
      return $oracion;
     }
  
}
