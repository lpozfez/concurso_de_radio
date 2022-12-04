<?php
//crear para mostrarlos con Silverio listados https://www.netveloper.com/paginacion-de-registros-desde-mysql

class UsuarioRepositorio{
    


    public function getUsuarios(){
        $con=Conexion::getConexion();

        try{
            $usuarios=[];
            //ejecutamos select
            $resultado=$con->query("SELECT * from `user`");
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

    public function getusuario($nombre){
        $con=Conexion::getConexion();

        try{
            
            //ejecutamos select
            $registros=$con->query("SELECT * from `user` WHERE nombreUser LIKE $nombre");
            //devuelve un objeto
            while($usu=$registros->fetch(PDO::FETCH_OBJ)){
                return $usu;
            }
    
        }catch(PDOException $p){
            echo $p;
        }
    }

    public function borraUsuario(Usuario $usuario){
        $con=Conexion::getConexion();

        $id=$usuario->id;
        try{
            $resultados=$con->exec("DELETE `user` WHERE id=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public function modificaUsuario(Usuario $usuario){
        $con=Conexion::getConexion();

        $id=$usuario->id;
        try{
            $resultados=$con->exec("UPDATE `user` SET  nombre=:nombre, apellidos=:apellidos, email=:email,pass=:pass, localizador:localizador, rol:rol, imagen:imagen WHERE id=$id");
            return $resultados;
        }catch(e){
            echo e;
        }
    }

    public static function addUsuario(Usuario $usuario){
        $con=Conexion::getConexion();
        //sentencia SQL
        $anadir="INSERT INTO `user` (`identificativo`, `nombreUser`,`apellidos`,`email`,`password`,`localizador`,`rol`,`imagen`) VALUES(:identificativo,:nombre,:apellidos,:email,:pass,:localizador,:rol,:imagen)";
        $consulta=$con->prepare($anadir);

        $id=$usuario->getId();
        $nom=$usuario->getNombre();
        $aps=$usuario->getApellidos();
        $email=$usuario->getEmail();
        $pass=$usuario->getPass();
        $lat=$usuario->getLatitud();
        $long=$usuario->getLongitud();
        $localizador=`("GeomFromText(´POINT(`.$lat.' '.$long.`)´)`;
        $rol=$usuario->getRol();
        $foto=$usuario->getImagen();

        try{
            $consulta->bindParam(":identificativo",$id);
            $consulta->bindParam(":nombre",$nom);
            $consulta->bindParam(":apellidos",$aps);
            $consulta->bindParam(":email",$email);
            $consulta->bindParam(":pass",$pass);
            $consulta->bindParam(":localizador",$localizador);
            $consulta->bindParam(":rol",$rol);
            $consulta->bindParam(":imagen",$foto);

            $consulta->execute();

        }catch(e){
            echo e;
        }
    }

    public function addUsuarios(Array $usuarios){
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