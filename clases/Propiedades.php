<?php

namespace  App;

class Propiedades
{
    protected static $db;
    protected static $columnas_DB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'banios', 'estacionamiento', 'creado', 'vendedores_id'];
    protected static $errores = [];

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
        $this->id = $arg['id'] ?? '';
        $this->titulo = $arg['titulo'] ?? '';
        $this->precio = $arg['precio'] ?? '';
        $this->imagen = $arg['imagen'] ?? '';
        $this->descripcion = $arg['descripcion'] ?? '';
        $this->habitaciones = $arg['habitaciones'] ?? '';
        $this->banios = $arg['banios'] ?? '';
        $this->estacionamiento = $arg['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = 1;
    }

    public static function setDB($database)
    {
        //Utilizo self para acceder al atributos statica
        self::$db = $database;
    }

    public function guardar(){

        if(isset($this->id)){
            $this->actualizar();

        }else{
            $this->crear();

        }
    }

    public function crear()
    {
        //Sanitizar los datos.
        $atributos = $this->sanitizarAtributos();

        // Inserta en la bse de datos
        $query = "INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function actualizar(){
         //Sanitizar los datos.
         $atributos = $this->sanitizarAtributos();

         $valores = [];
         foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
         }

         

         $query = "UPDATE propiedades SET ";
         $query.= join(', ', $valores );
         $query.= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
         $query.= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?resultado=2'); 
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnas_DB as $columnas) {
            if ($columnas === 'id') continue;
            $atributos[$columnas] = $this->$columnas;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Subida de imagenes
    public function setImagen($imagen)
    {

        //Eliminar la imagen previa

        if( isset ($this->id) ){
            $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES.$this->imagen);
            }
        }


        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Validar los campos
    public static function getErrores()
    {
        return self::$errores;
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

    // listar todas las propiedades
    public static  function all(){
        $query = "SELECT * FROM propiedades";

        $resultado=self::consultarSQL($query);

        return $resultado;

    }
    // Buscar propiedad por id
    public static function find($id){
        //Obtener los datos de la propiedad
        $query = "SELECT * FROM propiedades WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
       
        return array_shift( $resultado);

    }

    public static function consultarSQL($query){

        //Consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar
        $array = [];
        while ($registro = $resultado->fetch_assoc()){
            $array [] = self::crearObjeto($registro);
            
        }
        //liberar memoria
        $resultado -> free();

        //retornar
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach($registro as $key => $value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function sincronizar( $arg = [] ){
        foreach($arg as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key=$value;
            }
        }
    }

}
