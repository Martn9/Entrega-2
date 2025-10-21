<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="CarHub: Noticias, modelos y comparativas de la industria automotriz.">
    <meta name="keywords" content="autos, vehículos, noticias automotrices, modelos de autos, carhub">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHub.com</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1 id="main-title">CarHub</h1>
        <nav>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#noticias">Noticias</a></li>
                <li><a href="#modelos">Modelos</a></li>
                <li><a href="#comparativa">Comparativa</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <section id="inicio">
        <h2>Bienvenido a CarHub</h2>
        <p>El lugar donde encuentras toda la información del mundo automotriz.</p>
        <img src="imagenes/carhub.png" alt="Imagen de bienvenida de un auto moderno" style="max-width: 180px;">
        <p>¡Comienza explorando nuestros modelos!</p>
        <a href="#modelos" class="cta-button">Ver Modelos</a>
    </section>

    <main class="container">
        <section id="noticias">
            <h1>Noticias Automotrices</h1>
            <div class="noticias-grid">
                <article><h3>El Futuro de los Vehículos Eléctricos</h3><p>...</p></article>
                <article><h3>Tendencias en Diseño de Automóviles 2025</h3><p>...</p></article>
                <article><h3>Innovaciones en Seguridad Automotriz</h3><p>...</p></article>
            </div>
        </section>

        <section id="modelos">
            <h2>Explora Nuestros Modelos</h2>

            <div style="text-align:center; margin-bottom: 30px; padding: 15px; background-color: #f0f0f0; border-radius: 8px;">
              <label for="selector-modelo"><b>Ver detalles desde la Base de Datos:</b></label>
              <select id="selector-modelo" style="padding: 8px;">
                <option value="">Selecciona un auto</option>
                <option value="1">Tesla Model S</option>
                <option value="2">Bronco Raptor</option>
                <option value="3">Ford Mustang</option>
              </select>
            </div>
            
            <div id="detalle-modelo-container" style="text-align:center; margin: 20px auto; min-height: 50px;"></div>

            <div class="modelos-grid">
                <div class="modelo-card"><img src="imagenes/teslaS.jpg" alt="Tesla Model S"><h3>Tesla Model S</h3><p>...</p></div>
                <div class="modelo-card"><img src="imagenes/bronco.jpg.avif" alt="Ford Bronco Raptor"><h3>Bronco Raptor</h3><p>...</p></div>
                <div class="modelo-card"><img src="imagenes/Ford_Mustang_.png.avif" alt="Ford Mustang 2025"><h3>Ford Mustang</h3><p>...</p></div>
            </div>
            <div style="text-align:center; margin-top: 30px;">
                <button id="color-btn" class="cta-button">Cambiar modelos</button>
            </div>
        </section>

        <hr>

        <section id="comparativa">
            <h2><b><i>Tabla Comparativa</i></b></h2>
            <table class="tabla-comparativa">
                </table>
        </section>

        <section id="contacto">
            <form id="contact-form" action="procesar_solicitud.php" method="POST">
                <h2>Formulario de Solicitud</h2>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu Nombre Completo">
                
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email_cliente" required placeholder="tuemail@ejemplo.com">
                
                <label for="modelo_interes">Modelo de Interés:</label>
                <select id="modelo_interes" name="modelo_interes" required>
                    <option value="">-- Elige un modelo --</option>
                    <option value="Tesla Model S">Tesla Model S</option>
                    <option value="Ford Bronco Raptor">Ford Bronco Raptor</option>
                    <option value="Ford Mustang">Ford Mustang</option>
                </select>
                
                <button type="submit">Enviar Solicitud</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 CarHub. Todos los derechos reservados.</p>
        <p><a href="listar_solicitudes.php" style="color: white;">Ver Solicitudes Registradas</a></p>
    </footer>
</body>
</html>