<?php 
include("conexion.php");

if (isset($_POST['consultar'])) {
  $id_materia = $_POST['id_materia'];

  $sql = "SELECT * FROM materia WHERE id_materia='$id_materia'";
  $resultado = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($resultado) > 0) {
    $alumno = mysqli_fetch_assoc($resultado);
    echo "<script>alert('Consulta realizada correctamente');</script>";
  } else {
    echo "<script>alert('No se encontró ningún registro con ese ID'); window.history.back();</script>";
  }
}
?>