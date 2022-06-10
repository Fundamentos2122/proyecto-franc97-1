<?php 
    //verificar si el usuario esta logueado
    session_start();

    if(!array_key_exists("nombre_usuario", $_SESSION)) {
        header("Location: http://localhost/Proyecto/views/Login.php");
        exit();
    }

    if($_SESSION["rol"] !== "administrador"){
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
</head>
<body>
    <?php include("layouts/navbar.php") ?>
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">Admin</a>
                </li>
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">Usuarios</a>
                </li>
                <?php include("layouts/Logout.php") ?>

            </ul>
        </div>
    </nav><br>

    <div class="row">
        <div class="col-2">
            <label for="">Categorias</label>
        </div>
        <div class="col-2">
              <img src="https://picsum.photos/200" alt= "user" width="150">
        </div>
        <div class="col-2">
            <img src="https://picsum.photos/200?random=1" alt= "user" width="150">
        </div>
        <div class="col-2">
            <img src="https://picsum.photos/200?random=2" alt= "user" width="150">
        </div>
        <div class="col-2">
            <img src="https://picsum.photos/200?random=7" alt= "user" width="150">
        </div>
        <div class="col-2"></div>
    </div><br><br><br>
    
    <div class="row">
        <!--  <div class='col-1'></div>
                    <div class='col-2'>
                        <img src=\"data:image/jpeg;base64," . $potcast->getCaratula() . "\" alt= 'user' width='150'>
                    </div>
                    <div class='col-8 border border-primary'>
                        <div>            
                            <h5>" . $potcast->getNombreP() . "<</h5>
                            <p>" .$potcast->getDescription() ."</p>
                        </div>
                    </div>
                <div class='col-1'></div>-->
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-8 border border-primary ">
            <div class="h5">Comentarios</div>
            <p class="Coments coments_Body">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas deserunt nostrum reiciendis incidunt! Facilis placeat nam totam, nihil omnis temporibus ea excepturi at repudiandae sit. Consequatur, numquam. At, modi sapiente?
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate unde, dolorem, ad totam doloribus accusantium vero recusandae praesentium, in laudantium dolor fugiat animi nam. Sequi ullam vitae ipsa quas eum? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta quidem nemo architecto dolor, eum ducimus necessitatibus vel consequuntur nulla earum nihil, ea illum quia repellat laboriosam nostrum totam quas porro. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa, hic quod sint perspiciatis facilis similique consequatur non placeat blanditiis et, cupiditate assumenda consequuntur totam inventore deleniti, magnam minus eum aut! Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, sint dolorem dolore excepturi ad rerum amet quo velit! Enim magnam dolore quam, nam ullam itaque deleniti assumenda atque ipsam odit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore minima veritatis quas accusantium, fuga obcaecati molestias corporis non quia repellendus quasi sunt libero magnam. Qui natus eius temporibus repellendus dolor. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium tempora, dolore, adipisci itaque obcaecati culpa aut numquam odio eaque commodi voluptas suscipit! Rerum incidunt omnis veniam sed natus quibusdam quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores atque omnis suscipit animi, modi aspernatur neque reiciendis debitis obcaecati perferendis voluptatum quisquam pariatur, architecto aperiam consectetur labore ipsa perspiciatis illum? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio vitae ipsum accusantium aliquid assumenda. Nihil laboriosam perferendis molestias quas distinctio quam qui cupiditate fugit quidem, aperiam ratione blanditiis quisquam doloremque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quisquam praesentium minima, facere debitis soluta voluptas at nesciunt odio quos rerum inventore quibusdam ipsum nemo, sequi obcaecati. Labore, veniam iusto. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga in illum doloribus voluptatem sapiente nobis dolore praesentium. Sapiente soluta optio quaerat iure nam provident laboriosam nulla eligendi corporis, delectus error! Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus eos eaque rem quae repellendus, nemo, iste voluptas distinctio temporibus sunt explicabo delectus mollitia! Fugiat quidem quasi distinctio excepturi rem unde! Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio reprehenderit doloremque minus voluptate consequuntur iste quis provident! Quo fugiat amet mollitia error exercitationem iure, non iusto, et, dicta reiciendis quisquam?
            </p>
            <input type="text" name="Comentario" id="" placeholder="Ingresa tu comentario" style="width: 70%">
            <button href=""><img src="../assets/icons/send.png" alt="send" width="15px"></button>
            <button><img src="../assets/icons/like.png" alt="like" width="15px"></button>
            <button><img src="../assets/icons/thumbdown.png" alt="dislike" width="15px" ></button>
            <button href="editPotcast.php"><img src="../assets/icons/edit.png" alt="edita" width="15px"></button>
        </div>
        <div class="col-1"></div>
    </div><br>

    
    <script src="../assets/js/framework.js"></script>
</body>
</html>