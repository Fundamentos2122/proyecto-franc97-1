<?php 
class PCompleto {

    private $_idpotcast;
    private $_nombre_potcast;
    private $_calificacion;
    private $_enlace;
    private $_caratula;
    private $_descripcion;
    private $_active;
    private $_genero;
    private $_nombre;
  


    public function __construct($idpotcast, $nombre_potcast, $calificacion, $enlace, $caratula, $descripcion, $active, $genero, $nombre) {
        $this->setId($idpotcast);
        $this->setNombreP($nombre_potcast);
        $this->setCalif($calificacion);
        $this->setEnlace($enlace);
        $this->setCaratula($caratula);
        $this->setDescription($descripcion);
        $this->setActive($active);
        $this->setGenero($genero);
        $this->setnombreA($nombre);
    }

    public function getId() {
        return $this->_idpotcast;
    }

    public function setId($idpotcast) {
        $this->_idpotcast = $idpotcast;
    }


    public function getNombreP() {
        return $this->_nombre_potcast;
    }

    public function setNombreP($nombre_potcast) {
        $this->_nombre_potcast = $nombre_potcast;
    }

    public function getCalif() {
        return $this->_calificacion;
    }

    public function setCalif($calificacion) {
        $this->_calificacion = $calificacion;
    }

    public function getEnlace() {
        return $this->_enlace;
    }

    public function setEnlace($enlace) {
        $this->_enlace = $enlace;
    }

    public function getCaratula() {
        return $this->_caratula;
    }

    public function setCaratula($caratula) {
        $this->_caratula = base64_encode($caratula);
    }

    public function getDescription(){
        return $this->_descripcion;
    }


    public function setDescription($descripcion){
        $this->_descripcion = $descripcion;
    }

    public function getActive(){
        return $this->_active;
    }

    public function setActive($active){
        $this->_active = $active;
    }

    public function getnombreA(){
        return $this->_nombre;
    }

    public function setnombreA($nombre) {
        $this->_nombre = $nombre;
    }

    public function getGenero(){
        return $this->_genero;
    }

    public function setGenero($genero) {
        $this->_genero = $genero;
    }
    // public function returnJsonP() {
    //     $potcast = array();

    //     $potcast["idpotcast"] = $this->getId();
    //     $potcast["nombre_potcast"] = $this->getNombreP();
    //     $potcast["calificacion"] = $this->getCalif();
    //     $potcast["enlace"] = $this->getEnlace();
    //     $potcast["caratula"] = $this->getCaratula();
    //     $potcast["descripcion"] = $this->getDescription();
    //     $potcast["descripcion"] = $this->getActive();

    //     echo json_encode($potcast);
    // }
}

?>