<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include("layouts/template.php")?>
    <title>Sing Up Admin</title>
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
            background-color: #198754;
        }

        .success:hover{
            background-color: #105c38;
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
                <li class="nav-item">
                    <a href="login_Admin.php" class="nav-link">Ingresar</a>
                </li>
                <!--<li class="nav-item">
                    <a href="" class="nav-link">Registrarse</a>

                </li> -->
            </ul>
        </div>
    </nav>
    <br>
    <form action="..\controllers\userAccountControllers.php"  method="POST" class="contenedor"  autocomplete="off" enctype="multipart/form-data">
        <div id="contcenter">
            <img src="../assets/img/login.png" alt="user" width="150">
        </div>
        <br>
        <div class="input1">
            <div><label for="nombre_usuario">Nombre de usuario</label></div>
            <div><input type="text" name="nombre_usuario" autocomplete="off" required></div>
        </div>
        <br>
        <div class="input1">
            <div><label for="correo">Correo electronico</label></div>
            <div><input type="text" name="correo" autocomplete="off" required></div>
        </div>
        <br>
        <!-- <div class="input1">
            <label for="password2">Confirmar Contraseña</label>
            <input type="password" name="contr">
            br
        </div> -->
        <div class="input1">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" autocomplete="off" required>
        </div>
        <br>
        <!-- <div class="input1">
            <label for="casilla">Registrarse como administrador</label>
            <input type="checkbox" name="casilla">
        </div>
        <br> -->
        <div id="contcenter">
            <button class=" btn success ">Registrarse</button>
        </div>
        <br><br>
    </form>

    <script src="../assets/js/framework.js"></script>

</body>

</html>