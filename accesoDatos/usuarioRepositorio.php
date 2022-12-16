<?php
//crear para mostrarlos con Silverio listados https://www.netveloper.com/paginacion-de-registros-desde-mysql

class UsuarioRepositorio{

    public static function getUsuarios(){
        $con=Conexion::getConexion();

        try{
            //ejecutamos select
            $resultado=$con->query("SELECT * from `user`");
            $registro = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $usuario=[];
            $usuarios=[];
            for($i=0;$i<sizeof($registro);$i++){
                for($j=0;$j<sizeof($registro);$j++){
                    array_push($usuario,$registro[$j]);
                }
                array_push($usuarios,$usuario[$i]);
            }
            return $usuarios;         
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function getusuario($id){
        $con=Conexion::getConexion();
        $sql="SELECT * from user WHERE identificativo like :id";
        try{
            $resultado=$con->prepare($sql);
            $resultado->bindParam(":id",$id);
            $resultado->execute();
            $registro=$resultado->fetch(PDO::FETCH_OBJ);
            if($registro){
                $usuario=new Usuario;
                //($id,$nombre,$apellidos,$email,$pass,$latitud,$longitud,$imagen64)
                $usuario->setAll($registro->identificativo,$registro->nombreUser,$registro->apellidos,$registro->email,$registro->password,$registro->latitud,$registro->longitud,$registro->imagen);
                $usuario->setRol($registro->rol);
                return $usuario;
            }else{
                echo false;
            }
            
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function borraUsuario(Usuario $usuario){
        $con=Conexion::getConexion();

        $id=$usuario->id;
        try{
            $resultados=$con->exec("DELETE `user` WHERE id=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function borraUsuarioId($id){
        $con=Conexion::getConexion();
        try{
            $resultados=$con->exec("DELETE from `user` WHERE `identificativo`='$id'");
            return $resultados;
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function modificaUsuario(Usuario $usuario){
        $con=Conexion::getConexion();

        $id=$usuario->id;
        try{
            $resultados=$con->exec("UPDATE `user` SET  nombre=:nombre, apellidos=:apellidos, email=:email,pass=:pass, localizador:localizador, rol:rol, imagen:imagen WHERE id=$id");
            return $resultados;
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function addUsuario(Usuario $usuario){
        $con=Conexion::getConexion();
        //sentencia SQL
        $sql="INSERT INTO `user` (`identificativo`, `nombreUser`,`apellidos`,`email`,`rol`,`latitud`,`longitud`,`imagen`,`password`) VALUES(:identificativo,:nombre,:apellidos,:email,:rol, :latitud, :longitud,:imagen,:pass)";
        //Añadimos la consulta al prepare
        $consulta=$con->prepare($sql);
        //recogemos los datos
        $id=$usuario->getId();
        $nom=$usuario->getNombre();
        $aps=$usuario->getApellidos();
        $email=$usuario->getEmail();
        $pass=$usuario->getPass();
        $rol=$usuario->getRol();
        $lat=$usuario->getLatitud();
        $long=$usuario->getLongitud();
        $foto=$usuario->getImagen();
        //Asignamos los valores 
        try{
            $consulta->bindParam(":identificativo",$id);
            $consulta->bindParam(":nombre",$nom);
            $consulta->bindParam(":apellidos",$aps);
            $consulta->bindParam(":email",$email);
            $consulta->bindParam(":rol",$rol);
            $consulta->bindParam(":latitud",$lat);
            $consulta->bindParam(":longitud",$long);
            $consulta->bindParam(":imagen",$foto);
            $consulta->bindParam(":pass",$pass);
            //ejecutamos la consulta
            $consulta->execute();
            return true;
        }catch(PDOException $p){
            echo $p;
        }
    }

    public static function addUsuarios(Array $usuarios){
        $con=Conexion::getConexion();

        $todoOk=true;
        $con->beginTransaction();//iniciamos la transacción 
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
            $con->commit();
        }catch(e){
            $con->rollBack();
        }
    }

    
}

?>