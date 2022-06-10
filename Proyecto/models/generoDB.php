<?php

    class Genero{
        private $_idcategoria;
        private $_id_potcast;
        private $_genero;


        public function __construct($idcategoria, $id_potcast, $genero){
            $this->setidcategoria($idcategoria);
            $this->setMemeidcategoria($id_potcast);
            $this->setgenero($genero);
        }

        public function getidcategoria(){
            return $this->_idcategoria;
        }

        public function setidcategoria($idcategoria) {
            $this->_idcategoria = $idcategoria;
        }

        public function getIdPotcast(){
            return $this->_id_potcast;
        }

        public function setIdPotcast($id_potcast) {
            $this->_id_potcast = $id_potcast;
        }

        public function getgenero(){
            return $this->_genero;
        }

        public function setgenero($genero) {
            $this->_genero = $genero;
        }
    }

?>