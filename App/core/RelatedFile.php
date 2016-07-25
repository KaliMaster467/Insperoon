<?php 

	class RelatedFile{

		private function __construct(){

		}

		public static function MainStorageFiles($usuario){
	      $user_main = '../Storage/' . $usuario . '';
	      $profile_img = '../Storage/'. $usuario . '/profile_img';
	      $wall_img = '../Storage/'. $usuario . '/wall_img';
	      $photos_img = '../Storage/' . $usuario . '/photos_img';
	      $sound_track = '../Storage/' . $usuario . '/sound_track';
	      $vids_img = '../Storage/' . $usuario . '/vids_img';


	      
	      if(!mkdir($user_main, 0777, true)){
	        $error = error_get_last();
	        return $error['message'];
	      }else{

	        mkdir($profile_img, 0777, true);
	        mkdir($wall_img, 0777, true); 
	        mkdir($photos_img, 0777, true);
	        mkdir($sound_track, 0777, true);  
	        mkdir($vids_img, 0777, true);
	        

	        return $user_main;
	      }  			
		}

	}

 ?>