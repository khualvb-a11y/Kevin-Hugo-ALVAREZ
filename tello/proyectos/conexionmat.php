<?php
// Conexión sin PDO (PHP Data Object) orientado a objetos
$servername = "localhost";
$database = "alumnos";
$username = "root";
$password = "";

// Creación de conexión
$conexionmat = mysqli_connect($servername, $username, $password, $database);

// Chequeo de conexión
if (!$conexionmat) {
    die("❌ Conexión fallida: " . mysqli_connect_error());
}
echo "✅ Conexión exitosa a la base de datos: " . $database . "<br>";