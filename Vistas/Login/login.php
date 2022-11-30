<?php
    $errores=new Errores();

    if(isset($_POST['entrar'])){
        if(empty($_POST['nombre'])){
            $errores->datoVacio($nombreUsu);
        }
        if(empty($_POST['pass'])){
            $errores->datoVacio($passUsu);
        }

        $nombreUsu=$_POST['nombre'];
        $passUsu=$_POST['pass'];
        

        if(!empty($nombreUsu)&& !empty($passUsu)){
            $usuRepo= new UsuarioRepositorio();
            $user=$usuRepo->getusuario($nombreUsu);
            if($nombreUsu==$user->nobreUser && $passUsu==$user->password){
                $sesionUsu=new Sesion;
                $sesionUsu->iniciar();
                $sesionUsu->escribir($_POST['usuario'],$nombreUsu);
                $sesionUsu->escribir($_POST['contrasenia'],$passUsu);
            }
        }
    }

?>

    <form action="" method="post" class="c-formulario">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php $errores->muestraError($nombreUsu);?>"/><br>
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass" value="<?php $errores->muestraError($passUsu);?>"/><br>
        <input type="submit" value="Entrar" name="entrar">
    </form>