<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include("layouts/template.php")?>
    <title>Sing Up</title>
    <style>
        .colors {
            background: linear-gradient(90deg, gray, silver);
        }
    </style>
</head>

<body class="colors">
    <?php include("layouts/navbar.php") ?>
                <li class="nav-item">
                    <a href="Login.php" class="nav-link">Ingresar</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="" class="nav-link">Registrarse</a>

                </li> -->
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <form action="login.php" class="modal-content bg-light">
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
                    <label for="e-mail">Correo electronico </label>
                    <input type="text" name="e-mail" autocomplete="off">
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
                    <input type="password" nname="password" autocomplete="off">
                </center>
            </div>
            <div class="col-2">
                <!-- <input type="password" nname="password"> -->
            </div>
            <!-- <div class="col-3"></div> -->
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <center>
                    <label for="password2">Confirma Contraseña</label> <br>
                    <input type="password" nname="password2" autocomplete="off">
                </center>
            </div>
            <div class="col-2">
            </div>
        </div>


        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <center>
                    <label for="Username">Nombre de usuario</label> <br>
                    <input type="text" nname="username" autocomplete="off">
                </center>
            </div>
            <div class="col-2">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <center><button>Registrarse</button></center>
            </div>
            <div class="col-2"></div>
        </div>
        <br><br><br>
    </form>

    <script src="../assets/js/framework.js"></script>

</body>

</html>