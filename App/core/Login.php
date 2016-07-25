<?php 

	include_once "Usuario.php";
	include_once "UserSession.php";
	include_once "PasswordHandler.php";
	
	class Login{


		public function __construct(){

		}
		public function LoginValidate(){

			if(isset($_POST['Usuario']) && isset($_POST['Contrasena']));

			$Usuario = $_POST['Usuario'];
			$Contrasena = $_POST['Contrasena'];

			$usr = new Usuario();

			if($usr->UserRequest($Usuario, $Contrasena)){
				
				$lpSession = new SesionUsuario();
				$lpSession->setNombre($usr->getNombre());
				$lpSession->setSNombre($usr->getSNombre()); 
				$lpSession->setUsuario($usr->getUsuario());
				$lpSession->setSexo($usr->getSexo());
				$lpSession->setCorreo($usr->getCorreo());
				$lpSession->setContrasena($usr->getContrasena());
				$lpSession->setId($usr->getId());
				$lpSession->setUnid($usr->getUnid());

				$lpSession->Redir("profile");

				return true;

			}else{
				return false;
			}		
		}
		public function ValuateLog(){
			if(!$this->LoginValidate()){
				echo "<script type='text/javascript'>
					
						console.log('nel');
					

				</script>";
			}
		}
	}

 ?>