<?php
    //Sesion::iniciar();
    if(Sesion::existe('id')){
    }
?>
<section class="c-participantes">
    <table class="c-tabla" id="participantes">
        <thead  id="cabeceraTabla">
            <tr>
                <th>Identificativo</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Imagen</th>
                <th id="accion">Acción</th>
            </tr>
        </thead>
        <tfoot  id="pieTabla">
            
        </tfoot>
        <tbody id="cuerpoTabla"></tbody>
    </table><br>
    <a href="?menu=registro"><button class="c-participantes__boton c-boton">+</button></a>
</section>