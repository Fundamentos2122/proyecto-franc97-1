<?php

    class Potcaster{
        private $_idpotcaster;
        private $_idpotcast;
        private $_nombre;


        public function __construct($idcategoria, $idpotcast, $nombre){
            $this->setidcategoria($idcategoria);
            $this->setMemeidcategoria($idpotcast);
            $this->setCategoria($nombre);
        }

        public function getidcategoria(){
            return $this->_idcategoria;
        }

        public function setidcategoria($idcategoria) {
            $this->_idcategoria = $idcategoria;
        }

        public function getIdPotcast(){
            return $this->_idpotcast;
        }

        public function setIdPotcast($idpotcast) {
            $this->_idpotcast = $idpotcast;
        }

        public function getnombre(){
            return $this->_nombre;
        }

        public function setnombre($nombre) {
            $this->_nombre = $nombre;
        }
    }

?>