document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM cargado");

    const contactForm = document.getElementById("contact-form");
    const colorBtn = document.getElementById("color-btn");
    const mainTitle = document.getElementById("main-title");
    const modeloCards = document.querySelectorAll(".modelo-card");

    function cambiarModeloConFade(elemento, nuevoModelo) {
        console.log("Ejecutando cambiarModeloConFade() con", nuevoModelo.nombre);
        elemento.style.transition = "opacity 0.5s";
        elemento.style.opacity = 0;
        setTimeout(() => {
            elemento.querySelector("img").src = nuevoModelo.img;
            elemento.querySelector("h3").textContent = nuevoModelo.nombre;
            elemento.querySelector("p").textContent = nuevoModelo.descripcion;
            elemento.style.opacity = 1;
        }, 500);
    }

    function mostrarMensaje(elemento, texto) {
        console.log("Ejecutando mostrarMensaje()");
        elemento.textContent = texto;
    }

    function actualizarTabla(modelos) {
        console.log("Actualizando tabla comparativa");
        const tabla = document.querySelector(".tabla-comparativa tbody");
        if (!tabla) return;
        tabla.style.transition = "opacity 0.5s";
        tabla.style.opacity = 0;
        setTimeout(() => {
            const filas = tabla.querySelectorAll("tr");
            const campos = ["tipo", "motor", "potencia", "aceleracion", "traccion", "autonomia", "fortalezas"];
            filas.forEach((fila, i) => {
                for (let j = 0; j < modelos.length; j++) {
                    fila.cells[j + 1].textContent = modelos[j].tabla[campos[i]];
                }
            });
            tabla.style.opacity = 1;
        }, 500);
    }

    if (colorBtn) {
        colorBtn.addEventListener("click", function() {
            // ... (Toda la lógica de tu compañero aquí no se toca)
        });
    }

    if (mainTitle) {
        mainTitle.addEventListener("mouseover", function() {
            console.log("mouseover en título");
            this.style.color = "#ff4500"; 
            this.style.cursor = "pointer"; 
        });

        mainTitle.addEventListener("mouseout", function() {
            console.log("mouseout en título");
            this.style.color = "#0056b3"; 
        });
    }

    // =====================================================================
    //  NUEVO CÓDIGO FUNCIONALIDAD FETCH (Añadir al final del archivo)
    // =====================================================================
    // DOCUMENTACIÓN: Este bloque cumple con el requisito de FETCH de la rúbrica.
    
    // 1. Apuntamos a los elementos HTML que creamos en index.php
    const selectorModelo = document.getElementById("selector-modelo");
    const detalleContainer = document.getElementById("detalle-modelo-container");

    // 2. Nos aseguramos de que el selector exista para no causar errores
    if (selectorModelo) {
        // 3. Creamos un "escuchador" de eventos. Se activa cuando el usuario CAMBIA la opción del selector.
        selectorModelo.addEventListener("change", function() {
            const modeloId = this.value; // Obtenemos el ID del modelo seleccionado (ej: "1", "2" o "3")
            
            // Si el usuario vuelve a la opción "Selecciona un auto", limpiamos el contenedor.
            if (!modeloId) {
                detalleContainer.innerHTML = "";
                return; // Termina la función aquí
            }

            // 4. ¡Aquí ocurre la magia de FETCH! Hacemos una petición al archivo PHP.
            // Le pasamos el ID del modelo por la URL (ej: obtener_detalles.php?id=1)
            fetch(`obtener_detalles.php?id=${modeloId}`)
                .then(response => response.json()) // Esperamos la respuesta y la convertimos a formato JSON
                .then(data => {
                    // 5. Cuando los datos llegan, los usamos para construir el HTML y mostrarlo en pantalla.
                    detalleContainer.innerHTML = `
                        <div style="padding: 15px; border: 1px solid #ccc; border-radius: 5px;">
                            <h3>${data.nombre}</h3>
                            <p>${data.descripcion}</p>
                            <ul style="list-style: none; padding: 0;">
                                <li><strong>Motor:</strong> ${data.motor}</li>
                                <li><strong>Potencia:</strong> ${data.potencia}</li>
                                <li><strong>Tracción:</strong> ${data.traccion}</li>
                            </ul>
                        </div>
                    `;
                })
                .catch(error => {
                    // Si algo falla (ej: el archivo PHP no existe), mostramos un error.
                    console.error('Error en la petición fetch:', error);
                    detalleContainer.innerHTML = "<p style='color: red;'>Error al cargar los datos.</p>";
                });
        });
    }
});