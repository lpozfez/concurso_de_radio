<?php
class ModoRepositorio{
    public static function getModos(){
        try{
            $modos=[];
            //ejecutamos select
            $resultado=$this->conexion->query("SELECT * from `modo`");
            $i=0;
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                $modos.push($registro);
                $i=$i++;
            }
            return $i;         
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function getModo($id){
        try{
            
            //ejecutamos select
            $registros=$this->conexion->query("SELECT * from `modo` WHERE idmodo=$id");
            //devuelve un objeto
            while($modo=$registros->fetch(PDO::FETCH_OBJ)){
                
                var_dump ($modo);
                echo '<br>';
                return $modo;
                
            }
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function borraModo(Modo $modo){
        $id=$modo->id;
        try{
            $resultados=$this->conexion->exec("DELETE `modo` WHERE idmodo=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function modificaModo(Modo $modo){
        $id=$modo->id;
        try{
            $resultados=$this->conexion->exec("UPDATE `modo` SET  nombreModo=:nombre WHERE idmodo=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function addModo(Modo $modo){
        $todoOk=true;//variable para controlar el proceso
        $this->conexion->beginTransaction();//iniciamos la transacción
        //sentencia SQL
        $anadir='INSERT INTO `modo` (`nombreModo`) VALUES(:nombre)';
        
        try{
            $anadir->bindParam(":nombre",$modo->getNombre());

            $anadir->execute();
            $this->conexion->commit();
        }catch(e){
            $conexion->rollBack();
        }
    }
    
}
?>