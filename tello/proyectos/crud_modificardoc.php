<?php include("conexion.php");

if (isset($_POST['actualizar'])) {
  $id_docente = $_POST['id_docente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $f_c= $_POST['f_c'];
    
  $sql = "UPDATE docentes SET  nombre='$nombre', apellido='$apellido', especialidad='$especialidad',telefono='$telefono',f_c='$f_c' WHERE id_docente='$id_docente'";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('Registro actualizado correctamente');
            window.location.href = '../modificardoc.php';
          </script>";
  } else {
    echo "<script>
            alert('Error al actualizar');
            window.history.back();
          </script>";
  }
}
?>