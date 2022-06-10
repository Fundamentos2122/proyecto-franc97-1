<?php 

    // if(session_status() != PHP_SESSION_ACTIVE) session_start();

    include("../models/DBConnection.php");
    include ("../models/usersDB.php");

    
    try{
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e){
        error_log("Error de conexion " . $e, 0);

        exit;
    }


    // var_dump($_POST);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Obtener información del POST
        if($_POST["_method"] == "PUT" ) 
        {
            // session_start();
            $iduser = $_POST["idusers"];
            $nombre_usuario = $_POST["nombre_usuario"];
            $correo = $_POST["correo"];

            var_dump($_POST);
            try {
                $query = $connection->prepare('UPDATE users SET nombre_usuario = :nombre_usuario, correo = :correo WHERE idusers = :idusers');
                $query->bindParam(":idusers", $iduser, PDO::PARAM_INT);
                $query->bindParam(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
                $query->bindParam(":correo", $correo, PDO::PARAM_STR);
                $query->execute();
                
                if ($query->rowCount() == 0) {
                    header("Location: http://localhost/Proyecto/views/error.php?error en query");
    
                    exit();
                }

                header("Location: http://localhost/Proyecto/views/perfil.php");

             
            }catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
                header("Location: http://localhost/Proyecto/views/error.php");

                exit();
            }
        }else{
            $nombre_usuario = trim($_POST["nombre_usuario"]);
            $correo = trim($_POST["correo"]);
            $contrasena = trim($_POST["contrasena"]);
            $casilla = $_POST["casilla"];
            $rol = "normal";


            // if($casilla === "on"){
            //     $rol = "administrador";
            // }else{
            //     $rol = "normal";
            // }
        
                
            $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
            try {
                $query = $connection->prepare('INSERT INTO users VALUES(NULL, :nombre_usuario, :correo, :contrasena, :rol)');
                $query->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $query->bindParam(':correo', $correo, PDO::PARAM_STR);
                $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $query->bindParam(':rol', $rol, PDO::PARAM_STR);
                $query->execute();
        
                if($query->rowCount() === 0) {
                    echo "Error en la inserción";
                    header("Location: http://localhost/Proyecto/views/error.php"); 

                }
                else {
                    header('Location: http://localhost/Proyecto/views/Perfil.php');
                }
            }
            catch(PDOException $e) {
                echo $e;
                header("Location: http://localhost/Proyecto/views/error.php"); 

            }
        }
    }
    else{
        
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            // session_start();
            $iduser = $_SESSION["idusers"];

            try {
                $query = $connection->prepare("SELECT * FROM users where idusers = :idusers");
                $query->bindParam(":idusers", $iduser, PDO::PARAM_INT);
                $query->execute();
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $usersA = new Usuario($row["idusers"], $row["nombre_usuario"], $row["correo"], $row["contrasena"], $row["rol"]);
                    
                    echo 
                    " <div>
                        <label for=''>___________________________________________</label>
                        <center><label for=''>". $usersA->getNombreU() ."</label></center>
                            <br>
                        <center><label for=''>Correo electronico: &nbsp &nbsp &nbsp". $usersA->getCorreo() ."</label></center>
                            <br>
                      </div>
                      <div>
                        <form action='editUsuario.php'>
                            <input type='hidden' name='idusers' value=".$usersA->getId().">
                            <input type='hidden' name='nombre_usuario' value=".$usersA->getNombreU().">
                            <input type='hidden' name='correo' value=".$usersA->getCorreo().">
                            <center><input type='submit' value='Editar' class='btn success'></center>
                        </form>
                      </div>
                     </div>
                    ";
                        
                }
            }catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
                header("Location: http://localhost/Proyecto/views/error.php"); 

                exit();
            }
        }else{
            header("Location: http://localhost/Proyecto/views/error.php"); 

        }
    }
    

  

?>
