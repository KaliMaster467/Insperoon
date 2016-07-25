<?php 

  include_once "../App/core/Login.php";
  include_once "../App/core/Registro.php";

  if(isset($_POST['btnIni'])){
    $log = new Login();
    $log->ValuateLog();   
  }else if(isset($_POST['Reg'])){
    $reg = new Registro();
    $reg->PostRegister();
  }

?>  
<!DOCTYPE html>
<html lang="es" class="content">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a Insperoon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = "../App/libs/JS/Jquery.min.js"></script>
    <script src = "../App/libs/JS/JSindex.js"></script>
    <link rel="stylesheet" href="../App/libs/CSS/estiloIndex.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body class="responsive-body">
    <header class="global-header-container">
      <nav class="navbar navabar-static navbar-fixed">
        <ul class="navbar-list">
          <li class="navart brand"><a href="#"><img src="../App/libs/Image/ins.png" alt="" /></a></li>

        </ul>
        <br><br><br>
        <section class="Login-fr">
          <hgroup class="main-titleb">
            <h1>Inicio de sesión</h1>
          </hgroup>
          <div class="fr-inner">
            <form class="" action="index.php" method="post">
              <label for="usrname">Usuario:   </label>
              <input class="input input-usr" type="text" name="Usuario" placeholder="Nombre de Usuaro"><br><br><br><br>
              <label for="Contrasena">Contraseña: <label>
              <input class="input input-pass" type="password" name="Contrasena" placeholder="Contraseña">
              <br><br>
              <input type="submit" class="btn-ini" name="btnIni" value="Iniciar">
            </form>
          </div>
        </section>
      </nav>
      <section class="start-prompt">
        <p>

          Share your moments, share yourself.

        </p><br>
        <div class="Register-fr">
          <hgroup class = "main-title">
            <h1>Registrate</h1>
          </hgroup>
          <form class="" action="index.php" method="POST">
            <label for="Nombre">Nombre: </label>
            <input class="inputw input-nombre" type="text" name="Nombre" placeholder="Nombre">
            <label for="Segundo">Segundo nombre: </label>
            <input class="inputw input-segundo" type="text" name="Segundo" placeholder="Segundo nombre">
            <label for="M/F">Sexo: </label>
            <label for="M">M: </label>
            <input type="checkbox" name="M" value="M">
            <label for="F">F: </label>
            <input type="checkbox" name="F" value="F"><br><br><br>
            <label for="Correo">Correo: </label>
            <input class="inputw input-correo" type="text" name="Correo" placeholder="Correo">
            <label for="num">Contraseña: </label>
            <input class="inputw input-num" type="password" name="Contraseña" placeholder="Contraseña">
            <label for="acc">Acepto los términos y condiciones</label>
            <input type="checkbox" name="acc" value="acepto"><br><br><br><br>
            <input class="btn-reg" type="submit" name="Reg" value="Registrate">
          </form>
          <div class="foot-term">
            <p>
              <strong><a href="#">Terms and Services</a></strong>Los datos proporcionados
              en este formulario son confidenciales. Son de uso exclusivo de Insperoon TM.
            </p>
          </div>
        </div>
      </section>
      <section class="main-container main-responsive main-container-one">
        <div class="inner-container reg-in">
              <div class="intro">
                <div class="out-p">
                  <hgroup class="main-title">

                    <h1>Comparte tus momentos de una manera única.</h1>

                  </hgroup>
                  <br><br><br>
                  <p>
                    Personaliza, crea, siente la creatividad alrededor de tus recuerdos.
                  </p>
                </div>
              </div>
        </div>
      </section>
    </header>
    <footer class="main-footer">

      <p class="footer-tm">
        Insperoon TM 2016 Alberto Reyes Briseño.
      </p>

    </footer>

  </body>
</html>
