<?php 
    //verificar si el usuario esta logueado
    session_start();

    if(!array_key_exists("nombre_usuario", $_SESSION)) {
        header("Location: http://localhost/Proyecto/index.php");
        exit();
    }

    if($_SESSION["rol"] !== "administrador"){
        header("Location: http://localhost/Proyecto/index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include("layouts/template.php")?>
    <title>admin</title>
    <?php  include("layouts/styleLogout.php")?>
    <style>
        table {
            border-collapse: collapse;
            caption-side: bottom;
        }

        th,
        td {
            border: solid 1px black;
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

        .colors {
            background: linear-gradient(90deg, gray, silver);
        }

         
        @media(min-width: 768px) {
            .contenedor{
                width: 30%;
             }
            
        }

    </style>
</head>
<body class="colors">
    <?php  include("layouts/navbar.php") ?>
                 <li class="nav-item">
                    <a href="catalogo.php" class="nav-link">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a href="catalogo.php" class="nav-link">Reseñas</a>
                </li>
                <?php include("layouts/Logout.php") ?>
            </ul>
        </div>
    </nav>
    <!-- <h5></h5> -->
    <br><br><br>
    <div class="contenedor">
        <center><h4 class="border-bottom py-2">Eliminar usuario</h4></center> 
        <form action="../controllers/userAdminControll.php" method="POST" class="row" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="DELETE">
            <div class="col-12">
              <center> 
                <label for="idusers">Id</label>
                <input type="text" name="idusers" class="form-control">
               </center>
            </div>
            <div class="col-12 ">
               <center> 
                <br>
                <input type="submit" value="Eliminar" class="btn btn-danger">
                <a href="catalogo.php" class="btn btn-warning">Cancelar</a>
                </center>
            </div>
        </form>
        <br>
        <center>
      <table>
            <head>
                <tr>
                    <th rowspan="2">ID</th>
                    <th rowspan="2">Nombre Usuario</th>
                </tr>
            </head>
            <tbody>
                <!-- <tr>
                    <td>Debian</td>
                    <td>1993</td>
                    <td>Proyecto Debian</td>
                    <td colspan="3">
                        <center>X</center>
                    </td>
                    <td></td>
                </tr> -->
                <?php 
                include("../controllers\userAdminControll.php"); 
                ?>
            </tbody>
        </table>
        </center>
    </div>
    <br>
   
    <script src="../assets/js/framework.js"></script>
   
</body>
</html>