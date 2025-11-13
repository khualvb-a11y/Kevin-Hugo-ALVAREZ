<?php 
include("conexion.php");

if (isset($_POST['eliminar'])) {
  $id_alumno = mysqli_real_escape_string($conexion, $_POST['id_alumno']);
  
  // Primero, verificar si el registro existe
  $sql_verificar = "SELECT * FROM alumnos WHERE id_alumno = '$id_alumno'";
  $resultado_verificar = mysqli_query($conexion, $sql_verificar);
  
  if (mysqli_num_rows($resultado_verificar) > 0) {
    // El registro existe, proceder a eliminar
    $sql_eliminar = "DELETE FROM alumnos WHERE id_alumno = '$id_alumno'";
    $resultado_eliminar = mysqli_query($conexion, $sql_eliminar);
    
    if ($resultado_eliminar) {
      echo "<script>
              alert('✅ Alumno eliminado correctamente');
              window.location.href = '../eliminar.php';
            </script>";
    } else {
      echo "<script>
              alert('❌ Error al eliminar el alumno: " . mysqli_error($conexion) . "');
              window.location.href = '../eliminar.php';
            </script>";
    }
  } else {
    echo "<script>
            alert('❌ No se encontró ningún alumno con ese ID');
            window.location.href = '../eliminar.php';
          </script>";
  }
  
  mysqli_close($conexion);
} else {
  // Si alguien accede directamente al archivo sin enviar el formulario
  header("Location: ../eliminar.php");
  exit();
}
?>