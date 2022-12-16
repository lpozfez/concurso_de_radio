<?php
if(isset($_POST['entrar'])){
    $id=$_POST['id'];
    $passworld=$_POST['pass'];
    $usuRepo=UsuarioRepositorio::getusuario($id);
    $idUsu=$usuRepo->getId();
    $passUsu=$usuRepo->getPass();
    $rolUsu=$usuRepo->getRol();
    if($id===$idUsu && $passUsu===$passworld){
        Sesion::iniciar();
        Sesion::escribir('id',$id);
        Sesion::escribir('user',$usuRepo->getNombre());
        Sesion::escribir('pass',$passUsu);
        Sesion::escribir('rol',$rolUsu);
        header('Location:?menu=consursos');
    }
}
?>
    <form action="?menu=login" method="post" class="c-formulario">
        <h1>Login</h1>
        <label for="id">Identificador:</label>
        <input  type="text" name="id" id="id" /><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass"/><br>
        <input type="submit" value="Entrar" name="entrar" class="c-boton">
    </form>