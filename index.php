<?php
class Principal
{
    public static function main()
    {
        require_once './cargadores/autocargador.php';
        require_once './helper/sesion.php';
        require_once './Vistas/Principal/milayout.php';
        
    }
}
Principal::main();
?>
