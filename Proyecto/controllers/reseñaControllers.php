<?php 

    // if(session_status() != PHP_SESSION_ACTIVE) session_start();

    include("../models/DBConnection.php");
    include("../models/generoAndAuthors.php");

    
    try{
        $connection = DBConnection::getConnection();
    }
    catch(PDOException $e){
        error_log("Error de conexion " . $e, 0);

        exit;
    }
    
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
                $query = $connection->prepare("SELECT p.idpotcast, p.nombre_potcast, p.calificacion, p.enlace, p.caratula, p.descripcion, p.active, c.genero, a.nombre FROM potcast  as p left join  categoria as c on c.id_potcast = p.idpotcast left join potcaster as a on a.idpotcast = p.idpotcast WHERE active=1");
                $query->execute();
                $pruevaA = array();
                $aucp = 0;
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $potcastC = new PCompleto($row["idpotcast"], $row["nombre_potcast"], $row["calificacion"], $row["enlace"], $row["caratula"], $row["descripcion"],$row["active"], $row["genero"], $row["nombre"]);


                            $aucAuthor = "";
                            $auxGen ="";
                            $auxcalif="";
                            if($potcastC->getnombreA() !== NUll)
                            {
                                $aucAuthor = "<h8> Conductores: </h8>  <p> "  . $potcastC->getnombreA() ."</p>";
                            }elseif($potcastC->getGenero() !== null){
                                $auxGen = "<h8> Genero: </h8>  <p> " . $potcastC->getGenero() ."</p>
                                ";
                            }
                            
                            if($potcastC->getCalif() >= 10 && $potcastC->getCalif() < 20){
                                $auxcalif= "<div><i class='bx bxs-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i></div>";
                            }elseif($potcastC->getCalif() >= 20 && $potcastC->getCalif() < 30){
                                $auxcalif= "<div><i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i></div>";

                            }elseif($potcastC->getCalif() >= 30 && $potcastC->getCalif() < 40){
                                $auxcalif= "<div><i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i></div>";

                            }elseif($potcastC->getCalif() >= 40 && $potcastC->getCalif() < 50){
                                $auxcalif= "<div><i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bx-star'></i></div>";

                            }elseif($potcastC->getCalif() > 50){
                                $auxcalif= "<div><i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i></div>";

                            }
                            elseif($potcastC->getCalif() < 10){
                                $auxcalif= "<div><i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i></div>";
                            }


                    if($aucp !== $potcastC->getId()){
                        $aucp = $potcastC->getId();
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
                                        ".  $aucAuthor ."
                                           ".  $auxGen ."
                                        <div>
                                        ".$auxcalif."
                                        </div>
                                    </div>
                                </div> 
                            </div> <br>";
                        //}
                    }
                }
                
            }
            catch(PDOException $e) {
                error_log("Error en query - " . $e, 0);
    
                exit();
            }
            
        }
    }
    // elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if ($_POST["_method"] == "POST") {
    //         //Guardar
    //         $nombre_potcast = $_POST["nombre_potcast"];
    //         $calificacion = $_POST["calificacion"];
    //         $enlace = $_POST["enlace"];
    //         $descripcion = $_POST["descripcion"];
    //         $caratula = "";
    
    //         if(sizeof($_FILES) > 0) {
    //             $tmp_name = $_FILES["caratula"]["tmp_name"];
    //             $caratula = file_get_contents($tmp_name);
    //         }
    
    //         try {
    //             $query = $connection->prepare('INSERT INTO potcast VALUES(NULL, :nombre_potcast, :calificacion, :enlace, :caratula, :descripcion, 1)');
    //             $query->bindParam(':nombre_potcast', $nombre_potcast, PDO::PARAM_STR);
    //             $query->bindParam(':calificacion', $calificacion, PDO::PARAM_INT);
    //             $query->bindParam(':enlace', $enlace, PDO::PARAM_STR);
    //             $query->bindParam(':caratula', $caratula, PDO::PARAM_STR);
    //             $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    //             $query->execute();
    
    //             if ($query->rowCount() == 0) {
    //                 //Error
    //                 echo "Error papu";
    
    //                 exit();
    //             }
    
    //             header("Location: http://localhost/Proyecto/views/catalogo.php");
    //         }
    //         catch(PDOException $e) {
    //             error_log("Error en query - " . $e, 0);
    
    //             exit();
    //         }
    //     }
    //     else if ($_POST["_method"] == "PUT") {
    //         // Actualizar
    //         $idpotcast = $_GET["idpotcast"];
    
    //         $nombre_potcast = $_POST["nombre_potcast"];
    //         $calificacion = $_POST["calificacion"];
    //         $enlace = $_POST["enlace"];
    //         $descripcion = $_POST["descripcion"];
    //         $caratula = "";
    
    //         $update_foto = false;
    
    //         if(sizeof($_FILES) > 0 && $_FILES["caratula"]["tmp_name"] !== "") {
    //             $tmp_name = $_FILES["caratula"]["tmp_name"];
    //             $caratula = file_get_contents($tmp_name);
    //             $update_foto = true;
    //         }
    
    //         try {
    //             $query_string = 'UPDATE potcast SET nombre_potcast = :nombre_potcast, calificacion = :calificacion, enlace = :enlace, descripcion = :descripcion';
    
    //             if ($update_foto === true) {
    //                 $query_string = $query_string . ', caratula = :cartula';
    //             }
    
    //             $query = $connection->prepare($query_string . ' WHERE idpotcast = :idpotcast');
    //             $query->bindParam(':idpotcast', $idpotcast, PDO::PARAM_INT);
    //             $query->bindParam(':nombre_potcast', $nombre_potcast, PDO::PARAM_STR);
    //             $query->bindParam(':calificacion', $calificacion, PDO::PARAM_INT);
    //             $query->bindParam(':enlace', $enlace, PDO::PARAM_INT);
    //             $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    
    //             if ($update_foto === true) {
    //                 $query->bindParam(':caratula', $caratula, PDO::PARAM_STR);
    //             }
    
    //             $query->execute();
    
    //             if ($query->rowCount() == 0) {
    //                 //Error
    
    //                 exit();
    //             }
    
    //             header("Location: http://localhost/Proyecto/views/catalogo.php");
    //         }
    //         catch(PDOException $e) {
    //             error_log("Error en query - " . $e, 0);
    
    //             exit();
    //         }
    //     }
    //     else if ($_POST["_method"] == "DELETE") {
    //         // Eliminar
    //         $id = $_GET["idpotcast"];
    //         $active =$_POST["active"];

    //         try {
    //             $query = $connection->prepare('UPDATE potcast SET active = :active WHERE idpotcast = :idpotcast');
    //             $query->bindParam(':idpotcast', $id, PDO::PARAM_INT);
    //             $query->bindParam(':active', $active, PDO::PARAM_INT);
    //             $query->execute();
        
    //             if($query->rowCount() === 0) {
    //                 echo "Error en la eliminación";

    //                 exit();
    //             }
               
    //             header("Location: http://localhost/Proyecto/views/catalogo.php"); 
    //         }
    //         catch(PDOException $e) {
    //             error_log("Error en query - " . $e, 0);
    
    //             exit();
    //         }
    //     }
    //     else {
    //         //Error
    //     }
    // }

?>