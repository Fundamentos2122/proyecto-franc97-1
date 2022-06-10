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
    <form action="..\controllers\usersController.php"  method="POST" class="contenedor">
         <input type="hidden" name="_method" value="POST">
        <div id="contcenter">
            <img src="../assets/img/login.png" alt="user" width="150">
        </div>
        <br>
        <?php
            if(array_key_exists("error", $_GET)){
                echo '<div class = "bg-danger border show text-secondary"> ' . $_GET["error"] . '</div> <br>';
        
            }
        ?>
        <div class="input1">
            <div><label for="Username">Nombre de usuario</label></div>
            <div><input type="text" name="nombre_usuario" autocomplete="off" required></div>
        </div>
        <br>

        <div class="input1">
            <label for="password">Contraseña</label>
            <input type="password" name="contrasena" autocomplete="off" required>
        </div>
        <br>
        <div id="contcenter">
            <button class=" btn success">Iniciar sesion</button>
        </div>
        <br><br><br>

        <div id="contcenter">
            <div>
                <label for="">No tienes cuenta</label>
                <a href="sing_up_Admin.php">Registrarse</a>
            </div>
        </div>
    </form>


    <script src="../assets/js/framework.js"></script>

</body>

</html>