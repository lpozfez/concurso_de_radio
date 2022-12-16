<?php
    if(Sesion::existe('rol')==true && $_SESSION['rol']=='admin'){
        echo'
        <section class="c-concursos">
        <!--Mantenimiento-->
        <div class="c-tarjeta">
            <div class="frente">
                <a href="?menu=mantenimiento"><img src="./css/imagenes/mantenimiento.png" class="c-tarjeta__imagen" alt="..."></a>
            </div>
        </div>
        <!--Participantes-->
        <div class="c-tarjeta">
        <div class="frente">
            <a href="?menu=participantes"><img src="./css/imagenes/participantes.png" class="c-tarjeta__imagen" alt="..."></a>
        </div>
        </div>
        <!--Concusos activos-->
        <div class="c-tarjeta">
            <div class="frente">
                <a href="?menu=concursosActivos"><img src="./css/imagenes/ConcursosActivos.png" class="c-tarjeta__imagen" alt="..."></a>
            </div>
        </div>
        </section>
        ';
    }else{
        echo'
        <section class="c-concursos">
        <!--Concusos activos-->
        <div class="c-tarjeta">
            <div class="frente">
                <a href="?menu=concursosActivos"><img src="./css/imagenes/ConcursosActivos.png" class="c-tarjeta__imagen" alt="..."></a>
            </div>
        </div>
        </section>
        ';
    }
?>


