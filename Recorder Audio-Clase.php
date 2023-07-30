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
    <link rel="stylesheet" type="text/css" href="Css/styles3.css">
    <link rel="stylesheet" type="text/css" href="Css/style2-3.css">
    <title>Recorder Audio-Clase</title>
</head>
<body>
    <div class="Rectangle-1">
            <div class="Icono2-1">
                <img class="icono-prin" src="images/Icono2.png" alt="Icono">
            </div>
            <div class="Boton-Audio-Clase">
                <img class="icono-mic2" src="images/microfono2 icon.png" alt="Icono">
                <span class="Audio-Clase">
                    Audio-Clase
                </span>
            </div>
            <div class="Boton-Video-Clase" onclick="irARecorderVideoClase()">
                <img class="icono-cam2" src="images/Camara2 icon.png" alt="Icono">
                <span class="Video-Clase">
                    Video-Clase
                </span>
            </div>

    </div>
    <div class="Rectangle-2">
        <span class="Grabacin">
            Grabación> Audio-Clase
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
    <div class="Botonera">
        <div class="Rectangle-5">
            
            <button class="Rectangle-8">
                <span class="Texto-btn">
                    Activar dispositivos
                  </span>
            </button>

            <button class="Rectangle-7">
                <span class="Texto-btn">
                    Compartir pantalla
                </span>
            </button> 

            <button class="Rectangle-6">
                <span class="Texto-btn">
                    Previsualización
                </span>
            </button>
            <button class="Rectangle-4" id="Rectangle-4" onclick="cambiarBoton()">
                <span class="Texto-btn">
                    Iniciar Grabación
                </span>
            </button>

            <button class="Rectangle-80" id="Rectangle-80">
                <span class="Texto-btn">
                    Detener Grabación
                </span>
            </button>

            <button class="Rectangle-17">
                <img src="images/pngwing.png" alt="imagen">
                <ul>
                    <li>
                        <a href="Recorder Audio-Clase.php">Detener Todo</a>
                    </li>
                </ul>
            </button> 
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="Interfaz-Funciones">

            <div class="Abrir-Cam-Mic">
                <span class="INSTRUCCIONES">
                    INSTRUCCIONES
                </span>
                    
                <span class="El-primer-paso-para-realizar-la-grabacin-de-tu-video-clase-es-iniciar-tu-cmara-y-micrfono">
                    El primer paso para realizar la grabación de tu video-clase es iniciar tu
                    micrófono.
                </span>

                <span class="Hace-click-debajo-y-si-tu-navegador-te-pide-autorizacin-para-compartir-acept-para-que-funcione">
                    Hace click debajo y si tu navegador te pide autorización para compartir
                    aceptá para que funcione.
                </span>

                <div class="Rectangle-13"></div>
                <div class="Rectangle-12"></div>

                
                <div class="Frame-2" id="Frame-2">
                    <img src="images/3871988-middle.png" alt="Camara">
                </div>
                
                <span class="VISTA-DE-TU-CMARA">
                    AUDIO DE TU MICRÓFONO
                </span>
            </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     -->
            <div class="Abrir-Cam-Mic-2">
                <span class="INSTRUCCIONES-2">
                    INSTRUCCIONES
                </span>
                    
                <span class="El-primer-paso-para-realizar-la-grabacin-de-tu-video-clase-es-iniciar-tu-cmara-y-micrfono-2">
                    Al abrir el micrófono no se escuchará nada, El único indicador de que esto funciona es el punto rojo que aparecerá en la parte superior izquierda de su navegador.
                </span>

                <span class="Hace-click-debajo-y-si-tu-navegador-te-pide-autorizacin-para-compartir-acept-para-que-funcione-2">
                    Ya con esto activo, puedes ir al siguiente paso.
                </span>

                <button class="Rectangle-9" id="Rectangle-9">
                    <span class="Iniciar-Grabacin-2">
                        ABRIR MICRÓFONO 
                    </span>
                </button>
                <div class="Rectangle-23"></div>
                <div class="Rectangle-22"></div>

                
                <div class="Frame-3">
                    <img src="images/Mic.png" alt="Mic">
                </div>
                
                <span class="VISTA-DE-TU-CMARA-2">
                   
                </span>
            </div>

        </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     -->    
        
        <div class="Interfaz-Funciones-2">

            <div class="Abrir-Cam-Mic-3">
                <span class="INSTRUCCIONES-3">
                    INSTRUCCIONES
                </span>
                    
                <span class="El-primer-paso-para-realizar-la-grabacin-de-tu-video-clase-es-iniciar-tu-cmara-y-micrfono-3">
                    El segundo paso para realizar la grabación de tu video-clase es compartir tu pantalla
                </span>

                <span class="Hace-click-debajo-y-si-tu-navegador-te-pide-autorizacin-para-compartir-acept-para-que-funcione-3">
                    Hace click debajo para compartir tu pantalla con el navegador
                </span>

                <button class="Rectangle-25" id="Rectangle-25">
                    <span class="Iniciar-Grabacin-3">
                        COMPARTIR PANTALLA
                    </span>
                </button>
                <div class="Rectangle-26"></div>
                <div class="Rectangle-27"></div>

                
                <div class="Frame-4" id="Frame-4" >
                    <img src="images/Moni.png" alt="Camara">
                    
                </div>
                
                <span class="VISTA-DE-TU-CMARA-3">
                    PANTALLA COMPARTIDA
                </span>
            </div>
        </div> 
         <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     --> 

        <div class="Interfaz-Funciones-3">

            <div class="Abrir-Cam-Mic-4">
                <span class="INSTRUCCIONES-4">
                    INSTRUCCIONES
                </span>
                    
                <span class="El-primer-paso-para-realizar-la-grabacin-de-tu-video-clase-es-iniciar-tu-cmara-y-micrfono-4">
                    El tercer paso para realizar la grabación de tu video-clase es previsualizar como quedaria el video
                </span>

                <span class="Hace-click-debajo-y-si-tu-navegador-te-pide-autorizacin-para-compartir-acept-para-que-funcione-4">
                    Hace click debajo para previsualizar el video
                </span>

                <button class="Rectangle-28" id="Rectangle-28">
                    <span class="Iniciar-Grabacin-4">
                        PREVISUALIZAR VIDEO
                    </span>
                </button>
                <div class="Rectangle-29"></div>
                <div class="Rectangle-30"></div>

                
                <div class="Frame-5" id="Frame-5">
                    <img src="images/pan+cam.png" alt="Camara">
                </div>
                
                <span class="VISTA-DE-TU-CMARA-4">
                    VISTA DE TU VIDEO
                </span>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="Js/Despliegue.js"></script>
    <script src="Js/index2.js"></script>

</body>
</html>


