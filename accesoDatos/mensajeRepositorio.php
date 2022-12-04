<?php
class MensajeRepositorio{

    public function getMensajes(){
        $con=Conexion::getConexion();

        try{
            $mensajes=[];
            //ejecutamos select
            $resultado=$con->query("SELECT * from `mensaje`");
            $i=0;
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                $mensajes.push($registro);
                $i=$i++;
            }
            return $mensajes;         
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public function getMensaje($id){

    }

    public function borraMensaje($id){

    }

    public function modificaMensaje($id){}

    public function addMensaje(Mensaje $mensaje){
        
    }
}
?>