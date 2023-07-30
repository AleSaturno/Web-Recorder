window.addEventListener('DOMContentLoaded', (event) => {
  document.muted = true;
});


document.addEventListener('DOMContentLoaded', () => {
  const button = document.querySelector('.Rectangle-8');
  button.addEventListener('click', () => {
    const description = document.querySelector('.Interfaz-Funciones-2');
    const description2 = document.querySelector('.Interfaz-Funciones');
    const description3 = document.querySelector('.Interfaz-Funciones-3');
    if (description2.style.display === 'block' || description.style.display === 'block' || description3.style.display === 'block') {
      description.style.display = 'none';
      description3.style.display = 'none';
      description2.style.display = 'block';
    } else {
      description2.style.display = 'block';
    }
  });
});
 

document.addEventListener('DOMContentLoaded', () => {
  const button = document.querySelector('.Rectangle-7');
  button.addEventListener('click', () => {
    const description = document.querySelector('.Interfaz-Funciones-2');
    const description2 = document.querySelector('.Interfaz-Funciones');
    const description3 = document.querySelector('.Interfaz-Funciones-3');
    if (description2.style.display === 'block' || description.style.display === 'block' || description3.style.display === 'block') {
      description2.style.display = 'none';
      description3.style.display = 'none';
      description.style.display = 'block'
    } else {
      description.style.display = 'block';
    }
  });
});


document.addEventListener('DOMContentLoaded', () => {
  const button = document.querySelector('.Rectangle-6');
  button.addEventListener('click', () => {
    const description = document.querySelector('.Interfaz-Funciones-2');
    const description2 = document.querySelector('.Interfaz-Funciones');
    const description3 = document.querySelector('.Interfaz-Funciones-3');
    if (description3.style.display === 'none' || description.style.display === 'block' || description2.style.display === 'block') {
      description2.style.display = 'none';
      description.style.display = 'none';
      description3.style.display = 'block';
    } else {
      description3.style.display = 'block';
    }
  });
});

// Obtener el botón y el div que contiene la imagen
const button = document.querySelector(".Rectangle-28");
const frame = document.querySelector(".Frame-5");

// Agregar un controlador de eventos al botón
button.addEventListener("click", function() {
  // Ocultar la imagen estableciendo la propiedad CSS "display" en "none"
  frame.querySelector("img").style.display = "none";
});


function cambiarBoton() {
  var botonAntiguo = document.getElementById("Rectangle-4");
  var botonNuevo = document.getElementById("Rectangle-80");
  botonAntiguo.style.display = "none";
  botonNuevo.style.display = "block";
}

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

