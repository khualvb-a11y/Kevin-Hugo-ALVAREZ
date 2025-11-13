<?php include("conexion.php");

if (isset($_POST['actualizar'])) {
  $id_alumno = $_POST['id_alumno'];
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_na = $_POST['fecha_na'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];

  $sql = "UPDATE alumnos SET  nombre='$nombre', apellido='$apellido', fecha_na='$fecha_na',direccion='$direccion', telefono='$telefono',email='$email',sexo='$sexo' WHERE id_alumno='$id_alumno'";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('Registro actualizado correctamente');
            window.location.href = '../modificar.php';
          </script>";
  } else {
    echo "<script>
            alert('Error al actualizar');
            window.history.back();
          </script>";
  }
}
?>