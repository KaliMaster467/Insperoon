<?php 

	class ImageProfileHandler{

		private $unid;

		public function __construct($unid){
			$this->unid = $unid;
		}
		public function UploadProfileImg(){
			$target_dir = '../../Storage/'. $this->unid . 'profile_img';
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
    			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    			if($check !== false) {
        			echo "File is an image - " . $check["mime"] . ".";
        			$uploadOk = 1;
    			} else {
        			echo "File is not an image.";
        			$uploadOk = 0;
    			}
			}
		}
		public function UploadWallImg(){
			$target_dir = '../../Storage/'. $this->unid . 'wall_img';
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
    			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    			if($check !== false) {
        			echo "File is an image - " . $check["mime"] . ".";
        			$uploadOk = 1;
    			} else {
        			echo "File is not an image.";
        			$uploadOk = 0;
    			}
			}			
		}
	}

 ?>