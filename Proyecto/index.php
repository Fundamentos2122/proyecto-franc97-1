<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/framework.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="assets/css/homapage.css" rel="stylesheet" >
    <title>PubliCAST</title>
</head>

<body>
    <nav class="navbar">
        <!-- <img src="logo.png" alt="" width="30px" height="30px"> -->
        <a href="" class="navbar-brand">PubliCAST</a>
        <button class="navbar-toggle" type="button">
            <img src="assets/icons/menu.png" alt="menu" style="width: 10px;">
        </button>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a href="../" class="nav-link">Inicio</a>

                </li> -->
                <li class="nav-item dropdown">
                    <a href="views/login_Admin.php" class="nav-link" id="vision">Ingresar</a>
                    <!-- <ul class="dropdown-menu">
                        <li>
                            <a href="views\Login.php" class="dropdown-item" id="vision">Usuarios</a>
                        </li>
                        <li>
                            <a href="views\login_Admin.php" class="dropdown-item" id="vision">Administrador</a>
                        </li>
                    </ul> -->
                </li>
                <li class="nav-item dropdown">
                    <a href="views/sing_up_Admin.php" class="nav-link" id="vision">Registrarse</a>
                    <!-- <ul class="dropdown-menu">
                        <li>
                            <a href="views/sign_up.php" class="dropdown-item" id="vision">Usuarios</a>
                        </li>
                        <li>
                            <a href="views/sing_up_Admin.php" class="dropdown-item" id="vision">Administrador</a>
                        </li>
                    </ul> -->
                </li>
            </ul>
        </div>
    </nav>
    <!-- <h1>PubliCAST</h1> -->
    <header class="header" id="inicio">
        <div class="contenedor">
            <!-- <img class="fondo" src="img\pexels-tirachard-kumtanom-1001850.jpg" alt=""> -->
            <!-- img\pexels-karolina-grabowska-7679485.jpg
            img\pexels-george-milton-6954162.jpg -->
            <div class="h1 centrado">PubliCAST</div>
            <div class="contenedor texto-encima">
                <p> Es una página catálogo en la cual podrás consultar información relacionada con los
                    podcast que deseas escuchar o igual si quieres descubrir alguno nuevo aquí encontrarás
                    reseñas y calificaciones brindadas por la comunidad.
                </p>
            </div>
        </div>
    </header>



    <div class="slide bg-dark">
        <label for="" class="title-slide" style="padding-left: 1em;">Destacado</label>
        <div class="slide-inner">
            <input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden=""
                checked="checked">
            <div class="slide-item">
                <center><img src="assets/img/detodoMuchp.jpg"></center>
            </div>
            <input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <center><img src="assets/img/enigmas.jpg"></center>
            </div>
            <input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
            <div class="slide-item">
                <center><img src="assets/img/cottorisa.jpg"></center>
            </div>
            <label for="slide-3" class="slide-control prev control-1">‹</label>
            <label for="slide-2" class="slide-control next control-1">›</label>
            <label for="slide-1" class="slide-control prev control-2">‹</label>
            <label for="slide-3" class="slide-control next control-2">›</label>
            <label for="slide-2" class="slide-control prev control-3">‹</label>
            <label for="slide-1" class="slide-control next control-3">›</label>
        </div>
    </div>
    <br>
    <div class="colorse">
        <div class="contenedore footer-content">
            <P>Se parte de esta comunidad compartiendo tus experiencias, gustos, y descubre nuevos
                potcast.
            </P>
            <p>
                Escucha tus potcast favoritos
            </p>
            <div class="social-media">
                <a href="https://open.spotify.com/genre/podcasts-web" class="social-media-icons" target="_blank" rel="noopener noreferrer">
                    <i class='bx bxl-spotify'></i>
                </a>
                <a href="https://www.deezer.com/us/channels/podcasts" class="social-media-icons" target="_blank" rel="noopener noreferrer">
                    <i class='bx bxl-deezer'></i>
                </a>
                <a href="https://podcasts.google.com/" class="social-media-icons" target="_blank" rel="noopener noreferrer">
                    <i class='bx bxl-google'></i>
                </a>

            </div>
        </div>
        <div class="line"></div>
    </div>


    <script src="assets/js/framework.js"></script>

</body>

</html>
<!-- 
https://th.wallhaven.cc/small/y8/y8vlyk.jpg
https://th.wallhaven.cc/small/8o/8oev1j.jpg -->