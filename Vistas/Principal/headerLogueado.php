
<header>
    <nav class="c-menu">
        <a href="?menu=inicio">
            <img id="logo" src="css\imagenes\logo-radioaficionados.png" alt="">
        </a>
        <ul class="c-menu__item">
            <li class="c-menu__item"><a href="#">Ganadores anteriores</a></li>
            <li class="c-menu__item"><a href="?menu=concursos">Consursos</a></li>
        </ul>
        <a href="?menu=inicio">
            <img id="logout" class="logout" src="css\imagenes\iconos\logout.png" alt="">
        </a>
        <p value="<?php 
            Session::iniciar();
            if(Sesion::existe("id")){
                echo '<h1>Bienvenido '.Session::leer('user').'</h1>';
            }
            ?>">
        </p>
    </nav>
</header>

