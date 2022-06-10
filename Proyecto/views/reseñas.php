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
    <title>Reseñas</title>
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

<body>
    <?php include("layouts/navbar.php") ?>
    <li class="nav-item">
        <a href="catalogo.php" class="nav-link">Catalogo</a>
    </li>                 
    <li class="nav-item">
        <?php 
            if(array_key_exists("nombre_usuario", $_SESSION) && $_SESSION["rol"] !== "administrador"){
                echo " ";
            }
            else{
                echo
                "<a href='admin.php' class='nav-link'>Admin</a>";
            }
        ?>
        <!-- <a href="admin.php" class="nav-link">Admin</a> -->
    </li>
    <?php include("layouts/Logout.php") ?>

    </ul>
    </div>
    </nav><br>
    <?php 
            include ("../controllers/reseñaControllers.php");
    ?> 
<!-- 
    <div class='target'>
        <div class='dat'>
            <div>
                <img src=\"data:image/jpeg;base64," . $potcastC->getCaratula() . "\" alt= 'user' width='150'>
            </div>
            <div class='contend'>
                <div>
                    <h5>" . $potcastC->getNombreP() ."</h5>
                </div>
                <div>
                    <p> " . $potcastC->getDescription() ."</p>
                </div>

                <div class='dat'>
                    <form action='editPotcast.php' method='GET'>
                        <input type='hidden' name='idpotcast' value=". $potcastC->getId() ." style=''>
                        <button class='icons'><i class='bx bx-like'></i></button>
                    </form>
                </div>
                <div class='dat'>
                    <form action='comentarioP.php' method='GET'>
                        <input type='hidden' name='idpotcast' value=". $potcastC->getId() ." style=''>
                        <button class='icons'><i class='bx bx-dislike' ></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div><br> -->

    <script src="../assets/js/framework.js"></script>

</body>

</html>