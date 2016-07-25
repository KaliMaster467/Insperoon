<?php 
	
	include_once "BDaction.php";

	class ValidationHandler{

		private function __construct(){

		}
	
		public static function ValidNom(&$Nombre){
			$comparation = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
			if(isset($_POST['Nombre'])){
				$Nombre = $_POST['Nombre'];
				echo "<script>console.log('Nobienva')</script>";
				return true;
			}else{
				echo "<script>console.log('Nomalva')</script>";
				return false;
			}
		}
		public static function ValidSNomb(&$SNombre){
			$comparation = "([a-z]|[A-Z]|\\s)+";
			if(isset($_POST['Segundo'])){
				$SNombre =  $_POST['Segundo'];
				return true;
			}else{
				return false;
			}			
		}
		public static function ValidContra(&$Contrasena){
			if(isset($_POST['Contraseña'])){
				$Contrasena = $_POST['Contraseña'];
				return true;
			}else{
				return false;
			}
		}
		public static function ValidUser(&$Usuario){
			if(isset($_POST['Usuario'])){
				$Usuario =  $_POST['Usuario'];
				return true;
			}else{
				return false;
			}
		}
		public static function ValidSexo(&$Sexo){
			if(isset($_POST['M']) || isset($_POST['F'])){
				if(isset($_POST['M'])){
					$Sexo = "M";
				}else if(isset($_POST['F'])){
					$Sexo =  "F";
				}
				return true;
			}else{
				return false;
			}
		}
		public static function ValidCorreo(&$Correo){

			$Cor;

			if(isset($_POST['Correo'])){
				
				$Cor = $_POST['Correo'];

				if(!self::BDCorreoVerify($Cor)){

					$Correo =  $_POST['Correo'];

					return 0;
				}else{
					return 2; //Todo correcto
				}
			}else if(!isset($_POST['Correo'])){
				return 1; // No se escribio nada
			}
		}

		public static function BDCorreoVerify($Correo){

			$cor;

			$query = "SELECT * FROM Usuario WHERE Correo = '$Correo'";

			$cm = BDaction::getInstancia()->prepare($query);

			$cm->execute();

			if($row = $cm->fetch(PDO::FETCH_ASSOC)){
				$cor = $row['Correo'];
			}else{
				$cor = "";
			}

			if($Correo != $cor){
				echo "qupas";
				return false;
			}else{
				echo "<script>console.log('Nocon');</script>";	
				return true;
			}
			
		}
	}

 ?>