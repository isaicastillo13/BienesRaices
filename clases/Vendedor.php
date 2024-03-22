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
}