<?php 
ob_start();
include "controlador/controlador_login.php";
include "modelo/conexion.php";
$html = ob_get_clean();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login-Recorder</title>
    <link rel="stylesheet" type="text/css" href="Css/styles.css">
  </head>
  <body>
    <div class="login-container">
      <form method="post" class="login-form">

        <label class="input-label" >Usuario</label>  
        <div class="input-container1">
          <i class="fa fa-user icon"></i>
          <input type="text" placeholder="" name="usuario">
        </div>

        <label class="input-label">Clave</label>
        <div class="input-container2">
          <i class="fa fa-lock icon"></i>
          <input type="password" id="password" name="password"/>
          <i class="icon toggle-password fas fa-eye" onclick="togglePassword()"></i>
        </div>
        <?php echo $html; ?>
        <input type="submit" id="Login" value="Ingresar" name="submit">
	
        <a  class="forgot-password">Para ayuda en el ingreso contactá a tu ejecutivo</a>
      </form>
        <div class="Icono2-1">
            <img class="icono-prin" src="images/Logo Login Blanco.png" alt="Icono">
            <span class="Grabacin">
              © Visari Campus™ 2005-2022
            </span>
        </div>

    </div>
    <script src="Js/scripts.js"></script>
  </body>
</html>