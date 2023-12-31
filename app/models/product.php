<?php

class Product{

    private $id;
    private $nombreProducto;
    private $descripcion;
    private $editorial;
    private $precio;
    private $anopublicacion;
    private $edadMinima;
    private $jugadoresMinimos;
    private $jugadoresMaximos;
    private $ean;
    private $rutaImagen;
    private $stock;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * @param mixed $nombreProducto
     */
    public function setNombreProducto($nombreProducto): void
    {
        $this->nombreProducto = $nombreProducto;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     */
    public function setEditorial($editorial): void
    {
        $this->editorial = $editorial;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getAnopublicacion()
    {
        return $this->anopublicacion;
    }

    /**
     * @param mixed $anopublicacion
     */
    public function setAnopublicacion($anopublicacion): void
    {
        $this->anopublicacion = $anopublicacion;
    }

    /**
     * @return mixed
     */
    public function getEdadMinima()
    {
        return $this->edadMinima;
    }

    /**
     * @param mixed $edadMinima
     */
    public function setEdadMinima($edadMinima): void
    {
        $this->edadMinima = $edadMinima;
    }

    /**
     * @return mixed
     */
    public function getJugadoresMinimos()
    {
        return $this->jugadoresMinimos;
    }

    /**
     * @param mixed $jugadoresMinimos
     */
    public function setJugadoresMinimos($jugadoresMinimos): void
    {
        $this->jugadoresMinimos = $jugadoresMinimos;
    }

    /**
     * @return mixed
     */
    public function getJugadoresMaximos()
    {
        return $this->jugadoresMaximos;
    }

    /**
     * @param mixed $jugadoresMaximos
     */
    public function setJugadoresMaximos($jugadoresMaximos): void
    {
        $this->jugadoresMaximos = $jugadoresMaximos;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean): void
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getRutaImagen()
    {
        return $this->rutaImagen;
    }

    /**
     * @param mixed $rutaImagen
     */
    public function setRutaImagen($rutaImagen): void
    {
        $this->rutaImagen = $rutaImagen;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }


}