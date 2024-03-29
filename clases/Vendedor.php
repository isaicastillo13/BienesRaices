<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla='vendedores';
    protected static $columnas_DB = ['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $mensaje;

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
            self::$errores[] = "Debes Colocar el Nombre.";
        }

        if (!$this->apellido) {
            self::$errores[] = "Debes Colocar el Apellido.";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes Colocar el Numero de telefono.";
        }

        if(!preg_match('/[0-9]{8}/',$this->telefono)){
            self::$errores[]="El formato de telefono no es valido";
        }


        return self::$errores;
    }
}