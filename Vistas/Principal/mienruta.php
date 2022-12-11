<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        //require_once 'index.php';
        require_once './Vistas/inicio.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/login.php';
    }
    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrarsesion.php';
     
    }
    if ($_GET['menu'] == "concursos") {
        require_once './Vistas/Mantenimiento/concursos.php';
    }
    if ($_GET['menu'] == "registro") {
        require_once './Vistas/Login/registro.php';
     
    }
    if ($_GET['menu'] == "listadovacunas") {
        require_once './Vistas/Mantenimiento/listadovacunas.php';
    }
}else{
    require_once './Vistas/inicio.php';
}

//Añadir otras rutas
