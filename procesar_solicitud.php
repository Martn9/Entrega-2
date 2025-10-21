<?php
//  Este script recibe los datos del formulario y los guarda en la tabla 'solicitudes'.

include 'conex.php';

// 2. Recibimos los datos enviados por el formulario usando el método POST
$nombre = $_POST['nombre'];
$email = $_POST['email_cliente'];
$modelo = $_POST['modelo_interes'];

// 3. Preparamos la consulta SQL para insertar los datos de forma segura
$stmt = $conexion->prepare("INSERT INTO solicitudes (nombre_cliente, email_cliente, modelo_interes) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $modelo);

// 4. Ejecutamos la consulta y preparamos un mensaje para el usuario
if ($stmt->execute()) {
    // Si todo sale bien, preparamos un mensaje de éxito
    $mensaje_usuario = "<h1>¡Solicitud recibida!</h1><p>Gracias, " . htmlspecialchars($nombre) . ". Hemos registrado tu interés.</p>";
} else {
    // Si hay un error, preparamos un mensaje de error
    $mensaje_usuario = "<h1>Error</h1><p>Lo sentimos, no pudimos registrar tu solicitud.</p>";
}

// 5. Cerramos la conexión para liberar recursos
$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado de la Solicitud</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container" style="text-align: center; margin-top: 50px;">
        <?php echo $mensaje_usuario; // Mostramos el mensaje de éxito o error ?>
        <br><br>
        <a href='index.php' class='cta-button'>Volver al inicio</a>
    </div>
</body>
</html>