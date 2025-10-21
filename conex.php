<?php
// conex.php: Archivo de conexión a la BD
$servidor = "mysql.inf.uct.cl";
$usuario = "martin_hernandez"; // Tu usuario de la UCT
$contrasena = ""; // Tu contraseña
$basedatos = "tu_usuario"; // Generalmente es el mismo que el usuario

$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>