<?php
namespace App;

class ActiveRecord{

    protected static $db;
    protected static $columnas_DB = [];
    protected static $errores = [];
    protected static $tabla='';

    public static function setDB($database)
    {
        //Utilizo self para acceder al atributos statica
        self::$db = $database;
    }

    public function guardar(){

        if(!is_null($this->id)){
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
        $query = "INSERT INTO". static::$tabla." (";
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

         

         $query = "UPDATE ".static::$tabla." SET ";
         $query.= join(', ', $valores );
         $query.= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
         $query.= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?resultado=2'); 
        }
    }

    public function eliminar(){
        $query = "DELETE FROM ".static::$tabla." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";      
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarArchivo();
            header('Location: /admin?resultado=3');
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnas_DB as $columnas) {
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

    public function borrarArchivo(){
        $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES.$this->imagen);
        }
    }
    // Subida de imagenes
    public function setImagen($imagen)
    {

        //Eliminar la imagen previa
        if(!is_null($this->id) ){
            $this->borrarArchivo();
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Validar los campos
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static $errores = [];
        return static::$errores;
    }

    // listar todas las propiedades
    public static  function all(){
        $query = "SELECT * FROM " . static::$tabla;

        $resultado=self::consultarSQL($query);

        return $resultado;

    }
    // Buscar propiedad por id
    public static function find($id){
        //Obtener los datos de la propiedad
        $query = "SELECT * FROM ".static::$tabla." WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
       
        return array_shift( $resultado);

    }

    public static function consultarSQL($query){

        //Consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar
        $array = [];
        while ($registro = $resultado->fetch_assoc()){
            $array [] = static::crearObjeto($registro);
            
        }
        //liberar memoria
        $resultado -> free();

        //retornar
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

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