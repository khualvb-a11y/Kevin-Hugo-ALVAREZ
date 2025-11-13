<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tabla WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $alumno = mysqli_fetch_assoc($resultado);
        echo json_encode([
            'existe' => true,
            'id' => $alumno['id'],
            'nombre' => $alumno['nombre'],
            'edad' => $alumno['edad'],
            'telefono' => $alumno['telefono']
        ]);
    } else {
        echo json_encode(['existe' => false]);
    }
}
?>