<?php 
    // verificar si el usuario esta logueado
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
    <title>Catalogo</title>
    <?php  include("layouts/styleLogout.php")?>
    <style>
        body{
            background-color:#F1F1F2;
        }

        .target{
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            /* align-content: space-around; */
            width: 80%;
            height: auto;
            /* background-color: aqua; */
            margin-left:10%;
             
        }

        .dat{
            display: flex;
            flex-direction: column;
            align-items:center;
        }

        .contend{
            padding: 10px  10px;
            margin-left:30px;
            border:  1px solid rgb(93, 58, 107);
        }


        .categories{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: #4D648D;
            padding: 20px 0;
            align-items:center;
        }

        .icons:hover {
            background-color: black;
            color: white;
        }

        .add{
            position: absolute;
            width: 3em;
            height: 3em;
            border: 1px solid #4D648D;
            left: 6%;
            top:19px;
        }

        .contenido{
            position:relative;
        }

       
        @media(min-width: 768px) {
            .dat{
                flex-direction: row;
                align-items:stretch ;
             }
            
        }



        .gallery {
        background: #f2f2f2;
    }

    .contenedor-gleria{
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }

    .img-galeria{
        object-fit: cover;
        width: 30%;
        display: inline-block;
        margin-bottom: 15px;
        box-shadow: 0 0 6px rgba(0 , 0, 0, .6);
        cursor: pointer;
    }

    .imagen-light{
        position: fixed;
        background: rgba(0, 0, 0, .5);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translate(100%);
        transition: transform .2s ease-in-out;
    }

    .show{
        transform: translate(0);
    }

    .agregar-imagen{
        object-fit: cover;
        width: 60%;
        border-radius: 10px;
        transform: scale(0);
        transition: transform .3s .2s;
    }

    .showImage{
        transform: scale(1);
    }

    .close{
        position: absolute;
        top: 15px;
        right: 15px;
        width: 40px;
        cursor: pointer;
    }

    </style>
</head>
<body class="container-fluid container-lg">
    <?php include("layouts/navbar.php") ?>
                <li class="nav-item">
                    <a href="reseñas.php" class="nav-link">Reseñas</a>
                </li>
                <?php include("layouts/Logout.php") ?>

            </ul>
        </div>
    </nav>
    <br><br>
    <div class="h4">
            <label for="">Categorias</label>
        </div>
    <div class="categories">
        <div class="">
              <img src="../assets/img/cottorisa.jpg" alt= "user" width="150">
        </div>
        <div class="">
            <img src="../assets/img/martha.jpg" alt= "user" width="150">
        </div>
        <div class="">
            <img src="../assets/img/enigmas.jpg" alt= "user" width="150">
        </div>
        <div class="">
            <img src="../assets/img/detodoMuchp.jpg" alt= "user" width="150">
        </div>
    </div><br><br><br>
      
    
    <div class="contenido">
        <!-- <form action="newPotcast.php">
            <button class="add icons"><i class='bx bx-plus'></i></button>
        </form>
        <br> -->

        <?php 
            if(array_key_exists("nombre_usuario", $_SESSION) && $_SESSION["rol"] !== "administrador"){
            }
            else{
                echo 
                "
                <form action='newPotcast.php'>
                    <button class='add icons'><i class='bx bx-plus'></i></button>
                </form>
                <br>
            ";
            }

            include ("../controllers/potcastControllers.php");
         ?> 
         
        <!-- <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                <img src="user.png" alt= "user" width="150">
            </div>
            <div class="col-8 border border-secondary">
                <div>            
                    <h5>Breve descripcion:</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aut assumenda sint voluptatum excepturi optio fuga possimus similique ab ipsum porro minus delectus consequatur non vel, fugit nostrum a nulla?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nulla dolorem consequatur sequi? Illum dolores aspernatur quia, maiores id velit delectus reprehenderit ut expedita temporibus, natus doloribus! Nulla, error suscipit!</p>
                </div>
            </div>
            <div class="col-1"></div>
        </div> 
        br-->
     
        <!-- <br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                <img src="user.png" alt= "user" width="150">
            </div>
            <div class="col-8 border border-secondary">
                <div>            
                    <h5>Breve descripcion:</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aut assumenda sint voluptatum excepturi optio fuga possimus similique ab ipsum porro minus delectus consequatur non vel, fugit nostrum a nulla?</p>
                </div>
            </div>
            <div class="col-1"></div>
        </div><br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                <img src="user.png" alt= "user" width="150">
            </div>
            <div class="col-8 border border-secondary">
                <div>            
                    <h5>Breve descripcion:</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aut assumenda sint voluptatum excepturi optio fuga possimus similique ab ipsum porro minus delectus consequatur non vel, fugit nostrum a nulla?</p>
                </div>
            </div>
            <div class="col-1"></div>
        </div><br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                <img src="user.png" alt= "user" width="150">
            </div>
            <div class="col-8 border border-secondary">
                <div>            
                    <h5>Breve descripcion:</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem aut assumenda sint voluptatum excepturi optio fuga possimus similique ab ipsum porro minus delectus consequatur non vel, fugit nostrum a nulla?</p>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <br> -->

        <!-- <section class="gallery" id="portafolio">
            <div class="contenedor">
                <h2 class="subtitulo">Galeria</h2>
                <div class="contenedor-galeria">
                     <img src="https://picsum.photos/200?random=1" alt="" class="img-galeria">
                    <img src="https://picsum.photos/200?random=2" alt="" class="img-galeria">
                    <img src="https://picsum.photos/200?random=3" alt="" class="img-galeria">
                    <img src="https://picsum.photos/200?random=4" alt="" class="img-galeria">
                    <img src="https://picsum.photos/200?random=7" alt="" class="img-galeria">
                    <img src="https://picsum.photos/200/200" alt="" class="img-galeria"> -->
                    <!-- <div class="img-galeria"><i class='bx bx-message-add'></i></div>
                </div>
            </div>
        </section>
        <section class="imagen-light"> 
         <img src="img/close.svg" alt="" class="close">
            <img src="img/woman2.jpg" alt="" class="agregar-imagen"> 
        </section> -->
    </div>
    
    <script src="../assets/js/framework.js"></script>
    <!-- <script src="../assets/js/lightbox.js"></script> -->


</body>
</html>