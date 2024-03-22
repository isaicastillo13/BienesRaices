<?php

namespace  App;

class Propiedades extends ActiveRecord{
    protected static $tabla='propiedades';
    protected static $columnas_DB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'banios', 'estacionamiento', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $banios;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($arg = [])
    {
        $this->id = $arg['id'] ?? NULL;
        $this->titulo = $arg['titulo'] ?? '';
        $this->precio = $arg['precio'] ?? '';
        $this->imagen = $arg['imagen'] ?? '';
        $this->descripcion = $arg['descripcion'] ?? '';
        $this->habitaciones = $arg['habitaciones'] ?? '';
        $this->banios = $arg['banios'] ?? '';
        $this->estacionamiento = $arg['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $arg['vendedores_id'] ?? '';
    }
}
