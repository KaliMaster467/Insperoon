<?php 

  include_once "../../core/UserSession.php";

  $usr = new SesionUsuario();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insperoon</title>
    <link rel="stylesheet" href="../../libs/CSS/home.css" media="screen" title="no title" charset="utf-8">
    <script src="../../libs/JS/Jquery.min.js"></script>
    <script src="../../libs/JS/profile.js"></script>
  </head>
  <body>
      <nav class="nav nav-top-profile">
        <div class="img-profile"><a href=""><img src="../../libs/Image/profile.jpg" alt="" /></a></div>
        <ul class="nav navbar-list">
          <li class="search-bar"><input type="text" name="Search" placeholder="Search"></li>
          <li class="img-brand"><a href="#"><img src="../../libs/Image/ins.png" alt="" /></a></li>
          <li class="log-out"><input type="button" name="Out" class="btn-out"></li>

        </ul>
      </nav>
      <header>
        <div class="Insport-frame">
          <img src="../../libs/Image/first.jpg" />
          <div class="edit-footer play-footer">
            <?php echo $usr->getNombre(); ?>
            <?php echo $usr->getUnid(); ?>
            <form action="upload.php" method="post" class="img-form" enctype="multipart/form-data">
              Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="submit" value="Upload Image" name="submit">
            </form>
          </div>
        </div>
        <div class="usr-icon">

        </div>
      </header>

  </body>
</html>
