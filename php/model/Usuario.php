<?php

class Usuario{

    private $idUsuario;
    private $nombre;
    private $fechaAlta;
    private $mail;
    private $permisos;
    private $password;
    private $habilitado;
    private $articulos;

    public function __construct(){

    }

    public function agregarUsuario(){

    }

    public function eliminarUsuario(){

    }

    public function modificarUsuario(){

    }

    public function verUsuarios(){

    }

    public function verUsuarioPorID(){

    }

    public function validarPassword(){

    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of fechaAlta
     */ 
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set the value of fechaAlta
     *
     * @return  self
     */ 
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get the value of permisos
     */ 
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Set the value of permisos
     *
     * @return  self
     */ 
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of habilitado
     */ 
    public function getHabilitado()
    {
        return $this->habilitado;
    }

    /**
     * Set the value of habilitado
     *
     * @return  self
     */ 
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get the value of articulos
     */ 
    public function getArticulos()
    {
        return $this->articulos;
    }

    /**
     * Set the value of articulos
     *
     * @return  self
     */ 
    public function setArticulos($articulos)
    {
        $this->articulos = $articulos;

        return $this;
    }
}