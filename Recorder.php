<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Css/styles1.css">
    <link rel="stylesheet" type="text/css" href="Css/style2-2.css">
    <title>Recorder</title>
</head>
<body>
    <div class="Rectangle-1">
            <div class="Icono2-1">
                <img class="icono-prin" src="images/Icono2.png" alt="Icono">
            </div>
            <div class="Boton-Video-Clase" onclick="irARecorderVideoClase()">
                <img class="icono-cam2" src="images/Camara2 icon.png" alt="Icono">
                <span class="Video-Clase">
                    Video-Clase
                </span>
            </div>
            <div class="Boton-Audio-Clase" onclick="irARecorderAudioClase()">
                <img class="icono-mic2" src="images/microfono2 icon.png" alt="Icono">
                <span class="Audio-Clase">
                    Audio-Clase
                </span>
            </div>
    </div>
    <div class="Rectangle-2">
        <span class="Grabacin">
            Grabación>
        </span>

        <button id="Usuario" class="Usuario">
            <ul id="miLista">
                <li>
                    <p class="nombre-usuario">
                        <?php
                        echo $_SESSION["nombre"];
                        ?>
                    </p>
                    <a href="controlador/controlador_cerrar_session.php">Cerrar Sesión</a>
                </li>
            </ul>
        </button>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="Js/Despliegue2.js"></script>
    <script src="Js/index.js"></script>

</body>
</html>