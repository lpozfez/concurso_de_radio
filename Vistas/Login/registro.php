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
    
    //Coprobamos si el usuario existe
    if(!UsuarioRepositorio::getusuario($id)){
        //Creamos el usuario
        $usuario=new Usuario();
        $usuario->setAll($id,$name,$ap,$email,$pass,$lat,$long,$img64);
        
        if(!Sesion::existe('id') && isset($id) && !empty($id)){
            //Abrimos la sesión y le asignamos el identificador del usuario
            Sesion::escribir('id',$id);
            Sesion::escribir('user',$name);
            Sesion::escribir('rol',$rol);

            //Mandamos el email de confirmación al usuario 


            //Añadimos el usuario a la BD
            if(UsuarioRepositorio::addUsuario($usuario)){
                echo '<p>Registro completado</p>';
                //header("Location:?menu=inicio");
            }
        
        }else{
            if(Sesion::existe('rol')&& $_SESSION['rol']=='admin'){
                $rol=$_POST['rol'];
                $usuario->setRol($rol);
                if(UsuarioRepositorio::addUsuario($usuario)){
                    echo '<h1>Usuario añadido</h1>';
                    header("Location:?menu=registro");
                }
            }
        }
    }else{
        echo 'EL USUARIO YA EXISTE';
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
                <input type="text" name="nombre" id="nombre" required/>
            </li>
            <li>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" required/>
            </li>
            <li>
                <label for="mail">Email:</label>
                <input type="text" name="mail" id="mail" placeholder="miemail@gmail.com" required/>
            </li>
            <li>
                <label for="identificador">Identificador:</label>
                <input type="text" name="identificador" id="identificador"  maxlength="6"  required/>
            </li>
            <li>
                <label for="latitud">Latitud:</label>
                <input type="number" name="latitud" id="latitud" step="0.01" required/>
            </li>
            <li>
                <label for="longitud">Longitud:</label>
                <input type="number" name="longitud" id="longitud" step="0.01" required/>
            </li>
            <li>
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto"/>
            </li>
            <li>
                <label for="contrasenia">Contraseña:</label>
                <input type="password" name="contrasenia" id="contrasenia" required/>
            </li>
            <?php
                if(Sesion::existe('rol')&& $_SESSION['rol']=='admin'){
                    echo'
                    <li><label for="rol">Rol:</label><br></li>
                    <li class="c-formulario__radio">
                        <input type="radio" id="admin" name="rol" value="admin" required><br>
                        <label for="admin">Administrador</label>
                        <input type="radio" id="usu" name="rol" value="usuario" required>
                        <label for="usu">Normal</label>
                    </li>';
                }
            ?>
            <li id="botonCentral">
                <input type="submit" value="Registrarme" name="registrar"  class="c-boton">
            </li>
        </ul>
    </form>