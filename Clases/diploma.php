<?php
class Diploma{
    private $nombre;
    private $minPuntos;
    private $imagen;
    private Concurso $concurso;

    public function setNombre($nuevo_nombre){
        if(!isset($nuevo_nombre)){
            $this->nombre=$nuevo_nombre;
            return true;
        }
        return false;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setMinPuntos($nuevo_puntos){
        if(!isset($nuevo_puntos)){
            $this->minPuntos=$nuevo_puntos;
            return true;
        }
        return false;
    }

    public function getMinPuntos(){
        return $this->minPuntos;
    }

    public function setImagen($nuevaImagen){
        if(!isset($nuevaImagen)){
            $this->imagen=$nuevaImagen;
            return true;
        }
        return false;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function setConcurso(Concurso $nuevoConcurso){
        if(!isset($nuevoConcurso)){
            $this->concurso=$nuevoConcurso;
            return true;
        }
        return false;
    }

    public function getConcurso(){
        return $this->concurso;
    }


}

?>