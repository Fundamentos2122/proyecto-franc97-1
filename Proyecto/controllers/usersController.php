<?php 

    include("../models/DBConnection.php");
    include("../models/usersDB.php");

    try {
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e) {
        error_log("Error de conexión - " . $e, 0);

        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["_method"] == "POST") {
            //Login
            //  var_dump($_POST);
            $nombre_usuario = trim($_POST["nombre_usuario"]);
            $contrasena = trim($_POST["contrasena"]);
    
            try {
                $query = $connection->prepare('SELECT * FROM users WHERE nombre_usuario = :nombre_usuario');
                $query->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                // $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $query->execute();
    
                if($query->rowCount() == 0) {
                    //No se encontró al usuario
                    header("Location: http://localhost/Proyecto/views/login_Admin.php?error=Usuario y/o contraseña inválidos");

                    exit();
                }
    
                $usuario;
    
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $usuario = new Usuario($row["idusers"], $row["nombre_usuario"], $row["correo"], $row["contrasena"], $row["rol"]);
                }

                if (!password_verify($contrasena, $usuario->getPassword())) {
                    header("Location: http://localhost/Proyecto/views/login_Admin.php?error=Usuario y/o contraseña inválidos");
                    exit();
                }
    
    
                session_start();
    
                $_SESSION["idusers"] = $usuario->getId();
                $_SESSION["nombre_usuario"] = $usuario->getNombreU();
                $_SESSION["correo"] = $usuario->getCorreo();
                $_SESSION["rol"] = $usuario->getRol();

                // if($_SESSION["rol"] !== "administrador"){
                //     header("Location: http://localhost/Proyecto/views/catalogo.php");

                // }else{
                //     header("Location: http://localhost/Proyecto/views/catalogo_Admin.php");

                // }
                    
                header("Location: http://localhost/Proyecto/views/catalogo.php");
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
    
                header("Location: http://localhost/Proyecto/views/error.php"); 

    
                exit();
            }
        }
        elseif ($_POST["_method"] == "DELETE") {
            //Logout
            session_start();
    
            session_destroy();
    
            header("Location: http://localhost/Proyecto/");
    
            exit();
        }
    }

?>               
 <!-- $query = $connection->prepare('SELECT * FROM users WHERE nombre_usuario = :nombre_usuario AND contrasena = :contrasena'); -->
