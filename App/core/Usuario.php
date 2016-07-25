<?php

  include_once "BDaction.php";
  include_once "RelatedFile.php";

  class Usuario{
    private $Id;
    private $unid;
    private $Nombre;
    private $SNombre;
    private $Usuario;
    private $Sexo;
    private $Correo;
    private $Contrasena;
    private $StoragePath;
   

    public function __construct(){
      $this->Id = "";
      $this->unid = "";
      $this->Nombre = "";
      $this->SNombre = "";
      $this->Usuario = "";
      $this->Sexo = "";
      $this->Correo = "";
      $this->Contrasena = "";
      $this->StoragePath = "";
    }

    public function setId($Id){
      $this->Id = $Id;
    }
    public function getId(){
      return $this->Id;
    }
    public function setUnid(){
      $this->unid = substr($this->SNombre, -2) . "." . substr($this->Usuario, 0, 4) . substr($this->Correo, 0, 2); 
    }
    public function getUnid(){
      return $this->unid;
    }
    public function setNombre($Nombre){
      $this->Nombre = $Nombre;
    }
    public function getNombre(){
      return $this->Nombre;
    }
    public function setSNombre($SNombre){
      $this->SNombre = $SNombre;
    }
    public function getSNombre(){
      return $this->SNombre;
    }
    public function setUsuario($Usuario){
      $this->Usuario = $Usuario;
    }
    public function getUsuario(){
      return $this->Usuario;
    }
    public function setSexo($Sexo){
      $this->Sexo = $Sexo;
    }
    public function getSexo(){
      return $this->Sexo;
    }
    public function setCorreo($Correo){
      $this->Correo = $Correo;
    }
    public function getCorreo(){
      return $this->Correo;
    }
    public function setContrasena($Contrasena){
      $this->Contrasena = $Contrasena;
    }
    public function getContrasena(){
      return $this->Contrasena;
    }
    public function setStoragePath($StoragePath){
      $this->StoragePath = $StoragePath;
    }
    public function getStoragePath(){
      return $this->StoragePath;
    }

    public function UserRequest($Usuario, $Contrasena){
      $query = "SELECT * FROM Usuario WHERE Usuario = '$Usuario' AND Contrasena = '$Contrasena'";

      try{
        $com = BDaction::getInstancia()->prepare($query);
        $com->execute();
        if($row = $com->fetch(PDO::FETCH_ASSOC)){
          
          $this->setId($row['IdUsuario']);
          $this->setNombre($row['Nombre']);
          $this->setSNombre($row['SNombre']);
          $this->setUsuario($row['Usuario']);
          $this->setSexo($row['Sexo']);
          $this->setCorreo($row['Correo']);
          $this->setContrasena($row['Contrasena']);
          $this->setUnid($row['Unid']);
          $this->setStoragePath($row['StoragePath']);

          return true;

        }else{

          return false;
          
        }
        $com->close();
      }
      catch(PDOException $e){

        echo "Huvo un error con la peticion" . $e->getMessage();

      }
    }
    public function UserReg(){

      $query = "INSERT INTO Usuario (Unid, Nombre, SNombre, Usuario, Sexo, Correo, Contrasena, StoragePath)
      VALUES (:Unid, :Nombre,:SNombre,:Usuario,:Sexo,:Correo,:Contrasena, :StoragePath)";
     

      try{
        $cm = BDaction::getInstancia()->prepare($query);

        $row = $cm->execute(array(
          
          ':Unid' => $this->getUnid(),
          ':Nombre' => $this->getNombre(), 
          ':SNombre'=> $this->getSNombre(),
          ':Usuario'=> $this->getUsuario(), 
          ':Sexo'=> $this->getSexo(),
          ':Correo'=> $this->getCorreo(), 
          ':Contrasena'=> $this->getContrasena(),
          ':StoragePath'=> RelatedFile::MainStorageFiles($this->getUnid())
          
        ));

        if($row){
           
          return true;

        }else{

          return false;

        }

        $cm->close();

      }catch(PDOException $e){

          echo $e->getMessage();

      } 
    }
  }

?>