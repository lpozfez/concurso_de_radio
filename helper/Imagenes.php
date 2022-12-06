<?php
class Imagenes{

    public static function imgA64($imagen)
        {
            $destino=$_SERVER['DOCUMENT_ROOT'].'dwservidor/concursoRadio/accesoDatos/imagenes'.$imagen['name'];
            $maximoPeso="100000";
            $peso=$imagen['size'];

            if(empty($imagen)){
                echo '<span class="c-error">No ha adjuntado ningún archivo</span><br>';
            }else{
                if($peso>$maximoPeso){
                    echo '<span class="c-error">El fichero supera el tamaño máximo</span><br>';
                }else{
                    //mover fichero de la carpeta temporal a la carpeta deseada
                    if(move_uploaded_file($imagen['tmp_name'], $destino)){
                        $fotoA64=base64_encode($imagen['tmp_name']);
                        return $fotoA64;
                        echo '<span style="color:green">Archivo subido</span><br>';
                    }else{
                        echo '<span class="c-error">Archivo no subido</span><br>';
                    }
                    
                }
            }
        }

    public static function pasarDe64($imagen64){
        $imagen=base64_decode($imagen64);
        return $imagen;
    }

}
?>