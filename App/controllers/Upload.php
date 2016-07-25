<?php 

	include_once "../core/ImageProfileHandler.php";
	include_once "../core/UserSession.php";

	$user = new SesionUsuario();

	$Img = new ImageProfileHandler($user->getUnid);

	$Img->UploadProfileImg();
 ?>