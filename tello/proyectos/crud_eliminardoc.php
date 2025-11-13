<?php 
include("conexion.php");

if (isset($_POST['eliminar'])) 
  $id_docente = mysqli_real_escape_string($conexion, $_POST['id_docente']);
  
  // Primero, verificar si el registro existe
  $sql_verificar = "SELECT * FROM docentes WHERE id_docente = '$id_docente'";
  $resultado_verificar = mysqli_query($conexion, $sql_verificar);
  
  if (mysqli_num_rows($resultado_verificar) > 0) {
    // El registro existe, proceder a eliminar
    $sql_eliminar = "DELETE FROM docentes WHERE id_docente = '$id_docente'";
    $resultado_eliminar = mysqli_query($conexion, $sql_eliminar);
    
    if ($resultado_eliminar) {
      echo "<script>
              alert('✅ Docente eliminado correctamente');
              window.location.href = '../eliminardoc.php';
            </script>";
    } else {
      echo "<script>
              alert('❌ Error al eliminar el docente: " . mysqli_error($conexion) . "');
              window.location.href = '../eliminarmat.php';
            </script>";
    }
  } else {
    echo "<script>
            alert('❌ No se encontró ningún alumno con ese ID');
            window.location.href = '../eliminarmat.php';
          </script>";
  }