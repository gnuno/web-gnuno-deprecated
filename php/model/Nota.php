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

        try{

            $link = ConexionMySQL::conectar();

            $sql = "INSERT INTO notas (titulo, cuerpo, autor, tipoNota) VALUES (:titulo, :cuerpo, :autor, :tipoNota)";

            $stmt = $link->prepare($sql);
            $stmt->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindValue(":cuerpo", $cuerpo, PDO::PARAM_STR);
            $stmt->bindValue(":autor", $autor, PDO::PARAM_INT);
            $stmt->bindValue(":tipoNota", $tipoNota, PDO::PARAM_INT);
            $stmt->bindValue(":fecha", date("Y-m-d"), PDO::PARAM_STR);

            return $stmt->execute();
            
        }catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }

    public function eliminarNota($idNota){

        try{

            $link = ConexionMySQL::conectar();

            $sql = "DELETE FROM notas WHERE idNota = :idNota";

            $stmt = $link->prepare($sql);
            $stmt->bindValue(":idNota", $idNota, PDO::PARAM_INT);

            return $stmt->execute();

        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }

    public function modificarNota($idNota){

        try{

            $link = ConexionMySQL::conectar();

            $sql = "UPDATE notas SET cuerpo = :cuerpo, titulo = :titulo, fecha = :fecha, autor = :autor, tipoNota = :tipoNota WHERE idNota = :idNota";

            $stmt = $link->prepare($sql);
            $stmt->bindValue(":cuerpo", $cuerpo, PDO::PARAM_STR);
            $stmt->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindValue(":tipoNota", $tipoNota, PDO::PARAM_INT);
            $stmt->bindValue(":autor", $autor, PDO::PARAM_INT);
            $stmt->bindValue(":idNota", $idNota, PDO::PARAM_INT);
            $stmt->bindValue(":fecha", $fecha, PDO::PARAM_STR);
            
            return $stmt->execute();

        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
            
    }

    public function verNotaPorID(){
        
        try{
            $link = ConexionMySQL::conectar();
            
            $sql = "SELECT idNota, autor, cuerpo, titulo, fecha, tipoNota FROM notas WHERE idNota = :idNota";

            $stmt = $link->prepare($sql);
            $stmt->bindValue(":idNota", $idNota, PDO::PARAM_INT);
            $stmt->execute();

            $nota = $stmt->fetch(PDO::FETCH_BOTH);

            return $nota;
            
        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function verNotas(){
        try{
            $link = ConexionMySQL::conectar();
            
            $sql = "SELECT idNota, autor, cuerpo, titulo, fecha, tipoNota FROM notas";

            $stmt = $link->prepare($sql);
            $stmt->execute();

            $notas = $stmt->fetchAll(PDO::FETCH_BOTH);

            return $notas;
            
        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
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