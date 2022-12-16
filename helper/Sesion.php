<?php
class Sesion
{
    public static function iniciar()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public static function leer(string $clave)
    {
        if(existe($clave)==true){
            return $_SESSION[$clave];
        }else{
            return false;
        }
    }

    public static function existe(string $clave)
    {
        if(isset($_SESSION[$clave])){
            return true;
        }else{
            return false;
        }
    }

    public static function escribir($clave,$valor)
    {
        $_SESSION[$clave]=$valor;
    }

    public static function eliminar($clave)
    {
        $_SESSION[$clave]=null;
        session_destroy();
    }
}