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
    <title>Edit potcast</title>
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

    </style>
     <style>
        .colors {
            background: linear-gradient(90deg, gray, silver);
        }

        .contenedor {
            background-color: white;
            /* align-content: space-around; */
            margin: 4em;
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

        .success{
            color: #fff;
            /* background-color: #198754; */
            /* background-color: rgb(124, 50, 243); */
            background-color: rgb(86, 140, 241);   
        }

        .success:hover{
            /* background-color: #105c38; */
            /* background-color: rgb(56, 12, 128); */
            background-color: #0a47a2;
        }

        @media (min-width: 768px) {
            .input1 {
                flex-wrap:wrap;
                justify-content: flex-start;
            }

            .contenedor {
                width: 30em;
            }

        }
    </style>
</head>
<body class="colors">
    <?php  include("layouts/navbar.php") ?>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <div class="contenedor">
        <h4 class="border-bottom py-2">Editar Potcast</h4>
        <br>
        <form id="form_put" action="../controllers/potcastControllers.php" method="post" class="input1" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <div>
                <label for="nombre_potcast">Nombre potcast</label>
            </div>
            <div class="">
                <input type="text" name="nombre_potcast"  id="nombre_potcast"class="form-control">
            </div>
            <!-- <div>
                <label for="calificacion">Calificacion</label>
            </div>
            <div class="">
                <input type="text" name="calificacion" class="form-control">
            </div> -->
            <div>
                <label for="enlace">enlace</label>
            </div>
            <div class="">
                <input type="text" name="enlace"  id="enlace" class="form-control">
            </div>
            <div>
                <label for="caratula">Caratula</label>
            </div>
            <div class="">
                <input type="file" name="caratula" class="form-control">
            </div>
            <div>
                <label for="descripcion">Descripcion</label>
            </div>
            <div class="">
                <input type="text" name="descripcion" id="descripcion" class="form-control">
            </div>
            <div class="col-12 ">
               <center> 
                <br>
                <input type="submit" value="Guardar" class="btn success">
                <a href="catalogo.php" class="btn cancel">Cancelar</a>
                </center>
            </div>
        </form>
        <br>
        <form id="form_delete" action="../controllers/potcastControllers.php" method="POST">
            <center><input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="active" value="0">
            <input type="submit" value="Eliminar" class="btn btn-info"></center>
        </form>
    </div>
    <script>
        const formPut = document.getElementById("form_put");
        const formDelete = document.getElementById("form_delete");
        const input_nombre_potcast = document.getElementById("nombre_potcast");
        // const input_calificacion = document.getElementById("calificacion");
        const input_enlace= document.getElementById("enlace");
        const input_descripcion = document.getElementById("descripcion");


        const idpotcast = "" + <?php echo $_GET["idpotcast"] ?> + "";


        getPotcast();

        function getPotcast() {

            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../controllers/potcastControllers.php?idpotcast=" + idpotcast, false);
          
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4) {
                    var potcast = JSON.parse(this.responseText);

                    formPut.action += "?idpotcast=" + potcast.idpotcast;
                    formDelete.action += "?idpotcast=" + potcast.idpotcast;

                    input_nombre_potcast.value += potcast.nombre_potcast;
                    input_enlace.value += potcast.enlace;
                    input_descripcion.value += potcast.descripcion;
                }
            };

            xhttp.send();
        }
    </script>
    
</body>
</html>