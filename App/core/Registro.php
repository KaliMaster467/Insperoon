<?php 

	include_once "Usuario.php";
	include_once "ValidationHandler.php";
	include_once "UserSession.php";
	include_once "PasswordHandler.php";

	class Registro{

		private $Nombre = "";
		private $SNombre = "";
		private $Usuario = "";
		private $Sexo = "";
		private $Correo = "";
		private $Contrasena = "";
		private $Unid = "";
		public static $ERRNO_NOM = "Verifique sus nombre";
		public static $ERRNO_SEXO = "Hubo un error al verificar su sexo";
		public static $ERRNO_PASS = "Vefifique su contraseña";
		public static $ERRNO_MAIL_EMPTY = 1;
		public static $ERRNO_MAIL_EXIST = 2;
		public static $ERRNO_MAIL_SYNTAX = 3;
		public $Nomobre_bool;
		public $SNombre_bool;
		public $Sexo_bool;
		public $Contraseña_bool;
		public $Correo_bool;
		public $CorreoMSG;

		public function __construct(){

		}
		public function PreValidate(){
			
			if($this->PreValidateNombre() && $this->PreValidateSNombre() && $this->PreValidateSexo() && $this->PreValidateCorreo() && $this->PreValidateContra()){
				echo "va";
				return true;
			}else{
				echo "<script>console.log('nop')</script>";
				return false;
			}
			
		}
		public function PreValidateNombre(){
			if(ValidationHandler::ValidNom($this->Nombre)){
				
				$Nombre_bool = false;
				echo "<script>console.log('Nobien')</script>";
				return true;
			}else{
				$Nombre_bool = true;
				echo "<script>console.log('Nomal')</script>";
				return false;
			}	
		}
		public function PreValidateSNombre(){
			if(ValidationHandler::ValidSNomb($this->SNombre)){
				$SNombre_bool = false;
				return true;
			}else{
				$SNombre_bool = true;
				return false;
			}
		}
		public function PreValidateSexo(){
			if(ValidationHandler::ValidSexo($this->Sexo)){
				$Sexo_bool = false;
				return true;
			}else{
				$Sexo_bool = true;
				return false;
			}
		}
		public function PreValidateContra(){
			if(ValidationHandler::ValidContra($this->Contrasena)){
				$Contraseña_bool = false;
				return true;
			}else{
				$Contraseña_bool = true;
				return false;
			}
		}
		public function PreValidateCorreo(){
			if(ValidationHandler::ValidCorreo($this->Correo) == 0){
				return true;
			}else if (ValidationHandler::ValidCorreo($this->Correo) == self::$ERRNO_MAIL_EMPTY){
				$this->Correo_bool = true;
				$this->CorreoMSG = self::$ERRNO_MAIL_EMPTY;
				return false;
			}else if (ValidationHandler::ValidCorreo($this->Correo) == self::$ERRNO_MAIL_EXIST){
				$this->Correo_bool = true;
				$this->CorreoMSG = self::$ERRNO_MAIL_EXIST;
				return false;
			}else if (ValidationHandler::ValidCorreo($this->Correo) == self::$ERRNO_MAIL_SYNTAX){
				$this->Correo_bool = true;
				$this->CorreoMSG = self::$ERRNO_MAIL_SYNTAX;
				return false;
			}
		}
		public function RegisterValidate() {
			if($this->PreValidate()){
				return true;
			}else{
				return false;
			}
		}
		public function PostRegister(){
			if(isset($_POST['acc'])){
				echo "<script>console.log('Se mando correctamente')</script>";
				if($this->RegisterValidate()){
					
					$usrInstance = $this->UserInsert($this->Nombre, $this->SNombre, $this->Sexo, $this->Correo, $this->Contrasena);

					$lpSession = new SesionUsuario();

					$lpSession->setNombre($this->Nombre);
					$lpSession->setSNombre($this->SNombre);
					$lpSession->setUsuario($this->Nombre);
					$lpSession->setSexo($this->Sexo);
					$lpSession->setCorreo($this->Sexo);
					$lpSession->setContrasena($this->Contrasena);
					$lpSession->setId($this->Id);
					$lpSession->setUnid($usrInstance->getUnid());

					$lpSession->Redir("profile");

				}else{
					echo"<script>console.log('Ertror')</script>";
				}
			}else{
				echo "<script>console.log('No acepto')</script>";
			}
		}
		public function UserInsert($Nombre, $SNombre, $Sexo, $Correo, $Contrasena){

			$nusr = new Usuario();

			$nusr->setNombre($Nombre);
			$nusr->setSNombre($SNombre);
			$nusr->setUsuario($Nombre);
			$nusr->setSexo($Sexo);
			$nusr->setCorreo($Correo);
			$nusr->setContrasena($Contrasena);
			$nusr->setUnid();

			if($nusr->UserReg()){

				echo "vava";
				return $nusr;

			}else{

				echo "nel";

			}
		}
		public static function CorreoMSG($i){
			if($i == 1){
				echo "El campo de Correo esta vacio";
			}else if($i == 2){
				echo "El correo ya existe";

			}else if($i == 3){
				echo "No esta bien escrito el correo";
			}
		}
	}

?>