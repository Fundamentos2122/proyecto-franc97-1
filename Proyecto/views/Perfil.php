<?php 
    //verificar si el usuario esta logueado
    session_start();

    if(!array_key_exists("nombre_usuario", $_SESSION)) {
        header("Location: http://localhost/Proyecto/views/login_Admin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/framework.css">
    <title>login Admin</title>
    <style>
        .colors {
            background: linear-gradient(90deg, gray, silver);
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
                flex-direction: row;
                justify-content: space-between;
            }

            .contenedor {
                width: 30em;
            }

        }
    </style>
</head>

<body class="colors">
    <?php include("layouts/navbar.php") ?>
                <!-- <li class="nav-item">
                    <a href="" class="nav-link">Ingresar</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Registrarse</a>

                </li> -->

            </ul>
        </div>
    </nav> 
    <div class="contenedor">
         <input type="hidden" name="_method" value="POST">
        <div id="contcenter">
            <img src="http://placeimg.com/200/200/animals" alt="" width="" style="border-radius: 50%;">
        </div>
        <br>
        <div id="contcenter">
            <div>
                <?php 
                    include("../controllers/userAccountControllers.php");
                ?>
            </div>
            <br>
            <div class ="">
                <form action="..\controllers\usersController.php" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <center><input type="submit" value="Log out" class="btn btn-info"></center>
                </form>
            </div>
            <br>
            <div class ="">
                    <form action="catalogo.php">
                        <!-- <input type="hidden" name="_method" value="POST"> -->
                        <center><input type="submit" value="Regresar" class="btn btn-warning"></center>
                    </form>
            </div>
        </div>

        
        <!-- <div class ="">
                <form action="editUsuario.php">
                    <input type="hidden" name="iduser" value=" <">
                    <center><input type="submit" value="Editar" class="btn btn-warning"></center>
                </form>
        </div> -->
    </div>


    <script src="../assets/js/framework.js"></script>

</body>

</html>