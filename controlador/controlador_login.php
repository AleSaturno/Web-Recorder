<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Crear una instancia de la clase mysqli
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa o no
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if(!empty($_POST["submit"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario=mysqli_real_escape_string($conexion, $_POST["usuario"]);
        $password=mysqli_real_escape_string($conexion, $_POST["password"]);
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=? AND password=?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($datos = $result->fetch_object()) {
            $_SESSION["usuario2"]=$datos->usuario;
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->nombre;
            header("Location: Recorder.php");
        } else {
            echo "<div style='text-align: center;'>Acceso denegado</div>";
        }
    } else {
        echo "<div style='text-align: center;'>Acceso denegado</div>";
    }
}

// Cerrar la conexión
$conexion->close();
?>