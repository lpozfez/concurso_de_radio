
<header>
    <nav class="c-menu">
        <a href="?menu=inicio">
            <img id="logo" src="css\imagenes\logo-radioaficionados.png" alt="">
        </a>

        <?php
            Sesion::iniciar();
            if(Sesion::existe('id')==true){
                echo'<ul class="c-menu__item">
                <li class="c-menu__item"><a href="?menu=concursos">Consursos</a></li>
                </ul>';
                echo '<h1>Hola '.$_SESSION['user'].'</h1>';
                echo '<a href="?menu=logout"><img id="logout" class="logout" src="css\imagenes\iconos\logout.png" alt=""></a>';
            }else{
                echo'<ul class="c-menu__item">
                <li class="c-menu__item"><a href="#">Conócenos</a></li>
                <li id="unirme" class="c-menu__item"><a href="?menu=registro">Unirme</a></li>
                </ul>';
                echo'<a href="?menu=login"><img src="css\imagenes\iconos\login.png" alt=""></a>';
            }
        ?>
    </nav>
</header>