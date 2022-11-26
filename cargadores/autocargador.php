<?php
/**
 * Método que carga las clases necesarias según su uso y carpeta en la que se encuentran.
 */
function mi_autocargador($clase) {
    $ruta=$_SERVER['DOCUMENT_ROOT'];
    if(file_exists($ruta.'dwservidor/concursoRadio/clases/'.$clase.'.php')){
        require_once $ruta.'dwservidor/concursoRadio/clases/'.$clase.'.php';

    }elseif(file_exists($ruta.'dwservidor/concursoRadio/helpers/'.$clase.'.php')){
        require_once $ruta.'dwservidor/concursoRadio/helpers/'.$clase.'.php';
        
    }elseif(file_exists($ruta.'dwservidor/concursoRadio/accesoDatos/'.$clase.'.php')){
        require_once $ruta.'dwservidor/concursoRadio/accesoDatos/'.$clase.'.php';
    }
    
}

spl_autoload_register('mi_autocargador');

?>