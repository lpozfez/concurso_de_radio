<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asociación de radioaficionados</title>
    <link rel="stylesheet" href=".\css\estilos\main.css">
    <script src="js\login.js"></script>
</head>



<body>
    <?php
        Sesion::iniciar();
        if(Sesion::existe('id')==true && !($_GET['menu'] == "login")){
            require_once './Vistas/Principal/headerLogueado.php';
        }elseif(!($_GET['menu'] == "login")){
            require_once './Vistas/Principal/headerSinLogin.php';
        }
    ?>

    <main>
        <div id="cuerpo">
            <?php
                require_once './Vistas/Principal/mienruta.php';
            ?>
        </div>
    </main>
    
    <?php
        if(!($_GET['menu'] == "login")){
            require_once './Vistas/Principal/mifooter.php';
        }
    ?>
</body>
</html>
