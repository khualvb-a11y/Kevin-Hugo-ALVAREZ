<?php 
include("conexionmat.php");

if (isset($_POST['eliminar'])) {
  $id_materia= mysqli_real_escape_string($conexionmat, $_POST['id_materia']);
  
  // Primero, verificar si el registro existe
  $sql_verificar = "SELECT * FROM materias WHERE id_materia = '$id_materia'";
  $resultado_verificar = mysqli_query($conexionmat, $sql_verificar);
  
  if (mysqli_num_rows($resultado_verificar) > 0) {
    // El registro existe, proceder a eliminar
    $sql_eliminar = "DELETE FROM materias WHERE id_materia = '$id_materia'";
    $resultado_eliminar = mysqli_query($conexionmat, $sql_eliminar);
    
    if ($resultado_eliminar) {
      echo "<script>
              alert('✅ materia eliminada correctamente');
              window.location.href = '../eliminarmat.php';
            </script>";
    } else {
      echo "<script>
              alert('❌ Error al eliminar la materia: " . mysqli_error($conexionmat) . "');
              window.location.href = '../eliminarmat.php';
            </script>";
    }
  } else {
    echo "<script>
            alert('❌ No se encontró ningúna materia con ese ID');
            window.location.href = '../eliminarmat.php';
          </script>";
  }
  
  mysqli_close($conexionmat);
} else {
  // Si alguien accede directamente al archivo sin enviar el formulario
  header("Location: ../eliminarmat.php");
  exit();
}
?>