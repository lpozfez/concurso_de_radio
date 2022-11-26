<?php
class Modo{
    private $nombre;

    public function setNombre($nuevo_modo){
        if(!isset($nuevo_modo)){
            $this->nombre=$nuevo_modo;
            return true;
        }
        return false;
    }

    public function getNombre(){
        return $this->nombre;
    }

}
?>