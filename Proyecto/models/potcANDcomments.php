<?php 
class PotcastC{

    private $_idpotcast;
    private $_nombre_potcast;
    private $_calificacion;
    private $_enlace;
    private $_caratula;
    private $_descripcion;
    private $_idcomentario;
    private $_idp;
    private $_comentario;


    public function __construct($idpotcast, $nombre_potcast, $calificacion, $enlace, $caratula, $descripcion, $idcomentario, $idp, $comentario) {
        $this->setId($idpotcast);
        $this->setNombreP($nombre_potcast);
        $this->setCalif($calificacion);
        $this->setEnlace($enlace);
        $this->setCaratula($caratula);
        $this->setDescription($descripcion);
        $this->setidcomentario($idcomentario);
        $this->setIdPotcast($idp);
        $this->setcomentario($comentario);
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

    public function getidcomentario(){
        return $this->_idcomentario;
    }

    public function setidcomentario($idcomentario) {
        $this->_idcomentario = $idcomentario;
    }

    public function getIdPotcast(){
        return $this->_idp;
    }

    public function setIdPotcast($idp) {
        $this->_idp = $idp;
    }

    public function getcomentario(){
        return $this->_comentario;
    }

    public function setcomentario($comentario) {
        $this->_comentario = $comentario;
    }


    // public function returnJson() {
    //     $potcast = array();

    //     $potcast["idpotcast"] = $this->getId();
    //     $potcast["nombre_potcast"] = $this->getNombreP();
    //     $potcast["calificacion"] = $this->getCalif();
    //     $potcast["enlace"] = $this->getEnlace();
    //     $potcast["caratula"] = $this->getCaratula();
    //     $potcast["descripcion"] = $this->getDescription();

    //     echo json_encode($potcast);
    // }
}

?>