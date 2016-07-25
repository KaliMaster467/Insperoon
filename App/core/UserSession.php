<?php 

	class SesionUsuario{

		public function __construct(){

			session_start();

		}
		public function setId($Id){
			$_SESSION['IdUsuario']  = $Id;
		}
		public function setUnid($Unid){
			$_SESSION['Unid'] = $Unid;
		}
		public function setNombre($Nombre){
			$_SESSION['Nombre'] = $Nombre; 
		}
		public function setSNombre($SNombre){
			$_SESSION['SNombre'] = $SNombre;
		}
		public function setUsuario($Usuario){
			$_SESSION['Usuario'] = $Usuario;
		}
		public function setSexo($Sexo){
			$_SESSION['Sexo'] = $Sexo;
		}
		public function setCorreo($Correo){
			$_SESSION['Correo'] = $Correo;
		}
		public function setContrasena($Contrasena){
			$_SESSION['Contrasena'] = $Contrasena;
		}
		public function setStoragePath($StoragePath){
			$_SESSION['StoragePath'] = $StoragePath;
		}
		public function getId(){
			return $_SESSION['IdUsuario'];
		}
		public function getUnid(){
			return $_SESSION['Unid'];
		}
		public function getNombre(){
			return $_SESSION['Nombre'];
		}
		public function getSNombre(){
			return $_SESSION['SNombre'];
		}
		public function getUsuario(){
			return $_SESSION['Usuario'];
		}
		public function getSexo(){
			return $_SESSION['Sexo'];
		}
		public function getCorreo(){
			return $_SESSION['Correo'];
		}
		public function getContrasena(){
			return $_SESSION['Contrasena'];
		}
		public function getStoragePath(){
			return $_SESSION['StoragePath'];
		}
		public function Destroy(){
			session_destroy();
			header("Location: /Insperoon/public_html/index.php");
		}
		public function Redir($StringReady){
			header ("Location: ../App/view/home/".$StringReady.".php?ulps=" . $this->getUnid());
		}
	}  

 ?>