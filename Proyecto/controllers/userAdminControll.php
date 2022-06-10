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



    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //Leer
        if (array_key_exists("idpotcast", $_GET)) {
      
        }
        else {
            //Traer el listado de todos los registros
            try {
                $query = $connection->prepare("SELECT * FROM users ");
                $query->execute();
                $pruevaA = array();
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $usersw = new Usuario($row["idusers"], $row["nombre_usuario"], $row["correo"], $row["contrasena"], $row["rol"]);
                    
                    // var_dump($potcast);

                        if($usersw->getRol() !== 'administrador'){

                            echo 
                            "  
                            <tr>
                                <td>". $usersw->getId()."</td>
                                <td>". $usersw->getNombreU()."</td>
                            </tr>
                            ";
                        }
                        
                }   
        
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);

                exit();
            }
            
        }
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["_method"] == "POST") {
            //Guardar
        }
        else if ($_POST["_method"] == "PUT") {
            // Actualizar
        }
        else if ($_POST["_method"] == "DELETE") {
            // Eliminar
            $id = $_POST["idusers"];

            try {
                $query = $connection->prepare('DELETE FROM users WHERE idusers = :idusers');
                $query->bindParam(':idusers', $id, PDO::PARAM_INT);
                $query->execute();

                if ($query->rowCount() == 0) {
                    //Error
                    header("Location: http://localhost/Proyecto/views/error.php"); 

                    exit();
                }

                header("Location: http://localhost/Proyecto/views/catalogo.php");
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);

                exit();
            }
           
        }
        else {
            header("Location: http://localhost/Proyecto/views/error.php"); 

        }
    }

?>    