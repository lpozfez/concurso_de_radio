<?php
class BandaRepositorio{
    private $conexion;

    public static function getBandas(){
        try{
            $bandas=[];
            //ejecutamos select
            $resultado=$this->conexion->query("SELECT * from `banda`");
            $i=0;
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                $bandas.push($registro);
                $i=$i++;
            }
            return $i;         
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function getBanda($id){
        try{
            
            //ejecutamos select
            $registros=$this->conexion->query("SELECT * from `banda` WHERE idbanda=$id");
            //devuelve un objeto
            while($banda=$registros->fetch(PDO::FETCH_OBJ)){
                
                var_dump ($banda);
                echo '<br>';
                return $banda;
                
            }
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function borraBanda(Banda $banda){
        $id=$banda->id;
        try{
            $resultados=$this->conexion->exec("DELETE `banda` WHERE idbanda=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function modificaBanda(Banda $banda){
        $id=$banda->id;
        try{
            $resultados=$this->conexion->exec("UPDATE `banda` SET  nombreModo=:nombre WHERE idmodo=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function addBanda(Banda $banda){}
}

?>