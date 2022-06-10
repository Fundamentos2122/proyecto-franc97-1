<?php 

include("../models/DB2.php");
include("../models/commentsDB.php");


try{
    $connection = DBC::getConnection();
}
catch(PDOException $e){
    error_log("Error de conexion " . $e, 0);

    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //Leer
    if (array_key_exists("idpotcast", $_GET)) {
        //Traer la información de un elemento
        $idp = $_GET["idpotcast"];
        // var_dump($_GET);
        
        try {
            $query = $connection->prepare("SELECT * FROM coments WHERE idp= :idp");
            $query->bindParam(":idp", $idp, PDO::PARAM_INT);
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $comentarioA = new Comentario($row["idcomentario"], $row["idp"], $row["comentario"]);
                // $comentarioA->returnJson();
                
                $auxuser2 = '';
                if(array_key_exists("nombre_usuario", $_SESSION) && $_SESSION["rol"] !== "administrador"){
                    $auxuser2 = 
                    "
                 ";
                }
                else{
                    $auxuser2 = 
                    " <div class='close'>
                    <form id='formclose' action='../controllers/comentariosControllers.php' method='post'>
                        <input type='hidden' name='_method' value='DELETE'>
                        <input type='hidden' name='idcomentario' value=". $comentarioA->getidcomentario().">
                        <button class='icons'><i class='bx bx-message-square-x'></i> </i></button>
                        <input type='hidden' name='idp' value=".$idp.">
                    </form>
                </div>
                ";
                }

                if($idp == $comentarioA->getIdPotcast()){
                echo 
                "   <div class='dat'>
                       ".$auxuser2."
                    </div>
                    <div class='input1'>
                        <div class='' style='padding: 0.35em;'>
                                <img src='../assets/img/login.png' alt='' class='redimension'>
                        </div>
                        <div class=''> <p>" . $comentarioA->getcomentario() . "</p> </div>
                    </div>
                    <div class='line'></div>

                            
                ";
                }
            }

            exit();
        }
        catch(PDOException $e) {
            error_log("Error en query - " . $e, 0);

            exit();
        }
    }
    
    // else {
    //     //Traer el listado de todos los registros
    //     try {
    //         $query = $connection->prepare("SELECT * FROM coments");
    //         $query->execute();

    //         while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    //             $coments = new Comentario($row["idcomentario"], $row["idp"], $row["comentario"]);
                
    //             // var_dump($potcast);
    //             echo 
    //             "
    //             <div>
    //                 <div class='' style='padding: 0.35em;'>
    //                     <img src='' alt='' class=''>
    //                 </div>
    //                 <div class=''> <p>" . $coments->getcomentario() . "</p> </div>
    //             </div>
                
    //             ";
    //         }
    //     }
    //     catch(PDOException $e) {
    //         error_log("Error en query - " . $e, 0);

    //         exit();
    //     }
    // }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["_method"] == "POST"){

        //Guardar
        $idp = $_POST["idpotcast"];
        $comentario = $_POST["comentario"];
        var_dump($_POST);
        var_dump($_GET);


        try {
            $query = $connection->prepare('INSERT INTO coments VALUES(NULL, :idp, :comentario)');
            $query->bindParam(':idp', $idp, PDO::PARAM_INT);
            $query->bindParam(':comentario', $comentario, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() == 0) {
                //Error
                echo "Error papu";

                exit();
            }

            header("Location: http://localhost/Proyecto/views/comentarioP.php?idpotcast=".$idp."");
        }
        catch(PDOException $e) {
            error_log("Error en query - " . $e, 0);

            exit();
        }

    }else if ($_POST["_method"] == "DELETE") {
            // Eliminar
            $idcomments = $_POST["idcomentario"];
            $idp = $_POST["idp"];
    
            try {
                $query = $connection->prepare('DELETE FROM coments WHERE idcomentario = :idcomentario');
                $query->bindParam(':idcomentario', $idcomments, PDO::PARAM_INT);
                $query->execute();
    
                if ($query->rowCount() == 0) {
                    //Error
    
                    exit();
                }
                
                header("Location: http://localhost/Proyecto/views/comentarioP.php?idpotcast=".$idp."");

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