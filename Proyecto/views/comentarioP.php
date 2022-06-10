<?php 
    //verificar si el usuario esta logueado
    session_start();

    if(!array_key_exists("nombre_usuario", $_SESSION)) {
        header("Location: http://localhost/Proyecto/views/Login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include("layouts/template.php")?>
    <title>Edit coments</title>
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
            margin: 2em;
            width: 100%;
            padding: 16px;
            margin-left: auto;
            margin-right: auto;

        }

        .input1 {
            display: flex;
            flex-direction: row;
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

        .icons:hover {
            background-color: black;
            color: white;
        }

        .line{
            border-top: 1px solid black;
            height: 2px;
            max-width: 500px;
            padding: 0;
            margin: 20px auto 0 auto;
        }

        img.redimension {
        width:4em;
        height:4em;
        }

        .dat {
            position:relative;
            width:100%;
        }

        .close{
            position:absolute;
            right:0;
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
         <div>
            <form action="catalogo.php" class="input1">
                <div class="col-12 ">
                <center> 
                    <br>
                    <input type="submit" value="Regresar" class="btn success">
                    </center>
                </div>
            </form>
        </div>
        <div>
            <form id="form_put" name="form_put" action="../controllers\comentariosControllers.php" method="post" class="input1" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <div class="col-12 ">
                <input type="hidden" name="idpotcast" id="idpotcast">
                <center> 
                    <br>
                    <input type="text" name="comentario" id="" style="width: 80%">
                    <button class="icons"><i class='bx bx-send'></i></button>
                    <!-- <input type="submit" value="Mostrar" class="btn success"> -->
                    </center>
                </div>
            </form>
            <script>

                 const id = "" + <?php echo $_GET["idpotcast"] ?> + "";

                document.form_put.idpotcast.value = id;

            </script>
            <br><br>
            <div class='h5'>Comentarios</div>
            <!-- Coments coments_Body -->
            <div class=''>
            <?php 
                include ("../controllers/comentariosControllers.php");
            ?>                          
            </div>
            <!-- <?php 
                include ("../controllers/comentariosControllers.php");
            ?> -->
        </div>
    </div>

   
    <script>
        const formPut = document.getElementById("form_put");
        const input_idp = document.getElementById("idp");


        const idp = "" + <?php echo $_GET["idpotcast"] ?> + "";
        // console.log(idp);

        getComentario();
        getCements();

        function getComentario() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../controllers/comentariosControllers.php?idp=" + idp, false);

            // xhttp.onreadystatechange = function() {
            //     if(this.readyState == 4) {
            //         var c = JSON.parse(this.responseText);

            //         input_idp.value = c.idp;

            //     }
            // };
            xhttp.send();
        }



    </script>
    
</body>
</html>