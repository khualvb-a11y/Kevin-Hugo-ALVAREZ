<?php include("conexion.php"); 

if (isset($_POST['enviar'])) {
    $id_alumno = $_POST['id_alumno'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_na = $_POST['fecha_na'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];

  $sql = "INSERT INTO alumnos (id_alumno,nombre,apellido,fecha_na,direccion,telefono,email,sexo) VALUES ('$id_alumno', '$nombre', '$apellido', '$fecha_na', '$direccion', '$telefono', '$email', '$sexo')";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('Alumno insertado correctamente');
            window.location.href = '../insertar.html';
          </script>";
  } else {
    echo "<script>
            alert('Error al insertar');
            window.location.href = '../insertar.html';
          </script>";
  }
}
?>