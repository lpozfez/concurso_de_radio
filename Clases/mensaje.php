<?php
class Mensaje{
    private $distintivo;
    private $descripcion;
    private $fechaIniInscripcion;
    private $fechaFinInscripcion;
    private $fechaIniConcurso;
    private $fechaFinConcurso;
    private $numJueces;
    private $diplomas;
    private $premios;
    private $cartel;
    
    


    /**
     * Get the value of distintivo
     */
    public function getDistintivo()
    {
        return $this->distintivo;
    }

    /**
     * Set the value of distintivo
     */
    public function setDistintivo($distintivo): self
    {
        $this->distintivo = $distintivo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of fechaIniInscripcion
     */
    public function getFechaIniInscripcion()
    {
        return $this->fechaIniInscripcion;
    }

    /**
     * Set the value of fechaIniInscripcion
     */
    public function setFechaIniInscripcion($fechaIniInscripcion): self
    {
        $this->fechaIniInscripcion = $fechaIniInscripcion;

        return $this;
    }

    /**
     * Get the value of fechaFinInscripcion
     */
    public function getFechaFinInscripcion()
    {
        return $this->fechaFinInscripcion;
    }

    /**
     * Set the value of fechaFinInscripcion
     */
    public function setFechaFinInscripcion($fechaFinInscripcion): self
    {
        $this->fechaFinInscripcion = $fechaFinInscripcion;

        return $this;
    }

    /**
     * Get the value of fechaIniConcurso
     */
    public function getFechaIniConcurso()
    {
        return $this->fechaIniConcurso;
    }

    /**
     * Set the value of fechaIniConcurso
     */
    public function setFechaIniConcurso($fechaIniConcurso): self
    {
        $this->fechaIniConcurso = $fechaIniConcurso;

        return $this;
    }

    /**
     * Get the value of fechaFinConcurso
     */
    public function getFechaFinConcurso()
    {
        return $this->fechaFinConcurso;
    }

    /**
     * Set the value of fechaFinConcurso
     */
    public function setFechaFinConcurso($fechaFinConcurso): self
    {
        $this->fechaFinConcurso = $fechaFinConcurso;

        return $this;
    }

    /**
     * Get the value of numJueces
     */
    public function getNumJueces()
    {
        return $this->numJueces;
    }

    /**
     * Set the value of numJueces
     */
    public function setNumJueces($numJueces): self
    {
        $this->numJueces = $numJueces;

        return $this;
    }

    /**
     * Get the value of diplomas
     */
    public function getDiplomas()
    {
        return $this->diplomas;
    }

    /**
     * Set the value of diplomas
     */
    public function setDiplomas($diplomas): self
    {
        $this->diplomas = $diplomas;

        return $this;
    }

    /**
     * Get the value of premios
     */
    public function getPremios()
    {
        return $this->premios;
    }

    /**
     * Set the value of premios
     */
    public function setPremios($premios): self
    {
        $this->premios = $premios;

        return $this;
    }

    /**
     * Get the value of cartel
     */
    public function getCartel()
    {
        return $this->cartel;
    }

    /**
     * Set the value of cartel
     */
    public function setCartel($cartel): self
    {
        $this->cartel = $cartel;

        return $this;
    }
}
?>