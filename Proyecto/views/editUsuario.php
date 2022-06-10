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
    <title>Edit datos</title>
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
    <div class="contenedor">
            <center><h4 class="border-bottom py-2">Modificacion Usuario</h4></center> 
            <form id="fuser" action="../controllers/userAccountControllers.php" method="post" class="row" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <div class="col-12">
                  <center> 
                    <label for="nombre_usuario">Nombre de usario</label>
                    <input type="text" name="nombre_usuario" class="form-control" autocomplete="off" required value="<?php echo $_GET["nombre_usuario"] ?>">
                  </center>
                </div>
                <div class="col-12">
                  <center> 
                    <label for="correo">correo</label>
                    <input type="text" name="correo" class="form-control" autocomplete="off" required value="<?php echo $_GET["correo"] ?>">
                  </center>
                </div>
                <div class="col-12 ">
                  <center> 
                    <br>
                    <input type='hidden' name='idusers' id="idusers" value="<?php echo $_GET["idusers"] ?>">
                    <input type="submit" value="Modificar" class="btn btn-danger">
                    <a href="Perfil.php" class="btn cancel">Cancelar</a>
                  </center>
                </div>
            </form>
         
            <br>
    </div>
       

</body>