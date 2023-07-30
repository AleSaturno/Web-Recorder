function irARecorderVideoClase() {
  window.location.href = "Recorder Video-Clase.php";
}

function irARecorderAudioClase() {
  window.location.href = "Recorder Audio-Clase.php";
}

// Obtener el botón y la lista de opciones
const miBoton = document.getElementById("Usuario");
const miLista = document.getElementById("miLista");

miBoton.addEventListener("click", function() {
  miLista.style.display = (miLista.style.display === "block") ? "none" : "block";
});

const miListaItems = miLista.getElementsByTagName("li");
for (let i = 0; i < miListaItems.length; i++) {
  miListaItems[i].addEventListener("click", function(event) {
    event.stopPropagation();
  });
}

