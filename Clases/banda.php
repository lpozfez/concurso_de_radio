<?php
class Banda{
    private $identificador;
    private $rango;
    private $min;
    private $max;

    public function setIdentificador($nuevo_iden){
        if(!isset($nuevo_iden)){
            $this->identificador=$nuevo_iden;
            return true;
        }
        return false;
    }

    public function getIdentificador(){
        return $this->identificador;
    }

    public function setRango($nuevo_iden){
        if(!isset($nuevo_iden)){
            $this->identificador=$nuevo_iden;
            return true;
        }
        return false;
    }

    public function getRango(){
        return $this->rango;
    }
    public function setMin($nuevo_rango){
        if(!isset($nuevo_rango)){
            $this->rango=$nuevo_rango;
            return true;
        }
        return false;
    }

    public function getMin(){
        return $this->min;
    }

    public function setMax($nuevo_max){
        if(!isset($nuevo_max)){
            $this->max=$nuevo_max;
            return true;
        }
        return false;
    }

    public function getMax(){
        return $this->max;
    }

}

?>