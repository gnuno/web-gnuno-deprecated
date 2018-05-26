<?php

class Nota{

    private $idNota;
    private $titulo;
    private $cuerpo;
    private $fecha;
    private $autor;
    private $tipoNota;
    private $habilitada;

    public function __constructor(){

    }

    public function agregarNota(){

    }

    public function eliminarNota(){

    }

    public function modificarNota(){

    }

    public function verNotaPorID(){

    }

    public function verNotas(){
        
    }

    public function 

    /**
     * Get the value of idNota
     */ 
    public function getIdNota()
    {
        return $this->idNota;
    }

    /**
     * Set the value of idNota
     *
     * @return  self
     */ 
    public function setIdNota($idNota)
    {
        $this->idNota = $idNota;

        return $this;
    }

    /**
     * Get the value of cuerpo
     */ 
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set the value of cuerpo
     *
     * @return  self
     */ 
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of tipoNota
     */ 
    public function getTipoNota()
    {
        return $this->tipoNota;
    }

    /**
     * Set the value of tipoNota
     *
     * @return  self
     */ 
    public function setTipoNota($tipoNota)
    {
        $this->tipoNota = $tipoNota;

        return $this;
    }

    /**
     * Get the value of habilitada
     */ 
    public function getHabilitada()
    {
        return $this->habilitada;
    }

    /**
     * Set the value of habilitada
     *
     * @return  self
     */ 
    public function setHabilitada($habilitada)
    {
        $this->habilitada = $habilitada;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
}