<?php
class UsuarioRepositorio{
    private $conexion;

    public static function getUsuarios(){
        try{
            $usuarios=[];
            //ejecutamos select
            $resultado=$this->conexion->query("SELECT * from `user`");
            $i=0;
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                $usuarios.push($registro);
                $i=$i++;
            }
            return $i;         
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function getusuario($nombre){
        try{
            
            //ejecutamos select
            $registros=$this->conexion->query("SELECT * from `user` WHERE nombreUser LIKE $nombre");
            //devuelve un objeto
            while($usu=$registros->fetch(PDO::FETCH_OBJ)){
                return $usu;
            }
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function borraUsuario(Usuario $usuario){
        $id=$usuario->id;
        try{
            $resultados=$this->conexion->exec("DELETE `user` WHERE id=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function modificaUsuario(Usuario $usuario){
        $id=$usuario->id;
        try{
            $resultados=$this->conexion->exec("UPDATE `user` SET  nombre=:nombre, apellidos=:apellidos, email=:email,pass=:pass, localizador:localizador, rol:rol, imagen:imagen WHERE id=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function addUsuario(Usuario $usuario){
        $todoOk=true;//variable para controlar el proceso
        $this->conexion->beginTransaction();//iniciamos la transacción
        //sentencia SQL
        $anadir='INSERT INTO `user` (`identificativo`, `nombre`,`apellidos`,`email`,`pass`,`localizador`,`rol`,`imagen`) VALUES(:nombre,:apellidos, :email,:pass, :localizador, :rol, :imagen)';
        
        try{
            $anadir->bindParam(":nombre",$usuario->getNombre());
            $anadir->bindParam(":apellidos",$usuario->getApellidos());
            $anadir->bindParam(":email",$usuario->getEmail());
            $anadir->bindParam(":pass",$usuario->getPass());
            $anadir->bindParam(":localizador",$usuario->getLocalizador());
            $anadir->bindParam(":rol",$usuario->getRol());
            $anadir->bindParam(":imagen",$usuario->getImagen());

            $anadir->execute();
            $this->conexion->commit();
        }catch(e){
            $conexion->rollBack();
        }
    }

    public static function addUsuarios(Array $usuarios){
        $todoOk=true;
        $this->conexion->beginTransaction();//iniciamos la transacción 
        //insert SQL
        $anadir='INSERT INTO `user` (`identificativo`, `nombre`,`apellidos`,`email`,`pass`,`localizador`,`rol`,`imagen`) VALUES(:nombre,:apellidos, :email,:pass, :localizador, :rol, :imagen)';
        
        try{
            for ($i=0 ; $i<count($usuarios) ; $i++){
            
                $anadir->bindParam(":nombre",$usuario[$i]->getNombre());
                $anadir->bindParam(":apellidos",$usuario[$i]->getApellidos());
                $anadir->bindParam(":email",$usuario[$i]->getEmail());
                $anadir->bindParam(":pass",$usuario[$i]->getPass());
                $anadir->bindParam(":localizador",$usuario[$i]->getLocalizador());
                $anadir->bindParam(":rol",$usuario[$i]->getRol());
                $anadir->bindParam(":imagen",$usuario[$i]->getImagen());
                //ejecutamos el insert. Devuelve el número de registros reaizados.
                $anadir->execute();
            }
            $this->conexion->commit();
        }catch(e){
            $this->conexion->rollBack();
        }
    }

    
}

?>