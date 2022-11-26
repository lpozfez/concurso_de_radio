<?php
class gps{
    private $latitud;
    private $longitud;

    

    /**
     * Get the value of latitud
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set the value of latitud
     */
    public function setLatitud($latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get the value of longitud
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set the value of longitud
     */
    public function setLongitud($longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }
}
?>