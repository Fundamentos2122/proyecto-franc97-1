<?php 
    //verificar si el usuario esta logueado
    session_start();

    if(!array_key_exists("nombre_usuario", $_SESSION)) {
        header("Location: http://localhost/Proyecto/views/Login.php");
        exit();
    }

    if($_SESSION["rol"] !== "administrador"){
        header("Location: http://localhost/Proyecto/views/Login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include("layouts/template.php")?>
    <title>New potcast</title>
    <style>
        body{
            background-color: #F1F1F2;;
        }

        .success{
            background-color: #004D47;
            color: white;
        }

        .cancel{
            background-color: #A10115;
            color: white;
        }

        .contenedor {
            background-color: white;
            /* align-content: space-around; */
            margin: 5em;
            width: 100%;
            padding: 16px;
            margin-left: auto;
            margin-right: auto;

        }

        .input1 {
            display: flex;
            flex-direction: column;
            /* align-content: space-around; */
            align-items: center;
        }

        #contcenter {
            display: flex;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .input1 {
                flex-direction: row;
                justify-content: space-between;
            }

            .contenedor {
                width: 30em;
            }

        }

    </style>
</head>
<body>
    <?php  include("layouts/navbar.php") ?>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <h4 id="contcenter" class="border-bottom">Agregar Potcast</h4>
        <form action="../controllers/potcastControllers.php" method="POST" class="row" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="POST">
            <div class="input1">
                <div class="col-6 form-group">
                    <label for="nombre_potcast">Nombre potcast</label>
                    <input type="text" name="nombre_potcast" class="form-control" autocomplete="off" required >
                </div>
                <!-- <div class="col-6 form-group">
                    <label for="calificacion">Calificacion</label>
                    <input type="text" name="calificacion" class="form-control">
                </div> -->
                <div class="col-6 form-group">
                    <label for="enlace">enlace</label>
                    <input type="text" name="enlace" class="form-control" autocomplete="off" required>
                </div>
            </div>
           <div class="input1">
                <div class="col-6 form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" autocomplete="off" required>
                </div>
            </div>
            <div class="col-6 form-group">
                <label for="caratula">Caratula</label>
                <input type="file" name="caratula" class="form-control" autocomplete="off" required>
            </div>
            <div class="col-12 ">
               <center> 
                <br>
                <input type="submit" value="Guardar" class="btn success">
                <a href="catalogo.php" class="btn cancel">Cancelar</a>
                </center>
            </div>
        </form>
    </div>
    <!-- <div>
         <?php 
            include ("../controllers/comentariosControllers.php");
         ?>
    </div> -->
    
</body>
</html>