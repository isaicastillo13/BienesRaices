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
    public $mensaje = 'Propiedad';


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

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes Añadir un Titulo.";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes Añadir el Precio de la Propiedad.";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes Añadir la Descripción de la Propiedad.";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes Añadir el numero de habitacion de la Propiedad.";
        }
        if (!$this->banios) {
            self::$errores[] = "Debes Añadir el numero de los Baños de la Propiedad.";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes Añadir el numero de estacionamientos de la Propiedad.";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes Seleccionar el vendedor de la Propiedad.";
        }
        if(!$this->imagen){
            self::$errores[]='Debe Añadir una imagen de la propiedad';
        }

        return self::$errores;
    }
}
