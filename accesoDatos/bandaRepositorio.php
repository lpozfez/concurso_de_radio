<?php
class BandaRepositorio{

    public function getBandas(){
        $con=Conexion::getConexion();

        try{
            $bandas=[];
            //ejecutamos select
            $resultado=$con->query("SELECT * from `banda`");
            $i=0;
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                $bandas.push($registro);
                $i=$i++;
            }
            return $bandas;         
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public function getBanda($id){
        $con=Conexion::getConexion();

        try{
            
            //ejecutamos select
            $registros=$con->query("SELECT * from `banda` WHERE idbanda=$id");
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

    public function borraBanda(Banda $banda){
        $con=Conexion::getConexion();

        $id=$banda->id;
        try{
            $resultados=$con->exec("DELETE `banda` WHERE idbanda=$id");
            return $resultados;
        }catch(PDOException $p){
            echo $p;
        }
    }

    public function modificaBanda(Banda $banda){
        $con=Conexion::getConexion();

        $id=$banda->id;
        try{
            $resultados=$con->exec("UPDATE `banda` SET  nombreModo=:nombre WHERE idmodo=$id");
            return $resultados;
        }catch(PDOException $p){
            echo $p;
        }
    }

    public function addBanda(Banda $banda){
        $con=Conexion::getConexion();
        $sql="INSERT into `banda` (`identificador`, `distancia`, `rango_min`,`rango_max`) values (:id, :distancia, :rgmin, :rgmax)";
        $consulta=$con->prepare($sql);

        $id=Banda->getIdentificador();
        $distancia=Banda->getDistancia();
        $min=Banda->getMin();
        $max=Banda->getMax();

        try{
            $consulta->bindParam(":id",$id);
            $consulta->bindParam(":distancia",$distancia);
            $consulta->bindParam(":rgmin",$min);
            $consulta->bindParam(":rgmax",$max);

        }catch(PDOException $p){
            echo $p;
        }
    }
}

?>