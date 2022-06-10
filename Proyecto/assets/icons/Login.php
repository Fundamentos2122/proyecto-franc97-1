<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include("layouts/template.php")?>
    <title>login</title>
    <style>
        .colors {
            background: linear-gradient(90deg, gray, silver);
        }

    </style>
</head>

<body class="colors">
    <?php include("layouts/navbar.php") ?>
                <li class="nav-item">
                    <a href="sign_up.php" class="nav-link">Registrarse</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <form action="..\controllers\usersController.php"  method="POST" class="modal-content bg-light">
         <input type="hidden" name="_method" value="POST">
        <br><br><br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
               <center><img src="../assets/img/login.png" alt="user" width="200"></center> 
            </div>
            <div class="col-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
               <center>
                <label for="Username">Nombre de usuario </label>
                <input type="text" name="nombre_usuario" autocomplete="off">
            </center> 
            </div>
            <div class="col-2">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <center>
                    <label for="password">Contraseña</label> <br>
                    <input type="password" name="contrasena" autocomplete="off">
                </center>
            </div>
            <div class="col-2">
                <!-- <input type="password" nname="password"> -->
            </div>
            <!-- <div class="col-3"></div> -->
        </div>
        <br><br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
               <center><input type="submit" value="Iniciar sesión"</center> 
            </div>
            <div class="col-2"></div>
        </div>
        <br><br><br>
    </form>


    <script src="../assets/js/framework.js"></script>

</body>

</html>