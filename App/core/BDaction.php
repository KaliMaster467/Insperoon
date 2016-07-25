<?php

  include_once "BDconf.php";

  class BDaction{

    private static $instancia = NULL;
    private $conexion;

    private function __construct(){

    }
    public static function getInstancia(){
      try{
        if(self::$instancia == NULL){
        $conexion = new BDconf();
        self::$instancia = new PDO("mysql:host=$conexion->BDserver;dbname=$conexion->BDNombre;charset=utf8mb4",$conexion->Usuario,$conexion->Contraseña);
        self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        return self::$instancia;
      }catch(PDOException $e){

        echo $e->getMessage();

      }
      
    }

  }

 ?>
