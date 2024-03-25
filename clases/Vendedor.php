<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla='vendedores';
    protected static $columnas_DB = ['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($arg = [])
    {
        $this->id = $arg['id'] ?? NULL;
        $this->nombre = $arg['nombre'] ?? '';
        $this->apellido = $arg['apellido'] ?? '';
        $this->telefono = $arg['telefono'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "Debes Añadir un Titulo.";
        }

        if (!$this->apellido) {
            self::$errores[] = "Debes Añadir el Precio de la Propiedad.";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes Añadir el Precio de la Propiedad.";
        }

        


        return self::$errores;
    }
}