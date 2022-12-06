<?php
$validar=new Validacion();
if(isset($_POST['registrar'])){
    
    //Recogemos los datos del formulario
    
    $name=$validar->limpiaDatos($_POST['nombre']);
    $ap=$validar->limpiaDatos($_POST['apellidos']);
    $email=$validar->limpiaDatos($_POST['mail']);
    $id=$validar->limpiaDatos($_POST['identificador']);
    $lat=$validar->limpiaDatos($_POST['latitud']);
    $long=$validar->limpiaDatos($_POST['longitud']);
    $img64=Imagenes::imgA64($_FILES['foto']);
    $pass=$validar->limpiaDatos($_POST['contrasenia']);

    //Creamos el usuario
    $usuario=new Usuario();
    $usuario->setAll($id,$name,$ap,$email,$pass,$lat,$long,$img64);
    
    if(isset($usuario) && !empty($usuario)){
        //Abrimos la sesión y le asignamos el identificador del usuario
        Sesion::iniciar();
        Sesion::escribir('nombre',$name);
        
        //Añadimos el usuario a la BD
        UsuarioRepositorio::addUsuario($usuario);
    }   
}

?>
    <!--$_SERVER["PHP_SELF"] variable que manda los datos a la propia página
    htmlspecialchars() Función que evita la inyección de código en el formulario-->
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="c-formulario c-formulario--registro" enctype="multipart/form-data">
    <h1>Registro de usuario</h1>
        <ul>
            <li>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre"/>
            </li>
            <li>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos"/>
            </li>
            <li>
                <label for="mail">Email:</label>
                <input type="text" name="mail" id="mail"/>
            </li>
            <li>
                <label for="identificador">Identificador:</label>
                <input type="text" name="identificador" id="identificador" maxlength="6"/>
            </li>
            <li>
                <label for="latitud">Latitud:</label>
                <input type="number" name="latitud" id="latitud" step="0.01"/>
            </li>
            <li>
                <label for="longitud">Longitud:</label>
                <input type="number" name="longitud" id="longitud" step="0.01"/>
            </li>
            <li>
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto"/>
            </li>
            <li>
                <label for="contrasenia">Contraseña:</label>
                <input type="password" name="contrasenia" id="contrasenia"/>
            </li>
            <li id="botonCentral">
                <input type="submit" value="Registrarme" name="registrar"  class="c-boton">
            </li>
        </ul>
    </form>