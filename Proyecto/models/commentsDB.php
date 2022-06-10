<?php

    class Comentario {
        private $_idcomentario;
        private $_idp;
        private $_comentario;


        public function __construct($idcomentario, $idp, $comentario){
            $this->setidcomentario($idcomentario);
            $this->setIdPotcast($idp);
            $this->setcomentario($comentario);
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

        // public function returnJsonComments() {
        //     $comentarioA = array();
    
        //     $comentarioA["idpotcast"] = $this->getId();
        //     $comentarioA["nombre_potcast"] = $this->getNombreP();
        //     $comentarioA["calificacion"] = $this->getCalif();
        //     $comentarioA["enlace"] = $this->getEnlace();
        //     $comentarioA["caratula"] = $this->getCaratula();
        //     $comentarioA["descripcion"] = $this->getDescription();
    
        //     echo json_encode($comentarioA);
        // }
    }

?>