<?php
if(isset($_POST['entrar'])){
    $username=$_POST['nombre'];
    $passworld=$_POST['pass'];

    $usuRepo=new UsuarioRepositorio();
    $usuRepo->getusuario($username);
    $usuRepo=$usuRepo->getNombre();

    var_dump ($usuRepo);

    
}

?>

    <form action="?login.php" method="post" class="c-formulario">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" /><br>
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass"/><br>
        <input type="submit" value="Entrar" name="entrar">
    </form>