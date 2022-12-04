<?php
class ModoRepositorio{
    
    
    public function getModos(){
        $con=Conexion::getConexion();

        try{
            $modos=[];
            //ejecutamos select
            $resultado=$con->query("SELECT * from `modo`");
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

    public function getModo($id){
        $con=Conexion::getConexion();

        try{
            
            //ejecutamos select
            $registros=$con->query("SELECT * from `modo` WHERE idmodo=$id");
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

    public function borraModo(Modo $modo){
        $con=Conexion::getConexion();

        $id=$modo->id;
        try{
            $resultados=$con->exec("DELETE `modo` WHERE idmodo=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public function modificaModo(Modo $modo){
        $con=Conexion::getConexion();

        $id=$modo->id;
        try{
            $resultados=$con->exec("UPDATE `modo` SET  nombreModo=:nombre WHERE idmodo=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public function addModo(Modo $modo){
        $con=Conexion::getConexion();

        $todoOk=true;//variable para controlar el proceso
        $con->beginTransaction();//iniciamos la transacción
        //sentencia SQL
        $anadir='INSERT INTO `modo` (`nombreModo`) VALUES(:nombre)';
        
        try{
            $anadir->bindParam(":nombre",$modo->getNombre());

            $anadir->execute();
            $con->commit();
        }catch(e){
            $con->rollBack();
        }
    }
    
}
?>