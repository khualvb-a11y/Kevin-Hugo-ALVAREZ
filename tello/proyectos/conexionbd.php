<?php
// Conexión sin PDO (PHP Data Object) orientado a objetos
$servername = "localhost";
$database = "alumnos";
$username = "root";
$password = "";

// Creación de conexión
$conexion = mysqli_connect($servername, $username, $password, $database);

// Chequeo de conexión
if (!$conexion) {
    die("❌ Conexión fallida: " . mysqli_connect_error());
}
echo "✅ Conexión exitosa a la base de datos: " . $database . "<br>";

// PROCESO DE INSERCIÓN DE DATOS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Atributos de la tabla
     $id_alumno = $_POST['id_alumno'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_na = $_POST['fecha_na'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Validar que no vengan vacíos
    if (!empty($id_alumno) && !empty($nombre_alumno) && !empty($apellido_alumno)&& !empty($fecha_nac) && !empty($direccion) && !empty($telefono) && !empty($email)) {
        // Sentencia SQL (id se omite si es AUTO_INCREMENT)
        $sql = "INSERT INTO alumnos (id_alumno,nombre,apellido,fecha_na,direccion,telefono,email) VALUES ('$id_alumno', '$nombre', '$apellido', '$fecha_na', '$direccion', '$telefono', '$email')";

        if (mysqli_query($conexion, $sql)) {
            echo "✅ Nuevo registro creado exitosamente.";
        } else {
            echo "❌ Error al insertar: " . mysqli_error($conexion);
        }
    } else {
        echo "⚠️ Por favor, completa todos los campos del formulario.";
    }

    // Cerrar conexión
    mysqli_close($conexion);
}
?>
