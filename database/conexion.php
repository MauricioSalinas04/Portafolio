<?php
function obtenerConexion() {

    // Archivo de configuración con las credenciales de la base de datos
    require_once(__DIR__ . '/config.php');

    // Establecer opciones de conexión
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
    ];

    try {
        // Crear una nueva instancia de la clase PDO para la conexión
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
        return $pdo;
    } catch (PDOException $e) {
        // En caso de error, mostrar un mensaje amigable o registrar el error en un archivo de registro
        die("Error de conexión: " . $e->getMessage());
    }
}
?>
