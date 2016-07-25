<?php

  class BDconf{
    public $BDserver;
    public $BDNombre;
    public $Usuario;
    public $Contraseña;

    function __construct(){
      $this->BDserver = "localhost";
      $this->BDNombre = "Insperoon";
      $this->Usuario = "root";
      $this->Contraseña = "";
    }
  }

?>
