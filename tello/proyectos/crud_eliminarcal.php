<?php 
include("conexion.php");

if (isset($_POST['eliminar'])) 
  $id_cal = mysqli_real_escape_string($conexion, $_POST['id_cal']);
  
  // Primero, verificar si el registro existe
  $sql_verificar = "SELECT * FROM calificacion WHERE id_cal= '$id_cal'";
  $resultado_verificar = mysqli_query($conexion, $sql_verificar);
  
  if (mysqli_num_rows($resultado_verificar) > 0) {
    // El registro existe, proceder a eliminar
    $sql_eliminar = "DELETE FROM calificacion WHERE id_cal = '$id_cal'";
    $resultado_eliminar = mysqli_query($conexion, $sql_eliminar);
    
    if ($resultado_eliminar) {
      echo "<script>
              alert('✅ Calificacion eliminado correctamente');
              window.location.href = '../eliminarcal.php';
            </script>";
    } else {
      echo "<script>
              alert('❌ Error al eliminar la calificacion: " . mysqli_error($conexion) . "');
              window.location.href = '../eliminarcal.php';
            </script>";
    }
  } else {
    echo "<script>
            alert('❌ No se encontró ninguna calificacion con ese ID');
            window.location.href = '../eliminarcal.php';
          </script>";
  }