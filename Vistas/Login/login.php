<?php

    if(isset($_POST['entrar'])){
        $nombreUsu=$_POST['nombre'];
        $passUsu=$_POST['pass'];
        $user=$usuarioRepositorio->getusuario($nombreUsu);

        if(!empty($user)){
            if($nombreUsu==$user->nobreUser && $passUsu==$user->password){
                Sesion->iniciar();
                Sesion->escribir($_POST['usuario'],$nombreUsu);
                Sesion->escribir($_POST['contrasenia'],$passUsu);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"/><br>
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass"/><br>
        <input type="submit" value="Entrar" name="entrar">
    </form>
</body>
</html>