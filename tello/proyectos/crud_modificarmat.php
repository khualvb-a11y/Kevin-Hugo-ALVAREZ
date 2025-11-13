<?php include("conexion.php");

if (isset($_POST['actualizar'])) {
  $id_materia = $_POST['id_materia'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $creditos= $_POST['creditos'];
    $h_sem = $_POST['h_sem'];
    

  $sql = "UPDATE materias SET  nombre='$nombre', descripcion='$descripcion', creditos='$creditos',h_sem='$h_sem' WHERE id_materia='$id_materia'";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('Registro actualizado correctamente');
            window.location.href = '../modificarmat.php';
          </script>";
  } else {
    echo "<script>
            alert('Error al actualizar');
            window.history.back();
          </script>";
  }
}
?>