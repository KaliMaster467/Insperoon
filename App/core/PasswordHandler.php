<?php 

	class PasswordHandler{

		public static function Crypt(&$Contrasena){
			if(isset($_POST['Contraseña'])){
				$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
				$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $Contrasena, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
				$Contrasena = $qEncoded;
				return true;
			}else{
				return false;
			}
		}
	    public static function Decrypt(&$Contrasena){
	      $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	      $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $Contrasena ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
	      $Contrasena = $qDecoded;
	    }		
	}

 ?>