<?php  

class Usuario {
    private $_idusers;
    private $_nombre_usuario;
    private $_correo;
    private $_contrasena;
    private $_rol;


        
    public function __construct($idusers, $nombre_usuario, $correo, $contrasena, $rol) {
        $this->setId($idusers);
        $this->setNombreU($nombre_usuario);
        $this->setCorreo($correo);
        $this->setPassword($contrasena);
        $this->setRol($rol);
    }

    public function getId() {
        return $this->_idusers;
    }

    public function setId($idusers) {
        $this->_idusers = $idusers;
    }


    public function getNombreU() {
        return $this->_nombre_usuario;
    }

    public function setNombreU($nombre_usuario) {
        $this->_nombre_usuario = $nombre_usuario;
    }

    public function getCorreo() {
        return $this->_correo;
    }

    public function setCorreo($correo) {
        $this->_correo = $correo;
    }

    public function getPassword() {
        return $this->_contrasena;
    }

    public function setPassword($contrasena) {
        $this->_contrasena = $contrasena;
    }

    public function getRol() {
        return $this->_rol;
    }

    public function setRol($rol) {
        $this->_rol = $rol;
    }


    public function getArray() {
        $arrayUser = array();

        $arrayUser["idusers"] = $this->getId();
        $arrayUser["nombre_usuario"] = $this->getNombreU();
        $arrayUser["correo"] = $this->getCorreo();
        $arrayUser["contrasena"] = $this->getPassword();
        $arrayUser["rol"] = $this->getRol();

        return $arrayUser;
    }
}

?>