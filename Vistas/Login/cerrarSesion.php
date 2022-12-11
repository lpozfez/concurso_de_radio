<?php
session_start();
session_destroy();
header("Location: ./Vistas/inicio.php");
exit();
?>