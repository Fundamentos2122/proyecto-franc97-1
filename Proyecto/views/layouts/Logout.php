<li class="dropdown">
    <a href="#" class="social-media-icons dropdown-toggle">
    <i class='bx bxs-user-circle'></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <div class="mnavegacionenu-">
                <form action="..\controllers\usersController.php" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Log out" class="session">
                </form>
            </div>
        </li>
        <li>
            <form action="Perfil.php" method="GET">
                <input type="submit" value="  Perfil  " class="session">
            </form>
        </li>
    </ul>
</li>