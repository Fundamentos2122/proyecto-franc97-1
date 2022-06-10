<?php 

    // if(session_status() != PHP_SESSION_ACTIVE) session_start();

    include("../models/DBConnection.php");
    include("../models/PotcastDB.php");
    include("../models/potcANDcomments.php");

    
    try{
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e){
        error_log("Error de conexion " . $e, 0);

        exit;
    }

    // session_start();
    // if(array_key_exists("nombre_usuario", $_SESSION) && $_SESSION["rol"] !== "administrador"){
        
    // }
    // else{
    //     echo 
    //     "
    //     <form action='newPotcast.php'>
    //          <button class='add icons'><i class='bx bx-plus'></i></button>
    //      </form>
    //     <br>
    // ";
    // }
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //Leer
        if (array_key_exists("idpotcast", $_GET)) {
            //Traer la información de un elemento
            $idpotcast = $_GET["idpotcast"];
            
            try {
                $query = $connection->prepare("SELECT * FROM potcast WHERE idpotcast = :idpotcast");
                $query->bindParam(":idpotcast", $idpotcast, PDO::PARAM_INT);
                $query->execute();
    
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $potcast = new Potcast($row["idpotcast"], $row["nombre_potcast"], $row["calificacion"], $row["enlace"], $row["caratula"], $row["descripcion"], $row["active"]);
                    $potcast->returnJsonP();
                }
    
                exit();
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
    
                exit();
            }
        }
        else {
            //Traer el listado de todos los registros
            try {
                $query = $connection->prepare("SELECT * FROM potcast WHERE active=1");
                $query->execute();
                $pruevaA = array();
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $potcastC = new Potcast($row["idpotcast"], $row["nombre_potcast"], $row["calificacion"], $row["enlace"], $row["caratula"], $row["descripcion"],$row["active"]);
                    
                    // var_dump($potcast);

                        // if($potcastC->getId() === $potcastC->getIdPotcast()){
                            $auxuser2 = '';
                            if(array_key_exists("nombre_usuario", $_SESSION) && $_SESSION["rol"] !== "administrador"){
                                $auxuser2 = 
                                "
                             ";
                            }
                            else{
                                $auxuser2 = 
                                "<div class='dat'>
                                <form action='editPotcast.php' method='GET'>
                                 <input type='hidden' name='idpotcast'  value=". $potcastC->getId() ." style=''>
                                     <button class='icons'><i class='bx bxs-edit'></i></button>
                                 </form>
                             </div>
                            ";
                            }
                        // }

                            echo 
                            "
                            <div class='target'>
                                <div class='dat'>
                                    <div>
                                        <img src=\"data:image/jpeg;base64," . $potcastC->getCaratula() . "\" alt= 'user' width='150'>
                                    </div>
                                    <div class='contend'>
                                        <div>            
                                            <h5>" . $potcastC->getNombreP() ."</h5>
                                        </div>
                                        <div>            
                                        <p> "  . $potcastC->getDescription() ."</p>
                                        </div>
                                        <div>  
                                        <a href=" . $potcastC->getEnlace()." class='icons' target='_blank' rel='noopener noreferrer' ><i class='bx bx-link'></i></a>        
                                        </div>
                                       <div class='dat'>
                                            ". $auxuser2 ."
                                            <div class=''>
                                            <form action='comentarioP.php' method='GET'>
                                                <input type='hidden' name='idpotcast'  value=". $potcastC->getId() ." style=''>
                                                <button class='icons'><i class='bx bx-message-add'></i></i></i></button>
                                            </form>
                                        </div>
                                       </div>
                                     
                                    </div>
                                </div> 
                            </div> <br><br>";
                        //}
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
            $nombre_potcast = $_POST["nombre_potcast"];
            // $calificacion = $_POST["calificacion"];
            $calificacion ="";
            $enlace = $_POST["enlace"];
            $descripcion = $_POST["descripcion"];
            $caratula = "";

    
            if(sizeof($_FILES) > 0) {
                $tmp_name = $_FILES["caratula"]["tmp_name"];
                $caratula = file_get_contents($tmp_name);
            }
    
            try {
                $query = $connection->prepare('INSERT INTO potcast VALUES(NULL, :nombre_potcast, :calificacion, :enlace, :caratula, :descripcion, 1)');
                $query->bindParam(':nombre_potcast', $nombre_potcast, PDO::PARAM_STR);
                $query->bindParam(':calificacion', $calificacion, PDO::PARAM_INT);
                $query->bindParam(':enlace', $enlace, PDO::PARAM_STR);
                $query->bindParam(':caratula', $caratula, PDO::PARAM_STR);
                $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $query->execute();
    
                if ($query->rowCount() == 0) {
                    //Error
                    header("Location: http://localhost/Proyecto/views/error.php?error=error"); 

                    exit();
                }
    
                header("Location: http://localhost/Proyecto/views/catalogo.php");
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
                header("Location: http://localhost/Proyecto/views/error.php?error=imagen o texto muy grande"); 
                exit();
            }
        }
        else if ($_POST["_method"] == "PUT") {
            // Actualizar
            $idpotcast = $_GET["idpotcast"];
    
            $nombre_potcast = $_POST["nombre_potcast"];
            // $calificacion = $_POST["calificacion"];
            $enlace = $_POST["enlace"];
            $descripcion = $_POST["descripcion"];
            $caratula = "";
    
            $update_foto = false;
    
            if(sizeof($_FILES) > 0 && $_FILES["caratula"]["tmp_name"] !== "") {
                $tmp_name = $_FILES["caratula"]["tmp_name"];
                $caratula = file_get_contents($tmp_name);
                $update_foto = true;
            }
    
            try {
                $query_string = 'UPDATE potcast SET nombre_potcast = :nombre_potcast, enlace = :enlace, descripcion = :descripcion';
    
                if ($update_foto === true) {
                    $query_string = $query_string . ', caratula = :caratula';
                }
    
                $query = $connection->prepare($query_string . ' WHERE idpotcast = :idpotcast');
                $query->bindParam(':idpotcast', $idpotcast, PDO::PARAM_INT);
                $query->bindParam(':nombre_potcast', $nombre_potcast, PDO::PARAM_STR);
                // $query->bindParam(':calificacion', $calificacion, PDO::PARAM_INT);
                $query->bindParam(':enlace', $enlace, PDO::PARAM_STR);
                $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    
                if ($update_foto === true) {
                    $query->bindParam(':caratula', $caratula, PDO::PARAM_STR);
                }
    
                $query->execute();
    
                if ($query->rowCount() == 0) {
                    header("Location: http://localhost/Proyecto/views/error.php?error=No existe ese potcast");

    
                    exit();
                }
    
                header("Location: http://localhost/Proyecto/views/catalogo.php");
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
                var_dump($e);
                // header("Location: http://localhost/Proyecto/views/error.php?error=imagen o texto muy grande"); 
                exit();
            }
        }
        else if ($_POST["_method"] == "DELETE") {
            // Eliminar
            $id = $_GET["idpotcast"];
            $active =$_POST["active"];

            try {
                $query = $connection->prepare('UPDATE potcast SET active = :active WHERE idpotcast = :idpotcast');
                $query->bindParam(':idpotcast', $id, PDO::PARAM_INT);
                $query->bindParam(':active', $active, PDO::PARAM_INT);
                $query->execute();
        
                if($query->rowCount() === 0) {
                    echo "Error en la eliminación";

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

<!-- try {
                $query = $connection->prepare('DELETE FROM potcast WHERE idpotcast = :idpotcast');
                $query->bindParam(':idpotcast', $id, PDO::PARAM_INT);
                $query->execute();
    
                if ($query->rowCount() == 0) {
                    //Error
    
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
            //Error
        } -->