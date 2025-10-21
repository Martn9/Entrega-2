<?php
// DOCUMENTACIÓN: Este script consulta la tabla 'solicitudes' y muestra todos los registros.
// Cumple con el requisito de "Implementación de Listado de Datos".

// 1. Incluimos la conexión a la BD
include 'conex.php';

// 2. Preparamos la consulta SQL para seleccionar todos los datos de la tabla
$sql = "SELECT nombre_cliente, email_cliente, modelo_interes FROM solicitudes ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Solicitudes</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <main class="container">
        <h2>Listado de Solicitudes de Clientes</h2>
        <p>Aquí se muestran todos los registros de interés guardados.</p>
        
        <table class="tabla-comparativa">
            <thead>
                <tr>
                    <th>Nombre Cliente</th>
                    <th>Email</th>
                    <th>Modelo de Interés</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 3. Verificamos si la consulta devolvió algún resultado
                if ($resultado->num_rows > 0) {
                    // Si hay resultados, los recorremos uno por uno y los mostramos en la tabla
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['nombre_cliente']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['email_cliente']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['modelo_interes']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Si no hay resultados, mostramos un mensaje
                    echo "<tr><td colspan='3'>No hay solicitudes registradas todavía.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php" class="cta-button">Volver a la Página Principal</a>
    </main>
</body>
</html>
<?php
// 4. Cerramos la conexión
$conexion->close();
?>