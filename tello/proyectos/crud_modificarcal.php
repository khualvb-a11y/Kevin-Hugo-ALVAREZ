<?php include("conexion.php");

if (isset($_POST['actualizar'])) {

  $id_cal= $_POST['id_cal'];
  $fecha_captura= $_POST['fecha_captura'];
  $id_docente= $_POST['id_docente'];
  $id_materia= $_POST['id_materia'];
  $id_alumno= $_POST['id_alumno'];
  $calificacion= $_POST['calificacion'];


  $sql = "UPDATE calificacion SET  id_cal='$id_cal', fecha_captura='$fecha_captura', fecha_captura='$fecha_captura',id_docente='$id_docente',id_materia='$id_materia',id_alumno='$id_alumno',calificacion='$calificacion' WHERE id_cal='$id_cal'";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('Registro actualizado correctamente');
            window.location.href = '../modificarcal.php';
          </script>";
  } else {
    echo "<script>
            alert('Error al actualizar');
            window.history.back();
          </script>";
  }
}
?>